<?php
$telah_berlalu = time() - $transaksi['waktu_daftar'];

$temp_waktu = ($topik['waktu'] * 60) - $telah_berlalu; //dijadikan detik dan dikurangi waktu yang berlalu
$temp_menit = (int)($temp_waktu / 60);               //dijadikan menit lagi
$temp_detik = $temp_waktu % 60;                       //sisa bagi untuk detik

if ($temp_menit < 60) {
    /* Apabila $temp_menit yang kurang dari 60 meni */
    $jam    = 0;
    $menit  = $temp_menit;
    $detik  = $temp_detik;
} else {
    /* Apabila $temp_menit lebih dari 60 menit */
    $jam    = (int)($temp_menit / 60);    //$temp_menit dijadikan jam dengan dibagi 60 dan dibulatkan menjadi integer 
    $menit  = $temp_menit % 60;           //$temp_menit diambil sisa bagi ($temp_menit%60) untuk menjadi menit
    $detik  = $temp_detik;
}
?>

    <style>
      .mySlides {display:none;}
    </style>

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

    <section class="ftco-section bg-light" id="tes">
        <div class="container">
          <br>
          <br>
          <br>
          <h4 class="text-center" id="timer"></h4>
            <div class="row">
                <div class="col-lg-8 pr-lg-4">
                    <div class="row ftco-animate">
                        <div class="col-md-12">

                          <?php 
                            $i = 1;
                            foreach ($soal as $loadSoal) { ?>
                            <div class="card mySlides" id="slide<?= $i; ?>" name="slide<?= $i; ?>">
                              <div class="card-header">
                                <h5>Soal No: <button type="button" class="btn btn-primary ml-2" style="width: 45px; height: 45px;"><?= $i ?></button></h5>
                              </div>
                              <div class="card-body">
                                <form class="questionForm" id="q1" data-question="1">
                                    <h4><?= $loadSoal['soal'] ?></h4>
                                    <br>
                                    <?php $jawaban = $this->db->get_where('jawaban', ['id_soal' => $loadSoal['id_soal']])->result_array(); ?>
                                    <?php
                                      foreach ($jawaban as $jwb) : ?>
                                        <?php
                                          $query = $this->db->get_where('event_jawaban', [
                                            'id_user' => $user['id'],
                                            'id_topik' => $loadSoal['id_topik_tes'],
                                            'id_event' => $event['id_event'],
                                            'id_soal' => $loadSoal['id_soal'],
                                            'id_jawaban' => $jwb['id_jawaban']
                                          ]);
                                          $checked = $query->row_array();

                                          if ($checked > 0) {
                                              $checked = 'checked="checked"';
                                          } else {
                                              $checked = '';
                                          }
                                        ?>
                                        <label class="btn btn-default d-flex">
                                          <input onchange="klikJwbn(<?= $i; ?>)" id="jwbnSoal<?= $i; ?>" name="jwbnSoal<?= $i; ?>" 
                                          class="jawab mr-2" data-eve="<?= $event['id_event']; ?>" data-soal="<?= $loadSoal['id_soal']; ?>" 
                                          data-idp="<?= $user['id']; ?>" data-jawaban="<?= $jwb['id_jawaban']; ?>" 
                                          data-topik="<?= $loadSoal['id_topik_tes']; ?>" type="radio" value="<?= $jwb['id_jawaban']; ?>" 
                                          <?= $checked; ?>> <?= $jwb['jawaban']; ?>
                                        </label>
                                        <br>
                                    <?php endforeach; ?>
                                </form>
                              </div>
                              <div class="card-footer text-muted">
                                <button style="margin-right: 80px; margin-bottom: 7px;" class="btn btn-info col-md-3 prev float-left" id="prev<?= $i; ?>" name="prev<?= $i; ?>" onclick="prevSoal(<?= $i; ?>)"><i class="fas fa-chevron-left"></i> Soal Sebelumnya</button>
                                <?php $jawaban = $this->db->get_where('jawaban', ['id_soal' => $loadSoal['id_soal']])->result_array(); ?>
                                    <?php
                                      foreach ($jawaban as $jwb) : ?>
                                        <?php
                                          $query = $this->db->get_where('event_jawaban', [
                                            'id_user' => $user['id'],
                                            'id_topik' => $loadSoal['id_topik_tes'],
                                            'id_event' => $event['id_event'],
                                            'id_soal' => $loadSoal['id_soal']
                                          ]);
                                          $checked = $query->row_array();

                                          if ($checked > 0) {
                                            $query = $this->db->select('btn_ragu')->get_where('event_jawaban', [
                                              'id_user' => $user['id'],
                                              'id_topik' => $loadSoal['id_topik_tes'],
                                              'id_event' => $event['id_event'],
                                              'id_soal' => $loadSoal['id_soal']
                                            ]);
                                            $check = $query->row()->btn_ragu;
                                            if ($check == 1) {
                                              $cek = 'checked="checked"';
                                              $ragu = 0;
                                            } elseif ($check == 0) {
                                              $cek = '';
                                              $ragu = 1;
                                            }
                                          } else{
                                            $ragu = 1;
                                            $cek = '';
                                          }
                                       endforeach; ?>
                                <label class="btn btn-warning text-white col-md-3"><input class="btnRagu" type="checkbox" id="btn-ragu-<?= $i; ?>" name="btn-ragu-<?= $i; ?>" data-ragu="<?= $ragu; ?>" data-eve="<?= $event['id_event']; ?>" data-soal="<?= $loadSoal['id_soal']; ?>" data-nomor="<?= $i; ?>" data-idp="<?= $user['id']; ?>" data-topik="<?= $loadSoal['id_topik_tes']; ?>" <?= $cek; ?>> Ragu-Ragu</label>
                                <button class="btn btn-primary col-md-3 ml-5 next float-right" id="next<?= $i; ?>" name="next<?= $i; ?>" onclick="nextSoal(<?= $i; ?>)">Soal Selanjutnya <i class="fas fa-chevron-right"></i></button>
                              </div>
                            </div>
                          <?php $i++; } ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar">
                  <div class="sidebar-box bg-white p-4 ftco-animate">
                    <h4 class="heading-sidebar mb-4">Daftar Soal</h4>
                    <form>
                      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                        <?php if (count($soal) == 45) { ?>
                          <div class="carousel-inner" style="margin-left: 32px;">
                            <div class="carousel-item list1 active">
                              <?php $i=1;
                                foreach ($soal1 as $loadSoal1) {
                                  $query = $this->db->get_where('event_jawaban', [
                                    'id_user' => $user['id'],
                                    'id_topik' => $loadSoal1['id_topik_tes'],
                                    'id_event' => $event['id_event'],
                                    'id_soal' => $loadSoal1['id_soal']
                                  ]);
                                  $cek = $query->row_array();

                                  if ($cek > 0) {
                                    $query = $this->db->select('btn_ragu')->get_where('event_jawaban', [
                                      'id_user' => $user['id'],
                                      'id_topik' => $loadSoal1['id_topik_tes'],
                                      'id_event' => $event['id_event'],
                                      'id_soal' => $loadSoal1['id_soal']
                                    ]);
                                    $check = $query->row()->btn_ragu;
                                    if ($check == 1) {
                                      $cek = 'btn-warning';
                                    } elseif ($check == 0) {
                                      $query = $this->db->select('id_jawaban')->get_where('event_jawaban', [
                                        'id_user' => $user['id'],
                                        'id_topik' => $loadSoal1['id_topik_tes'],
                                        'id_event' => $event['id_event'],
                                        'id_soal' => $loadSoal1['id_soal']
                                      ]);
                                      $cekJwbn = $query->row()->id_jawaban;
                                      if ($cekJwbn > 0) {
                                        $cek = 'btn-success';
                                      } else{
                                        $cek = 'btn-outline-primary';
                                      }
                                    }
                                  } else {
                                    $cek = 'btn-outline-primary';
                                  }
                                ?>
                                <button type="button" class="btn <?= $cek; ?> mr-4 mb-3 daftar-soal" id="nomor<?= $i; ?>" name="nomor<?= $i; ?>" style="width: 40px; height: 40px;" onclick="klikNomor(<?= $i; ?>)"><?= $i; ?></button>
                              <?php $i++; } ?>
                            </div>
                            <div class="carousel-item list2">
                              <?php $i=21;
                                foreach ($soal2 as $loadSoal2) {
                                  $query = $this->db->get_where('event_jawaban', [
                                    'id_user' => $user['id'],
                                    'id_topik' => $loadSoal2['id_topik_tes'],
                                    'id_event' => $event['id_event'],
                                    'id_soal' => $loadSoal2['id_soal']
                                  ]);
                                  $cek = $query->row_array();

                                  if ($cek > 0) {
                                    $query = $this->db->select('btn_ragu')->get_where('event_jawaban', [
                                      'id_user' => $user['id'],
                                      'id_topik' => $loadSoal2['id_topik_tes'],
                                      'id_event' => $event['id_event'],
                                      'id_soal' => $loadSoal2['id_soal']
                                    ]);
                                    $check = $query->row()->btn_ragu;
                                    if ($check == 1) {
                                      $cek = 'btn-warning';
                                    } elseif ($check == 0) {
                                      $query = $this->db->select('id_jawaban')->get_where('event_jawaban', [
                                        'id_user' => $user['id'],
                                        'id_topik' => $loadSoal2['id_topik_tes'],
                                        'id_event' => $event['id_event'],
                                        'id_soal' => $loadSoal2['id_soal']
                                      ]);
                                      $cekJwbn = $query->row()->id_jawaban;
                                      if ($cekJwbn > 0) {
                                        $cek = 'btn-success';
                                      } else{
                                        $cek = 'btn-outline-primary';
                                      }
                                    }
                                  } else {
                                    $cek = 'btn-outline-primary';
                                  }
                                ?>
                                <button type="button" class="btn <?= $cek; ?> mr-4 mb-3 daftar-soal" id="nomor<?= $i; ?>" name="nomor<?= $i; ?>" style="width: 40px; height: 40px;" onclick="klikNomor(<?= $i; ?>)"><?= $i; ?></button>
                              <?php $i++; } ?>
                            </div>
                            <div class="carousel-item list3">
                              <?php $i=41;
                                foreach ($soal3 as $loadSoal3) {
                                  $query = $this->db->get_where('event_jawaban', [
                                    'id_user' => $user['id'],
                                    'id_topik' => $loadSoal3['id_topik_tes'],
                                    'id_event' => $event['id_event'],
                                    'id_soal' => $loadSoal3['id_soal']
                                  ]);
                                  $cek = $query->row_array();

                                  if ($cek > 0) {
                                    $query = $this->db->select('btn_ragu')->get_where('event_jawaban', [
                                      'id_user' => $user['id'],
                                      'id_topik' => $loadSoal3['id_topik_tes'],
                                      'id_event' => $event['id_event'],
                                      'id_soal' => $loadSoal3['id_soal']
                                    ]);
                                    $check = $query->row()->btn_ragu;
                                    if ($check == 1) {
                                      $cek = 'btn-warning';
                                    } elseif ($check == 0) {
                                      $query = $this->db->select('id_jawaban')->get_where('event_jawaban', [
                                        'id_user' => $user['id'],
                                        'id_topik' => $loadSoal3['id_topik_tes'],
                                        'id_event' => $event['id_event'],
                                        'id_soal' => $loadSoal3['id_soal']
                                      ]);
                                      $cekJwbn = $query->row()->id_jawaban;
                                      if ($cekJwbn > 0) {
                                        $cek = 'btn-success';
                                      } else{
                                        $cek = 'btn-outline-primary';
                                      }
                                    }
                                  } else {
                                    $cek = 'btn-outline-primary';
                                  }
                                ?>
                                <button type="button" class="btn <?= $cek; ?> mr-4 mb-3 daftar-soal" id="nomor<?= $i; ?>" name="nomor<?= $i; ?>" style="width: 40px; height: 40px;" onclick="klikNomor(<?= $i; ?>)"><?= $i; ?></button>
                              <?php $i++; } ?>
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="margin-left: -30px; color: black; width: 50px;">
                            <span class="fas fa-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="margin-right: -30px; color: black; width: 50px;">
                            <span class="fas fa-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        <?php } elseif (count($soal) == 20) { ?>
                          <div class="carousel-inner" style="margin-left: 32px;">
                            <div class="carousel-item active">
                              <?php $i=1;
                                foreach ($soal1 as $loadSoal1) {
                                  $query = $this->db->get_where('event_jawaban', [
                                    'id_user' => $user['id'],
                                    'id_topik' => $loadSoal1['id_topik_tes'],
                                    'id_event' => $event['id_event'],
                                    'id_soal' => $loadSoal1['id_soal']
                                  ]);
                                  $cek = $query->row_array();

                                  if ($cek > 0) {
                                    $query = $this->db->select('btn_ragu')->get_where('event_jawaban', [
                                      'id_user' => $user['id'],
                                      'id_topik' => $loadSoal1['id_topik_tes'],
                                      'id_event' => $event['id_event'],
                                      'id_soal' => $loadSoal1['id_soal']
                                    ]);
                                    $check = $query->row()->btn_ragu;
                                    if ($check == 1) {
                                      $cek = 'btn-warning';
                                    } elseif ($check == 0) {
                                      $query = $this->db->select('id_jawaban')->get_where('event_jawaban', [
                                        'id_user' => $user['id'],
                                        'id_topik' => $loadSoal1['id_topik_tes'],
                                        'id_event' => $event['id_event'],
                                        'id_soal' => $loadSoal1['id_soal']
                                      ]);
                                      $cekJwbn = $query->row()->id_jawaban;
                                      if ($cekJwbn > 0) {
                                        $cek = 'btn-success';
                                      } else{
                                        $cek = 'btn-outline-primary';
                                      }
                                    }
                                  } else {
                                    $cek = 'btn-outline-primary';
                                  }
                                ?>
                                <button type="button" class="btn <?= $cek; ?> mr-4 mb-3 daftar-soal" id="nomor<?= $i; ?>" name="nomor<?= $i; ?>" style="width: 40px; height: 40px;" onclick="klikNomor(<?= $i; ?>)"><?= $i; ?></button>
                              <?php $i++; } ?>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </form>
                    <hr>
                    <a href="<?= base_url('tryout/koreksi/'); ?><?= $user['id']; ?>/<?= $event['id_event']; ?>/<?= $topik['id_topik_tes'] ?>" class="btn btn-success col-md-12 selesai">Submit Jawaban</a>
                  </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/user/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/user/'); ?>js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?= base_url('assets/user/'); ?>js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url('assets/user/'); ?>js/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets/user/'); ?>js/jquery.stellar.min.js"></script>
    <script src="<?= base_url('assets/user/'); ?>js/jquery.magnific-popup.min.js"></script>

    <script>

    $(document).ready(function() {
          /** Membuat Waktu Mulai Hitung Mundur Dengan 
           * var detik;
           * var menit;
           * var jam;
           */
          var detik = <?= $detik; ?>;
          var menit = <?= $menit; ?>;
          var jam = <?= $jam; ?>;

          /**
           * Membuat function hitung() sebagai Penghitungan Waktu
           */
          function hitung() {
              /** setTimout(hitung, 1000) digunakan untuk 
               * mengulang atau merefresh halaman selama 1000 (1 detik) 
               */
              setTimeout(hitung, 1000);

              /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
              if (menit < 10 && jam == 0) {
                  var peringatan = 'style="color:red"';
              };

              /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
              $('#timer').html(
                  '<span' + peringatan + '><i class="fas fa-timer border-primary" data-bs-hover-animate="swing"></i>' + jam + ' : ' + menit + ' : ' + detik + '<span>'
              );

              /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
              detik--;

              /** Jika var detik < 0
               * var detik akan dikembalikan ke 59
               * Menit akan Berkurang 1
               */
              if (detik < 0) {
                  detik = 59;
                  menit--;

                  /** Jika menit < 0
                   * Maka menit akan dikembali ke 59
                   * Jam akan Berkurang 1
                   */
                  if (menit < 0) {
                      menit = 59;
                      jam--;

                      /** Jika var jam < 0
                       * clearInterval() Memberhentikan Interval dan submit secara otomatis
                       */

                      if (jam < 0) {
                          clearInterval(hitung);
                          /** Variable yang digunakan untuk submit secara otomatis di Form */
                          var frmSelesai = $(".selesai").attr('href');
                          Swal.fire({
                            title: 'Waktu Habis!',
                            text: "Waktu pengerjaan soal sudah habis!!",
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false
                          }).then((result) => {
                              document.location.href = frmSelesai;
                          })
                      }
                  }
              }
          }
          /** Menjalankan Function Hitung Waktu Mundur */
          hitung();
      });

      var x = $('.mySlides');
      var maxIndex = x.length;
      var slideIndex = 1;
      showMaxDivs(maxIndex);
      showDivs(slideIndex);

      function showMaxDivs(n) {
        var i;
        var x = $('.mySlides');
        var next = $('.next');
        var prev = $('.prev');
        var ragu = $('.ragu');
        var nomor = $('.nomor');

        if (n == x.length) {
          next[maxIndex - 1].style.display = "none";
          $('#nomor'+n).removeClass('active');
        }
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        x[maxIndex-1].style.display = "block";
      }

      function showDivs(n) {
        var i;
        var x = $('.mySlides');
        var next = $('.next');
        var prev = $('.prev');
        var ragu = $('.ragu');
        var nomor = $('.nomor');
        var daftarSoal = $('.daftar-soal');

        if (n == x.length) {next[maxIndex - 1].style.display = "none";}
        if (n == 1) {
          prev[slideIndex - 1].style.display = "none";
          $('#nomor'+n).addClass('active');
        }
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
      }

      function prevSoal(n) {
        var i;
        var x = $('.mySlides');

        for (var i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        $('#slide'+(n-1)).show();
        $('#nomor'+(n)).removeClass('active');
        $('#nomor'+(n-1)).addClass('active');
      }

      function nextSoal(n) {
        var i;
        var x = $('.mySlides');
        var prev = $('.prev');
        var next = $('.next');

        if (n == x.length) {
          next.style.display = "none";
        }
        for (var i = 0; i < x.length; i++) {
          x[i].style.display = "none";
          $('#nomor'+i).removeClass('active');
        }
        $('#slide'+(n+1)).show();
        $('#nomor'+(n+1)).addClass('active');
      }

      $('.btnRagu').on('click', function() {
        var soal = $(this).data('soal');
        var idp = $(this).data('idp');
        var eve = $(this).data('eve');
        var topik = $(this).data('topik');
        var nomor = $(this).data('nomor');
        
        if ($(this).is(':checked')) {
          var ragu = 1;
          $('#nomor'+nomor).addClass('btn-warning');
          $('#nomor'+nomor).removeClass('btn-outline-primary');
        } else{
          var ragu = 0;
          $('#nomor'+nomor).removeClass('btn-warning');
          if ($('#nomor'+nomor).hasClass('btn-success')) {
            $('#nomor'+nomor).addClass('btn-success');
          } else{
            $('#nomor'+nomor).addClass('btn-outline-primary');
          }
        }

        $.ajax({
            url: "<?= base_url('tryout/ragu'); ?>",
            data: {
                eve: eve,
                idp: idp,
                soal: soal,
                ragu: ragu,
                topik: topik
            },
            method: 'POST',
            dataType: 'json',
            success: function() {
              
            }
        });
      });

      function klikJwbn(e) {
        $('#nomor'+e).removeClass('btn-outline-primary');
        $('#nomor'+e).addClass('btn-success');
      }

      $('.jawab').on('click', function() {

        var soal = $(this).data('soal');
        var jwb = $(this).data('jawaban');
        var idp = $(this).data('idp');
        var eve = $(this).data('eve');
        var topik = $(this).data('topik');

        $.ajax({
            url: "<?= base_url('tryout/jawab'); ?>",
            data: {
                eve: eve,
                idp: idp,
                soal: soal,
                jwb: jwb,
                topik: topik
            },
            method: 'POST',
            dataType: 'json',
            success: function() {}
        });
      });

      function klikNomor(e) {
        var i;
        var x = $(".mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
          $('#nomor'+maxIndex).removeClass('active');
          $('#nomor'+i).removeClass('active');
        }
        $('#slide'+e).show();
        $('#nomor'+e).addClass('active');
      }
    </script>