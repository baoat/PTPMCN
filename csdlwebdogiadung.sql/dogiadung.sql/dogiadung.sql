-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2022 at 08:58 AM
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
-- Database: `dogiadung`
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
  `maloaisp` int(20) NOT NULL,
  PRIMARY KEY (`mahangsp`),
  KEY `maloaisp` (`maloaisp`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hangsanpham`
--

INSERT INTO `hangsanpham` (`mahangsp`, `tenhangsp`, `maloaisp`) VALUES
(1, 'malloga', 1),
(2, 'kangaroo', 1),
(3, 'Samsung', 2),
(4, 'casper', 2),
(5, 'Sơn Hà', 3),
(6, 'Eurocook', 3),
(7, 'sanaky', 4),
(8, 'electrolux', 4),
(9, 'sanaky', 5),
(10, 'tosiba', 5),
(11, 'sakura', 6),
(12, 'sunhouse', 6),
(13, '', 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloaisp`, `tenloaisp`) VALUES
(1, 'Bếp điện-từ'),
(2, 'Máy giặt-máy sấy'),
(3, 'chậu rửa'),
(4, 'lò nướng-lò vi sóng'),
(5, 'tủ lạnh'),
(6, 'bếp ga'),
(7, 'dụng cụ nhà bếp');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` int(20) NOT NULL AUTO_INCREMENT,
  `tensp` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaban` float NOT NULL,
  `mota` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluongton` int(20) NOT NULL,
  `mahang` int(20) NOT NULL,
  `maloaisp` int(20) NOT NULL,
  `anh` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`masp`),
  KEY `mahang` (`mahang`,`maloaisp`),
  KEY `maloaisp` (`maloaisp`),
  KEY `mahang_2` (`mahang`),
  KEY `mahang_3` (`mahang`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `giaban`, `mota`, `soluongton`, `mahang`, `maloaisp`, `anh`) VALUES
(2, 'Bếp điện từ đơn Kangaroo KG15IC1', 2460000, 'Công suất nấu 1800W giúp nấu ăn nhanh, tiết kiệm thời gian\r\nMặt bếp chịu nhiệt tốt, sáng bóng, bền, dễ dàng vệ sinh\r\nBảng điều khiển nút nhấn điện tử đơn giản, dễ sử dụng\r\nHẹn giờ nấu tiện dụng và tích hợp nhiều tính năng an toàn', 600, 2, 1, '10050703-bep-dien-tu-don-kangaroo-kg15ic1-1.jpg'),
(3, '10050703-bep-dien-tu-don-kangaroo-kg15ic1-1.jpg', 9000000, 'Mặt bếp bằng kính Ceramic độ, chịu sốc nhiệt và chịu lực tốt.\r\nTổng công suất 3000W với chức năng Booster\r\nVùng nấu hồng ngoại 2 vòng nhiệt tiện dụng\r\nAn toàn với khóa bảng điều khiển', 607, 1, 1, '10050703-bep-dien-tu-don-kangaroo-kg15ic1-1.jpg'),
(4, 'Bếp Từ Siêu Mỏng Kangaroo KG415i ', 999000, 'Bếp Từ Siêu Mỏng Kangaroo KG415i\r\n\r\nBếp Từ Siêu Mỏng Kangaroo KG415i có công suất 2000W với hoa văn đẹp mắt, hỗ trợ đèn LED hiển thị nhiệt độ. Ngoài ra, sản phẩm có phím cảm ứng đa chức năng, mặt kính cao cấp chịu nhiệt và có chức năng cài đặt hẹn giờ. Bếp có 4 chế độ nấu sẽ giúp những người nội trợ tạo ra nhiều món ăn hấp dẫn làm phong phú thêm bữa ăn của gia đình.', 798, 2, 1, '4857613490_1712.jpg'),
(5, 'Bếp Điện Từ Đơn Kangaroo KG18IH2 (1800W)', 1090000, 'Bảng điều khiển	Cảm ứng\r\nThương hiệu	Kangaroo\r\nXuất xứ thương hiệu	Việt Nam\r\nCông suất	1800W\r\nĐiện áp	220-240V - 50/60Hz\r\nKích thước	35 x 28 x 6.5 cm\r\nModel	KG18IH2\r\nXuất xứ	Trung Quốc\r\nTrọng lượng sản phẩm	3.05 Kg', 456, 2, 1, '40042ac05468c34b776a50fd970a9cfa.png'),
(24, 'Máy giặt Samsung Inverter 8 kg WW80T3020WW ', 4700000, 'Tiện ích	Giặt bằng nước nóng, Tiết kiệm điện, Tự khởi động lại khi có điện, Hẹn giờ, Khóa trẻ em, Tự động vệ sinh lồng giặt , Chương trình giặt nhanh\r\nHỗ trợ lắp đặt	Không\r\nBảng điều khiển	Anh - Việt\r\nThương hiệu	Samsung\r\nXuất xứ thương hiệu	Hàn Quốc\r\nChất liệu	\r\nChất liệu lồng giặt:Thép không gỉ\r\nChất liệu nắp máy: Kính chịu lực\r\nChế độ giặt	14 chương trình giặt\r\nChế độ giặt nhanh	Có\r\nChế độ hẹn giờ	Có\r\nCông nghệ giặt	Chế Độ Quick Wash, Chế Độ Drum Clean\r\nĐiện áp	220V - 50Hz\r\nKích thước	59.5 x 85 x 44 (cm)\r\nLồng giặt	Lồng ngang\r\nModel	WW80T3020WW\r\nKhối lượng giặt	8kg\r\nKiểu máy giặt	Cửa trước\r\nXuất xứ	Trung Quốc\r\nTrọng lượng sản phẩm	57kg\r\nTốc độ quay vắt	1200 vòng/phút', 900, 3, 2, '2e2080910aeb92c72509551b7dd9369e.jpg'),
(25, 'Máy giặt Samsung 9.0kg WA90H4200SG/SV', 3700000, 'Hỗ trợ lắp đặt	Không\r\nBảng điều khiển	Tiếng Việt nút nhấn\r\nThương hiệu	Samsung\r\nXuất xứ thương hiệu	Hàn Quốc\r\nChất liệu lồng giặt	Thép không gỉ\r\nChế độ giặt	6 chương trình giặt\r\nChế độ giặt nhanh	Không\r\nChế độ hẹn giờ	Không\r\nCông nghệ giặt	Bộ lọc xơ vải Magic Filter Lồng giặt thiết kế kim cương Mâm giặt Wobble tạo luồng nước đa chiều\r\nModel	WA90H4200SG/SV\r\nKhối lượng giặt	9 Kg\r\nKiểu động cơ	Truyền động gián tiếp (dây Curoa)\r\nXuất xứ	Thái Lan\r\nTrọng lượng sản phẩm	Nặng 30 kg\r\nTốc độ quay vắt	700 vòng/phút', 565, 3, 2, 'b0105ebaea554bcbf422a38f6c238d21.png'),
(26, 'Máy giặt Samsung Inverter 8 kg WW80T3020WW', 5600000, 'Hỗ trợ lắp đặt	Không\r\nBảng điều khiển	Anh - Việt\r\nThương hiệu	Samsung\r\nXuất xứ thương hiệu	Hàn Quốc\r\nChất liệu	\r\nChất liệu lồng giặt:Thép không gỉ\r\nChất liệu nắp máy: Kính chịu lực\r\nChế độ giặt	14 chương trình giặt\r\nChế độ giặt nhanh	Có\r\nChế độ hẹn giờ	Có\r\nCông nghệ giặt	Chế Độ Quick Wash, Chế Độ Drum Clean\r\nĐiện áp	220V - 50Hz\r\nKích thước	59.5 x 85 x 44 (cm)\r\nLồng giặt	Lồng ngang\r\nModel	WW80T3020WW\r\nKhối lượng giặt	8kg\r\nKiểu động cơ	Dẫn động trực tiếp\r\nKiểu máy giặt	Cửa trước\r\nXuất xứ	Trung Quốc\r\nTrọng lượng sản phẩm	57kg\r\nTốc độ quay vắt	1200 vòng/phút\r\nTiện ích	Giặt bằng nước nóng, Tiết kiệm điện, Tự khởi động lại khi có điện, Hẹn giờ, Khóa trẻ em, Tự động vệ sinh lồng giặt , Chương trình giặt nhanh', 900, 3, 2, '2e2080910aeb92c72509551b7dd9369e (1).jpg'),
(27, 'Máy Giặt Samsung Inverter 9 kg WW90T634DLN', 7900000, 'hương hiệu	Samsung\r\nXuất xứ thương hiệu	Hàn Quốc\r\nChất liệu lồng giặt	2nd Diamond\r\nCông nghệ giặt	Bubble Soak, Bubble technology, 15\' Quick Wash, Super Eco Wash, ...\r\nĐiện áp	220V - 50Hz\r\nKích thước	60 x 85 x 55 cm\r\nLồng giặt	Lồng ngang\r\nCông nghệ Inverter	Có\r\nModel	WW90T634DLN\r\nKhối lượng giặt	9kg\r\nKiểu máy giặt	Cửa trước\r\nXuất xứ	Việt Nam\r\nTrọng lượng sản phẩm	67 kg', 600, 3, 2, '2f8711456bb9468f45de760a4cab1ea2.jpg'),
(28, 'Máy giặt Lồng Đứng 7,5kg Casper WT-75N70BGA', 4000000, 'Hỗ trợ lắp đặt	Có\r\nThương hiệu	Casper\r\nXuất xứ thương hiệu	Thái Lan\r\nChất liệu lồng giặt	Thép không gỉ\r\nChế độ giặt nhanh	Có\r\nChế độ hẹn giờ	Không\r\nKích thước	\r\nRộng*Sâu*Cao(mm): 515*525*920.\r\n\r\nLồng giặt	Lồng đứng\r\nModel	Casper\r\nKhối lượng giặt	7.5 kg\r\nKiểu máy giặt	Cửa trên\r\nXuất xứ	Thái Lan\r\nTốc độ quay vắt	700 vòng/phút', 345, 4, 2, '1f0d34f3b652a82a40733c6e8a021017.png'),
(29, 'Máy giặt Inverter Casper 10.5kg WF-105I150BGB', 6800000, 'Hỗ trợ lắp đặt	Không\r\nThương hiệu	Casper\r\nXuất xứ thương hiệu	Thái Lan\r\nChế độ giặt nhanh	Không\r\nChế độ hẹn giờ	Không\r\nModel	WF-105I150BGB\r\nKhối lượng giặt	10.5\r\nXuất xứ	Thái Lan\r\nTrọng lượng sản phẩm	72\r\nTốc độ quay vắt	1500 vòng/phút', 343, 4, 2, 'dc190a4b27631e85dfb2b3ab17646412.png'),
(30, 'Chậu rửa bát inox 304 Pimisi đúc 2 hố cân, lệch - kích thước 7843-8245 cm đầy đủ xi phông dùng để rửa chén bát gắn được cả âm bàn đá', 950000, 'Quy cách đóng gói	\r\nSản phẩm nguyên hộp bao gồm 1 chậu rửa bát 2 hố, cân-lệch tùy chọn ở mục kích thước, 1 bộ phụ kiện xi phông đầy đủ 2 hố inox.\r\n\r\nVòi rửa bát nóng lạnh inox nếu Bạn chọn gói combo có vòi rửa.\r\n\r\nMọi vấn đề cần tư vấn thêm hay Chat với mình ngay khi muốn tìm hiểu thêm trước khi mua.\r\n\r\nThanks.\r\n\r\nThương hiệu	Pimisi\r\nXuất xứ thương hiệu	Nhật Bản\r\nChất liệu	\r\ninox 304\r\n\r\nHướng dẫn bảo quản	\r\nThường xuyên vệ sinh bằng nước sạch hoặc nước rửa bát thông thường.\r\n\r\nKhông lạm dụng chất tẩy rửa có tính Bazơ mạnh.\r\n\r\nModel	PB-7843/8245\r\nKích thước (Dài x Rộng x Cao)	7843/8245\r\nXuất xứ	Việt Nam', 456, 5, 3, '2b84abbd58f652ea5d5e63f59e4c875d.jpg'),
(31, 'Chậu rửa chén bát Sơn Hà S105 Inox Xịn 304', 1690000, '- Kích thước tổng ( Dài x Rộng x Sâu ): 1050 x 440 x 220 ( mm )\r\n\r\n- Kích thước lòng chậu: 393(D) x 363 (R) (mm)\r\n\r\n- Kích thước khoét đá: 1020 x 420 mm\r\n\r\n- Xi fong thoát nước rọ đôi Inox kích thước lớn F140 cho khả năng thoát nước nhanh\r\n\r\n- Bề mặt điện hóa sáng bóng vĩnh viến đảm bảo không xám đen, ố vàng hay hoen rỉ sau nhiều năm sử dụng\r\n\r\n- Mặt ngoài của chậu sơn xi chống ồn, thân thiện và an toàn với môi trường\r\n\r\n- Bề mặt thiết kế 02 lỗ chờ lắp vòi liền chậu tiện dụng\r\n\r\n- Có bàn bên tay trái hoặc bàn bên tay phải phù hợp với mọi người dùng và không gian bếp\r\n\r\n- Trọn bộ sản phẩm: Chậu rửa inox xịn 304 + Xi phông đôi rọ đôi F140\r\n\r\n- Bảo hành 5 Năm\r\n\r\nTẠI SAO NÊN CHỌN DÙNG CHẬU RỬA BÁT SƠN HÀ\r\n\r\nSơn Hà là công ty lớn uy tín nhất về ngành hàng gia dụng inox tại Việt Nam, nhiều năm liền đạt danh hiệu \" thương hiệu quốc gia\" Các sản phẩm của Sơn Hà được sản xuất trên quy trình quản lý chất lượng ISO 9001-2008. Sản phẩm Sơn Hà luôn đạt danh hiệu hàng Việt Nam chất lượng cao do người tiêu dùng bình chọn.\r\n\r\nCAM KẾT CỦA YẾN SƠN HÀ\r\n\r\n- Giao hàng đúng chủng loại, đúng chất lượng đảm bảo chính hãng 100%\r\n\r\n- Sản phẩm mới 100% nguyên bộ\r\n\r\n- Chính sách đổi trả hàng theo chính sách của Shoppe\r\n\r\nCảm ơn quý khách hàng đã ghé thăm sản phẩm trên gian hàng của Yến Sơn Hà trên Shoppe\r\n\r\nMua ngay Chậu rửa bát Sơn Hà, Mua một lần dùng vĩnh viễn, luôn sáng bóng, không hoen rỉ, xám đen hay ố vàng sau rất nhiều năm sử dụng.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....\r\n\r\nSản phẩm này là tài sản cá nhân được bán bởi Nhà Bán Hàng Cá Nhân và không thuộc đối tượng phải chịu thuế GTGT. Do đó hoá đơn VAT không được cung cấp trong trường hợp này.\r\n\r\n', 787, 5, 3, 'bd29250dcb5262e1112ca0ffe4b61eac.jpg'),
(32, 'Chậu rửa bát inox Luxury Sơn Hà', 2200000, 'Thương hiệu	OEM\r\nXuất xứ thương hiệu	Việt Nam\r\nChất liệu	Inox 304\r\nModel	Luxury HM.X.2C.82.2.3\r\nKích thước (Dài x Rộng x Cao)	82 x 45 x 21,5 cm\r\nXuất xứ	Việt Nam\r\nTrọng lượng sản phẩm	10,5 kg', 245, 5, 3, 'cf6cc347595f9a878986e9eaa930789b.jpg'),
(33, 'Combo Chậu Rửa Chén Đúc Inox 304 Kích Thước 82x45 cm ,vòi rửa chén vuông nóng lạnh,bình xà phòng , rỗ đựng chén', 1123000, ' Ưu điểm vượt trội: Độ dày mặt bàn 3mm.\r\n\r\n+ Được thiết kế một cách tỉ mỉ tới từng chi tiết riêng tạo nên dáng vẻ sang trọng và lịch lãm cho chậu rửa Inox \r\n\r\n+ Nguyên liệu sản xuất INOX SUS 304 , vì vậy sản phẩm chậu rửa luôn hạn chế bám bụi, không tác dụng với hoá chất thông thường, dễ dàng vệ sinh và có độ bền rất cao. Mang phong cách hiện đại sang trọng cho không gian bếp nhà bạn.\r\n\r\n+ Xi phông: Được thiết kế 02 lớp bên trong bằng Inox Sus 304, bên ngoài được bảo vệ bằng lớp nhựa HDPE  nhằm tăng độ bền cao nhất. Xi phông của chậu rửa Inox có tính năng Chống bốc ngược mùi do được thiết kế khoa học, kết cấu đặc biệt nhất hiện nay.\r\n\r\n+ Ruột gà: Bên trong có lõi thép nhằm tăng cường độ bền, sự linh hoạt, chắc chắn, dẻo dai, dễ lắp đặt. \r\n\r\n+ Chậu rửa Inox có chống ồn đáy bồ\r\n\r\nChiều dài:       820mm\r\n\r\nChiều rộng:   450mm\r\n\r\nChiều sâu:      230mm ', 245, 6, 3, '79548ee6992e12f153a6cace6c1d82df.jpg'),
(34, 'Chậu rửa chén một hố lớn inox 304', 33200000, '* Chậu inox 304 phủ Nano Đen Cao Cấp 75 x46 GỒM VÒI THÁC NƯỚC chống bám bẩn, chống trầy xước. (bộ xả + khay + khay nghiêng+ thớt + vòi thác)\r\n\r\nĐộ dày inox : 3.5 mm - 1.2 mm\r\nKích thước mặt chậu :750x460 mm\r\nKích thước cắt đá dương : 720x430mm-R20\r\nKích thước cắt đá âm: 715 x 365 mm-R20\r\nKích thước hố sử dụng: 715x365 mm\r\n\r\n* Chậu thiết kế có vòi thác nước dùng để rủa rau, quả, thớ\r\n\r\n* Chậu thiết kế kiểu vuông giúp mở rộng dung tích chứa đựng so với dòng truyền thống đáy tròn, và với các phần góc bo tròn, nên dễ dàng vệ sinh lau rửa bề mặt\r\n\r\n* Đáy chậu có độ dốc giúp thoát nước dễ dàng\r\n\r\n* Chậu kích thước dài phù hợp với đa số không gian bếp của các gia đình hiện nay\r\n\r\n* Chậu đúc đáy vuông cứng cáp\r\n\r\n* Mặt thành chậu dày cứng\r\n\r\n* Chậu rửa chén thiết kế thông minh với rãnh thoát nước chống tràn, trường hợp xả nước quên tắt sẽ không lo nước bị đầy tràn ra sàn bếp.\r\n\r\n* Bộ ống xả xi phông thiết kế chống hôi tuyệt đối, ống xả lớn nên hoàn toàn không có gây tắc nghẹt đường ống.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....\r\n\r\nSản phẩm này là tài sản cá nhân được bán bởi Nhà Bán Hàng Cá Nhân và không thuộc đối tượng phải chịu thuế GTGT. Do đó hoá đơn VAT không được cung cấp trong trường hợp này.\r\n\r\n', 346, 6, 3, '77a066c9a0bf16d5ec2958151a4e1d9b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `sodienthoai` (`sodienthoai`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `sodienthoai`, `name`, `password`, `diachi`, `gioitinh`) VALUES
(1, 'aaa@gmail.com', '0123456789', 'Vũ Văn Phước', '99999', 'aaa', ''),
(2, 'ssdsgd@gmail.com', '98989898', 'Vũ Văn Phước', '99999', 'fgffgfg', 'nam'),
(3, 'asd@gmail.com', '56565656', 'Vũ Văn Phước', '99999', 'rerere', 'nam');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

DROP TABLE IF EXISTS `useradmin`;
CREATE TABLE IF NOT EXISTS `useradmin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hangsanpham`
--
ALTER TABLE `hangsanpham`
  ADD CONSTRAINT `hangsanpham_ibfk_1` FOREIGN KEY (`maloaisp`) REFERENCES `loaisanpham` (`maloaisp`);

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
