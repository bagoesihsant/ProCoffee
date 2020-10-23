<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // $this->load->model->('model_gis');
    }

    public function home()
    {
        $data['title'] = 'Home GIS';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gis/home', $data);
        $this->load->view('templates/footer', $data);
    }
    public function mapping()
    {
        $data['title'] = 'Mapping';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['mapping'] = $this->db->get('cabang')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gis/mapping', $data);
        $this->load->view('templates/footer', $data);
    }
    public function create_mapping()
    {
        $data['title'] = 'Mapping';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_cabang', 'Nama Cabang', 'required');
        $this->form_validation->set_rules('alamat_cabang', 'Alamat Cabang', 'required');
        $this->form_validation->set_rules('status_cabang', 'Status Cabang', 'required');
        $this->form_validation->set_rules('pemilik_cabang', 'Pemilik Cabang', 'required');
        $this->form_validation->set_rules('Latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('Longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('gis/create-mapping', $data);
            $this->load->view('templates/footer', $data);
        }else{
            $q = $this->db->query("SELECT * FROM cabang");
            $c_q = $q->num_rows();
            if($c_q >= 10){
                $id_cabang = "CB0" . ($c_q + 1);
            }elseif($c_q >= 100){
                $id_cabang = "CB" . ($c_q + 1);
            }else{
                $id_cabang = "CB00" . ($c_q + 1);
            }

            $data = [
                'id_cabang' => $id_cabang,
                'nama_cabang' => $this->input->post('nama_cabang'),
                'alamat' => $this->input->post('alamat_cabang'),
                'status_cabang' => $this->input->post('status_cabang'),
                'pemilik_cabang' => $this->input->post('pemilik_cabang'),
                'latitude' => $this->input->post('Latitude'),
                'longitude' => $this->input->post('Longitude'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('cabang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('gis/mapping');
        }
    }
}

?>