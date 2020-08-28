-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 05:01 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(250) NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `author`, `address`) VALUES
(1, 'CV. Mitsutomo Jaya Abadi', 'STMIK Rosma', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history_barang_keluar`
--

CREATE TABLE `history_barang_keluar` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_surat_keluar` varchar(10) NOT NULL,
  `qty` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_barang_keluar`
--

INSERT INTO `history_barang_keluar` (`id`, `id_barang`, `id_surat_keluar`, `qty`) VALUES
(1, 15, 'K03', 90),
(2, 13, 'K03', 50),
(3, 13, 'K04', 2),
(4, 12, 'K05', 20),
(5, 17, 'K05', 80),
(6, 12, 'K06', 10),
(7, 15, 'K06', 5),
(8, 12, 'K01', 10),
(9, 15, 'K01', 100);

-- --------------------------------------------------------

--
-- Table structure for table `history_barang_masuk`
--

CREATE TABLE `history_barang_masuk` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_surat_masuk` varchar(11) NOT NULL,
  `qty` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_barang_masuk`
--

INSERT INTO `history_barang_masuk` (`id`, `id_barang`, `id_surat_masuk`, `qty`) VALUES
(15, 12, 'M14', 90),
(16, 15, 'M14', 90),
(17, 16, 'M14', 82),
(18, 12, 'M15', 80),
(19, 15, 'M16', 400),
(20, 12, 'M16', 20),
(21, 13, 'M17', 20),
(22, 12, 'M17', 40),
(23, 17, 'M18', 40),
(24, 16, 'M19', 20),
(25, 17, 'M19', 40),
(27, 13, 'M01', 100);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` varchar(11) NOT NULL,
  `kode_surat` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `operator` varchar(100) NOT NULL,
  `arsip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `kode_surat`, `perihal`, `tujuan`, `tanggal_surat`, `operator`, `arsip`) VALUES
('K01', '001/MJA-MKT/VIII/2020', 'Pengiriman Spare Part', 'PT. INDOCITRA', '2020-08-12', 'Hario Saloko', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` varchar(11) NOT NULL,
  `kode_surat` varchar(100) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `kode_surat`, `pengirim`, `tanggal_terima`, `tanggal_surat`, `perihal`) VALUES
('M01', '0192/SK/IN/08/2020', 'PT. SINTAS', '2020-08-12', '2020-08-13', 'Pengiriman Spare Part');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `qty`, `note`) VALUES
(12, 'Speedometer', 40, 'Jupiter Z1'),
(13, 'Velg CW  R17', 100, 'Motor Bebek'),
(15, 'kaos kaki', 605, ''),
(16, 'SPRING COMPRESSION', 0, ''),
(17, 'Body Mesin', 0, 'Nosakka');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Administrator', 'admin@rosma.ac.id', '16363.png', '$2y$10$wkPa7nXoLR9KGunw6qNG8ereZ1EGBZzFTonSwdsBr7JssHCevO.b6', 1, 1, 1552120289),
(15, 'Hario', 'hario@admin.com', '16363.png', '$2y$10$s9xtnxk7u/PFrmNXeB8pneCOKfK.x4qpz/DW9V.ck4Z2PORWPTET6', 2, 1, 1597239353),
(16, 'Rahmat', 'didin', '16363.png', '$2y$10$dDFf0EhQco4bIJ3k47gh9e2e.NUwY1RYSSNOq2ztxgB1BRP87arU2', 2, 1, 1597244441);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_barang_keluar`
--
ALTER TABLE `history_barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_barang` (`id_barang`),
  ADD KEY `id_surat_keluar` (`id_surat_keluar`);

--
-- Indexes for table `history_barang_masuk`
--
ALTER TABLE `history_barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_barang` (`id_barang`),
  ADD KEY `kode_surat_masuk` (`id_surat_masuk`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_barang_keluar`
--
ALTER TABLE `history_barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `history_barang_masuk`
--
ALTER TABLE `history_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
