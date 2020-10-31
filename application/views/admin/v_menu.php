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
                            <tr>
                                <td>1.</td>
                                <td>MN001</td>
                                <td>Menu</td>
                                <td class="d-flex justify-content-center">
                                    <a href="" class="btn btn-primary btn-xs mx-auto">
                                        <i class="fas fa-fw fa-eye"></i>
                                    </a>
                                    <a href="" class="btn btn-danger btn-xs mx-auto">
                                        <i class="fas fa-fw fa-trash-alt"></i>
                                    </a>
                                    <a href="" class="btn btn-warning btn-xs mx-auto">
                                        <i class="fas fa-fw fa-edit text-white"></i>
                                    </a>
                                </td>
                            </tr>
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
                <form action="" method="post">
                    <!-- Input Group -->
                    <div class="form-group">
                        <label for="kode_menu">Kode Menu</label>
                        <input type="text" name="kode_menu" id="kode_menu" class="form-control" readonly>
                    </div>
                    <!-- Input Group End -->
                    <!-- Input Group -->
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" name="menu" id="menu" class="form-control" placeholder="ex: Admin">
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