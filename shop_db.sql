-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 03:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(29, 4, 20, 'Pakistani Designer Punjabi', '1800', '1', 'Panjabi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(5, 3, 'Rakibul Hassan', 'dimitri@gmail.com', '0198762', 'dius ksjdha dkjsd mdhuef kjfdhsui cksjdfsk uhfbwf wff kfwkf ihddq iudq sdqdo  iuwdq ddh djudn'),
(6, 3, 'Rakibul Hassan', 'dimitri@gmail.com', '012365', 'Thank you so much. Satisfied with the product');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `placed_on` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(4, 3, 'Rakibul Hassan', '01965782314', 'dimitri@gmail.com', 'bkash', 'Charsyedpur, Narayanganj Sadar', ', Blue Pant (1), Pakistani Designer Punjabi (3)', '6100', '07-Dec-2023', 'pending'),
(5, 3, 'Rakibul Hassan', '01879635143', 'dimitri@gmail.com', 'bkash', 'Charsyedpur, Narayanganj', ', Jacket (1), Formal Sweater (1), Formal Shoe for Men (1), Tangailla Sharee for Women (1), Pakistani Designer Punjabi (1), Hoodie (1), Formal Shirt (1), Denim Stylish Pant (1), Blue Pant (1), T-shirt (1)', '15245', '07-Dec-2023', 'pending'),
(7, 4, 'Sulaiman Sukhon', '0123456789', 'sukhon@gmail.com', 'cash on delivery', 'Bogura', ', Hoodie (1)', '3200', '26-Dec-2023', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_details`, `image`) VALUES
(10, 'T-shirt', '645', 'Cotton comfortable T-shirt with all sizes and colors available', '0.jpeg'),
(11, 'Blue Pant', '700', 'Cotton comfortable pant with all sizes and colors available', 'nil.webp'),
(12, 'Denim Stylish Pant', '800', 'Denim comfortable pant with all sizes and colors available', 'nvi_blue.webp'),
(14, 'Formal Shirt', '1400', 'Cotton comfortable formal shirt with all sizes and colors available', 'Formal-Shirt.jpg'),
(15, 'Hoodie', '3200', 'Comfortable hoodie with all sizes and colors available', 'hoodie.jpeg'),
(16, 'Jacket', '3200', 'Comfortable jacket with all sizes and colors available', 'jacket.jpg'),
(20, 'Pakistani Designer Punjabi', '1800', 'Comfortable punjabi with all sizes and colors available', 'Panjabi.jpg'),
(21, 'Tangailla Sharee for Women', '900', 'Comfortable sharee with all sizes and colors available', 'Sharee.jpg'),
(22, 'Formal Shoe for Men', '1400', 'Comfortable shoe with all sizes and colors available', 'shoe.jpeg'),
(23, 'Formal Sweater', '1600', 'Cotton comfortable sweater with all sizes and colors available', 'sweater.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Rakibul Hassan', 'nishua676@gmail.com', '1234', 'admin'),
(3, 'Mahi', 'dimitri@gmail.com', '1234', 'user'),
(4, 'Sulaiman Sukhon', 'sukhon@gmail.com', '1234', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(5, 3, 11, 'Blue Pant', '700', 'nil.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
