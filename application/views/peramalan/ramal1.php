
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
          <!-- /.box-header -->
          <form role="form" action="<?php echo site_url('peramalan/ramal2') ?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label>Bulan Awal</label>
                <input type="text" name="tgl_awal" class="form-control pull-right" id="datepickerbulan">
              </div>
              <div class="form-group">
                <label>Bulan Yang ingin diramal</label>
                <input type="text" name="tgl_akhir" class="form-control pull-right" id="datepickerbulan2">
              </div>
              <!-- <div class="form-group">
                <label>Produk</label>
                <select class="form-control select2" name="produk">
                  <?php //foreach ($produk as $key): ?>
                    <option value="<?php //echo $key->id_produk; ?>"><?php //echo $key->nama_produk; ?></option>
                  <?php //endforeach ?>
                </select>
              </div> -->
              <div class="form-group">
                <label>setoran dari Peternak : </label>
                <select class="form-control select2" name="id_user">
                  <?php foreach ($user as $key): ?>
                    <option value="<?php echo $key->id_user; ?>"><?php echo $key->nama_lengkap; ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            
            <div class="box-footer">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
          <!-- /.box-body -->
          </div>
              </div>

              
            </div>
          </div>
        </div>

  
  </div>
</div>
<?php $this->load->view('layouts/footer_admin'); ?>