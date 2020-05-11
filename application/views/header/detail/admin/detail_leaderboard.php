<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $judul ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="text/css" href="<?= base_url('assets/user/'); ?>img/favicon.ico">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-purple">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a href="#" class="nav-link" data-toggle="dropdown">
            <div class="user-panel d-flex">
              <div class="image">
                <img src="<?= base_url('assets/avatar/') . $user['image']; ?>" class="rounded-circle" alt="User Image" style="width: 37px; height: 37px;">
              </div>
              <div class="info">
                <span><?= $user['name'] ?></span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-item dropdown-header">
              <img src="<?= base_url('assets/avatar/') . $user['image']; ?>" class="rounded-circle elevation-2 mb-2" alt="User Image" style="width: 100px; height: 100px;">
              <p>
                <span><?= $user['name'] ?></span>
                <br>
                <span>Selamat Datang</span>
              </p>
            </div>
            <div class="dropdown-divider"></div>
            <div class="dropdown-item dropdown-footer">
              <a href="<?= base_url('pages/profil_saya') ?>" class="btn btn-primary">Profile Saya</a>
              <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger right logout">Log out</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-indigo elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3">
          <div class="image">
            <img src="<?= base_url('assets/user/') ?>img/logo.png" class="elevation-2" alt="User Image" style="height: 50%; width: 100%;">
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->

            <?php if (current_url() == base_url('admin')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="<?= base_url('admin') ?>" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item has-treeview">
                <a href="<?= base_url('admin') ?>" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
            <?php } ?>

            <?php if (current_url() == base_url('admin_modul/daftar_modul')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-play-circle"></i>
                  <p>
                    Modul Pembelajaran
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_modul/daftar_modul') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Modul</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_modul/tambah_modul') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Modul</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } elseif (current_url() == base_url('admin_modul/tambah_modul')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-play-circle"></i>
                  <p>
                    Modul Pembelajaran
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_modul/daftar_modul') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Modul</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_modul/tambah_modul') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Modul</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } else { ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-play-circle"></i>
                  <p>
                    Modul Pembelajaran
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_modul/daftar_modul') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Modul</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_modul/tambah_modul') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Modul</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (current_url() == base_url('admin_paket/daftar_paket')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>
                    Paket Try Out
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_paket/daftar_paket') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Paket</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_paket/tambah_paket') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Paket</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } elseif (current_url() == base_url('admin_paket/tambah_paket')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>
                    Paket Try Out
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_paket/daftar_paket') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Paket</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_paket/tambah_paket') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Paket</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } else { ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>
                    Paket Try Out
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_paket/daftar_paket') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Paket</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_paket/tambah_paket') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Paket</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (current_url() == base_url('admin_event/pilih_paket') || current_url() == base_url('admin_event/daftar_event')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-calendar-week"></i>
                  <p>
                    Event
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_event/pilih_paket') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Event</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_event/tambah_event') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Event</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } elseif (current_url() == base_url('admin_event/tambah_event')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-calendar-week"></i>
                  <p>
                    Event
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_event/pilih_paket') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Event</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_event/tambah_event') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Event</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } else { ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-calendar-week"></i>
                  <p>
                    Event
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_event/pilih_paket') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Event</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_event/tambah_event') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Event</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (current_url() == base_url('admin_soal/pilih_kategori_soal') || current_url() == base_url('admin_soal/daftar_soal')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Soal
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_soal/pilih_kategori_soal') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Soal</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_soal/kategori_tambah_soal') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Soal</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } elseif (current_url() == base_url('admin_soal/kategori_tambah_soal') || current_url() == base_url('admin_soal/tambah_soal')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Soal
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_soal/pilih_kategori_soal') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Soal</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_soal/kategori_tambah_soal') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Soal</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } else { ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Soal
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_soal/pilih_kategori_soal') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Soal</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_soal/kategori_tambah_soal') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Soal</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (current_url() == base_url('admin_faq')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="fas fa-question-circle nav-icon"></i>
                  <p>
                    FAQ
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_faq') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar FAQ</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_faq/tambah_faq') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah FAQ</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } elseif(current_url() == base_url('admin_faq/tambah_faq')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="fas fa-question-circle nav-icon"></i>
                  <p>
                    FAQ
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_faq') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar FAQ</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_faq/tambah_faq') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah FAQ</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } else { ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-question-circle nav-icon"></i>
                  <p>
                    FAQ
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_faq') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar FAQ</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_faq/tambah_faq') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah FAQ</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (current_url() == base_url('admin_pembayaran')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="<?= base_url('admin_pembayaran') ?>" class="nav-link active">
                  <i class="fas fa-money-check-alt nav-icon"></i>
                  <p>
                    Pembayaran Peserta
                  </p>
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item has-treeview">
                <a href="<?= base_url('admin_pembayaran') ?>" class="nav-link">
                  <i class="fas fa-money-check-alt nav-icon"></i>
                  <p>
                    Pembayaran Peserta
                  </p>
                </a>
              </li>
            <?php } ?>

            <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('admin_leaderboard/pilih_event') ?>" class="nav-link active">
                <i class="fas fa-medal nav-icon"></i>
                <p>
                Leaderboard
                </p>
            </a>
            </li>

            <li class="nav-header">Administrator</li>
            <?php if (current_url() == base_url('admin_data')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-user-shield"></i>
                  <p>
                    Data Admin
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_data') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Admin</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_data/') ?>tambah_admin" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Admin</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } elseif (current_url() == base_url('admin_data/tambah_admin')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-user-shield"></i>
                  <p>
                    Data Admin
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_data') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Admin</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_data/') ?>tambah_admin" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Admin</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } else { ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-shield"></i>
                  <p>
                    Data Admin
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_data') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Admin</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_data/') ?>tambah_admin" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Admin</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (current_url() == base_url('admin_peserta')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Peserta
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_peserta') ?>" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Peserta</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_peserta/') ?>testimoni" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Testimoni</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } elseif (current_url() == base_url('admin_peserta/testimoni')) { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Peserta
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_peserta') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Peserta</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_peserta/') ?>testimoni" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Testimoni</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } else { ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Peserta
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_peserta') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar Peserta</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_peserta/') ?>testimoni" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Testimoni</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <li class="nav-header">PENGATURAN</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                  Tools
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <!-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('Administrator/') ?>topup" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Setting Top Up</p>
                  </a>
                </li>
              </ul> -->
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Back Up Database</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-header">AKUN</li>
            <li class="nav-item has-treeview">
              <a href="<?= base_url('pages/profil_saya') ?>" class="nav-link">
                <i class="nav-icon far fa-edit"></i>
                <p>
                  Profile Saya
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?= base_url('auth/logout') ?>" class="nav-link logout">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Log out
                </p>
              </a>
            </li> -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>