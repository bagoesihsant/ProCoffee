<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_stockOut extends CI_Model
{
    public function get_out($id = null)
    {
        if ($id != null) {
            $this->db->where('kode_stock', $id);
        }
        $query = $this->db->get('tbl_stock');
        return $query;
    }

    function total_rows()
    {
        $this->db->select('*');
        $this->db->where('type', 'out');
        return $this->db->get('tbl_stock')->num_rows();
    }

    public function LastNumberStock()
    {
        $this->db->order_by('kode_stock', 'DESC');
        return $this->db->get('tbl_stock');
    }
    public function get_dataOut()
    {
        $this->db->from('tbl_stock');
        $this->db->join('tbl_barang', 'tbl_stock.kode_barang = tbl_barang.kode_barang');
        $this->db->where('type', 'out');
        $this->db->order_by('kode_stock', 'DESC');
        $query =  $this->db->get();
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
            'kode_user' => 'USR602232001'
        ];

        $this->db->insert('tbl_stock', $params);
    }

    public function delete($id)
    {
        $this->db->where('kode_stock', $id);
        $this->db->delete('tbl_stock');
    }
}
