<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_laporan extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // Load Model
        $this->load->model('M_cetak_laporan', 'laporan');
    }

    // START ITEMS START ITEMS START ITEMS START ITEMS START ITEMS START ITEMS
    public function index()
    {
        // Mengambil data user yang sedang login
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Laporan";
        $data['laporan'] = $this->laporan->getAllData()->result();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_laporan', $data);
        $this->load->view('templates/admin/footer');
    }

    public function Cetak_laporan_kasir2($id) //ini untuk tes view saja
    {
        $data['transaksi'] = $this->laporan->getAllTransaksi($id)->result();
        $data['dtl_transaksi'] = $this->laporan->getAllDtlTransaksi($id)->result();
        $this->load->view('laporan/kasir/cetak_laporan', $data);
    }

    public function Cetak_laporan($id) //ini yang dipake
    {
        $data['transaksi'] = $this->laporan->getAllTransaksi($id)->result();
        $data['dtl_transaksi'] = $this->laporan->getAllDtlTransaksi($id)->result();
        $html = $this->load->view('laporan/kasir/cetak_laporan', $data, true);
        $filename = 'laporan'.$id;

        $this->laporan->print_dompdf($html, 'A4', 'landscape', $filename);
    }
}
