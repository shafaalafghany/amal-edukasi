   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Detail Modul Pembelajaran</h1>
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
                <h3 class="card-title">Detail Modul</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>

              <form>
                <div class="card-body">
                  <table id="example1" class="table table-striped">
                    <tbody>
                      <tr>
                        <td>
                          <span class="subadge">Judul Modul</span>
                          <h4 class="mr-3 text-black"><?= $modul['judul_modul'] ?></h4>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="subadge">Deskripsi Modul</span>
                          <h4 class="mr-3 text-black"><?= $modul['deskripsi'] ?></h4>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="subadge">Jenis modul</span>
                          <h4 class="mr-3 text-black"><?= $modul['jenis'] ?></h4>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="subadge">Nama File Video</span>
                          <h4 class="mr-3 text-black"><?= $modul['video'] ?></h4>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="subadge">File Thumbnail</span>
                          <h4 class="mr-3 text-black"><?= $modul['thumbnail'] ?></h4>
                          <img src="<?= base_url('assets/modul/thumbnail/' . $modul['thumbnail']); ?>" alt="" style="width: 362px; height: 250px;">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="subadge">Judul Sub Deskripsi Video (bagian 1)</span>
                          <h4 class="mr-3 text-black"><?= $modul['subjudul1'] ?></h4>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="subadge">Sub Deskripsi Video (bagian 1)</span>
                          <h4 class="mr-3 text-black"><?= $modul['subdesk1'] ?></h4>
                        </td>
                      </tr>
                      <?php if($modul['subjudul2'] && $modul['subdesk2']) { ?>
                        <tr>
                          <td>
                            <span class="subadge">Judul Sub Deskripsi Video (bagian 2)</span>
                            <h4 class="mr-3 text-black"><?= $modul['subjudul2'] ?></h4>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span class="subadge">Sub Deskripsi Video (bagian 2)</span>
                            <h4 class="mr-3 text-black"><?= $modul['subdesk2'] ?></h4>
                          </td>
                        </tr>
                      <?php } ?>
                      <?php if($modul['subjudul3'] && $modul['subdesk3']) { ?>
                        <tr>
                          <td>
                            <span class="subadge">Judul Sub Deskripsi Video (bagian 3)</span>
                            <h4 class="mr-3 text-black"><?= $modul['subjudul3'] ?></h4>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span class="subadge">Sub Deskripsi Video (bagian 3)</span>
                            <h4 class="mr-3 text-black"><?= $modul['subdesk3'] ?></h4>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <br>
                  <div class="d-flex">
                    <div class="col-6">
                        <a class="btn btn-secondary" href="<?= base_url('admin_modul/daftar_modul'); ?>">Kembali</a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-primary float-right" href="<?= base_url('assets/modul/video/' . $modul['video']); ?>" target="_blank">Open Video</a>
                    </div>
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