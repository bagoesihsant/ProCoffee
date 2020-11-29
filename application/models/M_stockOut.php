<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_stockOut extends CI_Model
{
    public function LastNumberStock()
    {
        $this->db->order_by('kode_stock', 'DESC');
        return $this->db->get('tbl_stock');
    }
    public function get($id = null)
    {
        $this->db->from('tbl_stock');
        if ($id != null) {
            $this->db->where('kode_stock', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add_stock_out($post)
    {
        $params = [
            'kode_stock' => $post['kode_stock_input'],
            'kode_barang' => $post['kode_barang_input'],
            'type' => 'out',
            'detail' => $post['detail_input'],
            'qty' => $post['qty_input'],
            'date' => time(),
            'created' => time(),
            'kode_user' => '12'
        ];

        $this->db->insert('tbl_stock', $params);
    }
}
