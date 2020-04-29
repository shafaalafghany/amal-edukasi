<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="http://sobatkode.com">Sobatkode</a>.</strong>
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
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/Admin/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/user/'); ?>js/sweetalert2.all.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets/admin/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('assets/admin/') ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

<script src="<?= base_url('assets/admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/admin/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/admin/') ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/admin/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/admin/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/admin/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/admin/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/admin/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/admin/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/admin/') ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/admin/') ?>dist/js/demo.js"></script>
<script src="<?= base_url('assets/auth/'); ?>js/logout.js"></script>
<script>
  $.('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
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