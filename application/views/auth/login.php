<!-- form itself end-->
<div id="test-form" class="white-popup-block mfp-hide">
    <div class="popup_box ">
        <div class="popup_inner">
            <div class="logo text-center">
                <a href="#">
                    <img src="<?= base_url('assets/user/'); ?>img/auth/login.png" alt="">
                </a>
            </div>
            <h3 class="text-center">Log In</h3>
            <form action="<?= base_url('auth/login'); ?>" method="POST">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <input type="text" placeholder="Enter email" name="email" id="email">
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <input type="password" placeholder="Password" name="password" id="password">
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="genric-btn info circle">Sign in</button>
                    </div>
                </div>
            </form>
            <p class="doen_have_acc">Belum punya akun? <a class="dont-hav-acc" href="#test-form2">Registrasi</a>
            </p>
            <p class="doen_have_acc" style="margin-top: -15px;"><a class="dont-hav-acc" href="#test-form3">Anda lupa password? Lupa Password</a>
            </p>
        </div>
    </div>
</div>
<!-- form itself end -->