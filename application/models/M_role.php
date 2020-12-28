<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_role extends CI_Model
{

    public function total_rows()
    {
        return $this->db->get('user_role')->num_rows();
    }
    // Fungsi untuk mengambil semua data pada tabel
    public function getAllMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    // -- Hak Akses --
    // Fungsi untuk mengambil semua data hak akses pada tabel
    public function getAllRole()
    {
        return $this->db->get('user_role')->result_array();
    }

    // Fungsi untuk mengambil data hak akses terakhir pada tabel
    public function getLastIdRole()
    {
        $this->db->order_by('kode_role', 'DESC');
        return $this->db->get('user_role');
    }

    // Fungsi untuk menambahkan data hak akses kedalam tabel
    public function tambahRole($data)
    {
        $this->db->insert('user_role', $data);
        return $this->db->affected_rows();
    }

    // Fungsi untuk mengambil data hak akses tertentu dalam tabel menggunakan kode hak akses
    public function getDetailRole($data)
    {
        return $this->db->get_where('user_role', $data)->row_array();
    }

    // Fungsi untuk mengubah data hak akses tertentu dalam tabel menggunakan kode hak akses
    public function updateRole($data, $where)
    {
        $this->db->update('user_role', $data, $where);
        return $this->db->affected_rows();
    }

    // Fungsi untuk menghapus data hak akses tertentu dalam tabel menggunakan kode hak akses
    public function deleteRole($data)
    {
        $this->db->delete('user_role', $data);
        return $this->db->affected_rows();
    }

    // Manajemen Akses Menu

    // Fungsi untuk mengambil apakah ada menu yang sudah aktif di hak akses tersebut
    public function checkAccess($where)
    {
        return $this->db->get_where('user_access_menu', $where);
    }

    // Fungsi untuk menambahkan hak akses kedalam akses menu untuk mengakses menu tertentu
    public function addAccess($data)
    {
        $this->db->insert('user_access_menu', $data);
        return $this->db->affected_rows();
    }

    // Fungsi untuk menghapus hak akses dari dalam akses menu
    public function removeAccess($data)
    {
        $this->db->delete('user_access_menu', $data);
        return $this->db->affected_rows();
    }
}
