<?php $__env->startSection('content'); ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Profile Settings</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Settings</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Update Profile</h4>
                        </div>

                        <div class="card-body">
                            <?php if(session()->has('message')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session()->get('message')); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <div class="live-preview">
                                <form action="<?php echo e(url('update-profile')); ?>" method="POST" enctype="multipart/form-data" class="row g-3">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-md-12 text-center mb-4">
                                        <div class="profile-image-wrapper">
                                            <img src="<?php echo e($user['profile_image'] ? asset('public/uploads/profile/'.$user['profile_image']) : asset('public/assets/images/users/avatar-1.jpg')); ?>" 
                                                 alt="Profile" class="rounded-circle avatar-xl">
                                        </div>
                                        <div class="mt-3">
                                            <input type="file" name="profile_image" class="form-control" id="profile_image" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="name" name="name" 
                                                   value="<?php echo e($user['name']); ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lname" name="lname" 
                                                   value="<?php echo e($user['lname']); ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   value="<?php echo e($user['email']); ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input readonly onFocus="this.removeAttribute('readonly');" type="password" class="form-control" id="password" name="password" 
                                                   placeholder="Leave blank to keep current password">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.profile-image-wrapper {
    display: inline-block;
    position: relative;
}
.avatar-xl {
    height: 120px;
    width: 120px;
    object-fit: cover;
}
</style>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/drimpacto_app/resources/views/settings.blade.php ENDPATH**/ ?>