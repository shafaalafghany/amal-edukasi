  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leaderboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Leaderboard List</h3>
            </div>

            <!-- /.card-body -->
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Event</label>
                <input type="text" id="inputName" class="form-control" disabled="disabled" value="<?= $event['nama_event'] ?>">
              </div>
              
              <?php if ($leader) { ?>
                <a class="btn btn-danger btn-sm float-right reset-ulang-event" href="<?= base_url('admin_leaderboard/'); ?>reset_data_event/<?= $event['id_event']; ?>">
                  <i class="fas fa-trash">
                  </i>
                  Reset Ulang Semua Peserta
                </a>
              <?php } ?>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <?php if($paket['tpa'] == 1){ ?>
                      <th>Nilai TPA</th>
                    <?php } ?>
                    <?php if($paket['tbi'] == 1){ ?>
                      <th>Nilai TBI</th>
                    <?php } ?>
                    <?php if($paket['twk'] == 1 && $paket['tiu'] == 1 && $paket['tkp'] == 1){ ?>
                      <th>Nilai SKD</th>
                    <?php } ?>
                    <?php if($paket['tsa'] == 1){ ?>
                      <th>Nilai TSA</th>
                    <?php } ?>
                    <th>Nilai Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($leader as $loadLeader) { ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <?php 
                        $id_leader = $loadLeader['id_leaderboard'];
                        $nama = $this->db->query("SELECT u.name from user u join leaderboard l on u.id = l.id_user where l.id_leaderboard = $id_leader")->row()->name; ?>
                      <td><?= $nama; ?></td>
                      <?php if($paket['tpa'] == 1){ ?>
                        <td><?= $loadLeader['nilai_tpa']; ?></td>
                      <?php } ?>
                      <?php if($paket['tbi'] == 1){ ?>
                        <td><?= $loadLeader['nilai_tbi']; ?></td>
                      <?php } ?>
                      <?php if($paket['twk'] == 1 && $paket['tiu'] == 1 && $paket['tkp'] == 1){ ?>
                        <td><?= $loadLeader['nilai_skd']; ?></td>
                      <?php } ?>
                      <?php if($paket['tsa'] == 1){ ?>
                        <td><?= $loadLeader['nilai_tsa']; ?></td>
                      <?php } ?>
                      <td><?= $loadLeader['nilai_total']; ?></td>
                      <td><?= $loadLeader['status']; ?></td>
                      <td class="project-actions text-center">
                        <a class="btn btn-primary btn-sm" href="<?= base_url('admin_leaderboard/'); ?>leaderboard_detail/<?= $loadLeader['id_leaderboard']; ?>">
                          <i class="fas fa-folder">
                          </i>
                          View
                        </a>
                        <!-- <a class="btn btn-danger btn-sm delete_peserta" href="#">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                        </a> -->
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

      $('.delete_peserta').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
          title: 'Anda Yakin',
          text: "Ingin menghapus member ini?",
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
              'Akun telah dihapus',
              'success'
            ).then((result) => {
              document.location.href = href;
            })
          }
        })
      });
      
      $('.reset-ulang-event').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
          title: 'Anda Yakin',
          text: "Ingin mereset semua peserta dalam event ini? Dengan klik tombol yakin, maka semua peserta dalam event ini akan hilang.",
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
              'Semua data peserta berhasil direset',
              'success'
            ).then((result) => {
              document.location.href = href;
            })
          }
        })
      });
    });
  </script>
  </body>

  </html>