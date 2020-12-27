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
        // Mengambil data user yang sedang login
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Membuat Array data
        $data['title'] = "Penjualan";
        // Mengambil session
        $where = [
            'kode_user' => $this->session->userdata('kode_user')
        ];
        // Mengambil kasir atau admin yang sedang login
        $data['kasir'] = $this->kasir->getLoggedInKasir($where);

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

    public function loadKeranjang()
    {
        // Berfungsi untuk mengambil data keranjang dari transaksi oleh kasir N
        // dimana N adalah kasir yang sedang mengakses sistem informasi
        // Membuat variabel untuk kasir yang sedang bertugas
        $kasir = $this->session->userdata('kode_user');

        // Mengambil data dari tabel keranjang
        $result = $this->kasir->loadKeranjang($kasir)->result_array();

        // Membuat array data untuk dikirim melalui ajax
        $final = [
            'result' => $result
        ];

        // Mencetak data yang didapatkan dari database dalam format json
        echo json_encode($final);
    }

    public function tambahKeranjang()
    {
        // Berfungsi untuk menambahkan barang yang akan dibeli kedalam tabel keranjang oleh kasir N
        // dimana N adalah kasir yang sedang mengakses sitem informasi

        // Membuat variabel untuk kasir yang bertugas
        $kasir = $this->session->userdata('kode_user');
        $kode_barang = $this->input->post('kode_barang', true);

        // Memeriksa apakah barang sudah terdaftar dalam cart
        $where = [
            'kode_user' => $kasir,
            'kode_barang' => $kode_barang
        ];

        // Membuat variabel message untuk diterima oleh JavaScript melalui ajax
        $message['error_status'] = "";
        $message['error_message'] = "";

        // Melakukan pemeriksaan
        $daftarCart = $this->kasir->daftarCart($where)->num_rows();

        // Memeriksa apakah ditemukan data yang sama
        if ($daftarCart > 0) {
            // Jika ada data yang ditemukan
            // Melakukan penambahan jumlah stok pada barang yang ditemukan

            // Mengambil data terakhir
            $detailCart = $this->kasir->daftarCart($where)->row_array();

            // Menambahkan stok barang tersebut
            $value = [
                'qty' => $detailCart['qty'] + 1,
                'total' => (($detailCart['harga'] * ($detailCart['qty'] + 1) - $detailCart['discount']))
            ];

            // Melakukan update 
            $result = $this->kasir->tambahStokCart($value, $where);

            // Memeriksa apakah stok berhasil di update atau tidak
            if ($result > 0) {
                // Jika data berhasil diubah// Jika data berhasil ditambahkan

                // Membuat variabel data khusus
                $barang = [
                    'kode_barang' => $kode_barang
                ];

                // Mengambil data barang dari tabel barang
                $dataBarang = $this->kasir->getOneBarang($barang);

                // memeriksa apakah ada data barang yang ditemukan atau tidak
                if ($dataBarang->num_rows() > 0) {
                    // Jika ada data barang yang ditemukan

                    // mengambil barang
                    $getBarang = $dataBarang->row_array();

                    // Membuat variabel data
                    $qtyBarang = $getBarang['stok'];

                    $ubahStokBarang = [
                        'stok' => ($qtyBarang - 1)
                    ];

                    // Menjalankan perubahan
                    $resultStok = $this->kasir->updateStokBarang($ubahStokBarang, $barang);

                    // Memeriksa apakah stok berhasil dikurangi
                    if ($resultStok > 0) {
                        // Jika stok berhasil dikurangi
                        $message['error_status'] = false;
                        $message['error_message'] = "Data barang berhasil ditambahkan";
                    } else {
                        // Jika stok gagal dikurangi
                        $message['error_status'] = true;
                        $message['error_message'] = "Data barang gagal ditambahkan";
                    }
                } else {
                    // Jika tidak ada data barang yand ditemukan

                    // Jika data gagal ditambahkan
                    $message['error_status'] = true;
                    $message['error_message'] = "Data barang gagal ditambahkan";
                }
            } else {
                // Jika data gagal diubah
                $message['error_status'] = true;
                $message['error_message'] = "Data stok gagal diubah";
            }
        } else {
            // Jika tidak ada yang ditemukan
            // Melakukan penambahan barang kedalam tabel cart offline

            // Membuat variabel data
            $data = [
                'kode_barang' => $this->input->post('kode_barang', true),
                'harga' => $this->input->post('harga_barang', true),
                'qty' => 1,
                'discount' => 0,
                'total' => $this->input->post('harga_barang', true),
                'kode_user' => $kasir
            ];

            // Menjalankan proses penambahan data ke keranjang offline
            $result = $this->kasir->tambahKeranjang($data);

            // Memeriksa apakah data berhasil ditambahkan atau tidak
            if ($result > 0) {
                // Jika data berhasil ditambahkan

                // Membuat variabel data khusus
                $barang = [
                    'kode_barang' => $kode_barang
                ];

                // Mengambil data barang dari tabel barang
                $dataBarang = $this->kasir->getOneBarang($barang);

                // memeriksa apakah ada data barang yang ditemukan atau tidak
                if ($dataBarang->num_rows() > 0) {
                    // Jika ada data barang yang ditemukan

                    // mengambil barang
                    $getBarang = $dataBarang->row_array();

                    // Membuat variabel data
                    $qtyBarang = $getBarang['stok'];

                    $ubahStokBarang = [
                        'stok' => ($qtyBarang - 1)
                    ];

                    // Menjalankan perubahan
                    $resultStok = $this->kasir->updateStokBarang($ubahStokBarang, $barang);

                    // Memeriksa apakah stok berhasil dikurangi
                    if ($resultStok > 0) {
                        // Jika stok berhasil dikurangi
                        $message['error_status'] = false;
                        $message['error_message'] = "Data barang berhasil ditambahkan";
                    } else {
                        // Jika stok gagal dikurangi
                        $message['error_status'] = true;
                        $message['error_message'] = "Data barang gagal ditambahkan";
                    }
                } else {
                    // Jika tidak ada data barang yand ditemukan

                    // Jika data gagal ditambahkan
                    $message['error_status'] = true;
                    $message['error_message'] = "Data barang gagal ditambahkan";
                }
            } else {
                // Jika data gagal ditambahkan
                $message['error_status'] = true;
                $message['error_message'] = "Data barang gagal ditambahkan";
            }
        }

        // Mencetak dalam format json
        echo json_encode($message);
    }
}
