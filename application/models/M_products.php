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
            'nama' => htmlspecialchars($post['nama_kategori'])
        ];
        $this->db->where('kode_kategori', $post['kode_kategori']);
        $this->db->update('tbl_kategori', $isi_data);
        return true;
    }

    public function readDatasatuan()
    {
        return $this->db->get('tbl_satuan');
    }

    public function deleteCategoryModel($id)
    {
        $this->db->where('kode_kategori', $id);
        $this->db->delete('tbl_kategori');
    }
}
