-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2021 pada 14.57
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rpl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `peringkat`
--

CREATE TABLE `peringkat` (
  `id_peringkat` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `wpm` int(5) DEFAULT NULL,
  `accuracy` int(5) DEFAULT NULL,
  `pretest` int(5) DEFAULT NULL,
  `posttest` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peringkat`
--

INSERT INTO `peringkat` (`id_peringkat`, `nama_lengkap`, `id_kelas`, `wpm`, `accuracy`, `pretest`, `posttest`) VALUES
(4, 'Uus', 'smkn4', 1, 100, NULL, NULL),
(6, 'Zelda', '11rpl', 20, 90, NULL, NULL),
(7, 'Rudi', '10rpl', 20, 80, NULL, NULL),
(9, 'Udin', 'smkn4', 20, 100, NULL, NULL),
(10, 'Abdul', '11rpl', 20, 95, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `peringkat`
--
ALTER TABLE `peringkat`
  ADD PRIMARY KEY (`id_peringkat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peringkat`
--
ALTER TABLE `peringkat`
  MODIFY `id_peringkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
