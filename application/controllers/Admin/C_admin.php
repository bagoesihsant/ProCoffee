<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_barang', 'M_supplier', 'm_menu', 'M_user', 'm_sub_menu', 'M_Satuan', 'M_Categories', 'M_stockin', 'M_stockOut']);
    }

    // Index
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->data['total_satuan'] = $this->M_Satuan->total_rows();
        $this->data['total_kategori'] = $this->M_Categories->total_rows();
        $this->data['total_smenu'] = $this->m_sub_menu->total_rows();
        $this->data['total_user'] = $this->M_user->total_rows();
        $this->data['total_menu'] = $this->m_menu->total_rows();
        $this->data['total_supplier'] = $this->M_supplier->total_rows();
        $this->data['total_barang'] = $this->M_barang->total_rows();
        $this->data['total_stockin'] = $this->M_stockin->total_rows();
        $this->data['total_stockout'] = $this->M_stockOut->total_rows();
        $data['title'] = 'Dashboard';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();;

        // Load View
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_dashboard', $this->data);
        $this->load->view('templates/admin/footer');
    }
}
