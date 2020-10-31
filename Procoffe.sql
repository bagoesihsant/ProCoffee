-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 02:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `procoffe`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtl_transaksi`
--

CREATE TABLE `dtl_transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `kode_barang` varchar(12) NOT NULL,
  `no` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jml_beli_tmp` int(11) NOT NULL,
  `discount_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(12) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `address` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kode_barang` varchar(12) NOT NULL,
  `barcode` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `kode_kategori` varchar(128) NOT NULL,
  `kode_satuan` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kode_category` varchar(12) NOT NULL,
  `name` varchar(128) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `kode_satuan` varchar(128) NOT NULL,
  `name` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `kode_user` varchar(12) NOT NULL,
  `alamat` varchar(12) NOT NULL,
  `tgl_kirim` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_final` int(11) NOT NULL,
  `tgl_transaksi` varchar(12) NOT NULL,
  `no_rek` varchar(12) NOT NULL,
  `kembalian` varchar(12) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kode_user` varchar(12) NOT NULL,
  `nama` varchar(130) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `email` varchar(130) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL,
  `kode_role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `kode_access` int(11) NOT NULL,
  `kode_menu` varchar(12) NOT NULL,
  `kode_role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `kode_menu` varchar(12) NOT NULL,
  `menu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_reset_password`
--

CREATE TABLE `user_reset_password` (
  `kode_reset` varchar(12) NOT NULL,
  `kode_user` varchar(12) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `expire_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `kode_role` varchar(12) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `kode_sub_menu` varchar(12) NOT NULL,
  `kode_menu` varchar(12) NOT NULL,
  `sub_menu` varchar(30) NOT NULL,
  `url` varchar(150) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `kode_kategori` (`kode_kategori`),
  ADD KEY `kode_satuan` (`kode_satuan`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kode_category`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`kode_satuan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kode_user` (`kode_user`(11)),
  ADD KEY `kode_user_2` (`kode_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`),
  ADD KEY `kode_role` (`kode_role`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`kode_access`),
  ADD KEY `kode_menu` (`kode_menu`,`kode_role`),
  ADD KEY `kode_role` (`kode_role`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`kode_menu`);

--
-- Indexes for table `user_reset_password`
--
ALTER TABLE `user_reset_password`
  ADD PRIMARY KEY (`kode_reset`),
  ADD KEY `kode_user` (`kode_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`kode_role`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`kode_sub_menu`),
  ADD KEY `kode_menu` (`kode_menu`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `user` (`kode_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kode_role`) REFERENCES `user_role` (`kode_role`) ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`kode_role`) REFERENCES `user_role` (`kode_role`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`kode_menu`) REFERENCES `user_menu` (`kode_menu`) ON UPDATE CASCADE;

--
-- Constraints for table `user_reset_password`
--
ALTER TABLE `user_reset_password`
  ADD CONSTRAINT `user_reset_password_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `user` (`kode_user`) ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`kode_menu`) REFERENCES `user_menu` (`kode_menu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
