-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 11:07 AM
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
-- Database: `asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieumuon`
--

CREATE TABLE `chitietphieumuon` (
  `soPhieu` int(11) NOT NULL,
  `maSach` int(11) NOT NULL,
  `ghiChu` varchar(255) DEFAULT NULL,
  `ngayTra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietphieumuon`
--

INSERT INTO `chitietphieumuon` (`soPhieu`, `maSach`, `ghiChu`, `ngayTra`) VALUES
(1, 1, 'ghi chu 1', '2016-02-08'),
(2, 1, 'ghi chu 2', '2017-01-06'),
(2, 2, 'ghi chu 3', '2017-01-06'),
(2, 4, 'ghi chu 4', '2017-01-06'),
(3, 1, 'ghi chu 5', '2015-10-15'),
(3, 4, 'ghi chu 6', '2015-10-15'),
(4, 1, 'ghi chu 7', '2014-12-17'),
(5, 2, 'ghi chu 8', '2015-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `maSV` int(11) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `soDienThoai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`maSV`, `email`, `soDienThoai`) VALUES
(1, 'anv1@gmail.com, anv2', 1234567890),
(2, 'bnv@gmail.com', 2147483647),
(3, 'cnv@gmail.com', 2147483647),
(4, 'dnv@gmail.com', 2147483647),
(5, 'env@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `loaisach`
--

CREATE TABLE `loaisach` (
  `maSach` int(11) NOT NULL,
  `tenLoai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisach`
--

INSERT INTO `loaisach` (`maSach`, `tenLoai`) VALUES
(1, 'IT'),
(2, 'IT'),
(3, 'IT'),
(4, 'IT'),
(5, 'IT'),
(6, 'Văn học'),
(7, 'Du lịch');

-- --------------------------------------------------------

--
-- Table structure for table `phieumuonsach`
--

CREATE TABLE `phieumuonsach` (
  `soPhieu` int(11) NOT NULL,
  `ngayMuon` date DEFAULT NULL,
  `maSV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieumuonsach`
--

INSERT INTO `phieumuonsach` (`soPhieu`, `ngayMuon`, `maSV`) VALUES
(1, '2016-02-04', 2),
(2, '2017-01-01', 1),
(3, '2015-10-11', 2),
(4, '2014-12-13', 5),
(5, '2015-03-21', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `maSach` int(11) NOT NULL,
  `tieuDe` varchar(20) DEFAULT NULL,
  `nhaXuatBan` varchar(20) DEFAULT NULL,
  `soTrang` int(11) DEFAULT NULL,
  `soLuongBanSao` int(11) DEFAULT NULL,
  `giaTien` double DEFAULT NULL,
  `ngayNhapKho` date DEFAULT NULL,
  `viTriDatSach` varchar(20) DEFAULT NULL CHECK (`soTrang` >= 0 and `soLuongBanSao` >= 0 and `giaTien` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`maSach`, `tieuDe`, `nhaXuatBan`, `soTrang`, `soLuongBanSao`, `giaTien`, `ngayNhapKho`, `viTriDatSach`) VALUES
(1, 'Clean Code', 'NXB1', 462, 150, 150000, '2013-12-04', 'VT1'),
(2, 'SQL Cook Book', 'NXB2', 572, 40, 100000, '2015-04-02', 'VT2'),
(3, 'Code Complete 2', 'NXB3', 912, 150, 150000, '2014-02-03', 'VT3'),
(4, 'Learn SQL', 'NXB4', 377, 30, 150000, '2014-01-02', 'VT4'),
(5, 'The Clean Coder', 'NXB5', 244, 100, 100000, '2016-04-02', 'VT5'),
(6, 'Chí Phèo', 'NXB6', 200, 70, 70000, '2014-04-02', 'VT6'),
(7, 'Luật Du Lịch', 'NXB7', 150, 50, 50000, '2015-02-02', 'VT7');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `maSV` int(11) NOT NULL,
  `tenSV` varchar(20) DEFAULT NULL,
  `chuyenNganhHoc` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`maSV`, `tenSV`, `chuyenNganhHoc`) VALUES
(1, 'Nguyen Van A', 'IT'),
(2, 'Nguyen Van B', 'IT'),
(3, 'Nguyen Van C', 'IT'),
(4, 'Nguyen Van D', 'IT'),
(5, 'Nguyen Van E', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `maSach` int(11) NOT NULL,
  `tenTacGia` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`maSach`, `tenTacGia`) VALUES
(1, 'Robert C. Martin'),
(2, 'Anthony Molinaro, Ro'),
(3, 'Steve McConnell'),
(4, 'Alan Beaulieu'),
(5, 'Robert C. Martin'),
(6, 'Nam Cao'),
(7, '');

-- --------------------------------------------------------

--
-- Table structure for table `thesinhvien`
--

CREATE TABLE `thesinhvien` (
  `maSv` int(11) NOT NULL,
  `ngayHetHan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thesinhvien`
--

INSERT INTO `thesinhvien` (`maSv`, `ngayHetHan`) VALUES
(1, '2025-02-03'),
(2, '2023-05-06'),
(3, '2024-06-23'),
(4, '2024-08-24'),
(5, '2023-09-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD PRIMARY KEY (`soPhieu`,`maSach`),
  ADD KEY `maSach` (`maSach`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`maSV`);

--
-- Indexes for table `loaisach`
--
ALTER TABLE `loaisach`
  ADD PRIMARY KEY (`maSach`);

--
-- Indexes for table `phieumuonsach`
--
ALTER TABLE `phieumuonsach`
  ADD PRIMARY KEY (`soPhieu`),
  ADD KEY `maSV` (`maSV`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`maSach`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`maSV`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`maSach`);

--
-- Indexes for table `thesinhvien`
--
ALTER TABLE `thesinhvien`
  ADD PRIMARY KEY (`maSv`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD CONSTRAINT `chitietphieumuon_ibfk_1` FOREIGN KEY (`soPhieu`) REFERENCES `phieumuonsach` (`soPhieu`),
  ADD CONSTRAINT `chitietphieumuon_ibfk_2` FOREIGN KEY (`maSach`) REFERENCES `sach` (`maSach`);

--
-- Constraints for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD CONSTRAINT `lienhe_ibfk_1` FOREIGN KEY (`maSV`) REFERENCES `sinhvien` (`maSV`);

--
-- Constraints for table `loaisach`
--
ALTER TABLE `loaisach`
  ADD CONSTRAINT `loaisach_ibfk_1` FOREIGN KEY (`maSach`) REFERENCES `sach` (`maSach`);

--
-- Constraints for table `phieumuonsach`
--
ALTER TABLE `phieumuonsach`
  ADD CONSTRAINT `phieumuonsach_ibfk_1` FOREIGN KEY (`maSV`) REFERENCES `sinhvien` (`maSV`);

--
-- Constraints for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD CONSTRAINT `tacgia_ibfk_1` FOREIGN KEY (`maSach`) REFERENCES `sach` (`maSach`);

--
-- Constraints for table `thesinhvien`
--
ALTER TABLE `thesinhvien`
  ADD CONSTRAINT `thesinhvien_ibfk_1` FOREIGN KEY (`maSv`) REFERENCES `sinhvien` (`maSV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
