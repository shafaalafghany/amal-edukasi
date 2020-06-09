<!-- footer -->
<footer class="footer footer_bg_1">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="<?= base_url('assets/user/'); ?>img/logo.png" alt="">
                            </a>
                        </div>
                        <p>
                            Firmament morning sixth subdue darkness creeping gathered divide our let god moving.
                            Moving in fourth air night bring upon it beast let you dominion likeness open place day
                            great.
                        </p>

                    </div>
                </div>
                <div class="col-xl-3 offset-xl-2 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Paket Try Out
                        </h3>
                        <ul>
                            <?php foreach($paket as $load_paket){ ?>
                                <li><a href="<?= base_url('pages/event/' . $load_paket['id_paket']) ?>"><?= $load_paket['nama_paket'] ?></a></li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Address
                        </h3>
                        <p>
                            Jakarta, Indonesia <br>
                            +62 838 7910-1232 <br>
                            admin@sobatkode.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | <a href="https://sobatkode.com" target="_blank">Sobatkode</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->

<?php include APPPATH . 'views/auth/lupa_password.php'; ?>
<?php include APPPATH . 'views/auth/login.php'; ?>
<?php include APPPATH . 'views/auth/registrasi.php'; ?>

<!-- JS here -->
<script src="<?= base_url('assets/user/'); ?>js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/ajax-form.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/waypoints.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.counterup.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/scrollIt.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/wow.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/nice-select.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.slicknav.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/plugins.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/gijgo.min.js"></script>

<!--contact js-->
<script src="<?= base_url('assets/user/'); ?>js/contact.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.ajaxchimp.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.form.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/user/'); ?>js/mail-script.js"></script>

<script src="<?= base_url('assets/user/'); ?>js/main.js"></script>
<script src="<?= base_url('assets/auth/'); ?>js/logout.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
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

    $(window).resize(function(){
      if ($(window).width() <= 768){
        $('.leader').addClass('table-responsive');
      } else {
        $('.leader').removeClass('table-responsive');  
      }
    });
</script>
<?php if($this->session->flashdata('success')){ ?>
    <script type="text/javascript">
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!!',
                text: '<?= $this->session->flashdata('success') ?>'
            })
        });
    </script>
<?php } elseif($this->session->flashdata('error')) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $this->session->flashdata('error') ?>'
            })
        });
    </script>
<?php } ?>
</body>

</html>