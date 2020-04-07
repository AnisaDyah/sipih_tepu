-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2020 pada 19.36
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
-- Database: `sipih_tepu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_log`
--

CREATE TABLE `histori_log` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_user` int(11) DEFAULT NULL,
  `log_tipe` int(11) DEFAULT NULL,
  `log_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `histori_log`
--

INSERT INTO `histori_log` (`log_id`, `log_time`, `log_user`, `log_tipe`, `log_desc`) VALUES
(12, '2020-03-16 12:58:49', NULL, 2, 'menambahkan user'),
(13, '2020-03-16 13:07:46', 8, 2, 'menambahkan user'),
(14, '2020-03-16 15:00:14', 8, 3, 'mengubah data user'),
(15, '2020-03-16 15:00:58', 8, 4, 'menghapus data user'),
(16, '2020-03-16 15:03:19', 8, 1, 'Logout'),
(17, '2020-03-16 15:03:28', 8, 0, 'Login'),
(18, '2020-03-16 15:49:40', 8, 2, 'menambahkan data setoran telur'),
(19, '2020-03-16 15:49:49', 8, 1, 'Logout'),
(20, '2020-03-16 15:49:53', 5, 0, 'Login'),
(21, '2020-03-16 15:50:09', 5, 5, 'user telah validasi data setoran'),
(22, '2020-03-16 15:50:24', 5, 1, 'Logout'),
(23, '2020-03-16 15:50:29', 8, 0, 'Login'),
(24, '2020-03-16 16:02:35', 8, 1, 'Logout'),
(25, '2020-03-16 16:02:42', 5, 0, 'Login'),
(26, '2020-03-16 16:02:46', 5, 1, 'Logout'),
(27, '2020-03-16 16:10:58', NULL, 1, 'Logout'),
(28, '2020-03-16 16:11:03', 8, 0, 'Login'),
(29, '2020-03-16 16:12:41', 8, 1, 'Logout'),
(30, '2020-03-16 16:14:57', NULL, 1, 'Logout'),
(31, '2020-03-16 16:18:21', 8, 0, 'Login'),
(32, '2020-03-16 16:32:14', 8, 1, 'Logout'),
(33, '2020-03-16 16:32:21', 5, 0, 'Login'),
(34, '2020-03-16 16:32:31', 5, 1, 'Logout'),
(35, '2020-03-16 16:32:35', 8, 0, 'Login'),
(36, '2020-03-16 16:44:48', 8, 1, 'Logout'),
(37, '2020-03-16 16:44:53', 8, 0, 'Login'),
(38, '2020-03-16 16:48:11', 8, 2, 'menambahkan data setoran telur'),
(39, '2020-03-16 16:48:48', 8, 1, 'Logout'),
(40, '2020-03-16 16:50:47', 5, 0, 'Login'),
(41, '2020-03-16 16:51:51', 5, 1, 'Logout'),
(42, '2020-03-16 16:51:56', 8, 0, 'Login'),
(43, '2020-03-16 16:59:42', 8, 4, 'menghapus data setoran telur'),
(44, '2020-03-16 16:59:48', 8, 4, 'menghapus data setoran telur'),
(45, '2020-03-16 17:04:59', 8, 2, 'menambahkan data setoran telur'),
(46, '2020-03-16 17:05:25', 8, 2, 'menambahkan data setoran telur'),
(47, '2020-03-16 17:05:51', 8, 4, 'menghapus data setoran telur'),
(48, '2020-03-16 17:53:05', 8, 1, 'Logout'),
(49, '2020-03-16 17:53:12', 5, 0, 'Login'),
(50, '2020-03-16 17:53:37', 5, 5, 'user telah validasi data setoran'),
(51, '2020-03-16 17:56:45', 5, 1, 'Logout'),
(52, '2020-03-16 17:56:59', 8, 0, 'Login'),
(53, '2020-03-16 18:00:55', 8, 4, 'menghapus data setoran telur'),
(54, '2020-03-17 04:27:53', 8, 0, 'Login'),
(55, '2020-03-17 06:22:24', 8, 1, 'Logout'),
(56, '2020-03-17 06:22:30', 5, 0, 'Login'),
(57, '2020-03-17 07:05:12', 5, 1, 'Logout'),
(58, '2020-03-17 07:05:20', 8, 0, 'Login'),
(59, '2020-03-17 07:14:21', 8, 1, 'Logout'),
(60, '2020-03-17 07:15:58', 8, 0, 'Login'),
(61, '2020-03-17 07:17:12', 8, 0, 'Login'),
(62, '2020-03-17 07:17:41', 8, 1, 'Logout'),
(63, '2020-03-17 07:17:46', 5, 0, 'Login'),
(64, '2020-03-18 04:19:53', NULL, 1, 'Logout'),
(65, '2020-03-18 04:20:02', 8, 0, 'Login'),
(66, '2020-03-18 04:54:27', NULL, 1, 'Logout'),
(67, '2020-03-18 04:54:32', 8, 0, 'Login'),
(68, '2020-03-18 07:24:17', 8, 0, 'Login'),
(69, '2020-03-18 07:26:32', 8, 0, 'Login'),
(70, '2020-03-18 08:17:24', 8, 1, 'Logout'),
(71, '2020-03-18 08:17:30', 8, 0, 'Login'),
(72, '2020-03-18 08:37:59', 8, 1, 'Logout'),
(73, '2020-03-18 08:38:04', 5, 0, 'Login'),
(74, '2020-03-18 08:52:33', 5, 1, 'Logout'),
(75, '2020-03-18 08:52:39', 8, 0, 'Login'),
(76, '2020-03-24 11:27:58', 8, 0, 'Login'),
(77, '2020-04-04 05:15:03', 8, 0, 'Login'),
(78, '2020-04-04 05:19:20', 8, 1, 'Logout'),
(79, '2020-04-04 05:19:25', 5, 0, 'Login'),
(80, '2020-04-06 14:24:49', 8, 0, 'Login'),
(81, '2020-04-06 15:28:48', 8, 0, 'Login'),
(82, '2020-04-07 05:10:52', 8, 0, 'Login'),
(83, '2020-04-07 10:07:47', 8, 0, 'Login'),
(84, '2020-04-07 15:38:02', 8, 1, 'Logout'),
(85, '2020-04-07 15:38:09', 8, 0, 'Login');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setoran_telur`
--

CREATE TABLE `setoran_telur` (
  `id_setoran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_setoran` date NOT NULL,
  `jml_setoran` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setoran_telur`
--

INSERT INTO `setoran_telur` (`id_setoran`, `id_user`, `tgl_setoran`, `jml_setoran`, `harga`, `total`, `status`) VALUES
(8, 5, '2020-03-01', '50', '20000', '1000000', 'data telah dikonfirmasi'),
(10, 5, '2020-03-02', '20', '20000', '400000', 'data telah dikonfirmasi'),
(13, 9, '2020-03-02', '30', '25000', '750000', 'data belum dikonfirmasi'),
(14, 5, '2020-03-01', '20', '20000', '200000', 'data belum dikonfirmasi'),
(15, 5, '2019-01-01', '20', '16600', '332000', 'data belum dikonfirmasi'),
(16, 5, '2019-01-08', '30', '17000', '510000', 'data belum dikonfirmasi'),
(17, 5, '2019-01-15', '40', '19000', '760000', 'data belum dikonfirmasi'),
(18, 5, '2019-01-22', '50', '21500', '1075000', 'data belum dikonfirmasi'),
(19, 5, '2019-01-29', '60', '21200', '1272000', 'data belum dikonfirmasi'),
(20, 5, '2019-02-05', '30', '21000', '630000', 'data belum dikonfirmasi'),
(21, 5, '2019-02-12', '40', '22000', '880000', 'data belum dikonfirmasi'),
(22, 5, '2019-02-19', '50', '22500', '1125000', 'data belum dikonfirmasi'),
(23, 5, '2019-02-26', '30', '22800', '684000', 'data belum dikonfirmasi'),
(24, 5, '2019-03-05', '20', '22300', '446000', 'data belum dikonfirmasi'),
(25, 5, '2019-03-12', '60', '21300', '1278000', 'data belum dikonfirmasi'),
(26, 5, '2019-03-19', '30', '20800', '624000', 'data belum dikonfirmasi'),
(27, 5, '2019-03-26', '40', '20000', '800000', 'data belum dikonfirmasi'),
(28, 5, '2019-04-02', '70', '19500', '1365000', 'data belum dikonfirmasi'),
(29, 5, '2019-04-09', '80', '19000', '1520000', 'data belum dikonfirmasi'),
(30, 5, '2019-04-16', '90', '19000', '1710000', 'data belum dikonfirmasi'),
(31, 5, '2019-04-23', '60', '19000', '1140000', 'data belum dikonfirmasi'),
(32, 5, '2019-04-30', '30', '19000', '570000', 'data belum dikonfirmasi'),
(33, 5, '2019-05-07', '40', '18800', '752000', 'data belum dikonfirmasi'),
(34, 5, '2019-05-14', '50', '20000', '1000000', 'data belum dikonfirmasi'),
(35, 5, '2019-05-21', '60', '20000', '1200000', 'data belum dikonfirmasi'),
(36, 5, '2019-05-28', '80', '19500', '1560000', 'data belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `nama_lengkap`, `alamat`, `username`, `password`) VALUES
(5, 2, 'anisa', 'sanggrhan', 'anisa', '40cc8f68f52757aff1ad39a006bfbf11'),
(8, 1, 'aksin almahfudi', 'Dsn. Sanggrahan RT/RW 01/01 Ds. Jugo', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(9, 2, 'dyah', 'Dsn. Sanggrahan RT/RW 01/01 Ds. Jugo', 'dyah fa', '07f2c5a528f412c2bfee02cccd774ef6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'administrator'),
(2, 'peternak');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `histori_log`
--
ALTER TABLE `histori_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `log_user` (`log_user`);

--
-- Indeks untuk tabel `setoran_telur`
--
ALTER TABLE `setoran_telur`
  ADD PRIMARY KEY (`id_setoran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `histori_log`
--
ALTER TABLE `histori_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `setoran_telur`
--
ALTER TABLE `setoran_telur`
  MODIFY `id_setoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `histori_log`
--
ALTER TABLE `histori_log`
  ADD CONSTRAINT `histori_log_ibfk_1` FOREIGN KEY (`log_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `setoran_telur`
--
ALTER TABLE `setoran_telur`
  ADD CONSTRAINT `setoran_telur_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
