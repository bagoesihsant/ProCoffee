<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_landingpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Pro Coffee";
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('User/v_landing_page');
        $this->load->view('templates/user_template/v_footer_user');
    }
}
