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
            $data_setor = $this->Peramalan_model->get_tgl($id_user, $tgl_awal, $tgl_akhir);
            
            foreach($data_setor as $key){
                $harga[] = $key->harga;
            }
        //mencari nilai dmin dan d max
            $dmax=max($harga);
            $dmin=min($harga);

			$data['data_setor'] = $data_setor;
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
            $k = round(1 + (3.322 * LOG10(count($data_setor))));
            $data['k']=$k;

            //panjang interval kelas
            $l = round(((($dmax+$d2)-($dmin-$d1)))/$k);
            $data['l']=$l;

            //membuat kelas interval

            $nki=array();
            $jki=array();
            $a=array();
            $b=array();
            $nt=array();
            $interval=array();
            $Fz=array();
            $U=0;
           
            

            for($i = 0; $i <=$k; $i++){
                  if($i==0){
                      $nki=$dmin-$d1;
                  }else{
                $nki= $nki + $l ;
                $interval[]=$nki;
            }
                for($j = 0; $j <=$k-1; $j++){ 
                
                    $jki= $nki+$l;
                }
                $nt[]=($jki+$nki)/2;
            }
                  
            $data['nki']=$nki;
            $data['jki']=$jki;

            //membuat nilai tengah
            $data['nt']=$nt;

            //Fuzzyfikasi
            for($i= 0; $i<count($data_setor); $i++){
                for($j= 0; $j<=$k-1; $j++){
                    if($harga[$i] > $interval[$j]){
                        if($harga[$i] < $interval[$j+1]){
                            $U= $j+1;
                        }
                    }
                }
                $Fz[]=$U+1;
            }
            
            $data['Fz']=$Fz;
            $data['harga']=$harga;

            //FLR dan FLRG
            
            $state1=array();
            $state2=array();
            $flrg=array();
            $cek=array();
            $raw=array();
            $col=array();

            for($i= 0; $i<count($data_setor)-1; $i++){
                $state1[]=$Fz[$i];
                $state2[]=$Fz[$i+1];
                for($j= 1; $j<=$k; $j++){
                    for($m= 1; $m<=$k; $m++){
                        
                       if($state1[$i] == $j){
                           if($state2[$i] == $m){
                               $flrg[$j][$m]=$flrg[$j][$m]+1;
                               //$col[]=$flrg[$j][$m-1];
                           }
                           
                        }
                        else if($flrg[$j][$m] ==null){
                            $flrg[$j][$m]=0;
                        }  
                        
                        $raw[$j]=array_sum($flrg[$j]); 
                        $mat[$j][$m]=$flrg[$j][$m]/$raw[$j]; 
                        if(is_NAN($mat[$j][$m])){
                            $mat[$j][$m]= 0 ;
                        }
                    }
                    
                    
                    
                  
                }
            }
            
            $col=array_reduce($flrg, 'array_merge', array());
            $trik=array_reduce($mat, 'array_merge', array());
            //echo var_dump($cok);
            $data['state1']=$state1;
            $data['state2']=$state2;
            $data['flrg']=$flrg;
            $data['col']=$col;
            $data['trik']=$trik;
            $this->load->view('peramalan/ramal2',$data);
    
        }
	


		

  
}

/* End of file Login.php */
?>
