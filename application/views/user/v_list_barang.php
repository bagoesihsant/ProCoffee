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
                                    <li><a href="category.html" class="nav-link">Profil Saya</a></li>
                                    <li><a href="category.html" class="nav-link">Keranjang</a></li>
                                    <li><a href="category.html" class="nav-link">History transaksi</a></li>
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
                    <div class="row products">
                        <div class="col-lg-4 col-md-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="detail.html"><img style="width: 250px; height:340px;" src="<?= base_url('assets/vendor_user/'); ?>img/kopi3.jpeg" alt="" class="img-fluid"></a></div>
                                        <!-- <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1_3.jpg" alt="" class="img-fluid"></a></div> -->
                                    </div>
                                </div><a href="<?= base_url('User/Detail') ?>" class="invisible"><img style="width: 250px; height:340px;" src="<?= base_url('assets/vendor_user/'); ?>img/kopi3.jpeg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="<?= base_url('User/Detail') ?>">Fur coat with very but very very long name</a></h3>
                                    <p class="price">
                                        <del></del>Rp. 55.000
                                    </p>
                                    <p class="buttons"><a href="<?= base_url('User/Detail') ?>" class="btn btn-outline-secondary">View detail</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a></p>
                                </div>
                                <!-- /.text-->
                            </div>
                            <!-- /.product            -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="<?= base_url('User/Detail') ?>"><img style="width: 250px; height:340px;" src="<?= base_url('assets/vendor_user/'); ?>img/kopi2.jpeg" alt="" class="img-fluid"></a></div>
                                        <!-- <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/kopi2_2.jpeg" alt="" class="img-fluid"></a></div> -->
                                    </div>
                                </div><a href="<?= base_url('User/Detail') ?>" class="invisible"><img style="width: 250px; height:340px;" src="<?= base_url('assets/vendor_user/'); ?>img/kopi2.jpeg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="<?= base_url('User/Detail') ?>">Kopi Lanang</a></h3>
                                    <p class="price">
                                        <del></del>Rp. 50.000
                                    </p>
                                    <p class="buttons"><a href="<?= base_url('User/Detail') ?>" class="btn btn-outline-secondary">View detail</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a></p>
                                </div>
                                <!-- /.text-->

                                <!-- /.ribbon-->
                            </div>
                            <!-- /.product            -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="<?= base_url('User/Detail') ?>"><img style="width: 250px; height:340px;" src="<?= base_url('assets/vendor_user/'); ?>img/kopio.jpeg" alt="" class="img-fluid"></a></div>
                                        <!-- <div class="back"><a href="<?= base_url('User/Detail') ?>"><img src="<?= base_url('assets/vendor_user/'); ?>img/kopi1.jpeg" alt="" class="img-fluid"></a></div> -->
                                    </div>
                                </div><a href="<?= base_url('User/Detail') ?>" class="invisible"><img style="width: 250px; height:340px;" src="<?= base_url('assets/vendor_user/'); ?>img/kopio.jpeg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="<?= base_url('User/Detail') ?>">Kopi Original</a></h3>
                                    <p class="price">
                                        <del></del>Rp 45.000
                                    </p>
                                    <p class="buttons"><a href="<?= base_url('User/Detail') ?>" class="btn btn-outline-secondary">View detail</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a></p>
                                </div>
                                <!-- /.text-->
                            </div>
                            <!-- /.product            -->

                            <!-- /.products-->
                        </div>
                    </div>
                    <!-- /.col-lg-9-->
                </div>
            </div>
        </div>
    </div>