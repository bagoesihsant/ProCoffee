<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('assets/'); ?>dist/img/coffee-bean.png" alt="ProCoffee Logo" class=" brand-image img-circle elevation-3">
        <span class=" brand-text font-weight-light">ProCoffee</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- Menu Management -->
                <li class="nav-header">MANAGEMENT</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-users"></i>
                        <p>Customer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url()."C_admin/index_supplier" ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-truck"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-fw fa-boxes"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url()."C_admin/index_product_categories" ?>" class="nav-link">
                                <i class="nav-icon far fa-circle text-secondary"></i>
                                <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url()."C_admin/index_product_units" ?>" class="nav-link">
                                <i class="nav-icon far fa-circle text-secondary"></i>
                                <p>Units</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url()."C_admin/index_product_items" ?>" class="nav-link">
                                <i class="nav-icon far fa-circle text-secondary"></i>
                                <p>Items</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Menu Management End -->
                <!-- Menu Administrator -->
                <li class="nav-header">ADMINISTRATOR</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-folder-plus"></i>
                        <p>Menu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-folder-open"></i>
                        <p>Sub Menu</p>
                    </a>
                </li>
                <!-- Menu Administrator End -->
                <!-- Menu Kasir -->
                <li class="nav-header">KASIR</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-cash-register"></i>
                        <p>Kasir</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-dolly-flatbed"></i>
                        <p>Stock In</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-truck-loading"></i>
                        <p>Stock Out</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-receipt"></i>
                        <p>Pesanan</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-book"></i>
                        <p>Laporan</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <!-- Sub Menu Laporan -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-book"></i>
                                <p>Laporan Penjualan Online</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link">
                                <i class="nav-icon fas fa-fw fa-book"></i>
                                <p>Laporan Kasir</p>
                            </div>
                        </li>
                    </ul>
                    <!-- Sub Menu Laporan End -->
                </li>
                <!-- Menu Kasir End -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>