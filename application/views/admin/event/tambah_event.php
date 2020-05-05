  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Event</h1>
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
              <h3 class="card-title">Formulir Event</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <?= form_error(
              'inputNama',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>
            <?= form_error(
              'inputDeskripsi',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>
            <?= form_error(
              'inputHarga',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>
            <?= form_error(
              'reservation',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>

            <form method="POST" action="<?= base_url('admin_event/tambah_event'); ?>">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Nama Event</label>
                  <input type="text" id="event" name="event" class="form-control">
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
                  <textarea id="deskripsi" class="form-control" name="deskripsi" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label for="optionJurusan">Pilih Paket Tryout</label>
                  <select class="custom-select col-md-12 mb-3" id="optionPaket" name="optionPaket">
                    <?php foreach($paket as $loadPaket){ ?>
                      <option value="<?= $loadPaket['id_paket'] ?>"><?= $loadPaket['nama_paket'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputMulai">Waktu Mulai Event</label>
                  <input type="date" id="mulai" name="mulai" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputBerakhir">Waktu Berakhir Event</label>
                  <input type="date" id="akhir" name="akhir" class="form-control">
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
                  <input type="submit" value="Buat Event" class="btn btn-primary float-right">
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
  <script src="<?= base_url('assets/Admin/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/User/'); ?>js/sweetalert2.all.min.js"></script>

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
          title: 'Satu event berhasil ditambahkan'
        }).then((result) => {
          location.replace("<?= base_url('Administrator/'); ?>tambah_soal");
          return 0;
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
    });
  </script>
  </body>

  </html>