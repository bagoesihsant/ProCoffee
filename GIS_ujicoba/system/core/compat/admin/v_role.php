<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-dark m-0"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Role
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
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="m-0">Tabel Role</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalTambah">
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
                    <table class="table table-bordered table-striped" id="dataTableRole">
                        <!-- Thead -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Hak Akses</th>
                                <th>Hak Akses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>
                            <!-- Looping Data -->
                            <?php
                            $i = 1;
                            foreach ($role as $roles) :
                            ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $roles['kode_role']; ?></td>
                                    <td><?= $roles['role']; ?></td>
                                    <td class="d-flex justify-content-center">
                                        <button type="button" data-kode="<?= $roles['kode_role']; ?>" class="btn btn-primary btn-xs mx-auto btn-view" data-toggle="modal" data-target="#modalDetail">
                                            <i class="fas fa-fw fa-eye"></i>
                                        </button>
                                        <button type="button" data-kode="<?= $roles['kode_role']; ?>" class="btn btn-danger btn-xs mx-auto btn-delete">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </button>
                                        <button type="button" data-kode="<?= $roles['kode_role']; ?>" class="btn btn-warning btn-xs mx-auto btn-edit" data-toggle="modal" data-target="#modalEdit">
                                            <i class="fas fa-fw fa-edit text-white"></i>
                                        </button>
                                        <a href="<?= base_url('role/userAkses/' . $roles['kode_role']); ?>" class="btn btn-info btn-xs mx-auto">
                                            <i class="fas fa-fw fa-cog text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                            <!-- Looping Data End -->
                        </tbody>
                        <!-- Tbody End -->
                        <!-- Tfoot -->
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Kode Hak Akses</th>
                                <th>Hak Akses</th>
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
<div class="modal fade" id="modalTambah">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Hak Akses</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?= base_url('role'); ?>" method="post">
                    <!-- Mengambil kode sebelumnya dari database -->
                    <?php
                    // Mengambil data terakhir dari tabel hak akses
                    $data = $this->role->getLastIdRole();
                    // Memeriksa apakah ada data terakhir yang ditemukan atau tidak
                    if ($data->num_rows() > 0) {
                        // Jika ditemukan data
                        $data = $data->row_array();
                        $data = $this->hookdevlib->autonumber($data['kode_role'], 2, 10);
                    } else {
                        $data = "RL0000000001";
                    }
                    ?>
                    <div class="form-group">
                        <label for="kode_role">Kode Hak Akses</label>
                        <input type="text" name="kode_role" id="kode_role" class="form-control" value="<?= $data; ?>" readonly>
                        <?= form_error('kode_role', '<p class="text-danger text-sm ml-3">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="role">Hak Akses</label>
                        <input type="text" name="role" id="role" class="form-control" placeholder="ex: Administrator">
                        <?= form_error('role', '<p class="text-danger text-sm ml-3">', '</p>'); ?>
                    </div>
            </div>
            <!-- Modal Body End -->
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <!-- Modal Footer End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog End -->
</div>
<!-- Modal Tambah End -->

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail Hak Akses</h4>
                <button class="close" type="button" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="kode_role">Kode Hak Akses</label>
                    <input type="text" class="form-control" id="kode_role" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="role">Hak Akses</label>
                    <input type="text" class="form-control" id="role" value="" readonly>
                </div>
            </div>
            <!-- Modal Body End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog End -->
</div>
<!-- Modal Detail End -->

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Hak Akses</h4>
                <button class="close" type="button" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?= base_url('role/editRole'); ?>" method="post" id="formEditRole">
                    <div class="form-group">
                        <label for="kode_role">Kode Hak Akses</label>
                        <input type="text" name="kode_role" id="kode_role" class="form-control" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="role">Hak Akses</label>
                        <input type="text" name="role" id="role" class="form-control" value="">
                    </div>
            </div>
            <!-- Modal Body End -->
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <!-- Modal Footer End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog End -->
</div>
<!-- Modal Edit End -->