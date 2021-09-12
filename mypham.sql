-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 12, 2021 lúc 08:21 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mypham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `MaHD` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `TenKH` varchar(100) NOT NULL,
  `GiaGoc` decimal(10,0) NOT NULL,
  `TyLeKM` int(100) NOT NULL,
  `SoLuongMua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`MaHD`, `MaSP`, `TenKH`, `GiaGoc`, `TyLeKM`, `SoLuongMua`) VALUES
(5, 1, 'Nguyễn Đức Lý', '120000', 5, 1),
(5, 2, 'Nguyễn Đức Lý', '128000', 5, 1),
(6, 3, 'Nguyễn Văn Thế', '135000', 7, 1),
(6, 4, 'Nguyễn Văn Thế', '128000', 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctkhuyenmai`
--

CREATE TABLE `ctkhuyenmai` (
  `MaKM` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `TyLeKM` int(11) NOT NULL,
  `GhiChu` text DEFAULT NULL,
  `SoLuongKM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `MaDG` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `TenDangNhap` varchar(256) NOT NULL,
  `SoSao` int(11) NOT NULL,
  `NoiDung` text DEFAULT NULL,
  `NgayDG` date NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`MaDG`, `MaSP`, `TenDangNhap`, `SoSao`, `NoiDung`, `NgayDG`, `TrangThai`) VALUES
(4, 1, 'nguyenducly2000@gmail.com', 5, 'Sản phẩm xài rất tốt ', '2021-09-08', 0),
(5, 2, 'nguyenducly2000@gmail.com', 5, 'Rất đáng mua', '2021-09-09', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(100) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `TenDM`, `TrangThai`) VALUES
(1, 'Dầu xả', 1),
(2, 'Sữa tắm', 1),
(8, 'Kem trị mụn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `TenDangNhap` varchar(256) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `NgayHD` date NOT NULL,
  `TrangThai` varchar(100) NOT NULL,
  `GhiChu` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`TenDangNhap`, `MaHD`, `NgayHD`, `TrangThai`, `GhiChu`) VALUES
('nguyenducly2000@gmail.com', 5, '2021-09-01', 'Chờ xét duyệt', NULL),
('nguyenducly2000@gmail.com', 6, '2021-09-01', 'Đang giao', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` int(11) NOT NULL,
  `TenKM` varchar(100) NOT NULL,
  `TuNgay` date NOT NULL,
  `DenNgay` date NOT NULL,
  `TrangThai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `TenKM`, `TuNgay`, `DenNgay`, `TrangThai`) VALUES
(6, 'Tết Nguyên Đán', '2021-09-13', '2021-09-14', 'Chưa khuyến mãi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitk`
--

CREATE TABLE `loaitk` (
  `MaLoai` varchar(100) NOT NULL,
  `TenLoai` varchar(100) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaitk`
--

INSERT INTO `loaitk` (`MaLoai`, `TenLoai`, `TrangThai`) VALUES
('AD', 'admin', 1),
('US', 'user', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhapxuat`
--

CREATE TABLE `nhapxuat` (
  `MaNhapXuat` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `GiaNhap` decimal(10,0) NOT NULL,
  `GiaXuat` decimal(10,0) NOT NULL,
  `SoLuongNhap` int(11) NOT NULL,
  `NgayApDung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhapxuat`
--

INSERT INTO `nhapxuat` (`MaNhapXuat`, `MaSP`, `GiaNhap`, `GiaXuat`, `SoLuongNhap`, `NgayApDung`) VALUES
(14, 1, '100000', '120000', 40, '2021-09-05'),
(15, 2, '110000', '128000', 5, '2021-09-05'),
(16, 3, '110000', '135000', 4, '2021-09-05'),
(17, 4, '105000', '128000', 10, '2021-09-12'),
(18, 5, '70000', '85000', 10, '2021-09-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(100) NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `HinhAnh` varchar(100) NOT NULL,
  `MaDM` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `DonGia`, `HinhAnh`, `MaDM`, `TrangThai`, `MoTa`) VALUES
(1, 'Dầu xả Oliu', '120000', '1.png', 1, 1, 'Dầu xả Hachi® Anti-Dandruff Conditioner là sự kết hợp của tinh dầu Jojoba, Olive có tác dụng cân bằng độ ẩm, cung cấp dưỡng chất, mang lại cho bạn mái tóc chắc khỏe, siêu mềm mượt. Đồng thời được tăng cường hoạt chất hỗ trợ bảo vệ tóc khỏi gàu, ngăn không cho gây gàu'),
(2, 'Sữa tắm chiết xuất dừa', '128000', '2.png', 2, 1, 'Sự hiện diện của các chất béo bão hòa, Triglycerides, Vitamin E trong Dầu Dừa có tác dụng loại bỏ sự mất độ ẩm thông qua các lỗ chân lông trên da, làm giảm khô da, giữ cho làn da mịn màng và bảo vệ chống rạn nứt. Các Acid Capric, Caprylic, Lauric có trong Dầu Dừa có chất khử trùng mạnh và đặc tính kháng khuẩn. Việc sử dụng thường xuyên sản phẩm Coconut Oil Shower Gel có tác dụng làm sạch bụi bẩn bã nhờn, thẩm thấu các chất béo vào dưới da, do đó giữ cho da khỏe mạnh và mịn màng đồng thời ngăn ngừa được lão hóa sớm và nếp nhăn của da.'),
(3, 'Sữa tắm dầu cám gội', '135000', '2.2.png', 2, 1, 'Sự hiện diện của các chất béo bão hòa, Triglycerides, Vitamin E trong Dầu Dừa có tác dụng loại bỏ sự mất độ ẩm thông qua các lỗ chân lông trên da, làm giảm khô da, giữ cho làn da mịn màng và bảo vệ chống rạn nứt. Các Acid Capric, Caprylic, Lauric có trong Dầu Dừa có chất khử trùng mạnh và đặc tính kháng khuẩn. Việc sử dụng thường xuyên sản phẩm Coconut Oil Shower Gel có tác dụng làm sạch bụi bẩn bã nhờn, thẩm thấu các chất béo vào dưới da, do đó giữ cho da khỏe mạnh và mịn màng đồng thời ngăn ngừa được lão hóa sớm và nếp nhăn của da.'),
(4, 'Sữa tắm hoa hồng', '128000', '2.3.png', 2, 1, 'Sữa tắm HACHI® Velvety Rose là sự pha trộn độc đáo của các loại dầu tự nhiên kết hợp với chiết xuất Hoa Hồng Pháp, chiết xuất Mật Ong và được bổ sung Collagen giúp tái tạo, dưỡng ẩm sâu cho da, nuôi dưỡng làn da mềm mịn và trắng sáng. Mùi hương Hoa hồng dịu nhẹ, quý phái đem đến sự sảng khoái và tôn vinh vẻ đẹp của bạn.'),
(5, 'Sữa tắm chiết xuất cám gạo', '85000', '2.1.png', 2, 1, 'Tinh chất mầm Đậu nành có chứa hàm lượng protein chất lượng cao và các Isoflavones – một loại hợp chất phytoestrogen đóng vai trò estrogen thực vật. Đậu nành có thể có tác động tích cực trên da, cải thiện sự xuất hiện của lão hóa da, giảm bớt các đường nhăn và nếp nhăn. Với sự kết hợp cùng AHA, sữa tắm loại\r\nbỏ các lớp da chết, kích thích da sản xuất tế bào mới và trả lại cho làn da vẻ tươi tắn mịn màng đồng thời kích thích việc sản xuất collagen và elastin trong da. Mùi hương dịu nhẹ từ những tinh dầu thiên nhiên đem đến sự sảng khoái sau khi sử dụng.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TenDangNhap` varchar(256) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `MaLoai` varchar(100) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `HoTen` varchar(256) NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `SoDienThoai` varchar(256) NOT NULL,
  `DiaChi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`TenDangNhap`, `Email`, `MatKhau`, `MaLoai`, `TrangThai`, `HoTen`, `GioiTinh`, `SoDienThoai`, `DiaChi`) VALUES
('nguyenducly2000@gmail.com', 'nguyenducly2000@gmail.com', '$2y$10$jGXjeHUgWFNJxLeDsIZQnuS0uDxXOCk2Z63iWBqs/Jr0dyY4WJ8YC', 'AD', 1, 'Nguyễn Đức Lý', 1, '0963700285', '123 Hùng Vương'),
('nguyenvanthedtu@gmail.com', 'nguyenvanthedtu@gmail.com', '$2y$10$El5qKsl6nDXA92nbvNPByOaXMQILSqj9tAJ4J4c2saiCM77X6ZUCq', 'AD', 1, 'Nguyễn Văn Thế', 1, '0965720364', 'Huế');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`MaHD`,`MaSP`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `ctkhuyenmai`
--
ALTER TABLE `ctkhuyenmai`
  ADD PRIMARY KEY (`MaKM`,`MaSP`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MaDG`,`MaSP`),
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `TenDangNhap` (`TenDangNhap`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `TenDangNhap` (`TenDangNhap`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `loaitk`
--
ALTER TABLE `loaitk`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nhapxuat`
--
ALTER TABLE `nhapxuat`
  ADD PRIMARY KEY (`MaNhapXuat`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaDM` (`MaDM`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TenDangNhap`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `MaDG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nhapxuat`
--
ALTER TABLE `nhapxuat`
  MODIFY `MaNhapXuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ctkhuyenmai`
--
ALTER TABLE `ctkhuyenmai`
  ADD CONSTRAINT `ctkhuyenmai_ibfk_1` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctkhuyenmai_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`TenDangNhap`) REFERENCES `taikhoan` (`TenDangNhap`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`TenDangNhap`) REFERENCES `taikhoan` (`TenDangNhap`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `nhapxuat` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaitk` (`MaLoai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
