<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
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
                            <a href="" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#formTambahMenu">
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
                    <table id="dataTableMenu" class="table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Menu</th>
                                <th>Menu</th>
                                <th>Icon</th>
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
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-secondary">
                                            <i class=" <?= $menus['icon']; ?>"></i>
                                        </button>
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="javascript:void(0)" data-kode="<?= $menus['kode_menu']; ?>" class="btn btn-primary btn-xs mx-auto btn-view-menu" data-toggle="modal" data-target="#viewModal">
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-kode="<?= $menus['kode_menu']; ?>" class="btn btn-danger btn-xs mx-auto btn-delete-menu">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-kode="<?= $menus['kode_menu']; ?>" class="btn btn-warning btn-xs mx-auto btn-edit-menu" data-toggle="modal" data-target="#formUbahMenu">
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
                                <th>Icon</th>
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
<div class="modal fade" id="formTambahMenu">
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
                <form action="<?= base_url('menu'); ?>" method="post">
                    <!-- Input Group -->
                    <div class="form-group">
                        <label for="kode_menu">Kode Menu</label>
                        <?php
                        // Mengambil data terakhir di database
                        $data = $this->menu->getLastIdMenu();
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
                    <!-- Input Group -->
                    <div class="form-group">
                        <label for="icon_menu">Menu Icon</label>
                        <div class="input-group">
                            <input type="text" name="icon_menu" id="icon_menu" class="form-control" placeholder="ex: fas fa-fw fa-eye">
                            <div class="input-group-append">
                                <button class="btn btn-info btn-sm btn-modal-icon" data-form="tambah" type="button" data-toggle="modal" data-target="#previewIconModal">
                                    <i class="fas fa-fw fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <?= form_error('icon_menu', '<p class="text-danger text-sm ml-2">', '</p>'); ?>
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
<div class="modal fade" id="formUbahMenu">
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
                <form action="<?= base_url('menu/editMenu/'); ?>" method="post" id="formEditMenu">
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
                    <!-- Input Group -->
                    <div class="form-group">
                        <label for="icon_menu">Menu Icon</label>
                        <div class="input-group">
                            <input type="text" name="icon_menu" id="icon_menu" class="form-control" placeholder="ex: fas fa-fw fa-eye">
                            <div class="input-group-append">
                                <button class="btn btn-info btn-sm btn-modal-icon" data-form="ubah" type="button" data-toggle="modal" data-target="#previewIconModal">
                                    <i class="fas fa-fw fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <?= form_error('icon_menu', '<p class="text-danger text-sm ml-2">', '</p>'); ?>
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
                <!-- Input Group -->
                <div class="form-group">
                    <label for="icon_menu">Submenu Icon</label>
                    <input type="text" name="icon_menu" id="icon_menu" class="form-control" readonly>
                </div>
                <!-- Input Group End -->
                <!-- Input Group -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12">
                            <label for="preview_icon">Submenu Icon Preview</label>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <button class="btn btn-secondary btn-lg" id="preview_icon_menu" disabled>
                                <i class=""></i>
                            </button>
                        </div>
                    </div>
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

<!-- Modal Preview Icon -->
<div class="modal fade" id="previewIconModal">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Preview Icon</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Row -->
                <div class="row icon-row" data-form="">

                    <!-- 4 Icon -->
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-secondary btn-sm btn-select-icon">
                            <i class="fas fa-eye"></i>
                        </button>
                        <p class="text-sm text-dark">Eye</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-secondary btn-sm btn-select-icon">
                            <i class="fas fa-edit"></i>
                        </button>
                        <p class="text-sm text-dark">Edit</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-user"></i>
                        </button>
                        <p class="text-sm text-dark">User</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-cog"></i>
                        </button>
                        <p class="text-sm text-dark">Setting</p>
                    </div>
                    <!-- 4 Icon End -->

                    <!-- 4 Icon -->
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </button>
                        <p class="text-sm text-dark">Tachometer Alt</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-trash"></i>
                        </button>
                        <p class="text-sm text-dark">Trash</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <p class="text-sm text-dark">Trash Alt</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-times"></i>
                        </button>
                        <p class="text-sm text-dark">Times</p>
                    </div>
                    <!-- 4 Icon End -->

                    <!-- 4 Icon -->
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-secondary btn-sm btn-select-icon">
                            <i class="fas fa-folder"></i>
                        </button>
                        <p class="text-sm text-dark">Folder</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-folder-open"></i>
                        </button>
                        <p class="text-sm text-dark">Folder Open</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-truck"></i>
                        </button>
                        <p class="text-sm text-dark">Truck</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-users"></i>
                        </button>
                        <p class="text-sm text-dark">Users</p>
                    </div>
                    <!-- 4 Icon End -->

                    <!-- 4 Icon -->
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-boxes"></i>
                        </button>
                        <p class="text-sm text-dark">Boxes</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-cash-register"></i>
                        </button>
                        <p class="text-sm text-dark">Cash Register</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-dolly-flatbed"></i>
                        </button>
                        <p class="text-sm text-dark">Dolly Flatbed</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-truck-loading"></i>
                        </button>
                        <p class="text-sm text-dark">Truck Loading</p>
                    </div>
                    <!-- 4 Icon End -->

                    <!-- 4 Icon -->
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                        <p class="text-sm text-dark">Sign Out Alt</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-receipt"></i>
                        </button>
                        <p class="text-sm text-dark">Receipt</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-book"></i>
                        </button>
                        <p class="text-sm text-dark">Book</p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="button" class="btn btn-sm btn-secondary btn-select-icon">
                            <i class="fas fa-link"></i>
                        </button>
                        <p class="text-sm text-dark">Link</p>
                    </div>
                    <!-- 4 Icon End -->

                </div>
                <!-- Row End -->

                <!-- Separator -->
                <hr class="text-dark">
                <!-- Separator End -->

                <!-- Row -->
                <div class="row mx-2">
                    <div class="col-12">
                        <p class="text-sm text-dark">Anda dapat menekan salah satu icon, maka field Icon Submenu akan terisi secara otomatis.</p>
                    </div>
                    <div class="col-">
                        <p class="text-sm text-dark">
                            Jika anda membutuhkan icon lainnya, harap kunjungi <a href="https://fontawesome.com/icons" class="text-primary" target="_blank">fontawesome.com <sup><i class="fas fa-xs fa-external-link-alt"></i></sup></a>
                        </p>
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Modal Body End -->
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-dismiss="modal" type="button">
                    <i class="fas fa-fw fa-times"></i>
                    Batal
                </button>
            </div>
            <!-- Modal Footer End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog End -->
</div>
<!-- Modal Preview Icon End -->