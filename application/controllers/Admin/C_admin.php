<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        // Load View
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_dashboard');
        $this->load->view('templates/admin/footer');
    }
}
