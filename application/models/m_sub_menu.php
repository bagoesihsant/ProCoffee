<?php

class M_sub_menu extends CI_Model
{

    // Fungsi untuk mengambil semua data sub menu pada tabel
    public function getAllSubMenu()
    {
        $this->db->select('*');
        $this->db->from('user_sub_menu');
        $this->db->join('user_menu', 'user_sub_menu.kode_menu = user_menu.kode_menu');
        return $this->db->get()->result_array();
    }

    // Fungsi untuk mengambil data terakhir pada tabel
    public function getLastId()
    {
        $this->db->order_by('kode_sub_menu', 'DESC');
        return $this->db->get('user_sub_menu');
    }

    // Fungsi untuk menambahkan data sub menu pada tabel
    public function tambahSubmenu($data)
    {
        $this->db->insert('user_sub_menu', $data);
        return $this->db->affected_rows();
    }
}
