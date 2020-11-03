<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pelanggan extends CI_Controller
{


    // Index
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        echo 'selamat datang  ' . $data['user']['nama'];
    }
}
