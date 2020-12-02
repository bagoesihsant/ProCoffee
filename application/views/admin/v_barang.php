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
                    <table id="dataTableItems" class="table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="180">Bardcode</th>
                                <th>Nama Item</th>
                                <th>Harga Barang</th>
                                <th>Gambar Barang</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Data -->
                            <?php
                            $no = 1;
                            foreach ($produk as $pro) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <?= $pro->barcode ?>
                                        <br>
                                        <a href="<?= base_url("admin/C_barang/generate_barang/") .$pro->kode_barang ?>" 
                                            class="btn btn-sm btn-outline-secondary">
                                            Generate
                                            <i class="fas fa-barcode pl-2"></i>
                                            <i class="fas fa-qrcode pl-2"></i>
                                        </a>
                                        
                                    </td>
                                    <td><?= $pro->nama_barang ?></td>
                                    <td><?= $pro->harga ?></td>
                                    <td class="text-center"><img src="<?= base_url('assets/items_img/') .$pro->gambar?>" alt="Gambar tidak ditemukan" width="100"></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="" class="btn btn-primary btn-xs mx-auto" data-toggle="modal" data-target="#detailModal" onClick="detail(
                                            '<?= $pro->kode_barang ?>',
                                            '<?= $pro->nama_barang ?>',
                                            '<?= $pro->nama_kategori ?>',
                                            '<?= $pro->nama_satuan ?>',
                                            '<?= $pro->harga ?>',
                                            '<?= $pro->berat ?>',
                                            '<?= $pro->stok ?>',
                                            '<?= $pro->deskripsi ?>',
                                            '<?= $pro->gambar ?>'
                                        )">
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        <a href="#!" onclick="return deleteConfirm('<?php echo base_url('admin/C_barang/hapus_items/') .$pro->kode_barang ?>')"
                                            class="btn btn-danger btn-xs mx-auto">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>

                                        <a href="<?= base_url("admin/C_barang/edit_barang/") .$pro->kode_barang ?>" class="btn btn-xs btn-warning">
                                            <i class="fas fa-fw fa-edit text-white"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php } ?>
                            <!-- Data End -->
                        </tbody>
                        <!-- Tbody End -->
                        <!-- Tfoot -->
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Bardcode</th>
                                <th>Nama Item</th>
                                <th>Harga Barang</th>
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
            <?php
            $kode = $this->barang->kode_items();

            if ($kode->num_rows() > 0) {
                // Jika ditemukan id
                $kode = $kode->row_array();
                $kode = $this->hookdevlib->autonumber($kode['kode_barang'], 2, 10);
            } else {
                // Jika tidak ditemukan id
                $kode = "BR0000000001";
            }
            ?>
            <div class="modal-body">
                <form action="<?= base_url('admin/C_barang/tambah_items') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kode">Kode Items</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="<?= $kode ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Barcode
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="barcode" id="barcode" class="form-control" required>
                        <?= form_error('barcode', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kategori">
                            Kategori Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <select class="form-control" name="kategori" required>
                            <?php foreach ($kategori as $kat) { ?>
                                <option value="<?= $kat->kode_kategori ?>">
                                    <?= $kat->nama ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unit">
                            Unit Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <select class="form-control" name="unit" required>
                            <?php foreach ($satuan as $sat) { ?>
                                <option value="<?= $sat->kode_satuan ?>">
                                    <?= $sat->nama ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">
                            Harga
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="harga" id="harga" class="form-control" onkeypress="return hanyaAngka(event)" required>
                        <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="berat">
                            Berat/gram
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="berat" id="berat" class="form-control" onkeypress="return hanyaAngka(event)" required>
                        <?= form_error('berat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">
                            Deskripsi
                            <sup class="text-danger">*</sup>
                        </label>
                        <textarea class="form-control ckeditor" id="deskripsi" rows="3" name="deskripsi" required></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">
                            Ubah gambar
                            <sup class="text-danger">*</sup>
                        </label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label for="image" class="custom-file-label">ekstensi gambar harus jpg/jpeg/png</label>
                            </div>
                        </div>
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
                    <p id="kode-detail" name="kode" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="nama">
                        Nama Items
                        <sup class="text-danger">*</sup>
                    </label>
                    <p id="nama-detail" name="nama" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="kategori">
                        Kategori Items
                        <sup class="text-danger">*</sup>
                    </label>
                    <p id="kategori-detail" name="kategori" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="unit">
                        Unit Items
                        <sup class="text-danger">*</sup>
                    </label>
                    <p id="unit-detail" name="unit" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="harga">
                        Harga
                        <sup class="text-danger">*</sup>
                    </label>
                    <p id="harga-detail" name="harga" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="berat">
                        Berat
                        <sup class="text-danger">*</sup>
                    </label>
                    <p id="berat-detail" name="berat" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="stok">
                        Stok
                        <sup class="text-danger">*</sup>
                    </label>
                    <p id="stok-detail" name="stok" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group">
                    <label for="deskripsi">
                        Deskripsi
                    </label>
                    <p id="deskripsi-detail" name="deskripsi" class="border pl-2 pr-2 pt-2 pb-2 rounded" readonly></p>
                </div>
                <div class="form-group text-center">
                    <td><img style="width:300px" src="" alt="" id="gambar-detail"></td>
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

                    <a class="btn btn-danger mr-1" id="btn-delete">Hapus</a>
                    <button class="btn btn-secondary mt-1" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
<!-- modal hapus end -->

<script>
    // script validasi hanya angka
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }

    //function modal detail
    function detail(kode, nama, kategori, unit, harga, berat, stok, deskripsi, gambar) {
        
        document.getElementById("kode-detail").innerHTML = kode;
        document.getElementById("nama-detail").innerHTML = nama;
        document.getElementById("kategori-detail").innerHTML = kategori;
        document.getElementById("unit-detail").innerHTML = unit;
        document.getElementById("harga-detail").innerHTML = harga;
        document.getElementById("berat-detail").innerHTML = berat;
        document.getElementById("stok-detail").innerHTML = stok;
        document.getElementById("deskripsi-detail").innerHTML = deskripsi;
        document.getElementById("gambar-detail").src = '<?= base_url('assets/items_img/') ?>' + gambar;
    }

    // function modal edit
    function edit(kode, nama, barcode, kategori, unit, harga, berat, deskripsi, stok, gambar) {

        $('#kode-edit').val(kode);
        $('#nama-edit').val(nama);
        $('#barcode-edit').val(barcode);
        $('#kategori-edit').val(kategori);
        $('#unit-edit').val(unit);
        $('#harga-edit').val(harga);
        $('#berat-edit').val(berat);
        $('#stok-edit').val(stok);
        $('#deskripsi-edit').val(deskripsi);
        $('#gambar-old-edit').val(gambar);
        // $('#gambar').innerhtml('<img src="<?= base_url() . "assets/dist/img/kopi1.jpg" ?>" width="300">');
        // document.getElemenById('gambar2').innerhtml = kode;

        var y = document.getElementById("gambar-edit");
        // var image=new Image(300, 300);
        y.src = '<?= base_url('assets/items_img/') ?>' + gambar;
        // x.appendChild(image);
    }

    function deleteConfirm(url){
  $('#btn-delete').attr('href', url);
  $('#hapusModal').modal();
  }
</script>