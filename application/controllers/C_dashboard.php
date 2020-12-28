<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model([
            'M_barang', 
            'M_supplier', 
            'm_menu', 
            'M_user', 
            'm_sub_menu', 
            'M_Satuan', 
            'M_Categories', 
            'M_stockin', 
            'M_stockOut', 
            'M_role'
            ]);
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_satuan'] = $this->M_Satuan->total_rows();
        $data['total_kategori'] = $this->M_Categories->total_rows();
        $data['total_smenu'] = $this->m_sub_menu->total_rows();
        $data['total_user'] = $this->M_user->total_rows();
        $data['total_menu'] = $this->m_menu->total_rows();
        $data['total_supplier'] = $this->M_supplier->total_rows();
        $data['total_barang'] = $this->M_barang->total_rows();
        $data['total_stockin'] = $this->M_stockin->total_rows();
        $data['total_stockout'] = $this->M_stockOut->total_rows();
        $data['total_role'] = $this->M_role->total_rows();
        $data['title'] = 'Dashboard';

        $data['cabang'] = $this->db->get('cabang')->result_array();
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();;

        // Load View dengan mencari role apakah yang dimiliki user
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        // if else
        $kdrole = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($kdrole['kode_role'] == "RL0000000001"){
            $this->load->view('admin/v_dashboard', $data);
        }elseif($kdrole['kode_role'] == "RL0000000002"){
            $this->load->view('pemilik/v_dashboard_pemilik', $data);
        }elseif($kdrole['kode_role'] == "RL0000000003"){
            $this->load->view('pelanggan/v_pelanggan', $data);
        }elseif($kdrole['kode_role'] == "RL0000000004"){
            $this->load->view('templates/admin/v_dashboard_kurir', $data);
        }else{
            redirect('user');
        }      
        // akhiran if else
        $this->load->view('templates/admin/footer');
    }
}
