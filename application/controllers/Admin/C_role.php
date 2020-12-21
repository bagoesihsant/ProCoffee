<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_role extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('M_role', 'role');
    }

    // Hak Akses
    public function index()
    {
        // Membuat title
        $data['title'] = "Manajemen Hak Akses";
        // Mengambil data dari database
        $data['role'] = $this->role->getAllRole();

        // Membuat aturan form validation untuk form
        $this->form_validation->set_rules('kode_role', 'Kode Hak Akses', 'required|trim');
        $this->form_validation->set_rules('role', 'Hak Akses', 'required|trim|alpha');

        // Membuat pesan khusus untuk aturan form_validation
        $this->form_validation->set_message('required', 'Field %s wajib diisi');
        $this->form_validation->set_message('alpha', 'Field %s hanya boleh berisi huruf.');

        // Menjalankan form_validation
        if ($this->form_validation->run() == false) {
            // Jika form_validation mengembalikan nilai false
            // Load View
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('admin/v_role');
            $this->load->view('templates/admin/footer');
        } else {
            // Jika form_validation mengembalikan nilai true

            // Membuat Array Data
            $data = [
                'kode_role' => htmlspecialchars($this->input->post('kode_role', true)),
                'role' => htmlspecialchars($this->input->post('role', true))
            ];

            // Menjalankan penambahan data
            $result = $this->role->tambahRole($data);

            // Memeriksa apakah penambahan data berhasil dijalankan atau tidak
            if ($result > 0) {
                // Jika data berhasil ditambahkan

                // Membuat session
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.success("Selamat, data berhasil ditambahkan.")'
                );
            } else {
                // Jika data gagal ditambahkan

                // Membuat session
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.error("Error, data gagal ditambahkan.")'
                );
            }

            // Mengembalikan ke halaman utama
            redirect('admin/role/');
        }
    }

    // Ajax untuk ambil data hak akses dari database secara Asynchronous
    public function ajaxEditRole()
    {
        // Menyimpan input dari user kedalam array data
        $data = [
            'kode_role' => htmlspecialchars($this->input->post('kode_role', true))
        ];

        // mengambil data hak akses dari database
        $result = $this->role->getDetailRole($data);

        echo json_encode($result);
    }

    // Edit Hak Akses
    public function editRole()
    {
        // Membuat rules untuk form_validation
        $this->form_validation->set_rules('kode_role', 'Kode Hak Akses', 'required|trim');
        $this->form_validation->set_rules('role', 'Hak Akses', 'required|trim|alpha');

        // Membuat pesan khusus untuk form_validation
        $this->form_validation->set_message('required', 'Field %s wajib diisi.');
        $this->form_validation->set_message('alpha', 'Field %s hanya boleh berisi huruf.');

        // Menjalankan form_validation
        if ($this->form_validation->run() == false) {
            // Jika form_validation mengembalikan nilai false
            $this->index();
        } else {
            // Jika form_validation mengembalikan nilai true

            // Membuat Array Data
            $data = ['role' => htmlspecialchars($this->input->post('role', true))];

            // Membuat Array Where
            $where = ['kode_role' => htmlspecialchars($this->input->post('kode_role', true))];

            // Menjalankan update
            $result = $this->role->updateRole($data, $where);

            // Memeriksa apakah update berhasil atau tidak
            if ($result > 0) {
                // Jika update data berhasil

                // Membuat Session
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.success("Selamat, data berhasil diubah.")'
                );
            } else {
                // Jika update data gagal

                // Membuat session
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.error("Error, data gagal diubah.")'
                );
            }

            redirect('admin/role/');
        }
    }

    // Hapus Hak Akses
    public function deleteRole($kode)
    {
        // Membuat array data
        $data = [
            'kode_role' => $kode
        ];

        // Menjalankan delete
        $result = $this->role->deleteRole($data);

        // memeriksa hasil delete
        if ($result > 0) {
            // Jika delete berhasil

            // Membuat session
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.success("Selamat, data berhasil dihapus.")'
            );
        } else {
            // Jika delete gagal

            // Membuat session
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Error, data gagal dihapus.")'
            );
        }

        redirect("admin/role/");
    }

    // Manajemen Pemberian Hak Akses
    public function userAkses($kode)
    {
        // Membuat title
        $data['title'] = "Manajemen Akses";
        // Mengambil data menu
        $data['menu'] = $this->role->getAllMenu();
        // Mengirimkan kode user
        $data['kode_role'] = $kode;

        // Load View
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_assign_role');
        $this->load->view('templates/admin/footer');
    }

    // Menambahkan hak akses kedalam akses menu
    public function addAkses()
    {
        // Mengambil data yang dikirimkan melalui ajax
        $data = [
            'kode_role' => htmlspecialchars($this->input->post('kode_role', true)),
            'kode_menu' => htmlspecialchars($this->input->post('kode_menu', true))
        ];

        // Menjalankan penambahan hak akses kedalam akses menu
        $result = $this->role->addAccess($data);

        // Memeriksa apakah penambahkan berhasil atau tidak
        if ($result > 0) {
            // Jika penambahan berhasil
            $hasil = ['error_message' => false];
        } else {
            // Jika penambahan gagal
            $hasil = ['error_message' => true];
        }

        echo json_encode($hasil);
    }

    public function removeAkses()
    {
        // Mengambil data yang dikirimkan melalui ajax
        $data = [
            'kode_role' => htmlspecialchars($this->input->post('kode_role', true)),
            'kode_menu' => htmlspecialchars($this->input->post('kode_menu', true))
        ];

        // Menjalankan penambahan hak akses kedalam akses menu
        $result = $this->role->removeAccess($data);

        // Memeriksa apakah penambahkan berhasil atau tidak
        if ($result > 0) {
            // Jika penambahan berhasil
            $hasil = ['error_message' => false];
        } else {
            // Jika penambahan gagal
            $hasil = ['error_message' => true];
        }

        echo json_encode($hasil);
    }
}
