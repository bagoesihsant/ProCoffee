<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{

    // -- Menu --
    // Fungsi untuk mengambil data terakhir pada tabel
    public function getLastIdMenu()
    {
        $this->db->order_by('kode_menu', 'DESC');
        return $this->db->get('user_menu');
    }
    function total_rows()
    {
        return $this->db->get('user_menu')->num_rows();
    }
    // Fungsi untuk menambahkan data pada tabel
    public function tambahMenu($data)
    {
        $this->db->insert('user_menu', $data);
        return $this->db->affected_rows();
    }

    // Fungsi untuk mengambil semua data pada tabel
    public function getAllMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    // Fungsi untuk mengambil data menu tertentu pada tabel menggunakan kode menu
    public function getDetailMenu($data)
    {
        return $this->db->get_where('user_menu', $data)->row_array();
    }

    // Fungsi untuk mengubah data menu tertentu pada tabel menggunakan kode menu
    public function ubahMenu($data, $where)
    {
        $this->db->update('user_menu', $data, $where);
        return $this->db->affected_rows();
    }

    // Fungsi untuk menghapus data menu tertentu pada tabel menggunakan kode menu
    public function hapusMenu($data)
    {
        $this->db->delete('user_menu', $data);
        return $this->db->affected_rows();
    }

    // -- Submenu --
    // Fungsi untuk mengambil semua data sub menu pada tabel
    public function getAllSubMenu()
    {
        $this->db->select('*');
        $this->db->from('user_sub_menu');
        $this->db->join('user_menu', 'user_sub_menu.kode_menu = user_menu.kode_menu');
        $this->db->order_by('user_sub_menu.kode_sub_menu', 'ASC');
        return $this->db->get()->result_array();
    }

    // Fungsi untuk mengambil data terakhir pada tabel
    public function getLastIdSubmenu()
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

    // Fungsi untuk mengambil data sub menu tertentu menggunakan kode sub menu
    public function getDetailSubmenu($data)
    {
        return $this->db->get_where('user_sub_menu', $data)->row_array();
    }

    // Fungsi untuk mengubah data sub menu tertentu menggunakan kode sub menu
    public function updateSubmenu($data, $where)
    {
        $this->db->update('user_sub_menu', $data, $where);
        return $this->db->affected_rows();
    }

    // Fungsi untuk menghapus data sub menu tertentu menggunakan kode sub menu
    public function hapusSubmenu($data)
    {
        $this->db->delete('user_sub_menu', $data);
        return $this->db->affected_rows();
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
