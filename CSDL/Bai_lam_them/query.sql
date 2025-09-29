-- 1
SELECT tenSP FROM sanpham
WHERE soLuong > 3;

-- 2
SELECT tenSP, maSP FROM sanpham
WHERE moTa = 'mo ta 1';

-- 3
SELECT tenSP, maSP FROM sanpham
WHERE donGia > 500000;

-- 4
SELECT maKhachHang FROM hoadon
WHERE trangThai = 'chua thanh toan';

-- 5
SELECT maKhachHang FROM hoadon
WHERE ngayMuaHang = '2023-01-23';

-- 6
SELECT * FROM hoadonchitiet
WHERE soLuong > 5;