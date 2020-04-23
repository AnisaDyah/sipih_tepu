
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
                    <h2>Rincian Perhitungan dengan Metode Fuzzy Time Series Markov Chain</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
              
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <table class="table">
          <tr>
          <td>
          <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;" bgcolor="#90EE90">Data yang Dijadikan Acuan Peramalan</th>
                </tr>
                <tr>
                  <th>Bulan</th>
                  <th>Data</th>
                
                </tr>
              </thead>
              <tbody>
              <?php //for($i = 0; $i < count($year_month); $i++){ ?>
                <?php foreach($data_setor as $row){ ?>
                <tr>
                  <td><?php echo $row->tgl_setoran ?></td>
                  <td><?php echo "Rp. ".number_format("$row->harga",2,",",".") ?></td>
           
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </td>
          <td>
          <table class=" table table-bordered table-striped" width="300px" box-shadow=" 7px 7px">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;" bgcolor="#90EE90">Fuzzyfikasi</th>
                </tr>
                <tr>
                  <th>t</th>
                  <th>Data</th>
                  <th>Interval</th>
                  <th>Fuzzyfikasi</th>
                
                </tr>
              </thead>
              <tbody>
              <?php //for($i = 0; $i < count($year_month); $i++){ ?>
                <?php for($i = 0; $i <count($data_setor); $i++){ ?>
                <tr>
                <td><?php echo $i+1;?></td>
                <td><?php echo "Rp. ".number_format("$harga[$i]",2,",",".");?></td>
                <td>U<?php echo $Fz[$i] ?></td>
                <td>A<?php echo $Fz[$i] ?></td>
                </tr>
                <?php  } ?>
              
              </tbody>
            </table>
          </td>
          </tr>
          </table>
         
            </div>
          <!-- /.box-body -->
          </div>
          <div class="x_panel">
          <div class="box-body">
            <table class="table">
            <thead>
            <tr>
            <td>
            <table  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="2" style="text-align: center;" bgcolor="#90EE90">Menentukan Dasar Perhitungan untuk Kelas Interval</th>
                </tr>
                <tr>
                  <th width=20px>DMIN</th>
                  <th width=10px><?php echo $dmin; ?></th>
                </tr>
                <tr>
                  <th width=20px>DMAX</th>
                  <th width=10px><?php echo $dmax; ?></th>
                </tr>
                <tr>
                  <th width=20px>D1</th>
                  <th width=10px><?php echo $d1; ?></th>
                </tr>
                <tr>
                  <th width=20px>D2</th>
                  <th width=10px><?php echo $d2; ?></th>
                </tr>
                <tr>
                  <th width=20px>Himpunan Semesta</th>
                  <th width=10px>[<?php echo $dmin-$d1; ?>,<?php echo $dmax+$d2; ?>]</th>
                </tr>
                <tr>
                  <th width=20px>Jumlah Interval kelas</th>
                  <th width=10px><?php echo $k; ?></th>
                </tr>
                <tr>
                  <th width=20px>Panjang Interval kelas</th>
                  <th width=10px><?php echo $l; ?></th>
                </tr>
              </thead>
            </table>
            </td>
            <td>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;" bgcolor="#90EE90">Kelas Interval</th>
                </tr>
                <tr>
                  <th>Kelas Interval</th>
                  <th>Nilai</th>
                  <th>Nilai Tengah</th>
                  
                
                </tr>
              </thead>
              <tbody>
              
                <?php for($i = 0; $i <=$k-1; $i++){ ?>
                <tr>
                <td>
                U<?php echo $i+1;?>
                </td>
                <?php
                 if($i==0){
                    $nki=$dmin-$d1;
                }else{
              $nki= $nki + $l ;
                  
          }?>
                <td><?php echo $nki ?> - 
                
                <?php for($j = 0; $j <=$k-1; $j++){ 
                    $jki= $nki+$l;
                }?>

           <?php echo $jki ; ?></td> 
           <td><?php echo $nt[$i+1] ?></td>
                </tr>
                <?php  } ?>
              
              </tbody>
            </table>
           </td>
           
           <td>
            
            </td>
            </tr>
            </thead>
            </table>
            </div>
          <!-- /.box-body -->
          </div>
           
          <div class="x_panel">
          <div class="box-body">
            <table class="table">
            <thead>
            <tr>
            <td>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;" bgcolor="#90EE90">Fuzzy Logical Relationship</th>
                </tr>
                <tr>
                  <th colspan="2" style="text-align: center;">urutan data</th>
                  <th colspan="2" style="text-align: center;">Fuzzy Logical Relationship</th>
                
                </tr>
                <tr>
                <th>Current State</th>
                <th>Next State</th>
                <th>Current State</th>
                <th>Next State</th>
                </tr>
              </thead>
              <tbody>
              <?php //for($i = 0; $i < count($year_month); $i++){ ?>
                <?php for($i = 0; $i <count($data_setor)-1; $i++){ ?>
                <tr>
                <td><?php echo $i+1 ;?></td>
                <td><?php echo $i+2;?></td>
                <td>A<?php echo $state1[$i] ?></td>
                <td>A<?php echo $state2[$i] ?></td>
                </tr>
                <?php  } ?>
              
              </tbody>
              </table>
            </td>
            <td>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;" bgcolor="#90EE90">Fuzzy Logical Relationship Group</th>
                </tr>
                <tr>
                  <th>Current State</th>
                  <th>Next State</th>
                  <th>Jumlah</th>
                </tr>
                
                
              </thead>
              <tbody>
              <tr>
                <?php 
                for($j = 1; $j <=$k; $j++){?>
                <td > <?php echo "A".$j ;?></td>
                <td > <?php for($m=1 ; $m <=$k; $m++){
                            echo " (A".$m.") = ".$rawcol[$j][$m]."," ;
                }?>
                </td>
                <td > <?php echo $raw[$j] ;?></td>
                
                </tr>
                <?php } ?>
              
              </tbody>
            </table>
            </td>
            </tr>
            </thead>
            </table>
            </div>
          <!-- /.box-body -->
          </div>
          <div class="x_panel">
          <div class="box-body">
            <table class="table">
            <thead>
            <tr>
            <td>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="10" style="text-align: center;" bgcolor="#90EE90">Matrik probabilitas Markov Chain</th>
                </tr>
               
                <tr>
                <th rowspan="2"></th>
                    <?php
                    $kolom = $j; 
                    $i=1;    
                    for($j = 1; $j <=$k; $j++){
                      if(($i) % $kolom== 1) {    
                      echo'<tr>';   
                      }  
                      echo '<th align="center" width="300px"><b>A'.$j.'</b></th>';
                      if(($i) % $kolom== 0) {    
                      echo'</tr>';    
                      }
                    $i++;
                    }
                    ?>
                </tr>
                <tr>
                <?php for($m = 1; $m <=$k; $m++){?>
                <th rowspan="2"> <?php echo "A".$m ;?></th>
                
                <!-- //<th rowspan="2" ><th> -->
                <?php
                    $kolom = $j-1; 
                    $i=1;    
                      for($j = 1; $j <=$k; $j++){
                      if(($i) % $kolom== 1) {    
                      echo'<tr>';   
                      }  
                      echo '<th ralign="center" width="300px"><b>'.round($trik[$m][$j],2).'</b></th>';
                      if(($i) % $kolom== 0) {    
                      echo'</tr>';    
                      }
                    $i++;
                    
                    }
                    ?>
                   
                    </tr>
                <?php } ?>
                     
               
               
              </thead>
              <tbody>
              
              </tbody>
            </table>
          </td>
            </tr>
            </thead>
            </table>
            </div>
          <!-- /.box-body -->
          </div>
          
         
          <div class="x_panel">
          <div class="box-body">
            <table class="table">
            <thead>
            <tr>
            <td>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="10" style="text-align: center;" bgcolor="#90EE90">Hasil Peramalan</th>
                </tr>
                <tr>
                  <th>t</th>
                  <th>Periode</th>
                  <th>Data Aktual</th>
                  <th>Peramalan Sementara</th>
                  <th>Nilai Penyesuaian</th>
                  <th>Peramalan Akhir</th>
                
                </tr>
              </thead>
              <tbody>
              
                <?php for($i = 0; $i <count($data_setor); $i++){ ?> 
                <tr>
                <td><?php echo $i+1 ?></td>
                <td><?php echo $tgl_setor[$i] ; ?></td>
                <td><?php echo "Rp. ".number_format("$harga[$i]",2,",",".") ?></td>
                <td><?php echo "Rp. ".number_format(round($Ft[$i],2),2,",",".") ?></td>
                <td><?php echo "Rp. ".number_format($Dt[$i],2,",",".") ?></td>
                <td><?php echo "Rp. ".number_format(round($Ft[$i]+$Dt[$i],2),2,",",".") ?></td>
                </tr>
                  <?php } ?>
              </tbody>
            </table>
            </td>
            <td>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="10" style="text-align: center;" bgcolor="#90EE90">Tingkat Akurasi Peramalan</th>
                </tr>
                <tr>
                <th>t</th>
                  <th>MAPE</th>
                  <th>MSE</th>
                </tr>
              </thead>
              <tbody>
              
                <?php for($i = 0; $i <count($data_setor); $i++){ ?> 
                <tr>
                <td><?php echo $i+1 ?></td>
                <td><?php echo abs(round($mape[$i],2))."%" ; ?></td>
                <td><?php echo round($mse[$i],2) ?></td>
                
                </tr>
                  <?php } ?>
                  <tr>
                  <td>Total : </td>
                  <td><?php echo round($total_mape/count($data_setor),2) ?> </td>
                  <td><?php echo round($total_mse/count($data_setor),2) ?> </td>
                  </tr>
              </tbody>
            </table>
            </td>
          </tr>
          </table>
         
            </div>
          <!-- /.box-body -->
          </div>
            
            

          <div class="x_panel">
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="10" style="text-align: center;" bgcolor="#90EE90">Peramalan 2 bulan kedepan</th>
                </tr>
                <tr>
                <!-- <th>t</th> -->
                  <th>bulan</th>
                  <th>peramalan</th>
                </tr>
              </thead>
              <tbody>
              
                <?php for($i = 0; $i <8; $i++){ ?> 
                <tr>
                <!-- <td><?php $x=$i+1; echo $x ?></td> -->
                <td><?php $x=$i+1; echo "mingu ke-".$x ; ?></td>
                <td><?php echo "Rp. ".number_format(round($ftend_new[$i],2),2,",",".") ?></td>
                
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
              <div class="chart" id="line-chart" style="height: 300px; width:1200px;"></div>
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