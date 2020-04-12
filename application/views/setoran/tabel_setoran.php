<?php $this->load->view('layouts/header_admin'); ?>
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
                    <h2>Tabel Rekap Setoran Telur</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<table class="table table-striped">
<?php echo form_open("Setoran/tabel_setoran") ?>
<td>
<label> Nama Peternak : </label>
<select name="id_user" class="form-control" required>
      <option selected> Pilih Peternak</option>
      <?php foreach($user as $key){ ?>
      <option value="<?php echo $key->id_user ;?>">  <?php echo $key->nama_lengkap ; ?></option>
      <?php } ?>
      </select>
</td>
<td><label for="tahun">Tahun </label>
      <select name="tahun" class="form-control" required>
      <option selected> Pilih Tahun</option>
      <?php foreach($tahun as $row){ ?>

      <option value="<?php echo $row->tahun;?>">  <?php echo $row->tahun; ?></option>
      <?php } ?>
      </select>
      </td>
<td><input type="submit" class="btn btn-primary" value="Search"></td>

<?php echo form_close() ?>
</table>
  <legend>Rekap Setoran Telur Tahun : <?php echo $this->input->post('tahun')?></legend>
  <legend>Nama Peternak : <?php foreach($user as $key){ 
        if($key->id_user == $this->input->post('id_user')){
          echo $key->nama_lengkap; ?>
         <?php }
        }?>
  </legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php if (isset($setoran)) { ?>
  
    <table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
            <th rowspan="1" bgcolor="#273e81">Bulan</th>
            <th colspan="3" bgcolor="#90EE90">Januari</th>
            <th colspan="3" bgcolor="#90EE90">Februari</th>
            <th colspan="3" bgcolor="#90EE90">Maret</th>
            <th colspan="3" bgcolor="#90EE90">April</th>
            <th colspan="3" bgcolor="#90EE90">Mei</th>
            <th colspan="3" bgcolor="#90EE90">Juni</th>
            </tr>
            <tr>
            <th>Tgl</th>
        
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php $number = 1; foreach($setoran as $row) { ?>
        <tr>
        
            
            <tr>
                
            <td>
           
               <?php echo $row->tanggal ?> 
     
          </td>
            <td>
                <?php echo $row->setoran_jan ?>
              </a>
            </td>
            <td>
                <?php echo $row->harga_jan ?>
              </a>
            </td>
            <td>
                <?php echo $row->setoran_jan*$row->harga_jan ?>
              </a>
            </td>
           
            <td>
                <?php echo $row->setoran_feb ?>
              </a>
            </td>
            <td>
                <?php echo $row->harga_feb ?>
              </a>
            </td>
            <td>
                <?php echo $row->setoran_feb*$row->harga_feb ?>
              </a>
            </td>
         
         <td>
             <?php echo $row->setoran_mar ?>
           </a>
         </td>
         <td>
             <?php echo $row->harga_mar ?>
           </a>
         </td>
         <td>
             <?php echo $row->setoran_mar*$row->harga_mar ?>
           </a>
         </td>
         <td>
             <?php echo $row->setoran_apr ?>
           </a>
         </td>
         <td>
             <?php echo $row->harga_apr ?>
           </a>
         </td>
         <td>
             <?php echo $row->setoran_apr*$row->harga_apr ?>
           </a>
         </td>
         <td>
             <?php echo $row->setoran_mei ?>
           </a>
         </td>
         <td>
             <?php echo $row->harga_mei ?>
           </a>
         </td>
         <td>
             <?php echo $row->setoran_mei*$row->harga_mei ?>
           </a>
         </td>
         <td>
             <?php echo $row->setoran_jun ?>
           </a>
         </td>
         <td>
             <?php echo $row->harga_jun ?>
           </a>
         </td>
         <td>
             <?php echo $row->setoran_jun*$row->harga_jun ?>
           </a>
         </td>
        </tr>
        </tbody>
        <?php } ?>
        <thead>
          <tr>
          <th rowspan="1" bgcolor="#273e81">Bulan</th>
            <th colspan="3" bgcolor="#90EE90">Juli</th>
            <th colspan="3" bgcolor="#90EE90">Agustus</th>
            <th colspan="3" bgcolor="#90EE90">September</th>
            <th colspan="3" bgcolor="#90EE90">Oktober</th>
            <th colspan="3" bgcolor="#90EE90">November</th>
            <th colspan="3" bgcolor="#90EE90">Desember</th>
        </tr>
        
        <tr>
<th>Tgl</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
            <th >Kg</th>
            <th >Rp.</th>
            <th>Total</th>
          </tr>
          <thead>
         
        
        <?php $number = 1; foreach($setoran as $row) { ?>
        <tbody>  
          <tr>
              
      <td>
           
           <?php echo $row->tanggal ?> 
 
      </td>
       <td>
           <?php echo $row->harga_jul ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_jul ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_jul*$row->harga_jul ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_ags ?>
         </a>
       </td>
       <td>
           <?php echo $row->harga_ags ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_ags*$row->harga_ags ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_sep ?>
         </a>
       </td>
       <td>
           <?php echo $row->harga_sep ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_sep*$row->harga_sep ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_okt ?>
         </a>
       </td>
       <td>
           <?php echo $row->harga_okt ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_okt*$row->harga_okt ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_nov ?>
         </a>
       </td>
       <td>
           <?php echo $row->harga_nov ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_nov*$row->harga_nov ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_des ?>
         </a>
       </td>
       <td>
           <?php echo $row->harga_des ?>
         </a>
       </td>
       <td>
           <?php echo $row->setoran_des*$row->harga_des ?>
         </a>
       </td>
      
        </tr>
        </tbody>
          
    <?php } 
  }
  ?>
    </table>
    </div>
                </div>
              </div>

              
            </div>
          </div>
        </div>

  
  </div>
</div>
<?php $this->load->view('layouts/footer_admin'); ?>