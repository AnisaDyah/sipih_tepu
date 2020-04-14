
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
                    <h2>Cetak Laporan Setoran:</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form role="form" action="<?php echo site_url('Laporan/export_setoran') ?>" method="post">
            <div class="box-body">
            
              <div class="form-group">
                <label>Tanggal Awal</label>
                <input type="text" name="tgl_awal" class="form-control pull-right" id="datepicker" placeholder="YYYY-MM-DD">
              </div>
              <div class="form-group">
                <label>Tanggal Akhir</label>
                <input type="text" name="tgl_akhir" class="form-control pull-right" id="datepicker2" placeholder="YYYY-MM-DD">
              </div>
            </div>
            <div class="box-footer">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>

    </div>
                </div>
              </div>

              
            </div>
          </div>
        </div>

  
  </div>
</div>
<?php $this->load->view('layouts/footer_admin'); ?>