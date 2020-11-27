<div class="content-wrapper">
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text dark">Daftar Stock In</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Stock In
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Container Fluid End -->
    </div>

    <!-- Content Header (Page Header) End-->

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
                            <h4 class="m-0 text-dark">Tabel Stock In</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= base_url('kasir/ItemIn'); ?>" class="btn btn-primary btn-sm float-right">
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
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Thead End -->
                        <!-- TBody -->
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>STOK0000001</td>
                                <td>Kopi</td>
                                <td>20</td>
                                <td>01-09-2020</td>
                                <td class="d-flex justify-content-around">
                                    <a href="#" data-toogle="modal" class="btn btn-xs btn-info">
                                        <i class="fas fa-fw fa-eye text-white"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-danger btnDeleteUnits">
                                        <i class="fas fa-fw fa-trash-alt"></i>
                                    </a>

                                </td>
                            </tr>
                        </tbody>
                        <!-- TBody End -->
                    </table>
                </div>
                <!-- Card Body End -->
            </div>
            <!-- Card End -->
        </div>
    </section>
    <!-- Content Main End -->
</div>