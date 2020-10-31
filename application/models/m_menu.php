<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{

    // Fungsi untuk mengambil data terakhir pada tabel
    public function getLastId()
    {
        $this->db->order_by('kode_menu', 'DESC');
        return $this->db->get('user_menu');
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
}
