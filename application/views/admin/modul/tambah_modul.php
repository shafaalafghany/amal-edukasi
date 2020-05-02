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
          <?= form_error('judul', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
          <?= form_error('jenisModul', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
          <?= form_error('deskripsi', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
          <?= form_error('subjudul1', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
          <?= form_error('subdesk1', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Formulir Modul Pembelajaran</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="card-body">
              <?= form_open_multipart('admin_modul/tambah_modul'); ?>
              <div class="form-group">
                <label for="judul">Judul Modul Pembelajaran <span style="color: red">*</span></label>
                <input type="text" id="judul" name="judul" class="form-control">
              </div>
              <div class="form-group">
                <label for="jenisModul">Jenis Modul <span style="color: red">*</span></label>
                <select class="form-control" id="jenisModul" name="jenisModul">
                  <?php foreach ($topik as $loadTopik) { ?>
                    <option value="<?= $loadTopik['nama_topik_tes']; ?>"><?= $loadTopik['nama_topik_tes']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi Modul <span style="color: red">*</span></label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Upload Video <span style="color: red">*</span></label>
                <div class="input-group" style="margin-left: 20px;">
                  <div class="custom-file">
                    <input type="file" id="filevideo" name="filevideo" accept="video/*">
                  </div>
                </div>
                <span style="font-size: 14px; margin-left: 20px;">File berekstensi .mp4 dan tidak lebih dari 500MB.</span>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Upload Thumbnail <span style="color: red">*</span></label>
                <div class="input-group" style="margin-left: 20px;">
                  <div class="custom-file">
                    <input type="file" id="filethumbnail" name="filethumbnail" accept="image/*">
                  </div>
                </div>
                <span style="font-size: 14px; margin-left: 20px;">File berekstensi .png/.jpg/.jpeg dan tidak lebih dari 2MB.</span>
              </div>
              <label for="judul">Beri Sub Deskripsi Video</label>
              <div class="form-group" style="margin-left: 2%;">
                <label for="judul">Judul Sub Deskripsi Video (bagian 1) <span style="color: red">*</span></label>
                <input type="text" id="subjudul1" name="subjudul1" class="form-control">
              </div>
              <div class="form-group" style="margin-left: 2%;">
                <label for="deskripsi">Sub Deskripsi Video (bagian 1) <span style="color: red">*</span></label>
                <textarea id="subdesk1" name="subdesk1" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group" style="margin-left: 2%;">
                <label for="judul">Judul Sub Deskripsi Video (bagian 2)</label>
                <input type="text" id="subjudul2" name="subjudul2" class="form-control">
              </div>
              <div class="form-group" style="margin-left: 2%;">
                <label for="deskripsi">Sub Deskripsi Video (bagian 2)</label>
                <textarea id="subdesk2" name="subdesk2" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group" style="margin-left: 2%;">
                <label for="judul">Judul Sub Deskripsi Video (bagian 3)</label>
                <input type="text" id="subjudul3" name="subjudul3" class="form-control">
              </div>
              <div class="form-group" style="margin-left: 2%;">
                <label for="deskripsi">Sub Deskripsi Video (bagian 3)</label>
                <textarea id="subdesk3" name="subdesk3" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label style="color: red">Catatan: Form yang bertanda bintang (*) berarti wajib diisi</label>
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
  <!-- <script src="<?= base_url('assets/Admin/') ?>plugins/sweetalert2/sweetalert2.min.js"></script> -->
  <!-- Toastr -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/Admin/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/Admin/') ?>dist/js/demo.js"></script>

  <script src="<?= base_url('assets/auth/'); ?>js/logout.js"></script>

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