<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_user_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Profil Saya";
        $data['user'] = $this->db->get_where('user_online', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('templates/user_template/v_sidemenu_profile');
        $this->load->view('User/v_user_profile', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }
    public function editprofil()
    {
        $data['title'] = "Edit Profile";
        $data['user'] = $this->db->get_where('user_online', ['email' => $this->session->userdata('email')])->row_array();

        // $this->form_validation->set_rules();
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('templates/user_template/v_sidemenu_profile');
        $this->load->view('User/v_edit_profile', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }
    public function ubahpassword()
    {
        $data['title'] = "Ubah Password";
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('templates/user_template/v_sidemenu_profile');
        $this->load->view('User/v_change_password');
        $this->load->view('templates/user_template/v_footer_user');
    }
}
