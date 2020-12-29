<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_rajaongkir extends CI_Controller {

    private $api_key = '63d1bb09b7834489e4208687533ad9f6';

    public function getkota()
    {
        $curl = curl_init();
 
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $_GET['province'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));
 
        $response = curl_exec($curl);
        $err = curl_error($curl);
 
        curl_close($curl);
 
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
    public function getongkir()
    {
        $curl = curl_init();
 
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=160&destination=" . $_GET['city_id'] . "&weight=" . $_GET['berat'] . "&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $this->api_key"
            ),
        ));
 
        $response = curl_exec($curl);
        $err = curl_error($curl);
 
        curl_close($curl);
 
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
    
    public function getprovinsi()
    {
        $curl = curl_init();
 
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));
 
        $response = curl_exec($curl);
        $err = curl_error($curl);
 
        curl_close($curl);
 
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

}