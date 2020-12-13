<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_auth_user extends CI_Controller
{
    public function __construct() //ini methodddd
    {
        parent::__construct(); //untuk memanggil method cunstruct
    }

    public function registration()
    {
        $this->load->view('templates/user_template/v_header_user');
        $this->load->view('auth_user/v_register');
        $this->load->view('templates/user_template/v_footer_user');
    }
}
