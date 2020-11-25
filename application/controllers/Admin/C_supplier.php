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
        $data['supplier'] = $this->supplier->getAllSupplier()->result();

        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_supplier', $data);
        $this->load->view('templates/admin/footer');
    }

    // tambah supplier
    public function tambah_supplier()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('notelp', 'No Telepon', 'required|numeric|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Data gagal ditambahkan.")'
            );
            redirect('admin/C_supplier');
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

    //edit supplier
    public function edit_supplier()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('notelp', 'No Telepon', 'required|numeric|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Data gagal diUpdate.")'
            );
            redirect('admin/C_supplier');
        } else {

            $kode = $this->input->post('kode');
            $nama = htmlspecialchars($this->input->post('nama'));
            $notelp = $this->input->post('notelp');
            $alamat = htmlspecialchars($this->input->post('alamat'));

            $data = array(
                'nama' => $nama,
                'no_hp' => $notelp,
                'alamat' => $alamat,
                'updated' => date('dmY')
            );

            $where = array(
                'kode_supplier' => $kode
            );

            $edit = $this->supplier->edit_supplier($data, $where);

            if ($edit != 0) {
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.success("Data berhasil diubah.")'
                );
            } else {
                $this->session->set_flashdata(
                    'pesan_menu',
                    'toastr.danger("Data gagal diubah.")'
                );
            }

            redirect('admin/C_supplier');
        }
    }

    public function deskripsi_edit($id)
    {
        $data['deskripsi'] = $this->supplier->get_where($id)->result();

        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_supplier_desedit', $data);
        $this->load->view('templates/admin/footer');
        
    }

    public function edit_des_supplier()
    {
        $this->form_validation->set_rules('deskripsi',"Deskripsi", 'required');

        if ($this->form_validation->run() == false) {

        $id = $this->input->post('kode_supplier');

            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Data gagal diUpdate, isian tidak boleh kosong")'
            );
            redirect('admin/C_supplier/deskripsi_edit/'.$id);
        } else {
            $deskripsi = $this->input->post('deskripsi');
            $id = $this->input->post('kode_supplier');

            $where = array (
                'kode_supplier' => $id
            );
            $data = array (
                'deskripsi' => $deskripsi
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
            redirect('admin/C_supplier/deskripsi_edit/'.$id);

            }
        }
    }
}
