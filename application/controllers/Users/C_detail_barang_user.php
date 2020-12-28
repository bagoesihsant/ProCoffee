<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_detail_barang_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'mbarang');
        $this->load->model('M_cart_online', 'mcart');
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
        $id_barang = $this->input->post('kode_barang_input');
        $post   =   $this->input->post(null, TRUE);
        if (isset($_POST['tambah_cart'])) {


            $this->mcart->add_cart($post);
            $this->session->set_flashdata('message_cart', '<div class="alert alert-success" role="alert">Barang telah di tambahkan ke keranjang<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            redirect('User/Detail/' . $id_barang . '');
        }
    }
}
