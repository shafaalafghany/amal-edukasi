<?php if (!empty($user)) { ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile Saya</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/avatar/') . $user['image']; ?>" alt="User profile picture" style="width: 100px; height: 100px;">
                </div>

                <h3 class="profile-username text-center"><?= $user['name']; ?></h3>

                <p class="text-muted text-center">Administrator</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right" style="font-size: 13px;"><?= $user['email']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Tgl Dibuat</b> <a class="float-right" style="font-size: 13px;"><?= date("j M Y", strtotime($user['date_created'])); ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tentang Saya</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-user-graduate mr-1"></i> Riwayat Pendidikan</strong>

                <p class="text-muted">
                  <?= $user['riwayat_pendidikan'] ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Lokasi</strong>

                <p class="text-muted"><?= $user['lokasi'] ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Keahlian</strong>

                <p class="text-muted">
                  <?= $user['keahlian'] ?>
                </p>

                <hr>

                <strong><i class="far fa-star mr-1"></i> Qoutes Of The Day</strong>

                <p class="text-muted"><?= $user['quotes'] ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#deskripsi" data-toggle="tab">Deskripsi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#edit_profile" data-toggle="tab">Edit Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#edit_tentangsaya" data-toggle="tab">Edit Tentang Saya</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="deskripsi">
                    <!-- Post -->
                    <div class="post">
                      <h3><strong>Halo <?= $user['name']; ?></strong></h3>
                      <br>
                      <?php if ($user['role_id'] == 1) { ?>
                        <div class="callout callout-info">
                          <h5><i class="fas fa-info"></i> Note:</h5>
                          Anda adalah Administrator yang memiliki kuasa untuk mengatur sistem tryout Amal Edukasi ini, anda dapat menambah modul, menambah admin,
                          menambah event, backup data-data dan backup database.
                        </div>
                      <?php } else { ?>
                        <div class="callout callout-info">
                          <h5><i class="fas fa-info"></i> Note:</h5>
                          Anda adalah Admin dalam sistem try out AORTASTAN ini, anda dapat menambah modul, menambah event, backup data-data dan backup database.
                        </div>
                      <?php } ?>
                      <br>
                      <h5><i class="far fa-star mr-1"></i>Qoutes Of The Day</h5>
                      <p>
                        <?= $user['quotes'] ?>
                      </p>
                      <hr>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="edit_profile">
                    <form action="profile_admin" method="POST" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="exampleInputFile" class="col-sm-2 col-form-label">Ganti Foto</label>
                        <div class="input-group col-sm-10">
                          <div class="custom-file">
                            <input type="file" id="image" name="image" accept="image/*">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama*</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email*</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-10">
                          <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="edit_tentangsaya">
                    <form action="<?= base_url('Administrator/tentang_saya') ?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="pendidikan" class="col-sm-2 col-form-label">Riwayat Pendidikan</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="pendidikan" name="pendidikan"><?= $user['riwayat_pendidikan'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="lokasi" name="lokasi"><?= $user['lokasi'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="keahlian" class="col-sm-2 col-form-label">Keahlian</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="keahlian" name="keahlian"><?= $user['keahlian'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="quotes" class="col-sm-2 col-form-label">Qoutes Of The Day</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="quotes" name="quotes"><?= $user['quotes'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-10">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
<?php } else { ?>
<?php redirect('User/login');
} ?>