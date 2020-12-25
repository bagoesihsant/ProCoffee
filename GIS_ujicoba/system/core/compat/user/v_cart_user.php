<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- breadcrumb-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
                        </ol>
                    </nav>
                </div>
                <div id="basket" class="col-lg-9">
                    <div class="box">
                        <form method="post" action="checkout1.html">
                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have 3 item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th colspan="2">Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#"><img src="<?= base_url('assets/vendor_user/img/') ?>kopio.jpeg" alt="White Blouse Armani"></a></td>
                                            <td><a href="#">Kopi Original</a></td>
                                            <td>
                                                <input type="number" value="1" class="form-control">
                                            </td>
                                            <td>Rp. 45.000</td>
                                            <td>Rp. 45.000</td>
                                            <td colspan="2"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">Rp. 45.000</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="street">Alamat Kirim</label>
                                    <textarea class="form-control" name="" id="" cols="" rows="" placeholder="Mohon di isi dengan alamat yang benar"></textarea>
                                </div>
                            </div>
                            <!-- /.table-responsive-->
                            <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                                <div class="left"><a href="category.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Belanja Lagi</a></div>
                                <div class="right">
                                    <!-- <button class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Update cart</button> -->
                                    <!-- <button type="submit" class="btn btn-primary">Proses checkout <i class="fa fa-chevron-right"></i></button> -->
                                    <a href="<?= base_url('User/History'); ?>" class="btn btn-primary">Proses checkout <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-->

                </div>
                <!-- /.col-lg-9-->
                <div class="col-lg-3">
                    <div id="order-summary" class="box">
                        <div class="box-header">
                            <h3 class="mb-0">Pembeli</h3>
                        </div>
                        <p class="text-danger">Peringatan Mohon untuk Alamat di isi dengan benar, karena kami tidak akan bertanggung jawab apa bila alamat shipping yang di isi adalah palsu </p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>Rp. 45.000</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-3-->
            </div>
        </div>
    </div>
</div>