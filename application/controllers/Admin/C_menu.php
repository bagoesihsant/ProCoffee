<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_menu extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('M_menu', 'menu');
    }


    // Index
    public function index()
    {
        // Mengambil data user yang sedang login
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Membuat variabel array data
        // Mengambil isi menu dari database
        $data['title'] = 'Managemen Menu';
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
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('admin/v_menu', $data);
            $this->load->view('templates/admin/footer');
        } else {
            // Jika hasil validasi form mengembalikan true

            // Membuat array data
            $data = [
                'kode_menu' => htmlspecialchars($this->input->post('kode_menu', true)),
                'menu' => htmlspecialchars(ucwords($this->input->post('menu', true))),
                'icon' => htmlspecialchars($this->input->post('icon_menu', true))
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

    // Menu - Ajax Edit - untuk mengambil data dari database menggunakan Ajax
    public function ajaxEditMenu()
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
        $this->form_validation->set_rules('icon_menu', 'Icon Menu', 'required|trim|regex_match[/^[a-zA-Z\-\s]+$/]');

        // Membuat pesan kustom untuk rule validasi form
        $this->form_validation->set_message('required', 'Field %s wajib diisi.');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Field %s hanya boleh berisikan angka dan huruf.');
        $this->form_validation->set_message('regex_match', 'Karakter yang anda inputkan mengangdung karakter terlarang.');

        // Menjalankan form_validation
        if ($this->form_validation->run() == false) {
            // Jika form validation mengembalikan nilai false
            $this->index();
        } else {
            // Jika form validation mengembalikan nilai true

            // Membuat array data
            $data = [
                'menu' => htmlspecialchars(ucwords($this->input->post('menu', true))),
                'icon' => htmlspecialchars($this->input->post('icon_menu', true))
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

    // Submenu
    public function submenu()
    {
        // Mengambil data user yang sedang login
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Membuat array data
        // Mengambil data seluruh sub menu
        $data['title'] = 'Manajemen Submenu';
        $data['submenu'] = $this->menu->getAllSubMenu();

        // Membuat aturan validasi form
        $this->form_validation->set_rules('kode_sub_menu', 'Kode Submenu', 'required|trim');
        $this->form_validation->set_rules('menu_sub_menu', 'Menu', 'required|trim');
        $this->form_validation->set_rules('sub_menu', 'Submenu', 'required|trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('url_sub_menu', 'URL', 'required|trim|regex_match[/^[a-zA-Z\/]+$/]');

        // Membuat pesan khusus untuk aturan validasi
        $this->form_validation->set_message('required', 'Field %s wajib diisi.');
        $this->form_validation->set_message('alpha_numeric_space', 'Field %s hanya boleh berisi huruf dan angka.');
        $this->form_validation->set_message('regex_match', 'Karakter yang anda inputkan mengangdung karakter terlarang.');

        // Menjalankan form validation
        if ($this->form_validation->run() == false) {
            // Jika form validation mengembalikan value false
            // Load View
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('admin/v_sub_menu', $data);
            $this->load->view('templates/admin/footer.php');
        } else {
            // Jika form validation mengembalikan value true
            // Membuat Array data
            $data = [
                'kode_sub_menu' => htmlspecialchars($this->input->post('kode_sub_menu', true)),
                'kode_menu' => htmlspecialchars($this->input->post('menu_sub_menu', true)),
                'sub_menu' => htmlspecialchars($this->input->post('sub_menu', true)),
                'url' => htmlspecialchars($this->input->post('url_sub_menu', true)),
                'is_active' => htmlspecialchars($this->input->post('status_sub_menu', true))
            ];

            // Melakukan Penambahan Data
            $result = $this->menu->tambahSubmenu($data);

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

    // Sub Menu - Ajax Edit
    public function ajaxEditSubmenu()
    {

        // Menyimpan data yang dikirim kedalam array data
        $data = [
            'kode_sub_menu' => htmlspecialchars($this->input->post('kode_sub_menu', true))
        ];

        // Mengambil data submenu sesuai kode
        $result = $this->menu->getDetailSubmenu($data);

        // Mencetak data yang dihasilkan menjadi json
        echo json_encode($result);
    }

    // Sub Menu - Edit
    public function editSubmenu()
    {
        // Membuat aturan untuk validasi form

        // Membuat aturan validasi form
        $this->form_validation->set_rules('kode_sub_menu', 'Kode Submenu', 'required|trim');
        $this->form_validation->set_rules('menu_sub_menu', 'Menu', 'required|trim');
        $this->form_validation->set_rules('sub_menu', 'Submenu', 'required|trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('url_sub_menu', 'URL', 'required|trim|regex_match[/^[a-zA-Z\/]+$/]');

        // Membuat pesan khusus untuk aturan validasi
        $this->form_validation->set_message('required', 'Field %s wajib diisi.');
        $this->form_validation->set_message('alpha_numeric_space', 'Field %s hanya boleh berisi huruf dan angka.');
        $this->form_validation->set_message('regex_match', 'Karakter yang anda inputkan mengangdung karakter terlarang.');

        // Melakukan validasi form
        if ($this->form_validation->run() == false) {
            // Jika form validation mengembalikan nilai false
            $this->submenu();
        } else {
            // Jika form validation mengembalikan nilai true

            // Memasukkan input kedalam array data
            $data = [
                'kode_menu' => htmlspecialchars($this->input->post('menu_sub_menu', true)),
                'sub_menu' => htmlspecialchars($this->input->post('sub_menu', true)),
                'url' => htmlspecialchars($this->input->post('url_sub_menu', true)),
                'is_active' => htmlspecialchars($this->input->post('status_sub_menu_edit', true))
            ];

            $where = [
                'kode_sub_menu' => htmlspecialchars($this->input->post('kode_sub_menu', true))
            ];

            // Menjalankan proses update data
            $result = $this->menu->updateSubmenu($data, $where);

            // Memeriksa apakah perubahan data berhasil
            if ($result > 0) {
                // Jika perubahan data berhasil

                // Membuat session
                $this->session->set_flashdata(
                    'pesan_sub_menu',
                    'toastr.success("Selamat, Data berhasil diubah.")'
                );
            } else {
                // Jika perubahan data gagal

                // Membuat session
                $this->session->set_flashdata(
                    'pesan_sub_menu',
                    'toastr.error("Error, Data gagal diubah.")'
                );
            }

            // Mengarahkan kembali
            redirect('admin/submenu');
        }
    }

    // Submenu - Hapus
    public function hapusSubmenu($kode)
    {

        // Membuat array data
        $data = [
            'kode_sub_menu' => $kode
        ];

        // Menjalankan fungsi hapus sub menu
        $result = $this->menu->hapusSubmenu($data);

        // Memeriksa apakah submenu sudah terhapus atau belum
        if ($result > 0) {
            // Jika submenu berhasil terhapus

            // Membuat session
            $this->session->set_flashdata(
                'pesan_sub_menu',
                'toastr.success("Selamat, Data berhasil dihapus.")'
            );
        } else {
            // Jika submenu gagal terhapus

            // Membuat session
            $this->session->set_flashdata(
                'pesan_sub_menu',
                'toastr.error("Error, Data gagal dihapus.")'
            );
        }

        // mengarahkan kembali
        redirect('admin/submenu');
    }
}
