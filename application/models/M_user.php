<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    function edit_user($id)
    {
        $data = array();
        $this->db->where('kode_user', $id);
        $this->db->update('user', $data);
    }

    function select_user()
    {
        $query = "SELECT `user`.*, `user_role`.`role`
        FROM `user` JOIN `user_role`
        ON `user`.`kode_role` = `user_role`.`kode_role`
        ";
        return $this->db->query($query)->result_array();
    }

    function status($id, $status)
    {
        $data = array(
            'active_status' => $status
        );
        $this->db->where('kode_user', $id);
        $this->db->update('user', $data);
    }
}
