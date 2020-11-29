<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Stock Out</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Stock Out
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
                            <h4 class="m-0 text-dark">Tabel Stock Out</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= base_url('kasir/ItemOut'); ?>" class="btn btn-primary btn-sm float-right">
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
                                <th>No</th>
                                <th>Barcode</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Detail</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- Tbody -->
                        <tbody>


                            <tr>
                                <td>1</td>
                                <td>STOK0000001</td>
                                <td>Kopi</td>
                                <td>1</td>
                                <td>Kadaluarsa</td>
                                <td>01-09-2020</td>
                                <td class="d-flex justify-content-around">
                                    <a href="#" data-toggle="modal" class="btn btn-xs btn-info">
                                        <i class="fas fa-fw fa-eye text-white"></i>
                                    </a>
                                    <a href="#modalDelete" data-toggle="modal" data-target="" class="btn btn-xs btn-danger btnDeleteUnits">
                                        <i class="fas fa-fw fa-trash-alt"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" class="btn btn-xs btn-warning">
                                        <i class="fas fa-fw fa-edit text-white"></i>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                        <!-- Tbody End -->
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