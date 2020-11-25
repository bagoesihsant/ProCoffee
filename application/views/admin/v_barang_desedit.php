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

                    <form method="post" action="<?=base_url('admin/C_barang/edit_des_barang')?>">
                        <?php foreach($deskripsi as $d) { ?>
                        
                        <input type="text" name="kode_barang" value="<?=$d->kode_barang?>" hidden>
                        <textarea class="form-control ckeditor" name="deskripsi" cols="30" rows="10" required>
                            <?=$d->deskripsi?>
                        </textarea>
                        
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
