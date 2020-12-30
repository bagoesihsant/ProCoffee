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
                <div id="basket" class="col-lg-9">
                    <div class="box">
                        <form method="post" action="checkout1.html">
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
                                            <th>Unit price</th>
                                            <th colspan="2">Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cart as $data) : ?>
                                            <tr>
                                                <td><a href="#"><img src="<?= base_url('assets/items_img/') . $data['gambar'] ?>" alt="White Blouse Armani"></a></td>
                                                <td><a href="#"><?= $data['nama_barang']; ?></a></td>
                                                <td>
                                                    <input type="number" value="1" class="form-control">
                                                </td>
                                                <td><?= $data['harga']; ?></td>
                                                <td><?= $data['harga']; ?></td>
                                                <td colspan="2"><a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('User/Cart/delete/' . $data['kode_barang']); ?>')"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th id="total_bayar" colspan="2">Rp. 45.000</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
<<<<<<< Updated upstream
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="street">Alamat Kirim</label>
                                    <textarea class="form-control" name="" id="" cols="" rows="" placeholder="Mohon di isi dengan alamat yang benar"></textarea>
                                </div>
                            </div>
                            <!-- /.table-responsive-->
                            <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                                <div class="left"><a href="<?= base_url('User/List'); ?>" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Belanja Lagi</a></div>
                                <div class="right">
                                    <!-- <button class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Update cart</button> -->
                                    <!-- <button type="submit" class="btn btn-primary">Proses checkout <i class="fa fa-chevron-right"></i></button> -->
                                    <button id="pay-button" class="btn btn-primary">Proses checkout <i class="fa fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </form>
=======
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
>>>>>>> Stashed changes
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