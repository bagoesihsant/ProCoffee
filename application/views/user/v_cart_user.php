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
                        <form method="post" id="formku">
                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have 3 item(s) in your cart.</p>
                            <?= $this->session->flashdata('message_cart_del'); ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Quantity</th>
                                            <th>Berat Satuan (gram)</th>
                                            <th>Berat Total (Kilogram)</th>
                                            <th>Harga Satuan</th>
                                            <th>Harga Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cart as $data) : ?>
                                            <tr>
                                                <td><a href="#"><img src="<?= base_url('assets/items_img/') . $data['gambar'] ?>" alt="White Blouse Armani"></a></td>
                                                <td><a href="#"><?= $data['nama_barang']; ?></a></td>
                                                <td><?= $data['qty_dibeli'] ?> Unit</td>
                                                <td><?= $data['total_berat'] / $data['qty_dibeli']; ?> Gram</td>
                                                <td><?= $data['total_berat'] / 1000?> KG</td>
                                                <td>Rp. <?= $data['harga']; ?></td>
                                                <td>Rp. <?= $data['harga'] * $data['qty_dibeli']; ?></td>
                                                <td>
                                                    <a href="#modalEdit" data-toggle="modal" onClick="$('#modalEdit #formEdit').attr('action', '<?= base_url('user/cart/edit/'.$data['kode_cart']); ?>')"><i class="fa fa-pencil"></i></a>
                                                    <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('User/Cart/delete/' . $data['kode_cart']); ?>')"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <?php
                                        if($hitung_cart < 1):
                                    ?>
                                    
                                    <div class="alert alert-primary" role="alert">
                                    Barang di keranjang anda masih kosong, silahkan mengisi keranjang terlebih dahulu
                                    <a class="btn btn-success" href="<?= base_url('User/LandingPage'); ?>">Belanja Sekarang!</a>
                                    </div>
                                </table>
                            </div>
                                    <?php  
                                        else:
                                    ?>
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
                                        <button id="pay-button" class="btn btn-primary">Proses checkout <i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>

                                    <?php 
                                        endif; 
                                    ?>
                                
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
                                    <!-- <tr class="total">
                                        <td>Total</td>
                                        <th>Rp. 45.000</th>
                                    </tr> -->
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

<div class="modal fade" id="modalDelete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-tittle">Yakin Anda Ingin Menghapus Data ini?</h4>
            </div>
            <div class="modal-footer">
                <form action="" id="formDelete" method="post">
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>