        <div id="all">
            <div id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- breadcrumb-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('Users/C_barang_user'); ?>">Barang</a></li>
                                    <li class="breadcrumb-item active"><a href="#">Detail</a></li>
                                </ol>
                            </nav>
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
                                            <li><a href="category.html" class="nav-link">Halaman Utama</a></li>
                                            <li><a href="category.html" class="nav-link">Profil Saya</a></li>
                                            <li><a href="category.html" class="nav-link">Cart</a></li>
                                            <li><a href="category.html" class="nav-link">History transaksi</a></li>
                                        </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- *** MENUS AND FILTERS END ***-->
                            <!-- <div class="banner"><a href="#"><img src="<?= base_url('assets/vendor_user/'); ?>img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div> -->
                        </div>
                        <div class="col-lg-9 order-1 order-lg-2">
                            <div id="productMain" class="row">
                                <div class="col-md-6">
                                    <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                                        <div class="item"> <img src="<?= base_url('assets/items_img/') . $row->gambar ?>" alt="" class="img-fluid"></div>
                                        <!-- <div class="item"> <img src="<?= base_url('assets/vendor_user/'); ?>img/detailbig2.jpg" alt="" class="img-fluid"></div>
                                        <div class="item"> <img src="<?= base_url('assets/vendor_user/'); ?>img/detailbig3.jpg" alt="" class="img-fluid"></div> -->
                                    </div>
                                    <div class="ribbon sale">
                                        <div class="theribbon">SALE</div>
                                        <div class="ribbon-background"></div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="box">
                                        <h1 class="text-center"><?= $row->nama_barang; ?></h1>
                                        <p class="goToDescription"><?= $row->nama_kategori; ?></p>
                                        <p class="price"><?= $row->harga; ?></p>
                                        <p class="text-center buttons"><a href="<?= base_url('User/List'); ?>" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Kembali</a><a href="<?= base_url('User/Cart'); ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a></p>
                                    </div>
                                    <!-- <div data-slider-id="1" class="owl-thumbs">
                                        <button class="owl-thumb-item"><img src="<?= base_url('assets/vendor_user/'); ?>img/detailsquare.jpg" alt="" class="img-fluid"></button>
                                        <button class="owl-thumb-item"><img src="<?= base_url('assets/vendor_user/'); ?>img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                                        <button class="owl-thumb-item"><img src="<?= base_url('assets/vendor_user/'); ?>img/detailsquare3.jpg" alt="" class="img-fluid"></button>
                                    </div> -->
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