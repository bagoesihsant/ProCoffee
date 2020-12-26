<?php

class HookDevLib
{


    // Fungsi untuk auto number
    public function autoNumber($last_id, $panjang_kode, $panjang_digit)
    {
        /**
         * Petunjuk pemakaian
         * $last_id : adalah id atau kode terakhir dari database
         * $panjang_kode : adalah panjang huruf dari sebuah id atau kode
         * $panjang_digit : adalah panjang angak dari sebuah id atau kode
         */

        // Mengambil Kode dari $last_id
        // Jika input USR000000001, maka hasil adalah USR
        $kode = substr($last_id, 0, $panjang_kode);

        // Mengambil Nilai Angka
        // Jika input USR000000001, maka hasil adalah 000000001
        $angka = substr($last_id, $panjang_kode, $panjang_digit);

        // Menambahkan nilai angka dengan 1
        $angka = $angka + 1;

        // Mengubah angka kembali menjadi format sebelumnya ( dari 2 menjadi 000000002 )
        $angka = str_repeat("0", $panjang_digit - strlen($angka)) . $angka;

        // Menggabungkan kode dengan angka hasil increment
        $kode = $kode . $angka;

        // Mengambalikan kode baru
        return $kode;
    }

    // Fungsi format angka ke rupiah
    public function formatRupiah($angka)
    {
        $rupiah = "Rp. ";
        $rupiah .= number_format($angka, 2, ',', '.');
        return $rupiah;
    }
}
