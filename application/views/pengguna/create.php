<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
          <div class="container">
            <br/><br/><br/>
            <legend>Tambah User</legend>
            <?php $error=$this->session->flashdata('message');
                  if($error) {?>
                  <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
                  </div>
                  <?php }?> 
            <div class="col-xs-12 col-sm-12 col-md-12">
            <?php echo form_open('pengguna/store'); ?>
              
              <div class="form-group">
                <label for="nama">Nama Peternak</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
              </div>
              <div class="form-group">
            <label> Privilege </label>
                  <select class="form-control" name ="privilege" id="privilege"> 
                  <option selected> --Pilih Privilege-- </option>
                  <?php foreach ($user_level as $k) { ?>
                  <option value="<?php echo $k->id_user_level?>"><?php echo $k->user_level?></option>
                <?php } ?>
                </select>
            </div>

              <a class="btn btn-info" href="<?php echo base_url() ?>pengguna">Kembali</a>
              <button type="submit" class="btn btn-primary">OK</button>
            <?php echo form_close() ?>
            </div>
          </div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>