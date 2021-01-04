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

    // public function Cetak_laporan_kasir2($id) //ini untuk tes view saja
    // {
    //     $data['transaksi'] = $this->laporan->getAllTransaksi($id)->result();
    //     $data['dtl_transaksi'] = $this->laporan->getAllDtlTransaksi($id)->result();
    //     $this->load->view('laporan/kasir/cetak_laporan', $data);
    // }

    public function cetak_laporan($id) //ini yang dipake
    {
        $data['transaksi'] = $this->laporan->getAllTransaksi($id)->result();
        $data['dtl_transaksi'] = $this->laporan->getAllDtlTransaksi($id)->result();
        $html = $this->load->view('admin/v_cetak_laporan_kasir', $data, true);
        $filename = 'laporan'.$id;

        $this->laporan->print_dompdf($html, 'A6', 'potrait', $filename);
    }

    public function detail_laporan($id) //ini yang dipake
    {
       // Mengambil data user yang sedang login
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Laporan";
        $data['transaksi'] = $this->laporan->getAllTransaksi($id)->result();
        $data['dtl_transaksi'] = $this->laporan->getAllDtlTransaksi($id)->result();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_detail_laporan', $data);
        $this->load->view('templates/admin/footer');
    }

    public function hapus_laporan($id)
    {
        $data = array('kode_transaksi' => $id);
        $this->laporan->hapus_laporan1($data);
        $hapus = $this->laporan->hapus_laporan2($data);

        if ($hapus != 0) {
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.success("Data berhasil dihapus.")'
            );
        } else {
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.danger("Data gagal dihapus.")'
            );
        }

        redirect('laporan/kasir');
    }
}
