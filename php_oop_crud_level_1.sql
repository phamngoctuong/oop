-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 06:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_oop_crud_level_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Fashion', '2014-06-01 00:35:07', '2014-05-30 10:34:33'),
(2, 'Electronics', '2014-06-01 00:35:07', '2014-05-30 10:34:33'),
(3, 'Motors', '2014-06-01 00:35:07', '2014-05-30 10:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `category_id`, `created`, `modified`) VALUES
(60, ' Name 222', ' Name 222', '7f9ee0a93e4012d2f70ed6888e9b76a63fa4c0e7-module_table_bottom.png', 5445, 3, '2020-02-07 06:09:30', '2020-02-07 05:09:30'),
(43, 'Name 3', 'Description 3', '', 1000, 2, '2020-02-06 17:03:16', '2020-02-06 16:03:16'),
(42, 'Name 1', 'Description', '2c140713b605b9b718f03b1aa4f912715ccf79a1-Proxy .txt', 12345, 2, '2020-02-06 17:02:37', '2020-02-06 16:02:37'),
(10, 'Sony Smart Watch', 'The coolest smart watch!', '', 300, 2, '2014-06-06 17:10:01', '2014-06-05 11:09:51'),
(11, 'Huawei Y300', 'For testing purposes.', '', 100, 2, '2014-06-06 17:11:04', '2014-06-05 11:10:54'),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', '36a26a2a9c6d9b8f60182707fd8d0ba208975442-9.jpg', 60, 1, '2014-06-06 17:12:21', '2014-06-05 11:12:11'),
(13, 'aaaaaaaaaaa 3', 'aaaaaaaaaaa 3', 'bb4f7f08e10a2b58c58319cb1794aa500c6113b9-5.jpg', 70, 1, '2014-06-06 17:12:59', '2014-06-05 11:12:49'),
(39, 'Name 2', 'Description 2', 'bb4f7f08e10a2b58c58319cb1794aa500c6113b9-5.jpg', 1000, 2, '2020-02-05 16:22:51', '2020-02-05 15:22:51'),
(26, 'Another product', 'Awesome product!', '5.jpg', 555, 2, '2014-11-22 19:07:34', '2014-11-21 13:07:34'),
(27, 'Bag', 'Awesome bag for you!', '', 999, 1, '2014-12-04 21:11:36', '2014-12-03 15:11:36'),
(28, 'Wallet', 'You can absolutely use this one!', '', 799, 1, '2014-12-04 21:12:03', '2014-12-03 15:12:03'),
(38, 'Name 1', 'Description 1', '', 12345, 2, '2020-02-05 16:10:28', '2020-02-05 15:10:28'),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', '', 333, 1, '2014-12-13 00:52:54', '2014-12-11 18:52:54'),
(32, 'Washing Machine Model PTRR', 'Some new product.', '', 999, 1, '2015-01-08 22:44:15', '2015-01-07 16:44:15'),
(40, 'Name 2', 'Description 2', '820be9e6553db811e60056b87c71faac1156e9c6-1.jpg', 1000, 2, '2020-02-05 16:23:17', '2020-02-05 15:23:17'),
(58, 'Name 1', 'return $result_message;', 'bb4f7f08e10a2b58c58319cb1794aa500c6113b9-5.jpg', 1000, 2, '2020-02-07 04:18:49', '2020-02-07 03:18:49'),
(41, 'Lap Trinh Nhung 1', 'Lap Trinh Nhung 1', 'a5089196460c77fbae6b115feeeb138df9688a5c-12.jpg', 123, 1, '2020-02-05 16:30:41', '2020-02-05 15:30:41'),
(45, 'Name 1', 'df', '465bcf53428b819eb0016cece9178b220c3a5b9a-7.jpg', 1000, 2, '2020-02-06 17:04:29', '2020-02-06 16:04:29'),
(46, 'Name 1', 'Description', '2c140713b605b9b718f03b1aa4f912715ccf79a1-Proxy .txt', 12345, 2, '2020-02-06 17:05:05', '2020-02-06 16:05:05'),
(47, '1000', '1000', '3f07d4dd97bc788c99353c618aebbf973db6521b8.jpg', 1000, 2, '2020-02-06 17:35:01', '2020-02-06 10:35:01'),
(48, '1000', '1000', '3f07d4dd97bc788c99353c618aebbf973db6521b8.jpg', 1000, 2, '2020-02-06 17:37:39', '2020-02-06 10:37:39'),
(49, 'Name 11', 'Name 11', '3f07d4dd97bc788c99353c618aebbf973db6521b8.jpg', 1111, 2, '2020-02-06 17:40:58', '2020-02-06 10:40:58'),
(50, 'Name 3', 'Name 3', '181f14a40760db9f31d7dec7983d1c89629e961e-6.jpg', 123, 2, '2020-02-06 17:46:57', '2020-02-06 10:46:57'),
(51, 'Name 3', 'Name 3', '181f14a40760db9f31d7dec7983d1c89629e961e-6.jpg', 123, 2, '2020-02-06 17:48:25', '2020-02-06 16:48:25'),
(52, 'Name 4', 'Name 4', '3f07d4dd97bc788c99353c618aebbf973db6521b-8.jpg', 333, 1, '2020-02-06 17:48:54', '2020-02-06 16:48:54'),
(53, 'Name 4', 'Name 4', '3f07d4dd97bc788c99353c618aebbf973db6521b-8.jpg', 333, 1, '2020-02-06 17:50:36', '2020-02-06 16:50:36'),
(54, 'Name 4', 'Name 4', '3f07d4dd97bc788c99353c618aebbf973db6521b-8.jpg', 333, 1, '2020-02-06 17:50:51', '2020-02-06 16:50:51'),
(55, '', '', '', 0, 0, '2020-02-07 04:04:11', '2020-02-07 03:04:11'),
(56, '', '', '', 0, 0, '2020-02-07 04:05:38', '2020-02-07 03:05:38'),
(57, '', '', '465bcf53428b819eb0016cece9178b220c3a5b9a-7.jpg', 0, 0, '2020-02-07 04:06:33', '2020-02-07 03:06:33'),
(59, '', '', '181f14a40760db9f31d7dec7983d1c89629e961e-6.jpg', 0, 0, '2020-02-07 04:32:23', '2020-02-07 03:32:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
