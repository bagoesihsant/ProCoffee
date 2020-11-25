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
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-dark m-0"><?= $title ?> Table </h3>
                            </div>
                            <div class="col-6 float-right">
                                <button data-toggle="modal" data-target="#newroleModal" class="btn btn-just-icon btn-round btn-primary float-right">Add Data <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
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
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($get_user as $m) :
                                    $id = $m['kode_user'];
                                    $status = $m['active_status'];
                                    $id_role = $m['kode_role'];
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $m['nama']; ?></td>
                                        <td><?= $m['email']; ?></td>
                                        <td><?= $m['role']; ?></td>
                                        <?php if ($status == 0) : ?>
                                            <td><small class="badge badge-danger">Nonaktif</small></td>
                                        <?php else : ?>
                                            <td><small class="badge badge-success">Aktif</small></td>
                                        <?php endif; ?>
                                        <td><?= date('d F Y', $m['created_at']); ?></td>
                                        <td class="text-right">
                                            <button class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Edit User</button>
                                            <?php if ($status == 0) : ?>
                                                <button class="btn btn-success btn-xs btn-round" data-toggle="modal" data-target="#modal_aktif<?= $id; ?>">Aktifkan User</button>
                                            <?php else : ?>
                                                <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_nonaktif<?= $id; ?>">Nonaktifkan User</button>
                                            <?php endif; ?>
                                            <button class="btn btn-warning btn-xs btn-round" data-toggle="modal" data-target="#send_email<?= $id; ?>"><i class="fas fa-envelope text-white"></i></button>
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
            <?= form_open_multipart('admin/C_user'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="20" rows="4" class="form-control"><?= set_value('alamat'); ?></textarea>
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan tanggal_lahir" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Nomor Telpon</label>
                    <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Masukkan notelp" value="<?= set_value('notelp'); ?>">
                    <?= form_error('notelp', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Silahkan Pilih Gambar Anda</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profile_image" name="profile_image">
                            <label for="image" class="custom-file-label">Pilih File Anda</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">About</label>
                    <input type="text" class="form-control" id="about" name="about" placeholder="Masukkan about" value="<?= set_value('about'); ?>">
                    <?= form_error('about', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role_id" id="" class="form-control" required>
                        <?php foreach ($role as $rl) : ?>
                            <option value="<?= $rl['kode_role'] ?>"><?= $rl['role']; ?></option>
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
foreach ($get_user as $i) :
    $id = $i['kode_user'];
    $nama = $i['nama'];
    $alamat = $i['alamat'];
    $tgl_lahir = $i['tanggal_lahir'];
    $email = $i['email'];
    $username = $i['username'];
    $notelp = $i['notelp'];
    $image = $i['profile_img'];
    $about = $i['about'];
    $role_id = $i['kode_role'];
    $nama_role = $i['role'];
    $is_active = $i['active_status'];
    $date_created = $i['created_at'];
    $change_pass = $i['updated_at'];
?>

    <!-- Modal Edit Data User -->
    <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit User</h3>
                </div>
                <?= form_open_multipart('admin/C_user/edit_user'); ?>
                <input type="text" name="id_user" value="<?= $id; ?>" hidden>
                <input type="text" name="email_lawas" value="<?= $email; ?>" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama User" value="<?= $nama; ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email User" value="<?= $email; ?>">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username User" value="<?= $username; ?>">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Role Anda</label>
                        <select name="role_id" id="" class="form-control" required>
                            <option value="<?= $role_id; ?>" selected disabled><?= $nama_role; ?></option>
                            <option value="<?= $role_id; ?>" selected hidden><?= $nama_role; ?></option>

                            <?php foreach ($role as $rl) : ?>
                                <option value="<?= $rl['kode_role'] ?>"><?= $rl['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
    <!-- Aktifkan -->
    <div class="modal fade" id="modal_aktif<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Akfitkan Data User</h3>
                </div>
                <form action="<?= base_url() . 'admin/C_user/aktifkan'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin mau mengaktifkan data user ini? <b><?= $nama; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_user" value="<?= $id; ?>">
                        <input type="hidden" name="status" value="1">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-success">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Nonaktifkan -->
    <div class="modal fade" id="modal_nonaktif<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Nonaktifkan Data User</h3>
                </div>
                <form action="<?= base_url() . 'admin/C_user/nonaktifkan'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin mau menonaktifkan data user ini? <b><?= $nama; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_user" value="<?= $id; ?>">
                        <input type="hidden" name="status" value="0">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Send Email Form -->
    <div class="modal fade" id="send_email<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Send Token Password</h3>
                </div>
                <form action="<?= base_url() . 'admin/C_user/verif_password'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin mengirim token password data user ini? <b><?= $nama; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_user" value="<?= $id; ?>">
                        <input type="hidden" name="status" value="1">
                        <input type="hidden" name="email" value="<?= $email; ?>">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-primary">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<?php endforeach; ?>