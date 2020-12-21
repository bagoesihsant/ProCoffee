<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_detail_barang_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Detail Barang";
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('User/v_detail_barang');
        $this->load->view('templates/user_template/v_footer_user');
    }
}
