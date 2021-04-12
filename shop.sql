-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2021 at 05:40 PM
-- Server version: 5.6.43
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(10) NOT NULL,
  `product_name` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `user_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `product_name`, `picture_url`, `price`, `user_name`, `created_at`) VALUES
(1, 'Видеокарта', 'https://i1.rozetka.ua/goods/13125590/copy_asus_dual_rtx2060_6g_evo_5d3f0b1a33f57_images_13125590076.jpg', 29000, 'Женя', '2021-04-09 16:59:42'),
(2, 'Apple MacBook Air 13', 'https://i8.rozetka.ua/goods/20678897/apple_macbook_air_13_m1_256gb_2020_silver_images_20678897166.jpg', 34000, 'Женя', '2021-04-09 16:59:42'),
(8, 'Xiaomi Redmi Note 9', 'https://i2.rozetka.ua/goods/19724922/copy_xiaomi_683902_5f4ebd2b1f825_images_19724922949.jpg', 4999, 'Коля', '2021-04-11 17:27:36'),
(9, 'USB Адаптер', 'https://i1.rozetka.ua/goods/13396705/dynamode_46814_images_13396705658.jpg', 1120, 'Катя', '2021-04-11 17:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `good_id` int(11) NOT NULL,
  `user_name` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `rating` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `good_id`, `user_name`, `comment`, `rating`, `created_at`) VALUES
(19, 1, 'Женя', 'Хороший товар', 9, '2021-04-11 16:31:31'),
(20, 1, 'Віталік', 'Норм', 5, '2021-04-11 16:31:52'),
(21, 2, 'Маша', 'Хороший', 8, '2021-04-11 17:34:22'),
(22, 1, 'Наташа', 'Супер!', 10, '2021-04-11 17:35:25'),
(23, 1, 'Рома', 'Чудова! ', 9, '2021-04-11 17:38:35'),
(24, 9, 'Катя', 'Норм', 7, '2021-04-11 17:39:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
