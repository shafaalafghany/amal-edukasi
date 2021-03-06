  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Paket Tryout</h1>
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
              <h3 class="card-title">Daftar Paket Tryout</h3>
          </div>
            
            <!-- /.card-body -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped load-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Jumlah Event</th>
                    <th>Harga Paket /event</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($paket as $loadPaket) { ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $loadPaket['nama_paket']; ?></td>
                      <?php $event = $this->db->get_where('event', ['id_paket' => $loadPaket['id_paket']])->result_array(); ?>
                      <td><?= count($event) ?></td>
                      <td><?= $loadPaket['harga_paket']; ?></td>
                      <td class="project-actions text-center">
                        <a class="badge badge-info col-sm" href="<?= base_url('admin_paket/'); ?>edit_paket/<?= $loadPaket['id_paket']; ?>">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                        </a>
                        <a class="badge badge-danger col-sm delete_modul" href="<?= base_url('admin_paket/'); ?>hapus_paket/<?= $loadPaket['id_paket']; ?>">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                        </a>
                      </td>
                    </tr>
                  <?php $i++;
                  } ?>
                </tbody>
              </table>
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

      $('.delete_modul').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
          title: 'Anda Yakin',
          text: "Ingin menghapus Paket ini? Dengan klik yakin, maka semua yang berkaitan dengan paket ini akan terhapus (event, soal, dan jawaban).",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yakin',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.value) {
            document.location.href = href;
          }
        })
      });

      $(window).resize(function(){
        if ($(window).width() <= 700){
          $('.load-table').addClass('table-responsive');
        } else {
          $('.load-table').removeClass('table-responsive');  
        }
      });
    });
  </script>
  </body>

  </html>