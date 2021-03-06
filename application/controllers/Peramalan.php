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
        
        $tgl_awal=date_format(date_create($this->input->post('tgl_awal')), 'Y-m-d');
        $bulan_awal=substr($tgl_awal,5,2);
        $tahun_awal=substr($tgl_awal,0,4);

        $tgl_akhir=date_format(date_create($this->input->post('tgl_akhir')), 'Y-m-d');
        $bulan_akhir=substr($tgl_akhir,5,2);
        $tahun_akhir=substr($tgl_akhir,0,4);

        $tgl_ramal=date_format(date_create($this->input->post('tgl_ramal')), 'Y-m-d');
        $bulan_ramal=substr($tgl_ramal,5,2);
        $tahun_ramal=substr($tgl_ramal,0,4);
 
            $minggu_awal=$this->Peramalan_model->get_minggu($tgl_akhir);
            $minggu_akhir=$this->Peramalan_model->get_minggu($tgl_ramal);

            $week_awal = $minggu_awal['mingguke'];
            $week_akhir = $minggu_akhir['mingguke']; 

           

            if(($tahun_ramal-$tahun_akhir) == 0){
                $jangka_waktu=($week_akhir-$week_awal+1);
                for($i=0;$i<$jangka_waktu;$i++){    
                    $week[$i]=($week_awal)+$i;
                    $year=$tahun_akhir;
                    $date1[$i] = date( "d F Y", strtotime($year."W".$week[$i]."1") ); // First day of week
                    $date2[$i] = date( "d F Y", strtotime($year."W".$week[$i]."7") ); // Last day of week

                    $rangeminggu[$i]=$date1[$i] . " - " . $date2[$i];
                }
                $bulan = ($bulan_akhir-$bulan_awal);
           }else if(($tahun_ramal-$tahun_akhir) > 0){
                $jangka_waktu=($week_akhir+(52-$week_awal))+1;
                for($i=0;$i<$jangka_waktu;$i++){
                    $x=(52-$week_awal);
                    if($i <= $x){
                        $week[$i]=($week_awal)+$i;
                        if(strlen($week[$i])==1){
                            $text[$i]=(string)$week[$i];
                            $qwe[$i]="0".$text[$i];
                        }
                        else{
                            $qwe[$i]=$week[$i];
                        }
                        $year=$tahun_akhir;
                        $date1[$i] = date( "d F Y", strtotime($year."W".$qwe[$i]."1") ); // First day of week
                        $date2[$i] = date( "d F Y", strtotime($year."W".$qwe[$i]."7") ); // Last day of week
                    }else{
                        //for($j=1;$j<=$i;$j++){
                        $week1[$i]=$i-$x;
                        if(strlen($week1[$i])==1){
                            $text[$i]=(string)$week1[$i];
                            $qwe[$i]="0".$text[$i];
                        }
                        else{
                            $qwe[$i]=$week1[$i];
                        }
                        $year=$tahun_ramal;
                        $date1[$i] = date( "d F Y", strtotime($year."W".$qwe[$i]."1") ); // First day of week
                        $date2[$i] = date( "d F Y", strtotime($year."W".$qwe[$i]."7") ); // Last day of week
                        //}
                    }
                    
                    $rangeminggu[$i]=$date1[$i] . " - " . $date2[$i];
                }
                $bulan = $bulan_akhir+(12-$bulan_awal);
           }else if(($tahun_ramal-$tahun_akhir)< 0){
            $this->session->set_flashdata('message', 'Invalid Input');
            redirect('peramalan/');
           }
        
        
        $bulan_tahun1=substr($tgl_akhir,0,7);
        $harga=array();
        $response_databiasa = array();
        
        
        //mengambil data yang akan diramal
        if(($tahun_akhir-$tahun_awal) >= 0){
            if($tgl_ramal >= $tgl_akhir){
                if($this->Peramalan_model->get_bulantahun1($bulan_tahun1)){
            
            $data_setor = $this->Peramalan_model->get_bybulan($tgl_awal, $tgl_akhir);
            $harga=array();
            $tgl_setor=array();
            foreach($data_setor as $key){
                $harga[] = $key->harga;
                $tgl_setor[]=$key->tgl_setoran;
            }
        //mencari nilai dmin dan d max
            $dmax=max($harga);
            $dmin=min($harga);

            $data['data_setor'] = $data_setor;
            $data['tgl_setor']=$tgl_setor;
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
                      $nki[$i]=$dmin-$d1;
                  }else{
                $nki[$i]= $nki[$i-1] + $l ;
               // $interval[]=$nki;
            }
                
               $nt[$i]=($nki[$i-1]+$nki[$i])/2;
            }
                  
            $data['nki']=$nki;
            $data['jki']=$jki;

            //membuat nilai tengah
            $data['nt']=$nt;

            //Fuzzyfikasi
            for($i= 0; $i<count($data_setor); $i++){
                for($j= 0; $j<=$k-1; $j++){
                    if($harga[$i] >= $nki[$j]){
                        if($harga[$i] <= $nki[$j+1]){
                            $Fz[$i]= $j+1;
                        }else{
                            $Fz[$i]=$k;
                        }
                    }
                }
                //$Fz[]=$U+1;
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
                               $relasi[]=$j."-".$m;
                               $start[]=$j;
                           }
                           
                        }
                        else if($flrg[$j][$m] ==null){
                            $flrg[$j][$m]=0;
                        }  
                        
                        $raw[$j]=array_sum($flrg[$j]); 
                        $rawcol[$j]=$flrg[$j];
                        $mat[$j][$m]=$flrg[$j][$m]/$raw[$j]; 
                        if(is_NAN($mat[$j][$m])){
                            $mat[$j][$m]= 0 ;
                        }
                    }
                 
                }
            }
            
            
            $col=array_reduce($flrg, 'array_merge', array());
            $trik=array_reduce($mat, 'array_merge', array());
          
            $new_array= array_filter($col);
            $flrg2=(array_count_values($relasi));
            
            //$asu=array_keys($fak);
            //$cok=asort($new_array);
            //echo var_dump($raw);
            $data['state1']=$state1;
            $data['state2']=$state2;
            $data['rawcol']=$rawcol;
            $data['raw']=$raw;
            $data['new_array']=$new_array;
            $data['trik']=$mat;
            $data['relasi']=$flrg2;

            //Peramalan sementara
            for($i= 0; $i<count($data_setor); $i++){
                
                if($i==0){
                    $Ft[$i]=0;
                }else{
                $j=$Fz[$i-1];
                      if(count($rawcol[$j])== 1){
                          $Ft[$i]=$nt[$j];
                      }else{
                          for($n=1 ; $n<=$j-1 ; $n++){
                          $depan[$i]=$depan[$i]+$nt[$n]*$mat[$j][$n];
                         }
                          //$nt[$j-1]*$mat[$j][$j-1] + 
                          $tengah = $harga[$i-1]*$mat[$j][$j] ;
 
                          for($o=$j+1 ; $o<=$k ; $o++){
                            $belakang[$i]=$belakang[$i]+$nt[$o]*$mat[$j][$o];
                           } 
                          //$nt[$j+1]*$mat[$j][$j+1] +
                          $Ft[$i]=$depan[$i]+$tengah+$belakang[$i];
                          
                      }
                        
                        
                    //}
                 
                //}
            }
        }

            $data['Ft']=$Ft;

            //Nilai penyesuaian
            for($i= 0; $i<count($data_setor); $i++){
                if($i == 0){
                    $Dt[$i]=0;
                }else{
                    $j=$i-1;
                    if($state1[$j] == $state2[$j]){
                        $Dt[$i]=0;
                    }elseif(($state1[$j]-$state2[$j]) == (-1)){
                        $Dt[$i]=$l/2;
                    }elseif(($state1[$j]-$state2[$j]) == 1){
                        $Dt[$i]=(-($l/2));
                    }elseif(($state1[$j]-$state2[$j]) < (-1)){
                        $Dt[$i]=($l/2)*($state2[$j]-$state1[$j]);
                    }elseif(($state1[$j]-$state2[$j]) > 1){
                        $Dt[$i]=(-($l/2)*($state1[$j]-$state2[$j]));
                    }

                }
                $Ftend[$i]=$Ft[$i]+$Dt[$i];
            }
            $data['Dt']=$Dt;
            $data['Ftend']=$Ft+$Dt;
            

        //MAPE dan MSE
        $mape=array();
        $mse=array();
        $total_mape=0;
        $total_mse=0;
        for ($i=0; $i < count($data_setor); $i++) {
            if($Ftend[$i] == 0){
                $mape[$i]=0;
                $mse[$i]=0;
            }else{
            $mape[$i]=abs(($harga[$i]-$Ftend[$i])/$harga[$i])*100;
            $mse[$i]=($harga[$i]-$Ftend[$i])*($harga[$i]-$Ftend[$i]);
            //$ex[$i]=(($harga[$i]-$Ftend[$i])/$harga[$i]);
            }
            $total_mape=$total_mape+$mape[$i];
            $total_mse=$total_mse+$mse[$i];
        }
        
            $data['mape']=$mape;
            $data['mse']=$mse;
            $data['total_mape']=$total_mape;
            $data['total_mse']=$total_mse;
            
            echo var_dump($total_mape);
            //peramalan 2 bulan kedepan
            for($i = 0 ; $i <$jangka_waktu ; $i++){
                for($j=0 ; $j<$jangka_waktu; $j++){
                    if($j == 0){
                        $g=count($Fz)-1;
                        $state1_new[$j]=$Fz[$g];
                    }else{
                        $state1_new[$j]=$state2_new[$j-1];
                    }
                }
                //peramalan sementara
                if($i==0){
                $p=$state1_new[0];
                if(count($rawcol[$p])== 1){
                    $Ft_new[$i]=$nt[$p];
                }else{
                    for($n=1 ; $n<=$p-1 ; $n++){
                    $depan[$i]=$depan[$i]+$nt[$n]*$mat[$p][$n];
                   }
                   $q=count($harga)-1;
                    $tengah = $harga[$q]*$mat[$p][$p] ;

                    for($o=$p+1 ; $o<=$k ; $o++){
                      $belakang[$i]=$belakang[$i]+$nt[$o]*$mat[$p][$o];
                     } 
                    $Ft_new[$i]=$depan[$i]+$tengah+$belakang[$i];
                    //$test2[$i]=$depan[$i].",".$tengah.",".$belakang[$i];

                }
            }else{
                $p=$state2_new[$i-1];
                if(count($rawcol[$p])== 1){
                    $Ft_new[$i]=$nt[$p];
                }else{
                    for($n=1 ; $n<=$p-1 ; $n++){
                        $depan[$i]=0;
                    $depan[$i]=$depan[$i]+$nt[$n]*$mat[$p][$n];
                   }
                    $tengah = $ftend_new[$i-1]*$mat[$p][$p] ;

                    for($o=$p+1 ; $o<=$k ; $o++){
                        //$belakang[$i]=0;
                      $belakang1[$i]=$belakang1[$i]+$nt[$o]*$mat[$p][$o];
                     } 
                    $Ft_new[$i]=$depan[$i]+$tengah+$belakang1[$i];
                    $test[$i]=$depan[$i].",".$tengah.",".$belakang1[$i];
            }
        }
                //Fuzzyfikasi
                for($a= 0; $a<=$k-1; $a++){
                    if($Ft_new[$i] >= $nki[$a]){
                        if($Ft_new[$i] <= $nki[$a+1]){
                            $state2_new[$i]=$a+1;
                        }
                    }
                }
                //$state2_new[$i]=$U+1;
            //}
                
                //nilai penyesuaian
                if($state1_new[$i] == $state2_new[$i]){
                    $Dt_new[$i]=0;
                }elseif(($state1_new[$i]-$state2_new[$i]) == (-1)){
                    $Dt_new[$i]=$l/2;
                }elseif(($state1_new[$i]-$state2_new[$i]) == 1){
                    $Dt_new[$i]=(-($l/2));
                }elseif(($state1_new[$i]-$state2_new[$i]) < (-1)){
                    $Dt_new[$i]=($l/2)*($state2_new[$i]-$state1_new[$i]);
                }elseif(($state1_new[$i]-$state2_new[$i]) > 1){
                    $Dt_new[$i]=(-($l/2)*($state1_new[$i]-$state2_new[$i]));
                }

                //peramalan akhir
                $ftend_new[$i]=$Ft_new[$i]+$Dt_new[$i];
            
        }
        
        for($i=count($data_setor) ; $i<count($data_setor)+$jangka_waktu ; $i++){
            $Ftend[$i]=$ftend_new[$i-count($data_setor)];
            $x=$i-count($data_setor)+1;
            $tgl_setor[$i]="minggu ke-".$x;
        }
        for ($i=0; $i < count($Ftend); $i++) {
            array_push($response_databiasa, array(
				"bulan"=>$tgl_setor[$i],
				"data"=>$harga[$i],
				"data_peramalan"=>round($Ftend[$i],2),
				)
            );
        }
        $data['response_databiasa']=json_encode($response_databiasa);
        $data['ftend_new']=$ftend_new;
        $data['bulan']=$bulan;
        $data['jangka_waktu']=$jangka_waktu;
        $data['rangeminggu']=$rangeminggu;
        //echo var_dump($data_setor);
            helper_log("peramalan", "melakukan peramalan dengan perhitungan");
            $this->load->view('peramalan/ramal2',$data);
            }
            else{
                $this->session->set_flashdata('message', 'data training tidak ditemukan');
                redirect('peramalan/');
            }
        }
        else{
            $this->session->set_flashdata('message', 'invalid input');
            redirect('peramalan/');
        }
    }else{
            $this->session->set_flashdata('message', 'invalid input');
            redirect('peramalan/');
        }
    }
//peramalan tanpa perhitungan-------------------------------------------------------------------------------
        public function peramalan1()
        {
            
            $this->load->view('peramalan/peramalan1',$data);
        }

        public function peramalan2()
        {
            $tgl_awal=date_format(date_create($this->input->post('tgl_awal')), 'Y-m-d');
            $bulan_awal=substr($tgl_awal,5,2);
            $tahun_awal=substr($tgl_awal,0,4);

            $tgl_akhir=date_format(date_create($this->input->post('tgl_akhir')), 'Y-m-d');
            $bulan_akhir=substr($tgl_akhir,5,2);
            $tahun_akhir=substr($tgl_akhir,0,4);
           
            $datenow= date('Y-m-d');
            $minggu_awal=$this->Peramalan_model->get_minggu($tgl_awal);
            $minggu_akhir=$this->Peramalan_model->get_minggu($tgl_akhir);

            $week_awal = $minggu_awal['mingguke'];
            $week_akhir = $minggu_akhir['mingguke']; 

           

            if(($tahun_akhir-$tahun_awal) == 0){
                $jangka_ramal=($week_akhir-$week_awal+1);
                for($i=0;$i<$jangka_ramal;$i++){
                    $week[$i]=($week_awal)+$i;
                    $year=$tahun_awal;
                    $date1[$i] = date( "d F Y", strtotime($year."W".$week[$i]."1") ); // First day of week
                    $date2[$i] = date( "d F Y", strtotime($year."W".$week[$i]."7") ); // Last day of week

                    $rangeminggu[$i]=$date1[$i] . " - " . $date2[$i];
                }
                $bulan = ($bulan_akhir-$bulan_awal);
           }else if(($tahun_akhir-$tahun_awal) > 0){
                $jangka_ramal=($week_akhir+(52-$week_awal))+2;
                for($i=0;$i<$jangka_ramal;$i++){
                    $x=(52-$week_awal)+1;
                    if($i <= $x){
                        $week[$i]=($week_awal)+$i;
                        if(strlen($week[$i])==1){
                            $text[$i]=(string)$week[$i];
                            $qwe[$i]="0".$text[$i];
                        }
                        else{
                            $qwe[$i]=$week[$i];
                        }
                        $year=$tahun_awal;
                        $date1[$i] = date( "d F Y", strtotime($year."W".$week[$i]."1") ); // First day of week
                        $date2[$i] = date( "d F Y", strtotime($year."W".$week[$i]."7") ); // Last day of week
                    }else{
                        //for($j=1;$j<=$i;$j++){
                        $week1[$i]=$i-$x;
                        if(strlen($week1[$i])==1){
                            $text[$i]=(string)$week1[$i];
                            $qwe[$i]="0".$text[$i];
                        }
                        else{
                            $qwe[$i]=$week1[$i];
                        }
                        $year=$tahun_akhir;
                        $date1[$i] = date( "d F Y", strtotime($year."W".$qwe[$i]."1") ); // First day of week
                        $date2[$i] = date( "d F Y", strtotime($year."W".$qwe[$i]."7") ); // Last day of week
                        //}
                    }
                    
                    $rangeminggu[$i]=$date1[$i] . " - " . $date2[$i];
                }
                $bulan = $bulan_akhir+(12-$bulan_awal);
           }else if(($tahun_akhir-$tahun_awal)< 0){
            $this->session->set_flashdata('message', 'Invalid Input');
            redirect('peramalan/peramalan1');
           }

         
           
            
            $response_databiasa2 = array();

    if($tgl_awal >= $datenow){
        if($tgl_akhir >= $tgl_awal){
          //mengambil data yang akan diramal
          $data_setor = $this->Peramalan_model->get_data_training();
          $harga=array();
          $tgl_setor=array();
          foreach($data_setor as $key){
              $harga[] = $key->harga;
              $tgl_setor[]=$key->tgl_setoran;
          }
          $tgl_last_data=$tgl_setor[count($data_setor)-1];
          $minggu_last_data=$this->Peramalan_model->get_minggu($tgl_last_data);
          $week_last_data = $minggu_last_data['mingguke'];
          $tahun_last_data=substr($tgl_last_data,0,4);
          
          //mencari nilai jangka waktu peramalan
          if(($tahun_akhir-$tahun_last_data) == 0){
                    $jangka_waktu=($week_akhir-$week_last_data)+1;
                    $bulan = ($bulan_akhir-$bulan_awal);
            }else if(($tahun_akhir-$tahun_last_data) == 1){
                    $jangka_waktu=($week_akhir+(52-$week_last_data))+2;
                    $bulan = $bulan_akhir+(12-$bulan_awal);
            }else if(($tahun_akhir-$tahun_last_data) == 2){
                    $jangka_waktu=($week_akhir+(104-$week_last_data))+2;
                    $bulan = $bulan_akhir+(12-$bulan_awal);
            }else if(($tahun_akhir-$tahun_last_data)< 0){
                $this->session->set_flashdata('message', 'Invalid Input');
                redirect('peramalan/peramalan1');
            }
        //mencari nilai dmin dan d max
            $dmax=max($harga);
            $dmin=min($harga);

            $data['data_setor'] = $data_setor;
            $data['tgl_setor']=$tgl_setor;
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
                      $nki[$i]=$dmin-$d1;
                  }else{
                $nki[$i]= $nki[$i-1] + $l ;
               // $interval[]=$nki;
            }
                
               $nt[$i]=($nki[$i-1]+$nki[$i])/2;
            }
                  
            $data['nki']=$nki;
            $data['jki']=$jki;

            //membuat nilai tengah
            $data['nt']=$nt;

            //Fuzzyfikasi
            for($i= 0; $i<count($data_setor); $i++){
                for($j= 0; $j<=$k-1; $j++){
                    if($harga[$i] >= $nki[$j]){
                        if($harga[$i] <= $nki[$j+1]){
                            $Fz[$i]= $j+1;
                        }else{
                            $Fz[$i]=$k;
                        }
                    }
                }
                //$Fz[]=$U+1;
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
                               $relasi[]=$j."-".$m;
                               $start[]=$j;
                           }
                           
                        }
                        else if($flrg[$j][$m] ==null){
                            $flrg[$j][$m]=0;
                        }  
                        
                        $raw[$j]=array_sum($flrg[$j]); 
                        $rawcol[$j]=$flrg[$j];
                        $mat[$j][$m]=$flrg[$j][$m]/$raw[$j]; 
                        if(is_NAN($mat[$j][$m])){
                            $mat[$j][$m]= 0 ;
                        }
                    }
                 
                }
            }
            
            
            $col=array_reduce($flrg, 'array_merge', array());
            $trik=array_reduce($mat, 'array_merge', array());
          
            $new_array= array_filter($col);
            $flrg2=(array_count_values($relasi));
            
            //$asu=array_keys($fak);
            //$cok=asort($new_array);
            //echo var_dump($raw);
            $data['state1']=$state1;
            $data['state2']=$state2;
            $data['rawcol']=$rawcol;
            $data['raw']=$raw;
            $data['new_array']=$new_array;
            $data['trik']=$mat;
            $data['relasi']=$flrg2;

            //Peramalan sementara
            for($i= 0; $i<count($data_setor); $i++){
                
                if($i==0){
                    $Ft[$i]=0;
                }else{
                $j=$Fz[$i-1];
                      if(count($rawcol[$j])== 1){
                          $Ft[$i]=$nt[$j];
                      }else{
                          for($n=1 ; $n<=$j-1 ; $n++){
                          $depan[$i]=$depan[$i]+$nt[$n]*$mat[$j][$n];
                         }
                          //$nt[$j-1]*$mat[$j][$j-1] + 
                          $tengah = $harga[$i-1]*$mat[$j][$j] ;
 
                          for($o=$j+1 ; $o<=$k ; $o++){
                            $belakang[$i]=$belakang[$i]+$nt[$o]*$mat[$j][$o];
                           } 
                          //$nt[$j+1]*$mat[$j][$j+1] +
                          $Ft[$i]=$depan[$i]+$tengah+$belakang[$i];
                          
                      }
                        
                        
                    //}
                 
                //}
            }
        }

            $data['Ft']=$Ft;

            //Nilai penyesuaian
            for($i= 0; $i<count($data_setor); $i++){
                if($i == 0){
                    $Dt[$i]=0;
                }else{
                    $j=$i-1;
                    if($state1[$j] == $state2[$j]){
                        $Dt[$i]=0;
                    }elseif(($state1[$j]-$state2[$j]) == (-1)){
                        $Dt[$i]=$l/2;
                    }elseif(($state1[$j]-$state2[$j]) == 1){
                        $Dt[$i]=(-($l/2));
                    }elseif(($state1[$j]-$state2[$j]) < (-1)){
                        $Dt[$i]=($l/2)*($state2[$j]-$state1[$j]);
                    }elseif(($state1[$j]-$state2[$j]) > 1){
                        $Dt[$i]=(-($l/2)*($state1[$j]-$state2[$j]));
                    }

                }
                $Ftend[$i]=$Ft[$i]+$Dt[$i];
            }
            $data['Dt']=$Dt;
            $data['Ftend']=$Ft+$Dt;
            
             //peramalan 2 bulan kedepan
             for($i = 0 ; $i <$jangka_waktu ; $i++){
                for($j=0 ; $j<$jangka_waktu; $j++){
                    if($j == 0){
                        $g=count($Fz)-1;
                        $state1_new[$j]=$Fz[$g];
                    }else{
                        $state1_new[$j]=$state2_new[$j-1];
                    }
                }
                //peramalan sementara
                if($i==0){
                $p=$state1_new[0];
                if(count($rawcol[$p])== 1){
                    $Ft_new[$i]=$nt[$p];
                }else{
                    for($n=1 ; $n<=$p-1 ; $n++){
                    $depan[$i]=$depan[$i]+$nt[$n]*$mat[$p][$n];
                   }
                   $q=count($harga)-1;
                    $tengah = $harga[$q]*$mat[$p][$p] ;

                    for($o=$p+1 ; $o<=$k ; $o++){
                      $belakang[$i]=$belakang[$i]+$nt[$o]*$mat[$p][$o];
                     } 
                    $Ft_new[$i]=$depan[$i]+$tengah+$belakang[$i];
                    //$test2[$i]=$depan[$i].",".$tengah.",".$belakang[$i];

                }
            }else{
                $p=$state2_new[$i-1];
                if(count($rawcol[$p])== 1){
                    $Ft_new[$i]=$nt[$p];
                }else{
                    for($n=1 ; $n<=$p-1 ; $n++){
                        $depan[$i]=0;
                    $depan[$i]=$depan[$i]+$nt[$n]*$mat[$p][$n];
                   }
                    $tengah = $ftend_new[$i-1]*$mat[$p][$p] ;

                    for($o=$p+1 ; $o<=$k ; $o++){
                        //$belakang[$i]=0;
                      $belakang1[$i]=$belakang1[$i]+$nt[$o]*$mat[$p][$o];
                     } 
                    $Ft_new[$i]=$depan[$i]+$tengah+$belakang1[$i];
                    $test[$i]=$depan[$i].",".$tengah.",".$belakang1[$i];
            }
        }
                //Fuzzyfikasi
                for($a= 0; $a<=$k-1; $a++){
                    if($Ft_new[$i] >= $nki[$a]){
                        if($Ft_new[$i] <= $nki[$a+1]){
                            $state2_new[$i]=$a+1;
                        }
                    }
                }
                //$state2_new[$i]=$U+1;
            //}
                
                //nilai penyesuaian
                if($state1_new[$i] == $state2_new[$i]){
                    $Dt_new[$i]=0;
                }elseif(($state1_new[$i]-$state2_new[$i]) == (-1)){
                    $Dt_new[$i]=$l/2;
                }elseif(($state1_new[$i]-$state2_new[$i]) == 1){
                    $Dt_new[$i]=(-($l/2));
                }elseif(($state1_new[$i]-$state2_new[$i]) < (-1)){
                    $Dt_new[$i]=($l/2)*($state2_new[$i]-$state1_new[$i]);
                }elseif(($state1_new[$i]-$state2_new[$i]) > 1){
                    $Dt_new[$i]=(-($l/2)*($state1_new[$i]-$state2_new[$i]));
                }

                //peramalan akhir
                $ftend_new[$i]=$Ft_new[$i]+$Dt_new[$i]; 
                
               
            }
            $out=($jangka_waktu-$jangka_ramal);
            for($i = 0; $i <$jangka_ramal; $i++){
                $bulan_setor[$i]="minggu ke-".($i+1);
                array_push($response_databiasa2, array(
                    "bulan"=>$bulan_setor[$i],
                    "data_peramalan"=>round($ftend_new[$out+$i],2),
                    )
                );
            }
            
            
            //echo var_dump($ftend_new);
                $data['response_databiasa2']=json_encode($response_databiasa2);
                $data['jangka_waktu']=$jangka_waktu;
                $data['ftend_new']=$ftend_new;
                $data['bulan']=$bulan;
                $data['rangeminggu']=$rangeminggu;
                $data['out']=$out;
                $data['jangka_ramal']=$jangka_ramal;
                //echo var_dump($response_databiasa);
                helper_log("peramalan", "melakukan peramalan tanpa perhitungan");
                $this->load->view('Peramalan/peramalan2',$data);
            }  else{
                $this->session->set_flashdata('message', 'Invalid Input');
                redirect('peramalan/peramalan1');
            }
            }else{
                $this->session->set_flashdata('message', 'Invalid Input');
                redirect('peramalan/peramalan1');
            }
        }
            

        
	


		

  
}

/* End of file Login.php */
?>
