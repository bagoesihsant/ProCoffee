<body>
    <!-- navbar-->
    <header class="header mb-5">
        <!-------- *** TOPBAR ***_________________________________________________________-->
        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm">Offer of the day</a><a href="#" class="ml-1">Get flat 35% off on orders over $50!</a></div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <ul class="menu list-inline mb-0">
                            <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                            <li class="list-inline-item"><a href="register.html">Register</a></li>
                            <li class="list-inline-item"><a href="contact.html">Contact</a></li>
                            <li class="list-inline-item"><a href="#">Recently viewed</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Customer login</h5>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="customer-orders.html" method="post">
                                <div class="form-group">
                                    <input id="email-modal" type="text" placeholder="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input id="password-modal" type="password" placeholder="password" class="form-control">
                                </div>
                                <p class="text-center">
                                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                                </p>
                            </form>
                            <p class="text-center text-muted">Belum Punya Akun?</p>
                            <p class="text-center text-muted"><a href="register.html"><strong>Register Sekarang</strong></a>! Mudah dan hanya butuh beberapa saat untuk mendapatkan akses beli barang di website kami</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** TOP BAR END ***-->


        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container"><a href="index.html" class="navbar-brand home"><img src="<?= base_url('assets/vendor_user/'); ?>img/logo.png" alt="Obaju logo" class="d-none d-md-inline-block"><img src="<?= base_url('assets/vendor_user/'); ?>img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
                <div class="navbar-buttons">
                    <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                    <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
                </div>
                <div id="navigation" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="#" class="nav-link active">Home</a></li>
                        <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">User<b class="caret"></b></a>
                            <ul class="dropdown-menu megamenu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <h5>Transaksi</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="category.html" class="nav-link">Keranjang</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Riwayat Pembelian</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <h5>Lainnya</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="category.html" class="nav-link">LogOut</a></li>
                                            </ul>
                                        </div>
                                        <!-- <div class="col-md-6 col-lg-3">
                                            <h5>Shoes</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Ladies<b class="caret"></b></a>
                            <ul class="dropdown-menu megamenu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <h5>Clothing</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="category.html" class="nav-link">T-shirts</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Shirts</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Pants</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Accessories</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <h5>Shoes</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <h5>Accessories</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                                            </ul>
                                            <h5>Looks and trends</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="banner"><a href="#"><img src="<?= base_url('assets/vendor_user/'); ?>img/banner.jpg" alt="" class="img img-fluid"></a></div>
                                            <div class="banner"><a href="#"><img src="<?= base_url('assets/vendor_user/'); ?>img/banner2.jpg" alt="" class="img img-fluid"></a></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Template<b class="caret"></b></a>
                            <ul class="dropdown-menu megamenu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <h5>Shop</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="index.html" class="nav-link">Homepage</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Category - sidebar left</a></li>
                                                <li class="nav-item"><a href="category-right.html" class="nav-link">Category - sidebar right</a></li>
                                                <li class="nav-item"><a href="category-full.html" class="nav-link">Category - full width</a></li>
                                                <li class="nav-item"><a href="detail.html" class="nav-link">Product detail</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <h5>User</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="register.html" class="nav-link">Register / login</a></li>
                                                <li class="nav-item"><a href="customer-orders.html" class="nav-link">Orders history</a></li>
                                                <li class="nav-item"><a href="customer-order.html" class="nav-link">Order history detail</a></li>
                                                <li class="nav-item"><a href="customer-wishlist.html" class="nav-link">Wishlist</a></li>
                                                <li class="nav-item"><a href="customer-account.html" class="nav-link">Customer account / change password</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <h5>Order process</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="basket.html" class="nav-link">Shopping cart</a></li>
                                                <li class="nav-item"><a href="checkout1.html" class="nav-link">Checkout - step 1</a></li>
                                                <li class="nav-item"><a href="checkout2.html" class="nav-link">Checkout - step 2</a></li>
                                                <li class="nav-item"><a href="checkout3.html" class="nav-link">Checkout - step 3</a></li>
                                                <li class="nav-item"><a href="checkout4.html" class="nav-link">Checkout - step 4</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <h5>Pages and blog</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="blog.html" class="nav-link">Blog listing</a></li>
                                                <li class="nav-item"><a href="post.html" class="nav-link">Blog Post</a></li>
                                                <li class="nav-item"><a href="faq.html" class="nav-link">FAQ</a></li>
                                                <li class="nav-item"><a href="text.html" class="nav-link">Text page</a></li>
                                                <li class="nav-item"><a href="text-right.html" class="nav-link">Text page - right sidebar</a></li>
                                                <li class="nav-item"><a href="404.html" class="nav-link">404 page</a></li>
                                                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                    <div class="navbar-buttons d-flex justify-content-end">
                        <!-- /.nav-collapse-->
                        <!-- <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a> -->
                        <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>3 items in cart</span></a></div>
                    </div>
                </div>
            </div>
        </nav>
        <div id="search" class="collapse">
            <div class="container">
                <form role="search" class="ml-auto">
                    <div class="input-group">
                        <input type="text" placeholder="Search" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="main-slider" class="owl-carousel owl-theme">
                            <div class="item"><img src="<?= base_url('assets/vendor_user/'); ?>img/main-slider1.jpg" alt="" class="img-fluid"></div>
                            <div class="item"><img src="<?= base_url('assets/vendor_user/'); ?>img/main-slider2.jpg" alt="" class="img-fluid"></div>
                            <div class="item"><img src="<?= base_url('assets/vendor_user/'); ?>img/main-slider3.jpg" alt="" class="img-fluid"></div>
                            <div class="item"><img src="<?= base_url('assets/vendor_user/'); ?>img/main-slider4.jpg" alt="" class="img-fluid"></div>
                        </div>
                        <!-- /#main-slider-->
                    </div>
                </div>
            </div>
            <!--
        *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________
        -->
            <div id="advantages">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                                <div class="icon"><i class="fa fa-heart"></i></div>
                                <h3><a href="#">We love our customers</a></h3>
                                <p class="mb-0">We are known to provide best possible service ever</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                                <div class="icon"><i class="fa fa-tags"></i></div>
                                <h3><a href="#">Best prices</a></h3>
                                <p class="mb-0">You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                                <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p class="mb-0">Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row-->
                </div>
                <!-- /.container-->
            </div>
            <!-- /#advantages-->
            <!-- *** ADVANTAGES END ***-->
            <!--
        *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________
        -->
            <div id="hot">
                <div class="box py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mb-0">PRODUK KAMI</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="product-slider owl-carousel owl-theme">
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1.jpg" alt="" class="img-fluid"></a></div>
                                        <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                                    </div>
                                </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1.jpg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="detail.html">Fur coat with very but very very long name</a></h3>
                                    <p class="price">
                                        <del></del>$143.00
                                    </p>
                                </div>
                                <!-- /.text-->
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
                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon-->
                            </div>
                            <!-- /.product-->
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2.jpg" alt="" class="img-fluid"></a></div>
                                        <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                                    </div>
                                </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2.jpg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="detail.html">White Blouse Armani</a></h3>
                                    <p class="price">
                                        <del>$280</del>$143.00
                                    </p>
                                </div>
                                <!-- /.text-->
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
                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon-->
                            </div>
                            <!-- /.product-->
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3.jpg" alt="" class="img-fluid"></a></div>
                                        <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                                    </div>
                                </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3.jpg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="detail.html">Black Blouse Versace</a></h3>
                                    <p class="price">
                                        <del></del>$143.00
                                    </p>
                                </div>
                                <!-- /.text-->
                            </div>
                            <!-- /.product-->
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3.jpg" alt="" class="img-fluid"></a></div>
                                        <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                                    </div>
                                </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3.jpg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="detail.html">Black Blouse Versace</a></h3>
                                    <p class="price">
                                        <del></del>$143.00
                                    </p>
                                </div>
                                <!-- /.text-->
                            </div>
                            <!-- /.product-->
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2.jpg" alt="" class="img-fluid"></a></div>
                                        <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                                    </div>
                                </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2.jpg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="detail.html">White Blouse Versace</a></h3>
                                    <p class="price">
                                        <del></del>$143.00
                                    </p>
                                </div>
                                <!-- /.text-->
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon-->
                            </div>
                            <!-- /.product-->
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1.jpg" alt="" class="img-fluid"></a></div>
                                        <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                                    </div>
                                </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product1.jpg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="detail.html">Fur coat</a></h3>
                                    <p class="price">
                                        <del></del>$143.00
                                    </p>
                                </div>
                                <!-- /.text-->
                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon-->
                            </div>
                            <!-- /.product-->
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2.jpg" alt="" class="img-fluid"></a></div>
                                        <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                                    </div>
                                </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product2.jpg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="detail.html">White Blouse Armani</a></h3>
                                    <p class="price">
                                        <del>$280</del>$143.00
                                    </p>
                                </div>
                                <!-- /.text-->
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
                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon-->
                            </div>
                            <!-- /.product-->
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3.jpg" alt="" class="img-fluid"></a></div>
                                        <div class="back"><a href="detail.html"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                                    </div>
                                </div><a href="detail.html" class="invisible"><img src="<?= base_url('assets/vendor_user/'); ?>img/product3.jpg" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="detail.html">Black Blouse Versace</a></h3>
                                    <p class="price">
                                        <del></del>$143.00
                                    </p>
                                </div>
                                <!-- /.text-->
                            </div>
                            <!-- /.product-->
                        </div>
                        <!-- /.product-slider-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /#hot-->
                <!-- *** HOT END ***-->
            </div>
            <!--
        *** GET INSPIRED ***
        _________________________________________________________
        -->
            <div class="container">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Get Inspired</h3>
                        <p class="lead">Get the inspiration from our world class designers</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item"><a href="#"><img src="<?= base_url('assets/vendor_user/'); ?>img/getinspired1.jpg" alt="Get inspired" class="img-fluid"></a></div>
                            <div class="item"><a href="#"><img src="<?= base_url('assets/vendor_user/'); ?>img/getinspired2.jpg" alt="Get inspired" class="img-fluid"></a></div>
                            <div class="item"><a href="#"><img src="<?= base_url('assets/vendor_user/'); ?>img/getinspired3.jpg" alt="Get inspired" class="img-fluid"></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET INSPIRED END ***-->
            <!--
        *** BLOG HOMEPAGE ***
        _________________________________________________________
        -->
            <div class="box text-center">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">From our blog</h3>
                        <p class="lead mb-0">What's new in the world of fashion? <a href="blog.html">Check our blog!</a></p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-md-12">
                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Fashion now</a></h4>
                                <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a></p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Who is who - example blog post</a></h4>
                                <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a></p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /#blog-homepage-->
                </div>
            </div>
            <!-- /.container-->
            <!-- *** BLOG HOMEPAGE END ***-->
        </div>
    </div>