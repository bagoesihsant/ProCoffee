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
                                    <h3 class="h4 card-title">Categories</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-pills flex-column category-menu">
                                        <li><a href="category.html" class="nav-link">Men <span class="badge badge-secondary">42</span></a>
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
                            <div class="banner"><a href="#"><img src="<?= base_url('assets/vendor_user/'); ?>img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>
                        </div>
                        <div class="col-lg-9 order-1 order-lg-2">
                            <div id="productMain" class="row">
                                <div class="col-md-6">
                                    <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                                        <div class="item"> <img src="<?= base_url('assets/vendor_user/'); ?>img/detailbig1.jpg" alt="" class="img-fluid"></div>
                                        <div class="item"> <img src="<?= base_url('assets/vendor_user/'); ?>img/detailbig2.jpg" alt="" class="img-fluid"></div>
                                        <div class="item"> <img src="<?= base_url('assets/vendor_user/'); ?>img/detailbig3.jpg" alt="" class="img-fluid"></div>
                                    </div>
                                    <div class="ribbon sale">
                                        <div class="theribbon">SALE</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                    <!-- /.ribbon-->
                                    <div class="ribbon new">
                                        <div class="theribbon">NEW</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                    <!-- /.ribbon-->
                                </div>
                                <div class="col-md-6">
                                    <div class="box">
                                        <h1 class="text-center">Judul Barang</h1>
                                        <p class="goToDescription"><a href="#details" class="scroll-to">Kategori barang</a></p>
                                        <p class="price">Harga</p>
                                        <p class="text-center buttons"><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a></p>
                                    </div>
                                    <!-- <div data-slider-id="1" class="owl-thumbs">
                                        <button class="owl-thumb-item"><img src="<?= base_url('assets/vendor_user/'); ?>img/detailsquare.jpg" alt="" class="img-fluid"></button>
                                        <button class="owl-thumb-item"><img src="<?= base_url('assets/vendor_user/'); ?>img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                                        <button class="owl-thumb-item"><img src="<?= base_url('assets/vendor_user/'); ?>img/detailsquare3.jpg" alt="" class="img-fluid"></button>
                                    </div> -->
                                </div>
                            </div>
                            <div id="details" class="box">
                                <p></p>
                                <h4>Product details</h4>
                                <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
                                <h4>Material &amp; care</h4>
                                <ul>
                                    <li>Polyester</li>
                                    <li>Machine wash</li>
                                </ul>
                                <h4>Size &amp; Fit</h4>
                                <ul>
                                    <li>Regular fit</li>
                                    <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                                </ul>
                                <blockquote>
                                    <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
                                </blockquote>
                                <hr>
                                <!-- <div class="social">
                                    <h4>Show it to your friends</h4>
                                    <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
                                </div> -->
                            </div>
                            <div class="row same-height-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="box same-height">
                                        <h3>Mungkin anda ingin melihat barang lainnya</h3>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="product same-height">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2.jpg" alt="" class="img-fluid"></a></div>
                                                <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                                            </div>
                                        </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2.jpg" alt="" class="img-fluid"></a>
                                        <div class="text">
                                            <h3>Fur coat</h3>
                                            <p class="price">$143</p>
                                        </div>
                                    </div>
                                    <!-- /.product-->
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="product same-height">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1.jpg" alt="" class="img-fluid"></a></div>
                                                <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                                            </div>
                                        </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1.jpg" alt="" class="img-fluid"></a>
                                        <div class="text">
                                            <h3>Fur coat</h3>
                                            <p class="price">$143</p>
                                        </div>
                                    </div>
                                    <!-- /.product-->
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="product same-height">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3.jpg" alt="" class="img-fluid"></a></div>
                                                <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                                            </div>
                                        </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3.jpg" alt="" class="img-fluid"></a>
                                        <div class="text">
                                            <h3>Fur coat</h3>
                                            <p class="price">$143</p>
                                        </div>
                                    </div>
                                    <!-- /.product-->
                                </div>
                            </div>
                            <div class="row same-height-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="box same-height">
                                        <h3>Produk Pro Coffe</h3>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="product same-height">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2.jpg" alt="" class="img-fluid"></a></div>
                                                <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                                            </div>
                                        </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2.jpg" alt="" class="img-fluid"></a>
                                        <div class="text">
                                            <h3>Fur coat</h3>
                                            <p class="price">$143</p>
                                        </div>
                                    </div>
                                    <!-- /.product-->
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="product same-height">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1.jpg" alt="" class="img-fluid"></a></div>
                                                <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                                            </div>
                                        </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1.jpg" alt="" class="img-fluid"></a>
                                        <div class="text">
                                            <h3>Fur coat</h3>
                                            <p class="price">$143</p>
                                        </div>
                                    </div>
                                    <!-- /.product-->
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="product same-height">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3.jpg" alt="" class="img-fluid"></a></div>
                                                <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                                            </div>
                                        </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3.jpg" alt="" class="img-fluid"></a>
                                        <div class="text">
                                            <h3>Fur coat</h3>
                                            <p class="price">$143</p>
                                        </div>
                                    </div>
                                    <!-- /.product-->
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-9-->
                    </div>
                </div>
            </div>
        </div>