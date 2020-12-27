<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_detail_barang_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'mbarang');
    }

    public function index($id)
    {
        // PL maksudnya produk landing page detail
        $dataquery =  $this->mbarang->getAllDetailItems($id);
        if ($dataquery->num_rows() > 0) {
            $item = $dataquery->row();
            $data = array(
                'row' => $item
            );
        }
        $data['title'] = "Detail Barang";
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('User/v_detail_barang', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }

    public function process()
    {
        // ini untuk tambah cartnya
    }
}
