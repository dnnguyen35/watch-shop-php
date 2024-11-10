-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 01:21 PM
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
(1, 'g-shock', 1),
(2, 'seiko', 1),
(3, 'Casio', 1),
(4, 'Skagen', 1),
(5, 'Fossil', 1);

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
(1, 'duongngocnguyen', '6NguyenTrai', 'abcde@gmail.com', '0123456789', '0.00', 'Đã hủy', '2023-05-05 17:16:48', 2, '2023-05-12', 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(2, 'duongngocnguyen', '6NguyenTrai', 'abcde@gmail.com', '0123456789', '0.00', 'Đã hủy', '2023-05-05 17:17:51', 2, '2023-05-11', 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(3, 'duongngocnguyen', '6NguyenTrai', 'abcde@gmail.com', '0123456789', '0.00', 'Đã hủy', '2023-05-05 17:21:00', 2, '2023-05-12', 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(4, 'duongngocnguyen', '6NguyenTrai', 'abcde@gmail.com', '0123456789', '0.00', 'Đã hủy', '2023-05-05 17:22:29', 2, '2023-05-12', 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(5, 'duongminhson', '273 An Duong Vuong', 'minhson@gmail.com', '0050505055', '2550000.00', 'Đã hoàn thành', '2023-05-05 17:30:11', 7, '2023-05-07', 'Thành phố Hồ Chí Minh', 'Quận 5', 'cash_on_delivery'),
(6, 'hodanghoang', '273 An Duong Vuong', 'hoang@gmail.com', '0121021021', '2550000.00', 'Đã hoàn thành', '2023-05-05 17:36:04', 5, '2023-05-07', 'Thành phố Hồ Chí Minh', 'Quận Bình Tân', 'bank_transfer'),
(7, 'thanhthao', '110 Ba Hom', 'thao@gmail.com', '0525252521', '2100000.00', 'Đã hoàn thành', '2023-05-05 17:43:44', 5, '2023-05-09', 'Thành phố Hồ Chí Minh', 'Quận 6', 'cash_on_delivery'),
(8, 'minhsonduong', '273 An Duong Vuong', 'minhsonduong@gmail.com', '0123456789', '2100000.00', 'Đang xử lý', '2023-05-06 10:02:08', 7, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'cash_on_delivery'),
(9, 'dương ngọc nguyên', '273 An Dương Vương', 'abcde@gmail.com', '0121021021', '8750000.00', 'Đang xử lý', '2023-05-08 14:54:52', 7, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'cash_on_delivery'),
(10, 'ngọc nguyên', '273 An Dương Vương', 'thao@gmail.com', '0050505055', '2100000.00', 'Đã hoàn thành', '2023-05-08 14:56:21', 7, '2023-05-18', 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(11, 'duongngocnguyen', '273 An Duong Vuong', 'abcde@gmail.com', '0123456789', '1250000.00', 'Đang xử lý', '2023-05-09 06:15:27', 7, NULL, 'Tỉnh Cao Bằng', 'Huyện Hà Quảng', 'bank_transfer'),
(12, 'Pham thanh vuong', 'dai hoc sai gon', 'zz@gmail.com', '0973366791', '1050000.00', 'Đang xử lý', '2023-05-09 08:59:49', 7, NULL, 'Thành phố Hồ Chí Minh', 'Quận 12', 'cash_on_delivery'),
(13, 'hoang', 'binh chanh', 'hodanghoang2003@gmail.com', '123142352', '3100000.00', 'Đang giao', '2023-05-09 15:34:52', 7, '2023-05-12', 'Thành phố Hồ Chí Minh', 'Huyện Bình Chánh', 'cash_on_delivery'),
(14, 'hoang', 'binh chanh', 'hoang123@gmail.com', '0377694735', '2600000.00', 'Đang xử lý', '2023-05-10 02:22:20', 7, NULL, 'Thành phố Hồ Chí Minh', 'Huyện Bình Chánh', 'cash_on_delivery'),
(15, 'asasasasasa', 'aksgasgadka', 'abcde@gmail.com', '09292030238', '9450000.00', 'Đang xử lý', '2023-05-12 03:10:57', 7, NULL, 'Thành phố Hà Nội', 'Quận Hoàn Kiếm', 'bank_transfer'),
(16, 'nguyen1', '1212121212asasasas', 'nguyen1@gmail.com', '1212121212', '9450000.00', 'Đang xử lý', '2023-05-12 03:18:49', 7, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'cash_on_delivery'),
(17, 'hoang1', '273 An Dương Vương', 'abcde@gmail.com', '1212121212', '3780000.00', 'Đã hoàn thành', '2023-05-12 03:30:52', 7, '2023-05-13', 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer'),
(18, 'minhson2', '6NguyenTrai', 'thao@gmail.com', '0525252521', '13230000.00', 'Đang xử lý', '2023-05-12 17:08:12', 10, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'cash_on_delivery'),
(19, 'minhson', '273 An Duong Vuong', 'abcde@gmail.com', '0123456789', '13230000.00', 'Đang xử lý', '2023-05-12 17:10:15', 7, NULL, 'Thành phố Hồ Chí Minh', 'Quận 5', 'cash_on_delivery'),
(20, 'minhsonduong', '273 An Dương Vương', 'minhson@gmail.com', '0050505055', '9450000.00', 'Đã hoàn thành', '2023-05-13 09:07:37', 7, '2023-05-12', 'Thành phố Hồ Chí Minh', 'Quận 5', 'bank_transfer');

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
(12, 12, 39, 1, '1050000.00', '1050000.00'),
(13, 13, 40, 2, '1550000.00', '3100000.00'),
(14, 14, 40, 1, '1550000.00', '1550000.00'),
(15, 14, 39, 1, '1050000.00', '1050000.00'),
(16, 15, 9, 5, '1890000.00', '9450000.00'),
(17, 16, 9, 5, '1890000.00', '9450000.00'),
(18, 17, 9, 2, '1890000.00', '3780000.00'),
(19, 18, 9, 7, '1890000.00', '13230000.00'),
(20, 19, 9, 7, '1890000.00', '13230000.00'),
(21, 20, 9, 5, '1890000.00', '9450000.00');

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
  `category_id` int(11) DEFAULT NULL,
  `isshow` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image_url`, `price`, `quantity`, `category_id`, `isshow`) VALUES
(1, 'G-SHOCK GA-700-4ADR', 'Mẫu GA-700-4ADR nổi bật với mặt số bằng kim chỉ kết hợp cùng mặt số điện tử với những tính năng hiện đại đầy tiện dụng, ấn tượng với vỏ máy phối cùng dây đeo bằng cao su tông màu đỏ thời trang.', 'dh2.webp', '3500000.00', 50, 1, 0),
(7, 'G-SHOCK GA-700-1ADR', 'Đồng hồ G-Shock GA-700-1ADR với thiết kế vỏ máy bằng nhựa kết hợp cùng dây đeo cao su khả năng chống nước cao, theo phong cách thể thao kết hợp mặt số điện tử với những tính năng tiện dụng.', 'dh3.webp', '3500000.00', 50, 1, 0),
(8, 'CASIO ECB-900DB-1BDR', 'Mẫu Casio ECB-900DB-1BDR tính năng vượt trội pin được trang bị công nghệ Solar (Năng lượng ánh sáng), Edifice phiên bản đặc biệt mặt số kim chỉ kết hợp ô số điện tử.', 'dh4.webp', '6900000.00', 50, 3, 0),
(9, 'CASIO LA680WGA-9DF', 'Mẫu đồng hồ nam Casio LA680WGA-9DF khoác lên vẻ sang trọng với vỏ máy cùng dây đeo bằng kim loại mạ vàng nổi bật lên sự nam tính với bộ dây đeo bằng kim loại tạo nên vẻ rắn chắc.', 'dh5.webp', '1890000.00', 45, 3, 0),
(10, 'G-SHOCK GA-2003-1A2VX', 'Mẫu G-Shock GA-2003-1A2VX phần vỏ viền ngoài tạo hình nền cọc số mang lại vẻ thể thao năng động cùng các ô số điện tử hiện thị chức năng lịch và đo thời gian.', 'dh9.webp', '900000.00', 50, 1, 0),
(11, 'G-SHOCK GA-700-4ADR', 'Mẫu GA-700-4ADR nổi bật với mặt số bằng kim chỉ kết hợp cùng mặt số điện tử với những tính năng hiện đại đầy tiện dụng, ấn tượng với vỏ máy phối cùng dây đeo bằng cao su tông màu đỏ thời trang.', 'dh6.webp', '1550000.00', 50, 1, 0),
(12, 'CASIO MTP-V004L-1B2UDF', 'Mẫu Casio MTP-V004L-1B2UDF mặt số đen size 41mm thiết kế đơn giản trẻ trung 3 kim, phối cùng bộ dây da nâu phiên bản da trơn thời trang.', 'dh7.webp', '800000.00', 50, 3, 0),
(13, 'SEIKO BAMBINO RA-AG05', 'Mẫu Orient RA-AG05 thiết kế Open Heart nổi bật trên nền mặt số xanh thời trang với ô chân kính phô diễn ra hoạt động của bộ máy cơ tạo nên vẻ ngoài độc đáo dành cho phái mạnh.', 'dh8.webp', '1100000.00', 50, 2, 0),
(14, 'G-SHOCK GA-2000-1A2DR', 'Mẫu G-Shock GA-2000-1A2DR phần vỏ viền ngoài tạo hình nền cọc số mang lại vẻ thể thao năng động cùng các ô số điện tử hiện thị chức năng lịch và đo thời gian.', 'dh9.webp', '4600000.00', 50, 1, 0),
(15, 'G-SHOCK GA-110GB-1ADR', 'Đồng hồ G-Shock GA-110GB-1ADR với phong cách cá tính mạnh mẽ, tông màu phối hợp bắt mắt giữa đen và vàng, chất liệu là nhựa cao cấp siêu bền, mặt kính khoáng cứng chịu lực và chống thấm nước.', 'dh10.webp', '1750000.00', 50, 1, 0),
(16, 'CASIO ECB-900DB-1BDR', 'Mẫu Casio ECB-900DB-1BDR tính năng vượt trội pin được trang bị công nghệ Solar (Năng lượng ánh sáng), Edifice phiên bản đặc biệt mặt số kim chỉ kết hợp ô số điện tử.', 'dh11.webp', '1250000.00', 50, 3, 0),
(17, 'CASIO LA680WGA-9DF', 'Mẫu đồng hồ nam Casio LA680WGA-9DF khoác lên vẻ sang trọng với vỏ máy cùng dây đeo bằng kim loại mạ vàng nổi bật lên sự nam tính với bộ dây đeo bằng kim loại tạo nên vẻ rắn chắc.', 'dh12.webp', '1890000.00', 50, 3, 0),
(18, 'CASIO MTP-V004L-1B2UDF', 'Mẫu Casio MTP-V004L-1B2UDF mặt số đen size 41mm thiết kế đơn giản trẻ trung 3 kim, phối cùng bộ dây da nâu phiên bản da trơn thời trang.', 'dh13.webp', '800000.00', 50, 3, 0),
(19, 'CASIO MTP-1384L-7AVDF', 'Đồng hồ Casio MTP-1384L-7AVDF có vỏ kim loại bằng chất liệu thép không gỉ mạ màu đồng sang trọng bao quanh nền trắng mặt số, kim chỉ và vạch số La Mã truyền thống được làm mỏng nổi bật.', 'dh14.webp', '850000.00', 50, 3, 0),
(20, 'CASIO EFV-550L-1AVUDF', 'Mẫu Casio EFV-550L-1AVUDF mang đến cho phái mạnh vẻ ngoài lịch lãm nhưng cũng không kém phần trẻ trung đặc trưng thuộc dòng Edifice với kiểu dáng đồng hồ 6 kim đi kèm tính năng đo thời gian Chronograph.', 'dh15.webp', '1350000.00', 50, 3, 0),
(21, 'CASIO MTP-V004G-7BUDF', 'Đồng hồ Casio MTP-V004G-7BUDF có vỏ và dây đeo kim loại mạ vàng, nền số màu trắng sang trọng cùng kim chỉ được làm mỏng lịch lãm, chữ số giờ được phủ đen nổi bật.', 'dh16.webp', '1300000.00', 50, 3, 0),
(22, 'CASIO MTP-1303SG-7AVDF', 'Đồng hồ Casio MTP-1303SG-7AVDF có mặt số tròn lớn, niềng kim loại mạ bạc tinh tế bao quanh nền số màu xám sang trọng, kim chỉ và vạch số mạ vàng có phản quang nổi bật.', 'dh17.webp', '1800000.00', 50, 3, 0),
(23, 'CASIO EDIFICE EFV-540D', 'Mẫu đồng hồ EFV-540D-2AVUDF thuộc dòng Edifice đến từ thương hiệu Casio với kiểu dáng 6 kim kèm theo tính năng Chronograph tạo nên vẻ ngoài nam tính thời trang với nền mặt số xanh nổi bật.', 'dh18.webp', '3500000.00', 50, 3, 0),
(25, 'CASIO EFV-540D-1AVUDF', 'Mẫu Casio EFV-540D-1AVUDF kiểu dáng 6 kim kẻm theo 3 núm vặn bên hông với vẻ ngoài đặc trưng thuộc dòng Edifice mang trên mình phong cách thể thao đầy lịch lãm cho các phái mạnh cùng khả năng chịu nước 10ATM.', 'dh19.webp', '3500000.00', 50, 3, 0),
(27, 'SEIKO SUR377P1', 'Mẫu Seiko SUR377P1 điểm nổi bật với thiết kế dây vỏ kim loại chất liệu bằng Titanium tạo cảm giác nhẹ tay cho người đeo, các chi tiết kim chỉ cùng cọc vạch số được mạ vàng.', 'dh21.webp', '9200000.00', 50, 2, 0),
(28, 'SEIKO PRESAGE SRPE41J1', 'Mẫu Seiko SRPE41J1 phiên bản dây da trơn nâu thời trang thiết kế đơn giản chức năng 3 kim cùng các cọc vạch số mạ bạc nổi bật trên nền mặt số kích thước 38.5mm.', 'dh22.webp', '1200000.00', 50, 2, 0),
(29, 'SEIKO PRESAGE SSA445J1', 'Mẫu Seiko SSA445J1 phiên bản giới hạn chỉ 4000 chiếc trên toàn thế giới, thiết kế open heart (máy cơ lộ tim) tạo nên vẻ độc đáo trên nền mặt số xanh kích thước 40.8mm.', 'dh23.webp', '1600000.00', 50, 2, 0),
(30, 'SEIKO SUR421P1', 'Mẫu Seiko SUR421P1 phiên bản dây da tạo hình vân vẻ ngoài lịch lãm không kém phần trẻ trung cùng với thiết kế chi tiết cọc vạch số tạo hình lưỡi kiếm trên nền mặt số size 39mm.', 'dh24.webp', '3500000.00', 50, 2, 0),
(31, 'SEIKO SUP370P1', 'Vẻ đẹp thanh lịch đến từ mẫu dây da nâu có vân ẩn chứa với vẻ ngoài giản dị của chiếc đồng hồ Seiko SUP370P1 nhưng lại mang trên mình một vẻ đẹp hiện đại dành cho phái đẹp được trang bị công nghệ Solar (Năng Lượng Ánh Sáng).', 'dh25.webp', '4350000.00', 50, 2, 0),
(32, 'SKAGEN SKW2509', 'Mẫu đồng hồ SKW2509 thiết kế mang đậm phong cách đặc trưng đến từ thương hiệu Skagen với vẻ ngoài đầy cuốn hút mọi ánh nhìn dành cho phái đẹp với tổng thể được bao phủ tông màu vàng nổi bật.', 'dh26.webp', '5300000.00', 50, 4, 0),
(33, 'SKAGEN SKW6453', 'Nam tính đi kèm phong cách giản dị trẻ trung đặc trưng đến từ thương hiệu Skagen với mẫu SKW6453 đồng hồ 3 kim, điểm nhấn tạo nên vẻ thời trang nổi bật với mẫu dây vải được tạo hình hoa văn.', 'dh27.webp', '4600000.00', 50, 4, 0),
(34, 'SKAGEN SKW2307', 'Đồng hồ Skagen SKW2307 có mặt số tròn truyền thống với viền được làm mỏng tinh tế, nền số màu xanh tinh khiết, kim chỉ được phủ bạc và vạch số được đính pha lê sang trọng nổi bật, dây đeo kim loại dạng lưới thời trang.', 'dh28.webp', '950000.00', 50, 4, 0),
(35, 'SKAGEN SKW2475', 'Đồng hồ nữ Skagen SKW2475 theo xu hướng giản dị dành cho nữ, kim chỉ cùng với viền ngoài mạ đồng sang trọng trên nền mặt số đen huyền ảo, phối cùng với dây đeo bằng da màu đen tạo nên vẻ đẹp thời trang trẻ trung cho phái nữ.', 'dh29.webp', '3950000.00', 50, 4, 0),
(36, 'SKAGEN SKW6352 DÂY DA', 'dh', 'dh30.webp', '950000.00', 50, 4, 0),
(37, 'FOSSIL HARRY POTTER Y', 'dh', 'lm1.webp', '1750000.00', 50, 5, 0),
(39, 'FOSSIL HARRY POTTER W', 'Mẫu Fossil LE1160 phiên bản giới hạn dành tặng các fan chân chính nhà Ravenclaw với mẫu đeo chất liệu bằng dây vải thời trang, tông xanh dương đậm chất Hogwarts, kết hợp cùng vỏ máy kim loại mạ bạc thiết kế phay xước đầy tinh tế.', 'lm3.webp', '1750000.00', 50, 5, 0),
(40, 'FOSSIL HARRY POTTER G', 'Mẫu Fossil LE1161 phiên bản giới hạn dành tặng các fan chân chính nhà Slytherin với mẫu đeo chất liệu bằng dây vải thời trang, tông xanh lá đậm chất Hogwarts, kết hợp cùng vỏ máy kim loại mạ tone bạc phay xước đầy tinh tế.', 'lm4.webp', '1750000.00', 50, 5, 0);

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
(9, 'hoang1', 'hoang1', 'hodanghoang@gmail.com', 1, 0),
(10, 'minhson2', '123', 'son@gmail.com', 0, 0),
(11, 'sonw', '123', 'son@gmail.com', 0, 0),
(12, 'son2321', '123', 'son@gmail.com', 0, 0),
(13, 'son23213', '123', 'son@gmail.com', 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
