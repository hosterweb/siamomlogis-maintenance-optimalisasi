-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 04:24 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cn`
--

CREATE TABLE `cn` (
  `id` int(11) NOT NULL,
  `shipment` text DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `job_number` varchar(50) DEFAULT NULL,
  `marketing` text DEFAULT NULL,
  `customer` text DEFAULT NULL,
  `master_bl` varchar(50) DEFAULT NULL,
  `house_bl` varchar(50) DEFAULT NULL,
  `poi` varchar(50) DEFAULT NULL,
  `pod` varchar(50) DEFAULT NULL,
  `vessel_boy` varchar(50) DEFAULT NULL,
  `eta_etd` varchar(50) DEFAULT NULL,
  `agent` text DEFAULT NULL,
  `container` text DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `invoice_number` varchar(50) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `customer_code` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kondition` varchar(50) DEFAULT NULL,
  `credit_terms` varchar(50) DEFAULT NULL,
  `container_no` varchar(50) DEFAULT NULL,
  `description1` text DEFAULT NULL,
  `description2` text DEFAULT NULL,
  `description3` text DEFAULT NULL,
  `description4` text DEFAULT NULL,
  `description5` text DEFAULT NULL,
  `description6` text DEFAULT NULL,
  `description7` text DEFAULT NULL,
  `description8` text DEFAULT NULL,
  `description9` text DEFAULT NULL,
  `description10` text DEFAULT NULL,
  `amount1` varchar(50) DEFAULT NULL,
  `amount2` varchar(50) DEFAULT NULL,
  `amount3` varchar(50) DEFAULT NULL,
  `amount4` varchar(50) DEFAULT NULL,
  `amount5` varchar(50) DEFAULT NULL,
  `amount6` varchar(50) DEFAULT NULL,
  `amount7` varchar(50) DEFAULT NULL,
  `amount8` varchar(50) DEFAULT NULL,
  `amount9` varchar(50) DEFAULT NULL,
  `amount10` varchar(50) DEFAULT NULL,
  `loding` text DEFAULT NULL,
  `co_nu` varchar(50) DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `qty1` varchar(50) DEFAULT NULL,
  `qty2` varchar(50) DEFAULT NULL,
  `qty3` varchar(50) DEFAULT NULL,
  `qty4` varchar(50) DEFAULT NULL,
  `qty5` varchar(50) DEFAULT NULL,
  `qty6` varchar(50) DEFAULT NULL,
  `qty7` varchar(50) DEFAULT NULL,
  `qty8` varchar(50) DEFAULT NULL,
  `qty9` varchar(50) DEFAULT NULL,
  `qty10` varchar(50) DEFAULT NULL,
  `total_amount` varchar(50) DEFAULT NULL,
  `id_create_job` varchar(5) DEFAULT NULL,
  `cn_number` varchar(20) DEFAULT NULL,
  `unit_price1` varchar(20) DEFAULT NULL,
  `unit_price2` varchar(20) DEFAULT NULL,
  `unit_price3` varchar(20) DEFAULT NULL,
  `unit_price4` varchar(20) DEFAULT NULL,
  `unit_price5` varchar(20) DEFAULT NULL,
  `unit_price6` varchar(20) DEFAULT NULL,
  `unit_price7` varchar(20) DEFAULT NULL,
  `unit_price8` varchar(20) DEFAULT NULL,
  `unit_price9` varchar(20) DEFAULT NULL,
  `unit_price10` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cn`
--
ALTER TABLE `cn`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cn`
--
ALTER TABLE `cn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
