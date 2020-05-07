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