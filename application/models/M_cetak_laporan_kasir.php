<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cetak_laporan_kasir extends CI_Model
{
    //ITEMS ITEMS ITEMS
    public function getAllTransaksi($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi_offline');
        $this->db->where(array('transaksi_offline.kode_transaksi' => $id));
        $this->db->join('user', 'transaksi_offline.kode_user = user.kode_user');

        return $this->db->get();
    }

    public function getAllDtlTransaksi($id)
    {
        $this->db->select('*');
        $this->db->from('dtl_transaksi_offline');
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
}