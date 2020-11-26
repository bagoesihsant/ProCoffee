<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_stockin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'M_supplier', 'M_stock');
    }
    public function index()
    {
        $data['row'] = $this->m_stock->get_data();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_stock_in', $data);
        $this->load->view('templates/admin/footer');
    }
    public function stock_in_form()
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_stock_in');
        $this->load->view('templates/admin/footer');
    }
}
