    <!-- slider_area_start -->
    <div class="slider_area ">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="illastrator_png">
                            <img src="<?= base_url('assets/user/'); ?>img/banner/index.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_info">
                            <h3>Try Out Online<br>
                                CPNS dan<br>
                                PKN STAN</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="single_about_info">
                        <h3>Kenapa Harus <br>
                            Amal Edukasi?</h3>
                        <p>
                            Amal Edukasi merupakan try out online CPNS dan PKN STAN nomor satu diseluruh Indonesia,
                            dengan soal-soal terbaik dan belum pernah ada sebelumnya.
                            Try out ini dilengkapi dengan video pembelajaran yang sangat mudah dipahami,
                            jadi tidak perlu repot-repot membeli buku, cukup buka Amal Edukasi belajar jadi lebih mudah!!
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6">
                    <div class="about_tutorials">
                        <div class="courses">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>20+</span>
                                    <p>Video Pembelajaran</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses-blue">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>300+</span>
                                    <p> Soal-Soal Terbaik</p>
                                </div>

                            </div>
                        </div>
                        <div class="courses-sky">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>1000+</span>
                                    <p> Peserta di Seluruh Indonesia</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Try Out Kami</h3>
                    </div>
                </div>
            </div>

        </div>
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <?php foreach($paket as $load_paket){ ?>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single_courses">
                                        <div class="courses_info">
                                            <h3><a href="<?= base_url('pages/event/' . $load_paket['id_paket']) ?>"><?= $load_paket['nama_paket'] ?></a></h3>
                                            <?php if($user){ ?>
                                                <?php $tiket = $this->db->get_where('tiket_user', ['id_user'=>$user['id'], 'id_paket'=>$load_paket['id_paket']])->row_array(); ?>
                                                <h6>Kamu memiliki <span style="color: blue"><?= $tiket['jmlh_tiket'] ?> tiket</span> pada paket ini</h6>
                                            <?php } ?>
                                            <div class="star_prise d-flex justify-content-between">
                                                <?php $event = $this->db->get_where('event', ['id_paket' => $load_paket['id_paket']])->result_array() ?>
                                                <div class="star">
                                                    <i class="far fa-calendar-plus"></i>
                                                    <span><?= count($event) ?> Event</span>
                                                </div>
                                                <div class="prise">
                                                    <span class="active_prise">
                                                        Rp<?= $load_paket['harga_paket'] ?> /event
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->

    <!-- testimonial_area_start -->
    <div class="testimonial_area breadcam_bg">
        <div class="testmonial_active owl-carousel">
            <?php foreach($testimoni as $load_testi){ ?>
                <div class="single_testmoial">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="testmonial_text text-center">
                                    <div class="author_img">
                                        <img src="<?= base_url('assets/avatar/' . $load_testi['image']); ?>" alt="" style="width: 100px; height: 100px;">
                                    </div>
                                    <p style="color: yellow"><?= $load_testi['jenis'] ?></p>
                                    <p>
                                        "<?= $load_testi['pesan'] ?>"
                                    </p>
                                    <span>- <?= $load_testi['nama_user'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- testimonial_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Modul Pembelajaran</h3>
                        <p>Lihat modul pembelajaran kami yukk!! <br> Banyak trik-trik jitu didalamnya.</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <?php if($modul){ ?>
                                    <?php foreach($modul as $load_modul){ ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="single_courses">
                                                <div class="thumb">
                                                    <a href="<?= base_url('detail/pembelajaran_detail/' . $load_modul['id_modul']) ?>">
                                                        <img src="<?= base_url('assets/modul/thumbnail/' . $load_modul['thumbnail']); ?>" alt="" style="width: 362px; height: 250px;">
                                                    </a>
                                                </div>
                                                <div class="courses_info">
                                                    <span><?= $load_modul['jenis'] ?></span>
                                                    <h3><a href="<?= base_url('detail/pembelajaran_detail/' . $load_modul['id_modul']) ?>"><?= $load_modul['judul_modul'] ?></a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if(count($modul) > 6){ ?>
                                        <div class="col-xl-12">
                                            <div class="more_courses text-center">
                                                <a href="#" class="boxed_btn_rev">Tampilkan Lebih Banyak</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->

    <!-- our_courses_start -->
    <div class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Kualitas Kami</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon gradient">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <br>
                        <h3>Mudah Dipahami</h3>
                        <p>
                            Semua modul pembelajaran yang kami sampaikan <br> sangat mudah <br> 
                            digunakan dan dipahami
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon gradient">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <br>
                        <h3>Harga Ekonomis</h3>
                        <p>
                            Di amal edukasi, dengan <br> harga yang terjangkau <br>
                            try out online bisa didapatkan
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon gradient">
                            <i class="fas fa-users"></i>
                        </div>
                        <br>
                        <h3>Banyak Peserta</h3>
                        <p>
                            Try Out di Amal Edukasi diikuti banyak peserta sehingga
                            cocok sekali untuk uji latihanmu
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon gradient">
                            <i class="fab fa-teamspeak"></i>
                        </div>
                        <br>
                        <h3>Pemateri Para Ahli</h3>
                        <p>
                            Modul pembelajaran di Amal Edukasi ini dibawakan oleh 
                            pemateri yang benar-benar ahli dibidangnya
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_courses_end -->