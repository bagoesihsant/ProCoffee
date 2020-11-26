<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{
    public function __construct() //ini methodddd
    {
        parent::__construct(); //untuk memanggil method cunstruct
        // Load Model
        $this->load->library('form_validation');
        $this->load->model('M_auth', 'model_auth');
    }

    // Index
    public function _index()
    {
        $data['title'] = 'Login Page';
        $this->load->view('templates/login/header', $data);
        $this->load->view('auth/v_login');
        $this->load->view('templates/login/footer') ;
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email/Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->_index();
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email'));

        $password = $this->input->post('password');

        $user_email = $this->db->get_where('user', ['email' => $email])->row_array(); // bacanya sama seperti select * from tabel user where email = email
        # jk usernya ada
        $userName = $this->db->get_where('user', ['username' => $email])->row_array();
        if ($user_email || $userName) {
            if ($user_email['active_status'] == 1 || $userName['active_status'] == 1) {
                # cek password
                if (password_verify($password, $user_email['password'])) {
                    $data = [
                        'email' => $user_email['email'],
                        'kode_role' => $user_email['kode_role']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                }elseif(password_verify($password, $userName['password'])){
                    $data = [
                        'email' => $userName['email'],
                        'kode_role' => $userName['kode_role']
                    ];
                    $this->session->set_userdata($data);
                    redirect('Admin/C_admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                # code...
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email / Username has not registered!</div>');
            redirect('auth');
        }
    }


    public function lupaPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if($this->form_validation->run() == false){
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/login/header', $data);
            $this->load->view('auth/v_forgot-password');
            $this->load->view('templates/login/footer');    
        }else{
            $email = htmlspecialchars($this->input->post('email'));
            $user = $this->db->get_where('user', ['email' => $email, 'active_status' => 1])->row_array();

            if($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = 
                [
                    'email' => $email,
                    'token' => $token,
                    'created_at' => time()
                ];

                $this->db->insert('user_reset_password', $user_token);
                $this->_sendEmail($token, 'Lupa');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="success">Silahkan Cek Email Anda Untuk Reset Password</div>');
                redirect('auth');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Anda Belum Terdaftar!</div>');
                redirect('auth/lupapassword');
            }
        } 
    }

    private function _sendEmail($token, $type)
    {
        // Config Setting 
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.googlemail.com',
            'smtp_crypto' => 'tls',
            'smtp_user' => 'emailpass49@gmail.com',
            'smtp_pass' => 'IndowebsteR9',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        // Jika pesan nya = verifikasi
        $emailAkun = htmlspecialchars($this->input->post('email'));
        $pesanEmail = "
                                <html>
                                <head>
                                    <title>Kode Verifikasi</title>
                                </head>
                                <body>
                                    <h2>Terimakasih telah Mendaftarkan akun anda</h2>
                                    <p>Akun Anda</p>
                                    <p>Email : " . $emailAkun . "</p>
                                    <p>Tolong Klik Link Dibawah ini untuk aktivasi akun!</p>
                                    <h4><a href='" . base_url() . "auth/verify?email=" . $emailAkun . "&token=" . urlencode($token) . "'>Aktivasi!</a></h4>
                                </body>
                                </html>
        ";
        // Jika pesan nya = Lupa
        $ResetPassword = "
                                <html>
                                <head>
                                    <title>Kode Reset Password</title>
                                </head>
                                <body>
                                    <h2>Silahkan Klik Link Dibawah Ini!!</h2>
                                    <p>Akun Anda</p>
                                    <p>Email : " . $emailAkun . "</p>
                                    <p>Tolong Klik Link Dibawah ini untuk Reset Password!</p>
                                    <h4><a href='" . base_url() . "auth/resetpassword?email=" . $emailAkun . "&token=" . urlencode($token) . "'>Reset Password!!</a></h4>
                                </body>
                                </html>
        ";
        $this->load->library('email', $config);
        $this->email->from('alfiannsx98@gmail.com', 'Verifikasi Email');
        $this->email->to(htmlspecialchars($this->input->post('email')));
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message($pesanEmail);
            $this->email->set_mailtype('html');
        } else if ($type == 'Lupa') {
            $this->email->subject('Reset Password');
            $this->email->message($ResetPassword);
            $this->email->set_mailtype('html');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    function alpha_dash_username($str)
    {
        return ( ! preg_match("/^([-a-z0-9])+$/i", $str)) ? FALSE : TRUE;
    } 
    function alpha_dash_name($str)
    {
        return ( ! preg_match("/^([-a-z ])+$/i", $str)) ? FALSE : TRUE;
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
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[user.username]|callback_alpha_dash_username',
            ['is_unique' => 'This username has already registered', 'alpha_dash_username' => 'Username must be unique and dont use spaces, symbols and other']
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches => password dont match!', 'min_length' => 'Password too short!']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run()  == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/login/header', $data);
            $this->load->view('auth/v_registration');
            $this->load->view('templates/login/footer');
        } else {

            $q_count = $this->db->get('user')->num_rows();

            $id_user = "USR" . ($q_count + 1) . date('Hdyims', time());

            $data = [
                'kode_user' => $id_user,
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username')),
                'profile_img' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kode_role' => 'RL0000000003', // yang melakukan registrasi pasti member
                'active_status' => 1, //sementara otomatis aktif,nanti akan dinonaktifkan saa sudah belajar user activation
                'created_at'  => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation,your account has been created. Please Login!</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('kode_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been log out!</div>');
        redirect('auth');
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
            redirect('auth');
        }
    }

    public function activation()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('email_aktivasi', $email);
                $this->activated();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email/Token Salah!</div>');
                redirect('auth/');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal!Email Salah!</div>');
            redirect('auth/');
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

    public function resetpassword()
    {
        $email = htmlspecialchars($this->input->get('email'));
        $token = htmlspecialchars($this->input->get('token'));

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user) {
            $user_token = $this->db->get_where('user_reset_password', ['token' => $token])->row_array();
            if($user_token){
                $this->session->set_userdata('reset_email', $email);
                $this->gantiPassword();
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email/Token Salah!</div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email Salah!</div>');
            redirect('auth');
        }
    }
    
    public function gantiPassword()
    {
        if(!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[8]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ganti Password';
            $this->load->view('templates/login/header', $data);
            $this->load->view('auth/v_ganti-password');
            $this->load->view('templates/login/footer');
        } else {
            $password = password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->model_auth->hapus_token($email);
            $this->session->unset_userdata('reset_email');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah! Silahkan Login</div>');
            redirect('auth');
        }
    }
}
