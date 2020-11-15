<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{
    public function __construct() //ini methodddd
    {
        parent::__construct(); //untuk memanggil method cunstruct
    }

    // Index
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/login/header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('templates/login/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');

        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array(); // bacanya sama seperti select * from tabel user where email = email
        # jk usernya ada
        if ($user) {
            if ($user['active_status'] == 1) {
                # cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'kode_role' => $user['kode_role']
                    ];
                    $this->session->set_userdata($data);
                    redirect('pelanggan/C_pelanggan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!
                  </div>');
                    redirect('C_auth');
                }
            } else {
                # code...
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      This email has not been activated!
    </div>');
                redirect('C_auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  Email has not registered!
</div>');
            redirect('C_auth');
        }
    }


    public function fw()
    {
        $data['title'] = 'Forgot Password';
        $this->load->view('templates/login/header', $data);
        $this->load->view('auth/v_forgot-password');
        $this->load->view('templates/login/footer');
    }
    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            ['is_unique' => 'This email has already registered!']
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches => password dont match!', 'min_length' => 'Password too short!']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run()  == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/login/header', $data);
            $this->load->view('auth/v_registration');
            $this->load->view('templates/login/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'profile_img' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kode_role' => 'RL0000000003', // yang melakukan registrasi pasti member
                'active_status' => 1, //sementara otomatis aktif,nanti akan dinonaktifkan saa sudah belajar user activation
                'created_at'  => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Congratulation,your account has been created. Please Login!
</div>');
            redirect('C_auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('kode_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  You have been log out!
</div>');
        redirect('C_auth');
    }
}
