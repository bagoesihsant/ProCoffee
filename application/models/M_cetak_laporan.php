<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cetak_laporan  extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('transaksi_offline');
        // $this->db->join('dtl_transaksi_offline', 'transaksi_offline.kode_transaksi = dtl_transaksi_offline.kode_transaksi');
        // $this->db->join('user', 'transaksi_offline.kode_kasir = user.kode_user');
        $this->db->join('user', 'transaksi_offline.kode_pembeli = user.kode_user');

        return $this->db->get();
    }

    //ITEMS ITEMS ITEMS
    public function getAllTransaksi($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi_offline');
        $this->db->where(array('transaksi_offline.kode_transaksi' => $id));
        $this->db->join('user', 'transaksi_offline.kode_pembeli = user.kode_user');

        return $this->db->get();
    }

    public function getAllDtlTransaksi($id)
    {
        $this->db->select('*');
        $this->db->from('dtl_transaksi_offline');
        $this->db->join('tbl_barang', 'dtl_transaksi_offline.kode_barang = tbl_barang.kode_barang');
        $this->db->where(array('kode_transaksi' => $id));

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
        $dompdf->stream($filename, array('Attachment'=>0));
    }

    public function hapus_laporan1($data)
    {
        $this->db->delete('dtl_transaksi_offline', $data);
        return $this->db->affected_rows();
    }

    public function hapus_laporan2($data)
    {
        $this->db->delete('transaksi_offline', $data);
        return $this->db->affected_rows();
    }
}
