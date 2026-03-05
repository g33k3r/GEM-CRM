@extends('layout')
@section('content')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <div class="page-wrapper">

            <div class="page-content-tab p-0">
                <div class="container-fluid  p-0" style="height:100%">
                    <div class="top-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title text-white font-30 mb-2 mt-2">Settings</h4>
                                    <p class="text-white">Manage all your clinics and clients from one place.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;border:6px solid white;height:100%">
                        <div class="card-body" style="border-top-left-radius: 15px; border-top-right-radius: 15px;background-color: #F1F5F9">
                            <div class="row" style="height:100%">
                                <div class="col-lg-3 col-12">
                                    <div class="card" style="height:100%">
                                        <div class="card-body" style="height:100%">
                                            <p class="h4 fw-bold mt-0" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 8px;">General</p>
                                            <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link waves-effect waves-light active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                                                <a class="nav-link waves-effect waves-light" id="v-pills-notifications-tab" data-bs-toggle="pill" href="#v-pills-notifications" role="tab" aria-controls="v-pills-notifications" aria-selected="false">Notifications</a>
                                                <p class="h4 fw-bold mt-0" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 8px;padding-top:30px;text-align:left">Security</p>
                                                <a class="nav-link waves-effect waves-light pass" id="v-pills-password-tab2" data-bs-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="true">Password</a>
                                                <?php if(session()->get('adminAuth')[0]['type'] == 'admin'){ ?>
                                                    <p class="h4 fw-bold mt-0" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 8px;padding-top:30px;text-align:left">Advance</p>
                                                    <a class="nav-link waves-effect waves-light " id="v-pills-teamManage-tab3" data-bs-toggle="pill" href="#v-pills-teamManage" role="tab" aria-controls="v-pills-teamManage" aria-selected="false">Team Management</a>
                                                    <a class="nav-link waves-effect waves-light " id="v-pills-customFields-tab3" data-bs-toggle="pill" href="#v-pills-customFields" role="tab" aria-controls="v-pills-customFields" aria-selected="false">Custom Fields</a>
                                                    <a class="nav-link waves-effect waves-light " id="v-pills-otherItems-tab3" data-bs-toggle="pill" href="#v-pills-otherItems" role="tab" aria-controls="v-pills-otherItems" aria-selected="false">Other Items</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-12">
                                    <div class="card" style="height:100%">
                                        <div class="card-body" style="height:100%">
                                            <div class="tab-content mo-mt-2" id="v-pills-tabContent">
                                                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <p class="h4 fw-bold mt-0" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 8px;">Profile</p>
                                                    <form method="post" enctype="multipart/form-data" action="{{ url('/updateProfile') }}">
                                                        @csrf
                                                        <div class="row" style="margin-top:50px;border-bottom: 2px solid #F1F5F9;padding-bottom: 30px;">
                                                            <div class="col-md-4">
                                                                <div class="uploader">
                                                                    <input id="fileInput" type="file" accept="image/*" hidden name="img">
                                                                    <?php
                                                                    $image = asset('public/uploads') . '/defaultProfilePic.jpg';
                                                                    if (!empty(session()->get('adminAuth')[0]['img'])) {
                                                                        $image = asset('public/uploads') . "/" . session()->get('adminAuth')[0]['img'];
                                                                    }
                                                                    ?>
                                                                    <img id="preview" src="{{ $image }}" alt="Default Avatar">
                                                                    <button id="uploadBtn" type="button">Upload Image</button>
                                                                    <button id="removeBtn" type="button">Remove</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-2">
                                                                            <label for="" class="label">Name</label>
                                                                            <input type="text" class="form-control my-input" required placeholder="Jake Paul" name="name" value="{{ session()->get('adminAuth')[0]['name'] }}">
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <label for="" class="label">Email</label>
                                                                            <input type="text" required class="form-control my-input" placeholder="jake@gmail.com" name="email" value="{{ session()->get('adminAuth')[0]['email'] }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-2">
                                                                            <label for="" class="label">Role</label>
                                                                            <input type="text" class="form-control my-input" placeholder="{{ ucfirst(session()->get('adminAuth')[0]['type']) }}" readonly >
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <label for="" class="label">Contact</label>
                                                                            <input type="text" required class="form-control my-input" placeholder="+92 304 2328820" name="phone" value="{{ session()->get('adminAuth')[0]['contact'] }}" id="profilePhone">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3" style="text-align:right">
                                                            <button type="submit" class="btn btn-primary theme-clr">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                @php
                                                    $alertFollowUp = isset($alertSettings) && $alertSettings ? $alertSettings->follow_up : 'false';
                                                    $alertFollowUpFreq = isset($alertSettings) && $alertSettings && $alertSettings->follow_up_freq ? json_decode($alertSettings->follow_up_freq, true) : [];
                                                    $alertUpcomingMaintenance = isset($alertSettings) && $alertSettings ? $alertSettings->upcoming_maintenance : 'false';
                                                    $alertUpcomingMaintenanceFreq = isset($alertSettings) && $alertSettings && $alertSettings->upcoming_maintenance_freq ? json_decode($alertSettings->upcoming_maintenance_freq, true) : [];
                                                    $alertOverdueMaintenance = isset($alertSettings) && $alertSettings ? $alertSettings->overdue_maintenance : 'false';
                                                    $alertOverdueMaintenanceFreq = isset($alertSettings) && $alertSettings && $alertSettings->overdue_maintenance_freq ? json_decode($alertSettings->overdue_maintenance_freq, true) : [];
                                                @endphp
                                                <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel" aria-labelledby="v-pills-notifications-tab">
                                                    <p class="h4 fw-bold mt-0" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 8px;">Notifications</p>
                                                    <div class="row box mb-3">
                                                        <div class="col-md-6">
                                                            <div class="d-flex gap-2 align-items-center mt-3 mb-2">
                                                                <div>
                                                                    <h4 class="card-title fw-bold ">Follow-Up Reminders</h4>
                                                                </div>
                                                                <div>
                                                                    <div class="form-check form-switch form-switch-warning">
                                                                        <input class="form-check-input alert-toggle" type="checkbox" id="follow_up_toggle" data-setting="follow_up" {{ $alertFollowUp === 'true' ? 'checked' : '' }}>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <p style="color:#94A3B8" class="mb-0">
                                                                Receive reminders to follow up with clients before their scheduled visit or job day.
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-check box-check">
                                                                        <input class="form-check-input alert-freq-checkbox" type="checkbox" value="day_before" id="follow_up_day_before" data-setting="follow_up_freq" {{ is_array($alertFollowUpFreq) && in_array('day_before', $alertFollowUpFreq) ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="follow_up_day_before">
                                                                            Day Before
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check box-check">
                                                                        <input class="form-check-input alert-freq-checkbox" type="checkbox" value="week_before" id="follow_up_week_before" data-setting="follow_up_freq" {{ is_array($alertFollowUpFreq) && in_array('week_before', $alertFollowUpFreq) ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="follow_up_week_before">
                                                                            Week Before
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check box-check">
                                                                        <input class="form-check-input alert-freq-checkbox" type="checkbox" value="month_before" id="follow_up_month_before" data-setting="follow_up_freq" {{ is_array($alertFollowUpFreq) && in_array('month_before', $alertFollowUpFreq) ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="follow_up_month_before">
                                                                            Month Before
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row box mb-3">
                                                        <div class="col-md-6">
                                                            <div class="d-flex gap-2 align-items-center mt-3 mb-2">
                                                                <div>
                                                                    <h4 class="card-title fw-bold ">Upcoming Equipment Maintenance</h4>
                                                                </div>
                                                                <div>
                                                                    <div class="form-check form-switch form-switch-warning">
                                                                        <input class="form-check-input alert-toggle" type="checkbox" id="upcoming_maintenance_toggle" data-setting="upcoming_maintenance" {{ $alertUpcomingMaintenance === 'true' ? 'checked' : '' }}>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p style="color:#94A3B8" class="mb-0">
                                                                Receive notifications for upcoming maintenance of client equipment.
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-check box-check">
                                                                        <input class="form-check-input alert-freq-checkbox" type="checkbox" value="day_before" id="upcoming_maintenance_day_before" data-setting="upcoming_maintenance_freq" {{ is_array($alertUpcomingMaintenanceFreq) && in_array('day_before', $alertUpcomingMaintenanceFreq) ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="upcoming_maintenance_day_before">
                                                                            Day Before
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check box-check">
                                                                        <input class="form-check-input alert-freq-checkbox" type="checkbox" value="week_before" id="upcoming_maintenance_week_before" data-setting="upcoming_maintenance_freq" {{ is_array($alertUpcomingMaintenanceFreq) && in_array('week_before', $alertUpcomingMaintenanceFreq) ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="upcoming_maintenance_week_before">
                                                                            Week Before
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check box-check">
                                                                        <input class="form-check-input alert-freq-checkbox" type="checkbox" value="month_before" id="upcoming_maintenance_month_before" data-setting="upcoming_maintenance_freq" {{ is_array($alertUpcomingMaintenanceFreq) && in_array('month_before', $alertUpcomingMaintenanceFreq) ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="upcoming_maintenance_month_before">
                                                                            Month Before
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row box mb-3">
                                                        <div class="col-md-6">
                                                            <div class="d-flex gap-2 align-items-center mt-3 mb-2">
                                                                <div>
                                                                    <h4 class="card-title fw-bold ">Overdue Maintenance Alerts</h4>
                                                                </div>
                                                                <div>
                                                                    <div class="form-check form-switch form-switch-warning">
                                                                        <input class="form-check-input alert-toggle" type="checkbox" id="overdue_maintenance_toggle" data-setting="overdue_maintenance" {{ $alertOverdueMaintenance === 'true' ? 'checked' : '' }}>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <p style="color:#94A3B8" class="mb-0">
                                                                Be alerted when maintenance is overdue or missed.
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-check box-check">
                                                                        <input class="form-check-input alert-freq-checkbox" type="checkbox" value="day_after" id="overdue_maintenance_day_after" data-setting="overdue_maintenance_freq" {{ is_array($alertOverdueMaintenanceFreq) && in_array('day_after', $alertOverdueMaintenanceFreq) ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="overdue_maintenance_day_after">
                                                                            Day After
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check box-check">
                                                                        <input class="form-check-input alert-freq-checkbox" type="checkbox" value="week_after" id="overdue_maintenance_week_after" data-setting="overdue_maintenance_freq" {{ is_array($alertOverdueMaintenanceFreq) && in_array('week_after', $alertOverdueMaintenanceFreq) ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="overdue_maintenance_week_after">
                                                                            Week After
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check box-check">
                                                                        <input class="form-check-input alert-freq-checkbox" type="checkbox" value="month_after" id="overdue_maintenance_month_after" data-setting="overdue_maintenance_freq" {{ is_array($alertOverdueMaintenanceFreq) && in_array('month_after', $alertOverdueMaintenanceFreq) ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="overdue_maintenance_month_after">
                                                                            Month After
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab2">
                                                    <p class="h4 fw-bold mt-0" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 8px;">Password</p>
                                                    <form action="{{ url('/updatePassword') }}" method="post" id="passwordUpdateForm">
                                                        @csrf
                                                        <div class="row" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 30px;">
                                                            <div class="col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="" class="label">Current Password</label>
                                                                    <input type="password" class="form-control my-input" placeholder="******" name="current_password" id="current_password" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="" class="label">New Password</label>
                                                                    <input type="password" class="form-control my-input" placeholder="******" name="new_password" id="new_password" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="" class="label">Confirm Password</label>
                                                                    <input type="password" class="form-control my-input" placeholder="******" name="confirm_password" id="confirm_password" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3" style="text-align:right">
                                                            <button type="submit" class="btn btn-primary theme-clr" id="updatePasswordBtn">Update Password</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <?php if(session()->get('adminAuth')[0]['type'] == 'admin'){ ?>
                                                <div class="tab-pane fade" id="v-pills-teamManage" role="tabpanel" aria-labelledby="v-pills-profile-tab3">
                                                    <p class="h4 fw-bold mt-0" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 8px;">Team Management</p>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-6 col-12">
                                                                    <h4 class="card-title fw-bold mt-3 mb-1">All Members</h4>
                                                                    <p style="color:#94A3B8" class="mb-0">
                                                                        Manage your team, roles, and access in one place.
                                                                    </p>
                                                                </div>

                                                                <div class="col-md-6 col-12 ">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-3  text-end">
                                                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMemberModal">Add Member</button>
                                                                        </div>
                                                                        <div class="col-md-4 col-12 my-see-all-btn" style="border-right: 1px solid #F1F5F9">
                                                                            <select name="" id="roleFilterSelect" class="form-select see-all-btn">
                                                                                <option value="all">All Members</option>
                                                                                <option value="admin">Admin</option>
                                                                                <option value="worker">Worker</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-5 col-12 ">
                                                                            <div class="relative">
                                                                                <input id="team-search" type="search" class="form-control custom-search" placeholder="Search..">
                                                                                <i class="ti ti-search my-icon"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table" id="teamTable">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th>Added on</th>
                                                                            <th>Member Name</th>
                                                                            <th>Contact</th>
                                                                            <th>Role</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php foreach ($team as $v) { ?>
                                                                        <tr data-member-id="{{ $v['id'] }}" data-member-role="{{ strtolower($v['type']) }}">
                                                                            <td>
                                                                                <span class="tble-clr">{{ date("d M Y", strtotime($v['created_at'])) }}</span>
                                                                                <p class="mb-0 tble-time">{{ date("h:i a", strtotime($v['created_at'])) }}</p>
                                                                            </td>
                                                                            <td>
                                                                                <div class="d-flex align-items-center justify-content-between">
                                                                                    <div>
                                                                                        <span class="tble-clr">{{ $v['name'] }}</span>
                                                                                        <p class="mb-0 tble-time">{{ $v['email'] }}</p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <a href="#">
                                                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                <path d="M10.6667 8.59992V11.3999C10.6667 13.7333 9.73334 14.6666 7.40001 14.6666H4.60001C2.26668 14.6666 1.33334 13.7333 1.33334 11.3999V8.59992C1.33334 6.26659 2.26668 5.33325 4.60001 5.33325H7.40001C9.73334 5.33325 10.6667 6.26659 10.6667 8.59992Z" stroke="#CAD5E2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                                <path d="M14.6667 4.59992V7.39992C14.6667 9.73325 13.7333 10.6666 11.4 10.6666H10.6667V8.59992C10.6667 6.26659 9.73334 5.33325 7.40001 5.33325H5.33334V4.59992C5.33334 2.26659 6.26668 1.33325 8.60001 1.33325H11.4C13.7333 1.33325 14.6667 2.26659 14.6667 4.59992Z" stroke="#CAD5E2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                            </svg>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="tble-clr">{{ $v['contact'] }}</span>
                                                                            </td>
                                                                            <td><span class="tble-clr">{{ ucfirst($v['type']) }}</span></td>
                                                                            <td>
                                                                                <span class="{{ ($v['status'] == 'active') ? "active" : (($v['status'] == 'deactive') ? "deactive" : "deactive") }}-status">
                                                                                    {{ ucwords($v['status']) }}
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="#" type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M7.99996 8.66659C8.36815 8.66659 8.66663 8.36811 8.66663 7.99992C8.66663 7.63173 8.36815 7.33325 7.99996 7.33325C7.63177 7.33325 7.33329 7.63173 7.33329 7.99992C7.33329 8.36811 7.63177 8.66659 7.99996 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                        <path d="M12.6666 8.66659C13.0348 8.66659 13.3333 8.36811 13.3333 7.99992C13.3333 7.63173 13.0348 7.33325 12.6666 7.33325C12.2984 7.33325 12 7.63173 12 7.99992C12 8.36811 12.2984 8.66659 12.6666 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                        <path d="M3.33329 8.66659C3.70148 8.66659 3.99996 8.36811 3.99996 7.99992C3.99996 7.63173 3.70148 7.33325 3.33329 7.33325C2.9651 7.33325 2.66663 7.63173 2.66663 7.99992C2.66663 8.36811 2.9651 8.66659 3.33329 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                    </svg>
                                                                                </a>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item edit-member-btn" href="#" data-member-id="{{ $v['id'] }}" data-member-name="{{ $v['name'] }}" data-member-email="{{ $v['email'] }}" data-member-contact="{{ $v['contact'] }}" data-member-type="{{ $v['type'] }}" data-member-status="{{ $v['status'] }}">
                                                                                        <i class="ti ti-pencil" style="margin-right:5px"></i>
                                                                                        Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item toggle-status-btn" href="#" data-member-id="{{ $v['id'] }}" data-member-name="{{ $v['name'] }}" data-member-status="{{ $v['status'] }}">
                                                                                        <i class="ti ti-toggle-{{ ($v['status'] == 'active') ? 'left' : 'right' }}" style="margin-right:5px"></i>
                                                                                        {{ ($v['status'] == 'active') ? 'Deactivate' : (($v['status'] == 'deactive') ? 'Activate' : 'Activate') }}
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!--end card-body-->
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-customFields" role="tabpanel" aria-labelledby="v-pills-customFields-tab3">
                                                    <p class="h4 fw-bold mt-0" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 8px;">Custom Fields</p>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-6 col-12">
                                                                    <h4 class="card-title fw-bold mt-3 mb-1">All Fields</h4>
                                                                    <p style="color:#94A3B8" class="mb-0">
                                                                        Create and manage your custom fields here
                                                                    </p>
                                                                </div>

                                                                <div class="col-md-6 col-12 ">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-3  text-end">
                                                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomFieldModal">Add New</button>
                                                                        </div>
                                                                        <div class="col-md-4 col-12 my-see-all-btn" style="border-right: 1px solid #F1F5F9">
                                                                            <select name="" id="customFieldTypeFilter" class="form-select see-all-btn">
                                                                                <option value="all">All Fields</option>
                                                                                <option value="Free Text">Free Text</option>
                                                                                <option value="date">Date</option>
                                                                                <option value="boolean">Boolean</option>
                                                                                <option value="select">Select</option>
                                                                                <option value="multi select">Multi Select</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-5 col-12 ">
                                                                            <div class="relative">
                                                                                <input id="customFieldSearch" type="search" class="form-control custom-search" placeholder="Search..">
                                                                                <i class="ti ti-search my-icon"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table" id="customFieldsTable">
                                                                    <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Added on</th>
                                                                        <th>Label</th>
                                                                        <th>Type</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php foreach ($customFields as $v) { ?>
                                                                    <tr data-field-id="{{ $v['id'] }}" data-field-type="{{ $v['type'] }}">
                                                                        <td>
                                                                            <span class="tble-clr">{{ date("d M Y", strtotime($v['created_at'])) }}</span>
                                                                            <p class="mb-0 tble-time">{{ date("h:i a", strtotime($v['created_at'])) }}</p>
                                                                        </td>
                                                                        <td>
                                                                            {{ $v['name'] }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $v['type'] }}
                                                                        </td>

                                                                        <td>
                                                                                <span class="{{ ($v['status'] == 'visible') ? "active" : "deactive" }}-status">
                                                                                    {{ ucwords($v['status']) }}
                                                                                </span>
                                                                        </td>
                                                                        <td>
                                                                            <a href="#" type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M7.99996 8.66659C8.36815 8.66659 8.66663 8.36811 8.66663 7.99992C8.66663 7.63173 8.36815 7.33325 7.99996 7.33325C7.63177 7.33325 7.33329 7.63173 7.33329 7.99992C7.33329 8.36811 7.63177 8.66659 7.99996 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                    <path d="M12.6666 8.66659C13.0348 8.66659 13.3333 8.36811 13.3333 7.99992C13.3333 7.63173 13.0348 7.33325 12.6666 7.33325C12.2984 7.33325 12 7.63173 12 7.99992C12 8.36811 12.2984 8.66659 12.6666 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                    <path d="M3.33329 8.66659C3.70148 8.66659 3.99996 8.36811 3.99996 7.99992C3.99996 7.63173 3.70148 7.33325 3.33329 7.33325C2.9651 7.33325 2.66663 7.63173 2.66663 7.99992C2.66663 8.36811 2.9651 8.66659 3.33329 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                </svg>
                                                                            </a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item edit-custom-field-btn" href="#" data-field-id="{{ $v['id'] }}" data-field-name="{{ $v['name'] }}" data-field-type="{{ $v['type'] }}" data-field-status="{{ $v['status'] }}" data-field-values="{{ $v['values'] }}">
                                                                                    <i class="ti ti-pencil" style="margin-right:5px"></i>
                                                                                    Edit
                                                                                </a>
                                                                                <a class="dropdown-item delete-custom-field-btn" href="#" data-field-id="{{ $v['id'] }}" data-field-name="{{ $v['name'] }}">
                                                                                    <i class="ti ti-trash" style="margin-right:5px"></i>
                                                                                    Delete
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-otherItems" role="tabpanel" aria-labelledby="v-pills-otherItems-tab3">
                                                    <p class="h4 fw-bold mt-0" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 8px;">Other Items</p>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-8 col-12">
                                                                    <h4 class="card-title fw-bold mt-3 mb-1">All Items</h4>
                                                                    <p style="color:#94A3B8" class="mb-0">
                                                                        Create and manage your custom fields here
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4 col-12 ">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-3  text-end">
                                                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOtherItemModal">Add New</button>
                                                                        </div>
                                                                        <div class="col-md-9 col-12">
                                                                            <div class="relative">
                                                                                <input id="otherItemsSearch" type="search" class="form-control custom-search" placeholder="Search.." />
                                                                                <i class="ti ti-search my-icon"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table" id="otherItemsTable">
                                                                    <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Added on</th>
                                                                        <th>Name</th>
                                                                        <th>Items</th>
                                                                        <th>Usage</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php if (isset($otherItems) && !empty($otherItems)) { ?>
                                                                    <?php    foreach ($otherItems as $item) { ?>
                                                                    <tr data-item-id="{{ $item['id'] }}">
                                                                        <td>
                                                                            <span class="tble-clr">{{ date("d M Y", strtotime($item['created_at'])) }}</span>
                                                                            <p class="mb-0 tble-time">{{ date("h:i a", strtotime($item['created_at'])) }}</p>
                                                                        </td>
                                                                        <td>
                                                                            {{ $item['name'] }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $item['custom_field_names_display'] }}
                                                                        </td>
                                                                        <td>
                                                                            <span class="active-status">{{ $item['useage'] }}</span>
                                                                        </td>
                                                                        <td>
                                                                            <a href="#" type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M7.99996 8.66659C8.36815 8.66659 8.66663 8.36811 8.66663 7.99992C8.66663 7.63173 8.36815 7.33325 7.99996 7.33325C7.63177 7.33325 7.33329 7.63173 7.33329 7.99992C7.33329 8.36811 7.63177 8.66659 7.99996 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                    <path d="M12.6666 8.66659C13.0348 8.66659 13.3333 8.36811 13.3333 7.99992C13.3333 7.63173 13.0348 7.33325 12.6666 7.33325C12.2984 7.33325 12 7.63173 12 7.99992C12 8.36811 12.2984 8.66659 12.6666 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                    <path d="M3.33329 8.66659C3.70148 8.66659 3.99996 8.36811 3.99996 7.99992C3.99996 7.63173 3.70148 7.33325 3.33329 7.33325C2.9651 7.33325 2.66663 7.63173 2.66663 7.99992C2.66663 8.36811 2.9651 8.66659 3.33329 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                </svg>
                                                                            </a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item edit-other-item-btn" href="#" data-item-id="{{ $item['id'] }}" data-item-name="{{ $item['name'] }}" data-item-fields="{{ $item['fields'] }}">
                                                                                    <i class="ti ti-pencil" style="margin-right:5px"></i>
                                                                                    Edit
                                                                                </a>
                                                                                <a class="dropdown-item delete-other-item-btn" href="#" data-item-id="{{ $item['id'] }}" data-item-name="{{ $item['name'] }}" data-item-usage="{{ $item['useage'] }}">
                                                                                    <i class="ti ti-trash" style="margin-right:5px"></i>
                                                                                    Delete
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php    } ?>
                                                                    <?php } else { ?>
                                                                    <tr>
                                                                        <td colspan="5" class="text-center">No items found</td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Member Modal -->
    <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="addMemberModalLabel">Add Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addMemberForm" method="POST" action="{{ url('/addMember') }}">
                    @csrf
                    <div class="modal-body">
                        <p class="mb-4">Send an invitation to add new members and assign their roles.</p>
                        <div class="mb-3">
                            <label for="memberEmail" class="form-label fw-bold">Email Address</label>
                            <input type="email" class="form-control" id="memberEmail" name="email" placeholder="member@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="memberRole" class="form-label fw-bold">Role</label>
                            <select class="form-select" id="memberRole" name="type" required>
                                <option value="worker" selected>Worker</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary theme-clr">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Member Modal -->
    <div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="editMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editMemberModalLabel">Edit Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editMemberForm" method="POST" action="{{ url('/updateMember') }}">
                    @csrf
                    <input type="hidden" name="member_id" id="editMemberId">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editMemberName" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="editMemberName" name="name" placeholder="Member Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editMemberEmail" class="form-label fw-bold">Email Address</label>
                            <input type="email" class="form-control" id="editMemberEmail" name="email" placeholder="member@email.com" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editMemberContact" class="form-label fw-bold">Contact</label>
                            <input type="text" class="form-control" id="editMemberContact" name="contact" placeholder="+1 (000) 000-0000">
                        </div>
                        <div class="mb-3">
                            <label for="editMemberRole" class="form-label fw-bold">Role</label>
                            <select class="form-select" id="editMemberRole" name="type" required>
                                <option value="worker">Worker</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editMemberStatus" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="editMemberStatus" name="status" required>
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                                <option value="invited">Invited</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary theme-clr">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Status Toggle Confirmation Modal -->
    <div class="modal fade" id="statusConfirmationModal" tabindex="-1" aria-labelledby="statusConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="statusConfirmationModalLabel">Confirm Status Change</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="statusConfirmationForm" method="POST" action="{{ url('/toggleMemberStatus') }}">
                    @csrf
                    <input type="hidden" name="member_id" id="statusMemberId">
                    <div class="modal-body">
                        <p id="statusConfirmationMessage">Are you sure you want to change the status of this member?</p>
                    </div>
                    <div class="modal-footer" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary theme-clr" id="confirmStatusBtn">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Custom Field Modal -->
    <div class="modal fade" id="addCustomFieldModal" tabindex="-1" aria-labelledby="addCustomFieldModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="addCustomFieldModalLabel">Add Custom Field</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCustomFieldForm" method="POST" action="{{  url('/addCustomField') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="fieldType" class="form-label fw-bold">Field Type</label>
                            <select class="form-select" id="fieldType" name="field_type" required>
                                <option value="" style="display: none;">Select Field Type</option>
                                <option value="Free Text">Free Text</option>
                                <option value="select">Select</option>
                                <option value="multi select">Multi Select</option>
                                <option value="date">Date</option>
                                <option value="boolean">Boolean</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fieldLabel" class="form-label fw-bold">Field Label</label>
                            <input type="text" class="form-control" id="fieldLabel" name="field_label" placeholder="Enter field label" required>
                        </div>
                        <div class="mb-3">
                            <label for="fieldStatus" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="fieldStatus" name="status" required>
                                <option value="visible">Visible</option>
                                <option value="hidden">Hidden</option>
                            </select>
                        </div>
                        <div class="mb-3" id="optionsContainer" style="display: none;">
                            <label class="form-label fw-bold">Options</label>
                            <div id="optionsList">
                                <div class="option-item mb-2 d-flex align-items-center gap-2">
                                    <input type="text" class="form-control option-input" placeholder="Enter option value"  name="options[]">
                                    <a href="#" class="btn btn-danger btn-sm remove-option" style="display: none; text-decoration: none;">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="#" id="addMoreOption" class="text-primary" style="text-decoration: none;">
                                <i class="ti ti-plus"></i> Add More
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary theme-clr">Add Field</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Custom Field Modal -->
    <div class="modal fade" id="editCustomFieldModal" tabindex="-1" aria-labelledby="editCustomFieldModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editCustomFieldModalLabel">Edit Custom Field</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editCustomFieldForm" method="POST" action="{{ url('/updateCustomField') }}">
                    @csrf
                    <input type="hidden" name="field_id" id="editFieldId">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editFieldType" class="form-label fw-bold">Field Type</label>
                            <select class="form-select" id="editFieldType" name="field_type" required disabled style="background-color: #e9ecef; cursor: not-allowed;">
                                <option value="" style="display: none;">Select Field Type</option>
                                <option value="Free Text">Free Text</option>
                                <option value="select">Select</option>
                                <option value="multi select">Multi Select</option>
                                <option value="date">Date</option>
                                <option value="boolean">Boolean</option>
                            </select>
                            <small class="form-text text-muted">Field type cannot be changed once created.</small>
                            <input type="hidden" id="editFieldTypeHidden" name="field_type">
                        </div>
                        <div class="mb-3">
                            <label for="editFieldLabel" class="form-label fw-bold">Field Label</label>
                            <input type="text" class="form-control" id="editFieldLabel" name="field_label" placeholder="Enter field label" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFieldStatus" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="editFieldStatus" name="status" required>
                                <option value="visible">Visible</option>
                                <option value="hidden">Hidden</option>
                            </select>
                        </div>
                        <div class="mb-3" id="editOptionsContainer" style="display: none;">
                            <label class="form-label fw-bold">Options</label>
                            <div id="editOptionsList">
                                <div class="option-item mb-2 d-flex align-items-center gap-2">
                                    <input type="text" class="form-control option-input" placeholder="Enter option value" name="options[]">
                                    <a href="#" class="btn btn-danger btn-sm remove-option" style="display: none; text-decoration: none;">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="#" id="editAddMoreOption" class="text-primary" style="text-decoration: none;">
                                <i class="ti ti-plus"></i> Add More
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary theme-clr">Update Field</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Custom Field Confirmation Modal -->
    <div class="modal fade" id="deleteCustomFieldModal" tabindex="-1" aria-labelledby="deleteCustomFieldModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteCustomFieldModalLabel">Delete Custom Field</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteCustomFieldForm" method="POST" action="{{ url('/deleteCustomField') }}">
                    @csrf
                    <input type="hidden" name="field_id" id="deleteFieldId">
                    <div class="modal-body">
                        <p id="deleteConfirmationMessage">Are you sure you want to delete this custom field?</p>
                    </div>
                    <div class="modal-footer" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Other Item Modal -->
    <div class="modal fade" id="addOtherItemModal" tabindex="-1" aria-labelledby="addOtherItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="addOtherItemModalLabel">Add Other Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addOtherItemForm" method="POST" action="{{ url('/addOtherItems') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="itemName" class="form-label fw-bold">Item Name</label>
                            <input type="text" class="form-control" id="itemName" name="item_name" placeholder="Enter item name" required>
                        </div>
                        <div class="mb-3">
                            <label for="customFieldsSelect" class="form-label fw-bold">Custom Fields</label>
                            <select class="form-select selectpicker" id="customFieldsSelect" name="custom_fields[]" multiple data-live-search="true" title="Select custom fields" required>
                                @foreach($customFields as $v)
                                    <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary theme-clr">Add Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Other Item Modal -->
    <div class="modal fade" id="editOtherItemModal" tabindex="-1" aria-labelledby="editOtherItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editOtherItemModalLabel">Edit Other Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editOtherItemForm" method="POST" action="{{ url('/updateOtherItems') }}">
                    @csrf
                    <input type="hidden" name="item_id" id="editItemId">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editItemName" class="form-label fw-bold">Item Name</label>
                            <input type="text" class="form-control" id="editItemName" name="item_name" placeholder="Enter item name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCustomFieldsSelect" class="form-label fw-bold">Custom Fields</label>
                            <select class="form-select selectpicker" id="editCustomFieldsSelect" name="custom_fields[]" multiple data-live-search="true" title="Select custom fields" required>
                                @foreach($customFields as $v)
                                    <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary theme-clr">Update Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Other Item Confirmation Modal -->
    <div class="modal fade" id="deleteOtherItemModal" tabindex="-1" aria-labelledby="deleteOtherItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteOtherItemModalLabel">Delete Other Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteOtherItemForm" method="POST" action="{{ url('/deleteOtherItems') }}">
                    @csrf
                    <input type="hidden" name="item_id" id="deleteItemId">
                    <div class="modal-body">
                        <p id="deleteOtherItemConfirmationMessage">Are you sure you want to delete this other item?</p>
                    </div>
                    <div class="modal-footer" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/7.6.1/imask.min.js" integrity="sha512-+3RJc0aLDkj0plGNnrqlTwCCyMmDCV1fSYqXw4m+OczX09Pas5A/U+V3pFwrSyoC1svzDy40Q9RU/85yb/7D2A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    <?php
    if (session('tab') AND !empty(session('tab'))) {
        $tabId = session('tab');

        // Switch to the appropriate tab
        echo "document.addEventListener('DOMContentLoaded', function() {";
        echo "    const tabElement = document.getElementById('{$tabId}');";
        echo "    if(tabElement) {";
        echo "        const tab = new bootstrap.Tab(tabElement);";
        echo "        tab.show();";
        echo "    }";
        echo "});";

        // Show success/error messages
        if (session('type') == 'success') { ?>
                Swal.fire({
                    title: "Success!",
                    icon: "success",
                    text:"{{ session('message') }}"
                });
            <?php
        } elseif (session('type') == 'error') { ?>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text:"{{ session('message') }}"
            });
                <?php
        }
    }
        ?>
    </script>

    <script>
        //#profilePhone
        const element = document.getElementById('profilePhone');
        const maskOptions = {
            mask: '+{1} (000) 000-0000'
        };
        const mask = IMask(element, maskOptions);
    </script>

    <script>
        // Password validation
        document.addEventListener('DOMContentLoaded', function() {
            const newPasswordInput = document.getElementById('new_password');
            const confirmPasswordInput = document.getElementById('confirm_password');
            const updatePasswordBtn = document.getElementById('updatePasswordBtn');
            const passwordForm = document.getElementById('passwordUpdateForm');

            function validatePasswords() {
                const newPassword = newPasswordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                // Only validate if both fields have values
                if (newPassword && confirmPassword) {
                    if (newPassword !== confirmPassword) {
                        // Passwords don't match
                        updatePasswordBtn.disabled = true;
                        updatePasswordBtn.textContent = 'Password Mismatch';
                        updatePasswordBtn.classList.remove('btn-primary');
                        updatePasswordBtn.classList.add('btn-secondary');
                        return false;
                    } else {
                        // Passwords match
                        updatePasswordBtn.disabled = false;
                        updatePasswordBtn.textContent = 'Update Password';
                        updatePasswordBtn.classList.remove('btn-secondary');
                        updatePasswordBtn.classList.add('btn-primary');
                        return true;
                    }
                } else {
                    // One or both fields are empty - keep button enabled but with normal text
                    updatePasswordBtn.disabled = false;
                    updatePasswordBtn.textContent = 'Update Password';
                    updatePasswordBtn.classList.remove('btn-secondary');
                    updatePasswordBtn.classList.add('btn-primary');
                    return false;
                }
            }

            // Validate on input
            newPasswordInput.addEventListener('input', validatePasswords);
            confirmPasswordInput.addEventListener('input', validatePasswords);

            // Prevent form submission if passwords don't match
            passwordForm.addEventListener('submit', function(e) {
                if (!validatePasswords()) {
                    e.preventDefault();
                    return false;
                }
            });

            // Initial validation
            validatePasswords();
        });
    </script>

    <script>
        // Custom Field Modal - Options Management
        document.addEventListener('DOMContentLoaded', function() {
            const fieldTypeSelect = document.getElementById('fieldType');
            const optionsContainer = document.getElementById('optionsContainer');
            const optionsList = document.getElementById('optionsList');
            const addMoreOptionLink = document.getElementById('addMoreOption');
            const addCustomFieldModal = document.getElementById('addCustomFieldModal');

            // Show/hide options container based on field type
            fieldTypeSelect.addEventListener('change', function() {
                const selectedValue = this.value;
                if (selectedValue === 'select' || selectedValue === 'multi select') {
                    optionsContainer.style.display = 'block';
                    updateDeleteButtons();
                } else {
                    optionsContainer.style.display = 'none';
                }
            });

            // Add more options
            addMoreOptionLink.addEventListener('click', function(e) {
                e.preventDefault();
                addOptionField();
            });

            // Add option field function
            function addOptionField() {
                const optionItem = document.createElement('div');
                optionItem.className = 'option-item mb-2 d-flex align-items-center gap-2';
                optionItem.innerHTML = `
                    <input type="text" class="form-control option-input" required placeholder="Enter option value" name="options[]">
                    <a href="#" class="btn btn-danger btn-sm remove-option" style="text-decoration: none;">
                        <i class="ti ti-trash"></i>
                    </a>
                `;
                optionsList.appendChild(optionItem);
                updateDeleteButtons();
            }

            // Remove option field
            optionsList.addEventListener('click', function(e) {
                if (e.target.closest('.remove-option')) {
                    e.preventDefault();
                    e.stopPropagation();
                    const optionItem = e.target.closest('.option-item');
                    optionItem.remove();
                    updateDeleteButtons();
                }
            });

            // Update delete buttons visibility
            function updateDeleteButtons() {
                const optionItems = optionsList.querySelectorAll('.option-item');
                optionItems.forEach((item, index) => {
                    const deleteBtn = item.querySelector('.remove-option');
                    if (optionItems.length > 1) {
                        deleteBtn.style.display = 'block';
                    } else {
                        deleteBtn.style.display = 'none';
                    }
                });
            }

            // Reset modal when closed
            addCustomFieldModal.addEventListener('hidden.bs.modal', function() {
                document.getElementById('addCustomFieldForm').reset();
                optionsContainer.style.display = 'none';
                optionsList.innerHTML = `
                    <div class="option-item mb-2 d-flex align-items-center gap-2">
                        <input type="text" class="form-control option-input" required placeholder="Enter option value" name="options[]">
                        <a href="#" class="btn btn-danger btn-sm remove-option" style="display: none; text-decoration: none;">
                            <i class="ti ti-trash"></i>
                        </a>
                    </div>
                `;
            });
        });
    </script>

    <script>
        // Initialize bootstrap-select for Other Item Modals
        $(document).ready(function() {
            const addOtherItemModal = document.getElementById('addOtherItemModal');
            const editOtherItemModal = document.getElementById('editOtherItemModal');
            const customFieldsSelect = $('#customFieldsSelect');
            const editCustomFieldsSelect = $('#editCustomFieldsSelect');

            // Initialize bootstrap-select on page load
            if (customFieldsSelect.length) {
                customFieldsSelect.selectpicker();
            }
            if (editCustomFieldsSelect.length) {
                editCustomFieldsSelect.selectpicker();
            }

            // Refresh selectpicker when add modal is shown (to ensure proper rendering)
            if (addOtherItemModal) {
                addOtherItemModal.addEventListener('shown.bs.modal', function() {
                    if (customFieldsSelect.length) {
                        customFieldsSelect.selectpicker('refresh');
                    }
                });

                // Reset selectpicker when add modal is hidden
                addOtherItemModal.addEventListener('hidden.bs.modal', function() {
                    if (customFieldsSelect.length) {
                        customFieldsSelect.selectpicker('deselectAll');
                        document.getElementById('addOtherItemForm').reset();
                    }
                });
            }

            // Reset selectpicker when edit modal is hidden
            if (editOtherItemModal) {
                editOtherItemModal.addEventListener('hidden.bs.modal', function() {
                    if (editCustomFieldsSelect.length) {
                        editCustomFieldsSelect.selectpicker('deselectAll');
                        document.getElementById('editOtherItemForm').reset();
                    }
                });
            }
        });
    </script>

    <script>
        // Team Management Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Edit Member Functionality
            const editMemberBtns = document.querySelectorAll('.edit-member-btn');
            const editMemberModal = new bootstrap.Modal(document.getElementById('editMemberModal'));

            editMemberBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const memberId = this.getAttribute('data-member-id');
                    const memberName = this.getAttribute('data-member-name');
                    const memberEmail = this.getAttribute('data-member-email');
                    const memberContact = this.getAttribute('data-member-contact');
                    const memberType = this.getAttribute('data-member-type');
                    const memberStatus = this.getAttribute('data-member-status');

                    // Populate edit modal fields
                    document.getElementById('editMemberId').value = memberId;
                    document.getElementById('editMemberName').value = memberName || '';
                    document.getElementById('editMemberEmail').value = memberEmail || '';
                    document.getElementById('editMemberContact').value = memberContact || '';
                    document.getElementById('editMemberRole').value = memberType || 'worker';
                    document.getElementById('editMemberStatus').value = memberStatus || 'active';

                    // Show edit modal
                    editMemberModal.show();
                });
            });

            // Status Toggle Confirmation
            const toggleStatusBtns = document.querySelectorAll('.toggle-status-btn');
            const statusConfirmationModal = new bootstrap.Modal(document.getElementById('statusConfirmationModal'));

            toggleStatusBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const memberId = this.getAttribute('data-member-id');
                    const memberName = this.getAttribute('data-member-name');
                    const currentStatus = this.getAttribute('data-member-status');
                    const newStatus = currentStatus === 'active' ? 'deactive' : 'active';
                    const actionText = currentStatus === 'active' ? 'deactivate' : 'activate';

                    // Populate confirmation modal
                    document.getElementById('statusMemberId').value = memberId;
                    document.getElementById('statusConfirmationMessage').textContent =
                        `Are you sure you want to ${actionText} ${memberName || 'this member'}?`;
                    document.getElementById('confirmStatusBtn').textContent =
                        currentStatus === 'active' ? 'Deactivate' : 'Activate';

                    // Show confirmation modal
                    statusConfirmationModal.show();
                });
            });


            // Also handle the search functionality to work with role filter
            const teamSearchInput = document.getElementById('team-search');
            if (teamSearchInput) {
                teamSearchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const selectedRole = roleFilterSelect ? roleFilterSelect.value : 'all';
                    const tableRows = document.querySelectorAll('#teamTable tbody tr[data-member-id]');

                    tableRows.forEach(row => {
                        const rowRole = row.getAttribute('data-member-role');
                        const rowText = row.textContent.toLowerCase();

                        // Check role filter first
                        let roleMatch = (selectedRole === 'all' || rowRole === selectedRole);

                        // Then check search term
                        let searchMatch = searchTerm === '' || rowText.includes(searchTerm);

                        // Show row only if both conditions are met
                        if (roleMatch && searchMatch) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }

            // Update role filter to also work with search
            if (roleFilterSelect) {
                roleFilterSelect.addEventListener('change', function() {
                    const selectedRole = this.value;
                    const searchTerm = teamSearchInput ? teamSearchInput.value.toLowerCase() : '';
                    const tableRows = document.querySelectorAll('#teamTable tbody tr[data-member-id]');

                    tableRows.forEach(row => {
                        const rowRole = row.getAttribute('data-member-role');
                        const rowText = row.textContent.toLowerCase();

                        // Check role filter
                        let roleMatch = (selectedRole === 'all' || rowRole === selectedRole);

                        // Check search term
                        let searchMatch = searchTerm === '' || rowText.includes(searchTerm);

                        // Show row only if both conditions are met
                        if (roleMatch && searchMatch) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>

    <script>
        // Custom Fields Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Edit Custom Field Functionality
            const editCustomFieldBtns = document.querySelectorAll('.edit-custom-field-btn');
            const editCustomFieldModal = new bootstrap.Modal(document.getElementById('editCustomFieldModal'));

            editCustomFieldBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const fieldId = this.getAttribute('data-field-id');
                    const fieldName = this.getAttribute('data-field-name');
                    const fieldType = this.getAttribute('data-field-type');
                    const fieldStatus = this.getAttribute('data-field-status');
                    const fieldValues = this.getAttribute('data-field-values');

                    // Populate edit modal fields
                    document.getElementById('editFieldId').value = fieldId;
                    document.getElementById('editFieldLabel').value = fieldName || '';
                    document.getElementById('editFieldType').value = fieldType || '';
                    document.getElementById('editFieldTypeHidden').value = fieldType || ''; // Hidden field for form submission
                    document.getElementById('editFieldStatus').value = fieldStatus || 'visible';

                    // Handle options for select/multi select types
                    const editOptionsContainer = document.getElementById('editOptionsContainer');
                    const editOptionsList = document.getElementById('editOptionsList');

                    if (fieldType === 'select' || fieldType === 'multi select') {
                        editOptionsContainer.style.display = 'block';

                        // Parse and populate options
                        let options = [];
                        if (fieldValues) {
                            try {
                                options = JSON.parse(fieldValues);
                            } catch (e) {
                                options = [];
                            }
                        }

                        // Clear existing options
                        editOptionsList.innerHTML = '';

                        // Add options
                        if (options.length > 0) {
                            options.forEach((option, index) => {
                                const optionItem = document.createElement('div');
                                optionItem.className = 'option-item mb-2 d-flex align-items-center gap-2';
                                // Escape HTML and quotes properly
                                const escapedOption = String(option).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#39;');
                                optionItem.innerHTML = `
                                    <input type="text" class="form-control option-input" required placeholder="Enter option value" name="options[]" value="${escapedOption}">
                                    <a href="#" class="btn btn-danger btn-sm remove-option" style="text-decoration: none;">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                `;
                                editOptionsList.appendChild(optionItem);
                            });
                        } else {
                            // Add at least one empty option
                            const optionItem = document.createElement('div');
                            optionItem.className = 'option-item mb-2 d-flex align-items-center gap-2';
                            optionItem.innerHTML = `
                                <input type="text" class="form-control option-input" required placeholder="Enter option value" name="options[]">
                                <a href="#" class="btn btn-danger btn-sm remove-option" style="display: none; text-decoration: none;">
                                    <i class="ti ti-trash"></i>
                                </a>
                            `;
                            editOptionsList.appendChild(optionItem);
                        }

                        updateEditDeleteButtons();
                    } else {
                        editOptionsContainer.style.display = 'none';
                    }

                    // Show edit modal
                    editCustomFieldModal.show();
                });
            });

            // Field type is disabled in edit mode, so no change handler needed

            // Add more options for edit modal
            const editAddMoreOptionLink = document.getElementById('editAddMoreOption');
            if (editAddMoreOptionLink) {
                editAddMoreOptionLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    addEditOptionField();
                });
            }

            function addEditOptionField() {
                const editOptionsList = document.getElementById('editOptionsList');
                const optionItem = document.createElement('div');
                optionItem.className = 'option-item mb-2 d-flex align-items-center gap-2';
                optionItem.innerHTML = `
                    <input type="text" class="form-control option-input" required placeholder="Enter option value" name="options[]">
                    <a href="#" class="btn btn-danger btn-sm remove-option" style="text-decoration: none;">
                        <i class="ti ti-trash"></i>
                    </a>
                `;
                editOptionsList.appendChild(optionItem);
                updateEditDeleteButtons();
            }

            // Remove option field in edit modal
            const editOptionsList = document.getElementById('editOptionsList');
            if (editOptionsList) {
                editOptionsList.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-option')) {
                        e.preventDefault();
                        e.stopPropagation();
                        const optionItem = e.target.closest('.option-item');
                        optionItem.remove();
                        updateEditDeleteButtons();
                    }
                });
            }

            function updateEditDeleteButtons() {
                const optionItems = document.querySelectorAll('#editOptionsList .option-item');
                optionItems.forEach((item, index) => {
                    const deleteBtn = item.querySelector('.remove-option');
                    if (optionItems.length > 1) {
                        deleteBtn.style.display = 'block';
                    } else {
                        deleteBtn.style.display = 'none';
                    }
                });
            }

            // Reset edit modal when closed
            const editCustomFieldModalElement = document.getElementById('editCustomFieldModal');
            if (editCustomFieldModalElement) {
                editCustomFieldModalElement.addEventListener('hidden.bs.modal', function() {
                    document.getElementById('editCustomFieldForm').reset();
                    // Re-enable the field type select (it was disabled)
                    const editFieldTypeSelect = document.getElementById('editFieldType');
                    if (editFieldTypeSelect) {
                        editFieldTypeSelect.disabled = true;
                    }
                    const editOptionsContainer = document.getElementById('editOptionsContainer');
                    editOptionsContainer.style.display = 'none';
                    const editOptionsList = document.getElementById('editOptionsList');
                    editOptionsList.innerHTML = `
                        <div class="option-item mb-2 d-flex align-items-center gap-2">
                            <input type="text" class="form-control option-input" required placeholder="Enter option value" name="options[]">
                            <a href="#" class="btn btn-danger btn-sm remove-option" style="display: none; text-decoration: none;">
                                <i class="ti ti-trash"></i>
                            </a>
                        </div>
                    `;
                });
            }

            // Delete Custom Field Confirmation
            const deleteCustomFieldBtns = document.querySelectorAll('.delete-custom-field-btn');
            const deleteCustomFieldModal = new bootstrap.Modal(document.getElementById('deleteCustomFieldModal'));

            deleteCustomFieldBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const fieldId = this.getAttribute('data-field-id');
                    const fieldName = this.getAttribute('data-field-name');

                    // Populate delete confirmation modal
                    document.getElementById('deleteFieldId').value = fieldId;
                    document.getElementById('deleteConfirmationMessage').textContent =
                        `Are you sure you want to delete the custom field "${fieldName || 'this field'}"? This action cannot be undone.`;

                    // Show confirmation modal
                    deleteCustomFieldModal.show();
                });
            });

            // Filter Functionality
            const customFieldTypeFilter = document.getElementById('customFieldTypeFilter');
            const customFieldSearch = document.getElementById('customFieldSearch');

            function filterCustomFields() {
                const selectedType = customFieldTypeFilter ? customFieldTypeFilter.value : 'all';
                const searchTerm = customFieldSearch ? customFieldSearch.value.toLowerCase() : '';
                const tableRows = document.querySelectorAll('#customFieldsTable tbody tr[data-field-id]');

                tableRows.forEach(row => {
                    const rowType = row.getAttribute('data-field-type');
                    const rowText = row.textContent.toLowerCase();

                    // Check type filter
                    let typeMatch = (selectedType === 'all' || rowType === selectedType);

                    // Check search term
                    let searchMatch = searchTerm === '' || rowText.includes(searchTerm);

                    // Show row only if both conditions are met
                    if (typeMatch && searchMatch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Add event listeners for filter and search
            if (customFieldTypeFilter) {
                customFieldTypeFilter.addEventListener('change', filterCustomFields);
            }

            if (customFieldSearch) {
                customFieldSearch.addEventListener('input', filterCustomFields);
            }
        });
    </script>

    <script>
        // Other Items Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Edit Other Item Functionality
            const editOtherItemBtns = document.querySelectorAll('.edit-other-item-btn');
            const editOtherItemModal = new bootstrap.Modal(document.getElementById('editOtherItemModal'));

            editOtherItemBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const itemId = this.getAttribute('data-item-id');
                    const itemName = this.getAttribute('data-item-name');
                    const itemFields = this.getAttribute('data-item-fields');

                    // Populate edit modal fields
                    document.getElementById('editItemId').value = itemId;
                    document.getElementById('editItemName').value = itemName || '';

                    // Parse field IDs from JSON
                    let fieldIds = [];
                    if (itemFields) {
                        try {
                            fieldIds = JSON.parse(itemFields);
                            // Convert to strings if needed (bootstrap-select may need string values)
                            fieldIds = fieldIds.map(id => String(id));
                        } catch (e) {
                            fieldIds = [];
                        }
                    }

                    // Store fieldIds for use in modal shown event
                    window.editOtherItemFieldIds = fieldIds;

                    // Show modal first
                    editOtherItemModal.show();

                    // Wait for modal to be fully shown, then set values
                    const editOtherItemModalElement = document.getElementById('editOtherItemModal');
                    const setValuesHandler = function() {
                        const editCustomFieldsSelect = $('#editCustomFieldsSelect');
                        if (editCustomFieldsSelect.length) {
                            // Initialize selectpicker if not already initialized
                            if (typeof editCustomFieldsSelect.selectpicker !== 'function') {
                                editCustomFieldsSelect.selectpicker();
                            }

                            // Clear previous selections first
                            editCustomFieldsSelect.selectpicker('deselectAll');

                            // Set the values after a small delay to ensure selectpicker is ready
                            setTimeout(function() {
                                if (window.editOtherItemFieldIds && window.editOtherItemFieldIds.length > 0) {
                                    // Set the values (convert to strings if needed)
                                    const stringFieldIds = window.editOtherItemFieldIds.map(id => String(id));
                                    editCustomFieldsSelect.selectpicker('val', stringFieldIds);
                                    // Refresh to ensure display is updated
                                    editCustomFieldsSelect.selectpicker('refresh');
                                }
                                // Clear the stored fieldIds
                                window.editOtherItemFieldIds = null;
                            }, 100);
                        }
                        // Remove the event listener after use
                        editOtherItemModalElement.removeEventListener('shown.bs.modal', setValuesHandler);
                    };

                    // Add event listener for when modal is fully shown
                    editOtherItemModalElement.addEventListener('shown.bs.modal', setValuesHandler);
                });
            });

            // Delete Other Item Confirmation
            const deleteOtherItemBtns = document.querySelectorAll('.delete-other-item-btn');
            const deleteOtherItemModal = new bootstrap.Modal(document.getElementById('deleteOtherItemModal'));

            deleteOtherItemBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const itemId = this.getAttribute('data-item-id');
                    const itemName = this.getAttribute('data-item-name');
                    const itemUsage = this.getAttribute('data-item-usage');

                    // Populate delete confirmation modal
                    document.getElementById('deleteItemId').value = itemId;

                    let message = `Are you sure you want to delete the other item "${itemName || 'this item'}"?`;
                    if (itemUsage && parseInt(itemUsage) > 0) {
                        message += ` This item is currently being used in ${itemUsage} record(s). Deleting it may affect existing data.`;
                    } else {
                        message += ' This action cannot be undone.';
                    }

                    document.getElementById('deleteOtherItemConfirmationMessage').textContent = message;

                    // Show confirmation modal
                    deleteOtherItemModal.show();
                });
            });

            // Search Functionality for Other Items
            const otherItemsSearch = document.getElementById('otherItemsSearch');
            if (otherItemsSearch) {
                otherItemsSearch.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const tableRows = document.querySelectorAll('#otherItemsTable tbody tr[data-item-id]');

                    tableRows.forEach(row => {
                        const rowText = row.textContent.toLowerCase();
                        if (searchTerm === '' || rowText.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }

        });
    </script>

    <script>
        // Alert Settings Functionality
        document.addEventListener('DOMContentLoaded', function() {
            let saveTimeout = null;

            // Function to gather all alert settings data
            function gatherAlertSettings() {
                const data = {
                    follow_up: document.getElementById('follow_up_toggle').checked ? 'true' : 'false',
                    follow_up_freq: [],
                    upcoming_maintenance: document.getElementById('upcoming_maintenance_toggle').checked ? 'true' : 'false',
                    upcoming_maintenance_freq: [],
                    overdue_maintenance: document.getElementById('overdue_maintenance_toggle').checked ? 'true' : 'false',
                    overdue_maintenance_freq: []
                };

                // Gather follow_up_freq
                document.querySelectorAll('input[data-setting="follow_up_freq"]:checked').forEach(function(checkbox) {
                    data.follow_up_freq.push(checkbox.value);
                });

                // Gather upcoming_maintenance_freq
                document.querySelectorAll('input[data-setting="upcoming_maintenance_freq"]:checked').forEach(function(checkbox) {
                    data.upcoming_maintenance_freq.push(checkbox.value);
                });

                // Gather overdue_maintenance_freq
                document.querySelectorAll('input[data-setting="overdue_maintenance_freq"]:checked').forEach(function(checkbox) {
                    data.overdue_maintenance_freq.push(checkbox.value);
                });

                return data;
            }

            // Function to save alert settings via AJAX
            function saveAlertSettings() {
                const data = gatherAlertSettings();

                fetch('{{ url("/api/alert-settings") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        // Optional: Show a subtle success indicator
                        console.log('Alert settings saved successfully');
                    } else {
                        console.error('Error saving alert settings:', result.message);
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: result.message || "Error saving alert settings"
                        });
                    }
                })
                .catch(error => {
                    console.error('Error saving alert settings:', error);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "An error occurred while saving alert settings"
                    });
                });
            }

            // Debounced save function to prevent too many requests
            function debouncedSave() {
                if (saveTimeout) {
                    clearTimeout(saveTimeout);
                }
                saveTimeout = setTimeout(saveAlertSettings, 300);
            }

            // Add event listeners to all toggle switches
            document.querySelectorAll('.alert-toggle').forEach(function(toggle) {
                toggle.addEventListener('change', function() {
                    debouncedSave();
                });
            });

            // Add event listeners to all frequency checkboxes
            document.querySelectorAll('.alert-freq-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    debouncedSave();
                });
            });
        });
    </script>
@endsection
