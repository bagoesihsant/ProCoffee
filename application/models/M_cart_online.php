<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cart_online extends CI_Model
{
    //ITEMS ITEMS ITEMS
    public function get_cart_data($user_param = null)
    {
        // query di buat tanggal 28 lung sekarang tidur dulu soalnya besok kuliah
        $user_login = $this->session->userdata('id_user');
        $query = "SELECT `tbl_barang`.*, `tbl_barang`.`nama` AS `nama_barang`, `tbl_cart_online`.* 
        FROM `tbl_barang` JOIN `tbl_cart_online`
        ON `tbl_barang`.`kode_barang` = `tbl_cart_online`.`kode_barang`
        WHERE `kode_usero` = '$user_login'";
        if ($user_param != null) {
            $this->db->where('kode_usero', $user_param);
        }
        $querys = $this->db->query($query)->result_array();
        return $querys;
    }
    public function count_cart($user_param = null)
    {
        $user_login = $this->session->userdata('id_user');
        $query = "SELECT `tbl_barang`.*, `tbl_barang`.`nama` AS `nama_barang`, `tbl_cart_online`.* 
        FROM `tbl_barang` JOIN `tbl_cart_online`
        ON `tbl_barang`.`kode_barang` = `tbl_cart_online`.`kode_barang`
        WHERE `kode_usero` = '$user_login'";
        if ($user_param != null) {
            $this->db->where('kode_usero', $user_param);
        }
        $querys = $this->db->query($query)->num_rows();
        return $querys;
    }

    public function add_cart($post)
    {
        $params = [
            'kode_usero' => $this->session->userdata('id_user'),
            'kode_barang' => $post['kode_barang_input'],
            'qty_dibeli' => $post['jumlah_beli'],
            'total_berat' => $post['berat_input'],
            'tgl_transaksi' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_cart_online', $params);
    }

    public function delete($id)
    {
        $user_params = $this->session->userdata('id_user');
        $this->db->where('kode_cart', $id);
        $this->db->where('kode_usero', $user_params);
        $this->db->delete('tbl_cart_online');
    }
}
