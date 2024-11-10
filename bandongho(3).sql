-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 04:07 PM
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
-- Database: `bandongho`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'gshock', 1),
(2, 'seiko', 1),
(3, 'Casio', 1),
(4, 'Skagen', 1),
(5, 'Fosil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_phone_number` varchar(20) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Đang xử lý',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `delivery_at` date DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `pay_method` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_address`, `customer_email`, `customer_phone_number`, `total_price`, `status`, `created_at`, `user_id`, `delivery_at`, `city`, `district`, `pay_method`) VALUES
(1, 'duongngocnguyen', '6NguyenTrai', 'abcde@gmail.com', '0123456789', '0.00', 'Đang xử lý', '2023-05-05 17:16:48', 2, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(2, 'duongngocnguyen', '6NguyenTrai', 'abcde@gmail.com', '0123456789', '0.00', 'Đang xử lý', '2023-05-05 17:17:51', 2, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(3, 'duongngocnguyen', '6NguyenTrai', 'abcde@gmail.com', '0123456789', '0.00', 'Đang xử lý', '2023-05-05 17:21:00', 2, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(4, 'duongngocnguyen', '6NguyenTrai', 'abcde@gmail.com', '0123456789', '0.00', 'Đang xử lý', '2023-05-05 17:22:29', 2, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(5, 'duongminhson', '273 An Duong Vuong', 'minhson@gmail.com', '0050505055', '2550000.00', 'Đã hoàn thành', '2023-05-05 17:30:11', 7, '2023-05-07', 'Thành phố Hồ Chí Minh', 'Quận 5', 'cash_on_delivery'),
(6, 'hodanghoang', '273 An Duong Vuong', 'hoang@gmail.com', '0121021021', '2550000.00', 'Đã hoàn thành', '2023-05-05 17:36:04', 5, '2023-05-07', 'Thành phố Hồ Chí Minh', 'Quận Bình Tân', 'bank_transfer'),
(7, 'thanhthao', '110 Ba Hom', 'thao@gmail.com', '0525252521', '2100000.00', 'Đã hoàn thành', '2023-05-05 17:43:44', 5, '2023-05-09', 'Thành phố Hồ Chí Minh', 'Quận 6', 'cash_on_delivery'),
(8, 'minhsonduong', '273 An Duong Vuong', 'minhsonduong@gmail.com', '0123456789', '2100000.00', 'Đang xử lý', '2023-05-06 10:02:08', 7, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'cash_on_delivery'),
(9, 'dương ngọc nguyên', '273 An Dương Vương', 'abcde@gmail.com', '0121021021', '8750000.00', 'Đang xử lý', '2023-05-08 14:54:52', 7, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'cash_on_delivery'),
(10, 'ngọc nguyên', '273 An Dương Vương', 'thao@gmail.com', '0050505055', '2100000.00', 'Đang xử lý', '2023-05-08 14:56:21', 7, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(11, 'duongngocnguyen', '273 An Duong Vuong', 'abcde@gmail.com', '0123456789', '1250000.00', 'Đang xử lý', '2023-05-09 06:15:27', 7, NULL, 'Tỉnh Cao Bằng', 'Huyện Hà Quảng', 'bank_transfer'),
(12, 'Pham thanh vuong', 'dai hoc sai gon', 'zz@gmail.com', '0973366791', '1050000.00', 'Đang xử lý', '2023-05-09 08:59:49', 7, NULL, 'Thành phố Hồ Chí Minh', 'Quận 12', 'cash_on_delivery');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total_price`) VALUES
(1, 4, 36, 5, '1050000.00', '5250000.00'),
(2, 4, 9, 2, '1050000.00', '2100000.00'),
(3, 5, 1, 2, '1275000.00', '2550000.00'),
(4, 6, 1, 2, '1275000.00', '2550000.00'),
(5, 7, 36, 1, '1050000.00', '1050000.00'),
(6, 7, 34, 1, '1050000.00', '1050000.00'),
(7, 8, 9, 1, '1050000.00', '1050000.00'),
(8, 8, 36, 1, '1050000.00', '1050000.00'),
(9, 9, 37, 7, '1250000.00', '8750000.00'),
(10, 10, 36, 2, '1050000.00', '2100000.00'),
(11, 11, 37, 1, '1250000.00', '1250000.00'),
(12, 12, 39, 1, '1050000.00', '1050000.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image_url`, `price`, `quantity`, `category_id`) VALUES
(1, 'Dong ho gshock color red', 'Day la dong ho 2 dep nhat', 'dh2.webp', '1275000.00', 10, 1),
(7, 'Dong ho 3', 'Dong ho 3', 'dh3.webp', '1150000.00', 7, 1),
(8, 'Dong ho 4', 'Dong ho 4', 'dh4.webp', '1250000.00', 12, 3),
(9, 'Dong ho 5', 'Dong ho 5', 'dh5.webp', '1050000.00', 5, 3),
(10, 'Dong ho 6', 'Dong ho 6', 'dh9.webp', '1550000.00', 5, 1),
(11, 'Dong ho 7', 'Dong ho 7', 'dh6.webp', '1550000.00', 10, 1),
(12, 'Dong ho 5', 'dh5', 'dh7.webp', '1550000.00', 5, 1),
(13, 'Dong ho 5', 'dh5', 'dh8.webp', '1550000.00', 5, 1),
(14, 'Dong ho 5', 'dh5', 'dh9.webp', '1550000.00', 5, 1),
(15, 'Dong ho 5', 'dh5', 'dh10.webp', '1150000.00', 5, 1),
(16, 'Dong ho 7', 'Dh5', 'dh11.webp', '1250000.00', 5, 1),
(17, 'Dong ho 5', 'dh5', 'dh12.webp', '1550000.00', 5, 3),
(18, 'Dong ho 5', 'dh5', 'dh13.webp', '1250000.00', 5, 3),
(19, 'Dong ho 5', 'dh5', 'dh14.webp', '1550000.00', 5, 3),
(20, 'Dong ho 5', 'dh5', 'dh15.webp', '1550000.00', 5, 3),
(21, 'Dong ho 11', 'Dh5', 'dh16.webp', '1550000.00', 5, 3),
(22, 'Dong ho 5', 'dh', 'dh17.webp', '1550000.00', 5, 2),
(23, 'Gshock black moi sua', 'dh', 'dh18.webp', '1550000.00', 5, 2),
(25, 'Dong ho 5', 'dh', 'dh19.webp', '1550000.00', 5, 2),
(26, 'Dong ho 5', 'dh', 'dh20.webp', '1550000.00', 5, 2),
(27, 'Dong ho 5', 'dh', 'dh21.webp', '1550000.00', 5, 2),
(28, 'Dong ho 5', 'dh', 'dh22.webp', '1550000.00', 5, 4),
(29, 'Dong ho 5', 'dh', 'dh23.webp', '1550000.00', 5, 4),
(30, 'Dong ho 5', 'dh', 'dh24.webp', '1550000.00', 5, 4),
(31, 'Dong ho 5', 'dh', 'dh25.webp', '1550000.00', 5, 4),
(32, 'Dong ho 5', 'dh', 'dh26.webp', '1150000.00', 5, 4),
(33, 'Dong ho 5', 'dh', 'dh27.webp', '1250000.00', 5, 5),
(34, 'Dong ho 7', 'dh', 'dh28.webp', '1050000.00', 7, 5),
(35, 'Gshock gold', 'dh', 'dh29.webp', '1250000.00', 7, 5),
(36, 'Gshock black', 'dh', 'dh30.webp', '1050000.00', 11, 5),
(37, 'Dong ho 5', 'dh', 'lm1.webp', '1250000.00', 7, 5),
(39, 'Dong ho 5', 'dh', 'lm3.webp', '1050000.00', 5, 5),
(40, 'Dong ho 5', 'dh', 'lm4.webp', '1550000.00', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_admin`, `status`) VALUES
(1, 'nguyen1', 'nguyen1', 'dnnguyen@gmail.com', 1, 0),
(2, 'nguyen2', 'nguyen2', 'nguyen2@gmail.com', 0, 0),
(5, 'hoang', 'hoangvuive', 'hoangvuive@gmail.com', 0, 1),
(6, 'nguyen5', 'nguyen5', 'nguyen5@gmail.com', 0, 1),
(7, 'minhson', 'minhson', 'minhson@gmail.com', 0, 0),
(9, 'hoang1', 'hoang1', 'hodanghoang@gmail.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
