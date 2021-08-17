-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2021 pada 05.01
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
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_file` int(10) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `file` varchar(3000) NOT NULL,
  `link` varchar(3000) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_file`, `id_siswa`, `file`, `link`, `tanggal`) VALUES
(1, 0, '', '<p>jnwfjnwe</p>\r\n', '2021-07-30 13:47:02'),
(2, 0, '', '<p>,mkewmfwg</p>\r\n', '2021-07-30 13:50:39'),
(3, 0, '', '<p>mnfnwefwf</p>\r\n', '2021-07-30 13:51:59'),
(4, 0, '', '<p>m,nv,sdv</p>\r\n', '2021-07-30 13:53:13'),
(5, 0, '', '<p>.knwlknwelfnew</p>\r\n', '2021-07-30 13:54:25'),
(6, 0, '', '<p>urrraaaaa</p>\r\n', '2021-07-30 13:56:27'),
(7, 0, '', '<p>knvkamdvds</p>\r\n', '2021-07-30 14:00:05'),
(8, 0, '', '<p>,. vds., dv</p>\r\n', '2021-07-30 15:10:00'),
(9, 0, 'winxp.jpg', '<p>,.mavdklmsldv</p>\r\n', '2021-07-30 15:16:32'),
(10, 12, 'winxp.jpg', '<p>www.www.com</p>\r\n', '2021-07-30 16:13:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_file` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
