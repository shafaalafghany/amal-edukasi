<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Pilih Kategori</h1>
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
                <h3 class="card-title">Pilih Kateogri Event dan Topik</h3>
              </div>
                <!-- /.card-body -->
              <div class="card-body">
                <?php if(current_url() == base_url('admin_soal/kategori_event')) { ?>
                  <form method="post" action="<?= base_url('admin_soal/'); ?>daftar_soal">
                <?php } elseif(current_url() == base_url('admin_soal/kategori_event_tambahsoal')) { ?>
                    <form method="post" action="<?= base_url('admin_soal/'); ?>tambah_soal">
                <?php } ?>
                  <div class="form-group">
                    <label for="optionEvent">Pilih Event</label>
                    <select class="custom-select col-md-12 mb-3" id="optionEvent" name="optionEvent">
                      <?php foreach ($event as $loadEvent) { ?>
                        <option value="<?= $loadEvent['id_event']; ?>"><?= $loadEvent['nama_event']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="optionEvent">Pilih Topik</label>
                    <select class="custom-select col-md-12 mb-3" id="optionTopik" name="optionTopik">
                      <?php if($tpa != null){ ?>
                          <option value="<?= $tpa['id_topik_tes']; ?>"><?= $tpa['nama_topik_tes']; ?></option>
                      <?php } ?>
                      <?php if($tbi != null){ ?>
                          <option value="<?= $tbi['id_topik_tes']; ?>"><?= $tbi['nama_topik_tes']; ?></option>
                      <?php } ?>
                      <?php if($twk != null){ ?>
                          <option value="<?= $twk['id_topik_tes']; ?>"><?= $twk['nama_topik_tes']; ?></option>
                      <?php } ?>
                      <?php if($tiu != null){ ?>
                          <option value="<?= $tiu['id_topik_tes']; ?>"><?= $tiu['nama_topik_tes']; ?></option>
                      <?php } ?>
                      <?php if($tkp != null){ ?>
                          <option value="<?= $tkp['id_topik_tes']; ?>"><?= $tkp['nama_topik_tes']; ?></option>
                      <?php } ?>
                      <?php if($tsa != null){ ?>
                          <option value="<?= $tsa['id_topik_tes']; ?>"><?= $tsa['nama_topik_tes']; ?></option>
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
  <script src="<?= base_url('assets/admin/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
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