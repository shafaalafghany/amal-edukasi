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
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
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
                      <a href="<?= base_url('Administrator/') ?>leaderboard" class="nav-link">
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
              <h1>Atur Point</h1>
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
                <h3 class="card-title">Atur Point</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <?= form_error(
                'inputPoint',
                '<div class="alert alert-danger" role="alert"><strong>',
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
              ); ?>

              <form method="POST" action="<?= base_url('Administrator/'); ?>point/<?= $member['id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Nama Member</label>
                    <input type="text" id="inputNama" name="inputNama" class="form-control" disabled="disabled" value="<?= $member['name']; ?>">
                  </div>
                  <!-- <div class="form-group">
                    <label for="inputStatus">Jenis Modul</label>
                    <select class="form-control custom-select">
                      <option selected disabled>Pilih Salah Satu</option>
                      <option>TKD</option>
                      <option>Bhs. Inggris</option>
                      <option>Matematika</option>
                    </select>
                  </div> -->
                  <div class="form-group">
                    <label for="inputName">Email</label>
                    <input type="textr" id="inputEmail" name="inputEmail" class="form-control" disabled="disabled" value="<?= $member['email']; ?>">
                  </div>
                  <label for="optionKategori">Pilih Kategori</label>
                  <select class="custom-select col-md-12 mb-3" id="optionKategori" name="optionKategori">
                    <option value="1">Tambah Point</option>
                    <option value="2">Kurangi Point</option>
                  </select>
                  <div class="form-group">
                    <label for="inputName">Masukkan Point</label>
                    <input type="number" id="inputPoint" name="inputPoint" class="form-control">
                  </div>
                  <!-- <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div> -->
                  <div class="col-12">
                    <input type="submit" value="Submit Point" class="btn btn-primary float-right">
                    <a class="btn btn-secondary" href="<?= base_url('Administrator/'); ?>daftar_peserta">Batal</a>
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