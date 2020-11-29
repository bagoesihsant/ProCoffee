<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();;
        // Load View
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_dashboard', $data);
        $this->load->view('templates/admin/footer');
    }
}
