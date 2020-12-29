// pembuka javascript biasa


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
		$('#stock').val(stock);
		$('#modal-item').modal('hide');
	})
});
function detail(id, nama, detail, qty, date) {
	$('#barcode-detail').val(id);
	$('#nama-detail').val(nama);
	$('#pembelian-detail').val(detail);
	$('#qty-detail').val(qty);
	$('#date-detail').val(date);

};
// penutup javascript biasa

// jquery
// $('.pilih-barang').on('click', function () {
//     var kode_barang = $(this).data('id');
//     var barcode = $(this).data('barcode');
//     var name = $(this).data('name');
//     var nama_satuan = $(this).data('unit');
//     var stock = $(this).data('stock');

//     $('#kode_barang_input').val(kode_barang);
//     $('#barcode_input').val(barcode);
//     $('#item_name').val(name);
//     $('#unit_name').val(nama_satuan);
//     $('#stock').val(stock);
//     $('#modal-item').modal('hide');
// });
