<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Dental Repair</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <!-- App css -->
    <link href="{{ asset('public/') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/') }}/assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/') }}/assets/libs/fullcalendar/main.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- <link href="assets/libs/mobius1-selectr/selectr.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/huebee/huebee.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/vanillajs-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
    <script src="{{ asset('public/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body data-layout="horizontal" class="dark-topbar">
<div class="topbar">
    <div class="brand">
        <a href="{{ url('/') }}" class="logo">
            <span></span>
            <span class="text-white" style="font-weight:700;margin-left:14px">
                GDR
            </span>
        </a>
    </div>
    <!--end logo-->
    <!-- Navbar -->
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-end mb-0">
            <li class="dropdown hide-phone">
                <a class="nav-link dropdown-toggle arrow-none nav-icon"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px;padding: 12px 53px;">
                    <i class="ti ti-plus"></i><span style="color:white">Add New</span>
                </a>
                <ul class="dropdown-menu" style="min-width:20px !important">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addClientModal">Client</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addJobModal">Job</a></li>
                </ul>
            </li>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">

                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.4825 14.8317C14.3771 14.607 16.204 14.1616 17.9368 13.5219C16.5 11.927 15.6255 9.81564 15.6255 7.5V6.79919C15.6256 6.78281 15.6257 6.76641 15.6257 6.75C15.6257 3.43629 12.9394 0.75 9.62568 0.75C6.31198 0.75 3.62568 3.43629 3.62568 6.75L3.62549 7.5C3.62549 9.81564 2.75096 11.927 1.31416 13.5219C3.04709 14.1616 4.87412 14.607 6.76882 14.8318M12.4825 14.8317C11.5457 14.9428 10.5923 15 9.62549 15C8.65885 15 7.70557 14.9429 6.76882 14.8318M12.4825 14.8317C12.5755 15.1211 12.6257 15.4297 12.6257 15.75C12.6257 17.4069 11.2825 18.75 9.62568 18.75C7.96883 18.75 6.62568 17.4069 6.62568 15.75C6.62568 15.4297 6.67588 15.1212 6.76882 14.8318M0.750122 5.25C1.0374 3.53764 1.80822 1.98924 2.91736 0.75M16.334 0.75C17.4432 1.98924 18.214 3.53764 18.5012 5.25" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span class="alert-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">

                    <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                        Notifications <span class="badge bg-soft-primary badge-pill">2</span>
                    </h6>
                    <div class="notification-menu" data-simplebar>
                        <!-- item-->
                        <a href="#" class="dropdown-item py-3">
                            <small class="float-end text-muted ps-2">2 min ago</small>
                            <div class="media">
                                <div class="avatar-md bg-soft-primary">
                                    <i class="ti ti-chart-arcs"></i>
                                </div>
                                <div class="media-body align-self-center ms-2 text-truncate">
                                    <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                    <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                </div><!--end media-body-->
                            </div><!--end media-->
                        </a><!--end-item-->
                        <!-- item-->
                        <a href="#" class="dropdown-item py-3">
                            <small class="float-end text-muted ps-2">10 min ago</small>
                            <div class="media">
                                <div class="avatar-md bg-soft-primary">
                                    <i class="ti ti-device-computer-camera"></i>
                                </div>
                                <div class="media-body align-self-center ms-2 text-truncate">
                                    <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                </div><!--end media-body-->
                            </div><!--end media-->
                        </a><!--end-item-->
                        <!-- item-->
                        <a href="#" class="dropdown-item py-3">
                            <small class="float-end text-muted ps-2">40 min ago</small>
                            <div class="media">
                                <div class="avatar-md bg-soft-primary">
                                    <i class="ti ti-diamond"></i>
                                </div>
                                <div class="media-body align-self-center ms-2 text-truncate">
                                    <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6>
                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                </div><!--end media-body-->
                            </div><!--end media-->
                        </a><!--end-item-->
                        <!-- item-->
                        <a href="#" class="dropdown-item py-3">
                            <small class="float-end text-muted ps-2">1 hr ago</small>
                            <div class="media">
                                <div class="avatar-md bg-soft-primary">
                                    <i class="ti ti-drone"></i>
                                </div>
                                <div class="media-body align-self-center ms-2 text-truncate">
                                    <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item py-3">
                            <small class="float-end text-muted ps-2">2 hrs ago</small>
                            <div class="media">
                                <div class="avatar-md bg-soft-primary">
                                    <i class="ti ti-users"></i>
                                </div>
                                <div class="media-body align-self-center ms-2 text-truncate">
                                    <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6>
                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                        View all <i class="fi-arrow-right"></i>
                    </a>
                </div>
            </li>
            <li class="notification-list" style="border-right:1px solid #FFFFFF26">
                <a class="nav-link arrow-none nav-icon" href="{{ url('/settings') }}" >
                    <i class="ti ti-settings"></i>
                </a>
            </li>
            <li class="dropdown d-flex align-items-center text-white gap-1">
                <a class="nav-link dropdown-toggle nav-user"  href="#" role="button">
                    <div class="d-flex align-items-center">
                        <?php
                        $image =  asset('public/uploads') . '/defaultProfilePic.jpg';
                        if(!empty(session()->get('adminAuth')[0]['img'])){
                            $image = asset('public/uploads') . "/" . session()->get('adminAuth')[0]['img'];
                        }
                        ?>
                        <img src="{{ $image }}" alt="profile-user" class="rounded-circle me-0 me-md-2 thumb-sm" />
                        <div class="user-name">
                            <span class="d-none d-lg-block fw-semibold font-12 text-white">
                                {{ session()->get('adminAuth')[0]['name'] }}
                            </span>
                            <small class="d-none d-lg-block font-11 ">
                                {{ (session()->get('adminAuth')[0]['type'] == 'admin') ? "Admin" : "Worker" }} Account
                            </small>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" width="24" height="24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                    </svg>
                </a>
            </li>
            <li class="menu-item">
                <a class="navbar-toggle nav-link" id="mobileToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </li>
        </ul>

        <div class="navbar-custom-menu">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="nav-item dropdown parent-menu-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="nav-span">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.75 6C3.75 4.75736 4.75736 3.75 6 3.75H8.25C9.49264 3.75 10.5 4.75736 10.5 6V8.25C10.5 9.49264 9.49264 10.5 8.25 10.5H6C4.75736 10.5 3.75 9.49264 3.75 8.25V6Z" stroke="#EFF6FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.75 15.75C3.75 14.5074 4.75736 13.5 6 13.5H8.25C9.49264 13.5 10.5 14.5074 10.5 15.75V18C10.5 19.2426 9.49264 20.25 8.25 20.25H6C4.75736 20.25 3.75 19.2426 3.75 18V15.75Z" stroke="#EFF6FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.5 6C13.5 4.75736 14.5074 3.75 15.75 3.75H18C19.2426 3.75 20.25 4.75736 20.25 6V8.25C20.25 9.49264 19.2426 10.5 18 10.5H15.75C14.5074 10.5 13.5 9.49264 13.5 8.25V6Z" stroke="#EFF6FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.5 15.75C13.5 14.5074 14.5074 13.5 15.75 13.5H18C19.2426 13.5 20.25 14.5074 20.25 15.75V18C20.25 19.2426 19.2426 20.25 18 20.25H15.75C14.5074 20.25 13.5 19.2426 13.5 18V15.75Z" stroke="#EFF6FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Dashboards
                            </span>
                        </a>
                    </li><!--end nav-item-->
                    <li class="nav-item dropdown parent-menu-item">
                        <a class="nav-link" href="{{ url('/calendar') }}">
                            <span class="nav-span">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.75 3V5.25M17.25 3V5.25M3 18.75V7.5C3 6.25736 4.00736 5.25 5.25 5.25H18.75C19.9926 5.25 21 6.25736 21 7.5V18.75M3 18.75C3 19.9926 4.00736 21 5.25 21H18.75C19.9926 21 21 19.9926 21 18.75M3 18.75V11.25C3 10.0074 4.00736 9 5.25 9H18.75C19.9926 9 21 10.0074 21 11.25V18.75M12 12.75H12.0075V12.7575H12V12.75ZM12 15H12.0075V15.0075H12V15ZM12 17.25H12.0075V17.2575H12V17.25ZM9.75 15H9.7575V15.0075H9.75V15ZM9.75 17.25H9.7575V17.2575H9.75V17.25ZM7.5 15H7.5075V15.0075H7.5V15ZM7.5 17.25H7.5075V17.2575H7.5V17.25ZM14.25 12.75H14.2575V12.7575H14.25V12.75ZM14.25 15H14.2575V15.0075H14.25V15ZM14.25 17.25H14.2575V17.2575H14.25V17.25ZM16.5 12.75H16.5075V12.7575H16.5V12.75ZM16.5 15H16.5075V15.0075H16.5V15Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Calendar
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown parent-menu-item">
                        <a class="nav-link" href="{{ url('/jobs') }}">
                            <span class="nav-span">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4194 15.1694L17.25 21C18.2855 22.0355 19.9645 22.0355 21 21C22.0355 19.9645 22.0355 18.2855 21 17.25L15.1233 11.3733M11.4194 15.1694L13.9155 12.1383C14.2315 11.7546 14.6542 11.5132 15.1233 11.3733M11.4194 15.1694L6.76432 20.8219C6.28037 21.4096 5.55897 21.75 4.79768 21.75C3.39064 21.75 2.25 20.6094 2.25 19.2023C2.25 18.441 2.59044 17.7196 3.1781 17.2357L10.0146 11.6056M15.1233 11.3733C15.6727 11.2094 16.2858 11.1848 16.8659 11.2338C16.9925 11.2445 17.1206 11.25 17.25 11.25C19.7353 11.25 21.75 9.23528 21.75 6.75C21.75 6.08973 21.6078 5.46268 21.3523 4.89779L18.0762 8.17397C16.9605 7.91785 16.0823 7.03963 15.8262 5.92397L19.1024 2.64774C18.5375 2.39223 17.9103 2.25 17.25 2.25C14.7647 2.25 12.75 4.26472 12.75 6.75C12.75 6.87938 12.7555 7.00749 12.7662 7.13411C12.8571 8.20956 12.6948 9.39841 11.8617 10.0845L11.7596 10.1686M10.0146 11.6056L5.90901 7.5H4.5L2.25 3.75L3.75 2.25L7.5 4.5V5.90901L11.7596 10.1686M10.0146 11.6056L11.7596 10.1686M18.375 18.375L15.75 15.75M4.86723 19.125H4.87473V19.1325H4.86723V19.125Z" stroke="#EFF6FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Jobs
                            </span>
                        </a>
                    </li>
                    <?php if(session()->get('adminAuth')[0]['type'] == 'admin'){ ?>
                    <li class="nav-item dropdown parent-menu-item">
                        <a class="nav-link" href="{{ url('/clients') }}">
                            <span class="nav-span">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M15 19.1276C15.8329 19.37 16.7138 19.5 17.625 19.5C19.1037 19.5 20.5025 19.1576 21.7464 18.5478C21.7488 18.4905 21.75 18.4329 21.75 18.375C21.75 16.0968 19.9031 14.25 17.625 14.25C16.2069 14.25 14.956 14.9655 14.2136 16.0552M15 19.1276V19.125C15 18.0121 14.7148 16.9658 14.2136 16.0552M15 19.1276C15 19.1632 14.9997 19.1988 14.9991 19.2343C13.1374 20.3552 10.9565 21 8.625 21C6.29353 21 4.11264 20.3552 2.25092 19.2343C2.25031 19.198 2.25 19.1615 2.25 19.125C2.25 15.6042 5.10418 12.75 8.625 12.75C11.0329 12.75 13.129 14.085 14.2136 16.0552M12 6.375C12 8.23896 10.489 9.75 8.625 9.75C6.76104 9.75 5.25 8.23896 5.25 6.375C5.25 4.51104 6.76104 3 8.625 3C10.489 3 12 4.51104 12 6.375ZM20.25 8.625C20.25 10.0747 19.0747 11.25 17.625 11.25C16.1753 11.25 15 10.0747 15 8.625C15 7.17525 16.1753 6 17.625 6C19.0747 6 20.25 7.17525 20.25 8.625Z" stroke="#EFF6FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Clients
                            </span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <!-- End navigation menu -->
            </div>
            <!-- end navigation -->
        </div>
        <!-- Navbar -->
    </nav>
    <!-- end navbar-->
</div>
<!-- Top Bar End -->

<script>

    //   document.addEventListener('DOMContentLoaded', function () {
    //   var nav = document.querySelector('.navigation-menu');
    //   if (!nav) return;

    //    nav.addEventListener('click', function (e) {
    //     var link = e.target.closest('a.nav-link');
    //     if (!link || !nav.contains(link)) return;

    //     nav.querySelectorAll('a.nav-link.active').forEach(function (a) {
    //       a.classList.remove('active');
    //     });
    //     link.classList.add('active');
    //   });


    //   var current = location.pathname.split('/').pop() || 'index.php';
    //   var currentLink = nav.querySelector('a.nav-link[href="' + current + '"]');
    //   if (currentLink) {
    //     nav.querySelectorAll('a.nav-link.active').forEach(function (a) {
    //       a.classList.remove('active');
    //     });
    //     currentLink.classList.add('active');
    //   }
    // });

    document.addEventListener('DOMContentLoaded', function () {
        var nav = document.querySelector('.navigation-menu');
        if (!nav) return;


        nav.addEventListener('click', function (e) {
            var link = e.target.closest('a.nav-link');
            if (!link || !nav.contains(link)) return;

            nav.querySelectorAll('span.nav-span.active').forEach(function (s) {
                s.classList.remove('active');
            });
            var span = link.querySelector('span.nav-span');
            if (span) span.classList.add('active');
        });

        var current = location.pathname.split('/').pop() || 'index.php';
        var currentLink = nav.querySelector('a.nav-link[href="' + current + '"]');
        if (currentLink) {
            nav.querySelectorAll('span.nav-span.active').forEach(function (s) {
                s.classList.remove('active');
            });
            var currentSpan = currentLink.querySelector('span.nav-span');
            if (currentSpan) currentSpan.classList.add('active');
        }
    });

    (function () {
        var topbar = document.querySelector('.topbar');
        if (!topbar) return;
        var lastY = window.pageYOffset || document.documentElement.scrollTop;

        function onScroll() {
            var y = window.pageYOffset || document.documentElement.scrollTop;
            if (y > lastY && y > 10) {
                topbar.classList.add('topbar-scrolled');
            } else if (y < lastY || y <= 10) {
                topbar.classList.remove('topbar-scrolled');
            }
            lastY = y;
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    })();

</script>

@yield('content')

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-body" style="padding: 32px;">
                <h2 class="modal-title mb-2" id="logoutModalLabel" style="font-weight: 700; font-size: 24px; color: #000; margin-bottom: 8px;">Logout Confirmation</h2>
                <p class="mb-4" style="font-size: 14px; color: #000; margin-bottom: 16px;">You'll need to sign in again to access your workspaces</p>

                <div style="background-color: #F5F5F5; border-radius: 8px; padding: 16px; margin-bottom: 24px;">
                    <p style="color: #666; font-size: 14px; margin: 0; line-height: 1.5;">
                        Logging out will end your current session, but don't worry everything you've worked on is securely stored. You can come back and pick up your work anytime.
                    </p>
                </div>

                <div class="d-flex" style="gap: 12px;">
                    <button type="button" class="btn flex-fill" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px; font-weight: 500;">Cancel</button>
                    <a href="{{ url('/logout') }}" class="btn flex-fill" style="background-color: #DC3545; color: #fff; border: none; border-radius: 8px; padding: 12px; font-weight: 500; text-decoration: none; text-align: center; display: flex; align-items: center; justify-content: center;">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Client Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #E5E5E5; padding: 20px 32px;">
                <h2 class="modal-title" id="addClientModalLabel" style="font-weight: 700; font-size: 24px; color: #000;">Add New Client</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <form id="addClientForm" action="{{ url('/clients') }}" method="POST">
                    @csrf
                    <div class="card h-100" style="border: none; box-shadow: none;">
                        <div class="card-header" style="border-bottom: 1px solid #E5E5E5;">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#modal-home" role="tab" aria-selected="true">Clinic Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#modal-profile" role="tab" aria-selected="false">Compressors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#modal-settings" role="tab" aria-selected="false">Filters</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#modal-settings2" role="tab" aria-selected="false">Amalgam Separator</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#modal-settings3" role="tab" aria-selected="false">Sterilizer</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body h-100" style="padding: 24px 32px;">
                            <div class="tab-content">
                                <div class="tab-pane p-3 active" id="modal-home" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Office Name</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="office_name" class="form-control my-input" placeholder="Enter clinic name" required>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Doctor's Name</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="doctor_name" class="form-control my-input" placeholder="Enter doctor's name" required>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Address</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="address" class="form-control my-input" placeholder="Enter street address" required>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Zip Code</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="zip_code" class="form-control my-input" placeholder="Enter zip code" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Office Number</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="office_number" class="form-control my-input" placeholder="Enter phone number" required>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Last DOS</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="last_dos" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Suite</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="suite" class="form-control my-input" placeholder="Enter suite number">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">City</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="city" class="form-control my-input" placeholder="Enter city name">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">State</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="state" class="form-control my-input" placeholder="Enter state">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="modal-profile" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="comp-a">
                                                <span>Compressor A</span>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_a_model" class="form-control my-input" placeholder="Enter compressor model">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Serial Number</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_a_serial" class="form-control my-input" placeholder="Enter serial number">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">OEM Parts & Costs</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_a_oem" class="form-control my-input" placeholder="Enter OEM parts and costs">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_a_initial" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Last Maintenance Completed</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_a_last" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_a_next" id="add_compressor_a_next" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" name="compressor_a_days" id="add_compressor_a_days" class="form-control my-input" min="1" placeholder="Auto-calculated" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="comp-b">
                                                <span>Compressor B</span>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_b_model" class="form-control my-input" placeholder="Enter compressor model">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Serial Number</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_b_serial" class="form-control my-input" placeholder="Enter serial number">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">OEM Parts & Costs</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_b_oem" class="form-control my-input" placeholder="Enter OEM parts and costs">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_b_initial" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Last Maintenance Completed</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_b_last" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_b_next" id="add_compressor_b_next" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" name="compressor_b_days" id="add_compressor_b_days" class="form-control my-input" min="1" placeholder="Auto-calculated" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="modal-settings" role="tabpanel">
                                    <div class="par-b">
                                        <div class="filter-a">
                                            <span>Water Sediment Filter</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="water_filter_initial" class="form-control my-input">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="water_filter_next" class="form-control my-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="water_filter_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Maintenance Completed</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select name="water_filter_completed" class="form-control my-input">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Water Sediment Filter Maintenance</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select name="water_filter_maintenance" class="form-control my-input">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
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
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="silver_filter_initial" class="form-control my-input">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="silver_filter_next" class="form-control my-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="silver_filter_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Silver Filter Maintenance</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select name="silver_filter_maintenance" class="form-control my-input">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
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
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="cavitron_filter_initial" class="form-control my-input">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="cavitron_filter_next" class="form-control my-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="cavitron_filter_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Cavitron Filter Maintenance</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select name="cavitron_filter_maintenance" class="form-control my-input">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="modal-settings2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="amalgam_model" class="form-control my-input" placeholder="Enter amalgam separator model">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Amalgam Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="amalgam_initial" class="form-control my-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Amalgam Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="amalgam_next" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" name="amalgam_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Amalgam Separator Maintenance</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <select name="amalgam_maintenance" class="form-control my-input">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="modal-settings3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="sterilizer_model" class="form-control my-input" placeholder="Enter sterilizer model">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="sterilizer_initial" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" name="sterilizer_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="sterilizer_next" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" name="sterilizer_days2" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Sterilizer Maintenance</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <select name="sterilizer_maintenance" class="form-control my-input">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #E5E5E5; padding: 20px 32px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Cancel</button>
                <button type="submit" form="addClientForm" class="btn" style="background-color: #155DFC; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Save Client</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Job Modal -->
<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #E5E5E5; padding: 20px 32px;">
                <h2 class="modal-title" id="addJobModalLabel" style="font-weight: 700; font-size: 24px; color: #000;">Add New Job</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <form id="addJobForm" action="{{ url('/addJob') }}" method="POST">
                    @csrf
                    <div class="card h-100" style="border: none; box-shadow: none;">
                        <div class="card-header" style="border-bottom: 1px solid #E5E5E5;">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#job-details" role="tab" aria-selected="true">Job Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#job-clinic-details" role="tab" aria-selected="false">Clinic Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#job-compressors" role="tab" aria-selected="false">Compressors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#job-filters" role="tab" aria-selected="false">Filters</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#job-amalgam" role="tab" aria-selected="false">Amalgam Separator</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#job-sterilizer" role="tab" aria-selected="false">Sterilizer</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body h-100" style="padding: 24px 32px;">
                            <div class="tab-content">
                                <!-- Job Details Tab -->
                                <div class="tab-pane p-3 active" id="job-details" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Service Type</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="service_type" class="form-control my-input" placeholder="Enter service type" required>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Visit Date</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="visit_date" class="form-control my-input" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Assigned Worker</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <select name="assigned_worker" id="job_assigned_worker" class="form-control my-input" required>
                                                        <option value="">Select worker</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Job Status</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <select id="job_status" name="job_status" class="form-control my-input" required>
                                                        <option value="">Select status</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="in_progress">In Progress</option>
                                                        <option value="completed">Completed</option>
                                                        <option value="cancelled">Cancelled</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Clinic Details Tab -->
                                <div class="tab-pane p-3" id="job-clinic-details" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Office Name</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <select name="client_id" id="job_office_name" class="form-control my-input">
                                                        <option value="">Select client</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Doctor's Name</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_doctor_name" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Address</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_address" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Zip Code</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_zip_code" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Office Number</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_office_number" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Last DOS</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_last_dos" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Suite</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_suite" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">City</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_city" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">State</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_state" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Compressors Tab (Readonly) -->
                                <div class="tab-pane p-3" id="job-compressors" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="comp-a">
                                                <span>Compressor A</span>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_compressor_a_model" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Serial Number</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_compressor_a_serial" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">OEM Parts & Costs</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_compressor_a_oem" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_compressor_a_initial" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Last Maintenance Completed</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_compressor_a_last" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_compressor_a_next" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" id="job_compressor_a_days" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="comp-b">
                                                <span>Compressor B</span>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_compressor_b_model" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Serial Number</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_compressor_b_serial" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">OEM Parts & Costs</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_compressor_b_oem" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_compressor_b_initial" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Last Maintenance Completed</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_compressor_b_last" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_compressor_b_next" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" id="job_compressor_b_days" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Filters Tab (Readonly) -->
                                <div class="tab-pane p-3" id="job-filters" role="tabpanel">
                                    <div class="par-b">
                                        <div class="filter-a">
                                            <span>Water Sediment Filter</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" id="job_water_filter_initial" id="job_water_filter_initial" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" id="job_water_filter_next" id="job_water_filter_next" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" id="job_water_filter_days" id="job_water_filter_days" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Maintenance Completed</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="job_water_filter_completed" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Water Sediment Filter Maintenance</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="job_water_filter_maintenance" class="form-control my-input" readonly>
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
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" id="job_silver_filter_initial" id="job_silver_filter_initial" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" id="job_silver_filter_next" id="job_silver_filter_next" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" id="job_silver_filter_days" id="job_silver_filter_days" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Silver Filter Maintenance</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="job_silver_filter_maintenance" class="form-control my-input" readonly>
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
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" id="job_cavitron_filter_initial" id="job_cavitron_filter_initial" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" id="job_cavitron_filter_next" id="job_cavitron_filter_next" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" id="job_cavitron_filter_days" id="job_cavitron_filter_days" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Cavitron Filter Maintenance</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="job_cavitron_filter_maintenance" class="form-control my-input" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Amalgam Separator Tab (Readonly) -->
                                <div class="tab-pane p-3" id="job-amalgam" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_amalgam_model" id="job_amalgam_model" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Amalgam Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_amalgam_initial" id="job_amalgam_initial" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Amalgam Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_amalgam_next" id="job_amalgam_next" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" id="job_amalgam_days" id="job_amalgam_days" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Amalgam Separator Maintenance</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_amalgam_maintenance" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sterilizer Tab (Readonly) -->
                                <div class="tab-pane p-3" id="job-sterilizer" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_sterilizer_model" id="job_sterilizer_model" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_sterilizer_initial" id="job_sterilizer_initial" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" id="job_sterilizer_days" id="job_sterilizer_days" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" id="job_sterilizer_next" id="job_sterilizer_next" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" id="job_sterilizer_days2" id="job_sterilizer_days2" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Sterilizer Maintenance</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="job_sterilizer_maintenance" class="form-control my-input" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #E5E5E5; padding: 20px 32px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Cancel</button>
                <button type="submit" form="addJobForm" class="btn" style="background-color: #155DFC; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Save Job</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Helper function to generate sample data


    document.addEventListener("DOMContentLoaded", function() {
        // Wait for the DOM
        const tableElement1 = document.querySelector("#datatable_1");
        const tableElement2 = document.querySelector("#datatable_2");

        let table1 = null;
        let table2 = null;

        // Initialize each table only if it exists
        if (tableElement1) {
            table1 = new simpleDatatables.DataTable(tableElement1, {
                searchable: true,
                perPageSelect: [5, 10, 20],
            });
        }

        if (tableElement2) {
            table2 = new simpleDatatables.DataTable(tableElement2, {
                searchable: true,
                perPageSelect: [5, 10, 20],
            });
        }

        // Global search input
        const searchInput = document.querySelector("#data-search");

        if (searchInput) {
            searchInput.addEventListener("keyup", function() {
                const query = this.value;

                if (table1) table1.search(query);
                if (table2) table2.search(query);
            });
        }
    });
    
    
    // file uploader
    document.addEventListener('DOMContentLoaded', () => {
        const fileInput = document.getElementById('fileInput');
        const uploadBtn = document.getElementById('uploadBtn');
        const removeBtn = document.getElementById('removeBtn');
        const preview = document.getElementById('preview');
        //const defaultAvatar = "{{ asset('public/uploads') . '/defaultProfilePic.jpg' }}";
        let defaultAvatar = "";
        if(preview){
            defaultAvatar = preview.src;
        }
        if(uploadBtn || fileInput){
            uploadBtn.addEventListener('click', () => fileInput.click());
            fileInput.addEventListener('change', e => {
                const file = e.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = event => {
                        preview.src = event.target.result;
                        uploadBtn.style.display = 'none';
                        removeBtn.style.display = 'inline-block';
                    };
                    reader.readAsDataURL(file);
                }
            });
            removeBtn.addEventListener('click', () => {
                fileInput.value = '';
                preview.src = defaultAvatar;
                uploadBtn.style.display = 'inline-block';
                removeBtn.style.display = 'none';
            });
        }


    });
</script>


<script src="{{ asset('public/') }}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('public/') }}/assets/libs/feather-icons/feather.min.js"></script>
<script src="{{ asset('public/') }}/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('public/') }}/assets/js/pages/hospital-index.init.js"></script>
<script src="{{ asset('public/') }}/assets/libs/simple-datatables/umd/simple-datatables.js"></script>
<script src="{{ asset('public/') }}/assets/libs/fullcalendar/main.min.js"></script>
<!-- <script src="assets/js/pages/calendar.init.js"></script> -->
<!-- <script src="assets/js/pages/file-upload.init.js"></script> -->
<!-- App js -->
<script src="{{ asset('public/') }}/assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('message') && session('type'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('type') == 'success')
        Swal.fire({
            icon: "success",
            title: "Success!",
            text: "{{ session('message') }}",
            confirmButtonColor: "#155DFC"
        });
        @elseif(session('type') == 'error')
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ session('message') }}",
            confirmButtonColor: "#155DFC"
        });
        @endif
    });
</script>
@endif

@include('modals.edit_client')

<script>
    // Edit Client Modal Handler
    $(document).ready(function() {
        // Handle edit button clicks
        $(document).on('click', '.edit-client-btn', function(e) {
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

            // Show loading state
            const modal = new bootstrap.Modal(document.getElementById('editClientModal'));
            modal.show();

            // Reset form
            $('#editClientForm')[0].reset();

            // Reset tabs to first tab
            $('#editClientModal .nav-link').removeClass('active');
            $('#editClientModal .tab-pane').removeClass('active show');
            $('#editClientModal .nav-link:first').addClass('active');
            $('#editClientModal .tab-pane:first').addClass('active show');

            // Fetch client data via AJAX
            $.ajax({
                url: '{{ url('/') }}/clients/' + clientId + '/data',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success && response.client) {
                        const client = response.client;

                        // Set form action
                        $('#editClientForm').attr('action', '{{ url('/') }}/clients/' + clientId);
                        $('#edit_client_id').val(clientId);

                        // Populate Clinic Details
                        $('#edit_office_name').val(client.office_name || '');
                        $('#edit_doctor_name').val(client.doctor_name || '');
                        $('#edit_address').val(client.address || '');
                        $('#edit_zip_code').val(client.zip_code || '');
                        $('#edit_office_number').val(client.office_number || '');
                        $('#edit_last_dos').val(client.last_dos || '');
                        $('#edit_suite').val(client.suite || '');
                        $('#edit_city').val(client.city || '');
                        $('#edit_state').val(client.state || '');

                        // Populate Compressor A
                        $('#edit_compressor_a_model').val(client.compressor_a_model || '');
                        $('#edit_compressor_a_serial').val(client.compressor_a_serial || '');
                        $('#edit_compressor_a_oem').val(client.compressor_a_oem || '');
                        $('#edit_compressor_a_initial').val(client.compressor_a_initial || '');
                        $('#edit_compressor_a_last').val(client.compressor_a_last || '');
                        $('#edit_compressor_a_next').val(client.compressor_a_next || '');
                        // Calculate days remaining automatically
                        if (client.compressor_a_next) {
                            const today = new Date();
                            today.setHours(0, 0, 0, 0);
                            const nextDate = new Date(client.compressor_a_next);
                            nextDate.setHours(0, 0, 0, 0);
                            const diffTime = nextDate - today;
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                            $('#edit_compressor_a_days').val(diffDays >= 0 ? diffDays : 0);
                        } else {
                            $('#edit_compressor_a_days').val('');
                        }

                        // Populate Compressor B
                        $('#edit_compressor_b_model').val(client.compressor_b_model || '');
                        $('#edit_compressor_b_serial').val(client.compressor_b_serial || '');
                        $('#edit_compressor_b_oem').val(client.compressor_b_oem || '');
                        $('#edit_compressor_b_initial').val(client.compressor_b_initial || '');
                        $('#edit_compressor_b_last').val(client.compressor_b_last || '');
                        $('#edit_compressor_b_next').val(client.compressor_b_next || '');
                        // Calculate days remaining automatically
                        if (client.compressor_b_next) {
                            const today = new Date();
                            today.setHours(0, 0, 0, 0);
                            const nextDate = new Date(client.compressor_b_next);
                            nextDate.setHours(0, 0, 0, 0);
                            const diffTime = nextDate - today;
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                            $('#edit_compressor_b_days').val(diffDays >= 0 ? diffDays : 0);
                        } else {
                            $('#edit_compressor_b_days').val('');
                        }

                        // Populate Filters
                        $('#edit_water_filter_initial').val(client.water_filter_initial || '');
                        $('#edit_water_filter_next').val(client.water_filter_next || '');
                        $('#edit_water_filter_days').val(client.water_filter_days || '');
                        const waterFilterCompleted = (client.water_filter_completed || '').toString().toLowerCase();
                        $('#edit_water_filter_completed').val(waterFilterCompleted === 'yes' || waterFilterCompleted === 'no' ? waterFilterCompleted : '');
                        const waterFilterMaintenance = (client.water_filter_maintenance || '').toString().toLowerCase();
                        $('#edit_water_filter_maintenance').val(waterFilterMaintenance === 'yes' || waterFilterMaintenance === 'no' ? waterFilterMaintenance : '');
                        $('#edit_silver_filter_initial').val(client.silver_filter_initial || '');
                        $('#edit_silver_filter_next').val(client.silver_filter_next || '');
                        $('#edit_silver_filter_days').val(client.silver_filter_days || '');
                        const silverFilterMaintenance = (client.silver_filter_maintenance || '').toString().toLowerCase();
                        $('#edit_silver_filter_maintenance').val(silverFilterMaintenance === 'yes' || silverFilterMaintenance === 'no' ? silverFilterMaintenance : '');
                        $('#edit_cavitron_filter_initial').val(client.cavitron_filter_initial || '');
                        $('#edit_cavitron_filter_next').val(client.cavitron_filter_next || '');
                        $('#edit_cavitron_filter_days').val(client.cavitron_filter_days || '');
                        const cavitronFilterMaintenance = (client.cavitron_filter_maintenance || '').toString().toLowerCase();
                        $('#edit_cavitron_filter_maintenance').val(cavitronFilterMaintenance === 'yes' || cavitronFilterMaintenance === 'no' ? cavitronFilterMaintenance : '');

                        // Populate Amalgam Separator
                        $('#edit_amalgam_model').val(client.amalgam_model || '');
                        $('#edit_amalgam_initial').val(client.amalgam_initial || '');
                        $('#edit_amalgam_next').val(client.amalgam_next || '');
                        $('#edit_amalgam_days').val(client.amalgam_days || '');
                        const amalgamMaintenance = (client.amalgam_maintenance || '').toString().toLowerCase();
                        $('#edit_amalgam_maintenance').val(amalgamMaintenance === 'yes' || amalgamMaintenance === 'no' ? amalgamMaintenance : '');

                        // Populate Sterilizer
                        $('#edit_sterilizer_model').val(client.sterilizer_model || '');
                        $('#edit_sterilizer_initial').val(client.sterilizer_initial || '');
                        $('#edit_sterilizer_next').val(client.sterilizer_next || '');
                        $('#edit_sterilizer_days').val(client.sterilizer_days || '');
                        $('#edit_sterilizer_days2').val(client.sterilizer_days2 || '');
                        const sterilizerMaintenance = (client.sterilizer_maintenance || '').toString().toLowerCase();
                        $('#edit_sterilizer_maintenance').val(sterilizerMaintenance === 'yes' || sterilizerMaintenance === 'no' ? sterilizerMaintenance : '');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to load client data',
                            confirmButtonColor: '#155DFC'
                        });
                        modal.hide();
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to load client data: ' + (xhr.responseJSON?.message || error),
                        confirmButtonColor: '#155DFC'
                    });
                    modal.hide();
                }
            });
        });

        // Handle edit form submission
        $('#editClientForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = form.serialize();
            const actionUrl = form.attr('action');

            $.ajax({
                url: actionUrl,
                method: 'POST',
                data: formData,
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    // Close modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('editClientModal'));
                    if (modal) {
                        modal.hide();
                    }

                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'Client updated successfully!',
                        confirmButtonColor: '#155DFC'
                    }).then(() => {
                        // Reload page to show updated data
                        location.reload();
                    });
                },
                error: function(xhr) {
                    let errorMessage = 'Failed to update client';

                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            // Handle validation errors
                            const errors = xhr.responseJSON.errors;
                            const errorMessages = [];
                            for (let field in errors) {
                                errorMessages.push(errors[field][0]);
                            }
                            errorMessage = errorMessages.join('<br>');
                        }
                    } else if (xhr.responseText) {
                        // Try to extract error from HTML response
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(xhr.responseText, 'text/html');
                        const errorElement = doc.querySelector('.error-message');
                        if (errorElement) {
                            errorMessage = errorElement.textContent;
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
        $('#editClientModal').on('hidden.bs.modal', function () {
            $('#editClientForm')[0].reset();
            // Reset tabs to first tab
            $('#editClientModal .nav-link').removeClass('active');
            $('#editClientModal .tab-pane').removeClass('active show');
            $('#editClientModal .nav-link:first').addClass('active');
            $('#editClientModal .tab-pane:first').addClass('active show');
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

        // Auto-calculate days remaining when next maintenance day changes (Edit Modal)
        $('#edit_compressor_a_next').on('change', function() {
            const nextDate = $(this).val();
            if (nextDate) {
                const days = calculateDaysRemaining(nextDate);
                $('#edit_compressor_a_days').val(days !== '' ? days : '');
            } else {
                $('#edit_compressor_a_days').val('');
            }
        });

        $('#edit_compressor_b_next').on('change', function() {
            const nextDate = $(this).val();
            if (nextDate) {
                const days = calculateDaysRemaining(nextDate);
                $('#edit_compressor_b_days').val(days !== '' ? days : '');
            } else {
                $('#edit_compressor_b_days').val('');
            }
        });

        // Auto-calculate days remaining when next maintenance day changes (Add Client Modal)
        $('#add_compressor_a_next').on('change', function() {
            const nextDate = $(this).val();
            if (nextDate) {
                const days = calculateDaysRemaining(nextDate);
                $('#add_compressor_a_days').val(days !== '' ? days : '');
            } else {
                $('#add_compressor_a_days').val('');
            }
        });

        $('#add_compressor_b_next').on('change', function() {
            const nextDate = $(this).val();
            if (nextDate) {
                const days = calculateDaysRemaining(nextDate);
                $('#add_compressor_b_days').val(days !== '' ? days : '');
            } else {
                $('#add_compressor_b_days').val('');
            }
        });

        // Also calculate when edit modal is opened and data is loaded
        $('#editClientModal').on('shown.bs.modal', function() {
            // Calculate days remaining for Compressor A if date is already set
            const compressorANext = $('#edit_compressor_a_next').val();
            if (compressorANext) {
                const days = calculateDaysRemaining(compressorANext);
                $('#edit_compressor_a_days').val(days !== '' ? days : '');
            }

            // Calculate days remaining for Compressor B if date is already set
            const compressorBNext = $('#edit_compressor_b_next').val();
            if (compressorBNext) {
                const days = calculateDaysRemaining(compressorBNext);
                $('#edit_compressor_b_days').val(days !== '' ? days : '');
            }
        });
    });

    // Add Job Modal Scripts
    $(document).ready(function() {

        $('#addJobModal').on('show.bs.modal', function () {
            // Load clients list
            $.ajax({
                url: '{{ url('/api/clients-list') }}',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log('Clients response:', response);
                    if (response.success && response.clients) {
                        const select = $('select[name="client_id"]');
                        select.empty().append('<option value="">Select client</option>');
                        response.clients.forEach(function(client) {
                            select.append('<option value="' + client.id + '">' + client.office_name + '</option>');
                        });
                    } else {
                        console.error('Unexpected response format:', response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Failed to load clients list:', error, xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to load clients list. Please refresh the page.',
                        confirmButtonColor: '#155DFC'
                    });
                }
            });
            // Load credentials (workers) list
            $.ajax({
                url: '{{ url('/api/credentials-list') }}',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log('Credentials response:', response);
                    if (response.success && response.credentials) {
                        const select = $('#job_assigned_worker');
                        select.empty().append('<option value="">Select worker</option>');
                        response.credentials.forEach(function(credential) {
                            select.append('<option value="' + credential.id + '">' + credential.name + '</option>');
                        });
                    } else {
                        console.error('Unexpected credentials response format:', response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Failed to load credentials list:', error, xhr.responseText);
                }
            });
        });

        // Autofill client data when client is selected
        $('select[name="client_id"]').on('change', function() {
            const clientId = $(this).val();
            if (clientId) {
                // Fetch client data via AJAX
                $.ajax({
                    url: '{{ url('/') }}/clients/' + clientId + '/data',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success && response.client) {
                            const client = response.client;

                            // Populate Clinic Details
                            $('#job_doctor_name').val(client.doctor_name || '');
                            $('#job_address').val(client.address || '');
                            $('#job_zip_code').val(client.zip_code || '');
                            $('#job_office_number').val(client.office_number || '');
                            $('#job_last_dos').val(client.last_dos || '');
                            $('#job_suite').val(client.suite || '');
                            $('#job_city').val(client.city || '');
                            $('#job_state').val(client.state || '');

                            // Populate Compressor A
                            $('#job_compressor_a_model').val(client.compressor_a_model || '');
                            $('#job_compressor_a_serial').val(client.compressor_a_serial || '');
                            $('#job_compressor_a_oem').val(client.compressor_a_oem || '');
                            $('#job_compressor_a_initial').val(client.compressor_a_initial || '');
                            $('#job_compressor_a_last').val(client.compressor_a_last || '');
                            $('#job_compressor_a_next').val(client.compressor_a_next || '');
                            $('#job_compressor_a_days').val(client.compressor_a_days || '');

                            // Populate Compressor B
                            $('#job_compressor_b_model').val(client.compressor_b_model || '');
                            $('#job_compressor_b_serial').val(client.compressor_b_serial || '');
                            $('#job_compressor_b_oem').val(client.compressor_b_oem || '');
                            $('#job_compressor_b_initial').val(client.compressor_b_initial || '');
                            $('#job_compressor_b_last').val(client.compressor_b_last || '');
                            $('#job_compressor_b_next').val(client.compressor_b_next || '');
                            $('#job_compressor_b_days').val(client.compressor_b_days || '');

                            // Populate Filters
                            $('#job_water_filter_initial').val(client.water_filter_initial || '');
                            $('#job_water_filter_next').val(client.water_filter_next || '');
                            $('#job_water_filter_days').val(client.water_filter_days || '');
                            const waterFilterCompleted = client.water_filter_completed || '';
                            $('#job_water_filter_completed').val(waterFilterCompleted ? waterFilterCompleted.charAt(0).toUpperCase() + waterFilterCompleted.slice(1) : '');
                            const waterFilterMaintenance = client.water_filter_maintenance || '';
                            $('#job_water_filter_maintenance').val(waterFilterMaintenance ? waterFilterMaintenance.charAt(0).toUpperCase() + waterFilterMaintenance.slice(1) : '');
                            $('#job_silver_filter_initial').val(client.silver_filter_initial || '');
                            $('#job_silver_filter_next').val(client.silver_filter_next || '');
                            $('#job_silver_filter_days').val(client.silver_filter_days || '');
                            const silverFilterMaintenance = client.silver_filter_maintenance || '';
                            $('#job_silver_filter_maintenance').val(silverFilterMaintenance ? silverFilterMaintenance.charAt(0).toUpperCase() + silverFilterMaintenance.slice(1) : '');
                            $('#job_cavitron_filter_initial').val(client.cavitron_filter_initial || '');
                            $('#job_cavitron_filter_next').val(client.cavitron_filter_next || '');
                            $('#job_cavitron_filter_days').val(client.cavitron_filter_days || '');
                            const cavitronFilterMaintenance = client.cavitron_filter_maintenance || '';
                            $('#job_cavitron_filter_maintenance').val(cavitronFilterMaintenance ? cavitronFilterMaintenance.charAt(0).toUpperCase() + cavitronFilterMaintenance.slice(1) : '');

                            // Populate Amalgam Separator
                            $('#job_amalgam_model').val(client.amalgam_model || '');
                            $('#job_amalgam_initial').val(client.amalgam_initial || '');
                            $('#job_amalgam_next').val(client.amalgam_next || '');
                            $('#job_amalgam_days').val(client.amalgam_days || '');
                            const amalgamMaintenance = client.amalgam_maintenance || '';
                            $('#job_amalgam_maintenance').val(amalgamMaintenance ? amalgamMaintenance.charAt(0).toUpperCase() + amalgamMaintenance.slice(1) : '');

                            // Populate Sterilizer
                            $('#job_sterilizer_model').val(client.sterilizer_model || '');
                            $('#job_sterilizer_initial').val(client.sterilizer_initial || '');
                            $('#job_sterilizer_next').val(client.sterilizer_next || '');
                            $('#job_sterilizer_days').val(client.sterilizer_days || '');
                            $('#job_sterilizer_days2').val(client.sterilizer_days2 || '');
                            const sterilizerMaintenance = client.sterilizer_maintenance || '';
                            $('#job_sterilizer_maintenance').val(sterilizerMaintenance ? sterilizerMaintenance.charAt(0).toUpperCase() + sterilizerMaintenance.slice(1) : '');
                        }
                    },

                error: function(err) {
                    console.error('Failed to load client data', err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to load client data',
                        confirmButtonColor: '#155DFC'
                    });
                }
            });
            } else {
                // Clear all fields if no client selected
                $('#addJobForm input[readonly]').val('');
            }
        });

        // Handle form submission with custom validation
        $('#addJobForm').on('submit', function(e) {
            // Remove previous error styling
            $('#addJobForm input, #addJobForm select').removeClass('is-invalid');
            $('#addJobForm .invalid-feedback').remove();

            let isValid = true;
            let firstInvalidField = null;
            let firstInvalidTab = null;

            // Validate Job Details tab fields
            const serviceType = $('input[name="service_type"]').val().trim();
            const visitDate = $('input[name="visit_date"]').val();
            const assignedWorker = $('select[name="assigned_worker"]').val();
            const jobStatus = $('select[name="job_status"]').val();

            if (!serviceType) {
                showFieldError('input[name="service_type"]', 'Service Type is required');
                isValid = false;
                if (!firstInvalidField) {
                    firstInvalidField = 'input[name="service_type"]';
                    firstInvalidTab = '#job-details';
                }
            }

            if (!visitDate) {
                showFieldError('input[name="visit_date"]', 'Visit Date is required');
                isValid = false;
                if (!firstInvalidField) {
                    firstInvalidField = 'input[name="visit_date"]';
                    firstInvalidTab = '#job-details';
                }
            }

            if (!assignedWorker) {
                showFieldError('select[name="assigned_worker"]', 'Assigned Worker is required');
                isValid = false;
                if (!firstInvalidField) {
                    firstInvalidField = 'select[name="assigned_worker"]';
                    firstInvalidTab = '#job-details';
                }
            }

            if (!jobStatus) {
                showFieldError('select[name="job_status"]', 'Job Status is required');
                isValid = false;
                if (!firstInvalidField) {
                    firstInvalidField = 'select[name="job_status"]';
                    firstInvalidTab = '#job-details';
                }
            }

            // Validate Clinic Details tab - Client ID (even if tab is not visible)
            const clientId = $('select[name="client_id"]').val();
            if (!clientId) {
                showFieldError('select[name="client_id"]', 'Office Name (Client) is required');
                isValid = false;
                if (!firstInvalidField) {
                    firstInvalidField = 'select[name="client_id"]';
                    firstInvalidTab = '#job-clinic-details';
                }
            }

            // If validation failed, prevent submission and show errors
            if (!isValid) {
                e.preventDefault();
                e.stopPropagation();

                if (firstInvalidTab) {
                    // Switch to the tab with the error
                    const tabLink = $('#addJobModal').find('a[href="' + firstInvalidTab + '"]');
                    if (tabLink.length) {
                        tabLink.tab('show');
                    }

                    // Scroll to the first invalid field after a brief delay
                    setTimeout(function() {
                        const invalidField = $(firstInvalidField);
                        if (invalidField.length) {
                            invalidField.focus();
                            const offset = invalidField.offset();
                            if (offset) {
                                $('html, body').animate({
                                    scrollTop: offset.top - 100
                                }, 300);
                            }
                        }
                    }, 500);
                }

                Swal.fire({
                    icon: 'warning',
                    title: 'Validation Error',
                    text: 'Please fill in all required fields. Check the highlighted fields below.',
                    confirmButtonColor: '#155DFC'
                });

                return false;
            }

            // If validation passed, allow normal form submission
        });

        // Helper function to show field error
        function showFieldError(selector, message) {
            const field = $(selector);
            if (field.length === 0) {
                console.error('Field not found:', selector);
                return;
            }
            
            field.addClass('is-invalid');
            field.css({
                'border-color': '#dc3545',
                'border-width': '2px'
            });

            // Remove existing error message
            const parentCol = field.closest('.col-lg-6');
            parentCol.find('.invalid-feedback').remove();

            // Add error message
            parentCol.append(
                '<div class="invalid-feedback" style="display: block !important; color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem; font-weight: 500;">' +
                message +
                '</div>'
            );
            
            // Ensure the error is visible by scrolling if needed
            const modalBody = field.closest('.modal-body');
            if (modalBody.length) {
                const fieldOffset = field.offset();
                const modalBodyOffset = modalBody.offset();
                if (fieldOffset && modalBodyOffset) {
                    const scrollTop = modalBody.scrollTop();
                    const fieldTop = fieldOffset.top - modalBodyOffset.top + scrollTop;
                    modalBody.animate({
                        scrollTop: fieldTop - 50
                    }, 300);
                }
            }
        }

        // Remove error styling when fields are changed
        $('#addJobForm input, #addJobForm select').on('input change', function() {
            $(this).removeClass('is-invalid');
            $(this).css('border-color', '');
            $(this).closest('.col-lg-6').find('.invalid-feedback').remove();
        });

        // Reset form when modal is closed
        $('#addJobModal').on('hidden.bs.modal', function () {
            $('#addJobForm')[0].reset();
            // Remove error styling
            $('#addJobForm input, #addJobForm select').removeClass('is-invalid');
            $('#addJobForm .invalid-feedback').remove();
            // Reset tabs to first tab
            $('#addJobModal .nav-link').removeClass('active');
            $('#addJobModal .tab-pane').removeClass('active show');
            $('#addJobModal .nav-link:first').addClass('active');
            $('#addJobModal .tab-pane:first').addClass('active show');
        });
    });
</script>

</body>

</html>
