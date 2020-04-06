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
                    <h2>Pengguna</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="20%">Nama Peternak</th>
                          <th width="20%">Alamat</th>
                          <th width="15%">Username</th>
                          <th width="10%">Password</th>
                          <th width="10%">Privillage</th>
                          <th width="15%">
                          
                          </th>
                          
                        </tr>
                      </thead>

                      <tbody>
                      <?php foreach ($list as $data => $value) { ?>
                        <tr>
                        <td><?php echo $value->nama_lengkap ?></td>
                        <td><?php echo $value->alamat ?></td>
                        <td><?php echo $value->username ?></td>
                        <td><?php echo $value->password ?></td>
                        
                        <td>
                          <?php foreach ($user_level as $k)
                          {
                            if($k->id_user_level == $value->id_user_level)
                            {?>
                           
                            <?php echo $k->user_level;
                            }
                          }
                          ?>
                        </td>
                       

                          <td>
                              <?php echo form_open('pengguna/destroy/'.$value->id_user)  ?>
                              <a class="btn btn-info" href="<?php echo base_url('pengguna/edit/'.$value->id_user) ?>">
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