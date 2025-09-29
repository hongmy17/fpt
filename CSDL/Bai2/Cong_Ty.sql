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


-- Dumping database structure for cong_ty
CREATE DATABASE IF NOT EXISTS `cong_ty` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `cong_ty`;

-- Dumping structure for table cong_ty.bds
CREATE TABLE IF NOT EXISTS `bds` (
  `Ma_So_BDS` int(11) NOT NULL,
  `Dia_Chi` varchar(50) NOT NULL DEFAULT '',
  `Ma_So_Van_Phong` int(11) NOT NULL,
  `Ma_So_Chu_So_Huu` int(11) NOT NULL,
  PRIMARY KEY (`Ma_So_BDS`),
  KEY `FK_bds_van_phong` (`Ma_So_Van_Phong`),
  KEY `FK_bds_chu_so_huu` (`Ma_So_Chu_So_Huu`),
  CONSTRAINT `FK_bds_chu_so_huu` FOREIGN KEY (`Ma_So_Chu_So_Huu`) REFERENCES `chu_so_huu` (`Ma_So_Chu_So_Huu`),
  CONSTRAINT `FK_bds_van_phong` FOREIGN KEY (`Ma_So_Van_Phong`) REFERENCES `van_phong` (`Ma_So_Van_Phong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table cong_ty.chu_so_huu
CREATE TABLE IF NOT EXISTS `chu_so_huu` (
  `Ma_So_Chu_So_Huu` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL DEFAULT '',
  `Dia_Chi` varchar(50) NOT NULL DEFAULT '',
  `So_Dien_Thoai` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Ma_So_Chu_So_Huu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table cong_ty.nguoi_than
CREATE TABLE IF NOT EXISTS `nguoi_than` (
  `Ten` varchar(50) NOT NULL,
  `Ngay_Sinh` date NOT NULL,
  `Moi_Lien_He` varchar(50) NOT NULL DEFAULT '',
  `Ma_So_Nhan_Vien` int(11) NOT NULL,
  KEY `FK_nguoi_than_nhan_vien` (`Ma_So_Nhan_Vien`),
  CONSTRAINT `FK_nguoi_than_nhan_vien` FOREIGN KEY (`Ma_So_Nhan_Vien`) REFERENCES `nhan_vien` (`Ma_So_Nhan_Vien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table cong_ty.nhan_vien
CREATE TABLE IF NOT EXISTS `nhan_vien` (
  `Ma_So_Nhan_Vien` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL DEFAULT '',
  `Ma_So_Van_Phong` int(11) NOT NULL,
  PRIMARY KEY (`Ma_So_Nhan_Vien`),
  KEY `FK_nhan_vien_van_phong` (`Ma_So_Van_Phong`),
  CONSTRAINT `FK_nhan_vien_van_phong` FOREIGN KEY (`Ma_So_Van_Phong`) REFERENCES `van_phong` (`Ma_So_Van_Phong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table cong_ty.truong_phong
CREATE TABLE IF NOT EXISTS `truong_phong` (
  `Ma_So_Van_Phong` int(11) NOT NULL,
  `Ma_So_Nhan_Vien` int(11) NOT NULL,
  PRIMARY KEY (`Ma_So_Van_Phong`),
  KEY `FK_truong_phong_nhan_vien` (`Ma_So_Nhan_Vien`),
  CONSTRAINT `FK_truong_phong_nhan_vien` FOREIGN KEY (`Ma_So_Nhan_Vien`) REFERENCES `nhan_vien` (`Ma_So_Nhan_Vien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_truong_phong_van_phong` FOREIGN KEY (`Ma_So_Van_Phong`) REFERENCES `van_phong` (`Ma_So_Van_Phong`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table cong_ty.van_phong
CREATE TABLE IF NOT EXISTS `van_phong` (
  `Ma_So_Van_Phong` int(11) NOT NULL,
  `Dia_Diem` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`Ma_So_Van_Phong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
