-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 05:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_okbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE `tb_akses` (
  `id_akses` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `view` enum('1','0') NOT NULL DEFAULT '1',
  `add` enum('1','0') NOT NULL DEFAULT '1',
  `edit` enum('1','0') NOT NULL DEFAULT '1',
  `delete` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`id_akses`, `id_menu`, `id_user`, `view`, `add`, `edit`, `delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '1', '1', '1', '1'),
(3, 3, 1, '1', '1', '1', '1'),
(4, 4, 1, '1', '1', '1', '1'),
(5, 5, 1, '1', '1', '1', '1'),
(6, 6, 1, '1', '1', '1', '1'),
(7, 1, 2, '1', '1', '1', '1'),
(8, 2, 2, '1', '1', '1', '1'),
(9, 3, 2, '1', '1', '1', '1'),
(10, 4, 2, '1', '1', '1', '1'),
(11, 5, 2, '1', '1', '1', '1'),
(12, 6, 2, '1', '1', '1', '1'),
(13, 1, 3, '1', '1', '1', '1'),
(14, 2, 3, '1', '1', '1', '1'),
(15, 3, 3, '1', '1', '1', '1'),
(16, 4, 3, '1', '1', '1', '1'),
(17, 5, 3, '1', '1', '1', '1'),
(18, 6, 3, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id_harga` int(11) NOT NULL,
  `tglaktif` date NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `kg` int(11) NOT NULL DEFAULT 0,
  `tl` varchar(20) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_harga`
--

INSERT INTO `tb_harga` (`id_harga`, `tglaktif`, `tujuan`, `code`, `harga`, `kg`, `tl`, `status`) VALUES
(32, '2020-07-22', 'denpasar', 'dps', 3873, 30, '2-3', 'aktif'),
(34, '2020-08-04', 'bali', 'DPSa', 10000, 30, '2-3', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenismuatan`
--

CREATE TABLE `tb_jenismuatan` (
  `id_jenismuatan` int(11) NOT NULL,
  `jenismuatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenismuatan`
--

INSERT INTO `tb_jenismuatan` (`id_jenismuatan`, `jenismuatan`) VALUES
(1, 'darat'),
(2, 'laut'),
(4, 'udara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `urutan`, `icon`, `link`, `menu`, `status`) VALUES
(1, 1, 'fa fa-users', 'C_User', 'Data User', 'aktif'),
(2, 2, 'fa fa-unlock-alt', 'C_Setting', 'Setting Akses', 'aktif'),
(3, 3, 'fa fa-suitcase', 'C_Muatan', 'Jenis Muatan', 'aktif'),
(4, 4, 'fa fa-dollar', 'C_Harga', 'Data Harga', 'aktif'),
(5, 5, 'fa fa-files-o', 'C_Transaksi', 'Transaksi', 'aktif'),
(6, 6, 'fa fa-table', 'C_Laporan', 'Laporan', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `noresi` varchar(20) NOT NULL,
  `namapengirim` varchar(100) NOT NULL,
  `alamatpengirim` varchar(300) NOT NULL,
  `nikpengirim` char(16) NOT NULL,
  `namapenerima` varchar(100) NOT NULL,
  `alamatpenerima` varchar(300) NOT NULL,
  `nikpenerima` char(16) NOT NULL,
  `tlppengirim` char(12) NOT NULL,
  `tlppenerima` char(12) NOT NULL,
  `emailpengirim` varchar(100) DEFAULT NULL,
  `emailpenerima` varchar(100) DEFAULT NULL,
  `ket` varchar(300) DEFAULT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `berat` double NOT NULL,
  `beratvolume` double NOT NULL DEFAULT 0,
  `tujuan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `jenisbarang` varchar(100) NOT NULL,
  `jeniskiriman` enum('dokumen','paket') NOT NULL,
  `id_jenismuatan` int(11) NOT NULL,
  `biayapacking` int(11) NOT NULL,
  `asuransi` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `noresi`, `namapengirim`, `alamatpengirim`, `nikpengirim`, `namapenerima`, `alamatpenerima`, `nikpenerima`, `tlppengirim`, `tlppenerima`, `emailpengirim`, `emailpenerima`, `ket`, `tgl_transaksi`, `id_user`, `jumlahbarang`, `berat`, `beratvolume`, `tujuan`, `subharga`, `jenisbarang`, `jeniskiriman`, `id_jenismuatan`, `biayapacking`, `asuransi`, `ppn`, `total`, `asal`, `harga`) VALUES
(1, 'aa11aa', 'alief', 'asd', '1234567890123456', 'riski', 'sad', '1234567890123456', '12345678', '12345678', 'asd@asd', 'asd@asd', '', '2020-08-03', 1, 123, 123, 1, 32, 15880, 'jenisbarang', 'dokumen', 1, 2000, 3000, 159, 21039, 'denpasar', 3873),
(2, 'aa11aa1', 'alief', 'asd', '1234567890123456', 'riski', 'asd', '1234567890123456', '12345678', '12345678', 'asd@asd', 'asd@asd', '', '2020-08-04', 3, 123, 123, 1, 34, 41000, 'jenisbarang', 'dokumen', 2, 2000, 3000, 0, 46000, 'bali', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `nik` char(16) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `nik`, `username`, `password`) VALUES
(1, 'admin', '1111111111111111', 'admin', 'admin'),
(3, 'asd', '1111111111211111', 'alief', 'alief');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `tb_jenismuatan`
--
ALTER TABLE `tb_jenismuatan`
  ADD PRIMARY KEY (`id_jenismuatan`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_jenismuatan`
--
ALTER TABLE `tb_jenismuatan`
  MODIFY `id_jenismuatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
