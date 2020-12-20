<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pemilik extends CI_Controller
{
    // Construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Satuan', 'M_barang', 'M_Categories']);
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pemilik';
        $this->data['total_barang'] = $this->M_barang->total_rows();
        $this->data['total_satuan'] = $this->M_Satuan->total_rows();
        $this->data['total_kategori'] = $this->M_Categories->total_rows();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('pemilik/v_dashboard_pemilik', $data);
        $this->load->view('templates/admin/footer');
    }
}
