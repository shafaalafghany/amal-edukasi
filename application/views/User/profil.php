<!DOCTYPE HTML>
<html lang="en">

<head>
	<title><?= $judul ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700%7CAllura" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/user/'); ?>img/favicon.ico">

	<link href="<?= base_url('assets/profil/') ?>common-css/bootstrap.css" rel="stylesheet">

	<link href="<?= base_url('assets/profil/') ?>common-css/ionicons.css" rel="stylesheet">

	<link href="<?= base_url('assets/profil/') ?>common-css/fluidbox.min.css" rel="stylesheet">

	<link href="<?= base_url('assets/profil/') ?>01-cv-portfolio/css/styles.css" rel="stylesheet">

	<link href="<?= base_url('assets/profil/') ?>01-cv-portfolio/css/responsive.css" rel="stylesheet">

</head>

<body>

	<header>
		<div class="container">
			<?php if ($user['role_id'] == 3) { ?>
				<a class="downlad-btn" href="<?= base_url(); ?>" style="border-radius: 30px">Kembali ke home</a>
			<?php } else { ?>
				<a class="downlad-btn" href="<?= base_url('admin'); ?>" style="border-radius: 30px">Kembali ke admin</a>
			<?php } ?>
		</div><!-- container -->
	</header>

	<section class="intro-section">
		<div class="container">
			<div class="row">
				<div class="col-md-1 col-lg-2"></div>
				<div class="col-md-10 col-lg-8">
					<div class="intro">
						<div class="profile-img"><img src="<?= base_url('assets/avatar/') . $user['image']; ?>" alt=""></div>
						<h2><b><?= $user['name']; ?></b></h2>
						<h4 class="font-yellow">Terdaftar sejak <?= $user['date_created'] ?></h4>
						<ul class="information margin-tb-30">
							<li><b>EMAIL : </b><?= $user['email'] ?></li>
							<li><b>TELEPON : </b><?= $user['telepon'] ?></li>
							<li><b>STATUS : </b><?php if ($user['is_active'] == 1) {
													echo 'Aktif';
												} else {
													echo 'Tidak Aktif';
												} ?></li>
						</ul>
						<?php if ($user['quotes']) { ?>
							<ul class="social-icons">
								<h4 style="margin-bottom: -20px;"><b>Quotes Of The Day</b></h4><br>
								<h4 style="color: blue;"><?= $user['quotes'] ?></h4>
							</ul>
						<?php } else { ?>
							<ul class="social-icons">
								<h4 style="margin-bottom: -20px;"><b>Quotes Of The Day</b></h4><br>
								<li class="font-yellow">Belum ada quotes darimu.</li>
								<li>Yuk berikan quotes terbaik kamu agar tetap semangat setiap hari!!</li>
							</ul>
						<?php } ?>
						<!-- <ul class="social-icons">
							<li><a href="#"><i class="ion-social-instagram"></i></a></li>
							<li><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter"></i></a></li>
						</ul> -->
					</div><!-- intro -->
				</div><!-- col-sm-8 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- intro-section -->

	<section class="about-section section" id="counter">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="heading">
						<h3><b>Informasi</b></h3>
						<?php if ($user['role_id'] == 3) { ?>
							<h6 class="font-lite-black"><b>TRANSAKSI SAYA</b></h6>
						<?php } else { ?>
							<h6 class="font-lite-black"><b>INFORMASI UMUM</b></h6>
						<?php } ?>
					</div>
				</div><!-- col-sm-4 -->
				<div class="col-sm-8">
					<div class="row">
						<?php if ($user['role_id'] == 3) { ?>
							<div class="col-sm-6 col-md-6 col-lg-4">
								<div class="counter margin-b-30">
									<h1 class="title"><b><span class="counter-value" data-duration="1000" data-count="<?= count($tiket) ?>">0</span></b></h1>
									<h5 class="desc"><b>Tiket Tryout Didapat</b></h5>
								</div><!-- counter -->
							</div><!-- col-md-3-->

							<div class="col-sm-6 col-md-6 col-lg-4">
								<div class="counter margin-b-30">
									<h1 class="title"><b><span class="counter-value" data-duration="1000" data-count="0">0</span></b></h1>
									<h5 class="desc"><b>Try Out Diikuti</b></h5>
								</div><!-- counter -->
							</div><!-- col-md-3-->
						<?php } else { ?>
							<div class="counter margin-b-30" style="border-color: yellow">
								<h4>
									Anda adalah <b>Administrator</b> yang memiliki kuasa untuk mengatur sistem tryout Amal Edukasi ini, anda dapat menambah modul, menambah admin,
									menambah event, dan backup database.
								</h4>
							</div>
						<?php } ?>

					</div><!-- row -->
				</div><!-- col-sm-8 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- about-section -->

	<section class="portfolio-section section">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="heading">
						<h3><b>Pengaturan</b></h3>
						<h6 class="font-lite-black"><b>PENGATURAN AKUN</b></h6>
					</div>
				</div><!-- col-sm-4 -->
				<div class="col-sm-8">
					<div class="portfolioFilter clearfix margin-b-80">
						<a href="#" data-filter=".info-akun" class="current"><b>INFO AKUN</b></a>
						<a href="#" data-filter=".edit-akun"><b>EDIT PROFIL</b></a>
						<a href="#" data-filter=".ganti-password"><b>GANTI PASSWORD</b></a>
					</div><!-- portfolioFilter -->
				</div><!-- col-sm-8 -->
			</div><!-- row -->
		</div><!-- container -->

		<div class="portfolioContainer" style="margin-bottom: 10%;">

			<div class="p-item info-akun">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>No.HP</label>
					<input type="number" class="form-control" id="telepon" name="telepon" value="<?= $user['telepon']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Tanggal Bergabung</label>
					<input type="text" class="form-control" id="telepon" name="telepon" value="<?= $user['date_created']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Level Pengguna</label>
					<?php if ($user['role_id'] == 3) { ?>
						<input type="text" class="form-control" id="email" name="email" value="Peserta" readonly>
					<?php } else { ?>
						<input type="text" class="form-control" id="email" name="email" value="Administrator" readonly>
					<?php } ?>
				</div>
				<div class="form-group">
					<label>Riwayat Pendidikan</label>
					<textarea cols="5" rows="4" class="form-control" id="pendidikan" name="pendidikan" readonly><?= $user['riwayat_pendidikan']; ?></textarea>
				</div>
				<div class="form-group">
					<label>Tempat Tinggal</label>
					<textarea cols="5" rows="4" class="form-control" id="pendidikan" name="pendidikan" readonly><?= $user['lokasi']; ?></textarea>
				</div>
				<div class="form-group">
					<label>Quotes Terbaik Saya</label>
					<textarea cols="5" rows="4" class="form-control" id="pendidikan" name="pendidikan" readonly><?= $user['quotes']; ?></textarea>
				</div>
			</div><!-- p-item -->

			<div class="p-item edit-akun">
				<?= form_open_multipart('pages/profil_saya'); ?>
				<!-- <form action=" //base_url('User/profile_saya'); " method="POST" enctype="multipart/form-data"> -->
				<div class="form-group">
					<label>Foto Diri</label>
					<br>
					<div class="foto-profil">
						<img class="img-profil" src="<?= base_url('assets/avatar/') . $user['image']; ?>" style="margin-right: 40px;">
						<div style="display: all; margin-top: 4%">
							<label>Foto Profile sebaiknya memiliki rasio 1:1 dan tidak lebih dari 2MB.</label>
							<br>
							<input type="file" id="image" name="image" accept="image/*">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Nama <span style="color: red">*</span></label>
					<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
				</div>
				<div class="form-group">
					<label>Email <span style="color: red">*</span></label>
					<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>No. HP <span style="color: red">*</span></label>
					<input type="number" class="form-control" id="telepon" name="telepon" value="<?= $user['telepon']; ?>">
				</div>
				<div class="form-group">
					<label>Riwayat Pendidikan</label>
					<textarea cols="5" rows="4" class="form-control" id="pendidikan" name="pendidikan"><?= $user['riwayat_pendidikan']; ?></textarea>
				</div>
				<div class="form-group">
					<label>Tempat Tinggal</label>
					<textarea cols="5" rows="4" class="form-control" id="lokasi" name="lokasi"><?= $user['lokasi']; ?></textarea>
				</div>
				<div class="form-group">
					<label>Quotes Terbaik Saya</label>
					<textarea cols="5" rows="4" class="form-control" id="quotes" name="quotes"><?= $user['quotes']; ?></textarea>
				</div>
				<div class="form-group">
					<label style="color: red">Catatan: Form yang bertanda bintang (*) berarti wajib diisi</label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary py-2 px-4">Simpan Perubahan</button>
				</div>
				</form>
			</div><!-- p-item -->

			<div class="p-item ganti-password">
				<?= form_open_multipart('pages/lupa_password'); ?>
				<!-- <form action=" //base_url('User/profile_saya'); " method="POST" enctype="multipart/form-data"> -->
				<div class="form-group">
					<label><strong>Kamu ingin ganti password?</strong></label>
					<br>
					<label>Untuk ganti password, kami harus mengirim konfirmasi ke email aktif kamu yaitu <?= $user['email'] ?>.
						Jika kamu yakin ingin ganti password silahkan klik tombol Kirim Email dibawah dan cek email kamu</label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary py-2 px-4">Kirim Email</button>
				</div>
				</form>
			</div><!-- p-item -->

		</div><!-- portfolioContainer -->

	</section><!-- portfolio-section -->

	<footer>
		<p class="copyright">
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			Copyright &copy;<script>
				document.write(new Date().getFullYear());
			</script> All rights reserved | <a href="https://sobatkode.com" target="_blank">Sobat Kode</a>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		</p>


	</footer>


	<!-- SCIPTS -->
	<script src="<?= base_url('assets/user/'); ?>js/sweetalert2.all.min.js"></script>
	
	<script src="<?= base_url('assets/profil/') ?>common-js/jquery-3.2.1.min.js"></script>

	<script src="<?= base_url('assets/profil/') ?>common-js/tether.min.js"></script>

	<script src="<?= base_url('assets/profil/') ?>common-js/bootstrap.js"></script>

	<script src="<?= base_url('assets/profil/') ?>common-js/isotope.pkgd.min.js"></script>

	<script src="<?= base_url('assets/profil/') ?>common-js/jquery.waypoints.min.js"></script>

	<script src="<?= base_url('assets/profil/') ?>common-js/progressbar.min.js"></script>

	<script src="<?= base_url('assets/profil/') ?>common-js/jquery.fluidbox.min.js"></script>

	<script src="<?= base_url('assets/profil/') ?>common-js/scripts.js"></script>

	<?php if($this->session->flashdata('success')){ ?>
		<script type="text/javascript">
			$(document).ready(function() {
				Swal.fire({
					icon: 'success',
					title: 'Berhasil!!',
					text: '<?= $this->session->flashdata('success') ?>'
				})
			});
		</script>
	<?php } elseif($this->session->flashdata('error')) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: '<?= $this->session->flashdata('error') ?>'
				})
			});
		</script>
	<?php } ?>

</body>

</html>