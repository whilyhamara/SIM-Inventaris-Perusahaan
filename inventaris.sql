-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2018 at 04:23 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `kd_barang` varchar(50) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kontrak` varchar(50) NOT NULL,
  `id_kategori` int(25) NOT NULL,
  `id_ruangan` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `pengguna` varchar(100) NOT NULL,
  `spesifikasi` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `kondisi` int(1) NOT NULL,
  `qrcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`kd_barang`, `no_urut`, `id_kontrak`, `id_kategori`, `id_ruangan`, `id_user`, `pengguna`, `spesifikasi`, `tanggal`, `waktu`, `kondisi`, `qrcode`) VALUES
('Harddisk-1', 1, 'MU17', 2, 7, 1, 'Tidak ada', '1TERA', '2018-08-24', '08:49:02', 1, 'Harddisk-1.png'),
('Harddisk-2', 2, 'MU17', 2, 7, 1, 'Belum diinput', '1TERA', '2018-08-24', '08:49:02', 1, 'Harddisk-2.png'),
('Monitor-1', 1, 'MSDR45', 22, 7, 1, 'johan', '17in', '2018-08-27', '08:52:02', 0, 'Monitor-1.png'),
('Monitor-2', 2, 'MSDR45', 22, 7, 1, 'Belum diinput', '17in', '2018-08-27', '08:52:02', 1, 'Monitor-2.png'),
('Mouse-1', 1, 'MU17', 6, 8, 1, 'Belum diinput', 'Merk Toshiba', '2018-08-24', '08:49:02', 1, 'Mouse-1.png'),
('PC-1', 1, 'BUD1992', 1, 8, 1, 'Aing Mah', 'Procie: CoreI7, RAM 8', '2018-08-23', '10:42:17', 0, 'PC-1.png'),
('PC-2', 2, 'BUD1992', 1, 8, 1, '-', 'Procie: CoreI7, RAM 8', '2018-08-23', '10:42:17', 2, 'PC-2.png'),
('PC-3', 3, 'MU17', 1, 1, 1, 'kevin', 'RAM 8GB', '2018-08-24', '08:49:02', 0, 'PC-3.png'),
('PC-4', 4, 'MU17', 1, 1, 1, '-', 'RAM 8GB', '2018-08-24', '08:49:02', 2, 'PC-4.png'),
('PC-5', 5, 'MU17', 1, 1, 1, 'Belum diinput', 'RAM 8GB', '2018-08-24', '08:49:02', 1, 'PC-5.png'),
('PC-6', 6, 'MSDR45', 1, 9, 1, 'Belum diinput', 'RAM 8GB', '2018-08-27', '08:52:02', 1, 'PC-6.png'),
('PC-7', 7, 'MSDR45', 1, 9, 1, 'Belum diinput', 'RAM 8GB', '2018-08-27', '08:52:02', 1, 'PC-7.png'),
('PC-8', 8, 'MSDR45', 1, 9, 1, 'Belum diinput', 'RAM 8GB', '2018-08-27', '08:52:02', 1, 'PC-8.png'),
('Printer-1', 1, 'MSDR45', 15, 9, 1, 'Belum diinput', 'Plus Scan FotoCopy', '2018-08-27', '08:52:02', 1, 'Printer-1.png'),
('Printer-2', 2, 'MSDR45', 15, 9, 1, 'Belum diinput', 'Plus Scan FotoCopy', '2018-08-27', '08:52:02', 1, 'Printer-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(25) NOT NULL,
  `nama_kategori` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'PC'),
(2, 'Harddisk'),
(3, 'RAM'),
(4, 'Laptop'),
(6, 'Mouse'),
(15, 'Printer'),
(21, 'Router'),
(22, 'Monitor'),
(24, 'Keyboard'),
(25, 'RJ45'),
(26, 'Proyektor'),
(27, 'DVD');

-- --------------------------------------------------------

--
-- Table structure for table `kontark`
--

CREATE TABLE `kontark` (
  `kd_kontrak` varchar(50) NOT NULL,
  `nama_kontrak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontark`
--

INSERT INTO `kontark` (`kd_kontrak`, `nama_kontrak`) VALUES
('BUD1992', 'Pelindo'),
('MSDR45', 'Pelindo 3'),
('MU17', 'Pelindo III');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(25) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `id_ruangan` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `nip` int(25) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kd_barang`, `id_ruangan`, `id_user`, `nip`, `nama_peminjam`, `tanggal`, `waktu`) VALUES
(26, 'PC-1', 7, 1, 19980112, 'Aing Mah', '2018-08-23', '11:06:09'),
(28, 'PC-3', 7, 1, 1541180555, 'kevin', '2018-08-27', '08:54:38'),
(29, 'Monitor-1', 9, 1, 1541180123, 'johan', '2018-08-27', '08:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(25) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `id_user` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `rekanan` varchar(50) NOT NULL,
  `biaya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `kd_barang`, `id_user`, `tanggal`, `waktu`, `tipe`, `keterangan`, `rekanan`, `biaya`) VALUES
(13, 'PC-2', 1, '2018-08-23', '11:06:31', 'Perangkat Lunak', 'Rusak Semua Hmmm', 'PT. Coba Coba', '2000000'),
(14, 'PC-4', 1, '2018-08-27', '08:56:03', 'Perangkat Lunak', 'Instal Ulang', 'MasBroo', '75000');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `id_user` int(25) NOT NULL,
  `id_ruangan` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `pengguna` varchar(50) NOT NULL,
  `status_riwayat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `kd_barang`, `id_user`, `id_ruangan`, `tanggal`, `waktu`, `pengguna`, `status_riwayat`) VALUES
(182, 'PC-1', 1, 8, '2018-08-23', '10:42:17', 'Belum diinput', 1),
(183, 'PC-2', 1, 8, '2018-08-23', '10:42:17', 'Belum diinput', 1),
(184, 'PC-1', 1, 7, '2018-08-23', '11:06:09', 'Aing Mah', 0),
(185, 'PC-2', 1, 8, '2018-08-23', '11:06:31', '-', 2),
(190, 'PC-3', 1, 1, '2018-08-24', '08:49:02', 'Belum diinput', 1),
(191, 'PC-4', 1, 1, '2018-08-24', '08:49:02', 'Belum diinput', 1),
(192, 'PC-5', 1, 1, '2018-08-24', '08:49:02', 'Belum diinput', 1),
(193, 'Harddisk-1', 1, 7, '2018-08-24', '08:49:02', 'Belum diinput', 1),
(194, 'Harddisk-2', 1, 7, '2018-08-24', '08:49:02', 'Belum diinput', 1),
(195, 'Mouse-1', 1, 8, '2018-08-24', '08:49:02', 'Belum diinput', 1),
(196, 'Harddisk-1', 1, 7, '2018-08-26', '12:17:04', 'Bud1', 0),
(197, 'PC-6', 1, 9, '2018-08-27', '08:52:02', 'Belum diinput', 1),
(198, 'PC-7', 1, 9, '2018-08-27', '08:52:02', 'Belum diinput', 1),
(199, 'PC-8', 1, 9, '2018-08-27', '08:52:02', 'Belum diinput', 1),
(200, 'Printer-1', 1, 9, '2018-08-27', '08:52:02', 'Belum diinput', 1),
(201, 'Printer-2', 1, 9, '2018-08-27', '08:52:02', 'Belum diinput', 1),
(202, 'Monitor-1', 1, 7, '2018-08-27', '08:52:02', 'Belum diinput', 1),
(203, 'Monitor-2', 1, 7, '2018-08-27', '08:52:02', 'Belum diinput', 1),
(204, 'PC-3', 1, 7, '2018-08-27', '08:54:38', 'kevin', 0),
(205, 'Monitor-1', 1, 9, '2018-08-27', '08:54:38', 'johan', 0),
(206, 'PC-4', 1, 1, '2018-08-27', '08:56:03', '-', 2),
(207, 'Harddisk-1', 1, 7, '2018-08-27', '08:56:48', 'Tidak ada', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(25) NOT NULL,
  `kd_ruangan` varchar(100) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `nama_gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `kd_ruangan`, `nama_ruangan`, `nama_gedung`) VALUES
(1, 'DIVIT', 'Divisi Informasi', 'Cabang Apiton'),
(7, 'PST17', 'Kantor Pusat', 'Pusat'),
(8, 'DIVIKEUHUMAS', 'Divisi Humas', 'Kantor Cabang'),
(9, 'HMS45', 'Keuangan', 'Kantor Cabang');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id_token` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id_token`, `token`, `id_user`, `created`, `waktu`) VALUES
(119, 'aaad1a843a8b0408ebad336045ca56', 1, '2018-08-18', '19:02:17'),
(120, '9f0b4553510d7e51f90752ee670e55', 4, '2018-08-23', '11:24:54'),
(121, '3946ad5205c4b77c2c1879da24cb80', 4, '2018-08-23', '11:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `email`, `hp`, `foto`, `status`) VALUES
(1, 'Budi Purwanto', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'budi.purwanto15@gmail.com', '085330170945', '', 'admin'),
(3, 'Willi', 'wili', '81dc9bdb52d04dc20036dbd8313ed055', 'whilyhamanjasmara@gmail.com', '0823323222', '', 'admin'),
(4, 'Musdari', 'musdari', 'a16f44a48ff0543c5ea7844d536c8a39', 'musdari844@gmail.com', '0823232', 'AN1.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kontrak` (`id_kontrak`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontark`
--
ALTER TABLE `kontark`
  ADD PRIMARY KEY (`kd_kontrak`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_inventaris` (`kd_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `inventaris_ibfk_3` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `inventaris_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `inventaris_ibfk_5` FOREIGN KEY (`id_kontrak`) REFERENCES `kontark` (`kd_kontrak`);

--
-- Constraints for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD CONSTRAINT `perawatan_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `inventaris` (`kd_barang`),
  ADD CONSTRAINT `perawatan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `riwayat_ibfk_3` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `riwayat_ibfk_4` FOREIGN KEY (`kd_barang`) REFERENCES `inventaris` (`kd_barang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
