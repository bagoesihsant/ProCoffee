<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pelanggan extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {       
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Pelanggan';
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('pelanggan/v_pelanggan', $data);
            $this->load->view('templates/admin/footer', $data);
    }
}
