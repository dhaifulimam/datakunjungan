-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2023 pada 01.26
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdinaspendidikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapengunjung`
--

CREATE TABLE `datapengunjung` (
  `id` int(200) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(200) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `dariInstansi` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time(6) NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `datapengunjung`
--

INSERT INTO `datapengunjung` (`id`, `nama`, `jk`, `instansi`, `dariInstansi`, `tanggal`, `jam`, `keperluan`) VALUES
(1, 'ahmad', 'L', 'bidang tata usaha', 'sekolah sdn 1 cilegona', '2022-12-28', '21:35:00.000000', 'mengambil surat'),
(2, 'nur', 'P', 'bidang keuangan', 'dinas kesehatan', '2022-12-28', '21:36:00.000000', 'berkunjung'),
(3, 'abdi', 'L', 'bidang pendidikan', 'SMAN 2 Cilegon', '2022-12-29', '22:02:00.000000', 'Mengambil Surat'),
(4, 'iman', 'L', 'bidang keuangan', 'SMAN 1 Cilegon', '2022-12-29', '22:04:00.000000', 'Mengambil Surat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtadmin`
--

CREATE TABLE `dtadmin` (
  `id` int(200) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `dtadmin`
--

INSERT INTO `dtadmin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtinstansi`
--

CREATE TABLE `dtinstansi` (
  `id` int(200) NOT NULL,
  `namaInstansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `dtinstansi`
--

INSERT INTO `dtinstansi` (`id`, `namaInstansi`) VALUES
(4, 'bidang pendidikan'),
(5, 'bidang keuangan'),
(6, 'bidang tata usaha');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datapengunjung`
--
ALTER TABLE `datapengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtadmin`
--
ALTER TABLE `dtadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtinstansi`
--
ALTER TABLE `dtinstansi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datapengunjung`
--
ALTER TABLE `datapengunjung`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dtadmin`
--
ALTER TABLE `dtadmin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dtinstansi`
--
ALTER TABLE `dtinstansi`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
