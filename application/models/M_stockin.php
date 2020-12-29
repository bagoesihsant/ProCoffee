<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_stockin extends CI_Model
{
    public function get_in($id = null)
    {
        // $this->db->from('tbl_stock');
        if ($id != null) {
            $this->db->where('kode_stock', $id);
        }
        $query = $this->db->get('tbl_stock');
        return $query;
    }
    public function LastNumberStock()
    {
        $this->db->order_by('kode_stock', 'DESC');
        return $this->db->get('tbl_stock');
    }

    function total_rows()
    {
        $this->db->select('*');

        $this->db->where('type', 'in');
        return $this->db->get('tbl_stock')->num_rows();
    }

    public function get_data_in()
    {
        // untuk join
        $this->db->select('tbl_stock.kode_stock, tbl_barang.barcode, tbl_barang.nama as nama_barang, qty, date, detail, supplier.nama as nama_supplier, tbl_barang.kode_barang, tbl_stock.detail as detail_stock');
        // dari tabel induknya
        $this->db->from('tbl_stock');
        //kemudian joinkan dengan tabel lainnya, parameter pertama nama tabel, paremeter kedua proses joinnya
        $this->db->join('tbl_barang', 'tbl_stock.kode_barang = tbl_barang.kode_barang');

        $this->db->join('supplier', 'tbl_stock.kode_supplier = supplier.kode_supplier', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('kode_stock', 'desc');

        $query = $this->db->get();
        return $query;
    }
    public function add_stock_in($post)
    {
        $params = [
            // di bagian kiri sebelum tanda "=>" adalah nama field di database procoffee tbl_stock, dan di sebelah kanan setelah tanda "=>" adalah nama post yang diambil dari nama name di setiap inputan
            'kode_stock' => $post['kode_stock_input'],
            'kode_barang' => $post['kode_barang_input'],
            'type' => 'in',
            'detail' => $post['detail'],
            // ini menggunakan if di dalam line, dibaca "jika supplier kosong maka inputannya tidak masuk kedalam database, jika inputan supplier ada maka akan masuk ke dalam database"
            'kode_supplier' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty_input'],
            'date' => time(),
            'created' => time(),
            // ambil data dari session 
            // untuk query insert di dalam kurung tersebut ada 2 parameter, parameter pertama adalah tabel "tbl_stock", dan yang kedua adalah array param yang menampung data dari inputan dan akan dimasukkan ke tabel tbl_stock
            'kode_user' => $this->session->userdata('kode_user')
        ];
        $this->db->insert('tbl_stock', $params);
    }

    public function delete($id)
    {

        $this->db->where('kode_stock', $id);
        $this->db->delete('tbl_stock');
    }
}
