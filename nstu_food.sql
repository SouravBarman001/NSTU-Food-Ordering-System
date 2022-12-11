-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 10:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nstu_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(2048) NOT NULL,
  `userpassword` varchar(50) NOT NULL,
  `v_code` varchar(100) NOT NULL,
  `is_validate` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `email`, `phone_number`, `address`, `userpassword`, `v_code`, `is_validate`) VALUES
('nstu630e62916b1f3', 'Akash', 'alamin2514@student.nstu.edu.bd', '01957703927', 'Chottagram', '12345', '0462dce9654b1d5fe46786e41bdbf6b6', 1),
('nstu632dba395d509', 'Roman', 'alaminpiash1998@gmail.com', '01294394', 'Dhaka', '12345', '0f716384be3e1e247aa5f720d6d15baa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fooditeam`
--

CREATE TABLE `fooditeam` (
  `foodId` int(20) NOT NULL,
  `foodName` varchar(20) NOT NULL,
  `foodDetails` varchar(255) NOT NULL,
  `foodPrice` int(11) NOT NULL,
  `foodImg` varchar(255) NOT NULL,
  `vendor_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooditeam`
--

INSERT INTO `fooditeam` (`foodId`, `foodName`, `foodDetails`, `foodPrice`, `foodImg`, `vendor_id`) VALUES
(7, 'Rice', 'Very tasty', 100, 'IMG-20220904-WA0010.jpg', 'nstu631d7000e9547'),
(8, 'Pizza', 'Very tasty', 300, 'food_image_3.jpg', 'nstu631d7000e9547');

-- --------------------------------------------------------

--
-- Table structure for table `foodlist`
--

CREATE TABLE `foodlist` (
  `phone_number` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `food_item` varchar(100) NOT NULL,
  `quentity` int(20) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodlist`
--

INSERT INTO `foodlist` (`phone_number`, `address`, `food_item`, `quentity`, `price`) VALUES
(1307044425, 'shanti niketon', 'pizza', 1, 70),
(1792488399, 'library building ', 'burger', 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `order_id` int(10) NOT NULL,
  `Full_Name` varchar(100) NOT NULL,
  `Phone_No` varchar(50) NOT NULL,
  `Address` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`order_id`, `Full_Name`, `Phone_No`, `Address`) VALUES
(32, 'Al-Amin', '2343', 'Maijdee'),
(33, 'Al-Amin', '234', 'Maijdee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `name` longblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(10) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Price` int(20) NOT NULL,
  `Quantity` int(29) NOT NULL,
  `vendor_id` varchar(100) NOT NULL,
  `user_mail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `Vendor_id` varchar(20) NOT NULL,
  `V_name` varchar(100) NOT NULL,
  `V_phone_number` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `V_address` varchar(1048) NOT NULL,
  `V_password` varchar(50) NOT NULL,
  `V_codee` varchar(50) NOT NULL,
  `is_validate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`Vendor_id`, `V_name`, `V_phone_number`, `email`, `V_address`, `V_password`, `V_codee`, `is_validate`) VALUES
('nstu630eb08ca8e62', 'Akash', 1957703927, 'alaminpiash1998@gmail.com', 'Chottagram', '12345', 'aac9a0064198cf0dedf505decccf3fc7', 1),
('nstu631d7000e9547', 'Piash', 1294394, 'alamin2514@student.nstu.edu.bd', 'treter', '12345', '453371bcc327019945567474bfd666e6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `fooditeam`
--
ALTER TABLE `fooditeam`
  ADD PRIMARY KEY (`foodId`);

--
-- Indexes for table `foodlist`
--
ALTER TABLE `foodlist`
  ADD PRIMARY KEY (`phone_number`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`Vendor_id`),
  ADD UNIQUE KEY `V_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fooditeam`
--
ALTER TABLE `fooditeam`
  MODIFY `foodId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
