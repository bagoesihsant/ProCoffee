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
            <form action="<?= base_url('C_user'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan menu">
                    </div>
                    <div class="form-group">
                        <label for="">menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan menu">
                    </div>
                    <div class="form-group">
                        <label for="">menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan menu">
                    </div>
                    <div class="form-group">
                        <label for="">menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan menu">
                    </div>
                    <div class="form-group">
                        <label for="">menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan menu">
                    </div>
                    <div class="form-group">
                        <label for="">menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan menu">
                    </div>
                    <div class="form-group">
                        <label for="">menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan menu">
                    </div>
                    <div class="form-group">
                        <label for="">menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan menu">
                    </div>
                    <div class="form-group">
                        <label for="">icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukkan icon">
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
