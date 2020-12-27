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
                        'nama_as' => $user['nama']
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
            $email = $this->input->post('email_input');
            $q_count = $this->db->get('user_online')->num_rows();

            $id_user = "USRO" . ($q_count + 1) . date('Hdyims', time());
            $data = [
                'kode_usero' => $id_user,
                'nama' => htmlspecialchars($this->input->post('name_input')),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password_satu'), PASSWORD_DEFAULT),
                'is_active' => 0,
                'created' => time()
            ];

            // persiapkan token
            $token =  base64_encode(random_bytes(32));

            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            // penutupan persiapan token

            // setelah itu lakukan input data sesuai inputan registrasi
            $this->db->insert('user_reset_password', $user_token);
            $this->db->insert('user_online', $data);
            // lalu email akan di kirim ke email sang pendaftar

            $this->_sendEmail($token, 'verify');


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

    private function _sendEmail($token, $type)
    {
        // Fungsi kirim email
        // config lulung bisa asalkan pake email dummy tanpa login menggunakan nomor
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_user' => 'Procoffee999@gmail.com',
        //     'smtp_pass' => '#adl)-1231',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n",
        // ];

        // Kofigurasi dari irman bisa asalkan pakai email dummy yang tanpa login menggunakan nomor hp
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.googlemail.com',
            'smtp_crypto' => 'tls',
            'smtp_user' => 'Procoffee999@gmail.com',
            'smtp_pass' => '#adl)-1231',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $emailAkun = htmlspecialchars($this->input->post('email'));
        // Pembukaan pesan email veritifikasi
        $pesanEmailVerif = "
                                <html>
                                <head>
                                    <title>Kode Verifikasi</title>
                                </head>
                                <body>
                                    <h2>Terimakasih telah Mendaftarkan akun anda</h2>
                                    <p>Akun Anda</p>
                                    <p>Email : " . $emailAkun . "</p>
                                    <p>Tolong Klik Link Dibawah ini untuk aktivasi akun!</p>
                                    <h4><a href='" . base_url() . "C_auth_user/verify?email=" . $emailAkun . "&token=" . urlencode($token) . "'>Aktivasi!</a></h4>
                                </body>
                                </html>
        ";
        // Penutup pesan email veritifikasi
        // ######################################## //
        // Pembukaan pesan tipe reset passsword
        $ResetPasswordPelanggan = "
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
        // Penutupan pesan tipe reset passsword

        $this->load->library('email', $config);

        $this->email->from('Procoffee999@gmail.com', 'Pro Coffee');
        $this->email->to($this->input->post('email_input'));
        if ($type == 'verify') {
            $this->email->subject('Veritifikasi akun anda');
            $this->email->message($pesanEmailVerif);
            $this->email->set_mailtype('html');
        } else {
            $this->email->subject('Veritifikasi akun anda');
            $this->email->message($ResetPasswordPelanggan);
            $this->email->set_mailtype('html');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }
}
