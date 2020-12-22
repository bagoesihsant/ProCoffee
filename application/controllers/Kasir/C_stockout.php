<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_stockout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['M_barang', 'M_supplier', 'M_stockOut']);
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Stock Out';
        $data['row'] =  $this->M_stockOut->get_dataOut()->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_stock_out', $data);
        $this->load->view('templates/admin/footer');
    }

    public function stock_out_form()
    {
        $item = $this->M_barang->getAllItems()->result();
        $data = [
            'item' => $item
        ];
        $data['title'] = 'Stock Out Form';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_stock_outform', $data);
        $this->load->view('templates/admin/footer');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['out_add'])) {
            $this->M_stockOut->add_stock_out($post);
            $this->M_barang->update_stock_out($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Stok Out Barang telah di tambahkan</div>');
            }
            redirect('kasir/stock_out_data');
        }
    }

    public function delete_out()
    {
        $stok_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty =  $this->M_stockOut->get_out($stok_id)->row()->qty;
        $data = [
            'qty_input' => $qty,
            'kode_barang_input' => $item_id
        ];

        $this->M_barang->update_stock_in($data);
        $this->M_stockOut->delete($stok_id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Stok Out Barang telah di Hapus</div>');
        }
        redirect('kasir/stock_out_data');
    }
}
