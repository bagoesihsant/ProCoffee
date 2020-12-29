<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_history_pembayaran extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('transaksi_online');
        if ($id != null) {
            $this->db->where('kode_transaksi', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
