  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pembayaran Peserta</h1>
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
              <h3 class="card-title">Detail Pembayaran</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <?= form_error(
              'judul',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>
            <?= form_error(
              'harga',
              '<div class="alert alert-danger" role="alert"><strong>',
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            ); ?>
            
            <?= form_open_multipart('admin_pembayaran/terima_bukti/' . $bayar['id_bayar']); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Nama Peserta</label>
                  <input type="text" id="nama" name="nama" class="form-control" value="<?= $peserta['name'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="inputName">Email Peserta</label>
                  <input type="email" id="email" name="email" class="form-control" value="<?= $peserta['email'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="inputName">No. Telepon Peserta</label>
                  <input type="number" id="telepon" name="telepon" class="form-control" value="<?= $peserta['telepon'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="inputName">Bukti Transfer</label>
                  <br>
                  <a href="<?= base_url('assets/pembayaran/' . $bayar['bukti_bayar']); ?>" target="_blank">
                    <img style="margin-left: 1%;" src="<?= base_url('assets/pembayaran/' . $bayar['bukti_bayar']); ?>" alt="" width="200px" height="150px">
                  </a>
                </div>
                <?php
                  $paket1 = $this->db->get_where('paket', ['id_paket' => $bayar['request1_id_paket']])->row_array();
                  $paket2 = $this->db->get_where('paket', ['id_paket' => $bayar['request2_id_paket']])->row_array();
                  $paket3 = $this->db->get_where('paket', ['id_paket' => $bayar['request3_id_paket']])->row_array();
                  $paket4 = $this->db->get_where('paket', ['id_paket' => $bayar['request4_id_paket']])->row_array();
                ?>
                <div class="form-group">
                  <label for="inputName">Peserta Membeli Paket (bagian 1)</label>
                  <input type="text" id="paket1" name="paket1" class="form-control" value="<?= $paket1['nama_paket'] ?>" readonly>
                </div>
                <?php if($bayar['request2_id_paket']){ ?>
                    <div class="form-group">
                        <label for="inputName">Peserta Membeli Paket (bagian 2)</label>
                        <input type="text" id="paket2" name="paket2" class="form-control" value="<?= $paket2['nama_paket'] ?>" readonly>
                    </div>
                <?php } ?>
                <?php if($bayar['request3_id_paket']){ ?>
                    <div class="form-group">
                        <label for="inputName">Peserta Membeli Paket (bagian 3)</label>
                        <input type="text" id="paket3" name="paket3" class="form-control" value="<?= $paket3['nama_paket'] ?>" readonly>
                    </div>
                <?php } ?>
                <?php if($bayar['request4_id_paket']){ ?>
                    <div class="form-group">
                        <label for="inputName">Peserta Membeli Paket (bagian 4)</label>
                        <input type="text" id="paket4" name="paket4" class="form-control" value="<?= $paket4['nama_paket'] ?>" readonly>
                    </div>
                <?php } ?>
                <div class="form-group">
                  <label for="inputName">Tanggal Upload</label>
                  <input type="text" id="tgl_upload" name="tgl_upload" class="form-control" value="<?= $bayar['tgl_upload'] ?>" readonly>
                </div>
                
                <div class="col-12">
                  <a class="btn btn-secondary float-left" href="<?= base_url('admin_pembayaran'); ?>">Kembali</a>
                  <?php if($bayar['is_active'] == 0){ ?>
                    <button type="submit" class="btn btn-primary float-right">Setujui</button>
                  <?php } ?>
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