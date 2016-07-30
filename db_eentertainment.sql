-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2016 at 09:52 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eentertainment`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'normal',
  `thumbnail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tag` text COLLATE utf8_unicode_ci NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT '0',
  `likecount` int(11) NOT NULL DEFAULT '0',
  `dislikecount` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `member_id`, `title`, `url`, `type`, `thumbnail`, `description`, `content`, `tag`, `viewcount`, `likecount`, `dislikecount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Sau bão số 1, Hà Nội xuất hiện những gốc cây "kỳ lạ"', 'sau-bao-so-1-ha-noi-xuat-hien-nhung-goc-cay-ky-la', 'normal', '/images/items/20160729_56658e7c6fc60a515d8819fd1591bd0c.jpg', 'Cơn bão số 1 ảnh hưởng đến Hà Nội, gây mưa to, gió giật mạnh sáng 28.7, khiến hàng trăm cây xanh gãy đổ. Đáng chú ý, trong đó có những tuyến đường mới trồng thay thế cây xanh đã bị đổ rất nhiều như đường Nguyễn Chí Thanh, Nguyễn Thái Học', '<p>Cơn bão số 1 ảnh hưởng đến Hà Nội, gây mưa to, gió giật mạnh sáng 28.7, khiến hàng trăm cây xanh gãy đổ. Đáng chú ý, trong đó có những tuyến đường mới trồng thay thế cây xanh đã bị đổ rất nhiều như đường Nguyễn Chí Thanh, Nguyễn Thái Học…</p>\r\n\r\n<p>Những cây lát hoa, sấu, muồng, vừa trồng cách đây vài tháng, tán chưa rộng đã bị bật tung gốc, để lộ phần hố nông, rễ cụt không bán sâu được vào đất. Nhiều người ngạc nhiên khi các cây này thậm chí vẫn còn nguyên bọc nilon, dây chằng.</p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 1" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770589-146977046890373-anh-1.jpg" /></p>\r\n\r\n<p>Sáng 28.7, hàng cây lát hoa mới được trồng thay thế hồi tháng 8.2015 trên đường Nguyễn Chí Thanh đổ liên tiếp.</p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 2" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770589-146977046896061-anh-2.jpg" /></p>\r\n\r\n<p>Cây mới trồng trên đường Nguyễn Thái Học cũng bật gốc hàng loạt</p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 3" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770590-146977046885518-anh-3.jpg" /></p>\r\n\r\n<p>&nbsp;Bộ rễ cụt không bám sâu được vào đất</p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 4" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770590-146977046821929-anh-4.jpg" /></p>\r\n\r\n<p>Cận cảnh bộ rễ cây lát hoa trồng cách đây gần 1 năm trên đường Nguyễn Chí Thanh</p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 5" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770590-146977046875662-anh-5.jpg" /></p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 6" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770590-146977046897978-anh-6.jpg" /></p>\r\n\r\n<p>Đa số những cây mới trồng bị đổ, tán lá vẫn rất thưa</p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 7" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770591-146977046839084-anh-7.jpg" /></p>\r\n\r\n<p>Hố trồng cây rất nông</p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 8" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770591-146977046862155-anh-8.jpg" /></p>\r\n\r\n<p>&nbsp;Một cây sấu mới trồng trên đường Dương Đình Nghệ, trước cổng báo Tài nguyên và Môi trường bật gốc để lộ bọc bao tải trắng kín mít</p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 9" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770591-14697704683265-anh-9.jpg" /></p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 10" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770591-14697704685876-anh-10.jpg" /></p>\r\n\r\n<p>Những xanh mới trồng bật gốc trên đường Nguyễn Văn Trỗi, Hà Đông</p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Sau bão số 1, Hà Nội xuất hiện những gốc cây “kỳ lạ” - 11" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-29/1469770592-14697704685846-anh-11.jpg" /></p>\r\n\r\n<p>Một gốc muồng nguyên dây chằng trên đường Láng Hạ</p>\r\n\r\n<table align="center" cellpadding="3" cellspacing="0" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Theo số liệu được thống kê đến cuối giờ chiều 28.7 của Thanh tra Giao thông Hà Nội và Điện lực Hà Nội, trên địa bàn thành phố có 1.110 cây xanh bị gãy, đổ; 14 biển báo giao thông; 2 hộp đèn quảng cáo gãy đổ ra lòng đường, vỉa hè, dải phân cách gây cản trở giao thông; 29 trạm biến áp bị ảnh hưởng cùng 90 vị trí cột điện trung, hạ thế bị nghiêng hoặc gãy, đổ.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'tin tức 24h,tin 24h,bão,', 0, 0, 0, 0, '2016-07-29 00:19:02', '2016-07-29 00:19:02'),
(2, 2, 3, 'Bí ẩn cô gái bị "hôn mê" bên đường ở Đà Nẵng', 'bi-an-co-gai-bi-hon-me-ben-duong-o-da-nang', 'image', '/images/items/20160729_7421d993e9e84820496e6f43b15d7436.jpg', 'Chiều 28-7, đại diện Công an quận Cẩm Lệ (TP Đà Nẵng) cho biết sau khi sự việc xảy ra, công an có đến bệnh viện ghi nhận thông tin cô gái bất tỉnh bên đường được người dân đưa vào bệnh viện cấp cứu, nhưng cô gái tỏ ra không hợp tác. Vì vậy, hiện chưa thể xác định cô gái có thật sự bị mất tài sản như thông tin đồn thổi hay không.', '<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Bí ẩn cô gái bị “hôn mê” bên đường ở Đà Nẵng - 1" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-28/1469710885-co-gai-1.jpg" style="width:500px" /></p>\r\n\r\n<p>Dòng trạng thái này thu hút hơn 1.300 lượt chia sẻ sau hơn 1 giờ đăng tải</p>\r\n\r\n<p>Chiều 28-7, đại diện Công an quận Cẩm Lệ (TP Đà Nẵng) cho biết sau khi sự việc xảy ra, công an có đến bệnh viện ghi nhận thông tin cô gái bất tỉnh bên đường được người dân đưa vào bệnh viện cấp cứu, nhưng cô gái tỏ ra không hợp tác. Vì vậy, hiện chưa thể xác định cô gái có thật sự bị mất tài sản như thông tin đồn thổi hay không.</p>\r\n\r\n<p>Trước đó, trưa 27-7, một tài khoản facebook đăng tải lên trang cá nhân thông tin với nội dụng rằng: Khoảng 11 giờ trưa cùng ngày, trên đường Phạm Hùng (đoạn gần cầu Cẩm Lệ, TP Đà Nẵng) có một cô gái bị bỏ lại ven đường trong trạng thái hôn mê.</p>\r\n\r\n<p>Khi tỉnh lại, cô gái này cho biết cô ở tỉnh Quảng Nam nhưng không nhớ rõ địa chỉ cụ thể. Cô gái này còn cho biết cô đi thăm mẹ tại TP Tam Kỳ (tỉnh Quảng Nam) và bị một người phụ nữ làm quen rồi chở từ Tam Kỳ ra Đà Nẵng. Trên đoạn đường này, số tiền hơn 3 triệu đồng và tư trang của cô đã bị lấy sạch. Thấy cô gái này lúc tỉnh lúc mê, người dân đã gọi xe cấp cứu đưa đến Trung tâm y tế quận Cẩm Lệ điều trị.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tuy nhiên, đến thời điểm này, chủ tài khoản đăng các thông tin trên đã xóa đi nhưng nhiều trang facebook khác đã lấy lại thông tin và hình ảnh để đăng tải gây lo lắng cho người dân.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="http://static.24h.com.vn/images/2014/share-fb.gif" style="height:20px; width:67px" />&nbsp;<img alt="" src="http://static.24h.com.vn/images/2014/share-gg.gif" style="height:20px; width:67px" /><img alt="Bí ẩn cô gái bị “hôn mê” bên đường ở Đà Nẵng - 2" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-28/1469710885-co-gai-2.jpg" style="width:500px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cô gái áo vàng được phát hiện ngất xỉu bên đường Ảnh: facebook</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trao đổi với phóng viên Báo Người Lao Động, bác sĩ ở phòng cấp cứu Trung tâm Y tế quận Cẩm Lệ, xác nhận vào lúc 11 giờ 30 phút ngày 27-7, trung tâm có tiếp nhận một cô gái được đưa đến bằng xe cấp cứu. Một số người đi cùng nói cô gái này bị hôn mê và bị mất tiền. Tuy nhiên, sau khi kiểm tra, các bác sĩ không thấy có biểu hiện về bệnh lý, không rối loạn ý thức, tư duy. Sau khi ngủ một giấc, khoảng 13 giờ 30 phút cùng ngày, cô gái được trung tâm cho về.</p>\r\n\r\n<p>Theo các bác sĩ, không hiểu sao khi bác sĩ hỏi tên tuổi, địa chỉ thì cô gái không khai, nói cô gọi điện về cho gia đình cô cũng không thực hiện. Mọi người thuyết phục thì cô gái này mới đưa ra giấy CMND mang tên Đồng Thị Ánh Nh. (22 tuổi, ngụ thôn Đồng Trì, xã Bình Hải, huyện Thăng Bình, tỉnh Quảng Nam). Tuy nhiên, phóng viên xác minh ở xã Bình Hải thì lãnh đạo xã nói qua kiểm tra không có ai có tên như vậy.</p>\r\n\r\n<p>Được biết, ngày 21-7, một nam thanh niên ở Đà Nẵng cũng đã viết thư xin lỗi lực lượng CSGT công an quận Hải Châu (TP Đà Nẵng) về việc tung tin sai sự thật trên facebook cá nhân. Nam thanh niên tung tin lên facebook cho rằng, Tổ TTKS CSGT quận Hải Châu "vòi vĩnh" khi xử lý vi phạm giao thông. Tuy nhiên, việc tung tin trên là không đúng, làm ảnh hưởng đến uy tín của lực lượng CSGT Công an quận Hải Châu.</p>\r\n\r\n<p>Trước đó, vào cuối tháng 5, chị D. T. P (SN 1990, HKTT: tổ 100, P. Xuân Hà, Q. Thanh Khê, Đà Nẵng) là chủ tài khoản facebook có nickname" D.T.P. đã loan tải thông tin “Bắt cóc trẻ em xảy ra giữa trung tâm thành phố Đà Nẵng”. Sau đó, chị D.T.P cũng viết thư xin lỗi vì đăng tin không đúng sự thật gây lo lắng cho người dân.</p>\r\n', 'động đất,đám ma,bí ẩn cô gái,tin tức 24h,', 0, 0, 0, 0, '2016-07-29 00:25:50', '2016-07-29 00:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'chủ đề 1', 'chu-de-1', 'đây là mô tả chủ đề 1', 0, NULL, NULL),
(2, 'chủ đề 2', 'chu-de-2', 'đây là mô tả chủ đề 2', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authorization` int(11) NOT NULL DEFAULT '0',
  `desccription` text COLLATE utf8_unicode_ci,
  `lastvisitted` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci,
  `category` text COLLATE utf8_unicode_ci,
  `parent` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
('2016_07_28_010900_create_categories_table', 1),
('2016_07_28_011748_create_articles_table', 1),
('2016_07_28_011821_create_menus_table', 1),
('2016_07_28_013906_create_members_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
