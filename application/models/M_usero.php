<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_usero extends CI_Model
{
    function edit_user($data, $where)
    {
        $this->db->where($where);
        $this->db->update('user_online', $data);
        return $this->db->affected_rows();
    }

    function count_cart()
    {
        $id_user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->where('kode_usero', $id_user);
        $this->db->from('tbl_cart_online');
        return $this->db->count_all_results();
    }
}
