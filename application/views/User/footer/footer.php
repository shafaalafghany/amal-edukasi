<!-- footer -->
<footer class="footer footer_bg_1">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="<?= base_url('assets/user/'); ?>img/logo.png" alt="">
                            </a>
                        </div>
                        <p>
                            Firmament morning sixth subdue darkness creeping gathered divide our let god moving.
                            Moving in fourth air night bring upon it beast let you dominion likeness open place day
                            great.
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Courses
                        </h3>
                        <ul>
                            <li><a href="#">Wordpress</a></li>
                            <li><a href="#"> Photoshop</a></li>
                            <li><a href="#">Illustrator</a></li>
                            <li><a href="#">Adobe XD</a></li>
                            <li><a href="#">UI/UX</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Resourches
                        </h3>
                        <ul>
                            <li><a href="#">Free Adobe XD</a></li>
                            <li><a href="#">Tutorials</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#"> About</a></li>
                            <li><a href="#"> Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Address
                        </h3>
                        <p>
                            200, D-block, Green lane USA <br>
                            +10 367 467 8934 <br>
                            edumark@contact.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->


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

<!-- form itself end-->
<div id="test-form2" class="white-popup-block mfp-hide">
    <div class="popup_box ">
        <div class="popup_inner">
            <br><br><br><br><br><br><br><br><br><br>
            <div class="logo text-center">
                <a href="#">
                    <img src="<?= base_url('assets/user/'); ?>img/auth/registrasi.png" alt="">
                </a>
            </div>
            <h3 class="text-center">Registrasi</h3>
            <form action="#">
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
            <form action="#">
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


<!-- JS here -->
<script src="<?= base_url('assets/user/'); ?>js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/ajax-form.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/waypoints.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.counterup.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/scrollIt.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/wow.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/nice-select.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.slicknav.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/plugins.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/gijgo.min.js"></script>

<!--contact js-->
<script src="<?= base_url('assets/user/'); ?>js/contact.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.ajaxchimp.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.form.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/mail-script.js"></script>

<script src="<?= base_url('assets/user/'); ?>js/main.js"></script>
</body>

</html>