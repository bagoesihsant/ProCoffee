<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_usero extends CI_Model
{
    function edit_user($data, $where)
    {
        $this->db->update('user_online', $data, $where);
        return $this->db->affected_rows();
    }
}
