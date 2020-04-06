<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class History extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url', 'form');
            $this->load->model('M_log');
            $this->load->model('Setoran_Model');
            $this->load->model('Pengguna_model');
        }

        public function index()
        {
            
            $user = $this->Setoran_Model->get_user();
            $riwayat = $this->M_log->histori_admin();
            $user_level = $this->Pengguna_model->user_level();
            $data = [
                'user' => $user,
                'riwayat'=>$riwayat,
                'user_level'=> $user_level
            ];
            $this->load->view('history/history_admin', $data);
        }

        public function riwayat_user()
        {
            $id_user = $this->session->userdata('id_user');
            $data['riwayat'] = $this->User_model->getRiwayat($id_user);
            $this->load->view('sippko/historiorder', $data);
        }

    }
    
    /* End of file .php */
