    <?php
        function rupiah($angka){
            $hasil_rupiah = number_format($angka,0,',','.');
            return $hasil_rupiah;
        }
    ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Laporan</h1>
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
                <!-- Card Header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="m-0">Detail Laporan</h4>
                        </div>
                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Data Table -->
                    <?php foreach($transaksi as $t){ ?>
                            <div class="form-group">
                                <label for="kode">Kode Transaksi</label>
                                <p class="border pt-1 pb-1 pl-1" ><?=$t->kode_transaksi?></p>
                            </div>
                        <table width="100%" class="table">
                        
                                <tr>
                                    <td width="50%">
                                            <div class="form-group">
                                                <label for="nama">
                                                    Nama Pembeli
                                                </label>
                                                <p class="border pt-1 pb-1 pl-1" ><?=$t->nama?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="barcode">
                                                    Invoice
                                                </label>
                                                <p class="border pt-1 pb-1 pl-1" ><?=$t->invoice?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">
                                                    Sub Harga
                                                </label>
                                                <p class="border pt-1 pb-1 pl-1" ><?=rupiah($t->total_price)?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="berat">
                                                    Diskon
                                                </label>
                                                <p class="border pt-1 pb-1 pl-1" ><?=rupiah($t->discount)?></p>
                                            </div>
                                    </td>

                                    <td width="50%">
                                            <div class="form-group">
                                                <label for="berat">
                                                    Harga
                                                </label>
                                                <p class="border pt-1 pb-1 pl-1" ><?=rupiah($t->final_price)?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="berat">
                                                    Pembayaran
                                                </label>
                                                <p class="border pt-1 pb-1 pl-1" ><?=rupiah($t->cash)?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="berat">
                                                    Kembalian
                                                </label>
                                                <p class="border pt-1 pb-1 pl-1" ><?=rupiah($t->remaining)?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="berat">
                                                    Catatan
                                                </label>
                                                <textarea readonly><?=$t->note?></textarea>
                                            </div>
                                    </td>
                                </tr>


                            <table class="table table-success" id="dataTableLaporan">
                                <tr>
                                    <th style="text-align: center" >Nama Barang</th>
                                    <th style="text-align: center" >Qty</th>
                                    <th style="text-align: right;">Harga</th>
                                    <th style="text-align: right;">Disc</th>
                                    <th style="text-align: right;">Subtotal</th>
                                </tr>
                                <?php foreach($dtl_transaksi as $d){ ?>
                                <tr>
                                    <td align="center"><?=$d->nama?></td>
                                    <td align="center"><?=$d->qty?></td>
                                    <td align="right"><?=rupiah($d->price)?></td>
                                    <td align="right"><?=rupiah($d->discount_item)?></td>
                                    <td align="right"><?=rupiah($d->total)?></td>
                                </tr>
                                    <?php } ?>
                            </table>

                            <div class="col-sm-6 float-center   text-right mt-3">
                                <a href="<?= base_url('laporan/kasir') ?>" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-chevron-left"></i>
                                    <span>Kembali</span>
                                </a>

                                <a href="<?=base_url('laporan/cetak_laporan/').$t->kode_transaksi ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-print"></i>
                                    <span>Cetak  </span>
                                </a>
                            </div>
                            <?php } ?>
                </div>


                <!-- Card Body End -->
            </div>
            <!-- Card End -->
        </div>
    </section>
    <!-- Main Content End -->

</div>
<!-- Content Wrapper End -->
