-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 07:10 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koiblends`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `level` varchar(250) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `level`, `contact_no`, `username`, `password`) VALUES
(1, 'Klien Garrote', 'super', '09453523293', 'ikKlien', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Milk Tea Series'),
(7, 'Coffee Series'),
(8, 'Snack & Delicacies');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `notice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `image_name`, `notice`) VALUES
(1, 'Logo_364.svg', ''),
(2, '', '<h1>Taste the greatness of<br>happiness with us</h1>'),
(8, '', '<p>We are passionate about<br>bringing you the greatness of happiness.</p>'),
(10, '', '<h1>A better life than yesterday</h1>'),
(11, '', '<p>Koi Blends mission is to provide refreshing drinks and flavorful snacks while inspiring individuals <br>to unite as one and create a change by promoting a sustainable lifestyle.</p>'),
(12, '', '<p>To be the leading brand in a united community while supporting sustainably and locally owned businesses.</p>'),
(13, '', '<p><span style=\"font-size: 14pt;\"><strong>Do you accept orders outside of Malasiqui Pangasinan, Philippines?</strong></span></p>'),
(14, '', '<p>No. We currently dont accept orders outside of Malasiqui, Pangasinan.</p>'),
(15, '', '<p><strong><span style=\"font-size: 14pt;\">What are your payment options?</span></strong></p>'),
(16, '', '<p>Our current payment options are Gcash receipt &amp; Cash-On-Delivery only.</p>'),
(17, '', '<p><span style=\"font-size: 14pt;\"><strong>Do you accept rush &amp; bulk orders?</strong></span></p>'),
(18, '', '<p>We dont accept rush orders and available from 9 AM to 5PM. Also, unfortunately we dont accept bulk orders.</p>'),
(19, '', '<p><span style=\"font-size: 14pt;\"><strong>What courier do you use?</strong></span></p>'),
(20, '', '<p>We are currently using NitanLa Malasiqui Delivery Services but we are also available for Pick Up orders.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `emailsubs`
--

CREATE TABLE `emailsubs` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emailsubs`
--

INSERT INTO `emailsubs` (`id`, `email`) VALUES
(1, 'chicowhoneyworks@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `m_order`
--

CREATE TABLE `m_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(255) NOT NULL,
  `product` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `method` varchar(255) NOT NULL,
  `gcash` varchar(250) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `adminmsg` varchar(250) NOT NULL,
  `notif` int(11) NOT NULL,
  `notif2` int(11) NOT NULL,
  `user_fname` varchar(150) NOT NULL,
  `user_lname` varchar(150) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_order`
--

INSERT INTO `m_order` (`id`, `uid`, `product`, `price`, `qty`, `total`, `method`, `gcash`, `order_date`, `status`, `remarks`, `adminmsg`, `notif`, `notif2`, `user_fname`, `user_lname`, `user_contact`, `user_email`, `user_address`) VALUES
(156, 54, 'Matcha (1 )', '120.00', 1, '120.00', 'Cash on Delivery', '', '2023-01-04 01:49:48', 'Delivered', '', '', 0, 0, 'Vln', 'Hw', '09453523293', 'chicowhoneyworks@gmail.com', 'Rizal');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `signature` varchar(250) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `signature`, `active`) VALUES
(12, 'Matcha', 'Koi Blends Matcha', '120.00', 'Product_3512.png', 1, '', 'Yes'),
(13, 'Winter Melon', 'Koi Blends Winter Melon', '110.00', 'Product_1138.png', 1, '', 'Yes'),
(14, 'Mocha Frappe', 'Koi Blends Mocha Frappe', '120.00', 'Product_8382.png', 7, '', 'Yes'),
(32, 'Sushi', 'Koi Blends Sushi', '100.00', 'Product_6463.png', 8, '', 'Yes'),
(33, 'Garden Egg Sandwich', 'Koi Blends Sandwich', '95.00', 'Product_7126.png', 8, '', 'Yes'),
(34, 'Sweet Beefie Past', 'Koi Blends Pasta', '159.00', 'Product_1097.png', 8, '', 'Yes'),
(35, 'Iced Cafe Latte', 'Koi Blends Cafe Latte', '125.00', 'Product_6190.png', 7, 'checked', 'Yes'),
(36, 'Okinawa', 'Koi Blends Okinawa', '110.00', 'Product_4558.png', 1, '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `verifusers`
--

CREATE TABLE `verifusers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `email_verif_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifusers`
--

INSERT INTO `verifusers` (`id`, `first_name`, `last_name`, `address`, `email`, `contact`, `username`, `password`, `verification_code`, `email_verif_at`, `status`, `token`) VALUES
(3, 'Aubrey', 'Daligdig', 'Taguig', 'aubrey.daligdig910@gmail.com', '', 'Yera', 'Klibabyluvs', '329537', '2022-09-26 14:30:53', 1, ''),
(22, 'Anne', 'Glomar', 'paliparan 2', 'anneglomar11@gmail.com', '', 'anneeee', 'annee12', '197613', '2022-10-04 13:19:26', 1, ''),
(26, 'Klien', 'Garrote', 'Dasmarinas City', 'gklien8@gmail.com', '09453523293', 'gklien8', 'Klien1219', '312093', '2022-10-29 17:23:26', 1, ''),
(27, 'Cilger', 'Gaitan', 'STI Dasma', 'gaitancilger@gmail.com', '', 'cilger21', '12345678', '301484', '2022-11-08 13:27:02', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailsubs`
--
ALTER TABLE `emailsubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_order`
--
ALTER TABLE `m_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifusers`
--
ALTER TABLE `verifusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `emailsubs`
--
ALTER TABLE `emailsubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_order`
--
ALTER TABLE `m_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `verifusers`
--
ALTER TABLE `verifusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
