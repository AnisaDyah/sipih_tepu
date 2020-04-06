<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
                <div class="container">
          <br/><br/><br/>
          <legend>Tambah Data Setoran</legend>
          <div class="col-xs-12 col-sm-12 col-md-12">
          <?php echo form_open_multipart('setoran/store'); ?>

            
            <div class="form-group">
            <label> Nama Peternak </label>
                  <select class="form-control" name ="id_user" id="id_user"> 
                  <option selected> --Pilih Nama Peternak-- </option>
                  <?php foreach ($datauser as $k) { ?>
                  <option value="<?php echo $k->id_user?>"><?php echo $k->nama_lengkap?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
              <label for="tgl_setoran">Tanggal Setoran</label>
              <input type="text" class="form-control" id="tgl_setoran" id="datepicker"name="tgl_setoran" placeholder="(YYYY-MM-DD)">
            </div>
            <div class="form-group">
              <label for="jml_setoran">Jumlah Setoran</label>
              <input type="text" class="form-control" id="jml_setoran" name="jml_setoran" placeholder="Masukkan Jumlah Setoran Telur (Kg)" rows="3">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga (Rp.)">
            </div>
            <div class="form-group">
              <label for="total">Total</label>
              <input type="text" class="form-control" id="total" name="total" placeholder="Masukkan Total (Rp.)">
            </div>
            

            <a class="btn btn-info" href="<?php echo base_url() ?>setoran">Kembali</a>
            <button type="submit" class="btn btn-primary">OK</button>
          <?php echo form_close() ?>
          </div>
        </div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>