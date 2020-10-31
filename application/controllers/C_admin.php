<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{


    // Construct
    public function __construct()
    {
        parent::__construct();

        // Load Model Menu
        $this->load->model('M_menu', 'menu');
    }

    // Index
    public function index()
    {
        $this->load->view('templates/v_header_admin');
        $this->load->view('templates/v_sidebar_admin');
        $this->load->view('admin/v_dashboard');
        $this->load->view('templates/footer_js');
        $this->load->view('admin/custom_js');
        $this->load->view('templates/v_footer_admin');
    }

    // Customer
    public function index_customer()
    {
        $this->load->view('templates/v_header_admin');
        $this->load->view('templates/v_sidebar_admin');
        $this->load->view('admin/v_customer');
        $this->load->view('templates/footer_js');
        $this->load->view('admin/custom_js');
        $this->load->view('templates/v_footer_admin');
    }

    // Supplier
    public function index_supplier()
    {
        $this->load->view('templates/v_header_admin');
        $this->load->view('templates/v_sidebar_admin');
        $this->load->view('admin/v_supplier');
        $this->load->view('templates/footer_js');
        $this->load->view('admin/custom_js');
        $this->load->view('templates/v_footer_admin');
    }

    // Produk
    public function index_product_categories()
    {
        $this->load->view('templates/v_header_admin');
        $this->load->view('templates/v_sidebar_admin');
        $this->load->view('admin/v_categories');
        $this->load->view('templates/footer_js');
        $this->load->view('admin/custom_js');
        $this->load->view('templates/v_footer_admin');
    }

    // Units
    public function index_product_units()
    {
        $this->load->view('templates/v_header_admin');
        $this->load->view('templates/v_sidebar_admin');
        $this->load->view('admin/v_units');
        $this->load->view('templates/footer_js');
        $this->load->view('admin/custom_js');
        $this->load->view('templates/v_footer_admin');
    }

    // Item
    public function index_product_items()
    {
        $this->load->view('templates/v_header_admin');
        $this->load->view('templates/v_sidebar_admin');
        $this->load->view('admin/v_item');
        $this->load->view('templates/footer_js');
        $this->load->view('admin/custom_js');
        $this->load->view('templates/v_footer_admin');
    }

    // Menu
    public function index_menu()
    {

        // Membuat variabel array data
        // Mengambil isi menu dari database
        $data['menu'] = $this->menu->getAllMenu();

        // Membuat rule untuk validasi form
        $this->form_validation->set_rules('kode_menu', 'Kode Menu', 'required|trim|alpha_numeric');
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim|alpha_numeric_spaces');

        // Membuat pesan kustom untuk rule validasi form
        $this->form_validation->set_message('required', 'Field %s wajib diisi.');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Field %s hanya boleh berisikan angka dan huruf.');

        // Melakukan validasi form
        if ($this->form_validation->run() == false) {
            // Jika hasil validasi form mengembalikan false
            $this->load->view('templates/v_header_admin', $data);
            $this->load->view('templates/v_sidebar_admin');
            $this->load->view('admin/v_menu');
            $this->load->view('templates/footer_js');
            $this->load->view('admin/custom_js');
            $this->load->view('templates/v_footer_admin');
        } else {
            // Jika hasil validasi form mengembalikan true

            // Membuat array data
            $data = [
                'kode_menu' => htmlspecialchars($this->input->post('kode_menu', true)),
                'menu' => htmlspecialchars(ucwords($this->input->post('menu', true)))
            ];

            // Melakukan penambahan data
            $result = $this->menu->tambahMenu($data);

            // Memeriksa apakah proses insert berhasil atau tidak
            if ($result > 0) {
                // Jika proses insert berhasil

                // Membuat Session
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.success("Selamat, Data berhasil ditambahkan.")'
                );

                // Mengarahkan ulang
                redirect('admin/menu');
            } else {
                // Jika proses insert tidak berhasil

                // Membuat Session
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.error("Error, Data gagal ditambahkan.")'
                );

                // Mengarahkan ulang
                redirect('admin/menu');
            }
        }
    }
}
