    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <h3>Leaderboard</h3>
    </div>
    <!-- bradcam_area_end -->

    <?php
        $cekTglMulai = $this->db->select('tgl_mulai')->get_where('event', ['id_event' => $event['id_event']])->row()->tgl_mulai;
        $cekTglAkhir = $this->db->select('tgl_akhir')->get_where('event', ['id_event' => $event['id_event']])->row()->tgl_akhir;
        $waktu = date("Y-m-d");
    ?>
    <?php if ($waktu >= $cekTglMulai && $waktu < $cekTglAkhir) : ?>
      <section class="ftco-section">
        <div class="container">
          <div class="row">
            <div class="col-lg">
                <br>
                <br>
                <br>
                <div class="ftco-animate">
                  <div class="job-post-item bg-white p-4 d-block align-items-center">
                    <div class=" mb-4 mb-md-0">
                      <div class="job-post-item-header text-center">
                        <h2 class="mr-3 text-black">Hasil Tes Anda</h2>
                        <br>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex align-items-center">
                        <table class="table table-borderless align-items-center text-center">
                          <thead>
                            <tr>
                              <th scope="col">Topik</th>
                              <th scope="col">Nilai</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if($paket_id['tpa'] == 1){ ?>
                              <tr>
                                <td scope="row">TPA</td>
                                <td><?= $hasilUser['nilai_tpa']; ?></td>
                                <td><?php if ($hasilUser['nilai_tpa'] >= 67) {
                                      echo "LULUS";
                                    } else {
                                      echo "TIDAK LULUS";
                                    } ?></td>
                              </tr>
                            <?php } ?>
                            <?php if($paket_id['tbi'] == 1){ ?>
                              <tr>
                                <td scope="row">TBI</td>
                                <td><?= $hasilUser['nilai_tbi']; ?></td>
                                <td><?php if ($hasilUser['nilai_tbi'] >= 30) {
                                      echo "LULUS";
                                    } else {
                                      echo "TIDAK LULUS";
                                    } ?></td>
                              </tr>
                            <?php } ?>
                            <?php if($paket_id['twk'] == 1 && $paket_id['tiu'] == 1 && $paket_id['tkp'] == 1){ ?>
                              <tr>
                                <td scope="row">SKD</td>
                                <td><?= $hasilUser['nilai_skd']; ?></td>
                                <td><?php if ($hasilUser['nilai_skd'] >= 271 && $hasilUser['nilai_twk'] >= 65 && $hasilUser['nilai_tiu'] >= 80 && $hasilUser['nilai_tkp'] >= 126) {
                                      echo "LULUS";
                                    } else {
                                      echo "TIDAK LULUS";
                                    } ?></td>
                              </tr>
                            <?php } ?>
                            <!-- <tr>
                                <td scope="row">TWK</td>
                                <td><?= $hasilUser['nilai_twk']; ?></td>
                                <td><?php if ($hasilUser['nilai_twk'] >= 65) {
                                      echo "LULUS";
                                    } else {
                                      echo "TIDAK LULUS";
                                    } ?></td>
                              </tr>
                              <tr>
                                <td scope="row">TIU</td>
                                <td><?= $hasilUser['nilai_tiu']; ?></td>
                                <td><?php if ($hasilUser['nilai_tiu'] >= 80) {
                                      echo "LULUS";
                                    } else {
                                      echo "TIDAK LULUS";
                                    } ?></td>
                              </tr>
                              <tr>
                                <td scope="row">TKP</td>
                                <td><?= $hasilUser['nilai_tkp']; ?></td>
                                <td><?php if ($hasilUser['nilai_tkp'] >= 126) {
                                      echo "LULUS";
                                    } else {
                                      echo "TIDAK LULUS";
                                    } ?></td>
                              </tr> -->
                          </tbody>
                        </table>
                      </div>
                      <div class="text-center">
                        <h4 class="alert alert-info">Nilai Total: <?= $hasilUser['nilai_total']; ?></h4>
                        <br>
                      </div>
                      <?php if ($event['pembahasan'] == null) { ?>
                        <div class="text-center">
                          <h6>Ingin tau pembahasan tryout? Tunggu sebentar ya</h6>
                        </div>
                      <?php } else { ?>
                        <div class="text-center">
                          <h6>Pembahasan sudah bisa dilihat didepan!</h6>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </section><!-- end -->
    <?php endif; ?>

    <br>
    <br>
              
    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg">
              <div class="ftco-animate">
                <div class="job-post-item bg-white p-4 d-block">
                  <div class=" mb-4 mb-md-0">
                    <div class="job-post-item-header text-center">
                      <h2 class="mr-3 text-black">Leaderboard</h2>
                      <br>
                      <div class="text-left mb-3">
                        <h6>Keterangan : </h6>
                        <div class="d-md-flex">
                          <div class="table-success mr-3" style="height: 30px; width: 30px;"></div>
                          <p> : Lulus</p>
                        </div>
                        <div class="d-md-flex">
                          <div class="table-danger mr-3" style="height: 30px; width: 30px;"></div>
                          <p> : Tidak Lulus</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-post-item-body align-items-center">
                      <table id="example1" class="table table-bordered leader align-items-center text-center" style="width: 100%;">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <?php if($paket_id['tpa'] == 1){ ?>
                              <th scope="col">Nilai TPA</th>
                            <?php } ?>
                            <?php if($paket_id['tbi'] == 1){ ?>
                              <th scope="col">Nilai TBI</th>
                            <?php } ?>
                            <?php if($paket_id['twk'] == 1 && $paket_id['tiu'] == 1 && $paket_id['tkp'] == 1){ ?>
                              <th scope="col">Nilai SKD</th>
                              <th id="twk" scope="col">Nilai TWK</th>
                              <th id="tiu" scope="col">Nilai TIU</th>
                              <th id="tkp" scope="col">Nilai TKP</th>
                            <?php } ?>
                            <?php if($paket_id['tsa'] == 1){ ?>
                              <th scope="col">Nilai TSA</th>
                            <?php } ?>
                            <th scope="col">Nilai Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          foreach ($leader as $loadLeader) { ?>
                            <?php
                            $id_leader = $loadLeader['id_leaderboard'];
                            $nama = $this->db->query("SELECT u.name from user u join leaderboard l on u.id = l.id_user where l.id_leaderboard = $id_leader")->row()->name; ?>
                            <?php
                            $class = '';
                            if ($loadLeader['status'] == "LULUS") {
                              $class = 'class="table-success"';
                            } else {
                              $class = 'class="table-danger"';
                            } ?>
                            <tr <?= $class; ?>>
                              <td scope="row"><?= $i; ?></td>
                              <td><?= $nama; ?></td>
                              <?php if($paket_id['tpa'] == 1){ ?>
                                <td><?= $loadLeader['nilai_tpa']; ?></td>
                              <?php } ?>
                              <?php if($paket_id['tbi'] == 1){ ?>
                                <td><?= $loadLeader['nilai_tbi']; ?></td>
                              <?php } ?>
                              <?php if($paket_id['twk'] == 1 && $paket_id['tiu'] == 1 && $paket_id['tkp'] == 1){ ?>
                                <td><?= $loadLeader['nilai_skd']; ?></td>
                                <td id="twk"><?= $loadLeader['nilai_twk']; ?></td>
                                <td id="tiu"><?= $loadLeader['nilai_tiu']; ?></td>
                                <td id="tkp"><?= $loadLeader['nilai_tkp']; ?></td>
                              <?php } ?>
                              <?php if($paket_id['tsa'] == 1){ ?>
                                <td><?= $loadLeader['nilai_tsa']; ?></td>
                              <?php } ?>
                              <td><?= $loadLeader['nilai_total']; ?></td>
                            </tr>
                          <?php $i++;
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <br>
    <br>
    <br>
    <br>