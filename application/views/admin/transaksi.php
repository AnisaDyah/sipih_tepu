
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
                    <h2>Transaksi</h2>
                    <a class="btn btn-info pull-right" href="<?php echo base_url('laporan/') ?>">
                        Laporan
                    </a>
                    <div class="clearfix">
                    </div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Order</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No.Telp</th>
                            <th>Bukti Transfer</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php foreach ($konfirmasi as $data => $value) { ?>
                        <tr>
                            <td><?php echo ++$data ?></td>
                            <td><?php echo $value['tanggal']?></td>
                            <td><?php echo $value['nama']?></td>
                            <td><?php echo $value['alamat']?></td>
                            <td><?php echo $value['notelp']?></td>
                            <td>
                            <!-- <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal"> -->
                              <center>
                                <?php if ($value['bukti_tf'] != null) {?>
                                  <a href = "<?php echo base_url('assets/buktitf/'.$value['bukti_tf'])?>"><img src="<?php echo base_url('assets/buktitf/'.$value['bukti_tf'])?>" width="100" height="100"></a>
                                <?php } ?>
                              </center>
                            <!-- </button> -->
                            </td>
                            <td>
                            <?php 
						    switch ($value['status']) {
                                case 'sudah di bayar':
                                echo '<center><span class="label label-danger">Sudah Dibayar</span></center>';
                                break;
                                case 'sudah di kirim':
                                echo '<center><span class="label label-success">Sudah Dikirim</span></center>';
                                break;
                                case 'Belum Dikonfirmasi Admin':
                                echo '<center><span class="label label-warning">Belum Dikonfirmasi Admin</span></center>';
                                break;
                                default:
                                echo '<center><span class="label label-default">Belum Dibayar</span></center>';
                                break;
                            } ?>
                            </td><td>
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-change-status<?php echo $value['id'] ?>" data-id="<?php echo $value['id'] ?>" data-status="<?php echo $value['status'] ?>">
                Ubah Status
              </button>
              <div class="modal fade" id="modal-change-status<?php echo $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-change-status-Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-change-status-Label">Ubah Status</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo base_url('Admin/change_status') ?>" method="post" id="konfirmasi-status-form<?php echo $value['id'] ?>">
                        <input type="hidden" name="id" value="<?php echo $value['id']?>" id="id">
                        <select class="form-control" name="status" id="status">
                          <option value="sudah di bayar">Sudah di bayar</option>
                          <option value="sudah di kirim">Sudah di kirim</option>
                        </select>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" form="konfirmasi-status-form<?php echo $value['id'] ?>" class="btn btn-primary">Save changes</button>
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
    <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Bukti Pembayaran</h4>
            </div>
            <div class="modal-body">
            <center>  
                <img src="<?php echo base_url('assets/buktitf/'.$value['bukti_tf'])?>" alt="" class="img-responsive">
            </center>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
            </div>
        </div>
        </div>
    </div> -->
  </div>
</div>
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>