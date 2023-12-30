-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2023 lúc 01:39 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webanime`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `nguoidung_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ngaytao` datetime NOT NULL DEFAULT current_timestamp(),
  `quyen_id` int(11) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`nguoidung_id`, `name`, `email`, `password`, `ngaytao`, `quyen_id`) VALUES
(100, 'hinh2003', 'vanhinh2003@gmail.com', '$2y$10$Y2S4rbNpbV6a4tDYJ3QDJ.Wy6Ep/yy7bBP2Gf6R2qAjV9IoExVwRC', '2023-12-17 14:45:50', 1),
(102, 'hinh20031', 'Hinh200312@gamil.com', '$2y$10$8xv8hX3GUcI9DR30acmHZu8WiyvV2tQjxamySKrvNMZOJMpmRAe9S', '2023-12-17 16:32:09', 2),
(103, 'hinh200312', 'Hinh20031@gmasil.com', '$2y$10$exa.2uipNIvdm9AMtKp4ZeqpSfMkLIWLcS51i1apuftY65P5kezgm', '2023-12-17 17:48:47', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nuoc`
--

CREATE TABLE `nuoc` (
  `nuoc_id` int(11) NOT NULL,
  `ten_nuoc` varchar(100) NOT NULL,
  `mieuta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nuoc`
--

INSERT INTO `nuoc` (`nuoc_id`, `ten_nuoc`, `mieuta`) VALUES
(1, 'Nhật bản', 'cc'),
(2, 'Trung quốc', 'cc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `phim_id` int(11) NOT NULL,
  `ten_phim` varchar(255) NOT NULL,
  `sotap` int(11) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `Nam` year(4) NOT NULL DEFAULT current_timestamp(),
  `mieuta` text NOT NULL,
  `nuoc_id` int(11) DEFAULT NULL,
  `trangthai_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`phim_id`, `ten_phim`, `sotap`, `anh`, `Nam`, `mieuta`, `nuoc_id`, `trangthai_id`) VALUES
(28, 'BUTA NO LIVER WA KANETSU SHIRO', 16, 'BUTA NO LIVER WA KANETSU SHIRO.avif', '2023', 'Bị biến thành lợn sau khi chuyển sinh! Cơ mà nếu được chăm nom bởi một thiếu nữ xinh đẹp thì có lẽ cuộc hành trình này cũng không tệ lắm nhỉ? Tôi, một gã Otaku tẻ nhạt, đã bị mất đi ý thức sau khi ăn gan lợn sống. Cứ ngỡ bản thân đã được chuyển sinh sang dị giới, nhưng không ngờ lại phải mang hình hài của một con heo! Và rồi Jess, cô thiếu nữ có khả năng đọc thấu nội tâm của người khác, đã cưu mang chú lợn đang phải nằm lăn lóc trong chuồng heo này. Ụt ịt! Dễ thương quá! Nhờ tầm nhìn của loài heo, tôi có thể nhìn thấy một màu trắng tinh khôi đằng sau tà váy… “À nô, em có nghe thấy tiếng nói trong đầu của anh đó…” Chết dở! Dục vọng của tôi, nó cứ rò rỉ ra!  “Nếu anh muốn, thì một chút thôi cũng được ạ”  Ế, chờ…!? Tưởng tượng mà xem, một cuộc sống dưới sự chăm sóc của cô thiếu nữ trong sáng, người cũng đã đón nhận cái dục vọng cầm thú của tôi (dù có chút e dè), thì sẽ thế nào đây. Hừm hừm, làm lợn có lẽ cũng không tệ lắm nhỉ? Đây sẽ là câu chuyện về cuộc phiêu lưu ụt ụt của chúng tôi… hoặc đáng ra đã là vậy. Thế mà Jess ơi, tại sao em lại bị người ta muốn đoạt mạng vậy hả? Nào, hỡi chú lợn vốn thiếu thốn cả ma pháp lẫn kỹ năng chiến đấu, hãy tận dụng trí tuệ, óc nhạy bén và cả khứu giác để cứu lấy cô thiếu nữ đang bị giam cầm trong cái định mệnh nghiệt ngã này! Tác phẩm thể loại fantasy, từng đoạt giải Vàng tại Dengeki Bunko Prize lần thứ 26, chuyển sinh thành lợn!', 1, 1),
(29, 'CAPTAIN TSUBASA SEASON 2', 13, 'CAPTAIN TSUBASA SEASON 2.avif', '2023', 'Phần mới này bắt đầu khi Tsubasa và đội tới Pháp để thi đấu trong Giải đấu Thanh niên Quốc tế. Các cầu thủ bóng đá ưu tú của Nhật Bản phải đối đầu với những cầu thủ xuất sắc nhất thế giới bóng đá, bao gồm Schneider của Đức, Pierre của Pháp, Diaz của Argentina và Heandez của Ý cùng với một loạt đối thủ mới khác.', 1, 1),
(30, 'CHÂN VÕ ĐỈNH PHONG', 13, 'CHÂN VÕ ĐỈNH PHONG.avif', '2023', 'Phim rat hay', 1, 1),
(31, 'CỬU THẦN PHONG VÂN LỤC', 26, 'CỬU THẦN PHONG VÂN LỤC.avif', '2023', 'Phim rat hay', 2, 1),
(32, 'DARK GATHERING', 13, 'DARK GATHERING.avif', '2023', 'Phim rat hay', 1, 1),
(33, 'DEAD MOUNT DEATH PLAY', 13, 'DEAD MOUNT DEATH PLAY.avif', '2023', 'Phim rat hay', 1, 1),
(34, 'DEKOBOKO MAJO NO OYAKO JIJOU', 13, 'DEKOBOKO MAJO NO OYAKO JIJOU.avif', '2023', 'Phim rat hay', 1, 1),
(35, 'ĐỘC BỘ TIÊU DAO', 13, 'ĐỘC BỘ TIÊU DAO.avif', '2023', 'Phim rat hay', 1, 1),
(36, 'GIÀ THIÊN', 13, 'GIÀ THIÊN.avif', '2023', 'Phim rat hay', 1, 1),
(37, 'HELCK', 13, 'HELCK.avif', '2023', 'Phim rat hay', 1, 1),
(38, 'HIKIKOMARI KYUUKETSUKI NO MONMON', 13, 'HIKIKOMARI KYUUKETSUKI NO MONMON.avif', '2023', 'Phim rat hay', 1, 1),
(39, 'KAMONOHASHI RON NO KINDAN SUIRI', 13, 'KAMONOHASHI RON NO KINDAN SUIRI.avif', '2023', 'Phim rat hay', 1, 1),
(40, 'KIKANSHA NO MAHOU WA TOKUBETSU DESU', 13, 'KIKANSHA NO MAHOU WA TOKUBETSU DESU.avif', '2023', 'Phim rat hay', 2, 1),
(41, 'LINH KIẾM TÔN', 13, 'LINH KIẾM TÔN.avif', '2023', 'Phim rat hay', 2, 1),
(43, 'NÀNG TA KHÔNG LÀM NỮ CHÍNH LÂU RỒI', 13, 'NÀNG TA KHÔNG LÀM NỮ CHÍNH LÂU RỒI.avif', '2023', 'Phim rat hay', 2, 2),
(44, 'NGẠO THẾ CỬU TRÙNG THIÊN', 13, 'NGẠO THẾ CỬU TRÙNG THIÊN.avif', '2023', 'Phim rat hay', 2, 1),
(45, 'POTION-DANOMI DE IKINOBIMASU!', 13, 'POTION-DANOMI DE IKINOBIMASU!.avif', '2023', 'Phim rat hay', 1, 1),
(46, 'SAIHATE NO PALADIN', 13, 'SAIHATE NO PALADIN.avif', '2023', 'Phim rat hay', 1, 1),
(47, 'SEIJO NO MARYOKU WA BANNOU DESU 2ND SEASON', 13, 'SEIJO NO MARYOKU WA BANNOU DESU 2ND SEASON.avif', '2023', 'Phim rat hay', 1, 1),
(48, 'SEIKEN GAKUIN NO MAKENTSUKAI', 13, 'SEIKEN GAKUIN NO MAKENTSUKAI.avif', '2023', 'Phim rat hay', 1, 1),
(49, 'SPY SS1', 13, 'SHY.avif', '2023', 'Phim rat hay', 1, 1),
(50, 'SPY SS2', 13, 'spy.jpg', '2023', 'Phim rat hay', 1, 1),
(51, 'THE IDOLM@STER MILLION LIVE!', 13, 'THE IDOLM@STER MILLION LIVE!.jpg', '2023', 'Phim rat hay', 1, 1),
(52, 'TOARU OSSAN NO VRMMO KATSUDOUKI', 13, 'TOARU OSSAN NO VRMMO KATSUDOUKI.avif', '2023', 'Phim rat hay', 1, 1),
(53, 'TRẤN HỒN NHAI 3', 13, 'TRẤN HỒN NHAI 3.avif', '2023', 'Phim rat hay', 1, 1),
(54, 'TUYỆT THẾ VÕ HỒN', 13, 'TUYỆT THẾ VÕ HỒN.avif', '2023', 'Phim rat hay', 2, 1),
(60, 'DR. STONE: NEW WORLD', 14, 'ZlyBaHi.avif', '2023', 'Phim rat hay', 1, 2),
(70, 'ULTRAMAN Z', 13, 'GSgBYHK.avif', '2023', 'Phim rat hay', 1, 1),
(71, 'BULLBUSTER', 13, 'X3xSDWP.avif', '2023', 'Phim rat hay', 1, 2),
(72, 'THIÊN QUAN TỨ PHÚC 2', 14, 'keynKRL.avif', '2023', 'Phim rat hay', 2, 2),
(73, 'BĂNG HỎA MA TRÙ', 13, 'y7U1vUn.avif', '2023', 'Phim rat hay', 2, 1),
(74, 'BÁCH LUYỆN THÀNH THẦN', 14, '0Hh2SUO.avif', '2023', 'Phim rat hay', 2, 2),
(75, 'VÕ ÁNH TAM THIÊN ĐẠO', 14, 'XYOYlja.avif', '2023', 'Phim rat hay', 1, 1),
(76, 'ĐẤU PHÁ THƯƠNG KHUNG PHẦN 5', 14, 'QAFnG70.avif', '2023', 'Phim rat hay', 2, 2),
(77, 'TAM THẬP LỤC KỴ', 14, 'sEDFJXy.avif', '2023', 'Phim rat hay', 2, 1),
(78, ' NGẠO THẾ CỬU TRÙNG THIÊN', 14, '0InMibV.avif', '2023', 'Phim rat hay', 2, 2),
(79, 'PHÒNG BÍ MẬT CỦA ÁI U', 14, 'eZ8SSqa.avif', '2023', 'Phim rat hay', 2, 2),
(80, 'ZOM 100: ZOMBIE NI NARU MADE NI SHITAI 100 NO KOTO', 14, 'TJifsQl.avif', '2023', 'Trong một căn hộ đầy rác, Akira Tendou, 24 tuổi, xem một bộ phim xác sống với đôi mắt vô hồn và ghen tị. Sau ba năm khổ cực tại một tập đoàn bóc lột ở Nhật Bản, tinh thần của anh suy sụp. Anh ấy thậm chí không thể lấy hết can đảm để thổ lộ tình cảm của mình với cô đồng nghiệp xinh đẹp Ootori. Rồi một buổi sáng, anh tình cờ thấy chủ nhà của mình đang ăn trưa—tình cờ lại là một người thuê nhà khác! Cả thành phố tràn ngập thây ma, và mặc dù đang chạy trốn, Akira chưa bao giờ cảm thấy mình còn sống hơn thế! (Nguồn: VIZ Media) Tập 1 đã được xem trước tại buổi chiếu tại Anime Expo vào ngày 1 tháng 7 năm 2023. Việc phát sóng thường xuyên bắt đầu vào ngày 9 tháng 7 năm 2023.', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim_yeuthich`
--

CREATE TABLE `phim_yeuthich` (
  `yeuthich_id` int(11) NOT NULL,
  `nguoidung_id` int(11) DEFAULT NULL,
  `phim_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phim_yeuthich`
--

INSERT INTO `phim_yeuthich` (`yeuthich_id`, `nguoidung_id`, `phim_id`) VALUES
(34, 100, 29),
(35, 100, 32),
(37, 100, 36),
(54, 100, 79),
(38, 102, 28),
(40, 102, 29),
(52, 102, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `quyen_id` int(11) NOT NULL,
  `ten_quyen` varchar(100) NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`quyen_id`, `ten_quyen`, `mota`) VALUES
(1, 'Admin', 'Quyền cao  nhất'),
(2, 'QTV', 'Đăng bài'),
(3, 'Người Dùng', 'Bình thường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tapphim`
--

CREATE TABLE `tapphim` (
  `tapphim_id` int(11) NOT NULL,
  `tap` int(11) NOT NULL,
  `link_tap` varchar(255) NOT NULL,
  `phim_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `theloai_id` int(11) NOT NULL,
  `ten_theloai` varchar(100) NOT NULL,
  `mieuta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`theloai_id`, `ten_theloai`, `mieuta`) VALUES
(1, 'Hài kịch', 'ccc'),
(2, 'Kinh dị', 'ccc'),
(6, 'Trinh thám', 'Rất Hay'),
(7, 'Lãng Mạng', 'Ngọt'),
(9, 'Hành dộng', 'đấm nhau vỡ đầu'),
(10, 'Viễn tưởng', 'sdhfgsdf'),
(11, 'Super Power', 'Hhhh'),
(12, 'Học Đường', 'Ngọt'),
(13, 'Shounen', 'Hhhh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloaiphim`
--

CREATE TABLE `theloaiphim` (
  `theloaiphim_id` int(11) NOT NULL,
  `phim_id` int(11) NOT NULL,
  `theloai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theloaiphim`
--

INSERT INTO `theloaiphim` (`theloaiphim_id`, `phim_id`, `theloai_id`) VALUES
(43, 28, 9),
(44, 28, 7),
(45, 29, 9),
(46, 29, 1),
(50, 30, 6),
(51, 30, 9),
(52, 30, 1),
(60, 32, 7),
(61, 32, 2),
(64, 60, 6),
(70, 70, 2),
(71, 70, 9),
(72, 70, 10),
(73, 71, 9),
(74, 71, 1),
(75, 71, 7),
(76, 72, 7),
(77, 72, 10),
(79, 73, 9),
(80, 74, 9),
(86, 75, 9),
(87, 76, 9),
(88, 76, 10),
(89, 77, 13),
(90, 77, 7),
(91, 77, 11),
(92, 78, 11),
(93, 78, 9),
(94, 79, 9),
(95, 79, 1),
(96, 79, 7),
(97, 31, 2),
(98, 31, 7),
(99, 33, 6),
(100, 33, 13),
(101, 34, 13),
(102, 34, 11),
(103, 34, 6),
(104, 35, 13),
(105, 35, 10),
(106, 35, 6),
(107, 36, 13),
(108, 36, 2),
(109, 36, 6),
(110, 37, 13),
(111, 37, 6),
(112, 38, 11),
(113, 38, 13),
(114, 39, 7),
(115, 39, 13),
(116, 39, 1),
(117, 40, 13),
(118, 40, 6),
(119, 41, 13),
(120, 41, 11),
(121, 41, 9),
(122, 43, 13),
(123, 43, 2),
(124, 43, 11),
(125, 44, 7),
(126, 44, 13),
(127, 44, 6),
(128, 44, 11),
(129, 45, 13),
(130, 45, 7),
(131, 45, 6),
(132, 46, 13),
(133, 46, 11),
(134, 46, 2),
(135, 46, 6),
(136, 47, 13),
(137, 47, 11),
(138, 47, 7),
(139, 80, 9),
(140, 80, 1),
(141, 80, 2),
(142, 80, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `trangthai_id` int(11) NOT NULL,
  `ten_trangthai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`trangthai_id`, `ten_trangthai`) VALUES
(1, 'Hoàn Thành'),
(3, 'kết thúc'),
(2, 'Tiếp tục');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`nguoidung_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `quyen_id` (`quyen_id`);

--
-- Chỉ mục cho bảng `nuoc`
--
ALTER TABLE `nuoc`
  ADD PRIMARY KEY (`nuoc_id`),
  ADD UNIQUE KEY `ten_nuoc` (`ten_nuoc`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`phim_id`),
  ADD UNIQUE KEY `ten_phim` (`ten_phim`),
  ADD KEY `nuoc_id` (`nuoc_id`),
  ADD KEY `trangthai_id` (`trangthai_id`);

--
-- Chỉ mục cho bảng `phim_yeuthich`
--
ALTER TABLE `phim_yeuthich`
  ADD PRIMARY KEY (`yeuthich_id`),
  ADD UNIQUE KEY `nguoidung_id` (`nguoidung_id`,`phim_id`),
  ADD KEY `phim_id` (`phim_id`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`quyen_id`),
  ADD UNIQUE KEY `ten_quyen` (`ten_quyen`);

--
-- Chỉ mục cho bảng `tapphim`
--
ALTER TABLE `tapphim`
  ADD PRIMARY KEY (`tapphim_id`),
  ADD UNIQUE KEY `tap` (`tap`),
  ADD UNIQUE KEY `link_tap` (`link_tap`),
  ADD KEY `phim_id` (`phim_id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`theloai_id`),
  ADD UNIQUE KEY `ten_theloai` (`ten_theloai`);

--
-- Chỉ mục cho bảng `theloaiphim`
--
ALTER TABLE `theloaiphim`
  ADD PRIMARY KEY (`theloaiphim_id`),
  ADD KEY `theloai_id` (`theloai_id`),
  ADD KEY `phim_id` (`phim_id`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`trangthai_id`),
  ADD UNIQUE KEY `ten_trangthai` (`ten_trangthai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `nguoidung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `nuoc`
--
ALTER TABLE `nuoc`
  MODIFY `nuoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `phim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `phim_yeuthich`
--
ALTER TABLE `phim_yeuthich`
  MODIFY `yeuthich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `quyen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tapphim`
--
ALTER TABLE `tapphim`
  MODIFY `tapphim_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `theloai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `theloaiphim`
--
ALTER TABLE `theloaiphim`
  MODIFY `theloaiphim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `trangthai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`quyen_id`) REFERENCES `quyen` (`quyen_id`);

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `phim_ibfk_1` FOREIGN KEY (`nuoc_id`) REFERENCES `nuoc` (`nuoc_id`),
  ADD CONSTRAINT `phim_ibfk_2` FOREIGN KEY (`trangthai_id`) REFERENCES `trangthai` (`trangthai_id`);

--
-- Các ràng buộc cho bảng `phim_yeuthich`
--
ALTER TABLE `phim_yeuthich`
  ADD CONSTRAINT `phim_yeuthich_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`nguoidung_id`),
  ADD CONSTRAINT `phim_yeuthich_ibfk_2` FOREIGN KEY (`phim_id`) REFERENCES `phim` (`phim_id`);

--
-- Các ràng buộc cho bảng `tapphim`
--
ALTER TABLE `tapphim`
  ADD CONSTRAINT `tapphim_ibfk_1` FOREIGN KEY (`phim_id`) REFERENCES `phim` (`phim_id`);

--
-- Các ràng buộc cho bảng `theloaiphim`
--
ALTER TABLE `theloaiphim`
  ADD CONSTRAINT `theloaiphim_ibfk_1` FOREIGN KEY (`phim_id`) REFERENCES `phim` (`phim_id`),
  ADD CONSTRAINT `theloaiphim_ibfk_2` FOREIGN KEY (`theloai_id`) REFERENCES `theloai` (`theloai_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
