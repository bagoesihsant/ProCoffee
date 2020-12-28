<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_gis extends CI_Model
{

    public function total_rows()
    {
        return $this->db->get('cabang')->num_rows();
    }
    public function cabang_aktif()
    {
        $get_cb = $this->db->get_where('cabang', ['status_cabang' => 'aktif'])->num_rows();
        return $get_cb;
    }
}