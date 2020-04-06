<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
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
                    <h2>Setoran Telur</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="20%">Nama Peternak</th>
                          <th width="20%">Tanggal Setoran</th>
                          <th width="15%">Jumlah Setoran</th>
                          <th width="10%">Harga</th>
                          <th width="10%">Total</th>
                          <th width="10%">Status</th>
                          <th width="15%">
                         
                          </th>
                          
                        </tr>
                      </thead>

                      <tbody>
                      <?php foreach ($list as $data => $value) { ?>
                        <tr>
                      
                        
                        <td>
                          <?php foreach ($user as $k)
                          {
                            if($k->id_user == $value->id_user)
                            {?>
                            <!-- <a href="<?php echo base_url('setoran/show/'.$value->id_setoran) ?>"><span class="label label-success pull-right">Lihat Detail</span></a> -->
                            <?php echo $k->nama_lengkap;
                            }
                          }
                          ?>
                        </td>
                        <td><?php echo $value->tgl_setoran ?></td>
                        <td><?php echo $value->jml_setoran ?></td>
                        <td><?php echo $value->harga ?></td>
                        <td><?php echo $value->total ?></td>
                        <td>
                            <?php 
						    switch ($value->status) {
                                case 'data belum dikonfirmasi':
                                echo '<center><span class="label label-danger">data belum dikonfirmasi</span></center>';
                                break;
                                case 'data telah dikonfirmasi':
                                echo '<center><span class="label label-success">data telah dikonfirmasi</span></center>';
                                break;
                                case 'data perlu dikoreksi lagi':
                                echo '<center><span class="label label-warning">data perlu dikoreksi lagi</span></center>';
                                break;
                                
                            } ?>
                            </td>

                          <td>
                              <?php echo form_open('setoran/destroy/'.$value->id_setoran)  ?>
                              <a class="btn btn-info" href="<?php echo base_url('setoran/edit/'.$value->id_setoran) ?>">
                              <i class="fa fa-pencil"></i>
                              </a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-close"></i></button>
                              <?php echo form_close() ?>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>