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
                                    <td><?= $data->kode_satuan; ?></td>
                                </tr>

                            <?php endforeach; ?>
                            <!-- Data Example End -->
                        </tbody>
                        <!-- Tbody End -->
                        <!-- Tfoot -->
                        <!-- <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama Units</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot> -->
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
                <h4 class="modal-title">Tambah Units</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Units</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="CSM001" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Units
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
<div class="modal fade" id="detailModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Preview Units</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="kode">Kode Units</label>
                    <input type="text" name="kode" id="kode" class="form-control" value="CSM001" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">
                        Nama Units
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="nama" id="nama" class="form-control" value="Perlusin" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Detail End -->

<!-- Modal Edit -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Units</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Units</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="CSM001" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Units
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control" value="Perlusin">
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
<!-- Modal Edit End -->