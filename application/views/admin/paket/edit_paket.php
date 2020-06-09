  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Paket Tryout</h1>
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
              <h3 class="card-title">Edit Paket Tryout</h3>

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
            
            <?= form_open_multipart('admin_paket/edit_paket/' . $paket['id_paket']); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Nama Paket Tryout</label>
                  <input type="text" id="judul" name="judul" class="form-control" value="<?= $paket['nama_paket'] ?>">
                </div>
                <div class="form-group">
                  <label for="inputName">Harga Paket /event (Rp)</label>
                  <input type="number" id="harga" name="harga" class="form-control" value="<?= $paket['harga_paket'] ?>">
                </div>
                <div class="form-group">
                  <label for="inputName">Jumlah Event</label>
                  <input type="text" id="event" name="event" class="form-control" disabled="disabled" value="<?= count($event) ?>">
                </div>
                <br>
                <label>Materi Pada Paket ini</label>
                <?php $tpa = $this->db->get_where('topik_tes', ['id_topik_tes' => 1])->row_array(); ?>
                <?php $tbi = $this->db->get_where('topik_tes', ['id_topik_tes' => 2])->row_array(); ?>
                <?php $twk = $this->db->get_where('topik_tes', ['id_topik_tes' => 3])->row_array(); ?>
                <?php $tiu = $this->db->get_where('topik_tes', ['id_topik_tes' => 4])->row_array(); ?>
                <?php $tkp = $this->db->get_where('topik_tes', ['id_topik_tes' => 5])->row_array(); ?>
                <?php $tsa = $this->db->get_where('topik_tes', ['id_topik_tes' => 6])->row_array(); ?>
                <?php if($paket['tpa'] == 1){ ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik1" name="cbTopik1" value="1" checked="checked" disabled="disabled">
                            <label for="cbTopik1" class="custom-control-label" style="font-style: normal"><?= $tpa['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik1" name="cbTopik1" value="1" disabled="disabled">
                            <label for="cbTopik1" class="custom-control-label" style="font-style: normal"><?= $tpa['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } ?>

                <?php if($paket['tbi'] == 1){ ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik2" name="cbTopik2" value="1" checked="checked" disabled="disabled">
                            <label for="cbTopik2" class="custom-control-label" style="font-style: normal"><?= $tbi['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik2" name="cbTopik2" value="1" disabled="disabled">
                            <label for="cbTopik2" class="custom-control-label" style="font-style: normal"><?= $tbi['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } ?>

                <?php if($paket['twk'] == 1){ ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik3" name="cbTopik3" value="1" checked="checked" disabled="disabled">
                            <label for="cbTopik3" class="custom-control-label" style="font-style: normal"><?= $twk['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik3" name="cbTopik3" value="1" disabled="disabled">
                            <label for="cbTopik3" class="custom-control-label" style="font-style: normal"><?= $twk['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } ?>

                <?php if($paket['tiu'] == 1){ ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik4" name="cbTopik4" value="1" checked="checked" disabled="disabled">
                            <label for="cbTopik4" class="custom-control-label" style="font-style: normal"><?= $tiu['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik4" name="cbTopik4" value="1" disabled="disabled">
                            <label for="cbTopik4" class="custom-control-label" style="font-style: normal"><?= $tiu['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } ?>

                <?php if($paket['tkp'] == 1){ ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik5" name="cbTopik5" value="1" checked="checked" disabled="disabled">
                            <label for="cbTopik5" class="custom-control-label" style="font-style: normal"><?= $tkp['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik5" name="cbTopik5" value="1" disabled="disabled">
                            <label for="cbTopik5" class="custom-control-label" style="font-style: normal"><?= $tkp['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } ?>

                <?php if($paket['tsa'] == 1){ ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik6" name="cbTopik6" value="1" checked="checked" disabled="disabled">
                            <label for="cbTopik6" class="custom-control-label" style="font-style: normal"><?= $tsa['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="cbTopik6" name="cbTopik6" value="1" disabled="disabled">
                            <label for="cbTopik6" class="custom-control-label" style="font-style: normal"><?= $tsa['nama_topik_tes'] ?></label>
                        </div>
                    </div>
                <?php } ?>
                
                <div class="col-12">
                  <a class="btn btn-secondary float-left" href="<?= base_url('admin_paket/'); ?>daftar_paket">Kembali</a>
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