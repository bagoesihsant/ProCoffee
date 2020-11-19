<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Satuan extends CI_Model
{
    // units
    public function readDatasatuan()
    {
        return $this->db->get('tbl_satuan');
    }

    public function LastNumberSatuan()
    {
        $this->db->order_by('kode_satuan', 'DESC');
        return $this->db->get('tbl_satuan');
    }
    public function addDataSatuan($data)
    {
        $this->db->insert('tbl_satuan', $data);
    }
    public function editDataUnitsM($post)
    {
        $params_data = [
            'nama' => htmlspecialchars($post['nama']),
            'updated' => time()
        ];
        $this->db->where('kode_satuan', $post['kode']);
        $this->db->update('tbl_satuan', $params_data);
        return true;
    }

    public function deleteUnits($id)
    {
        $this->db->where('kode_satuan', $id);
        $this->db->delete('tbl_satuan');
    }
    // end units
}
