        <!-- bradcam_area_start -->
        <div class="bradcam_area breadcam_bg">
                <h3>contact Kami</h3>
            </div>
            <!-- bradcam_area_end -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Kirim email ke kami</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="<?= base_url('contact') ?>" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Pesan'" placeholder=" Masukkan Pesan"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php if($user){ ?>
                                            <label>Email Asal</label>
                                            <input class="form-control valid" name="email1" id="email1" type="email" value="<?= $user['email'] ?>" readonly>
                                        <?php } else { ?>
                                            <input class="form-control valid" name="email1" id="email1" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan email anda'" placeholder="Masukkan email anda">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php if($user){ ?>
                                            <label>Email Tujuan</label>
                                            <input class="form-control valid" name="email2" id="email2" type="email" value="sobatkode@gmail.com" readonly>
                                        <?php } else { ?>
                                            <input class="form-control valid" name="email2" id="email2" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan email tujuan'" placeholder="Masukkan email tujuan">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Subject'" placeholder="Masukkan Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                            <?php if($user){ ?>
                                <button type="submit" class="boxed_btn_rev">Kirim</button>
                            <?php } else { ?>
                                <a href="<?= base_url() ?>" class="genric-btn warning circle e-large">Login Dulu</a>
                            <?php } ?>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Indonesia.</h3>
                                <p>Jakarta</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+6282278666726</h3>
                                <p>Tersedia 24 jam</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>amaledukasi@gmail.com</h3>
                                <p>Tersedia 24 jam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->