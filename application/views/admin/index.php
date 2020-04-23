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
          <?php if($this->session->userdata('id_user_level') == '1'): ?>
          <div class="box-body">
            <p>Aplikasi ini digunakan untuk : </p>
            <ul>
              <!-- <li>Menambahkan Data User (Pengepul dan Peternak)</li> -->
              <li>Management Data Peternak</li>
              <li>MAnagement Laporan Setoran Telur</li>
              <li>Melihat Rekap Setoran Telur dalam Bentuk Tabel dan Grafik</li>
              <li>Menghitung Peramalan Dengan Metode Fuzzy Time Series Markov Chain</li>
              <li>Menghitung Peramalan</li>
            </ul>
          </div>
          <?php endif; ?>
          <?php if($this->session->userdata('id_user_level') == '2'): ?>
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
          <?php endif; ?>
        </div>        
        <!-- /page content -->

<?php $this->load->view('layouts/footer_admin'); ?>