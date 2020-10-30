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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dt_user as $m) :
                        $id = $m['id_user'];
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['email']; ?></td>
                            <td><?= $m['image']; ?></td>
                            <td><?= $m['role_id']; ?></td>
                            <td><?= $m['is_active']; ?></td>
                            <td><?= $m['date_created']; ?></td>
                            <td class="text-right">
                                <button class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Edit User</button>
                                <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>">Hapus User</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Actions</th>
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
            <?= form_open_multipart('C_user'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                        <label for="">Silahkan Pilih Gambar Anda</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label for="image" class="custom-file-label">Pilih File Anda</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">About</label>
                        <input type="text" class="form-control" id="about" name="about" placeholder="Masukkan about">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role_id" id="" class="form-control">
                            <?php foreach ($role as $rl) : ?>
                                <option value="<?= $rl['id_role'] ?>"><?= $rl['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
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

<?php
foreach ($dt_user as $i) :
    $id = $i['id_user'];
    $nama = $i['nama'];
    $email = $i['email'];
    $image = $i['image'];
    $about = $i['about'];
    $role_id = $i['role_id'];
    $is_active = $i['is_active'];
    $date_created = $i['date_created'];
    $change_pass = $i['change_pass'];
    ?>

<!-- Modal Edit Data User -->

<div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
            </div>
            <?= form_open_multipart('barang/edit_brg'); ?>
            <input type="text" class="form-control" name="image" value="<?= $image; ?>" hidden>
                <div class="modal-body">
                    <input type="text" name="id_user" value="<?= $id; ?>" hidden>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Barang" value="<?= $nama; ?>">
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
                            <img src="<?= base_url(); ?>assets/dist/img/user/<?= $image; ?>" width="200px">
                        </div>
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

<!-- Modal Hapus User -->
<div class="modal fade" id="modal_hapus<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
            <form action="<?= base_url() . 'C_user/hapus_user'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $nama; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_user" value="<?= $id; ?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
