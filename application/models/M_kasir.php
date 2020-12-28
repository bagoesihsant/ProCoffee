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

    // Mengambil barang tertentu sesuai dengan kode barang
    public function getOneBarang($where)
    {
        return $this->db->get_where('tbl_barang', $where);
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
        $this->db->select('*, tbl_barang.nama as nama_barang, user.nama as nama_user');
        $this->db->from('tbl_cart_offline');
        $this->db->join('tbl_barang', 'tbl_barang.kode_barang = tbl_cart_offline.kode_barang');
        $this->db->join('user', 'user.kode_user = tbl_cart_offline.kode_user');
        $this->db->where('tbl_cart_offline.kode_user', $where);
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

    // Mengambil data pelanggan
    public function getAllPelanggan($where)
    {
        return $this->db->get_where('user', $where)->result_array();
    }


    // Menambahkan data barang yang dibeli oleh pelanggan kedalam tabel cart_offline
    public function tambahKeranjang($data)
    {
        $this->db->insert('tbl_cart_offline', $data);
        return $this->db->affected_rows();
    }

    // Memeriksa apakah ada user yang mendaftarkan sebuah barang
    public function daftarCart($where)
    {
        return $this->db->get_where('tbl_cart_offline', $where);
    }

    // Menambahkan stok pada cart user jika barang tersebut sudah terdaftar
    public function ubahStokCart($data, $where)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tbl_cart_offline');
        return $this->db->affected_rows();
    }

    // Mengurangi stok pada tabel barang jika barang tersebut ditambahkan ke cart
    public function updateStokBarang($data, $where)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tbl_barang');
        return $this->db->affected_rows();
    }

    // Menghapus barang dalam keranjang jika stok nya kurang dari sama dengan 1
    public function hapusBarang($where)
    {
        $this->db->delete('tbl_cart_offline', $where);
        return $this->db->affected_rows();
    }
}
