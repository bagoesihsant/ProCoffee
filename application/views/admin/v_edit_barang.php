<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Supplier</h1>
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
                            <h4 class="m-0">Edit Deskripsi</h4>
                        </div>
                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Data Table -->

                    <form method="post" action="<?=base_url('admin/C_barang/edit_barang_aksi')?>">
                        <?php foreach($edit as $e) { ?>
                        
                            <div class="form-group">
                        <label for="kode">Kode Items</label>
                        <input type="text" name="kode" class="form-control" value="<?=$e->kode_barang?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">
                            Nama Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="nama" class="form-control" value="<?=$e->nama?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="barcode">
                            Barcode
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="barcode" class="form-control" value="<?=$e->barcode?>" required>
                        <?= form_error('barcode', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kategori">
                            Kategori Items
                            <sup class="text-danger">*</sup>
                        </label>
                        <select class="form-control" name="kategori" required>
                        <!-- default option  -->
                        <option value="<?= $e->kode_kategori?>">
                                <?=$e->nama_kategori?>
                            </option>
                        <!-- default options end  -->
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
                        <!-- default option  -->
                            <option value="<?= $e->kode_satuan?>">
                                <?=$e->nama_satuan?>
                            </option>
                        <!-- default options end  -->
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
                        <input type="text" name="harga" class="form-control" value="<?=$e->harga?>" required>
                        <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="berat">
                            Berat
                            <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="berat" class="form-control" value="<?=$e->berat?>" required>
                        <?= form_error('berat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group text-center">
                        <td><img src="<?=base_url("assets/items_img/").$e->gambar?>" style="width:300px"></td>
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
                    <!-- gambar lama  -->
                        <input type="text" name="gambar_old" class="form-control" value="<?=$e->gambar?>" hidden>
                    <!-- gambar lama end  -->
                    <div class="form-group">
                        <label for="deskripsi">
                            Deskripsi
                            <sup class="text-danger">*</sup>
                        </label>
                        <textarea class="form-control ckeditor" name="deskripsi" cols="30" rows="10" required>
                            <?=$e->deskripsi?>
                        </textarea>
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <p class="text-danger text-form text-sm">Semua yang bertanda * wajib diisi</p>

                            <div class="col-sm-6 float-right text-right mt-3">
                                <a href="<?=base_url('admin/C_barang')?>" class="btn btn-sm btn-secondary">
                                <i class="fas fa-chevron-left"></i>
                                    <span>Kembali</span>
                                </a>

                                <button type="submit" class="btn btn-sm btn-info">
                                <i class="fas fa-save"></i>
                                    <span>Simpan</span>
                                </button>
                            </div>
                            <?php } ?>
                    </form>
                </div>

                
                <!-- Card Body End -->
            </div>
            <!-- Card End -->
        </div>
    </section>
    <!-- Main Content End -->

</div>
<!-- Content Wrapper End -->
