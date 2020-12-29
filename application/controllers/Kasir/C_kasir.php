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
        is_logged_in();
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
        $this->load->view('admin/v_penjualan', $data);
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
        $config['base_url'] = base_url('kasir/loadBarang/');
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

        $whereBarang = [
            'kode_barang' => $kode_barang
        ];

        // Membuat variabel message untuk diterima oleh JavaScript melalui ajax
        $message['error_status'] = "";
        $message['error_message'] = "";

        // Membuat variabel untuk memeriksa stok barang yang ada di tabel barang
        $rowBarang = $this->kasir->getOneBarang($whereBarang);

        // Melakukan pemeriksaan
        $daftarCart = $this->kasir->daftarCart($where)->num_rows();

        // Memeriksa apakah ditemukan data yang sama
        if ($daftarCart > 0) {
            // Jika ada data yang ditemukan
            // Melakukan penambahan jumlah stok pada barang yang ditemukan

            // Memeriksa apakah ada data yang ditemukan
            if ($rowBarang->num_rows() > 0) {
                // Jika ada data yang ditemukan
                // Mengambil data barang
                $detailRowBarang = $rowBarang->row_array();

                // Memeriksa stok barang
                if ($detailRowBarang['stok'] > 0) {
                    // Jika stok lebih dari 0 maka tambahkan ke cart
                    // Mengambil data terakhir
                    $detailCart = $this->kasir->daftarCart($where)->row_array();

                    // Menambahkan stok barang tersebut
                    $value = [
                        'qty' => $detailCart['qty'] + 1,
                        'total' => (($detailCart['harga'] * ($detailCart['qty'] + 1) - $detailCart['discount']))
                    ];

                    // Melakukan update 
                    $result = $this->kasir->ubahStokCart($value, $where);

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
                    // Jika stok kurang dari sama dengan 0
                    $message['error_status'] = true;
                    $message['error_message'] = "Stok barang habis";
                }
            } else {
                // Jika tidak ada data yang ditemukan
                $message['error_status'] = true;
                $message['error_message'] = "Data barang tidak terdaftar";
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

                    // Memeriksa jumlah stok terlebih dahulu
                    if ($qtyBarang > 0) {
                        // Jika stok lebih dari 0
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
                        // Jika stok kurang dari sama dengan 0
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

    public function hapusKeranjang()
    {
        // Berfungsi untuk mengurangi jumlah barang yang akan dibeli dalam tabel keranjang oleh kasir N
        // dimana N adalah kasir yang sedang mengakses sitem informasi

        // Mengambil data yang dikirim dari ajax kedalam variabel
        $kasir = $this->session->userdata('kode_user');
        $kode_barang = $this->input->post('kode_barang', true);

        // Membuat variabel where
        $where = [
            'kode_user' => $kasir,
            'kode_barang' => $kode_barang
        ];

        // Membuat variabel error message
        $message['error_status'] = "";
        $message['error_message'] = "";

        // Memeriksa apakah ada data yang dicari dalam tabel cart 
        $result = $this->kasir->daftarCart($where);

        // Memeriksa apakah ada data yang dicari
        if ($result->num_rows() > 0) {
            // Jika ada yang ditemukan

            // Mengambil data kasir
            $detailCart = $result->row_array();

            // Memeriksa jumlah qty yang ada dalam keranjang
            $qtyCart = $detailCart['qty'];

            if ($qtyCart > 1) {
                // Jika jumlah barang dalam keranjang lebih dari 1

                // Mengurangi jumlah barang dalam keranjang
                $minusQtyCart = [
                    'qty' => ($qtyCart - 1),
                    'total' => (($detailCart['harga'] * ($qtyCart - 1)) - $detailCart['discount'])
                ];

                // Melakukan pengurangan jumlah barang dalam keranjang
                $updateQtyKeranjang = $this->kasir->ubahStokCart($minusQtyCart, $where);

                // Memeriksa apakah ada perubahan atau tidak
                if ($updateQtyKeranjang > 0) {
                    // Jika data berubah

                    // Membuat variabel untuk mengambil data barang
                    $whereBarang = [
                        'kode_barang' => $kode_barang
                    ];

                    // Mengambil data barang
                    $dataBarang = $this->kasir->getOneBarang($whereBarang);

                    // Memeriksa apakah ada barang yang ditemukan
                    if ($dataBarang->num_rows() > 0) {
                        // Jika ada barang yang ditemukan
                        // Mengambil data barang
                        $rowBarang = $dataBarang->row_array();

                        // Mengambil stok barang
                        $stokBarang = $rowBarang['stok'];

                        // Membuat row untuk update barang
                        $updateStokBarang = [
                            'stok' => ($stokBarang + 1)
                        ];

                        // Menjalankan perubahan
                        $resultStok = $this->kasir->updateStokBarang($updateStokBarang, $whereBarang);

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
                        // Jika tidak ada barang yang ditemukan
                        $message['error_status'] = true;
                        $message['error_message'] = "Data barang tidak ditemukan";
                    }
                } else {
                    // Jika data tidak berubah
                    $message['error_status'] = true;
                    $message['error_message'] = "Data gagal dirubah";
                }
            } else if ($qtyCart <= 1) {
                // Jika jumlah barang dalam keranjang adalah 1 atau kurang dari 1

                // Hapus barang dari cart
                $hapusCart = $this->kasir->hapusBarang($where);

                // Memeriksa apakah barang berhasil dihapus atau tidak
                if ($hapusCart > 0) {
                    // Jika berhasil dihapus

                    // Membuat variabel untuk mengambil data barang
                    $whereBarang = [
                        'kode_barang' => $kode_barang
                    ];

                    // Mengambil data barang di tabel barang
                    $dataBarang = $this->kasir->getOneBarang($whereBarang);

                    // Memeriksa apakah ada data barang yang ditemukan atau tidak
                    if ($dataBarang->num_rows() > 0) {
                        // Jika ada barang yang ditemukan

                        // Mengambil data barang
                        $rowBarang = $dataBarang->row_array();

                        // Mengambil stok barang
                        $stokBarang = $rowBarang['stok'];

                        // Membuat array untuk perubahan stok barang
                        $updateStokBarang = [
                            'stok' => ($stokBarang + 1)
                        ];

                        // Menjalankan edit stok
                        $resultUpdate = $this->kasir->updateStokBarang($updateStokBarang, $whereBarang);

                        // Memeriksa apakah update berhasil atau tidak
                        if ($resultUpdate > 0) {
                            // Jika berhasil
                            $message['error_status'] = false;
                            $message['error_message'] = "Data barang berhasil diubah";
                        } else {
                            // Jika tidak berhasil
                            $message['error_status'] = true;
                            $message['error_message'] = "Data barang gagal diubah";
                        }
                    } else {
                        // Jika tidak ada barang yang ditemukan
                        $message['error_status'] = true;
                        $message['error_message'] = "Data barang tidak ditemukan";
                    }
                } else {
                    // Jika tidak berhasil dihapus
                    $message['error_status'] = true;
                    $message['error_message'] = "Data barang gagal dihapus dari keranjang";
                }
            }
        } else {
            // Jika tidak ada yang ditemukan
            $message['error_status'] = true;
            $message['error_message'] = "Tidak ada barang yang ditemukan";
        }

        echo json_encode($message);
    }

    public function prosesTransaksi()
    {
        // Berfungsi untuk memproses transaksi semua barang yang berada di keranjang yang ditambahkan oleh kasir N
        // Dimana N adalah user (kasir) yang sedang login

        // Mengambil data yang dikirimkan melalui AJAX
        $data = [
            'kode_transaksi' => $this->input->post('kode_transaksi'),
            'invoice' => date('Ymdhis'),
            'kode_pembeli' => $this->input->post('kode_pembeli'),
            'kode_kasir' => $this->session->userdata('kode_user'),
            'total_price' => $this->input->post('total_harga'),
            'discount' => $this->input->post('diskon'),
            'final_price' => $this->input->post('grand_total'),
            'cash' => $this->input->post('cash'),
            'remaining' => $this->input->post('remaining'),
            'note' => 'Transaksi Berhasil',
            'date' => $this->input->post('tgl_transaksi'),
            'created' => date('Y-m-d H:i:s')
        ];

        // Mengambil array barang yang dikirimkan melalui ajax
        $arrayBarang = [];
        $arrayBarang = $this->input->post('array_barang');
        // Mengambil array pembelian barang sesuai dengan ajax
        $arrayQtyBarang = [];
        $arrayQtyBarang = $this->input->post('array_qty');

        // Membuat pesan error
        $message['error_status'] = "";
        $message['error_message'] = "";

        // Menginputkan data transaksi kedalam tabel transaksi offline
        $resultTransaksi = $this->kasir->tambahTransaksi($data);

        // Memeriksa hasil transaksi
        if ($resultTransaksi > 0) {
            // Jika transaksi berhasil

            // Melakukan insert data barang kedalam detail barang
            // Melakukan looping untuk menambahkan ke tabel detail transaksi
            for ($i = 0; $i < count($arrayBarang); $i++) {
                // Mengambil data barang
                $rowBarang = $this->kasir->getOneBarang(['kode_barang' => $arrayBarang[$i]]);

                // Memeriksa apakah ada data yang ditemukan atau tidak
                if ($rowBarang->num_rows() > 0) {
                    // Jika ada data yang ditemukan

                    $detailBarang = $rowBarang->row_array();

                    // Membuat array data
                    $dataBarangInsert = [
                        'kode_transaksi' => $data['kode_transaksi'],
                        'kode_barang' => $arrayBarang[$i],
                        'price' => $detailBarang['harga'],
                        'qty' => $arrayQtyBarang[$i],
                        'discount_item' => 0,
                        'total' => ($arrayQtyBarang[$i] * $detailBarang['harga'])
                    ];

                    // Melakukan proses tambah data
                    $resultTambahDetail = $this->kasir->tambahDetail($dataBarangInsert);

                    // Memeriksa apakah proses insert berhasil atau tidak
                    if ($resultTambahDetail > 0) {
                        // Jika proses insert berhasil

                        // Membuat array untuk menghapus barang dalam keranjang setelah di proses
                        $hapusCartDetail = [
                            'kode_user' => $this->session->userdata('kode_user'),
                            'kode_barang' => $arrayBarang[$i]
                        ];

                        // Menghapus data yang ada di keranjang
                        $resultHapus = $this->kasir->hapusCartDetail($hapusCartDetail);

                        // Memeriksa apakah penghapusan berhasil
                        if ($resultHapus > 0) {
                            // Jika penghapusan berhasil
                            $message['error_status'] = false;
                            $message['error_message'] = "Data berhasil ditambahkan";
                        } else {
                            // Jika penghapusan gagal
                            $message['error_status'] = true;
                            $message['error_message'] = "Data gagal ditambahkan";
                        }
                    } else {
                        // Jika proses insert gagal
                        $message['error_status'] = true;
                        $message['error_message'] = "Data gagal ditambahkan";
                    }
                } else {
                    // Jika tidak ada data yang ditemukan
                    $message['error_status'] = true;
                    $message['error_message'] = "Data gagal ditambahkan";
                }
            }
        } else {
            // Jika transaksi gagal
            $message['error_status'] = true;
            $message['error_message'] = "Data gagal ditambahkan";
        }

        echo json_encode($message);
    }
}
