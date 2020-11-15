<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Units</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item">Units</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Header ( Page Header ) End -->

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Card -->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="m-0">Tabel Units</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="#" data-toggle="modal" data-target="#tambahModal" class="btn btn-sm btn-info float-right">
                                <i class="fas fa-fw fa-plus"></i>
                                <span>Tambah</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <!-- Data Table -->
                    <table id="UnitsTable" class="table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Units</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Data Example -->
                            <?php $no = 1;
                            foreach ($row->result() as $rows => $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->nama; ?></td>
                                    <td class="d-flex justify-content-around">
                                        <a href="#" data-toggle="modal" data-target="#detailModal<?= $data->kode_satuan; ?>" class="btn btn-xs btn-info">
                                            <i class="fas fa-fw fa-eye text-white"></i>
                                        </a>
                                        <a href="#modalDelete" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('admin/C_satuan/deleteUnits/' . $data->kode_satuan) ?>')" data-toggle="modal" data-target="" class="btn btn-xs btn-danger btnDeleteUnits">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#editModal<?= $data->kode_satuan; ?>" class="btn btn-xs btn-warning">
                                            <i class="fas fa-fw fa-edit text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- Data Table End -->
                </div>
                <!-- Card Body End -->
            </div>
            <!-- Card End -->
        </div>
    </section>
    <!-- Main Content End -->

</div>
<!-- Content Wrapper End -->

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Satuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('admin/C_satuan/addDataUnits'); ?>
                <div class="form-group">
                    <label for="kode">Kode Satuan</label>
                    <input type="text" name="kode" id="kode" class="form-control" value="CSM001" required>
                </div>
                <div class="form-group">
                    <label for="nama">
                        Nama Satuan
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="nama" id="nama" class="form-control" value="" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="btnTambahUnits" name="tambah">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah End -->

<!-- Modal Detail -->
<?php $no = 0;
foreach ($row->result() as $rw => $r) : $no++; ?>
    <div class="modal fade" id="detailModal<?= $r->kode_satuan; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Satuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode">Kode Satuan</label>
                        <input type="text" name="kode_kategori" value="<?= $r->kode_satuan ?>" id="kode_kategori" class="form-control" value="CSM001" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Satuan
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama_kategori" value="<?= $r->nama ?>" id="nama_kategori" class="form-control" value="" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Tanggal Di buat
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama_kategori" value="<?= date("d-m-Y", $r->created); ?>" id="nama_kategori" class="form-control" value="" readonly required>
                    </div>
                    <?php $tanggal_ubah = $r->updated;
                    if ($tanggal_ubah) : ?>
                        <div class="form-group">
                            <label for="nama">
                                Tanggal Di Ubah
                                <sup class="text-danger">*</sup>
                            </label>
                            <input type="text" name="nama_kategori" value="<?= date("d-m-Y", $r->updated); ?>" id="nama_kategori" class="form-control" value="" readonly required>
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <label for="nama">
                                Tanggal Di Ubah
                                <sup class="text-danger">*</sup>
                            </label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="Data Belum Pernah Di Ubah" readonly required>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal Detail End -->

<?php
foreach ($row->result() as $rw => $r) :  ?>
    <div class="modal fade" id="editModal<?= $r->kode_satuan; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Satuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('admin/C_satuan/editDataUnits'); ?>
                    <div class="form-group">
                        <label for="kode">Kode Satuan</label>
                        <input type="text" name="kode" value="<?= $r->kode_satuan ?>" id="kode" class="form-control" value="CSM001" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Satuan
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" value="<?= $r->nama ?>" id="nama" class="form-control" value="" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnTambahSatuan" name="tambah">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal Detail End -->

<!-- Modal Delete -->
<!-- <div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Yakin Hapus Data??</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="formDelete" method="POST">
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger" id="btnTambahSatuan" name="tambah">Hapus</button>
            </form>
        </div>
    </div>
</div>
</div> -->

<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <input type="text" id="kode-hapus" hidden>
            <div class="modal-body text-center">
                <i class="fa fa-exclamation-triangle text-danger fa-7x mb-3 mt-2"></i> <br>
                <h3 class="text-center font-weight-bold">Hapus Data</h3>
                <h5 class="font-weight-light">Apa anda yakin ingin menghapus data ini?</h5>
                <form action="" id="formDelete" method="POST">
                    <button type="submit" class="btn btn-danger" id="btnTambahSatuan" name="tambah">Hapus</button>
                    <button class="btn btn-secondary mt-1" type="button" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal Delete End -->