<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        is_logged_in();
    }

    public function index()
    {
        // Mengambil data user yang sedang login
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Blm dipakai karena login blm ada
        $data['title'] = 'Manajemen User';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['dt_user'] = $this->db->get('user')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['get_user'] = $this->M_user->select_user();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email|is_unique[user.email]',
            array(
                'is_unique' => 'This Email already Exist'
            )
        );
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[10]|max_length[150]');
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|min_length[5]|max_length[20]|is_unique[user.username]',
            array(
                'is_unique' => 'This Username already Exist'
            )
        );
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules(
            'notelp',
            'Nomor Telepon',
            'trim|required|numeric|min_length[8]|max_length[14]',
            array(
                'numeric' => 'This contain not number'
            )
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('admin/v_user', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {

            // Function untuk create data + autonumber

            $q_count = $this->db->get('user')->num_rows();

            $id_user = "USR" . ($q_count + 1) . date('Hdyims', time());

            // Configuration for upload image
            $upload_image = $_FILES['profile_image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '4096';
                $config['upload_path'] = './assets/user_img';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profile_image')) {
                    $new_image = $this->upload->data('file_name');
                    $gambar = $new_image;
                } else {
                    echo $this->upload->display_errors();
                    $gambar = 'default.jpg';
                }
            } else {
                $gambar = 'default.jpg';
            }
            // End of Configuration for upload image
            $tgl_lahir = date_create($this->input->post('tanggal_lahir'));
            $lahir = htmlspecialchars(date_format($tgl_lahir, "Y-m-d"));
            $today = date("Y", time() - 8);

            if ($lahir == $today) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Disimpan, Date haruslah valid</div>');
                redirect('akun');
            } else {
                $data = [
                    'kode_user' => htmlspecialchars($id_user),
                    'nama' => htmlspecialchars($this->input->post('nama')),
                    'alamat' => htmlspecialchars($this->input->post('alamat')),
                    'tanggal_lahir' => $lahir,
                    'notelp' => htmlspecialchars($this->input->post('notelp')),
                    'email' => htmlspecialchars($this->input->post('email')),
                    'username' => htmlspecialchars($this->input->post('username')),
                    'profile_img' => htmlspecialchars($gambar),
                    'about' => htmlspecialchars($this->input->post('about')),
                    'kode_role' => htmlspecialchars($this->input->post('role_id')),
                    'active_status' => 0,
                    'created_at' => htmlspecialchars(time()),
                    'updated_at' => 0
                ];
            }

            // Function untuk send email ketika berhasil registrasi

            $email = $this->input->post('email');
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'created_at' => time()
            ];

            $this->db->insert('user_reset_password', $user_token);
            $this->_sendEmail($token);

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('akun');
        }
    }

    // Edit Data User
    public function edit_user()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]');
        if ($this->form_validation->run() == false) {
            redirect('akun');
        } else {
            $email_lawas = htmlspecialchars($this->input->post('email_lawas'));
            $id_user = htmlspecialchars($this->input->post('id_user'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $email = htmlspecialchars($this->input->post('email'));
            $username = htmlspecialchars($this->input->post('username'));
            $role_id = htmlspecialchars($this->input->post('role_id'));
            if ($email_lawas != $email) {
                $user = $this->db->get_where('user', ['email' => $email_lawas, 'active_status' => 1])->row_array();
                if ($user) {
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'created_at' => time()
                    ];
                    $this->db->insert('user_reset_password', $user_token);
                    // Sudah diupdate untuk data selain email
                    $data = array(
                        'nama' => $nama,
                        'username' => $username,
                        'kode_role' => $role_id
                    );

                    $this->db->where('kode_user', $id_user);
                    $this->db->update('user', $data);
                    $this->_sendEmail_validasi_email($token, $id_user);

                    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Data Berhasil Diperbarui dan email verifikasi berhasil dikirim!</div>');
                    redirect('akun');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Data Gagal Diperbarui!, Aktivasi akun terlebih dahulu!</div>');
                    redirect('akun');
                }
            } else {
                $data = array(
                    'nama' => $nama,
                    'username' => $username,
                    'kode_role' => $role_id
                );

                $this->db->where('kode_user', $id_user);
                $this->db->update('user', $data);


                $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Data Berhasil Diperbarui</div>');
                redirect('akun');
            }
        }
    }



    public function nonaktifkan()
    {
        $id = htmlspecialchars($this->input->post('id_user'));
        $status = htmlspecialchars($this->input->post('status'));
        $this->M_user->status($id, $status);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Akun Berhasil Dinonaktifkan</div>');
        redirect('akun');
    }
    public function aktifkan()
    {
        $id = htmlspecialchars($this->input->post('id_user'));
        $status = htmlspecialchars($this->input->post('status'));
        $this->M_user->status($id, $status);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Akun Berhasil Diaktifkan</div>');
        redirect('akun');
    }

    // Send Email & All of it Configuration
    public function verif_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Management User';

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('admin/v_user', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'active_status' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'created_at' => time()
                ];

                $this->db->insert('user_reset_password', $user_token);
                $this->_sendEmail_reset_password($token);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="success">Silahkan Cek Email Anda Untuk Reset Password!!</div>');
                redirect('akun');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Anda Belum Terdaftar! Atau Akun Belum Aktif</div>');
                redirect('akun');
            }
        }
    }

    // Config Function Sendemail_
    private function _sendEmail($token)
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
        // Send Token Password
        $emailAkun = $this->input->post('email');
        $aktivasi_akun = "
                                <html>
                                <head>
                                    <title>Kode Aktivasi Akun + Isi Password</title>
                                </head>
                                <body>
                                    <h2>Silahkan Klik Link Dibawah Ini!!</h2>
                                    <p>Akun Anda</p>
                                    <p>Email : " . $emailAkun . "</p>
                                    <p>Tolong Klik Link Dibawah ini untuk Aktivasi Akun Anda!</p>
                                    <h4><a href='" . base_url() . "auth/activation?email=" . $emailAkun . "&token=" . urlencode($token) . "'>Aktivasi Akun!!</a></h4>
                                </body>
                                </html>
        ";
        $this->load->library('email', $config);
        $this->email->from('admin@procoffee.com', 'Aktivasi Akun');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Aktivasi Akun');
        $this->email->message($aktivasi_akun);
        $this->email->set_mailtype('html');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    // _sendEmail_reset_password
    private function _sendEmail_reset_password($token)
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
        // Send Token Password
        $emailAkun = $this->input->post('email');
        $ResetPassword = "
                                <html>
                                <head>
                                    <title>Kode Reset Password</title>
                                </head>
                                <body>
                                    <h2>Silahkan Klik Link Dibawah Ini!!</h2>
                                    <p>Akun Anda</p>
                                    <p>Email : " . $emailAkun . "</p>
                                    <p>Tolong Klik Link Dibawah ini untuk Aktivasi Akun Anda!</p>
                                    <h4><a href='" . base_url() . "auth/gantipassword?email=" . $emailAkun . "&token=" . urlencode($token) . "'>Aktivasi Akun!!</a></h4>
                                </body>
                                </html>
        ";
        $this->load->library('email', $config);
        $this->email->from('admin@procoffee.com', 'Reset Password Akun');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Reset Password Akun');
        $this->email->message($ResetPassword);
        $this->email->set_mailtype('html');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    private function _sendEmail_validasi_email($token, $id_user)
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
        // Send Token Password
        $emailAkun = $this->input->post('email');
        $ganti_email = "
                                <html>
                                <head>
                                    <title>Kode Ganti Email</title>
                                </head>
                                <body>
                                    <h2>Silahkan Klik Link Dibawah Ini!!</h2>
                                    <p>Akun Anda</p>
                                    <p>Email : " . $emailAkun . "</p>
                                    <p>Tolong Klik Link Dibawah ini untuk memverifikasi anda berganti email!</p>
                                    <h4><a href='" . base_url() . "auth/gantiemail?email=" . $emailAkun . "&account=" . $id_user . "&token=" . $token . "'>Aktivasi Akun!!</a></h4>
                                </body>
                                </html>
        ";
        $this->load->library('email', $config);
        $this->email->from('admin@procoffee.com', 'Berganti Email Baru');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Ganti Email Baru');
        $this->email->message($ganti_email);
        $this->email->set_mailtype('html');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
