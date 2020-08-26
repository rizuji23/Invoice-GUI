-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2020 at 06:44 PM
-- Server version: 8.0.21-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice_lesmana`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `kode_invoice` varchar(50) NOT NULL,
  `invoice_to` varchar(100) NOT NULL,
  `code_client` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `kode_invoice`, `invoice_to`, `code_client`, `tanggal`) VALUES
(21, '#0001', 'Aye Shabira', '5f45fb759a348', '26 August 2020'),
(22, '#0002', 'COZY HOME', '5f45fcbc63095', '26 August 2020'),
(23, '#0003', 'dawdaw', '5f45fcf2a19ec', '26 August 2020'),
(24, '#0004', 'COZY HOME', '5f45fe4d13e03', '26 August 2020'),
(25, '#0005', 'HAHAH', '5f45ff0c809b7', '26 August 2020'),
(26, '#0006', 'COZY HOME', '5f460372dd5dd', '26 August 2020'),
(27, '#0007', 'haha', '5f463bba0e762', '26 August 2020'),
(28, '#0008', 'HAI', '5f46411381ddb', '26 August 2020'),
(29, '#0009', 'dawdaw', '5f46418de9acb', '26 August 2020'),
(30, '#0010', 'dawdawd', '5f4642e5493b9', '26 August 2020'),
(31, '#0011', 'dawdawda', '5f4644403246d', '26 August 2020');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `item_desk` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `rev` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `code_client` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_desk`, `price`, `rev`, `total`, `code_client`) VALUES
(144, 'Kamar Ruang Tidur', '9000000', '2', '9300000', '5f45fb759a348'),
(145, 'Kmaar Sare', '2000000', '0', '2000000', '5f45fb759a348'),
(146, 'Rumah1', '200000', '2', '500000', '5f45fcbc63095'),
(147, 'Kamar WC', '500000', '1', '650000', '5f45fcbc63095'),
(148, 'dawdaw', '20000', '2', '320000', '5f45fcf2a19ec'),
(149, 'item1', '200000', '2', '500000', '5f45fe4d13e03'),
(150, 'item2', '400000', '2', '700000', '5f45fe4d13e03'),
(151, 'dawdawd', '200000', '2', '500000', '5f45ff0c809b7'),
(152, 'item2', '60000', '3', '510000', '5f45ff0c809b7'),
(153, 'KTC ', '600000', '0', '600000', '5f460372dd5dd'),
(154, 'SRWTS', '600000', '2', '900000', '5f460372dd5dd'),
(155, 'dawdawd', '200.000', '2', '500000', '5f463bba0e762'),
(156, 'adwdawdaw', '200.000', '2', '500000', '5f46411381ddb'),
(157, 'adwdawd', '200.000', '2', '500000', '5f46418de9acb'),
(158, 'dawdawdaw', '200.000', '2', '500000', '5f4642e5493b9'),
(159, 'dawdawdaw', '100.000', '2', '400000', '5f4642e5493b9'),
(160, 'dawdawda', '200.000', '2', '500000', '5f4644403246d');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `id` int NOT NULL,
  `code_client` varchar(50) NOT NULL,
  `discount` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_discount` varchar(50) NOT NULL,
  `total_all` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`id`, `code_client`, `discount`, `total_discount`, `total_all`) VALUES
(21, '5f45fb759a348', '100000', '', '11200000'),
(22, '5f45fcbc63095', '', '', '1150000'),
(23, '5f45fcf2a19ec', '100000', '220000', '320000'),
(24, '5f45fe4d13e03', '100000', '1100000', '1200000'),
(25, '5f45ff0c809b7', '', '', '1010000'),
(26, '5f460372dd5dd', '', '', '1500000'),
(27, '5f463bba0e762', '', '', '500000'),
(28, '5f46411381ddb', '100000', '400000', '500000'),
(29, '5f46418de9acb', '200000', '300000', '500000'),
(30, '5f4642e5493b9', '200000', '700000', '900000'),
(31, '5f4644403246d', '100000', '400000', '500000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `total`
--
ALTER TABLE `total`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
