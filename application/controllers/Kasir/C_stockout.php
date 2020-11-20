<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_stockout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_stock', 'mstock');
    }

    public function index()
    {
        $data['row'] =  $this->mstock->get_data();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_stock_out', $data);
        $this->load->view('templates/admin/footer');
    }

    public function stockin_data()
    {
    }
}
