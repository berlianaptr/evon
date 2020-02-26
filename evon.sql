-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jun 2018 pada 16.07
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `password`, `username`) VALUES
(0, '123', 'admin'),
(1, '1234', 'ina');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_korban`
--

CREATE TABLE `jenis_korban` (
  `id_jenis` int(10) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `nilai_jenis` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_korban`
--

INSERT INTO `jenis_korban` (`id_jenis`, `nama_jenis`, `nilai_jenis`) VALUES
(1, 'Selamat', 0.01),
(2, 'Luka Ringan', 0.02),
(3, 'Luka Berat', 0.03),
(4, 'Meninggal', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `korban`
--

CREATE TABLE `korban` (
  `id_korban` int(100) NOT NULL,
  `id_timsar` int(50) DEFAULT NULL,
  `id_jenis` int(10) DEFAULT NULL,
  `jumlah_korban` int(100) NOT NULL,
  `lokasi_korban` varchar(100) NOT NULL,
  `tanggal_korban` date NOT NULL,
  `id_rs` int(10) DEFAULT NULL,
  `id_posko` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `korban`
--

INSERT INTO `korban` (`id_korban`, `id_timsar`, `id_jenis`, `jumlah_korban`, `lokasi_korban`, `tanggal_korban`, `id_rs`, `id_posko`) VALUES
(41, 2, 2, 10, 'Pakem', '0000-00-00', NULL, NULL),
(42, 2, 4, 40, 'Pakem', '0000-00-00', NULL, NULL),
(43, 6, 3, 50, 'Pakem', '0000-00-00', NULL, NULL),
(44, 1, 1, 10, 'Pakem', '0000-00-00', NULL, NULL),
(45, 3, 2, 30, 'Pakem', '0000-00-00', NULL, NULL),
(46, 3, 1, 20, 'Pakem', '0000-00-00', NULL, NULL),
(47, 2, 3, 5, 'masjid jumadil kubra', '2018-06-23', NULL, NULL),
(48, 2, 3, 20, 'masjid jumadil kubra', '2018-06-07', NULL, NULL),
(49, 1, 3, 25, 'masjid jumadil kubra', '2018-06-13', NULL, NULL),
(50, 1, 3, 55, 'masjid jumadil kubra', '2018-06-14', NULL, NULL),
(51, 1, 3, 12, 'masjid jumadil kubra', '2018-06-12', NULL, NULL),
(52, 2, 3, 3, 'masjid jumadil kubra', '2018-06-12', 14, NULL),
(53, 4, 3, 100, 'masjid jumadil kubra', '2018-06-11', 14, NULL),
(54, 3, 3, 100, 'masjid jumadil kubra', '2018-06-10', 16, NULL),
(55, 2, 1, 150, 'masjid jumadil kubra', '2018-06-05', NULL, 10),
(56, 2, 1, 30, 'masjid jumadil kubra', '2018-06-14', NULL, 12),
(57, 6, 1, 90, 'masjid jumadil kubra', '2018-06-04', NULL, 12),
(58, 4, 2, 65, 'masjid jumadil kubra', '2018-06-06', 16, NULL),
(59, 2, 1, 50, 'masjid jumadil kubra', '2018-06-05', NULL, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posko`
--

CREATE TABLE `posko` (
  `id_posko` int(100) NOT NULL,
  `nama_posko` varchar(100) NOT NULL,
  `alamat_posko` text NOT NULL,
  `ketersediaan_posko` int(100) NOT NULL,
  `jarak_posko` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posko`
--

INSERT INTO `posko` (`id_posko`, `nama_posko`, `alamat_posko`, `ketersediaan_posko`, `jarak_posko`) VALUES
(9, 'Lapangan Punthuk', 'Pakem', 300, 0.35),
(10, 'Lapangan Tennis', 'Pakem', 150, 0.32),
(12, 'SCC UII', 'Pakem', 100, 0.32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id_rs` int(10) NOT NULL,
  `nama_rs` varchar(100) NOT NULL,
  `alamat_rs` varchar(100) NOT NULL,
  `ketersediaan_rs` int(100) NOT NULL,
  `jarak_rs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id_rs`, `nama_rs`, `alamat_rs`, `ketersediaan_rs`, `jarak_rs`) VALUES
(12, 'Panti Nugroho', 'Sleman', 12, 0.28),
(14, 'Gramedika', 'Sleman', 10, 0.35),
(16, 'RSUD Sleman', 'Sleman', 200, 0.35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_sar`
--

CREATE TABLE `tim_sar` (
  `id_timsar` int(50) NOT NULL,
  `nama_timsar` varchar(11) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tim_sar`
--

INSERT INTO `tim_sar` (`id_timsar`, `nama_timsar`, `no_hp`) VALUES
(1, 'Tim 1', '0897577579'),
(2, 'Tim 2', '0886756888'),
(3, 'Tim 3', '0889878576'),
(4, 'Tim 4', '0897868755'),
(6, 'Tim 5', '0897986866');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_korban`
--
ALTER TABLE `jenis_korban`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `korban`
--
ALTER TABLE `korban`
  ADD PRIMARY KEY (`id_korban`),
  ADD KEY `id_rs` (`id_rs`),
  ADD KEY `id_posko` (`id_posko`),
  ADD KEY `no_hp` (`id_timsar`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `posko`
--
ALTER TABLE `posko`
  ADD PRIMARY KEY (`id_posko`);

--
-- Indexes for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indexes for table `tim_sar`
--
ALTER TABLE `tim_sar`
  ADD PRIMARY KEY (`id_timsar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_korban`
--
ALTER TABLE `jenis_korban`
  MODIFY `id_jenis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `korban`
--
ALTER TABLE `korban`
  MODIFY `id_korban` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `posko`
--
ALTER TABLE `posko`
  MODIFY `id_posko` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id_rs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tim_sar`
--
ALTER TABLE `tim_sar`
  MODIFY `id_timsar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `korban`
--
ALTER TABLE `korban`
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_korban` (`id_jenis`),
  ADD CONSTRAINT `fk_posko` FOREIGN KEY (`id_posko`) REFERENCES `posko` (`id_posko`),
  ADD CONSTRAINT `fk_rs` FOREIGN KEY (`id_rs`) REFERENCES `rumah_sakit` (`id_rs`),
  ADD CONSTRAINT `fk_timsar` FOREIGN KEY (`id_timsar`) REFERENCES `tim_sar` (`id_timsar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
