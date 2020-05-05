<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Daftar Soal</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Soal</h3>
              </div>
                <!-- /.card-body -->
              <div class="card-body">
                <form method="post" action="<?= base_url('admin_soal/'); ?>soal_detail">
                <div class="form-group">
                  <label for="optionEvent">Pilih Paket Tryout</label>
                  <select class="custom-select col-md-12 mb-3" id="optionEvent" name="optionEvent">
                    <?php foreach ($event as $loadEvent) { ?>
                      <option value="<?= $loadEvent['id_event']; ?>"><?= $loadEvent['nama_event']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="optionEvent">Pilih Event</label>
                  <select class="custom-select col-md-12 mb-3" id="optionTopik" name="optionTopik">
                    <?php foreach ($topik as $loadTopik) { ?>
                      <option value="<?= $loadTopik['id_topik_tes']; ?>"><?= $loadTopik['nama_topik_tes']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="optionEvent">Pilih Topik</label>
                  <select class="custom-select col-md-12 mb-3" id="optionTopik" name="optionTopik">
                    <?php foreach ($topik as $loadTopik) { ?>
                      <option value="<?= $loadTopik['id_topik_tes']; ?>"><?= $loadTopik['nama_topik_tes']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <button class="btn btn-primary float-right" type="submit">Submit</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
  <script src="<?= base_url('assets/Admin/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
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