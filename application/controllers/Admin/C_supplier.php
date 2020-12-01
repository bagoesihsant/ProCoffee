<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_supplier extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('M_supplier', 'supplier');
    }


    // Supplier  Supplier  Supplier
    public function index()
    {
        $data['title'] = 'Supplier';
        $data['supplier'] = $this->supplier->getAllSupplier()->result();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_supplier', $data);
        $this->load->view('templates/admin/footer');
    }

    // tambah supplier
    public function tambah_supplier()
    {
        // form validasi 
        $this->form_validation->set_rules('nama', 'Nama', 'required',
            array(
                'required' => 'Isian tidak boleh kosong'
            ));
        $this->form_validation->set_rules('notelp', 'No Telepon', 'required|numeric|min_length[11]|max_length[13]',
            array(
                'required' => 'Isian tidak boleh kosong',
                'numeric' => 'Isian harus angka',
                'min_length' => 'Isian minimal 11 karakter',
                'max_length' => 'Isian maksimal 13 karakter'
            ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',
            array(
                'required' => 'Isian tidak boleh kosong'
            ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required',
            array(
                'required' => 'Isian tidak boleh kosong'
            ));
        // form validasi end 

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Data gagal ditambahkan.")'
            );
            
            $data['title'] = 'Supplier';
            $data['supplier'] = $this->supplier->getAllSupplier()->result();

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('admin/v_supplier', $data);
            $this->load->view('templates/admin/footer');
        } else {

            $kode = $this->input->post('kode');
            $nama = htmlspecialchars($this->input->post('nama'));
            $notelp = $this->input->post('notelp');
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $deskripsi =$this->input->post('deskripsi');

            $data = array(
                'kode_supplier' => $kode,
                'nama' => $nama,
                'no_hp' => $notelp,
                'alamat' => $alamat,
                'deskripsi' => $deskripsi,
                'created' => date('d-m-Y')
            );

            $sukses = $this->supplier->tambah_supplier($data, 'supplier');
            if ($sukses != 0) {
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.success("Data berhasil ditambahkan.")'
                );
                redirect('admin/C_supplier');
            }
        }
    }

    //hapus supplier
    public function hapus_supplier($id)
    {
        $data = array('kode_supplier' => $id);
        $hapus = $this->supplier->hapus_supplier($data);

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

        redirect('admin/C_supplier');
    }

    // edit supplier
    // menuju ke halaman edit supplier 
    public function edit_supplier($id)
    {
        $data['edit'] = $this->supplier->get_where($id)->result();

        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_edit_supplier', $data);
        $this->load->view('templates/admin/footer');
        
    }

    // menjalankan aksi edit    
    public function edit_supplier_aksi()
    {
        // form validasi 
        $this->form_validation->set_rules('nama', 'Nama', 'required', 
                array(
                    'required' => 'Isian tidak boleh kosong'
                ));
        $this->form_validation->set_rules('notelp', 'No Telepon', 'required|numeric|min_length[11]|max_length[13]',
                array(
                    'required' => 'Isian tidak boleh kosong',
                    'numeric' => 'Data yang dimasukkan harus berupa angka',
                    'min_length' => 'Data yang dimasukkan minimal 11 karakter',
                    'max_length' => 'Data yang dimasukkan maksimal 13 karakter'
                ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',
                array(
                    'required' => 'Isian tidak boleh kosong'
                ));
        $this->form_validation->set_rules('deskripsi',"Deskripsi", 'required',
                array(
                    'required' => 'Isian tidak boleh kosong'
                ));
        // form validasi end 

        if ($this->form_validation->run() == false) {
            $id = $this->input->post('kode');

            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Data gagal diUpdate")'
            );

            $data['edit'] = $this->supplier->get_where($id)->result();

            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('admin/v_edit_supplier', $data);
            $this->load->view('templates/admin/footer');

        } else {
            $kode = $this->input->post('kode');
            $nama = htmlspecialchars($this->input->post('nama'));
            $notelp = $this->input->post('notelp');
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $deskripsi = $this->input->post('deskripsi');

            $where = array (
                'kode_supplier' => $kode
            );
            $data = array (
                'nama' => $nama,
                'no_hp' => $notelp,
                'alamat' => $alamat,
                'deskripsi' => $deskripsi,
                'updated' => date('dmY')
            );

            if ($this->supplier->edit_supplier($data, $where) > 0)
            {
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.success("Data berhasil diUpdate")'
                );
            redirect('admin/C_supplier');

            }else{
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.error("Data gagal diUpdate")'
                );
            redirect('admin/C_supplier/edit_supplier/'.$id);

            }
        }
    }
}
