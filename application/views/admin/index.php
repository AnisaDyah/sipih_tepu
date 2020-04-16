<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
        <!-- <h1 style="text-align:center">SELAMAT DATANG ADMIN</h1> -->
        <div class="box-header">
            <h3 class="box-title">
              Penjelasan Aplikasi
            </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <p>Aplikasi ini digunakan untuk : </p>
            <ul>
              <!-- <li>Menambahkan Data User (Pengepul dan Peternak)</li> -->
              <li>Memvalidasi Data Setoran Telur</li>
              <li>Melihat Laporan Setoran Telur</li>
              <li>Melihat Rekap Setoran Telur dalam Bentuk Grafik</li>
              <li>Menghitung Peramalan</li>
            </ul>
          </div>
        </div>        
        <!-- /page content -->

<?php $this->load->view('layouts/footer_admin'); ?>