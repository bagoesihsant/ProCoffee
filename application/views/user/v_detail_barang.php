        <div id="all">
            <div id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- breadcrumb-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('User/LandingPage'); ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('User/List'); ?>">Barang</a></li>
                                    <li class="breadcrumb-item active"><a href="#">Detail</a></li>
                                </ol>
                            </nav>
                            <?= $this->session->flashdata('message_cart'); ?>
                        </div>
                        <div class="col-lg-3 order-2 order-lg-1">
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
                                            <li><a href="<?= base_url('User/LandingPage'); ?>" class="nav-link">Halaman Utama</a></li>
                                            <li><a href="<?= base_url('User/Profile'); ?>" class="nav-link">Profil Saya</a></li>
                                            <li><a href="<?= base_url('User/Cart'); ?>" class="nav-link">Cart</a></li>
                                            <li><a href="<?= base_url('User/History'); ?>" class="nav-link">History transaksi</a></li>
                                        </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 order-1 order-lg-2">
                            <div id="productMain" class="row">
                                <div class="col-md-6">
                                    <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                                        <div class="item">
                                            <img src="<?= base_url('assets/items_img/') . $row->gambar ?>" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="ribbon sale">
                                        <div class="theribbon">SALE</div>
                                        <div class="ribbon-background"></div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <form action="<?= base_url('User/Beli/process'); ?>" method="post" id="formMu">
                                        <div class="box">
                                            <input type="hidden" name="kode_barang_input" value="<?= $row->kode_barang; ?>">
                                            <input type="hidden" name="berat_input" id="berat_input" value="">
                                            <input type="hidden" id="ratrat" name="ratrat" value="<?= $row->berat; ?>">
                                            <h1 class="text-center"><?= $row->nama_barang; ?></h1>
                                            <p class="goToDescription"><?= $row->nama_kategori; ?></p>
                                            <?php $sesion_login = $this->session->userdata('email');
                                            if ($sesion_login) :
                                            ?>
                                                <?php
                                                $kode_user_beli = $this->session->userdata('id_user');
                                                $id_item = $row->kode_barang;
                                                $query = "SELECT * FROM tbl_cart_online WHERE kode_barang = '$id_item' AND kode_usero = '$kode_user_beli'";
                                                $qr = $this->db->query($query);
                                                if ($qr->num_rows() > 0) : ?>
                                                    <p class="price"><?= $row->harga; ?></p>
                                                    <p class="text-center buttons">
                                                        <a href="<?= base_url('User/LandingPage'); ?>" class="btn btn-outline-primary">
                                                            <i class="fa fa-arrow-left"></i> Kembali
                                                        </a>
                                                        <a href="<?= base_url('User/Cart'); ?>" class="btn btn-primary">
                                                            <i class="fa fa-shopping-cart"></i> Barang sudah di keranjang
                                                        </a>
                                                    </p>
                                                <?php else : ?>
                                                    <label for="">Quantity</label>
                                                    <input class="form-control" type="number" name="jumlah_beli" id="jumlah_beli" required>
                                                    <p class="price"><?= $row->harga; ?></p>
                                                    <p class="text-center buttons">
                                                        <a href="<?= base_url('User/LandingPage'); ?>" class="btn btn-outline-primary">
                                                            <i class="fa fa-arrow-left"></i> Kembali
                                                        </a>
                                                        <button type="submit" name="tambah_cart" class="btn btn-primary">
                                                            <i class="fa fa-shopping-cart"></i> Add to cart
                                                        </button>
                                                    </p>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <p class="text-center buttons">
                                                    <a href="<?= base_url('User/LandingPage'); ?>" class="btn btn-outline-primary">
                                                        <i class="fa fa-arrow-left"></i> Kembali
                                                    </a>
                                                    <a href="<?= base_url('User/Register'); ?>" class="btn btn-primary">
                                                        <i class="fa fa-shopping-cart"></i> Login dahulu
                                                    </a>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="details" class="box">
                                <?= $row->deskripsi; ?>
                            </div>

                        </div>
                        <!-- /.col-md-9-->
                    </div>
                </div>
            </div>
        </div>