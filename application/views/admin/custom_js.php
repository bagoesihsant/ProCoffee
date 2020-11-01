<script>
    // Mencetak pesan dari menu
    <?= $this->session->flashdata('pesan_menu'); ?>

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
<script>
    ambilData();

    // awal membuat function untuk get datanya
    function ambilData() {
        $.ajax({
            type: 'POST', //alamatnya adalah nama controller, lalu nama function
            url: 'http://localhost/ProCoffee/C_admin/ReadCategoriesAjax',
            dataType: 'json',
            success: function(dataGet) {
                var baris = '';
                // dataGet.lenght maksudnya panjang dataGet dari variable"dataGet" yang ada di dalam kurung fucntion di atas
                for (var i = 0; i < dataGet.length; i++) {
                    baris += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td>' + dataGet[i].kode_category + '</td>' +
                        '<td>' + dataGet[i].name + '</td>' +
                        '<td><a href="#tambahModal" data-toggle="modal" class="btn btn-primary" onclick="submit(' + dataGet[i].kode_category + ')" id="">Ubah</a>' +
                        '<a  class="btn btn-danger ml-2 text-white" onclick="hapusData(' + dataGet[i].kode_category + ')" >Hapus</a>' + '</td>' +
                        '</tr>';
                }
                $('#TableTarget').html(baris);

            }
        });
    } // akhir dari function ambil data ata get data

    // pembukaan function modal dinamis dengan parameter tombol
    function submit(x) {
        if (x == 'tambahDataTombol') {
            $('#btnTambahCategories').show();
            $('#btnEditCategories').hide();
        } else {
            $('#btnTambahCategories').hide();
            $('#btnEditCategories').show();

            // statement getdata sesuai id
            $.ajax({
                type: "POST",
                data: 'id_ajax_get' + x,
                url: 'http://localhost/ProCoffee/C_admin/getCategoriesAjax',
                dataType: 'json',
                success: function(getId) {
                    $('[name="kode_kategori"]').val(getId[0].kode_category);
                    $('[name="nama_kategori"]').val(getId[0].name);
                }
            });
        }
    } //penutupan function modal dinamis dengan parameter tombol

    // pembukaan function refresh input
    function refreshInputan() {
        $("[name='kode_kategori']").val('');
        $("[name='nama_kategori']").val('');
    }

    // pembukaan tambah data
    function tambahData() {
        var kode_category = $("[name='kode_kategori']").val();
        var nama_category = $("[name='nama_kategori']").val();

        $.ajax({
            type: 'POST',
            data: 'kode_ctg_ajax=' + kode_category + '&nama_ctg_ajax=' + nama_category,
            url: 'http://localhost/ProCoffee/C_admin/getCategoriesAjax',
            dataType: 'json',
            success: function(outputAdd) {
                $('#pesan_html_json').html(outputAdd.pesan_json);

                if (outputAdd.pesan_json == '') {
                    $('#tambahModal').modal('hide');
                    ambilData();

                }
            }
        });
    } // penutupan function add

    // function editData() {
    //     var id_edit = $("[name='kode_kategori']").val();
    //     var name_edit = $("[name='nama_kategori']").val();

    //     $.ajax({
    //         type: "POST",
    //         data: 'id_ajax_edit=' + id_edit + '&name_ajax_edit=' + name_edit,
    //         url: 'http://localhost/ProCoffee/C_admin/editCategoriesAjax',
    //         dataType: 'json',
    //         success: function(hasilEdit) {
    //             $('#pesan_html_json').html(hasilEdit.pesan_json);

    //             if (hasilEdit.pesan_json == '') {
    //                 $('#tambahModal').modal('hide');
    //                 ambilData();
    //                 refreshInputan();

    //             }
    //         }
    //     });
    // }
</script>