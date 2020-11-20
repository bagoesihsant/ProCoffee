<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Stock Out</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Stock Out
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Container Fluid End -->
    </div>
    <!-- Content Header ( Page Header ) End -->

    <!-- Content Main -->
    <section class="content-main">
        <!-- Container Fluid -->

        <div class="container-fluid">
            <!-- Card -->

            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <div class="float-right">
                        <a href="<?= site_url('kasir/stock_out_data') ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-arrow-circle-left"></i> Back
                        </a>
                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <h4 class="m-0 text-dark">Tabel Stock Out</h4>
                        </div>

                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Table Sub Menu -->

                    <!-- <div class="col-md-4 col-md-offset-4"> -->
                    <div class="col-md">

                        <form action="<?= site_url('stock/process') ?>" method="post">
                            <div class="form-group">
                                <p>Tanda <b>*</b> Artinya Wajib Di isi</p>
                                <label for="">Tanggal *</label>
                                <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" required>
                            </div>
                            <div>
                                <label for="barcode">Barcode *</label>
                            </div>
                            <div class="form-group input-group">
                                <input type="hidden" name="kode_barang_input" id="kode_barang_input">
                                <input type="text" name="barcode_input" id="barcode_input" class="form-control" required autofocus>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Nama barang *</label>
                                <input type="text" name="item_name" id="item_name" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="unit_name">Unit Barang</label>
                                        <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="stock">stock awal</label>
                                        <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Detail *</label>
                                <input type="text" name="detail" class="form-control" placeholder="Rusak / Kadaluarsa / Dll" required>
                            </div>
                            <div class="form-group">
                                <label for="">Qty *</label>
                                <input type="number" name="qty" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="out_add" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                <button type="reset" class="btn btn-flat"><i class="fa fa-undo"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                    <!-- Table Sub Menu End -->
                </div>
                <!-- Card Body End -->
            </div>
            <!-- Card End -->
        </div>
        <!-- Container Fluid End -->
    </section>
    <!-- Content Main End -->

</div>
<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Categories</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <?= form_open_multipart('admin/C_kategori/addDataCategories'); ?>
                <table class="table table-bordered table-striped" id="dataTableMenu">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- membuat perulangan dari variable itemyang ada di Stock.php di folder Controller dan lalu di buat kondisi loopingnya -->

                        <tr>
                            <!-- barcode ini sesuai dengan field di database atau sesuai dengan query database -->
                            <td>KBR000001</td>
                            <td>kopi</td>
                            <!-- unit name ini adalah alias dari name unit di file item_m.php di dalam folder model di baris code ke 11 -->
                            <td>Lusin</td>
                            <td class="text-right">Rp. 100000</td>
                            <td class="text-right">1</td>
                            <td class="text-right">
                                <button class="btn btn-xs btn-info" id="select">
                                    <i class="fa fa-check"></i> Pilih
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="btnTambahCategories" name="tambah">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>