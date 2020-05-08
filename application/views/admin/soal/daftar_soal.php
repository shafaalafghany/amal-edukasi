<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Soal</h1>
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
            <h3 class="card-title">List Soal</h3>
          </div>
          <!-- /.card-body -->
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Paket Tryout</label>
              <input type="text" id="inputEvent" class="form-control" disabled="disabled" value="<?= $paket['nama_paket'] ?>">
            </div>
            <div class="form-group">
              <label for="inputName">Event</label>
              <input type="text" id="inputEvent" class="form-control" disabled="disabled" value="<?= $event['nama_event'] ?>">
            </div>
            <div class="form-group">
              <label for="inputName">Topik Tes</label>
              <input type="text" id="inputTopik" class="form-control" disabled="disabled" value="<?= $topik['nama_topik_tes'] ?>">
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Soal</th>
                  <th>Jumlah Jawaban</th>
                  <?php if ($topik['id_topik_tes'] == 5) { ?>
                    <th>Jawaban Berpoint 5</th>
                  <?php } else { ?>
                    <th>Jawaban Benar</th>
                  <?php } ?>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($soal as $loadSoal) { ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $loadSoal['soal']; ?></td>

                    <?php $jawaban = $this->db->get_where('jawaban', ['id_soal' => $loadSoal['id_soal']])->result_array();
                    $j = 0;
                    foreach ($jawaban as $jwb) {
                      $j++;
                    } ?>
                    <td><?= $j; ?></td>

                    <?php if ($topik['id_topik_tes'] == 1) {
                      $jawabanBenar = $this->db->get_where('jawaban', [
                        'id_soal' => $loadSoal['id_soal'],
                        'score' => 4
                      ])->row_array(); ?>
                      <td><?= $jawabanBenar['jawaban']; ?></td>
                    <?php } elseif ($topik['id_topik_tes'] == 6) {
                      $jawabanBenar = $this->db->get_where('jawaban', ['id_soal' => $loadSoal['id_soal'], 'score' => 1])->row_array(); ?>
                      <td><?= $jawabanBenar['jawaban']; ?></td>
                      <?php } else {
                      $jawabanBenar = $this->db->get_where('jawaban', ['id_soal' => $loadSoal['id_soal'], 'score' => 5])->row_array();
                      if ($jawabanBenar) { ?>
                        <td><?= $jawabanBenar['jawaban']; ?></td>
                      <?php } else { ?>
                        <?php if ($topik['id_topik_tes'] == 5) { ?>
                          <td>
                            <div class="btn btn-warning">Tidak ada jawaban yang berpoint 5, silahkan cek jawabannya lagi</div>
                          </td>
                        <?php } else { ?>
                          <td>
                            <div class="btn btn-warning">Tidak ada jawaban benar, silahkan cek jawabannya lagi</div>
                          </td>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>


                    <td class="project-actions">
                      <a class="badge badge-primary col-sm" href="<?= base_url(); ?>admin_soal/lihat_soal/<?= $paket['id_paket'] ?>/<?= $event['id_event'] ?>/<?= $topik['id_topik_tes'] ?>/<?= $loadSoal['id_soal']; ?>">
                        <i class="fas fa-folder">
                        </i>
                        View
                      </a>
                      <a class="badge badge-danger col-sm delete-soal" href="<?= base_url(); ?>admin_soal/hapus_soal/<?= $loadSoal['id_soal']; ?>">
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

  $('.delete-soal').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Anda Yakin',
      text: "Ingin menghapus soal ini? Dengan klik Yakin maka opsi jawaban dari soal ini akan ikut terhapus",
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
          'Satu soal telah dihapus',
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