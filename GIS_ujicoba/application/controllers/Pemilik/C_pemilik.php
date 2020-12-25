<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pemilik extends CI_Controller
{
    // Construct
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(['M_Satuan', 'M_barang', 'M_Categories', 'M_stockin', 'M_stockOut']);
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pemilik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->data['total_barang'] = $this->M_barang->total_rows();
        $this->data['total_satuan'] = $this->M_Satuan->total_rows();
        $this->data['total_kategori'] = $this->M_Categories->total_rows();
        $this->data['total_stockin'] = $this->M_stockin->total_rows();
        $this->data['total_stockout'] = $this->M_stockOut->total_rows();
        $this->load->view('templates/admin/header', $data);

        $this->load->view('templates/admin/sidebar');
        $this->load->view('pemilik/v_dashboard_pemilik', $this->data);
        $this->load->view('templates/admin/footer');
    }
}
