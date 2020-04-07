<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peramalan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url', 'form');
        $this->load->model('Login_model');
        $this->load->model('Peramalan_model');
    }
    public function index()
    {
        $user = $this->Peramalan_model->get_user();
        $data = [
          'user' => $user
        ];
        $this->load->view('peramalan/ramal1',$data);
    }

    public function ramal2()
    {
        $id_user=$this->input->post('id_user');
       
      
        $tgl_awal=$this->input->post('tgl_awal');
        $tgl_akhir=$this->input->post('tgl_akhir');
        $harga=array();
        
        //mengambil data yang akan diramal
            $data_jual = $this->Peramalan_model->get_tgl($id_user, $tgl_awal, $tgl_akhir);
            
            foreach($data_jual as $key){
                $harga[] = $key->harga;
            }
        //mencari nilai dmin dan d max
            $dmax=max($harga);
            $dmin=min($harga);

			$data['data_jual'] = $data_jual;
            $data['dmax']=$dmax;
            $data['dmin']=$dmin;

        //mencari nilai d1 dan d2
            $x=substr($dmin,2,3);
            $y=substr($dmax,2,3);

            if($x<500){
                $d1=$dmin-($dmin-$x);
            }else{
                $d1=$x-500;
            }

            if($y<=500){
                $d2=500-$y;
            }else{
                $d2=($dmax+(1000-$y))-$dmax;
            }

            $data['d1']=$d1;
            $data['d2']=$d2;

            //jumlah interval kelas
            $k = round(1 + (3.322 * LOG10(count($data_jual))));
            $data['k']=$k;

            //panjang interval kelas
            $l = round(((($dmax+$d2)-($dmin-$d1)))/$k);
            $data['l']=$l;

            //membuat kelas interval

            $nki=array();
            $jki=array();
            $jki=$dmin-$d1;
            $data['nki']=$nki;
            $data['jki']=$jki;
            $this->load->view('peramalan/ramal2',$data);
    
        }
	


		

  
}

/* End of file Login.php */
?>
