-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2019 at 03:38 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saimu`
--

-- --------------------------------------------------------

--
-- Table structure for table `komponen_import`
--

CREATE TABLE `komponen_import` (
  `id_import` int(11) NOT NULL,
  `nama_brg_import` varchar(100) NOT NULL,
  `satuan_import` varchar(10) NOT NULL,
  `supplier_import` varchar(100) NOT NULL,
  `min_pack_import` int(11) NOT NULL,
  `safety_stock_pcs_import` int(11) NOT NULL,
  `safety_stock_day_import` float NOT NULL,
  `avg_usage_import` int(11) NOT NULL,
  `sto_daily_import` int(11) NOT NULL,
  `usage_daily_import` int(11) NOT NULL,
  `incoming_daily_import` int(11) NOT NULL,
  `bal_import` int(11) NOT NULL,
  `status_import` enum('LESS STOCK','OK','OVER STOCK','') NOT NULL,
  `date_inp_import` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen_import`
--

INSERT INTO `komponen_import` (`id_import`, `nama_brg_import`, `satuan_import`, `supplier_import`, `min_pack_import`, `safety_stock_pcs_import`, `safety_stock_day_import`, `avg_usage_import`, `sto_daily_import`, `usage_daily_import`, `incoming_daily_import`, `bal_import`, `status_import`, `date_inp_import`) VALUES
(2, 'Politener PT-56', '', 'IMPORT', 1920, 12000, 4, 3000, 17500, 3100, 0, 14400, '', '2019-07-07 11:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_lokal`
--

CREATE TABLE `komponen_lokal` (
  `id_lokal` int(11) NOT NULL,
  `nama_brg_lokal` varchar(100) NOT NULL,
  `satuan_lokal` varchar(10) NOT NULL,
  `supplier_lokal` varchar(100) NOT NULL,
  `min_pack_lokal` int(11) NOT NULL,
  `safety_stock_pcs_lokal` int(11) NOT NULL,
  `safety_stock_day_lokal` float NOT NULL,
  `avg_usage_lokal` int(11) NOT NULL,
  `sto_daily_lokal` int(11) NOT NULL,
  `usage_daily_lokal` int(11) NOT NULL,
  `incoming_daily_lokal` int(11) NOT NULL,
  `bal_lokal` int(11) NOT NULL,
  `status_lokal` enum('LESS STOCK','OK','OVER STOCK','') NOT NULL,
  `date_inp_lokal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen_lokal`
--

INSERT INTO `komponen_lokal` (`id_lokal`, `nama_brg_lokal`, `satuan_lokal`, `supplier_lokal`, `min_pack_lokal`, `safety_stock_pcs_lokal`, `safety_stock_day_lokal`, `avg_usage_lokal`, `sto_daily_lokal`, `usage_daily_lokal`, `incoming_daily_lokal`, `bal_lokal`, `status_lokal`, `date_inp_lokal`) VALUES
(1, 'BOX SF-12\r\n', 'pcs', 'tes', 10, 70, 1, 70, 80, 94, 80, 66, '', '2019-07-05 09:57:11'),
(2, 'BOX SF-12\r\n', 'pcs', 'tes', 10, 56, 1, 70, 80, 94, 80, 66, '', '2019-07-05 10:00:50'),
(3, 'BOX SF-12\r\n', 'pcs', 'tes', -210, 0, 1, 70, 80, 94, 80, 66, 'OK', '2019-07-07 06:00:24'),
(4, 'BOX SF-12\r\n', 'pcs', 'tes', 10, 60, 1, 70, 80, 94, 80, 66, 'OK', '2019-07-07 06:01:18'),
(5, 'BOX SF-12\r\n', 'pcs', 'tes', 10, 70, 1, 80, 80, 94, 80, 66, 'OK', '2019-07-07 06:25:06'),
(6, 'BOX SF-12\r\n', 'pcs', 'tes', 10, 70, 0.88, 80, 80, 94, 80, 66, 'OK', '2019-07-07 06:29:44'),
(7, 'BOX SF-12\r\n', 'pcs', 'tes1', 1, 1, 1, 1, 1, 1, 1, 1, 'OK', '2019-07-07 09:41:57'),
(8, 'BOX SF-24', 'roll', 'tes2', 2, 2, 1, 2, 2, 2, 2, 2, 'OK', '2019-07-07 09:41:57'),
(9, 'BOX SF-12\r\n', 'pcs', 'tes1', 10, 70, 0.88, 80, 50, 94, 50, 6, 'OK', '2019-07-07 09:45:30'),
(10, 'BOX SF-24', 'roll', 'tes2', 10, 70, 0.88, 80, 50, 20, 50, 80, 'OK', '2019-07-07 09:45:30'),
(11, 'BOX SF-12\r\n', 'pcs', 'tes1', 10, 60, 0.86, 70, 50, 90, 50, 10, 'OK', '2019-07-07 09:54:29'),
(12, 'BOX SF-24', 'pcs', 'tes2', 10, 60, 0.86, 70, 50, 50, 50, 50, 'OK', '2019-07-07 09:54:29'),
(13, 'BUBBLE PLASTICS 300x360M', 'roll', 'tes', 10, 60, 0.86, 70, 50, 20, 50, 80, 'OK', '2019-07-07 09:54:29'),
(14, 'BOX SF-12\r\n', 'pcs', 'tes', 10, 70, 0.88, 80, 50, 20, 50, 80, 'OK', '2019-07-07 09:56:50'),
(15, 'BOX SF-24', 'roll', 'tes1', 10, 70, 0.88, 80, 50, 50, 50, 50, 'LESS STOCK', '2019-07-07 09:56:50'),
(16, 'BOX SF-12\r\n', 'roll', 'tes2', 10, 60, 0.86, 70, 50, 90, 50, 10, 'LESS STOCK', '2019-07-07 09:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `master_import`
--

CREATE TABLE `master_import` (
  `id_brg_import` int(11) NOT NULL,
  `nama_brg_import` varchar(100) NOT NULL,
  `satuan_import` varchar(10) NOT NULL,
  `min_pack_import` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_import`
--

INSERT INTO `master_import` (`id_brg_import`, `nama_brg_import`, `satuan_import`, `min_pack_import`) VALUES
(1, 'Politener PT-56', '', 1920),
(2, 'Politener PT-37', '', 2592),
(3, 'Pallet PT-11', '', 300),
(4, 'Box CT01', '', 1400),
(5, 'Tutup CT01', '', 400),
(6, 'Slipsheet', '', 250),
(7, 'Clip CT-01', '', 5600);

-- --------------------------------------------------------

--
-- Table structure for table `master_lokal`
--

CREATE TABLE `master_lokal` (
  `id_brg_lokal` int(11) NOT NULL,
  `nama_brg_lokal` varchar(100) NOT NULL,
  `satuan_lokal` varchar(10) NOT NULL,
  `min_pack_lokal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_lokal`
--

INSERT INTO `master_lokal` (`id_brg_lokal`, `nama_brg_lokal`, `satuan_lokal`, `min_pack_lokal`) VALUES
(1, 'Tutup Luar', 'pcs', 10),
(2, 'TUTUP LUAR-12', 'pcs', 20),
(3, 'TUTUP LUAR-24', 'pcs', 20),
(4, 'Tutup Luar SF-UK', 'pcs', 20),
(5, 'Tutup Cover Polytener PT-37', 'pcs', 10),
(6, 'Tutup Cover Polytener 4 wing', 'pcs', 10),
(7, 'Tutup Cover Polytener PT-78', 'pcs', 10),
(8, 'Karton Box S/F NEW', 'pcs', 5),
(9, 'Karton Box', 'pcs', 5),
(10, 'BOX SF-12\r\n', 'pcs', 10),
(11, 'BOX SF-24', 'pcs', 10),
(12, 'Karton Box AF PT-78', 'pcs', 10),
(13, 'Karton Box AF PT-56', 'pcs', 10),
(14, 'Karton Box AF PT-37', 'pcs', 10),
(15, 'Karton PT-270', 'pcs', 5),
(16, 'Karton Box AF-340', 'pcs', 5),
(17, 'Karton Box SF-UK', 'pcs', 5),
(18, 'Linning Besar', 'pcs', 10),
(19, 'Linning Besar 580 A', 'pcs', 10),
(20, 'Linning Kecil (Porte)', 'pcs', 10),
(21, 'Layer Segiempat', 'pcs', 20),
(22, 'LAYER SEGIEMPAT-12', 'pcs', 20),
(23, 'LAYER SEGIEMPAT-24', 'pcs', 20),
(24, 'Layer Segiempat PT-78', 'pcs', 20),
(25, 'Layer Segiempat PT-56', 'pcs', 20),
(26, 'Layer Segiempat PT-37', 'pcs', 20),
(27, 'Layer Pembatas Porte', 'pcs', 20),
(28, 'Layer Segiempat A/F 270', 'pcs', 20),
(29, 'Layer Ct 01 520x1050', 'pcs', 20),
(30, 'BUBBLE PLASTICS 800x1250M', 'pcs', 50),
(31, 'BUBBLE PLASTICS 300x360M', 'pcs', 100),
(32, 'Segitiga T160', 'pcs', 48),
(33, 'Segitiga T320', 'pcs', 24),
(34, 'Segitiga T160 Khusus ', 'pcs', 48),
(35, 'Segitiga T320 Khusus', 'pcs', 24),
(36, 'Segitiga T250', 'pcs', 48),
(37, 'Segitiga T250 Khusus', 'pcs', 48),
(38, 'Segitiga T95-PT56', 'pcs', 48),
(39, 'Segitiga T110', 'pcs', 72),
(40, 'Segitiga T120', 'pcs', 48),
(41, 'Segitiga T200-PT56', 'pcs', 48),
(42, 'Segitiga T170-PT78', 'pcs', 72),
(43, 'Segitiga T185', 'pcs', 48),
(44, 'Segiempat 540x200', 'pcs', 28),
(45, 'Segiempat 440x200', 'pcs', 40),
(46, 'Segiempat 440x100', 'pcs', 60),
(47, 'Segiempat 440x230', 'pcs', 30),
(48, 'Segiempat 420x160', 'pcs', 42),
(49, 'Segiempat 560x230', 'pcs', 28),
(50, 'Segiempat T55', 'pcs', 72),
(51, 'PIPE BOARD', 'pcs', 24),
(52, 'PAPER PALLET', 'pcs', 1),
(53, 'Pallet Kayu', 'pcs', 1),
(54, 'Slipsheet Local', 'pcs', 500),
(55, 'Plastik Wrapping', 'roll', 6),
(56, 'Plastik Wrapping CT-01', 'roll', 1),
(57, 'Stripping Band (m)', 'roll', 1),
(58, 'Gysper', 'karung', 1),
(59, 'Lakband Coklat (besar)', 'roll', 576),
(60, 'Lakband Coklat (kecil)', 'roll', 320),
(61, 'Isi Staples', 'box', 1),
(62, 'Karton label', 'roll', 0),
(63, 'Karton label orange', 'roll', 0),
(64, 'Karton label Empty', 'roll', 0),
(65, 'Sticker Adhesive 10x15', 'roll', 0),
(66, 'Sticker Adhesive 9x4.5', 'roll', 0),
(67, 'Sticker Adhesive 10x15(blue)', 'roll', 0),
(68, 'Sticker Adhesive 10x15(orange)', 'roll', 0),
(69, 'Sticker Mix Pallet', 'roll', 0),
(70, 'Ribbon Waxresin 11cmx300m', 'roll', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(199) NOT NULL,
  `section` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `section`) VALUES
(1, 'ksokp_ppc', 'ppc210398', 'ppc'),
(2, 'ppc_ksokp', 'ppc180698', 'ppc'),
(10, 'admin', 'admin', 'ppc'),
(11, ' ', ' ', 'ppc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komponen_import`
--
ALTER TABLE `komponen_import`
  ADD PRIMARY KEY (`id_import`),
  ADD KEY `fk_nama_brg_import` (`nama_brg_import`),
  ADD KEY `fk_satuan_import` (`satuan_import`);

--
-- Indexes for table `komponen_lokal`
--
ALTER TABLE `komponen_lokal`
  ADD PRIMARY KEY (`id_lokal`),
  ADD KEY `fk_nama_brg_lokal` (`nama_brg_lokal`),
  ADD KEY `fk_satuan_lokal` (`satuan_lokal`);

--
-- Indexes for table `master_import`
--
ALTER TABLE `master_import`
  ADD PRIMARY KEY (`id_brg_import`),
  ADD KEY `nama_brg_import` (`nama_brg_import`),
  ADD KEY `satuan_import` (`satuan_import`);

--
-- Indexes for table `master_lokal`
--
ALTER TABLE `master_lokal`
  ADD PRIMARY KEY (`id_brg_lokal`),
  ADD KEY `nama_brg_lokal` (`nama_brg_lokal`),
  ADD KEY `satuan_lokal` (`satuan_lokal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_section` (`section`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komponen_import`
--
ALTER TABLE `komponen_import`
  MODIFY `id_import` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komponen_lokal`
--
ALTER TABLE `komponen_lokal`
  MODIFY `id_lokal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `master_import`
--
ALTER TABLE `master_import`
  MODIFY `id_brg_import` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_lokal`
--
ALTER TABLE `master_lokal`
  MODIFY `id_brg_lokal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komponen_import`
--
ALTER TABLE `komponen_import`
  ADD CONSTRAINT `fk_nama_brg_import` FOREIGN KEY (`nama_brg_import`) REFERENCES `master_import` (`nama_brg_import`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_satuan_import` FOREIGN KEY (`satuan_import`) REFERENCES `master_import` (`satuan_import`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komponen_lokal`
--
ALTER TABLE `komponen_lokal`
  ADD CONSTRAINT `fk_nama_brg_lokal` FOREIGN KEY (`nama_brg_lokal`) REFERENCES `master_lokal` (`nama_brg_lokal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_satuan_lokal` FOREIGN KEY (`satuan_lokal`) REFERENCES `master_lokal` (`satuan_lokal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
