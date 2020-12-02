$('#dataTableStock').DataTable({
    "responsive": true,
    "autowitdth": false,
});

// Preview 
$('#dataTableStock tbody').on('click', '.btn-view', function () {

    const kode = $(this).data('kode');

    const form = $('#formEditStock');

    $.ajax({
        url: 'http://localhost/Procoffee/kasir/C_stockin/ajaxEditStock',
        data: {
            kode_stock: kode
        },
        method: 'post',
        dataType: 'json',
        success: function (data) {
            form.find('#kode_stock').val(data.kode_stock);
            form.find('#stock').val(data.stock);

        },
        error: function (e) {
            console.log(e);
        }
    });
});

//detail 
$(document).ready(function () {
    $(document).on('click', '#set_dtl', function () {

        var barcode = $(this).data('barcode');
        var name = $(this).data('name');
        var detail = $(this).data('detail');
        var supplier = $(this).data('supplier_name');
        var qty = $(this).data('qty');
        var date = $(this).data('date');

        $('#barcode').text(barcode);
        $('#name').text(name);
        $('#detail').text(detail);
        $('#supplier_name').text(supplier);
        $('#qty').text(qty);
        $('#date').text(date);
    })
})
$(document).ready(function () {
    $(document).on('click', '#select', function () {
        var kode_barang = $(this).data('id');
        var barcode = $(this).data('barcode');
        var name = $(this).data('name');
        var nama_satuan = $(this).data('unit');
        var stock = $(this).data('stock');

        $('#kode_barang_input').val(kode_barang);
        $('#barcode_input').val(barcode);
        $('#item_name').val(name);
        $('#unit_name').val(nama_satuan);
        // $('#nama_barang').val(nama_barang);
        $('#stock').val(stock);
        $('#modal-item').modal('hide');

    })
})
//hapus tabel
$('#dataTableStock tbody').on('click', '.btn-delete', function () {
    //mengambil kode
    const kode = $(this).data('kode');

    //Run sweet alert
    Swal.fire({
        title: "Hapus data",
        text: "Apakah anda yakin ingin menghapus data ini ?",
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        customClass: {
            confirmButton: "btn btn-primary px-4 mx-2",
            cancelButton: "btn btn-danger px-4 mx-2"
        }
    }).then((result) => {
        if (result.value) {
            window.location.href = "http://localhost/Procoffe/kasir/C_stockin/deteleStockIn/" + kode;
        } else {
            Swal.close();
        }
    });
});