<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Amal Edukasi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/user/'); ?>img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="<?= base_url(); ?>">
                                    <img src="<?= base_url('assets/user/'); ?>img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="<?= base_url(); ?>">home</a></li>
                                        <li><a href="#">Try Out <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="#">Paket CPNS</a></li>
                                                <li><a href="#">Paket Regular STAN</a></li>
                                                <li><a href="#">Paket D3K STAN</a></li>
                                                <li><a href="#">Paket D4K STAN</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?= base_url('pembelajaran'); ?>">Modul</a></li>
                                        <li><a href="<?= base_url('contact'); ?>">Contact</a></li>
                                        <?php if(!empty($user)){ ?>
                                            <li class="nav-item dropdown">
                                                <a href="#" class="nav-link" data-toggle="dropdown">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="rounded-circle" alt="User Image" style="width: 37px; height: 37px; margin-right: 6px;">
                                                    </div>
                                                    <div class="info">
                                                    <span><?= $user['name']; ?></span>
                                                    </div>
                                                </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                <div class="dropdown-item dropdown-header">
                                                    <div class="image" style="text-align: center;">
                                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="rounded-circle elevation-2" alt="User Image" style="width: 100px; height: 100px;">
                                                    </div>
                                                    <br>
                                                    <p style="text-align: center;">
                                                    <span>Selamat Datang</span>
                                                    <br>
                                                    <span style="font-size: 20px;"><strong><?= $user['name']; ?></strong></span>
                                                    </p>
                                                </div>
                                                <div class="dropdown-divider"></div>
                                                <div class="dropdown-item dropdown-footer" style="text-align: center;">
                                                    <a href="<?= base_url('User/profile_saya') ?>" class="btn btn-primary">Profile Saya</a>
                                                    <a href="<?= base_url('User/logout') ?>" class="btn btn-danger right logout">Log out</a>
                                                </div>
                                                </div>
                                            </li>
                                        <?php } else { ?>
                                            <li id="login_popup">
                                                <a href="#test-form" class="login popup-with-form boxed_btn_orange">
                                                    <i class="flaticon-user"></i>
                                                    <span>log in</span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <div class="live_chat_btn">
                                    <a class="login popup-with-form boxed_btn_orange" href="#test-form">
                                        <i class="flaticon-user"></i>
                                        <span>Log In</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->