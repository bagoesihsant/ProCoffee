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
        $this->load->view('admin/v_barang', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambah_items()
    {
        // form validasi 
        $this->form_validation->set_rules('nama', 'Nama', 'required',
        array(
            'required' => 'Isian tidak boleh kosong'
        ));
        $this->form_validation->set_rules('barcode', 'Barcode', 'required',
        array(
            'required' => 'Isian tidak boleh kosong'
        ));
        $this->form_validation->set_rules('kategori', 'Kategori', 'required',
        array(
            'required' => 'Isian tidak boleh kosong'
        ));
        $this->form_validation->set_rules('unit', 'Unit', 'required',
        array(
            'required' => 'Isian tidak boleh kosong'
        ));
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric',
        array(
            'required' => 'Isian tidak boleh kosong',
            'numeric' => 'Isian harus angka'
        ));
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric',
        array(
            'required' => 'Isian tidak boleh kosong',
            'numeric' => 'Isian harus angka'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required',
        array(
            'required' => 'Isian tidak boleh kosong'
        ));
        // form validasi end 

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Error, Data gagal ditambahkan")'
            );

            $data['produk'] = $this->barang->getAllItems()->result();
            $data['kategori'] = $this->barang->getAllCategories()->result();
            $data['satuan'] = $this->barang->getAllUnits()->result();
    
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('admin/v_barang', $data);
            $this->load->view('templates/admin/footer');
        } else {

            $kode = $this->input->post('kode');
            $nama = htmlspecialchars($this->input->post('nama'));
            $barcode = htmlspecialchars($this->input->post('barcode'));
            $kategori = $this->input->post('kategori');
            $unit = $this->input->post('unit');
            $harga = $this->input->post('harga');
            $berat = $this->input->post('berat');
            $deskripsi = $this->input->post('deskripsi');
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
                        'barcode' => $barcode,
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

    public function edit_barang_aksi()
    {
        // form validasi 
        $this->form_validation->set_rules('nama', 'Nama', 'required',
            array(
                'required' => 'Isian tidak boleh kosong'
            ));
        $this->form_validation->set_rules('barcode', 'Barcode', 'required',
            array(
                'required' => 'Isian tidak boleh kosong'
            ));
        $this->form_validation->set_rules('kategori', 'Kategori', 'required',
        array(
            'required' => 'Isian tidak boleh kosong'
        ));
        $this->form_validation->set_rules('unit', 'Unit', 'required',
            array(
                'required' => 'Isian tidak boleh kosong'
            ));
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric',
            array(
                'required' => 'Isian tidak boleh kosong',
                'numeric' => 'Isian harus angka'
            ));
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric',
            array(
                'required' => 'Isian tidak boleh kosong',
                'numeric' => 'Isian harus angka'
            ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required',
            array(
                'required' => 'Isian tidak boleh kosong'
            ));
        // form validasi end 

        if ($this->form_validation->run() == false) { //jika data gagal tervalidasi
            $this->session->set_flashdata(
                'pesan_menu',
                'toastr.error("Error, Data gagal diupdate")'
            );

            $id = $this->input->post('kode');

            $data['edit'] = $this->barang->get_where($id)->result();
            $data['produk'] = $this->barang->getAllItems()->result();
            $data['kategori'] = $this->barang->getAllCategories()->result();
            $data['satuan'] = $this->barang->getAllUnits()->result();
    
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('admin/v_edit_barang', $data);
            $this->load->view('templates/admin/footer');
        } else { //jika data sukses tervalidasi

            $kode = $this->input->post('kode');
            $nama = htmlspecialchars($this->input->post('nama'));
            $barcode = htmlspecialchars($this->input->post('barcode'));
            $kategori = $this->input->post('kategori');
            $unit = $this->input->post('unit');
            $harga = $this->input->post('harga');
            $berat = $this->input->post('berat');
            $deskripsi = $this->input->post('deskripsi');
            $gambar_old = $this->input->post('gambar_old');
            $gambar = $_FILES['gambar']; //untuk mengambil file gambar

            if (!empty($_FILES["gambar"]["name"])) { //jika ubah gambar

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
                    
                    //untuk menghapus gambar sebelumnya di folder
                    unlink("assets/items_img/" . $gambar_old);

                    //untuk menentukan nama gambar yang di upload di db
                    $namaGambar = $this->upload->data('file_name');

                    $where = array(
                        'kode_barang' => $kode
                    );
                    $data = array(
                        'nama' => $nama,
                        'barcode' => $barcode,
                        'kode_kategori' => $kategori,
                        'kode_satuan' => $unit,
                        'harga' => $harga,
                        'berat' => $berat,
                        'deskripsi' => $deskripsi,
                        'gambar' => $namaGambar,
                        'updated' => date('dmY')
                    );

                    $edit = $this->barang->edit_items($where, $data);
                    if($edit>0){
                        //alert jika update databse sukses
                        $this->session->set_flashdata(
                            'pesan_menu',
                            'toastr.success("Data berhasil di update")'
                        );
                        redirect('admin/C_barang');
                    }else{
                        //alert jika update database gagal
                        $this->session->set_flashdata(
                            'pesan_menu',
                            'toastr.danger("Data gagal di update")'
                        );
                        redirect('admin/C_barang');
                    }
                }
            } else { //jika tidak upload gambar
                $where = array(
                    'kode_barang' => $kode
                );

                $data = array(
                    'nama' => $nama,
                    'barcode' => $barcode,
                    'kode_kategori' => $kategori,
                    'kode_satuan' => $unit,
                    'harga' => $harga,
                    'deskripsi' => $deskripsi,
                    'berat' => $berat,
                    'updated' => date('dmY')
                );

                $edit = $this->barang->edit_items($where, $data);
                // alert(print_r($edit));
                if ($edit =! 0) {
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
    
    public function edit_barang($id)
    {
        $data['edit'] = $this->barang->get_where($id)->result();
        $data['produk'] = $this->barang->getAllItems()->result();
        $data['kategori'] = $this->barang->getAllCategories()->result();
        $data['satuan'] = $this->barang->getAllUnits()->result();

        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_edit_barang', $data);
        $this->load->view('templates/admin/footer');
        
    }

    public function generate_barang($id)
    {
        $data['barcode'] = $this->barang->get_where($id)->result();

        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/v_generate_barang', $data);
        $this->load->view('templates/admin/footer');
        
    }

    public function barcode_print($id)
    {
        $data['barcode'] = $this->barang->get_where($id)->result();
        $html = $this->load->view('admin/v_barcode_barang_print', $data, true);
        $filename = 'Barcode'.$id;

        $this->barang->print_dompdf($html, 'A5', 'landscape', $filename);
    }

    public function qrcode_print($id)
    {
        $data['qrcode'] = $this->barang->get_where($id)->result();
        $html = $this->load->view('admin/v_barcode_barang_print', $data, true);
        $filename = 'Qrcode'.$id;

        $this->barang->print_dompdf($html, 'A5', 'landscape', $filename);
    }
}
