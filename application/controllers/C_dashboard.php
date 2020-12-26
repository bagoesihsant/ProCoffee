<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($data['kode_role'] == "RL0000000001"){
            redirect("dashboard/admin");
        }elseif($data['kode_role'] == "RL0000000002"){
            redirect("dashboard/kasir");
        }elseif($data['kode_role'] == "RL0000000003"){
            redirect("dashboard/pelanggan");
        }elseif($data['kode_role'] == "RL0000000004"){
            redirect("dashboard/kurir");
        }else{
            redirect("user");
        }
    }
}
