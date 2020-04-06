<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
              <div class="container">
        <br/>
        <legend>Lihat Detail Setoran</legend>
        <div class="content">
          
          <div class="form-group">
            <label for="nama_lengkap">Nama Peternak</label>
            <p><?php foreach ($user as $k)
              {
                if($k->id_user == $data->id_user)
                {
                  echo $k->nama_lengkap;
                }
              }
              ?></p>
          </div>
          <div class="form-group">
            <label for="tgl_setoran">Tanggal Setoran</label>
            <p><?php echo $data->tgl_setoran ?></p>
          </div>
          
          <div class="form-group">
            <label for="jml_setoran">Jumlah Setoran</label>
            <p><?php echo $data->jml_setoran ?></p>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <p><?php echo $data->harga ?></p>
          </div>
          <div class="form-group">
            <label for="total">Total Harga</label>
            <p><?php echo $data->total ?></p>
          </div>
          <a class="btn btn-info" href="<?php echo base_url('setoran/') ?>">Kembali</a>
        </div>
      </div>

        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>