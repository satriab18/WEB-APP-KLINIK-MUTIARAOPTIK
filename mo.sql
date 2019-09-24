-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 04:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mo`
--

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_lensa` varchar(50) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `total_pembelian` decimal(13,0) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama_pasien`, `jenis_lensa`, `tgl_pembelian`, `total_pembelian`, `no_hp`, `keterangan`) VALUES
(1, 'demo pasien', '2', '2019-07-07', '150000', '08123456789', ''),
(2, 'Demo Pasien 2', 'Anti Glare', '2019-06-19', '240293', '087738348403', ''),
(3, 'Demo Pasien 3', 'Silindris', '2019-06-14', '11949198', '087738348403', ''),
(4, 'Demo Pasien 4', 'Minus', '2019-06-12', '240293', '087738348403', ''),
(5, 'Demo Pasien 5', 'Plus-Minus', '2019-06-21', '1194948', '087738348403', ''),
(6, 'Demo Pasien 6', 'Silindris', '2019-06-12', '240293', '087738348403', ''),
(7, 'Demo Pasien 7', 'Minus', '2019-06-14', '11949198', '087738348403', ''),
(8, 'Demo Pasien 8', 'Silindris', '2019-04-26', '15183156', '087738348403', ''),
(9, 'Demo Pasien 9', 'Silindris', '2019-05-23', '150000', '087738348403', ''),
(10, 'Demo Pasien 10', 'Minus', '2019-06-28', '1194948', '087738348403', ''),
(11, 'Demo Pasien 11', 'Silindris', '2019-06-14', '240293', '087738348403', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pin` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `pin`) VALUES
(1, 'admin', '$2y$10$q9nATSv9R/tdSHMxnL771OLHlgbArc1WYUeeH332bcsAO5Fr.LEtK', 111111),
(2, 'testuser', '$2y$10$AySCM0FYGhbtA.CRw84rlOOJDMorlyY6qmcmiLNQfvpLa5wNNfOl.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
