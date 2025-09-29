-- Y4
CREATE DATABASE asm;
USE asm;

CREATE TABLE sach (
	maSach INT PRIMARY KEY,
	tieuDe VARCHAR(20),
	nhaXuatBan VARCHAR(20),
	soTrang INT,
	soLuongBanSao INT,
	giaTien DOUBLE,
	ngayNhapKho DATE,
	viTriDatSach VARCHAR(20)
	CHECK (soTrang >= 0 AND soLuongBanSao >= 0 AND giaTien >= 0)
);

CREATE TABLE tacgia (
	maSach INT PRIMARY KEY,
	tenTacGia VARCHAR(20)
);

CREATE TABLE loaiSach (
	maSach INT PRIMARY KEY,
	tenLoai VARCHAR(20)
);

CREATE TABLE sinhvien (
	maSV INT PRIMARY KEY,
	tenSV VARCHAR(20),
	chuyenNganhHoc VARCHAR(20)
);

CREATE TABLE thesinhvien (
	maSv INT PRIMARY KEY,
	ngayHetHan DATE
);

CREATE TABLE lienhe (
	maSV INT PRIMARY KEY,
	email VARCHAR(20),
	soDienThoai INT
);

CREATE TABLE phieumuonsach (
	soPhieu INT PRIMARY KEY,
	ngayMuon DATE,
	maSV INT
);

CREATE TABLE chitietphieumuon (
	soPhieu INT,
	maSach INT,
	ghiChu VARCHAR(255),
	ngayTra DATE,
	PRIMARY KEY (soPhieu, maSach)
);

ALTER TABLE tacgia
ADD FOREIGN KEY (maSach) REFERENCES sach (maSach);

ALTER TABLE loaisach
ADD FOREIGN KEY (maSach) REFERENCES sach (maSach);

ALTER TABLE thesinhvien
ADD FOREIGN KEY (maSV) REFERENCES sinhvien (maSV);

ALTER TABLE lienhe
ADD FOREIGN KEY (maSV) REFERENCES sinhvien (maSV);

ALTER TABLE phieumuonsach
ADD FOREIGN KEY (maSV) REFERENCES sinhvien (maSV);

ALTER TABLE chitietphieumuon
ADD FOREIGN KEY (soPhieu) REFERENCES phieumuonsach (soPhieu),
ADD FOREIGN KEY (maSach) REFERENCES sach (maSach);

-- Y5
INSERT INTO sach VALUES
	(1, 'Clean Code', 'NXB1', 462, 150, 150000, '2013-12-04', 'VT1'),
	(2, 'SQL Cook Book', 'NXB2', 572, 40, 100000, '2015-04-02', 'VT2'),
    (3, 'Code Complete 2', 'NXB3', 912, 150, 150000, '2014-02-03', 'VT3'),
    (4, 'Learn SQL', 'NXB4', 377, 30, 150000, '2014-01-02', 'VT4'),
    (5, 'The Clean Coder', 'NXB5', 244, 100, 100000, '2016-04-02', 'VT5'),
	(6, 'Chí Phèo', 'NXB6', 200, 70, 70000, '2014-04-02', 'VT6'),
    (7, 'Luật Du Lịch', 'NXB7', 150, 50, 50000, '2015-02-02', 'VT7');

INSERT INTO tacgia VALUES
	(1, 'Robert C. Martin'),
    (2, 'Anthony Molinaro, Robert de Greaf'),
    (3, 'Steve McConnell'),
    (4, 'Alan Beaulieu'),
    (5, 'Robert C. Martin'),
	(6, 'Nam Cao'),
    (7, '');

INSERT INTO loaisach VALUES
	(1, 'IT'),
    (2, 'IT'),
    (3, 'IT'),
    (4, 'IT'),
    (5, 'IT'),
	(6, 'Văn học'),
    (7, 'Du lịch');

INSERT INTO sinhvien VALUES 
	(001, 'Nguyen Van A', 'IT'),
    (002, 'Nguyen Van B', 'IT'),
    (003, 'Nguyen Van C', 'IT'),
    (004, 'Nguyen Van D', 'IT'),
    (005, 'Nguyen Van E', 'IT');

INSERT INTO thesinhvien VALUES
	(001, '2025-02-03'),
    (002, '2023-05-06'),
    (003, '2024-06-23'),
    (004, '2024-08-24'),
    (005, '2023-09-21');

INSERT INTO lienhe VALUES 
	(001, 'anv1@gmail.com, anv2@gmail.com', 1234567890),
    (002, 'bnv@gmail.com', 2151511112),
    (003, 'cnv@gmail.com', 5162782673),
    (004, 'dnv@gmail.com', 9706483741),
    (005, 'env@gmail.com', 7585445458);

INSERT INTO phieumuonsach VALUES
	(1, '2016-02-04', 002),
    (2, '2017-01-01', 001),
    (3, '2015-10-11', 002),
    (4, '2014-12-13', 005),
    (5, '2015-03-21', 003);

INSERT INTO chitietphieumuon VALUES
	(1, 1, 'ghi chu 1', '2016-02-08'),
    (2, 1, 'ghi chu 2', '2017-01-06'),
    (2, 2, 'ghi chu 3', '2017-01-06'),
    (2, 4, 'ghi chu 4', '2017-01-06'),
    (3, 1, 'ghi chu 5', '2015-10-15'),
    (3, 4, 'ghi chu 6', '2015-10-15'),
    (4, 1, 'ghi chu 7', '2014-12-17'),
    (5, 2, 'ghi chu 8', '2015-03-25');

-- Y6
-- 1
SELECT sach.maSach, sach.tieuDe, 
sach.giaTien, tacgia.tenTacGia, loaisach.tenLoai FROM sach
JOIN loaisach ON loaisach.maSach = sach.maSach
JOIN tacgia ON tacgia.maSach = sach.maSach
WHERE loaisach.tenLoai = 'IT';

-- 2
SELECT phieumuonsach.*, chitietphieumuon.maSach
FROM phieumuonsach
JOIN chitietphieumuon
ON chitietphieumuon.soPhieu = phieumuonsach.soPhieu
WHERE phieumuonsach.ngayMuon LIKE '2017-01%';

-- 4
SELECT tenLoai, COUNT(tenLoai) AS 'So Luong'
FROM loaisach
GROUP BY tenLoai;

-- 5
SELECT COUNT(soPhieu) AS 'Luot moun sach' FROM chitietphieumuon;

-- 6
SELECT * FROM sach
WHERE tieuDe LIKE '%SQL%';

-- 7
SELECT sinhvien.maSV, sinhvien.tenSV, 
phieumuonsach.soPhieu, sach.tieuDe,
phieumuonsach.ngayMuon, chitietphieumuon.ngayTra
FROM sinhvien
JOIN phieumuonsach ON phieumuonsach.maSV = sinhvien.maSV
JOIN chitietphieumuon ON chitietphieumuon.soPhieu = phieumuonsach.soPhieu
JOIN sach ON sach.maSach = chitietphieumuon.maSach
ORDER BY phieumuonsach.ngayMuon;

-- 8
SELECT sach.*, tacgia.tenTacGia, loaisach.tenLoai
FROM sach
JOIN tacgia ON tacgia.maSach = sach.maSach
JOIN loaisach ON loaisach.maSach = sach.maSach
JOIN chitietphieumuon ON chitietphieumuon.maSach = sach.maSach
GROUP BY chitietphieumuon.maSach
HAVING COUNT(chitietphieumuon.maSach) > 20;

-- 9
UPDATE sach
SET giaTien = giaTien * 70 / 100
WHERE ngayNhapKho < '2014-01-01';

-- 12
UPDATE sach
SET soLuongBanSao = soLuongBanSao + 5
WHERE maSach IN (
	SELECT sach.maSach FROM sach
    JOIN tacgia ON tacgia.maSach = sach.maSach
    JOIN loaisach ON loaisach.maSach = sach.maSach
    JOIN chitietphieumuon ON chitietphieumuon.maSach = sach.maSach
    GROUP BY chitietphieumuon.maSach
    HAVING COUNT(chitietphieumuon.maSach) > 10
);

-- 13
DELETE FROM phieumuonsach
WHERE soPhieu IN (
	SELECT phieumuonsach.soPhieu FROM phieumuonsach
    JOIN chitietphieumuon 
	ON chitietphieumuon.soPhieu = phieumuonsach.soPhieu
    WHERE phieumuonsach.ngayMuon < '2010-01-01' 
    AND chitietphieumuon.ngayTra < '2010-01-01'
);