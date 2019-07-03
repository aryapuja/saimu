-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 05:53 AM
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
  `safety_stock_day_import` int(11) NOT NULL,
  `avg_usage_import` int(11) NOT NULL,
  `sto_daily_import` int(11) NOT NULL,
  `usage_daily_import` int(11) NOT NULL,
  `incoming_daily_import` int(11) NOT NULL,
  `bal_import` int(11) NOT NULL,
  `status_import` enum('LESS STOCK','OK','OVER STOCK','') NOT NULL,
  `date_inp_import` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `safety_stock_day_lokal` int(11) NOT NULL,
  `avg_usage_lokal` int(11) NOT NULL,
  `sto_daily_lokal` int(11) NOT NULL,
  `usage_daily_lokal` int(11) NOT NULL,
  `incoming_daily_lokal` int(11) NOT NULL,
  `bal_lokal` int(11) NOT NULL,
  `status_lokal` enum('LESS STOCK','OK','OVER STOCK','') NOT NULL,
  `date_inp_lokal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_import`
--

CREATE TABLE `master_import` (
  `id_brg_import` int(11) NOT NULL,
  `nama_brg_import` varchar(100) NOT NULL,
  `satuan_import` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_import`
--

INSERT INTO `master_import` (`id_brg_import`, `nama_brg_import`, `satuan_import`) VALUES
(1, 'Politener PT-56', ''),
(2, 'Politener PT-37', ''),
(3, 'Pallet PT-11', ''),
(4, 'Box CT01', ''),
(5, 'Tutup CT01', ''),
(6, 'Slipsheet', ''),
(7, 'Clip CT-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_lokal`
--

CREATE TABLE `master_lokal` (
  `id_brg_lokal` int(11) NOT NULL,
  `nama_brg_lokal` varchar(100) NOT NULL,
  `satuan_lokal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_lokal`
--

INSERT INTO `master_lokal` (`id_brg_lokal`, `nama_brg_lokal`, `satuan_lokal`) VALUES
(1, 'Tutup Luar', 'pcs'),
(2, 'TUTUP LUAR-12', 'pcs'),
(3, 'TUTUP LUAR-24', 'pcs'),
(4, 'Tutup Luar SF-UK', ''),
(5, 'Tutup Cover Polytener PT-37', 'pcs'),
(6, 'Tutup Cover Polytener 4 wing', 'pcs'),
(7, 'Tutup Cover Polytener PT-78', 'pcs'),
(8, 'Karton Box S/F NEW', 'pcs'),
(9, 'Karton Box', 'pcs'),
(10, 'BOX SF-12\r\n', 'pcs'),
(11, 'BOX SF-24', 'pcs');

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
(1, 'ppc1', 'ppc1', 'ppc'),
(2, 'ppc2', 'ppc2', 'ppc'),
(3, 'de', 'de', 'de'),
(4, 'pp', 'pp', 'pp'),
(5, 'qp', 'qp', 'qp'),
(6, 'qmp', 'qmp', 'qmp'),
(7, 'eng', 'eng', 'eng'),
(8, 'nys', 'nys', 'nys'),
(9, 'prod', 'prod', 'prod');

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
  MODIFY `id_import` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komponen_lokal`
--
ALTER TABLE `komponen_lokal`
  MODIFY `id_lokal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_import`
--
ALTER TABLE `master_import`
  MODIFY `id_brg_import` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_lokal`
--
ALTER TABLE `master_lokal`
  MODIFY `id_brg_lokal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
