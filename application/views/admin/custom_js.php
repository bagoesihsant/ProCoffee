<script>
    $(function() {
        // Mengubah tabel user di user menjadi data tables
        $('#userTable').DataTable({
            "responsive": true,
            "autoWidth": false,
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
    $('#userTable tbody').on('click', '.btnDeleteuser', function() {

        // Mengambil data melalui attribute data pada elemen html
        const kodeUser = $(this).data('kode');

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
                window.location.href = "http://localhost/ProCoffee/admin/hapusUser/" + kodeUser;
            } else if (result.dismiss == Swal.DismissReason.cancel) {
                // Menutup sweet alert jika di cancel
                Swal.close();
            }
        });





    });
</script>