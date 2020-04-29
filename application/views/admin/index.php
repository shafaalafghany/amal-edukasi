  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php 
                    $i = 0;
                    foreach ($modul as $loadModul) {
                      $i++;
                    }
                    echo $i; ?>
                </h3>

                <p>Modul Terpublikasi</p>
              </div>
              <div class="icon">
                <i class="fas fa-book-open"></i>
              </div>
              <a href="<?= base_url('admin_modul/') ?>daftar_modul" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php 
                    $i = 0;
                    foreach ($event as $loadEvent) {
                      $i++;
                    }
                    echo $i; ?>
                </h3>

                <p>Event Dibuat</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar"></i>
              </div>
              <a href="<?= base_url('Administrator/') ?>daftar_event" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <?php 
                    $i = 0;
                    foreach ($admin as $loadAdmin) {
                      $i++;
                    }
                    echo $i; ?>
                </h3>

                <p>Administrator</p>
              </div>
              <div class="icon">
                <i class="fas fa-users-cog"></i>
              </div>
              <?php if ($user['role_id'] == 1) { ?>
                <a href="<?= base_url('admin_data') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php 
                    $i = 0;
                    foreach ($allUser as $loadAllUser) {
                      $i++;
                    }
                    echo $i; ?>
                </h3>

                <p>Peserta Aktif</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin_peserta') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <?php if ($user['role_id'] == 1) { ?>
              <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Anda adalah Administrator yang memiliki kuasa untuk mengatur sistem Try Out Amal Edukasi ini, anda dapat menambah modul, menambah admin,
                menambah event, backup database, dan beberapa hal lainnya.
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2 bg-warning">
                <h5><strong>Petunjuk Penggunaan Fitur Administrator</strong></h5>
              </div>
              <div class="card-body">
                <h2 class="card-title">Petunjuk penggunaan sebagai berikut: </h2><br><br>
                <h5 class="card-title">1. Dashboard</h5>
                <p class="card-text">&nbsp; &nbsp; &nbsp;Fitur ini merupakan fitur awal tampilan yang berisi keterangan-keterangan umum.</p>
                <h5 class="card-title">2. Data Modul</h5><br>
                <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Daftar Modul</h6>
                <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Daftar Modul digunakan untuk melihat modul-modul apa saja yang telah dibuat.</p>
                <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Tambah Modul</h6>
                <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tambah Modul digunakan untuk menambahkan modul-modul baru.</p>
                <h5 class="card-title">3. Event</h5><br>
                <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Daftar Event</h6>
                <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Daftar Event digunakan untuk melihat event apa saja yang telah dibuat.</p>
                <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Daftar Soal</h6>
                <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Daftar Soal digunakan untuk melihat soal pada suatu event tertentu yang telah dibuat.</p>
                <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Tambah Event</h6>
                <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tambah Event digunakan untuk membuat event baru.</p>
                <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Tambah Soal</h6>
                <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tambah Soal digunakan untuk membuat soal baru pada suatu event tertentu.</p>
                <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Leaderboard</h6>
                <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Leaderboard digunakan untuk melihat papan leader perolehan score pada suatu event.</p>
                <!-- <?php if ($user['role_id'] == 1) { ?>
                  <h5 class="card-title">4. Data Admin</h5> <br>
                  <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Daftar Admin</h6>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Daftar Admin digunakan untuk melihat siapa saja admin dalam sistem ini.</p>
                  <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Tambah Admin</h6>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tambah Admin digunakan untuk menambah admin baru.</p>
                  <h5 class="card-title">5. Data Peserta</h5><br>
                  <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Daftar Peserta</h6>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Daftar Peserta digunakan untuk melihat siapa saja peserta yang terdaftar dalam sistem ini.</p>
                  <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Testimoni</h6>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Fitur ini digunakan untuk melihat dan menghapus testimoni yang diberikan peserta.</p>
                  <h5 class="card-title">6. Tools</h5><br>
                  <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Back Up Database</h6>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Fitur ini digunakan untuk mem-backup semua database sistem.</p>
                  <h5 class="card-title">7. Profile Saya</h5>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; Fitur ini berisi tentang segala macam data pribadi anda.</p>
                  <h5 class="card-title">8. Log Out</h5>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; Digunakan untuk keluar dari sistem.</p>
                <?php } else { ?>
                  <h5 class="card-title">4. Data Peserta</h5><br>
                  <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Daftar Peserta</h6>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; Daftar Peserta digunakan untuk melihat siapa saja peserta yang terdaftar dalam sistem ini.</p>
                  <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Testimoni</h6>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Fitur ini digunakan untuk melihat dan menghapus testimoni yang diberikan peserta.</p>
                  <h5 class="card-title">5. Tools</h5><br>
                  <h6 class="card-title">&nbsp; &nbsp; &nbsp; - Back Up Database</h6>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Fitur ini digunakan untuk mem-backup semua database sistem.</p>
                  <h5 class="card-title">6. Profile Saya</h5>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; Fitur ini berisi tentang segala macam data pribadi anda.</p>
                  <h5 class="card-title">7. Log Out</h5>
                  <p class="card-text">&nbsp; &nbsp; &nbsp; Digunakan untuk keluar dari sistem.</p>
                <?php } ?> -->
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>