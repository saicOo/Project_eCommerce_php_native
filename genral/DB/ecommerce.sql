-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 03:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(12) NOT NULL,
  `roles` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `roles`) VALUES
(1, 'admin', 'admin@gmail.com', '1234', 0),
(2, 'saico', 'saico@gmail.com', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogId` int(11) NOT NULL,
  `message` text NOT NULL,
  `time_blog` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogId`, `message`, `time_blog`, `customerId`) VALUES
(1, 'osoosdkdldflkdkldldld\r\n', '2021-12-08 06:39:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'men'),
(2, 'women'),
(8, 'kids');

-- --------------------------------------------------------

--
-- Table structure for table `chekout`
--

CREATE TABLE `chekout` (
  `order_Id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `quantity` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chekout`
--

INSERT INTO `chekout` (`order_Id`, `product_name`, `price`, `quantity`) VALUES
(1, 'techert blue', '255.00', 2),
(2, 'techert blue', '255.00', 4),
(2, 'techert blue', '255.00', 2),
(3, 'techert blue', '255.00', 1),
(3, 'POPOP', '525.00', 2),
(3, 'POPOP', '525.00', 4),
(3, 'techert blue', '255.00', 6),
(5, 'POPOP', '525.00', 2),
(6, 'Linear Logo Training Zip Up Hoodie Black', '600.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment_blog`
--

CREATE TABLE `comment_blog` (
  `id_comment` int(11) NOT NULL,
  `comment` text NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `blog_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_blog`
--

INSERT INTO `comment_blog` (`id_comment`, `comment`, `customer_Id`, `blog_Id`) VALUES
(1, 'looooooole', 1, 1),
(2, 'nice', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(20) NOT NULL,
  `image_user` text DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `image_user`) VALUES
(1, 'ahmed', 'ahmed@gmail.com', '1234', '01245459112', 'city nassir', 'user.jpg'),
(2, 'omar', '', '123456', '01666664486', 'cairo', '4525133_black.jpg'),
(4, 'sayed', 'sayed@gmail.com', '123456', '01666664486', 'city nassir', 'clem-onojeghuo-iuvLYv85r40-unsplash.jpg'),
(5, 'shady', 'shady@gmail.com', '123456', '01666664486', 'city nassir', 'user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `quantity` int(1) NOT NULL DEFAULT 1,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `quantity`, `customerId`, `productId`) VALUES
(14, 2, 1, 7),
(15, 4, 1, 9),
(16, 6, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `order_Id` int(11) NOT NULL,
  `name_customer` varchar(20) NOT NULL,
  `phone_customer` varchar(11) NOT NULL,
  `address_customer` varchar(20) NOT NULL,
  `sumTotal` decimal(6,2) NOT NULL,
  `payment_method` enum('pay cash','PayPal','credit card') NOT NULL DEFAULT 'pay cash',
  `order_status` enum('Reviewing','Ready','Delivery','Delivered On') NOT NULL DEFAULT 'Reviewing',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`order_Id`, `name_customer`, `phone_customer`, `address_customer`, `sumTotal`, `payment_method`, `order_status`, `order_date`) VALUES
(1, 'ahmed', '01245459112', 'city nassir', '510.00', 'PayPal', 'Delivered On', '2021-12-08 05:49:05'),
(2, 'omar', '01666664486', 'cairo', '1530.00', 'credit card', 'Reviewing', '2021-12-08 05:59:32'),
(3, 'ahmed', '01245459112', 'city nassir', '4935.00', 'PayPal', 'Delivered On', '2021-12-14 00:01:35'),
(5, 'sayed', '01666664486', 'city nassir', '1050.00', 'pay cash', 'Delivered On', '2021-12-19 01:13:46'),
(6, 'sayed', '01666664486', 'city nassir', '1800.00', 'pay cash', 'Delivery', '2021-12-19 01:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `image2`, `image3`, `title`, `descriptions`, `price`, `categoryId`) VALUES
(1, '1-zoom-desktop.jpg', '4525133_black.jpg', '3516514-BRIGHT-TEE-SPWIN21190421_01-517.jpg', 'techert blue', 'techert blue techert blue techert blue techert blue techert blue', '255.00', 1),
(2, 'A21312.jpg', '1916002_P.jpg', '51m8toADhaL._SL500_._AC_SL500_.jpg', 'POPOP', 'POPOP POPOP POPOP POPOP', '525.00', 2),
(3, 'N5118512s5ds5d.webp', 'A21312.jpg', '72f9362f4ccf4f28a318089937115eb4.webp', 'Athletics Windbreaker Jacket Multicolour', 'Athletics Windbreaker Jacket Multicolour Athletics Windbreaker Jacket Multicolour Athletics Windbreaker Jacket Multicolour', '600.00', 2),
(5, 'black-long.jpg', 'black-long-slee.jpg', 'asdsd22as2.jpg', 'Classics Graphic Crew Sweatshirt Chalk', 'Classics Graphic Crew Sweatshirt Chalk Classics Graphic Crew Sweatshirt Chalk Classics Graphic Crew Sweatshirt Chalk', '500.00', 2),
(6, 'hjjjkkkl.jpg', 'n6hhjhh.jpg', 'N40764388V_1.jpg', 'Linear Logo Training Zip Up Hoodie Black', 'Linear Logo Training Zip Up Hoodie Black Linear Logo Training Zip Up Hoodie Black', '600.00', 2),
(7, 'asx.jpg', 'asz.jpg', '4525133_black.jpg', 'SHARE THIS PRODUCT   Official Store Defacto', 'SHARE THIS PRODUCT   Official Store Defacto Man Black Regular Fit Polo Neck Long Sleeve Mont', '200.00', 1),
(8, 'Reactive Packable Training Jacket BlackWhiteGrey.jpg', '4060981292142_CRP_RAW_2.jpg', 'N44939155V_2.webp', 'Bomber Zipped Jacket With Removable', 'Bomber Zipped Jacket With Removable Hood - Black', '150.00', 1),
(9, 'e266cecd-84d1-4d58-b7ec-fc19839d8699.png', 'b087c75995ef4329838f3cd2a6d557c9.webp', 'nike-m-nsw-tee-air-manga-futura-107597_3.jpg', 'Merch Long Coat With Pocket For Men', 'Merch Long Coat With Pocket For Men Merch Long Coat With Pocket For Men', '999.00', 1),
(30, 'N41266128V_4.webp', 'N41266128V_4.webp', 'N41266128V_4.webp', 'Faux Shearling Lined Denim Jacket Blue', 'Faux Shearling Lined Denim Jacket Blue Faux Shearling Lined Denim Jacket Blue Faux Shearling Lined Denim Jacket Blue Faux Shearling Lined Denim Jacket Blue', '750.00', 8),
(31, 'N47864569V_1.webp', 'N47864569V_1.webp', 'N47864569V_1.webp', 'Kids Contrast Panel Tracksuit Black', 'Kids Contrast Panel Tracksuit Black\r\n Kids Contrast Panel Tracksuit Black\r\n Kids Contrast Panel Tracksuit Black\r\n', '999.99', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chekout`
--
ALTER TABLE `chekout`
  ADD KEY `order_Id` (`order_Id`);

--
-- Indexes for table `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `blog_Id` (`blog_Id`),
  ADD KEY `customer_Id` (`customer_Id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`order_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment_blog`
--
ALTER TABLE `comment_blog`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chekout`
--
ALTER TABLE `chekout`
  ADD CONSTRAINT `chekout_ibfk_1` FOREIGN KEY (`order_Id`) REFERENCES `order_manager` (`order_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD CONSTRAINT `comment_blog_ibfk_1` FOREIGN KEY (`customer_Id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_blog_ibfk_2` FOREIGN KEY (`blog_Id`) REFERENCES `blog` (`blogId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
