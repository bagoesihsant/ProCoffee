<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'mbarang');
        $this->load->model('M_cart_online', 'mcart');
    }

    public function index()
    {
        $data['cart'] = $this->mcart->get_cart_data();
        $data['title'] = "Keranjang";
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('User/v_cart_user', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }

    public function delete_cart($id)
    {
        $this->mcart->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message_cart_del', '<div class="alert alert-success" role="alert">Barang telah di hapus dari keranjang<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            redirect('User/Cart');
        } else {
            $this->session->set_flashdata('message_cart_del', '<div class="alert alert-danger" role="alert">Barang gagal di hapus dari keranjang<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            redirect('User/Cart');
        }
    }
}
