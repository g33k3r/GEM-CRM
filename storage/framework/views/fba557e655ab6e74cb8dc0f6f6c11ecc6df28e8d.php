<?php $__env->startSection('content'); ?>

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab p-0">

            <div class="container-fluid  p-0">
                <!-- Page-Title -->
                <div class="top-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4 class="page-title text-white font-30 mb-2 mt-2">Hello <?php echo e(session()->get('adminAuth')[0]['name']); ?>.</h4>
                                        <p class="text-white">Your complete business snapshot, all in one place.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!--end page-title-box-->
                        </div>
                        <!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="top-card">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="circle">

                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 9.5C7.10457 9.5 8 8.60457 8 7.5C8 6.39543 7.10457 5.5 6 5.5C4.89543 5.5 4 6.39543 4 7.5C4 8.60457 4.89543 9.5 6 9.5Z"
                                                            fill="white" />
                                                        <path
                                                            d="M12.5 6C11.6716 6 11 6.67157 11 7.5C11 8.32843 11.6716 9 12.5 9H26.5C27.3284 9 28 8.32843 28 7.5C28 6.67157 27.3284 6 26.5 6H12.5Z"
                                                            fill="white" />
                                                        <path
                                                            d="M12.5 14.5C11.6716 14.5 11 15.1716 11 16C11 16.8284 11.6716 17.5 12.5 17.5H26.5C27.3284 17.5 28 16.8284 28 16C28 15.1716 27.3284 14.5 26.5 14.5H12.5Z"
                                                            fill="white" />
                                                        <path
                                                            d="M12.5 23C11.6716 23 11 23.6716 11 24.5C11 25.3284 11.6716 26 12.5 26H26.5C27.3284 26 28 25.3284 28 24.5C28 23.6716 27.3284 23 26.5 23H12.5Z"
                                                            fill="white" />
                                                        <path
                                                            d="M8 24.5C8 25.6046 7.10457 26.5 6 26.5C4.89543 26.5 4 25.6046 4 24.5C4 23.3954 4.89543 22.5 6 22.5C7.10457 22.5 8 23.3954 8 24.5Z"
                                                            fill="white" />
                                                        <path
                                                            d="M6 18C7.10457 18 8 17.1046 8 16C8 14.8954 7.10457 14 6 14C4.89543 14 4 14.8954 4 16C4 17.1046 4.89543 18 6 18Z"
                                                            fill="white" />
                                                    </svg>

                                                </div>

                                            </div>
                                            <div class="col">
                                                <span class="h4">Upcoming Jobs</span>
                                                <p class="h4 fw-bold" style="font-size:50px"><?php echo e($upcomingJobsCount ?? 0); ?></p>
                                                <h6 class="  mt-2 m-0 font-12 fw-light d-flex align-items-center gap-1">


                                                </h6>
                                            </div>
                                            <!--end col-->

                                        </div> <!-- end row -->
                                    </div>
                                    <!--end card-body-->
                                </div>
                            </div>

                        </div>
                        <!--end col-->
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="top-card">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="circle">

                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M16 3C8.8203 3 3 8.8203 3 16C3 23.1797 8.8203 29 16 29C23.1797 29 29 23.1797 29 16C29 8.8203 23.1797 3 16 3ZM17 8C17 7.44772 16.5523 7 16 7C15.4477 7 15 7.44772 15 8V16C15 16.5523 15.4477 17 16 17H22C22.5523 17 23 16.5523 23 16C23 15.4477 22.5523 15 22 15H17V8Z"
                                                              fill="white" />
                                                    </svg>

                                                </div>

                                            </div>
                                            <div class="col">
                                                <span class="h4">Pending Tasks</span>
                                                <p class="h4 fw-bold" style="font-size:50px"><?php echo e($pendingTasksCount ?? 0); ?></p>
                                                <h6 class="  mt-2 m-0 font-12 fw-light d-flex align-items-center gap-1">


                                                </h6>
                                            </div>
                                            <!--end col-->

                                        </div> <!-- end row -->
                                    </div>
                                    <!--end card-body-->
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="top-card">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="circle">

                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M10.0024 8H14.9969L15 8H19.5065C21.9887 8.00357 23.9999 10.0169 23.9999 12.5V25C26.209 25 27.9999 23.2091 27.9999 21V8.14429C27.9999 6.13709 26.5002 4.39547 24.4478 4.22512C24.1494 4.20036 23.8505 4.17761 23.551 4.15689C22.8844 2.8753 21.5444 2 20 2H18C16.4556 2 15.1156 2.87529 14.449 4.15687C14.1494 4.17759 13.8504 4.20035 13.5519 4.22512C11.5489 4.39137 10.0723 6.05426 10.0024 8ZM18 4C16.8954 4 16 4.89543 16 6H22C22 4.89543 21.1046 4 20 4H18Z"
                                                              fill="white" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M4 12.5C4 11.1193 5.11929 10 6.5 10H19.5C20.8807 10 22 11.1193 22 12.5V27.5C22 28.8807 20.8807 30 19.5 30H6.5C5.11929 30 4 28.8807 4 27.5V12.5ZM16.7809 18.6247C17.1259 18.1934 17.056 17.5641 16.6247 17.2191C16.1934 16.8741 15.5641 16.944 15.2191 17.3753L11.9171 21.5029L10.7071 20.2929C10.3166 19.9024 9.68342 19.9024 9.29289 20.2929C8.90237 20.6834 8.90237 21.3166 9.29289 21.7071L11.2929 23.7071C11.494 23.9082 11.7713 24.0142 12.0553 23.9985C12.3393 23.9827 12.6032 23.8468 12.7809 23.6247L16.7809 18.6247Z"
                                                              fill="white" />
                                                    </svg>

                                                </div>

                                            </div>
                                            <div class="col">
                                                <span class="h4">Jobs Completed</span>
                                                <p class="h4 fw-bold" style="font-size:50px"><?php echo e($jobsCompletedCount ?? 0); ?></p>
                                                <h6 class="  mt-2 m-0 font-12 fw-light d-flex align-items-center gap-1">

                                                </h6>
                                            </div>
                                            <!--end col-->

                                        </div> <!-- end row -->
                                    </div>
                                    <!--end card-body-->
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="top-card">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="circle">

                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 8.5C6 5.46243 8.46243 3 11.5 3C14.5376 3 17 5.46243 17 8.5C17 11.5376 14.5376 14 11.5 14C8.46243 14 6 11.5376 6 8.5Z"
                                                            fill="white" />
                                                        <path
                                                            d="M19 11.5C19 9.01472 21.0147 7 23.5 7C25.9853 7 28 9.01472 28 11.5C28 13.9853 25.9853 16 23.5 16C21.0147 16 19 13.9853 19 11.5Z"
                                                            fill="white" />
                                                        <path
                                                            d="M2 25.5C2 20.2533 6.25329 16 11.5 16C16.7467 16 21 20.2533 21 25.5V25.5034C21 25.5565 20.9995 25.6098 20.9986 25.6626C20.9928 26.0073 20.8099 26.3246 20.5146 26.5025C17.8809 28.0882 14.7954 29 11.5 29C8.20457 29 5.11906 28.0882 2.48541 26.5025C2.19008 26.3246 2.00716 26.0073 2.00137 25.6626C2.00046 25.6085 2 25.5543 2 25.5Z"
                                                            fill="white" />
                                                        <path
                                                            d="M22.9998 25.5042C22.9998 25.5683 22.9992 25.6325 22.9981 25.6962C22.9905 26.1477 22.8816 26.5837 22.6876 26.9759C22.9563 26.9919 23.2271 27 23.4998 27C25.6274 27 27.6427 26.5071 29.4352 25.6283C29.7646 25.4669 29.9791 25.1381 29.9942 24.7716C29.9979 24.6815 29.9998 24.5909 29.9998 24.5C29.9998 20.9101 27.0896 18 23.4998 18C22.5045 18 21.5615 18.2237 20.7183 18.6235C22.1513 20.5415 22.9998 22.9217 22.9998 25.5V25.5042Z"
                                                            fill="white" />
                                                    </svg>

                                                </div>

                                            </div>
                                            <div class="col">
                                                <span class="h4">Active Clients</span>
                                                <p class="h4 fw-bold" style="font-size:50px"><?php echo e($activeClientsCount ?? 0); ?></p>
                                                <h6 class="  mt-2 m-0 font-12 fw-light d-flex align-items-center gap-1">

                                                </h6>
                                            </div>
                                            <!--end col-->

                                        </div> <!-- end row -->
                                    </div>
                                    <!--end card-body-->
                                </div>
                            </div>
                        </div>
                        <!--end col-->

                    </div>
                    <!--end row-->
                </div>

                <div class="card mb-0"
                     style="border-top-left-radius: 15px; border-top-right-radius: 15px;border:6px solid white;">
                    <div class="card-body"
                         style="border-top-left-radius: 15px; border-top-right-radius: 15px;background-color: #F1F5F9">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title fw-bold mt-3">Jobs Overview</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <div id="patients-survey" class="apex-charts mt-3"></div>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title fw-bold mt-3">Business</h4>

                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-header-->
                                    <div class="card-body">
                                        <div class="apexchart-wrapper">
                                            <div id="chart2" class="apex-charts"></div>
                                        </div>



                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title fw-bold mt-3">January</h4>

                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-header-->
                                    <div class="card-body">
                                        <div class="apexchart-wrapper">
                                            <div id="chart" class="apex-charts"></div>
                                        </div>

                                    </div>
                                    <!--end card-body-->
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-12">
                                                <h4 class="card-title fw-bold mt-3 mb-1">Upcoming Jobs</h4>
                                                <p style="color:#94A3B8" class="mb-0">

                                                    Track your latest work updates in one glance
                                                </p>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-4 col-12 ">
                                                <div class="row align-items-center">
                                                    <div class="col-md-4 col-12 my-see-all-btn"
                                                         style="border-right: 1px solid #F1F5F9">
                                                        <a href="#" class="see-all-btn">See All</a>
                                                    </div>
                                                    <div class="col-md-8 col-12 ">
                                                        <div class="relative">
                                                            <input id="data-search" type="search"
                                                                   class="form-control custom-search" placeholder="Search..">
                                                            <i class="ti ti-search my-icon"></i>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-header-->
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
                                                    <th>Compress Model</th>
                                                    <th>Status</th>

                                                    <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $upcomingJobs ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <span class="tble-clr"><?php echo e($job->created_at ? $job->created_at->format('m/d/y') : 'N/A'); ?></span>
                                                        <p class="mb-0 tble-time"><?php echo e($job->created_at ? $job->created_at->format('h:i a') : ''); ?></p>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <span class="tble-clr">Sunnyvale Family Dentistry</span>
                                                                <p class="mb-0 tble-time">Contact Number: +92 3042328820
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <a href="#">

                                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10.6667 8.59992V11.3999C10.6667 13.7333 9.73334 14.6666 7.40001 14.6666H4.60001C2.26668 14.6666 1.33334 13.7333 1.33334 11.3999V8.59992C1.33334 6.26659 2.26668 5.33325 4.60001 5.33325H7.40001C9.73334 5.33325 10.6667 6.26659 10.6667 8.59992Z"
                                                                            stroke="#CAD5E2" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M14.6667 4.59992V7.39992C14.6667 9.73325 13.7333 10.6666 11.4 10.6666H10.6667V8.59992C10.6667 6.26659 9.73334 5.33325 7.40001 5.33325H5.33334V4.59992C5.33334 2.26659 6.26668 1.33325 8.60001 1.33325H11.4C13.7333 1.33325 14.6667 2.26659 14.6667 4.59992Z"
                                                                            stroke="#CAD5E2" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>

                                                                </a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <span class="tble-clr">Ella Martinez</span>
                                                                <p class="mb-0 tble-time">Contact Number: +92 3042328820
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <a href="#">

                                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10.6667 8.59992V11.3999C10.6667 13.7333 9.73334 14.6666 7.40001 14.6666H4.60001C2.26668 14.6666 1.33334 13.7333 1.33334 11.3999V8.59992C1.33334 6.26659 2.26668 5.33325 4.60001 5.33325H7.40001C9.73334 5.33325 10.6667 6.26659 10.6667 8.59992Z"
                                                                            stroke="#CAD5E2" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M14.6667 4.59992V7.39992C14.6667 9.73325 13.7333 10.6666 11.4 10.6666H10.6667V8.59992C10.6667 6.26659 9.73334 5.33325 7.40001 5.33325H5.33334V4.59992C5.33334 2.26659 6.26668 1.33325 8.60001 1.33325H11.4C13.7333 1.33325 14.6667 2.26659 14.6667 4.59992Z"
                                                                            stroke="#CAD5E2" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>

                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="tble-clr">Lakeside</span></td>
                                                    <td><span class="tble-clr">1098</span></td>
                                                    <td><span class="tble-clr">123 Wellness Ave, Suite 100, Healthtown,
                                                            HT 12345</span></td>
                                                    <td><span class="tble-clr">100012</span></td>
                                                    <td>
                                                        <span class="active-status">
                                                            Active
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="#" type="button" class="dropdown-toggle"
                                                           data-bs-toggle="dropdown" aria-expanded="false">

                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M7.99996 8.66659C8.36815 8.66659 8.66663 8.36811 8.66663 7.99992C8.66663 7.63173 8.36815 7.33325 7.99996 7.33325C7.63177 7.33325 7.33329 7.63173 7.33329 7.99992C7.33329 8.36811 7.63177 8.66659 7.99996 8.66659Z"
                                                                    stroke="#90A1B9" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M12.6666 8.66659C13.0348 8.66659 13.3333 8.36811 13.3333 7.99992C13.3333 7.63173 13.0348 7.33325 12.6666 7.33325C12.2984 7.33325 12 7.63173 12 7.99992C12 8.36811 12.2984 8.66659 12.6666 8.66659Z"
                                                                    stroke="#90A1B9" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M3.33329 8.66659C3.70148 8.66659 3.99996 8.36811 3.99996 7.99992C3.99996 7.63173 3.70148 7.33325 3.33329 7.33325C2.9651 7.33325 2.66663 7.63173 2.66663 7.99992C2.66663 8.36811 2.9651 8.66659 3.33329 8.66659Z"
                                                                    stroke="#90A1B9" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>

                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#"><i class="ti ti-pencil" style="margin-right:5px"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i class="ti ti-eye" style="margin-right:5px"></i> View</a>
                                                            <a class="dropdown-item" href="#"><i class="ti ti-trash" style="margin-right:5px"></i> Delete</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div>
                </div>

            </div><!-- container -->

            <!--Start Rightbar-->
            <!--Start Rightbar/offcanvas-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                    <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <h6>Account Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch1">
                            <label class="form-check-label" for="settings-switch1">Auto updates</label>
                        </div>
                        <!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                            <label class="form-check-label" for="settings-switch2">Location Permission</label>
                        </div>
                        <!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch3">
                            <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                        </div>
                        <!--end form-switch-->
                    </div>
                    <!--end /div-->
                    <h6>General Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch4">
                            <label class="form-check-label" for="settings-switch4">Show me Online</label>
                        </div>
                        <!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                            <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                        </div>
                        <!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch6">
                            <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                        </div>
                        <!--end form-switch-->
                    </div>
                    <!--end /div-->
                </div>
                <!--end offcanvas-body-->
            </div>

        </div>
        <!-- end page content -->
    </div>

    <script>
        // Line chart for monthly jobs completed (#patients-survey)
        document.addEventListener('DOMContentLoaded', function() {
            const monthlyData = <?php echo json_encode($monthlyJobsCompleted ?? [], 15, 512) ?>;
            const monthlyLabels = <?php echo json_encode($monthlyLabels ?? [], 15, 512) ?>;

            const lineChartOptions = {
                series: [{
                    name: 'Jobs Completed',
                    data: monthlyData
                }],
                chart: {
                    type: 'line',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                xaxis: {
                    categories: monthlyLabels,
                    labels: {
                        rotate: -45,
                        rotateAlways: true
                    }
                },
                yaxis: {
                    title: {
                        text: 'Number of Jobs'
                    }
                },
                colors: ['#1447E6'],
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + ' jobs'
                        }
                    }
                },
                title: {
                    text: 'Jobs Completed Over Time',
                    align: 'left',
                    style: {
                        fontSize: '16px'
                    }
                }
            };

            const lineChart = new ApexCharts(document.querySelector("#patients-survey"), lineChartOptions);
            lineChart.render();
        });

        // Donut chart for new vs repeated clients (#chart2)
        document.addEventListener('DOMContentLoaded', function() {
            const newClients = <?php echo json_encode($newClientsCount ?? 0, 15, 512) ?>;
            const repeatedClients = <?php echo json_encode($repeatedClientsCount ?? 0, 15, 512) ?>;

            const options = {
                series: [newClients, repeatedClients],
                chart: {
                    type: 'donut',
                    height: 380,
                    toolbar: {
                        show: false
                    }
                },
                labels: ['New Clients', 'Repeated Clients'],
                colors: ['#FF9900', '#1E78FE'],
                legend: {
                    position: 'bottom',
                    labels: {
                        colors: '#334155',
                        useSeriesColors: false
                    }
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '14px',
                        colors: ['#fff']
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + ' Clients'
                        }
                    }
                }
            };
            const chart = new ApexCharts(document.querySelector("#chart2"), options);
            chart.render();
        });

        // Heatmap chart for January (#chart) - keeping existing functionality
        document.addEventListener('DOMContentLoaded', function() {
            function generateData(count, yrange) {
                const series = [];
                for (let i = 0; i < count; i++) {
                    const x = 'C' + (i + 1);
                    const y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                    series.push({
                        x: x,
                        y: y
                    });
                }
                return series;
            }

            const options = {
                series: [{
                    name: '',
                    data: generateData(18, {
                        min: 0,
                        max: 90
                    })
                },
                    {
                        name: '',
                        data: generateData(18, {
                            min: 0,
                            max: 90
                        })
                    },
                    {
                        name: '',
                        data: generateData(18, {
                            min: 0,
                            max: 90
                        })
                    },
                    {
                        name: '',
                        data: generateData(18, {
                            min: 0,
                            max: 90
                        })
                    },
                    {
                        name: '',
                        data: generateData(18, {
                            min: 0,
                            max: 90
                        })
                    },
                    {
                        name: '',
                        data: generateData(18, {
                            min: 0,
                            max: 90
                        })
                    },
                    {
                        name: '',
                        data: generateData(18, {
                            min: 0,
                            max: 90
                        })
                    },
                    {
                        name: '',
                        data: generateData(18, {
                            min: 0,
                            max: 90
                        })
                    },
                    {
                        name: '',
                        data: generateData(18, {
                            min: 0,
                            max: 90
                        })
                    }
                ],
                chart: {
                    height: 350,
                    type: 'heatmap',
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                title: {
                    text: '',
                    style: {
                        fontSize: '18px'
                    }
                },
                xaxis: {
                    type: 'category',
                    labels: {
                        show: false
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                },
                plotOptions: {
                    heatmap: {
                        radius: 2,
                        shadeIntensity: 0.6,
                        colorScale: {
                            ranges: [{
                                from: 0,
                                to: 30,
                                name: 'Available',
                                color: '#E2E8F0'
                            },
                                {
                                    from: 31,
                                    to: 60,
                                    name: 'Slots Left',
                                    color: '#8EC5FF'
                                },
                                {
                                    from: 61,
                                    to: 100,
                                    name: 'Fully Booked',
                                    color: '#1447E6'
                                },
                            ]
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: val => val + ' units'
                    }
                },
                legend: {
                    show: true,
                    position: 'bottom'
                }
            };
            const chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u246429533/domains/gemdentalrepair.com/public_html/crm/resources/views/index.blade.php ENDPATH**/ ?>