<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_barang_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'mbarang');
        $this->load->model('M_cart_online', 'mcart');
        $this->load->model('M_usero');
    }

    public function index()
    {
        $data['jumlah_carto'] = $this->M_usero->count_cart();
        // PL maksudnya produk landing page
        $data['PL'] =  $this->mbarang->getAllItems()->result();
        $data['title'] = "List Produk";
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('User/v_list_barang', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }

    public function process()
    {
        // ini untuk tambah cartnya
        $id_barang = $this->input->post('kode_barang_input');
        $nama_barang = $this->input->post('nama_barang');
        $post   =   $this->input->post(null, TRUE);
        if (isset($_POST['tambah_cart_list'])) {


            $this->mcart->add_cart($post);
            $this->session->set_flashdata('message_cart_list', '<div class="alert alert-success" role="alert">' . $nama_barang . ' telah di tambahkan ke keranjang<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            redirect('User/List');
        }
    }
}
