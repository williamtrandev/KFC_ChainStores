-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 14, 2023 lúc 05:30 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kfc`
--
create database kfc;
use kfc;
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `img_path`) VALUES
(1, 'buatruavuive.jpg'),
(2, 'gahoangkim.jpg'),
(3, 'gaocque.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_chitiet` int(11) NOT NULL,
  `maDonhang` int(11) NOT NULL,
  `maMonAn` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_chitiet`, `maDonhang`, `maMonAn`, `soLuong`) VALUES
(8, 28, 1, 1),
(9, 28, 2, 1),
(10, 29, 3, 1),
(11, 29, 2, 1),
(12, 29, 1, 1),
(13, 30, 2, 1),
(14, 30, 1, 1),
(15, 31, 1, 1),
(16, 31, 4, 1),
(17, 32, 2, 2),
(18, 32, 3, 2),
(19, 32, 1, 1),
(20, 33, 4, 1),
(21, 33, 3, 1),
(22, 33, 1, 1),
(23, 33, 2, 1),
(24, 34, 11, 1),
(25, 34, 23, 1),
(26, 34, 28, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhaphang`
--

CREATE TABLE `chitietphieunhaphang` (
  `id` int(11) NOT NULL,
  `maPhieuNhap` int(11) NOT NULL,
  `maHang` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cuahang`
--

CREATE TABLE `cuahang` (
  `maCuaHang` int(11) NOT NULL,
  `tenCuaHang` text NOT NULL,
  `chiNhanh` text NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cuahang`
--

INSERT INTO `cuahang` (`maCuaHang`, `tenCuaHang`, `chiNhanh`, `deleted`) VALUES
(1, 'KFC Quận 7', 'Quận 7', 0),
(2, 'W&L Nguyễn Văn Cừ', 'Quận 2', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDonHang` int(11) NOT NULL,
  `sdtKhachHang` varchar(20) NOT NULL DEFAULT '0123456789',
  `ngayLap` datetime NOT NULL DEFAULT current_timestamp(),
  `tongTien` double NOT NULL,
  `trangThai` text NOT NULL DEFAULT 'Đang xử lý',
  `maNhanVien` int(11) NOT NULL,
  `maCuaHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`maDonHang`, `sdtKhachHang`, `ngayLap`, `tongTien`, `trangThai`, `maNhanVien`, `maCuaHang`) VALUES
(28, '0907640612', '2023-05-11 15:59:45', 123000, 'Hoàn thành', 2, 1),
(29, '0987654321', '2023-05-11 16:54:11', 210000, 'Hoàn thành', 2, 1),
(30, '0123456789', '2023-05-11 18:09:48', 123000, 'Hoàn thành', 2, 1),
(31, '0123456789', '2023-05-11 18:12:48', 132000, 'Đang xử lý', 2, 0),
(32, '0123456789', '2023-05-14 01:14:06', 375000, 'Đang xử lý', 2, 1),
(33, '0123456789', '2023-05-14 01:14:18', 297000, 'Đang xử lý', 2, 1),
(34, '0123456789', '2023-05-14 01:14:28', 185000, 'Đang xử lý', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangonline`
--

CREATE TABLE `donhangonline` (
  `id_donhangonline` int(11) NOT NULL,
  `maDonHang` int(11) NOT NULL,
  `maNhanVienGiao` int(11) DEFAULT NULL,
  `diaChiGiaoHang` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhangonline`
--

INSERT INTO `donhangonline` (`id_donhangonline`, `maDonHang`, `maNhanVienGiao`, `diaChiGiaoHang`) VALUES
(2, 29, 3, '166 Dương Bá Trạc, Quận 8.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `sdtKhachHang` int(11) NOT NULL,
  `maMonAn` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `maHang` int(11) NOT NULL,
  `tenHang` text NOT NULL,
  `donViTinh` text NOT NULL,
  `giaNhap` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`maHang`, `tenHang`, `donViTinh`, `giaNhap`) VALUES
(1, 'Thịt gà', 'Kilogram', 180000),
(2, 'Bánh mì', 'Cái', 8000),
(3, 'Khoai tây', 'Kilogram', 30000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `sdt` varchar(20) NOT NULL,
  `tenKhachHang` text NOT NULL,
  `email` text NOT NULL,
  `diaChi` text NOT NULL,
  `diem` double NOT NULL,
  `matkhau` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `maHang` int(11) NOT NULL,
  `maPhieuNhap` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `hsd` datetime NOT NULL,
  `maCuaHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimon`
--

CREATE TABLE `loaimon` (
  `id_loaimon` int(11) NOT NULL,
  `tenLoaiMon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaimon`
--

INSERT INTO `loaimon` (`id_loaimon`, `tenLoaiMon`) VALUES
(1, 'Món mới'),
(2, 'Combo 1 người'),
(3, 'Combo nhóm'),
(4, 'Gà rán - Gà quay'),
(5, 'Burger - Cơm - Mì Ý'),
(6, 'Thức ăn nhẹ'),
(7, 'Thức uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

CREATE TABLE `monan` (
  `maMonAn` int(11) NOT NULL,
  `tenMonAn` text NOT NULL,
  `mota` text NOT NULL,
  `gia` double NOT NULL,
  `image_path` text NOT NULL,
  `id_loaimon` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`maMonAn`, `tenMonAn`, `mota`, `gia`, `image_path`, `id_loaimon`, `deleted`) VALUES
(1, 'Gà Ốc Quế', '01 Gà Ốc Quế', 45000, 'gaocquemon.jpg', 1, 0),
(2, 'Gà Ốc Quế A', '01 Gà Ốc Quế + 04 Gà Miếng Nuggets', 78000, 'GaOcQue-A.jpg', 1, 0),
(3, 'Gà Ốc Quế B', '01 Gà Ốc Quế + 01 Burger', 87000, 'GaOcQue-B.jpg', 1, 0),
(4, 'Gà Ốc Quế C', '01 Gà Ốc Quế + 01 miếng Gà rán (OR/ HS/ NSC) + 02 Gà Miếng Nuggets', 87000, 'GaOcQue-C.jpg', 1, 0),
(5, 'Gà Ốc Quế D', '01 Gà Ốc Quế + 02 miếng Gà rán (OR/ HS/ NSC) + 01 Lipton R', 117000, 'GaOcQue-D.jpg', 1, 0),
(6, '1 Gà Hoàng Kim', '1 miếng Gà Hoàng Kim', 41000, 'gahoangkimmon.jpg', 1, 0),
(7, '2 Gà Hoàng Kim', '2 miếng Gà Hoàng Kim', 79000, '2-gahoangkim.jpg', 1, 0),
(8, '3 Gà Hoàng Kim', '3 miếng Gà Hoàng Kim', 117000, '3-gahoangkim.jpg', 1, 0),
(9, '6 Gà Hoàng Kim', '6 miếng Gà Hoàng Kim', 235000, '6-gahoangkim.jpg', 1, 0),
(10, '2 Bánh Khoai Tây Chiên', '2 Bánh Khoai Tây Chiên', 17000, '2-Hash-Browns.jpg', 1, 0),
(11, 'Combo Gà Rán', '2 Miếng Gà Giòn Cay / 2 Miếng Gà Giòn Không Cay / 2 Miếng Gà Truyền thống +1 Khoai tây chiên vừa / 2 Gà Miếng Nuggets + 1 Lipton vừa', 89000, 'D1-new.jpg', 2, 0),
(12, 'Combo Mì Ý', '1 Mì Ý Xốt Cà Gà Viên + 1 Miếng Gà+ 1 Lon Pepsi Can', 89000, 'D3-new.jpg', 2, 0),
(13, 'Combo Salad Hạt', '1 Miếng Gà Giòn Không Cay / 1 Miếng Gà Giòn Cay / 1 Miếng Gà Truyền Thống + 1 Salad Hạt + 1 Lon Pepsi', 79000, 'D4-new.jpg', 2, 0),
(14, 'Combo Burger', '1 Burger Zinger/Burger Gà Quay Flava/Burger Tôm + 1 Miếng Gà Rán + 1 Lon Pepsi', 91000, 'D5.jpg', 2, 0),
(15, '1 Miếng Gà Rán', '1 Miếng Gà Giòn Cay/Gà Truyền Thống/Gà Giòn Không Cay', 36000, '1-Fried-Chicken.jpg', 4, 0),
(16, '2 Miếng Gà Rán', '2 Miếng Gà Giòn Cay/Gà Truyền Thống/Gà Giòn Không Cay', 71000, '2-Fried-Chicken.jpg', 4, 0),
(17, '3 Miếng Gà Rán', '3 Miếng Gà Giòn Cay/Gà Truyền Thống/Gà Giòn Không Cay', 105000, '3-Fried-Chicken.jpg', 4, 0),
(18, '6 Miếng Gà Rán', '6 Miếng Gà Giòn Cay/Gà Truyền Thống/Gà Giòn Không Cay', 205000, '6-Fried-Chicken-new.jpg', 4, 0),
(19, '1 Miếng Đùi Gà Quay', '1 Miếng Đùi Gà Quay Giấy Bạc/Đùi Gà Quay Tiêu', 75000, 'BJ.jpg', 4, 0),
(20, '1 Miếng Phi-lê Gà Quay', '1 Miếng Phi-lê Gà Quay Flava/Phi-lê Gà Quay Tiêu', 39000, 'MOD-PHI-LE-GA-QUAY.jpg', 4, 0),
(21, 'Burger Zinger', '1 Burger Zinger', 55000, 'Burger-Zinger.jpg', 5, 0),
(22, 'Burger Tôm', '1 Burger Tôm', 45000, 'Burger-Shrimp.jpg', 5, 0),
(23, 'Burger Gà Quay Flava', '1 Burger Gà Quay Flava', 55000, 'Burger-Flava.jpg', 5, 0),
(24, 'Cơm Gà Xiên Que', '1 Cơm Gà Xiên Que', 46000, 'Rice-Skewer.jpg', 5, 0),
(25, 'Mì Ý Xốt Cà Xúc Xích Gà Viên', '1 Mì Ý Xốt Cà Xúc Xích Gà Viên', 41000, 'MY-Y-POP.jpg', 5, 0),
(26, 'Salad Pop', '1 Salad Hạt Gà Viên Popcorn', 39000, 'SALAD-HAT-GA-VIEN.jpg', 6, 0),
(27, 'Salad Hạt', '1 Salad Hạt', 36000, 'SALAD-HAT.jpg', 6, 0),
(28, '2 Xiên Tenderods', '2 Xiên Tenderods', 41000, '2-Tenderods.jpg', 6, 0),
(29, '4 Phô Mai Viên', '4 Phô Mai Viên', 35000, '4-Chewy-Cheese.jpg', 6, 0),
(30, 'Pepsi Lon', 'Pepsi Lon', 17000, 'Pepsi-Can.jpg', 7, 0),
(31, '7Up Lon', '7Up Lon', 17000, '7Up-Can.jpg', 7, 0),
(32, 'Aquafina 500ml', 'Aquafina 500ml', 15000, 'Aquafina-500ml.jpg', 7, 0),
(33, 'Trà Đào', 'Trà Đào', 24000, 'Peach-Tea.jpg', 7, 0),
(34, 'Trà Chanh Lipton (Vừa)', 'Trà Chanh Lipton (Vừa)', 10000, 'Lipton.jpg', 7, 0),
(35, 'Combo Nhóm 1', '3 Miếng Gà Rán + 1 Burger Tôm + 2 Lon Pepsi', 175000, 'D6.jpg', 3, 0),
(36, 'Combo Nhóm 2', '4 Miếng Gà Giòn Cay / 4 Miếng Gà Giòn Không Cay / 4 Miếng Gà Truyền thống + 1 Khoai tây chiên lớn / 2 Thanh Bí Phô-mai + 2 Pepsi Lon', 195000, 'D7-new.jpg', 3, 0),
(37, 'Combo Nhóm 3', '5 Miếng Gà Giòn Cay / 5 Miếng Gà Giòn Không Cay / 5 Miếng Gà Truyền Thống+ 1 Popcorn (Vừa) / 4 Gà Miếng Nuggets+ 2 Pepsi Lon', 235000, 'D8-new.jpg', 3, 0),
(38, 'ab', 'a', 100000, 'gaocque.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `id` int(11) NOT NULL,
  `maHang` int(11) NOT NULL,
  `maMonAn` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `maNhaCungCap` int(11) NOT NULL,
  `tenNhaCungCap` text NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `diaChi` text NOT NULL,
  `maCuaHang` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`maNhaCungCap`, `tenNhaCungCap`, `sdt`, `diaChi`, `maCuaHang`, `deleted`) VALUES
(1, 'Công ty gà William Tran', '0983712315', 'Nguyễn Sinh Sắc, Sa Đéc, Đồng Tháp', 1, 0),
(2, 'Công ty Hamburger William Tran', '0291372183', 'Bình Thạnh, TP.Hồ Chí Minh', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `maNhanVien` int(11) NOT NULL,
  `tenNhanVien` text NOT NULL,
  `gioiTinh` int(11) NOT NULL,
  `ngaySinh` date NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `diaChi` text NOT NULL,
  `chucVu` text NOT NULL,
  `maCuaHang` int(11) NOT NULL,
  `matkhau` varchar(200) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`maNhanVien`, `tenNhanVien`, `gioiTinh`, `ngaySinh`, `sdt`, `diaChi`, `chucVu`, `maCuaHang`, `matkhau`, `deleted`) VALUES
(1, 'Thành Trần', 1, '2003-11-30', '0907640698', 'Quận 7, TP. Hồ Chí Minh', 'Quản lý tổng', 1, 'admin123', 0),
(2, 'William Tran', 1, '2003-11-30', '0907640699', 'Sa Đéc, Đồng Tháp', 'Nhân viên bán hàng', 1, 'thanhtran123', 0),
(3, 'Thành Thứ Hai', 1, '2003-11-30', '0907640697', 'Lai Vung, Đồng Tháp', 'Nhân viên giao hàng', 1, 'thanhtran123', 0),
(4, 'Thành Thứ Ba', 1, '2003-11-30', '0907640696', 'Quận 7, TP.Hồ Chí Minh', 'Nhân viên giao hàng', 1, 'thanhtran123', 0),
(5, 'Thành Chủ Nhật', 1, '2003-11-30', '0907640691', 'Quận 6, TP.Hồ Chí Minh', 'Đầu bếp', 1, 'thanhtran123', 0),
(6, 'Thành Thứ Bảy', 1, '2003-11-30', '0907640692', 'Mỹ Tho, Tiền giang', 'Quản lý', 1, 'admin123', 0),
(7, 'Thành Thứ Nhất', 1, '2003-11-30', '092137821', 'Quán cafe Ông Bầu', 'Nhân viên bán hàng', 1, 'abc123', 0),
(8, 'Thành Thứ Nữ', 0, '2000-10-20', '09123881371', 'Lấp Vò, Đồng Tháp', 'Nhân viên bán hàng', 1, 'abcd123', 0),
(12, 'a', 1, '0000-00-00', '0111111111', 'a', 'a', 1, 'a', 0),
(13, 'Thành Thứ Gì', 1, '2003-11-20', '0987111111', 'Quận 5, TP.Hồ Chí Minh', 'Đầu bếp', 1, 'abc123', 0),
(14, 'ab', 0, '2023-12-12', '02139013892', 'a', 'Nhân viên bán hàng', 1, 'a', 0),
(15, 'a', 0, '2023-05-20', 'a', 'a', 'Nhân viên bán hàng', 1, 'a', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhaphang`
--

CREATE TABLE `phieunhaphang` (
  `maPhieuNhap` int(11) NOT NULL,
  `maNhaCungCap` int(11) NOT NULL,
  `ngayLap` datetime NOT NULL,
  `tongTien` double NOT NULL,
  `maCuaHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phieunhaphang`
--

INSERT INTO `phieunhaphang` (`maPhieuNhap`, `maNhaCungCap`, `ngayLap`, `tongTien`, `maCuaHang`) VALUES
(1, 1, '2023-05-14 12:31:57', 50000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `maThanhToan` int(11) NOT NULL,
  `maDonHang` int(11) NOT NULL,
  `phuongThucThanhToan` text NOT NULL,
  `trangThaiThanhToan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`maThanhToan`, `maDonHang`, `phuongThucThanhToan`, `trangThaiThanhToan`) VALUES
(1, 29, 'Thanh toán Online', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_chitiet`);

--
-- Chỉ mục cho bảng `chitietphieunhaphang`
--
ALTER TABLE `chitietphieunhaphang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  ADD PRIMARY KEY (`maCuaHang`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDonHang`);

--
-- Chỉ mục cho bảng `donhangonline`
--
ALTER TABLE `donhangonline`
  ADD PRIMARY KEY (`id_donhangonline`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`maHang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`sdt`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaimon`
--
ALTER TABLE `loaimon`
  ADD PRIMARY KEY (`id_loaimon`);

--
-- Chỉ mục cho bảng `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`maMonAn`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`maNhaCungCap`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNhanVien`);

--
-- Chỉ mục cho bảng `phieunhaphang`
--
ALTER TABLE `phieunhaphang`
  ADD PRIMARY KEY (`maPhieuNhap`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`maThanhToan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id_chitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `chitietphieunhaphang`
--
ALTER TABLE `chitietphieunhaphang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  MODIFY `maCuaHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `donhangonline`
--
ALTER TABLE `donhangonline`
  MODIFY `id_donhangonline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `maHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaimon`
--
ALTER TABLE `loaimon`
  MODIFY `id_loaimon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `monan`
--
ALTER TABLE `monan`
  MODIFY `maMonAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `maNhaCungCap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `maNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `phieunhaphang`
--
ALTER TABLE `phieunhaphang`
  MODIFY `maPhieuNhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `maThanhToan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
