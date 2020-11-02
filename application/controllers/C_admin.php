<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{


    // Construct
    public function __construct()
    {
        parent::__construct();

        // Load Model
        // Menu
        $this->load->model('M_menu', 'menu');
        // Sub Menu
        $this->load->model('M_sub_menu', 'submenu');
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
    public function index_user()
    {
        $this->load->view('templates/v_header_admin');
        $this->load->view('templates/v_sidebar_admin');
        $this->load->view('admin/v_user');
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
            } else {
                // Jika proses insert tidak berhasil

                // Membuat Session
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.error("Error, Data gagal ditambahkan.")'
                );
            }


            // Mengarahkan ulang
            redirect('admin/menu');
        }
    }

    // Menu - Ajax Edit - untuk mengambil data dari database secara asynchronous
    public function ajaxDataEditMenu()
    {
        // Membuat array data dan menyimpan data yang dikirimkan oleh JavaScript
        $data = [
            'kode_menu' => htmlspecialchars($this->input->post('kode_menu', true))
        ];

        // Menjalankan query untuk mengambil data menu dari database
        $result = $this->menu->getDetailMenu($data);

        // Mengubah hasil dari database menjadi json
        echo json_encode($result);
    }

    // Menu - Edit Menu
    public function editMenu()
    {

        // Membuat rule untuk validasi form
        $this->form_validation->set_rules('kode_menu', 'Kode Menu', 'required|trim|alpha_numeric');
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim|alpha_numeric_spaces');

        // Membuat pesan kustom untuk rule validasi form
        $this->form_validation->set_message('required', 'Field %s wajib diisi.');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Field %s hanya boleh berisikan angka dan huruf.');

        // Menjalankan form_validation
        if ($this->form_validation->run() == false) {
            // Jika form validation mengembalikan nilai false
            $this->index_menu();
        } else {
            // Jika form validation mengembalikan nilai true

            // Membuat array data
            $data = [
                'menu' => htmlspecialchars(ucwords($this->input->post('menu', true)))
            ];

            // Membuat array where
            $where = [
                'kode_menu' => htmlspecialchars($this->input->post('kode_menu', true))
            ];

            // Menjalankan query untuk mengubah data menu
            $result = $this->menu->ubahMenu($data, $where);

            // Memeriksa apakah query mengubah data menu berhasil dijalankan
            if ($result > 0) {
                // Jika query mengubah data berhasil dijalankan

                // Membuat Session
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.success("Selamat, Data berhasil diubah.")'
                );
            } else {
                // Jika query mengubah data gagal dijalankan

                // Membuat session
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.error("Error, Data gagal diubah.")'
                );
            }

            // Mengarahkan kembali
            redirect('admin/menu');
        }
    }

    // Menu - Hapus Menu
    public function hapusMenu($kode)
    {

        // Membuat array data
        $data = [
            'kode_menu' => $kode
        ];

        // Menjalankan fungsi untuk menghapus menu
        $result = $this->menu->hapusMenu($data);

        // Memeriksa apakah menu berhasil dihapus
        if ($result > 0) {
            // Jika menu berhasil dihapus

            // Membuat session
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.success("Selamat, Data berhasil dihapus.")'
            );
        } else {
            // Jika menu gagal dihapus

            // Membuat session
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Error, Data gagal dihapus.")'
            );
        }


        // Mengarahkan kembali
        redirect('admin/menu');
    }

    // Sub Menu - Index
    public function index_submenu()
    {

        // Membuat array data
        // Mengambil data seluruh sub menu
        $data['submenu'] = $this->submenu->getAllSubMenu();

        // Membuat aturan validasi form
        $this->form_validation->set_rules('kode_sub_menu', 'Kode Submenu', 'required|trim');
        $this->form_validation->set_rules('menu_sub_menu', 'Menu', 'required|trim');
        $this->form_validation->set_rules('sub_menu', 'Submenu', 'required|trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('url_sub_menu', 'URL', 'required|trim|regex_match[/^[a-zA-Z\/]+$/]');
        $this->form_validation->set_rules('icon_sub_menu', 'Icon', 'required|trim|regex_match[/^[a-zA-Z\-\s]+$/]');



        // Menjalankan form validation
        if ($this->form_validation->run() == false) {
            // Jika form validation mengembalikan value false
            // Load View
            $this->load->view('templates/v_header_admin', $data);
            $this->load->view('templates/v_sidebar_admin');
            $this->load->view('admin/v_sub_menu');
            $this->load->view('templates/footer_js.php');
            $this->load->view('admin/custom_js.php');
            $this->load->view('templates/v_footer_admin');
        } else {
            // Jika form validation mengembalikan value true
            // Membuat Array data
            $data = [
                'kode_sub_menu' => htmlspecialchars($this->input->post('kode_sub_menu', true)),
                'kode_menu' => htmlspecialchars($this->input->post('menu_sub_menu', true)),
                'sub_menu' => htmlspecialchars($this->input->post('sub_menu', true)),
                'url' => htmlspecialchars($this->input->post('url_sub_menu', true)),
                'icon' => htmlspecialchars($this->input->post('icon_sub_menu', true)),
                'is_active' => htmlspecialchars($this->input->post('status_sub_menu', true))
            ];

            // Melakukan Penambahan Data
            $result = $this->submenu->tambahSubmenu($data);

            // Memeriksa apakah data berhasil ditambahkan atau tidak
            if ($result > 0) {
                // Jika data berhasil ditambahkan

                // Membuat session
                $this->session->set_flashdata(
                    'pesan_sub_menu',
                    'toastr.success("Selamat, Data berhasil ditambahkan.")'
                );
            } else {
                // Jika data gagal ditambahkan

                // Membuat session
                $this->session->set_flashdata(
                    'pesan_sub_menu',
                    'toastr.error("Error, Data gagal ditambahkan.")'
                );
            }

            // Mengarahkan kembali
            redirect('admin/submenu');
        }
    }
}
