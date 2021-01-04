<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
    </div>
</footer>

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/'); ?>plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<!-- load script ckeditor -->
<script type="text/javascript" src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<!-- GIS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="<?= base_url() ?>assets/leaflet-locatecontrol/src/L.Control.Locate.js"></script>

<!-- Load File JavaScript yang dibuat secara custom untuk kebutuhan tertentu -->
<script src="<?= base_url('assets/'); ?>custom/admin/menu.js"></script>
<script src="<?= base_url('assets/'); ?>custom/admin/barang.js"></script>
<script src="<?= base_url('assets/'); ?>custom/admin/supplier.js"></script>
<script src="<?= base_url('assets/'); ?>custom/admin/role.js"></script>
<script src="<?= base_url('assets/'); ?>custom/admin/user.js"></script>
<script src="<?= base_url('assets/'); ?>custom/admin/aksesMenu.js"></script>
<script src="<?= base_url('assets/'); ?>custom/kasir/kasir.js"></script>
<script src="<?= base_url('assets/'); ?>custom/admin/stockOut.js"></script>
<script src="<?= base_url('assets/'); ?>custom/admin/stockIn.js"></script>
<script src="<?= base_url('assets/'); ?>custom/admin/laporan.js"></script>
<script src="<?= base_url('assets/'); ?>dist/js/display.js"></script>
<?php 
    if($title != "Edit Data Mapping") :
?>
<script src="<?= base_url('assets/'); ?>custom/gis/gis.js"></script>
<?php
    endif;
?>



<!-- Mencetak pesan dari controller -->
<script>
    <?= $this->session->flashdata('pesan_menu'); ?>
    <?= $this->session->flashdata('pesan_sub_menu'); ?>
</script>

</body>

</html>