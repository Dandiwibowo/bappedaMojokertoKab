-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 04:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmkprobolinggo`
--

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id` int(11) NOT NULL,
  `idNasabah` varchar(20) NOT NULL,
  `nominal` double NOT NULL,
  `tgl` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `thn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id`, `idNasabah`, `nominal`, `tgl`, `bln`, `thn`) VALUES
(3, '2401124284', 400000, 17, 10, 2020),
(4, '2401124284', 500000, 17, 9, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `bunga`
--

CREATE TABLE `bunga` (
  `id` int(11) NOT NULL,
  `idNasabah` varchar(20) NOT NULL,
  `nominal` double NOT NULL,
  `tgl` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `thn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bunga`
--

INSERT INTO `bunga` (`id`, `idNasabah`, `nominal`, `tgl`, `bln`, `thn`) VALUES
(1, '2401124284', 20000, 28, 10, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `kelompok` varchar(255) NOT NULL,
  `plafond` double NOT NULL,
  `jumlah_pinjaman` double NOT NULL,
  `durasi_pinjaman` int(11) NOT NULL,
  `tgl` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `thn` int(11) NOT NULL,
  `bunga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `nama`, `alamat`, `bank`, `kelompok`, `plafond`, `jumlah_pinjaman`, `durasi_pinjaman`, `tgl`, `bln`, `thn`, `bunga`) VALUES
('2401124284', 'Dandi Wibowo', 'Surabaya', 'BCA', 'UKM', 500000, 3000000, 6, 17, 9, 2020, 0),
('4973103058', 'Dandi', 'Surabaya', 'BCA', 'UKM', 500000, 2000000, 6, 17, 10, 2020, 5);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Dandi Wibowo Ganteng', 'dandiadmin@gmail.com', '$2y$10$k.d4hiXVCeN7xdMlQX7l3OjV2nrN5FT5sLONvRIOqw0PZW2kDtCxG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bunga`
--
ALTER TABLE `bunga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bunga`
--
ALTER TABLE `bunga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
