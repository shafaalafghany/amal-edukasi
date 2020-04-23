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
                      <a href="<?= base_url('Administrator/') ?>tambah_soal" class="nav-link active">
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
              <h1>Tambah Soal</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="row">
          <div class="col-12">
              <?= $this->session->flashdata('message'); ?>
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Pilih Kategori Event dan Topik</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"></button>
                </div>
              </div>
              <div class="card-body">
                <form method="POST" action="<?= base_url('Administrator/'); ?>buat_soal">
                  <div class="form-group">
                    <label for="optionEvent">Pilih Event</label>
                    <select class="custom-select col-md-12 mb-3" id="optionEvent" name="optionEvent">
                      <?php foreach ($event as $loadEvent) { ?>
                        <option value="<?= $loadEvent['id_event']; ?>"><?= $loadEvent['nama_event'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="optionEvent">Pilih Topik Tes</label>
                    <select class="custom-select col-md-12 mb-3" id="optionTopik" name="optionTopik">
                      <?php foreach ($topik as $loadTopik) { ?>
                        <option value="<?= $loadTopik['id_topik_tes']; ?>"><?= $loadTopik['nama_topik_tes'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <button class="btn btn-primary float-right" type="submit">Submit</button>
                </form>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="http://sobatkode.com">Sobatkode</a>.</strong>
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

  <script src="<?= base_url('assets/Admin/') ?>plugins/summernote/summernote-bs4.min.js"></script>

  <script src="<?= base_url('assets/Admin/') ?>plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/moment/moment.min.js"></script>
  <script src="<?= base_url('assets/Admin/') ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?= base_url('assets/Admin/') ?>plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url('assets/Admin/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url('assets/Admin/') ?>plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/Admin/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/Admin/') ?>dist/js/demo.js"></script>

  <script src="<?= base_url('assets/User/'); ?>js/logout.js"></script>

  <script type="text/javascript">
    $(function () {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Soal berhasil ditambahkan'
        });
      });

      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('.textarea').summernote()
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })
      
      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      });

      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });

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