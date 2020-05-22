
 <?php $this->load->view('layouts/header_admin'); ?><div class="content-wrapper">
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Peramalan Harga Telur Puyuh dengan Metode Fuzzy Time Series Markov Chain</b></h2>
                    <div class="clearfix"></div>
                  </div>
             
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="10" style="text-align: center;" bgcolor="#90EE90"> <?php echo "Peramalan ".$jangka_ramal." Minggu Kedepan"?></th>
                </tr>
                <tr>
                <!-- <th>t</th> -->
                  <th width='10%'>No Minggu</th>
                  <th>Jangka Waktu</th>
                  <th>Harga Hasil Peramalan</th>
                </tr>
              </thead>
              <tbody>
              
                <?php for($i = 0; $i <$jangka_ramal; $i++){ ?> 
                <tr>
                <td><?php $x=$i+1; echo "minggu ke-".$x ?></td>
                <td><?php echo $rangeminggu[$i] ; ?></td>
                <td><?php echo "Rp. ".number_format(round($ftend_new[$out+$i],2),2,",",".") ?></td>
                
                </tr>
                  <?php } ?>
                  
              </tbody>
            </table>

             </div>
          <!-- /.box-body -->
          </div>
            
            

          <div class="x_panel">
          <div class="box-body">
           
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart2" style="height: 300px; width:1200px;"></div>
            </div>
            <div class="box-body chart-responsive">
              <label>Legend : </label>
              <div id="legend" style="height: auto;">
              </div>
            </div>
            </div>
          <!-- /.box-body -->
          </div>
         
              </div>

              
            </div>
          </div>
        </div>

  
  </div>
</div>
<?php $this->load->view('layouts/footer_admin'); ?>