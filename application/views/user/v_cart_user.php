<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- breadcrumb-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('User/LandingPage'); ?>">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
                        </ol>
                    </nav>
                </div>
                <div id="basket" class="col-lg">
                    <div class="box">
                        <form method="post" id="formku" enctype="multipart/form-data" action="<?= base_url('cart/check_out'); ?>">
                            <h1>Shopping cart</h1>
                            <p class="text-muted">Isi Keranjang Anda Saat Ini (<?= $hitung_cart; ?>)</p>
                            <?= $this->session->flashdata('message_cart_del'); ?>
                            <?= $this->session->flashdata('message'); ?>
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
                                        <?php
                                        foreach ($cart as $data) :
                                            $id = $data['kode_cart']
                                        ?>
                                            <tr>
                                                <td><a href="#"><img src="<?= base_url('assets/items_img/') . $data['gambar'] ?>" alt="White Blouse Armani"></a></td>
                                                <td><a href="#"><?= $data['nama_barang']; ?></a></td>
                                                <td><?= $data['qty_dibeli'] ?> Unit</td>
                                                <td><?= $data['berat']; ?> Gram</td>
                                                <td><?= $data['total_berat'] / 1000 ?> KG</td>
                                                <input type="hidden" class="berat" id="berat_Total" value="<?= $data['total_berat'] ?>" placeholder="Total Berat Di Keranjang" readonly>
                                                <td>Rp. <?= $data['harga']; ?></td>
                                                <td>Rp. <?= $data['harga'] * $data['qty_dibeli']; ?><input type="hidden" class="form-control harga_satuan1" value="<?= $data['harga'] * $data['qty_dibeli']; ?>"></td>
                                                <td>
                                                    <a class="btn btn-primary btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-xs btn-round" href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('User/Cart/delete/' . $data['kode_cart']); ?>')"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <?php
                                    if ($hitung_cart < 1) :
                                    ?>

                                        <div class="alert alert-primary" role="alert">
                                            Barang di keranjang anda masih kosong, silahkan mengisi keranjang terlebih dahulu
                                            <a class="btn btn-success" href="<?= base_url('User/LandingPage'); ?>">Belanja Sekarang!</a>
                                        </div>
                                </table>
                            </div>
                        <?php
                                    else :
                        ?>
                            </table>
                    </div>
                    <div class="col-md-12">
                        <label for="">keseluruhan berat Di Keranjang (Gram)</label>
                        <input type="text" class="form-control" id="keseluruhanberat" value="" placeholder="Total Berat Di Keranjang" readonly>
                        <label for="kota_provinsi">Pilih provinsi anda</label>
                        <select name="kota_provinsi" id="kota_provinsi" class="form-control mb-3 pb-1" onchange="get_kota()">
                        </select>
                        <label for="kota_kirim">Pilih kabupaten anda</label>
                        <select name="kota_kirim" id="kota_kirim" class="form-control mb-3 pb-1" onchange="get_ongkir()">
                        </select>

                        <label for="opsi_ongkir">Opsi Ongkir anda</label>
                        <select name="opsi_ongkir" id="opsi_ongkir" class="form-control mb-3 pb-1" onchange="get_harga_ongkir()">
                        </select>

                        <?php foreach ($cart as $op) :
                                            $cs = $this->session->userdata('id_user'); ?>
                            <!-- Inputan untuk kedalam detail transaksi(checkout) -->
                            <input type="hidden" name="id_brg_tmp[]" value="<?= $op['kode_barang']; ?>">
                            <input type="hidden" name="harga_brg_tmp[]" value="<?= $op['harga']; ?>">
                            <input type="hidden" name="qty_brg_tmp[]" value="<?= $op['qty_dibeli']; ?>">
                            <!-- Akhir inputan -->

                            <!-- Inputan hidden -->
                            <input type="hidden" value="<?= $cs; ?>" name="idcustomer" placeholder="id customer">
                            <input type="hidden" value="<?= $op['kode_cart']; ?>" name="iditem" placeholder="id item">
                            <input type="hidden" value="<?= $op['qty_dibeli']; ?>" name="qtybeli" id="qtybeli" placeholder="qty">
                            <input type="hidden" value="<?= $op['total_berat']; ?>" name="berat" id="berat" class="berat">
                            <input type="hidden" value="<?= $op['tgl_transaksi']; ?>" name="tglbeli" placeholder="tgl">
                        <?php endforeach; ?>
                        <!-- inputan yang akan di jumlahkan -->
                        <label for="">Biaya Sementara (Rupiah)</label>
                        <input type="text" class="form-control" name="final_total2" id="final_total2" placeholder="Total Sementara" readonly>
                        <label for="">Biaya ONGKIR (Rupiah)</label>
                        <input type="text" class="form-control" name="coba1" id="coba1" placeholder="Total Keseluruhan barang dan ongkir" readonly>
                        <!-- Akhir Inputan hidden -->
                        <label for="">Total Yang Harus Dibayar (Rupiah)</label>
                        <input type="text" class="form-control" placeholder="Total Pembayaran" name="total_bayar" id="total_bayar" readonly>

                        <div class="form-group">
                            <label for="street">Alamat Kirim</label>
                            <textarea class="form-control" name="alamat" id="" cols="" rows="8" placeholder="Mohon di isi dengan alamat yang benar" required></textarea>
                        </div>
                    </div>
                    <!-- /.table-responsive-->
                    <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                        <div class="left"><a href="<?= base_url('User/List') ?>" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Belanja Lagi</a></div>
                        <div class="right">
                            <button type="submit" name="transak" class="btn btn-success">Chechout</button>
                            <!-- <button id="pay-button" class="btn btn-primary">Proses checkout <i class="fa fa-chevron-right"></i></button> -->
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
            <!-- <div class="col-lg-3">
                    <div id="order-summary" class="box">
                        <div class="box-header">
                            <h3 class="mb-0">Pembeli</h3>
                        </div>
                        <p class="text-danger">Peringatan Mohon untuk Alamat di isi dengan benar, karena kami tidak akan bertanggung jawab apa bila alamat shipping yang di isi adalah palsu </p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
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

<?php
foreach ($cart as $i) :
    $id = $i['kode_cart'];
    $berat = $i['berat'];
?>

    <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Data Keranjang</h3>
                </div>
                <form action="<?= base_url() . 'cart/editcart'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group" hidden>
                            <label class="control-label col-xs-3">Kode Cart</label>
                            <div class="col-xs-8">
                                <input name="id_cart" value="<?= $id; ?>" class="form-control" type="text" placeholder="ID Cart" hidden>
                                <input name="berat" value="<?= $berat; ?>" class="form-control" type="number" hidden>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Jumlah Qty Yang mau dibeli</label>
                            <div class="col-xs-8">
                                <input name="quantity" value="<?= $i['qty_dibeli']; ?>" class="form-control" type="number" placeholder="Jumlah Quantity" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>