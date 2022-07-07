
<footer class="footer">
<ul class="list-inline">
<li>2020 @ enjaz.</li>
<!-- <li><a href="#">Privacy</a></li>
<li><a href="#">Terms</a></li>
<li><a href="#">Help</a></li> -->
</ul>
</footer>
<!-- 
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<script  type="text/javascript" src="<?php echo base_url();?>assets/vendor/libs/popper/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script> 
 -->


<script src="<?php echo base_url();?>assets/scripts/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/scripts/modernizr.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/nprogress/nprogress.js"></script>
<script src="<?php echo base_url();?>assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/waves/waves.min.js"></script>
<!-- Full Screen Plugin -->
<script src="<?php echo base_url();?>assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

<!-- Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- chart.js Chart -->
<script src="<?php echo base_url();?>assets/plugin/chart/chartjs/Chart.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/scripts/chart.chartjs.init.min.js"></script>

<!-- FullCalendar -->
<script src="<?php echo base_url();?>assets/plugin/moment/moment.js"></script>
<script src="<?php echo base_url();?>assets/plugin/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/scripts/fullcalendar.init.js"></script>

<!-- Sparkline Chart -->
<script src="<?php echo base_url();?>assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>assets/scripts/chart.sparkline.init.min.js"></script>

<script src="<?php echo base_url();?>assets/scripts/main.min.js"></script>
<script src="<?php echo base_url();?>assets/color-switcher/color-switcher.min.js"></script>

 

 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

    
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            dom:  "<<'col-sm-12'B>>"+"<'row'<'col-sm-2 pull-right'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
		"buttons": ['csv', 'excel', 'pdf', 'print']

          //  buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
        } );
     
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    });
     </script>
<script>
$(function($) {
$('#example').DataTable();

$('#example2').DataTable( {
"scrollY":        "300px",
"scrollCollapse": true,
"paging":         false
} );

$('#example3').DataTable();
});
</script>



<script type="text/javascript" src="<?php echo base_url();?>assets/toastr/toastr.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.timeOut = 3000;
    toastr.options.preventDuplicates = true;
    toastr.options.positionClass = "toast-top-center";
    var site_url = '<?php echo site_url(); ?>';
});
</script>
<script src="<?php echo base_url();?>assets/plugin/flexdatalist/jquery.flexdatalist.min.js"></script>
<!-- Popover -->
<script src="<?php echo base_url();?>assets/plugin/popover/jquery.popSelect.min.js"></script>
<!-- Select2 -->
  <script src="<?php echo base_url();?>assets/plugin/select2/js/select2.min.js"></script>
  <!-- Multi Select -->
  <script src="<?php echo base_url();?>assets/plugin/multiselect/multiselect.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/moment/moment.js"></script>
<script src="<?php echo base_url();?>assets/plugin/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url();?>assets/plugin/maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?php echo base_url();?>assets/scripts/form.demo.min.js"></script>