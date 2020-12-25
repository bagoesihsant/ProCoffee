<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title; ?></h1>
            </div>
            <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
            </ol>
            </div> -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card"> 
                <div class="card-header"> 
                    <h3 class="card-title"><?= $title ?> Table <button data-toggle="modal" data-target="#newroleModal" class="btn btn-just-icon btn-round btn-success">Add Data <i class="fa fa-plus"></i></button></h3> 
                </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Barang</th>
                            <th>Gambar Barang</th>
                            <th>Stok Barang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($get_brg as $m) :
                        $id = $m['id_brg'];
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $m['nama_brg']; ?></td>
                            <td><?= $m['kategori']; ?></td>
                            <td>Rp. <?= $m['harga_brg']; ?></td>
                            <td><img src="<?= base_url(); ?>assets/dist/img/barang/<?= $m['gambar']; ?>" width="50px"></td>
                            <td><?= $m['stok']; ?></td>
                            <td class="text-right">
                                <button class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Edit Barang</button>
                                <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>">Hapus Barang</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Barang</th>
                            <th>Gambar Barang</th>
                            <th>Stok Barang</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Akhir Pembatas -->

<!--MODAL DIALOG UNTUK CREATE DATA!-->
<div class="modal fade" id="newroleModal" tabindex="-1" role="dialog" aria-labelledby="newroleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newroleModal">Create New Data</h5>
                </button>   
            </div>
            <?= form_open_multipart('barang'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_brg" name="nama_brg" placeholder="Masukkan Nama Barang">
                        <?= form_error('nama_brg', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="id_ktg" id="id_ktg" class="form-control">
                        <?php  
                            $q_ktg = $this->db->query("SELECT * FROM kategori")->result_array();
                            foreach($q_ktg as $ktg):
                        ?>
                            <option value="<?= $ktg['id_kategori'] ?>"><?= $ktg['kategori'];?></option>
                        <?php
                            endforeach;
                        ?>
                        </select>
                        <?= form_error('id_ktg', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar Barang</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Harga Barang</label>
                        <input type="number" class="form-control" id="harga_brg" name="harga_brg" placeholder="Masukkan Harga Barang">
                        <?= form_error('harga_brg', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Stok Barang</label>
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Barang">
                        <?= form_error('stok', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--MODAL EDIT role!-->
<?php
foreach ($barang as $i) :
    $id = $i['id_brg'];
    $nama_brg = $i['nama_brg'];
    $id_ktg = $i['id_ktg'];
    $harga_brg = $i['harga_brg'];
    $gambar = $i['gambar'];
    $stok = $i['stok'];
    ?>

<div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
            </div>
            <?= form_open_multipart('barang/edit_brg'); ?>
            <input type="text" class="form-control" name="gambarlama" value="<?= $gambar; ?>" hidden>
                <div class="modal-body">
                    <input type="text" name="id_brg" value="<?= $id; ?>" hidden>
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_brg" name="nama_brg" placeholder="Masukkan Nama Barang" value="<?= $nama_brg; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="id_ktg" id="id_ktg" class="form-control">
                        <?php
                            $dt_ktg = $this->db->get_where("kategori", ['id_kategori' => $id_ktg])->row_array();
                        ?>
                        <option value="<?= $id_ktg ?>" selected disabled><?= $dt_ktg['kategori']; ?></option>
                        <option value="<?= $id_ktg ?>" selected hidden><?= $dt_ktg['kategori']; ?></option>
                        <?php  
                            $q_ktg = $this->db->query("SELECT * FROM kategori")->result_array();
                            foreach($q_ktg as $ktg):
                        ?>
                            <option value="<?= $ktg['id_kategori'] ?>"><?= $ktg['kategori'];?></option>
                        <?php
                            endforeach;
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Silahkan Pilih Gambar Anda</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                                <label for="exampleInputFile" class="custom-file-label">Pilih File Anda</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        <div>
                            <br>
                            <h6>*(Gambar Sebelumnya)</h6>
                            <img src="<?= base_url(); ?>assets/dist/img/barang/<?= $gambar; ?>" width="200px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Barang</label>
                        <input type="number" class="form-control" id="harga_brg" name="harga_brg" placeholder="Masukkan Harga Barang" value="<?= $harga_brg; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Stok Barang</label>
                        <input type="number" class="form-control" id="stok_brg" name="stok_brg" placeholder="Masukkan Stok Barang" value="<?= $stok; ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--MODAL HAPUS DATA!-->
<div class="modal fade" id="modal_hapus<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Hapus Data Barang</h3>
            </div>
            <form action="<?= base_url() . 'barang/hapus_brg'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $nama_brg; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_brg" value="<?= $id; ?>">
                    <input type="hidden" name="gambar" value="<?= $gambar; ?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>