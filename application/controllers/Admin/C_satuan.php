<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_satuan extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_products', 'mproduk');
    }

    // Units
    public function index()
    {
        $data['row'] = $this->mproduk->readDatasatuan();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_units', $data);
        $this->load->view('templates/admin/footer');
    }

    public function addDataUnits()
    {
        $kode_unit =  htmlspecialchars($this->input->post('kode'));
        $nama_unit =  htmlspecialchars($this->input->post('nama'));
        $this->form_validation->set_rules('nama', 'Nama Ubits', 'required|trim', [
            'requried' => 'Mohon untuk di isi nama Satuannya'
        ]);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'kode_satuan' => $kode_unit,
                'nama'        => $nama_unit,
                'created'     => time()
            ];
            $this->mproduk->addDataSatuan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Satuan Barang telah di tambahkan</div>');
            redirect('admin/satuan');
        }
    }

    public function editDataUnits()
    {
        $post = $this->input->post(null, TRUE);
        $this->form_validation->set_rules('nama', 'Nama Satuan', 'required|trim', [
            'required' => 'Silahkan untuk nama di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $this->mproduk->editDataUnitsM($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Satuan Barang telah di Ubah</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Matiin Input idnya woy</div>');
        }

        redirect('admin/satuan');
    }

    public function deleteUnits($id)
    {
        $this->mproduk->deleteUnits($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Units Barang telah di Hapus</div>');
            redirect('admin/satuan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Units Barang gagal di Hapus</div>');
            redirect('admin/satuan');
        }
    }
    // end unit
}
