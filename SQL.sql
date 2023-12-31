CREATE DATABASE van_quyet_mobile;
USE van_quyet_mobile;

CREATE TABLE danh_muc (
	danh_muc_id INT(11) AUTO_INCREMENT PRIMARY KEY,
	ten_danh_muc VARCHAR(50) NOT NULL,
  hinh VARCHAR(255) NOT NULL
);

CREATE TABLE san_pham (
  san_pham_id INT(11) AUTO_INCREMENT PRIMARY KEY,
  ten_san_pham VARCHAR(50) NOT NULL,
  gia INT NOT NULL,
  hinh VARCHAR(255) NOT NULL,
  ngay_nhap DATE,
  mo_ta TEXT,
  so_luot_xem INT(11) DEFAULT 0,
  danh_muc_id INT(11) NOT NULL,
  FOREIGN KEY (danh_muc_id) REFERENCES danh_muc(danh_muc_id)
);

CREATE TABLE tai_khoan (
  tai_khoan_id INT(11) AUTO_INCREMENT PRIMARY KEY,
  ho_va_ten VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  mat_khau VARCHAR(50) NOT NULL,
  dia_chi VARCHAR(255),
  so_dien_thoai VARCHAR(20) NOT NULL,
  gioi_tinh TINYINT(1) NOT NULL,
  hinh VARCHAR(255),
  vai_tro TINYINT(1) DEFAULT 0
);

CREATE TABLE slides (
    slides_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    img VARCHAR(255) NOT NULL,
    trang_thai TINYINT(1) DEFAULT 1,
    san_pham_id INT(11) NOT NULL,
    FOREIGN KEY (san_pham_id) REFERENCES san_pham(san_pham_id)
)


CREATE TABLE binh_luan (
  binh_luan_id INT(11) AUTO_INCREMENT PRIMARY KEY,
  noi_dung VARCHAR(255) NOT NULL,
  tai_khoan_id INT(11) NOT NULL,
  san_pham_id INT(11) NOT NULL,
  ngay_binh_luan DATETIME,
  FOREIGN KEY (tai_khoan_id) REFERENCES tai_khoan(tai_khoan_id),
  FOREIGN KEY (san_pham_id) REFERENCES san_pham(san_pham_id)
);

CREATE TABLE don_hang (
  don_hang_id INT(11) PRIMARY KEY AUTO_INCREMENT,
  tai_khoan_id INT(11) NOT NULL,
  ho_va_ten VARCHAR(50) NOT NULL,
  dia_chi VARCHAR(255),
  so_dien_thoai VARCHAR(20) NOT NULL,
  email VARCHAR(255) NOT NULL,
  ngay_dat DATE,
  tong_tien INT,
  phuong_thuc_thanh_toan TINYINT(1) DEFAULT 1,
  trang_thai TINYINT(1) DEFAULT 1,
  FOREIGN KEY (tai_khoan_id) REFERENCES tai_khoan(tai_khoan_id)
);

CREATE TABLE chi_tiet_don_hang (
  chi_tiet_don_hang_id INT(11) PRIMARY KEY AUTO_INCREMENT,
  don_hang_id INT(11) NOT NULL,
  san_pham_id INT(11) NOT NULL,
  so_luong INT NOT NULL,
  gia INT NOT NULL,
  tong_tien INT,
  FOREIGN KEY (don_hang_id) REFERENCES don_hang(don_hang_id),
  FOREIGN KEY (san_pham_id) REFERENCES san_pham(san_pham_id)
);

CREATE TABLE gio_hang (
  gio_hang_id INT(11) PRIMARY KEY AUTO_INCREMENT,
  tai_khoan_id INT(11) NOT NULL,
  san_pham_id INT(11) NOT NULL,
  so_luong INT NOT NULL,
  FOREIGN KEY (tai_khoan_id) REFERENCES tai_khoan(tai_khoan_id),
  FOREIGN KEY (san_pham_id) REFERENCES san_pham(san_pham_id)
);


