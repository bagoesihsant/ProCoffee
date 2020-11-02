<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{
    public function __construct() //ini methodddd
    {
        parent::__construct(); //untuk memanggil method cunstruct
        $this->load->library('form_validation');
    }

    // Index
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('login_template/v_auth_header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('login_template/v_auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email  = $this->input->post('email');
        $password  = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        var_dump($user);
        die;
    }

    // forgotpw
    public function fw()
    {
        $data['title'] = 'Forgot Password';
        $this->load->view('login_template/v_auth_header', $data);
        $this->load->view('auth/v_forgot-password');
        $this->load->view('login_template/v_auth_footer');
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  You have been log out!
</div>');
        redirect('C_auth');
    }
}
