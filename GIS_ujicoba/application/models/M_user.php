<?php
class M_user extends CI_Model
{
    function edit_user($id)
    {
        $hasil = $this->db->query("DELETE FROM user WHERE id_user='$id'");
        return $hasil;
    }
    function status($id, $status)
    {
        $data = array(
            'is_active' => $status
        );
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
}