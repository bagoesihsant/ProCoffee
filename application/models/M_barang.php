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
    function total_rows()
    {
        return $this->db->get('tbl_barang')->num_rows();
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
        $this->db->delete('tbl_stock', $data);
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


    // function update stock 
    function update_stock_out($data)
    {
        // 
        $qty  = $data['qty_input'];
        $id  = $data['kode_barang_input'];
        // $sql  = "UPDATE tbl_barang SET stok = stok - '$qty' WHERE kode_barang = '$id'";
        $sql = "UPDATE tbl_barang SET stok = stok - $qty WHERE kode_barang = '$id'";
        $this->db->query($sql);
    }

    // function untuk menambah
    function update_stock_in($data)
    {
        // 
        $qty  = $data['qty_input'];
        $id  = $data['kode_barang_input'];
        // $sql  = "UPDATE tbl_barang SET stok = stok - '$qty' WHERE kode_barang = '$id'";
        $sql = "UPDATE tbl_barang SET stok = stok + $qty WHERE kode_barang = '$id'";
        $this->db->query($sql);
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

    public function print_dompdf($html, $paper, $orientation, $filename)
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf(array('enable_remote' => true));

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0));
    }

    // Fungsi untuk tombol Detail barang di Landing page
    public function getAllDetailItems($id = null)
    {
        $this->db->select('*,tbl_barang.nama as nama_barang, tbl_kategori.nama as nama_kategori, tbl_satuan.nama as nama_satuan');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_barang.kode_kategori = tbl_kategori.kode_kategori');
        $this->db->join('tbl_satuan', 'tbl_barang.kode_satuan = tbl_satuan.kode_satuan');
        if ($id != null) {
            $this->db->where('kode_barang', $id);
        }
        return $this->db->get();
    }

    public function LimitRandom($id = null)
    {
        $this->db->select('*,tbl_barang.nama as nama_barang, tbl_kategori.nama as nama_kategori, tbl_satuan.nama as nama_satuan');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_barang.kode_kategori = tbl_kategori.kode_kategori');
        $this->db->join('tbl_satuan', 'tbl_barang.kode_satuan = tbl_satuan.kode_satuan');
        $this->db->order_by('kode_barang', 'RANDOM');
        $this->db->limit(5);
        if ($id != null) {
            $this->db->where('kode_barang', $id);
        }
        return $this->db->get();
    }
}
