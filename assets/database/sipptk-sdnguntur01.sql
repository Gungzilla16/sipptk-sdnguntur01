-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2023 pada 03.42
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipptk-sdnguntur01`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level_akses` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level_akses`) VALUES
(4, 'Akbarruzzaman', 'kepsek01', 'akbarruzzaman@rocketmail.com', '$2y$10$312lk5goE4STDy2h2y8gpe8SF', '2'),
(5, 'SDN Guntur 01', 'admin', 'sdnguntur01@gmail.com', '$2y$10$A6QtpjjyVYoY6OHUlp/8Z.Pdn', '1'),
(6, 'Agung', 'juniorgung', 'juniorgung16@gmail.com', '$2y$10$MtjpPXV4GBfDMLPkgfCjgudpO', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ptkguntur`
--

CREATE TABLE `ptkguntur` (
  `id_ptk` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nuptk` varchar(16) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `golongan` varchar(5) NOT NULL,
  `pentir` varchar(10) NOT NULL,
  `penins` varchar(50) NOT NULL,
  `penjur` varchar(50) NOT NULL,
  `penlus` year(4) NOT NULL,
  `gelar` varchar(6) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nkk` varchar(16) NOT NULL,
  `norek` varchar(10) NOT NULL,
  `npwp` varchar(15) NOT NULL,
  `bpjskes` varchar(12) NOT NULL,
  `bpjstk` varchar(10) NOT NULL,
  `tplahir` varchar(20) NOT NULL,
  `tglahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `email` varchar(24) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ptkguntur`
--

INSERT INTO `ptkguntur` (`id_ptk`, `nama`, `jenkel`, `status`, `jabatan`, `gambar`, `nuptk`, `nip`, `pangkat`, `golongan`, `pentir`, `penins`, `penjur`, `penlus`, `gelar`, `nik`, `nkk`, `norek`, `npwp`, `bpjskes`, `bpjstk`, `tplahir`, `tglahir`, `agama`, `alamat`, `email`, `telp`) VALUES
(1, 'Akbarruzzaman', 'Laki-Laki', 'PNS', 'Kepala Sekolah', 'akbar.jpg', '000000000000000', '196307059185031015', 'Pembina', 'IVa', 'Sarjana', 'IKIP Muhammadiyyah', 'Manajemen Pendidikan', 1985, 'Drs.', '000000000000', '0000', '00000', '0000', '00', '0', 'Jakarta', '1963-06-05', 'Islam', 'Jl. Wahyu', 'akbarruzzaman@rocketmail', '081410470445');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `ptkguntur`
--
ALTER TABLE `ptkguntur`
  ADD PRIMARY KEY (`id_ptk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ptkguntur`
--
ALTER TABLE `ptkguntur`
  MODIFY `id_ptk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
