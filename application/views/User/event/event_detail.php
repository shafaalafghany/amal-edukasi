    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <h3><?= $event['nama_event'] ?></h3>
    </div>
    <!-- bradcam_area_end -->

    <div class="courses_details_info">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="single_courses">
                        <h3>Deskripsi</h3>
                        <p><?= $event['deskripsi'] ?></p>
                        <!-- <h3 class="second_title">Garis Besar Video</h3> -->
                    </div>
                    <br>
                    <br>
                    <div class="single_courses">
                        <h4>Harga Event</h4>
                        <h5 style="margin-left: 3%">Rp <?= $paketID['harga_paket'] ?></h5>
                        <!-- <h3 class="second_title">Garis Besar Video</h3> -->
                    </div>
                    <br>
                    <div class="single_courses">
                        <h4>Waktu Pengerjaan</h4>
                        <?php if($paketID['tpa'] == 1){
                            $tpa = $this->db->get_where('topik_tes', ['id_topik_tes' => 1])->row_array(); ?>
                            <h6 style="margin-left: 3%"><?= $tpa['nama_topik_tes'] ?></h6>
                            <h5 style="margin-left: 5%"><?= $tpa['waktu'] ?> Menit</h5>
                        <?php } ?>
                        <?php if($paketID['tbi'] == 1){
                            $tbi = $this->db->get_where('topik_tes', ['id_topik_tes' => 2])->row_array(); ?>
                            <h6 style="margin-left: 3%"><?= $tbi['nama_topik_tes'] ?></h6>
                            <h5 style="margin-left: 5%"><?= $tbi['waktu'] ?> Menit</h5>
                        <?php } ?>
                        <?php 
                            $tkp = $this->db->get_where('topik_tes', ['id_topik_tes' => 6])->row_array();
                            $twk = $this->db->get_where('topik_tes', ['id_topik_tes' => 3])->row_array();
                            $tiu = $this->db->get_where('topik_tes', ['id_topik_tes' => 4])->row_array();
                            $skd = $this->db->get_where('kel_skd', ['id_skd' => 3])->row_array();
                        ?>
                        <?php if($paketID['twk'] == 1){
                                if($paketID['tiu'] == 1){
                                    if($paketID['tkp'] == 1){ ?>
                                        <h6 style="margin-left: 3%"><?= $skd['nama_skd'] ?></h6>
                                        <h5 style="margin-left: 5%"><?= $skd['waktu'] ?> Menit</h5>
                                    <?php } else { ?>
                                        <h6 style="margin-left: 3%"><?= $twk['nama_topik_tes'] ?></h6>
                                        <h5 style="margin-left: 5%"><?= $twk['waktu'] ?> Menit</h5>
                                        <h6 style="margin-left: 3%"><?= $tiu['nama_topik_tes'] ?></h6>
                                        <h5 style="margin-left: 5%"><?= $tiu['waktu'] ?> Menit</h5>
                                    <?php }
                                } else{
                                    if($paketID['tkp'] == 1){ ?>
                                        <h6 style="margin-left: 3%"><?= $twk['nama_topik_tes'] ?></h6>
                                        <h5 style="margin-left: 5%"><?= $twk['waktu'] ?> Menit</h5>
                                        <h6 style="margin-left: 3%"><?= $tkp['nama_topik_tes'] ?></h6>
                                        <h5 style="margin-left: 5%"><?= $tkp['waktu'] ?> Menit</h5>
                                    <?php } else { ?>
                                        <h6 style="margin-left: 3%"><?= $twk['nama_topik_tes'] ?></h6>
                                        <h5 style="margin-left: 5%"><?= $twk['waktu'] ?> Menit</h5>
                                    <?php }
                                } ?>
                        <?php } else {
                                if($paketID['tiu'] == 1) {
                                    if($paketID['tkp'] == 1){ ?>
                                        <h6 style="margin-left: 3%"><?= $tiu['nama_topik_tes'] ?></h6>
                                        <h5 style="margin-left: 5%"><?= $tiu['waktu'] ?> Menit</h5>
                                        <h6 style="margin-left: 3%"><?= $tkp['nama_topik_tes'] ?></h6>
                                        <h5 style="margin-left: 5%"><?= $tkp['waktu'] ?> Menit</h5>
                                    <?php } else { ?>
                                        <h6 style="margin-left: 3%"><?= $tiu['nama_topik_tes'] ?></h6>
                                        <h5 style="margin-left: 5%"><?= $tiu['waktu'] ?> Menit</h5>
                                    <?php }
                                } else {
                                    if($paketID['tkp'] == 1){ ?>
                                        <h6 style="margin-left: 3%"><?= $tkp['nama_topik_tes'] ?></h6>
                                        <h5 style="margin-left: 5%"><?= $tkp['waktu'] ?> Menit</h5>
                                    <?php }
                                } ?>
                        <?php } ?>
                        <?php if($paketID['tsa'] == 1) {
                            $tsa = $this->db->get_where('topik_tes', ['id_topik_tes' => 6])->row_array(); ?>
                            <h6 style="margin-left: 3%"><?= $tsa['nama_topik_tes'] ?></h6>
                            <h5 style="margin-left: 5%"><?= $tsa['waktu'] ?> Menit</h5>
                        <?php } ?>
                    </div>
                    <br>
                    <div class="single_courses">
                        <h4>Tanggal Dimulai</h4>
                        <h5 style="margin-left: 3%"><?= $event['tgl_mulai'] ?></h5>
                        <!-- <h3 class="second_title">Garis Besar Video</h3> -->
                    </div>
                    <br>
                    <div class="single_courses">
                        <h4>Tanggal Berakhir</h4>
                        <h5 style="margin-left: 3%"><?= $event['tgl_akhir'] ?></h5>
                        <!-- <h3 class="second_title">Garis Besar Video</h3> -->
                    </div>
                    <br>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <a href="#" class="genric-btn info circle arrow">Ikuti Event</a>
                </div>
            </div>
        </div>
    </div>