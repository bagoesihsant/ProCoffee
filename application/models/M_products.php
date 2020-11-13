<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_products extends CI_Model
{
    public function getDataProduct()
    {
        return $this->db->get('tbl_kategori');
    }

    public function addData($data)
    {
        $this->db->insert('tbl_kategori', $data);
    }

    public function getIdModel($table, $where)
    {
        return  $this->db->get_where($table, $where);
    }

    public function editDataModal($post)
    {
        $isi_data = [
            'nama' => htmlspecialchars($post['nama_kategori']),
            'updated' => time()
        ];
        $this->db->where('kode_kategori', $post['kode_kategori']);
        $this->db->update('tbl_kategori', $isi_data);
        return true;
    }
    public function deleteCategoryModel($id)
    {
        $this->db->where('kode_kategori', $id);
        $this->db->delete('tbl_kategori');
    }
    public function readDatasatuan()
    {
        return $this->db->get('tbl_satuan');
    }

    // units
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
