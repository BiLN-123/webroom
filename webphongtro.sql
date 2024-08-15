-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 15, 2024 lúc 09:51 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphongtro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_account`
--

CREATE TABLE `db_account` (
  `account_id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `role` int(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_account`
--

INSERT INTO `db_account` (`account_id`, `username`, `password`, `fullname`, `role`, `created_at`) VALUES
(1, 'letanngoc', '$2y$10$/l9IP4X5WgqIoLJ7pjzm7OqWwic2jiPBrgRTJekg6fHeoVFQp70Ei', 'Lê Tấn Ngọc', 0, '2022-10-07 06:23:11'),
(2, 'letanngoc1', '$2y$10$krIJ4Bv0wAKu8DxGHJfwauHbK0Z.xUXRGgRNex6q6xWKf0E9VLxFS', 'Lê Tấn Ngọc', 0, '2022-11-09 13:11:45'),
(3, 'letanngoc123', '$2y$10$QTpkZ3NOK72sF5yPU6rOje6aIGTWBUQiWFJSfkA7g.2nWITXRufru', 'Không Có', 0, '2022-12-14 23:12:19'),
(4, 'letanngoc2', '$2y$10$1cOdQApuMmXbcKcvSQNRB.CL9SE20Oxv6dh6ggT.nyqrhY0u.8kWK', 'Le Tan Ngoc', 0, '2024-08-14 12:08:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_anhtro`
--

CREATE TABLE `db_anhtro` (
  `id` int(11) NOT NULL,
  `hinhanh` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phongtro_ma` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_anhtro`
--

INSERT INTO `db_anhtro` (`id`, `hinhanh`, `phongtro_ma`, `created_at`) VALUES
(3, '1.jpg', 'P01', '2023-01-04'),
(4, '2.jpg', 'P02', '2023-01-04'),
(5, '3.jpg', 'P03', '2023-01-04'),
(6, '4.jpg', 'P04', '2023-01-05'),
(7, '5.jpeg', 'P05', '2023-01-05'),
(8, '6.jpg', 'P06', '2023-01-05'),
(9, '7.jpg', 'P07', '2023-01-05'),
(10, '8.jpg', 'P08', '2023-01-05'),
(11, '9.jpg', 'P09', '2023-01-05'),
(12, '10.jpg', 'P10', '2023-01-05'),
(13, '1.jpg', 'P11', '2023-01-05'),
(14, '2.jpg', 'P12', '2023-01-05'),
(15, '3.jpg', 'P13', '2023-01-05'),
(16, '4.jpg', 'P14', '2023-01-05'),
(17, '5.jpeg', 'P15', '2023-01-11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_baiviet`
--

CREATE TABLE `db_baiviet` (
  `id` int(12) NOT NULL,
  `tieude` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nguoiviet` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_baiviet`
--

INSERT INTO `db_baiviet` (`id`, `tieude`, `noidung`, `hinhanh`, `keyword`, `nguoiviet`, `status`, `created_at`) VALUES
(1, 'Sống Xanh - Green Life (Green Home)', 'Sống xanh được thể hiện trên mọi khía cạnh của cuộc sống, từ việc chọn đưa vào cơ thể thực phẩm như thế nào, tới cách chúng ta tiêu dùng ra sao. Lựa chọn phong phú thực phẩm tự nhiên, lành sạch, không hóa chất là cách chúng ta góp phần giảm thiểu chất độc hại thải ra đất, nước, không khí. Cân nhắc kĩ trước mọi hành vi tiêu dùng, chỉ mua khi thực-sự-cần. Giảm thiểu rác thải khó phân hủy ra môi trường, tái sử dụng hiệu quả. Một cách ngắn gọn, Sống Xanh là Uống Sạch – Ăn Lành – Tiêu Dùng Cần Kiệm. - Sống Xanh không đơn thuần là việc giảm thiểu rác thải nhựa - Sống xanh mang tới lợi ích tích cực cho sức khỏe, tâm trí &amp; môi trường sống - Sống xanh chỉ thực sự có giá trị khi hiểu và thực hành đúng, xây dựng thành Lối Sống cho chính mình Nhiều cá nhân, tổ chức chỉ coi sống xanh là một trào lưu nên chạy theo nó một cách “nửa mùa”. Chúng ta cắm ống hút tre vào một chiếc cốc nhựa dùng một lần và cho rằng mình đang “sống xanh”; vứt toàn bộ túi nilon trong nhà ra thùng rác, tẩy chay túi nilon khi nó vẫn còn có thể tái sử dụng được; hay là tạo ra những sản phẩm “nhân danh thiên nhiên” nhưng không thực sự tự nhiên. Lựa chọn một không gian Xanh đúng nghĩa là cách dễ dàng nhất để khởi đầu cho lối Sống Xanh!', '10.jpg', 'Sống Xanh không phải trào lưu, mà là một lựa chọn cho lối sống bền vững, là cách mà chúng ta tự sửa chữa mình, để có thể sống hòa thuận với Tự Nhiên.', 'BiLN (Lê Tấn Ngọc - DTM)', 0, '2022-12-30'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget nibh mi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget nibh mi. Quisque ultricies erat sed lacus viverra tristique. Nunc enim urna, iaculis sit amet blandit sed, porta nec dolor. Vivamus consectetur lacus est, et mollis leo elementum vel. Morbi luctus erat justo, non sagittis quam maximus quis. Mauris posuere eleifend arcu, at semper risus accumsan ac. Duis magna velit, viverra quis justo sit amet, malesuada tincidunt magna. Mauris vitae lacus eget nisl venenatis lobortis vitae ac urna. Nullam nec gravida metus, vitae mollis augue. Nulla efficitur neque vitae odio ornare convallis. Nam sed elit vitae odio laoreet volutpat.', 'blog1.png', 'Pellentesque nec nisl dolor. Etiam tempus, mauris eu rutrum fringilla', 'Lorem Ipsum', 0, '2022-12-26'),
(5, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &amp;quot;de Finibus Bonorum et Malorum&amp;quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.&amp;nbsp;The first line of Lorem Ipsum, &amp;quot;Lorem ipsum dolor sit amet..&amp;quot;, comes from a line in section 1.10.32.rnrnThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &amp;quot;de Finibus Bonorum et Malorum&amp;quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'blog2.png', 'What is Lorem Ipsum?', 'Lorem Ipsum', 0, '2022-12-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_hoadon`
--

CREATE TABLE `db_hoadon` (
  `hoadon_id` int(11) NOT NULL,
  `phongtro_ma` varchar(150) NOT NULL,
  `chisodiencu` int(11) NOT NULL,
  `chisonuoccu` int(11) NOT NULL,
  `chisodienmoi` int(11) NOT NULL,
  `chisonuocmoi` int(11) NOT NULL,
  `giaphong` int(11) NOT NULL,
  `giatiendien` int(11) NOT NULL,
  `giatiennuoc` int(11) NOT NULL,
  `giatienrac` int(11) NOT NULL,
  `phidichvu` int(11) NOT NULL,
  `ghichu` varchar(250) NOT NULL,
  `nguoitao` int(11) NOT NULL,
  `trangthai` int(1) NOT NULL,
  `dathu` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `tienno` int(11) NOT NULL,
  `ngaytao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_hoadon`
--

INSERT INTO `db_hoadon` (`hoadon_id`, `phongtro_ma`, `chisodiencu`, `chisonuoccu`, `chisodienmoi`, `chisonuocmoi`, `giaphong`, `giatiendien`, `giatiennuoc`, `giatienrac`, `phidichvu`, `ghichu`, `nguoitao`, `trangthai`, `dathu`, `status`, `tienno`, `ngaytao`) VALUES
(42, 'P02', 0, 0, 20, 50, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 1, 0, '2022-11-30 23:11:01'),
(43, 'P03', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 0, 0, '2022-11-30 23:11:01'),
(44, 'P04', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 0, 0, '2022-11-30 23:11:01'),
(45, 'P05', 0, 0, 0, 0, 0, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2022-11-30 23:11:01'),
(46, 'P06', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-11-30 23:11:01'),
(47, 'P07', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-11-30 23:11:01'),
(48, 'P08', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-11-30 23:11:01'),
(49, 'P09', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-11-30 23:11:01'),
(50, 'P10', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-11-30 23:11:01'),
(51, 'P11', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-11-30 23:11:01'),
(52, 'P12', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-11-30 23:11:01'),
(53, 'P13', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-11-30 23:11:01'),
(54, 'P01', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(55, 'P02', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(56, 'P03', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 1, 0, '2022-09-30 23:09:21'),
(57, 'P04', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 1, 0, '2022-09-30 23:09:21'),
(58, 'P05', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(59, 'P06', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(60, 'P07', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(61, 'P08', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(62, 'P09', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(63, 'P10', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(64, 'P11', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(65, 'P12', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(66, 'P13', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-09-30 23:09:21'),
(67, 'P01', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 1, 0, '2022-10-30 23:10:43'),
(68, 'P02', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 1, 0, '2022-10-30 23:10:43'),
(69, 'P03', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 1, 0, '2022-10-30 23:10:43'),
(70, 'P04', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 1, 0, '2022-10-30 23:10:43'),
(71, 'P05', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 1, 0, '2022-10-30 23:10:43'),
(72, 'P06', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-10-30 23:10:43'),
(73, 'P07', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-10-30 23:10:43'),
(74, 'P08', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-10-30 23:10:43'),
(75, 'P09', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-10-30 23:10:43'),
(76, 'P10', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-10-30 23:10:43'),
(77, 'P11', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-10-30 23:10:43'),
(78, 'P12', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-10-30 23:10:43'),
(79, 'P13', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 1, 0, '2022-10-30 23:10:44'),
(80, 'P01', 0, 0, 30, 30, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 1, 0, '2022-12-28 10:12:37'),
(81, 'P02', 20, 50, 50, 70, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 1, 0, '2022-12-01 00:12:31'),
(82, 'P03', 0, 0, 60, 29, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 1, 0, '2022-12-01 00:12:31'),
(83, 'P04', 0, 0, 88, 56, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 1, 0, '2022-12-01 00:12:31'),
(84, 'P05', 0, 0, 25, 17, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 1, 0, '2022-12-01 00:12:31'),
(85, 'P06', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-12-01 00:12:31'),
(86, 'P07', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-12-01 00:12:31'),
(87, 'P08', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-12-01 00:12:31'),
(88, 'P09', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-12-01 00:12:31'),
(89, 'P10', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-12-01 00:12:31'),
(90, 'P11', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-12-01 00:12:31'),
(91, 'P12', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-12-01 00:12:31'),
(92, 'P13', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-12-01 00:12:31'),
(223, 'P14', 0, 0, 0, 0, 0, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2022-12-14 22:12:07'),
(504, 'P01', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 0, 0, '2022-11-26 15:11:02'),
(505, 'P14', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2022-11-26 15:11:02'),
(507, 'P01', 0, 0, 25, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 0, 0, '2023-01-28 10:01:26'),
(508, 'P02', 50, 70, 54, 70, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 0, 0, '2023-01-28 10:01:26'),
(509, 'P03', 60, 29, 75, 29, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 0, 0, '2023-01-28 10:01:26'),
(510, 'P04', 88, 56, 88, 56, 10000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 0, 0, '2023-01-28 10:01:26'),
(511, 'P05', 25, 17, 25, 17, 7000000, 10000, 10000, 30000, 0, '', 1, 1, 1, 0, 0, '2023-01-28 10:01:26'),
(512, 'P06', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2023-01-28 10:01:26'),
(513, 'P07', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2023-01-28 10:01:26'),
(514, 'P08', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2023-01-28 10:01:26'),
(515, 'P09', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2023-01-28 10:01:26'),
(516, 'P10', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2023-01-28 10:01:26'),
(517, 'P11', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2023-01-28 10:01:26'),
(518, 'P12', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2023-01-28 10:01:26'),
(519, 'P13', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2023-01-28 10:01:26'),
(520, 'P14', 0, 0, 0, 0, 0, 10000, 10000, 0, 0, '', 1, 0, 0, 0, 0, '2023-01-28 10:01:26'),
(522, 'P15', 0, 0, 0, 0, 1000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-01-11 08:01:01'),
(523, 'P01', 25, 0, 25, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(524, 'P02', 54, 70, 54, 70, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(525, 'P03', 75, 29, 75, 29, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(526, 'P04', 88, 56, 88, 56, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(527, 'P05', 25, 17, 25, 17, 7000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(528, 'P06', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(529, 'P07', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(530, 'P08', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(531, 'P09', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(532, 'P10', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(533, 'P11', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(534, 'P12', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(535, 'P13', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(536, 'P14', 0, 0, 0, 0, 5000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(537, 'P15', 0, 0, 0, 0, 1000000, 10000, 10000, 30000, 0, '', 1, 0, 0, 0, 0, '2023-02-11 08:02:49'),
(538, 'P01', 25, 0, 25, 0, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(539, 'P02', 54, 70, 54, 70, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(540, 'P03', 75, 29, 75, 29, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(541, 'P04', 88, 56, 88, 56, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(542, 'P05', 25, 17, 25, 17, 7000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(543, 'P06', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(544, 'P07', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(545, 'P08', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(546, 'P09', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(547, 'P10', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(548, 'P11', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(549, 'P12', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(550, 'P13', 0, 0, 0, 0, 10000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(551, 'P14', 0, 0, 0, 0, 5000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35'),
(552, 'P15', 0, 0, 0, 0, 1000000, 10000, 10000, 30000, 0, '', 4, 0, 0, 0, 0, '2024-08-14 12:08:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_hopdong`
--

CREATE TABLE `db_hopdong` (
  `id` int(11) NOT NULL,
  `tenA` varchar(80) NOT NULL,
  `ngaysinhA` varchar(50) NOT NULL,
  `cccdA` varchar(20) NOT NULL,
  `quequanA` varchar(150) NOT NULL,
  `tenB` varchar(80) NOT NULL,
  `ngaysinhB` varchar(50) NOT NULL,
  `cccdB` varchar(20) NOT NULL,
  `quequanB` varchar(150) NOT NULL,
  `phongtro_ma` varchar(150) NOT NULL,
  `diachithue` varchar(200) NOT NULL,
  `ngaythue` date NOT NULL,
  `tiendien` int(11) NOT NULL,
  `tiennuoc` int(11) NOT NULL,
  `tienrac` int(11) NOT NULL,
  `tungay` varchar(50) NOT NULL,
  `toingay` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_hopdong`
--

INSERT INTO `db_hopdong` (`id`, `tenA`, `ngaysinhA`, `cccdA`, `quequanA`, `tenB`, `ngaysinhB`, `cccdB`, `quequanB`, `phongtro_ma`, `diachithue`, `ngaythue`, `tiendien`, `tiennuoc`, `tienrac`, `tungay`, `toingay`, `created_at`) VALUES
(1, 'Lê Tấn Ngọc', '27/04/2000', '212435513', 'Quảng Ngãi', 'Nguyễn B', '30/07/1999', '22112204', 'TPHCM', 'P01', '236B, Lê Văn Sỹ, Tân Bình, TPHCM', '2022-10-05', 20000, 20000, 30000, '5/10/2022', '5/10/2025', '2022-12-05 00:00:00'),
(2, 'AAA', '2000', '123456789', 'AAA', 'AAA', '2000', '123456789', 'AAA', 'P01', 'AAA', '2022-12-14', 10000, 10000, 0, '2022', '2025', '2022-12-14 10:12:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_logo`
--

CREATE TABLE `db_logo` (
  `id` int(11) NOT NULL,
  `hinhanh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_logo`
--

INSERT INTO `db_logo` (`id`, `hinhanh`) VALUES
(1, 'nhatro.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_nhacthutien`
--

CREATE TABLE `db_nhacthutien` (
  `id` int(12) NOT NULL,
  `phongtro_ma` varchar(150) NOT NULL,
  `message` varchar(250) NOT NULL,
  `ngaynhac` date NOT NULL,
  `mode` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_nhacthutien`
--

INSERT INTO `db_nhacthutien` (`id`, `phongtro_ma`, `message`, `ngaynhac`, `mode`) VALUES
(1, 'P01', 'Thu Tiền Định Kì', '2023-01-01', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_payments`
--

CREATE TABLE `db_payments` (
  `id` int(11) NOT NULL,
  `hoadon_id` int(11) NOT NULL,
  `phongtro_ma` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payer_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` float(10,2) NOT NULL,
  `tongtien` int(20) NOT NULL,
  `currency` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_payments`
--

INSERT INTO `db_payments` (`id`, `hoadon_id`, `phongtro_ma`, `hoten`, `payment_id`, `payer_id`, `payer_email`, `amount`, `tongtien`, `currency`, `payment_status`) VALUES
(29, 57, 'P04', 'Lê Tấn Ngọc', 'PAYID-MOXGLTQ7T358644MD318442Y', 'JQT8CRRB2M46Y', 'sb-taptp24608709@personal.example.com', 418.00, 10030000, 'USD', 'approved'),
(30, 70, 'P04', 'BiLN', 'PAYID-MO3H3CA8L9692640R119312E', 'HUJ5SVHKHXCCE', 'sb-dma47j24481305@personal.example.com', 1.00, 10030000, 'USD', 'approved'),
(31, 83, 'P04', 'BiLN', 'PAYID-MO354SY4L245804BA6708438', 'JQT8CRRB2M46Y', 'sb-taptp24608709@personal.example.com', 1.00, 11470000, 'USD', 'approved'),
(34, 510, 'P04', 'BiLN', 'PAYID-MO6YM6I3VH65323F7928884L', 'JQT8CRRB2M46Y', 'sb-taptp24608709@personal.example.com', 1.00, 10030000, 'USD', 'approved');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_phongtro`
--

CREATE TABLE `db_phongtro` (
  `phongtro_ma` varchar(150) NOT NULL,
  `tenphongtro` varchar(70) NOT NULL,
  `giaphong` int(11) NOT NULL,
  `chisodien` int(11) NOT NULL,
  `chisonuoc` int(11) NOT NULL,
  `chiphikhac` int(11) NOT NULL,
  `thongtin` longtext NOT NULL,
  `tiencoc` int(11) NOT NULL,
  `trangthai` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `ngaytao` int(11) NOT NULL,
  `ngaythue` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_phongtro`
--

INSERT INTO `db_phongtro` (`phongtro_ma`, `tenphongtro`, `giaphong`, `chisodien`, `chisonuoc`, `chiphikhac`, `thongtin`, `tiencoc`, `trangthai`, `status`, `ngaytao`, `ngaythue`) VALUES
('P01', 'Phòng 01', 10000000, 0, 0, 0, 'Phòng 50m2 <br> Thích hợp cho 5-6 người <br> Phòng có máy lạnh, máy giặt đầy đủ <br> Giá phòng: 7000000 (7 triệu đồng) <br> Mọi thông tin vui lòng liên hệ với chủ nhà trọ', 10000000, 1, 0, 1667916671, '2022-11-04'),
('P02', 'Phòng 02', 10000000, 0, 0, 0, 'Phòng 50m2 <br> Thích hợp cho 5-6 người <br> Phòng có máy lạnh, máy giặt đầy đủ <br> Giá phòng: 7000000 (7 triệu đồng) <br> Mọi thông tin vui lòng liên hệ với chủ nhà trọ', 5000000, 1, 0, 1665385596, '2022-10-03'),
('P03', 'Phòng 03', 10000000, 0, 0, 0, 'Phòng 50m2 <br> Thích hợp cho 5-6 người <br> Phòng có máy lạnh, máy giặt đầy đủ <br> Giá phòng: 7000000 (7 triệu đồng) <br> Mọi thông tin vui lòng liên hệ với chủ nhà trọ', 5000000, 1, 0, 1665384477, '2022-10-15'),
('P04', 'Phòng 04', 10000000, 0, 0, 0, 'Phòng 50m2 <br> Thích hợp cho 5-6 người <br> Phòng có máy lạnh, máy giặt đầy đủ <br> Giá phòng: 7000000 (7 triệu đồng) <br> Mọi thông tin vui lòng liên hệ với chủ nhà trọ', 10000000, 1, 0, 1665462698, '2022-09-09'),
('P05', 'Phòng 05', 7000000, 0, 0, 0, 'Phòng 50m2 <br> Thích hợp cho 5-6 người <br> Phòng có máy lạnh, máy giặt đầy đủ <br> Giá phòng: 7000000 (7 triệu đồng) <br> Mọi thông tin vui lòng liên hệ với chủ nhà trọ', 7000000, 1, 0, 1665981417, '2022-10-18'),
('P06', 'Phòng 06', 10000000, 0, 0, 0, 'Phòng 50m2 <br> Thích hợp cho 5-6 người <br> Phòng có máy lạnh, máy giặt đầy đủ <br> Giá phòng: 7000000 (7 triệu đồng) <br> Mọi thông tin vui lòng liên hệ với chủ nhà trọ', 10000000, 0, 1, 1666189111, '0000-00-00'),
('P07', 'Phòng 07', 10000000, 0, 0, 0, '', 10000000, 0, 0, 1666189150, '0000-00-00'),
('P08', 'Phòng 08', 10000000, 0, 0, 0, '', 10000000, 0, 0, 1666189322, '0000-00-00'),
('P09', 'Phòng 09', 10000000, 0, 0, 0, '', 10000000, 0, 0, 1666189356, '0000-00-00'),
('P10', 'Phòng 10', 10000000, 0, 0, 0, '&lt;p&gt;huuuuuuu&lt;/p&gt; &lt;br&gt; &lt;p&gt;hhhhhh&lt;/p&gt;', 10000000, 0, 0, 1666189519, '0000-00-00'),
('P11', 'Phòng 11', 10000000, 0, 0, 0, '', 10000000, 0, 0, 1666189548, '0000-00-00'),
('P12', 'Phòng 12', 10000000, 0, 0, 0, '', 10000000, 0, 0, 1666189565, '0000-00-00'),
('P13', 'Phòng 13', 10000000, 0, 0, 0, '', 10000000, 0, 0, 1666189580, '0000-00-00'),
('P14', 'Phòng 14', 5000000, 0, 0, 0, 'Phòng thích hợp 4 người, giá 5.000.000', 5000000, 0, 0, 1671032691, '0001-01-01'),
('P15', 'Phòng 15', 1000000, 0, 0, 0, 'phòng lớn', 0, 0, 0, 1673401247, '0001-01-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_settings`
--

CREATE TABLE `db_settings` (
  `setting_id` int(11) NOT NULL,
  `tiendien` int(11) NOT NULL,
  `tiennuoc` int(11) NOT NULL,
  `tienrac` int(11) NOT NULL,
  `caidatphong` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_settings`
--

INSERT INTO `db_settings` (`setting_id`, `tiendien`, `tiennuoc`, `tienrac`, `caidatphong`) VALUES
(1, 10000, 10000, 30000, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_slide`
--

CREATE TABLE `db_slide` (
  `id` int(11) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_slide`
--

INSERT INTO `db_slide` (`id`, `name`, `hinhanh`, `status`, `created_at`) VALUES
(2, 'Hình Ảnh', '1.jpg', 0, '2022-12-30'),
(3, 'Hình Ảnh', '2.jpg', 0, '2022-12-30'),
(4, 'Hình Ảnh', '3.jpg', 0, '2022-12-30'),
(5, 'Hình Ảnh', '4.jpg', 0, '2022-12-30'),
(6, 'Hình Ảnh', '5.jpg', 0, '2022-12-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_thongtin`
--

CREATE TABLE `db_thongtin` (
  `cmnd` varchar(20) NOT NULL,
  `phongtro_ma` varchar(150) NOT NULL,
  `hoten` varchar(80) NOT NULL,
  `namsinh` varchar(50) NOT NULL,
  `quequan` varchar(150) NOT NULL,
  `nghenghiep` varchar(150) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `khac` varchar(250) NOT NULL,
  `ngaythue` varchar(50) NOT NULL,
  `vaitro` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_thongtin`
--

INSERT INTO `db_thongtin` (`cmnd`, `phongtro_ma`, `hoten`, `namsinh`, `quequan`, `nghenghiep`, `dienthoai`, `khac`, `ngaythue`, `vaitro`) VALUES
('11130000984', 'P03', 'Cao A', '27/04/2000', 'TPHCM', 'Sinh Viên', '927066788', '', '20/2/2022', 0),
('12345678900', 'P04', 'DFF', '31/07/1992', 'Đà Nẵng', 'Sinh Viên', '927066788', '', '22/2/2022', 0),
('12345678988', 'P04', 'SSSL', '20/2/2000', 'Đà Nẵng', 'Sinh Viên', '927066788', '', '20/12/2020', 0),
('12345678999', 'P01', 'An', '27/04/2000', 'TPHCM', 'Sinh Viên', '123456789', '', '22/10/2022', 1),
('21212112', 'P03', 'Anh B', '27/04/2000', 'TPHCM', 'Sinh Viên', '927066788', '', '20/08/2022', 1),
('212335513', 'P02', 'Nguyễn Nguyễn B', '27/02/2000', 'Đà Nẵng', 'Sinh Viên', '234516789', '', '20/08/2022', 1),
('2123444000', 'P04', 'Lê A', '27/04/2000', 'TPHCM', 'Sinh Viên', '927066788', '', '20/08/2022', 1),
('2123444555', 'P03', 'Ng Ng', '20/2/2000', 'Quảng Ngãi', 'Sinh Viên', '927066788', '', '16/10/2022', 0),
('212435500', 'P02', 'Lê Tấn Ngọc', '27/04/2000', 'Quảng Ngãi', 'Sinh Viên', '927066788', '', '16/10/2022', 0),
('2124355000', 'P02', 'Anh A', '27/04/2000', 'TPHCM', 'Sinh Viên', '927066788', '', '20/08/2022', 0),
('98765432143', 'P01', 'Ngọc', '27/04/2000', 'TPHCM', 'Sinh Viên', '123456789', '', '22/10/2022', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tieude`
--

CREATE TABLE `db_tieude` (
  `id` int(11) NOT NULL,
  `tentrang1` varchar(250) NOT NULL,
  `tentrang2` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_tieude`
--

INSERT INTO `db_tieude` (`id`, `tentrang1`, `tentrang2`) VALUES
(1, 'Green', 'Home');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tknguoithue`
--

CREATE TABLE `db_tknguoithue` (
  `nguoithue_id` int(12) NOT NULL,
  `hoten` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `phongtro_ma` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_tknguoithue`
--

INSERT INTO `db_tknguoithue` (`nguoithue_id`, `hoten`, `email`, `password`, `role`, `created_at`, `phongtro_ma`) VALUES
(4, 'Lê Tấn Ngọc', 'letanngocln2@gmail.com', '$2y$10$dYWw7VswyMTQ9WvM5xwa4ekZQ6zLcm4K8ZPa2KGyPeea7kj8GdwJ.', 0, '2022-11-25 22:11:27', 'P02'),
(7, 'Lê Tấn Ngọc', 'BiLN2704@gmail.com', '$2y$10$xVqb82LfLBwpzoT.lQDgo.kYYWk6cTHb6vo6pE6xvK2vuqofEGlFm', 0, '2022-12-10 18:12:26', 'P03'),
(8, 'BiLN', 'letannoc@gmail.com', '$2y$10$G3zgOEqAvpArKbHSKv2VA.PauQmsjW5Qz39DmIgwQ3i0SEgmeIMuq', 0, '2022-12-28 10:12:16', 'P04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_account`
--
ALTER TABLE `db_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Chỉ mục cho bảng `db_anhtro`
--
ALTER TABLE `db_anhtro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phongtro_ma` (`phongtro_ma`);

--
-- Chỉ mục cho bảng `db_baiviet`
--
ALTER TABLE `db_baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_hoadon`
--
ALTER TABLE `db_hoadon`
  ADD PRIMARY KEY (`hoadon_id`),
  ADD KEY `phongtro_ma` (`phongtro_ma`);

--
-- Chỉ mục cho bảng `db_hopdong`
--
ALTER TABLE `db_hopdong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phongtro_ma` (`phongtro_ma`);

--
-- Chỉ mục cho bảng `db_logo`
--
ALTER TABLE `db_logo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_nhacthutien`
--
ALTER TABLE `db_nhacthutien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phongtro_ma` (`phongtro_ma`);

--
-- Chỉ mục cho bảng `db_payments`
--
ALTER TABLE `db_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_id` (`hoadon_id`),
  ADD KEY `phongtro_ma` (`phongtro_ma`);

--
-- Chỉ mục cho bảng `db_phongtro`
--
ALTER TABLE `db_phongtro`
  ADD PRIMARY KEY (`phongtro_ma`);

--
-- Chỉ mục cho bảng `db_settings`
--
ALTER TABLE `db_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Chỉ mục cho bảng `db_slide`
--
ALTER TABLE `db_slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_thongtin`
--
ALTER TABLE `db_thongtin`
  ADD PRIMARY KEY (`cmnd`),
  ADD KEY `phongtro_ma` (`phongtro_ma`);

--
-- Chỉ mục cho bảng `db_tknguoithue`
--
ALTER TABLE `db_tknguoithue`
  ADD PRIMARY KEY (`nguoithue_id`),
  ADD KEY `phongtro_ma` (`phongtro_ma`),
  ADD KEY `phongtro_ma_2` (`phongtro_ma`),
  ADD KEY `phongtro_ma_3` (`phongtro_ma`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_account`
--
ALTER TABLE `db_account`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `db_anhtro`
--
ALTER TABLE `db_anhtro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `db_baiviet`
--
ALTER TABLE `db_baiviet`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `db_hoadon`
--
ALTER TABLE `db_hoadon`
  MODIFY `hoadon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;

--
-- AUTO_INCREMENT cho bảng `db_hopdong`
--
ALTER TABLE `db_hopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_logo`
--
ALTER TABLE `db_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_nhacthutien`
--
ALTER TABLE `db_nhacthutien`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `db_payments`
--
ALTER TABLE `db_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `db_slide`
--
ALTER TABLE `db_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `db_tknguoithue`
--
ALTER TABLE `db_tknguoithue`
  MODIFY `nguoithue_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_anhtro`
--
ALTER TABLE `db_anhtro`
  ADD CONSTRAINT `db_anhtro_ibfk_1` FOREIGN KEY (`phongtro_ma`) REFERENCES `db_phongtro` (`phongtro_ma`);

--
-- Các ràng buộc cho bảng `db_hoadon`
--
ALTER TABLE `db_hoadon`
  ADD CONSTRAINT `db_hoadon_ibfk_1` FOREIGN KEY (`phongtro_ma`) REFERENCES `db_phongtro` (`phongtro_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_hopdong`
--
ALTER TABLE `db_hopdong`
  ADD CONSTRAINT `db_hopdong_ibfk_1` FOREIGN KEY (`phongtro_ma`) REFERENCES `db_phongtro` (`phongtro_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_nhacthutien`
--
ALTER TABLE `db_nhacthutien`
  ADD CONSTRAINT `db_nhacthutien_ibfk_1` FOREIGN KEY (`phongtro_ma`) REFERENCES `db_phongtro` (`phongtro_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_payments`
--
ALTER TABLE `db_payments`
  ADD CONSTRAINT `db_payments_ibfk_1` FOREIGN KEY (`hoadon_id`) REFERENCES `db_hoadon` (`hoadon_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_payments_ibfk_2` FOREIGN KEY (`phongtro_ma`) REFERENCES `db_phongtro` (`phongtro_ma`);

--
-- Các ràng buộc cho bảng `db_thongtin`
--
ALTER TABLE `db_thongtin`
  ADD CONSTRAINT `db_thongtin_ibfk_1` FOREIGN KEY (`phongtro_ma`) REFERENCES `db_phongtro` (`phongtro_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_tknguoithue`
--
ALTER TABLE `db_tknguoithue`
  ADD CONSTRAINT `db_tknguoithue_ibfk_1` FOREIGN KEY (`phongtro_ma`) REFERENCES `db_phongtro` (`phongtro_ma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
