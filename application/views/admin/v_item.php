<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Items</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item">Items</li>
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
                            <h4 class="m-0">Tabel Items</h4>
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
                                <th>Bardcode</th>
                                <th>Nama Item</th>
                                <th>Kategori Barang</th>
                                <th>Unit</th>
                                <th>Harga Barang</th>
                                <th>Berat</th>
                                <th>Stok</th>
                                <th>Gambar Barang</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Data Example -->
                            <?php
                            for ($i = 1; $i <= 12; $i++) :
                            ?>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td class="text-center">A0001 <br> <button>Cetak</button> </td>
                                    <td>Kopi Hijau</td>
                                    <td>Perbiji</td>
                                    <td>Perlusin</td>
                                    <td>Rp 55.000</td>
                                    <td>500</td>
                                    <td>-10</td>
                                    <td><img src="<?= base_url() . "assets/dist/img/kopi1.jpg" ?>" width="100"></td>
                                    <td class="d-flex justify-content-around">
                                        <a href="#" data-toggle="modal" data-target="#detailModal" class="btn btn-xs btn-info">
                                            <i class="fas fa-fw fa-eye text-white"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-danger btnDeleteUnits">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#editModal" class="btn btn-xs btn-warning">
                                            <i class="fas fa-fw fa-edit text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endfor;
                            ?>
                            <!-- Data Example End -->
                        </tbody>
                        <!-- Tbody End -->
                        <!-- Tfoot -->
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Bardcode</th>
                                <th>Nama Item</th>
                                <th>Kategori Barang</th>
                                <th>Unit</th>
                                <th>Harga Barang</th>
                                <th>Berat</th>
                                <th>Stok</th>
                                <th>Gambar Barang</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
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
                <h4 class="modal-title">Tambah Items</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Items</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="PRM001" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">
                            Kategori Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <select class="form-control">
                            <option>kategori</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unit">
                            Unit Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <select class="form-control">
                            <option>Unit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">
                            Harga
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="harga" id="harga" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="berat">
                            Berat
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="berat" id="berat" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">
                            Deskripsi
                            <sup class="text-danger">*</sup>
                        </label>
                        <textarea class="form-control" id="deskripsi" rows="3"></textarea>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="gambar">Gambar/Foto Barang</label>
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
                <h4 class="modal-title">Preview Items</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="kode">Kode Items</label>
                    <input type="text" name="kode" id="kode" class="form-control" value="CSM001" readonly>
                </div>
                <div class="form-group">
                    <label for="kode">Kode Items</label>
                    <input type="text" name="kode" id="kode" class="form-control" value="PRM001" readonly required>
                </div>
                <div class="form-group">
                    <label for="nama">
                        Nama Items
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="nama" id="nama" class="form-control" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="kategori">
                        Kategori Items
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="kategori" id="kategori" class="form-control" value="" readonly>

                </div>
                <div class="form-group">
                    <label for="unit">
                        Unit Items
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="nama" id="nama" class="form-control" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="harga">
                        Harga
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="harga" id="harga" class="form-control" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="berat">
                        Berat
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="berat" id="berat" class="form-control" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="deskripsi">
                        Deskripsi
                        <sup class="text-danger">*</sup>
                    </label>
                    <textarea class="form-control" id="deskripsi" rows="3" readonly></textarea>
                </div>
                <div class="form-group text-center">
                    <td><img src="<?= base_url() . "assets/dist/img/kopi1.jpg" ?>" width="300"></td>
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
                <h4 class="modal-title">Edit Items</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Items</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="CSM001" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode Items</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="PRM001" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control" value="Kopi Hijau">
                    </div>
                    <div class="form-group">
                        <label for="kategori">
                            Kategori Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="kategori" id="kategori" class="form-control" value="Perbiji">

                    </div>
                    <div class="form-group">
                        <label for="unit">
                            Unit Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control" value="Perlusin">
                    </div>
                    <div class="form-group">
                        <label for="harga">
                            Harga
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="harga" id="harga" class="form-control" value="Rp 55.000">
                    </div>
                    <div class="form-group">
                        <label for="berat">
                            Berat
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="berat" id="berat" class="form-control" value="500">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">
                            Deskripsi
                            <sup class="text-danger">*</sup>
                        </label>
                        <textarea class="form-control" id="deskripsi" rows="3">-</textarea>
                    </div>
                    <div class="form-group text-center">
                        <td><img src="<?= base_url() . "assets/dist/img/kopi1.jpg" ?>" width="300"></td>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="gambar">Ubah Foto/Gambar</label>
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