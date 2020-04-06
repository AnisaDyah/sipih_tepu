-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2020 pada 04.33
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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `merk` varchar(30) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `nama_barang`, `merk`, `stok`) VALUES
(1, 'Aqua 1', 'Aqua', 20),
(2, 'Aqua 2', 'Aqua', 10),
(3, 'Aqua 3', 'Aqua', 30),
(4, 'Aqua 4', 'Aqua', 40),
(5, 'Aqua 5', 'Aqua', 5),
(6, 'Wardah 1', 'Wardah', 10),
(7, 'Wardah 2', 'Wardah', 20),
(8, 'Wardah 3', 'Wardah', 10),
(9, 'Wardah 4', 'Wardah', 50),
(10, 'Inez 1', 'Inez', 10),
(11, 'Inez 2', 'Inez', 30),
(12, 'VIva 1', 'Viva', 30),
(13, 'Coca-Cola 1', 'Coca-cola', 10),
(14, 'Coca-Cola 2', 'Coca-cola', 10),
(15, 'Coca-Cola 3', 'Coca-cola', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_log`
--

CREATE TABLE `histori_log` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_user` varchar(255) DEFAULT NULL,
  `log_tipe` int(11) DEFAULT NULL,
  `log_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `histori_log`
--

INSERT INTO `histori_log` (`log_id`, `log_time`, `log_user`, `log_tipe`, `log_desc`) VALUES
(9, '2020-02-18 09:06:53', NULL, 2, 'menambahkan user');

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
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setoran_telur`
--

INSERT INTO `setoran_telur` (`id_setoran`, `id_user`, `tgl_setoran`, `jml_setoran`, `harga`, `total`) VALUES
(1, 1, '2020-02-23', '30', '20000', '400000'),
(3, 6, '2020-03-02', '20', '25000', '500000'),
(5, 6, '2020-03-01', '10', '20000', '200000'),
(6, 6, '2020-03-03', '15', '10000', '150000'),
(7, 2, '2020-01-02', '20', '20000', '400000');

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
(1, 1, 'nur sodiq', 'Dsn. Unggahan', 'admin', 'admin'),
(2, 1, 'aksin almahfudi', 'Dsn. Sanggrahan RT/RW 01/01 Ds. Jugo', 'aksin', 'fc5ebf68105eb6c3d71c83e0204a0327'),
(5, 1, 'anisa', 'sanggrhan', 'anisa', '40cc8f68f52757aff1ad39a006bfbf11'),
(6, 1, 'anisa dyah', 'sanggrahan', 'anisa', '17cc3c72e98806b58d468050591a72ee');

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
(1, 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `histori_log`
--
ALTER TABLE `histori_log`
  ADD PRIMARY KEY (`log_id`);

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
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `histori_log`
--
ALTER TABLE `histori_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `setoran_telur`
--
ALTER TABLE `setoran_telur`
  MODIFY `id_setoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
