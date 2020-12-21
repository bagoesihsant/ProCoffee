<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Sub Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Submenu
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Container Fluid End -->
    </div>
    <!-- Content Header ( Page Header ) End -->

    <!-- Content Main -->
    <section class="content-main">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <!-- Card -->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="m-0 text-dark">Tabel Sub Menu</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahModal">
                                <i class="fas fa-fw fa-plus"></i>
                                <span>Tambah</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Table Sub Menu -->
                    <table id="dataTableSubmenu" class="table table-bordered table-striped">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Sub Menu</th>
                                <th>Sub Menu</th>
                                <th>Menu</th>
                                <th>URL</th>
                                <th>Icon</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Looping Data Dari Database -->
                            <?php
                            $i = 1;
                            foreach ($submenu as $submenus) :
                            ?>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td><?= $submenus['kode_sub_menu']; ?></td>
                                    <td><?= $submenus['sub_menu']; ?></td>
                                    <td><?= $submenus['menu']; ?></td>
                                    <td><?= $submenus['url']; ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-secondary">
                                            <i class="<?= $submenus['icon']; ?>"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <!-- Memeriksa apakah status menu aktif atau tidak -->
                                        <?php
                                        if ($submenus['is_active'] == 1) :
                                        ?>
                                            <span class="text-success">AKTIF</span>
                                        <?php
                                        else :
                                        ?>
                                            <span class="text-danger">TIDAK AKTIF</span>
                                        <?php
                                        endif;
                                        ?>
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="javascript:void(0)" data-kode="<?= $submenus['kode_sub_menu']; ?>" class="btn btn-primary btn-xs mx-auto btn-view-submenu" data-toggle="modal" data-target="#viewModal">
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-kode="<?= $submenus['kode_sub_menu']; ?>" class="btn btn-danger btn-xs mx-auto btn-delete-submenu">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-kode="<?= $submenus['kode_sub_menu']; ?>" class="btn btn-warning btn-xs mx-auto btn-edit-submenu" data-toggle="modal" data-target="#editModal">
                                            <i class="fas fa-fw fa-edit text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                            <!-- Looping Data Dari Database End -->
                        </tbody>
                        <!-- Tbody End -->
                        <!-- Tfoot -->
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Kode Sub Menu</th>
                                <th>Sub Menu</th>
                                <th>Menu</th>
                                <th>URL</th>
                                <th>Icon</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <!-- Tfoot End -->
                    </table>
                    <!-- Table Sub Menu End -->
                </div>
                <!-- Card Body End -->
            </div>
            <!-- Card End -->
        </div>
        <!-- Container Fluid End -->
    </section>
    <!-- Content Main End -->

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
                <h4 class="modal-title">Tambah Sub Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Form -->
                <form action="<?= base_url('admin/submenu'); ?>" method="post" id="formTambahSubmenu">
                    <div class="form-group">
                        <?php
                        // Melakukan autonumber
                        // Mengambil data terakhir dari database
                        $lastData = $this->menu->getLastIdSubmenu();
                        // Memeriksa apakah ada data terakhir
                        if ($lastData->num_rows() > 0) {
                            // Jika ada data terakhir
                            $kode = $lastData->row_array();
                            $kode = $this->hookdevlib->autonumber($kode['kode_sub_menu'], 3, 9);
                        } else {
                            // Jika tidak ada data terakhir
                            $kode = "SBM000000001";
                        }
                        ?>
                        <label for="kode_sub_menu">Kode Submenu</label>
                        <input type="text" name="kode_sub_menu" id="kode_sub_menu" class="form-control" value="<?= $kode; ?>" readonly>
                        <?= form_error('kode_sub_menu', '<p class="text-danger text-sm ml-2">', '</p>'); ?>
                    </div>
                    <div class="from-group">
                        <label for="menu_sub_menu">Menu</label>
                        <select name="menu_sub_menu" id="menu_sub_menu" class="from-control custom-select">
                            <option value="">Pilih Salah Satu</option>
                            <?php
                            // Mengambil menu dari database
                            $menu = $this->menu->getAllMenu();
                            // Melakukan looping
                            foreach ($menu as $menus) :
                            ?>
                                <option value="<?= $menus['kode_menu'] ?>"><?= $menus['menu']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <?= form_error('menu_sub_menu', '<p class="text-danger text-sm ml-2">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="sub_menu">Submenu Title</label>
                        <input type="text" name="sub_menu" id="sub_menu" class="form-control" placeholder="ex: Manajemen Menu">
                        <?= form_error('sub_menu', '<p class="text-danger text-sm ml-2">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="url_sub_menu">Submenu URL</label>
                        <input type="text" name="url_sub_menu" id="url_sub_menu" class="form-control" placeholder="ex: admin/menu">
                        <?= form_error('url_sub_menu', '<p class="text-danger text-sm ml-2">', '</p>'); ?>
                    </div>
                    <!-- <div class="form-group">
                        <label for="icon_sub_menu">Submenu Icon</label>
                        <div class="input-group">
                            <input type="text" name="icon_sub_menu" id="icon_sub_menu" class="form-control" placeholder="ex: fas fa-fw fa-eye">
                            <div class="input-group-append">
                                <button class="btn btn-info btn-sm btn-modal-icon" data-form="tambah" type="button" data-toggle="modal" data-target="#previewIconModal">
                                    <i class="fas fa-fw fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <?= form_error('icon_sub_menu', '<p class="text-danger text-sm ml-2">', '</p>'); ?>
                    </div> -->
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="status_sub_menu" id="status_sub_menu" class="custom-control-input" value="1" checked>
                            <label for="status_sub_menu" class="custom-control-label">Aktifkan Menu</label>
                        </div>
                    </div>
            </div>
            <!-- Modal Body End -->
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <!-- Form End -->
            </div>
            <!-- Modal Footer End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog End -->
</div>
<!-- Modal Tambah End -->

<!-- Modal Edit Submenu -->
<div class="modal fade" id="editModal">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Submenu</h4>
                <button class="close" type="button" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Form -->
                <form action="<?= base_url('admin/editSubmenu'); ?>" method="post" id="formEditSubmenu">
                    <div class="form-group">
                        <label for="kode_sub_menu">Kode Submenu</label>
                        <input type="text" name="kode_sub_menu" id="kode_sub_menu" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="menu_sub_menu">Menu</label>
                        <select name="menu_sub_menu" id="menu_sub_menu" class="form-control custom-select">
                            <option value="">Pilih Salah Satu</option>
                            <!-- Looping Database -->
                            <?php
                            // Mengambil semua menu dari database
                            $menu = $this->menu->getAllMenu();
                            // Melakukan perulangan
                            foreach ($menu as $menus) :
                            ?>
                                <option value="<?= $menus['kode_menu'] ?>"><?= $menus['menu']; ?></option>
                            <?php
                            endforeach;
                            ?>
                            <!-- Looping Database End -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub_menu">Submenu Title</label>
                        <input type="text" name="sub_menu" id="sub_menu" class="form-control" placeholder="ex: Manajemen User">
                    </div>
                    <div class="form-group">
                        <label for="url_sub_menu">Submenu URL</label>
                        <input type="text" name="url_sub_menu" id="url_sub_menu" class="form-control" placeholder="ex: admin/submenu">
                    </div>
                    <!-- <div class="form-group">
                        <label for="icon_sub_menu">Submenu Icon</label>
                        <div class="input-group">
                            <input type="text" name="icon_sub_menu" id="icon_sub_menu" class="form-control" placeholder="ex: fas fa-fw fa-folder-plus">
                            <div class="input-group-append">
                                <button class="btn btn-info btn-sm btn-modal-icon" data-form="ubah" type="button" data-toggle="modal" data-target="#previewIconModal">
                                    <i class="fas fa-fw fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="status_sub_menu_edit" id="status_sub_menu_edit" class="custom-control-input" value="1">
                            <label for="status_sub_menu_edit" class="custom-control-label">Aktifkan Menu</label>
                        </div>
                    </div>
            </div>
            <!-- Modal Body End -->
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <!-- Form End -->
            </div>
            <!-- Modal Footer End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog End -->
</div>
<!-- Modal Edit Submenu End -->


<!-- Modal Preview Icon -->
<!-- <div class="modal fade" id="previewIconModal"> -->
<!-- Modal Dialog -->
<!-- <div class="modal-dialog"> -->
<!-- Modal Content -->
<!-- <div class="modal-content"> -->
<!-- Modal Header -->
<!-- <div class="modal-header">
                <h4 class="modal-title">Preview Icon</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
<!-- Modal Header End -->
<!-- Modal Body -->
<!-- <div class="modal-body"> -->
<!-- Row -->
<!-- <div class="row icon-row" data-form=""> -->

<!-- 4 Icon -->
<!-- <div class="col-sm-3 text-center">
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
                    </div> -->
<!-- 4 Icon End -->

<!-- 4 Icon -->
<!-- <div class="col-sm-3 text-center">
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
                    </div> -->
<!-- 4 Icon End -->

<!-- 4 Icon -->
<!-- <div class="col-sm-3 text-center">
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
                    </div> -->
<!-- 4 Icon End -->

<!-- 4 Icon -->
<!-- <div class="col-sm-3 text-center">
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
                    </div> -->
<!-- 4 Icon End -->

<!-- 4 Icon -->
<!-- <div class="col-sm-3 text-center">
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
                    </div> -->
<!-- 4 Icon End -->

<!-- </div> -->
<!-- Row End -->

<!-- Separator -->
<!-- <hr class="text-dark"> -->
<!-- Separator End -->

<!-- Row -->
<!-- <div class="row mx-2">
                    <div class="col-12">
                        <p class="text-sm text-dark">Anda dapat menekan salah satu icon, maka field Icon Submenu akan terisi secara otomatis.</p>
                    </div>
                    <div class="col-">
                        <p class="text-sm text-dark">
                            Jika anda membutuhkan icon lainnya, harap kunjungi <a href="https://fontawesome.com/icons" class="text-primary" target="_blank">fontawesome.com <sup><i class="fas fa-xs fa-external-link-alt"></i></sup></a>
                        </p>
                    </div>
                </div> -->
<!-- Row End -->
<!-- </div> -->
<!-- Modal Body End -->
<!-- Modal Footer -->
<!-- <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-dismiss="modal" type="button">
                    <i class="fas fa-fw fa-times"></i>
                    Batal
                </button>
            </div> -->
<!-- Modal Footer End -->
<!-- </div> -->
<!-- Modal Content End -->
<!-- </div> -->
<!-- Modal Dialog End -->
<!-- </div> -->
<!-- Modal Preview Icon End -->

<!-- Modal View Submenu -->
<div class="modal fade" id="viewModal">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail Submenu</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="kode_sub_menu">Kode Submenu</label>
                    <input type="text" name="kode_sub_menu" id="kode_sub_menu" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="menu_sub_menu">Menu</label>
                    <select name="menu_sub_menu" id="menu_sub_menu" class="form-control custom-select" readonly>
                        <option value="">Pilih Salah Satu</option>
                        <!-- Looping Dari Database -->
                        <?php
                        // Mengambil data dari database
                        $menu = $this->menu->getAllMenu();
                        // Melakukan looping
                        foreach ($menu as $menus) :
                        ?>
                            <option value="<?= $menus['kode_menu'] ?>"><?= $menus['menu']; ?></option>
                        <?php
                        endforeach;
                        ?>
                        <!-- Looping Dari Database End -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_menu">Submenu Title</label>
                    <input type="text" name="sub_menu" id="sub_menu" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="url_sub_menu">Submenu URL</label>
                    <input type="text" name="url_sub_menu" id="url_sub_menu" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="status_sub_menu">Status Submenu</label>
                    <input type="text" name="status_sub_menu" id="status_sub_menu" class="form-control" readonly>
                </div>
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
<!-- Modal View Submenu End -->