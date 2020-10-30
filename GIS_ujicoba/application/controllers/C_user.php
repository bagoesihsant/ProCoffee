<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_mapping');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Management User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dt_user'] = $this->db->get('user')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('about', 'About', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management_user/index', $data);
            $this->load->view('templates/custom-footer', $data);
            $this->load->view('templates/dist-footer', $data);
            $this->load->view('templates/footer', $data);
        }else{
            $q_count = $this->db->get('user')->num_rows();

            if($q_count >= 10){
                $id_user = "USR-0" . date('dm', time()).($q_count + 1);
            }else if($q_count >= 100){
                $id_user = "USR-" . date('dm', time()).($q_count + 1);
            }else{
                $id_user = "USR-00" . date('dm', time()).($q_count + 1);
            }

            $upload_image = $_FILES['image']['name'];

            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '4096';
                $config['upload_path'] = './assets/dist/img/user/';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('image')){
                    $new_image = $this->upload->data('file_name');
                    $gambar = $new_image;
                }else{
                    echo $this->upload->display_errors();
                    $gambar = 'default.jpg';
                }
            }else{
                $gambar = 'default.jpg';
            }

            $data = [
                'id_user' => $id_user,
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'image' => $gambar,
                'password' => time(),
                'about' => $this->input->post('about'),
                'role_id' => $this->input->post('role_id'),
                'is_active' => 0,
                'date_created' => time(),
                'change_pass' => 0
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('C_user');
        }
    }
}