-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2023 at 07:36 AM
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
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `us_id` int DEFAULT NULL,
  `shipping_address` text,
  `total` bigint DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `order_id`, `us_id`, `shipping_address`, `total`, `create_at`) VALUES
(1, 3, 230, 'Toà nhà FPT Polytechnic, đường số 22, phường Thường Thạnh, quận Cái Răng, TP Cần Thơ', 590000, '2023-08-06 14:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `bill_detail_id` int NOT NULL,
  `bill_id` int DEFAULT NULL,
  `pd_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` bigint DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`bill_detail_id`, `bill_id`, `pd_id`, `quantity`, `price`, `create_at`) VALUES
(1, 1, 5, 1, 170000, '2023-08-06 14:35:01'),
(2, 1, 2, 2, 210000, '2023-08-06 14:35:01');

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `us_id` int DEFAULT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `total` decimal(10,0) DEFAULT '0',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `us_id`, `shipping_address`, `total`, `create_at`, `update_at`) VALUES
(3, 230, 'Toà nhà FPT Polytechnic, đường số 22, phường Thường Thạnh, quận Cái Răng, TP Cần Thơ', 590000, '2023-08-05 17:50:31', '2023-08-06 14:06:51'),
(4, 249, 'Số 288, Nguyễn Văn Linh, phường An Khánh, quận Ninh Kiều, Tp. Cần Thơ.', 630000, '2023-08-05 21:03:54', '2023-08-05 21:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `pd_id` int DEFAULT NULL,
  `quantity` int DEFAULT '1',
  `price` bigint DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `pd_id`, `quantity`, `price`, `create_at`, `update_at`) VALUES
(12, 4, 1, 0, 180000, '2023-08-05 21:03:54', '2023-08-05 21:03:58'),
(13, 4, 2, 3, 210000, '2023-08-05 21:03:55', '2023-08-05 21:04:00'),
(25, 3, 5, 1, 170000, '2023-08-06 14:06:43', '2023-08-06 14:06:43'),
(26, 3, 2, 2, 210000, '2023-08-06 14:06:46', '2023-08-06 14:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pd_id` int NOT NULL,
  `pd_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pd_desc` text,
  `pd_price` int DEFAULT NULL,
  `pd_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pd_id`, `pd_name`, `pd_desc`, `pd_price`, `pd_img`, `create_at`, `update_at`) VALUES
(1, 'Pizza Hải Sản Tươi Ngon', 'Một món pizza hấp dẫn với lớp nền bánh mỏng mịn, được phủ lên với sốt cà chua thơm ngon, phô mai sữa béo béo và đặc biệt là các loại hải sản tươi ngon như tôm, mực, cua, và cá hồi tươi ngon, tạo nên một món ăn đậm đà hương vị biển cả.', 180000, 'images/64c484005aaf2_gallery-img1.jpg', '2023-07-31 16:29:49', '2023-07-31 16:29:49'),
(2, 'Pizza Bò Úc Steakhouse', 'Một sự kết hợp hài hòa giữa ẩm thực Úc và hương vị pizza truyền thống. Bánh pizza bông mềm, phủ đều sốt cà chua thơm lừng, phô mai Mozzarella và phô mai Blue.', 210000, 'images/64c4840bd4b78_gallery-img2.jpg', '2023-07-31 16:29:49', '2023-07-31 16:29:49'),
(3, 'Pizza Chay Tươi Sống', 'Dành cho những ai yêu thích ẩm thực chay hoặc muốn thưởng thức món ăn dễ tiêu hóa. Bánh pizza được làm từ bột mỏng, phủ lên sốt cà chua đậm đà cùng hương vị thảo mộc tự nhiên.', 150000, 'images/64c4841973606_gallery-img3.jpg', '2023-07-31 16:29:49', '2023-07-31 16:29:49'),
(4, 'Pizza Ý Truyền Thống', 'Một món pizza mang đậm hương vị truyền thống của ẩm thực Ý. Bánh pizza với lớp vỏ mỏng và giòn, được phủ đều sốt cà chua tự nhiên và hỗn hợp gia vị thơm ngon. ', 160000, 'images/64c48423d5c57_gallery-img4.jpg', '2023-07-31 16:29:49', '2023-07-31 16:29:49'),
(5, ' Pizza Nấm Tươi Sống', 'Món pizza dành cho những tín đồ yêu thích nấm và hương vị tự nhiên. Bánh pizza với lớp vỏ mỏng mịn, được phủ sốt cà chua tươi thơm lừng.', 170000, 'images/64c4844e67c08_gallery-img5.jpg', '2023-07-31 16:29:49', '2023-07-31 16:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `us_id` int NOT NULL,
  `us_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `us_email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `us_phone` int DEFAULT NULL,
  `us_password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '12345678',
  `is_admin` int DEFAULT '0',
  `us_avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`us_id`, `us_name`, `us_email`, `us_phone`, `us_password`, `is_admin`, `us_avatar`, `create_at`, `update_at`) VALUES
(230, 'Nguyen Van A', 'phamquanglinh060221@gmail.com', 812345678, 'mysql', 1, NULL, '2023-07-31 16:28:37', '2023-08-05 08:40:57'),
(232, 'Nguyen Van B', 'bnv@gmail.com', 824998626, '12345678', 0, NULL, '2023-07-31 16:28:37', '2023-07-31 16:28:37'),
(234, 'Nguyen Van D', 'dnv@gmail.com', 823123412, '12345678', 0, NULL, '2023-07-31 16:32:34', '2023-07-31 16:33:15'),
(249, 'Nguyen Van C', 'cnv@gmail.com', 812523412, 'password', 1, 'images/64ca24fedbf74_Ảnh chụp màn hình (189).png', '2023-08-02 16:42:22', '2023-08-06 10:30:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `bills_orders_id` (`order_id`),
  ADD KEY `bills_users_id` (`us_id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`bill_detail_id`),
  ADD KEY `bill_detail_bill_id` (`bill_id`),
  ADD KEY `bill_detail_products_id` (`pd_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `oders_users_id` (`us_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_detail_orders_id` (`order_id`),
  ADD KEY `order_detail_products_id` (`pd_id`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `bill_detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pd_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `us_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_orders_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `bills_users_id` FOREIGN KEY (`us_id`) REFERENCES `users` (`us_id`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_bill_id` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`bill_id`),
  ADD CONSTRAINT `bill_detail_products_id` FOREIGN KEY (`pd_id`) REFERENCES `products` (`pd_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `oders_users_id` FOREIGN KEY (`us_id`) REFERENCES `users` (`us_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_orders_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_detail_products_id` FOREIGN KEY (`pd_id`) REFERENCES `products` (`pd_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
