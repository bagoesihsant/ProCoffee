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

    // SUPPLIER
     // Untuk mengambil id terakhir data supplier
     public function kode_supplier()
     {
         $this->db->order_by('kode_supplier', 'DESC');
         return $this->db->get('supplier');
     }

    //fungsi untuk mengambil semua data pada supplier
    public function getAllSupplier()
    {
        return $this->db->get('supplier');
    }

    //fungsi menambah data supplier
    public function tambah_supplier($data, $tabel)
    {
        $this->db->insert($tabel, $data);
        return $this->db->affected_rows();
    }

    //fungsi menghapus data supplier
    public function hapus_supplier($data)
    {
        $this->db->delete('supplier', $data);
        return $this->db->affected_rows();
    }

    //fungsi mengubah data supplier
    public function edit_supplier($data, $where)
    {
        $this->db->update('supplier', $data, $where);
        return $this->db->affected_rows();
    }


    //ITEMS ITEMS ITEMS
    public function getAllItems()
    {
        $this->db->select('*,tbl_barang.name as name_barang, tbl_kategori.name as name_kategori, tbl_satuan.name as name_satuan');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_barang.kode_kategori = tbl_kategori.kode_kategori');
        $this->db->join('tbl_satuan', 'tbl_barang.kode_satuan = tbl_satuan.kode_satuan');
        
        return $this->db->get();
    }

     // Untuk mengambil id terakhir data items
    public function kode_items()
    {
        $this->db->order_by('kode_barang', 'DESC');
        return $this->db->get('tbl_barang');
    }

     //untuk mengambil data categories dropdown
    public function getAllCategories()
    {
        return $this->db->get('tbl_kategori');
    }

    //untuk mengambil data unit dropdown
    public function getAllUnits()
    {
        return $this->db->get('tbl_satuan');
    }

    //untuk menambah item di barang
    public function tambah_item($data)
    {
        $this->db->insert('tbl_barang', $data);
        return $this->db->affected_rows();
    }

    //untuk menghapus items di barang
    public function hapus_items($data)
    {
        $this->db->delete('tbl_barang', $data);
        return $this->db->affected_rows();
    }

    public function ambil_items($where)
    {
        return $this->db->get_where('tbl_barang', $where);
    }

    public function edit_items($data, $where)
    {
        $this->db->update('tbl_barang', $data, $where);
        return $this->db->affected_rows();
    }
    
}
