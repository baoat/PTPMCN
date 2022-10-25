-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 12, 2022 at 02:16 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdlwebdogiadung`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `madonhang` int(20) NOT NULL AUTO_INCREMENT,
  `masp` int(20) NOT NULL,
  `soluong` int(100) NOT NULL,
  `dongia` int(100) NOT NULL,
  PRIMARY KEY (`madonhang`),
  KEY `masp` (`masp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `idfb` int(20) NOT NULL AUTO_INCREMENT,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieude` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danhgia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idfb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hangsanpham`
--

DROP TABLE IF EXISTS `hangsanpham`;
CREATE TABLE IF NOT EXISTS `hangsanpham` (
  `mahangsp` int(20) NOT NULL AUTO_INCREMENT,
  `tenhangsp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`mahangsp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

DROP TABLE IF EXISTS `hinhanh`;
CREATE TABLE IF NOT EXISTS `hinhanh` (
  `maha` int(20) NOT NULL AUTO_INCREMENT,
  `masp` int(20) NOT NULL,
  `hinhanh` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`maha`),
  KEY `masp` (`masp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `mahd` int(20) NOT NULL AUTO_INCREMENT,
  `id` int(20) NOT NULL,
  `ngaymua` datetime NOT NULL,
  `ngaygiao` datetime NOT NULL,
  `tinhtranggiao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanhtoan` int(100) NOT NULL,
  PRIMARY KEY (`mahd`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `maloaisp` int(20) NOT NULL AUTO_INCREMENT,
  `tenloaisp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`maloaisp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` int(20) NOT NULL AUTO_INCREMENT,
  `tensp` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaban` float NOT NULL,
  `mota` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluongton` int(20) NOT NULL,
  `mahang` int(20) NOT NULL,
  `maloaisp` int(20) NOT NULL,
  `ngaycapnhat` datetime NOT NULL,
  PRIMARY KEY (`masp`),
  KEY `mahang` (`mahang`,`maloaisp`),
  KEY `maloaisp` (`maloaisp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` datetime NOT NULL,
  `gioitinh` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `sodienthoai` (`sodienthoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`mahang`) REFERENCES `hangsanpham` (`mahangsp`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`maloaisp`) REFERENCES `loaisanpham` (`maloaisp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
