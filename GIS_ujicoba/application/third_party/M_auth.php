<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    function hapus_token($email)
    {
        $hasil = $this->db->query("DELETE FROM user_reset_password WHERE email='$email'");
        return $hasil;
    }
}
