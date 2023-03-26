-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2020 pada 07.32
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datarecording`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_minggu`
--

CREATE TABLE `data_minggu` (
  `id_minggu` int(20) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `minggu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_minggu`
--

INSERT INTO `data_minggu` (`id_minggu`, `tanggal`, `minggu`) VALUES
(68, '30 Sep 2019 - 6 Okt 2019', '40'),
(69, '7 Okt 2019 - 13 Okt 2019', '41'),
(70, '14 Okt 2019 - 20 Okt 2019', '42'),
(71, '21 Okt 2019 - 27 Okt 2019', '43'),
(72, '28 Okt 2019 - 3 Nov 2019', '44'),
(73, '4 Nov 2019 - 10 Nov 2019', '45'),
(74, '11 Nov 2019 - 17 Nov 2019', '46'),
(75, '18 Nov 2019 - 24 Nov 2019', '47'),
(76, '25 Nov 2019 - 1 Des 2019', '48'),
(77, '2 Des 2019 - 8 Des 2019', '49'),
(78, '9 Des 2019 - 15 Des 2019', '50'),
(79, '16 Des 2019 - 22 Des 2019', '51'),
(80, '23 Des 2019 - 29 Des 2019', '52'),
(81, '30 Des 2019 - 5 Jan 2020', '1'),
(82, '6 Jan 2020 - 12 Jan 2020', '2'),
(83, '13 Jan 2020 - 19 Jan 2020', '3'),
(84, '20 Jan 2020 - 26 Jan 2020', '4'),
(85, '27 Jan 2020 - 2 Feb 2020', '5'),
(86, '3 Feb 2020 - 9 Feb 2020', '6'),
(87, '10 Feb 2020 - 16 Feb 2020', '7'),
(88, '17 Feb 2020 - 23 Feb 2020', '8'),
(89, '24 Feb 2020 - 1 Mar 2020', '9'),
(90, '2 Mar 2020 - 8 Mar 2020', '10'),
(91, '9 Mar 2020 - 15 Mar 2020', '11'),
(92, '16 Mar 2020 - 22 Mar 2020', '12'),
(93, '23 Mar 2020 - 29 Mar 2020', '13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_pakan`
--

CREATE TABLE `histori_pakan` (
  `id_histori` int(20) NOT NULL,
  `id_jenis` int(20) NOT NULL,
  `id_minggu` int(20) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `histori_pakan`
--

INSERT INTO `histori_pakan` (`id_histori`, `id_jenis`, `id_minggu`, `jumlah`, `tahun`) VALUES
(72, 1, 74, '11305', 2019),
(73, 1, 75, '11325', 2019),
(74, 1, 76, '11355', 2019),
(75, 1, 77, '11345', 2019),
(76, 1, 78, '11320', 2019),
(77, 1, 79, '11290', 2019),
(78, 1, 80, '11360', 2019),
(79, 1, 81, '11340', 2020),
(80, 1, 82, '11375', 2020),
(81, 1, 83, '11330', 2020),
(82, 1, 84, '11290', 2020),
(83, 1, 85, '11325', 2020),
(84, 1, 86, '11340', 2020),
(85, 1, 87, '11365', 2020),
(86, 1, 88, '11320', 2020),
(87, 1, 89, '11325', 2020),
(88, 1, 90, '11310', 2020),
(89, 1, 91, '11345', 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pakan`
--

CREATE TABLE `jenis_pakan` (
  `id_jenis` int(20) NOT NULL,
  `jenis_pakan` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pakan`
--

INSERT INTO `jenis_pakan` (`id_jenis`, `jenis_pakan`, `harga`) VALUES
(1, 'hijauan', '350'),
(2, 'konsentrat', '2500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_pengguna` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(254) DEFAULT NULL,
  `level` enum('admin','pengurus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_pengguna`, `username`, `password`, `level`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(2, 'pengurus', '827ccb0eea8a706c4c34a16891f84e7b', 'pengurus'),
(3, 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(4, 'pengurus1', '827ccb0eea8a706c4c34a16891f84e7b', 'pengurus');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_minggu`
--
ALTER TABLE `data_minggu`
  ADD PRIMARY KEY (`id_minggu`);

--
-- Indeks untuk tabel `histori_pakan`
--
ALTER TABLE `histori_pakan`
  ADD PRIMARY KEY (`id_histori`),
  ADD KEY `histori_pakan_ibfk_1` (`id_jenis`),
  ADD KEY `histori_pakan_ibfk_2` (`id_minggu`);

--
-- Indeks untuk tabel `jenis_pakan`
--
ALTER TABLE `jenis_pakan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_minggu`
--
ALTER TABLE `data_minggu`
  MODIFY `id_minggu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `histori_pakan`
--
ALTER TABLE `histori_pakan`
  MODIFY `id_histori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `jenis_pakan`
--
ALTER TABLE `jenis_pakan`
  MODIFY `id_jenis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_pengguna` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `histori_pakan`
--
ALTER TABLE `histori_pakan`
  ADD CONSTRAINT `histori_pakan_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_pakan` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `histori_pakan_ibfk_2` FOREIGN KEY (`id_minggu`) REFERENCES `data_minggu` (`id_minggu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
