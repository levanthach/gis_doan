-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 07, 2020 lúc 07:01 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `population`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `commune`
--

CREATE TABLE `commune` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `acreage` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `commune`
--

INSERT INTO `commune` (`id`, `district_id`, `name`, `acreage`) VALUES
(5, 2, 'Lê Văn Thạch', 0),
(6, 2, 'Lê Văn Thạch', 0),
(7, 2, '213', 213),
(8, 2, 'Lê Văn Thạch', 0),
(9, 2, '3123123t4r', 21343124);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `province_id`, `name`) VALUES
(2, 6, 'Gu gu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `point`
--

CREATE TABLE `point` (
  `id` int(11) NOT NULL,
  `polygon_id` int(11) NOT NULL,
  `longs` double NOT NULL,
  `lats` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `polygon`
--

CREATE TABLE `polygon` (
  `id` int(11) NOT NULL,
  `commune_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `population`
--

CREATE TABLE `population` (
  `id` int(11) NOT NULL,
  `commune_id` int(11) NOT NULL,
  `time` date NOT NULL,
  `count` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(6, 'Daklak2'),
(7, 'Gia Lai'),
(8, 'Komtum');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id`),
  ADD KEY `COMMUNE_DISTRICT_FK` (`district_id`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DISTRICT_PROVINCE_FK` (`province_id`);

--
-- Chỉ mục cho bảng `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `POINT_COMMUNE_FK` (`polygon_id`);

--
-- Chỉ mục cho bảng `polygon`
--
ALTER TABLE `polygon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `POLYGON_COMMUNE_FK` (`commune_id`);

--
-- Chỉ mục cho bảng `population`
--
ALTER TABLE `population`
  ADD PRIMARY KEY (`id`),
  ADD KEY `POPULATION_COMMUNE_FK` (`commune_id`);

--
-- Chỉ mục cho bảng `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `commune`
--
ALTER TABLE `commune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `point`
--
ALTER TABLE `point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `polygon`
--
ALTER TABLE `polygon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `population`
--
ALTER TABLE `population`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `COMMUNE_DISTRICT_FK` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`);

--
-- Các ràng buộc cho bảng `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `DISTRICT_PROVINCE_FK` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);

--
-- Các ràng buộc cho bảng `point`
--
ALTER TABLE `point`
  ADD CONSTRAINT `POINT_COMMUNE_FK` FOREIGN KEY (`polygon_id`) REFERENCES `polygon` (`id`);

--
-- Các ràng buộc cho bảng `polygon`
--
ALTER TABLE `polygon`
  ADD CONSTRAINT `POLYGON_COMMUNE_FK` FOREIGN KEY (`commune_id`) REFERENCES `commune` (`id`);

--
-- Các ràng buộc cho bảng `population`
--
ALTER TABLE `population`
  ADD CONSTRAINT `POPULATION_COMMUNE_FK` FOREIGN KEY (`commune_id`) REFERENCES `commune` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
