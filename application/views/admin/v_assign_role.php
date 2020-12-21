<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-dark m-0">Manajemen Akses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">Menu</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span>Manajemen Akses User</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Container Fluid End -->
    </div>
    <!-- Content Header (Page Header) End -->

    <!-- Main Content -->
    <section class="main-content">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <!-- Card -->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <h4 class="m-0">
                        <!-- Mengambil detail menu -->
                        <?php
                        $result = $this->role->getDetailRole(['kode_role' => $kode_role]);
                        ?>
                        Manajemen Akses User - <strong><?= $result['role']; ?></strong>
                    </h4>
                    <p class="text-sm text-muted mb-0 mt-2">
                        Menu yang
                        <strong>Aktif</strong>
                        ditandai dengan button berwarna
                        <span class="text-success">
                            <strong>Hijau</strong>
                        </span> dan Menu yang
                        <strong>Belum Aktif</strong>
                        ditandai dengan button berwarna
                        <span class="text-danger">
                            <strong>Merah</strong>
                        </span>
                    </p>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Data Table -->
                    <table class="table table-striped table-bordered" id="dataTableAkses">
                        <!-- Thead -->
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Menu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Looping data dari database -->
                            <?php
                            $i = 1;
                            foreach ($menu as $menus) :
                            ?>
                                <tr class="text-center">
                                    <td><?= $i; ?></td>
                                    <td><?= $menus['menu']; ?></td>
                                    <td>
                                        <!-- Memeriksa dari database apakah ada menu yang sudah terdaftar dengan hak akses ini atau belum -->
                                        <?php
                                        // Membuat Array Data
                                        $data = [
                                            'kode_menu' => $kode_role,
                                            'kode_menu' => $menus['kode_menu']
                                        ];

                                        // Mengambil data dari database
                                        $result = $this->role->checkAccess($data);

                                        // Memeriksa apakah ada data yang ditemukan
                                        if ($result->num_rows() > 0) :
                                            // Jika data ditemukan
                                        ?>
                                            <button class="btn btn-success rounded text-white btn-aktivasi-menu" data-menu="<?= $menus['kode_menu']; ?>" data-role="<?= $kode_role; ?>" type="button">
                                                <span>Aktif</span>
                                            </button>
                                        <?php
                                        else :
                                            // Jika data tidak ditemukan
                                        ?>
                                            <button class="btn btn-danger rounded text-white btn-disable-menu" data-menu="<?= $menus['kode_menu']; ?>" data-role="<?= $kode_role; ?>" type="button">
                                                <span>Nonaktif</span>
                                            </button>
                                        <?php
                                        endif;
                                        ?>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                        <!-- Tbody End -->
                        <!-- Tfoot -->
                        <tfoot>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Menu</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <!-- Tfoor End -->
                    </table>
                    <!-- Data Table End -->
                </div>
                <!-- Card Body End -->
            </div>
            <!-- Card End -->
        </div>
        <!-- Container Fluid End -->
    </section>
    <!-- Main Content End -->

</div>
<!-- Content Wrapper End -->