<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_stock extends CI_Model
{
    public function get_data($id = null)
    {
        $this->db->from('tbl_stock');
        if ($id != null) {
            $this->db->where('kode_stock', $id);
        }
        $query =  $this->db->get();
        return $query;
    }
}
