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
<?php $error=$this->session->flashdata('message');
                  if($error) {?>
                  <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
                  </div>
                  <?php }?> 
<?php echo form_open("Setoran/setoran_tabel") ?>
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
 
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php if (isset($setoran)) { ?>
    <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="5" style="text-align: center;" bgcolor="#90EE90">Rekap Setoran Telur Tahun <?php echo $this->input->post('tahun')?></th>
                </tr>
                <tr>
                  <th rowspan="2" style="text-align: center;">Periode</th>
                  <th colspan="3" style="text-align: center;">Nama Peternak : <?php foreach($user as $key){ 
        if($key->id_user == $this->input->post('id_user')){
          echo $key->nama_lengkap; ?>
         <?php }
        }?></th>
                </tr>
                <tr>
                <th>Jumlah Setoran</th>
                <th>Harga/Kg</th>
                <th>Total</th>
                </tr>
              </thead>
              <tbody>
              <?php //for($i = 0; $i < count($year_month); $i++){ ?>
                <?php foreach($setoran as $key){ ?>
                <tr>
                <td><?php echo "'".date_format(date_create($key->tgl_setoran), "d F Y");?></td>
                <td><?php echo $key->jml_setoran."&nbsp Kg" ?></td>
                <td><?php echo "Rp.".number_format($key->harga, 0, ',', '.'); ?></td>
                <td><?php echo "Rp.".number_format($key->total, 0, ',', '.');?></td>
                </tr>
                <?php  } ?>
                <?php } ?>
              </tbody>
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