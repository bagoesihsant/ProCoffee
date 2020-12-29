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
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item">Stock Out</li>
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
                            <h4 class="m-0">Tabel Stock Out</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= base_url('kasir/ItemOut') ?>" class="btn btn-sm btn-info float-right">
                                <i class="fas fa-fw fa-plus"></i>
                                <span>Tambah</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <!-- Data Table -->
                    <table id="dataTableMenu" class="table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Barcode</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Data Example -->
                            <?php $no = 1;
                            foreach ($row as $rw => $data) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->barcode; ?></td>
                                    <td><?= $data->nama; ?></td>
                                    <td><?= $data->qty; ?></td>
                                    <td class="d-flex justify-content-around">
                                        <a href="" data-toggle="modal" data-target="#detailModal" class="btn btn-xs btn-info" onClick="detail(
                                            '<?= $data->barcode ?>',
                                            '<?= $data->nama ?>',
                                            '<?= $data->detail ?>',
                                            '<?= $data->qty ?>',
                                            '<?= date("d-m-Y", $data->date) ?>'
                                            )">
                                            <i class="fas fa-fw fa-eye "></i>
                                        </a>
                                        <a href="#modalDelete" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('kasir/StockOut/delete/' . $data->kode_stock . '/' . $data->kode_barang) ?>')" data-toggle="modal" data-target="" class="btn btn-xs btn-danger btnDeleteUnits">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- Data Table End -->
                </div>
                <!-- Card Body End -->
            </div>
            <!-- Card End -->
        </div>
</div>
</section>
<!-- Main Content End -->

<!-- modal detail -->
<div class="modal fade" id="detailModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Stock Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive" id="modal-tampil">
                <div class="form-group">
                    <label for="barcode">Barcode</label>
                    <input type="text" name="barcode" id="barcode-detail" class="form-control" readonly>
                </div>
                <div class="form-grou">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama" id="nama-detail" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="pembelian">Detail Keluar</label>
                    <input type="text" name="detail" id="pembelian-detail" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="qty">Date</label>
                    <input type="text" name="qty" id="qty-detail" class="form-control" readonly>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- penutup modal detail -->

<!-- Modal delete -->
<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fa fa-exclamation-triangle text-danger fa-7x mb-3 mt-2"></i> <br>
                <h3 class="text-center font-weight-bold">Hapus Data</h3>
                <h5 class="font-weight-light">Apa anda yakin ingin menghapus data ini?</h5>
                <form action="" id="formDelete" method="POST">
                    <button class="btn btn-default mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger ml-2" id="btnTambahCategories" name="tambah">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal delete End -->