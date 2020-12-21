<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kasir extends CI_Model
{

    // Mengambil semua barang dari database
    public function getAllBarang()
    {
        $this->db->select('*, tbl_barang.nama as nama_barang');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_barang.kode_kategori = tbl_kategori.kode_kategori');
        $this->db->join('tbl_satuan', 'tbl_barang.kode_satuan = tbl_satuan.kode_satuan');
        return $this->db->get();
    }

    // Mengambi semua barang dari database dengan limit
    public function loadBarang($dataHalaman, $pagenum)
    {
        $this->db->select('*, tbl_barang.nama as nama_barang');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_barang.kode_kategori = tbl_kategori.kode_kategori');
        $this->db->join('tbl_satuan', 'tbl_barang.kode_satuan = tbl_satuan.kode_satuan');
        $this->db->limit($dataHalaman, $pagenum);
        return $this->db->get();
    }

    // Mengambil semua barang dari database sesuai dengan pencarian
    public function getLimitedBarang($match)
    {
        $this->db->select('*, tbl_barang.nama as nama_barang, tbl_kategori.nama as nama_kategori');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_barang.kode_kategori = tbl_kategori.kode_kategori');
        $this->db->join('tbl_satuan', 'tbl_barang.kode_satuan = tbl_satuan.kode_satuan');
        $this->db->like('kode_barang', $match);
        $this->db->or_like('barcode', $match);
        $this->db->or_like('tbl_barang.nama', $match);
        $this->db->or_like('tbl_kategori.nama', $match);
        return $this->db->get();
    }

    // Mengambil semua barang yang dicari dari database dengan limit
    public function loadLimitedBarang($dataHalaman, $pagenum, $match)
    {
        $this->db->select('*, tbl_barang.nama as nama_barang, tbl_kategori.nama as nama_kategori');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_barang.kode_kategori = tbl_kategori.kode_kategori');
        $this->db->join('tbl_satuan', 'tbl_barang.kode_satuan = tbl_satuan.kode_satuan');
        $this->db->like('kode_barang', $match);
        $this->db->or_like('barcode', $match);
        $this->db->or_like('tbl_barang.nama', $match);
        $this->db->or_like('tbl_kategori.nama', $match);
        $this->db->limit($dataHalaman, $pagenum);
        return $this->db->get();
    }

    // Mengambil semua daftar barang yang ada di tabel cart_offline atau keranjang kasir
    public function loadKeranjang($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_cart_offline');
        $this->db->join('tbl_barang', 'tbl_barang.kode_barang = tbl_cart_offline.kode_barang');
        $this->db->join('user', 'user.kode_user = tbl_cart_offline.kode_user');
        $this->db->where($where);
        return $this->db->get();
    }

    // Mengambil id terakhir dari tabel transaksi
    public function getLastId()
    {
        $this->db->order_by('kode_transaksi', 'DESC');
        return $this->db->get('transaksi_offline');
    }

    // Mengambil data kasir
    public function getLoggedInKasir($where)
    {
        return $this->db->get_where('user', $where)->row_array();
    }
}
