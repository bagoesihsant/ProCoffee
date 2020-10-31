<?php
class M_user extends CI_Model
{
    function edit_user($id)
    {
        $data = array(

        );
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
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