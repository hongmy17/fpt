-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 04:23 AM
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
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `mhsv`
--

CREATE TABLE `mhsv` (
  `ID` int(11) NOT NULL,
  `Diem` double DEFAULT NULL,
  `MaSV` varchar(4) DEFAULT NULL,
  `MaMonHoc` varchar(4) DEFAULT NULL
) ;

--
-- Dumping data for table `mhsv`
--

INSERT INTO `mhsv` (`ID`, `Diem`, `MaSV`, `MaMonHoc`) VALUES
(4, 9.1, 'SV02', 'MH01'),
(5, 9.2, 'SV02', 'MH02'),
(6, 9.8, 'SV02', 'MH03'),
(8, 6, NULL, 'MH01'),
(9, 6, NULL, 'MH01'),
(10, 8.1, NULL, 'MH03'),
(11, 7.8, 'SV04', 'MH01'),
(12, 6.8, 'SV04', 'MH02'),
(13, 8.2, 'SV04', 'MH03'),
(14, 7.7, NULL, 'MH01'),
(15, 6.8, NULL, 'MH02'),
(16, 8.2, NULL, 'MH03');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMonHoc` varchar(4) NOT NULL,
  `TenMonHoc` varchar(50) DEFAULT NULL,
  `MoTaMonHoc` varchar(255) DEFAULT NULL,
  `PhongHoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`MaMonHoc`, `TenMonHoc`, `MoTaMonHoc`, `PhongHoc`) VALUES
('MH01', 'Lap trinh javascript', 'La ngon ngu...', 201),
('MH02', 'Lap trinh C', 'La ngon ngu...', 202),
('MH03', 'Lab trinh Java', 'La ngon ngu...', 101),
('MH04', 'HMTL & CSS', 'La ngon ngu...', 201),
('MH05', 'Lap trinh PyThon', 'La ngon ngu...', 201);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` varchar(4) NOT NULL,
  `TenSV` varchar(50) DEFAULT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `QueQuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `TenSV`, `GioiTinh`, `NgaySinh`, `QueQuan`) VALUES
('SV01', 'Tran Van Hoai', 'Nam', '2001-09-29', 'Ninh Kieu, TP. Can Tho'),
('SV02', 'Nguyen Van Lam', 'Nam', '2000-02-09', 'Thot Not, TP. Can Tho'),
('SV04', 'Le Thi Huyen', 'Nu', '2001-11-29', 'Ninh Kieu, TP. Can Tho');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mhsv`
--
ALTER TABLE `mhsv`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaSV` (`MaSV`),
  ADD KEY `mhsv_ibfk_2` (`MaMonHoc`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mhsv`
--
ALTER TABLE `mhsv`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mhsv`
--
ALTER TABLE `mhsv`
  ADD CONSTRAINT `mhsv_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`) ON DELETE SET NULL,
  ADD CONSTRAINT `mhsv_ibfk_2` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
