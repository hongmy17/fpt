-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2023 at 04:05 PM
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
(7, 'Nguyen Van G', 'gnv@gmail.com', 123456789, '12345678'),
(9, 'Nguyen Van H', 'hnv@gmail.com', 123456789, '12345678'),
(10, 'Nguyen Van K', 'knv@gmail.com', 123456789, '12345678'),
(11, 'Nguyen Van L', 'lnv@gmail.com', 123456789, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int NOT NULL,
  `pd_name` varchar(20) DEFAULT NULL,
  `pd_desc` varchar(255) DEFAULT NULL,
  `pd_price` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `pd_name`, `pd_desc`, `pd_price`) VALUES
(1, 'Curabitur', 'Cras in ante mattis, elementum nunc', 100),
(2, 'Lorem ipsum', 'In ullamcorper gravida enim id pulvinar', 70),
(3, 'Pellentesque', 'Maecenas efficitur nisi id sapien', 80),
(4, 'Suspendisse', 'Mauris sit amet augue sit amet risus', 40),
(5, 'Elementum', 'Maecenas efficitur nisi id sapien', 60);

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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cs_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `pc_id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
