
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
              <?php //echo "Peramalan produk ".$produk->nama_produk." menggunakan konstanta ".$konstanta; ?>
              <?php //echo "Peramalan kategori ".$kategori->nama_kategori." menggunakan konstanta ".$konstanta; ?>
            </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
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
                  <td><?php echo $row->harga ?></td>
           
                </tr>
              <?php } ?>
              </tbody>
            </table>
           
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
           
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;" bgcolor="#90EE90">Kelas Interval</th>
                </tr>
                <tr>
                  <th>Kelas Interval</th>
                  <th>Nilai</th>
                
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
           
                </tr>
                <?php  } ?>
              
              </tbody>
            </table>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;" bgcolor="#90EE90">Nilai Tengah</th>
                </tr>
                <tr>
                  <th>Nilai Tengah</th>
                  <th>Nilai</th>
                
                </tr>
              </thead>
              <tbody>
              <?php //for($i = 0; $i < count($year_month); $i++){ ?>
                <?php for($i = 0; $i <=$k-1; $i++){ ?>
                <tr>
                <td>
                A<?php echo $i+1;?>
                </td>
                <td><?php echo $nt[$i] ?></td>
                </tr>
                <?php  } ?>
              
              </tbody>
            </table>
           
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;" bgcolor="#90EE90">Fuzzyfikasi</th>
                </tr>
                <tr>
                  <th>State ke-</th>
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
                <td><?php echo $harga[$i];?></td>
                <td>U<?php echo $Fz[$i] ?></td>
                <td>A<?php echo $Fz[$i] ?></td>
                </tr>
                <?php  } ?>
              
              </tbody>
            </table>
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
            <!-- </table>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;">Fuzzy Logical Relationship Group</th>
                </tr>
                <tr>
                  <th>Current State -> Next State</th>
                  <th>Jumlah</th>
                
                </tr>
              </thead>
              <tbody>
              <?php foreach($relasi as $ab=>$cd){
                //for($m = 1; $m <=$k; $m++){ 
                ?>
                <tr>
                <td>
                <?php echo $ab;?>
                </td>
                <td><?php echo $cd ?></td>
                </tr>
                <?php // } 
                }?>
                
              
              </tbody>
            </table> -->
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
                      echo '<th ralign="center" width="300px"><b>'.$trik[$m][$j].'</b></th>';
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
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;" bgcolor="#90EE90">Peramalan Sementara</th>
                </tr>
                <tr>
                  <th>t</th>
                  <th>Periode</th>
                  <th>Data Aktual</th>
                  <th>Peramalan Sementara</th>
                
                </tr>
              </thead>
              <tbody>
              
                
                <?php for($i = 0; $i <count($data_setor); $i++){ ?> 
                <tr>
                <td><?php echo $i+1 ?></td>
                <td><?php echo $tgl_setor[$i] ; ?></td>
                <td><?php echo $harga[$i] ?></td>
                <td><?php echo $Ft[$i] ?></td>
                 
                </tr>
                  <?php } ?>
              </tbody>
            </table>
           
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
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