<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{
    //ITEMS ITEMS ITEMS
    public function getAllItems()
    {
        $this->db->select('*,tbl_barang.nama as nama_barang, tbl_kategori.nama as nama_kategori, tbl_satuan.nama as nama_satuan');
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

    public function edit_items($where, $data)
    {
        $this->db->update('tbl_barang', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_where($id)
    {
        $this->db->where(array('kode_barang' => $id));
        
        $this->db->select('*,tbl_barang.nama as nama_barang, tbl_kategori.nama as nama_kategori, tbl_satuan.nama as nama_satuan');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_barang.kode_kategori = tbl_kategori.kode_kategori');
        $this->db->join('tbl_satuan', 'tbl_barang.kode_satuan = tbl_satuan.kode_satuan');

        return $this->db->get();
    }
}
