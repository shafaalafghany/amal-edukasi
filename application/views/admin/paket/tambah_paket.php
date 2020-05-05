  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Paket Tryout</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <?= $this->session->flashdata('message'); ?>
          <?= $this->session->flashdata('message1'); ?>
          <?= $this->session->flashdata('message2'); ?>
          <?= form_error('judul', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
          <?= form_error('jenisModul', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
          <?= form_error('deskripsi', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
          <?= form_error('subjudul1', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
          <?= form_error('subdesk1', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Formulir Tambah Paket Tryout</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="card-body">
              <?= form_open_multipart('admin_paket/tambah_paket'); ?>
              <div class="form-group">
                <label for="judul">Nama Paket Tryout <span style="color: red">*</span></label>
                <input type="text" id="judul" name="judul" class="form-control">
              </div>
              <div class="form-group">
                <label for="harga">Harga Paket <span style="color: red">*</span></label>
                <input type="number" id="harga" name="harga" class="form-control">
              </div>
              <br>
              <label>Pilih Topik Materi Pada Paket ini <span style="color: red">*</span></label>

              <?php
              $i = 1;
              foreach ($topik as $load_topik) { ?>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="cbTopik<?= $i; ?>" name="cbTopik<?= $i; ?>" value="1">
                    <label for="cbTopik<?= $i; ?>" class="custom-control-label" style="font-style: normal"><?= $load_topik['nama_topik_tes'] ?></label>
                  </div>
                </div>
              <?php $i++;
              } ?>

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
  <footer class="main-footer">
    <strong>Copyright &copy;<script>
        document.write(new Date().getFullYear());
      </script> <a href="http://sobatkode.com">Sobatkode</a>.</strong>
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
  <!-- SweetAlert2 -->
  <!-- <script src="<?= base_url('assets/admin/') ?>plugins/sweetalert2/sweetalert2.min.js"></script> -->
  <!-- Toastr -->
  <script src="<?= base_url('assets/admin/') ?>plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/admin/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/admin/') ?>dist/js/demo.js"></script>

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