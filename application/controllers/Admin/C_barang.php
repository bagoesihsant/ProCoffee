<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_barang extends CI_Controller
{

    // Construct
    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('M_barang', 'barang');
    }

    // START ITEMS START ITEMS START ITEMS START ITEMS START ITEMS START ITEMS
    public function index()
    {
        $data['produk'] = $this->barang->getAllItems()->result();
        $data['kategori'] = $this->barang->getAllCategories()->result();
        $data['satuan'] = $this->barang->getAllUnits()->result();

        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_item', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambah_items()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Error, Data gagal ditambahkan")'
            );
            redirect('admin/C_barang');
        } else {

            $kode = $this->input->post('kode');
            $nama = htmlspecialchars($this->input->post('nama'));
            $kategori = $this->input->post('kategori');
            $unit = $this->input->post('unit');
            $harga = $this->input->post('harga');
            $berat = $this->input->post('berat');
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            $gambar = $_FILES['gambar']; //untuk mengambil file gambar

            //nama random untuk rename gambar di db dan penyimpanan direktori
            $namarandom = 'items' . $kode . rand();

            //jika gambar tidak sama dengan kosong, maka gambar akan dipindah ke folder dan validasijpg/jpeg
            if ($gambar != '') {
                $config['upload_path']      = './assets/items_img'; //buat nyimpen direktori gambar
                $config['allowed_types']    = 'jpg|jpeg|png'; //tipe gambar yang boleh di upload
                $config['file_name']        = $namarandom; //ambil nama random yang atas

                //untuk load library upload
                $this->load->library('upload', $config);

                //jiika gambar yang diambil dari inputan gambar gagal di upload
                if (!$this->upload->do_upload('gambar')) {
                    //alert jika gambar gagal diupload
                    $this->session->set_flashdata(
                        'pesan_menu',
                        'toastr.error("Error, Data gagal ditambahkan. yang anda upload bukan gambar")'
                    );
                    redirect('admin/C_barang');
                } else {
                    $namaGambar = $this->upload->data('file_name');

                    $data = array( //array untuk dimasukkan ke database
                        'kode_barang' => $kode,
                        'nama' => $nama,
                        'kode_kategori' => $kategori,
                        'kode_satuan' => $unit,
                        'harga' => $harga,
                        'berat' => $berat,
                        'deskripsi' => $deskripsi,
                        'created' => date('dmY'),
                        'gambar' => $namaGambar
                    );
                    $tambah = $this->barang->tambah_item($data);
                    if ($tambah > 0) {
                        $this->session->set_flashdata(
                            'pesan_menu',
                            'toastr.success("Data berhasil ditambahkan.")'
                        );
                        redirect('admin/C_barang');
                    } else {
                        $this->session->set_flashdata(
                            'pesan_menu',
                            'toastr.error("Error, Data gagal ditambahkan.")'
                        );
                        redirect('admin/C_barang');
                    }
                }
            }
        }
    }

    // hapus items
    public function hapus_items($id)
    {
        $where = array('kode_barang' => $id);
        //untuk mengambil semua data database berdasarkan where
        $n_gambar = $this->barang->ambil_items($where)->result();
        foreach ($n_gambar as $N) {
            $nama_gambar = $N->image; //menginisisasi var nama_barang
        }

        //untuk menghapus gambar di folder
        unlink("assets/items_img/" . $nama_gambar);
        //untuk menghapus data di database
        $data = array('kode_barang' => $id);
        $hapus = $this->barang->hapus_items($data);

        if ($hapus != 0) {
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.success("Data berhasil dihapus.")'
            );
            redirect('admin/C_barang');
        } else {
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Error, Data gagal dihapus.")'
            );
            redirect('admin/C_barang');
        }
    }
    // hapus items

    public function edit_items()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) { //jika data gagal tervalidasi
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Error, Data gagal diupdate")'
            );
            redirect('admin/C_barang');
        } else { //jika data sukses tervalidasi

            $kode = $this->input->post('kode');
            $nama = htmlspecialchars($this->input->post('nama'));
            $kategori = $this->input->post('kategori');
            $unit = $this->input->post('unit');
            $harga = $this->input->post('harga');
            $berat = $this->input->post('berat');
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            $gambar_old = $this->input->post('gambar_old');
            $gambar = $_FILES['gambar']; //untuk mengambil file gambar

            if ($this->input->post('ganti')) {
                //untuk menghapus gambar sebelumnya di folder
                unlink("assets/items_img/" . $gambar_old);

                //nama random untuk rename gambar di db dan penyimpanan direktori
                $namarandom = 'items' . $kode . rand();

                $config['upload_path']      = './assets/items_img'; //buat nyimpen direktori gambar
                $config['allowed_types']    = 'jpg|jpeg|png'; //tipe gambar yang boleh di upload
                $config['file_name']        = $namarandom; //ambil nama random yang atas

                //untuk load library upload
                $this->load->library('upload', $config);

                //jiika gambar yang diambil dari inputan gambar gagal di upload
                if (!$this->upload->do_upload('gambar')) {
                    //alert jika gambar gagal diupload
                    $this->session->set_flashdata(
                        'pesan_menu',
                        'toastr.error("Error, Data gagal ditambahkan. yang anda upload bukan gambar")'
                    );
                    redirect('admin/C_barang');
                    //jika berhasil
                } else {

                    $where = array(
                        'kode_barang' => $kode
                    );
                    $data = array(
                        'nama' => $nama,
                        'kode_kategori' => $kategori,
                        'kode_satuan' => $unit,
                        'harga' => $harga,
                        'berat' => $berat,
                        'deskripsi' => $deskripsi,
                        'gambar' => $namarandom,
                        'updated' => date('dmY')
                    );

                    $edit = $this->barang->edit_items($where, $data);

                    //alert jika gambar sukses diupload
                    $this->session->set_flashdata(
                        'pesan_menu',
                        'toastr.success("Data berhasil di update")'
                    );
                    redirect('admin/C_barang');
                }
            } else { //jika tidak upload gambar
                $where = array(
                    'kode_barang' => $kode
                );

                $data = array(
                    'nama' => $nama,
                    'kode_kategori' => $kategori,
                    'kode_satuan' => $unit,
                    'harga' => $harga,
                    'berat' => $berat,
                    'deskripsi' => $deskripsi,
                    'updated' => date('dmY')
                );

                $edit = $this->barang->edit_items($data, $where);
                // alert(print_r($edit));
                if ($edit = !0) {
                    $this->session->set_flashdata(
                        'pesan_menu',
                        'toastr.success("Data berhasil di update.")'
                    );
                    redirect('admin/C_barang');
                } else {
                    $this->session->set_flashdata(
                        'pesan_menu',
                        'toastr.error("Error, Data gagal diupdate.")'
                    );
                    redirect('admin/C_barang');
                }
            }
        }
    }
    //END ITEMS END ITEMS END ITEMS END ITEMS END ITEMS END ITEMS
}