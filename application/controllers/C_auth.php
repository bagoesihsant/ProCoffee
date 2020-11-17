<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{
    public function __construct() //ini methodddd
    {
        parent::__construct(); //untuk memanggil method cunstruct
        // Load Model
        $this->load->model('M_auth', 'model_auth');
    }

    // Index
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/login/header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('templates/login/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');

        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array(); // bacanya sama seperti select * from tabel user where email = email
        # jk usernya ada
        if ($user) {
            if ($user['active_status'] == 1) {
                # cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'kode_role' => $user['kode_role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['kode_role'] == 'RL0000000001') {
                        redirect('admin/C_admin');
                    } elseif ($user['kode_role'] == 'RL0000000002') {
                        redirect('kasir/C_kasir');
                    } else {
                        redirect('pelanggan/C_pelanggan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!
                  </div>');
                    redirect('C_auth');
                }
            } else {
                # code...
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      This email has not been activated!
    </div>');
                redirect('C_auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  Email has not registered!
</div>');
            redirect('C_auth');
        }
    }


    public function fw()
    {
        $data['title'] = 'Forgot Password';
        $this->load->view('templates/login/header', $data);
        $this->load->view('auth/v_forgot-password');
        $this->load->view('templates/login/footer');
    }
    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            ['is_unique' => 'This email has already registered!']
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches => password dont match!', 'min_length' => 'Password too short!']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run()  == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/login/header', $data);
            $this->load->view('auth/v_registration');
            $this->load->view('templates/login/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'profile_img' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kode_role' => 'RL0000000003', // yang melakukan registrasi pasti member
                'active_status' => 1, //sementara otomatis aktif,nanti akan dinonaktifkan saa sudah belajar user activation
                'created_at'  => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Congratulation,your account has been created. Please Login!
</div>');
            redirect('C_auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('kode_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  You have been log out!
</div>');
        redirect('C_auth');
    }

    // Aktivasi Email
    public function activated()
    {
        if (!$this->session->userdata('email_aktivasi')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[8]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Aktivasi Akun';
            $this->load->view('templates/login/header', $data);
            $this->load->view('auth/v_aktivasi');
            $this->load->view('templates/login/footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('email_aktivasi');
            $active = 1;
            $this->db->set('password', $password);
            $this->db->set('active_status', $active);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->model_auth->hapus_token($email);
            $this->session->unset_userdata('email_aktivasi');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Berhasil Diaktivasi! Silahkan Login</div>');
            redirect('C_auth');
        }
    }

    public function activation()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_reset_password', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('email_aktivasi', $email);
                $this->activated();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email/Token Salah!</div>');
                redirect('C_auth/');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal!Email Salah!</div>');
            redirect('C_auth/');
        }
    }

    // Ganti email akun
    public function ganti_email_akun_activated()
    {
        if (!$this->session->userdata('account')) {
            redirect('auth');
        } else {
            $email_baru = $this->session->userdata('ganti_email_baru');
            $account = $this->session->userdata('account');

            $this->db->set('email', $email_baru);
            $this->db->where('kode_user', $account);
            $this->db->update('user');

            $this->model_auth->hapus_token($email_baru);
            $this->session->unset_userdata('ganti_email_baru');
            $this->session->unset_userdata('account');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Berhasil Diaktivasi! Silahkan Login</div>');
            redirect('auth');
        }
    }

    // Function untuk ganti email ketika edit data
    public function gantiemail()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $account = $this->input->get('account');

        $user = $this->db->get_where('user', ['kode_user' => $account])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_reset_password', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('account', $account);
                $this->session->set_userdata('ganti_email_baru', $email);
                $this->ganti_email_akun_activated();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email/Token Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User gagal diaktivasi, user tidak ditemukan</div>');
            redirect('auth');
        }
    }
}
