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
        <div class="row">
          <div class="col-lg">
          <div class="col-md-12 ftco-animate">
            <div class="job-post-item p-4" style="text-align: center;">
              <br>
              <br>
              <table id="example1" class="table table-striped">
                <tbody>
                  <tr>
                    <td>
                      <span class="subadge">
                        <?php if ($topik['id_topik_tes'] == 1) {
                          echo "Tes 1";
                        } elseif ($topik['id_topik_tes'] == 2) {
                          echo "Tes 2";
                        } ?>
                      </span>
                      <h4 class="mr-3 text-black"><?= $topik['nama_topik_tes'] ?></h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="subadge">Durasi</span>
                      <h4 class="mr-3 text-black"><?= $topik['waktu'] ?> menit</h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="subadge">Jawaban Benar</span>
                      <h4 class="mr-3 text-black"><?= $aturan_topik['score_benar'] ?></h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="subadge">Jawaban Salah</span>
                      <h4 class="mr-3 text-black"><?= $aturan_topik['score_salah'] ?></h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="subadge">Jawaban Kosong</span>
                      <h4 class="mr-3 text-black"><?= $aturan_topik['score_kosong'] ?></h4>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="col-md-12 text-center">
                <?php if($topik['id_topik_tes'] == 1){ ?>
                  <a href="<?= base_url('tryout/'); ?>kerjakan_tpa/<?= $user['id']; ?>/<?= $paket['id_paket'] ?>/<?= $event['id_event']; ?>" class="btn btn-success" style="width: 100%; height: 100%;" id="mulai_tes">Kerjakan Tes TPA</a>
                <?php } elseif($topik['id_topik_tes'] == 2){ ?>
                  <a href="<?= base_url('tryout/'); ?>kerjakan_tbi/<?= $user['id']; ?>/<?= $paket['id_paket'] ?>/<?= $event['id_event']; ?>" class="btn btn-success" style="width: 100%; height: 100%;" id="mulai_tes">Kerjakan Tes TBI</a>
                <?php } ?>
              </div>
            </div>
          </div><!-- end -->
          </div>
        </div>
      </div>
    </section>