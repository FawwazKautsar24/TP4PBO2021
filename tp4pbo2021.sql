-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2021 pada 09.35
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp4pbo2021`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_tp`
--

CREATE TABLE `tb_nilai_tp` (
  `id` int(10) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `nim_mhs` varchar(255) NOT NULL,
  `tp1` int(3) NOT NULL,
  `tp2` int(3) NOT NULL,
  `tp3` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai_tp`
--

INSERT INTO `tb_nilai_tp` (`id`, `nama_mhs`, `nim_mhs`, `tp1`, `tp2`, `tp3`) VALUES
(1, 'ase', '122', 1, 60, 3),
(2, 'ade', '190', 80, 92, 95),
(3, 'dede', '7912', 91, 97, 86);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_nilai_tp`
--
ALTER TABLE `tb_nilai_tp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_tp`
--
ALTER TABLE `tb_nilai_tp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
