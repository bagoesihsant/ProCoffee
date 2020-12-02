<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header ( Page Header ) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Generate</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item">Items</li>
                        <li class="breadcrumb-item">Barcode</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Header ( Page Header ) End -->

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Card -->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="m-0">Barcode Generator</h4>
                        </div>
                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                
                <?php foreach($barcode as $b){

                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    echo $generator->getBarcode($b->barcode, $generator::TYPE_CODE_128); 
                    echo $b->barcode;
                } ?>

                <br>
                <a href="<?=base_url('admin/C_barang/barcode_print/'). $b->kode_barang?>" target="_blank" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-print pl"></i>
                        Cetak Barcode 
                </a>
                </div>
                <!-- Card Body End -->
            </div>
            <!-- Card End -->
        </div>

    </section>
    <!-- Main Content End -->

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Card -->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="m-0">QR-code Generator</h4>
                        </div>
                    </div>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body">
                
                <?php foreach($barcode as $b){

                    $qrCode = new Endroid\QrCode\QrCode($b->barcode);
                    $qrCode->writeFile('assets/items_qrcode_img/'.$b->kode_barang.'.png');
                } ?>

                <!-- yang di print  -->
                <div id="qrcode-print">
                    <img src="<?=base_url('assets/items_qrcode_img/').$b->kode_barang.'.png'?>" style="width:200px"> <br>
                </div>
                <!-- yang di print end  -->

                <?=$b->barcode?>

                    <br>
                    <a href="<?=base_url('admin/C_barang/qrcode_print/'). $b->kode_barang?>" target="_blank" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-print pl"></i>
                        Cetak Qrcode 
                    </a>

                    <div class="text-right">
                        <a href="<?= base_url('admin/C_barang')?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-chevron-left"></i>
                            kembali
                        </a>
                    </div>
                </div>
                <!-- Card Body End -->
                

            </div>
            <!-- Card End -->
        </div>
    </section>
    <!-- Main Content End -->

</div>
<!-- Content Wrapper End -->