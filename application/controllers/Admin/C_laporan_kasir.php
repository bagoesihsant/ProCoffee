<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_laporan_kasir extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('M_barang', 'barang');
    }

    // START ITEMS START ITEMS START ITEMS START ITEMS START ITEMS START ITEMS
    public function index()
    {
        
        $this->load->view('templates/admin/header');
        $this->load->view('admin/v_laporan_kasir');
    }
}