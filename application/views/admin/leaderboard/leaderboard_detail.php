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
                      <?php if($paket['tpa'] == 1){ ?>
                        <tr>
                          <td scope="row">TPA</td>
                          <td><?= $leader['nilai_tpa']; ?></td>
                          <td><?php if ($leader['nilai_tpa'] >= 67) {
                            echo "LULUS";
                          } else{
                            echo "TIDAK LULUS";
                          } ?></td>
                        </tr>
                      <?php } ?>
                      <?php if($paket['tbi'] == 1){ ?>
                        <tr>
                          <td scope="row">TBI</td>
                          <td><?= $leader['nilai_tbi']; ?></td>
                          <td><?php if ($leader['nilai_tbi'] >= 30) {
                            echo "LULUS";
                          } else{
                            echo "TIDAK LULUS";
                          } ?></td>
                        </tr>
                      <?php } ?>
                      <?php if($paket['twk'] == 1 && $paket['tiu'] == 1 && $paket['tkp'] == 1) { ?>
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
                      <?php } ?>
                      <?php if($paket['tsa'] == 1){ ?>
                        <tr>
                          <td scope="row">TSA</td>
                          <td><?= $leader['nilai_tsa']; ?></td>
                          <td><?php if ($leader['nilai_tsa'] >= 0) {
                            echo "LULUS";
                          } else{
                            echo "TIDAK LULUS";
                          } ?></td>
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
                    <!-- <?php if ($leader['status'] == "LULUS") { ?>
                      <?php if (empty($leader['analisis_jurusan'])) { ?>
                        <a class="btn btn-primary float-right" href="<?= base_url('Administrator/'); ?>analisis_jurusan/<?= $leader['id_leaderboard'] ?>">Tambah Analisis Jurusan</a>
                      <?php } else { ?>
                        <a class="btn btn-primary float-right" href="<?= base_url('Administrator/'); ?>analisis_jurusan/<?= $leader['id_leaderboard'] ?>">Ganti Analisis Jurusan</a>
                      <?php } ?>
                    <?php } ?> -->
                    <a class="btn btn-secondary float-left" href="<?= base_url('admin_leaderboard/'); ?>pilih_event">Kembali</a>
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
  <script src="<?= base_url('assets/admin/') ?>plugins/jquery/jquery.min.js"></script>

  <script src="<?= base_url('assets/user/'); ?>js/sweetalert2.all.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url('assets/admin/') ?>plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url('assets/admin/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/admin/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/admin/') ?>dist/js/demo.js"></script>

  <script src="<?= base_url('assets/auth/'); ?>js/logout.js"></script>
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