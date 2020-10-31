<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Menu
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Container Fluid End -->
    </div>
    <!-- Content Header ( Page Header ) End -->

    <!-- Main Content -->
    <section class="main-content">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <!-- Card -->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="m-0">Tabel Menu</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahModal">
                                <i class="fas fa-fw fa-plus"></i>
                                <span>Tambah</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Data Table -->
                    <table id="dataTableMenu" class="tableMenu table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Menu</th>
                                <th>Menu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Looping Data dari Database -->
                            <?php
                            $i = 1;
                            foreach ($menu as $menus) :
                            ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $menus['kode_menu']; ?></td>
                                    <td><?= $menus['menu']; ?></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="javascript:void(0)" data-kode="<?= $menus['kode_menu']; ?>" class="btn btn-primary btn-xs mx-auto btn-view-menu" data-toggle="modal" data-target="#viewModal">
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-kode="<?= $menus['kode_menu']; ?>" class="btn btn-danger btn-xs mx-auto btn-del">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-kode="<?= $menus['kode_menu']; ?>" class="btn btn-warning btn-xs mx-auto btn-edit-menu" data-toggle="modal" data-target="#editModal">
                                            <i class="fas fa-fw fa-edit text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                            <!-- Looping Data dari Database End -->
                        </tbody>
                        <!-- Tbody End -->
                        <!-- Tfoot -->
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Kode Menu</th>
                                <th>Menu</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <!-- Tfoot End -->
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


<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?= base_url('admin/menu'); ?>" method="post">
                    <!-- Input Group -->
                    <div class="form-group">
                        <label for="kode_menu">Kode Menu</label>
                        <?php
                        // Mengambil data terakhir di database
                        $data = $this->menu->getLastId();
                        // Memeriksa apakah ada kode yang didapat dari database
                        if ($data->num_rows() > 0) {
                            // Jika ditemukan data
                            $kode = $data->row_array();
                            $kode = $this->hookdevlib->autonumber($kode['kode_menu'], 4, 8);
                        } else {
                            // Jika tidak ditemukan data
                            $kode = "MENU00000001";
                        }
                        ?>
                        <input type="text" name="kode_menu" id="kode_menu" class="form-control" value="<?= $kode; ?>" readonly>
                        <?= form_error("kode_menu", '<p class="text-danger ml-1 mt-1 text-sm">', '</p>') ?>
                    </div>
                    <!-- Input Group End -->
                    <!-- Input Group -->
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" name="menu" id="menu" class="form-control" placeholder="ex: Admin">
                        <?= form_error("menu", '<p class="text-danger ml-1 mt-1 text-sm">', '</p>') ?>
                    </div>
                    <!-- Input Group End -->
            </div>
            <!-- Modal Body End -->
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
            <!-- Modal Footer End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog End -->
</div>
<!-- Modal Tambah End -->

<!-- Modal Edit -->
<div class="modal fade" id="editModal">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?= base_url('admin/editMenu/'); ?>" method="post" id="formEditMenu">
                    <!-- Input Group -->
                    <div class="form-group">
                        <label for="kode_menu">Kode Menu</label>
                        <input type="text" name="kode_menu" id="kode_menu" class="form-control" readonly>
                        <?= form_error("kode_menu", '<p class="text-danger ml-1 mt-1 text-sm">', '</p>') ?>
                    </div>
                    <!-- Input Group End -->
                    <!-- Input Group -->
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" name="menu" id="menu" class="form-control" placeholder="ex: Admin">
                        <?= form_error("menu", '<p class="text-danger ml-1 mt-1 text-sm">', '</p>') ?>
                    </div>
                    <!-- Input Group End -->
            </div>
            <!-- Modal Body End -->
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
            <!-- Modal Footer End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog End -->
</div>
<!-- Modal Edit End -->

<!-- Modal View -->
<div class="modal fade" id="viewModal">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Input Group -->
                <div class="form-group">
                    <label for="kode_menu">Kode Menu</label>
                    <input type="text" name="kode_menu" id="kode_menu" class="form-control" readonly>
                </div>
                <!-- Input Group End -->
                <!-- Input Group -->
                <div class="form-group">
                    <label for="menu">Menu</label>
                    <input type="text" name="menu" id="menu" class="form-control" placeholder="ex: Admin" readonly>
                </div>
                <!-- Input Group End -->
            </div>
            <!-- Modal Body End -->
            <!-- Modal Footer -->
            <div class="modal-footer">
            </div>
            <!-- Modal Footer End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog End -->
</div>
<!-- Modal View End -->