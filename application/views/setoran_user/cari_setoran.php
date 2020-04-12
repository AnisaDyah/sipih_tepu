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
                    <h2>Lihat Grafik Setoran Telur Tahun :</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<table class="table table-striped">
<?php echo form_open("Setoran/grafik") ?>

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

    </div>
                </div>
              </div>

              
            </div>
          </div>
        </div>

  
  </div>
</div>
<?php $this->load->view('layouts/footer_admin'); ?>