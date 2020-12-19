<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_kurir extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Dashboard Kurir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        echo 'Selamat datang ' . $data['user']['nama'];
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/v_dashboard_kurir', $data);
        $this->load->view('templates/admin/footer');
    }
}
