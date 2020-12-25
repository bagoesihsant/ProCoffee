<div class="content-wrapper">
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Stock In
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Container Fluid End -->
    </div>
    <!-- Content Header (Page Header) End-->

    <!-- Content Main -->
    <section class="content-main">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <!-- Card -->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <div class="float-right">
                        <a href="<?= site_url('kasir/datastockin') ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-arrow-circle-left"></i> Back
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="m-0 text-dark">Tabel Stock In</h4>
                        </div>
                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Table Sub Menu -->
                    <div class="col-md">
                        <form action="<?= site_url('kasir/stockinprocess'); ?>" method="POST">
                            <div class="form-group">
                                <p>Tanda <b>*</b> Artinya Wajib Di isi</p>
                                <label for="">Tanggal * </label>
                                <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Stock In *</label>
                                <?php
                                $data = $this->M_stockin->LastNumberStock();

                                if ($data->num_rows() > 0) {
                                    $kode = $data->row_array();
                                    $kode = $this->hookdevlib->autonumber($kode['kode_stock'], 3, 9);
                                } else {
                                    $kode = "STK000000001";
                                }
                                ?>
                                <input type="text" name="kode_stock_input" id="kode_stock_input" value="<?= $kode; ?>" class="form-control" readonly>
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
                                <label for="">Nama Barang *</label>
                                <input type="text" id="item_name" id="item_name" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="unit_name">Unit Barang</label>
                                        <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="stock">Stock Awal</label>
                                        <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Detail *</label>
                                <input type="text" name="detail" placeholder="Kulakan / Tambahan / Dll" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Supplier</label>
                                <select name="supplier" id="" class="form-control">
                                    <option value="">- Pilih - </option>
                                    <?php foreach ($supplier as $data) {
                                        echo '<option value="' . $data['kode_supplier'] . '">' . $data['nama'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Qty *</label>
                                <input type="number" name="qty_input" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="in_add" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i>Simpan</button>
                                <button type="reset" class="btn btn-flat"><i class="fa fa-undo"></i>Reset</button>
                            </div>
                        </form>
                    </div>
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
                        <?php $no = 1;
                        foreach ($item as $ite => $data) :
                        ?>
                            <tr>
                                <td><?= $data->barcode ?></td>
                                <td><?= $data->nama_barang ?></td>
                                <td><?= $data->nama_satuan ?></td>
                                <td><?= $data->harga ?></td>
                                <td><?= $data->stok ?></td>
                                <td>
                                    <button class="btn btn-xs btn-info" id="pilih" data-kode_barang="<?= $data->kode_barang; ?>" data-barcode="<?= $data->barcode; ?>" data-name="<?= $data->nama_barang; ?>" data-unit="<?= $data->nama_satuan; ?>" data-stock="<?= $data->stok ?>">
                                        <i class="fa fa-check"></i> Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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