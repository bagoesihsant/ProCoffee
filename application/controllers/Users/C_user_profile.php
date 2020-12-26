<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_user_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_usero');
    }

    public function index()
    {
        $data['title'] = "Profil Saya";
        $data['user'] = $this->db->get_where('user_online', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('templates/user_template/v_sidemenu_profile');
        $this->load->view('User/v_user_profile', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }
    public function editprofil()
    {
        $data['title'] = "Edit Profile";
        $data['user'] = $this->db->get_where('user_online', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required', [
            'required' => 'Nama lengkap wajib di isi!'
        ]);
        $this->form_validation->set_rules('alamat_lengkap', 'Nama Lengkap', 'trim|required', [
            'required' => 'Alamat wajib di isi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir_input', 'Tanggal Lahir', 'required', [
            'required' => 'Mohon tanggal lahir di lenkapi!'
        ]);
        $this->form_validation->set_rules('kode_pos_input', 'Kode Pos', 'required', [
            'required' => 'Mohon Untuk Kode Pos di lenkapi!'
        ]);
        $this->form_validation->set_rules('nohp_input', 'Nomor Hp', 'required', [
            'required' => 'Mohon Untuk Nomor Hp di lenkapi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_template/v_header_user', $data);
            $this->load->view('templates/user_template/v_sidemenu_profile');
            $this->load->view('User/v_edit_profile', $data);
            $this->load->view('templates/user_template/v_footer_user');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'email' => $this->session->userdata('email'),
                'alamat' => htmlspecialchars($this->input->post('alamat_lengkap', true)),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir_input', true)),
                'kode_pos' => htmlspecialchars($this->input->post('kode_pos_input', true)),
                'nohp' => htmlspecialchars($this->input->post('nohp_input', true))
            ];
            $where = [
                'kode_usero' => $this->session->userdata('id_user')
            ];

            $result = $this->M_usero->edit_user($data, $where);
            if ($result > 0) {
                $this->session->set_flashdata('message_edit_user', '<div class="alert alert-success" role="alert">akun anda telah di update <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                redirect('User/Profile/Edit');
            } else {
                $this->session->set_flashdata('message_edit_user', '<div class="alert alert-danger" role="alert">Terjadi kesalahan koneksi atau input data <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                redirect('User/Profile/Edit');
            }
        }
    }
    public function ubahpassword()
    {
        $data['title'] = "Ubah Password";
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('templates/user_template/v_sidemenu_profile');
        $this->load->view('User/v_change_password');
        $this->load->view('templates/user_template/v_footer_user');
    }
}
