<!-- bradcam_area_start -->
     <div class="courses_details_banner">
         <div class="container">
             <div class="row">
                 <div class="col-xl-6">
                     <div class="course_text">
                            <h3><?= $modul['judul_modul'] ?></h3>
                            <!-- <div class="prise">
                                <span class="inactive">$89.00</span>
                                <span class="active">$49</span>
                            </div> --><!-- 
                            <div class="rating">
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <span>(4.5)</span>
                            </div> -->
                            <!-- <div class="hours">
                                <div class="video">
                                     <div class="single_video">
                                            <i class="fa fa-clock-o"></i> <span>1 Video</span>
                                     </div>
                                     <div class="single_video">
                                            <i class="fa fa-play-circle-o"></i> <span>2 Jam</span>
                                     </div>
                                   
                                </div>
                            </div> -->
                     </div>
                 </div>
             </div>
         </div>
    </div>
    <!-- bradcam_area_end -->

    <div class="courses_details_info">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="single_courses">
                        <h3>Deskripsi</h3>
                        <p><?= $modul['deskripsi'] ?></p>
                        <!-- <h3 class="second_title">Garis Besar Video</h3> -->
                    </div>
                    <br>
                    <br>
                    <div class="outline_courses_info">
                            <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                                                    <i class="flaticon-question"></i> <?= $modul['subjudul1'] ?>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <?= $modul['subdesk1'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($modul['subjudul2'] && $modul['subdesk2']){ ?>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <i class="flaticon-question"></i> <?= $modul['subjudul2'] ?>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <?= $modul['subdesk2'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if($modul['subjudul3'] && $modul['subdesk3']){ ?>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                                                        <i class="flaticon-question"></i> <?= $modul['subjudul3'] ?>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    <?= $modul['subdesk3'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <i class="flaticon-question"></i>Basic Classes</span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                                let god moving. Moving in fourth air night bring upon
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <i class="flaticon-question"></i> Will you transfer my site?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body">
                                                Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                                let god moving. Moving in fourth air night bring upon
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_4">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                                                    <i class="flaticon-question"></i> Why should I host with Hostza?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse_4" class="collapse" aria-labelledby="heading_4" data-parent="#accordion">
                                            <div class="card-body">
                                                Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                                let god moving. Moving in fourth air night bring upon
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_5" aria-expanded="false" aria-controls="collapse_5">
                                                    <i class="flaticon-question"></i> How do I get started <span>with Shared
                                                        Hosting?</span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse_5" class="collapse" aria-labelledby="heading_5" data-parent="#accordion">
                                            <div class="card-body">
                                                Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                                let god moving. Moving in fourth air night bring upon
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="courses_sidebar">
                        <div class="video_thumb">
                            <img src="<?= base_url('assets/modul/thumbnail/' . $modul['thumbnail']); ?>" alt="" style="width: 450px; height: 400px;">
                            <?php if($user){ ?>
                                <a href="<?= base_url('assets/modul/video/' . $modul['video']) ?>" class="popup-video">
                                    <i class="fa fa-play"></i>
                                </a>
                            <?php } else { ?>
                                <a href="#test-form" class="login popup-with-form">
                                    <i class="fa fa-play"></i>
                                </a>
                            <?php } ?>
                        </div>
                        <br>
                        <?php ?>
                        <?php if($user){ ?>
                            <a href="<?= base_url('assets/modul/video/' . $modul['video']) ?>" class="boxed_btn popup-video">Lihat Video</a>
                        <?php } else { ?>
                            <a href="#test-form" class="login popup-with-form genric-btn warning circle arrow" style="width: 100%; padding-left: 42%; padding-right: 42%">
                                Login Dulu
                            </a>
                        <?php } ?>
                        <?php if($user) { ?>
                            <div class="feedback_info">
                                <h3>Tulis Feedback Kamu</h3>
                                <form action="<?= base_url('detail/pembelajaran_detail/' . $modul['id_modul']) ?>" method="POST">
                                    <textarea name="testimoni" id="testimoni" cols="30" rows="10" placeholder="Tulis feedback kamu"></textarea>
                                    <button type="submit" class="boxed_btn">Submit Feedback</button>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- testimonial_area_start -->
    <!-- <div class="testimonial_area testimonial_bg_1 overlay">
        <div class="testmonial_active owl-carousel">
            <div class="single_testmoial">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testmonial_text text-center">
                                <div class="author_img">
                                    <img src="img/testmonial/author_img.png" alt="">
                                </div>
                                <p>
                                    "Working in conjunction with humanitarian aid <br> agencies we have supported
                                    programmes to <br>
                                    alleviate.
                                    human suffering.

                                </p>
                                <span>- Jquileen</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_testmoial">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testmonial_text text-center">
                                <div class="author_img">
                                    <img src="img/testmonial/author_img.png" alt="">
                                </div>
                                <p>
                                    "Working in conjunction with humanitarian aid <br> agencies we have supported
                                    programmes to <br>
                                    alleviate.
                                    human suffering.

                                </p>
                                <span>- Jquileen</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- testimonial_area_end -->

    <!-- our_courses_start -->
    <!-- <div class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Our Course Speciality</h3>
                        <p>Your domain control panel is designed for ease-of-use and <br>
                            allows for all aspects of your domains.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon">
                            <i class="flaticon-art-and-design"></i>
                        </div>
                        <h3>Premium Quality</h3>
                        <p>
                            Your domain control panel is designed for ease-of-use <br> and <br>
                            allows for all aspects of
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon blue">
                            <i class="flaticon-business-and-finance"></i>
                        </div>
                        <h3>Premium Quality</h3>
                        <p>
                            Your domain control panel is designed for ease-of-use <br> and <br>
                            allows for all aspects of
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon">
                            <i class="flaticon-premium"></i>
                        </div>
                        <h3>Premium Quality</h3>
                        <p>
                            Your domain control panel is designed for ease-of-use <br> and <br>
                            allows for all aspects of
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon gradient">
                            <i class="flaticon-crown"></i>
                        </div>
                        <h3>Premium Quality</h3>
                        <p>
                            Your domain control panel is designed for ease-of-use <br> and <br>
                            allows for all aspects of
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- our_courses_end -->