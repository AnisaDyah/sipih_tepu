<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Setoran_model extends CI_Model {

        public function list()
        {
            $query = $this->db->get('setoran_telur');
            return $query->result();
        }


        public function getTotal()
        {
            return $this->db->count_all('setoran_telur');
        }


        public function insert($data = [])
        {
            $result = $this->db->insert('setoran_telur', $data);
            return $result;
        }

        public function show($id_setoran)
        {
            $this->db->where('id_setoran', $id_setoran);
            $query = $this->db->get('setoran_telur');
            return $query->row();
        }

        public function update($id_setoran, $data = [])
        {
            $this->db->where('id_setoran', $id_setoran);
            $this->db->update('setoran_telur', $data);
        }


        public function delete($id_setoran)
        {
            $this->db->where('id_setoran', $id_setoran);
            $this->db->delete('setoran_telur');
        }
	
	//mengambil tabel user
        public function get_user()
        {
            $query = $this->db->get('user');
            return $query->result();
        }

        public function tabel_setoran($id_user, $tahun)
        {
         
            $query = $this->db->query("SELECT DISTINCT DAY(tgl_setoran)AS tanggal,
            SUM(IF( MONTH(setoran_telur.tgl_setoran) = 01, setoran_telur.jml_setoran, 0)) AS setoran_jan,
            SUM(IF( MONTH(setoran_telur.tgl_setoran) = 01, setoran_telur.harga, 0)) AS harga_jan, 
                  SUM(IF( MONTH(setoran_telur.tgl_setoran) = 02, setoran_telur.jml_setoran, 0)) AS setoran_feb,
                  SUM(IF( MONTH(setoran_telur.tgl_setoran) = 02, setoran_telur.harga, 0)) AS harga_feb, 
                   SUM(IF( MONTH(setoran_telur.tgl_setoran) = 03, setoran_telur.jml_setoran, 0)) AS setoran_mar,
                   SUM(IF( MONTH(setoran_telur.tgl_setoran) = 03, setoran_telur.harga, 0)) AS harga_mar, 
                    SUM(IF( MONTH(setoran_telur.tgl_setoran) = 04, setoran_telur.jml_setoran, 0)) AS setoran_apr,
                    SUM(IF( MONTH(setoran_telur.tgl_setoran) = 04, setoran_telur.harga, 0)) AS harga_apr, 
                     SUM(IF( MONTH(setoran_telur.tgl_setoran) = 05, setoran_telur.jml_setoran, 0)) AS setoran_mei
                     ,SUM(IF( MONTH(setoran_telur.tgl_setoran) = 05, setoran_telur.harga, 0)) AS harga_mei,
                      SUM(IF( MONTH(setoran_telur.tgl_setoran) = 06, setoran_telur.jml_setoran, 0)) AS setoran_jun,
                      SUM(IF( MONTH(setoran_telur.tgl_setoran) = 06, setoran_telur.harga, 0)) AS harga_jun, 
                      SUM(IF( MONTH(setoran_telur.tgl_setoran) = 07, setoran_telur.jml_setoran, 0)) setoran_jul,
                      SUM(IF( MONTH(setoran_telur.tgl_setoran) = 07, setoran_telur.harga, 0)) AS harga_jul,
                   SUM(IF( MONTH(setoran_telur.tgl_setoran) = 08, setoran_telur.jml_setoran, 0)) AS setoran_ags, 
                    SUM(IF( MONTH(setoran_telur.tgl_setoran) = 08, setoran_telur.harga, 0)) AS harga_ags,
                     SUM(IF( MONTH(setoran_telur.tgl_setoran) = 09, setoran_telur.jml_setoran, 0)) AS setoran_sep,
                     SUM(IF( MONTH(setoran_telur.tgl_setoran) = 09, setoran_telur.harga, 0)) AS harga_sep,
                      SUM(IF( MONTH(setoran_telur.tgl_setoran) = 10, setoran_telur.jml_setoran, 0)) AS setoran_okt,
                      SUM(IF( MONTH(setoran_telur.tgl_setoran) = 10, setoran_telur.harga, 0)) AS harga_okt,
                     SUM(IF( MONTH(setoran_telur.tgl_setoran) = 11, setoran_telur.jml_setoran, 0)) AS setoran_nov, 
                     SUM(IF( MONTH(setoran_telur.tgl_setoran) = 11, setoran_telur.harga, 0)) AS harga_nov,
                       SUM(IF( MONTH(setoran_telur.tgl_setoran) = 12, setoran_telur.jml_setoran, 0)) AS setoran_des, 	
                           SUM(IF( MONTH(setoran_telur.tgl_setoran) = 12, setoran_telur.harga, 0)) AS harga_des
                       FROM setoran_telur
              WHERE YEAR(tgl_setoran)=$tahun AND id_user=$id_user GROUP BY DAY(tgl_setoran)")->result();
            return $query;
        }

        public function bulan(){
            $query = $this->db->query("SELECT MONTH(tgl_setoran) from setoran_telur")->result();
          return $query;   
          }

        public function tanggal(){
            $query =  $this->db->query("SELECT DISTINCT DAY(tgl_setoran) AS tanggal FROM setoran_telur ORDER BY DAY(tgl_setoran) ")->result();
            return $query;
              }
        public function tahun(){
            $query =  $this->db->query("SELECT DISTINCT YEAR(tgl_setoran) AS tahun FROM setoran_telur ")->result();
            return $query;
                }

        public function setoran_user($id_user)
        {
            $query = $this->db->query("SELECT * FROM setoran_telur WHERE id_user=$id_user ")->result();
            return $query;
        }

        public function change_status()
	    {
		$id = $this->input->post('id');
		$data['status'] = $this->input->post('status');
		$this->db->where('id_setoran',$id);
		$this->db->update('setoran_telur',$data);
        }
        
        //export excel
        public function export_setoran($tgl_awal, $tgl_akhir)
	{
		$this->db->where('tgl_setoran BETWEEN "'.$tgl_awal.'" AND "'.$tgl_akhir.'"');
		$this->db->order_by('tgl_setoran', 'ASC');
		return $this->db->get('setoran_telur')->result();
    }
    public function export_setoran_user($id_user,$tgl_awal, $tgl_akhir)
	{
        $this->db->where('id_user',$id_user);
		$this->db->where('tgl_setoran BETWEEN "'.$tgl_awal.'" AND "'.$tgl_akhir.'"');
		$this->db->order_by('tgl_setoran', 'ASC');
		return $this->db->get('setoran_telur')->result();
    }
    
    public function setoran_tabel($id_user, $tahun)
        {
         
            $query = $this->db->query("SELECT * FROM setoran_telur
              WHERE YEAR(tgl_setoran)='$tahun' AND id_user='$id_user' ORDER BY tgl_setoran ASC")->result();
            return $query;
        }

}

/* End of file setoran_telur_model.php */


?>
