<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_barang_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'mbarang');
    }

    public function index()
    {
        // PL maksudnya produk landing page
        $data['PL'] =  $this->mbarang->getAllItems()->result();
        $data['title'] = "List Produk";
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('User/v_list_barang', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }
}