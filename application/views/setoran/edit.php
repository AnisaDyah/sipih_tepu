<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
              <div class="container">
        <br/>
        <legend>Edit setoran</legend>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <?php echo form_open_multipart('setoran/update/'.$data->id_setoran); ?>
          <?php echo form_hidden('id_setoran', $data->id_setoran) ?>
   
         
          <label> Nama Peternak </label>
                <select class="form-control" name ="id_user" id="id_user"> 
                <option selected>
                <?php
                  foreach($user as $k) {
                    $s='';
                      if($k->id_user == $data->id_user)
                      { $s='selected'; }
                ?>
                  <option value="<?php echo $k->id_user ?>" <?php echo $s ?>>
                    <?php echo $k->nama_lengkap ?>
                  </option>
                  <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <label for="tgl_setoran">Tanggal Setoran</label>
            <input type="text" class="form-control" id="tgl_setoran" name="tgl_setoran" placeholder="Masukkan Tanggal Setoran" rows="3"
            value="<?php echo $data->tgl_setoran ?>">
          </div>
         
          <div class="form-group">
            <label for="jml_setoran">Jumlah Setoran</label>
            <input type="text" class="form-control" id="jml_setoranstok" name="jml_setoran" placeholder="Masukkan Jumlah Setoran"
            value="<?php echo $data->jml_setoran ?>">
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga"
            value="<?php echo $data->harga ?>">
          </div>
          <div class="form-group">
            <label for="total">Total Harga</label>
            <input type="text" class="form-control" id="total" name="total" placeholder="Masukkan Total Harga"
            value="<?php echo $data->total ?>">
          </div>

          <a class="btn btn-info" href="<?php echo base_url('setoran/') ?>">Kembali</a>
          <button type="submit" class="btn btn-primary">OK</button>
        <?php echo form_close(); ?>
        </div>
      </div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>