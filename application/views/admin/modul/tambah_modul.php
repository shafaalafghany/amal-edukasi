  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Modul Pembelajaran</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            
            <?= $this->session->flashdata('message'); ?>
            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Formulir Modul Pembelajaran</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            
            <div class="card-body">
              <?= form_open_multipart('Administrator/tambah_modul'); ?>
              <div class="form-group">
                <label for="judul">Judul Modul Pembelajaran</label>
                <input type="text" id="judul" name="judul" class="form-control">
              </div>
              <div class="form-group">
                <label for="jenisModul">Jenis Modul</label>
                <select class="form-control" id="jenisModul" name="jenisModul">
                  <?php foreach ($topik as $loadTopik) { ?>
                    <option value="<?= $loadTopik['nama_topik_tes']; ?>"><?= $loadTopik['nama_topik_tes']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group" style="margin-left: 20px;">
                  <div class="custom-file">
                    <input type="file" id="file" name="file" accept="application/pdf">
                  </div>
                </div>
                <span style="font-size: 14px; margin-left: 20px;">File berekstensi .pdf dan tidak lebih dari 50MB.</span>
              </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary float-right">
              </div>
              </form>
            </div>
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
  <!-- SweetAlert2 -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/Admin/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/Admin/') ?>dist/js/demo.js"></script>

  <script src="<?= base_url('assets/User/'); ?>js/logout.js"></script>

  <script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3500
      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          type: 'success',
          title: 'Satu modul berhasil ditambahkan, bisa dilihat pada daftar modul'
        })
      });
    });
  </script>
  </body>

  </html>