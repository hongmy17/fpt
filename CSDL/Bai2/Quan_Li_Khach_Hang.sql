-- --------------------------------------------------------
-- Máy chủ:                      127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Phiên bản:           12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for quanlybanhang
CREATE DATABASE IF NOT EXISTS `quanlybanhang` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `quanlybanhang`;

-- Dumping structure for table quanlybanhang.hoadon
CREATE TABLE IF NOT EXISTS `hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `ngayMuaHang` date NOT NULL,
  `maKhachHang` varchar(5) NOT NULL DEFAULT '',
  `trangThai` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`maHoaDon`),
  KEY `maKhachHang` (`maKhachHang`),
  CONSTRAINT `FK_hoadon_khachhang` FOREIGN KEY (`maKhachHang`) REFERENCES `khachhang` (`maKhachHang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table quanlybanhang.hoadonchitiet
CREATE TABLE IF NOT EXISTS `hoadonchitiet` (
  `maHoaDonChiTiet` int(11) NOT NULL,
  `maHoaDon` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  PRIMARY KEY (`maHoaDonChiTiet`),
  KEY `maSanPham` (`maSanPham`),
  KEY `maHoaDon` (`maHoaDon`),
  CONSTRAINT `FK_hoadonchitiet_hoadon` FOREIGN KEY (`maHoaDon`) REFERENCES `hoadon` (`maHoaDon`),
  CONSTRAINT `FK_hoadonchitiet_sanpham` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table quanlybanhang.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `maKhachHang` varchar(5) NOT NULL DEFAULT '',
  `hoVaTenLot` varchar(50) NOT NULL DEFAULT '0',
  `Ten` varchar(50) NOT NULL DEFAULT '0',
  `diaChi` varchar(255) NOT NULL DEFAULT '',
  `Email` varchar(50) NOT NULL DEFAULT '',
  `dienThoai` varchar(13) NOT NULL DEFAULT '',
  PRIMARY KEY (`maKhachHang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table quanlybanhang.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `maSanPham` int(11) NOT NULL,
  `moTa` varchar(255) NOT NULL DEFAULT '',
  `soLuong` int(11) NOT NULL DEFAULT 0,
  `donGia` double NOT NULL DEFAULT 0,
  `tenSP` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`maSanPham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
