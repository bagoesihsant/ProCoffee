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
                                <th>Bardcode</th>
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
                            $no=1;
                                foreach($produk as $pro){
                            ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$pro->barcode?></td>
                                <td><?=$pro->name?></td>
                                <td><?=$pro->harga?></td>
                                <td class="text-center"><img src="<?= base_url('assets/items_img/').$pro->gambar ?>" 
                                    alt="Gambar tidak ditemukan" width="100"></td>
                                <td class="d-flex justify-content-center">
                                        <a href="" class="btn btn-primary btn-xs mx-auto btn-view-menu" data-toggle="modal" data-target="#detailModal"
                                        onClick="detail(
                                            '<?=$pro->kode_barang?>',
                                            '<?=$pro->nama_barang?>',
                                            '<?=$pro->nama_kategori?>',
                                            '<?=$pro->nama_satuan?>',
                                            '<?=$pro->harga?>',
                                            '<?=$pro->berat?>',
                                            '<?=$pro->deskripsi?>',
                                            '<?=$pro->stok?>',
                                            '<?=$pro->gambar?>'
                                        )"
                                        >
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        <a href="<?=base_url('C_admin/hapus_items/').$pro->kode_barang?>" class="btn btn-danger btn-xs mx-auto btn-delete-menu">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                        <a href=""  class="btn btn-warning btn-xs mx-auto btn-edit-menu" data-toggle="modal" data-target="#editModal"
                                        onClick="edit(
                                            '<?=$pro->kode_barang?>',
                                            '<?=$pro->name?>',
                                            '<?=$pro->nama_kategori?>',
                                            '<?=$pro->nama_satuan?>',
                                            '<?=$pro->harga?>',
                                            '<?=$pro->berat?>',
                                            '<?=$pro->deskripsi?>',
                                            '<?=$pro->stok?>',
                                            '<?=$pro->gambar?>'
                                        )"
                                        >
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
                    $kode = $this->menu->kode_items();

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
                <form action="<?= base_url('C_admin/tambah_items') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kode">Kode Items</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="<?=$kode?>" readonly>
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
                        <select class="form-control" name="kategori" required>
                            <?php foreach($kategori as $kat){ ?>
                                <option value="<?=$kat->kode_kategori?>"> 
                                    <?=$kat->nama?>
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
                            <?php foreach($satuan as $sat){ ?>
                                <option value="<?=$sat->kode_satuan?>"> 
                                    <?=$sat->nama?>
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
                    </div>
                    <div class="form-group">
                        <label for="berat">
                            Berat/gram
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="berat" id="berat" class="form-control"  onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">
                            Deskripsi
                            <sup class="text-danger">*</sup>
                        </label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" required></textarea>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambar" id="gambar" aria-describedby="inputGroupFileAddon01" required>
                        <label class="custom-file-label" for="gambar">Gambar/Foto Barang</label>
                            <p>
                                <sup class="text-danger">*</sup>
                                gambar yang di upload harus berekstensi jpg/jpeg/png
                            </p>
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
                    <input type="text" name="kode" id="kode-detail" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">
                        Nama Items
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="nama" id="nama-detail" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="kategori">
                        Kategori Items
                        <sup class="text-danger">*</sup>
                    </label>
                    <input type="text" name="kategori" id="kategori-detail" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="unit">
                            Unit Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="unit" id="unit-detail" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="harga">
                            Harga
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="harga" id="harga-detail" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="berat">
                            Berat
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="berat" id="berat-detail" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="stok">
                            Stok
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="stok" id="stok-detail" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">
                            Deskripsi
                        </label>
                        <textarea class="form-control" id="deskripsi-detail" rows="3" readonly></textarea>
                    </div>
                    <div class="form-group text-center">
                        <td><img style="width:300px; height:300px" src="" alt="" id="gambar-detail"></td>
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
                <form action="<?=base_url('C_admin/edit_items')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kode">Kode Items</label>
                        <input type="text" name="kode" id="kode-edit" class="form-control" readonly >
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" id="nama-edit" class="form-control" value="Kopi Hijau">
                    </div>
                    <div class="form-group">
                        <label for="kategori">
                            Kategori Items
                            <sup class="text-danger">*</sup>
                        </label>
                            <select class="form-control" name="kategori" required>
                                <?php foreach($kategori as $kat){ ?>
                                    <option value="<?=$kat->kode_kategori?>"> 
                                        <?=$kat->nama?>
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
                                <?php foreach($satuan as $sat){ ?>
                                    <option value="<?=$sat->kode_satuan?>"> 
                                        <?=$sat->nama?>
                                    </option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">
                            Harga
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="harga" id="harga-edit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="berat">
                            Berat
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="berat" id="berat-edit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">
                            Deskripsi
                            <sup class="text-danger">*</sup>
                        </label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi-edit" rows="3" required></textarea>
                    </div>
                    <div class="form-group text-center">
                        <td><img src="" alt="" id="gambar-edit" style="width:300px; height:300px"></td>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambar" id="gambar" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="gambar_upload">Ubah Foto/Gambar</label>
                    </div>
                        <div class="custom-control custom-checkbox text-center">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="ganti">
                            <label class="custom-control-label text-secondary" for="customCheck1">Ganti Gambar? (ekstensi gambar harus jpg/jpeg/png)</label>
                        </div>
                    <input type="text" name="gambar_old" id="gambar-old-edit" class="form-control" hidden>
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

<script>
    // script validasi hanya angka
    function hanyaAngka(event) 
    {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }

    //function modal detail
    function detail(kode,nama,kategori,unit,harga,berat,deskripsi,stok,gambar)
    {
        var x = document.getElementById("gambar-detail");

        $('#kode-detail').val(kode);
        $('#nama-detail').val(nama);
        $('#kategori-detail').val(kategori);
        $('#unit-detail').val(unit);
        $('#harga-detail').val(harga);
        $('#berat-detail').val(berat);
        $('#stok-detail').val(stok);
        $('#deskripsi-detail').val(deskripsi);
        // $('#gambar').innerhtml('<img src="<?= base_url()."assets/dist/img/kopi1.jpg" ?>" width="300">');
        // document.getElemenById('gambar2').innerhtml = kode;

        // var image=new Image(300, 300);
        x.src='<?= base_url('assets/items_img/')?>'+ gambar;
        // x.appendChild(image);


    }

    // function modal edit
    function edit(kode,nama,kategori,unit,harga,berat,deskripsi,stok,gambar)
    {
        var y = document.getElementById("gambar-edit");

        $('#kode-edit').val(kode);
        $('#nama-edit').val(nama);
        $('#kategori-edit').val(kategori);
        $('#unit-edit').val(unit);
        $('#harga-edit').val(harga);
        $('#berat-edit').val(berat);
        $('#stok-edit').val(stok);
        $('#deskripsi-edit').val(deskripsi);
        $('#gambar-old-edit').val(gambar);
        // $('#gambar').innerhtml('<img src="<?= base_url()."assets/dist/img/kopi1.jpg" ?>" width="300">');
        // document.getElemenById('gambar2').innerhtml = kode;

        // var image=new Image(300, 300);
        y.src='<?= base_url('assets/items_img/')?>'+ gambar;
        // x.appendChild(image);
    }

</script>