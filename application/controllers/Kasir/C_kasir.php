<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_kasir extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('M_kasir', 'kasir');

        // Load Library
        $this->load->library('pagination');
    }


    public function index()
    {
        // Membuat Array data
        $data['title'] = "Penjualan";
        // $data['barang'] = $this->kasir->getAllBarang()->result_array();

        // Load View
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_penjualan');
        $this->load->view('templates/admin/footer');
    }

    public function loadBarang($pagenum = 0)
    {
        // Berfungsi untuk melakukan load barang

        // Membuat variabel untuk jumlah data per halaman
        $dataHalaman = 6;

        // Memeriksa apakah ada halaman yang dibuka atau tidak
        if ($pagenum != 0) {
            $pagenum = ($pagenum - 1) * $dataHalaman;
        }

        // Memeriksa apakah ada keyword yang digunakan atau tidak
        if ($this->input->post('keyword') != '') {
            // Jika keyword memiliki value atau nilai
            // Membuat variabel keyword
            $keyword = $this->input->post('keyword');
            // Menghitung banyak data
            $totalData = $this->kasir->getLimitedBarang($keyword)->num_rows();
            // Mengambil data dari database sesuai dengan jumlah halaman per data dan dimulai dari halaman berapa
            $daftarBarang = $this->kasir->loadLimitedBarang($dataHalaman, $pagenum, $keyword)->result_array();
        } else {
            // Jika keyword tidak memiliki value atau nilai
            // Menghitung banyak data
            $totalData = $this->kasir->getAllBarang()->num_rows();
            // Mengambil data dari database sesuai dengan jumlah halaman per data dan dimulai dari halaman berapa
            $daftarBarang = $this->kasir->loadBarang($dataHalaman, $pagenum)->result_array();
        }



        // Membuat konfigurasi paging
        $config['base_url'] = base_url('C_kasir/loadBarang/');
        $config['use_page_numbers'] = true;
        $config['total_rows'] = $totalData;
        $config['per_page'] = $dataHalaman;

        // Membuat konfigurasi tampilan paging
        $config['full_tag_open'] = "<nav><ul class='pagination'>";
        $config['full_tag_close'] = "</ul></nav>";

        $config['num_tag_open'] = "<li class='page-item'>";
        $config['num_tag_close'] = "</li>";

        $config['cur_tag_open'] = "<li class='page-item active'><a href='' class='page-link'>";
        $config['cur_tag_close'] = "</a></li>";

        $config['next_link'] = "&raquo";
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tag_close'] = "</li>";

        $config['prev_link'] = "&laquo";
        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";

        $config['first_link'] = "First";
        $config['first_tag_open'] = "<li class='page-item'>";
        $config['first_tag_close'] = "</li>";

        $config['last_link'] = "Last";
        $config['last_tag_open'] = "<li class='page-item'>";
        $config['last_tag_close'] = "</li>";

        $config['attributes'] = ['class' => 'page-link'];

        // Menginisialisasi pagination
        $this->pagination->initialize($config);

        // Menjalankan fungsi untuk membuat elemen html berupa paging
        $data['pagination'] = $this->pagination->create_links();
        // Mengirimkan data yang telah diambil dari database
        $data['result'] = $daftarBarang;
        // Mengirimkan nomor halaman saat ini
        $data['page_num'] = $pagenum;

        // Print JSON
        echo json_encode($data);
    }
}
