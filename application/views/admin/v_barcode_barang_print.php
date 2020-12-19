<!DOCTYPE html>
<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode|Qrcode</title>
</head>
<body class="justify-content-center">
        <?php 

        if(isset($barcode)){ //jika Barcode

            foreach($barcode as $b){

            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            echo $generator->getBarcode($b->barcode, $generator::TYPE_CODE_128); 
            echo $b->barcode;

            }

        ?>
        <?php

        }else if(isset($qrcode)){ //jika QR Code
            foreach($qrcode as $q){
                $img = base_url('assets/items_qrcode_img/').$q->kode_barang.'.png';
        ?>
                <img src="<?=$img?>" id="qrcode" style="width:200px" class="justify-content-center"><br>
                <p class="text-center">
                    <?=$q->barcode?>
                </p>

            <?php 
                }
        }else{ //jika tidak keduanya maka akan kembali ke index barang
            redirect('admin/C_barang');
        }
            ?>
</body>
</html>
