<?php $__env->startSection('content'); ?>

    <style>
        /* Photo Upload Styles */
        .photo-upload-area {
            transition: all 0.3s ease;
        }

        .upload-zone {
            transition: all 0.3s ease;
            cursor: pointer;
            background: rgba(13, 110, 253, 0.05);
        }

        .upload-zone:hover {
            background: rgba(13, 110, 253, 0.1);
            border-color: #0d6efd !important;
        }

        .upload-zone.dragover {
            background: rgba(13, 110, 253, 0.15);
            border-color: #0d6efd !important;
            transform: scale(1.02);
        }

        .photos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .photo-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .photo-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .photo-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            cursor: pointer;
        }

        .photo-item .photo-actions {
            position: absolute;
            top: 5px;
            right: 5px;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .photo-item:hover .photo-actions {
            opacity: 1;
        }

        .photo-item .delete-btn {
            background: rgba(220, 53, 69, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
        }

        .photo-item .delete-btn:hover {
            background: rgba(220, 53, 69, 1);
        }

        /* Lightbox Styles */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(5px);
        }

        .lightbox-content {
            position: relative;
            margin: auto;
            padding: 0;
            width: 90%;
            max-width: 1200px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox img {
            max-width: 100%;
            max-height: 90vh;
            width: auto;
            height: auto;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        /* Responsive adjustments for very large images */
        @media (max-width: 768px) {
            .lightbox img {
                max-height: 80vh;
                max-width: 95%;
            }

            .lightbox-content {
                width: 95%;
            }
        }

        @media (max-width: 480px) {
            .lightbox img {
                max-height: 70vh;
                max-width: 98%;
            }

            .lightbox-content {
                width: 98%;
            }
        }

        .lightbox-close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 10000;
        }

        .lightbox-close:hover,
        .lightbox-close:focus {
            color: #bbb;
            text-decoration: none;
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #f1f1f1;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            padding: 10px;
            user-select: none;
        }

        .lightbox-prev {
            left: 15px;
        }

        .lightbox-next {
            right: 15px;
        }

        .lightbox-nav:hover {
            color: #bbb;
        }

        .lightbox-counter {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: #f1f1f1;
            font-size: 16px;
            background: rgba(0, 0, 0, 0.7);
            padding: 8px 16px;
            border-radius: 20px;
        }

        /* Loading spinner */
        .photo-loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #0d6efd;
        }

        /* Empty state */
        .photos-empty {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
        }

        .photos-empty i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }

    </style>

    <?php

    function generateRandomColorWithContrast(){
        // Generate random red, green, blue values for the first color
        $red = dechex(rand(0, 255));
        $green = dechex(rand(0, 255));
        $blue = dechex(rand(0, 255));

        // Ensure two characters for each color code
        $red = str_pad($red, 2, "0", STR_PAD_LEFT);
        $green = str_pad($green, 2, "0", STR_PAD_LEFT);
        $blue = str_pad($blue, 2, "0", STR_PAD_LEFT);

        // Combine to form the first color (hex code)
        $color1 = $red . $green . $blue;

        // Calculate the brightness of the first color (luminosity formula)
        $brightness = (0.2126 * hexdec($red) + 0.7152 * hexdec($green) + 0.0722 * hexdec($blue));

        // If brightness is greater than 128, consider color1 light (use black for contrast)
        if ($brightness > 128) {
            $color2 = "000000"; // Black for light color
        } else {
            $color2 = "FFFFFF"; // White for dark color
        }

        return [$color1, $color2]; // Return both colors
    }
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->



    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">All Leads</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active">Leads</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">All Leads</h4>

                                <div class="flex-shrink-0">

                                    <button type="button" class="btn btn-soft-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalgrid">
                                        <i class="ri-add-circle-line align-middle me-1"></i> Add Lead
                                    </button>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <!-- <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-activeLeads" data-bs-toggle="tab" data-bs-target="#nav-activeLeads" type="button" role="tab" aria-controls="nav-activeLeads" aria-selected="true">Home</button>
                                        <button class="nav-link" id="nav-closedLeads" data-bs-toggle="tab" data-bs-target="#nav-closedLeads" type="button" role="tab" aria-controls="nav-closedLeads" aria-selected="false">Profile</button>

                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-activeLeads" role="tabpanel" aria-labelledby="nav-activeLeads" tabindex="0">
                                        Active Leads
                                    </div>
                                    <div class="tab-pane fade" id="nav-closedLeads" role="tabpanel" aria-labelledby="nav-closedLeads" tabindex="0">
                                        Closed
                                    </div>
                                </div> -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-activeLeads-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-activeLeads" type="button" role="tab"
                                                aria-controls="nav-activeLeads" aria-selected="true">Active
                                        </button>
                                        <button class="nav-link" id="nav-closedLeads-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-closedLeads" type="button" role="tab"
                                                aria-controls="nav-closedLeads" aria-selected="false">Closed
                                        </button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-activeLeads" role="tabpanel" aria-labelledby="nav-activeLeads-tab" tabindex="0">
                                        <div class="live-preview1">
                                            <div class="table-responsive table-card mt-0">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">Address</th>
                                                        <th scope="col">Assigned To</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Follow up</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if(in_array($lead['status'],['pending','approved','denied'])): ?>
                                                        <?php
                                                            $shouldRed = false;
                                                            $msg = "";
                                                            $isPendingOver24Hours = false;
                                                            if($lead['status'] == 'pending') {
                                                                $createdAt = \Carbon\Carbon::parse($lead['status_update_date']);
                                                                $isPendingOver24Hours = $createdAt->diffInHours(now()) >= 24;
                                                                if($isPendingOver24Hours){
                                                                    $shouldRed = true;
                                                                }
                                                                $msg = "Lead not accepted within 24 hours";
                                                            }
                                                            if($lead['status'] == 'denied') {
                                                                $shouldRed = true;
                                                                $msg = "Lead not accepted";
                                                            }
                                                            if($lead['status'] == 'approved' && empty($lead['appointment']) ) {
                                                                $shouldRed = true;
                                                                $sinceApproved = \Carbon\Carbon::parse($lead['status_update_date']);
                                                                $isPendingOver48Hours = $sinceApproved->diffInHours(now()) >= 48;
                                                                $msg = "No appointment scheduled within 48 hours";
                                                            }
                                                        ?>
                                                        <tr <?php if($shouldRed): ?> class="table-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e($msg); ?>" <?php endif; ?>>
                                                            <td>#<?php echo e($lead['id']); ?></td>
                                                            <td style="cursor: pointer;"
                                                                onclick="showLeadDetails(<?php echo e($lead['id']); ?>)"
                                                                title="Click to view lead details">
                                                                <div
                                                                    style="display: flex; gap: 10px;">
                                                                    <div>
                                                                            <?php
                                                                            $colors = generateRandomColorWithContrast();
                                                                            ?>
                                                                        <img style="width: 50px" class="rounded-circle"
                                                                             src="https://ui-avatars.com/api/?name=<?php echo e($lead['customer_name']); ?>&background=<?php echo e($colors[0]); ?>&color=<?php echo e($colors[1]); ?>"
                                                                             alt="">
                                                                    </div>
                                                                    <div>
                                                                        <?php echo e($lead['customer_name']); ?>

                                                                        <br>
                                                                        <span
                                                                            class="text-muted"><?php echo e($lead['phone1']); ?></span>
                                                                        <br>
                                                                        <span
                                                                            class="text-muted"><?php echo e($lead['email']); ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php echo e($lead['address']); ?>

                                                                <br>
                                                                <?php echo e($lead['city']); ?> - <?php echo e($lead['state']); ?>

                                                                <br>
                                                                <?php echo e($lead['zip']); ?>

                                                            </td>
                                                            <td> <?php echo e($lead['assigned_details']); ?> </td>
                                                            <td>
                                                                    <?php
                                                                    $class = "";
                                                                    $btnTxt = "";
                                                                    if ($lead['status'] == 'pending') {
                                                                        $btnTxt = "Pending";
                                                                        if ($isPendingOver24Hours) {
                                                                            $btnTxt = "Pending (Over 24 Hours)";
                                                                            $class = 'danger';
                                                                        } else {
                                                                            $class = "secondary";
                                                                        }
                                                                    } elseif ($lead['status'] == 'approved') {
                                                                        $btnTxt = "Approved";
                                                                        $class = 'success';
                                                                    } elseif ($lead['status'] == 'denied') {
                                                                        $class = 'danger';
                                                                    } else {
                                                                        $class = 'success';
                                                                        if($lead['status'] == 'sold'){
                                                                            $btnTxt = "Completed";
                                                                        }elseif($lead['status'] == 'estimate_complete'){
                                                                            $btnTxt = "Estimate Completed";
                                                                        }elseif($lead['status'] == 'no_contact'){
                                                                            $class = 'danger';
                                                                            $btnTxt = "No Contact/Dead Lead";
                                                                        }

                                                                    }

                                                                    ?>


                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                    style="padding: 0 5px;"
                                                                            class="btn btn-<?php echo e($class); ?> <?php echo e($class != 'danger' ? 'dropdown-toggle' : ''); ?>"
                                                                            <?php if ($class != 'danger'){ ?> data-bs-toggle="dropdown"
                                                                            aria-expanded="false" <?php } ?>>
                                                                        <?php echo e($btnTxt); ?>

                                                                    </button>
                                                                        <?php if ($class != 'danger'){ ?>
                                                                    <ul class="dropdown-menu">
                                                                        <?php if($lead['status'] == 'approved'){ ?>
                                                                            <li>
                                                                                <a class="dropdown-item" href="javascript:void(0);" onClick="markAsCompleted('<?php echo e($lead['id']); ?>', '<?php echo e($lead['status']); ?>')">Mark as Completed</a>
                                                                            </li>
                                                                        <?php }elseif($lead['status'] == 'pending'){ ?>
                                                                            <li>
                                                                                <a class="dropdown-item" href="<?php echo e(url('markAs/'.$lead['id'].'/approved')); ?>">Approve</a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item" href="<?php echo e(url('markAs/'.$lead['id'].'/denied')); ?>">Reject</a>
                                                                            </li>
                                                                        <?php } ?>

                                                                    </ul>
                                                                    <?php } ?>
                                                                </div>
                                                            </td>
                                                            <td><?php echo e((!empty($lead['followup'])) ? date('m/d/Y H:i', strtotime($lead['followup'])) : '-'); ?></td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <button type="button"
                                                                            class="btn btn-sm btn-outline-primary"
                                                                            onclick="editLead(<?php echo e($lead['id']); ?>)"
                                                                            title="Edit Lead">
                                                                        <i class="ri-edit-line"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn btn-sm btn-outline-danger"
                                                                            onclick="deleteLead(<?php echo e($lead['id']); ?>)"
                                                                            title="Delete Lead">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td colspan="6" class="text-center">No leads found</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-closedLeads" role="tabpanel" aria-labelledby="nav-closedLeads-tab" tabindex="0">
                                        <div class="live-preview1">
                                            <div class="table-responsive table-card mt-0">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">Address</th>
                                                        <th scope="col">Assigned To</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Follow up</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if(!in_array($lead['status'],['pending','approved','denied'])): ?>
                                                            <?php
                                                                $shouldRed = false;
                                                                $msg = "";
                                                                $isPendingOver24Hours = false;
                                                                if($lead['status'] == 'pending') {
                                                                    $createdAt = \Carbon\Carbon::parse($lead['status_update_date']);
                                                                    $isPendingOver24Hours = $createdAt->diffInHours(now()) >= 24;
                                                                    if($isPendingOver24Hours){
                                                                        $shouldRed = true;
                                                                    }
                                                                    $msg = "Lead not accepted within 24 hours";
                                                                }
                                                                if($lead['status'] == 'denied') {
                                                                    $shouldRed = true;
                                                                    $msg = "Lead not accepted";
                                                                }
                                                                if($lead['status'] == 'approved' && empty($lead['appointment']) ) {
                                                                    $shouldRed = true;
                                                                    $sinceApproved = \Carbon\Carbon::parse($lead['status_update_date']);
                                                                    $isPendingOver48Hours = $sinceApproved->diffInHours(now()) >= 48;
                                                                    $msg = "No appointment scheduled within 48 hours";
                                                                }
                                                            ?>
                                                            <tr <?php if($shouldRed): ?> class="table-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e($msg); ?>" <?php endif; ?>>
                                                                <td>#<?php echo e($lead['id']); ?></td>
                                                                <td style="cursor: pointer;"
                                                                    onclick="showLeadDetails(<?php echo e($lead['id']); ?>)"
                                                                    title="Click to view lead details">
                                                                    <div
                                                                        style="display: flex; gap: 10px;">
                                                                        <div>
                                                                                <?php
                                                                                $colors = generateRandomColorWithContrast();
                                                                                ?>
                                                                            <img style="width: 50px" class="rounded-circle"
                                                                                 src="https://ui-avatars.com/api/?name=<?php echo e($lead['customer_name']); ?>&background=<?php echo e($colors[0]); ?>&color=<?php echo e($colors[1]); ?>"
                                                                                 alt="">
                                                                        </div>
                                                                        <div>
                                                                            <?php echo e($lead['customer_name']); ?>

                                                                            <br>
                                                                            <span
                                                                                class="text-muted"><?php echo e($lead['phone1']); ?></span>
                                                                            <br>
                                                                            <span
                                                                                class="text-muted"><?php echo e($lead['email']); ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <?php echo e($lead['address']); ?>

                                                                    <br>
                                                                    <?php echo e($lead['city']); ?> - <?php echo e($lead['state']); ?>

                                                                    <br>
                                                                    <?php echo e($lead['zip']); ?>

                                                                </td>
                                                                <td> <?php echo e($lead['assigned_details']); ?> </td>
                                                                <td>
                                                                        <?php
                                                                        $class = "";
                                                                        $btnTxt = "";
                                                                        if ($lead['status'] == 'pending') {
                                                                            $btnTxt = "Pending";
                                                                            if ($isPendingOver24Hours) {
                                                                                $btnTxt = "Pending (Over 24 Hours)";
                                                                                $class = 'danger';
                                                                            } else {
                                                                                $class = "secondary";
                                                                            }
                                                                        } elseif ($lead['status'] == 'approved') {
                                                                            $btnTxt = "Approved";
                                                                            $class = 'success';
                                                                        } elseif ($lead['status'] == 'denied') {
                                                                            $class = 'danger';
                                                                        } else {
                                                                            $class = 'success';
                                                                            if($lead['status'] == 'sold'){
                                                                                $btnTxt = "Completed";
                                                                            }elseif($lead['status'] == 'estimate_complete'){
                                                                                $btnTxt = "Estimate Completed";
                                                                            }elseif($lead['status'] == 'no_contact'){
                                                                                $class = 'danger';
                                                                                $btnTxt = "No Contact/Dead Lead";
                                                                            }

                                                                        }

                                                                        ?>


                                                                    <div class="btn-group">
                                                                        <button type="button"
                                                                                style="padding: 0 5px;"
                                                                                class="btn btn-<?php echo e($class); ?> <?php echo e($class != 'danger' ? 'dropdown-toggle' : ''); ?>"
                                                                                <?php if ($class != 'danger'){ ?> data-bs-toggle="dropdown"
                                                                                aria-expanded="false" <?php } ?>>
                                                                            <?php echo e($btnTxt); ?>

                                                                        </button>
                                                                            <?php if ($class != 'danger'){ ?>
                                                                        <ul class="dropdown-menu">
                                                                                <?php if($lead['status'] == 'approved'){ ?>
                                                                            <li>
                                                                                <a class="dropdown-item" href="javascript:void(0);" onClick="markAsCompleted('<?php echo e($lead['id']); ?>', '<?php echo e($lead['status']); ?>')">Mark as Completed</a>
                                                                            </li>
                                                                            <?php }elseif($lead['status'] == 'pending'){ ?>
                                                                            <li>
                                                                                <a class="dropdown-item" href="<?php echo e(url('markAs/'.$lead['id'].'/approved')); ?>">Approve</a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item" href="<?php echo e(url('markAs/'.$lead['id'].'/denied')); ?>">Reject</a>
                                                                            </li>
                                                                            <?php } ?>

                                                                        </ul>
                                                                        <?php } ?>
                                                                    </div>
                                                                </td>
                                                                <td><?php echo e((!empty($lead['followup'])) ? date('m/d/Y H:i', strtotime($lead['followup'])) : '-'); ?></td>
                                                                <td>
                                                                    <div class="d-flex gap-2">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-outline-primary"
                                                                                onclick="editLead(<?php echo e($lead['id']); ?>)"
                                                                                title="Edit Lead">
                                                                            <i class="ri-edit-line"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-outline-danger"
                                                                                onclick="deleteLead(<?php echo e($lead['id']); ?>)"
                                                                                title="Delete Lead">
                                                                            <i class="ri-delete-bin-line"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td colspan="6" class="text-center">No leads found</td>
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

        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Add Lead</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(url('add_lead')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="customerName" class="form-label">Customer Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required class="form-control" id="customerName"
                                               placeholder="Enter customer name" name="customer_name"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3">
                                    <div>
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="date" name="date"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3">
                                    <div>
                                        <label for="time" class="form-label">Time</label>
                                        <input type="time" class="form-control" id="time" name="time"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" placeholder="Enter address"
                                               name="address"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-4">
                                    <div>
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" placeholder="Enter city"
                                               name="city"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-4">
                                    <div>
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" id="state" placeholder="Enter state"
                                               name="state"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-4">
                                    <div>
                                        <label for="zip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder="Enter zip code"
                                               name="zip"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="phone1" class="form-label">Phone # <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" required class="form-control" id="phone1"
                                               placeholder="(000) 000-0000" name="phone1"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="phone2" class="form-label">Phone #2</label>
                                        <input type="tel" class="form-control" id="phone2" placeholder="(000) 000-0000"
                                               name="phone2"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" required class="form-control" id="email"
                                               placeholder="Enter email address" name="email"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="preferredDateTime" class="form-label">Customer's Preferred Date &
                                            Time</label>
                                        <input type="text" class="form-control" id="preferredDateTime"
                                               placeholder="Enter preferred date and time" name="preferred_date_time"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="details" class="form-label">Details for estimate</label>
                                        <textarea class="form-control" id="details" rows="4"
                                                  placeholder="Enter details for estimate" name="details"></textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="hearAbout" class="form-label">How did you hear about our
                                            company?</label>
                                        <textarea class="form-control" id="hearAbout" rows="2"
                                                  placeholder="Enter how you heard about our company"
                                                  name="hear_about"></textarea>
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="hearAbout" class="form-label">Assign To Sales Agent</label>
                                        <select class="selectpicker form-control" data-live-search="true" name="assigned_to">
                                            <?php if (session()->get('adminAuth')[0]['type'] == 'admin'){ ?>
                                                <?php foreach ($agents as $val){ ?>
                                                    <option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?> (#<?php echo e($val->id); ?>)</option>
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <option value="<?php echo e(session()->get('adminAuth')[0]['id']); ?>"><?php echo e(session()->get('adminAuth')[0]['name']); ?>(#<?php echo e(session()->get('adminAuth')[0]['id']); ?>)</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Lead Modal -->
        <div class="modal fade" id="editLeadModal" tabindex="-1" aria-labelledby="editLeadModalLabel"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLeadModalLabel">Edit Lead</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(url('update_lead')); ?>" method="post" id="editLeadForm">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="lead_id" id="edit_lead_id">
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="edit_customerName" class="form-label">Customer Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required class="form-control" id="edit_customerName"
                                               placeholder="Enter customer name" name="customer_name"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3">
                                    <div>
                                        <label for="edit_date" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="edit_date" name="date"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3">
                                    <div>
                                        <label for="edit_time" class="form-label">Time</label>
                                        <input type="time" class="form-control" id="edit_time" name="time"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="edit_address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="edit_address"
                                               placeholder="Enter address" name="address"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-4">
                                    <div>
                                        <label for="edit_city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="edit_city" placeholder="Enter city"
                                               name="city"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-4">
                                    <div>
                                        <label for="edit_state" class="form-label">State</label>
                                        <input type="text" class="form-control" id="edit_state"
                                               placeholder="Enter state" name="state"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-4">
                                    <div>
                                        <label for="edit_zip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="edit_zip"
                                               placeholder="Enter zip code" name="zip"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="edit_phone1" class="form-label">Phone # <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" required class="form-control" id="edit_phone1"
                                               placeholder="(000) 000-0000" name="phone1"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="edit_phone2" class="form-label">Phone #2</label>
                                        <input type="tel" class="form-control" id="edit_phone2"
                                               placeholder="(000) 000-0000" name="phone2"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="edit_email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" required class="form-control" id="edit_email"
                                               placeholder="Enter email address" name="email"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="edit_preferredDateTime" class="form-label">Customer's Preferred Date
                                            & Time</label>
                                        <input type="text" class="form-control" id="edit_preferredDateTime"
                                               placeholder="Enter preferred date and time" name="preferred_date_time"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="edit_details" class="form-label">Details for estimate</label>
                                        <textarea class="form-control" id="edit_details" rows="4"
                                                  placeholder="Enter details for estimate" name="details"></textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-12">
                                    <div>
                                        <label for="edit_hearAbout" class="form-label">How did you hear about our
                                            company?</label>
                                        <textarea class="form-control" id="edit_hearAbout" rows="2"
                                                  placeholder="Enter how you heard about our company"
                                                  name="hear_about"></textarea>
                                    </div>
                                </div>

                                <div class="col-xxl-6">
                                    <div>
                                        <label for="edit_assignedTo" class="form-label">Assign To Sales Agent</label>
                                        <select class="selectpicker form-control" data-live-search="true"
                                                name="assigned_to" id="edit_assigned_to">
                                            <?php if (session()->get('adminAuth')[0]['type'] == 'admin'){ ?>
                                                <?php foreach ($agents as $val){ ?>
                                            <option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?> (#<?php echo e($val->id); ?>)</option>
                                            <?php } ?>
                                            <?php }else{ ?>
                                            <option
                                                value="<?php echo e(session()->get('adminAuth')[0]['id']); ?>"><?php echo e(session()->get('adminAuth')[0]['name']); ?>

                                                (#<?php echo e(session()->get('adminAuth')[0]['id']); ?>)
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="edit_status" class="form-label">Status</label>
                                        <select class="form-control" name="status" id="edit_status">
                                            <option value="pending">Pending</option>
                                            <option value="approved">Approved</option>
                                            <option value="denied">Denied</option>
                                        </select>
                                    </div>
                                </div>

                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Update Lead</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lead Details Modal -->
        <div class="modal fade" id="leadDetailsModal" tabindex="-1" aria-labelledby="leadDetailsModalLabel"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="leadDetailsModalLabel">Lead Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="text-center">
                                    <img id="lead_avatar" class="rounded-circle" src="" alt="Lead Avatar"
                                         style="width: 80px; height: 80px;">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h4 id="lead_customer_name" class="mb-2"></h4>
                                <p class="text-muted mb-1"><i class="ri-phone-line me-2"></i><span id="lead_phone1"></span> | <span id="lead_phone2_detail"></span></p>
                                <p class="text-muted mb-1"><i class="ri-mail-line me-2"></i><span id="lead_email"></span></p>
                                <p class="text-muted mb-0">
                                    <i class="ri-map-pin-line me-2"></i><span id="lead_address"></span>
                                    <br>
                                    <i style="margin-right:1.4rem !important;"></i><span id="lead_city"></span> , <span id="lead_state"></span>
                                    <br>
                                    <i style="margin-right:1.4rem !important;"></i><span id="lead_zip"></span>
                                </p>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-1">
                                    <strong>Lead ID:</strong> <span id="lead_id_detail"></span>
                                </div>
                                <div class="mb-1">
                                    <strong>Status:</strong> <span id="lead_status_badge"></span>
                                </div>
                                <div class="mb-1">
                                    <strong>Assigned To:</strong> <span id="lead_assigned_to"></span>
                                </div>
                                <div class="mb-2">
                                    <strong>Date:</strong> <span id="lead_date"></span> <span id="lead_time"></span>
                                </div>


                            </div>
                        </div>

                        <hr>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Details</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Estimation</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="text-primary mb-3">Preferred Date & Time:</h6>
                                        <div class="bg-light p-3 rounded">
                                            <p id="lead_preferred_date_time" class="mb-0"></p>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <h6 class="text-primary mb-3">Details for Estimate</h6>
                                        <div class="bg-light p-3 rounded">
                                            <p id="lead_details" class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <h6 class="text-primary mb-3">How did you hear about our company?</h6>
                                        <div class="bg-light p-3 rounded">
                                            <p id="lead_hear_about" class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <!-- Photos Section -->
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <h6 class="text-primary mb-3">Photos</h6>

                                        <!-- Upload Area -->
                                        <div class="row" id="leadDetailsPhotoUpload">

                                            <div class="col-md-8" style="overflow-y: auto; max-height: 260px;">
                                                <div class="photos-grid" id="photosGrid">
                                                    <!-- Photos will be displayed here -->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="photo-upload-area mb-3" id="photoUploadArea" style="display: none;">
                                                    <!-- Hidden file input -->
                                                    <input type="file" id="photoInput" multiple accept="image/*"
                                                           style="display: none;">

                                                    <div
                                                        class="upload-zone border-2 border-dashed border-primary rounded p-4 text-center"
                                                        id="uploadZone">
                                                        <div class="upload-content">
                                                            <i class="ri-upload-cloud-2-line text-primary"
                                                               style="font-size: 48px;"></i>
                                                            <h5 class="mt-2 mb-1">Drag & Drop Images Here</h5>
                                                            <p class="text-muted mb-3">or click to select files</p>
                                                            <button type="button" class="btn btn-outline-primary"
                                                                    id="chooseFilesBtn">
                                                                <i class="ri-folder-open-line me-2"></i>Choose Files
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="upload-progress mt-3" id="uploadProgress"
                                                         style="display: none;">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: 0%"></div>
                                                        </div>
                                                        <small class="text-muted mt-1 d-block">Uploading...</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="text-primary mb-3">Appointment Schedule</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="appointment_date" class="form-label">Appointment Date</label>
                                                    <input type="date" class="form-control" id="appointment_date" min="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="appointment_time" class="form-label">Appointment Time</label>
                                                    <input type="time" class="form-control" id="appointment_time" min="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                    onclick="saveAppointment()" id="saveAppointmentBtn">
                                                <i class="ri-save-line me-1"></i>Save Appointment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="didNotAnswerCheckbox"
                                                   onchange="toggleDidNotAnswerReason()">
                                            <label class="form-check-label" for="didNotAnswerCheckbox">
                                                Customer did not answer
                                            </label>
                                        </div>
                                        <div id="didNotAnswerReasonDiv" style="display: none;">
                                            <label for="didNotAnswerReason" class="form-label">Reason</label>
                                            <textarea class="form-control" id="didNotAnswerReason" rows="3"
                                                      placeholder="Enter reason why customer didn't answer..."
                                                      onkeyup="autoSaveDidNotAnswer()"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                <form id="leadEstimationForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="project_cost" class="form-label">Project Cost</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">$</span>
                                                    <input type="text" class="form-control" id="project_cost" name="project_cost" placeholder="0.00" pattern="[0-9]+(\.[0-9]{1,2})?" title="Enter a valid numeric value">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lead_potential" class="form-label">Lead Potential</label>
                                                <select class="form-select" id="lead_potential" name="lead_potential">
                                                    <option value="">Select Potential</option>
                                                    <option value="sold">Sold</option>
                                                    <option value="potential">Potential</option>
                                                    <option value="no_good">No Good</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="project_details" class="form-label">Project Details and Breakdown</label>
                                        <textarea class="form-control" id="project_details" name="project_details" rows="4" placeholder="Enter detailed project information and breakdown..."></textarea>
                                    </div>

                                    <hr class="my-4">

                                    <h5 class="text-primary mb-3">Cost Breakdown</h5>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="costBreakdownTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Cost</th>
                                                    <th width="100">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="costBreakdownBody">
                                                <tr>
                                                    <td><input type="text" class="form-control" name="product[]" placeholder="Product name"></td>
                                                    <td><input type="number" class="form-control" name="quantity[]" placeholder="0" min="0" step="1"></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-text">$</span>
                                                            <input type="text" class="form-control" name="cost[]" placeholder="0.00" pattern="[0-9]+(\.[0-9]{1,2})?">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="removeCostRow(this)" title="Remove Row" disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-end">
                                                        <button type="button" class="btn btn-sm btn-success" onclick="addCostRow()" title="Add Row">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>


                                <hr class="my-4">

                                <h5 class="text-primary mb-3">Project Photos</h5>

                                <!-- Upload Area -->
                                <div class="row" id="leadEstimatePhotoUpload">
                                    <div class="col-md-8" style="overflow-y: auto; max-height: 260px;">
                                        <div class="photos-grid" id="estimatePhotosGrid">
                                            <!-- Photos will be displayed here -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="photo-upload-area mb-3" id="estimatePhotoUploadArea" style="display: none;">
                                            <!-- Hidden file input -->
                                            <input type="file" id="estimatePhotoInput" multiple accept="image/*"
                                                   style="display: none;">

                                            <div
                                                class="upload-zone border-2 border-dashed border-primary rounded p-4 text-center"
                                                id="estimateUploadZone">
                                                <div class="upload-content">
                                                    <i class="ri-upload-cloud-2-line text-primary"
                                                       style="font-size: 48px;"></i>
                                                    <h5 class="mt-2 mb-1">Drag & Drop Images Here</h5>
                                                    <p class="text-muted mb-3">or click to select files</p>
                                                    <button type="button" class="btn btn-outline-primary"
                                                            id="estimateChooseFilesBtn">
                                                        <i class="ri-folder-open-line me-2"></i>Choose Files
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="upload-progress mt-3" id="estimateUploadProgress"
                                                 style="display: none;">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 0%"></div>
                                                </div>
                                                <small class="text-muted mt-1 d-block">Uploading...</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="followup_date" class="form-label">Followup Date</label>
                                            <input type="date" class="form-control" id="followup_date" name="followup_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="followup_time" class="form-label">Followup Time</label>
                                            <input type="time" class="form-control" id="followup_time" name="followup_time">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="followup_reason" class="form-label">Followup Reason</label>
                                            <textarea class="form-control" id="followup_reason" name="followup_reason"></textarea>
                                        </div>
                                    </div>
                                </div>

                                    <div class="d-flex justify-content-between mt-3">
                                    <button type="button" class="btn btn-success" onclick="markAsCompleted()">
                                            Mark as completed
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="saveEstimation()">
                                            Save Estimation
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Mark As Completed Modal -->
        <div class="modal fade" id="markAsCompletedModal" tabindex="-1" aria-labelledby="markAsCompletedModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="markAsCompletedModalLabel">Mark As Completed</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="markAsCompletedForm">
                            <div class="mb-3">
                                <label for="completion_reason" class="form-label">Reason</label>
                                <select class="form-control" id="completion_reason" name="completion_reason" required>
                                    <option value="">Select a reason...</option>
                                    <option value="sold">Sold</option>
                                    <option value="estimate_complete">Estimate Completed</option>
                                    <option value="no_contact">No Contact/Dead Lead</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" onclick="submitMarkAsCompleted()">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lightbox Modal -->
        <div id="lightbox" class="lightbox">
            <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
            <div class="lightbox-content">
                <img id="lightboxImage" src="" alt="">
                <div class="lightbox-nav lightbox-prev" onclick="previousImage()">&#10094;</div>
                <div class="lightbox-nav lightbox-next" onclick="nextImage()">&#10095;</div>
                <div class="lightbox-counter">
                    <span id="currentImageIndex">1</span> / <span id="totalImages">1</span>
                </div>
            </div>
        </div>

        <!-- iMask CDN -->
        <script src="https://unpkg.com/imask"></script>


        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Function to get current date in YYYY-MM-DD format
                function getCurrentDate() {
                    const now = new Date();
                    const year = now.getFullYear();
                    const month = String(now.getMonth() + 1).padStart(2, '0');
                    const day = String(now.getDate()).padStart(2, '0');
                    return `${year}-${month}-${day}`;
                }

                // Function to get current time in HH:MM format
                function getCurrentTime() {
                    const now = new Date();
                    const hours = String(now.getHours()).padStart(2, '0');
                    const minutes = String(now.getMinutes()).padStart(2, '0');
                    return `${hours}:${minutes}`;
                }

                // Initialize iMask for phone number formatting
                const phone1Input = document.getElementById('phone1');
                const phone2Input = document.getElementById('phone2');
                const editPhone1Input = document.getElementById('edit_phone1');
                const editPhone2Input = document.getElementById('edit_phone2');

                // Phone number mask: (000) 000-0000
                const phoneMask = IMask(phone1Input, {
                    mask: '(000) 000-0000'
                });

                const phone2Mask = IMask(phone2Input, {
                    mask: '(000) 000-0000'
                });

                // Phone number mask for edit modal
                const editPhone1Mask = IMask(editPhone1Input, {
                    mask: '(000) 000-0000'
                });

                const editPhone2Mask = IMask(editPhone2Input, {
                    mask: '(000) 000-0000'
                });

                // Pre-populate date and time when modal opens
                const modal = document.getElementById('exampleModalgrid');
                const dateInput = document.getElementById('date');
                const timeInput = document.getElementById('time');

                modal.addEventListener('shown.bs.modal', function () {
                    dateInput.value = getCurrentDate();
                    timeInput.value = getCurrentTime();
                });

                // Initialize Bootstrap tooltips
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });

                // Initialize photo upload functionality will be called when modal opens
            });

            // Edit Lead Function
            function editLead(leadId) {
                const editModal = new bootstrap.Modal(document.getElementById('editLeadModal'));
                document.getElementById('edit_lead_id').value = leadId;

                // Show loading state
                const submitBtn = document.querySelector('#editLeadForm button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Loading...';
                submitBtn.disabled = true;

                // Fetch lead data via AJAX
                fetch(`<?php echo e(url('/get_lead')); ?>/${leadId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const lead = data.data;

                            // Populate form fields
                            document.getElementById('edit_customerName').value = lead.customer_name || '';
                            document.getElementById('edit_address').value = lead.address || '';
                            document.getElementById('edit_city').value = lead.city || '';
                            document.getElementById('edit_state').value = lead.state || '';
                            document.getElementById('edit_zip').value = lead.zip || '';
                            document.getElementById('edit_phone1').value = lead.phone1 || '';
                            document.getElementById('edit_phone2').value = lead.phone2 || '';
                            document.getElementById('edit_email').value = lead.email || '';
                            document.getElementById('edit_preferredDateTime').value = lead.preferred_date_time || '';
                            document.getElementById('edit_details').value = lead.details || '';
                            document.getElementById('edit_hearAbout').value = lead.hear_about || '';
                            document.getElementById('edit_assigned_to').value = lead.assigned_to || '';
                            document.getElementById('edit_status').value = lead.status || 'pending';

                            // Handle date and time
                            if (lead.date) {
                                const dateTime = new Date(lead.date);
                                const date = dateTime.toISOString().split('T')[0];
                                const time = dateTime.toTimeString().split(' ')[0].substring(0, 5);

                                document.getElementById('edit_date').value = date;
                                document.getElementById('edit_time').value = time;
                            }

                            // Refresh selectpicker if it exists
                            if (typeof $ !== 'undefined' && $.fn.selectpicker) {
                                $('#edit_assigned_to').selectpicker('refresh');
                            }

                            editModal.show();
                        } else {
                            showToast('Error loading lead data: ' + data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Error loading lead data. Please try again.', 'error');
                    })
                    .finally(() => {
                        // Reset button state
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    });
            }

            // Show Lead Details Function
            function showLeadDetails(leadId) {
                const detailsModal = new bootstrap.Modal(document.getElementById('leadDetailsModal'));

                // Show loading state
                const modalBody = document.querySelector('#leadDetailsModal .modal-body');
                const originalContent = modalBody.innerHTML;
                modalBody.innerHTML = '<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">Loading lead details...</p></div>';

                // Fetch lead data via AJAX
                fetch(`<?php echo e(url('/get_lead')); ?>/${leadId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            modalBody.innerHTML = originalContent;
                            const lead = data.data;

                            // Generate avatar colors
                            const colors = generateRandomColorWithContrast();
                            const avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(lead.customer_name)}&background=${colors[0]}&color=${colors[1]}`;

                            // Helper function to safely set text content
                            function setTextContent(elementId, value) {
                                const element = document.getElementById(elementId);
                                if (element) {
                                    element.textContent = value || 'N/A';
                                }
                            }

                            // Helper function to safely set innerHTML
                            function setInnerHTML(elementId, value) {
                                const element = document.getElementById(elementId);
                                if (element) {
                                    element.innerHTML = value || 'N/A';
                                }
                            }

                            // Populate modal fields
                            const avatarElement = document.getElementById('lead_avatar');
                            if (avatarElement) {
                                avatarElement.src = avatarUrl;
                            }

                            setTextContent('lead_customer_name', lead.customer_name);
                            setTextContent('lead_phone1', lead.phone1);
                            setTextContent('lead_email', lead.email);
                            setTextContent('lead_address', lead.address);

                            // Contact Information
                            setTextContent('lead_phone1_detail', lead.phone1);
                            setTextContent('lead_phone2_detail', lead.phone2);
                            setTextContent('lead_email_detail', lead.email);

                            // Location Details
                            setTextContent('lead_address_detail', lead.address);
                            setTextContent('lead_city', lead.city);
                            setTextContent('lead_state', lead.state);
                            setTextContent('lead_zip', lead.zip);

                            // Lead Information
                            setTextContent('lead_id_detail', '#' + lead.id);

                            // Status badge
                            const status = lead.status || 'pending';
                            let badgeClass = 'badge text-bg-secondary';
                            if (status === 'approved') {
                                badgeClass = 'badge text-bg-success';
                            } else if (status === 'denied') {
                                badgeClass = 'badge text-bg-danger';
                            }
                            setInnerHTML('lead_status_badge', `<span class="${badgeClass}">${status.charAt(0).toUpperCase() + status.slice(1)}</span>`);

                            setTextContent('lead_assigned_to', lead.assigned_details);

                            // Format created date
                            if (lead.created_at) {
                                const createdDate = new Date(lead.created_at);
                                //setTextContent('lead_created_at', createdDate.toLocaleDateString() + ' ' + createdDate.toLocaleTimeString());
                            } else {
                                //setTextContent('lead_created_at', 'N/A');
                            }

                            // Additional Details
                            setTextContent('lead_preferred_date_time', lead.preferred_date_time);

                            // Format date and time
                            if (lead.date) {
                                const dateTime = new Date(lead.date);
                                const date = dateTime.toLocaleDateString();
                                const time = dateTime.toLocaleTimeString();
                                setTextContent('lead_date', date);
                                setTextContent('lead_time', time);
                            } else {
                                setTextContent('lead_date', 'N/A');
                                setTextContent('lead_time', 'N/A');
                            }

                            // Details for estimate
                            setTextContent('lead_details', lead.details || 'No details provided');

                            // How did you hear about us
                            setTextContent('lead_hear_about', lead.hear_about || 'Not specified');

                            // Set minimum values for appointment fields
                            setAppointmentMinValues();

                            // Populate appointment fields
                            if (lead.appointment) {
                                const appointmentDateTime = new Date(lead.appointment);
                                const appointmentDate = appointmentDateTime.toISOString().split('T')[0];
                                const appointmentTime = appointmentDateTime.toTimeString().split(' ')[0].substring(0, 5);

                                document.getElementById('appointment_date').value = appointmentDate;
                                document.getElementById('appointment_time').value = appointmentTime;
                            } else {
                                // Clear appointment fields if no appointment is set
                                document.getElementById('appointment_date').value = '';
                                document.getElementById('appointment_time').value = '';
                            }

                            // Add event listeners for real-time validation
                            const dateInput = document.getElementById('appointment_date');
                            const timeInput = document.getElementById('appointment_time');

                            if (dateInput) {
                                dateInput.addEventListener('change', function () {
                                    // Update time minimum when date changes
                                    if (this.value === new Date().toISOString().split('T')[0]) {
                                        // If today is selected, set minimum time to current time
                                        const now = new Date();
                                        const currentTime = now.toTimeString().split(' ')[0].substring(0, 5);
                                        timeInput.min = currentTime;
                                    } else {
                                        // If future date is selected, allow any time
                                        timeInput.min = '00:00';
                                    }
                                });
                            }

                            if (timeInput) {
                                timeInput.addEventListener('change', function () {
                                    // Validate when time changes
                                    const validation = validateAppointmentDateTime();
                                    if (!validation.valid && this.value) {
                                        showToast(validation.message, 'error');
                                    }
                                });
                            }

                            // Populate did not answer fields
                            const didNotAnswerCheckbox = document.getElementById('didNotAnswerCheckbox');
                            const didNotAnswerReason = document.getElementById('didNotAnswerReason');
                            const didNotAnswerReasonDiv = document.getElementById('didNotAnswerReasonDiv');

                            if (didNotAnswerCheckbox && didNotAnswerReason && didNotAnswerReasonDiv) {
                                // Set checkbox state
                                didNotAnswerCheckbox.checked = lead.did_not_answer == 1;

                                // Set reason text
                                if (lead.did_not_answer_reason) {
                                    didNotAnswerReason.value = lead.did_not_answer_reason;
                                } else {
                                    didNotAnswerReason.value = '';
                                }

                                // Show/hide reason div based on checkbox state
                                if (lead.did_not_answer == 1) {
                                    didNotAnswerReasonDiv.style.display = 'block';
                                } else {
                                    didNotAnswerReasonDiv.style.display = 'none';
                                }
                            }

                            // Store lead ID and status for edit function
                            const modalElement = document.getElementById('leadDetailsModal');
                            if (modalElement) {
                                modalElement.setAttribute('data-lead-id', leadId);
                                modalElement.setAttribute('data-lead-status', lead.status);
                            }

                            // Set current lead ID and load photos
                            currentLeadId = leadId;
                            loadLeadPhotos(leadId);
                            loadEstimatePhotos(leadId);
                            loadEstimationData(leadId);

                            // Initialize photo upload functionality when modal is shown
                            detailsModal.show();

                            // Initialize photo upload after modal is shown
                            setTimeout(() => {
                                console.log('Initializing photo upload for lead:', leadId);
                                initializePhotoUpload();
                                initializeEstimatePhotoUpload();
                            }, 100);
                        } else {
                            showToast('Error loading lead data: ' + data.message,'error');
                            modalBody.innerHTML = originalContent;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Error loading lead data. Please try again.', 'error');
                        modalBody.innerHTML = originalContent;
                    });
            }

            // Edit Lead from Details Modal
            function editLeadFromDetails() {
                const leadId = document.getElementById('leadDetailsModal').getAttribute('data-lead-id');
                if (leadId) {
                    // Close the details modal
                    const detailsModal = bootstrap.Modal.getInstance(document.getElementById('leadDetailsModal'));
                    detailsModal.hide();

                    // Open edit modal
                    editLead(leadId);
                }
            }

            // Generate random colors for avatar (same function as PHP)
            function generateRandomColorWithContrast() {
                const red = Math.floor(Math.random() * 256).toString(16).padStart(2, '0');
                const green = Math.floor(Math.random() * 256).toString(16).padStart(2, '0');
                const blue = Math.floor(Math.random() * 256).toString(16).padStart(2, '0');

                const color1 = red + green + blue;

                // Calculate brightness
                const brightness = (0.2126 * parseInt(red, 16) + 0.7152 * parseInt(green, 16) + 0.0722 * parseInt(blue, 16));

                const color2 = brightness > 128 ? "000000" : "FFFFFF";

                return [color1, color2];
            }

            // Delete Lead Function with Confirmation
            function deleteLead(leadId) {
                alertify.confirm(
                    'Delete Lead?',
                    'Are you sure you want to delete this lead? This action cannot be undone.',
                    function () {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '<?php echo e(url("delete_lead")); ?>';

                        // Add CSRF token
                        const csrfToken = document.createElement('input');
                        csrfToken.type = 'hidden';
                        csrfToken.name = '_token';
                        csrfToken.value = '<?php echo e(csrf_token()); ?>';
                        form.appendChild(csrfToken);

                        // Add lead ID
                        const leadIdInput = document.createElement('input');
                        leadIdInput.type = 'hidden';
                        leadIdInput.name = 'lead_id';
                        leadIdInput.value = leadId;
                        form.appendChild(leadIdInput);

                        // Add method override for DELETE
                        const methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        methodInput.value = 'DELETE';
                        form.appendChild(methodInput);

                        document.body.appendChild(form);
                        form.submit();
                    },
                    function () {
                        alertify.error('Whoosh! Deletion Cancelled');
                    }
                );


            }

            // Photo Upload and Lightbox Functionality
            let currentLeadId = null;
            let currentPhotos = [];
            let lightboxImages = [];
            let currentLightboxIndex = 0;

            // Initialize photo upload functionality
            function initializePhotoUpload() {
                const uploadZone = document.getElementById('uploadZone');
                const photoInput = document.getElementById('photoInput');
                const chooseFilesBtn = document.getElementById('chooseFilesBtn');

                console.log('Initializing photo upload:', {uploadZone, photoInput, chooseFilesBtn});

                if (!uploadZone || !photoInput || !chooseFilesBtn) {
                    console.error('Upload elements not found:', {uploadZone, photoInput, chooseFilesBtn});
                    return;
                }

                // Remove existing event listeners to avoid duplicates
                uploadZone.removeEventListener('dragover', handleDragOver);
                uploadZone.removeEventListener('dragleave', handleDragLeave);
                uploadZone.removeEventListener('drop', handleDrop);
                uploadZone.removeEventListener('click', handleUploadClick);
                photoInput.removeEventListener('change', handleFileSelect);
                chooseFilesBtn.removeEventListener('click', handleChooseFilesClick);

                // Drag and drop events
                uploadZone.addEventListener('dragover', handleDragOver);
                uploadZone.addEventListener('dragleave', handleDragLeave);
                uploadZone.addEventListener('drop', handleDrop);

                // File input change
                photoInput.addEventListener('change', handleFileSelect);

                // Click to upload (for the drag zone)
                uploadZone.addEventListener('click', handleUploadClick);

                // Choose files button click
                chooseFilesBtn.addEventListener('click', handleChooseFilesClick);

                console.log('Photo upload initialized successfully');
            }

            // Handle upload zone click
            function handleUploadClick(e) {
                e.preventDefault();
                e.stopPropagation();
                const photoInput = document.getElementById('photoInput');
                if (photoInput) {
                    photoInput.click();
                }
            }

            // Handle choose files button click
            function handleChooseFilesClick(e) {
                console.log('Choose files button clicked');
                e.preventDefault();
                e.stopPropagation();

                // Always create a new temporary file input - this is more reliable
                console.log('Creating temporary file input');
                const tempInput = document.createElement('input');
                tempInput.type = 'file';
                tempInput.multiple = true;
                tempInput.accept = 'image/*';
                tempInput.style.display = 'none';
                document.body.appendChild(tempInput);

                tempInput.addEventListener('change', function (e) {
                    console.log('Temporary input file selected:', e.target.files);
                    handleFiles(e.target.files);
                    document.body.removeChild(tempInput);
                });

                tempInput.click();
            }

            // Drag and drop handlers
            function handleDragOver(e) {
                e.preventDefault();
                e.stopPropagation();
                e.currentTarget.classList.add('dragover');
            }

            function handleDragLeave(e) {
                e.preventDefault();
                e.stopPropagation();
                e.currentTarget.classList.remove('dragover');
            }

            function handleDrop(e) {
                e.preventDefault();
                e.stopPropagation();
                e.currentTarget.classList.remove('dragover');

                const files = e.dataTransfer.files;
                handleFiles(files);
            }

            function handleFileSelect(e) {
                console.log('File input change event triggered');
                console.log('File selected:', e.target.files);
                const files = e.target.files;
                handleFiles(files);
            }

            // Handle selected files
            function handleFiles(files) {
                console.log('Handling files:', files);
                const imageFiles = Array.from(files).filter(file => file.type.startsWith('image/'));
                console.log('Image files:', imageFiles);

                if (imageFiles.length === 0) {
                    alert('Please select only image files.');
                    return;
                }

                uploadImages(imageFiles);
            }

            // Upload images to server
            function uploadImages(files) {
                console.log('Uploading images:', files, 'Lead ID:', currentLeadId);
                if (!currentLeadId) {
                    alert('No lead selected.');
                    return;
                }

                const uploadProgress = document.getElementById('uploadProgress');
                const progressBar = uploadProgress.querySelector('.progress-bar');

                uploadProgress.style.display = 'block';
                progressBar.style.width = '0%';

                const formData = new FormData();
                formData.append('lead_id', currentLeadId);

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '<?php echo e(csrf_token()); ?>';
                console.log('CSRF Token:', csrfToken);
                formData.append('_token', csrfToken);

                files.forEach(file => {
                    formData.append('photos[]', file);
                });

                // Simulate progress
                let progress = 0;
                const progressInterval = setInterval(() => {
                    progress += Math.random() * 30;
                    if (progress > 90) progress = 90;
                    progressBar.style.width = progress + '%';
                }, 200);

                const uploadUrl = '<?php echo e(url("/upload_lead_photos")); ?>';
                console.log('Uploading to URL:', uploadUrl);
                console.log('FormData contents:');
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }

                fetch(uploadUrl, {
                    method: 'POST',
                    body: formData
                })
                    .then(response => {
                        console.log('Upload response:', response);
                        return response.json();
                    })
                    .then(data => {
                        console.log('Upload response data:', data);
                        clearInterval(progressInterval);
                        progressBar.style.width = '100%';

                        setTimeout(() => {
                            uploadProgress.style.display = 'none';
                            if (data.success) {
                                loadLeadPhotos(currentLeadId);
                                showToast('Photos uploaded successfully!', 'success');
                            } else {
                                showToast('Error uploading photos: ' + data.message, 'error');
                            }
                        }, 500);
                    })
                    .catch(error => {
                        clearInterval(progressInterval);
                        uploadProgress.style.display = 'none';
                        console.error('Upload error:', error);
                        showToast('Error uploading photos. Please try again.', 'error');
                    });
            }

            // Load photos for a lead
            function loadLeadPhotos(leadId) {
                console.log('Loading photos for lead:', leadId);
                fetch(`<?php echo e(url('/get_lead_photos')); ?>/${leadId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Photos response:', data);
                        if (data.success) {
                            currentPhotos = data.photos || [];
                            displayPhotos(currentPhotos);
                        }
                    })
                    .catch(error => {
                        console.error('Error loading photos:', error);
                    });
            }

            // Display photos in grid
            function displayPhotos(photos) {
                console.log('Displaying photos:', photos);
                const photosGrid = document.getElementById('photosGrid');
                const photoUploadArea = document.getElementById('photoUploadArea');

                console.log('Photo elements:', {photosGrid, photoUploadArea});

                if (!photosGrid) return;

                // Show upload area
                if (photoUploadArea) {
                    photoUploadArea.style.display = 'block';
                    console.log('Upload area shown');
                }

                if (photos.length === 0) {
                    photosGrid.innerHTML = `
            <div class="photos-empty">
                <i class="ri-image-line"></i>
                <p>No photos uploaded yet</p>
            </div>
        `;
                    return;
                }

                photosGrid.innerHTML = '';
                lightboxImages = photos;

                photos.forEach((photo, index) => {
                    const photoItem = document.createElement('div');
                    photoItem.className = 'photo-item';
                    photoItem.innerHTML = `
            <img src="<?php echo e(asset('public/uploads/leads')); ?>/${photo}" alt="Lead Photo" onclick="openLightbox(${index})">
            <div class="photo-actions">
                <button class="delete-btn" onclick="deletePhoto('${photo}', ${index})" title="Delete Photo">
                    <i class="ri-delete-bin-line"></i>
                </button>
            </div>
        `;
                    photosGrid.appendChild(photoItem);
                });
            }

            // Delete photo
            function deletePhoto(photoSrc, index) {
                if (!confirm('Are you sure you want to delete this photo?')) return;

                fetch('<?php echo e(url("/delete_lead_photo")); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '<?php echo e(csrf_token()); ?>'
                    },
                    body: JSON.stringify({
                        lead_id: currentLeadId,
                        photo_src: photoSrc
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            loadLeadPhotos(currentLeadId);
                            showToast('Photo deleted successfully!', 'success');
                        } else {
                            showToast('Error deleting photo: ' + data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Error deleting photo. Please try again.', 'error');
                    });
            }

            // Lightbox functionality
            function openLightbox(index) {
                // Clear estimate lightbox state when opening details photos
                window.estimateLightboxImages = null;
                window.currentEstimateLightboxIndex = 0;

                currentLightboxIndex = index;
                const lightbox = document.getElementById('lightbox');
                const lightboxImage = document.getElementById('lightboxImage');
                const currentIndex = document.getElementById('currentImageIndex');
                const totalImages = document.getElementById('totalImages');

                lightboxImage.src = '<?php echo e(asset('public/uploads/leads')); ?>/' + lightboxImages[index];
                currentIndex.textContent = index + 1;
                totalImages.textContent = lightboxImages.length;

                lightbox.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }

            function closeLightbox() {
                const lightbox = document.getElementById('lightbox');
                lightbox.style.display = 'none';
                document.body.style.overflow = 'auto';

                // Clear estimate lightbox state
                window.estimateLightboxImages = null;
                window.currentEstimateLightboxIndex = 0;
            }

            function previousImage() {
                // Check if we're viewing estimate photos
                if (window.estimateLightboxImages && window.estimateLightboxImages.length > 0) {
                    previousEstimateImage();
                    return;
                }

                // Handle details photos
                if (lightboxImages.length <= 1) return;

                currentLightboxIndex = (currentLightboxIndex - 1 + lightboxImages.length) % lightboxImages.length;
                updateLightboxImage();
            }

            function nextImage() {
                // Check if we're viewing estimate photos
                if (window.estimateLightboxImages && window.estimateLightboxImages.length > 0) {
                    nextEstimateImage();
                    return;
                }

                // Handle details photos
                if (lightboxImages.length <= 1) return;

                currentLightboxIndex = (currentLightboxIndex + 1) % lightboxImages.length;
                updateLightboxImage();
            }

            function updateLightboxImage() {
                const lightboxImage = document.getElementById('lightboxImage');
                const currentIndex = document.getElementById('currentImageIndex');

                lightboxImage.src = '<?php echo e(asset('public/uploads/leads')); ?>/' + lightboxImages[currentLightboxIndex];
                currentIndex.textContent = currentLightboxIndex + 1;
            }

            // Keyboard navigation for lightbox
            document.addEventListener('keydown', function (e) {
                const lightbox = document.getElementById('lightbox');
                if (lightbox.style.display === 'block') {
                    switch (e.key) {
                        case 'Escape':
                            closeLightbox();
                            break;
                        case 'ArrowLeft':
                            previousImage();
                            break;
                        case 'ArrowRight':
                            nextImage();
                            break;
                    }
                }
            });

            // Set minimum date and time for appointment fields
            function setAppointmentMinValues() {
                const now = new Date();
                const today = now.toISOString().split('T')[0];
                const currentTime = now.toTimeString().split(' ')[0].substring(0, 5);

                const dateInput = document.getElementById('appointment_date');
                const timeInput = document.getElementById('appointment_time');

                if (dateInput) {
                    dateInput.min = today;
                }
                if (timeInput) {
                    timeInput.min = currentTime;
                }
            }

            // Validate appointment date and time
            function validateAppointmentDateTime() {
                const appointmentDate = document.getElementById('appointment_date').value;
                const appointmentTime = document.getElementById('appointment_time').value;

                if (!appointmentDate || !appointmentTime) {
                    return {valid: false, message: 'Please select both date and time'};
                }

                const now = new Date();
                const selectedDateTime = new Date(appointmentDate + ' ' + appointmentTime);

                if (selectedDateTime <= now) {
                    return {valid: false, message: 'Appointment date and time must be in the future'};
                }

                return {valid: true};
            }

            // Save appointment function
            function saveAppointment() {
                const leadId = document.getElementById('leadDetailsModal').getAttribute('data-lead-id');
                const appointmentDate = document.getElementById('appointment_date').value;
                const appointmentTime = document.getElementById('appointment_time').value;
                const saveBtn = document.getElementById('saveAppointmentBtn');

                if (!leadId) {
                    showToast('No lead selected', 'error');
                    return;
                }

                // Validate appointment date and time
                const validation = validateAppointmentDateTime();
                if (!validation.valid) {
                    showToast(validation.message, 'error');
                    return;
                }

                // Show loading state
                const originalText = saveBtn.innerHTML;
                saveBtn.innerHTML = '<i class="ri-loader-4-line me-1"></i>Saving...';
                saveBtn.disabled = true;

                // Combine date and time
                const appointmentDateTime = appointmentDate + ' ' + appointmentTime;

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '<?php echo e(csrf_token()); ?>';

                fetch('<?php echo e(url("/update_appointment")); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        lead_id: leadId,
                        appointment: appointmentDateTime
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast('Appointment saved successfully!', 'success');
                        } else {
                            showToast('Error saving appointment: ' + data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Error saving appointment. Please try again.', 'error');
                    })
                    .finally(() => {
                        // Reset button state
                        saveBtn.innerHTML = originalText;
                        saveBtn.disabled = false;
                    });
            }

            // Show toast notifications
            function showToast(message, type = 'info') {
                // You can implement your own toast notification here
                // For now, using simple alert
                if (type === 'error') {
                    alertify.error('Error: ' + message);
                } else {

                    alertify.success(message);
                }
            }

            // Toggle did not answer reason textarea
            function toggleDidNotAnswerReason() {
                const checkbox = document.getElementById('didNotAnswerCheckbox');
                const reasonDiv = document.getElementById('didNotAnswerReasonDiv');
                const reasonTextarea = document.getElementById('didNotAnswerReason');

                if (checkbox.checked) {
                    reasonDiv.style.display = 'block';
                    // Auto-save when checkbox is checked
                    autoSaveDidNotAnswer();
                } else {
                    reasonDiv.style.display = 'none';
                    reasonTextarea.value = '';
                    // Auto-save when checkbox is unchecked
                    autoSaveDidNotAnswer();
                }
            }

            // Auto-save did not answer data
            function autoSaveDidNotAnswer() {
                const leadId = document.getElementById('leadDetailsModal').getAttribute('data-lead-id');
                if (!leadId) return;

                const checkbox = document.getElementById('didNotAnswerCheckbox');
                const reasonTextarea = document.getElementById('didNotAnswerReason');

                const data = {
                    lead_id: leadId,
                    did_not_answer: checkbox.checked ? 1 : 0,
                    did_not_answer_reason: checkbox.checked ? reasonTextarea.value : ''
                };

                // Add CSRF token
                data._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('<?php echo e(url("/auto_save_did_not_answer")); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': data._token
                    },
                    body: JSON.stringify(data)
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Did not answer data saved successfully');
                        } else {
                            console.error('Error saving did not answer data:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            // Cost Breakdown Table Functions
            function addCostRow() {
                const tbody = document.getElementById('costBreakdownBody');
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td><input type="text" class="form-control" name="product[]" placeholder="Product name"></td>
                    <td><input type="number" class="form-control" name="quantity[]" placeholder="0" min="0" step="1"></td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="cost[]" placeholder="0.00" pattern="[0-9]+(\.[0-9]{1,2})?" onkeyup="formatCurrency(this)">
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" onclick="removeCostRow(this)" title="Remove Row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </button>
                    </td>
                `;

                tbody.appendChild(newRow);
                updateRemoveButtons();
            }

            function removeCostRow(button) {
                const row = button.closest('tr');
                const tbody = document.getElementById('costBreakdownBody');

                if (tbody.children.length > 1) {
                    row.remove();
                    updateRemoveButtons();
                }
            }

            function updateRemoveButtons() {
                const tbody = document.getElementById('costBreakdownBody');
                const rows = tbody.children;

                // Enable/disable remove buttons based on number of rows
                for (let i = 0; i < rows.length; i++) {
                    const removeBtn = rows[i].querySelector('.btn-danger');
                    if (rows.length === 1) {
                        removeBtn.disabled = true;
                    } else {
                        removeBtn.disabled = false;
                    }
                }
            }

            // Format currency input
            function formatCurrency(input) {
                let value = input.value.replace(/[^\d.]/g, '');
                if (value && !isNaN(value)) {
                    // Ensure only 2 decimal places
                    const parts = value.split('.');
                    if (parts[1] && parts[1].length > 2) {
                        parts[1] = parts[1].substring(0, 2);
                        value = parts.join('.');
                    }
                    input.value = value;
                }
            }

            // Save estimation function
            function saveEstimation() {
                const leadId = document.getElementById('leadDetailsModal').getAttribute('data-lead-id');
                if (!leadId) {
                    showToast('No lead selected', 'error');
                    return;
                }

                const form = document.getElementById('leadEstimationForm');
                const formData = new FormData(form);

                // Collect cost breakdown data
                const costBreakdown = [];
                const products = formData.getAll('product[]');
                const quantities = formData.getAll('quantity[]');
                const costs = formData.getAll('cost[]');

                for (let i = 0; i < products.length; i++) {
                    if (products[i] || quantities[i] || costs[i]) {
                        costBreakdown.push({
                            product: products[i] || '',
                            quantity: quantities[i] || 0,
                            cost: costs[i] || 0
                        });
                    }
                }

                // Combine followup date and time
                const followupDate = formData.get('followup_date');
                const followupTime = formData.get('followup_time');
                let followupDateTime = null;

                if (followupDate && followupTime) {
                    followupDateTime = followupDate + ' ' + followupTime;
                } else if (followupDate) {
                    followupDateTime = followupDate + ' 00:00:00';
                }

                const data = {
                    lead_id: leadId,
                    project_cost: formData.get('project_cost') || 0,
                    lead_potential: formData.get('lead_potential') || '',
                    project_details: formData.get('project_details') || '',
                    cost_breakdown: costBreakdown,
                    followup: followupDateTime,
                    reason: formData.get('followup_reason') || ''
                };

                // Add CSRF token
                data._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Show loading state
                const saveBtn = document.querySelector('button[onclick="saveEstimation()"]');
                const originalText = saveBtn.innerHTML;
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
                saveBtn.disabled = true;

                fetch('<?php echo e(url("/save_estimation")); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': data._token
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Estimation saved successfully!', 'success');
                    } else {
                        showToast('Error saving estimation: ' + data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Error saving estimation. Please try again.', 'error');
                })
                .finally(() => {
                    // Reset button state
                    saveBtn.innerHTML = originalText;
                    saveBtn.disabled = false;
                });
            }

            // Initialize cost breakdown functionality when modal is shown
            document.addEventListener('DOMContentLoaded', function() {
                // Add event listener for project cost formatting
                const projectCostInput = document.getElementById('project_cost');
                if (projectCostInput) {
                    projectCostInput.addEventListener('keyup', function() {
                        formatCurrency(this);
                    });
                }

                // Initialize remove buttons state
                updateRemoveButtons();
            });

            // Initialize estimate photo upload functionality
            function initializeEstimatePhotoUpload() {
                const uploadZone = document.getElementById('estimateUploadZone');
                const photoInput = document.getElementById('estimatePhotoInput');
                const chooseFilesBtn = document.getElementById('estimateChooseFilesBtn');

                console.log('Initializing estimate photo upload:', {uploadZone, photoInput, chooseFilesBtn});

                if (!uploadZone || !photoInput || !chooseFilesBtn) {
                    console.error('Estimate upload elements not found:', {uploadZone, photoInput, chooseFilesBtn});
                    return;
                }

                // Check if elements are visible
                console.log('Upload zone display:', window.getComputedStyle(uploadZone).display);
                console.log('Upload zone visibility:', window.getComputedStyle(uploadZone).visibility);

                // Remove existing event listeners to avoid duplicates
                uploadZone.removeEventListener('dragover', handleEstimateDragOver);
                uploadZone.removeEventListener('dragleave', handleEstimateDragLeave);
                uploadZone.removeEventListener('drop', handleEstimateDrop);
                uploadZone.removeEventListener('click', handleEstimateUploadClick);
                photoInput.removeEventListener('change', handleEstimateFileSelect);
                chooseFilesBtn.removeEventListener('click', handleEstimateChooseFilesClick);

                // Drag and drop events
                uploadZone.addEventListener('dragover', handleEstimateDragOver);
                uploadZone.addEventListener('dragleave', handleEstimateDragLeave);
                uploadZone.addEventListener('drop', handleEstimateDrop);

                // File input change
                photoInput.addEventListener('change', handleEstimateFileSelect);

                // Click to upload (for the drag zone)
                uploadZone.addEventListener('click', handleEstimateUploadClick);

                // Choose files button click
                chooseFilesBtn.addEventListener('click', handleEstimateChooseFilesClick);

                console.log('Estimate photo upload initialized successfully');
            }

            // Handle estimate upload zone click
            function handleEstimateUploadClick(e) {
                console.log('Estimate upload zone clicked');

                e.preventDefault();
                e.stopPropagation();
                const photoInput = document.getElementById('estimatePhotoInput');
                if (photoInput) {
                    photoInput.click();
                }
            }

            // Handle estimate choose files button click
            function handleEstimateChooseFilesClick(e) {
                console.log('Estimate choose files button clicked');
                e.preventDefault();
                e.stopPropagation();

                const tempInput = document.createElement('input');
                tempInput.type = 'file';
                tempInput.multiple = true;
                tempInput.accept = 'image/*';
                tempInput.style.display = 'none';
                document.body.appendChild(tempInput);

                tempInput.addEventListener('change', function (e) {
                    handleEstimateFiles(e.target.files);
                    document.body.removeChild(tempInput);
                });

                tempInput.click();
            }

            // Drag and drop handlers for estimate
            function handleEstimateDragOver(e) {
                e.preventDefault();
                e.stopPropagation();
                e.currentTarget.classList.add('dragover');
            }

            function handleEstimateDragLeave(e) {
                e.preventDefault();
                e.stopPropagation();
                e.currentTarget.classList.remove('dragover');
            }

            function handleEstimateDrop(e) {
                e.preventDefault();
                e.stopPropagation();
                e.currentTarget.classList.remove('dragover');

                const files = e.dataTransfer.files;
                handleEstimateFiles(files);
            }

            // Handle estimate file select
            function handleEstimateFileSelect(e) {
                handleEstimateFiles(e.target.files);
            }

            // Handle estimate files
            function handleEstimateFiles(files) {
                if (!files || files.length === 0) {
                    return;
                }

                const leadId = document.getElementById('leadDetailsModal').getAttribute('data-lead-id');
                if (!leadId) {
                    showToast('No lead selected for photo upload', 'error');
                    return;
                }

                const fileArray = Array.from(files);
                const uploadProgress = document.getElementById('estimateUploadProgress');
                if (uploadProgress) {
                    uploadProgress.style.display = 'block';
                }

                uploadEstimateFilesSequentially(fileArray, leadId, 0);
            }

            // Upload estimate files sequentially
            function uploadEstimateFilesSequentially(files, leadId, index) {
                if (index >= files.length) {
                    const uploadProgress = document.getElementById('estimateUploadProgress');
                    if (uploadProgress) {
                        uploadProgress.style.display = 'none';
                    }
                    return;
                }

                const file = files[index];
                const progressBar = document.querySelector('#estimateUploadProgress .progress-bar');
                if (progressBar) {
                    const progress = ((index + 1) / files.length) * 100;
                    progressBar.style.width = progress + '%';
                    progressBar.textContent = `${Math.round(progress)}%`;
                }

                const formData = new FormData();
                formData.append('photo', file);
                formData.append('lead_id', leadId);
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                fetch('<?php echo e(url("/upload_estimate_photo")); ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        addEstimatePhotoToGrid(data.filename, data.photo_name);
                        showToast(`Photo ${index + 1} uploaded successfully!`, 'success');
                    } else {
                        showToast(`Failed to upload photo ${index + 1}: ${data.message}`, 'error');
                    }
                })
                .catch(error => {
                    console.error('Estimate photo upload error:', error);
                    showToast(`Error uploading photo ${index + 1}`, 'error');
                })
                .finally(() => {
                    uploadEstimateFilesSequentially(files, leadId, index + 1);
                });
            }

            // Add estimate photo to grid
            function addEstimatePhotoToGrid(photoPath, photoName) {
                const photosGrid = document.getElementById('estimatePhotosGrid');
                if (!photosGrid) {
                    return;
                }

                const photoElement = document.createElement('div');
                photoElement.className = 'photo-item';
                photoElement.innerHTML = `
                    <img src="<?php echo e(asset('public/uploads/leads')); ?>/${photoPath}" alt="${photoName}" onclick="openEstimateLightbox('${photoPath}')">
                    <div class="photo-actions">
                        <button class="delete-btn" onclick="removeEstimatePhoto(this, '${photoPath}')" title="Delete Photo">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </div>
                `;

                photosGrid.appendChild(photoElement);

                const uploadArea = document.getElementById('estimatePhotoUploadArea');
                if (uploadArea) {
                    uploadArea.style.display = 'block';
                }
            }

            // Remove estimate photo
            function removeEstimatePhoto(button, photoPath) {
                if (confirm('Are you sure you want to remove this photo?')) {
                    const leadId = document.getElementById('leadDetailsModal').getAttribute('data-lead-id');
                    if (!leadId) {
                        showToast('No lead selected', 'error');
                        return;
                    }

                    fetch('<?php echo e(url("/remove_estimate_photo")); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            lead_id: leadId,
                            photo_path: photoPath
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            button.closest('.photo-item').remove();
                            showToast('Photo removed successfully', 'success');
                        } else {
                            showToast('Failed to remove photo: ' + data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error removing photo:', error);
                        showToast('Error removing photo', 'error');
                    });
                }
            }

            // Open estimate lightbox
            function openEstimateLightbox(photoPath) {
                const estimatePhotos = [];
                const photosGrid = document.getElementById('estimatePhotosGrid');
                if (photosGrid) {
                    const photoItems = photosGrid.querySelectorAll('.photo-item img');
                    photoItems.forEach(img => {
                        estimatePhotos.push(img.src);
                    });
                }

                const currentIndex = estimatePhotos.findIndex(src => src.includes(photoPath));

                // Set estimate photos for lightbox navigation
                window.estimateLightboxImages = estimatePhotos;
                window.currentEstimateLightboxIndex = currentIndex >= 0 ? currentIndex : 0;

                const lightboxImage = document.getElementById('lightboxImage');
                const lightbox = document.getElementById('lightbox');
                if (lightboxImage && lightbox) {
                    lightboxImage.src = "<?php echo e(asset('public/uploads/leads')); ?>/" + photoPath;
                    lightbox.style.display = 'block';
                    updateEstimateLightboxCounter();
                }
            }

            // Update estimate lightbox counter
            function updateEstimateLightboxCounter() {
                const currentIndexSpan = document.getElementById('currentImageIndex');
                const totalImagesSpan = document.getElementById('totalImages');

                if (currentIndexSpan && totalImagesSpan && window.estimateLightboxImages) {
                    currentIndexSpan.textContent = (window.currentEstimateLightboxIndex + 1).toString();
                    totalImagesSpan.textContent = window.estimateLightboxImages.length.toString();
                }
            }

            // Navigate estimate lightbox
            function previousEstimateImage() {
                if (window.estimateLightboxImages && window.estimateLightboxImages.length > 0) {
                    window.currentEstimateLightboxIndex = (window.currentEstimateLightboxIndex - 1 + window.estimateLightboxImages.length) % window.estimateLightboxImages.length;
                    document.getElementById('lightboxImage').src = window.estimateLightboxImages[window.currentEstimateLightboxIndex];
                    updateEstimateLightboxCounter();
                }
            }

            function nextEstimateImage() {
                if (window.estimateLightboxImages && window.estimateLightboxImages.length > 0) {
                    window.currentEstimateLightboxIndex = (window.currentEstimateLightboxIndex + 1) % window.estimateLightboxImages.length;
                    document.getElementById('lightboxImage').src = window.estimateLightboxImages[window.currentEstimateLightboxIndex];
                    updateEstimateLightboxCounter();
                }
            }

            // Load estimate photos for a lead
            function loadEstimatePhotos(leadId) {
                if (!leadId) {
                    return;
                }

                fetch(`<?php echo e(url('/get_estimate_photos')); ?>/${leadId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success && data.photos) {
                            const photosGrid = document.getElementById('estimatePhotosGrid');
                            const uploadArea = document.getElementById('estimatePhotoUploadArea');

                            if (photosGrid) {
                                // Show upload area
                                if (uploadArea) {
                                    uploadArea.style.display = 'block';
                                }

                                if (data.photos.length === 0) {
                                    photosGrid.innerHTML = `
                                        <div class="photos-empty">
                                            <i class="ri-image-line"></i>
                                            <p>No photos uploaded yet</p>
                                        </div>
                                    `;
                                } else {
                                    photosGrid.innerHTML = '';
                                    data.photos.forEach(photo => {
                                        addEstimatePhotoToGrid(photo.filename, photo.name);
                                    });
                                }
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error loading estimate photos:', error);
                    });
            }

            // Load estimation data for a lead
            function loadEstimationData(leadId) {
                if (!leadId) {
                    console.log('No lead ID provided for loading estimation data');
                    return;
                }

                console.log('Loading estimation data for lead:', leadId);

                fetch(`<?php echo e(url('/get_estimation_data')); ?>/${leadId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Estimation data response:', data);
                        if (data.success && data.estimation) {
                            const estimation = data.estimation;
                            console.log('Estimation data:', estimation);

                            // Populate form fields
                            const projectCostField = document.getElementById('project_cost');
                            const leadPotentialField = document.getElementById('lead_potential');
                            const projectDetailsField = document.getElementById('project_details');
                            const followupReasonField = document.getElementById('followup_reason');

                            if (projectCostField) projectCostField.value = estimation.cost || '';
                            if (leadPotentialField) leadPotentialField.value = estimation.potential || '';
                            if (projectDetailsField) projectDetailsField.value = estimation.details || '';
                            if (followupReasonField) followupReasonField.value = estimation.reason || '';

                            // Handle followup date/time
                            if (estimation.followup) {
                                const followupDate = new Date(estimation.followup);
                                const followupDateField = document.getElementById('followup_date');
                                const followupTimeField = document.getElementById('followup_time');

                                if (followupDateField) {
                                    followupDateField.value = followupDate.toISOString().split('T')[0];
                                }
                                if (followupTimeField) {
                                    followupTimeField.value = followupDate.toTimeString().slice(0, 5);
                                }
                            }

                            // Populate cost breakdown table
                            if (estimation.breakdown && estimation.breakdown.length > 0) {
                                console.log('Populating cost breakdown table with:', estimation.breakdown);
                                populateCostBreakdownTable(estimation.breakdown);
                            } else {
                                console.log('No cost breakdown data to populate');
                            }
                        } else {
                            console.log('No estimation data found for lead:', leadId);
                            // Clear form fields if no data
                            clearEstimationForm();
                        }
                    })
                    .catch(error => {
                        console.error('Error loading estimation data:', error);
                    });
            }

            // Clear estimation form
            function clearEstimationForm() {
                const fields = ['project_cost', 'lead_potential', 'project_details', 'followup_date', 'followup_time', 'followup_reason'];
                fields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field) field.value = '';
                });

                // Clear cost breakdown table
                const tbody = document.getElementById('costBreakdownBody');
                if (tbody) {
                    tbody.innerHTML = `
                        <tr>
                            <td><input type="text" class="form-control" name="product[]" placeholder="Product name"></td>
                            <td><input type="number" class="form-control" name="quantity[]" placeholder="0" min="0" step="1"></td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" name="cost[]" placeholder="0.00" pattern="[0-9]+(\.[0-9]{1,2})?" onkeyup="formatCurrency(this)">
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success" onclick="addCostRow()" title="Add Row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                    </svg>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" onclick="removeCostRow(this)" title="Remove Row" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    `;
                    updateRemoveButtons();
                }
            }

            // Populate cost breakdown table
            function populateCostBreakdownTable(breakdown) {
                const tbody = document.getElementById('costBreakdownBody');
                if (!tbody) return;

                // Clear existing rows except the first one
                tbody.innerHTML = '';

                breakdown.forEach((item, index) => {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td><input type="text" class="form-control" name="product[]" placeholder="Product name" value="${item.product || ''}"></td>
                        <td><input type="number" class="form-control" name="quantity[]" placeholder="0" min="0" step="1" value="${item.quantity || ''}"></td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="cost[]" placeholder="0.00" pattern="[0-9]+(\.[0-9]{1,2})?" value="${item.cost || ''}" onkeyup="formatCurrency(this)">
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success" onclick="addCostRow()" title="Add Row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                </svg>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="removeCostRow(this)" title="Remove Row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </button>
                        </td>
                    `;
                    tbody.appendChild(newRow);
                });

                // Update remove buttons state
                updateRemoveButtons();
            }

            // Global variable to store current lead ID
            //let currentLeadId = null;

            // Function to open mark as completed modal
            function markAsCompleted(leadId = null, currentStatus = null) {
                // If no leadId provided, try to get it from the lead details modal
                if (!leadId) {
                    const leadDetailsModal = document.getElementById('leadDetailsModal');
                    if (leadDetailsModal) {
                        leadId = leadDetailsModal.getAttribute('data-lead-id');
                        currentStatus = leadDetailsModal.getAttribute('data-lead-status');
                    }
                }

                if (!leadId) {
                    alert('Lead ID not found');
                    return;
                }

                currentLeadId = leadId;

                // Reset the form and pre-select current status if it's a completion status
                const completionReasonSelect = document.getElementById('completion_reason');
                completionReasonSelect.value = '';

                // Pre-select current status if it's one of the completion statuses
                if (currentStatus && ['sold', 'estimate_complete', 'no_contact'].includes(currentStatus)) {
                    completionReasonSelect.value = currentStatus;
                }

                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById('markAsCompletedModal'));
                modal.show();
            }

            // Function to submit mark as completed form
            function submitMarkAsCompleted() {
                const reason = document.getElementById('completion_reason').value;

                if (!reason) {
                    alert('Please select a reason');
                    return;
                }

                if (!currentLeadId) {
                    alert('Lead ID not found');
                    return;
                }

                window.location.href = `<?php echo e(url('/')); ?>/markAs/${currentLeadId}/${reason}`;

            }
        </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/drimpacto_app/resources/views/leads.blade.php ENDPATH**/ ?>