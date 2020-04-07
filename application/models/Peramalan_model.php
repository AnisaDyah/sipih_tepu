<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Peramalan_model extends CI_Model {
 
    public function get_user()
    {
        $query = $this->db->get('user');
        return $query->result();
    }
    // public function get_setoran_user($id_user)
    // {
    //     $query = $this->db->query("SELECT * FROM setoran_telur WHERE id_user = $id_user ")->result();
    //     return $query;
    // }

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

    // public function histori_admin()
    //     {
    //         $query = $this->db->get('histori_log');
    //         return $query->result();
    //     }
}