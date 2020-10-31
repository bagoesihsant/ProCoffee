<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('M_user');
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

            $id_user = "USR" . ($q_count + 1) . date('Hdyims', time());

            // Configuration for upload image
            $upload_image = $_FILES['profile_image']['name'];

            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '4096';
                $config['upload_path'] = './assets/dist/img/user/';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('profile_image')){
                    $new_image = $this->upload->data('file_name');
                    $gambar = $new_image;
                }else{
                    echo $this->upload->display_errors();
                    $gambar = 'default.jpg';
                }
            }else{
                $gambar = 'default.jpg';
            }
            // End of Configuration for upload image
            $tgl_lahir = date_create($this->input->post('tanggal_lahir'));
            $data = [
                'id_user' => htmlspecialchars($id_user),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'tanggal_lahir' => htmlspecialchars(date_format($tgl_lahir, "Y-m-d")),
                'email' => htmlspecialchars($this->input->post('email')),
                'username' => htmlspecialchars($this->input->post('username')),
                'notelp' => htmlspecialchars($this->input->post('notelp')),
                'profile_image' => htmlspecialchars($gambar),
                'about' => htmlspecialchars($this->input->post('about')),
                'role_id' => htmlspecialchars($this->input->post('role_id')),
                'is_active' => 0,
                'date_created' => htmlspecialchars(time()),
                'update_at' => 0
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('C_user');
        }
    }

    public function nonaktifkan()
    {
        $id = htmlspecialchars($this->input->post('id_user'));
        $status = htmlspecialchars($this->input->post('status'));
        $this->M_user->status($id, $status);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Akun Berhasil Dinonaktifkan</div>');
        redirect('C_user');
    }
    public function aktifkan()
    {
        $id = htmlspecialchars($this->input->post('id_user'));
        $status = htmlspecialchars($this->input->post('status'));
        $this->M_user->status($id, $status);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Akun Berhasil Diaktifkan</div>');
        redirect('C_user');
    }
}