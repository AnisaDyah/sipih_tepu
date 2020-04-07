
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
                    <h2>Pilih bulan yang akan diramal</h2>
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
                  <th colspan="5" style="text-align: center;">Data yang Dijadikan Acuan Peramalan</th>
                </tr>
                <tr>
                  <th>Bulan</th>
                  <th>Data</th>
                
                </tr>
              </thead>
              <tbody>
              <?php //for($i = 0; $i < count($year_month); $i++){ ?>
                <?php foreach($data_jual as $row){ ?>
                <tr>
                  <td><?php echo $row->tgl_setoran ?></td>
                  <td><?php echo $row->harga ?></td>
           
                </tr>
              <?php } ?>
              </tbody>
            </table>
            <br>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;">Menentukan Dasar Perhitungan untuk Kelas Interval</th>
                </tr>
                <tr>
                  <th>DMIN</th>
                  <th><?php echo $dmin; ?></th>
                </tr>
                <tr>
                  <th>DMAX</th>
                  <th><?php echo $dmax; ?></th>
                </tr>
                <tr>
                  <th>D1</th>
                  <th><?php echo $d1; ?></th>
                </tr>
                <tr>
                  <th>D2</th>
                  <th><?php echo $d2; ?></th>
                </tr>
                <tr>
                  <th>Himpunan Semesta</th>
                  <th>[<?php echo $dmin-$d1; ?>,<?php echo $dmax+$d2; ?>]</th>
                </tr>
                <tr>
                  <th>Jumlah Interval kelas</th>
                  <th><?php echo $k; ?></th>
                </tr>
                <tr>
                  <th>Panjang Interval kelas</th>
                  <th><?php echo $l; ?></th>
                </tr>
              </thead>
            </table>
            <br>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;">Kelas Interval</th>
                </tr>
                <tr>
                  <th>Kelas Interval</th>
                  <th>Nilai</th>
                
                </tr>
              </thead>
              <tbody>
              <?php //for($i = 0; $i < count($year_month); $i++){ ?>
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
                <td><?php echo $nki; ?> - 
                
                <?php  for($j = 0; $j <=$k-1; $j++){ 
                
                    $jki= $nki+$l;}
            ?>
           <?php echo $jki ; ?></td> 
           
                </tr>
                <?php  } ?>
              
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