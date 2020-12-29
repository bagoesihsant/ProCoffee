<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_history_pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_history_pembayaran', 'mhistory');
        $params = array('server_key' => 'SB-Mid-server-sxX-L8vWKZeSFqBVj7BU9Kvj', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->model('M_usero');
    }

    public function index()
    {
        $data['jumlah_carto'] = $this->M_usero->count_cart();
        $data['title'] = "Histori Pembelian";
        $data['row'] = $this->db->get_where('transaksi_online', ['kode_usero' => $this->session->userdata('id_user')])->result();

        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('User/v_history_pembelian', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }

    public function ambilVirtualaccount($id)
    {

        // $data['title'] = "Histori Pembelian";
        $query = $this->mhistory->get($id);
        if ($query->num_rows() > 0) {
            $detail = $query->row();
            $data = array(
                'row' => $detail,
                'title' => 'Ambil Virtual Akun'
            );
            $data['jumlah_carto'] = $this->M_usero->count_cart();
            $this->load->view('templates/user_template/v_header_user', $data);
            $this->load->view('User/v_get_virtual_account', $data);
            $this->load->view('templates/user_template/v_footer_user');
        }
    }

    public function token()
    {
        $id_ci = $this->input->post('id');
        $nama_ci = $this->session->userdata('email');
        $jmlbayar_ci = $this->input->post('total_bayar');
        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $jmlbayar_ci, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => $jmlbayar_ci,
            'quantity' => 1,
            'name' => $id_ci
        );

        // Optional
        $item_details = array($item1_details);


        // Optional
        $customer_details = array(
            'first_name'    => "$nama_ci",
            // 'last_name'     => "Litani",
            // 'email'         => "andri@litani.com",
            // 'phone'         => "081122334455",
            // 'billing_address'  => $billing_address,
            // 'shipping_address' => $shipping_address
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day', // parameter unitnya kalau pengen ke hari tinggal ganti minute jadi day, begitu juga sebaliknya
            'duration'  => 7
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
        ////////////////////////////////////////////////////////jika ingin memanggil 1 data atau data tertentu saja maka berikan parameter true agar menjadi array asosiatif
        $result = json_decode($this->input->post('result_data'), true);
        // jika ingin menampilkan semua data tinggal hapus parameter true beserta koma lalu uncomment lagi di dari echo result sampai echo </pre>, lalu matikan echo yang hanya memanggil menggunakan 1 data menggunakan array tersebut
        //pembukaan echo semua data tanpa parameter tambahan true 
        // echo 'RESULT <br><pre>';
        // var_dump($result);
        // echo '</pre>';
        // penutup echo semua data tanpa parameter tambahan true
        // contoh echo 1 data atau data data tertentu
        // echo $result['status_code'];

        // contoh echo semua data tetapi menggunakan parameter true
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";
        // die;

        // kasih input post id_transaksi dan id customer sesuai session buat kondisi where nya update data yang fieldnya null seperti virtual account status code dan bank
        $id_transaksi = $this->input->post('id_transaksi');
        $data = [
            'order_id' => $result['order_id'],
            'tipe_pembayaran' => $result['payment_type'],
            'waktu_transaksi' => $result['transaction_time'],
            'bank' => $result['va_numbers'][0]["bank"],
            'virtual_akun' => $result['va_numbers'][0]["va_number"],
            'pdf_url' => $result['pdf_url'],
            'status_code' => $result['status_code']
        ];
        // nanti logikanya bukan insert tapi update
        $this->db->where('kode_transaksi', $id_transaksi);
        $simpan_data = $this->db->update('transaksi_online', $data);
        if ($simpan_data) {
            $this->session->set_flashdata('message_va', '<div class="alert alert-success" role="alert">Virtual Account Telah di dapatkan! <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            redirect('User/History');
        } else {
            $this->session->set_flashdata('message_va', '<div class="alert alert-danger" role="alert">Kesalahan dalam mengambik virtual account <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            redirect('User/History');
        }
    }
}
