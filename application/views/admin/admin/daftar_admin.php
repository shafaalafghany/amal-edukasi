    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Daftar Admin</h1>
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
                <h3 class="card-title">Daftar Administrator</h3>
              </div>

              <!-- /.card-body -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Admin</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($admin as $loadAdmin) { ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $loadAdmin['name']; ?></td>
                        <td><?= $loadAdmin['email']; ?></td>
                        <td><?php if ($loadAdmin['is_active'] == 1) {
                              echo "Aktif";
                            } else {
                              echo "Tidak Aktif";
                            } ?></td>
                        <td class="project-actions text-center">
                          <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>Administrator/view_admin/<?= $loadAdmin['id']; ?>">
                            <i class="fas fa-folder">
                            </i>
                            View
                          </a>
                          <a class="btn btn-danger btn-sm delete_admin" href="<?= base_url(); ?>Administrator/hapus_admin/<?= $loadAdmin['id']; ?>">
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

      $('.delete_admin').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
          title: 'Anda Yakin',
          text: "Ingin menghapus admin ini?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yakin',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Berhasil',
              'Satu akun admin telah dihapus',
              'success'
            ).then((result) => {
              document.location.href = href;
            })
          }
        })
      });
    </script>
    </body>

    </html>