-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2019 at 08:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camera`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `bayar_id` int(100) NOT NULL,
  `bayar_sewa_id` int(100) NOT NULL,
  `bayar_jumlah_harga` int(100) NOT NULL,
  `bayar_tanggal` date NOT NULL,
  `bayar_keterangan` varchar(100) DEFAULT NULL,
  `bayar_status` int(100) NOT NULL COMMENT '0 : Belum bayar 1 : sudah bayar',
  `bayar_bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`bayar_id`, `bayar_sewa_id`, `bayar_jumlah_harga`, `bayar_tanggal`, `bayar_keterangan`, `bayar_status`, `bayar_bukti`) VALUES
(1, 1, 1250000, '2019-01-24', 'oke', 1, 'peta.png'),
(2, 2, 450000, '2019-01-24', 'd', 1, 'detail flowchart email.png'),
(3, 3, 750000, '2019-01-24', 'ok', 1, 'footer.jpg'),
(4, 4, 750000, '2019-01-24', 'w', 1, 'footer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `camera`
--

CREATE TABLE `camera` (
  `cm_id` int(100) NOT NULL,
  `cm_nama` varchar(100) NOT NULL,
  `cm_harga` int(100) NOT NULL,
  `cm_keterangan` text NOT NULL,
  `cm_status` int(10) NOT NULL,
  `cm_kategori_id` int(100) NOT NULL,
  `cm_foto` varchar(100) DEFAULT NULL,
  `cm_jumlah_ketersediaan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camera`
--

INSERT INTO `camera` (`cm_id`, `cm_nama`, `cm_harga`, `cm_keterangan`, `cm_status`, `cm_kategori_id`, `cm_foto`, `cm_jumlah_ketersediaan`) VALUES
(15, 'Canon EOS R System', 300000, 'The EOS R System takes its cue from existing EOS DSLR with similar handling and ergonomics, but is smaller and more lightweight.', 1, 3, '01-The-Front_EOS_R__219246469941226.jpeg', 5),
(16, 'CANON EOS M50', 350000, 'Small and amazingly light, this modern classic packs the latest photo and video technology into a stylish design that fits in your hand.', 1, 3, 'web_360_0032_set.jpeg', 6),
(17, 'EOS 80D', 150000, 'A versatile state of the art DSLR that excels at everything from sports to portraits and low light photography.', 1, 3, 'eos_dslr_for_enthusiasts_800x480.jpeg', 6),
(18, 'EOS 6D Mark II', 250000, 'Whether you want to shoot more ambitious projects, or youâ€™re turning professional with your photography.', 1, 3, 'canon-eos-6d-mark-ii-camera_1.jpeg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `detail_sewa`
--

CREATE TABLE `detail_sewa` (
  `id_sewa` int(100) NOT NULL,
  `id_ab` int(100) NOT NULL,
  `jumlah_jam` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `harga` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `status_peminjaman` int(100) NOT NULL COMMENT '0 : Dalam masa penyewaan 1 : dikembalikan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_sewa`
--

INSERT INTO `detail_sewa` (`id_sewa`, `id_ab`, `jumlah_jam`, `qty`, `tanggal_kirim`, `harga`, `total`, `status_peminjaman`) VALUES
(1, 15, 1, 1, '2019-01-24', 300000, 300000, 1),
(1, 16, 1, 1, '2019-01-24', 350000, 650000, 1),
(1, 16, 1, 1, '2019-01-24', 350000, 650000, 1),
(1, 18, 1, 1, '2019-01-24', 250000, 1250000, 1),
(2, 15, 1, 1, '2019-01-24', 300000, 300000, 1),
(2, 17, 1, 1, '2019-01-24', 150000, 450000, 1),
(3, 16, 1, 1, '2019-01-24', 350000, 350000, 1),
(3, 17, 1, 1, '2019-01-24', 150000, 500000, 1),
(3, 18, 1, 1, '2019-01-24', 250000, 750000, 1),
(4, 16, 1, 1, '2019-01-24', 350000, 350000, 1),
(4, 17, 1, 1, '2019-01-24', 150000, 500000, 1),
(4, 18, 1, 1, '2019-01-24', 250000, 750000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(100) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(3, 'Canon'),
(4, 'Nikon'),
(8, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `sewa_id` int(100) NOT NULL,
  `sewa_id_user` int(100) NOT NULL,
  `sewa_status` int(2) NOT NULL,
  `sewa_invoice` varchar(100) NOT NULL,
  `sewa_customer` varchar(100) NOT NULL,
  `sewa_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`sewa_id`, `sewa_id_user`, `sewa_status`, `sewa_invoice`, `sewa_customer`, `sewa_alamat`) VALUES
(1, 1, 1, '1/WM/invc/01/2019', 'lala', 'yeye'),
(2, 2, 1, '2/WM/invc/01/2019', 'user', 'user'),
(3, 2, 1, '3/WM/invc/01/2019', 'oke', 'oka'),
(4, 2, 1, '4/WM/invc/01/2019', 'friska', 'magelang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_level` int(10) NOT NULL,
  `user_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_level`, `user_info`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'halo nama'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 'oke'),
(3, 'andra', '14180f38f11db420937b98aa24fad581', 0, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`bayar_id`),
  ADD KEY `bayar_sewa_id` (`bayar_sewa_id`);

--
-- Indexes for table `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`cm_id`),
  ADD KEY `ab_kategori_id` (`cm_kategori_id`);

--
-- Indexes for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD KEY `id_sewa` (`id_sewa`),
  ADD KEY `id_ab` (`id_ab`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`sewa_id`),
  ADD KEY `sewa_id_user` (`sewa_id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `bayar_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `camera`
--
ALTER TABLE `camera`
  MODIFY `cm_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`bayar_sewa_id`) REFERENCES `sewa` (`sewa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `camera`
--
ALTER TABLE `camera`
  ADD CONSTRAINT `camera_ibfk_1` FOREIGN KEY (`cm_kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD CONSTRAINT `detail_sewa_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`sewa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_sewa_ibfk_2` FOREIGN KEY (`id_ab`) REFERENCES `camera` (`cm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`sewa_id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
