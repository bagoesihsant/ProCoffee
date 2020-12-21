    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">My account</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">

                        <div class="card sidebar-menu">
                            <div class="card-header">
                                <h3 class="h4 card-title">Customer section</h3>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <a href="<?= base_url('User/Profile'); ?>" class="nav-link active"><i class="fa fa-user"></i>Profil Saya</a>
                                    <a href="<?= base_url('User/Profile/Edit'); ?>" class="nav-link"><i class="fa fa-pencil"></i>Edit Profil</a>
                                    <a href="<?= base_url('User/Profile/ChangePassword'); ?>" class="nav-link"><i class="fa fa-key"></i>Ganti Password</a>
                                    <a href="<?= base_url('User/History'); ?>" class="nav-link"><i class="fa fa-book"></i>History Pembelian</a>
                                    <a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></ul>
                            </div>
                        </div>
                        <!-- /.col-lg-3-->
                        <!-- *** CUSTOMER MENU END ***-->
                    </div>