<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pengguna extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url', 'form');
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Pengguna_model');

            // if($this->session->privilege != 'Administrator')
            // {
            //     redirect('home');
            // }
        }

        public function index()
        {
            $data = [
                'list' => $this->Pengguna_model->list(),
                'user_level'=> $this->Pengguna_model->user_level()
                
            ];
            $this->load->view('pengguna/index', $data);
        }
        
        public function create()
        {
            $data['user_level'] = $this->Pengguna_model->user_level();
            $this->load->view('pengguna/create',$data);
        }

        public function store()
        {
            
                $data = [
                    'id_user_level' => $this->input->post('privilege'),
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'alamat' => $this->input->post('alamat'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password'))
                ];
                $rules = [
                    [
                    'field' => 'nama_lengkap',
                    'label' => 'nama_lengkap',
                    'rules' => 'trim|required'
                    ]
                ];
                
                $this->form_validation->set_rules($rules);
    
                if ($this->form_validation->run()) {
                    $result = $this->Pengguna_model->insert($data);
                    helper_log("add", "menambahkan user");
                    if ($result) {
                        redirect('pengguna');
                    }
                } else {
                    redirect('pengguna/create');
                }
            

        }

        public function show($id_user)
        {
            $pengguna = $this->Pengguna_model->show($id_user);
            $user_level = $this->Pengguna_model->user_level();
            $data = [
                'data' => $pengguna,
                'user_level'=>$user_level
            ];
            $this->load->view('pengguna/show', $data);
        }

        public function edit($id_user)
        {
            $pengguna = $this->Pengguna_model->show($id_user);
            $user_level = $this->Pengguna_model->user_level();
            $data = [
                'pengguna' => $pengguna,
                'user_level'=>$user_level
            ];
            $this->load->view('pengguna/edit', $data);
        }
    
        public function update($id_user)
        {
            // TODO: implementasi update data berdasarkan $id_user
            $id_user = $this->input->post('id_user');
            $data = array(
                'id_user_level' => $this->input->post('privilege'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat' => $this->input->post('alamat'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );

            $this->Pengguna_model->update($id_user, $data);
            helper_log("edit", "mengubah data user");
            redirect('pengguna');
        }
    
        public function destroy($id_user)
        {
            $this->Pengguna_model->delete($id_user);
            helper_log("delete", "menghapus data user");
            redirect('pengguna');
        }
    
    }
    
    /* End of file Kategori.php */
    