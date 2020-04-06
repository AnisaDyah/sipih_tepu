-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Des 2019 pada 10.08
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sippko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`) VALUES
(5, 'Bag'),
(6, 'Straw'),
(7, 'Container'),
(8, 'Poncho'),
(9, 'PLA'),
(10, 'Paper');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) DEFAULT NULL,
  `bukti_tf` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `fk_user`, `tanggal`, `total`, `bukti_tf`, `status`) VALUES
(8, 23, '2019-12-08', 300000, 'buktipembayaran.jpg', 'Belum Dikonfirmasi Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `fk_order` int(11) NOT NULL,
  `fk_produk` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id`, `fk_order`, `fk_produk`, `jml`, `total`) VALUES
(8, 8, 14, 100, NULL);

--
-- Trigger `order_detail`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `order_detail` FOR EACH ROW update produk set stok=stok-NEW.jml where id_produk=NEW.fk_produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar`, `kategori`, `stok`, `harga`, `deskripsi`) VALUES
(9, 'Tshirt Bag', 'T-shirt-Bag-L1.png', 5, 10, 1000, 'Kami memiliki solusi alternatif untuk kantong plastik sekali pakai Anda yang berbahaya. Kami dapat membantu Anda membawa barang-barang Anda dan tampil seperti plastik biasa. Setiap tahun, diperkirakan 1 triliun kantong plastik dikonsumsi di seluruh dunia. Kompos dan dapat terurai secara hayati, kantong organik yang terbuat dari Singkong ini menawarkan solusi yang dapat disesuaikan untuk mengurangi sampah plastik. Tas ini adalah sebuah alternatif yang menjadi pengganti yang ideal untuk kantong plastik pada umumnya.'),
(10, 'Griphole Bag', 'Griphole-L-480x640.png', 5, 10, 2000, 'Kami juga memiliki jenis khusus tas organik yang biasanya ditujukan untuk mengemas pakaian / kain, kertas, aksesori, dll. Tas ini dapat di jadikan sebagai kompos, dengan cara pengomposan rumah yakni produk ini akan menjadi pupuk untuk tanaman Anda.'),
(12, 'Laundry / Garbage Bag', 'Laundry-or-Garbage-Bag-Large-480x6401.png', 5, 10, 2000, ' Terkadang sulit untuk mencari opsi berkelanjutan untuk menampung sampah Anda. Produk ini dibuat khusus untuk tempat sampah, kini Anda dapat membuang sampah tanpa harus menambahkan sampah plastik lain dengan menggunakan kantong ramah lingkungan seperti kami. Selain itu, Anda dapat membuat kompos sampah organik Anda tanpa membuat tangan Anda kotor karena kami juga kompos!'),
(13, 'Polybag', 'Polybag-Large-480x640.png', 5, -1, 1000, 'Tas adalah jenis khusus tas organik yang biasanya ditujukan untuk mengemas pakaian / kain, kertas, aksesori, dll. Tas ini juga dapat dijadikan kompos untuk tanaman Anda.'),
(14, 'Paper Straw', 'Swirly-Red-Paper-Straw-8-x-197-mm-480x640.png', 6, 798, 3000, 'Sedotan ini berasal dari bahan organik dan dilapisi dengan lilin nabati agar lebih tahan lama, menjadikan kami pilihan yang lebih berkelanjutan untuk dipilih.'),
(15, 'Paper Wrapped Straw', 'Paper-Wrapped-Straw-480x640.png', 6, 20, 1000, 'Produk ini berasal dari bahan organik dan dilapisi dengan lilin nabati agar lebih tahan lama, menjadikan kami pilihan yang lebih berkelanjutan untuk dipilih.'),
(16, 'PLA Straw', 'PLA-straw-White-6-x-197-mm-480x640.png', 6, 20, 2000, 'Terbuat dari bahan poly lactic acid (PLA) atau yang biasa dikenal dengan tepung jagung, produk ini memiliki kualitas yang tinggi.'),
(17, 'Bio Poncho', 'Poncho-480x640.png', 8, 20, 20000, 'Produk ini yakni Jas Hujan Organik, yang terbuat dari bahan Organik yang dapat di daur ulang kembali/'),
(18, 'Bowl', 'Bagasse-Food-Bowl-7-inch-480x640.png', 7, 20, 10000, 'Dibuat sepenuhnya dari bahan Organik, menjadikan kami solusi alternatif terbaik untuk wadah makanan Anda. Cukup buang dengan mengubur kami dengan bahan organik lainnya dan kami akan menjadi tanah dalam beberapa bulan!'),
(19, 'Plate', 'Bagasse-Edge-Plate-9-inch-480x640.png', 7, 19, 10000, 'Produk ini dibuat sepenuhnya dari bahan Organik, menjadikan kami solusi alternatif terbaik untuk wadah makanan Anda. Cukup buang dengan mengubur kami dengan bahan organik lainnya dan kami akan menjadi tanah dalam beberapa bulan!'),
(21, 'Rectangle Food Box', 'Bagasse-Food-Box-600-ml-480x640.png', 7, 15, 15000, 'Produk ini dibuat sepenuhnya dari bahan Organik, menjadikan kami solusi alternatif terbaik untuk wadah makanan Anda. Cukup buang dengan mengubur kami dengan bahan organik lainnya dan kami akan menjadi tanah dalam beberapa bulan!'),
(22, 'Square Food Box', 'Bagasse-Food-Box-9-inch-480x640.png', 7, 20, 15000, 'Produk ini dibuat sepenuhnya dari bahan Organik, menjadikan kami solusi alternatif terbaik untuk wadah makanan Anda. Cukup buang dengan mengubur kami dengan bahan organik lainnya dan kami akan menjadi tanah dalam beberapa bulan!'),
(23, 'Cutlery', 'PLA-Cutlery-480x640.png', 9, 20, 10000, 'Produk ini terlihat, terasa seperti plastik, tetapi ternyata tidak! Terbuat dari Polylactic Acid (PLA) atau tepung jagung, kita bisa berubah menjadi kompos yang baik bagi lingkungan.'),
(24, 'DOME LID', 'Lid-12-16-_-20-oz-Dome-480x640.png', 9, 20, 3000, 'Produk ini terlihat, terasa seperti plastik, tetapi ternyata tidak! Terbuat dari Polylactic Acid (PLA) atau tepung jagung, kita bisa berubah menjadi kompos yang baik bagi lingkungan.'),
(25, 'FLAT LID', 'Lid-12-16-_-20-oz-Flat-480x640.png', 9, 20, 3000, 'Produk ini terlihat, terasa seperti plastik, tetapi ternyata tidak! Terbuat dari Polylactic Acid (PLA) atau tepung jagung, kita bisa berubah menjadi kompos yang baik bagi lingkungan.'),
(26, 'PLA BOWL', 'PLA-Bowl-24-oz-480x640.png', 9, 20, 10000, 'Produk ini terlihat, terasa seperti plastik, tetapi ternyata tidak! Terbuat dari Polylactic Acid (PLA) atau tepung jagung, kita bisa berubah menjadi kompos yang baik bagi lingkungan.'),
(27, 'PLA CUP', 'PLA-Cup-20-oz-480x640.png', 9, 20, 10000, 'Produk ini terlihat, terasa seperti plastik, tetapi ternyata tidak! Terbuat dari Polylactic Acid (PLA) atau tepung jagung, kita bisa berubah menjadi kompos yang baik bagi lingkungan.'),
(28, 'PLA Saucer', 'PLA-Saucer-480x640.png', 9, 20, 5000, 'Produk ini terlihat, terasa seperti plastik, tetapi ternyata tidak! Terbuat dari Polylactic Acid (PLA) atau tepung jagung, kita bisa berubah menjadi kompos yang baik bagi lingkungan.'),
(29, 'Bowl Lid', 'Cornstarch-Lid-16-_-24-oz-1-480x640.png', 10, 20, 6000, 'Produk ini terlihat, terasa seperti plastik, tetapi ternyata tidak! Terbuat dari Polylactic Acid (PLA) atau tepung jagung, kita bisa berubah menjadi kompos yang baik bagi lingkungan.'),
(30, 'Brown Coffee Cup', 'Brown-Coffee-Cup-16-oz-1-480x640.png', 10, 20, 10000, 'Produk ini dibuat sepenuhnya dari bahan Organik dan dilapisi dengan lapisan tepung maizena untuk menghindari kebocoran, menjadikan bahan ini solusi yang sempurna untuk kopi Anda.'),
(31, 'Coffee Cup Lid', 'Cornstarch-Lid-12-_-16-oz-1-480x640.png', 10, 19, 3000, 'Produk ini terlihat, terasa seperti plastik, tetapi ternyata tidak! Terbuat dari Polylactic Acid (PLA) atau tepung jagung, kita bisa berubah menjadi kompos yang baik bagi lingkungan.'),
(32, 'Soup Gelato Bowl', 'Soup-or-Gelato-Bowl-16-oz-480x640.png', 10, 20, 15000, ' Produk ini dibuat sepenuhnya dari bahan Organik dan dilapisi dengan lapisan tepung maizena untuk menghindari kebocoran, menjadikan produk ini solusi yang sempurna untuk makanan Anda.'),
(33, 'White Coffee Cup', 'White-Coffee-Cup-16-oz-1-480x640.png', 10, 20, 15000, 'Produk ini dibuat sepenuhnya dari bahan Organik dan dilapisi dengan lapisan tepung maizena untuk menghindari kebocoran, menjadikan bahan ini solusi yang sempurna untuk kopi Anda.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `privilege` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `email`, `notelp`, `username`, `password`, `privilege`) VALUES
(23, 'user1', 'bumi', 'user1@gmail.com', '082333444555', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'User'),
(24, 'user2', 'bulan', 'user2@gmail.com', '082123123123', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'User'),
(25, 'admin', 'bintang', 'admin@gmail.com', '082111333555', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produk` (`fk_produk`),
  ADD KEY `fk_order` (`fk_order`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_kategori` (`kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`fk_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`fk_order`) REFERENCES `order` (`id`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`kategori`) REFERENCES `kategori_produk` (`id_kategori`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
