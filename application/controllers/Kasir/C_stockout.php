<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_stockout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['M_barang', 'M_supplier', 'M_stock']);
    }

    public function index()
    {
        $data['row'] =  $this->M_stock->get_data();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_stock_out', $data);
        $this->load->view('templates/admin/footer');
    }

    public function stock_out_form()
    {
        $data['row'] =  $this->M_stock->get_data();
        $item = $this->M_barang->getAllItems()->result();
        $data = ['item' => $item];
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_stock_outform', $data);
        $this->load->view('templates/admin/footer');
    }

    public function process()
    {
        if (isset($_POST['out_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->M_stock->add_stock_out($post);
            $this->M_barang->update_stock_out($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Stok Out Barang telah di tambahkan</div>');
            }
            redirect('kasir/stock_out_data');
        }
    }

    public function delete_out()
    {
        // 
    }
}
