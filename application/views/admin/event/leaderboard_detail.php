<?php if (!empty($user)) { ?>
          <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                  <a href="<?= base_url() ?>Administrator" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Data Modul
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>daftar_modul" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Modul</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>tambah_modul" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tambah Modul</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-calendar-week"></i>
                    <p>
                      Event
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>daftar_event" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Event</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>daftar_soal" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Soal</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>tambah_event" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tambah Event</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>tambah_soal" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Tambah Soal</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>leaderboard" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Leaderboard</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <?php if ($user['role_id'] == 1) { ?>
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-user-shield"></i>
                      <p>
                        Data Admin
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?= base_url('Administrator/') ?>daftar_admin" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Daftar Admin</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?= base_url('Administrator/') ?>tambah_admin" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Tambah Admin</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                <?php } ?>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Data Peserta
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>daftar_peserta" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Peserta</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>testimoni" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Testimoni</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-header">PENGATURAN</li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-wrench"></i>
                    <p>
                      Tools
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>topup" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Setting Top Up</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('Administrator/') ?>backup" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Back Up Database</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-header">AKUN</li>
                <li class="nav-item has-treeview">
                  <a href="<?= base_url() ?>Administrator/profile_admin" class="nav-link">
                    <i class="nav-icon far fa-edit"></i>
                    <p>
                      Profile Saya
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="<?= base_url() ?>User/logout" class="nav-link logout">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                      Log out
                    </p>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
        <!-- /.sidebar -->
      </aside>
   <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Leaderboard</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Leaderboard</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <form>
                <div class="card-body">
                  <?php 
                    $id_leader = $leader['id_leaderboard'];
                    $nama = $this->db->query("SELECT u.name from user u join leaderboard l on u.id = l.id_user where l.id_leaderboard = $id_leader")->row()->name; ?>
                  <div class="form-group">
                    <label for="inputName">Nama Event</label>
                    <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $event['nama_event'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Nama Peserta</label>
                    <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $nama ?>">
                  </div>
                  <?php $transaksi = $this->db->get_where('transaksi_user', [
                    'id_user' => $leader['id_user'],
                    'id_event' => $leader['id_event']
                  ])->row_array(); ?>
                  <?php if ($event['jurusan'] == 1) { ?>
                    <div class="form-group">
                      <label for="inputName">Jurusan 1</label>
                      <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $transaksi['jurusan1'] ?>">
                    </div>
                  <?php } elseif ($event['jurusan'] == 2) { ?>
                    <div class="form-group">
                      <label for="inputName">Jurusan 1</label>
                      <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $transaksi['jurusan1'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputName">Jurusan 2</label>
                      <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $transaksi['jurusan2'] ?>">
                    </div>
                  <?php } else { ?>
                    <div class="form-group">
                      <label for="inputName">Jurusan 1</label>
                      <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $transaksi['jurusan1'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputName">Jurusan 2</label>
                      <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $transaksi['jurusan2'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputName">Jurusan 3</label>
                      <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $transaksi['jurusan3'] ?>">
                    </div>
                  <?php }?>
                  
                  <br>
                  <div class="job-post-item-header text-center">
                      <h2 class="mr-3 text-black">Hasil Tes Peserta</h2>
                      <br>
                  </div>
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
                        <td><?= $leader['nilai_tpa']; ?></td>
                        <td><?php if ($leader['nilai_tpa'] >= 67) {
                          echo "LULUS";
                        } else{
                          echo "TIDAK LULUS";
                        } ?></td>
                      </tr>
                      <tr>
                        <td scope="row">TBI</td>
                        <td><?= $leader['nilai_tbi']; ?></td>
                        <td><?php if ($leader['nilai_tbi'] >= 30) {
                          echo "LULUS";
                        } else{
                          echo "TIDAK LULUS";
                        } ?></td>
                      </tr>
                      <tr>
                        <td scope="row">SKD</td>
                        <td><?= $leader['nilai_skd']; ?></td>
                        <td><?php if ($leader['nilai_skd'] >= 271 && $leader['nilai_twk'] >= 65 && $leader['nilai_tiu'] >= 80 && $leader['nilai_tkp'] >= 126) {
                          echo "LULUS";
                        } else{
                          echo "TIDAK LULUS";
                        } ?></td>
                      </tr>
                      <tr>
                        <td scope="row">TWK</td>
                        <td><?= $leader['nilai_twk']; ?></td>
                        <td><?php if ($leader['nilai_twk'] >= 65) {
                          echo "LULUS";
                        } else{
                          echo "TIDAK LULUS";
                        } ?></td>
                      </tr>
                      <tr>
                        <td scope="row">TIU</td>
                        <td><?= $leader['nilai_tiu']; ?></td>
                        <td><?php if ($leader['nilai_tiu'] >= 80) {
                          echo "LULUS";
                        } else{
                          echo "TIDAK LULUS";
                        } ?></td>
                      </tr>
                      <tr>
                        <td scope="row">TKP</td>
                        <td><?= $leader['nilai_tkp']; ?></td>
                        <td><?php if ($leader['nilai_tkp'] >= 126) {
                          echo "LULUS";
                        } else{
                          echo "TIDAK LULUS";
                        } ?></td>
                      </tr>
                      <?php if ($soalPsiko) { ?>
                        <tr>
                            <td scope="row">Psikotes</td>
                            <?php if ($leader['nilai_psikotes'] == null) { ?>
                                <td>Belum Mengerjakan</td>
                                <td>Belum Mengerjakan</td>
                            <?php } else { ?>
                                <td><?= $leader['nilai_psikotes']; ?></td>
                                <td>Sudah Mengerjakan</td>
                            <?php } ?>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <br>

                  <?php if (!empty($leader['analisis_jurusan'])) { ?>
                    <div class="form-group">
                      <label for="inputName">Analisis Jurusan</label>
                      <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $leader['analisis_jurusan'] ?>">
                    </div>
                  <?php } ?>

                  <div class="col-12">
                    <?php if ($leader['status'] == "LULUS") { ?>
                      <?php if (empty($leader['analisis_jurusan'])) { ?>
                        <a class="btn btn-primary float-right" href="<?= base_url('Administrator/'); ?>analisis_jurusan/<?= $leader['id_leaderboard'] ?>">Tambah Analisis Jurusan</a>
                      <?php } else { ?>
                        <a class="btn btn-primary float-right" href="<?= base_url('Administrator/'); ?>analisis_jurusan/<?= $leader['id_leaderboard'] ?>">Ganti Analisis Jurusan</a>
                      <?php } ?>
                    <?php } ?>
                    <a class="btn btn-secondary float-left" href="<?= base_url('Administrator/'); ?>leaderboard">Kembali</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/jquery/jquery.min.js"></script>

  <script src="<?= base_url('assets/User/'); ?>js/sweetalert2.all.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url('assets/Admin/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/Admin/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/Admin/') ?>dist/js/demo.js"></script>

  <script src="<?= base_url('assets/User/'); ?>js/logout.js"></script>
  <!-- page script -->
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>
  </body>
  </html>
<?php } else{
  redirect('User/login');
} ?>