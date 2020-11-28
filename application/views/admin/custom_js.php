<script>
    // Mencetak pesan dari menu
    <?= $this->session->flashdata('pesan_menu'); ?>
    // Mencetak pesan dari submenu
    <?= $this->session->flashdata('pesan_sub_menu'); ?>

    // Mengubah tabel customer di customer menjadi data tables
    $('#customerTable').DataTable({
        "responsive": true,
        "autoWidth": false,
    });

    // Mengubah tabel menu di menu menjadi data tables
    $('#dataTableMenu').DataTable({
        "responsive": true,
        "autoWidth": false,
    });

    // Mengubah tabel submenu di menu menjadi data tables
    $('#dataTableSubmenu').DataTable({
        "responsive": true,
        "autoWidth": false,
    });

    // Mengubah tabel item di item menjadi data tables
    $('#dataTableItems').DataTable({
        "responsive": true,
        "autoWidth": false,
    });

    // Mengubah tabel supplier di supplier menjadi data tables
    $('#dataTableSupplier').DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    //Mengubah tabel Stock di stock menjadi data tables
    $('#dataTableStock').DataTable({
        "responsive": true,
        "autowidth": false,
    });

    // Mengisi data form pada modal icon preview
    $('.btn-modal-icon').on('click', function() {
        // Mengambil data form sendiri
        const formData = $(this).data('form');

        // Mengambil target form
        const formTarget = $(this).data('target');

        // Mengambil tempat yang akan diisi
        const dataTarget = $(formTarget.toString()).find('.icon-row');

        // Mengisi tempat yang akan diisi dengan value
        dataTarget.data('form', formData.toString());

    });


    // Menjalankan Ajax untuk mengambil data dari database
    $('#dataTableMenu tbody').on('click', '.btn-edit-menu', function() {

        // Mengambil data melalui attribute data pada elemen html
        const kodeMenu = $(this).data('kode');

        // Mengambil elemen form yang akan diisi dengan data ajax
        const formMenu = $('#formEditMenu');

        // Melakukan Ajax
        $.ajax({
            url: "http://localhost/ProCoffee/C_admin/ajaxDataEditMenu",
            data: {
                kode_menu: kodeMenu
            },
            method: "post",
            dataType: "json",
            success: function(data) {
                // Jika ajax berhasil dijalankan
                formMenu.find('#kode_menu').val(data.kode_menu);
                formMenu.find('#menu').val(data.menu);
            },
            error: function(e) {
                // Jika ajax gagal dijalankan
                console.log(e);
            }
        });

    });

    // Menjalankan ajax untuk mengambil data dari database
    $('#dataTableMenu tbody').on('click', '.btn-view-menu', function() {

        // Mengambil data melalui attribute data pada elemen html
        const kodeMenu = $(this).data('kode');

        // Mengambil elemen form yang akan diisi dengan data ajax
        const modalMenu = $('#viewModal');

        // Melakukan Ajax
        $.ajax({
            url: "http://localhost/ProCoffee/C_admin/ajaxDataEditMenu",
            data: {
                kode_menu: kodeMenu
            },
            method: "post",
            dataType: "json",
            success: function(data) {
                // Jika ajax berhasil dijalankan
                modalMenu.find('#kode_menu').val(data.kode_menu);
                modalMenu.find('#menu').val(data.menu);
            },
            error: function(e) {
                // Jika ajax gagal dijalankan
                console.log(e);
            }
        });

    });

    // Jika tombol delete di tabel customer di klik, maka muncul sweet alert
    $('.btnDeleteuser').on('click', function() {
        swalBootstrap.fire({
            title: "Apakah anda yakin ?",
            text: "Apakah anda yakin akan menghapus data ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            reverseButtons: true
        }).then((hasil) => {
            if (hasil.isConfirmed) {
                swalBootstrap.fire({
                    title: "Terhapus",
                    text: "Data berhasil dihapus",
                    icon: "success"
                })
            } else if (hasil.dismiss == Swal.DismissReason.cancel) {
                swalBootstrap.fire({
                    title: "Batal",
                    text: "Data batal dihapus",
                    icon: "error"
                })
            }
        })
    });

    // jika tombol delete di tabel stock di klik, maka muncul sweet alert
    $('.btnDeleteUnits').on('click', function() {
        swalBootstrap.fire({
            title: "Apakah anda yakin ?",
            text: "Apakah anda yakin akan menghapus data ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            reverseButtons: true
        }).then((hasil) => {
            if (hasil.isConfirmed) {
                swalBootstrap.fire({
                    title: "Terhapus",
                    text: "Data berhasil dihapus",
                    icon: "success"
                })
            } else if (hasil.dismiss == Swal.DismissReason.cancel) {
                swalBootstrap.fire({
                    title: "Batal",
                    text: "Data batal dihapus",
                    icon: "error"
                })
            }
        })
    });

    // Menjalankan fungsi hapus pada tabel
    $('#dataTableMenu tbody').on('click', '.btn-delete-menu', function() {

        // Mengambil data melalui attribute data pada elemen html
        const kodeMenu = $(this).data('kode');

        // Membuka Sweet Alert
        Swal.fire({
            title: "Hapus Data",
            text: "Apakah anda yakin akan menghapus data ini ?",
            icon: "error",
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
                // Memindahkan ke halaman lain jika di konfirmasi
                window.location.href = "http://localhost/ProCoffee/admin/hapusMenu/" + kodeMenu;
            } else if (result.dismiss == Swal.DismissReason.cancel) {
                // Menutup sweet alert jika di cancel
                Swal.close();
            }
        });

    });

    // Menjalankan ajax ketika tombol ditekan pada sub menu
    $('#dataTableSubmenu tbody').on('click', '.btn-edit-submenu', function() {

        // Mengambil kode submenu
        const kodeSubmenu = $(this).data('kode');

        // Mengambil Form Edit Submenu
        const formSubmenu = $('#formEditSubmenu');

        // Menjalankan ajax
        $.ajax({
            url: "http://localhost/ProCoffee/C_admin/ajaxEditSubmenu",
            data: {
                kode_sub_menu: kodeSubmenu
            },
            method: "post",
            dataType: "json",
            success: function(data) {
                formSubmenu.find('#kode_sub_menu').val(data.kode_sub_menu);
                formSubmenu.find('#menu_sub_menu').val(data.kode_menu);
                formSubmenu.find('#sub_menu').val(data.sub_menu);
                formSubmenu.find('#url_sub_menu').val(data.url);
                formSubmenu.find('#icon_sub_menu').val(data.icon);
                if (data.is_active == 1) {
                    formSubmenu.find('#status_sub_menu_edit').attr('checked', true);
                } else if (data.is_active == 0) {
                    formSubmenu.find('#status_sub_menu_edit').attr('checked', false);
                }
            }
        });

    });

    // Menjalankan ajax ketika tombol ditekan pada sub menu
    $('#dataTableSubmenu tbody').on('click', '.btn-view-submenu', function() {

        // Mengambil kode submenu
        const kodeSubmenu = $(this).data('kode');

        // Mengambil Form Edit Submenu
        const modalSubmenu = $('#viewModal');

        // Mengambil icon dalam button
        const iconSubmenu = modalSubmenu.find('#preview_icon_submenu');


        console.log(iconSubmenu);

        // Menjalankan ajax
        $.ajax({
            url: "http://localhost/ProCoffee/C_admin/ajaxEditSubmenu",
            data: {
                kode_sub_menu: kodeSubmenu
            },
            method: "post",
            dataType: "json",
            success: function(data) {
                modalSubmenu.find('#kode_sub_menu').val(data.kode_sub_menu);
                modalSubmenu.find('#menu_sub_menu').val(data.kode_menu);
                modalSubmenu.find('#sub_menu').val(data.sub_menu);
                modalSubmenu.find('#url_sub_menu').val(data.url);
                modalSubmenu.find('#icon_sub_menu').val(data.icon);
                iconSubmenu.find('i').addClass(data.icon);
                if (data.is_active == 1) {
                    modalSubmenu.find('#status_sub_menu').val('AKTIF')
                } else if (data.is_active == 0) {
                    modalSubmenu.find('#status_sub_menu').val('NON AKTIF');
                }
            }
        });

    });

    // Menjalankan fungsi hapus pada tabel
    $('#dataTableSubmenu tbody').on('click', '.btn-delete-submenu', function() {

        // Mengambil data melalui attribute data pada elemen html
        const kodeMenu = $(this).data('kode');

        // Membuka Sweet Alert
        Swal.fire({
            title: "Hapus Data",
            text: "Apakah anda yakin akan menghapus data ini ?",
            icon: "error",
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
                // Memindahkan ke halaman lain jika di konfirmasi
                window.location.href = "http://localhost/ProCoffee/admin/hapusSubmenu/" + kodeMenu;
            } else if (result.dismiss == Swal.DismissReason.cancel) {
                // Menutup sweet alert jika di cancel
                Swal.close();
            }
        });

    });

    // Menjalankan fungsi button select icon bila ditekan
    $(".btn-select-icon").on('click', function() {
        // Mengambil data form 
        const row = $(this).closest('.icon-row').data('form');

        var form;

        // Memeriksa apakah form adalah form tambah atau ubah
        if (row.toString() == "tambah") {
            form = $('#formTambahSubmenu');
        } else if (row.toString() == "ubah") {
            form = $('#formEditSubmenu');
        }

        console.log(form);

        // Mendapatkan elemen html input icon submenu
        const inputIconSubMenu = form.find('#icon_sub_menu');

        // Mendapatkan class icon
        const iconClass = $(this).find('i').attr('class');

        // Mengisi value dari input icon sub menu dengan class
        inputIconSubMenu.val(iconClass + " fa-fw");

        // Menutup modal
        $('#previewIconModal').modal('hide');

    });




    // Menggunakan sweet alert untuk menghapus data
    // Kustomisasi styling tombol untuk sweet alert menggunakan bootstrap
    const swalBootstrap = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-2 px-4',
            cancelButton: 'btn btn-danger mx-2'
        },
        buttonsStyling: false
    });

    // Jika tombol delete di tabel customer di klik, maka muncul sweet alert
    $('.btnDeleteCustomer').on('click', function() {
        swalBootstrap.fire({
            title: "Apakah anda yakin ?",
            text: "Apakah anda yakin akan menghapus data ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            reverseButtons: true
        }).then((hasil) => {
            if (hasil.isConfirmed) {
                swalBootstrap.fire({
                    title: "Terhapus",
                    text: "Data berhasil dihapus",
                    icon: "success"
                })
            } else if (hasil.dismiss == Swal.DismissReason.cancel) {
                swalBootstrap.fire({
                    title: "Batal",
                    text: "Data batal dihapus",
                    icon: "error"
                })
            }
        })
    });
</script>


<!-- crud ajax lulung -->