DROP TABLE `NhanVien`;
CREATE TABLE `NhanVien`(
	`maNV` INT(5) NOT NULL,
	`tenNV` VARCHAR(50),
	`sdtNV` INT(10),
	`dcNV` VARCHAR(50),
	`maPB` INT(5) NOT NULL,
	PRIMARY KEY (`maNV`)
);

DROP TABLE PhongBan;
CREATE TABLE PhongBan(
	maPB INT(5) NOT NULL,
	tenPb VARCHAR(50),
	maTruongPhong INT(5) NOT NULL,
	PRIMARY KEY (`maPB`)
);

DROP TABLE duan;
CREATE TABLE duan(
	maDA INT(5) NOT NULL,
	tenDA VARCHAR(50),
	ngayBatDau DATE,
	ngayKetThuc DATE,
	PRIMARY KEY (`maDA`)
);

DROP TABLE quanlyDA;
CREATE TABLE quanlyDA(
	maDA INT(5) NOT NULL,
	maNV INT(5) NOT NULL,
	ngayThamGia DATE,
	ngayKetThuc DATE,
	soGio INT(5),
	vaiTro VARCHAR(50),
	PRIMARY KEY (maDA, `maNV`)
);