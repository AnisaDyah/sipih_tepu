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
                          
                          
                        </tr>
                      </thead>

                      <tbody>
                      <?php foreach ($setoran_user as $value) { ?>
                        <tr>
                      
                        
                        <td>
                          <?php foreach ($user as $k)
                          {
                            if($k->id_user == $value->id_user)
                            {?>
                           
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
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-change-status<?php echo $value->id_setoran ?>" data-id="<?php echo $value->id_setoran ?>" data-status="<?php echo $value->status ?>" >
                Konfirmasi
              </button>
              <div class="modal fade" id="modal-change-status<?php echo $value->id_setoran ?>" tabindex="-1" role="dialog" aria-labelledby="modal-change-status-Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-change-status-Label">Konfirmasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo base_url('Setoran/change_status') ?>" method="post" id="konfirmasi-status-form<?php echo $value->id_setoran ?>">
                        <input type="hidden" name="id" value="<?php echo $value->id_setoran?>" id="id">
                        <select class="form-control" name="status" id="status">
                          <option value="data telah dikonfirmasi">Data Benar</option>
                          <option value="data perlu dikoreksi lagi">Data Salah</option>
                        </select>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" form="konfirmasi-status-form<?php echo $value->id_setoran?>" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
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