<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_kasir extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        echo 'Selamat datang ' . $data['user']['nama'];
    }
}
