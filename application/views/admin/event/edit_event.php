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
            
            <?= form_open_multipart('admin_event/edit_event/' . $paket['id_paket'] . '/' . $event['id_event']); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Paket Tryout</label>
                  <input type="text" id="paket" name="paket" class="form-control" value="<?= $paket['nama_paket'] ?>" disabled="disabled">
                </div>
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
                  <label for="inputMulai">Waktu Mulai Event</label>
                  <input type="date" id="mulai" name="mulai" class="form-control" value="<?= $event['tgl_mulai'] ?>">
                </div>
                <div class="form-group">
                  <label for="inputBerakhir">Waktu Berakhir Event</label>
                  <input type="date" id="akhir" name="akhir" class="form-control" value="<?= $event['tgl_akhir'] ?>">
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
                  <a class="btn btn-secondary float-left" href="<?= base_url('admin_event/'); ?>pilih_paket">Kembali</a>
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
    });
  </script>
  </body>

  </html>