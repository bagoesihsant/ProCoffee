<?php

class M_sub_menu extends CI_Model
{

    // Fungsi untuk mengambil semua data sub menu pada tabel
    public function getAllSubMenu()
    {
        return $this->db->get('user_sub_menu')->result_array();
    }

    // Fungsi untuk mengambil data terakhir pada tabel
    public function getLastId()
    {
        $this->db->order_by('kode_sub_menu', 'DESC');
        return $this->db->get('user_sub_menu');
    }
}
