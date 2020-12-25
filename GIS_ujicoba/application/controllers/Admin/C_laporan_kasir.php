<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_laporan_kasir extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // Load Model
        $this->load->model('M_cetak_laporan_kasir', 'laporan');
    }

    // START ITEMS START ITEMS START ITEMS START ITEMS START ITEMS START ITEMS
    public function index()
    {
        $this->load->view('templates/admin/header');
        $this->load->view('admin/v_laporan_kasir');
    }

    public function Cetak_laporan_kasir2($id) //ini untuk tes view saja
    {
        $data['transaksi'] = $this->laporan->getAllTransaksi($id)->result();
        $data['dtl_transaksi'] = $this->laporan->getAllDtlTransaksi($id)->result();
        $this->load->view('laporan/kasir/cetak_laporan', $data);
    }

    public function Cetak_laporan_kasir($id) //ini yang dipake
    {
        $data['transaksi'] = $this->laporan->getAllTransaksi($id)->result();
        $data['dtl_transaksi'] = $this->laporan->getAllDtlTransaksi($id)->result();

        $html = $this->load->view('laporan/kasir/cetak_laporan', $data, true);
        $filename = 'laporan'.$id;

        $this->laporan->print_dompdf($html, 'A4', 'landscape', $filename);
    }
}