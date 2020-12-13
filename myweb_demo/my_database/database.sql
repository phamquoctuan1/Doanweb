-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 12:26 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Phạm Quốc Tuấn', 'tuan123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '100', NULL, '2020-11-28 16:06:35', '2020-11-28 16:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `category_id`, `slug`) VALUES
(1, 'Asus - ZenFones', 28, 'asus-zenfones'),
(2, 'Samsung', 28, 'samsung'),
(3, 'LENOVO', 29, 'lenovo'),
(4, 'DELL', 29, 'dell'),
(5, 'ASUS', 29, 'asus'),
(6, 'HP', 29, 'hp'),
(7, 'Máy bộ DELL', 30, 'may-bo-dell'),
(8, 'Máy bộ Asus - Gamming', 30, 'may-bo-asus-gamming'),
(10, 'Apple', 28, 'apple'),
(11, 'ONE PLUS', 28, 'one-plus');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(28, 'Mobile - Điện thoại', 'mobile-dien-thoai', 0, '2020-11-28 12:16:46', '2020-11-28 12:16:46'),
(29, 'LAPTOP - Máy tính xách tay', 'laptop-may-tinh-xach-tay', 0, '2020-11-28 12:16:46', '2020-11-28 12:16:46'),
(30, 'PC - Máy bộ', 'pc-may-bo', 0, '2020-11-28 12:17:55', '2020-11-28 12:17:55'),
(34, 'TIN TỨC - KHUYẾN MÃI', 'tin-tuc-khuyen-mai', 0, '2020-11-28 16:35:48', '2020-11-28 16:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `detail_img`
--

CREATE TABLE `detail_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `images_url` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_img`
--

INSERT INTO `detail_img` (`id`, `images_url`, `pro_id`, `created_at`, `updated_at`) VALUES
(66, 'asus-zenfone-max-pro-m1.jpg', 70, '2020-11-28 12:24:25', '2020-11-28 12:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_11_13_131139_create_admin_users_table', 1),
('2016_11_24_011241_create_categor_table', 1),
('2016_11_24_011515_create_products_table', 1),
('2016_11_24_012823_create_pro_details_table', 1),
('2016_11_24_013636_create_detal_img_table', 1),
('2016_11_24_014238_create_news_table', 1),
('2016_11_24_014742_create_banners_table', 1),
('2016_12_01_161126_create_oders_table', 2),
('2016_12_02_015703_create_oders_detail_table', 3),
('2016_12_02_023327_create_oders_table', 4),
('2016_12_02_023343_create_oders_detail_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `c_id` int(10) UNSIGNED NOT NULL,
  `amount` float NOT NULL,
  `order_status` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `c_id`, `amount`, `order_status`, `note`, `created_at`, `updated_at`) VALUES
(53, 9, 56800000, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `price` float NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `o_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`price`, `pro_id`, `qty`, `o_id`, `created_at`) VALUES
(22000000, 80, 1, 53, '2020-12-06 04:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sp@gmail.com', '4ef83492c9675a69bf1f1660f0965653a0864f47a3b6d161fecba7cb12c131b4', '2016-12-06 03:47:29'),
('long.lay0711@gmail.com', '2cf1665cd1809b6de9a6b0d7a8278421da4e71c48de012608b7cbe8b3ebbd899', '2020-11-03 20:11:06'),
('scodeweb2016@gmail.com', 'e76aaf77c8359d3e54689a5bb452c6ff37d633673658cb9a8ebbfa7f0e3d1fde', '2020-11-05 05:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `pro_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pro_slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pro_intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_promo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_packet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_images` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_review` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_price` float NOT NULL,
  `pro_status` int(11) NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_slug`, `pro_intro`, `pro_promo`, `pro_packet`, `pro_images`, `pro_review`, `pro_price`, `pro_status`, `cat_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(70, 'ZENFONE 3 MAX', 'zenfone-3-max', 'sắp ra mắt', 'Tặng Voucher 500.000đ mua Apple Watch', 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp OTG, Cáp, Cây lấy sim', '1480399412_asus-zenfone-3-max-400-400x460.png', '<p>sản phẩm sắp được ra mắt</p>\r\n', 4999000, 0, 28, 1, '2020-11-28 12:22:52', '2020-12-07 02:17:00'),
(71, ' Dell Inspiron 5593', 'dell-inspiron-5593', '1035G1/8GB/512GB/Win10', 'Tặng Cáp kết nối Xem hình (đến 30/11)', 'Pin, Dây nguồn, Sách hướng dẫn, Thùng máy, Adapter sạc ', 'dell-inspiron-5593-i5-7wgnv1-213535-600x600.jpg', '<h3><strong>Thuận tiện với cụm ph&iacute;m số number pad</strong></h3>\r\n\r\n<p>Với c&aacute;c m&aacute;y c&oacute; m&agrave;n h&igrave;nh lớn th&igrave; b&agrave;n ph&iacute;m số lu&ocirc;n được trang bị.&nbsp;Đối với c&aacute;c bạn sinh vi&ecirc;n, nh&acirc;n vi&ecirc;n kế to&aacute;n hay nhập liệu nhiều th&igrave; đ&acirc;y sẽ l&agrave; một tiện &iacute;ch lớn.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-1-2.jpg\" onclick=\"return false;\"><img alt=\"Thuận tiện với cụm phím số Number pad\" src=\"https://cdn3.tgdd.vn/Products/Images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-1-2.jpg\" title=\"Thuận tiện với cụm phím số Number pad\" /></a></p>\r\n\r\n<h3><strong>Cấu h&igrave;nh cho ứng dụng nhẹ nh&agrave;ng</strong></h3>\r\n\r\n<p>M&aacute;y sử dụng chip xử l&yacute; Intel&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/tim-hieu-vi-xu-ly-may-tinh-cpu-intel-596066#intelceleron\" target=\"_blank\" title=\"Tìm hiểu chip Celeron\">Celeron</a>&nbsp;N3050 tốc độ 1.60 GHz, RAM sẵn 2 GB v&agrave; c&oacute; thể n&acirc;ng l&ecirc;n 8 GB,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/o-cung-la-gi-co-may-loai--590183#hdd\" target=\"_blank\" title=\"Tìm hiểu ổ cứng HDD\">ổ cứng lưu dữ liệu HDD</a>&nbsp;500 GB.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-4-2.jpg\" onclick=\"return false;\"><img alt=\"Cấu hình cho ứng dụng nhẹ nhàng\" src=\"https://cdn.tgdd.vn/Products/Images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-4-2.jpg\" title=\"Cấu hình cho ứng dụng nhẹ nhàng\" /></a></p>\r\n\r\n<h3><strong>Touchpad điều khiển th&ocirc;ng minh</strong></h3>\r\n\r\n<p>Bạn c&oacute; thể lướt touchpad nhẹ nh&agrave;ng để đọc tin tức d&agrave;i trang, xoay h&igrave;nh, ph&oacute;ng to/thu nhỏ... kh&aacute; thuận tiện.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-3-2.jpg\" onclick=\"return false;\"><img alt=\"Touchpad điều khiển thông minh\" src=\"https://cdn2.tgdd.vn/Products/Images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-3-2.jpg\" title=\"Touchpad điều khiển thông minh`\" /></a></p>\r\n\r\n<h3><strong>C&aacute;c cổng kết nối cần thiết</strong></h3>\r\n\r\n<p>M&aacute;y kh&ocirc;ng c&oacute; cổng cắm mạng d&acirc;y LAN, tuy nhi&ecirc;n bạn c&oacute; thể mua cổng chuyển đổi mạng LAN để sử dụng khi cần thiết.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-9.jpg\" onclick=\"return false;\"><img alt=\"Các cổng kết nối cần thiết\" src=\"https://cdn4.tgdd.vn/Products/Images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-9.jpg\" title=\"Các cổng kết nối cần thiết\" /></a></p>\r\n\r\n<h3><strong>Thiết kế của m&aacute;y</strong></h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-6-2.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế truyền thống không thay đổi nhiều của hãng Dell\" src=\"https://cdn1.tgdd.vn/Products/Images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-6-2.jpg\" title=\"Thiết kế truyền thống không thay đổi nhiều của hãng Dell\" /></a></p>\r\n\r\n<p><em>Thiết kế truyền thống kh&ocirc;ng thay đổi nhiều của&nbsp;<a href=\"https://www.thegioididong.com/laptop-dell\" target=\"_blank\" title=\"Laptop hãng Dell\">h&atilde;ng Dell</a></em></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-7-1.jpg\" onclick=\"return false;\"><img alt=\"Do bỏ bớt một số cổng kết nối nên 2 cạnh bên của máy khá thoáng\" src=\"https://cdn3.tgdd.vn/Products/Images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-7-1.jpg\" title=\"Do bỏ bớt một số cổng kết nối nên 2 cạnh bên của máy khá thoáng\" /></a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-8-1.jpg\" onclick=\"return false;\"><img alt=\"Do bỏ bớt một số cổng kết nối nên 2 cạnh bên của máy khá thoáng\" src=\"https://cdn.tgdd.vn/Products/Images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-8-1.jpg\" title=\"Do bỏ bớt một số cổng kết nối nên 2 cạnh bên của máy khá thoáng\" /></a></p>\r\n\r\n<p><em>Do bỏ bớt một số cổng kết nối n&ecirc;n 2 cạnh b&ecirc;n của m&aacute;y kh&aacute; tho&aacute;ng</em></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-2-2.jpg\" onclick=\"return false;\"><img alt=\"Khe tản nhiệt của máy nằm ở cạnh trái, mặt dưới có khá nhiều khe nhỏ giúp máy không bị quá nóng khi sử dụng\" src=\"https://cdn2.tgdd.vn/Products/Images/44/74357/dell-inspiron-3552-n3050-2gb-500gb-win10-2-2.jpg\" title=\"Khe tản nhiệt của máy nằm ở cạnh trái, mặt dưới có khá nhiều khe nhỏ giúp máy không bị quá nóng khi sử dụng\" /></a></p>\r\n\r\n<p><em>Khe tản nhiệt của m&aacute;y nằm ở cạnh tr&aacute;i, mặt dưới c&oacute; kh&aacute; nhiều khe nhỏ gi&uacute;p m&aacute;y kh&ocirc;ng bị qu&aacute; n&oacute;ng khi sử dụng</em></p>\r\n\r\n<p>Pin 4 cell gi&uacute;p m&aacute;y k&eacute;o d&agrave;i thời gian sử dụng.</p>\r\n', 17600000, 1, 29, 4, '2020-11-28 12:54:28', '2020-11-28 12:54:28'),
(72, 'Asus ROG GL 552 VX', 'asus-rog-gl-552-vx', 'I5 6300HQ,RAM 8G,15inxh FHD', 'Tặng Cáp kết nối Xem hình (đến 30/11)', 'Pin, Dây nguồn, Sách hướng dẫn, Thùng máy, Adapter sạc ', '1480151883_rog.png', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\n<strong>ASUS GL552VX-DM070D - i7-6700HQ 2.6GHz, 8GB, 1TB, VGA GTX 950M 4GB GDDR5, 15.6&quot; FHD</strong><br />\r\n<em>&bull; CPU: Intel Core i7 6700HQ 2.6GHz up to 3.5GHz 6Mb<br />\r\n&bull; RAM: 8GB DDR4 2133MHz<br />\r\n&bull; Đĩa cứng: HDD 1TB 7200rpm&nbsp;<br />\r\n&bull; Card đồ họa: NVIDIA GeForce GTX 950M 4GB GDDR5 + Intel HD Graphics 530&nbsp;<br />\r\n&bull; M&agrave;n h&igrave;nh: 15.6 inch Full HD (1920 x 1080 pixels) LED + Anti-Glare WV<br />\r\n&bull; T&iacute;ch hợp đĩa quang: Super-Multi DVD<br />\r\n&bull; Cổng giao tiếp: USB 2.0 USB 3.0 HDMI LAN&nbsp;<br />\r\n&bull; PIN: 4 Cells<br />\r\n&bull; Trọng lượng: 2.59 kg<br />\r\n&bull; Hệ điều h&agrave;nh: Free Dos</em><br />\r\n<br />\r\nTh&ugrave;ng m&aacute;y chắc sản xuất trước khi c&oacute; m&aacute;y n&ecirc;n kh&ocirc;ng c&oacute; ảnh sản phẩm ở ngo&agrave;i th&ugrave;ng<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/wDr6xJo.jpg\" /><br />\r\n<br />\r\nTh&ocirc;ng tin sản phẩm c&oacute; thể được quy đổi th&agrave;nh code game World Of Warship kh&aacute; gi&aacute; trị. Nếu bạn n&agrave;o kh&ocirc;ng đổi dc code game th&igrave; cứ li&ecirc;n hệ m&igrave;nh hỗ trợ nh&eacute;<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/R653ba2.jpg\" /><br />\r\n<br />\r\nTrọn bộ phụ kiện k&egrave;m theo sản phẩm:<br />\r\n- Pin<br />\r\n- D&acirc;y nguồn v&agrave; sạc adapter<br />\r\n- Đĩa driver windows 10<br />\r\n- Chuột ASUS Gaming SiCa<br />\r\n- D&acirc;y r&uacute;t sạc &amp; Khăn vệ sinh m&agrave;n h&igrave;nh<br />\r\n- Sổ bảo h&agrave;nh v&agrave; giấy tờ kh&aacute;c<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/qpBdqsp.jpg\" /><br />\r\n&nbsp;</p>\r\n\r\n<p>Sản phẩm được tặng k&egrave;m theo chuột ASUS ROG SICA (gi&aacute; ~60$). Thiết kế chuột tương đối nhỏ nhắn, vừa tay, ph&ugrave; hợp cho cả người thuận tay phải lẫn tay tr&aacute;i n&ecirc;n kh&ocirc;ng c&oacute; c&aacute;c n&uacute;t chuột phụ b&ecirc;n h&ocirc;ng. Thiết kế n&agrave;y ph&ugrave; hợp cho đối tượng game thủ RPG, FPS hơn l&agrave; MOBA/ARTS v&igrave; &iacute;t n&uacute;t cho việc sử dụng nhanh skills/items</p>\r\n\r\n<p><img alt=\"\" src=\"http://i.imgur.com/OLpgTZO.jpg\" /></p>\r\n\r\n<p><br />\r\n<br />\r\nVỏ ngo&agrave;i của m&aacute;y c&oacute; thiết kế kh&ocirc;ng thay đổi so với GL552JX. Vỏ bằng nhựa cứng c&aacute;p chứ kh&ocirc;ng phải l&agrave; vỏ nh&ocirc;m của GL552VW gi&aacute; tiền cao hơn<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/vVjxXPS.jpg\" /><br />\r\n<br />\r\nLogo ASUS ph&aacute;t s&aacute;ng khi bật nguồn<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/Bnn5Sk7.jpg\" /><br />\r\n<br />\r\nM&aacute;y đ&atilde; được lược bỏ cổng VGA (D-sub) thay v&agrave;o đ&oacute; l&agrave; cổng USB 3.1 Type C đời mới<br />\r\nNgo&agrave;i ra c&aacute;c cổng kh&aacute;c như jack nguồn, khe tản nhiệt, HDMI, LAN, 2 cổng USB 3.0 vẫn được giữ lại đ&uacute;ng vị tr&iacute; như GL552JX<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/V5qcO0m.jpg\" /><br />\r\nKh&ocirc;ng c&oacute; sự thay đổi, vẫn l&agrave; 2 jack audio/micro được t&aacute;ch ri&ecirc;ng biệt, 1 cổng USB 2.0, ổ DVD-RW v&agrave; kh&oacute;a kensington<br />\r\n<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/V1H6QND.jpg\" /><br />\r\nPh&iacute;a trước l&agrave; khe cắm thẻ nhớ SD card<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/uerGtNe.jpg\" /><br />\r\n<br />\r\nThiết kế b&agrave;n ph&iacute;m kh&ocirc;ng c&oacute; g&igrave; thay đổi. M&aacute;y c&oacute; đ&egrave;n nền m&agrave;u đỏ, c&aacute;c ph&iacute;m ASDW được l&agrave;m nổi bật<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/sL81FWt.jpg\" /><br />\r\n<br />\r\n<br />\r\nLogo Core i7 Skylake (l&ocirc; h&agrave;ng đầu c&oacute; nhiều thiếu s&oacute;t do thiếu sự đồng bộ giữa c&aacute;c nh&agrave; sản xuất hoặc c&aacute;c kh&acirc;u sx của ASUS n&ecirc;n logo NVIDIA đ&atilde; bị thiếu, m&aacute;y vẫn c&oacute; card đồ họa rời GTX 950M 4GB GDDR5)<br />\r\nM&aacute;y l&agrave; sản phẩm ch&iacute;nh h&atilde;ng c&oacute; hỗ trợ bảo h&agrave;nh từ xa của ASUS<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/ix8rdSI.jpg\" /><br />\r\n<br />\r\nLogo ASUS ROG, m&aacute;y m&agrave;n h&igrave;nh 15.6&quot; inch n&ecirc;n c&oacute; k&egrave;m b&agrave;n ph&iacute;m số<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/qYQ2qan.jpg\" /><br />\r\n<br />\r\n<br />\r\nM&aacute;y c&oacute; 2 loa k&eacute;p, hangchinhhieu.vn sẽ cập nhật chất lượng loa của m&aacute;y xem c&oacute; nhiều cải thiện so với sản phẩm tiền nhiệm hay kh&ocirc;ng<br />\r\n<img alt=\"[​IMG]\" src=\"http://i.imgur.com/xoHzNtM.jpg\" /><br />\r\n<br />\r\n<br />\r\nThiết kế mặt đ&aacute;y kh&ocirc;ng c&oacute; sự thay đổi, m&aacute;y c&oacute; thể dễ d&agrave;ng n&acirc;ng cấp RAM, SSD bằng th&aacute;o cover ra.<br />\r\nASUS đ&atilde; th&ecirc;m 1 lưu &yacute;: khe M.2 tr&ecirc;n m&aacute;y chỉ lắp được loại SSD SATA M.2 2280 chứ kh&ocirc;ng lắp được loại SSD chuẩn pcie x4 hoặc ssd c&oacute; k&iacute;ch thước kh&aacute;c như 2242 chẳng hạn. C&oacute; thể do 1 số người d&ugrave;ng gl552jx ng&agrave;y trước đ&atilde; ph&agrave;n n&agrave;n họ đ&atilde; mua sai loại SSD khi gắn v&agrave;o m&aacute;y n&ecirc;n ASUS phải note lại thế n&agrave;y</p>\r\n', 19850000, 1, 29, 5, '2020-11-28 12:54:28', '2020-11-28 12:54:28'),
(73, 'asus Gimming 980 SFF Case Size Mini', 'asus-gimming-980-sff-case-size-mini', 'Core I3, I5 (Hàng Likenew, thùng hộp) ', 'không có', 'Thùng máy, day cab kết nối', '1480151639_930_dell 980 2.png', '<p>* D&ograve;ng&nbsp;<strong><a href=\"http://cungcapmaytinh.vn/san-pham/325/dell-optiplex-980-case-size-mini.html\">Dell Optiplex 980 SFF</a></strong>&nbsp;<strong>hổ trợ CPU Core I3, I5, I7 Clarkdale</strong>đời đầu. Được thiết kế với vỏ&nbsp;<strong>Case size mini nhỏ gọn</strong>, kiểu d&aacute;ng sang trọng<strong>.</strong>Th&iacute;ch hợp x&agrave;i gia đ&igrave;nh, văn ph&ograve;ng, HTPC tr&igrave;nh chiếu phim HD.&nbsp;<strong>Card đồ họa t&iacute;ch hợp&nbsp;</strong><strong>Intel&reg; HD Graphics</strong><strong>&nbsp;</strong>gi&uacute;p xem phim HD v&agrave; Game cho h&igrave;nh ảnh sắc n&eacute;t, mượt m&agrave;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>* Ngo&agrave;i ra D&ograve;ng Dell Optiplex 980 SFF c&oacute; thể gắn th&ecirc;m Card Wifi, Card VGA. T&iacute;ch hợp sẵn tr&ecirc;n mainboard c&oacute; cổng COM, Display Port<strong>&nbsp;</strong>(chức năng tương đương HDMI)</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>* Với cấu h&igrave;nh dưới đ&acirc;y, sẽ đ&aacute;p ứng đầy đủ nhu cầu l&agrave;m c&ocirc;ng việc Văn Ph&ograve;ng, Vẽ AUTOCAD, 3D MAX, Game Web, xem Phim HD, nghe Nhạc...</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Cấu h&igrave;nh c&oacute; thể thay đổi theo y&ecirc;u cầu của Qu&yacute; Kh&aacute;ch</em></strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>Cấu h&igrave;nh 01:&nbsp;<strong><a href=\"http://cungcapmaytinh.vn/san-pham-xem/929/dell-optiplex-980-core-i.html\">Dell&nbsp;Optiplex 980 SFF</a>&nbsp;</strong>Case Size Mini</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>H&agrave;ng Likenew, th&ugrave;ng hộp Dell</strong></p>\r\n\r\n<p><strong>&nbsp;<strong>(Gi&aacute; tr&ecirc;n chưa bao gồm Ph&iacute;m + Chuột)</strong>&nbsp;</strong></p>\r\n', 25000000, 1, 30, 8, '2020-11-28 12:57:39', '2020-11-28 12:57:39'),
(77, 'iPhone 7 Plus 128GB', 'iphone-7-plus-128gb', 'Apple A10 mới, 2 cammera sau,Ram 3g, 5.5 inch (1920 x 1080 pixels)', 'Tặng Voucher 500.000đ mua Apple Watch', 'Không có', 'ip30.png', '<p>&lt;h3&gt;&lt;strong&gt;Thiết kế ho&amp;agrave;n thiện hơn&lt;/strong&gt;&lt;/h3&gt;<br />\r\n&nbsp;</p>', 6999000, 0, 28, 10, NULL, NULL),
(79, 'Galaxy S7 EDGE', 'galaxy-s7-edge', 'sắp ra mắt', 'Tặng Voucher 500.000đ mua Galaxy Watch', 'Không có', '1480005553_635918156584359185_s7-g164.jpg', '<p>kh&ocirc;ng c&oacute;</p>', 3000000, 0, 28, 2, NULL, NULL),
(80, 'ONE PLUS 8 5G', 'one-plus-8', 'Hàng mới độc quyền thế giới di động', 'giảm 10% vào Black Friday', 'Củ sạc , tai nghe', 'download9373.jpg', '', 22000000, 0, 28, 11, NULL, NULL),
(81, 'iPhone 12 mini', 'iphone-12-mini', 'iPhone 12 Mini 64 GB tuy là phiên bản thấp nhất trong bộ 4 iPhone 12 vừa mới được ra mắt cách đây không lâu, nhưng vẫn sở hữu những ưu điểm vượt trội về kích thước nhỏ gọn, tiện lợi, hiệu năng đỉnh cao, tính năng sạc nhanh cùng bộ camera chất lượng cao', 'KHUYẾN MÃI TRỊ GIÁ 1.000.000₫', 'Hộp và sạc', 'iphone-12-blue-600x600-thumb-hen-gio6.jpg', '', 20990000, 0, 28, 10, NULL, NULL),
(94, 'PC Dell OptiPlex 3070', 'pc-dell-optiplex-3070', 'Dell OptiPlex 3070 có hơn 25 năm kinh nghiệm mang đến sự đổi mới do khách hàng hướng dẫn cho máy tính để bàn bằng cách liên tục tạo ra trải nghiệm nhanh hơn và thông minh hơn. Với các yếu tố hình thức linh hoạt, tiết kiệm không gian với các tùy chọn cấu h', '+ Giảm giá 100.000đ khi mua kèm bản quyền Window 10 Pro (SOWI114) + Giá tốt hơn khi mua số lượng lớn (Vui lòng liên hệ nhân viên kinh doanh để biết thêm chi tiết) + Tặng phiếu vệ sinh bảo dưỡng Laptop, PC miễn phí trọn đời trị giá 999.000đ (THEK417)', 'không', '48226_dell_optiplex_3070_mt_02170.png', '', 11899000, 1, 30, 7, '2020-12-06 20:59:15', NULL),
(96, 'ASUS ROG Phone 2', 'asus-rog-phone-21', 'SẮP VỀ HÀNG', 'Giảm 10% cho người đẹp trai', 'Sạc không dây , tai nghe , sách hướng dẫn', '_600x600__crop_600_asus_rog_phone2_min_15456.jpg', '<p>kh&ocirc;ng c&oacute;</p>', 17400000, 0, 28, 1, NULL, NULL),
(97, 'OnePlus 8T 5G', 'oneplus-8t', 'OnePlus 8T là chiếc flagship mới nhất của OnePlus vừa được trình làng, gây ấn tượng với màn hình 120 Hz, tốc độ sạc siêu nhanh và cấu hình mạnh mẽ. Màn hình giải trí sắc nét, tần số quét 120 Hz OnePlus 8T có thiết kế mang nhiều nét tương đồng với \"người a', 'Tai nghe Bluetooth OnePlus Buds Ốp lưng OnePlus 8T Phiếu Mua Máy Lọc Nước Kangaroo, Karofi, Sunhouse, KoriHome Trị Giá 300,000đ (EV). (click xem chi tiết) Mua Đồng hồ thời trang giảm 40% (không kèm KM khác)', 'fullbox , sạc 65W', 'oneplus-8t-600x600-1-600x60073.jpg', '', 17490000, 1, 28, 11, '2020-12-10 18:37:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pro_details`
--

CREATE TABLE `pro_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `screen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vga` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `storage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exten_memmory` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cam1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cam2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connect` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pro_details`
--

INSERT INTO `pro_details` (`id`, `cpu`, `ram`, `screen`, `vga`, `storage`, `exten_memmory`, `cam1`, `cam2`, `sim`, `connect`, `pin`, `os`, `pro_id`, `created_at`, `updated_at`) VALUES
(53, 'snapdragon 821 2.5 Ghz', '6G', '5.1 inch (1440 x 2560 pixels)', 'adreno900', '128 G', 'không', 'dual 12 MP', '7MP', '1 Sim Micro', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot', '3500mAh', 'Andoid 9.0', 70, '2020-11-28 12:25:37', '2020-11-28 12:25:37'),
(54, 'Intel core I5 6300HQ', '8G DDR4 2100', 'Gigabyte H81-DS2', 'GTX 950M 4G GDDR4', '1T HDD, 128G SSD', '', 'Intel FAN Chuẩn', 'CTS 350W', '', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot', '4Cel', 'Windows 10 bản dùng thử', 72, '2020-11-28 13:38:34', '2020-11-28 13:38:34'),
(55, 'Intel, Celeron, N3050, 1.60 GHz', 'DDR3L (1 khe RAM), 2 GB, 1600 MHz', '15.6 inch, HD (1366 x 768 pixels)', 'Intel® HD Graphics, Share (Dùng chung bộ nhớ với RAM)', 'HDD, 500 GB', 'có', '0.9 MP(16:9)', '', '', '802.11b/g/n, Bluetooth v4.0', 'Li-Ion 4 cell', 'Windows 10 bản dùng thử', 71, '2020-11-28 13:41:51', '2020-11-28 13:41:51'),
(56, 'Core i5 650 3.2 Ghz/ Cache 4M/ 2.5 GT/s ', 'DDRam3 Dual Channel 4GB bus 1333 (2GB x 2)', 'Gigabyte H81-DS2', 'Intel® HD Graphics', '250GB SATA 7200 rpm ', 'không ', 'Intel FAN Chuẩn', 'CTS 350W', '', 'USB, VGA, COM, Display Port ', 'Li-Ion 4 cell', 'Cài sẵn Windows 7 bản quyền', 73, '2020-11-28 13:44:31', '2020-11-28 13:44:31'),
(58, 'Apple A10 Fusion 4 nhân', '3 GB', 'LED-backlit IPS LCD', 'Chip đồ họa 6 nhân\r\n', '32 GB', 'không ', '12 MP', ' 18 MP', '1 NANO sim', '	\r\nWi-Fi 802.11 a/b/g/n/ac\r\nDual-band (2.4 GHz/5 GHz)\r\nWi-Fi hotspot', '2900 mAh', 'IOS', 77, '2020-12-06 07:03:00', '2020-12-06 07:03:00'),
(60, 'Exynos 8890 8 nhân', '4 GB', 'Super AMOLED', 'Mali-T880 MP12', '32 GB', 'hỗ trợ thẻ nhớ', '5 MP', '12 MP', '2 Nano SIM (SIM 2 chung khe thẻ nhớ)', 'Wi-Fi hotspot Dual-band (2.4 GHz/5 GHz) DLNA Wi-Fi Direct Wi-Fi 802.11 a/b/g/n/ac', '3600 mAh', 'Android', 79, NULL, NULL),
(61, 'Snapdragon 865 8 nhân', '12 GB', 'AMOLED', 'Adreno 650', '256 GB', 'hỗ trợ thẻ nhớ', '16 MP', 'Chính 48 MP & Phụ 48 MP, 8 MP, 5 MP', '2 Nano SIM', 'Wi-Fi Direct Wi-Fi 802.11 a/b/g/n/ac/ax Wi-Fi hotspot Dual-band (2.4 GHz/5 GHz)', '4510 mAh, có sạc nhanh', 'Android 10', 80, NULL, NULL),
(62, 'Apple A14 Bionic 6 nhân', '4 GB', 'OLED', 'Apple GPU 6 nhân', '64 GB', 'không có', '12 MP', '2 camera 12 MP', '1 Nano SIM & 1 eSIM', 'Dual-band (2.4 GHz/5 GHz) Wi-Fi 802.11 a/b/g/n/ac/ax Wi-Fi MIMO Wi-Fi hotspot', '2227 mAh', 'iOS', 81, NULL, NULL),
(65, 'Intel® Core™ i5-9500', '4GB', 'Màn hình Dell E1916HV', 'Integrated Intel® HD Graphics', '1TB HDD', 'không', 'không', 'không', 'không', '8 External USB Type-A: 4 x 3.1 (2 front/2 rear) and 4 x 2.0 (2 front/2 rear)  2 Internal USB 2.0  1 RJ-45 1 DisplayPort 1.2  1 HDMI 1.4  1 UAJ  1 Line-out  1 VGA/DP/HDMI 2.0 (Optional)  1 Serial+PS/2 (Optional)', 'Sử dụng nguồn điện', 'DOS - Windown', 94, NULL, NULL),
(66, 'Snapdragon 865 8 nhân', '12 GB', 'AMOLED', 'Adreno 650', '256GB', 'Không', '16 MP', 'Chính 48 MP & Phụ 16 MP, 5 MP, 2 MP', '2 Nano SIM', 'Hỗ trợ 5G 	 Wi-Fi 802.11 a/b/g/n/ac/ax Có Wi-Fi hotspot Dual-band (2.4 GHz/5 GHz) Wi-Fi Direct GPS', '4500 mAh 	Sạc pin nhanh', 'Android 11', 97, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'phamquoctuan', 'tymap64@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0985965864', '142 pham thi tanh', 1, NULL, NULL, NULL),
(8, 'pham', 'dsasda@sda', '$2y$10$4b/Vfz.JmQgQ3R5xy0DmVuXjHf8fIhcCb1whRyGdEj3w0B9OJOq0y', '0985687128', 'sdasdadas', 1, NULL, NULL, NULL),
(9, 'Phạm Quốc Tuấn', 'quoctuan123@gmail.com', '$2y$10$L9BDcw4GBHqpKE0fbd5xbOhMikDzFDs6cmtifLJ/dbhJPtBAJxja.', '0978053610', '142 phạm thị tánh', 1, NULL, NULL, NULL),
(10, 'Trương Quang Phước', 'truongquangphuoc19998@gmail.com', '$2y$10$i8trGDP39dqLxBB.9X8VneZTmK2bnGW8irNNBL.vL2EkDGICpduiC', '0784474392', 'quangngai', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`),
  ADD UNIQUE KEY `cate_slug` (`cate_slug`);

--
-- Indexes for table `detail_img`
--
ALTER TABLE `detail_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_img_pro_id_foreign` (`pro_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `oders_c_id_foreign` (`c_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD KEY `oders_detail_pro_id_foreign` (`pro_id`),
  ADD KEY `oders_detail_o_id_foreign` (`o_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `pro_slug` (`pro_slug`),
  ADD KEY `products_ibfk_1` (`brand_id`),
  ADD KEY `products_ibfk_2` (`cat_id`);

--
-- Indexes for table `pro_details`
--
ALTER TABLE `pro_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_details_pro_id_foreign` (`pro_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `detail_img`
--
ALTER TABLE `detail_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `pro_details`
--
ALTER TABLE `pro_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`cate_id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_img`
--
ALTER TABLE `detail_img`
  ADD CONSTRAINT `detail_img_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`o_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pro_details`
--
ALTER TABLE `pro_details`
  ADD CONSTRAINT `pro_details_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
