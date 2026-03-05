
<?php $__env->startSection('content'); ?>

    <div class="page-wrapper">
        <div class="page-content-tab p-0">
            <div class="container-fluid  p-0" style="height:100%">
                <div class="top-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <h4 class="page-title text-white font-30 mb-2 mt-2">Jobs</h4>
                                <p class="text-white">All your jobs, organized and easy to track</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;border:6px solid white;height:100%">
                    <div class="card-body" style="border-top-left-radius: 15px; border-top-right-radius: 15px;background-color: #F1F5F9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-12">
                                                <h4 class="card-title fw-bold mt-3 mb-1">Recent Jobs</h4>
                                                <p style="color:#94A3B8" class="mb-0">
                                                    A complete overview of every job in motion
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-12 ">
                                                <div class="row align-items-center">
                                                    <div class="col-md-4 col-12 my-see-all-btn" style="border-right: 1px solid #F1F5F9">
                                                        <select name="" id="" class="form-select see-all-btn">
                                                            <option value="">All Jobs</option>
                                                            <option value="">Job 1</option>
                                                            <option value="">Job 2</option>
                                                            <option value="">Job 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <button type="button" class="btn btn-drop dropdown-toggle w-100" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9 4.5V19.5M15 4.5V19.5M4.125 19.5H19.875C20.4963 19.5 21 18.9963 21 18.375V5.625C21 5.00368 20.4963 4.5 19.875 4.5H4.125C3.50368 4.5 3 5.00368 3 5.625V18.375C3 18.9963 3.50368 19.5 4.125 19.5Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        Added on
                                                                    </label>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                                                    <label class="form-check-label" for="flexCheckDefault1">
                                                                        Office Name
                                                                    </label>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                                                    <label class="form-check-label" for="flexCheckDefault2">
                                                                        City
                                                                    </label>
                                                                </div>
                                                            </a>

                                                            <a class="dropdown-item" href="#">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                                                    <label class="form-check-label" for="flexCheckDefault3">
                                                                        Zip code
                                                                    </label>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                                                                    <label class="form-check-label" for="flexCheckDefault4">
                                                                        Address
                                                                    </label>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
                                                                    <label class="form-check-label" for="flexCheckDefault5">
                                                                        Compress Model
                                                                    </label>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
                                                                    <label class="form-check-label" for="flexCheckDefault6">
                                                                        Status
                                                                    </label>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
                                                                    <label class="form-check-label" for="flexCheckDefault6">
                                                                        Action
                                                                    </label>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12 ">
                                                        <div class="relative">
                                                            <input id="data-search" type="search" class="form-control custom-search" placeholder="Search..">
                                                            <i class="ti ti-search my-icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="datatable_1">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Added on</th>
                                                    <th>Office Name</th>
                                                    <th>Doctor's Name</th>
                                                    <th>City</th>
                                                    <th>Zip Code</th>
                                                    <th>Address</th>
                                                    <th>Service Type</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $jobs ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td>
                                                        <span class="tble-clr"><?php echo e($job->created_at ? $job->created_at->format('m/d/y') : 'N/A'); ?></span>
                                                        <p class="mb-0 tble-time"><?php echo e($job->created_at ? $job->created_at->format('h:i a') : ''); ?></p>
                                                    </td>
                                                    <td onclick="window.location.href='<?php echo e(url('/jobs/' . $job->id)); ?>'" style="cursor: pointer;">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <span class="tble-clr"><?php echo e($job->client->office_name ?? 'N/A'); ?></span>
                                                                <p class="mb-0 tble-time">Contact Number: <?php echo e($job->client->office_number ?? 'N/A'); ?></p>
                                                            </div>
                                                            
                                                        </div>
                                                    </td>
                                                    <td onclick="window.location.href='<?php echo e(url('/jobs/' . $job->id)); ?>'" style="cursor: pointer;">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <span class="tble-clr"><?php echo e($job->client->doctor_name ?? 'N/A'); ?></span>
                                                                <p class="mb-0 tble-time">Visit Date: <?php echo e($job->visit_date ? $job->visit_date->format('m/d/Y') : 'N/A'); ?></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="tble-clr"><?php echo e($job->client->city ?? 'N/A'); ?></span></td>
                                                    <td><span class="tble-clr"><?php echo e($job->client->zip_code ?? 'N/A'); ?></span></td>
                                                    <td>
                                                        <span class="tble-clr">
                                                            <?php echo e($job->client->address ?? ''); ?><?php echo e($job->client->suite ? ', Suite ' . $job->client->suite : ''); ?><?php echo e($job->client->state ? ', ' . $job->client->state : ''); ?>

                                                        </span>
                                                    </td>
                                                    <td><span class="tble-clr"><?php echo e($job->service_type ?? 'N/A'); ?></span></td>
                                                    <td>
                                                        <?php
                                                            $statusClass = 'active-status';
                                                            $statusText = ucfirst(str_replace('_', ' ', $job->job_status ?? 'pending'));
                                                            if($job->job_status == 'completed') {
                                                                $statusClass = 'completed-status';
                                                            } elseif($job->job_status == 'cancelled') {
                                                                $statusClass = 'cancelled-status';
                                                            } elseif($job->job_status == 'in_progress') {
                                                                $statusClass = 'in-progress-status';
                                                            }
                                                        ?>
                                                        <span class="<?php echo e($statusClass); ?>">
                                                            <?php echo e($statusText); ?>

                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="#" type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7.99996 8.66659C8.36815 8.66659 8.66663 8.36811 8.66663 7.99992C8.66663 7.63173 8.36815 7.33325 7.99996 7.33325C7.63177 7.33325 7.33329 7.63173 7.33329 7.99992C7.33329 8.36811 7.63177 8.66659 7.99996 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M12.6666 8.66659C13.0348 8.66659 13.3333 8.36811 13.3333 7.99992C13.3333 7.63173 13.0348 7.33325 12.6666 7.33325C12.2984 7.33325 12 7.63173 12 7.99992C12 8.36811 12.2984 8.66659 12.6666 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M3.33329 8.66659C3.70148 8.66659 3.99996 8.36811 3.99996 7.99992C3.99996 7.63173 3.70148 7.33325 3.33329 7.33325C2.9651 7.33325 2.66663 7.63173 2.66663 7.99992C2.66663 8.36811 2.9651 8.66659 3.33329 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item edit-client-btn" href="#" data-client-id="<?php echo e($job->client->id); ?>"><i class="ti ti-pencil" style="margin-right:5px"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?php echo e(url('/jobs/' . $job->id)); ?>"><i class="ti ti-eye" style="margin-right:5px"></i>
                                                                View
                                                            </a>
                                                            <a class="dropdown-item delete-job-btn" href="#" data-job-id="<?php echo e($job->id); ?>" data-office-name="<?php echo e($job->client->office_name ?? 'N/A'); ?>">
                                                                <i class="ti ti-trash" style="margin-right:5px"></i>
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="9" class="text-center py-4">
                                                        <p class="mb-0" style="color: #94A3B8;">No jobs found. Click "Add New" to create your first job.</p>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
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

    <!-- Delete Job Confirmation Modal -->
    <div class="modal fade" id="deleteJobModal" tabindex="-1" aria-labelledby="deleteJobModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteJobModalLabel">Delete Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="deleteJobConfirmationMessage">Are you sure you want to delete this job? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteJob">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const table = document.getElementById("datatable_1");
            const columnMap = {
                flexCheckDefault: 0, // Added on
                flexCheckDefault1: 1, // Office Name
                flexCheckDefault2: 3, // City
                flexCheckDefault3: 4, // Zip Code
                flexCheckDefault4: 5, // Address
                                                flexCheckDefault5: 6, // Service Type
                                                flexCheckDefault6: 7, // Status
                                                flexCheckDefault7: 8 // Action
            };
            const savedState = JSON.parse(localStorage.getItem("columnVisibility")) || {};
            Object.keys(columnMap).forEach(id => {
                const checkbox = document.getElementById(id);
                const columnIndex = columnMap[id];
                const isVisible = savedState[id] !== false;
                checkbox.checked = isVisible;
                toggleColumn(columnIndex, isVisible);
                checkbox.addEventListener("change", function () {
                    toggleColumn(columnIndex, this.checked);
                    savedState[id] = this.checked;
                    localStorage.setItem("columnVisibility", JSON.stringify(savedState));
                });
            });

            function toggleColumn(index, show) {
                const rows = table.querySelectorAll("tr");
                rows.forEach(row => {
                    const cells = row.querySelectorAll("th, td");
                    if (cells[index]) {
                        cells[index].style.display = show ? "" : "none";
                    }
                });
            }

        });

        // Delete Job Functionality - Using jQuery for better compatibility
        $(document).ready(function() {
            let jobIdToDelete = null;
            const deleteJobModalElement = document.getElementById('deleteJobModal');
            if (deleteJobModalElement) {
                const deleteJobModal = new bootstrap.Modal(deleteJobModalElement);

                // Use event delegation for delete buttons (works with dropdown menus)
                $(document).on('click', '.delete-job-btn', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    jobIdToDelete = $(this).data('job-id');
                    const officeName = $(this).data('office-name') || 'this client';

                    // Update confirmation message
                    $('#deleteJobConfirmationMessage').text(
                        `Are you sure you want to delete the job for "${officeName}"? This action cannot be undone.`
                    );

                    // Show confirmation modal
                    deleteJobModal.show();
                });

                $('#confirmDeleteJob').on('click', function() {
                    if (jobIdToDelete) {
                        // Show loading state
                        const deleteBtn = $(this);
                        const originalText = deleteBtn.text();
                        deleteBtn.prop('disabled', true).text('Deleting...');

                        // Make AJAX request
                        $.ajax({
                            url: `<?php echo e(url('/')); ?>/jobs/${jobIdToDelete}`,
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                            },
                            success: function(data) {
                                deleteJobModal.hide();
                                if (data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: data.message || 'Job deleted successfully!',
                                        confirmButtonColor: '#155DFC'
                                    }).then(() => {
                                        // Reload page to show updated list
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: data.message || 'Error deleting job',
                                        confirmButtonColor: '#155DFC'
                                    });
                                    deleteBtn.prop('disabled', false).text(originalText);
                                }
                            },
                            error: function(xhr) {
                                console.error('Error:', xhr);
                                let errorMsg = 'An error occurred while deleting the job. Please try again.';
                                if (xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMsg = xhr.responseJSON.message;
                                }
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: errorMsg,
                                    confirmButtonColor: '#155DFC'
                                });
                                deleteBtn.prop('disabled', false).text(originalText);
                            }
                        });
                    }
                });
            }
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gemdental/resources/views/jobs.blade.php ENDPATH**/ ?>