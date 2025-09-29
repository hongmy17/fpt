CREATE TABLE `khachhang`(
	`maKH` INT(5) NOT NULL,
	`tenKH` VARCHAR(50),
	`diaChi` VARCHAR(255),
	`Email` VARCHAR(50),
	PRIMARY KEY (`maKH`)
);

CREATE TABLE `sanpham`(
	`maSP` INT(5) NOT NULL,
	`tenSP` VARCHAR(50),
	`soLuong` INT(5),
	`ngayBan` DATE,
	`maKH` INT(5) NOT NULL,
	PRIMARY KEY (`maSP`),
	CONSTRAINT `FK_sanpham_khachhang` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`)
);

CREATE TABLE `hoadon`(
	`maHD` INT(5) NOT NULL,
	`maKH` INT(5) NOT NULL,
	`maSP` INT(5) NOT NULL,
	`ngayXuat` DATE,
	PRIMARY KEY (`maHD`),
	CONSTRAINT `FK_hoadon_khachhang` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`),
	CONSTRAINT `FK_hoadon_sanham` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`)
);