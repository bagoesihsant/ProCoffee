<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Supplier</li>
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
                            <h4 class="m-0">Tabel Supplier</h4>
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
                    <table id="dataTableSupplier" class="table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Data -->
                            <?php
                            $no = 1;
                            foreach ($supplier as $su) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $su->nama; ?></td>
                                    <td><?= $su->alamat ?></td>
                                    <td class="d-flex justify-content-around">
                                        <a href="#" data-toggle="modal" data-target="#detailModal" class="btn btn-xs btn-info previewSupplier" id="detail" data-kode="<?= $su->kode_supplier; ?>" data-nama="<?= $su->nama; ?>" data-notelp="<?= $su->no_hp; ?>" data-alamat="<?= $su->alamat; ?>" data-deskripsi="<?= $su->deskripsi; ?>">
                                            <i class="fas fa-fw fa-eye text-white"></i>
                                        </a>
                                        <a href="" class="btn btn-xs btn-danger btnDeleteSupplier" data-target="#hapusModal" data-toggle="modal" onClick="hapus(
                                            '<?= $su->kode_supplier ?>'
                                        )">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                        <a href="<?= base_url("supplier/edit_supplier/") . $su->kode_supplier ?>" class="btn btn-xs btn-warning pl-2 pr-2">
                                            <i class="fas fa-fw fa-edit text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            <!-- Data  -->
                        </tbody>
                        <!-- Tbody End -->
                        <!-- Tfoot -->
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama Supplier</th>
                                <th>No HP</th>
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
                <h4 class="modal-title">Tambah Supplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $kode = $this->supplier->kode_supplier();

            if ($kode->num_rows() > 0) {
                // Jika ditemukan id
                $kode = $kode->row_array();
                $kode = $this->hookdevlib->autonumber($kode['kode_supplier'], 2, 10);
            } else {
                // Jika tidak ditemukan id
                $kode = "SP0000000001";
            }
            ?>
            <div class="modal-body">
                <form action="<?= base_url() . 'supplier/tambah' ?>" method="post">
                    <div class="form-group">
                        <label for="kode">
                            Kode Supplier
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="kode" id="kode" class="form-control" value="<?= $kode ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Supplier
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control" value="" required>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="notelp">
                            No. Telpon / HP
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="notelp" id="notelp" class="form-control" onkeypress="return hanyaAngka(event)" minlength="11" maxlength="13" required>
                        <?= form_error('notelp', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">
                            Alamat
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">
                            Deskripsi
                            <sup class="text-danger">*</sup>
                        </label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control ckeditor" required></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <p class="text-danger text-form text-sm">Semua yang bertanda * wajib diisi</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="btnTambahSupplier" name="tambah">Simpan</button>
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
                <h4 class="modal-title">Preview Supplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-tampil">
                <div class="form-group">
                    <label for="kode">Kode Supplier</label>
                    <p id="kode-detail" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="nama">
                        Nama Supplier
                    </label>
                    <p id="nama-detail" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="notelp">
                        No. Telpon / HP
                    </label>
                    <p id="notelp-detail" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="alamat">
                        Alamat
                    </label>
                    <p id="address-detail" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="deskripsi">
                        Deskripsi
                    </label>
                    <p id="deskripsi-detail" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Detail End -->

<!-- modal hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <input type="text" id="kode-hapus" hidden>
            <div class="modal-body text-center">
                <i class="fa fa-exclamation-triangle text-danger fa-7x mb-3 mt-2"></i> <br>
                <h3 class="text-center font-weight-bold">Hapus Data</h3>
                <h5 class="font-weight-light">Apa anda yakin ingin menghapus data ini?</h5>

                <a class="btn btn-danger mr-1" href="<?= base_url() . 'supplier/hapus_supplier/' . $su->kode_supplier ?> ">Hapus</a>
                <button class="btn btn-secondary mt-1" type="button" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- modal hapus end -->

<!-- script -->
<script>
    // CKEDITOR.replace('deskripsi');

    // script validasi hanya angka
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }


    // Membuat fungsi untuk klik tombol preview pada preview supplier
    var buttonPreview = document.getElementsByClassName('previewSupplier');
    for (var i = 0; i < buttonPreview.length; i++) {
        buttonPreview[i].onclick = function() {
            document.getElementById("kode-detail").innerHTML = $(this).data('kode');
            document.getElementById("nama-detail").innerHTML = $(this).data('nama');
            document.getElementById("notelp-detail").innerHTML = $(this).data('notelp');
            document.getElementById("address-detail").innerHTML = $(this).data('alamat');
            document.getElementById("deskripsi-detail").innerHTML = $(this).data('deskripsi');
        }
    }

    //script modal dinamis edit
    function edit(id, nama, no_hp, address, deskripsi) {
        $('#kode-edit').val(id);
        $('#nama-edit').val(nama);
        $('#notelp-edit').val(no_hp);
        $('#address-edit').val(address);

    }

    //script hapus modal
    function hapus(id) {
        $('#kode-hapus').val(id);
    }
</script>