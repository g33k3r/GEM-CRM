<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar-visibility="show" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <meta charset="utf-8" />
    <title>Dashboard | Commission Tracking System </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sales CRM" name="description" />
    <meta content="Jetnetix" name="author" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('public')); ?>/assets/images/favicon.ico">

    <!-- jsvectormap css -->
    <link href="<?php echo e(asset('public')); ?>/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="<?php echo e(asset('public')); ?>/assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="<?php echo e(asset('public')); ?>/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('public')); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(asset('public')); ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo e(asset('public')); ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?php echo e(asset('public')); ?>/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
						<span class="hamburger-icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
                    </button>

                    <!-- App Search-->

                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-md-none topbar-head-dropdown header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-search fs-22"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>






                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                            <i class='bx bx-fullscreen fs-22'></i>
                        </button>
                    </div>

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                            <i class='bx bx-moon fs-22'></i>
                        </button>
                    </div>



                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="d-flex align-items-center">
								<img class="rounded-circle header-profile-user" src="<?php echo e(asset('public/uploads/profile/'.session()->get('adminAuth')[0]['profile_image'])); ?>" alt="Header Avatar">
								<span class="text-start ms-xl-2">
									<span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= ucwords(session()->get('adminAuth')[0]['name']) ?></span>
									<span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><?= ucfirst(session()->get('adminAuth')[0]['type']) ?></span>
								</span>
							</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome !</h6>

                            
                            <a class="dropdown-item" href="<?php echo e(url('/settings')); ?>"><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                            <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- /.modal -->
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="<?php echo e(url('/')); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo e(asset('public/Dr-impact-b.png')); ?>" alt="Logo" class="img-fluid">
					
                    </span>
                <span class="logo-lg">
                <img src="<?php echo e(asset('public/Dr-impact-b.png')); ?>" alt="Logo" class="img-fluid">
                    </span>
            </a>
            <!-- Light Logo-->

            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu"></div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?php echo e(url('/')); ?>">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                        </a>
                    </li>
                    <?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo e(url('/view/agents')); ?>">
                                <i class="ri-team-line"></i> <span data-key="t-dashboards">Agents</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo e(url('/view/leads')); ?>">
                                <i class="bx bx-user-circle"></i> <span data-key="t-dashboards">Leads</span>
                            </a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?php echo e(url('/sales')); ?>">
                            <i class="ri-briefcase-4-line"></i> <span data-key="t-dashboards">Sales</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?php echo e(url('/payouts')); ?>">
                            <i class="ri-send-plane-line"></i> <span data-key="t-dashboards">Payouts</span>
                        </a>
                    </li>
                    

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?php echo e(url('/settings')); ?>">
                            <i class=" ri-settings-5-line"></i> <span data-key="t-dashboards">Settings</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->


    <?php echo $__env->yieldContent('content'); ?>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Drimpacto.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by <a href="https://jetnetix.com" target="_blank">Jetnetix</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="<?php echo e(asset('public')); ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/libs/node-waves/waves.min.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/libs/feather-icons/feather.min.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/js/plugins.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/libs/jsvectormap/jsvectormap.min.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/libs/jsvectormap/maps/world-merc.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/libs/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/js/pages/dashboard-ecommerce.init.js"></script>
<script src="<?php echo e(asset('public')); ?>/assets/js/app.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<script>
        <?php if(session()->has('message')){ ?>
            alertify.set('notifier','position', 'top-center');
            alertify.success('<?php echo e(session()->get('message')); ?>');
        <?php } ?>
        <?php if(session()->has('error')){ ?>
            alertify.set('notifier','position', 'top-center');
            alertify.error('<?php echo e(session()->get('error')); ?>');
        <?php } ?>
</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/drimpacto_app/resources/views/layout.blade.php ENDPATH**/ ?>