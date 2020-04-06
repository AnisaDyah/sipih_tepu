<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
            <div class="container">
      <br/><br/><br/>
      <legend>Edit User</legend>
      <div class="col-xs-12 col-sm-12 col-md-12">
      <?php echo form_open('pengguna/update/'.$pengguna->id_user); ?>
        <?php echo form_hidden('id_user', $pengguna->id_user) ?>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama" value="<?php echo $pengguna->nama_lengkap ?>">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $pengguna->alamat ?>">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?php echo $pengguna->username ?>">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="<?php echo $pengguna->password ?>">
        </div>
        <div class="form-group">
          <label> Privilege </label>
              <select class="form-control" name ="privilege" id="privilege"> 
                <option selected>
                <?php
                  foreach($user_level as $k) {
                    $s='';
                      if($k->id_user_level == $pengguna->id_user_level)
                      { $s='selected'; }
                ?>
                 <option value="<?php echo $k->id_user_level ?>" <?php echo $s ?>>
                    <?php echo $k->user_level ?>
                  </option>
                  <?php } ?>
            </select>
        </div>

        <a class="btn btn-info" href="<?php echo base_url('pengguna/index') ?>">Kembali</a>
        <button type="submit" class="btn btn-primary">OK</button>
      <?php echo form_close(); ?>
      </div>
</div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>