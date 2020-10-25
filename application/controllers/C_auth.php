<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{


    // Index
    public function index()
    {
        $data['title'] = 'Login Page';
        $this->load->view('login_template/v_auth_header', $data);
        $this->load->view('auth/v_login');
        $this->load->view('login_template/v_auth_footer');
    }

    // forgotpw
    public function fw()
    {
        $data['title'] = 'Forgot Password';
        $this->load->view('login_template/v_auth_header', $data);
        $this->load->view('auth/v_forgot-password');
        $this->load->view('login_template/v_auth_footer');
    }
}
