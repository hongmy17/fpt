-- Tạo bảng categories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    status VARCHAR(50),
    priority INT DEFAULT 0 CHECK (priority >= 0)
);

-- Chèn dữ liệu mẫu
INSERT INTO categories (name, description, status, priority) VALUES
('Điện thoại', 'Danh mục các sản phẩm điện thoại thông minh', 'active', 1),
('Laptop', 'Danh mục máy tính xách tay các loại', 'active', 2),
('Phụ kiện', 'Bao gồm ốp lưng, tai nghe, sạc,...', 'inactive', 3),
('Máy tính bảng', NULL, 'active', 2),
('Thiết bị mạng', 'Router, modem, switch,...', 'inactive', 0);
