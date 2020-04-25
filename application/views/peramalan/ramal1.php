
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
                    <h2>Pilih Data Training Perhitungan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php $error=$this->session->flashdata('message');
                  if($error) {?>
                  <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
                  </div>
                  <?php }?> 
          <!-- /.box-header -->
          <form role="form" action="<?php echo site_url('peramalan/ramal2') ?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label>Bulan Awal</label>
                <input type="text" name="tgl_awal" class="form-control pull-right" id="datepickerbulan" placeholder="Pilih Bulan Awal Data yang Akan Dihitung">
              </div>
              <div class="form-group">
                <label>Bulan Akhir</label>
                <input type="text" name="tgl_akhir" class="form-control pull-right" id="datepickerbulan2" placeholder="Pilih Bulan Akhir Data yang Akan Dihitung">
              </div>
               <!-- /.box-body -->
          </div>
              </div>
              </div>

              <div class="x_panel">
              <div class="x_content">
          <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label>Pilih bulan yang akan di ramal</label>
                <input type="text" name="tgl_ramal" class="form-control pull-right" id="datepickerbulan3" placeholder="Pilih Bulan yang Akan Diramal">
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