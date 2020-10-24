<script>
    $(function() {
        // Mengubah tabel customer di customer menjadi data tables
        $('#customerTable').DataTable({
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

    });
</script>