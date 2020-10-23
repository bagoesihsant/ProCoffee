<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{


    // Index
    public function index()
    {
        $this->load->view('admin/index');
    }
}
