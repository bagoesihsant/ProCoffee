<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E Comerce Apbase</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor_user/'); ?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor_user/'); ?>vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor_user/'); ?>vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor_user/'); ?>vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor_user/'); ?>css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor_user/'); ?>css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <!-- navbar-->
    <header class="header mb-5">
        <!-------- *** TOPBAR ***_________________________________________________________-->
        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offer mb-3 mb-lg-0"></div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <ul class="menu list-inline mb-0">
                            <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                            <li class="list-inline-item"><a href="<?= base_url('User/Register') ?>">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Login</h5>
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
                            <p class="text-center text-muted"><a href="<?= base_url('User/Register') ?>"><strong>Register Sekarang</strong></a>! Mudah dan hanya butuh beberapa saat untuk mendapatkan akses beli barang di website kami</p>
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
                    <!-- <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button> -->
                    <a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
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
                                                <li class="nav-item"><a href="<?= base_url('User/Cart') ?>" class="nav-link">Keranjang</a></li>
                                                <li class="nav-item"><a href="<?= base_url('User/History') ?>" class="nav-link">Riwayat Pembelian</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <h5>Lainnya</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="<?= base_url('User/Profile'); ?>" class="nav-link">Profil saya</a></li>
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
                        <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="<?= base_url('User/Cart') ?>" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>3 items in cart</span></a></div>
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