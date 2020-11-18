<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_kategori extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Categories', 'mproduk');
    }

    public function index()
    {
        $data['row'] = $this->mproduk->getDataProduct();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_categories', $data);
        $this->load->view('templates/admin/footer');
    }

    public function addDataCategories()
    {
        $data['row'] = $this->mproduk->getDataProduct();
        $kode_kategori =  htmlspecialchars($this->input->post('kode_kategori'));
        $nama_kategori =  htmlspecialchars($this->input->post('nama_kategori'));

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim', [
            'requried' => 'Mohon untuk di isi nama kategorinya'
        ]);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'kode_kategori' => $kode_kategori,
                'nama'          => $nama_kategori,
                'created'       => time()
            ];

            $this->mproduk->addData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kategori Barang telah di tambahkan</div>');
            redirect('admin/kategori');
        }
    }

    public function editDataCategories()
    {
        // $id_ktgori = $this->input->post('kode_kategori');
        // $nama_ktgori =  htmlspecialchars($this->input->post('nama_kategori'));
        $post = $this->input->post(null, TRUE);
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim', [
            'requried' => 'Mohon untuk di isi nama kategorinya'
        ]);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $this->mproduk->editDataModal($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kategori Barang telah di edit</div>');
            redirect('admin/kategori');
        }
    }

    public function deleteCategory($id)
    {
        $this->mproduk->deleteCategoryModel($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kategori Barang telah di Hapus</div>');
            redirect('admin/kategori');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kategori Barang gagal di Hapus</div>');
            redirect('admin/kategori');
        }
    }
}
