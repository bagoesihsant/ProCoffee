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
                        <li class="breadcrumb-item">Laporan</li>
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
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Data Table -->
                    <table id="dataTableLaporan" class="table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Transaksi</th>
                                <th>Pembeli</th>
                                <th>Invoice</th>
                                <th>harga Total</th>
                                <th>Dibayar</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Data -->
                            <?php
                            $no = 1;
                            foreach ($laporan as $lap) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?=$lap->kode_transaksi?> </td>
                                    <td><?=$lap->nama?> </td>
                                    <td><?=$lap->invoice?> </td>
                                    <td><?=$lap->total_price?> </td>
                                    <td><?=$lap->cash?> </td>
                                    <td class="text-center">
                                        <!-- btn detail  -->
                                        <a href="<?=base_url('laporan/detail_laporan/').$lap->kode_transaksi ?>" class="btn btn-info btn-xs mx-auto ml-1 mr-1">
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        <!-- btn hapus  -->
                                        <a href="#!" onclick="return deleteLaporan('<?=base_url('laporan/hapus_laporan/').$lap->kode_transaksi ?>')" class="btn btn-danger btn-xs mx-auto">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                        <br>
                                        <!-- btn cetak  -->
                                        <a href="<?=base_url('laporan/cetak_laporan/').$lap->kode_transaksi ?>" class="btn btn-light mx-auto mt-2">
                                            <i class="fas fa-print"></i> Cetak
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
                                <th>Kode Transaksi</th>
                                <th>Pembeli</th>
                                <th>Invoice</th>
                                <th>harga Total</th>
                                <th>Dibayar</th>
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

<!-- modal hapus -->
<div class="modal fade" id="hapusLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
