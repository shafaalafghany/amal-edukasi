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
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-calendar-week"></i>
          <p>
            Event
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('Administrator/') ?>daftar_event" class="nav-link active">
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
            <h1>Edit Event</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" id="detailEvent">
      <div class="row">
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Edit Event</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <?= form_error(
              'event',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>
            <?= form_error(
              'deskripsi',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>
            <?= form_error(
              'harga',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>
            <?= form_error(
              'mulai',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>
            <?= form_error(
              'akhir',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>
            
            <?= form_open_multipart('Administrator/edit_event/' . $event['id_event']); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Nama Event</label>
                  <input type="text" id="event" name="event" class="form-control" value="<?= $event['nama_event'] ?>">
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
                  <label for="inputProjectLeader">Deskripsi</label>
                  <textarea id="deskripsi" class="form-control" name="deskripsi" rows="4"><?= $event['deskripsi'] ?></textarea>
                </div>
                <div class="form-group">
                  <label for="inputName">Harga</label>
                  <input type="number" id="harga" name="harga" class="form-control" value="<?= $event['harga'] ?>">
                </div>
                <div class="form-group">
                  <label for="inputMulai">Waktu Mulai Event</label>
                  <input type="date" id="mulai" name="mulai" class="form-control" value="<?= $event['tgl_mulai'] ?>">
                </div>
                <div class="form-group">
                  <label for="inputBerakhir">Waktu Berakhir Event</label>
                  <input type="date" id="akhir" name="akhir" class="form-control" value="<?= $event['tgl_akhir'] ?>">
                </div>
                <div class="form-group">
                  <label for="optionJurusan">Ubah Jumlah Pilihan Jurusan</label>
                  <select class="custom-select col-md-12 mb-3" id="optionJurusan" name="optionJurusan">
                      <option value="0">Silahkan Dipilih....</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                  </select>
                </div>
                <?php if($event['pembahasan']){ ?>
                    <div class="form-group">
                      <label for="inputPembahasan">File Pembahasan Yang Diupload</label>
                      <input type="text" id="pembahasan" name="pembahasan" class="form-control" disabled="disabled" value="<?= $event['pembahasan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ganti Pembahasan</label>
                        <div class="input-group" style="margin-left: 20px;">
                          <div class="custom-file">
                            <input type="file" id="file" name="file" accept="application/pdf">
                          </div>
                        </div>
                        <span style="font-size: 14px; margin-left: 20px;">File berekstensi .pdf dan tidak lebih dari 50MB.</span>
                    </div>
                <?php } else { ?>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Pembahasan</label>
                        <div class="input-group" style="margin-left: 20px;">
                          <div class="custom-file">
                            <input type="file" id="file" name="file" accept="application/pdf">
                          </div>
                        </div>
                        <span style="font-size: 14px; margin-left: 20px;">File berekstensi .pdf dan tidak lebih dari 50MB.</span>
                    </div>
                <?php } ?>
                
                <div class="col-12">
                  <a class="btn btn-secondary float-left" href="<?= base_url('Administrator/'); ?>daftar_event">Kembali</a>
                  <button type="submit" class="btn btn-primary float-right">Simpan</button>
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
    $(function() {
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
<?php } else {
  redirect('User/login');
} ?>