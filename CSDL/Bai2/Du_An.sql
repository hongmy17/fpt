CREATE TABLE `du_an` (
	`Thoi_Gian_Bat_Dau` DATE NOT NULL,
	`Thoi_Gian_Ket_Thuc` DATE NOT NULL,
	`Ten_Du_An` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Nguoi_Quan_Li_Du_An` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Loai_Du_An` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`Cong_Nghe_Su_Dung` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`Nguoi_Quan_Li_Du_An`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;
