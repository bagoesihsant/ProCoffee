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
                        <div id="mapid3" style="height: 500px;"></div>
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
                            <?php  
                                echo form_open( base_url('gis/edit_mapping/' . $cabang->id_cabang));
                            ?>
                                <input type="hidden" name="id_cabang" value="<?= $cabang->id_cabang ?>">
                                <div class="form-group">
                                    <label>Nama Cabang</label>
                                    <input type="text" name="nama_cabang" value="<?= $cabang->nama_cabang; ?>" class="form-control" placeholder="Masukkan Nama Cabang" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Cabang</label>
                                    <input type="text" name="alamat_cabang" value="<?= $cabang->alamat; ?>" class="form-control" placeholder="Masukkan Alamat Cabang" required>
                                </div>
                                <div class="form-group">
                                    <label>Status Cabang</label>
                                    <select name="status_cabang" id="status_cabang" class="form-control" required>
                                        <option value="<?= $cabang->status_cabang ?>" selected disabled><?= $cabang->status_cabang ?></option>
                                        <option value="<?= $cabang->status_cabang ?>" selected hidden><?= $cabang->status_cabang ?></option>
                                        <option value="Nonaktif">Nonaktif</option>
                                        <option value="Aktif">Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pemilik Cabang</label>
                                    <input type="text" name="pemilik_cabang" value="<?= $cabang->pemilik_cabang; ?>" class="form-control" placeholder="Masukkan Pemilik Cabang" required>
                                </div>
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" name="Latitude" id="Latitude" value="<?= $cabang->latitude; ?>" class="form-control" placeholder="Masukkan Latitude" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" name="Longitude" id="Longitude" value="<?= $cabang->longitude; ?>" class="form-control" placeholder="Masukkan Longitude" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" value="<?= $cabang->keterangan; ?>" class="form-control" placeholder="Masukkan Keterangan" required>
                                </div>
                                <div class="card-footer">
                                    <a href="<?= base_url() . 'gis/mapping'; ?>" class="btn btn-secondary">Batal</a>
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
</div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<?php $this->load->view('templates/admin/footer'); ?>
<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[<?= $cabang->latitude . "," . $cabang->longitude; ?>];	
}

var mymap1 = L.map('mapid3').setView([<?= $cabang->latitude . "," . $cabang->longitude; ?>], 14);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'
}).addTo(mymap1);

mymap1.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
	draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
	draggable : 'true'
	}).bindPopup(position).update();
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
	var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
	marker.setLatLng(position, {
	draggable : 'true'
	}).bindPopup(position).update();
	mymap1.panTo(position);
});

$('#location-button').click(function(){
	if(navigator.geolocation)
		navigator.geolocation.getCurrentPosition(function(location){
			$("#Latitude").val(location.coords.latitude);
			$("#Longitude").val(location.coords.longitude);

			var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
			marker.setLatLng(position, {
				draggable : 'true'
			}).bindPopup(position).update()
			mymap1.panTo(position);
		});
	else
		console.log("Geolocation is not supported");
})
mymap1.addLayer(marker);
</script>

