// Mengubah tabel menjadi data table
$('#dataTableRole').DataTable();

// Fungsi ketika tombol detail di klik
$('#dataTableRole tbody').on('click', '.btn-view', function () {

    // Mengambil nilai dari atribut data
    const kode = $(this).data('kode');

    // Mengambil modal
    const modal = $('#modalDetail');

    $.ajax({
        url: 'http://localhost/ProCoffee/role/ajaxeditrole',
        data: { kode_role: kode },
        method: 'post',
        dataType: 'json',
        success: function (data) {
            // Mengisi field dalam modal
            modal.find('#kode_role').val(data.kode_role);
            modal.find('#role').val(data.role);
        },
        error: function (e) {
            console.log(e);
        }
    });

});

// Fungsi ketika tombol edit di klik
$('#dataTableRole tbody').on('click', '.btn-edit', function () {

    // Mengambil nilai dari atribut data
    const kode = $(this).data('kode');

    // Mengambil form
    const form = $('#formEditRole');

    $.ajax({
        url: "http://localhost/ProCoffee/role/ajaxeditrole",
        data: { kode_role: kode },
        method: "post",
        dataType: "json",
        success: function (data) {
            // Mengisi field dalam form
            form.find('#kode_role').val(data.kode_role);
            form.find('#role').val(data.role);
        },
        error: function (e) {
            console.log(e);
        }
    });

});

// Fungsi ketika tombol hapus di klik
$('#dataTableRole tbody').on('click', '.btn-delete', function () {

    // mengambil kode
    const kode = $(this).data('kode');

    // Menajalankan Sweetalert
    Swal.fire({
        title: "Hapus data",
        text: "Apakah anda yakin akan menghapus data ini ?",
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
            window.location.href = "http://localhost/ProCoffee/role/deleteRole/" + kode;
        } else {
            Swal.close();
        }
    });
});
