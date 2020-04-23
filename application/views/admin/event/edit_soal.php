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
            <a href="<?= base_url('Administrator/') ?>daftar_soal" class="nav-link active">
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
            <h1>Edit Soal</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
    <section class="content" id="tambahSoalTPA">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Soal</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <form action="<?= base_url('Administrator/') ?>edit_soal/<?= $event['id_event'] ?>/<?= $topik['id_topik_tes'] ?>/<?= $soal['id_soal'] ?>" method="POST">
                <div class="form-group">
                  <div class="form-group">
                    <label for="inputName">Nama Event</label>
                    <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $event['nama_event'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Topik Tes</label>
                    <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $topik['nama_topik_tes'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label>Soal</label>
                  <div class="card-body pad">
                    <div class="mb-3">
                      <textarea class="textarea" placeholder="Place some text here" id="inputSoal" name="inputSoal" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $soal['soal'] ?></textarea>
                    </div>
                    <p class="text-sm mb-0">
                      Input soal pada editor diatas, untuk gambar bisa langsung di import melalui editor diatas
                    </p>
                  </div>
                </div>

                <?php if ($topik['id_topik_tes'] == 5) { ?>
                  <div class="form-group">
                    <div class="card-body pad">
                      <?php
                      $i = 1;
                      foreach ($jawaban as $loadJawab) { ?>
                        <div class="form-group" style="display: flex;">
                          <div class="col-md-9">
                            <label for="inputJawaban<?= $i; ?>">Jawaban <?= $i; ?></label>
                            <textarea type="text" id="jawabanTkp<?= $i; ?>" name="jawabanTkp<?= $i; ?>" class="form-control"><?= $loadJawab['jawaban'] ?></textarea>
                          </div>
                          <div class="col-md-2">
                            <label for="inputPoint<?= $i; ?>">Point Jawaban <?= $i; ?></label>
                            <input type="number" id="pointTkp<?= $i; ?>" name="pointTkp<?= $i; ?>" class="form-control" value="<?= $loadJawab['score'] ?>">
                          </div>
                        </div>
                      <?php $i++;
                      } ?>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="form-group">
                    <label>Jawaban</label>
                    <div class="card-body pad">
                      <?php
                      $i = 1;
                      foreach ($jawaban as $loadJawab) { ?>
                        <div class="form-group">
                          <label for="inputJawaban<?= $i; ?>">Jawaban <?= $i; ?></label>
                          <div class="card-body pad">
                            <div class="mb-3">
                              <textarea class="textarea" placeholder="Place some text here" id="jawaban<?= $i; ?>" name="jawaban<?= $i; ?>" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $loadJawab['jawaban'] ?></textarea>
                            </div>
                            <p class="text-sm mb-0">
                            </p>
                          </div>
                        </div>
                      <?php $i++;
                      } ?>
                      <?php
                      if ($topik['id_topik_tes']==1) {
                        $jwbnBenar = $this->db->select('jawaban')->get_where('jawaban', [
                          'id_soal' => $soal['id_soal'],
                          'score' => 4
                        ])->row()->jawaban;
                      } elseif ($topik['id_topik_tes'] == 6) {
                        $jwbnBenar = $this->db->select('jawaban')->get_where('jawaban', [
                          'id_soal' => $soal['id_soal'],
                          'score' => 1
                        ])->row()->jawaban;
                      } else {
                        $jwbnBenar = $this->db->select('jawaban')->get_where('jawaban', [
                          'id_soal' => $soal['id_soal'],
                          'score' => 5
                        ])->row()->jawaban;
                      } ?>
                      <div class="form-group">
                        <label for="inputJwbBenar">Jawaban Benar</label>
                        <div class="col-md-12" style="border-style: solid; border-width: 1px;">
                            <?= $jwbnBenar; ?>
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="inputJawabanBenar">Ubah Opsi Jawaban Benar</label>
                      <select class="custom-select col-md-12 mb-3" id="jawabanBenar" name="jawabanBenar">
                        <option value="0">Pilih Jawaban...</option>
                        <?php 
                        $i = 1;
                        foreach ($jawaban as $loadJawaban) { ?>
                          <option value="jawaban<?= $i; ?>">Jawaban <?= $i; ?></option>
                        <?php $i++; } ?>
                      </select>
                  </div>
                <?php } ?>

                <div class="col-12">
                  <a class="btn btn-secondary float-left" href="<?= base_url('Administrator/'); ?>daftar_soal">Kembali</a>
                  <button type="submit" class="btn btn-primary float-right">Simpan Perubahan</button>
                </div>
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
    $(function() {
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
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker

      $('.textarea').summernote({
        height: "250px",
        callback: {
          onImageUpload: function(image) {
            uploadImage(image[0]);
          },

          onMediaDelete: function(target) {
            deleteImage(target[0].src);
          }
        }
      });

      function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
          url: "<?= site_url('User/upload_image') ?>",
          cache: false,
          contentType: false,
          processData: false,
          data: data,
          type: "POST",
          success: function(url) {
            $('.textarea').summernote("insertImage", url);
          },
          error: function(data) {
            console.log(data);
          }
        });
      };

      function deleteImage(src) {
        $.ajax({
          data: {
            src: src
          },
          type: "POST",
          url: "<?= site_url('User/delete_image') ?>",
          cache: false,
          success: function(response) {
            console.log(response);
          }
        });
      };

      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
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

      $("input[data-bootstrap-switch]").each(function() {
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
<?php } else {
  redirect('User/login');
} ?>