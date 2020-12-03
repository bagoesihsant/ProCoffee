<!-- content wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Stock In</h1>
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
    <section class="main-content">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <!-- Card -->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="m-0">Tabel Stock In</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= base_url('kasir/ItemIn'); ?>" class="btn btn-sm btn-primary float-right">
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
                    <!-- Table Sub Menu -->
                    <table id="dataTableMenu" class="table table-bordered table-striped">
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
                            foreach ($row as $rw => $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->barcode; ?></td>
                                    <td><?= $data->nama_barang; ?></td>
                                    <td><?= $data->qty; ?></td>
                                    <td><?= date("d-m-Y", $data->date); ?></td>
                                    <td class="d-flex justify-content-around">
                                        <a href="" data-toggle="modal" data-target="#detailModal" class="btn btn-xs btn-info" onClick="detail(
                                            '<?= $data->barcode ?>',
                                            '<?= $data->nama_barang ?>',
                                            '<?= $data->detail ?>',
                                            '<?= $data->nama_supplier ?>',
                                            '<?= $data->qty ?>',
                                            '<?= date("d-m-Y", $data->date) ?>'
                                            )">
                                            <i class="fas fa-fw fa-eye "></i> Detail
                                        </a>
                                        <a href="#modalDelete" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('kasir/C_stockin/delete_in/' . $data->kode_stock . '/' . $data->kode_barang) ?>')" data-toggle="modal" data-target="" class="btn btn-xs btn-danger btnDeleteUnits">
                                            <i class="fas fa-fw fa-trash-alt"></i> Hapus
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
</div>
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
                    <label for="pembelian">Detail Pembelian</label>
                    <input type="text" name="detail" id="pembelian-detail" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="supplier">Nama Suppplier</label>
                    <input type="text" name="supplier" id="supplier-detail" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="text" name="qty" id="qty-detail" class="form-control" readonly>
                </div>
                <div class="form">
                    <label for="date">Date</label>
                    <input type="text" name="date" id="date-detail" class="form-control" readonly>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of modal detail -->

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fa fa-exclamation-triangle text-danger fa-7x mb-3 mt-2"></i> <br>
                <h3 class="text-center font-wieght-bold">Hapus Data</h3>
                <h5 class="font-weight-light">Apakah anda yakin ingin menghapus data ini?</h5>
                <form action="" id="formDelete" method="POST">
                    <button class="btn btn-default mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger ml-2" id="btnTambahCategories" name="tambah">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

</script>