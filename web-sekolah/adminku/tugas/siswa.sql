-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2021 pada 04.05
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
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(9) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username_login` varchar(50) NOT NULL,
  `password_login` varchar(50) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `th_masuk` varchar(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `persentase` int(3) NOT NULL,
  `blokir` enum('Y','N') NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `id_session_soal` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL DEFAULT 'siswa'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_lengkap`, `username_login`, `password_login`, `id_kelas`, `jabatan`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `nama_ayah`, `nama_ibu`, `th_masuk`, `email`, `no_telp`, `foto`, `persentase`, `blokir`, `id_session`, `id_session_soal`, `level`) VALUES
(7, '034/034.070', 'Dicky', 'siswa1', '013f0f67779f3b1686c604db150d12ea', '12rpl', 'Ketua Kelas', 'Jedah,Siman', 'Ponorogo', '1996-08-10', 'L', 'Islam', 'Wakadir', 'Watini', '2010', 'pranaandypal@yahoo.com', '090909', '3aa.jpg', 0, 'N', '878c2cqu6golti01qh86j61qb0', '034/034.070', 'siswa'),
(5, '90909', 'El faruq harisal aji', 'almazary', '0f0484d5239cbdeee629258b816785d3', '11rpl', 'Ketua Kelas', 'Jl.KHA DAHLAN unit 2 rimbo bujang', 'rimbo bujang', '1990-08-10', 'L', 'Islam', 'wagimin', 'sri ngatini', '2008', 'almazary@gmail.com', '085228482669', 'Untitled-1.jpg', 0, 'N', '90909', '90909', 'siswa'),
(8, '080800', 'yogi', 'yogi', '938e14c074c45c62eb15cc05a6f36d79', '10rpl', 'siswa', 'jl.gajah', 'kisaran', '1989-05-15', 'L', 'Islam', 'emboh', 'emboh', '2009', 'yogizeger@yahoo.com', '0000', '12241286_205349899796583_7077285851609688335_n.jpg', 0, 'N', 'hvgb1h0eamjg6opqqmisgdi7e2', '080800', 'siswa'),
(11, '013/013.070', 'Rio Ayatullah', 'rio', 'd5ed38fdbf28bc4e58be142cf5a17cf5', '12rpl', 'siswa', 'RIo          ', 'Ponorogo', '1997-04-13', 'L', 'islam', 'Kadirun', 'Watini', '2013', 'rio@gmail.com', '089757577372', 'Folder.jpg', 0, 'N', '7lib45fg1urf4iq6r0ak61ec95', '013/013.070', 'siswa'),
(10, '9090909', 'ali', 'ali', '86318e52f5ed4801abe1d13d509443de', '11rpl', 'siswa', 'alamat', 'Ponorogo', '1996-03-10', 'L', 'islam', 'asd', 'asdfgas', '2012', 'admin@admin.com', '6070707', '12278748_210216469309926_7115825229146990081_n.jpg', 0, 'N', 'em92ju8p8p3ho957r6bbs4ojs7', '9090909', 'siswa'),
(12, '1920118147', 'Firdaus Haqiqi', 'uname', '30705a58b0254b063b4abe03845b9ddc', '12rpl', 'siswa', 'Galaksi Andromeda', 'Antah Beratah', '2004-01-17', 'L', 'Islam', 'John', 'Jane', '2021', 'email@email.com', '+62-812-3456-7890', 'sky.jpg', 67, 'N', 'br4k7755s457tkevl29pbq8eti', '1920118147', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
