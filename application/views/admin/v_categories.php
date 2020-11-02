<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item">Categories</li>
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
                            <h4 class="m-0">Tabel Categories</h4>
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
                    <table id="CategoriesTable" class="table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Categories</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody id="TableTarget">
                            <!-- Data Example -->
                            <?php $no = 1;
                            foreach ($row->result() as $rw => $r) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <!-- <td><?= $r->kode_category; ?></td> -->
                                    <td><?= $r->name; ?></td>
                                    <td class="d-flex justify-content-around">
                                        <a href="#" data-toggle="modal" data-target="#detailModal" class="btn btn-xs btn-info">
                                            <i class="fas fa-fw fa-eye text-white"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-danger btnDeleteUnits">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#editModal<?= $r->kode_category; ?>" class="btn btn-xs btn-warning">
                                            <i class="fas fa-fw fa-edit text-white"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach ?>
                            <!-- Data Example End -->
                        </tbody>
                        <!-- Tbody End -->
                        <!-- Tfoot -->

                        <!-- Tfoot End -->
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
                <h4 class="modal-title">Tambah Categories</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('C_admin/addDataCategories'); ?>
                <div class="form-group">
                    <label for="kode">Kode Categories</label>
                    <input type="text" name="kode_kategori" id="kode_kategori" class="form-control" value="CSM001" required>

                </div>
                <div class="form-group">
                    <label for="nama">
                        Nama Categories
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="btnTambahCategories" name="tambah">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah End -->



<!-- Modal Detail -->
<?php $no = 0;
foreach ($row->result() as $rw => $r) : $no++; ?>
    <div class="modal fade" id="editModal<?= $r->kode_category; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Categories</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('C_admin/editDataCategories'); ?>
                    <div class="form-group">
                        <label for="kode">Kode Categories</label>
                        <input type="text" name="kode_kategori" value="<?= $r->kode_category ?>" id="kode_kategori" class="form-control" value="CSM001" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Categories
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama_kategori" value="<?= $r->name ?>" id="nama_kategori" class="form-control" value="" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnTambahCategories" name="tambah">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal Detail End -->


<!-- Modal Edit -->
<div class="modal fade" id="detailModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Categories</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Categories</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="CSM001" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Categories
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control" value="Perkotak">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="btnTambahCategories" name="tambah">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit End -->