        <!-- bradcam_area_start -->
        <div class="bradcam_area breadcam_bg">
            <h3>Daftar Event</h3>
        </div>
        <!-- bradcam_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses plus_padding">
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <?php foreach($event as $load_event){ ?>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single_courses">
                                        <div class="courses_info text-center">
                                            <span><?= $paketID['nama_paket'] ?></span>
                                            <h3><a href="#"><?= $load_event['nama_event'] ?></a></h3>
                                            <div class="star_prise d-flex justify-content-between">
                                                <?php $jmlh_materi = $paketID['tpa']+$paketID['tbi']+$paketID['twk']+$paketID['tiu']+$paketID['tkp']+$paketID['tsa'] ?>
                                                <div class="star">
                                                    <i class="fas fa-book-open"></i>
                                                    <span><?= $jmlh_materi ?> Materi Uji</span>
                                                </div>
                                                <div class="prise">
                                                    <span class="active_prise">
                                                        Rp<?= $paketID['harga_paket'] ?>
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