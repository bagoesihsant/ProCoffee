// Mengubah table menjadi dataTable
$('#dataTableAkses').DataTable();

// Menjalankan fungsi nyalakan menu
$('#dataTableAkses tbody').on('click', '.btn-aktivasi-menu', function () {
    // Mengambil kode role
    const role = $(this).data('role');

    // Menngambil kode menu
    const menu = $(this).data('menu');

    // Menjalankan ajax
    $.ajax({
        url: "http://localhost/ProCoffee/role/removeAkses",
        data: { kode_role: role, kode_menu: menu },
        method: "post",
        dataType: "json",
        success: function (data) {
            if (data.error_message == false) {
                Swal.fire({
                    title: "Success",
                    text: "Menu berhasil di deaktivasi",
                    icon: "success",
                    buttonsStyling: false,
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary px-4"
                    }
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "http://localhost/ProCoffee/role/userAkses/" + role;
                    } else {
                        window.location.href = "http://localhost/ProCoffee/role/userAkses/" + role;
                    }
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: "Menu gagal di deaktivasi",
                    icon: "error",
                    buttonsStyling: false,
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary px-4"
                    }
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "http://localhost/ProCoffee/role/userAkses/" + role;
                    } else {
                        window.location.href = "http://localhost/ProCoffee/role/userAkses/" + role;
                    }
                });
            }
        },
        error: function (e) {
            console.log(e);
        }
    });

});

// Menjalankan fungsi matikan menu
$('#dataTableAkses tbody').on('click', '.btn-disable-menu', function () {
    // Mengambil kode role
    const role = $(this).data('role');

    // Menngambil kode menu
    const menu = $(this).data('menu');

    // Menjalankan ajax
    $.ajax({
        url: "http://localhost/ProCoffee/role/addakses",
        data: { kode_role: role, kode_menu: menu },
        method: "post",
        dataType: "json",
        success: function (data) {
            if (data.error_message == false) {
                Swal.fire({
                    title: "Success",
                    text: "Menu berhasil di aktivasi",
                    icon: "success",
                    buttonsStyling: false,
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary px-4"
                    }
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "http://localhost/ProCoffee/role/userAkses/" + role;
                    } else {
                        window.location.href = "http://localhost/ProCoffee/role/userAkses/" + role;
                    }
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: "Menu gagal di aktivasi",
                    icon: "error",
                    buttonsStyling: false,
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary px-4"
                    }
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "http://localhost/ProCoffee/role/userAkses/" + role;
                    } else {
                        window.location.href = "http://localhost/ProCoffee/role/userAkses/" + role;
                    }
                });
            }
        },
        error: function (e) {
            console.log(e);
        }
    });

});