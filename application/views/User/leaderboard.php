    <!-- END nav -->
    <div class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('assets/User/'); ?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
            <p class="breadcrumbs mb-0"><span class="mr-3">Home <i class="ion-ios-arrow-forward"></i></span><span class="mr-3">Try Out <i class="ion-ios-arrow-forward"></i></span> <span>Event</span></p>
            <h1 class="mb-3 bread">Leaderboard</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg">
            <div class="row">
              <div class="col-md-12 ftco-animate">
                <div class="job-post-item p-4 align-items-center">
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
                          <tr>
                            <td scope="row">TPA</td>
                            <td><?= $hasilUser['nilai_tpa']; ?></td>
                            <td><?php if ($hasilUser['nilai_tpa'] >= 67) {
                                  echo "LULUS";
                                } else {
                                  echo "TIDAK LULUS";
                                } ?></td>
                          </tr>
                          <tr>
                            <td scope="row">TBI</td>
                            <td><?= $hasilUser['nilai_tbi']; ?></td>
                            <td><?php if ($hasilUser['nilai_tbi'] >= 30) {
                                  echo "LULUS";
                                } else {
                                  echo "TIDAK LULUS";
                                } ?></td>
                          </tr>
                          <tr>
                            <td scope="row">SKD</td>
                            <td><?= $hasilUser['nilai_skd']; ?></td>
                            <td><?php if ($hasilUser['nilai_skd'] >= 271 && $hasilUser['nilai_twk'] >= 65 && $hasilUser['nilai_tiu'] >= 80 && $hasilUser['nilai_tkp'] >= 126) {
                                  echo "LULUS";
                                } else {
                                  echo "TIDAK LULUS";
                                } ?></td>
                          </tr>
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
                    <?php if ($hasilUser['status'] == "TIDAK LULUS") { ?>
                      <div class="text-center">
                        <h6>Maaf kamu tidak lulus dalam tryout ini, tetap semangat terus yaa!!</h6>
                      </div>
                    <?php } else { ?>
                      <?php if (!empty($hasilUser['analisis_jurusan'])) { ?>
                        <div class="text-center">
                          <h6>Kamu Masuk Jurusan Mana?</h6>
                          <a class="btn btn-success float-center col-lg" href="<?= base_url('User/reward_tes/' . $hasilUser['id_leaderboard']); ?>">Lihat Jurusan </a>
                          <br>
                        </div>
                      <?php } else { ?>
                        <div class="text-center">
                          <h6>Penasaran masuk jurusan mana? Silahkan tunggu hasil analisis jurusan kami</h6>
                        </div>
                      <?php } ?>
                    <?php } ?>
                    <?php if ($hasilUser['nilai_psikotes'] == null) { ?>
                      <?php if ($soalPsiko) { ?>
                        <br>
                        <div class="text-center">
                          <h6>Mau Lanjut Psikotes?</h6>
                          <a class="btn btn-success float-center col-lg" href="<?= base_url('User/tes_detail_psiko/' . $user['id'] . '/' . $event['id_event'] . '/6'); ?>">Lanjut Psikotes</a>
                          <br>
                        </div>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div><!-- end -->

              <div class="col-md-12 ftco-animate">
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
                      <table id="example1" class="table table-bordered align-items-center text-center" style="width: 100%;">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nilai TPA</th>
                            <th scope="col">Nilai TBI</th>
                            <th scope="col">Nilai SKD</th>
                            <th id="twk" scope="col">Nilai TWK</th>
                            <th id="tiu" scope="col">Nilai TIU</th>
                            <th id="tkp" scope="col">Nilai TKP</th>
                            <th scope="col">Nilai Total</th>
                            <?php if ($soalPsiko) { ?>
                              <th scope="col">Nilai Psikotes</th>
                            <?php } ?>
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
                              <td><?= $loadLeader['nilai_tpa']; ?></td>
                              <td><?= $loadLeader['nilai_tbi']; ?></td>
                              <td><?= $loadLeader['nilai_skd']; ?></td>
                              <td id="twk"><?= $loadLeader['nilai_twk']; ?></td>
                              <td id="tiu"><?= $loadLeader['nilai_tiu']; ?></td>
                              <td id="tkp"><?= $loadLeader['nilai_tkp']; ?></td>
                              <td><?= $loadLeader['nilai_total']; ?></td>
                              <?php if ($soalPsiko) { ?>
                                <?php if ($loadLeader['nilai_psikotes'] == null) { ?>
                                  <td>Belum Mengerjakan</td>
                                <?php } else { ?>
                                  <td><?= $loadLeader['nilai_psikotes']; ?></td>
                                <?php } ?>
                              <?php } ?>
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
          <div class="job-post-item-body align-items-center">
            <table id="example1" class="table table-bordered align-items-center text-center" style="width: 100%;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nilai TPA</th>
                  <th scope="col">Nilai TBI</th>
                  <th scope="col">Nilai SKD</th>
                  <th id="twk" scope="col">Nilai TWK</th>
                  <th id="tiu" scope="col">Nilai TIU</th>
                  <th id="tkp" scope="col">Nilai TKP</th>
                  <th scope="col">Nilai Total</th>
                  <?php if ($soalPsiko) { ?>
                    <th scope="col">Nilai Psikotes</th>
                  <?php } ?>
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
                    <td><?= $loadLeader['nilai_tpa']; ?></td>
                    <td><?= $loadLeader['nilai_tbi']; ?></td>
                    <td><?= $loadLeader['nilai_skd']; ?></td>
                    <td id="twk"><?= $loadLeader['nilai_twk']; ?></td>
                    <td id="tiu"><?= $loadLeader['nilai_tiu']; ?></td>
                    <td id="tkp"><?= $loadLeader['nilai_tkp']; ?></td>
                    <td><?= $loadLeader['nilai_total']; ?></td>
                    <?php if ($soalPsiko) { ?>
                      <?php if ($loadLeader['nilai_psikotes'] == null) { ?>
                        <td>Belum Mengerjakan</td>
                      <?php } else { ?>
                        <td><?= $loadLeader['nilai_psikotes']; ?></td>
                      <?php } ?>
                    <?php } ?>
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
      </div>
    </section>