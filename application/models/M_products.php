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
}
