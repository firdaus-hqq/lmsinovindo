-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 12:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `your_tasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tanggal_tugas`
--

CREATE TABLE `admin_tanggal_tugas` (
  `id_tanggal_tugas` int(11) NOT NULL,
  `batas_pengumpulan` date DEFAULT NULL,
  `waktu_tenggat` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_pengumpulan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tanggal_tugas`
--

INSERT INTO `admin_tanggal_tugas` (`id_tanggal_tugas`, `batas_pengumpulan`, `waktu_tenggat`, `waktu_pengumpulan`) VALUES
(1, '2021-08-12', '2021-08-13 05:04:00', '2021-08-13 05:04:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tanggal_tugas`
--
ALTER TABLE `admin_tanggal_tugas`
  ADD PRIMARY KEY (`id_tanggal_tugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tanggal_tugas`
--
ALTER TABLE `admin_tanggal_tugas`
  MODIFY `id_tanggal_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
