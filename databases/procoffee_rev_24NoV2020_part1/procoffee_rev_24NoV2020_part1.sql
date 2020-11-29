-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 04:40 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `procoffee`
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
  `alamat` varchar(255) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
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
  `nama` varchar(128) NOT NULL,
  `kode_kategori` varchar(128) NOT NULL,
  `kode_satuan` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(128) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kode_kategori` varchar(12) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kode_kategori`, `nama`, `created`, `updated`) VALUES
('CSM001', 'Kopi Original', 1604421287, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `kode_satuan` varchar(12) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `created` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `kode_stock` varchar(12) NOT NULL,
  `kode_barang` varchar(12) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `kode_supplier` varchar(12) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `kode_user` varchar(12) NOT NULL
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
  `about` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL,
  `kode_role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode_user`, `nama`, `alamat`, `tanggal_lahir`, `notelp`, `email`, `username`, `password`, `about`, `created_at`, `updated_at`, `profile_img`, `active_status`, `kode_role`) VALUES
('USR115222042', 'Afakih Fajduwani', 'aaaaaaaaaaaaaaaaaa', '2000-06-06', '082331495888', 'afakihfaj@gmail.com', 'afakihf', '', 's', 1606056161, 0, 'default.jpg', 1, 'RL0000000001'),
('USR215222047', 'lulung', 'aaaaaaaaaaaaaaaaaaaaaaaa', '2000-06-22', '082331495888', 'lulung@gmail.com', 'lulung', '', 'Admin', 1606056451, 0, 'default.jpg', 0, 'RL0000000001'),
('USR301232047', 'riann', 'aaaaaaaaaaaaaaaaaa', '2000-02-23', '0899001448', 'admin@admin.com', 'aaaaa', '', 'Admin', 1606092443, 0, 'default.jpg', 0, 'RL0000000001'),
('USR401232053', 'Radi', 'aaaaaaaaaaaaaaaaaa', '2000-06-06', '082331495888', 'radi@gmail.com', 'radian', '', 'Admin', 1606092827, 0, 'default.jpg', 0, 'RL0000000001'),
('USR501232058', 'jihan', 'locangcang', '2000-06-06', '082334434553', 'jihan@gmail.com', 'jihan', '', 'motivated', 1606093103, 0, 'default.jpg', 0, 'RL0000000001'),
('USR602232001', 'imaniyah', 'griya panji mulya', '2019-06-06', '0899001448', 'ima@gmail.com', 'imaniyah', '', 'Admin', 1606093307, 0, 'default.jpg', 0, 'RL0000000001');

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

CREATE TABLE `token` (
  `kode_reset` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `expire_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reset_password`
--

INSERT INTO `token` (`kode_reset`, `email`, `token`, `created_at`, `expire_at`) VALUES
(1, 'afakihfaj@gmail.com', 'dZaQnpT8i+uttY33y9kK7Mvni5N5gpQ5y27LYRlxEaY=', 1605706587, 0),
(2, 'afakihfajduwani@gmail.com', 'sER/6zFQTzbG9gwNo4Q06TNj7BYkLIEsddbNdRgoe6g=', 1605706647, 0),
(3, 'afakihfaj@gmail.com', 'Vt5RS+mDaMyQqni86pWim2eKT0AebOWejurla/ZkmbU=', 1605706831, 0),
(4, 'afakihfajduwani@gmail.com', 'ymR9Y/fVrsWcWpKU+R0595RQxE4Ul+9bMOnz9ZW/pMY=', 1605707143, 0),
(5, 'kingofavex@gmail.com', 'w5VmYa7NThhAIpETFVHfuBmoylqly+OgWXUXXuox9eY=', 1605707202, 0),
(6, 'newimel7@gmail.com', 'oTQgXMICCDMIrUZ0pXrwho9EY72aiYrmXula2QeQCrE=', 1605709820, 0),
(7, 'f@gmail.com', 'zC6bLzrHSAtkdqXg/VONjaGDZGKAIfxFsEFp1oNsv/o=', 1605709951, 0),
(8, 'kingofxavier@gmail.com', 'RJa1KOxH4n/GaxUfM7iHvIIFGqiR3+QRr+Mz7HKwjfg=', 1605837982, 0),
(9, 'olivia@gmail.com', '1cpcLk6IsBRhC+W6A+sjxNP+CZPb66BgNw4/cN3Zuso=', 1605839119, 0),
(10, 'dian@gmail.com', 't1b2m71vCZYThiD8b7xU9/8yEHcO3acbiBsBbGmOopU=', 1605968298, 0),
(11, 'adwad@gmail.com', '2fSeUjXay3DufC7zKd5Bc9Kx+pgXf4I2hNNkGvz63uY=', 1605968365, 0),
(12, 'kingofafakih@gmail.com', 'CLzvgI42EwLb7NbVI89b6GSEgl3fCSOGhiQw+Vcg7X8=', 1605968457, 0),
(13, 'kantal@gmail.com', 'UNQLomUctS7dEkodX/+B78yjBggmp6q+wGyV22Axsvw=', 1605968514, 0),
(14, 'sss@gmail.com', 'IHDV798ly9WSrWMlVBWo3pa8bunrMVvJO6YakgKUziU=', 1605969070, 0),
(15, 'adada@gmail.com', 'aQ+p4AmqPPCuL8nY40nYo0vf12Pv4ZKQGAVtKMDMzsM=', 1605969791, 0),
(16, 'lulung@gmail.com', 'qCpyOXE6kT7XApMv6EQcPsP9zs7osxx1oXq+KZG/Gfc=', 1606054266, 0),
(17, 'afakihfaj@gmail.com', '10TYp/AFPRqrNSYy307ZbxGoECQINg8LSR0S1PQYoIo=', 1606055638, 0),
(18, 'afakihfaj@gmail.com', 'qe2qJZwWwhzv4VkrS8+7IVi3cVMeZtUynI0hbS0VA1U=', 1606056161, 0),
(19, 'lulung@gmail.com', 'n38hXJVVB4vpeWtRYA35lKhnmsz3WlQuM+NT2J4qKKI=', 1606056451, 0),
(20, 'admin@admin.com', 'hLKLiy1ChpU9d4DADzrUnduLj3hlRw4DwxfKX5Wfk+w=', 1606092443, 0),
(21, 'radi@gmail.com', '4XjB30bhaX1L3VfgdzmRhvltQRMs3GQGSG9eRedq83o=', 1606092827, 0),
(22, 'jihan@gmail.com', 'ZnsVMrPhUQtQkSMCERa1zWeYvb8FdJuoigru2R5od38=', 1606093103, 0),
(23, 'ima@gmail.com', 'IWEH7EFMXq5oaIVQsEj35RDZRsVWQ0/OkNbPDqz5zb4=', 1606093307, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `kode_role` varchar(12) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`kode_role`, `role`) VALUES
('RL0000000001', 'Administrator'),
('RL0000000002', 'Kasir'),
('RL0000000003', 'Pelanggan');

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
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

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
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`kode_satuan`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`kode_stock`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_supplier` (`kode_supplier`),
  ADD KEY `kode_user` (`kode_user`);

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
  ADD KEY `kode_user` (`email`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_reset_password`
--
ALTER TABLE `user_reset_password`
  MODIFY `kode_reset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `tbl_stock_ibfk_1` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`);

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
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`kode_menu`) REFERENCES `user_menu` (`kode_menu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
