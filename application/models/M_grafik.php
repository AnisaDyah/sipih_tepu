<?php
class M_grafik extends CI_Model{
 
    function get_data_stok(){
        $query = $this->db->query("SELECT id_user,SUM(jml_setoran) AS jml_setoran FROM setoran_telur GROUP BY id_user");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    function get_data_stok_bytahun(){
        $query = $this->db->query("SELECT id_user, SUM(IF(YEAR(tgl_setoran)='2018',jml_setoran,0)) AS jml_setoran1, 
        SUM(IF(YEAR(tgl_setoran)='2019',jml_setoran,0)) AS jml_setoran2, 
        SUM(IF(YEAR(tgl_setoran)='2020',jml_setoran,0)) AS jml_setoran3 
        FROM setoran_telur GROUP BY id_user");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function get_user_stok($id_user, $tahun){
        $query = $this->db->query("SELECT * FROM setoran_telur WHERE id_user=$id_user AND YEAR(tgl_setoran)=$tahun");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
}