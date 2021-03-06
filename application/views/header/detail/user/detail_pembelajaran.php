<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $judul ?></title>
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
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/'); ?>css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
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
                                        <?php if(current_url() == base_url() || current_url() == base_url('home')){ ?>
                                            <li><a class="active" href="<?= base_url(); ?>">home</a></li>
                                        <?php } else { ?>
                                            <li><a href="<?= base_url(); ?>">home</a></li>
                                        <?php } ?>
                                        <li><a href="#">Try Out <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <?php foreach($paket as $load_paket){ ?>
                                                    <li><a href="<?= base_url('pages/event/' . $load_paket['id_paket']) ?>"><?= $load_paket['nama_paket'] ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php if(current_url() == base_url('pembelajaran') || current_url() == base_url('detail/pembelajaran_detail/' . $modul['id_modul'])){ ?>
                                            <li><a class="active" href="<?= base_url('pembelajaran'); ?>">Modul</a></li>
                                        <?php } else { ?>
                                            <li><a href="<?= base_url('pembelajaran'); ?>">Modul</a></li>
                                        <?php } ?>
                                        <?php if(current_url() == base_url('cara_daftar') || current_url() == base_url('upload_bukti')){ ?>
                                            <li><a class="active" href="#">Ikut Try Out  <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="<?= base_url('cara_daftar') ?>">Cara Ikut Try Out</a></li>
                                                    <?php if($user) { ?>
                                                        <li><a href="<?= base_url('upload_bukti') ?>">Upload Bukti Pembayaran</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li><a href="#">Ikut Try Out <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="<?= base_url('cara_daftar') ?>">Cara Ikut Try Out</a></li>
                                                    <?php if($user) { ?>
                                                        <li><a href="<?= base_url('upload_bukti') ?>">Upload Bukti Pembayaran</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                        <?php if(current_url() == base_url('contact')){ ?>
                                            <li><a class="active" href="<?= base_url('contact'); ?>">Contact</a></li>
                                        <?php } else { ?>
                                            <li><a href="<?= base_url('contact'); ?>">Contact</a></li>
                                        <?php } ?>
                                        <?php if(current_url() == base_url('faq')){ ?>
                                            <li><a class="active" href="<?= base_url('faq'); ?>">FAQ</a></li>
                                        <?php } else { ?>
                                            <li><a href="<?= base_url('faq'); ?>">FAQ</a></li>
                                        <?php } ?>
                                        <li id="login_popup">
                                            <?php if(!empty($user)){ ?>
                                                <a href="#">
                                                    <div class="user-panel d-flex">
                                                        <div class="image">
                                                            <img src="<?= base_url('assets/avatar/') . $user['image']; ?>" class="rounded-circle" alt="User Image" style="width: 30px; height: 30px; margin-right: 8px;">
                                                        </div>
                                                        <div class="info">
                                                            <span><?= $user['name']; ?></span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <ul class="submenu">
                                                    <li>
                                                        <div class="dropdown-menu-lg" style="text-align: center;">
                                                            <div class="dropdown-item dropdown-header">
                                                                <img src="<?= base_url('assets/avatar/') . $user['image']; ?>" class="rounded-circle elevation-2 mb-2" alt="User Image" style="width: 100px; height: 100px;">
                                                                <p>
                                                                    <span>Selamat Datang</span>
                                                                    <br>
                                                                    <span style="color: black;"><strong><?= $user['name']; ?></strong></span>
                                                                </p>
                                                            </div>
                                                            <div class="dropdown-divider"></div>
                                                            <div class="dropdown-item dropdown-footer d-flex" style="margin-left: 15%;">
                                                                <a href="<?= base_url('pages/profil_saya') ?>" class="btn btn-primary" style="color: white; border-radius: 9px;">Profile Saya</a>
                                                                <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger right logout" style="color: white; border-radius: 9px;">Log out</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            <?php } else { ?>
                                                <a href="#test-form" class="login popup-with-form boxed_btn_orange">
                                                    <i class="flaticon-user"></i>
                                                    <span>log in</span>
                                                </a>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <?php if(!empty($user)){ ?>
                            <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                                <div class="log_chat_area d-flex align-items-center">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown">
                                            <div class="user-panel">
                                                <div class="image text-center">
                                                    <img src="<?= base_url('assets/avatar/') . $user['image']; ?>" class="rounded-circle" alt="User Image" style="width: 45px; height: 45px; margin-right: 8px;">
                                                </div>
                                                <div class="info text-center">
                                                    <span style="color: white; font-family: Poppins, sans-serif; margin-top: 10px;"><?= $user['name']; ?></span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-item dropdown-header">
                                                <div class="image" style="text-align: center;">
                                                <img src="<?= base_url('assets/avatar/') . $user['image']; ?>" class="rounded-circle elevation-2" alt="User Image" style="width: 100px; height: 100px;">
                                                </div>
                                                <br>
                                                <p style="text-align: center;">
                                                <span>Selamat Datang</span>
                                                <br>
                                                <span style="font-size: 20px; color: black;"><strong><?= $user['name']; ?></strong></span>
                                                </p>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="dropdown-item dropdown-footer" style="text-align: center;">
                                                <a href="<?= base_url('pages/profil_saya') ?>" class="btn btn-primary" style="border-radius: 10px;">Profile Saya</a>
                                                <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger right logout" style="border-radius: 10px;">Log out</a>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="log_chat_area d-flex align-items-center">
                                    <a href="#test-form" class="login popup-with-form">
                                        <i class="flaticon-user"></i>
                                        <span>log in</span>
                                    </a>
                                    <div class="live_chat_btn">
                                        <a class="boxed_btn_orange" href="https://api.whatsapp.com/send?phone=+6282278666726" target="_blank">
                                            <i class="fa fa-phone"></i>
                                            <span>+62 822 7866 6726</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->