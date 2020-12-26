<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_usero extends CI_Model
{
    function edit_user($data, $where)
    {
        $this->db->where('kode_usero', $where);
        $this->db->update('user_online', $data);
        return $this->db->affected_rows();
    }
}
