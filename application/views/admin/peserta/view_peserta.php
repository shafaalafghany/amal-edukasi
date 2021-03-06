   <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Detail Peserta</h1>
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
                <h3 class="card-title">Detail Peserta</h3>

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
                          <span class="subadge">Nama</span>
                          <h4 class="mr-3 text-black"><?= $member['name'] ?></h4>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="subadge">Email</span>
                          <h4 class="mr-3 text-black"><?= $member['email'] ?></h4>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="subadge">No. Telepon</span>
                          <h4 class="mr-3 text-black"><?= $member['telepon'] ?></h4>
                        </td>
                      </tr>
                      <!-- <tr>
                        <td>
                          <span class="subadge">Point</span>
                          <h4 class="mr-3 text-black"><?= $member['point'] ?></h4>
                        </td>
                      </tr> -->
                      <tr>
                        <td>
                          <span class="subadge">Riwayat Pendidikan</span>
                          <h4 class="mr-3 text-black"><?= $member['riwayat_pendidikan'] ?></h4>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="subadge">Tempat Tinggal</span>
                          <h4 class="mr-3 text-black"><?= $member['lokasi'] ?></h4>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="subadge">Quotes Peserta</span>
                          <h4 class="mr-3 text-black"><?= $member['quotes'] ?></h4>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <div class="col-12">
                    <a class="btn btn-secondary float-right" href="<?= base_url('admin_peserta'); ?>">Kembali</a>
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