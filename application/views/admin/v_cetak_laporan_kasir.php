<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
</head>
<body>
<?php
        //membuat format rupiah dengan PHP
        function rupiah($angka){
            $hasil_rupiah = number_format($angka,0,',','.');
            return $hasil_rupiah;
        }
        // echo rupiah(1528700);
        //membuat format rupiah dengan PHP end


    foreach($transaksi as $t) {
?>

<div class="layout-print-struk">
    <table style="border-bottom: 1px solid #000;border-top: 1px solid #000;display: table;'" width="100%">
    <tr>
        <td width="20%">
            <img src="<?= base_url('assets/'); ?>dist/img/coffee-bean-black.png" 
            style="padding-top:2px; padding-bottom:2px;"
            width="30px">
        </td>

        <td width="60%"> 
        <table style="vertical-align: middle;display: table;">
            <tr><td align="center" style="text-transform: uppercase; font-size: 18px; font-weight:bold;">PROCOFFEE</td> </tr>
            <tr><td align="center" style="font-size: 12px;">JL. Banyuwangi No.2 Garahan Silo</td> </tr>
            <tr><td align="center" style="font-size: 12px;">Telp. 086695994871</td> </tr>
        </table>
        </td>
        <td width="20%"> </td>

    </tr>
    </table>

    <table width="100%" style="border-bottom: 1px solid #000;display: table;">
        <tr><td width="40%">INVOICE</td><td width="60%">: <?= $t->invoice?></td></tr>
        <tr><td width="40%">Nomor</td><td width="60%">: <?= $t->kode_transaksi?></td></tr>
        <tr><td>Tanggal</td><td>: <?=$t->date?></td></tr>
        <tr><td>Pelanggan</td><td style="white-space: nowrap">: <?=$t->nama?></td></tr>
    </table>

        
<!-- looping detail trnsaksi offline -->
    <table width="100%" style="border-bottom: 1px solid #000;display: table;">
        <tr>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th style="text-align: right;">Harga</th>
            <th style="text-align: right;">Disc</th>
            <th style="text-align: right;">Subtotal</th>
        </tr>
        <?php foreach($dtl_transaksi as $d){ ?>
        <tr>
            <td align="center">Kopi</td>
            <td align="center"><?=$d->qty?></td>
            <td align="right"><?=rupiah($d->price)?></td>
            <td align="right"><?=rupiah($d->discount_item)?></td>
            <td align="right"><?=rupiah($d->total)?></td>
        </tr>
<!-- looping detail trnsaksi offline end -->
            <?php } ?>

        
    </table>
    
    <table width="100%" style="border-bottom: 1px dashed #000;display: table;">
        <tr style="text-align: right;">
            <td><span style="font-weight:bold;"> Harga Jual:</span> <?=rupiah($t->total_price)?></td>
        </tr>
        <tr style="text-align: right;">
            <td><span style="font-weight:bold;"> Diskon:</span> <?=rupiah($t->discount)?></td>
        </tr>
    </table>

    <table width="100%" style="display: table;">
        <tr style="text-align: right;">
            <td ><span style="font-weight:bold;"> Total :</span> <?= rupiah($t->final_price)?></td>
        </tr>
        <tr style="text-align: right;">
            <td><span style="font-weight:bold;"> Pembayaran:</span> <?=rupiah($t->cash)?></td>
        </tr>
        <tr style="text-align: right;">
            <td><span style="font-weight:bold;"> Kembalian:</span> <?=rupiah($t->remaining)?></td>
        </tr>
    </table>
    
    <br/>
    <center style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
        ~~~ Terima Kasih ^_^ ~~~<br/>
        Semoga Hari Anda Menyenangkan<br/>
        powered By PROCOFFEE
    </center>
</div>

<?php  } ?>
</body>
</html>

<script>
    // window.print();
</script>
