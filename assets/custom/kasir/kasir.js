$(document).ready(function () {

    // Menjalankan fungsi loadPagination
    loadPagination(0, '');

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
            url = "http://localhost/ProCoffee/kasir/loadbarang/" + pageNum;
        } else {
            url = "http://localhost/ProCoffee/kasir/loadbarang/" + pageNum;
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

    // Membuat fungsi untuk menambahkan elemen html yang dibuat dari fungsi ini kedalam view
    function createItem(result) {
        // Mengubah tipe data page number dari string menjadi number yang akan digunakan sebagai penomoran
        // pageNum = Number(page_num);
        // Mengosongkan atau menghapus semua elemen htm dalam elemen html dengan id rowBarang
        $('#rowBarang').empty();

        // Melakukan looping data yang dikirimkan dari controller
        for (index in result) {
            const namaBarang = result[index].nama_barang;
            const hargaBarang = result[index].harga;
            const imageBarang = result[index].gambar;
            // pageNum++;


            var element = "<div class='col-sm-4'>";
            element += "<div class='card'>";
            element += "<img src='http://localhost/ProCoffee/assets/items_img/" + imageBarang + "' class='mx-auto mt-2 img-thumbnail' alt='product image' style='object-fit: cover;'>";
            element += "<p class='text-dark text-center mt-2'>" + namaBarang + "</p>";
            element += "<p class='text-dark text-center text-sm mt-0'>" + formatRupiah(hargaBarang) + "</p>";
            element += "<div class='card-footer'>";
            element += "<a href='javsacript:void(0)' class='btn btn-warning btn-sm w-100 stretched-link'><i class='fas fa-fw fa-cart-arrow-down'></a>";
            element += "</div>";
            element += "</div>";
            element += "</div>";

            $('#rowBarang').append(element);
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


    function formatRupiah(money) {
        // Mengubah data yang berupa angka menjadi string
        const reverseMoney = money.toString().split('').reverse().join(''),
            ribuan = reverseMoney.match(/\d{1,3}/g),
            hasilAkhir = ribuan.join('.').split('').reverse().join('');

        return "Rp. " + hasilAkhir;

    }

});