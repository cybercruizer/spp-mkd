<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        <?php echo e(@$title != '' ? "$title |" : ''); ?> <?php echo e(settings()->get('app_name', 'My APP')); ?>

    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicons -->
    <link href="<?php echo e(\Storage::url(settings('app_logo'))); ?>" rel="icon">
    

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('niceadmin')); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('niceadmin')); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset('niceadmin')); ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo e(asset('niceadmin')); ?>/assets/css/bs-stepper.css" rel="stylesheet">

    
    <link rel="stylesheet" href="<?php echo e(asset('font/css/all.min.css')); ?>">
    <style>
        .layout-navbar .navbar-dropdown .dropdown-menu {
            min-width: 22rem;
            overflow: hidden;
        }

        /* CSS */
        .loading-overlay {
            position: fixed;
            /* Atur posisi fixed agar loading overlay tidak bergerak saat halaman di-scroll */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.5);
            /* Atur transparansi dengan rgba */
            z-index: 9999;
            /* Atur z-index agar loading overlay muncul di atas konten lain */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-group label {
            font-size: 14px;
            line-height: 22px;
        }

        /* TABEL */

        table tr:first-child th:first-child {
            border-top-left-radius: 0.5rem !important;
        }

        table tr:first-child th:last-child {
            border-top-right-radius: 0.5rem !important;
        }

        table tr:last-child td:first-child {
            border-bottom-left-radius: 0.5rem !important;
        }

        table tr:last-child td:last-child {
            border-bottom-right-radius: 0.5rem !important;
        }

        table tbody td {
            font-size: 14px;
        }

        table thead th {
            font-size: 15px;
        }

        .table-dark {
            --bs-table-bg: #4b5563;
            /* background-color: #4a5073 !important; */
        }

        /* atur padding */
        .table>:not(caption)>*>* {
            padding: 0.8rem 1rem !important;
        }

        /* border setiap tr dihapus */
        .table>:not(caption)>*>* {
            border-bottom-width: 0px;
        }

        /* BTN */

        .btn-sm {
            padding: 0.20rem 0.3rem !important;
            font-size: .8rem !important;
        }

        .card-hover:hover {
            -webkit-transform: translateY(-4px) scale(1.01);
            -moz-transform: translateY(-4px) scale(1.01);
            -ms-transform: translateY(-4px) scale(1.01);
            -o-transform: translateY(-4px) scale(1.01);
            transform: translateY(-4px) scale(1.01);
            -webkit-box-shadow: 0 14px 24px rgb(62 57 107 / 10%);
            box-shadow: 0 14px 24px rgb(62 57 107 / 10%);
        }

        .card-hover {
            -webkit-transition: all .25s ease;
            -o-transition: all .25s ease;
            -moz-transition: a ll .25s ease;
            transition: all .25s ease;
        }
    </style>
    <?php echo $__env->yieldContent('css'); ?>
    <script>
        const popupCenter = ({
            url,
            title,
            w,
            h
        }) => {
            // Fixes dual-screen position                             Most browsers      Firefox
            const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
            const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;

            const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document
                .documentElement.clientWidth : screen.width;
            const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document
                .documentElement.clientHeight : screen.height;

            const systemZoom = width / window.screen.availWidth;
            const left = (width - w) / 2 / systemZoom + dualScreenLeft
            const top = (height - h) / 2 / systemZoom + dualScreenTop
            const newWindow = window.open(url, title,
                `
          scrollbars=yes,
          width=${w / systemZoom},
          height=${h / systemZoom},
          top=${top},
          left=${left}
          `
            )

            if (window.focus) newWindow.focus();
        }
    </script>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?php echo e(route(auth()->user()->akses . '.beranda')); ?>" class="logo d-flex align-items-center">
                <img src="<?php echo e(\Storage::url(settings()->get('app_logo'))); ?>" alt="">
                <span class="d-none d-lg-block">SPP-MKD</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <?php if(auth()->user()->akses == 'operator' || auth()->user()->akses == 'kepala_sekolah'): ?>
            <div class="search-bar">
                <?php echo Form::open([
                    'route' => Request::segment(2)=='beranda' ? auth()->user()->akses . '.'.Request::segment(2) : auth()->user()->akses . '.'.Request::segment(2).'.index' ,
                    'method' => 'GET',
                    'class' => 'search-form d-flex align-items-center',
                ]); ?>

                <input type="text" name="q" placeholder="Search" title="Enter search keyword"
                    value="<?php echo e(request('q')); ?>">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                <?php echo Form::close(); ?>

            </div><!-- End Search Bar -->
        <?php else: ?>
            <div class="search-bar">
                <?php echo Form::open([
                    'route' => 'wali.tagihan.index',
                    'method' => 'GET',
                    'class' => 'search-form d-flex align-items-center',
                ]); ?>

                <input type="text" name="q" placeholder="Search" title="Enter search keyword"
                    value="<?php echo e(request('q')); ?>">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                <?php echo Form::close(); ?>

            </div><!-- End Search Bar -->
        <?php endif; ?>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-danger badge-number">
                            <?php echo e(Auth::user()->unreadNotifications->count()); ?>

                        </span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have <?php echo e(Auth::user()->unreadNotifications->count()); ?> new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2"></span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php $__empty_1 = true; $__currentLoopData = auth()->user()->unreadNotifications->sortBy('created_at')->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number => $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li class="message-item">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <a href="<?php echo e(url($notification->data['url'] . '?id=' . $notification->id)); ?>">
                                            <div>
                                                <h4><?php echo e($notification->data['title']); ?></h4>
                                                <p><?php echo e(ucwords($notification->data['messages'])); ?></p>
                                                <p><?php echo e($notification->created_at->diffForHumans()); ?></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <?php echo Form::open([
                                            'route' => ['wali.notifikasi.update', $notification->id],
                                            'method' => 'PUT',
                                        ]); ?>

                                        <button type="submit" class="btn dropdown-notifications-archive">
                                            <i class="bi bi-x-lg text-danger"></i>
                                        </button>
                                        <?php echo Form::close(); ?>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="message-item">
                                <div class="text-center text-sm">Tidak ada notifikasi</div>
                            </li>
                        <?php endif; ?>

                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="<?php echo e(asset('images/nouser.png')); ?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo e(auth()->user()->name); ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo e(auth()->user()->name); ?></h6>
                            <span><?php echo e(auth()->user()->email); ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <?php if(auth()->user()->akses == 'operator' || auth()->user()->akses == 'kepala_sekolah'): ?>
                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?php echo e(route(auth()->user()->akses . '.user.edit', auth()->user()->id)); ?>">
                                    <i class="bi bi-person"></i>
                                    <span>Ubah Profil</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php if(auth()->user()->akses == 'kepala_sekolah'): ?>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="<?php echo e(route('kepala_sekolah.setting.create')); ?>">
                                        <i class="bi bi-gear"></i>
                                        <span>Pengaturan</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?php echo e(route('wali.profil.create', auth()->user()->id)); ?>">
                                    <i class="bi bi-person"></i>
                                    <span>Ubah Profil</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('logout')); ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Log Out</span>
                            </a>
                        </li>

                    </ul>
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <?php if(auth()->user()->akses == 'operator'): ?>
            <?php echo $__env->make('components.sidebar_operator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif(auth()->user()->akses == 'kepala_sekolah'): ?>
            <?php echo $__env->make('components.sidebar_kepala_sekolah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('components.sidebar_wali', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo implode('', $errors->all('<div>:message</div>')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; <a href="smkmuhmungkid.sch.id">TKJ SMK Muh Mungkid</a>
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> & <a href="#">NiceAdmin</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('niceadmin')); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('niceadmin')); ?>/assets/vendor/tinymce/tinymce.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo e(asset('niceadmin')); ?>/assets/js/main.js"></script>
    <script src="<?php echo e(asset('niceadmin')); ?>/assets/js/bs-stepper.js"></script>


    
    <script src="<?php echo e(asset('niceadmin')); ?>/assets/js/jquery-3.6.3.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/select2.min.css')); ?>">
    <script src="<?php echo e(asset('js/jquery.mask.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('.rupiah').mask("#.##0", {
                reverse: true
            });
            $('.select2').select2();
        });
    </script>
    <?php echo $__env->yieldContent('js'); ?>;

</body>

</html>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/layouts/app_niceadmin.blade.php ENDPATH**/ ?>