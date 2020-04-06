<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pengguna_model extends CI_Model {

        public function list()
        {
            $query = $this->db->get('user');
            return $query->result();
        }

        public function getTotal()
        {
            return $this->db->count_all('user');
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('user', $data);
            return $result;
        }

        public function show($id_user)
        {
            $this->db->where('id_user', $id_user);
            $query = $this->db->get('user');
            return $query->row();
        }

        public function update($id_user, $data = [])
        {
            $ubah = array(
                'id_user_level' => $data['id_user_level'],
                'nama_lengkap' => $data['nama_lengkap'],
                'alamat'  => $data['alamat'],
                'username'  => $data['username'],
                'password'  => $data['password']
            );

            $this->db->where('id_user', $id_user);
            $this->db->update('user', $ubah);
        }


        public function delete($id_user)
        {
            $this->db->where('id_user', $id_user);
            $this->db->delete('user');
        }

        public function user_level()
        {
            $query = $this->db->get('user_level');
            return $query->result();
        }
        public function id_user_level($id_user)
        {
            $query = $this->db->query("SELECT id_user_level FROM user WHERE id_user=$id_user ")->result();
            return $query;
        }

        
    }
    
    /* End of file Kategori_model.php */
    