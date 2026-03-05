<?php
namespace App\Http\Controllers;
use App\Models\AlertSettings;
use App\Models\CustomFields;
use App\Models\EmailLog;
use App\Models\Jobs;
use App\Models\OtherItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;


use App\Models\Credentials;
use App\Models\Client;
use App\Models\Notes;

use App\Models\OtherData;


use App\Exports\MyExport;

class adminController extends Controller
{
    public function index()
    {
        $auth = session()->get('adminAuth')[0];
        $isAdmin = $auth['type'] == 'admin';

        // Get dashboard statistics
        $today = now()->startOfDay();

        // Upcoming Jobs: Jobs with visit_date >= today and status != 'completed'
        $upcomingJobsCount = Jobs::where('visit_date', '>=', $today)
            ->where('job_status', '!=', 'completed')
            ->where('job_status', '!=', 'cancelled')
            ->count();

        // Pending Tasks: Jobs with status 'pending' or 'in_progress'
        $pendingTasksCount = Jobs::whereIn('job_status', ['pending', 'in_progress'])->count();

        // Jobs Completed: Jobs with status 'completed'
        $jobsCompletedCount = Jobs::where('job_status', 'completed')->count();

        // Active Clients: Clients with status 'active'
        $activeClientsCount = Client::where('status', 'active')->count();

        // Get upcoming jobs for the table (with client relationship)
        $upcomingJobs = Jobs::with('client')
            ->where('visit_date', '>=', $today)
            ->where('job_status', '!=', 'completed')
            ->where('job_status', '!=', 'cancelled')
            ->orderBy('visit_date', 'asc')
            ->limit(20)
            ->get();

        // Get monthly jobs completed data for line chart (last 12 months)
        $monthlyJobsCompleted = [];
        $monthlyLabels = [];
        for ($i = 11; $i >= 0; $i--) {
            $monthStart = now()->subMonths($i)->startOfMonth();
            $monthEnd = now()->subMonths($i)->endOfMonth();
            $monthLabel = $monthStart->format('M Y');

            $count = Jobs::where('job_status', 'completed')
                ->whereBetween('created_at', [$monthStart, $monthEnd])
                ->count();

            $monthlyLabels[] = $monthLabel;
            $monthlyJobsCompleted[] = $count;
        }

        // Get new vs repeated clients data for donut chart
        // Repeated clients: clients with more than 1 job
        // New clients: clients with exactly 1 job
        $repeatedClientsCount = Jobs::select('client_id')
            ->groupBy('client_id')
            ->havingRaw('COUNT(*) > 1')
            ->count();

        $newClientsCount = Jobs::select('client_id')
            ->groupBy('client_id')
            ->havingRaw('COUNT(*) = 1')
            ->count();

        return view('index', [
            'upcomingJobsCount' => $upcomingJobsCount,
            'pendingTasksCount' => $pendingTasksCount,
            'jobsCompletedCount' => $jobsCompletedCount,
            'activeClientsCount' => $activeClientsCount,
            'upcomingJobs' => $upcomingJobs,
            'monthlyJobsCompleted' => $monthlyJobsCompleted,
            'monthlyLabels' => $monthlyLabels,
            'newClientsCount' => $newClientsCount,
            'repeatedClientsCount' => $repeatedClientsCount
        ]);
    }

    public function clients($id)
    {
        $client = Client::findOrFail($id);
        $notes = Notes::where('client_id', $id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        $otherItems = OtherItems::get()->toArray();
        $customFields = CustomFields::get()->toArray();

        // Fetch other_data for this client
        $otherData = OtherData::where('client_id', $id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $data = json_decode($item->data, true) ?? [];
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'item_type_id' => $item->item_type_id,
                    'data' => $data,
                    'created_at' => $item->created_at,
                ];
            });

        // Count completed jobs for this client
        $jobsCompleted = Jobs::where('client_id', $id)
            ->where('job_status', 'completed')
            ->count();

        // Find next upcoming maintenance date (excluding visit_date from jobs)
        $maintenanceDates = [];
        $today = now()->startOfDay();

        // Collect all maintenance _next dates
        if ($client->compressor_a_next) {
            $maintenanceDates[] = [
                'date' => $client->compressor_a_next,
                'type' => 'Compressor A'
            ];
        }
        if ($client->compressor_b_next) {
            $maintenanceDates[] = [
                'date' => $client->compressor_b_next,
                'type' => 'Compressor B'
            ];
        }
        if ($client->water_filter_next) {
            $maintenanceDates[] = [
                'date' => $client->water_filter_next,
                'type' => 'Water Filter'
            ];
        }
        if ($client->silver_filter_next) {
            $maintenanceDates[] = [
                'date' => $client->silver_filter_next,
                'type' => 'Silver Filter'
            ];
        }
        if ($client->cavitron_filter_next) {
            $maintenanceDates[] = [
                'date' => $client->cavitron_filter_next,
                'type' => 'Cavitron Filter'
            ];
        }
        if ($client->amalgam_next) {
            $maintenanceDates[] = [
                'date' => $client->amalgam_next,
                'type' => 'Amalgam Separator'
            ];
        }
        if ($client->sterilizer_next) {
            $maintenanceDates[] = [
                'date' => $client->sterilizer_next,
                'type' => 'Sterilizer'
            ];
        }

        // Find all upcoming maintenance dates
        $upcomingMaintenance = null;
        $upcomingMaintenanceList = [];
        $daysRemaining = null;

        if (!empty($maintenanceDates)) {
            // Filter only future dates and sort
            $futureDates = array_filter($maintenanceDates, function ($item) use ($today) {
                if (!$item['date']) {
                    return false;
                }
                // Clone to avoid mutating the original date
                $date = $item['date']->copy()->startOfDay();
                return $date->gte($today);
            });

            if (!empty($futureDates)) {
                usort($futureDates, function ($a, $b) {
                    $dateA = $a['date']->copy()->startOfDay();
                    $dateB = $b['date']->copy()->startOfDay();
                    return $dateA <=> $dateB;
                });

                // Calculate days remaining for each maintenance item
                foreach ($futureDates as &$item) {
                    $maintenanceDate = $item['date']->copy()->startOfDay();
                    $item['days_remaining'] = $today->diffInDays($maintenanceDate, false);
                }
                unset($item); // Break reference

                // Keep the first one for backward compatibility
                $upcomingMaintenance = $futureDates[0];
                $maintenanceDate = $upcomingMaintenance['date']->copy()->startOfDay();
                $daysRemaining = $today->diffInDays($maintenanceDate, false);
                
                // Store all upcoming maintenance dates
                $upcomingMaintenanceList = $futureDates;
            }
        }

        return view('client_view')
            ->with('client', $client)
            ->with('notes', $notes)
            ->with('otherItems', $otherItems)
            ->with('customFields', $customFields)
            ->with('otherData', $otherData)
            ->with('jobsCompleted', $jobsCompleted)
            ->with('upcomingMaintenance', $upcomingMaintenance)
            ->with('upcomingMaintenanceList', $upcomingMaintenanceList)
            ->with('maintenanceDaysRemaining', $daysRemaining);
    }
    public function view2($page)
    {
        $team = Credentials::where('id', '!=', session()->get('adminAuth')[0]['id'])->get()->toArray();
        $customFields = CustomFields::get()->toArray();
        $otherItems = OtherItems::get()->toArray();

        // Process otherItems to include custom field names
        $processedOtherItems = [];
        foreach ($otherItems as $k => $item) {
            $count = OtherData::where('item_type_id', $item['id'])->count();
            $item['useage'] = $count;
            $itemData = $item;
            $fieldIds = json_decode($item['fields'], true) ?? [];

            // Get custom field names based on IDs
            $fieldNames = [];
            if (!empty($fieldIds) && is_array($fieldIds)) {
                $fields = CustomFields::whereIn('id', $fieldIds)->pluck('name')->toArray();
                $fieldNames = $fields;
            }

            $itemData['custom_field_names'] = $fieldNames;
            $itemData['custom_field_names_display'] = !empty($fieldNames) ? implode(', ', $fieldNames) : 'No fields assigned';
            $processedOtherItems[] = $itemData;
        }

        $view = view($page)
            ->with('team', $team)
            ->with('customFields', $customFields)
            ->with('otherItems', $processedOtherItems);

        // Add clients data if viewing clients page
        if ($page == 'clients') {
            $clients = Client::orderBy('created_at', 'desc')->get();
            $view->with('clients', $clients);
        }

        // Add jobs data if viewing jobs page
        if ($page == 'jobs') {
            $userType = session()->get('adminAuth')[0]['type'];
            $userId = session()->get('adminAuth')[0]['id'];

            $jobsQuery = Jobs::with(['client', 'worker']);

            // If user is a worker, only show jobs assigned to them
            if ($userType == 'worker') {
                $jobsQuery->where('assigned_worker', $userId);
            }
            // If user is admin, show all jobs (no filter needed)

            $jobs = $jobsQuery->orderBy('created_at', 'desc')->get();
            $view->with('jobs', $jobs);
        }

        // Add today's events if viewing calendar page
        if ($page == 'calendar') {
            $todayEvents = $this->getTodaysEvents();
            $view->with('todayEvents', $todayEvents);
        }

        // Add alert settings if viewing settings page
        if ($page == 'settings') {
            $userId = session()->get('adminAuth')[0]['id'];
            $alertSettings = AlertSettings::where('user_id', $userId)->first();
            $view->with('alertSettings', $alertSettings);
        }

        return $view;
    }
    public function jobs($id)
    {
        $job = Jobs::with(['client', 'worker'])->findOrFail($id);

        // Check if user is a worker and if the job is assigned to them
        $userType = session()->get('adminAuth')[0]['type'];
        $userId = session()->get('adminAuth')[0]['id'];

        if ($userType == 'worker' && $job->assigned_worker != $userId) {
            // Worker trying to access a job not assigned to them
            abort(403, 'You do not have permission to view this job.');
        }

        $notes = Notes::where('client_id', $job->client_id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $otherItems = OtherItems::get()->toArray();
        $customFields = CustomFields::get()->toArray();

        // Fetch other_data for this client
        $otherData = OtherData::where('client_id', $job->client_id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $data = json_decode($item->data, true) ?? [];
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'item_type_id' => $item->item_type_id,
                    'data' => $data,
                    'created_at' => $item->created_at,
                ];
            });

        return view('job_view')
            ->with('job', $job)
            ->with('notes', $notes)
            ->with('otherItems', $otherItems)
            ->with('customFields', $customFields)
            ->with('otherData', $otherData);
    }
    public function updateJobStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'job_status' => 'required|in:pending,in_progress,completed,cancelled'
            ], [
                'job_status.required' => 'Job status is required.',
                'job_status.in' => 'Job status must be one of: pending, in_progress, completed, cancelled.'
            ]);

            $job = Jobs::findOrFail($id);

            // Check if user is a worker and if the job is assigned to them
            $userType = session()->get('adminAuth')[0]['type'];
            $userId = session()->get('adminAuth')[0]['id'];

            if ($userType == 'worker' && $job->assigned_worker != $userId) {
                if ($request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'You do not have permission to update this job.'
                    ], 403);
                }
                abort(403, 'You do not have permission to update this job.');
            }

            $job->job_status = $request->input('job_status');
            $job->save();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Job status updated successfully!',
                    'job_status' => $job->job_status
                ]);
            }

            return redirect()->back()
                ->with('message', 'Job status updated successfully!')
                ->with('type', 'success');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $e->errors()
                ], 422);
            }
            return redirect()->back()
                ->withErrors($e->errors())
                ->with('message', 'Error updating job status: Please check the form for errors.')
                ->with('type', 'error');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating job status: ' . $e->getMessage()
                ], 500);
            }
            return redirect()->back()
                ->with('message', 'Error updating job status: ' . $e->getMessage())
                ->with('type', 'error');
        }
    }

    public function updateJobVisitDate(Request $request, $id)
    {
        try {
            $request->validate([
                'visit_date' => 'required|date'
            ], [
                'visit_date.required' => 'Visit date is required.',
                'visit_date.date' => 'Visit date must be a valid date.'
            ]);

            $job = Jobs::findOrFail($id);

            // Check if user is a worker and if the job is assigned to them
            $userType = session()->get('adminAuth')[0]['type'];
            $userId = session()->get('adminAuth')[0]['id'];

            if ($userType == 'worker' && $job->assigned_worker != $userId) {
                if ($request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'You do not have permission to update this job.'
                    ], 403);
                }
                abort(403, 'You do not have permission to update this job.');
            }

            $job->visit_date = $request->input('visit_date');
            $job->save();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Visit date updated successfully!',
                    'visit_date' => $job->visit_date->format('Y-m-d')
                ]);
            }

            return redirect()->back()
                ->with('message', 'Visit date updated successfully!')
                ->with('type', 'success');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $e->errors()
                ], 422);
            }
            return redirect()->back()
                ->withErrors($e->errors())
                ->with('message', 'Error updating visit date: Please check the form for errors.')
                ->with('type', 'error');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating visit date: ' . $e->getMessage()
                ], 500);
            }
            return redirect()->back()
                ->with('message', 'Error updating visit date: ' . $e->getMessage())
                ->with('type', 'error');
        }
    }

    public function logout()
    {
        session()->forget('adminAuth');
        return redirect('/');
    }
    public function login()
    {
        $message = session()->get('error');
        session()->forget('error');

        return view('login')->with('message', $message);
    }
    public function doLogin(Request $request)
    {
        $post = $request->post();
        $check = Credentials::
            where('email', $post['email'])->
            //where('password',$post['password'])->
            get()->toArray();

        if (!empty($check)) {
            if($check[0]['status'] == 'deactive') {
                return redirect('/login')
                    ->with('error', 'Your account is deactivated.');
            }
            if ($check[0]['password'] == $post['password']) {
                session()->put('adminAuth', $check);
                // If user status is 'invited', redirect to settings page
                if (isset($check[0]['status']) && $check[0]['status'] == 'invited') {
                    return redirect('/settings')
                        ->with('tab', 'v-pills-home-tab')
                        ->with('message', 'Welcome! Please update your profile to activate your account.')
                        ->with('type', 'success');
                }
            } else {
                session()->put('error', "Invalid Password");
            }

        } else {
            session()->put('error', "Email not found");
        }
        return redirect('/');
    }
    public function updatePassword(Request $request)
    {
        $post = $request->except('_token');
        $currentUser = session()->get('adminAuth')[0];
        $currentUserId = $currentUser['id'];

        // Verify current password
        if ($currentUser['password'] != $post['current_password']) {
            return redirect('/settings')
                ->with('tab', 'v-pills-password-tab2')
                ->with('message', 'Current password is incorrect.')
                ->with('type', 'error');
        }

        // Update password (plain text as requested)
        Credentials::where('id', $currentUserId)->update([
            'password' => $post['new_password']
        ]);

        // Update session with new password
        $upd = Credentials::where('id', $currentUserId)->get()->toArray();
        session()->put('adminAuth', $upd);

        return redirect('/settings')
            ->with('tab', 'v-pills-password-tab2')
            ->with('message', 'Password Updated Successfully')
            ->with('type', 'success');
    }
    public function updateProfile(Request $request)
    {
        $post = $request->except('_token');
        $currentUser = session()->get('adminAuth')[0];
        $currentUserId = $currentUser['id'];

        // Check if the new email already exists for a different user
        $emailExists = Credentials::where('email', $post['email'])
            ->where('id', '!=', $currentUserId)
            ->first();

        if ($emailExists) {
            return redirect('/settings')
                ->with('tab', 'v-pills-home-tab')
                ->with('message', 'Email already exists. Please use a different email.')
                ->with('type', 'error');
        }

        $toUpd = [
            'name' => $post['name'],
            'email' => $post['email'],
            'contact' => $post['phone'],
        ];

        // Handle image upload if provided
        if ($request->hasFile('img')) {
            $image = $request->file('img');

            // Validate image file
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $extension = strtolower($image->getClientOriginalExtension());

            if (!in_array($extension, $allowedExtensions)) {
                return redirect('/settings')
                    ->with('tab', 'v-pills-home-tab')
                    ->with('message', 'Invalid image format. Please upload JPG, PNG, GIF, or WEBP files only.')
                    ->with('type', 'error');
            }

            // Generate unique filename
            $imageName = time() . '_' . uniqid() . '.' . $extension;

            // Move uploaded file to public/uploads directory
            $image->move(public_path('uploads'), $imageName);

            // Delete old image if it exists (optional cleanup)
            if (!empty($currentUser['img']) && $currentUser['img'] != 'defaultProfilePic.jpg') {
                $oldImagePath = public_path('uploads/' . $currentUser['img']);
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }

            $toUpd['img'] = $imageName;
        }

        // If user status is 'invited', change it to 'active' when they update their profile
        if (isset($currentUser['status']) && $currentUser['status'] == 'invited') {
            $toUpd['status'] = 'active';
        }

        Credentials::where('id', $currentUserId)->update($toUpd);
        $upd = Credentials::where('id', $currentUserId)->get()->toArray();
        session()->put('adminAuth', $upd);

        return redirect('/settings')
            ->with('tab', 'v-pills-home-tab')
            ->with('message', 'Profile Updated Successfully')
            ->with('type', 'success');
    }
    public function addMember(Request $request)
    {
        $post = $request->except('_token');

        // Check if email already exists
        $emailExists = Credentials::where('email', $post['email'])->first();
        if ($emailExists) {
            return redirect('/settings')
                ->with('tab', 'v-pills-teamManage-tab3')
                ->with('message', 'Email already exists. Please use a different email.')
                ->with('type', 'error');
        }

        // Generate random 4-digit password
        $password = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // Create new member with invited status
        Credentials::create([
            'name' => "",
            'email' => $post['email'],
            'type' => $post['type'],
            'password' => $password,
            'status' => 'invited'
        ]);

        // Prepare email content
        $loginUrl = url('/login');
        $subject = 'Invitation to Join GemDentalRepair';
        $message = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #155DFC; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
                .content { background-color: #f9f9f9; padding: 30px; border-radius: 0 0 8px 8px; }
                .credentials { background-color: white; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #155DFC; }
                .button { display: inline-block; padding: 12px 30px; background-color: #155DFC; color: white !important; text-decoration: none; border-radius: 6px; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Welcome to GemDentalRepair!</h2>
                </div>
                <div class='content'>
                    <p>Hello,</p>
                    <p>You have been invited to join GemDentalRepair as a <strong>" . ucfirst($post['type']) . "</strong>.</p>
                    <p>Please use the following credentials to log in to your account:</p>
                    <div class='credentials'>
                        <p><strong>Email:</strong> " . htmlspecialchars($post['email']) . "</p>
                        <p><strong>Password:</strong> " . $password . "</p>
                    </div>
                    <p>Click the button below to access the login page:</p>
                    <a href='" . $loginUrl . "' class='button'>Login to System</a>
                    <p style='margin-top: 30px;'>After logging in, please update your profile information in the Settings page.</p>
                    <p>Best regards,<br>GemDentalRepair Team</p>
                </div>
            </div>
        </body>
        </html>";

        // Send invitation email
        $this->sendMail($post['email'], $subject, $message);

        return redirect('/settings')
            ->with('tab', 'v-pills-teamManage-tab3')
            ->with('message', 'Member invitation sent successfully!')
            ->with('type', 'success');
    }

    public function updateMember(Request $request)
    {
        $post = $request->except('_token');
        
        // Validate required fields
        if (empty($post['member_id'])) {
            return redirect('/settings')
                ->with('tab', 'v-pills-teamManage-tab3')
                ->with('message', 'Member ID is required.')
                ->with('type', 'error');
        }

        $memberId = $post['member_id'];
        $member = Credentials::find($memberId);

        if (!$member) {
            return redirect('/settings')
                ->with('tab', 'v-pills-teamManage-tab3')
                ->with('message', 'Member not found.')
                ->with('type', 'error');
        }

        // Email is readonly in edit modal, so we don't validate or update it
        // But we'll keep the email in the form for reference
        
        // Validate status if provided
        if (isset($post['status'])) {
            $allowedStatuses = ['active', 'deactive', 'invited'];
            if (!in_array($post['status'], $allowedStatuses)) {
                return redirect('/settings')
                    ->with('tab', 'v-pills-teamManage-tab3')
                    ->with('message', 'Invalid status selected.')
                    ->with('type', 'error');
            }
        }

        // Prepare update data
        $toUpd = [];
        if (isset($post['name'])) {
            $toUpd['name'] = $post['name'];
        }
        if (isset($post['contact'])) {
            $toUpd['contact'] = $post['contact'];
        }
        if (isset($post['type'])) {
            $toUpd['type'] = $post['type'];
        }
        if (isset($post['status'])) {
            $toUpd['status'] = $post['status'];
        }

        // Prevent deactivating yourself
        $currentUserId = session()->get('adminAuth')[0]['id'];
        if (isset($post['status']) && $post['status'] == 'deactive' && $memberId == $currentUserId) {
            return redirect('/settings')
                ->with('tab', 'v-pills-teamManage-tab3')
                ->with('message', 'You cannot deactivate your own account.')
                ->with('type', 'error');
        }

        // Update member
        Credentials::where('id', $memberId)->update($toUpd);

        return redirect('/settings')
            ->with('tab', 'v-pills-teamManage-tab3')
            ->with('message', 'Member updated successfully!')
            ->with('type', 'success');
    }

    public function toggleMemberStatus(Request $request)
    {
        $post = $request->except('_token');
        
        // Validate required fields
        if (empty($post['member_id'])) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Member ID is required.'
                ], 400);
            }
            return redirect('/settings')
                ->with('tab', 'v-pills-teamManage-tab3')
                ->with('message', 'Member ID is required.')
                ->with('type', 'error');
        }

        $memberId = $post['member_id'];
        $member = Credentials::find($memberId);

        if (!$member) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Member not found.'
                ], 404);
            }
            return redirect('/settings')
                ->with('tab', 'v-pills-teamManage-tab3')
                ->with('message', 'Member not found.')
                ->with('type', 'error');
        }

        // Prevent deactivating yourself
        $currentUserId = session()->get('adminAuth')[0]['id'];
        if ($memberId == $currentUserId) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You cannot change your own status.'
                ], 403);
            }
            return redirect('/settings')
                ->with('tab', 'v-pills-teamManage-tab3')
                ->with('message', 'You cannot change your own status.')
                ->with('type', 'error');
        }

        // Toggle status between active and inactive (or invited)
        $currentStatus = $member->status;
        $newStatus = ($currentStatus == 'active') ? 'deactive' : 'active';

        Credentials::where('id', $memberId)->update(['status' => $newStatus]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Member status updated successfully!',
                'status' => $newStatus
            ]);
        }

        return redirect('/settings')
            ->with('tab', 'v-pills-teamManage-tab3')
            ->with('message', 'Member status updated successfully!')
            ->with('type', 'success');
    }

    public function addOtherItems(Request $request)
    {
        $post = $request->except('_token');

        // Validate required fields
        if (empty($post['item_name']) || trim($post['item_name']) === '') {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'Item name is required.');
        }

        // Validate custom_fields array
        if (empty($post['custom_fields']) || !is_array($post['custom_fields'])) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'Please select at least one custom field.');
        }

        // Filter out empty values and validate custom field IDs exist
        $customFieldIds = array_filter(array_map('intval', $post['custom_fields']), function ($id) {
            return $id > 0;
        });

        if (empty($customFieldIds)) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'Please select at least one valid custom field.');
        }

        // Verify that all custom field IDs exist in the database
        $existingFields = CustomFields::whereIn('id', $customFieldIds)->pluck('id')->toArray();
        if (count($existingFields) !== count($customFieldIds)) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'One or more selected custom fields do not exist.');
        }

        // Check if item name already exists (optional duplicate prevention)
        $itemName = trim($post['item_name']);
        $existingItem = OtherItems::where('name', $itemName)->first();
        if ($existingItem) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'An item with this name already exists.');
        }

        // Encode custom fields as JSON
        $json = json_encode($customFieldIds);

        // Validate JSON encoding was successful
        if ($json === false) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'An error occurred while processing the data. Please try again.');
        }

        try {
            OtherItems::create([
                'name' => $itemName,
                'fields' => $json
            ]);

            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'success')
                ->with('message', 'Other Item added successfully!');
        } catch (\Exception $e) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'An error occurred while adding the item. Please try again.');
        }
    }

    public function updateOtherItems(Request $request)
    {
        $post = $request->except('_token');
        
        // Validate required fields
        if (empty($post['item_id'])) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'Item ID is required.');
        }

        $itemId = $post['item_id'];
        $item = OtherItems::find($itemId);

        if (!$item) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'Other item not found.');
        }

        // Validate required fields
        if (empty($post['item_name']) || trim($post['item_name']) === '') {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'Item name is required.');
        }

        // Validate custom_fields array
        if (empty($post['custom_fields']) || !is_array($post['custom_fields'])) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'Please select at least one custom field.');
        }

        // Filter out empty values and validate custom field IDs exist
        $customFieldIds = array_filter(array_map('intval', $post['custom_fields']), function ($id) {
            return $id > 0;
        });

        if (empty($customFieldIds)) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'Please select at least one valid custom field.');
        }

        // Verify that all custom field IDs exist in the database
        $existingFields = CustomFields::whereIn('id', $customFieldIds)->pluck('id')->toArray();
        if (count($existingFields) !== count($customFieldIds)) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'One or more selected custom fields do not exist.');
        }

        // Check if item name already exists for a different item
        $itemName = trim($post['item_name']);
        $existingItem = OtherItems::where('name', $itemName)->where('id', '!=', $itemId)->first();
        if ($existingItem) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'An item with this name already exists.');
        }

        // Encode custom fields as JSON
        $json = json_encode($customFieldIds);

        // Validate JSON encoding was successful
        if ($json === false) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'An error occurred while processing the data. Please try again.');
        }

        try {
            OtherItems::where('id', $itemId)->update([
                'name' => $itemName,
                'fields' => $json
            ]);

            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'success')
                ->with('message', 'Other Item updated successfully!');
        } catch (\Exception $e) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'An error occurred while updating the item. Please try again.');
        }
    }

    public function deleteOtherItems(Request $request)
    {
        $post = $request->except('_token');
        
        // Validate required fields
        if (empty($post['item_id'])) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'Item ID is required.');
        }

        $itemId = $post['item_id'];
        $item = OtherItems::find($itemId);

        if (!$item) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'Other item not found.');
        }

        try {
            // Check if item is being used in any other_data entries
            $usageCount = OtherData::where('item_type_id', $itemId)->count();
            
            if ($usageCount > 0) {
                return redirect('/settings')
                    ->with('tab', 'v-pills-otherItems-tab3')
                    ->with('type', 'error')
                    ->with('message', 'Cannot delete this item as it is being used in ' . $usageCount . ' record(s). Please delete all related records first.');
            }

            OtherItems::where('id', $itemId)->delete();
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'success')
                ->with('message', 'Other Item deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/settings')
                ->with('tab', 'v-pills-otherItems-tab3')
                ->with('type', 'error')
                ->with('message', 'An error occurred while deleting the item. Please try again.');
        }
    }

    public function addCustomField(Request $request)
    {
        $post = $request->except('_token');

        // Validate required fields
        if (empty($post['field_label']) || empty($post['field_type']) || empty($post['status'])) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Please fill in all required fields.');
        }

        // Validate field type
        $allowedTypes = ['Free Text', 'select', 'multi select', 'date', 'boolean'];
        if (!in_array($post['field_type'], $allowedTypes)) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Invalid field type selected.');
        }

        // Validate status
        $allowedStatuses = ['visible', 'hidden'];
        if (!in_array($post['status'], $allowedStatuses)) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Invalid status selected.');
        }

        $data['name'] = $post['field_label'];
        $data['type'] = $post['field_type'];
        $data['status'] = $post['status'];

        // Handle options for select and multi select types
        if (in_array($data['type'], ['select', 'multi select'])) {
            // Check if options are provided
            if (empty($post['options']) || !is_array($post['options'])) {
                return redirect('/settings')
                    ->with('tab', 'v-pills-customFields-tab3')
                    ->with('type', 'error')
                    ->with('message', 'Please provide at least one option for select/multi select fields.');
            }

            // Filter out empty options and trim whitespace
            $options = array_filter(array_map('trim', $post['options']), function ($option) {
                return !empty($option);
            });

            // Check if we have at least one valid option after filtering
            if (empty($options)) {
                return redirect('/settings')
                    ->with('tab', 'v-pills-customFields-tab3')
                    ->with('type', 'error')
                    ->with('message', 'Please provide at least one valid option value.');
            }

            $data['values'] = json_encode(array_values($options));
        } else {
            // For other field types, set values to null
            $data['values'] = null;
        }

        try {
            CustomFields::create($data);
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'success')
                ->with('message', 'Custom Field added successfully!');
        } catch (\Exception $e) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'An error occurred while adding the custom field. Please try again.');
        }
    }

    public function updateCustomField(Request $request)
    {
        $post = $request->except('_token');
        
        // Validate required fields
        if (empty($post['field_id'])) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Field ID is required.');
        }

        $fieldId = $post['field_id'];
        $field = CustomFields::find($fieldId);

        if (!$field) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Custom field not found.');
        }

        // Validate required fields
        if (empty($post['field_label']) || empty($post['field_type']) || empty($post['status'])) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Please fill in all required fields.');
        }

        // Validate field type
        $allowedTypes = ['Free Text', 'select', 'multi select', 'date', 'boolean'];
        if (!in_array($post['field_type'], $allowedTypes)) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Invalid field type selected.');
        }

        // Prevent field type changes - field type cannot be changed once created
        if ($field->type !== $post['field_type']) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Field type cannot be changed once created.');
        }

        // Validate status
        $allowedStatuses = ['visible', 'hidden'];
        if (!in_array($post['status'], $allowedStatuses)) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Invalid status selected.');
        }

        $data['name'] = $post['field_label'];
        $data['type'] = $post['field_type']; // Keep original type (already validated above)
        $data['status'] = $post['status'];

        // Handle options for select and multi select types
        if (in_array($data['type'], ['select', 'multi select'])) {
            // Check if options are provided
            if (empty($post['options']) || !is_array($post['options'])) {
                return redirect('/settings')
                    ->with('tab', 'v-pills-customFields-tab3')
                    ->with('type', 'error')
                    ->with('message', 'Please provide at least one option for select/multi select fields.');
            }

            // Filter out empty options and trim whitespace
            $options = array_filter(array_map('trim', $post['options']), function ($option) {
                return !empty($option);
            });

            // Check if we have at least one valid option after filtering
            if (empty($options)) {
                return redirect('/settings')
                    ->with('tab', 'v-pills-customFields-tab3')
                    ->with('type', 'error')
                    ->with('message', 'Please provide at least one valid option value.');
            }

            $data['values'] = json_encode(array_values($options));
        } else {
            // For other field types, set values to null
            $data['values'] = null;
        }

        try {
            CustomFields::where('id', $fieldId)->update($data);
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'success')
                ->with('message', 'Custom Field updated successfully!');
        } catch (\Exception $e) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'An error occurred while updating the custom field. Please try again.');
        }
    }

    public function deleteCustomField(Request $request)
    {
        $post = $request->except('_token');
        
        // Validate required fields
        if (empty($post['field_id'])) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Field ID is required.');
        }

        $fieldId = $post['field_id'];
        $field = CustomFields::find($fieldId);

        if (!$field) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'Custom field not found.');
        }

        try {
            // Check if field is used in any other items
            $otherItems = OtherItems::get()->toArray();
            $isUsed = false;
            foreach ($otherItems as $item) {
                $fieldIds = json_decode($item['fields'], true) ?? [];
                if (in_array($fieldId, $fieldIds)) {
                    $isUsed = true;
                    break;
                }
            }

            if ($isUsed) {
                return redirect('/settings')
                    ->with('tab', 'v-pills-customFields-tab3')
                    ->with('type', 'error')
                    ->with('message', 'Cannot delete this custom field as it is being used in other items.');
            }

            CustomFields::where('id', $fieldId)->delete();
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'success')
                ->with('message', 'Custom Field deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/settings')
                ->with('tab', 'v-pills-customFields-tab3')
                ->with('type', 'error')
                ->with('message', 'An error occurred while deleting the custom field. Please try again.');
        }
    }

    public function sendMail($to, $subject, $message)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = getenv('MAIL_HOST');                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                  //Enable SMTP authentication
            $mail->Username = getenv('MAIL_USERNAME');                     //SMTP username
            $mail->Password = getenv('MAIL_PASSWORD');                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = getenv('MAIL_PORT');                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(getenv('MAIL_USERNAME'), getenv('MAIL_FROM_NAME'));
            $mail->addReplyTo(getenv('MAIL_REPLY_EMAIL'), getenv('MAIL_FROM_NAME'));
            $mail->addAddress($to);  //Add a recipient

            //Content
            $mail->CharSet = "UTF-8"; //PHPMailer character encoding issues resolve sucha as
            $mail->Encoding = 'base64'; //PHPMailer character encoding issues resolve such as converting ü to mÃ¼v,
            //to reslove this we use
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
            // return redirect($redirect);
        } catch (MailException $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return 'error';
        }
    }

    public function storeClient(Request $request)
    {
        // Validate required fields
        $request->validate([
            'office_name' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'address' => 'required|string',
            'zip_code' => 'required|string|max:20',
            'office_number' => 'required|string|max:50',
            'last_dos' => 'nullable|date',
            'suite' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            // Compressor A fields
            'compressor_a_model' => 'nullable|string|max:255',
            'compressor_a_serial' => 'nullable|string|max:255',
            'compressor_a_oem' => 'nullable|string',
            'compressor_a_initial' => 'nullable|date',
            'compressor_a_last' => 'nullable|date',
            'compressor_a_next' => 'nullable|date',
            'compressor_a_days' => 'nullable|integer|min:1',
            // Compressor B fields
            'compressor_b_model' => 'nullable|string|max:255',
            'compressor_b_serial' => 'nullable|string|max:255',
            'compressor_b_oem' => 'nullable|string',
            'compressor_b_initial' => 'nullable|date',
            'compressor_b_last' => 'nullable|date',
            'compressor_b_next' => 'nullable|date',
            'compressor_b_days' => 'nullable|integer|min:1',
            // Filter fields
            'water_filter_initial' => 'nullable|date',
            'water_filter_next' => 'nullable|date',
            'water_filter_days' => 'nullable|integer|min:1',
            'water_filter_completed' => 'nullable|in:yes,no',
            'water_filter_maintenance' => 'nullable|in:yes,no',
            'silver_filter_initial' => 'nullable|date',
            'silver_filter_next' => 'nullable|date',
            'silver_filter_days' => 'nullable|integer|min:1',
            'silver_filter_maintenance' => 'nullable|in:yes,no',
            'cavitron_filter_initial' => 'nullable|date',
            'cavitron_filter_next' => 'nullable|date',
            'cavitron_filter_days' => 'nullable|integer|min:1',
            'cavitron_filter_maintenance' => 'nullable|in:yes,no',
            // Amalgam Separator fields
            'amalgam_model' => 'nullable|string|max:255',
            'amalgam_initial' => 'nullable|date',
            'amalgam_next' => 'nullable|date',
            'amalgam_days' => 'nullable|integer|min:1',
            'amalgam_maintenance' => 'nullable|in:yes,no',
            // Sterilizer fields
            'sterilizer_model' => 'nullable|string|max:255',
            'sterilizer_initial' => 'nullable|date',
            'sterilizer_next' => 'nullable|date',
            'sterilizer_days' => 'nullable|integer|min:1',
            'sterilizer_days2' => 'nullable|integer|min:1',
            'sterilizer_maintenance' => 'nullable|in:yes,no',
        ]);

        try {
            // Prepare data with default status
            $data = $request->all();
            $data['status'] = 'active';

            // Create new client
            $client = Client::create($data);

            return redirect()->back()
                ->with('message', 'Client created successfully!')
                ->with('type', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('message', 'Error creating client: ' . $e->getMessage())
                ->with('type', 'error');
        }
    }

    public function getClient($id)
    {
        try {
            $client = Client::findOrFail($id);

            // Format dates for JSON response (convert to Y-m-d format for date inputs)
            $clientData = $client->toArray();

            // Format date fields
            $dateFields = [
                'last_dos',
                'compressor_a_initial',
                'compressor_a_last',
                'compressor_a_next',
                'compressor_b_initial',
                'compressor_b_last',
                'compressor_b_next',
                'water_filter_initial',
                'water_filter_next',
                'silver_filter_initial',
                'silver_filter_next',
                'cavitron_filter_initial',
                'cavitron_filter_next',
                'amalgam_initial',
                'amalgam_next',
                'sterilizer_initial',
                'sterilizer_next'
            ];

            // Ensure maintenance fields are returned as string (yes/no), not formatted as date
            $maintenanceFields = [
                'water_filter_completed',
                'water_filter_maintenance',
                'silver_filter_maintenance',
                'cavitron_filter_maintenance',
                'amalgam_maintenance',
                'sterilizer_maintenance'
            ];

            foreach ($maintenanceFields as $field) {
                if (!empty($clientData[$field])) {
                    $clientData[$field] = strtolower($clientData[$field]);
                } else {
                    $clientData[$field] = '';
                }
            }

            foreach ($dateFields as $field) {
                if (!empty($clientData[$field])) {
                    $clientData[$field] = date('Y-m-d', strtotime($clientData[$field]));
                } else {
                    $clientData[$field] = '';
                }
            }

            return response()->json([
                'success' => true,
                'client' => $clientData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Client not found'
            ], 404);
        }
    }

    public function updateClient(Request $request, $id)
    {
        // Validate required fields
        try {
            $validated = $request->validate([
                'office_name' => 'required|string|max:255',
                'doctor_name' => 'required|string|max:255',
                'address' => 'required|string',
                'zip_code' => 'required|string|max:20',
                'office_number' => 'required|string|max:50',
                'last_dos' => 'nullable|date',
                'suite' => 'nullable|string|max:100',
                'city' => 'nullable|string|max:100',
                'state' => 'nullable|string|max:100',
                // Compressor A fields
                'compressor_a_model' => 'nullable|string|max:255',
                'compressor_a_serial' => 'nullable|string|max:255',
                'compressor_a_oem' => 'nullable|string',
                'compressor_a_initial' => 'nullable|date',
                'compressor_a_last' => 'nullable|date',
                'compressor_a_next' => 'nullable|date',
                'compressor_a_days' => 'nullable|integer|min:1',
                // Compressor B fields
                'compressor_b_model' => 'nullable|string|max:255',
                'compressor_b_serial' => 'nullable|string|max:255',
                'compressor_b_oem' => 'nullable|string',
                'compressor_b_initial' => 'nullable|date',
                'compressor_b_last' => 'nullable|date',
                'compressor_b_next' => 'nullable|date',
                'compressor_b_days' => 'nullable|integer|min:1',
                // Filter fields
                'water_filter_initial' => 'nullable|date',
                'water_filter_next' => 'nullable|date',
                'water_filter_days' => 'nullable|integer|min:1',
                'water_filter_completed' => 'nullable|in:yes,no',
                'water_filter_maintenance' => 'nullable|in:yes,no',
                'silver_filter_initial' => 'nullable|date',
                'silver_filter_next' => 'nullable|date',
                'silver_filter_days' => 'nullable|integer|min:1',
                'silver_filter_maintenance' => 'nullable|in:yes,no',
                'cavitron_filter_initial' => 'nullable|date',
                'cavitron_filter_next' => 'nullable|date',
                'cavitron_filter_days' => 'nullable|integer|min:1',
                'cavitron_filter_maintenance' => 'nullable|in:yes,no',
                // Amalgam Separator fields
                'amalgam_model' => 'nullable|string|max:255',
                'amalgam_initial' => 'nullable|date',
                'amalgam_next' => 'nullable|date',
                'amalgam_days' => 'nullable|integer|min:1',
                'amalgam_maintenance' => 'nullable|in:yes,no',
                // Sterilizer fields
                'sterilizer_model' => 'nullable|string|max:255',
                'sterilizer_initial' => 'nullable|date',
                'sterilizer_next' => 'nullable|date',
                'sterilizer_days' => 'nullable|integer|min:1',
                'sterilizer_days2' => 'nullable|integer|min:1',
                'sterilizer_maintenance' => 'nullable|in:yes,no',
                // Status field
                'status' => 'nullable|in:active,inactive',
            ]);
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        }

        try {
            $client = Client::findOrFail($id);
            $client->update($request->all());

            // Return JSON for AJAX requests
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Client updated successfully!'
                ]);
            }

            return redirect()->back()
                ->with('message', 'Client updated successfully!')
                ->with('type', 'success');
        } catch (\Exception $e) {
            // Return JSON for AJAX requests
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating client: ' . $e->getMessage()
                ], 422);
            }

            return redirect()->back()
                ->withInput()
                ->with('message', 'Error updating client: ' . $e->getMessage())
                ->with('type', 'error');
        }
    }

    public function updateClientStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:active,inactive'
            ], [
                'status.required' => 'Client status is required.',
                'status.in' => 'Client status must be either active or inactive.'
            ]);

            $client = Client::findOrFail($id);
            $client->status = $request->input('status');
            $client->save();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Client status updated successfully!',
                    'status' => $client->status
                ]);
            }

            return redirect()->back()
                ->with('message', 'Client status updated successfully!')
                ->with('type', 'success');
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating client status: ' . $e->getMessage()
                ], 422);
            }

            return redirect()->back()
                ->with('message', 'Error updating client status: ' . $e->getMessage())
                ->with('type', 'error');
        }
    }

    public function storeNote(Request $request)
    {
        try {
            $request->validate([
                'client_id' => 'required|exists:clients,id',
                'note' => 'required|string|min:1',
            ]);

            $currentUser = session()->get('adminAuth')[0];
            $userId = $currentUser['id'];

            $note = Notes::create([
                'user_id' => $userId,
                'client_id' => $request->client_id,
                'note' => $request->note,
            ]);

            // Load the user relationship
            $note->load('user');

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Note added successfully!',
                    'note' => [
                        'id' => $note->id,
                        'note' => $note->note,
                        'user_name' => $note->user->name ?? 'Unknown',
                        'created_at' => $note->created_at->format('m/d/Y'),
                        'created_at_time' => $note->created_at->format('h:i A'),
                    ]
                ]);
            }

            return redirect()->back()
                ->with('message', 'Note added successfully!')
                ->with('type', 'success');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error adding note: ' . $e->getMessage()
                ], 422);
            }

            return redirect()->back()
                ->with('message', 'Error adding note: ' . $e->getMessage())
                ->with('type', 'error');
        }
    }

    public function getItemFields(Request $request)
    {
        try {
            $itemId = $request->input('item_id');

            if (!$itemId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item ID is required'
                ], 400);
            }

            $item = OtherItems::find($itemId);

            if (!$item) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item not found'
                ], 404);
            }

            $fieldIds = json_decode($item->fields, true) ?? [];

            if (empty($fieldIds)) {
                return response()->json([
                    'success' => true,
                    'fields' => []
                ]);
            }

            $fields = CustomFields::whereIn('id', $fieldIds)
                ->get()
                ->sortBy(function ($field) use ($fieldIds) {
                    return array_search($field->id, $fieldIds);
                })
                ->values()
                ->map(function ($field) {
                    $values = null;
                    if (!empty($field->values)) {
                        $values = json_decode($field->values, true);
                    }

                    return [
                        'id' => $field->id,
                        'name' => $field->name,
                        'type' => $field->type,
                        'values' => $values
                    ];
                });

            return response()->json([
                'success' => true,
                'fields' => $fields
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching fields: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeOtherData(Request $request)
    {
        try {
            $request->validate([
                'client_id' => 'required|exists:clients,id',
                'item_name' => 'required|string|max:255',
                'item_type_id' => 'required|exists:other_items,id',
            ]);

            $item = OtherItems::find($request->item_type_id);
            $fieldIds = json_decode($item->fields, true) ?? [];

            // Collect all field data using field IDs as keys (not field names)
            $data = [];
            foreach ($fieldIds as $fieldId) {
                $field = CustomFields::find($fieldId);
                if ($field) {
                    $fieldName = 'field_' . $fieldId;
                    $fieldValue = $request->input($fieldName);

                    // Store using field ID as key instead of field name
                    // This way, even if field name changes later, data remains accessible
                    if ($field->type === 'multi select' && is_array($fieldValue)) {
                        $data[$fieldId] = $fieldValue;
                    } else {
                        $data[$fieldId] = $fieldValue ?? '';
                    }
                }
            }

            $otherData = OtherData::create([
                'client_id' => $request->client_id,
                'name' => $request->item_name,
                'item_type_id' => $request->item_type_id,
                'data' => json_encode($data)
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Item added successfully!',
                    'data' => [
                        'id' => $otherData->id,
                        'name' => $otherData->name,
                        'created_at' => $otherData->created_at->format('m/d/Y'),
                        'created_at_time' => $otherData->created_at->format('h:i A'),
                    ]
                ]);
            }

            return redirect()->back()
                ->with('message', 'Item added successfully!')
                ->with('type', 'success');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error adding item: ' . $e->getMessage()
                ], 422);
            }

            return redirect()->back()
                ->with('message', 'Error adding item: ' . $e->getMessage())
                ->with('type', 'error');
        }
    }

    public function getOtherData($id)
    {
        try {
            $otherData = OtherData::findOrFail($id);
            $data = json_decode($otherData->data, true) ?? [];

            // Get item_type_id from column
            $itemTypeId = $otherData->item_type_id;

            if (!$itemTypeId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item type not found'
                ], 404);
            }

            // Find the item type
            $itemType = OtherItems::find($itemTypeId);

            if (!$itemType) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item type not found'
                ], 404);
            }

            $fieldIds = json_decode($itemType->fields, true) ?? [];
            $fields = CustomFields::whereIn('id', $fieldIds)
                ->get()
                ->sortBy(function ($field) use ($fieldIds) {
                    return array_search($field->id, $fieldIds);
                })
                ->values()
                ->map(function ($field) use ($data) {
                    $values = null;
                    if (!empty($field->values)) {
                        $values = json_decode($field->values, true);
                    }

                    // Get the value from data using field ID as key (with backward compatibility for old data using field names)
                    // First try field ID (new format), then try field name (old format for backward compatibility)
                    $fieldValue = $data[$field->id] ?? $data[$field->name] ?? '';

                    return [
                        'id' => $field->id,
                        'name' => $field->name,
                        'type' => $field->type,
                        'values' => $values,
                        'value' => $fieldValue
                    ];
                });

            return response()->json([
                'success' => true,
                'otherData' => [
                    'id' => $otherData->id,
                    'name' => $otherData->name,
                    'item_type_id' => $itemType->id,
                    'client_id' => $otherData->client_id,
                    'fields' => $fields
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateOtherData(Request $request, $id)
    {
        try {
            $otherData = OtherData::findOrFail($id);

            // Use existing item_type_id from database (not editable)
            $itemTypeId = $otherData->item_type_id;

            if (!$itemTypeId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item type not found'
                ], 404);
            }

            $item = OtherItems::find($itemTypeId);
            if (!$item) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item type not found'
                ], 404);
            }

            $fieldIds = json_decode($item->fields, true) ?? [];

            // Collect all field data using field IDs as keys (not field names)
            $data = [];
            foreach ($fieldIds as $fieldId) {
                $field = CustomFields::find($fieldId);
                if ($field) {
                    $fieldName = 'field_' . $fieldId;
                    $fieldValue = $request->input($fieldName);

                    // Store using field ID as key instead of field name
                    // This way, even if field name changes later, data remains accessible
                    if ($field->type === 'multi select' && is_array($fieldValue)) {
                        $data[$fieldId] = $fieldValue;
                    } else {
                        $data[$fieldId] = $fieldValue ?? '';
                    }
                }
            }

            // Only update data field, keep name and item_type_id unchanged
            $otherData->update([
                'data' => json_encode($data)
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Item updated successfully!'
                ]);
            }

            return redirect()->back()
                ->with('message', 'Item updated successfully!')
                ->with('type', 'success');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating item: ' . $e->getMessage()
                ], 422);
            }

            return redirect()->back()
                ->with('message', 'Error updating item: ' . $e->getMessage())
                ->with('type', 'error');
        }
    }

    public function getClientsList()
    {
        try {
            $clients = Client::select('id', 'office_name')->orderBy('office_name', 'asc')->get();
            return response()->json([
                'success' => true,
                'clients' => $clients
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching clients: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getCredentialsList()
    {
        try {
            $credentials = Credentials::select('id', 'name')->orderBy('name', 'asc')->get();
            return response()->json([
                'success' => true,
                'credentials' => $credentials
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching credentials: ' . $e->getMessage()
            ], 500);
        }
    }

    public function addJob(Request $request)
    {
        try {
            // Validate required fields
            $request->validate([
                'service_type' => 'required|string|max:255',
                'visit_date' => 'required|date',
                'assigned_worker' => 'required|integer|exists:credentials,id',
                'job_status' => 'required|in:pending,in_progress,completed,cancelled',
                'client_id' => 'required|integer|exists:clients,id'
            ], [
                'service_type.required' => 'Service Type is required.',
                'visit_date.required' => 'Visit Date is required.',
                'visit_date.date' => 'Visit Date must be a valid date.',
                'assigned_worker.required' => 'Assigned Worker is required.',
                'assigned_worker.exists' => 'Selected worker does not exist.',
                'job_status.required' => 'Job Status is required.',
                'job_status.in' => 'Job Status must be one of: pending, in_progress, completed, cancelled.',
                'client_id.required' => 'Office Name (Client) is required.',
                'client_id.exists' => 'Selected client does not exist.'
            ]);

            $data = [
                'service_type' => $request->input('service_type'),
                'visit_date' => $request->input('visit_date'),
                'assigned_worker' => $request->input('assigned_worker'),
                'job_status' => $request->input('job_status'),
                'client_id' => $request->input('client_id'),
            ];

            Jobs::create($data);

            return redirect()->back()
                ->with('message', 'Job added successfully!')
                ->with('type', 'success');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('message', 'Please fix the errors below.')
                ->with('type', 'error');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('message', 'Error adding job: ' . $e->getMessage())
                ->with('type', 'error');
        }
    }

    public function deleteJob($id)
    {
        try {
            $job = Jobs::find($id);
            
            if (!$job) {
                return response()->json([
                    'success' => false,
                    'message' => 'Job not found.'
                ], 404);
            }

            $job->delete();

            return response()->json([
                'success' => true,
                'message' => 'Job deleted successfully!'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the job. Please try again.'
            ], 500);
        }
    }

    public function deleteClient($id)
    {
        try {
            $client = Client::find($id);
            
            if (!$client) {
                return response()->json([
                    'success' => false,
                    'message' => 'Client not found.'
                ], 404);
            }

            // Check if client has associated jobs
            $jobsCount = Jobs::where('client_id', $id)->count();
            
            if ($jobsCount > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete this client as it has ' . $jobsCount . ' associated job(s). Please delete all related jobs first.'
                ], 400);
            }

            $client->delete();

            return response()->json([
                'success' => true,
                'message' => 'Client deleted successfully!'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the client. Please try again.'
            ], 500);
        }
    }

    private function getTodaysEvents()
    {
        try {
            $auth = session()->get('adminAuth')[0];
            $userType = $auth['type'];
            $userId = $auth['id'];
            $today = now()->format('Y-m-d');
            $events = [];

            // Get jobs with visit dates for today
            $jobsQuery = Jobs::with('client');

            // If user is a worker, only show jobs assigned to them
            if ($userType == 'worker') {
                $jobsQuery->where('assigned_worker', $userId);
            }

            $jobs = $jobsQuery->whereNotNull('visit_date')
                ->whereDate('visit_date', $today)
                ->get();

            foreach ($jobs as $job) {
                if ($job->visit_date && $job->client) {
                    $events[] = [
                        'title' => 'Job: ' . ($job->client->office_name ?? 'Unknown Client'),
                        'type' => 'job',
                        'color' => '#3788d8',
                        'job_id' => $job->id,
                        'client_id' => $job->client_id
                    ];
                }
            }

            // Get clients for maintenance events today
            $clientsQuery = Client::query();

            // If user is a worker, only get clients that have jobs assigned to this worker
            if ($userType == 'worker') {
                $clientIds = Jobs::where('assigned_worker', $userId)
                    ->whereNotNull('client_id')
                    ->distinct()
                    ->pluck('client_id')
                    ->toArray();
                $clientsQuery->whereIn('id', $clientIds);
            }

            $clients = $clientsQuery->get();

            foreach ($clients as $client) {
                // Compressor A Next (today)
                if ($client->compressor_a_next && $client->compressor_a_next->format('Y-m-d') == $today) {
                    $events[] = [
                        'title' => 'Compressor A: ' . ($client->office_name ?? 'Unknown Client'),
                        'type' => 'compressor_a',
                        'color' => '#10b981',
                        'client_id' => $client->id
                    ];
                }

                // Compressor B Next (today)
                if ($client->compressor_b_next && $client->compressor_b_next->format('Y-m-d') == $today) {
                    $events[] = [
                        'title' => 'Compressor B: ' . ($client->office_name ?? 'Unknown Client'),
                        'type' => 'compressor_b',
                        'color' => '#10b981',
                        'client_id' => $client->id
                    ];
                }

                // Water Filter Next (if maintenance is enabled and today)
                if ($client->water_filter_maintenance == 'yes' && $client->water_filter_next && $client->water_filter_next->format('Y-m-d') == $today) {
                    $events[] = [
                        'title' => 'Water Filter: ' . ($client->office_name ?? 'Unknown Client'),
                        'type' => 'water_filter',
                        'color' => '#3b82f6',
                        'client_id' => $client->id
                    ];
                }

                // Silver Filter Next (if maintenance is enabled and today)
                if ($client->silver_filter_maintenance == 'yes' && $client->silver_filter_next && $client->silver_filter_next->format('Y-m-d') == $today) {
                    $events[] = [
                        'title' => 'Silver Filter: ' . ($client->office_name ?? 'Unknown Client'),
                        'type' => 'silver_filter',
                        'color' => '#8b5cf6',
                        'client_id' => $client->id
                    ];
                }

                // Cavitron Filter Next (if maintenance is enabled and today)
                if ($client->cavitron_filter_maintenance == 'yes' && $client->cavitron_filter_next && $client->cavitron_filter_next->format('Y-m-d') == $today) {
                    $events[] = [
                        'title' => 'Cavitron Filter: ' . ($client->office_name ?? 'Unknown Client'),
                        'type' => 'cavitron_filter',
                        'color' => '#f59e0b',
                        'client_id' => $client->id
                    ];
                }

                // Amalgam Next (if maintenance is enabled and today)
                if ($client->amalgam_maintenance == 'yes' && $client->amalgam_next && $client->amalgam_next->format('Y-m-d') == $today) {
                    $events[] = [
                        'title' => 'Amalgam Separator: ' . ($client->office_name ?? 'Unknown Client'),
                        'type' => 'amalgam',
                        'color' => '#ef4444',
                        'client_id' => $client->id
                    ];
                }

                // Sterilizer Next (if maintenance is enabled and today)
                if ($client->sterilizer_maintenance == 'yes' && $client->sterilizer_next && $client->sterilizer_next->format('Y-m-d') == $today) {
                    $events[] = [
                        'title' => 'Sterilizer: ' . ($client->office_name ?? 'Unknown Client'),
                        'type' => 'sterilizer',
                        'color' => '#ec4899',
                        'client_id' => $client->id
                    ];
                }
            }

            return $events;
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getCalendarEvents()
    {
        try {
            $auth = session()->get('adminAuth')[0];
            $userType = $auth['type'];
            $userId = $auth['id'];
            $events = [];

            // Get jobs with visit dates
            $jobsQuery = Jobs::with('client');

            // If user is a worker, only show jobs assigned to them
            if ($userType == 'worker') {
                $jobsQuery->where('assigned_worker', $userId);
            }

            $jobs = $jobsQuery->whereNotNull('visit_date')->get();

            foreach ($jobs as $job) {
                if ($job->visit_date && $job->client) {
                    $events[] = [
                        'title' => 'Job: ' . ($job->client->office_name ?? 'Unknown Client'),
                        'start' => $job->visit_date->format('Y-m-d'),
                        'color' => '#3788d8',
                        'type' => 'job',
                        'job_id' => $job->id,
                        'client_id' => $job->client_id
                    ];
                }
            }

            // Get clients for maintenance events
            $clientsQuery = Client::query();

            // If user is a worker, only get clients that have jobs assigned to this worker
            if ($userType == 'worker') {
                $clientIds = Jobs::where('assigned_worker', $userId)
                    ->whereNotNull('client_id')
                    ->distinct()
                    ->pluck('client_id')
                    ->toArray();
                $clientsQuery->whereIn('id', $clientIds);
            }

            $clients = $clientsQuery->get();

            foreach ($clients as $client) {
                // Compressor A Next
                if ($client->compressor_a_next) {
                    $events[] = [
                        'title' => 'Compressor A: ' . ($client->office_name ?? 'Unknown Client'),
                        'start' => $client->compressor_a_next->format('Y-m-d'),
                        'color' => '#10b981',
                        'type' => 'compressor_a',
                        'client_id' => $client->id
                    ];
                }

                // Compressor B Next
                if ($client->compressor_b_next) {
                    $events[] = [
                        'title' => 'Compressor B: ' . ($client->office_name ?? 'Unknown Client'),
                        'start' => $client->compressor_b_next->format('Y-m-d'),
                        'color' => '#10b981',
                        'type' => 'compressor_b',
                        'client_id' => $client->id
                    ];
                }

                // Water Filter Next (if maintenance is enabled)
                if ($client->water_filter_maintenance == 'yes' && $client->water_filter_next) {
                    $events[] = [
                        'title' => 'Water Filter: ' . ($client->office_name ?? 'Unknown Client'),
                        'start' => $client->water_filter_next->format('Y-m-d'),
                        'color' => '#3b82f6',
                        'type' => 'water_filter',
                        'client_id' => $client->id
                    ];
                }

                // Silver Filter Next (if maintenance is enabled)
                if ($client->silver_filter_maintenance == 'yes' && $client->silver_filter_next) {
                    $events[] = [
                        'title' => 'Silver Filter: ' . ($client->office_name ?? 'Unknown Client'),
                        'start' => $client->silver_filter_next->format('Y-m-d'),
                        'color' => '#8b5cf6',
                        'type' => 'silver_filter',
                        'client_id' => $client->id
                    ];
                }

                // Cavitron Filter Next (if maintenance is enabled)
                if ($client->cavitron_filter_maintenance == 'yes' && $client->cavitron_filter_next) {
                    $events[] = [
                        'title' => 'Cavitron Filter: ' . ($client->office_name ?? 'Unknown Client'),
                        'start' => $client->cavitron_filter_next->format('Y-m-d'),
                        'color' => '#f59e0b',
                        'type' => 'cavitron_filter',
                        'client_id' => $client->id
                    ];
                }

                // Amalgam Next (if maintenance is enabled)
                if ($client->amalgam_maintenance == 'yes' && $client->amalgam_next) {
                    $events[] = [
                        'title' => 'Amalgam Separator: ' . ($client->office_name ?? 'Unknown Client'),
                        'start' => $client->amalgam_next->format('Y-m-d'),
                        'color' => '#ef4444',
                        'type' => 'amalgam',
                        'client_id' => $client->id
                    ];
                }

                // Sterilizer Next (if maintenance is enabled)
                if ($client->sterilizer_maintenance == 'yes' && $client->sterilizer_next) {
                    $events[] = [
                        'title' => 'Sterilizer: ' . ($client->office_name ?? 'Unknown Client'),
                        'start' => $client->sterilizer_next->format('Y-m-d'),
                        'color' => '#ec4899',
                        'type' => 'sterilizer',
                        'client_id' => $client->id
                    ];
                }
            }

            return response()->json($events);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getAlertSettings()
    {
        try {
            $userId = session()->get('adminAuth')[0]['id'];
            $settings = AlertSettings::where('user_id', $userId)->first();

            if (!$settings) {
                // Return default settings if none exist
                return response()->json([
                    'success' => true,
                    'settings' => [
                        'follow_up' => 'false',
                        'follow_up_freq' => [],
                        'upcoming_maintenance' => 'false',
                        'upcoming_maintenance_freq' => [],
                        'overdue_maintenance' => 'false',
                        'overdue_maintenance_freq' => []
                    ]
                ]);
            }

            return response()->json([
                'success' => true,
                'settings' => [
                    'follow_up' => $settings->follow_up,
                    'follow_up_freq' => json_decode($settings->follow_up_freq, true) ?? [],
                    'upcoming_maintenance' => $settings->upcoming_maintenance,
                    'upcoming_maintenance_freq' => json_decode($settings->upcoming_maintenance_freq, true) ?? [],
                    'overdue_maintenance' => $settings->overdue_maintenance,
                    'overdue_maintenance_freq' => json_decode($settings->overdue_maintenance_freq, true) ?? []
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching alert settings: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateAlertSettings(Request $request)
    {
        try {
            $userId = session()->get('adminAuth')[0]['id'];
            $post = $request->all();

            // Prepare data for insert/update
            $data = [
                'user_id' => $userId,
                'follow_up' => isset($post['follow_up']) && $post['follow_up'] === 'true' ? 'true' : 'false',
                'follow_up_freq' => isset($post['follow_up_freq']) && is_array($post['follow_up_freq']) ? json_encode($post['follow_up_freq']) : json_encode([]),
                'upcoming_maintenance' => isset($post['upcoming_maintenance']) && $post['upcoming_maintenance'] === 'true' ? 'true' : 'false',
                'upcoming_maintenance_freq' => isset($post['upcoming_maintenance_freq']) && is_array($post['upcoming_maintenance_freq']) ? json_encode($post['upcoming_maintenance_freq']) : json_encode([]),
                'overdue_maintenance' => isset($post['overdue_maintenance']) && $post['overdue_maintenance'] === 'true' ? 'true' : 'false',
                'overdue_maintenance_freq' => isset($post['overdue_maintenance_freq']) && is_array($post['overdue_maintenance_freq']) ? json_encode($post['overdue_maintenance_freq']) : json_encode([])
            ];

            // Check if settings already exist for this user
            $existingSettings = AlertSettings::where('user_id', $userId)->first();

            if ($existingSettings) {
                // Update existing settings
                AlertSettings::where('user_id', $userId)->update($data);
            } else {
                // Create new settings
                AlertSettings::create($data);
            }

            return response()->json([
                'success' => true,
                'message' => 'Alert settings updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating alert settings: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cron job function to send notification emails
     * This should be called via a cron job (e.g., daily)
     * Example cron: 0 8 * * * curl -s https://yourdomain.com/cron/send-notifications?key=YOUR_CRON_SECRET_KEY
     * 
     * Add CRON_SECRET_KEY to your .env file for security
     */
    public function sendNotificationsCron(Request $request)
    {
        // Security check - verify cron key
        $cronKey = $request->query('key');
        $expectedKey = getenv('CRON_SECRET_KEY') ?: 'gemdental_cron_2024';

        if ($cronKey !== $expectedKey) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized access'
            ], 401);
        }

        try {
            $results = [
                'follow_up' => $this->processFollowUpReminders(),
                'upcoming_maintenance' => $this->processUpcomingMaintenance(),
                'overdue_maintenance' => $this->processOverdueMaintenance()
            ];

            return response()->json([
                'success' => true,
                'message' => 'Cron job completed',
                'timestamp' => now()->toDateTimeString(),
                'results' => $results
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error running cron job: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Process Follow-Up Reminders
     */
    private function processFollowUpReminders()
    {
        $emailsSent = 0;
        $today = now()->startOfDay();

        // Get all pending/in_progress jobs
        $jobs = Jobs::with('client')
            ->whereIn('job_status', ['pending', 'in_progress'])
            ->whereNotNull('visit_date')
            ->get();

        // Get all admins for CC
        $admins = Credentials::where('type', 'admin')->where('status', 'active')->get();

        foreach ($jobs as $job) {
            // Skip if no assigned worker
            if (!$job->assigned_worker) {
                continue;
            }

            // Get assigned worker's alert settings
            $workerSettings = AlertSettings::where('user_id', $job->assigned_worker)->first();

            if (!$workerSettings || $workerSettings->follow_up !== 'true') {
                continue;
            }

            $frequencies = json_decode($workerSettings->follow_up_freq, true) ?? [];

            if (empty($frequencies)) {
                continue;
            }

            // Get worker details
            $worker = Credentials::find($job->assigned_worker);
            if (!$worker || !$worker->email) {
                continue;
            }

            $visitDate = $job->visit_date->copy()->startOfDay();

            // Check each frequency
            foreach ($frequencies as $freq) {
                $shouldSend = false;

                switch ($freq) {
                    case 'day_before':
                        $checkDate = $visitDate->copy()->subDay();
                        $shouldSend = $today->equalTo($checkDate);
                        break;
                    case 'week_before':
                        $checkDate = $visitDate->copy()->subWeek();
                        $shouldSend = $today->equalTo($checkDate);
                        break;
                    case 'month_before':
                        $checkDate = $visitDate->copy()->subMonth();
                        $shouldSend = $today->equalTo($checkDate);
                        break;
                }

                if ($shouldSend) {
                    // Check if email already sent
                    $alreadySent = EmailLog::where('email_type', 'follow_up')
                        ->where('reference_type', 'job')
                        ->where('reference_id', $job->id)
                        ->where('frequency', $freq)
                        ->where('target_date', $visitDate->format('Y-m-d'))
                        ->where('recipient_id', $worker->id)
                        ->exists();

                    if (!$alreadySent) {
                        // Send email to worker
                        $this->sendFollowUpEmail($job, $worker, $freq);
                        $emailsSent++;

                        // Log the email
                        EmailLog::create([
                            'email_type' => 'follow_up',
                            'reference_type' => 'job',
                            'reference_id' => $job->id,
                            'equipment_type' => null,
                            'frequency' => $freq,
                            'target_date' => $visitDate->format('Y-m-d'),
                            'recipient_id' => $worker->id,
                            'recipient_email' => $worker->email,
                            'sent_at' => now()
                        ]);

                        // Send to admins as well
                        foreach ($admins as $admin) {
                            if ($admin->id !== $worker->id && $admin->email) {
                                $adminAlreadySent = EmailLog::where('email_type', 'follow_up')
                                    ->where('reference_type', 'job')
                                    ->where('reference_id', $job->id)
                                    ->where('frequency', $freq)
                                    ->where('target_date', $visitDate->format('Y-m-d'))
                                    ->where('recipient_id', $admin->id)
                                    ->exists();

                                if (!$adminAlreadySent) {
                                    $this->sendFollowUpEmail($job, $admin, $freq, true);
                                    $emailsSent++;

                                    EmailLog::create([
                                        'email_type' => 'follow_up',
                                        'reference_type' => 'job',
                                        'reference_id' => $job->id,
                                        'equipment_type' => null,
                                        'frequency' => $freq,
                                        'target_date' => $visitDate->format('Y-m-d'),
                                        'recipient_id' => $admin->id,
                                        'recipient_email' => $admin->email,
                                        'sent_at' => now()
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
        }

        return ['emails_sent' => $emailsSent];
    }

    /**
     * Process Upcoming Maintenance Notifications
     */
    private function processUpcomingMaintenance()
    {
        $emailsSent = 0;
        $today = now()->startOfDay();

        // Get all pending/in_progress jobs
        $jobs = Jobs::with('client')
            ->whereIn('job_status', ['pending', 'in_progress'])
            ->get();

        // Get all admins for CC
        $admins = Credentials::where('type', 'admin')->where('status', 'active')->get();

        // Equipment types to check
        $equipmentTypes = [
            'compressor_a' => [
                'date_field' => 'compressor_a_next',
                'name' => 'Compressor A',
                'extra_fields' => ['compressor_a_model', 'compressor_a_serial', 'compressor_a_oem', 'compressor_a_initial']
            ],
            'compressor_b' => [
                'date_field' => 'compressor_b_next',
                'name' => 'Compressor B',
                'extra_fields' => ['compressor_b_model', 'compressor_b_serial', 'compressor_b_oem', 'compressor_b_initial']
            ],
            'water_filter' => [
                'date_field' => 'water_filter_next',
                'name' => 'Water Sediment Filter',
                'extra_fields' => []
            ],
            'silver_filter' => [
                'date_field' => 'silver_filter_next',
                'name' => 'Silver Filter',
                'extra_fields' => []
            ],
            'cavitron_filter' => [
                'date_field' => 'cavitron_filter_next',
                'name' => 'Cavitron Filter',
                'extra_fields' => []
            ],
            'amalgam' => [
                'date_field' => 'amalgam_next',
                'name' => 'Amalgam Separator',
                'extra_fields' => ['amalgam_model']
            ],
            'sterilizer' => [
                'date_field' => 'sterilizer_next',
                'name' => 'Sterilizer',
                'extra_fields' => ['sterilizer_model']
            ]
        ];

        foreach ($jobs as $job) {
            // Skip if no client or no assigned worker
            if (!$job->client || !$job->assigned_worker) {
                continue;
            }

            // Get assigned worker's alert settings
            $workerSettings = AlertSettings::where('user_id', $job->assigned_worker)->first();

            if (!$workerSettings || $workerSettings->upcoming_maintenance !== 'true') {
                continue;
            }

            $frequencies = json_decode($workerSettings->upcoming_maintenance_freq, true) ?? [];

            if (empty($frequencies)) {
                continue;
            }

            // Get worker details
            $worker = Credentials::find($job->assigned_worker);
            if (!$worker || !$worker->email) {
                continue;
            }

            $client = $job->client;

            // Check each equipment type
            foreach ($equipmentTypes as $equipmentKey => $equipmentConfig) {
                $dateField = $equipmentConfig['date_field'];
                $maintenanceDate = $client->$dateField;

                if (!$maintenanceDate) {
                    continue;
                }

                $maintenanceDate = $maintenanceDate->copy()->startOfDay();

                // Check each frequency
                foreach ($frequencies as $freq) {
                    $shouldSend = false;

                    switch ($freq) {
                        case 'day_before':
                            $checkDate = $maintenanceDate->copy()->subDay();
                            $shouldSend = $today->equalTo($checkDate);
                            break;
                        case 'week_before':
                            $checkDate = $maintenanceDate->copy()->subWeek();
                            $shouldSend = $today->equalTo($checkDate);
                            break;
                        case 'month_before':
                            $checkDate = $maintenanceDate->copy()->subMonth();
                            $shouldSend = $today->equalTo($checkDate);
                            break;
                    }

                    if ($shouldSend) {
                        // Check if email already sent
                        $alreadySent = EmailLog::where('email_type', 'upcoming_maintenance')
                            ->where('reference_type', 'client_equipment')
                            ->where('reference_id', $client->id)
                            ->where('equipment_type', $equipmentKey)
                            ->where('frequency', $freq)
                            ->where('target_date', $maintenanceDate->format('Y-m-d'))
                            ->where('recipient_id', $worker->id)
                            ->exists();

                        if (!$alreadySent) {
                            // Prepare equipment details
                            $equipmentDetails = [];
                            foreach ($equipmentConfig['extra_fields'] as $field) {
                                if (!empty($client->$field)) {
                                    $equipmentDetails[$field] = $client->$field;
                                }
                            }

                            // Send email to worker
                            $this->sendMaintenanceEmail($client, $worker, $equipmentConfig['name'], $maintenanceDate, $freq, $equipmentDetails, 'upcoming');
                            $emailsSent++;

                            // Log the email
                            EmailLog::create([
                                'email_type' => 'upcoming_maintenance',
                                'reference_type' => 'client_equipment',
                                'reference_id' => $client->id,
                                'equipment_type' => $equipmentKey,
                                'frequency' => $freq,
                                'target_date' => $maintenanceDate->format('Y-m-d'),
                                'recipient_id' => $worker->id,
                                'recipient_email' => $worker->email,
                                'sent_at' => now()
                            ]);

                            // Send to admins as well
                            foreach ($admins as $admin) {
                                if ($admin->id !== $worker->id && $admin->email) {
                                    $adminAlreadySent = EmailLog::where('email_type', 'upcoming_maintenance')
                                        ->where('reference_type', 'client_equipment')
                                        ->where('reference_id', $client->id)
                                        ->where('equipment_type', $equipmentKey)
                                        ->where('frequency', $freq)
                                        ->where('target_date', $maintenanceDate->format('Y-m-d'))
                                        ->where('recipient_id', $admin->id)
                                        ->exists();

                                    if (!$adminAlreadySent) {
                                        $this->sendMaintenanceEmail($client, $admin, $equipmentConfig['name'], $maintenanceDate, $freq, $equipmentDetails, 'upcoming', true);
                                        $emailsSent++;

                                        EmailLog::create([
                                            'email_type' => 'upcoming_maintenance',
                                            'reference_type' => 'client_equipment',
                                            'reference_id' => $client->id,
                                            'equipment_type' => $equipmentKey,
                                            'frequency' => $freq,
                                            'target_date' => $maintenanceDate->format('Y-m-d'),
                                            'recipient_id' => $admin->id,
                                            'recipient_email' => $admin->email,
                                            'sent_at' => now()
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return ['emails_sent' => $emailsSent];
    }

    /**
     * Process Overdue Maintenance Notifications
     */
    private function processOverdueMaintenance()
    {
        $emailsSent = 0;
        $today = now()->startOfDay();

        // Get all pending/in_progress jobs
        $jobs = Jobs::with('client')
            ->whereIn('job_status', ['pending', 'in_progress'])
            ->get();

        // Get all admins for CC
        $admins = Credentials::where('type', 'admin')->where('status', 'active')->get();

        // Equipment types to check (same as upcoming)
        $equipmentTypes = [
            'compressor_a' => [
                'date_field' => 'compressor_a_next',
                'name' => 'Compressor A',
                'extra_fields' => ['compressor_a_model', 'compressor_a_serial', 'compressor_a_oem', 'compressor_a_initial']
            ],
            'compressor_b' => [
                'date_field' => 'compressor_b_next',
                'name' => 'Compressor B',
                'extra_fields' => ['compressor_b_model', 'compressor_b_serial', 'compressor_b_oem', 'compressor_b_initial']
            ],
            'water_filter' => [
                'date_field' => 'water_filter_next',
                'name' => 'Water Sediment Filter',
                'extra_fields' => []
            ],
            'silver_filter' => [
                'date_field' => 'silver_filter_next',
                'name' => 'Silver Filter',
                'extra_fields' => []
            ],
            'cavitron_filter' => [
                'date_field' => 'cavitron_filter_next',
                'name' => 'Cavitron Filter',
                'extra_fields' => []
            ],
            'amalgam' => [
                'date_field' => 'amalgam_next',
                'name' => 'Amalgam Separator',
                'extra_fields' => ['amalgam_model']
            ],
            'sterilizer' => [
                'date_field' => 'sterilizer_next',
                'name' => 'Sterilizer',
                'extra_fields' => ['sterilizer_model']
            ]
        ];

        foreach ($jobs as $job) {
            // Skip if no client or no assigned worker
            if (!$job->client || !$job->assigned_worker) {
                continue;
            }

            // Get assigned worker's alert settings
            $workerSettings = AlertSettings::where('user_id', $job->assigned_worker)->first();

            if (!$workerSettings || $workerSettings->overdue_maintenance !== 'true') {
                continue;
            }

            $frequencies = json_decode($workerSettings->overdue_maintenance_freq, true) ?? [];

            if (empty($frequencies)) {
                continue;
            }

            // Get worker details
            $worker = Credentials::find($job->assigned_worker);
            if (!$worker || !$worker->email) {
                continue;
            }

            $client = $job->client;

            // Check each equipment type
            foreach ($equipmentTypes as $equipmentKey => $equipmentConfig) {
                $dateField = $equipmentConfig['date_field'];
                $maintenanceDate = $client->$dateField;

                if (!$maintenanceDate) {
                    continue;
                }

                $maintenanceDate = $maintenanceDate->copy()->startOfDay();

                // Check each frequency (for overdue, we check days AFTER the maintenance date)
                foreach ($frequencies as $freq) {
                    $shouldSend = false;

                    switch ($freq) {
                        case 'day_after':
                            $checkDate = $maintenanceDate->copy()->addDay();
                            $shouldSend = $today->equalTo($checkDate);
                            break;
                        case 'week_after':
                            $checkDate = $maintenanceDate->copy()->addWeek();
                            $shouldSend = $today->equalTo($checkDate);
                            break;
                        case 'month_after':
                            $checkDate = $maintenanceDate->copy()->addMonth();
                            $shouldSend = $today->equalTo($checkDate);
                            break;
                    }

                    if ($shouldSend) {
                        // Check if email already sent
                        $alreadySent = EmailLog::where('email_type', 'overdue_maintenance')
                            ->where('reference_type', 'client_equipment')
                            ->where('reference_id', $client->id)
                            ->where('equipment_type', $equipmentKey)
                            ->where('frequency', $freq)
                            ->where('target_date', $maintenanceDate->format('Y-m-d'))
                            ->where('recipient_id', $worker->id)
                            ->exists();

                        if (!$alreadySent) {
                            // Prepare equipment details
                            $equipmentDetails = [];
                            foreach ($equipmentConfig['extra_fields'] as $field) {
                                if (!empty($client->$field)) {
                                    $equipmentDetails[$field] = $client->$field;
                                }
                            }

                            // Send email to worker
                            $this->sendMaintenanceEmail($client, $worker, $equipmentConfig['name'], $maintenanceDate, $freq, $equipmentDetails, 'overdue');
                            $emailsSent++;

                            // Log the email
                            EmailLog::create([
                                'email_type' => 'overdue_maintenance',
                                'reference_type' => 'client_equipment',
                                'reference_id' => $client->id,
                                'equipment_type' => $equipmentKey,
                                'frequency' => $freq,
                                'target_date' => $maintenanceDate->format('Y-m-d'),
                                'recipient_id' => $worker->id,
                                'recipient_email' => $worker->email,
                                'sent_at' => now()
                            ]);

                            // Send to admins as well
                            foreach ($admins as $admin) {
                                if ($admin->id !== $worker->id && $admin->email) {
                                    $adminAlreadySent = EmailLog::where('email_type', 'overdue_maintenance')
                                        ->where('reference_type', 'client_equipment')
                                        ->where('reference_id', $client->id)
                                        ->where('equipment_type', $equipmentKey)
                                        ->where('frequency', $freq)
                                        ->where('target_date', $maintenanceDate->format('Y-m-d'))
                                        ->where('recipient_id', $admin->id)
                                        ->exists();

                                    if (!$adminAlreadySent) {
                                        $this->sendMaintenanceEmail($client, $admin, $equipmentConfig['name'], $maintenanceDate, $freq, $equipmentDetails, 'overdue', true);
                                        $emailsSent++;

                                        EmailLog::create([
                                            'email_type' => 'overdue_maintenance',
                                            'reference_type' => 'client_equipment',
                                            'reference_id' => $client->id,
                                            'equipment_type' => $equipmentKey,
                                            'frequency' => $freq,
                                            'target_date' => $maintenanceDate->format('Y-m-d'),
                                            'recipient_id' => $admin->id,
                                            'recipient_email' => $admin->email,
                                            'sent_at' => now()
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return ['emails_sent' => $emailsSent];
    }

    /**
     * Send Follow-Up Reminder Email
     */
    private function sendFollowUpEmail($job, $recipient, $frequency, $isAdmin = false)
    {
        $frequencyText = $this->getFrequencyText($frequency);
        $visitDate = $job->visit_date->format('F j, Y');
        $clientName = $job->client ? $job->client->office_name : 'Unknown Client';
        $clientAddress = $job->client ? $job->client->address : '';
        $serviceType = $job->service_type ?? 'Service Visit';

        $subject = "Follow-Up Reminder: Job Visit " . $frequencyText;
        if ($isAdmin) {
            $subject = "[Admin Copy] " . $subject;
        }

        $message = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #155DFC; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
                .content { background-color: #f9f9f9; padding: 30px; border-radius: 0 0 8px 8px; }
                .info-box { background-color: white; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #155DFC; }
                .info-row { margin-bottom: 10px; }
                .label { font-weight: bold; color: #555; }
                .highlight { color: #155DFC; font-weight: bold; }
                .button { display: inline-block; padding: 12px 30px; background-color: #155DFC; color: white !important; text-decoration: none; border-radius: 6px; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Follow-Up Reminder</h2>
                </div>
                <div class='content'>
                    <p>Hello " . htmlspecialchars($recipient->name ?: 'Team Member') . ",</p>
                    <p>This is a reminder that you have a <span class='highlight'>scheduled job visit " . strtolower($frequencyText) . "</span>.</p>
                    
                    <div class='info-box'>
                        <div class='info-row'><span class='label'>Client:</span> " . htmlspecialchars($clientName) . "</div>
                        <div class='info-row'><span class='label'>Address:</span> " . htmlspecialchars($clientAddress) . "</div>
                        <div class='info-row'><span class='label'>Service Type:</span> " . htmlspecialchars($serviceType) . "</div>
                        <div class='info-row'><span class='label'>Visit Date:</span> <span class='highlight'>" . $visitDate . "</span></div>
                    </div>
                    
                    <p>Please ensure you're prepared for this visit and follow up with the client if needed.</p>
                    
                    <a href='" . url('/jobs/' . $job->id) . "' class='button'>View Job Details</a>
                    
                    <p style='margin-top: 30px;'>Best regards,<br>GemDentalRepair System</p>
                </div>
            </div>
        </body>
        </html>";

        $this->sendMail($recipient->email, $subject, $message);
    }

    /**
     * Send Maintenance Email (Upcoming or Overdue)
     */
    private function sendMaintenanceEmail($client, $recipient, $equipmentName, $maintenanceDate, $frequency, $equipmentDetails, $type = 'upcoming', $isAdmin = false)
    {
        $frequencyText = $this->getFrequencyText($frequency);
        $dateFormatted = $maintenanceDate->format('F j, Y');
        $clientName = $client->office_name ?? 'Unknown Client';
        $clientAddress = $client->address ?? '';

        if ($type === 'upcoming') {
            $subject = "Upcoming Maintenance Reminder: " . $equipmentName . " - " . $frequencyText;
            $headerTitle = "Upcoming Maintenance Reminder";
            $headerColor = "#10b981"; // Green
            $messageIntro = "This is a reminder that <span class='highlight'>" . htmlspecialchars($equipmentName) . "</span> maintenance is scheduled <span class='highlight'>" . strtolower($frequencyText) . "</span>.";
        } else {
            $subject = "OVERDUE Maintenance Alert: " . $equipmentName . " - " . $frequencyText;
            $headerTitle = "Overdue Maintenance Alert";
            $headerColor = "#ef4444"; // Red
            $messageIntro = "<strong style='color: #ef4444;'>ATTENTION:</strong> The maintenance for <span class='highlight'>" . htmlspecialchars($equipmentName) . "</span> is now <span style='color: #ef4444; font-weight: bold;'>OVERDUE</span> (" . strtolower($frequencyText) . ").";
        }

        if ($isAdmin) {
            $subject = "[Admin Copy] " . $subject;
        }

        // Build equipment details HTML
        $equipmentDetailsHtml = '';
        if (!empty($equipmentDetails)) {
            $equipmentDetailsHtml = "<div style='margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;'><strong>Equipment Details:</strong><br>";
            foreach ($equipmentDetails as $field => $value) {
                $fieldLabel = ucwords(str_replace('_', ' ', str_replace(['compressor_a_', 'compressor_b_', 'amalgam_', 'sterilizer_'], '', $field)));
                $displayValue = $value;
                if ($value instanceof \Carbon\Carbon || $value instanceof \DateTime) {
                    $displayValue = $value->format('F j, Y');
                }
                $equipmentDetailsHtml .= "<div class='info-row'><span class='label'>" . htmlspecialchars($fieldLabel) . ":</span> " . htmlspecialchars($displayValue) . "</div>";
            }
            $equipmentDetailsHtml .= "</div>";
        }

        $message = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: " . $headerColor . "; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
                .content { background-color: #f9f9f9; padding: 30px; border-radius: 0 0 8px 8px; }
                .info-box { background-color: white; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid " . $headerColor . "; }
                .info-row { margin-bottom: 10px; }
                .label { font-weight: bold; color: #555; }
                .highlight { color: " . $headerColor . "; font-weight: bold; }
                .button { display: inline-block; padding: 12px 30px; background-color: " . $headerColor . "; color: white !important; text-decoration: none; border-radius: 6px; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>" . $headerTitle . "</h2>
                </div>
                <div class='content'>
                    <p>Hello " . htmlspecialchars($recipient->name ?: 'Team Member') . ",</p>
                    <p>" . $messageIntro . "</p>
                    
                    <div class='info-box'>
                        <div class='info-row'><span class='label'>Client:</span> " . htmlspecialchars($clientName) . "</div>
                        <div class='info-row'><span class='label'>Address:</span> " . htmlspecialchars($clientAddress) . "</div>
                        <div class='info-row'><span class='label'>Equipment:</span> <span class='highlight'>" . htmlspecialchars($equipmentName) . "</span></div>
                        <div class='info-row'><span class='label'>Maintenance Date:</span> <span class='highlight'>" . $dateFormatted . "</span></div>
                        " . $equipmentDetailsHtml . "
                    </div>
                    
                    <p>" . ($type === 'upcoming' ? "Please prepare for the upcoming maintenance." : "Please schedule this maintenance as soon as possible to avoid further delays.") . "</p>
                    
                    <a href='" . url('/clients/' . $client->id) . "' class='button'>View Client Details</a>
                    
                    <p style='margin-top: 30px;'>Best regards,<br>GemDentalRepair System</p>
                </div>
            </div>
        </body>
        </html>";

        $this->sendMail($recipient->email, $subject, $message);
    }

    /**
     * Get human-readable frequency text
     */
    private function getFrequencyText($frequency)
    {
        $texts = [
            'day_before' => 'Tomorrow',
            'week_before' => 'In One Week',
            'month_before' => 'In One Month',
            'day_after' => 'Since Yesterday',
            'week_after' => 'Since One Week Ago',
            'month_after' => 'Since One Month Ago'
        ];

        return $texts[$frequency] ?? $frequency;
    }
}



