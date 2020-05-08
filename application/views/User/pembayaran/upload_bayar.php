    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <h3>Upload Bukti Pembayaran</h3>
    </div>
    <!-- bradcam_area_end -->

    <div class="courses_details_info">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="single_courses">
                        <h4>Silahkan isi form dibawah ini!</h4>
                    </div>
                    <br>
                    <?= form_open_multipart('upload_bukti'); ?>
                        <div class="form-group">
                            <label>Nama <span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email <span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Upload Bukti Transfer <span style="color: red">*</span></label>
                            <br>
                            <div class="foto-profil" style="margin-left: 2%;">
                                <input type="file" id="image" name="image" accept="image/*">
                                <br>
                                <label>File bukti pembayaran harus berekstensi .jpg/.png/.jpeg dan tidak lebih dari 2MB.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mau Ikut Paket Mana? (bagian 1) <span style="color: red">*</span></label>
                            <select class="custom-select col-md-12 mb-3" id="optionPaket1" name="optionPaket1">
                                <option value="0">Silahkan Pilih...</option>
                                <?php foreach ($paket as $loadPaket) { ?>
                                    <option value="<?= $loadPaket['id_paket']; ?>"><?= $loadPaket['nama_paket']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label>*Bila ingin mengikuti lebih dari 1 event atau 1 paket</label>
                        <div class="form-group">
                            <label>Mau Ikut Paket Mana Lagi? (bagian 2)</label>
                            <select class="custom-select col-md-12 mb-3" id="optionPaket2" name="optionPaket2">
                                <option value="0">Silahkan Pilih...</option>
                                <?php foreach ($paket as $loadPaket) { ?>
                                    <option value="<?= $loadPaket['id_paket']; ?>"><?= $loadPaket['nama_paket']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mau Ikut Paket Mana Lagi? (bagian 3)</label>
                            <select class="custom-select col-md-12 mb-3" id="optionPaket3" name="optionPaket3">
                                <option value="0">Silahkan Pilih...</option>
                                <?php foreach ($paket as $loadPaket) { ?>
                                    <option value="<?= $loadPaket['id_paket']; ?>"><?= $loadPaket['nama_paket']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mau Ikut Paket Mana Lagi? (bagian 4)</label>
                            <select class="custom-select col-md-12 mb-3" id="optionPaket4" name="optionPaket4">
                                <option value="0">Silahkan Pilih...</option>
                                <?php foreach ($paket as $loadPaket) { ?>
                                    <option value="<?= $loadPaket['id_paket']; ?>"><?= $loadPaket['nama_paket']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="color: red">Catatan:</label>
                            <br>
                            <label style="color: red">- Form yang bertanda bintang (*) berarti wajib diisi</label>
                            <br>
                            <label style="color: red">- Jika ingin mengikuti lebih dari 1 event pada paket yang sama, silahkan isi form bagian 2, bagian 3, atau bagian 4 dengan paket yang sama dengan bagian sebelumnya</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-2 px-4">Kirim Bukti Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>