-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2023 at 01:55 PM
-- Server version: 8.0.33
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc05353`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pd_id` int NOT NULL,
  `us_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `note` text,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `note`, `create_at`, `update_at`) VALUES
(7, 'Pizza Margherita', ' Một loại pizza Ý cổ điển với bánh mỏng, được phủ sốt cà chua, phô mai mozzarella tươi, lá húng quế và một ít dầu ô liu.', '2023-07-29 20:32:20', '2023-07-29 20:32:20'),
(8, 'Pizza Pepperon', 'Món pizza phổ biến với lớp sốt cà chua, phô mai và lát xúc xích pepperoni cay.', '2023-07-29 20:32:45', '2023-07-29 20:32:45'),
(9, 'Pizza Tổng Hợp', 'Một món pizza tuyệt vời với sự kết hợp của nhiều loại topping như xúc xích, thịt xông khói, hành tây, ớt chuông, hành tây đỏ, cà chua và nấm.', '2023-07-29 20:33:32', '2023-07-29 20:39:26'),
(11, 'Pizza Chay', 'Lựa chọn hoàn hảo cho người ăn chay, với sốt cà chua, phô mai và nhiều loại rau củ như hành tây, cà chua, nấm, ớt và dứa.', '2023-07-29 20:37:09', '2023-07-29 20:37:09'),
(12, 'Pizza BBQ Gà', 'Món pizza có lớp sốt BBQ, gà nướng, hành tây đỏ và phô mai.', '2023-07-29 20:37:23', '2023-07-29 20:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pd_id` int NOT NULL,
  `pd_name` varchar(50) DEFAULT NULL,
  `pd_desc` text,
  `pd_price` int DEFAULT NULL,
  `pd_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pd_id`, `pd_name`, `pd_desc`, `pd_price`, `pd_img`) VALUES
(1, 'Pizza Hải Sản Tươi Ngon', 'Một món pizza hấp dẫn với lớp nền bánh mỏng mịn, được phủ lên với sốt cà chua thơm ngon, phô mai sữa béo béo và đặc biệt là các loại hải sản tươi ngon như tôm, mực, cua, và cá hồi tươi ngon, tạo nên một món ăn đậm đà hương vị biển cả.', 180000, 'images/64c484005aaf2_gallery-img1.jpg'),
(2, 'Pizza Bò Úc Steakhouse', 'Một sự kết hợp hài hòa giữa ẩm thực Úc và hương vị pizza truyền thống. Bánh pizza bông mềm, phủ đều sốt cà chua thơm lừng, phô mai Mozzarella và phô mai Blue.', 210000, 'images/64c4840bd4b78_gallery-img2.jpg'),
(3, 'Pizza Chay Tươi Sống', 'Dành cho những ai yêu thích ẩm thực chay hoặc muốn thưởng thức món ăn dễ tiêu hóa. Bánh pizza được làm từ bột mỏng, phủ lên sốt cà chua đậm đà cùng hương vị thảo mộc tự nhiên.', 150000, 'images/64c4841973606_gallery-img3.jpg'),
(4, 'Pizza Ý Truyền Thống', 'Một món pizza mang đậm hương vị truyền thống của ẩm thực Ý. Bánh pizza với lớp vỏ mỏng và giòn, được phủ đều sốt cà chua tự nhiên và hỗn hợp gia vị thơm ngon. ', 160000, 'images/64c48423d5c57_gallery-img4.jpg'),
(5, ' Pizza Nấm Tươi Sống', 'Món pizza dành cho những tín đồ yêu thích nấm và hương vị tự nhiên. Bánh pizza với lớp vỏ mỏng mịn, được phủ sốt cà chua tươi thơm lừng.', 170000, 'images/64c4844e67c08_gallery-img5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `us_id` int NOT NULL,
  `us_name` varchar(50) DEFAULT NULL,
  `us_email` varchar(50) DEFAULT NULL,
  `us_phone` int DEFAULT NULL,
  `us_password` varchar(20) DEFAULT '12345678',
  `is_admin` int DEFAULT NULL,
  `us_avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`us_id`, `us_name`, `us_email`, `us_phone`, `us_password`, `is_admin`, `us_avatar`) VALUES
(230, 'Nguyen Van A', 'anv@gmail.com', 812345678, '12345678', 1, NULL),
(232, 'Nguyen Van B', 'bnv@gmail.com', 824998626, '12345678', 0, NULL),
(234, 'Nguyen Van D', 'dnv@gmail.com', 823123412, '12345678', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`pd_id`,`us_id`),
  ADD KEY `cart_users_id` (`us_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pd_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `us_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_products_id` FOREIGN KEY (`pd_id`) REFERENCES `products` (`pd_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_users_id` FOREIGN KEY (`us_id`) REFERENCES `users` (`us_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
