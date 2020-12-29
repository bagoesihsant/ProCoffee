<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Pembukaan load midtrans
        $params = array('server_key' => 'SB-Mid-server-sxX-L8vWKZeSFqBVj7BU9Kvj', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        // penutupan load midtrans
        $this->load->model('M_barang', 'mbarang');
        $this->load->model('M_cart_online', 'mcart');
    }

    public function index()
    {
        $data['cart'] = $this->mcart->get_cart_data();
        $data['hitung_cart'] = $this->mcart->count_cart();
        $data['title'] = "Keranjang";
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('User/v_cart_user', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }

    public function delete_cart($id)
    {
        $this->mcart->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message_cart_del', '<div class="alert alert-success" role="alert">Barang telah di hapus dari keranjang<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            redirect('User/Cart');
        } else {
            $this->session->set_flashdata('message_cart_del', '<div class="alert alert-danger" role="alert">Barang gagal di hapus dari keranjang<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            redirect('User/Cart');
        }
    }

    public function token()
    {

        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 2000, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 500,
            'quantity' => 2,
            'name' => "Ini dah di controller cart"
        );

        // Optional
        $item2_details = array(
            'id' => 'a2',
            'price' => 500,
            'quantity' => 2,
            'name' => "Orange"
        );

        // Optional
        $item_details = array($item1_details, $item2_details);

        // Optional
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'address'       => "Mangga 20",
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => "081122334455",
            'country_code'  => 'IDN'
        );

        // Optional
        $shipping_address = array(
            'first_name'    => "Obet",
            'last_name'     => "Supriadi",
            'address'       => "Manggis 90",
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => "08113366345",
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'email'         => "andri@litani.com",
            'phone'         => "081122334455",
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'minute',
            'duration'  => 2
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
        $result = json_decode($this->input->post('result_data'));
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>';
    }
}
