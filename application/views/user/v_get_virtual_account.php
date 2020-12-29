<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- breadcrumb-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">History pembelian</li>
                        </ol>
                    </nav>
                </div>
                <div id="basket" class="col-lg-12">
                    <div class="box">
                        <h1>Invoice : <?= $row->kode_transaksi; ?></h1>
                        <div class="table">
                            <form id="payment-form" method="post" action="<?= site_url() ?>/Users/C_history_pembelian/finish">
                                <input type="hidden" name="result_type" id="result-type" value="">
                                <input type="hidden" name="result_data" id="result-data" value="">
                                <input type="text" name="id_transaksi" id="id_transaksi" value="<?= $row->kode_transaksi; ?>">
                                <div class="row">
                                </div>
                                <!-- /.row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat_input">Alamat<span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="alamat_input" id="alamat_input" cols="" rows="" readonly><?= $row->alamat; ?></textarea>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.row-->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="total_pembayaran">Harga total<span class="text-danger">*</span></label>
                                            <input id="total_pembayaran" name="total_pembayaran" value="<?= $row->total_harga ?>" type="number" class="form-control" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="waktu_transaksi_input">Waktu transaksi<span class="text-danger">*</span></label>
                                            <input id="waktu_transaksi_input" name="waktu_transaksi_input" value="<?= date('d-m-Y') ?>" type="text" class="form-control" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button id="pay-button" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.table-responsive-->
                    </div>
                    <!-- /.box-->
                </div>
                <!-- /.col-lg-9-->

                <!-- /.col-md-3-->
            </div>
        </div>
    </div>