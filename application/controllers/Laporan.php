<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Laporan extends CI_Controller {
    
        public function __construct()
        {
            parent ::__construct();
            $this->load->library('pdf');
            $this->load->model('Setoran_Model');
            
        }

        public function index()
        {
            $user_level= $this->session->userdata('id_user_level');
            if($user_level == '1'){
            $this->load->model('Peramalan_model');
            $user = $this->Peramalan_model->get_user();
            $data['user']=$user;
            $this->load->view('setoran/laporan_setoran',$data);
            }else{
                $this->load->model('Peramalan_model');
            $user = $this->Peramalan_model->get_user();
            $data['user']=$user;
            $this->load->view('setoran_user/laporan_setoran',$data);
            }
        }

        //export setoran
    
    public function export_setoran()
	{
        $user_level= $this->session->userdata('id_user_level');
        if($user_level == '1'){
        $id_user = $this->input->post('id_user');
        }else{
            $id_user= $this->session->userdata('id_user');
        }
        $tgl_awal = date_format(date_create($this->input->post('tgl_awal')), 'Y-m-d');
        $tgl_akhir = date_format(date_create($this->input->post('tgl_akhir')), 'Y-m-d');
        $this->load->model('Peramalan_model');
        $user = $this->Peramalan_model->get_user();
        $data['user']=$user;
        if($id_user == NULL){
            $data['setoran'] = $this->Setoran_Model->export_setoran($tgl_awal, $tgl_akhir);
        }else{
            $data['setoran'] = $this->Setoran_Model->export_setoran_user($id_user,$tgl_awal, $tgl_akhir);
        }
		
		$this->load->view('setoran/excel_setoran', $data);
	}

    
    }
    
    /* End of file Laporan.php */
    