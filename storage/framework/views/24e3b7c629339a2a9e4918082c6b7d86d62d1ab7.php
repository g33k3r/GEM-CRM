
<?php $__env->startSection('content'); ?>

    <div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content-tab p-0">

        <div class="container-fluid  p-0 h-100">
            <!-- Page-Title -->
            <div class="top-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-lg-9">
                                    <h4 class="page-title text-white font-30 mb-3 mt-2"><?php echo e($client->office_name ?? 'N/A'); ?></h4>
                                    <p class="text-white mb-1"> <i class="ti ti-mail"></i>: <?php echo e($client->doctor_name ?? 'N/A'); ?></p>
                                    <p class="text-white mb-1"><i class="ti ti-phone"></i>: <?php echo e($client->office_number ?? 'N/A'); ?></p>
                                    <p class="text-white mb-1">
                                        <i class="ti ti-home"></i>: <?php echo e($client->address ?? 'N/A'); ?><?php echo e($client->suite ? ', Suite ' . $client->suite : ''); ?><?php echo e($client->city ? ', ' . $client->city : ''); ?><?php echo e($client->state ? ', ' . $client->state : ''); ?><?php echo e($client->zip_code ? ' ' . $client->zip_code : ''); ?>

                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-10 text-lg-end">
                                            <button type="button" class="btn btn-mystyle dropdown-toggle w-100" id="statusDropdownBtn" data-bs-toggle="dropdown" aria-expanded="false" style="width:fit-content!important"><?php echo e(ucfirst($client->status ?? 'active')); ?> <i class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item change-status-btn" href="#" data-status="active" data-client-id="<?php echo e($client->id); ?>">Active</a>
                                                <a class="dropdown-item change-status-btn" href="#" data-status="inactive" data-client-id="<?php echo e($client->id); ?>">Inactive</a>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <a href="#" type="button" class="dropdown-toggle btn-mystyle" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 6px 6px;">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 6.75C11.5858 6.75 11.25 6.41421 11.25 6C11.25 5.58579 11.5858 5.25 12 5.25C12.4142 5.25 12.75 5.58579 12.75 6C12.75 6.41421 12.4142 6.75 12 6.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12 12.75C11.5858 12.75 11.25 12.4142 11.25 12C11.25 11.5858 11.5858 11.25 12 11.25C12.4142 11.25 12.75 11.5858 12.75 12C12.75 12.4142 12.4142 12.75 12 12.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12 18.75C11.5858 18.75 11.25 18.4142 11.25 18C11.25 17.5858 11.5858 17.25 12 17.25C12.4142 17.25 12.75 17.5858 12.75 18C12.75 18.4142 12.4142 18.75 12 18.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item edit-client-btn" href="#" data-client-id="<?php echo e($client->id); ?>"><i class="ti ti-pencil" style="margin-right:5px"></i> Edit</a>
                                                <a class="dropdown-item" href="#"><i class="ti ti-trash" style="margin-right:5px"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>

            </div>

            <div class="card mb-0 h-100" style="border-top-left-radius: 15px; border-top-right-radius: 15px;border:6px solid white;">
                <div class="card-body" style="border-top-left-radius: 15px; border-top-right-radius: 15px;background-color: #F1F5F9">
                    <div class="row h-100">
                        <div class="col-lg-4">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h4 class="card-title fw-bold" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 12px;font-size:17px">Overview</h4>
                                </div>
                                <div class="card-body h-100">
                                    <div class="par-b">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <span class="jc-icon">
                                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.6 14.4C25.5765 14.4 28.8 11.1765 28.8 7.2C28.8 6.42853 28.6787 5.68541 28.454 4.98866C28.2868 4.46987 27.6375 4.36293 27.2521 4.74836L22.9444 9.05604C22.7357 9.26466 22.4269 9.34661 22.1545 9.23318C20.9875 8.74713 20.0535 7.81362 19.5667 6.64689C19.4531 6.37445 19.535 6.06541 19.7437 5.85668L24.0523 1.54815C24.4377 1.16274 24.3308 0.513465 23.812 0.346172C23.1151 0.12141 22.3717 0 21.6 0C17.6236 0 14.4 3.22355 14.4 7.2C14.4 7.35653 14.405 7.5119 14.4148 7.66595C14.5041 9.0627 14.2108 10.5577 13.1356 11.4537L1.56828 21.0931C0.574558 21.9212 0 23.1479 0 24.4414C0 26.8486 1.95139 28.8 4.35856 28.8C5.65209 28.8 6.8788 28.2254 7.7069 27.2317L17.3463 15.6644C18.2423 14.5892 19.7373 14.296 21.1341 14.3852C21.2881 14.395 21.4435 14.4 21.6 14.4ZM6.4 24C6.4 24.8837 5.68366 25.6 4.8 25.6C3.91634 25.6 3.2 24.8837 3.2 24C3.2 23.1163 3.91634 22.4 4.8 22.4C5.68366 22.4 6.4 23.1163 6.4 24Z" fill="#155DFC" />
                                                            <path d="M21.6 16.8C21.8769 16.8 22.1511 16.7883 22.4221 16.7653L28.4285 22.7716C29.9906 24.3337 29.9906 26.8664 28.4285 28.4285C26.8664 29.9906 24.3337 29.9906 22.7716 28.4285L15.7146 21.3714L19.19 17.2009C19.2728 17.1016 19.4261 16.981 19.7371 16.8884C20.0605 16.7921 20.4879 16.7488 20.9811 16.7803C21.186 16.7934 21.3924 16.8 21.6 16.8Z" fill="#155DFC" />
                                                            <path d="M8.00005 5.73731L11.7289 9.46616C11.6843 9.53004 11.6399 9.57596 11.5991 9.60995L9.2799 11.5426L5.73731 8.00005H3.69448C3.39146 8.00005 3.11445 7.82885 2.97894 7.55782L0.257918 2.11578C0.103922 1.80779 0.164286 1.43582 0.407774 1.19233L1.19233 0.407774C1.43582 0.164286 1.80779 0.103922 2.11578 0.257918L7.55782 2.97894C7.82885 3.11445 8.00005 3.39146 8.00005 3.69448V5.73731Z" fill="#155DFC" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div>
                                                    <p class="mb-1 fw-bold" style="font-size:17px;color:#45556C">
                                                        Jobs Completed
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="fw-bold" style="font-size:40px"><?php echo e($jobsCompleted ?? 0); ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="par-b">
                                        <div class="d-flex flex-column gap-3 justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <span class="jc-icon2">
                                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M8.39995 19.2002C8.39995 18.5375 8.93721 18.0002 9.59995 18.0002H9.61595C10.2787 18.0002 10.816 18.5375 10.816 19.2002V19.2162C10.816 19.8789 10.2787 20.4162 9.61595 20.4162H9.59995C8.93721 20.4162 8.39995 19.8789 8.39995 19.2162V19.2002Z" fill="#F0B100" />
                                                            <path d="M9.59995 21.2002C8.93721 21.2002 8.39995 21.7375 8.39995 22.4002V22.4162C8.39995 23.0789 8.93721 23.6162 9.59995 23.6162H9.61595C10.2787 23.6162 10.816 23.0789 10.816 22.4162V22.4002C10.816 21.7375 10.2787 21.2002 9.61595 21.2002H9.59995Z" fill="#F0B100" />
                                                            <path d="M11.6 19.2002C11.6 18.5375 12.1372 18.0002 12.8 18.0002H12.816C13.4787 18.0002 14.016 18.5375 14.016 19.2002V19.2162C14.016 19.8789 13.4787 20.4162 12.816 20.4162H12.8C12.1372 20.4162 11.6 19.8789 11.6 19.2162V19.2002Z" fill="#F0B100" />
                                                            <path d="M12.8 21.2002C12.1372 21.2002 11.6 21.7375 11.6 22.4002V22.4162C11.6 23.0789 12.1372 23.6162 12.8 23.6162H12.816C13.4787 23.6162 14.016 23.0789 14.016 22.4162V22.4002C14.016 21.7375 13.4787 21.2002 12.816 21.2002H12.8Z" fill="#F0B100" />
                                                            <path d="M14.8 16.0002C14.8 15.3375 15.3372 14.8002 16 14.8002H16.016C16.6787 14.8002 17.216 15.3375 17.216 16.0002V16.0162C17.216 16.6789 16.6787 17.2162 16.016 17.2162H16C15.3372 17.2162 14.8 16.6789 14.8 16.0162V16.0002Z" fill="#F0B100" />
                                                            <path d="M16 18.0002C15.3372 18.0002 14.8 18.5375 14.8 19.2002V19.2162C14.8 19.8789 15.3372 20.4162 16 20.4162H16.016C16.6787 20.4162 17.216 19.8789 17.216 19.2162V19.2002C17.216 18.5375 16.6787 18.0002 16.016 18.0002H16Z" fill="#F0B100" />
                                                            <path d="M14.8 22.4002C14.8 21.7375 15.3372 21.2002 16 21.2002H16.016C16.6787 21.2002 17.216 21.7375 17.216 22.4002V22.4162C17.216 23.0789 16.6787 23.6162 16.016 23.6162H16C15.3372 23.6162 14.8 23.0789 14.8 22.4162V22.4002Z" fill="#F0B100" />
                                                            <path d="M19.2 14.8002C18.5372 14.8002 18 15.3375 18 16.0002V16.0162C18 16.6789 18.5372 17.2162 19.2 17.2162H19.216C19.8787 17.2162 20.416 16.6789 20.416 16.0162V16.0002C20.416 15.3375 19.8787 14.8002 19.216 14.8002H19.2Z" fill="#F0B100" />
                                                            <path d="M18 19.2002C18 18.5375 18.5372 18.0002 19.2 18.0002H19.216C19.8787 18.0002 20.416 18.5375 20.416 19.2002V19.2162C20.416 19.8789 19.8787 20.4162 19.216 20.4162H19.2C18.5372 20.4162 18 19.8789 18 19.2162V19.2002Z" fill="#F0B100" />
                                                            <path d="M19.2 21.2002C18.5372 21.2002 18 21.7375 18 22.4002V22.4162C18 23.0789 18.5372 23.6162 19.2 23.6162H19.216C19.8787 23.6162 20.416 23.0789 20.416 22.4162V22.4002C20.416 21.7375 19.8787 21.2002 19.216 21.2002H19.2Z" fill="#F0B100" />
                                                            <path d="M21.1999 16.0002C21.1999 15.3375 21.7372 14.8002 22.4 14.8002H22.416C23.0787 14.8002 23.6159 15.3375 23.6159 16.0002V16.0162C23.6159 16.6789 23.0787 17.2162 22.416 17.2162H22.4C21.7372 17.2162 21.1999 16.6789 21.1999 16.0162V16.0002Z" fill="#F0B100" />
                                                            <path d="M22.4 18.0002C21.7372 18.0002 21.1999 18.5375 21.1999 19.2002V19.2162C21.1999 19.8789 21.7372 20.4162 22.4 20.4162H22.416C23.0787 20.4162 23.6159 19.8789 23.6159 19.2162V19.2002C23.6159 18.5375 23.0787 18.0002 22.416 18.0002H22.4Z" fill="#F0B100" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.19995 3.2002C9.86269 3.2002 10.4 3.73745 10.4 4.4002V6.4002H21.6V4.4002C21.6 3.73745 22.1372 3.2002 22.7999 3.2002C23.4627 3.2002 24 3.73745 24 4.4002V6.4002H24.4C26.83 6.4002 28.7999 8.37014 28.7999 10.8002V24.4002C28.7999 26.8302 26.83 28.8002 24.4 28.8002H7.59995C5.1699 28.8002 3.19995 26.8302 3.19995 24.4002V10.8002C3.19995 8.37014 5.1699 6.4002 7.59995 6.4002H7.99995V4.4002C7.99995 3.73745 8.53721 3.2002 9.19995 3.2002ZM7.59995 12.0002C6.49538 12.0002 5.59995 12.8956 5.59995 14.0002V24.4002C5.59995 25.5048 6.49538 26.4002 7.59995 26.4002H24.4C25.5045 26.4002 26.4 25.5048 26.4 24.4002V14.0002C26.4 12.8956 25.5045 12.0002 24.4 12.0002H7.59995Z" fill="#F0B100" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div>
                                                    <p class="mb-1 fw-bold" style="font-size:17px;color:#45556C">
                                                        Upcoming Maintenance
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <?php if(isset($upcomingMaintenanceList) && count($upcomingMaintenanceList) > 0): ?>
                                                    <div class="upcoming-maintenance-list" >
                                                        <?php $__currentLoopData = $upcomingMaintenanceList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maintenance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <h4 class="mb-0 fw-bold" style="color:#45556C;font-size:18px"><?php echo e($maintenance['type']); ?></h4>
                                                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2" style="border-bottom: 1px solid #E2E8F0;">
                                                                
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <rect width="24" height="24" rx="12" fill="#FFE2E2" />
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.4001 12.0001C18.4001 15.5347 15.5347 18.4001 12.0001 18.4001C8.46548 18.4001 5.6001 15.5347 5.6001 12.0001C5.6001 8.46548 8.46548 5.6001 12.0001 5.6001C15.5347 5.6001 18.4001 8.46548 18.4001 12.0001ZM12.0001 8.0001C12.3315 8.0001 12.6001 8.26873 12.6001 8.6001V12.2001C12.6001 12.5315 12.3315 12.8001 12.0001 12.8001C11.6687 12.8001 11.4001 12.5315 11.4001 12.2001V8.6001C11.4001 8.26873 11.6687 8.0001 12.0001 8.0001ZM12.0001 16.0001C12.4419 16.0001 12.8001 15.6419 12.8001 15.2001C12.8001 14.7583 12.4419 14.4001 12.0001 14.4001C11.5583 14.4001 11.2001 14.7583 11.2001 15.2001C11.2001 15.6419 11.5583 16.0001 12.0001 16.0001Z" fill="#E7000B" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <p class="mb-0 " style="color:#45556C;font-size:14px">
                                                                            <?php echo e(\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($maintenance['date']), false)); ?> days remaining
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <p class="mb-0 fw-bold" style="color:#45556C;font-size:16px"><?php echo e($maintenance['date']->format('d M y')); ?></p>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php else: ?>
                                                    <p class="mb-0 text-muted" style="font-size:14px">-</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="par-b">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <span class="jc-icon3">
                                                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1724 1.28622C10.322 0.538337 10.9787 0 11.7414 0H15.518C16.2807 0 16.9373 0.538335 17.0869 1.28621L17.6157 3.93007C18.7426 4.35933 19.7823 4.96531 20.701 5.71413L23.2583 4.84904C23.9807 4.60463 24.7753 4.90415 25.1566 5.56466L27.0449 8.83531C27.4263 9.49582 27.2884 10.3337 26.7155 10.8372L24.6887 12.6183C24.7815 13.1985 24.8297 13.7936 24.8297 14.4C24.8297 15.0063 24.7815 15.6014 24.6887 16.1817L26.7155 17.9628C27.2884 18.4663 27.4263 19.3042 27.0449 19.9647L25.1566 23.2353C24.7753 23.8958 23.9807 24.1953 23.2583 23.9509L20.701 23.0859C19.7823 23.8347 18.7426 24.4407 17.6157 24.8699L17.0869 27.5138C16.9373 28.2617 16.2807 28.8 15.518 28.8H11.7414C10.9787 28.8 10.322 28.2617 10.1724 27.5138L9.64366 24.8699C8.51676 24.4407 7.47704 23.8347 6.55836 23.0859L4.0011 23.951C3.27863 24.1954 2.48409 23.8958 2.10274 23.2353L0.214428 19.9647C-0.166917 19.3042 -0.0290367 18.4663 0.543857 17.9628L2.57061 16.1817C2.47786 15.6014 2.42968 15.0064 2.42968 14.4C2.42968 13.7937 2.47786 13.1986 2.57061 12.6183L0.543858 10.8372C-0.0290365 10.3337 -0.166918 9.49585 0.214427 8.83534L2.10274 5.56468C2.48409 4.90418 3.27863 4.60466 4.0011 4.84906L6.55834 5.71414C7.47703 4.96532 8.51676 4.35934 9.64366 3.93007L10.1724 1.28622ZM13.6297 19.2C16.2806 19.2 18.4297 17.051 18.4297 14.4C18.4297 11.749 16.2806 9.6 13.6297 9.6C10.9787 9.6 8.82968 11.749 8.82968 14.4C8.82968 17.051 10.9787 19.2 13.6297 19.2Z" fill="#45556C" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div>
                                                    <p class="mb-1 fw-bold" style="font-size:17px;color:#45556C">
                                                        KDQ 1200FK
                                                    </p>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <div>
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="24" height="24" rx="12" fill="#FFE2E2" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.4001 12.0001C18.4001 15.5347 15.5347 18.4001 12.0001 18.4001C8.46548 18.4001 5.6001 15.5347 5.6001 12.0001C5.6001 8.46548 8.46548 5.6001 12.0001 5.6001C15.5347 5.6001 18.4001 8.46548 18.4001 12.0001ZM12.0001 8.0001C12.3315 8.0001 12.6001 8.26873 12.6001 8.6001V12.2001C12.6001 12.5315 12.3315 12.8001 12.0001 12.8001C11.6687 12.8001 11.4001 12.5315 11.4001 12.2001V8.6001C11.4001 8.26873 11.6687 8.0001 12.0001 8.0001ZM12.0001 16.0001C12.4419 16.0001 12.8001 15.6419 12.8001 15.2001C12.8001 14.7583 12.4419 14.4001 12.0001 14.4001C11.5583 14.4001 11.2001 14.7583 11.2001 15.2001C11.2001 15.6419 11.5583 16.0001 12.0001 16.0001Z" fill="#E7000B" />
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bold" style="color:#90A1B9">
                                                                <span style="color:#90A1B9;font-weight:700">12</span>
                                                                days remaining
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="fw-bold" style="font-size:40px">A</h2>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card h-100">
                                <div class="card-header">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">Clinic Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false">Compressors</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false">Filters</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings2" role="tab" aria-selected="false">Amalgam Separator</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings3" role="tab" aria-selected="false">Sterilizer</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings4" role="tab" aria-selected="false">Notes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings5" role="tab" aria-selected="false">History</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings6" role="tab" aria-selected="false">Others</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body h-100">
                                    <div class="tab-content">
                                        <div class="tab-pane p-3 active" id="home" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Office Name</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input" value="<?php echo e($client->office_name ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Doctor’s Name</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input" value="<?php echo e($client->doctor_name ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Address</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input" value="<?php echo e($client->address ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Zip Code</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input" value="<?php echo e($client->zip_code ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Office Number</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input" value="<?php echo e($client->office_number ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Last DOS</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->last_dos ? $client->last_dos->format('m/d/Y') : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Suite</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->suite ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">City</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->city ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">State</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->state ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane p-3" id="profile" role="tabpanel">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="comp-a">
                                                        <span>
                                                            Compressor A
                                                        </span>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Model</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->compressor_a_model ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Serial Number</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->compressor_a_serial ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">OEM Parts & Costs
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->compressor_a_oem ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Initial Maintenance
                                                                Day</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->compressor_a_initial ? $client->compressor_a_initial->format('m/d/Y') : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Last Maintenance
                                                                Completed</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->compressor_a_last ? $client->compressor_a_last->format('m/d/Y') : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Next Maintenance
                                                                Day</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                id="compressor_a_next_display" 
                                                                value="<?php echo e($client->compressor_a_next ? $client->compressor_a_next->format('m/d/Y') : ''); ?>" disabled>
                                                            <input type="hidden" id="compressor_a_next_value" 
                                                                value="<?php echo e($client->compressor_a_next ? $client->compressor_a_next->format('Y-m-d') : ''); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                id="compressor_a_days_display" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="comp-b">
                                                        <span>
                                                            Compressor B
                                                        </span>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Model</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->compressor_b_model ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Serial Number</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->compressor_b_serial ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">OEM Parts & Costs
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->compressor_b_oem ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Initial Maintenance
                                                                Day</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->compressor_b_initial ? $client->compressor_b_initial->format('m/d/Y') : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Last Maintenance
                                                                Completed</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->compressor_b_last ? $client->compressor_b_last->format('m/d/Y') : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Next Maintenance
                                                                Day</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                id="compressor_b_next_display" 
                                                                value="<?php echo e($client->compressor_b_next ? $client->compressor_b_next->format('m/d/Y') : ''); ?>" disabled>
                                                            <input type="hidden" id="compressor_b_next_value" 
                                                                value="<?php echo e($client->compressor_b_next ? $client->compressor_b_next->format('Y-m-d') : ''); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                id="compressor_b_days_display" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane p-3" id="settings" role="tabpanel">
                                            <div class="par-b">
                                                <div class="filter-a">
                                                    <span>Water Sediment Filter</span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Initial
                                                                    Maintenance Day
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->water_filter_initial ? $client->water_filter_initial->format('m/d/Y') : ''); ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Next
                                                                    Maintenance Day
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->water_filter_next ? $client->water_filter_next->format('m/d/Y') : ''); ?>" disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Days Remaining
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->water_filter_days ?? ''); ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Maintenance
                                                                    Completed
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->water_filter_completed ? ucfirst($client->water_filter_completed) : ''); ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Water Sediment Filter Maintenance
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->water_filter_maintenance ? ucfirst($client->water_filter_maintenance) : ''); ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="par-b">
                                                <div class="filter-a">
                                                    <span>Silver Filter</span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Initial
                                                                    Maintenance Day
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->silver_filter_initial ? $client->silver_filter_initial->format('m/d/Y') : ''); ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Next
                                                                    Maintenance Day
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->silver_filter_next ? $client->silver_filter_next->format('m/d/Y') : ''); ?>" disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Days Remaining
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->silver_filter_days ?? ''); ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Silver Filter Maintenance
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->silver_filter_maintenance ? ucfirst($client->silver_filter_maintenance) : ''); ?>" disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="par-b">
                                                <div class="filter-a">
                                                    <span>Cavitron Filter</span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Initial
                                                                    Maintenance Day
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->cavitron_filter_initial ? $client->cavitron_filter_initial->format('m/d/Y') : ''); ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Next
                                                                    Maintenance Day
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->cavitron_filter_next ? $client->cavitron_filter_next->format('m/d/Y') : ''); ?>" disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Days Remaining
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->cavitron_filter_days ?? ''); ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Cavitron Filter Maintenance
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->cavitron_filter_maintenance ? ucfirst($client->cavitron_filter_maintenance) : ''); ?>" disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane p-3" id="settings2" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Model
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->amalgam_model ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Initial Amalgam Day
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->amalgam_initial ? $client->amalgam_initial->format('m/d/Y') : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Next Amalgam Day
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->amalgam_next ? $client->amalgam_next->format('m/d/Y') : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Days Remaining
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->amalgam_days ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Amalgam Separator Maintenance
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->amalgam_maintenance ? ucfirst($client->amalgam_maintenance) : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane p-3" id="settings3" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Model
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->sterilizer_model ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Initial Maintenance
                                                                Day
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->sterilizer_initial ? $client->sterilizer_initial->format('m/d/Y') : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Days Remaining
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->sterilizer_days ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Next Maintenance
                                                                Day
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->sterilizer_next ? $client->sterilizer_next->format('m/d/Y') : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Days Remaining
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                    value="<?php echo e($client->sterilizer_days2 ?? ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-6">
                                                            <h4 class="card-title fw-bold"
                                                                style="color:#45556C;font-size:17px">Sterilizer Maintenance
                                                            </h4>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control my-input"
                                                                value="<?php echo e($client->sterilizer_maintenance ? ucfirst($client->sterilizer_maintenance) : ''); ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane p-3" id="settings4" role="tabpanel">
                                            <div class="text-end">
                                                <button type="button" class="btn btn-primary mb-3 note-btn" data-client-id="<?php echo e($client->id); ?>">
                                                    <i class="ti ti-plus" style="margin-right:5px"></i>Add New Note
                                                </button>
                                            </div>
                                            <div id="notes-container">
                                                <?php $__empty_1 = true; $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <div class="d-flex gap-3 align-items-start mb-3 note-item" data-note-id="<?php echo e($note->id); ?>">
                                                    <div class="note-icon">
                                                        <span>
                                                            <svg width="17" height="21" viewBox="0 0 17 21" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M1.875 0C0.839467 0 0 0.839465 0 1.875V19.125C0 20.1605 0.839466 21 1.875 21H14.625C15.6605 21 16.5 20.1605 16.5 19.125V11.25C16.5 9.17893 14.8211 7.5 12.75 7.5H10.875C9.83947 7.5 9 6.66053 9 5.625V3.75C9 1.67893 7.32107 0 5.25 0H1.875ZM3.75 13.5C3.75 13.0858 4.08579 12.75 4.5 12.75H12C12.4142 12.75 12.75 13.0858 12.75 13.5C12.75 13.9142 12.4142 14.25 12 14.25H4.5C4.08579 14.25 3.75 13.9142 3.75 13.5ZM4.5 15.75C4.08579 15.75 3.75 16.0858 3.75 16.5C3.75 16.9142 4.08579 17.25 4.5 17.25H8.25C8.66421 17.25 9 16.9142 9 16.5C9 16.0858 8.66421 15.75 8.25 15.75H4.5Z"
                                                                    fill="#155DFC" />
                                                                <path
                                                                    d="M9.22119 0.315905C10.018 1.23648 10.5 2.43695 10.5 3.75V5.625C10.5 5.83211 10.6679 6 10.875 6H12.75C14.0631 6 15.2635 6.48204 16.1841 7.27881C15.2962 3.87988 12.6201 1.20377 9.22119 0.315905Z"
                                                                    fill="#155DFC" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="w-100">
                                                        <p class="mb-0">Note Added By
                                                            <span class="fw-bold"><?php echo e($note->user->name ?? 'Unknown'); ?></span>
                                                        </p>
                                                        <div class="d-flex gap-1 align-items-center mb-2">
                                                            <p class="mb-0"><?php echo e($note->created_at->format('m/d/Y')); ?></p>
                                                            <span>
                                                                <i class="ti ti-circle"
                                                                    style="color: #E2E8F0;font-size: 8px;"></i>
                                                            </span>
                                                            <p class="mb-0">
                                                                <?php echo e($note->created_at->format('h:i A')); ?>

                                                            </p>
                                                        </div>
                                                        <div style="background: #e8e8e8;padding: 10px;">
                                                        <?php echo e($note->note); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <div class="text-center py-5">
                                                    <p class="text-muted">No notes added yet. Click "Add New Note" to add one.</p>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane p-3" id="settings5" role="tabpanel">
                                           <div class="table-responsive">
                                               <table class="table" id="datatable_1">
                                                   <thead class="thead-light">
                                                   <tr>
                                                       <th>Service Date</th>
                                                       <th>Job Title</th>
                                                       <th>Worker Assigned</th>
                                                       <th>Action</th>
                                                   </tr>
                                                   </thead>
                                                   <tbody>
                                                   <tr>
                                                       <td>
                                                           <span class="tble-clr">1/28/17</span>
                                                           <p class="mb-0 tble-time">07:13 pm</p>
                                                       </td>
                                                       <td>
                                                           <div class="d-flex align-items-center justify-content-between">
                                                               <div>
                                                                   <span class="tble-clr">Job Title</span>
                                                                   <p class="mb-0 tble-time">Job#00001</p>
                                                               </div>
                                                           </div>
                                                       </td>
                                                       <td>
                                                           <span class="tble-clr">Mike Millers</span>
                                                           <p class="mb-0 tble-time">mikemeillers@gmail.com</p>
                                                       </td>
                                                       <td>
                                                           <span class="missed-status">
                                                               Missed
                                                           </span>
                                                       </td>
                                                   </tr>
                                                   </tbody>
                                               </table>
                                           </div>
                                        </div>
                                        <div class="tab-pane p-3" id="settings6" role="tabpanel">
                                            <div class="text-end mb-3">
                                                <button type="button" class="btn btn-primary add-other-item-btn" data-client-id="<?php echo e($client->id); ?>">
                                                    <i class="ti ti-plus" style="margin-right:5px"></i>Add New
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table" id="datatable_2">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Added on</th>
                                                            <th>Item Name</th>
                                                            <th>Item Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__empty_1 = true; $__currentLoopData = $otherData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                            <td>
                                                                <span class="tble-clr"><?php echo e($item['created_at']->format('m/d/Y')); ?></span>
                                                                <p class="mb-0 tble-time"><?php echo e($item['created_at']->format('h:i A')); ?></p>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div>
                                                                        <span class="tble-clr"><?php echo e($item['name']); ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    $itemType = collect($otherItems)->firstWhere('id', $item['item_type_id']);
                                                                ?>
                                                                <span class="tble-clr"><?php echo e($itemType['name'] ?? 'N/A'); ?></span>
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
                                                                    <a class="dropdown-item view-other-item-btn" href="#" data-item-id="<?php echo e($item['id']); ?>"><i class="ti ti-eye" style="margin-right:5px"></i> View</a>
                                                                    <a class="dropdown-item" href="#"><i class="ti ti-trash" style="margin-right:5px"></i> Delete</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td colspan="4" class="text-center py-4">
                                                                <p class="text-muted mb-0">No items added yet. Click "Add New" to add one.</p>
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
    </div>
</div>

<!-- View/Edit Other Item Modal -->
<div class="modal fade" id="viewOtherItemModal" tabindex="-1" aria-labelledby="viewOtherItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #E5E5E5; padding: 20px 32px;">
                <h2 class="modal-title" id="viewOtherItemModalLabel" style="font-weight: 700; font-size: 24px; color: #000;">View/Edit Item</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px 32px;">
                <form id="viewOtherItemForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="other_data_id" id="view_other_data_id">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="view_other_item_name" class="form-label fw-bold" style="color:#45556C;font-size:17px">Item Name</label>
                            <input type="text" name="item_name" id="view_other_item_name" class="form-control my-input" placeholder="Enter item name" required disabled style="background-color: #f5f5f5; cursor: not-allowed;">
                        </div>
                        <div class="col-lg-6">
                            <label for="view_other_item_type" class="form-label fw-bold" style="color:#45556C;font-size:17px">Item Type</label>
                            <select name="item_type_id" id="view_other_item_type" class="form-control my-input" required disabled style="background-color: #f5f5f5; cursor: not-allowed;">
                                <option value="">Select Item Type</option>
                                <?php $__currentLoopData = $otherItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div id="view-dynamic-fields-container"></div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #E5E5E5; padding: 20px 32px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Cancel</button>
                <button type="submit" form="viewOtherItemForm" class="btn" style="background-color: #155DFC; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Other Item Modal -->
<div class="modal fade" id="addOtherItemModal" tabindex="-1" aria-labelledby="addOtherItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #E5E5E5; padding: 20px 32px;">
                <h2 class="modal-title" id="addOtherItemModalLabel" style="font-weight: 700; font-size: 24px; color: #000;">Add Item</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px 32px;">
                <form id="addOtherItemForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="client_id" id="other_item_client_id">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="other_item_name" class="form-label fw-bold" style="color:#45556C;font-size:17px">Item Name</label>
                            <input type="text" name="item_name" id="other_item_name" class="form-control my-input" placeholder="Enter item name" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="other_item_type" class="form-label fw-bold" style="color:#45556C;font-size:17px">Item Type</label>
                            <select name="item_type_id" id="other_item_type" class="form-control my-input" required>
                                <option value="">Select Item Type</option>
                                <?php $__currentLoopData = $otherItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div id="dynamic-fields-container"></div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #E5E5E5; padding: 20px 32px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Cancel</button>
                <button type="submit" form="addOtherItemForm" class="btn" style="background-color: #155DFC; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Add Item</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Note Modal -->
<div class="modal fade" id="addNoteModal" tabindex="-1" aria-labelledby="addNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #E5E5E5; padding: 20px 32px;">
                <h2 class="modal-title" id="addNoteModalLabel" style="font-weight: 700; font-size: 24px; color: #000;">Add New Note</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px 32px;">
                <form id="addNoteForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="client_id" id="note_client_id">
                    <div class="mb-3">
                        <label for="note_text" class="form-label fw-bold" style="color:#45556C;font-size:17px">Note</label>
                        <textarea name="note" id="note_text" class="form-control" rows="10" placeholder="Type your note here..." required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #E5E5E5; padding: 20px 32px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Cancel</button>
                <button type="submit" form="addNoteForm" class="btn" style="background-color: #155DFC; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Add Note</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Handle "Add New Note" button click
        $(document).on('click', '.note-btn', function(e) {
            e.preventDefault();
            const clientId = $(this).data('client-id');

            if (!clientId) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Client ID not found',
                    confirmButtonColor: '#155DFC'
                });
                return;
            }

            // Set client ID in form
            $('#note_client_id').val(clientId);

            // Reset form
            $('#addNoteForm')[0].reset();
            $('#note_client_id').val(clientId);

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('addNoteModal'));
            modal.show();
        });

        // Handle note form submission
        $('#addNoteForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = form.serialize();

            $.ajax({
                url: '<?php echo e(url('/notes')); ?>',
                method: 'POST',
                data: formData,
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.success) {
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('addNoteModal'));
                        if (modal) {
                            modal.hide();
                        }

                        // Add new note to the notes container
                        const noteHtml = `
                            <div class="d-flex gap-3 align-items-start mb-3 note-item" data-note-id="${response.note.id}">
                                <div class="note-icon">
                                    <span>
                                        <svg width="17" height="21" viewBox="0 0 17 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.875 0C0.839467 0 0 0.839465 0 1.875V19.125C0 20.1605 0.839466 21 1.875 21H14.625C15.6605 21 16.5 20.1605 16.5 19.125V11.25C16.5 9.17893 14.8211 7.5 12.75 7.5H10.875C9.83947 7.5 9 6.66053 9 5.625V3.75C9 1.67893 7.32107 0 5.25 0H1.875ZM3.75 13.5C3.75 13.0858 4.08579 12.75 4.5 12.75H12C12.4142 12.75 12.75 13.0858 12.75 13.5C12.75 13.9142 12.4142 14.25 12 14.25H4.5C4.08579 14.25 3.75 13.9142 3.75 13.5ZM4.5 15.75C4.08579 15.75 3.75 16.0858 3.75 16.5C3.75 16.9142 4.08579 17.25 4.5 17.25H8.25C8.66421 17.25 9 16.9142 9 16.5C9 16.0858 8.66421 15.75 8.25 15.75H4.5Z"
                                                fill="#155DFC" />
                                            <path
                                                d="M9.22119 0.315905C10.018 1.23648 10.5 2.43695 10.5 3.75V5.625C10.5 5.83211 10.6679 6 10.875 6H12.75C14.0631 6 15.2635 6.48204 16.1841 7.27881C15.2962 3.87988 12.6201 1.20377 9.22119 0.315905Z"
                                                fill="#155DFC" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="w-100">
                                    <p class="mb-0">Note Added By
                                        <span class="fw-bold">${response.note.user_name}</span>
                                    </p>
                                    <div class="d-flex gap-1 align-items-center mb-2">
                                        <p class="mb-0">${response.note.created_at}</p>
                                        <span>
                                            <i class="ti ti-circle"
                                                style="color: #E2E8F0;font-size: 8px;"></i>
                                        </span>
                                        <p class="mb-0">
                                            ${response.note.created_at_time}
                                        </p>
                                    </div>
                                    <div style="background: #e8e8e8;padding: 10px;">${response.note.note}</div>
                                </div>
                            </div>
                        `;

                        // Remove empty message if exists
                        $('#notes-container .text-center').remove();

                        // Prepend new note to container
                        $('#notes-container').prepend(noteHtml);

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Note added successfully!',
                            confirmButtonColor: '#155DFC'
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Failed to add note';

                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            const errorMessages = [];
                            for (let field in errors) {
                                errorMessages.push(errors[field][0]);
                            }
                            errorMessage = errorMessages.join('<br>');
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                        confirmButtonColor: '#155DFC'
                    });
                }
            });
        });

        // Reset form when modal is closed
        $('#addNoteModal').on('hidden.bs.modal', function () {
            $('#addNoteForm')[0].reset();
        });

        // Handle "Add New" button click for Other Items
        $(document).on('click', '.add-other-item-btn', function(e) {
            e.preventDefault();
            const clientId = $(this).data('client-id');

            if (!clientId) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Client ID not found',
                    confirmButtonColor: '#155DFC'
                });
                return;
            }

            // Set client ID in form
            $('#other_item_client_id').val(clientId);

            // Reset form
            $('#addOtherItemForm')[0].reset();
            $('#other_item_client_id').val(clientId);
            $('#dynamic-fields-container').empty();

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('addOtherItemModal'));
            modal.show();
        });

        // Handle Item Type change - fetch and generate dynamic fields
        $('#other_item_type').on('change', function() {
            const itemId = $(this).val();
            const container = $('#dynamic-fields-container');

            if (!itemId) {
                container.empty();
                return;
            }

            // Show loading
            container.html('<div class="text-center py-3"><i class="ti ti-loader-2 spin"></i> Loading fields...</div>');

            $.ajax({
                url: '<?php echo e(url('/get-item-fields')); ?>',
                method: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    item_id: itemId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        container.empty();

                        if (response.fields.length === 0) {
                            container.html('<div class="alert alert-info">No custom fields configured for this item type.</div>');
                            return;
                        }

                        // Generate fields based on type
                        response.fields.forEach(function(field) {
                            let fieldHtml = '';
                            const fieldName = 'field_' + field.id;
                            const fieldId = 'field_' + field.id;

                            switch(field.type) {
                                case 'Free Text':
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="text" name="${fieldName}" id="${fieldId}" class="form-control my-input" placeholder="Enter ${field.name}">
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'date':
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="date" name="${fieldName}" id="${fieldId}" class="form-control my-input">
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'boolean':
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="${fieldName}" id="${fieldId}_yes" value="Yes">
                                                        <label class="form-check-label" for="${fieldId}_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="${fieldName}" id="${fieldId}_no" value="No">
                                                        <label class="form-check-label" for="${fieldId}_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'select':
                                    let selectOptions = '';
                                    if (field.values && Array.isArray(field.values)) {
                                        field.values.forEach(function(value) {
                                            selectOptions += `<option value="${value}">${value}</option>`;
                                        });
                                    }
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <select name="${fieldName}" id="${fieldId}" class="form-control my-input">
                                                    <option value="">Select ${field.name}</option>
                                                    ${selectOptions}
                                                </select>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'multi select':
                                    let multiSelectOptions = '';
                                    if (field.values && Array.isArray(field.values)) {
                                        field.values.forEach(function(value) {
                                            multiSelectOptions += `<option value="${value}">${value}</option>`;
                                        });
                                    }
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <select name="${fieldName}[]" id="${fieldId}" class="form-control my-input" multiple>
                                                    ${multiSelectOptions}
                                                </select>
                                                <small class="text-muted">Hold Ctrl/Cmd to select multiple options</small>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                default:
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="text" name="${fieldName}" id="${fieldId}" class="form-control my-input" placeholder="Enter ${field.name}">
                                            </div>
                                        </div>
                                    `;
                            }

                            container.append(fieldHtml);
                        });
                    } else {
                        container.html('<div class="alert alert-danger">' + (response.message || 'Error loading fields') + '</div>');
                    }
                },
                error: function(xhr) {
                    container.html('<div class="alert alert-danger">Error loading fields. Please try again.</div>');
                }
            });
        });

        // Handle Other Item form submission
        $('#addOtherItemForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = form.serialize();

            $.ajax({
                url: '<?php echo e(url('/other-data')); ?>',
                method: 'POST',
                data: formData,
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.success) {
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('addOtherItemModal'));
                        if (modal) {
                            modal.hide();
                        }

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Item added successfully!',
                            confirmButtonColor: '#155DFC'
                        }).then(() => {
                            // Reload page to show updated data
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Failed to add item';

                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            const errorMessages = [];
                            for (let field in errors) {
                                errorMessages.push(errors[field][0]);
                            }
                            errorMessage = errorMessages.join('<br>');
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                        confirmButtonColor: '#155DFC'
                    });
                }
            });
        });

        // Reset form when modal is closed
        $('#addOtherItemModal').on('hidden.bs.modal', function () {
            $('#addOtherItemForm')[0].reset();
            $('#dynamic-fields-container').empty();
        });

        // Handle "View" button click for Other Items
        $(document).on('click', '.view-other-item-btn', function(e) {
            e.preventDefault();
            const itemId = $(this).data('item-id');

            if (!itemId) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Item ID not found',
                    confirmButtonColor: '#155DFC'
                });
                return;
            }

            // Reset form
            $('#viewOtherItemForm')[0].reset();
            $('#view-dynamic-fields-container').empty();
            $('#view_other_item_type').prop('disabled', true);

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('viewOtherItemModal'));
            modal.show();

            // Fetch item data
            $.ajax({
                url: '<?php echo e(url('/other-data')); ?>/' + itemId,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success && response.otherData) {
                        const data = response.otherData;

                        // Set form values
                        $('#view_other_data_id').val(data.id);
                        $('#view_other_item_name').val(data.name);
                        $('#view_other_item_type').val(data.item_type_id);

                        // Generate fields with values
                        const container = $('#view-dynamic-fields-container');
                        container.empty();

                        if (data.fields.length === 0) {
                            container.html('<div class="alert alert-info">No custom fields configured for this item type.</div>');
                            return;
                        }

                        data.fields.forEach(function(field) {
                            let fieldHtml = '';
                            const fieldName = 'field_' + field.id;
                            const fieldId = 'view_field_' + field.id;
                            const fieldValue = field.value || '';

                            switch(field.type) {
                                case 'Free Text':
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="text" name="${fieldName}" id="${fieldId}" class="form-control my-input" placeholder="Enter ${field.name}" value="${fieldValue}">
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'date':
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="date" name="${fieldName}" id="${fieldId}" class="form-control my-input" value="${fieldValue}">
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'boolean':
                                    const yesChecked = fieldValue === 'Yes' ? 'checked' : '';
                                    const noChecked = fieldValue === 'No' ? 'checked' : '';
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="${fieldName}" id="${fieldId}_yes" value="Yes" ${yesChecked}>
                                                        <label class="form-check-label" for="${fieldId}_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="${fieldName}" id="${fieldId}_no" value="No" ${noChecked}>
                                                        <label class="form-check-label" for="${fieldId}_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'select':
                                    let selectOptions = '<option value="">Select ' + field.name + '</option>';
                                    if (field.values && Array.isArray(field.values)) {
                                        field.values.forEach(function(value) {
                                            const selected = value === fieldValue ? 'selected' : '';
                                            selectOptions += `<option value="${value}" ${selected}>${value}</option>`;
                                        });
                                    }
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <select name="${fieldName}" id="${fieldId}" class="form-control my-input">
                                                    ${selectOptions}
                                                </select>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'multi select':
                                    let multiSelectOptions = '';
                                    const selectedValues = Array.isArray(fieldValue) ? fieldValue : (fieldValue ? [fieldValue] : []);
                                    if (field.values && Array.isArray(field.values)) {
                                        field.values.forEach(function(value) {
                                            const selected = selectedValues.includes(value) ? 'selected' : '';
                                            multiSelectOptions += `<option value="${value}" ${selected}>${value}</option>`;
                                        });
                                    }
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <select name="${fieldName}[]" id="${fieldId}" class="form-control my-input" multiple>
                                                    ${multiSelectOptions}
                                                </select>
                                                <small class="text-muted">Hold Ctrl/Cmd to select multiple options</small>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                default:
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="text" name="${fieldName}" id="${fieldId}" class="form-control my-input" placeholder="Enter ${field.name}" value="${fieldValue}">
                                            </div>
                                        </div>
                                    `;
                            }

                            container.append(fieldHtml);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message || 'Failed to load item data',
                            confirmButtonColor: '#155DFC'
                        });
                        modal.hide();
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to load item data: ' + (xhr.responseJSON?.message || 'Unknown error'),
                        confirmButtonColor: '#155DFC'
                    });
                    modal.hide();
                }
            });
        });

        // Handle View/Edit Other Item form submission
        $('#viewOtherItemForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = form.serialize();
            const itemId = $('#view_other_data_id').val();

            $.ajax({
                url: '<?php echo e(url('/other-data')); ?>/' + itemId,
                method: 'POST',
                data: formData + '&_method=PUT',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.success) {
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('viewOtherItemModal'));
                        if (modal) {
                            modal.hide();
                        }

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Item updated successfully!',
                            confirmButtonColor: '#155DFC'
                        }).then(() => {
                            // Reload page to show updated data
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Failed to update item';

                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            const errorMessages = [];
                            for (let field in errors) {
                                errorMessages.push(errors[field][0]);
                            }
                            errorMessage = errorMessages.join('<br>');
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                        confirmButtonColor: '#155DFC'
                    });
                }
            });
        });

        // Reset form when view modal is closed
        $('#viewOtherItemModal').on('hidden.bs.modal', function () {
            $('#viewOtherItemForm')[0].reset();
            $('#view-dynamic-fields-container').empty();
            $('#view_other_item_type').prop('disabled', true);
        });

        // Function to calculate days remaining from today to next maintenance day
        function calculateDaysRemaining(nextMaintenanceDate) {
            if (!nextMaintenanceDate) {
                return '';
            }
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            const nextDate = new Date(nextMaintenanceDate);
            nextDate.setHours(0, 0, 0, 0);
            
            const diffTime = nextDate - today;
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            return diffDays >= 0 ? diffDays : 0;
        }

        // Calculate days remaining for Compressor A and B on page load
        function updateCompressorDaysRemaining() {
            // Compressor A
            const compressorANext = $('#compressor_a_next_value').val();
            if (compressorANext) {
                const daysA = calculateDaysRemaining(compressorANext);
                $('#compressor_a_days_display').val(daysA !== '' ? daysA + ' days' : '');
            }

            // Compressor B
            const compressorBNext = $('#compressor_b_next_value').val();
            if (compressorBNext) {
                const daysB = calculateDaysRemaining(compressorBNext);
                $('#compressor_b_days_display').val(daysB !== '' ? daysB + ' days' : '');
            }
        }

        // Calculate on page load
        updateCompressorDaysRemaining();

        // Handle status change
        $(document).on('click', '.change-status-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const newStatus = $(this).data('status');
            const clientId = $(this).data('client-id');
            const currentStatus = '<?php echo e(strtolower($client->status ?? "active")); ?>';
            
            // Don't show modal if status is already the same
            if (newStatus.toLowerCase() === currentStatus) {
                // Close dropdown
                $('.dropdown-menu').removeClass('show');
                return;
            }
            
            const statusText = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
            
            // Show confirmation modal
            Swal.fire({
                title: 'Change Client Status?',
                html: `Are you sure you want to change this client's status to <strong>${statusText}</strong>?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#155DFC',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, change it',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Update status via AJAX
                    $.ajax({
                        url: '<?php echo e(url('/clients')); ?>/' + clientId + '/status',
                        method: 'PUT',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>',
                            status: newStatus,
                            _method: 'PUT'
                        },
                        dataType: 'json',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            if (response.success) {
                                // Update the button text
                                $('#statusDropdownBtn').html(statusText + ' <i class="mdi mdi-chevron-down"></i>');
                                
                                // Close dropdown
                                $('.dropdown-menu').removeClass('show');
                                
                                // Show success message
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Status Updated!',
                                    text: `Client status has been changed to ${statusText}.`,
                                    confirmButtonColor: '#155DFC',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        },
                        error: function(xhr) {
                            let errorMessage = 'Failed to update client status';
                            
                            if (xhr.responseJSON) {
                                if (xhr.responseJSON.message) {
                                    errorMessage = xhr.responseJSON.message;
                                } else if (xhr.responseJSON.errors) {
                                    const errors = xhr.responseJSON.errors;
                                    const errorMessages = [];
                                    for (let field in errors) {
                                        errorMessages.push(errors[field][0]);
                                    }
                                    errorMessage = errorMessages.join('<br>');
                                }
                            }
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                html: errorMessage,
                                confirmButtonColor: '#155DFC'
                            });
                        }
                    });
                }
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u246429533/domains/gemdentalrepair.com/public_html/crm/resources/views/client_view.blade.php ENDPATH**/ ?>