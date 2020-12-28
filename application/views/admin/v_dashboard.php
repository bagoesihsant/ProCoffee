<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Dashboard
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $total_user ?></h3>

                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="<?= base_url('akun'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $total_menu ?></h3>

                            <p>Menu</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-grid"></i>
                        </div>
                        <a href="<?= base_url('menu'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $total_smenu ?></h3>
                            <p>Sub Menu</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-cog"></i>
                        </div>
                        <a href="<?= base_url('menu/submenu'); ?>" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $total_role ?></h3>
                            <p>Jenis Role User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-cog fa-fw"></i>
                        </div>
                        <a href="<?= base_url('menu/submenu'); ?>" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <!-- Mapping GIS -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-map-signs float-left bg-warning p-4"></i>
                                <h4 class="card-title pt-4 float-right">GIS PROCOFFEE -
                                    <small class="category">Pemetaan Data Cabang Toko Kopi ProCoffee</small>
                                </h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body card-primary card-outline">
                                <div id="mapid" style="height: 500px;"></div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
<script>
    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

        var mymap = L.map('mapid').setView([-8.157619, 113.722875], 7);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        }).addTo(mymap);

            var icon_toko = L.icon({
                iconUrl : '<?= base_url(); ?>assets/dist/img/gis/shop.png',
                iconSize : [35, 35]
            });

        <?php
            foreach($cabang as $cb) :    
        ?>

            L.marker([<?= $cb['latitude'] .",". $cb['longitude']; ?>],{icon:icon_toko}).addTo(mymap)
            .bindPopup("<b>Nama Cabang : <?= $cb['nama_cabang']; ?></b><br/>"
            +"Pemilik Cabang : <?= $cb['pemilik_cabang']; ?><br/>"
            +"Keterangan : <?= $cb['keterangan']; ?><br/>"
            +"<br/><center><a href='https://www.google.com/maps/dir/?api=1&origin=" + location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $cb['latitude'] ?>,<?= $cb['longitude'] ?>' class='btn btn-sm btn-outline-primary' target='_blank'>Rute Alamat</a></center>"
            );

        <?php  
            endforeach;
        ?>

    });
</script>

            <!-- Akhir Mapping GIS -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->