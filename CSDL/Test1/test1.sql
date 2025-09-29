-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 07:14 AM
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
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `IDHD` int(11) NOT NULL,
  `IDKH` int(11) DEFAULT NULL,
  `IDSP` int(11) DEFAULT NULL,
  `NgayMua` date DEFAULT NULL,
  `GiaBan` double DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`IDHD`, `IDKH`, `IDSP`, `NgayMua`, `GiaBan`, `SoLuong`) VALUES
(1, 1, 1, '2020-12-12', 25000, 300),
(2, 2, 2, '2021-10-12', 350000, 50),
(3, 3, 3, '2019-12-10', 250000, 100),
(4, 4, 4, '2020-09-12', 300000, 120),
(5, 5, 5, '2020-12-12', 30000, 340);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `IDKH` int(11) NOT NULL,
  `HoLotKH` varchar(20) DEFAULT NULL,
  `TenKH` varchar(10) DEFAULT NULL,
  `GioTinh` varchar(5) DEFAULT NULL,
  `DienThoai` int(11) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`IDKH`, `HoLotKH`, `TenKH`, `GioTinh`, `DienThoai`, `DiaChi`) VALUES
(1, 'Nguyen Van', 'A', 'Nam', 111111111, 'AG'),
(2, 'Nguyen Van', 'B', 'Nam', 222222222, 'CT'),
(3, 'Nguyen Van', 'C', 'Nam', 333333333, 'DT'),
(4, 'Nguyen Van', 'D', 'Nam', 444444444, 'CM'),
(5, 'Nguyen Van', 'E', 'Nam', 555555555, 'KG');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSP` int(11) NOT NULL,
  `TenSP` varchar(30) DEFAULT NULL,
  `NhomSP` varchar(10) DEFAULT NULL,
  `GiaBan` double DEFAULT NULL
) ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`IDSP`, `TenSP`, `NhomSP`, `GiaBan`) VALUES
(1, 'SP1', 'Nhom1', 25000),
(2, 'SP2', 'Nhom2', 350000),
(3, 'SP3', 'Nhom3', 250000),
(4, 'SP4', 'Nhom4', 300000),
(5, 'SP5', 'Nhom5', 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IDHD`),
  ADD KEY `FK_hoadon_khachhang` (`IDKH`),
  ADD KEY `FK_hoadon_sanpham` (`IDSP`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`IDKH`),
  ADD UNIQUE KEY `DienThoai` (`DienThoai`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSP`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_hoadon_khachhang` FOREIGN KEY (`IDKH`) REFERENCES `khachhang` (`IDKH`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_hoadon_sanpham` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`IDSP`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
