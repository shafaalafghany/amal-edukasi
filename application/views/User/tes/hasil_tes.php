<!-- END nav -->
<div class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('assets/User/'); ?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
            <p class="breadcrumbs mb-0"><span class="mr-3">Home <i class="ion-ios-arrow-forward"></i></span><span class="mr-3">Try Out <i class="ion-ios-arrow-forward"></i></span> <span>Event</span></p>
            <h1 class="mb-3 bread">Hasil Tes</h1>
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
                    <a href="<?= base_url('User/'); ?>tes_tbi/<?= $user['id'] ?>/<?= $event['id_event']; ?>" class="btn btn-success" style="width: 100%; height: 100%;" id="mulai_tes">Lanjutkan Ke Tes TBI</a>
                <?php } elseif ($topik['id_topik_tes'] == 2){ ?>
                    <a href="<?= base_url('User/'); ?>tes_skd/<?= $user['id'] ?>/<?= $event['id_event']; ?>" class="btn btn-success" style="width: 100%; height: 100%;" id="mulai_tes">Lanjutkan Ke Tes SKD</a>
                <?php } ?>
              </div>
            </div>
          </div><!-- end -->
          </div>
        </div>
      </div>
    </section>