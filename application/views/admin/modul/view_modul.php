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
                  <div class="col-12">
                    <label>Judul Modul</label>
                    <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['judul_modul'] ?></h5>
                  </div>
                  <br>
                  <div class="col-12">
                    <label>Deskripsi Modul</label>
                    <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['deskripsi'] ?></h5>
                  </div>
                  <br>
                  <div class="col-12">
                    <label>Jenis modul</label>
                    <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['jenis'] ?></h5>
                  </div>
                  <br>
                  <div class="col-12">
                    <label>Nama File Video</label>
                    <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['video'] ?></h5>
                  </div>
                  <br>
                  <div class="col-12">
                    <label>File Thumbnail</label>
                    <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['thumbnail'] ?></h5>
                    <img style="margin-left: 1%;" src="<?= base_url('assets/modul/thumbnail/' . $modul['thumbnail']); ?>" alt="" style="width: 362px; height: 250px;">
                  </div>
                  <br>
                  <div class="col-12">
                    <label>Judul Sub Deskripsi Video (bagian 1)</label>
                    <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['subjudul1'] ?></h5>
                  </div>
                  <br>
                  <div class="col-12">
                    <label>Sub Deskripsi Video (bagian 1)</label>
                    <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['subdesk1'] ?></h5>
                  </div>
                  <br>
                  <?php if($modul['subjudul2'] && $modul['subdesk2']) { ?>
                    <div class="col-12">
                      <label>Judul Sub Deskripsi Video (bagian 2)</label>
                      <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['subjudul2'] ?></h5>
                    </div>
                    <br>
                    <div class="col-12">
                      <label>Sub Deskripsi Video (bagian 2)</label>
                      <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['subdesk2'] ?></h5>
                    </div>
                    <br>
                  <?php } ?>
                  <?php if($modul['subjudul3'] && $modul['subdesk3']) { ?>
                    <div class="col-12">
                      <label>Judul Sub Deskripsi Video (bagian 3)</label>
                      <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['subjudul3'] ?></h5>
                    </div>
                    <br>
                    <div class="col-12">
                      <label>Sub Deskripsi Video (bagian 3)</label>
                      <h5 class="mr-3 text-black" style="margin-left: 1%;"><?= $modul['subdesk3'] ?></h5>
                    </div>
                    <br>
                  <?php } ?>
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
    <footer class="main-footer">
      <strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="http://sobatkode.com">Sobatkode</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>

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