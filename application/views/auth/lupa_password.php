<!-- form itself end-->
<div id="test-form3" class="white-popup-block mfp-hide">
    <div class="popup_box ">
        <div class="popup_inner">
            <div class="logo text-center">
                <a href="#">
                    <img src="<?= base_url('assets/user/'); ?>img/auth/forgot.png" alt="">
                </a>
            </div>
            <h3 class="text-center">Lupa Password</h3>
            <form action=" <?= base_url('auth/lupa_password'); ?>" method="POST">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <input type="text" placeholder="Masukkan Email" name="email" id="email">
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="genric-btn primary circle">Cek Email</button>
                    </div>
                </div>
            </form>
            <p class="doen_have_acc">Sudah ingat password? <a class="dont-hav-acc" href="#test-form">Kembali ke login</a>
            </p>
        </div>
    </div>
</div>
<!-- form itself end -->