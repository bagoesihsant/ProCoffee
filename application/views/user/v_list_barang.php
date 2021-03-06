<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- breadcrumb-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">List Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <!--
                *** MENUS AND FILTERS ***
                _________________________________________________________
                -->
                    <div class="card sidebar-menu mb-4">
                        <div class="card-header">
                            <h3 class="h4 card-title">Menu</h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column category-menu">
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('User/LandingPage') ?>" class="nav-link">Halaman Utama</a></li>
                                    <li><a href="<?= base_url('User/Profile'); ?>" class="nav-link">Profil Saya</a></li>
                                    <li><a href="<?= base_url('User/Cart'); ?>" class="nav-link">Keranjang</a></li>
                                    <li><a href="<?= base_url('User/History'); ?>" class="nav-link">History transaksi</a></li>
                                </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- *** MENUS AND FILTERS END ***-->
                    <!-- <div class="banner"><a href="#"><img src="<?= base_url('assets/vendor_user/'); ?>img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div> -->
                </div>
                <div class="col-lg-9">
                    <div class="box info-bar">
                        <h3 class="text-uppercase text-center">Daftar Produk Dari Pro Coffee</h3>
                    </div>
                    <?= $this->session->flashdata('message_cart_list'); ?>
                    <div class="row products">
                        <!-- loppingnya dari sini lung -->
                        <?php foreach ($PL as $p => $data) : ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">

                                            <div class="front"><a href="<?= base_url('User/Detail/' . $data->kode_barang); ?>"><img style="width: 250px; height:340px;" src="<?= base_url('assets/items_img/') . $data->gambar ?>" alt="" class="img-fluid"></a></div>
                                            <!-- <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1_3.jpg" alt="" class="img-fluid"></a></div> -->
                                        </div>

                                    </div>
                                    <!-- Ini gambar  kalau di klik bakalan nganterin ke halaman detail sesuai dengan produk yang di klik-->
                                    <a href="<?= base_url('User/Detail/' . $data->kode_barang); ?>" class="invisible"><img style="width: 250px; height:340px;" src="<?= base_url('assets/items_img/') . $data->gambar ?>" alt="" class="img-fluid"></a>
                                    <!-- /Penutup Ini gambar  kalau di klik bakalan nganterin ke halaman detail sesuai dengan produk yang di klik-->
                                    <div class="text">
                                        <h3>
                                            <!-- Ini judul barangnya juga kalau di klik bakalan nganterin ke halaman sesuai ama barang yang di klik -->
                                            <a href="<?= base_url('User/Detail/' . $data->kode_barang); ?>"><?= $data->nama_barang; ?></a>
                                            <!-- /Penutup Ini judul barangnya juga kalau di klik bakalan nganterin ke halaman sesuai ama barang yang di klik -->
                                        </h3>
                                        <p class="price">
                                            <!-- Ini harga Barang -->
                                            <del></del>Rp. <?= $data->harga; ?>
                                            <!-- Penutup Ini harga Barang -->
                                        </p>
                                        <p class="buttons">
                                            <form action="<?= base_url('User/TambahKeranjang'); ?>" method="post">
                                                <input type="hidden" name="kode_barang_input" value="<?= $data->kode_barang; ?>">
                                                <input type="hidden" name="nama_barang" value="<?= $data->nama_barang; ?>">
                                                <input type="hidden" name="berat_input" value="<?= $data->berat; ?>">
                                                <input type="hidden" name="jumlah_beli" value="1">
                                                <!-- pembuka tombol langsung tambah barang ke chart -->
                                                <!-- <a href="<?= base_url('User/Detail/' . $data->kode_barang); ?>" class="btn btn-outline-secondary">View detail</a> -->
                                                <!-- Penutup tombol langsung tambah barang ke chart -->

                                                <!-- pembuka tombol langsung ke detail barang-->
                                                <?php $sesion_login = $this->session->userdata('email');
                                                if ($sesion_login) :
                                                ?>
                                                    <?php
                                                    $kose_user_beli = $this->session->userdata('id_user');
                                                    $id_item = $data->kode_barang;
                                                    $query = "SELECT * FROM tbl_cart_online WHERE kode_barang = '$id_item' AND kode_usero = '$kose_user_beli'";
                                                    $qr = $this->db->query($query);
                                                    if ($qr->num_rows() > 0) : ?>
                                                        <p class="text-center buttons"><a href="<?= base_url('User/Detail/' . $data->kode_barang); ?>" class="btn btn-outline-secondary">View detail</a><a href="<?= base_url('User/Cart'); ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Lihat Cart</a></p>
                                                    <?php else : ?>
                                                        <p class="text-center buttons"><a href="<?= base_url('User/Detail/' . $data->kode_barang); ?>" class="btn btn-outline-secondary">View detail</a><button type="submit" name="tambah_cart_list" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button></p>
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <p class="text-center buttons"><a href="<?= base_url('User/Detail/' . $data->kode_barang); ?>" class="btn btn-outline-secondary">View detail</a><a href="<?= base_url('User/Register'); ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Login dahulu</a></p>
                                                <?php endif; ?>
                                                <!-- Penutup tombol langsung ke detail barang-->
                                            </form>
                                        </p>
                                    </div>
                                    <!-- /.text-->
                                </div>
                                <!-- /.product -->
                            </div>
                            <!-- sampe sini penutup loopingnya -->
                        <?php endforeach; ?>
                    </div>
                    <!-- /.col-lg-9-->
                </div>
            </div>
        </div>
    </div>