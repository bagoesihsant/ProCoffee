<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{


    // Index
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer_js');
        $this->load->view('admin/custom_js');
        $this->load->view('templates/footer');
    }
}
