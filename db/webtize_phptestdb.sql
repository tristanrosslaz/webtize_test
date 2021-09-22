-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 12:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtize_phptestdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_charges`
--

CREATE TABLE `tb_charges` (
  `id` int(11) NOT NULL,
  `from_weight` double(11,2) NOT NULL,
  `to_weight` double(11,2) NOT NULL,
  `charge` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_charges`
--

INSERT INTO `tb_charges` (`id`, `from_weight`, `to_weight`, `charge`) VALUES
(1, 0.00, 200.00, 5.00),
(2, 200.00, 500.00, 10.00),
(3, 500.00, 1000.00, 15.00),
(4, 1000.00, 5000.00, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` double(11,2) DEFAULT NULL,
  `weight` double(11,2) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`id`, `product_name`, `price`, `weight`, `status`) VALUES
(1, 'Item 1', 10.00, 200.00, 1),
(2, 'Item 2', 100.00, 20.00, 1),
(3, 'Item 3', 30.00, 300.00, 1),
(4, 'Item 4', 20.00, 500.00, 1),
(5, 'Item 5', 30.00, 250.00, 1),
(6, 'Item 6', 40.00, 10.00, 1),
(7, 'Item 7', 200.00, 10.00, 1),
(8, 'Item 8', 120.00, 500.00, 1),
(9, 'Item 9', 130.00, 790.00, 1),
(10, 'Item 10', 20.00, 100.00, 1),
(11, 'Item 11', 10.00, 340.00, 1),
(12, 'Item 12', 5.00, 200.00, 1),
(13, 'Item 14', 240.00, 20.00, 1),
(14, 'Item 15', 123.00, 700.00, 1),
(15, 'Item 16', 245.00, 10.00, 1),
(16, 'Item 17', 230.00, 20.00, 1),
(17, 'Item 18', 110.00, 200.00, 1),
(18, 'Item 19', 45.00, 200.00, 1),
(19, 'Item 20', 67.00, 20.00, 1),
(20, 'Item 21', 88.00, 300.00, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_charges`
--
ALTER TABLE `tb_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_charges`
--
ALTER TABLE `tb_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
