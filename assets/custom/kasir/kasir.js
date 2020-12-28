$(document).ready(function () {

    // Menjalankan fungsi loadPagination
    loadPagination(0, '');
    // Menjalankan fungsi loadKeranjang
    loadKeranjang();

    // Membuat dataTable
    $('#dataTablePelanggan').DataTable();

    // Menjalankan fungsi pada form pencarian barang jika tombol search ditekan
    $('#formCariBarang').on('submit', function (event) {

        // Menghentikan fungsi default dari elemen html
        event.preventDefault();

        // Memeriksa apakah form pencarian barang memiliki value atau tidak
        var keyword = $('#formCariBarang').find('#cari_barang').val();

        if (keyword == '') {
            // Jika form pencarian barang tidak memiliki value atau nilai
            // Menjalankan fungsi loadPagination
            loadPagination(0, '');
        } else {
            // Jika form pencarian barang memiliki value atau nilai
            // Menjalankan fungsi loadPagination
            loadPagination(0, keyword);
        }

    });

    // Menjalankan fungsi pada form pencarian barang
    $('#cari_barang').on('keyup', function (event) {

        // Menghentikan fungsi default dari elemen html
        event.preventDefault();

        // Memeriksa apakah form pencarian barang memiliki value atau tidak
        var keyword = $('#cari_barang').val();

        if (keyword == '') {
            // Jika form pencarian barang tidak memiliki value atau nilai
            // Menjalankan fungsi loadPagination
            loadPagination(0, '');
        } else {
            // Jika form pencarian barang memiliki value atau nilai
            // Menjalankan fungsi loadPagination
            loadPagination(0, keyword);
        }

    });

    // Menjalankan fungsi on click pada pagination
    $('#rowPagination').on('click', 'a', function (event) {

        // Menghentikan redirect ke halaman lain
        event.preventDefault();

        // Membuat nomor halaman
        const pageNum = $(this).attr('data-ci-pagination-page');

        console.log(pageNum);

        // Memeriksa apakah form pencarian barang memiliki value atau tidak
        var keyword = $('#cari_barang').val();

        // Menjalankan fungsi loadPagination
        loadPagination(pageNum, keyword);

    });

    // Membuat fungsi untuk menjalankan pagination secara asynchronus dan menambahkan nya kedalam elemen html
    function loadPagination(pageNum, keyword) {

        // Membuat variabel url ajax
        var url = '';

        // Memeriksa apakah ada keyword dikirim atau tidak
        if (keyword == '') {
            url = "http://localhost/ProCoffee/kasir/loadBarang/" + pageNum;
        } else {
            url = "http://localhost/ProCoffee/kasir/loadBarang/" + pageNum;
        }

        // Menjalankan ajax
        $.ajax({
            url: url,
            data: { keyword: keyword },
            type: 'post',
            dataType: 'json',
            success: function (result) {
                // Memeriksa apakah ada hasil yang didapat dari database atau tidak
                if (result.result.length < 1) {
                    // Jika tidak ada hasil yang didapat dari database
                    // Menghilangkan elemen pagination
                    $('#rowPagination').empty();
                    // Menjalankan fungsi membuat tampilan barang tidak ditemukan
                    createNotFound();
                } else {
                    // Jika ada hasil yang didapat dari database
                    // Menambahkan elemen html berupa paging kedalam elemen html dengan id rowPagination
                    $('#rowPagination').html(result.pagination);
                    // Menjalankan fungsi untuk membuat item
                    createItem(result.result);
                }
            }
        });
    }

    // Membuat fungsi untuk mengambil seluruh data keranjang dari user N
    function loadKeranjang() {
        // Menjalankan ajax
        $.ajax({
            url: "http://localhost/ProCoffee/kasir/loadKeranjang",
            dataType: "json",
            success: function (result) {
                // Memeriksa apakah ada data di dalam tabel cart offline
                if (result.result.length < 1) {
                    // Jika tidak ada di dalam tabel cart offline
                    // Mengosongkan elemen html list-group-item
                    $('#list-group-cart').empty();
                    // Membuat elemen html apabila tidak ada barang dalam cart
                    emptyCart();
                    // Mengosongkan total belanja, grand total, dan kembalian
                    emptyNominal();
                } else {
                    // Jika ada data di dalam tabel cart offline
                    // Mengosongkan elemen html list-group-item
                    $('#list-group-cart').empty();
                    // Menambahkan elemen html kedalam list-group-item
                    createCartItem(result.result);
                }
            }
        });
    }

    // Membuat fungsi untuk menambahkan elemen html yang dibuat dari fungsi ini kedalam view (Barang untuk daftar produk)
    function createItem(result) {
        // Mengubah tipe data page number dari string menjadi number yang akan digunakan sebagai penomoran
        // pageNum = Number(page_num);
        // Mengosongkan atau menghapus semua elemen htm dalam elemen html dengan id rowBarang
        $('#rowBarang').empty();

        // Melakukan looping data yang dikirimkan dari controller
        for (index in result) {
            const kodeBarang = result[index].kode_barang;
            const namaBarang = result[index].nama_barang;
            const hargaBarang = result[index].harga;
            const imageBarang = result[index].gambar;
            const stokBarang = result[index].stok;
            // pageNum++;
            // Memeriksa apakah stok barang masih tersedia
            if (stokBarang > 0) {
                // Jika stok barang masih ada
                var element = "<div class='col-sm-4'>";
                element += "<div class='card'>";
                element += "<img src='http://localhost/ProCoffee/assets/items_img/" + imageBarang + "' class='mx-auto mt-2 img-thumbnail' alt='product image' style='object-fit: cover;'>";
                element += "<p class='text-dark text-center mt-2'>" + namaBarang + "</p>";
                element += "<p class='text-dark text-center text-sm mt-0 harga-barang-kasir' data-harga='" + hargaBarang + "'>" + formatRupiah(hargaBarang) + "</p>";
                element += "<p class='text-dark text-center text-sm mt-0 stok-barang-kasir' data-stok='" + stokBarang + "'>Stok: " + stokBarang + "</p>";
                element += "<div class='card-footer'>";
                element += "<a href='javascript:void(0)' class='btn btn-warning btn-sm w-100 stretched-link btn-tambah-keranjang' data-id='" + kodeBarang + "'><i class='fas fa-fw fa-cart-arrow-down'></a>";
                element += "</div>";
                element += "</div>";
                element += "</div>";
            } else {
                // Jika stok barang tidak ada
                var element = "<div class='col-sm-4'>";
                element += "<div class='card'>";
                element += "<img src='http://localhost/ProCoffee/assets/items_img/" + imageBarang + "' class='mx-auto mt-2 img-thumbnail' alt='product image' style='object-fit: cover;'>";
                element += "<p class='text-dark text-center mt-2'>" + namaBarang + "</p>";
                element += "<p class='text-dark text-center text-sm mt-0 harga-barang-kasir' data-harga='" + hargaBarang + "'>" + formatRupiah(hargaBarang) + "</p>";
                element += "<p class='text-dark text-center text-sm mt-0 stok-barang-kasir' data-stok='" + stokBarang + "'>Stok: " + stokBarang + "</p>";
                element += "<div class='card-footer'>";
                element += "<button class='btn btn-danger btn-sm w-100 btn-tambah-keranjang-cancel' data-id='" + kodeBarang + "'><i class='fas fa-fw fa-times'></button>";
                element += "</div>";
                element += "</div>";
                element += "</div>";
            }

            $('#rowBarang').append(element);
        }

    }

    // Membuat fungsi untuk membuat dan menambahkan elemen html kedalam list group keranjang
    function createCartItem(result) {
        // Melakukan looping data yang dikirimkan melalui parameter
        for (index in result) {
            // Membuat variabel untuk ditampilkan
            const kodeBarang = result[index].kode_barang;
            const namaBarang = result[index].nama_barang;
            const qtyBarang = result[index].qty;
            const hargaBarang = result[index].harga;
            const hargaTotal = result[index].total;

            // Membuat elemen html
            var element = "<li class='list-group-item'>";
            element += "<div class='row' id='row-item-cart'>";
            element += "<div class='col-sm-9'>";
            element += "<p class='my-0' id='cart-item-name'>" + namaBarang + "</p>";
            element += "<small> Jumlah: <span id='qty-item-keranjang'>" + qtyBarang + "</span></small>";
            element += "<br>";
            element += "<small class='text-success'>Harga per Unit: <span id='harga-item-keranjang'>" + formatRupiah(hargaBarang) + "</span></small>";
            element += "<br>";
            element += "<small>Total Harga: <span id='total-harga-item'>" + formatRupiah(hargaTotal) + "</span></small>";
            element += "</div>";
            element += "<div class='col-sm-3 d-flex align-items-center'>";
            element += "<a href='javascript:void(0)' class='btn btn-xs btn-success rounded mx-1 my-auto add_stok_cart' data-id='" + kodeBarang + "' data-harga='" + hargaBarang + "'><i class='fas fa-fw fa-plus align-middle'></i></a>";
            element += "<a href='javascript:void(0)' class='btn btn-xs btn-danger rounded mx-1 my-auto remove_stok_cart' data-id='" + kodeBarang + "' data-harga='" + hargaBarang + "'><i class='fas fa-fw fa-minus align-middle'></i></a>";
            element += "</div>";
            element += "</div>";
            element += "</div>";
            element += "</li>";

            // Menambahkan elemen html
            $('#list-group-cart').append(element);
        }
    }

    // Membuat fungsi untuk menambahkan elemen html data kosong jika tidak ada data yang ditemukan
    function createNotFound() {
        // Mengosongkan atau menghapus semua elemen html dalam htm rowBarang
        $('#rowBarang').empty();

        // Membuat Element HTML kosong
        var element = "<div class='col-sm-12 bg-light rounded'>";
        element += "<p class='text-center my-4 text-muted'> Tidak ada barang yang ditemukan. </p>";
        element += "</div>";

        // Memasang elemen html kedalam rowBarang
        $('#rowBarang').append(element);

    }

    // Membuat fungsi untuk mengosongkan angka dan nominal dalam keranjang
    function emptyNominal() {
        // Mengosongkan nilai dari total belanja
        $('.total-belanja-transaksi').html("Rp. 0");
        // Mengosongkan nilai dari diskon belanja
        $('#diskonBelanja').val('0');
        // Mengosongkan nilai dari grand total
        $('.grand-total-belanja-transaksi').html("Rp. 0");
        // Mengosongkan nilai dari pembayaran cash
        $('#cashBelanja').val('0');
        // Mengosongkan nilai dari kembalian belanja
        $('.kembalian-belanja-transaksi').html("Rp. 0");
    }

    // Membuat fungsi untuk menambahkan elemen html data kosong jika tidak ada data yang ditemukan pada cart
    function emptyCart() {
        // Membuat elemen html
        var element = "<div class='col-sm-12 bg-light rounded'>";
        element += "<p class='text-center my-4 text-muted'> Tidak ada barang yang ditemukan. </p>";
        element += "</div>";

        // Memasang elemen html kedalam list-group
        $('#list-group-cart').append(element);
    }

    // Membuat fungsi untuk mengubah angka kedalam format rupiah
    function formatRupiah(money) {
        // Mengubah data yang berupa angka menjadi string
        const reverseMoney = money.toString().split('').reverse().join(''),
            ribuan = reverseMoney.match(/\d{1,3}/g),
            hasilAkhir = ribuan.join('.').split('').reverse().join('');

        return "Rp. " + hasilAkhir;

    }

    // Membuat fungsi jika tombol cari atau pilih pelanggan ditekan
    $('#dataTablePelanggan tbody').on('click', '.pilihAnggota', function () {
        // Mengambil data pelanggan dari tombol
        const namaPelanggan = $(this).closest('tr').find('#nama_pelanggan_modal').text();
        const idPelanggan = $(this).closest('tr').find('#nama_pelanggan_modal').data('id');
        // Mengisi value dari input cari pelanggan
        $('#pelanggan').val(namaPelanggan);
        $('#pelanggan').data('id', idPelanggan);
        // Menutup Modal
        $('#formPilihPelanggan').modal('hide');
    });

    // Membuat fungsi jika tombol tambah barang ditekan
    $('#rowBarang').on('click', '.btn-tambah-keranjang', function () {

        // Mengambil data barang
        const kodeBarang = $(this).data('id');
        const hargaBarang = $(this).closest('.card').find('.harga-barang-kasir').data('harga');

        // Menjalankan ajax untuk tambah data barang
        $.ajax({
            url: "http://localhost/ProCoffee/kasir/tambahKeranjang",
            method: "post",
            data: { kode_barang: kodeBarang, harga_barang: hargaBarang },
            success: function (result) {
                console.log(result);

                // Load Ulang Keranjang
                loadKeranjang();

                // Mengambil data dari form cari barang
                var keyword = $('#cari_barang').val();
                // Memeriksa apakah keyword kosong atau tidak
                if (keyword == '') {
                    // Jika kosong
                    loadPagination(0, '');
                } else {
                    // Jika tidak kosong
                    loadPagination(0, keyword);
                }
            }
        });

    })

    // Membuat fungsi jika tombol plus pada cart ditekan
    $('#list-group-cart').on('click', '.add_stok_cart', function () {

        // Mengambil data attribut
        const kodeBarang = $(this).data('id');
        const hargaBarang = $(this).data('harga');

        // Menjalankan ajax untuk tambah data barang
        $.ajax({
            url: "http://localhost/ProCoffee/kasir/tambahKeranjang",
            method: "post",
            data: { kode_barang: kodeBarang, harga_barang: hargaBarang },
            dataType: 'json',
            success: function (result) {
                console.log(result);

                // Load Ulang Keranjang
                loadKeranjang();

                // Mengambil data dari form cari barang
                var keyword = $('#cari_barang').val();
                // Memeriksa apakah keyword kosong atau tidak
                if (keyword == '') {
                    // Jika kosong
                    loadPagination(0, '');
                } else {
                    // Jika tidak kosong
                    loadPagination(0, keyword);
                }
            }
        });

    })

    // Membuat fungsi jika tombol minus dalam cart ditekan
    $('#list-group-cart').on('click', '.remove_stok_cart', function () {

        // Mengambil data dari tombol
        const kodeBarang = $(this).data('id');
        const hargaBarang = $(this).data('harga');

        // Menjalankan ajax
        $.ajax({
            url: "http://localhost/ProCoffee/kasir/hapusKeranjang",
            data: { kode_barang: kodeBarang, harga_barang: hargaBarang },
            method: 'post',
            success: function (result) {
                console.log(result);

                // Load Ulang Keranjang
                loadKeranjang();

                // Mengambil data dari form cari barang
                var keyword = $('#cari_barang').val();
                // Memeriksa apakah keyword kosong atau tidak
                if (keyword == '') {
                    // Jika kosong
                    loadPagination(0, '');
                } else {
                    // Jika tidak kosong
                    loadPagination(0, keyword);
                }
            }
        });
    })

});