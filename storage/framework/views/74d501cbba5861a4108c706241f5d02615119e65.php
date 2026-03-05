<?php $__env->startSection('content'); ?>



    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">All Agents</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active">Agents</li>
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
                                <h4 class="card-title mb-0 flex-grow-1">All Agents</h4>

                                <div class="flex-shrink-0">

                                    <button type="button" class="btn btn-soft-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-add-circle-line align-middle me-1"></i> Add Agent</button>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">


                                <div class="live-preview">
                                    <div class="table-responsive table-card">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 46px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="cardtableCheck">
                                                        <label class="form-check-label" for="cardtableCheck"></label>
                                                    </div>
                                                </th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date Created</th>
                                                <th scope="col">Total Contracts Price</th>
                                                <th scope="col">Total Commission Paid</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($agents as $k=>$v){ ?>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="cardtableCheck01">
                                                            <label class="form-check-label" for="cardtableCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td><a href="#" class="fw-medium">#SA<?php echo e(str_pad($v['id'],4,"0",STR_PAD_LEFT)); ?></a></td>
                                                    <td><?php echo e($v['name']." ".$v['lname']); ?></td>
                                                    <td><?php echo e(date('d M,Y',strtotime($v['created_at']))); ?></td>
                                                    <td>$<?php echo e(number_format($v['total_contract_price'], 2)); ?></td>
                                                    <td>$<?php echo e(number_format($v['total_commission'], 2)); ?></td>
                                                  
                                                </tr>
                                            <?php } ?>


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

        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Add Agent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(url('add_agent')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" required class="form-control" id="firstName" placeholder="Enter firstname" name="name" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" required class="form-control" id="lastName" placeholder="Enter lastname" name="lname" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-6">
                                    <label for="emailInput" class="form-label">Email</label>
                                    <input type="email" required class="form-control" readonly onfocus="this.removeAttribute('readonly')" id="emailInput" placeholder="Enter your email" name="email" />
                                </div>
                                <!--end col-->
                                <div class="col-xxl-6">
                                    <label for="passwordInput" class="form-label">Password</label>
                                    <input type="password" required class="form-control" id="passwordInput" placeholder="Enter password" name="password" />
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/drimpacto_app/resources/views/agents.blade.php ENDPATH**/ ?>