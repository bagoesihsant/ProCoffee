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
                    <h3 class="card-title"><?= $title ?> Table <a href="<?= base_url() . 'C_gis/create_mapping'; ?>"><button class="btn btn-just-icon btn-round btn-success">Add Data <i class="fa fa-plus"></i></button></a></h3> 
                </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Cabang</th>
                            <th>Alamat</th>
                            <th>Status Cabang</th>
                            <th>Pemilik Cabang</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Isi Data Cabang -->
                    <?php 
                        $i = 1;
                        foreach($mapping as $cb) : 
                        $id_cabang = $cb['id_cabang'];
                    ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $cb['nama_cabang']; ?></td>
                        <td><?= $cb['alamat']; ?></td>
                        <td><?= $cb['status_cabang']; ?></td>
                        <td><?= $cb['pemilik_cabang']; ?></td>
                        <td><?= $cb['latitude']; ?></td>
                        <td><?= $cb['longitude']; ?></td>
                        <td><?= $cb['keterangan']; ?></td>
                        <td class="text-right">
                            <a href="<?= base_url() . 'C_gis/edit_mapping/' . $id_cabang; ?>"><button class="btn btn-info btn-xs btn-round">Edit Data</button></a>
                            <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id_cabang; ?>">Hapus Data</button>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <!-- Akhir Isi Data Cabang -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Cabang</th>
                            <th>Alamat</th>
                            <th>Status Cabang</th>
                            <th>Pemilik Cabang</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Keterangan</th>
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

<!--MODAL HAPUS DATA!-->
<?php
foreach ($getCabang as $i) :
    $id = $i['id_cabang'];
    $nama_cabang = $i['nama_cabang'];
    ?>

<div class="modal fade" id="modal_hapus<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
            <form action="<?= base_url() . 'C_gis/hapus_mapping'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $nama_cabang; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_cabang" value="<?= $id; ?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>