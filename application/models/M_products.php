<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_products extends CI_Model
{
    public function getData($table)
    {
        return $this->db->get($table);
    }

    public function tambahDataModal($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function getIdModel($table, $where)
    {
        return  $this->db->get_where($table, $where);
    }

    // public function editDataModal($where, $data, $table)
    // {
    //     $this->db->where($where);
    //     $this->db->update($table, $data);
    // }
}
