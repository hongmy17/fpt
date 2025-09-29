-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 08:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `maHD` int(11) NOT NULL,
  `ngayMuaHang` date DEFAULT NULL,
  `trangThai` varchar(20) DEFAULT NULL,
  `maKH` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`maHD`, `ngayMuaHang`, `trangThai`, `maKH`) VALUES
(1, '2016-12-12', 'Chưa thanh toán', 'KH001'),
(2, '2016-08-20', 'Đã thanh toán', 'KH001'),
(3, '2017-10-02', 'Chưa thanh toán', 'KH001'),
(4, '2019-07-06', 'Đã thanh toán', 'KH002'),
(5, '2016-12-13', 'Chưa thanh toán', 'KH003'),
(6, '2015-08-21', 'Đã thanh toán', 'KH001'),
(7, '2016-04-05', 'Chưa thanh toán', 'KH010'),
(8, '2016-04-05', 'Đã thanh toán', 'KH007'),
(9, '2016-04-05', 'Chưa thanh toán', 'KH005'),
(10, '2016-04-05', 'Đã thanh toán', 'KH006'),
(11, '2013-10-12', 'Chưa thanh toán', 'KH011'),
(12, '2016-08-12', 'Đã thanh toán', 'KH012'),
(13, '2016-12-12', 'Chưa thanh toán', 'KH001'),
(14, '2016-08-20', 'Đã thanh toán', 'KH002'),
(15, '2017-10-02', 'Chưa thanh toán', 'KH001'),
(16, '2012-07-06', 'Đã thanh toán', 'KH001'),
(17, '2016-10-13', 'Chưa thanh toán', 'KH001'),
(18, '2014-08-21', 'Đã thanh toán', 'KH001'),
(19, '2016-04-05', 'Chưa thanh toán', 'KH010'),
(20, '2013-04-05', 'Đã thanh toán', 'KH007');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `maHDCT` int(11) NOT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `maHD` int(11) DEFAULT NULL,
  `maSP` int(11) DEFAULT NULL CHECK (`soLuong` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`maHDCT`, `soLuong`, `maHD`, `maSP`) VALUES
(1, 60, 1, 1),
(2, 120, 2, 2),
(3, 100, 3, 3),
(4, 100, 4, 4),
(5, 100, 5, 5),
(6, 60, 6, 6),
(7, 100, 7, 7),
(8, 12, 8, 8),
(9, 120, 9, 9),
(10, 60, 10, 10),
(11, 14, 11, 11),
(12, 12, 12, 12),
(13, 60, 13, 13),
(14, 120, 14, 14),
(15, 100, 15, 15),
(16, 100, 16, 16),
(17, 100, 17, 17),
(18, 60, 18, 18),
(19, 100, 19, 19),
(20, 12, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `maKH` varchar(5) NOT NULL DEFAULT '',
  `hoVaTenLot` varchar(20) DEFAULT NULL,
  `ten` varchar(10) DEFAULT NULL,
  `diachi` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `dienThoai` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `hoVaTenLot`, `ten`, `diachi`, `email`, `dienThoai`) VALUES
('KH001', 'Pham Quang', 'Linh', 'An Giang', 'linhpq@gmail.com', 123456789),
('KH002', 'Nguyen Van', 'B', 'An Giang', 'bnv@gmail.com', 132456789),
('KH003', 'Nguyen Van', 'C', 'Đà Nẵng', 'cnv@gmail.com', 142356789),
('KH004', 'Nguyen Van', 'D', 'An Giang', 'dnv@gmail.com', 152346789),
('KH005', 'Nguyen Van', 'E', 'Cần Thơ', 'env@gmail.com', 162345789),
('KH006', 'Nguyen Van', 'F', 'Cần Thơ', 'fnv@gmail.com', 172345689),
('KH007', 'Nguyen Van', 'G', 'Cần Thơ', 'gnv@gmail.com', 182345679),
('KH008', 'Nguyen Van', 'H', 'Cần Thơ', 'hnv@gmail.com', 192345678),
('KH009', 'Nguyen Van', 'K', 'Cần Thơ', 'knv@gmail.com', 124356789),
('KH010', 'Nguyen Van', 'L', 'Đà Nẵng', 'lnv@gmail.com', 125346789),
('KH011', 'Nguyen Van', 'M', 'An Giang', 'mnv@gmail.com', 126345789),
('KH012', 'Nguyen Van', 'N', 'An Giang', 'nnv@gmail.com', 127345689),
('KH013', 'Nguyen Van', 'O', 'An Giang', 'onv@gmail.com', 128345679),
('KH014', 'Nguyen Van', 'P', 'An Giang', 'pnv@gmail.com', 129345678),
('KH015', 'Nguyen Van', 'Q', 'Đà Nẵng', 'qnv@gmail.com', 123546789),
('KH016', 'Nguyen Van', 'R', 'An Giang', 'rnv@gmail.com', 123645789),
('KH017', 'Nguyen Van', 'S', 'Cần Thơ', 'snv@gmail.com', 123745689),
('KH018', 'Nguyen Van', 'T', 'Cần Thơ', 'tnv@gmail.com', 123845679),
('KH019', 'Nguyen Van', 'U', 'Cần Thơ', 'unv@gmail.com', 123945678),
('KH020', 'Nguyen Van', 'V', 'Cần Thơ', 'vnv@gmail.com', 123465789);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(11) NOT NULL,
  `moTa` varchar(10) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `donGia` int(11) DEFAULT NULL,
  `tenSP` varchar(20) DEFAULT NULL CHECK (`soLuong` >= 0 and `donGia` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `moTa`, `soLuong`, `donGia`, `tenSP`) VALUES
(1, NULL, 60, 25000, 'Iphone 7 32GB'),
(2, NULL, 120, 250000, 'Iphone 7 32GB'),
(3, NULL, 100, 225000, 'Iphone 6'),
(4, NULL, 100, 55000, 'Iphone 7 32GB'),
(5, NULL, 100, 235000, 'Iphone 7 32GB'),
(6, NULL, 60, 5000, 'Iphone 6'),
(7, NULL, 100, 25000, 'Iphone 7 32GB'),
(8, NULL, 12, 25000, 'Iphone 3'),
(9, NULL, 120, 20000, 'Iphone 6'),
(10, NULL, 60, 23000, 'Iphone 4'),
(11, NULL, 14, 24000, 'Iphone 3'),
(12, NULL, 12, 25000, 'Iphone 6'),
(13, NULL, 60, 25000, 'Iphone 7 32GB'),
(14, NULL, 120, 250000, 'Iphone 7 32GB'),
(15, NULL, 100, 225000, 'Iphone 6'),
(16, NULL, 100, 55000, 'Iphone 7 32GB'),
(17, NULL, 100, 235000, 'Iphone 7 32GB'),
(18, NULL, 60, 5000, 'Iphone 6'),
(19, NULL, 100, 25000, 'Iphone 7 32GB'),
(20, NULL, 12, 25000, 'Iphone 3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHD`),
  ADD KEY `maKH` (`maKH`);

--
-- Indexes for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`maHDCT`),
  ADD KEY `maHD` (`maHD`),
  ADD KEY `maSP` (`maSP`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dienThoai` (`dienThoai`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`);

--
-- Constraints for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`maHD`) REFERENCES `hoadon` (`maHD`),
  ADD CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
