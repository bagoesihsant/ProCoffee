<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_history_pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('templates/user_template/v_header_user');
        $this->load->view('User/v_history_pembelian');
        $this->load->view('templates/user_template/v_footer_user');
    }
}
