<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title; ?></h1>
            </div>
        </div>
    </div>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-sm-7">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Maps</h3>
                </div>
                <div class="card-body">
                    <!-- Nanti disini tempat maps nya -->
                        <div id="mapid2" style="height: 500px;"></div>
                    <!-- Akhir isi maps -->
                </div>
            </div>
        </div>
        <!-- Form Formulir inputan -->
        <div class="col-sm-5">
            <!-- general form elements disabled -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Form Cabang</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                        <!-- text input -->
                            <form action="<?= base_url('C_gis/create_mapping'); ?>" method="post">
                                <div class="form-group">
                                    <label>Nama Cabang</label>
                                    <input type="text" name="nama_cabang" class="form-control" placeholder="Masukkan Nama Cabang" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Cabang</label>
                                    <input type="text" name="alamat_cabang" class="form-control" placeholder="Masukkan Alamat Cabang" required>
                                </div>
                                <div class="form-group">
                                    <label>Status Cabang</label>
                                    <select name="status_cabang" id="status_cabang" class="form-control" required>
                                        <option value="null" selected disabled>Silahkan memilih data terlebih dahulu</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                        <option value="Aktif">Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pemilik Cabang</label>
                                    <input type="text" name="pemilik_cabang" class="form-control" placeholder="Masukkan Pemilik Cabang" required>
                                </div>
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" name="Latitude" id="Latitude" class="form-control" placeholder="Masukkan Latitude" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" name="Longitude" id="Longitude" class="form-control" placeholder="Masukkan Longitude" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" required>
                                </div>
                                <div class="card-footer">
                                    <a href="<?= base_url() . 'C_gis/mapping'; ?>" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-success">Simpan Data</button>
                                    <button id="location-button" type="button" class="btn btn-primary">Get Location Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- /.card-body -->
            </div>
        </div>
    </div>
            <!-- /.card-body -->
            <!-- /.card -->
    <!--/.col (right) -->
</div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
