$('#dataTableStock').DataTable({
    "responsive": true,
    "autowitdth": true,
});






$(document).ready(function () {
    $(document).on('click', '#select', function () {
        var kode_barang = $(this).data('kode_barang');
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
// //hapus tabel
// $('#dataTableStock tbody').on('click', '.btn-delete', function () {
//     //mengambil kode
//     const kodeStock = $(this).data('kode');

//     //Run sweet alert
//     Swal.fire({
//         title: "Hapus data",
//         text: "Apakah anda yakin ingin menghapus data ini ?",
//         icon: "warning",
//         buttonsStyling: false,
//         showCancelButton: true,
//         showConfirmButton: true,
//         confirmButtonText: "Ya",
//         cancelButtonText: "Tidak",
//         customClass: {
//             confirmButton: "btn btn-primary px-4 mx-2",
//             cancelButton: "btn btn-danger px-4 mx-2"
//         }
//     }).then((result) => {
//         if (result.value) {
//             window.location.href = "http://localhost/Procoffe/kasir/C_stockin/delete_in/" + kodeStock;
//         } else if (result.dismiss == Swal.DismissReason.cancel) {
//             Swal.close();

//         }
//     });
// });
//detail 2
function detail(id, nama, detail, supplier, qty, date) {
    $('#barcode-detail').val(id);
    $('#nama-detail').val(nama);
    $('#pembelian-detail').val(detail);
    $('#supplier-detail').val(supplier);
    $('#qty-detail').val(qty);
    $('#date-detail').val(date);

};