<div class="content-wrapper">
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text dark">Daftar Stock In</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="m-0 text-dark">Tabel Stock In</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= base_url('kasir/ItemIn'); ?>" class="btn btn-primary btn-sm float-right">
                                <i class="fas fa-fw fa-plus"></i>
                                <span>Tambah</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Table Sub Menu -->
                    <table id="dataTableStock" class="table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barcode</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- TBody -->
                        <tbody>
                            <?php $no = 1;
                            foreach ($row as $rw => $data) { ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= $data->barcode; ?></td>
                                    <td><?= $data->nama_barang; ?></td>
                                    <td><?= $data->qty; ?></td>
                                    <td><?= $data->date; ?></td>
                                    <td class="d-flex justify-content-around">
                                        <a href="#" id="#modalDetail" data-toogle="modal" data-target="#modalDetail" class="btn btn-xs btn-info btn-view">
                                            <i class="fas fa-fw fa-eye text-white"></i>
                                        </a>
                                        <a href="#" data-toogle="modal" data-target="" data-kode="<?= base_url('kasir/C_stockin/delete'); ?>" class="btn btn-xs btn-danger btn-delete">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <!-- TBody End -->
                    </table>
                </div>
                <!-- Card Body End -->
            </div>
            <!-- Card End -->
        </div>
    </section>
    <!-- Content Main End -->
    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title table-responsive">Stock Detail</h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table class table-bordered mo-margin">
                        <tbody>
                            <tr>
                                <th>Barcode</th>
                                <td><span id="barcode"></span></td>
                            </tr>
                            <tr>
                                <th>Nama Barang</th>
                                <td><span id="nama_barang"></span></td>
                            </tr>
                            <tr>
                                <th>Detail Pembelian</th>
                                <td><span id="detail"></span></td>
                            </tr>
                            <tr>
                                <th>Nama Supplier</th>
                                <td><span id="supplier_name"></span></td>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <td><span id="qty"></span></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><span id="date"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>