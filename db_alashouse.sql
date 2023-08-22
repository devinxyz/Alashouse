-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 10:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alashouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Waiter'),
(3, 'Kasir'),
(4, 'Owner'),
(5, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masakan`
--

CREATE TABLE `tb_masakan` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(150) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `stok` int(11) NOT NULL,
  `status_masakan` varchar(150) NOT NULL,
  `gambar_masakan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masakan`
--

INSERT INTO `tb_masakan` (`id_masakan`, `nama_masakan`, `harga`, `stok`, `status_masakan`, `gambar_masakan`) VALUES
(42, 'Affogato', '23000', 99, 'tersedia', 'Affogato.jpg'),
(43, 'Espresso', '19000', 99, 'tersedia', 'Espresso.jpg'),
(44, 'Vanilla latte', '25000', 98, 'tersedia', 'Vanilla latte.jpg'),
(45, 'Cappuccino', '25000', 99, 'tersedia', 'Cappuccino.jpg'),
(46, 'Caffe Latte', '25000', 99, 'tersedia', 'Caffe Latte.jpg'),
(47, 'Walnut Latte', '25000', 96, 'tersedia', 'Walnut Latte.jpg'),
(48, 'House Rum', '27000', 97, 'tersedia', 'House Rum.jpg'),
(49, 'Iced Coffee', '27000', 97, 'tersedia', 'Iced Coffee.jpg'),
(50, 'Banana Iced', '27000', 97, 'tersedia', 'Banana Iced.jpg'),
(51, 'Strawberry Iced', '27000', 95, 'tersedia', 'Strawberry Iced.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `no_meja` int(11) NOT NULL,
  `total_harga` varchar(150) NOT NULL,
  `uang_bayar` varchar(150) DEFAULT NULL,
  `uang_kembali` varchar(150) DEFAULT NULL,
  `status_order` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_admin`, `id_pengunjung`, `waktu_pesan`, `no_meja`, `total_harga`, `uang_bayar`, `uang_kembali`, `status_order`) VALUES
(50, 1, 27, '2023-06-19 02:59:02', 1, '79000', '100000', '21000', 'sudah bayar'),
(51, 1, 28, '2023-06-19 02:59:28', 3, '104000', '110000', '6000', 'sudah bayar'),
(52, 1, 29, '2023-06-19 02:59:47', 2, '42000', '50000', '8000', 'sudah bayar'),
(53, 1, 35, '2023-06-19 03:00:04', 5, '27000', '50000', '23000', 'sudah bayar'),
(54, 1, 31, '2023-06-19 03:00:22', 4, '81000', '100000', '19000', 'sudah bayar'),
(55, 1, 32, '2023-06-19 03:00:36', 7, '27000', '50000', '23000', 'sudah bayar'),
(56, 1, 33, '2023-06-19 03:00:51', 6, '27000', '50000', '23000', 'sudah bayar'),
(57, 1, 40, '2023-06-19 03:01:29', 4, '104000', '120000', '16000', 'sudah bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_masakan` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status_pesan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id_user`, `id_order`, `id_masakan`, `jumlah`, `status_pesan`) VALUES
(140, 27, 50, 49, 1, 'sudah'),
(141, 27, 50, 48, 1, 'sudah'),
(142, 27, 50, 47, 1, 'sudah'),
(143, 28, 51, 48, 2, 'sudah'),
(144, 28, 51, 45, 1, 'sudah'),
(145, 28, 51, 46, 1, 'sudah'),
(146, 29, 52, 42, 1, 'sudah'),
(147, 29, 52, 43, 1, 'sudah'),
(148, 35, 53, 50, 1, 'sudah'),
(149, 31, 54, 49, 1, 'sudah'),
(150, 31, 54, 50, 2, 'sudah'),
(151, 32, 55, 51, 1, 'sudah'),
(152, 33, 56, 49, 1, 'sudah'),
(153, 40, 57, 51, 2, 'sudah'),
(154, 40, 57, 47, 1, 'sudah'),
(155, 40, 57, 44, 1, 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL,
  `status_cetak` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `id_pesan`, `jumlah_terjual`, `status_cetak`) VALUES
(1, 46, 1, 'belum cetak'),
(2, 47, 2, 'belum cetak'),
(3, 48, 2, 'belum cetak'),
(4, 49, 1, 'belum cetak'),
(5, 50, 2, 'belum cetak'),
(6, 51, 0, 'belum cetak'),
(7, 52, 0, 'belum cetak'),
(8, 53, 0, 'belum cetak'),
(9, 54, 0, 'belum cetak'),
(10, 55, 0, 'belum cetak'),
(11, 56, 2, 'belum cetak'),
(12, 57, 1, 'belum cetak'),
(13, 58, 6, 'belum cetak'),
(14, 59, 1, 'belum cetak'),
(15, 60, 1, 'belum cetak'),
(16, 61, 1, 'belum cetak'),
(17, 62, 3, 'belum cetak'),
(18, 63, 1, 'belum cetak'),
(19, 64, 1, 'belum cetak'),
(20, 65, 1, 'belum cetak'),
(21, 66, 0, 'belum cetak'),
(22, 67, 1, 'belum cetak'),
(23, 68, 1, 'belum cetak'),
(24, 69, 1, 'belum cetak'),
(25, 70, 0, 'belum cetak'),
(26, 71, 0, 'belum cetak'),
(27, 72, 0, 'belum cetak'),
(28, 73, 0, 'belum cetak'),
(29, 74, 1, 'belum cetak'),
(30, 75, 1, 'belum cetak'),
(31, 76, 0, 'belum cetak'),
(32, 77, 1, 'belum cetak'),
(33, 78, 0, 'belum cetak'),
(34, 79, 0, 'belum cetak'),
(35, 80, 0, 'belum cetak'),
(36, 81, 0, 'belum cetak'),
(37, 82, 0, 'belum cetak'),
(38, 83, 0, 'belum cetak'),
(39, 84, 0, 'belum cetak'),
(40, 85, 0, 'belum cetak'),
(41, 86, 2, 'belum cetak'),
(42, 87, 1, 'belum cetak'),
(43, 88, 0, 'belum cetak'),
(44, 89, 0, 'belum cetak'),
(45, 90, 2, 'belum cetak'),
(46, 91, 0, 'belum cetak'),
(47, 92, 0, 'belum cetak'),
(48, 93, 0, 'belum cetak'),
(49, 94, 0, 'belum cetak'),
(50, 95, 0, 'belum cetak'),
(51, 96, 0, 'belum cetak'),
(52, 97, 2, 'belum cetak'),
(53, 98, 1, 'belum cetak'),
(54, 99, 1, 'belum cetak'),
(55, 100, 1, 'belum cetak'),
(56, 101, 2, 'belum cetak'),
(57, 102, 1, 'belum cetak'),
(58, 103, 1, 'belum cetak'),
(59, 104, 1, 'belum cetak'),
(60, 105, 1, 'belum cetak'),
(61, 106, 1, 'belum cetak'),
(62, 107, 1, 'belum cetak'),
(63, 108, 1, 'belum cetak'),
(64, 109, 2, 'belum cetak'),
(65, 110, 3, 'belum cetak'),
(66, 111, 1, 'belum cetak'),
(67, 112, 2, 'belum cetak'),
(68, 113, 2, 'belum cetak'),
(69, 114, 1, 'belum cetak'),
(70, 115, 1, 'belum cetak'),
(71, 116, 0, 'belum cetak'),
(72, 117, 0, 'belum cetak'),
(73, 118, 0, 'belum cetak'),
(74, 119, 0, 'belum cetak'),
(75, 120, 0, 'belum cetak'),
(76, 121, 0, 'belum cetak'),
(77, 122, 0, 'belum cetak'),
(78, 123, 0, 'belum cetak'),
(79, 124, 0, 'belum cetak'),
(80, 125, 1, 'belum cetak'),
(81, 126, 0, 'belum cetak'),
(82, 127, 0, 'belum cetak'),
(83, 128, 0, 'belum cetak'),
(84, 129, 1, 'belum cetak'),
(85, 130, 0, 'belum cetak'),
(86, 131, 0, 'belum cetak'),
(87, 132, 0, 'belum cetak'),
(88, 133, 0, 'belum cetak'),
(89, 134, 0, 'belum cetak'),
(90, 135, 0, 'belum cetak'),
(91, 136, 0, 'belum cetak'),
(92, 137, 2, 'belum cetak'),
(93, 138, 2, 'belum cetak'),
(94, 139, 1, 'belum cetak'),
(95, 140, 1, 'belum cetak'),
(96, 141, 1, 'belum cetak'),
(97, 142, 1, 'belum cetak'),
(98, 143, 2, 'belum cetak'),
(99, 144, 1, 'belum cetak'),
(100, 145, 1, 'belum cetak'),
(101, 146, 1, 'belum cetak'),
(102, 147, 1, 'belum cetak'),
(103, 148, 1, 'belum cetak'),
(104, 149, 1, 'belum cetak'),
(105, 150, 2, 'belum cetak'),
(106, 151, 1, 'belum cetak'),
(107, 152, 1, 'belum cetak'),
(108, 153, 2, 'belum cetak'),
(109, 154, 1, 'belum cetak'),
(110, 155, 1, 'belum cetak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `id_level`, `status`) VALUES
(1, 'admin', '123', 'Devin Prianto', 1, 'aktif'),
(23, 'waiter', '123', 'Inara', 2, 'aktif'),
(24, 'owner', '123', 'Wisnu', 4, 'aktif'),
(25, 'kasir', '123', 'anum', 3, 'aktif'),
(27, 'somad', '123', 'somad', 5, 'aktif'),
(28, 'parhan', '123', 'parhan', 5, 'aktif'),
(29, 'kesy', '123', 'kesy', 5, 'aktif'),
(30, 'user', '123', 'user', 5, 'aktif'),
(31, 'akhul', '123', 'akhul', 5, 'aktif'),
(32, 'alip', '123', 'alip', 5, 'aktif'),
(33, 'munna', '123', 'munna', 5, 'aktif'),
(34, 'sema', '123', 'sema', 5, 'aktif'),
(35, 'jason', '123', 'jason', 5, 'aktif'),
(40, 'Devin', '123', 'Devin', 5, 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
