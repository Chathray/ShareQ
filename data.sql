-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2019 at 03:17 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `share2q`
--

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

DROP TABLE IF EXISTS `docs`;
CREATE TABLE IF NOT EXISTS `docs` (
  `id` bigint(12) NOT NULL,
  `ownerid` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL DEFAULT '',
  `info` varchar(1000) DEFAULT '',
  `year` varchar(5) NOT NULL,
  `url` varchar(100) NOT NULL,
  `tags` varchar(1000) DEFAULT '',
  `pages` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `ext` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owd_id` (`ownerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `ownerid`, `title`, `info`, `year`, `url`, `tags`, `pages`, `size`, `ext`) VALUES
(15758844142846, 4051050180, 'SRS - Nguyen Chi Thach', '', '2019', '5dee167e45814.pdf', '', 'incomplete', '489.14 KB', 'pdf'),
(15758844226853, 4051050180, 'CCNA Cơ Bản - Bach Khoa Aptech', '', '2019', '5dee1686a74fa.pdf', '', 'incomplete', '7.88 MB', 'pdf'),
(15758844421935, 4051050180, 'Giao_khoa_chuyen_tin_1', '', '2019', '5dee169a2f3f1.pdf', '', 'incomplete', '2.14 MB', 'pdf'),
(15758844448920, 4051050180, 'Giao_khoa_chuyen_tin_2', '', '2019', '5dee169cd9c98.pdf', '', 'incomplete', '1.81 MB', 'pdf'),
(15758844481299, 4051050180, 'Giao_khoa_chuyen_tin_3', '', '2019', '5dee16a01fb85.pdf', '', 'incomplete', '29.35 MB', 'pdf'),
(15758844559819, 4051050180, 'Gioi thieu ve thuat toan', '', '2019', '5dee16a7efbbc.pdf', '', 'incomplete', '37.71 MB', 'pdf'),
(15758844727257, 4051050180, 'Joshua Bloch - Effective Java, Addison-Wesley (2017)', '', '2019', '5dee16b8b130a.pdf', '', 'incomplete', '2.19 MB', 'pdf'),
(15758844814143, 4051050180, 'Jon Skeet - C# in Depth, Manning Publications (2019)', '', '2019', '5dee16c1652a5.pdf', '', 'incomplete', '5.03 MB', 'pdf'),
(15758844874596, 4051050180, 'Charles Petzold - Programming Microsoft Windows with C#', '', '2019', '5dee16c770399.pdf', '', 'incomplete', '8.91 MB', 'pdf'),
(15758845238207, 4051050180, 'John V. Guttag - Introduction to Computation and Programming Using Python, The MIT Press (2016)', '', '2019', '5dee16ebc8626.pdf', '', 'incomplete', '8.52 MB', 'pdf'),
(15758845408446, 4051050180, 'HTML and CSS Design and Build Websites', '', '2019', '5dee16fcce337.pdf', '', 'incomplete', '18.78 MB', 'pdf'),
(15758845547485, 4051050180, 'Robert C. Martin - Чистый код', '', '2019', '5dee170ab6c01.pdf', '', 'incomplete', '2.95 MB', 'pdf'),
(15759811038688, 4051050180, 'Bài trình bày Share2Q', '', '2019', '5def902fd421a.png', '', 'uncountable', '217.36 KB', 'png'),
(15759811157009, 4051050180, 'Smart_Home', '', '2019', '5def903bab247.docx', '', 'incomplete', '293.79 KB', 'docx'),
(15759811399072, 4051050180, 'nhatthongminh', '', '2019', '5def9053dd80e.docx', '', 'incomplete', '128.74 KB', 'docx'),
(15767634527046, 4051050180, 'Báo-cáo-cuối-kỳ_-Smart-Home', '', '2019', '5dfb803cac06c.pdf', '', 'incomplete', '809.20 KB', 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `favs`
--

DROP TABLE IF EXISTS `favs`;
CREATE TABLE IF NOT EXISTS `favs` (
  `docid` bigint(12) NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`docid`,`userid`),
  KEY `df_id` (`docid`),
  KEY `uf_id` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favs`
--

INSERT INTO `favs` (`docid`, `userid`) VALUES
(15758845408446, 4051050180),
(15758845547485, 4051050180),
(15759811038688, 4051050180),
(15759811157009, 4051050180),
(15759811399072, 4051050180),
(15758844421935, 4051050181);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `header` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=856 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `header`, `content`, `time`, `state`) VALUES
(1, 'Giới thiệu ngắn về ShareQ', '<div class=\"modal-body\">\r\n                <div class=\"text-center\">\r\n                    <img class=\"img-profile\" src=\"img/logo.svg\" width=\"96\">\r\n                </div>\r\n                <div class=\"text-justify pt-2\">\r\n                    Share<sup>2Q</sup> là một ứng dụng web để lưu trữ tập tin, phân phối và chia sẻ giải pháp cho cộng đồng sinh viên QNU. Nó cung cấp một không gian dựa trên web mà tập tin có thể được lưu trữ an toàn và chia sẻ với những người khác - ở bất cứ đâu, bất cứ lúc nào.\r\n                        <div class=\"text-center pt-2\">\r\n                            <div>✤</div>\r\n                            Nguyễn Chí Thạch\r\n                            <br>Huỳnh Đông Dương\r\n                            <br>Nguyễn Minh Thi\r\n                            <br>Nguyễn Huy Hoàng.\r\n                        </div>\r\n                </div>\r\n            </div>', '2019-11-01', 1),
(2, 'Những tính năng chính của Share2Q', '<div class=\"card-body\">\r\n                  <p>Use Font Awesome Icons (included with this theme package) along with the circle buttons as shown in the examples below!</p>\r\n                  <!-- Circle Buttons (Default) -->\r\n                  <div class=\"mb-2\">\r\n                    <code>.btn-circle</code>\r\n                  </div>\r\n                  <a href=\"#\" class=\"btn btn-primary btn-circle\">\r\n                    <i class=\"fab fa-facebook-f\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-success btn-circle\">\r\n                    <i class=\"fas fa-check\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-info btn-circle\">\r\n                    <i class=\"fas fa-info-circle\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-warning btn-circle\">\r\n                    <i class=\"fas fa-exclamation-triangle\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-danger btn-circle\">\r\n                    <i class=\"fas fa-trash\"></i>\r\n                  </a>\r\n                  <!-- Circle Buttons (Small) -->\r\n                  <div class=\"mt-4 mb-2\">\r\n                    <code>.btn-circle .btn-sm</code>\r\n                  </div>\r\n                  <a href=\"#\" class=\"btn btn-primary btn-circle btn-sm\">\r\n                    <i class=\"fab fa-facebook-f\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-success btn-circle btn-sm\">\r\n                    <i class=\"fas fa-check\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-info btn-circle btn-sm\">\r\n                    <i class=\"fas fa-info-circle\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-warning btn-circle btn-sm\">\r\n                    <i class=\"fas fa-exclamation-triangle\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-danger btn-circle btn-sm\">\r\n                    <i class=\"fas fa-trash\"></i>\r\n                  </a>\r\n                  <!-- Circle Buttons (Large) -->\r\n                  <div class=\"mt-4 mb-2\">\r\n                    <code>.btn-circle .btn-lg</code>\r\n                  </div>\r\n                  <a href=\"#\" class=\"btn btn-primary btn-circle btn-lg\">\r\n                    <i class=\"fab fa-facebook-f\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-success btn-circle btn-lg\">\r\n                    <i class=\"fas fa-check\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-info btn-circle btn-lg\">\r\n                    <i class=\"fas fa-info-circle\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-warning btn-circle btn-lg\">\r\n                    <i class=\"fas fa-exclamation-triangle\"></i>\r\n                  </a>\r\n                  <a href=\"#\" class=\"btn btn-danger btn-circle btn-lg\">\r\n                    <i class=\"fas fa-trash\"></i>\r\n                  </a>\r\n                </div>', '2019-11-20', 2),
(3, 'Share2Q lần đầu chạy thử trên hệ thống', '<iframe src=\"http://localhost/Share2Q/index.php\" width=\"100%\" height=\"500px\" frameborder=\"0\" scrolling=\"no\"></iframe>', '2019-11-15', 1),
(5, 'Thư viện JavaScript 3D', '<iframe id=\"result\" src=\"https://threejs.org/\" width=\"100%\" height=\"500px\" frameborder=\"0\" scrolling=\"no\"></iframe>', '2019-11-16', 0),
(7, 'Một thư viện JavaScript nhẹ để tạo hạt', '<iframe id=\"result\" src=\"https://vincentgarreau.com/particles.js/\" width=\"100%\" height=\"500px\" frameborder=\"0\" scrolling=\"no\"></iframe>', '2019-11-15', 0),
(8, 'Easing Functions Cheat Sheet', '<iframe id=\"result\" src=\"https://easings.net/en\" width=\"100%\" height=\"500px\" frameborder=\"0\" scrolling=\"no\"></iframe>', '2019-11-13', 2),
(9, 'Overlay Scrollbars - thanh cuộn Javascript', '<iframe id=\"result\" src=\"https://kingsora.github.io/OverlayScrollbars/#!overview\" width=\"100%\" height=\"500px\" frameborder=\"0\" scrolling=\"no\"></iframe>', '2019-11-15', 2),
(10, 'AMP - một khuôn khổ thành phần web để dễ dàng tạo ra kinh nghiệm web người dùng đầu tiên', '<iframe id=\"result\" src=\"https://amp.dev/\" width=\"100%\" height=\"500px\" frameborder=\"0\" scrolling=\"no\"></iframe>', '2019-11-15', 1),
(12, 'Nhóm tác giả Share2Q gửi lời cảm ơn tới các thành viên', '<iframe id=\"result\" src=\"https://www.blackbox.cool/\" width=\"100%\" height=\"500px\" frameborder=\"0\" scrolling=\"no\"></iframe>', '2019-11-16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(4051050180, 'Chath Guy', '', 'chithachnguyen@outlook.com'),
(4051050181, 'Lan Seung', '', 'lanyngueynie@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `docs`
--
ALTER TABLE `docs`
  ADD CONSTRAINT `owd_id` FOREIGN KEY (`ownerid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
