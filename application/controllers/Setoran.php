<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Setoran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('Setoran_Model');
        $this->load->model('Pengguna_model');
        //Konfigurasi Upload
      
    }

    public function index()
    { 
        $user = $this->Setoran_Model->get_user();

            $data = [
                'list' => $this->Setoran_Model->list(),
                'user' => $user
            ];
        

        $this->load->view('setoran/index', $data);
    }
    
    public function create()
    {
        $user = $this->Setoran_Model->get_user();
        $datauser = ['datauser' => $user];
        $data = [
            'error' => ''
        ];
        $this->load->view('setoran/create', $datauser);
    }

    public function store()
    {
       
            $data = [
                'id_user' => $this->input->post('id_user'),
                'tgl_setoran' =>$this->input->post('tgl_setoran'),
                'jml_setoran' => $this->input->post('jml_setoran'),
                'harga' => $this->input->post('harga'),
                'total' =>$this->input->post('total'),
                'status' =>'data belum dikonfirmasi'
                 ];
            
            if ($this->Setoran_Model->insert($data))
            { 
                helper_log("add", "menambahkan data setoran telur");
                redirect('setoran/index'); 
            }
        

    }

    public function show($id_setoran)
    {
        $setoran = $this->Setoran_Model->show($id_setoran);
        $data = ['data' => $setoran];
        $data['user'] = $this->Setoran_Model->get_user();
        $this->load->view('setoran/show', $data);
    }

    public function edit($id_setoran)
    {
        $setoran = $this->Setoran_Model->show($id_setoran);
        $user = $this->Setoran_Model->get_user();
        $data = ['data' => $setoran,
                'user' => $user
                ];
        $this->load->view('setoran/edit', $data);
    }

    public function update($id_setoran)
    {
        // TODO: implementasi update data berdasarkan $id
        $id_setoran = $this->input->post('id_setoran');
       
            $data = [
                'id_user' => $this->input->post('id_user'),
                'tgl_setoran' =>$this->input->post('tgl_setoran'),
                'jml_setoran' => $this->input->post('jml_setoran'),
                'harga' => $this->input->post('harga'),
                'total' =>$this->input->post('total')
            ];
            $result = $this->Setoran_Model->update($id_setoran, $data);
            if(!$result)
            {
                helper_log("edit", "mengubah data setoran telur");
                redirect('setoran/index');
            }
       
    }

    public function destroy($id_setoran)
    {
        $this->Setoran_Model->delete($id_setoran);
        helper_log("delete", "menghapus data setoran telur");
        redirect('setoran');
    }

    public function tabel(){
        
        $this->load->model('Setoran_model');
        $setoran = $this->Setoran_model->tahun();
        $data = [
          'tahun' => $setoran,
          'user' => $this->Setoran_model->get_user()
        ];
        $this->load->view('setoran/tabel_setoran', $data);
      }

    public function tabel_setoran(){
     
        $id_user=$this->input->post('id_user');
        $tahun=$this->input->post('tahun');
        if(($id_user && $tahun) != null){
          $this->load->model('Setoran_model');
          $setoran = $this->Setoran_model->tabel_setoran($id_user,$tahun);
          $bulan =  $this->Setoran_model->bulan();
          $data = [
          'setoran' => $setoran,
          'bulan' => $bulan,
          'tanggal' => $this->Setoran_model->tanggal(),
          'tahun' => $this->Setoran_model->tahun(),
          'user' => $this->Setoran_Model->get_user()
        ];
        
        $this->load->view('setoran/tabel_setoran', $data);
    } else {
        echo"data tidak ditemukan";
      }
     
     
      }

    function grafik(){
        $id_user = $this->session->userdata('id_user');
        $tahun = $this->input->post('tahun');
        
        $user_level= $this->session->userdata('id_user_level');
        if($user_level == '1'){
        $this->load->model('M_grafik');
        $x['data']=$this->M_grafik->get_data_stok();
        $x['user']=$this->Pengguna_model->list();
        $this->load->view('setoran/grafik_setoran',$x);
        } else{
            $this->load->model('M_grafik');
            $x['data']=$this->M_grafik->get_user_stok($id_user,$tahun);
          
            $this->load->view('setoran_user/grafik_setoran',$x);
        }
    }

    function cari_setoran(){

        $this->load->model('Setoran_Model');
        $tahun = $this->Setoran_Model->tahun();
            $data['tahun']=$tahun;
            $this->load->view('setoran_user/cari_setoran',$data);
        
    }


    public function setoran_user()
    { 
        $id_user = $this->session->userdata('id_user');
        $user = $this->Setoran_Model->get_user();
        $setoran_user = $this->Setoran_Model->setoran_user($id_user);
            $data = [
                'user' => $user,
                'setoran_user'=>$setoran_user
            ];
        

        $this->load->view('setoran_user/setoran_user', $data);
    }
    public function change_status()
        {
            $this->Setoran_Model->change_status();
            helper_log("validasi", "user telah validasi data setoran");
            redirect('setoran/setoran_user','refresh');
        }

    
}

/* End of file setoran.php */


?>