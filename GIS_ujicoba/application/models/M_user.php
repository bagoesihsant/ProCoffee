<?php
class M_user extends CI_Model
{
    function hapus_user($id)
    {
        $hasil = $this->db->query("DELETE FROM user WHERE id_user='$id'");
        return $hasil;
    }
}