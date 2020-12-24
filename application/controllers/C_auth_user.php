<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_auth_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Sign in / Sign Up";
            $this->load->view('auth_user/v_auth_header', $data);
            $this->load->view('auth_user/v_register');
            $this->load->view('templates/user_template/v_footer_user');
        } else {
            $this->prifasi_login();
        }
    }

    private function prifasi_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user_online', ['email' => $email])->row_array();

        // jika user ada
        if ($user) {

            // jika user aktif
            if ($user['is_active'] == 1) {

                // cek password
                if (password_verify($password, $user['password'])) {
                    // kalau passwordnya benar maka

                    // proses persiapan data yang akan di masukan ke sessionn
                    $data = [
                        'email' => $user['email'],
                        'id_user' => $user['kode_usero'],
                        'nama' => $user['nama']
                    ];

                    $this->session->set_userdata($data);
                    redirect('User/LandingPage');
                } else {
                    // kalau passwordnya salah maka
                    $this->session->set_flashdata('message_login', '<div class="alert alert-danger" role="alert">Password salah<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                    redirect('User/Register');
                }
                // penutup cek password
            } else {
                // user gak aktif
                $this->session->set_flashdata('message_login', '<div class="alert alert-danger" role="alert">Belum melakukan aktivasi <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                redirect('User/Register');
            }
            // penutup jika user aktif atau tidak
        } else {
            // user gak ada
            $this->session->set_flashdata('message_login', '<div class="alert alert-danger" role="alert">Email belum terdaftar <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            redirect('User/Register');
        }
        // penutup jika user ada atau tidak
    }


    public function registration()
    {
        $this->form_validation->set_rules('name_input', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email_input', 'Email', 'required|trim|valid_email|is_unique[user_online.email]', [
            'is_unique' => 'Email ini sudah di pakai orang lain',
        ]);
        $this->form_validation->set_rules('password_satu', 'Password', 'required|trim|min_length[2]|matches[password_dua]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Terlalu Pendek',

        ]);
        $this->form_validation->set_rules('password_dua', 'Password ulang', 'required|trim|matches[password_satu]');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Sign in / Sign Up";
            $this->load->view('auth_user/v_auth_header', $data);
            $this->load->view('auth_user/v_register');
            $this->load->view('templates/user_template/v_footer_user');
        } else {
            $q_count = $this->db->get('user_online')->num_rows();

            $id_user = "USRO" . ($q_count + 1) . date('Hdyims', time());
            $data = [
                'kode_usero' => $id_user,
                'nama' => htmlspecialchars($this->input->post('name_input')),
                'email' => htmlspecialchars($this->input->post('email_input')),
                'password' => password_hash($this->input->post('password_satu'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user_online', $data);

            $this->session->set_flashdata('message_register', '<div class="alert alert-success" role="alert">akun anda telah terdaftar <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            redirect('User/Register');
        }
    }
    public function LupaPasswordUser()
    {
        $this->load->view('templates/user_template/v_header_user');
        $this->load->view('auth_user/v_forgot_password');
        $this->load->view('templates/user_template/v_footer_user');
    }
    public function UbahPassword()
    {
        $this->load->view('templates/user_template/v_header_user');
        $this->load->view('auth_user/v_change_password');
        $this->load->view('templates/user_template/v_footer_user');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('message_login', '<div class="alert alert-warning" role="alert">Anda berhasil logout <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
        redirect('User/Register');
    }
}
