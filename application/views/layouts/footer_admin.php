<!-- footer content -->
<footer>
          
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js')?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js')?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/jszip/dist/jszip.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/pdfmake.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/vfs_fonts.js')?>"></script>
    <script src="<?php echo base_url('assets/raphael/raphael.min.js')?>"></script>
    <script src="<?php echo base_url('assets/morris.js/morris.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js')?>"></script>
    <script>
    $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    $('#datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    //Date picker Bulan
    $('#datepickerbulan').datepicker({
      autoclose: true,
      format: 'M yyyy'
    })

    $('#datepickerbulan2').datepicker({
      autoclose: true,
      format: 'M yyyy'
    })
    $('#datepickerbulan3').datepicker({
      autoclose: true,
      format: 'M yyyy'
    })

    
  })</script>
    <script>
  $(function () {
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: <?php echo $response_databiasa; ?>,
      xkey: 'bulan',
      ykeys: ['data', 'data_peramalan'],
      labels: ['Data Real','Data Ramalan'],
      parseTime: false,
      xLabelAngle: 60,
      lineColors: ['#3c8dbc', 'red'],
      hideHover: 'auto'
    });
    
    var legendItem = $('<span></span>').text('Data Asli'+' ').css('color', '#3c8dbc');
    $('#legend').append(legendItem);
    legendItem = $('<br><span></span>').text('Data Ramalan'+' ').css('color', 'red');
    $('#legend').append(legendItem);
    
  });
</script>
</script>
    <script>
  $(function () {
    var line = new Morris.Line({
      element: 'line-chart2',
      resize: true,
      data: <?php echo $response_databiasa2; ?>,
      xkey: 'bulan',
      ykeys: ['data_peramalan'],
      labels: ['Data Ramalan'],
      parseTime: false,
      xLabelAngle: 60,
      lineColors: ['#3c8dbc', 'red'],
      hideHover: 'auto'
    });
    
    var 
    legendItem = $('<br><span></span>').text('Data Ramalan'+' ').css('color', 'red');
    $('#legend').append(legendItem);
    
  });
</script>
<script>
         var bar = new Morris.Bar({
          element: 'bar-chart',
          data: <?php echo $setoran_chart;?>,
          xkey: 'nama_peternak',
          ykeys: ['jml_setor','jml_setor2'],
          labels: ['2018','2019'],
        });
</script>
<script>
         var bar2= new Morris.Bar({
          element: 'bar-chart2',
          data: <?php echo $setoran_chart_user;?>,
          xkey: 'tgl_setor',
          ykeys: ['jml_setor_user'],
          labels: ['Jumlah setoran'],
          xLabelAngle: 60,
        });
</script>
  </body>
</html>