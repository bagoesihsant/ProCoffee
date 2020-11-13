<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_supplier extends CI_Model
{
    // SUPPLIER
    // Untuk mengambil id terakhir data supplier
    public function kode_supplier()
    {
        $this->db->order_by('kode_supplier', 'DESC');
        return $this->db->get('supplier');
    }

    //fungsi untuk mengambil semua data pada supplier
    public function getAllSupplier()
    {
        return $this->db->get('supplier');
    }

    //fungsi menambah data supplier
    public function tambah_supplier($data, $tabel)
    {
        $this->db->insert($tabel, $data);
        return $this->db->affected_rows();
    }

    //fungsi menghapus data supplier
    public function hapus_supplier($data)
    {
        $this->db->delete('supplier', $data);
        return $this->db->affected_rows();
    }

    //fungsi mengubah data supplier
    public function edit_supplier($data, $where)
    {
        $this->db->update('supplier', $data, $where);
        return $this->db->affected_rows();
    }
}
