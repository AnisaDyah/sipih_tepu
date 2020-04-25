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
                $this->form_validation->set_rules('id_user', 'ID User', 'required');
                $this->form_validation->set_rules('tgl_setoran', 'Tanggal', 'required');
                $this->form_validation->set_rules('jml_setoran', 'Jumlah', 'required');
                $this->form_validation->set_rules('harga', 'Harga', 'required');
                $this->form_validation->set_rules('total', 'Tanggal', 'required');
       
                if ($this->form_validation->run() != FALSE) {
            $data = [
                'id_user' => $this->input->post('id_user'),
                'tgl_setoran' =>date_format(date_create($this->input->post('tgl_setoran')), 'Y-m-d'),
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
        }else{
            $this->session->set_flashdata('message', 'data harus diisi semua !');
            redirect('setoran/create');
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
                'tgl_setoran' =>date_format(date_create($this->input->post('tgl_setoran')), 'Y-m-d'),
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
        $this->load->view('setoran/setoran_tabel', $data);
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

    function grafik_user(){
        $setoran_chart_user=array();
        $id_user = $this->session->userdata('id_user');
        $tahun = $this->input->post('tahun');
        $this->load->model('M_grafik');
        $setoran_user=$this->M_grafik->get_user_stok($id_user,$tahun);
        foreach($setoran_user as $soa){
            $jml_setor_user[]=$soa->jml_setoran;
            $tgl_setor[]=$soa->tgl_setoran;
        }
        for ($i=0; $i < count($setoran_user); $i++) {
            array_push($setoran_chart_user, array(
				"jml_setor_user"=>$jml_setor_user[$i],
                "tgl_setor"=>$tgl_setor[$i],
				)
            );
        }
        $data['setoran_chart_user']=json_encode($setoran_chart_user);
        $this->load->view('setoran_user/grafik_setoran',$data);
    }

    function grafik_admin(){
        $setoran_chart=array();
        $this->load->model('M_grafik');
        $setoran=$this->M_grafik->get_data_stok_bytahun();
        $user=$this->Pengguna_model->list();
        foreach($setoran as $key){
        
            $jml_setor[]=$key->jml_setoran1;
            $jml_setor2[]=$key->jml_setoran2;
            
            foreach($user as $var){
                if($key->id_user == $var->id_user){
                    $nama_peternak[]=$var->nama_lengkap;
                    $id_user[]=$var->id_user;
                }
            }
        }
        for ($i=0; $i < count($nama_peternak); $i++) {
            array_push($setoran_chart, array(
                "jml_setor"=>round($jml_setor[$i],2),
                "jml_setor2"=>round($jml_setor2[$i],2),
                "nama_peternak"=>$nama_peternak[$i],
                "id_user"=>$id_user[$i],
				)
            );
        }
        $data['setoran_chart']=json_encode($setoran_chart);
        $this->load->view('setoran/grafik_setoran',$data);
        
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

        public function setoran_tabel(){
     
            $id_user=$this->input->post('id_user');
            $tahun=$this->input->post('tahun');
            $this->load->model('Setoran_model');
            $setoran = $this->Setoran_model->setoran_tabel($id_user,$tahun);
            
            if($this->Setoran_model->setoran_tabel($id_user,$tahun)){
               
              $data = [
                'tahun' => $this->Setoran_model->tahun(),
              'setoran' => $setoran,
              'user' => $this->Setoran_Model->get_user()
            ];
            
            $this->load->view('setoran/setoran_tabel', $data);
        } else {
            $this->session->set_flashdata('message', 'data tidak ditemukan !');
            redirect('setoran/tabel');
          }
         
         
          }

    

    
}

/* End of file setoran.php */


?>