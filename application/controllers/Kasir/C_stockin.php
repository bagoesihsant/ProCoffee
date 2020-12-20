<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_stockin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['M_barang', 'M_supplier', 'M_stockin']);
    }
    public function index()
    {
        $data['title'] = 'Stock In';
        $data['row'] = $this->M_stockin->get_data_in()->result();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_stock_in', $data);
        $this->load->view('templates/admin/footer');
    }
    public function stock_in_form()
    {
        $data['title'] = 'Stock In Form';
        $item = $this->M_barang->getAllItems()->result();
        $data = ['item' => $item];
        $data['supplier'] = $this->M_supplier->getAllSupplier()->result_array();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_stock_inform', $data);
        $this->load->view('templates/admin/footer');
    }
    // public function stock_in_add()
    // {
    //     $item = $this->M_barang->getAllItems()->result();

    //     $supplier = $this->M_supplier->getAllSupplier()->result();

    //     $data = [
    //         'item' => $item,
    //         'supplier' => $supplier
    //     ];
    //     $this->load->view('templates/admin/header');
    //     $this->load->view('templates/admin/sidebar');
    //     $this->load->view('admin/v_stock_inform', $data);
    //     $this->load->view('templates/admin/footer');
    // }

    //untuk tampilan awal stock in
    public function stock_in_data()
    {
        $data['title'] = 'Data Stock In';
        $data['row'] = $this->M_stock->get_stock_in()->result();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/v_stock_inform', $data);
        $this->load->view('templates/admin/footer');
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['in_add'])) {
            $this->M_stockin->add_stock_in($post);
            $this->M_barang->update_stock_in($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Stock In Barang telah ditambahkan</div>');
            }
            redirect('kasir/stock_in_data');
        }
    }

    public function delete_in()
    {
        $stok_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->M_stockin->get_in($stok_id)->row()->qty;

        $data = [
            'qty_input' => $qty,
            'kode_barang_input' => $item_id
        ];

        $this->M_barang->update_stock_in($data);
        $this->M_stockin->delete($stok_id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Stock Barang Telah DIhapus</div>');
        }
        redirect('kasir/stock_in_data');
    }
}
