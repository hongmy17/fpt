-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 06:21 AM
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
-- Database: `qlxm_linhpqpc05353`
--

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `maKH` varchar(5) NOT NULL,
  `tenKH` varchar(30) DEFAULT NULL,
  `ngaySinhKH` date DEFAULT NULL,
  `diaChiKH` varchar(50) DEFAULT NULL,
  `sdtKH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `tenKH`, `ngaySinhKH`, `diaChiKH`, `sdtKH`) VALUES
('KH001', 'Phạm Kha Nam', '1996-03-11', 'Ninh Kiều - Cần Thơ', 768880089),
('KH002', 'Mai Thiên Vân', '1998-04-28', 'U Minh Thượng - Cà Mau', 774529015),
('KH003', 'Phan Thiện Trí', '1996-09-15', 'Sa Đéc - Đồng Tháp', 942758799),
('KH004', 'Trần Văn Châu', '1996-03-11', 'U Minh Hạ - Cà Mau', 372564882),
('Kh005', 'Lê Minh Chiến', '2000-11-27', 'Ninh Kiều - Cần Thơ', 544677188);

-- --------------------------------------------------------

--
-- Table structure for table `xemay`
--

CREATE TABLE `xemay` (
  `maXM` varchar(5) NOT NULL,
  `tenXM` varchar(20) DEFAULT NULL,
  `hangSX` varchar(10) DEFAULT NULL,
  `namSX` date DEFAULT NULL,
  `dungTich` int(11) DEFAULT NULL
) ;

--
-- Dumping data for table `xemay`
--

INSERT INTO `xemay` (`maXM`, `tenXM`, `hangSX`, `namSX`, `dungTich`) VALUES
('XM001', 'Vision', 'Honda', '2020-03-04', 110),
('XM002', 'Air Blade', 'Honda', '2023-01-15', 150),
('XM003', 'Grande Hybrid', 'Yamaha', '2018-11-27', 110),
('XM004', 'StarX', 'SYM', '2017-12-12', 125),
('XM005', 'GSX-R150', 'Suzuli', '2017-11-24', 150);

-- --------------------------------------------------------

--
-- Table structure for table `xemaykhachhang`
--

CREATE TABLE `xemaykhachhang` (
  `ID` int(11) NOT NULL,
  `maKH` varchar(5) DEFAULT NULL,
  `maXM` varchar(5) DEFAULT NULL,
  `thoiGianBaoHanh` int(11) DEFAULT NULL,
  `giaTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xemaykhachhang`
--

INSERT INTO `xemaykhachhang` (`ID`, `maKH`, `maXM`, `thoiGianBaoHanh`, `giaTien`) VALUES
(1, 'KH001', 'XM002', 12, 47000000),
(2, 'KH002', 'XM004', 24, 50000000),
(3, 'KH002', 'XM003', 12, 54000000),
(4, 'KH002', 'XM003', 36, 26000000),
(5, 'KH005', 'XM001', 6, 33000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`);

--
-- Indexes for table `xemay`
--
ALTER TABLE `xemay`
  ADD PRIMARY KEY (`maXM`);

--
-- Indexes for table `xemaykhachhang`
--
ALTER TABLE `xemaykhachhang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `maKH` (`maKH`),
  ADD KEY `maXM` (`maXM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xemaykhachhang`
--
ALTER TABLE `xemaykhachhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `xemaykhachhang`
--
ALTER TABLE `xemaykhachhang`
  ADD CONSTRAINT `xemaykhachhang_ibfk_1` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`),
  ADD CONSTRAINT `xemaykhachhang_ibfk_2` FOREIGN KEY (`maXM`) REFERENCES `xemay` (`maXM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
