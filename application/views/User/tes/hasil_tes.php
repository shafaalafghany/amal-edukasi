<!-- END nav -->
    <div class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('assets/user/img/'); ?>banner/bradcam.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
            <br>
            <br>
            <br>
            <h1 class="mb-3 bread" style="color: white"><?= $topik['nama_topik_tes']; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light" id="deskripsiTPA">
      <div class="container">
        <br>
        <br>
        <br>
        <div class="row">
          <div class="col-lg">
          <div class="col-md-12 ftco-animate">
            <div class="job-post-item p-4" style="text-align: center;">
              <table id="example1" class="table table-striped">
                <tbody>
                  <tr>
                    <td>
                      <span class="subadge">Hasil Tes</span>
                      <h4 class="mr-3 text-black"><?= $topik['nama_topik_tes'] ?></h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="subadge">Skor Maksimal</span>
                      <h4 class="mr-3 text-black"><?= $topik['maks_score'] ?></h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="subadge">Passing Grade</span>
                      <h4 class="mr-3 text-black"><?= $topik['ambang_score'] ?></h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="subadge">Score Anda</span>
                      <h4 class="mr-3 text-black"><?= $hasil['hasil'] ?></h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="subadge">Status</span>
                      <h4 class="mr-3 text-black">
                        <?php if ($hasil['hasil'] < $topik['ambang_score']) {
                          echo "TIDAK LULUS";
                        } else {
                          echo "LULUS";
                        }?>
                      </h4>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="col-md-12 text-center">

                <?php if ($topik['id_topik_tes'] == 1) { ?>
                  <?php if($paket['tbi'] == 1){ ?>
                    <a href="<?= base_url('tryout/'); ?>tes_tbi/<?= $user['id'] ?>/<?= $paket['id_paket'] ?>/<?= $event['id_event']; ?>" class="btn btn-success" style="width: 100%; height: 100%;" id="mulai_tes">Lanjutkan Ke Tes TBI</a>
                  <?php } else { ?>
                    <?php if($paket['twk'] == 1 && $paket['tiu'] == 1 && $paket['tkp'] == 1){ ?>
                      <a href="<?= base_url('tryout/'); ?>tes_skd/<?= $user['id'] ?>/<?= $paket['id_paket'] ?>/<?= $event['id_event']; ?>" class="btn btn-success" style="width: 100%; height: 100%;" id="mulai_tes">Lanjutkan Ke Tes SKD</a>
                    <?php } else { ?>
                      <?php if($paket['tsa'] == 1){ ?>
                        <a href="<?= base_url('tryout/'); ?>tes_tsa/<?= $user['id'] ?>/<?= $paket['id_paket'] ?>/<?= $event['id_event']; ?>" class="btn btn-success" style="width: 100%; height: 100%;" id="mulai_tes">Lanjutkan Ke Tes TSA</a>
                      <?php } ?>  
                    <?php } ?>
                  <?php } ?>
                <?php } elseif ($topik['id_topik_tes'] == 2){ ?>
                  <?php if($paket['twk'] == 1 && $paket['tiu'] == 1 && $paket['tkp'] == 1){ ?>
                    <a href="<?= base_url('tryout/'); ?>tes_skd/<?= $user['id'] ?>/<?= $paket['id_paket'] ?>/<?= $event['id_event']; ?>" class="btn btn-success" style="width: 100%; height: 100%;" id="mulai_tes">Lanjutkan Ke Tes SKD</a>
                  <?php } else { ?>
                    <?php if($paket['tsa'] == 1){ ?>
                      <a href="<?= base_url('tryout/'); ?>tes_tsa/<?= $user['id'] ?>/<?= $paket['id_paket'] ?>/<?= $event['id_event']; ?>" class="btn btn-success" style="width: 100%; height: 100%;" id="mulai_tes">Lanjutkan Ke Tes TSA</a>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div><!-- end -->
          </div>
        </div>
      </div>
    </section>