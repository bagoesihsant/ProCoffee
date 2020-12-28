<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- leaflet.CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/leaflet-locatecontrol/dist/L.Control.Locate.min.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">Selamat Datang "<?= $user['username']; ?>"
                        <i class="fas fa-fw fa-user-alt"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User Mini Profile -->
                        <div class="dropdown-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="image">
                                        <img src="<?= base_url() . 'assets/user_img/' . $user['profile_img']; ?>" alt="User profile picture" class="profile-user-img img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <?php
                                     if($user['kode_role'] == "RL0000000001")
                                     {
                                         echo "<p class='badge badge-danger'>Administrator</p>";
                                     }
                                     elseif($user['kode_role'] == "RL0000000002")
                                     {
                                        echo "<p class='badge badge-info'>Kasir</p>";
                                     }
                                     elseif($user['kode_role'] == "RL0000000003")
                                     {
                                        echo "<p class='badge badge-success'>Pelanggan</p>";
                                     }
                                     elseif($user['kode_role'] == "RL0000000004")
                                     {
                                        echo "<p class='badge badge-primary'>Kurir</p>";
                                     }else{
                                        echo "<p class='badge badge-secondary'>Pengguna</p>";
                                     }        
                                    ?>
                                    <p class="text-md my-1"><?= $user['nama']; ?></p>
                                    <p class="text-muted text-sm my-1"><?= $user['username']; ?></p>
                                    <a href="<?= base_url('user'); ?>" class="btn btn-sm btn-primary my-1">View Profile</a>
                                </div>
                            </div>
                        </div>
                        <!-- User Mini Profile End -->
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item">
                            <i class="fas fa-fw fa-sign-out-alt text-red"></i>
                            <a href="<?= base_url('auth/logout'); ?>" class="text-red ml-2">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->