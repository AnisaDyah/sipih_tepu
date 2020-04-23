<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Peramalan_model extends CI_Model {
 
    public function get_user()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    public function get_DataSetoranPerbulanByUser($id_user, $tanggal)
	{
        $query = $this->db->query("SELECT * FROM `setoran_telur` WHERE id_user=$id_user AND tgl_setoran LIKE '$tanggal%' order by tgl_setoran  ASC")->result();
        return $query;
    }
    
    public function get_tgl($id_user, $tgl_awal, $tgl_akhir){
        $this->db->from('setoran_telur');
        $this->db->where('id_user',$id_user);
        $this->db->where('tgl_setoran >=',$tgl_awal);
        $this->db->where('tgl_setoran <=',$tgl_akhir);
        $query=$this->db->get();
        return $query->result();
    }
    public function get_setoran($tgl_awal, $tgl_akhir){
        $this->db->from('setoran_telur');
        $this->db->where('tgl_setoran >=',$tgl_awal);
        $this->db->where('tgl_setoran <=',$tgl_akhir);
        $query=$this->db->get();
        return $query->result();
    }

    public function get_data_training(){
        $query = $this->db->query("SELECT DISTINCT tgl_setoran, harga FROM setoran_telur ORDER BY tgl_setoran ASC")->result();
        return $query;
    }

    public function get_bulantahun1($bulan_tahun1)
	{
        $query = $this->db->query("SELECT tgl_setoran FROM `setoran_telur` WHERE tgl_setoran LIKE '$bulan_tahun1%' order by tgl_setoran  ASC")->result();
        return $query;
    }
    public function get_bybulan($tgl_awal, $tgl_akhir)
	{
        $query = $this->db->query("SELECT  DISTINCT tgl_setoran, harga FROM `setoran_telur` WHERE tgl_setoran >='$tgl_awal' AND tgl_setoran <= '$tgl_akhir'  order by tgl_setoran  ASC")->result();
        return $query;
    }
}