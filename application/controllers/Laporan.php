<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Laporan extends CI_Controller {
    
        public function __construct()
        {
            parent ::__construct();
            $this->load->library('pdf');
            $this->load->model('Admin_model');
            if($this->session->privilege !='Administrator')
            { 
               redirect('home'); 
            }
        }

        public function index()
        {
            $order = $this->Admin_model->getLaporan();
            $data = [
                "title" => "Produk yang Paling Banyak Terjual",
                "order" => $order
            ];

            $this->pdf->setPaper('A4', 'portrait');
            $this->pdf->load_view('laporan', $data, 'laporan-order.pdf');
        }

    
    }
    
    /* End of file Laporan.php */
    