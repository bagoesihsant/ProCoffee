<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_landingpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'mbarang');
        $this->load->model('M_usero');
    }

    public function index()
    {
        $data['jumlah_carto'] = $this->M_usero->count_cart();
        $data['limit'] = $this->mbarang->LimitRandom()->result();
        $data['title'] = "Pro Coffee";
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('User/v_landing_page', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }
}
