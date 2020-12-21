<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Penjualan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">Transaksi</a>
                        </li>
                        <li class="breadcrumb-item">
                            Penjualan
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Container Fluid End -->
    </div>
    <!-- Content Header (Page Header) End -->

    <!-- Main Content -->
    <section class="main-content">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <!-- Row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card Header -->
                        <div class="card-header">
                            <h4 class="text-dark m-0">Kasir</h4>
                        </div>
                        <!-- Card Header End -->
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form action="" method="post" id="formKasir">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-12">
                                        <div class="form-group">
                                            <label for="kode_transaksi">Kode Transaksi</label>
                                            <?php
                                            // Mengambil data terakhir dalam database
                                            $data = $this->kasir->getLastId();
                                            // Memeriksa apakah ada kode yang di dapat dari database
                                            if ($data->num_rows() > 0) {
                                                // Jika ada kode yang didapat dari database
                                                $kode = $data->row_array();
                                                $kode = $this->hookdevlib->autonumber($kode['kode_transaksi'], 3, 9);
                                            } else {
                                                // Jika tidak ada kode yang didapat dari database
                                                $kode = "TRS000000001";
                                            }
                                            ?>
                                            <input type="text" name="kode_transaksi" id="kode_transaksi" value="<?= $kode; ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="form-group">
                                            <label for="tgl_transaksi">Tanggal Transaksi</label>
                                            <input type="text" name="tgl_transaksi" id="tgl_transaksi" value="<?= date('d/m/Y'); ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="form-group">
                                            <label for="kasir">Nama Kasir Bertugas</label>
                                            <input type="text" name="kasir" data-id="<?= $kasir['kode_user']; ?>" value="<?= $kasir['nama']; ?>" id="kasir" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="form-group">
                                            <label for="pelanggan">Nama Pelanggan</label>
                                            <div class="input-group">
                                                <input type="text" name="pelanggan" id="pelanggan" class="form-control" readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-fw fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row End -->
                            </form>
                            <!-- Form End -->
                        </div>
                        <!-- Card Body End -->
                    </div>
                    <!-- Card End -->
                </div>
            </div>
            <!-- Row End -->
            <!-- Row -->
            <div class="row">
                <!-- Column Barang -->
                <div class="col-lg-8 col-md-12">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- 1st Row -->
                            <div class="row">
                                <!-- Card Title -->
                                <div class="col-sm-6">
                                    <h4 class="m-0 text-dark">Daftar Barang</h4>
                                </div>
                                <!-- Card Title End -->
                                <!-- Search Bar -->
                                <div class="col-sm-6">
                                    <form action="" method="post" id="formCariBarang">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="cari_barang" id="cari_barang" class="form-control" placeholder="Cari barang...">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary" name="btn_cari">
                                                        <i class="fas fa-fw fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Search Bar End -->
                            </div>
                            <!-- 1st Row End -->
                            <!-- 2nd Row (Barang / Produk) -->
                            <div class="row mt-2" id="rowBarang">
                                <!-- Looping Dari Database -->
                                <!-- Looping Dari Database End -->
                            </div>
                            <!-- 2nd Row (Barang / Produk) End -->
                            <!-- 3rd Row (Pagination) -->
                            <div class="row d-flex justify-content-center mt-3" id="rowPagination">
                            </div>
                            <!-- 3rd Row (Pagination) End -->
                        </div>
                        <!-- Card Body End -->
                    </div>
                    <!-- Card End -->
                </div>
                <!-- Column Barang End -->
                <!-- Column Kalkulator -->
                <div class="col-lg-4 col-md-12">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- 1st Row -->
                            <div class="row my-2">
                                <!-- Card Title -->
                                <div class="col-md-12">
                                    <h4 class="m-0 text-dark">Keranjang Belanja</h4>
                                </div>
                                <!-- Card Title End -->
                            </div>
                            <!-- 1st Row End -->
                            <!-- 2nd Row (List Group Belanjaan) -->
                            <div class="row my-2">
                                <div class="col-md-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <!-- Item Row -->
                                            <div class="row itemRow">
                                                <div class="col-sm-9">
                                                    <p class="my-0 item-text">Kopi Espresso</p>
                                                    <small>Jumlah: <span class="item-qty">0</span></small>
                                                    <br>
                                                    <small class="text-success">Harga per Unit : <span class="item-price">Rp.15.000,00</span></small>
                                                    <br>
                                                    <small>Harga Total : <span class="total-price-item">Rp. 15.000,00</span></small>
                                                </div>
                                                <div class="col-sm-3 d-flex align-items-center">
                                                    <a href="javascript:void(0)" class="btn btn-xs btn-success rounded mx-1 my-auto add_qty">
                                                        <i class="fas fa-fw fa-plus align-middle"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-xs btn-danger rounded mx-1 my-auto remove_qty">
                                                        <i class="fas fa-fw fa-minus align-middle"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Item Row End -->
                                        </li>
                                        <li class="list-group-item">
                                            <!-- Item Row -->
                                            <div class="row itemRow">
                                                <div class="col-sm-9">
                                                    <p class="my-0 item-text">Kopi Espresso</p>
                                                    <small>Jumlah: <span class="item-qty">0</span></small>
                                                    <br>
                                                    <small class="text-success">Harga per Unit : <span class="item-price">Rp.15.000,00</span></small>
                                                    <br>
                                                    <small>Harga Total : <span class="total-price-item">Rp. 15.000,00</span></small>
                                                </div>
                                                <div class="col-sm-3 d-flex align-items-center">
                                                    <a href="javascript:void(0)" class="btn btn-xs btn-success rounded mx-1 my-auto add_qty">
                                                        <i class="fas fa-fw fa-plus align-middle"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-xs btn-danger rounded mx-1 my-auto remove_qty">
                                                        <i class="fas fa-fw fa-minus align-middle"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Item Row End -->
                                        </li>
                                        <li class="list-group-item">
                                            <!-- Item Row -->
                                            <div class="row itemRow">
                                                <div class="col-sm-9">
                                                    <p class="my-0 item-text">Kopi Espresso</p>
                                                    <small>Jumlah: <span class="item-qty">0</span></small>
                                                    <br>
                                                    <small class="text-success">Harga per Unit : <span class="item-price">Rp.15.000,00</span></small>
                                                    <br>
                                                    <small>Harga Total : <span class="total-price-item">Rp. 15.000,00</span></small>
                                                </div>
                                                <div class="col-sm-3 d-flex align-items-center">
                                                    <a href="javascript:void(0)" class="btn btn-xs btn-success rounded mx-1 my-auto add_qty">
                                                        <i class="fas fa-fw fa-plus align-middle"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-xs btn-danger rounded mx-1 my-auto remove_qty">
                                                        <i class="fas fa-fw fa-minus align-middle"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Item Row End -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 2nd Row (List Group Belanjaan) End -->
                            <!-- 3rd Row (Total Belanja, Diskon, Grand Total) -->
                            <div class="row my-2">
                                <!-- 1st Row (Total Belanja) -->
                                <div class="col-12 my-1">
                                    <div class="row px-2">
                                        <div class="col-5 d-flex">
                                            <h4 class="text-dark mx-auto my-auto">Total Belanja :</h4>
                                        </div>
                                        <div class="col-7 d-flex">
                                            <h4 class="text-dark mx-auto total-belanja-transaksi my-auto">Rp. 350.000,00</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- 1st Row (Total Belanja) End -->
                                <!-- 2nd Row (Diskon Belanja) -->
                                <div class="col-12 my-1">
                                    <div class="row px-2">
                                        <div class="col-5 d-flex">
                                            <h4 class="text-dark mx-auto my-auto">Diskon Belanja :</h4>
                                        </div>
                                        <div class="col-7 d-flex">
                                            <h4 class="text-dark mx-auto diskon-belanja-transaksi my-auto">Rp. 15.000,00</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd Row (Diskon Belanja) End -->
                                <!-- 3rd Row (Grand Total) -->
                                <div class="col-12 my-1">
                                    <div class="row px-2">
                                        <div class="col-5 d-flex">
                                            <h4 class="text-dark mx-auto my-auto">Grand Total :</h4>
                                        </div>
                                        <div class="col-7 d-flex">
                                            <h4 class="text-dark mx-auto grand-total-belanja-transaksi my-auto">Rp. 335.000,00</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- 3rd Row (Grand Total) End -->
                            </div>
                            <!-- 3rd Row (Total Belanja, Diskon, Grand Total) End -->
                            <!-- 4th Row (Tombol Proses Belanja, Tombol Batalkan Belanja) -->
                            <div class="row">
                                <div class="col-12 my-1">
                                    <button class="btn btn-success w-100">
                                        <span class="mr-3">Proses Transaksi</span><i class="fas fa-fw fa-paper-plane"></i>
                                    </button>
                                </div>
                                <div class="col-12 my-1">
                                    <button class="btn btn-danger w-100">
                                        <span class="mr-2">Batalkan Transaksi</span><i class="fas fa-fw fa-ban"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- 4th Row (Tombol Proses Belanja, Tombol Batalkan Belanja) End -->
                        </div>
                        <!-- Card Body End -->
                    </div>
                    <!-- Card End -->
                </div>
                <!-- Column Kalkulator End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container Fluid End -->
    </section>
    <!-- Main Content End -->
</div>
<!-- Content Wrapper End -->

<!-- Modal Pilih Pelanggan -->
<div class="modal fade" id="formPilihPelanggan">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Daftar Pelanggan</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">

            </div>
            <!-- Modal Body End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog End -->
</div>
<!-- Modal Pilih Pelanggan End -->