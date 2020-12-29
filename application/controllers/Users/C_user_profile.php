<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_user_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_usero');
        $this->load->model('M_usero');
    }

    public function index()
    {
        $data['jumlah_carto'] = $this->M_usero->count_cart();
        $data['title'] = "Profil Saya";
        $data['user'] = $this->db->get_where('user_online', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/user_template/v_header_user', $data);
        $this->load->view('templates/user_template/v_sidemenu_profile');
        $this->load->view('User/v_user_profile', $data);
        $this->load->view('templates/user_template/v_footer_user');
    }
    public function editprofil()
    {
        $data['jumlah_carto'] = $this->M_usero->count_cart();
        $data['title'] = "Edit Profile";
        $data['user'] = $this->db->get_where('user_online', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required', [
            'required' => 'Nama lengkap wajib di isi!'
        ]);
        $this->form_validation->set_rules('alamat_input', 'Nama Lengkap', 'trim|required', [
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
                'alamat' => htmlspecialchars($this->input->post('alamat_input', true)),
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
    public function ubahpassworduser()
    {
        $data['jumlah_carto'] = $this->M_usero->count_cart();
        $data['title'] = "Ubah Password";
        $data['user'] = $this->db->get_where('user_online', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_old', 'Password Lama', 'required|trim', [
            'required' => 'Password lama wajib di isi!'
        ]);
        $this->form_validation->set_rules('password_1', 'Password Baru', 'required|trim|min_length[3]|matches[password_2]', [
            'required' => 'Password baru dan ulang password wajib di isi',
            'min_length' => 'Password Terlalu pendek',
            'matches' => 'Harus sama dengan Ulang password'
        ]);
        $this->form_validation->set_rules('password_2', 'Ulang Password', 'required|trim|min_length[3]|matches[password_1]', [
            'required' => 'Password lama wajib di isi!',
            'matches' => 'Harus sama dengan Password baru!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_template/v_header_user', $data);
            $this->load->view('templates/user_template/v_sidemenu_profile');
            $this->load->view('User/v_change_password', $data);
            $this->load->view('templates/user_template/v_footer_user');
        } else {
            $password_lama = htmlspecialchars($this->input->post('password_old', true));
            $password_baru = htmlspecialchars($this->input->post('password_1', true));

            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message_change_password', '<div class="alert alert-danger" role="alert">Password lama salah! <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                redirect('User/Profile/ChangePassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message_change_password', '<div class="alert alert-danger" role="alert">Gunakan password baru yang berbeda dari password sekarang!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                    redirect('User/Profile/ChangePassword');
                } else {
                    // langkah passwordnya ok
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user_online');
                    $this->session->set_flashdata('message_change_password', '<div class="alert alert-success" role="alert">Password telah di ubah!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                    redirect('User/Profile/ChangePassword');
                }
            }
        }
    }
}
