<!-- form itself end-->
<div id="test-form2" class="white-popup-block mfp-hide">
    <div class="popup_box ">
        <div class="popup_inner">
            <div class="logo text-center">
                <a href="#">
                    <img src="<?= base_url('assets/user/'); ?>img/auth/registrasi.png" alt="">
                </a>
            </div>
            <h3 class="text-center">Registrasi</h3>
            <form action=" <?= base_url('auth/registrasi'); ?>" method="POST">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <input type="text" placeholder="Masukkan Email" name="email" id="email">
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <input type="text" placeholder="Masukkan Nama" name="name" id="name">
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <input type="number" placeholder="Masukkan No. Telepon" name="telepon" id="telepon">
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <input type="password" placeholder="Password" name="password1" id="password1">
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <input type="Password" placeholder="Konfirmasi Password" name="password2" id="password2">
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="genric-btn primary circle">Daftar</button>
                    </div>
                </div>
            </form>
            <p class="doen_have_acc">Sudah punya akun? <a class="dont-hav-acc" href="#test-form">Kembali ke login</a>
            </p>
        </div>
    </div>
</div>
<!-- form itself end -->