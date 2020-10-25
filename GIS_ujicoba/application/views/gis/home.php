<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home GIS</h1>
                </div>
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol> -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content justify-content-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-map-signs float-left bg-warning p-4"></i>
                            <h4 class="card-title pt-4 float-right">Your GIS -
                                <small class="category">Here is your Maps</small>
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
</div>
</div>
</section>
</div>

<?php

$this->load->view('templates/custom-footer');
$this->load->view('templates/dist-footer');

?>
<script>
var mymap = L.map('mapid').setView([-8.157619, 113.722875], 7);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'
}).addTo(mymap);

    var icon_toko = L.icon({
        iconUrl : '<?= base_url(); ?>assets/dist/custom-icon/shop.png',
        iconSize : [35, 35]
    });

<?php
    foreach($cabang as $cb) :    
?>

    L.marker([<?= $cb['latitude'] .",". $cb['longitude']; ?>],{icon:icon_toko}).addTo(mymap)
    .bindPopup("<b>Nama Cabang : <?= $cb['nama_cabang']; ?></b><br/>"
    +"Pemilik Cabang : <?= $cb['pemilik_cabang']; ?><br/>"
    +"Keterangan : <?= $cb['keterangan']; ?><br/>");

<?php  
    endforeach;
?>
</script>