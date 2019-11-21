-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 07:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin`, `password`) VALUES
('vagrawal', '123');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `status`, `cat_id`, `id`) VALUES
(1, 'DELL', 1, 1, 1),
(2, 'HP', 1, 1, 2),
(3, 'NOKIA', 1, 2, 3),
(4, 'LENOVO', 1, 1, 4),
(5, 'ASUS', 1, 1, 5),
(7, 'OPPO', 1, 2, 6),
(8, 'VIVO', 1, 2, 7),
(9, 'BOAT', 1, 3, 8),
(10, 'SONY', 1, 3, 9),
(11, 'XIOMI', 1, 4, 10),
(12, 'GENERIC', 1, 4, 11),
(2, 'HP', 1, 5, 12),
(14, 'COMPAQ', 1, 5, 13),
(15, 'BOAT', 1, 6, 14),
(16, 'JBL', 1, 6, 15),
(10, 'SONY', 1, 7, 16),
(18, 'NIKON', 1, 7, 17);

-- --------------------------------------------------------

--
-- Table structure for table `cartoon`
--

CREATE TABLE `cartoon` (
  `cart_id` int(11) NOT NULL,
  `cash_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quaS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cash_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cash_id`, `name`, `email`, `password`) VALUES
(1, 'Aman', 'aman@gmail.com', 'aman'),
(2, 'piyush', 'piyush@gmail.com', 'piyush'),
(3, 'vaibhav', 'vagrawal@gmail.com', 'vaibhav');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `status`) VALUES
(1, 'LAPTOP', 1),
(2, 'MOBILE', 1),
(3, 'EAR PHONE', 1),
(4, 'SMARTWATCH', 1),
(5, 'PRINTER', 1),
(6, 'AUDIO DEVICE', 1),
(7, 'CAMERA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `mrp` double NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cat_id`, `brand_id`, `prod_name`, `mrp`, `discount`, `quantity`) VALUES
(2, 1, 1, 'DELL INSPIRON i3', 42000, 15, 6),
(3, 1, 2, 'HP i5', 48000, 30, 1),
(4, 2, 3, 'NOKIA 5.1+', 11000, 50, 0),
(5, 2, 3, 'NOKIA 6.1+', 16000, 80, 0),
(6, 1, 4, 'IDEAPAD 330', 40000, 10, 8),
(7, 1, 5, 'ASUS VIVOBOOK RYZEN 5', 39990, 16, 20),
(8, 1, 5, 'ASUS VIVOBOOK COREI3', 62990, 12, 20),
(9, 1, 4, 'LENOVO IDEAPAD  320', 36000, 5, 19),
(11, 2, 7, 'OPPO F9', 25990, 12, 10),
(12, 2, 8, 'VIVO V15 PRO', 32990, 12, 25),
(13, 2, 7, 'OPPO K1', 18990, 10, 10),
(14, 2, 8, 'VIVO Y81I', 10990, 27, 21),
(15, 3, 9, 'BOAT BASSHEADS 220', 999, 40, 32),
(16, 3, 9, 'BOAT BASSHEADS 220 SUPER EXTRA BASS', 1299, 38, 21),
(17, 3, 10, 'SONY ZX110A', 1390, 53, 20),
(18, 3, 10, 'SONY 310AP', 2190, 54, 12),
(19, 4, 11, 'MI BAND 3', 2199, 9, 36),
(20, 4, 11, 'MI BAND SPECIAL HRX', 1799, 27, 12),
(21, 4, 12, 'MERAKI WONDER', 2499, 68, 19),
(22, 4, 12, 'GENERIC AUX R7', 4500, 44, 12),
(23, 5, 2, 'HP DESKJET INK ADV.', 8825, 26, 12),
(24, 5, 2, 'HP INK TANK', 11718, 17, 12),
(25, 5, 14, 'COMPAQ E410', 4605, 24, 12),
(27, 6, 15, 'BOAT 200', 2499, 25, 25),
(28, 6, 15, 'BOAT STONE 1200', 6990, 58, 23),
(29, 6, 15, 'BOAT RUGBY 10W', 3990, 57, 12),
(30, 6, 16, 'JBL GO+ PORTABLE', 2799, 39, 12),
(31, 6, 16, 'JBL CLIP 2 PORTABLE', 4990, 39, 25),
(32, 7, 18, 'NIKON COOLPIX B500', 15035, 1, 10),
(33, 7, 18, 'NIKON COOLPIX P1000 POINT', 69950, 11, 8),
(34, 7, 17, 'SONY DSC HX 400V', 24999, 0, 25),
(35, 7, 19, 'CANON EOS 800D', 65995, 25, 23),
(36, 7, 19, 'CANON EOS 200D DSLR CAMERA', 55695, 12, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartoon`
--
ALTER TABLE `cartoon`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cash_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartoon`
--
ALTER TABLE `cartoon`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
