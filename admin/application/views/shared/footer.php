<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="tools/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="tools/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="tools/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="tools/theme/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="tools/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="tools/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="tools/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- DataTables -->
<script src="tools/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="tools/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="tools/select2/dist/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="tools/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="tools/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="tools/theme/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="tools/theme/js/demo.js"></script>
<!-- page script -->
<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
        $('.select2').select2()
    })
</script>
<?php if ($txt_editor): ?>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="tools/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
        $(function() {
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
<?php endif; ?>