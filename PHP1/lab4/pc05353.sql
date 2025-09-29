-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2023 at 01:08 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ad_id` int NOT NULL,
  `ad_name` varchar(20) DEFAULT NULL,
  `ad_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ad_id`, `ad_name`, `ad_password`) VALUES
(1, 'admin1234', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cs_id` int NOT NULL,
  `cs_name` varchar(50) DEFAULT NULL,
  `cs_email` varchar(50) DEFAULT NULL,
  `cs_phone` int DEFAULT NULL,
  `cs_password` varchar(20) DEFAULT '12345678'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cs_id`, `cs_name`, `cs_email`, `cs_phone`, `cs_password`) VALUES
(202, 'Nguyen Van B', 'bnv@gmail.com', 812345678, '12345678'),
(203, 'Nguyen Van A', 'anv@gmail.com', 812345678, '12345678'),
(205, 'Nguyen Van D', 'dnv@gmail.com', 812345678, '12345678'),
(206, 'Nguyen Van F', 'fnv@gmail.com', 812345678, '12345678'),
(212, 'Nguyen Van C', 'cnv@gmail.com', 812345678, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int NOT NULL,
  `pd_name` varchar(50) DEFAULT NULL,
  `pd_desc` varchar(255) DEFAULT NULL,
  `pd_price` int DEFAULT NULL,
  `pd_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `pd_name`, `pd_desc`, `pd_price`, `pd_img`) VALUES
(1, 'Pizza Hải Sản Tươi Ngon', 'Một món pizza hấp dẫn với lớp nền bánh mỏng mịn, được phủ lên với sốt cà chua thơm ngon, phô mai sữa béo béo và đặc biệt là các loại hải sản tươi ngon như tôm, mực, cua, và cá hồi tươi ngon, tạo nên một món ăn đậm đà hương vị biển cả.', 180000, 'http://localhost/ASM_PHP_1/frontend/product/assets/images/gallery-img1.jpg'),
(2, 'Pizza Bò Úc Steakhouse', 'Một sự kết hợp hài hòa giữa ẩm thực Úc và hương vị pizza truyền thống. Bánh pizza bông mềm, phủ đều sốt cà chua thơm lừng, phô mai Mozzarella và phô mai Blue.', 210000, 'http://localhost/ASM_PHP_1/frontend/product/assets/images/gallery-img2.jpg'),
(3, 'Pizza Chay Tươi Sống', 'Dành cho những ai yêu thích ẩm thực chay hoặc muốn thưởng thức món ăn dễ tiêu hóa. Bánh pizza được làm từ bột mỏng, phủ lên sốt cà chua đậm đà cùng hương vị thảo mộc tự nhiên.', 150000, 'http://localhost/ASM_PHP_1/frontend/product/assets/images/gallery-img3.jpg'),
(4, 'Pizza Ý Truyền Thống', 'Một món pizza mang đậm hương vị truyền thống của ẩm thực Ý. Bánh pizza với lớp vỏ mỏng và giòn, được phủ đều sốt cà chua tự nhiên và hỗn hợp gia vị thơm ngon. ', 160000, 'http://localhost/ASM_PHP_1/frontend/product/assets/images/gallery-img4.jpg'),
(5, ' Pizza Nấm Tươi Sống', 'Món pizza dành cho những tín đồ yêu thích nấm và hương vị tự nhiên. Bánh pizza với lớp vỏ mỏng mịn, được phủ sốt cà chua tươi thơm lừng.', 170000, 'http://localhost/ASM_PHP_1/frontend/product/assets/images/gallery-img5.jpg'),
(6, 'Pizza Thịt Nướng BBQ', ' Món pizza đậm đà và hấp dẫn với hương vị thịt nướng BBQ đặc trưng. Bánh pizza mỏng mịn phủ lớp sốt cà chua ngọt ngào kết hợp với sốt BBQ đậm đà. Phô mai Mozzarella béo béo được phủ đều, cùng với thịt gà nướng mềm mại và thịt bò nướng thơm lừng.', 190000, 'http://localhost/ASM_PHP_1/frontend/product/assets/images/gallery-img6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `pc_id` int NOT NULL,
  `pc_date` timestamp NULL DEFAULT NULL,
  `pc_quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`pc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ad_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cs_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `pc_id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
