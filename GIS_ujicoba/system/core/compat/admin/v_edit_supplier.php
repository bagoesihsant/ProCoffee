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

                    <form method="post" action="<?=base_url('supplier/edit_supplier_aksi')?>">
                        <?php foreach($edit as $e) { ?>
                        
                            <div class="form-group">
                                <label for="kode">Kode Supplier</label>
                                <input type="text" name="kode" class="form-control" value="<?= $e->kode_supplier ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">
                                    Nama Supplier
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="text" name="nama" class="form-control" value="<?= $e->nama ?>" required>
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="notelp">
                                    No. Telpon / HP
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="text" name="notelp" class="form-control" value="<?= $e->no_hp ?>"
                                onkeypress="return hanyaAngka(event)" minlength="11" required>
                                <?= form_error('notelp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">
                                    Alamat
                                    <sup class="text-danger">*</sup>
                                </label>
                                <textarea name="alamat" class="form-control" required><?= $e->alamat ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                            </div>

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
                        
                        <!-- tombol -->
                        <p class="text-danger text-form text-sm">Semua yang bertanda * wajib diisi</p>
                        
                            <div class="col-sm-6 float-right text-right mt-3">
                                <a href="<?=base_url('supplier')?>" class="btn btn-sm btn-secondary">
                                <i class="fas fa-chevron-left"></i>
                                    <span>Kembali</span>
                                </a>

                                <button type="submit" class="btn btn-sm btn-info">
                                <i class="fas fa-save"></i>
                                    <span>Simpan</span>
                                </button>
                            </div>
                        <!-- tombol -->
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
