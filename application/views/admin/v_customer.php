<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Customer</li>
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
                            <h4 class="m-0">Tabel Customer</h4>
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
                    <table id="customerTable" class="table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Customer</th>
                                <th>No. HP</th>
                                <th>E-mail</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Data Example -->
                            <?php
                            for ($i = 1; $i <= 15; $i++) :
                            ?>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td>John Doe</td>
                                    <td>082331588636</td>
                                    <td>john.doe@example.com</td>
                                    <td>1753 Diam. Avenue</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="#" data-toggle="modal" data-target="#detailModal" class="btn btn-xs btn-info">
                                            <i class="fas fa-fw fa-eye text-white"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-danger btnDeleteCustomer">
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
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Customer</th>
                                <th>No. HP</th>
                                <th>E-mail</th>
                                <th>Alamat</th>
                                <th>Action</th>
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
                <h4 class="modal-title">Tambah Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Customer</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="CSM001" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Customer
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control" value="" placeholder="ex: John Doe">
                    </div>
                    <div class="form-group">
                        <label for="jk">
                            Jenis Kelamin
                        </label>
                        <select name="jk" id="jk" class="form-control custom-select">
                            <option value="">Pilih Salah Satu</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="notelp">
                            No. Telpon / HP
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="notelp" id="notelp" class="form-control" value="" placeholder="ex: 082331588636">
                    </div>
                    <div class="form-group">
                        <label for="email">
                            E-Mail
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="email" id="email" class="form-control" value="" placeholder="ex: john.doe@example.com">
                    </div>
                    <div class="form-group">
                        <label for="password">
                            Password
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="password" name="password" id="password" class="form-control" value="" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="alamat">
                            Alamat
                        </label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="ex: 753 Johannes. Avenue"></textarea>
                    </div>
                    <p class="text-danger text-form text-sm">Semua yang bertanda * wajib diisi</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="btnTambahCustomer" name="tambah">Simpan</button>
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
                <h4 class="modal-title">Preview Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="kode">Kode Customer</label>
                    <input type="text" name="kode" id="kode" class="form-control" value="CSM001" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">
                        Nama Customer
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="nama" id="nama" class="form-control" value="John Doe" placeholder="ex: John Doe" readonly>
                </div>
                <div class="form-group">
                    <label for="jk">
                        Jenis Kelamin
                    </label>
                    <select name="jk" id="jk" class="form-control custom-select" readonly>
                        <option value="">Pilih Salah Satu</option>
                        <option value="Laki - Laki" selected>Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="notelp">
                        No. Telpon / HP
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="notelp" id="notelp" class="form-control" value="08233158636" placeholder="ex: 082331588636" readonly>
                </div>
                <div class="form-group">
                    <label for="email">
                        E-Mail
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="email" id="email" class="form-control" value="john.doe@example.com" placeholder="ex: john.doe@example.com" readonly>
                </div>
                <div class="form-group">
                    <label for="password">
                        Password
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="password" name="password" id="password" class="form-control" value="12345678" placeholder="Password" readonly>
                </div>
                <div class="form-group">
                    <label for="alamat">
                        Alamat
                    </label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="ex: 753 Johannes. Avenue" readonly>753 Johannes. Avenue</textarea>
                </div>
                <p class="text-danger text-form text-sm">Semua yang bertanda * wajib diisi</p>
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
                <h4 class="modal-title">Tambah Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Customer</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="CSM001" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Customer
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control" value="John Doe" placeholder="ex: John Doe">
                    </div>
                    <div class="form-group">
                        <label for="jk">
                            Jenis Kelamin
                        </label>
                        <select name="jk" id="jk" class="form-control custom-select">
                            <option value="">Pilih Salah Satu</option>
                            <option value="Laki - Laki" selected>Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="notelp">
                            No. Telpon / HP
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="notelp" id="notelp" class="form-control" value="082331588636" placeholder="ex: 082331588636">
                    </div>
                    <div class="form-group">
                        <label for="email">
                            E-Mail
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="email" id="email" class="form-control" value="john.doe@example.com" placeholder="ex: john.doe@example.com">
                    </div>
                    <div class="form-group">
                        <label for="alamat">
                            Alamat
                        </label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="ex: 753 Johannes. Avenue">753 Johannes. Avenue</textarea>
                    </div>
                    <p class="text-danger text-form text-sm">Semua yang bertanda * wajib diisi</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="btnTambahCustomer" name="tambah">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit End -->