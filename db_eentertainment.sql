-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2016 at 12:18 PM
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
  `categories_id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
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

INSERT INTO `articles` (`id`, `categories_id`, `members_id`, `title`, `url`, `type`, `thumbnail`, `description`, `content`, `tag`, `viewcount`, `likecount`, `dislikecount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'tiêu đề bài viết', 'day-la-phan-url-bai-viet', 'image', 'D:\\xampp\\htdocs\\eentertainment\\public/images/items/66678.png', 'phần mô tả', '<p>đây là nội dung bài viết</p>\r\n', 'sfsfs', 0, 0, 0, 1, '2016-07-27 21:52:16', '2016-07-27 21:52:16'),
(2, 1, 3, 'hfgjfgj', 'hfgjfgj', 'normal', 'D:\\xampp\\htdocs\\eentertainment\\public/images/items/852442.png', 'fgkfjfgj', '<p>fgjk</p>\r\n', 'sfsfs', 0, 0, 0, 1, '2016-07-28 01:37:21', '2016-07-28 01:37:21'),
(3, 1, 3, 'wetwetityi cho jsdhgjsdgjsdg sdgs dg', 'wetwetityi-cho-jsdhgjsdgjsdg-sdgs-dg', 'normal', 'D:\\xampp\\htdocs\\eentertainment\\public/images/items/943593.png', 'sdsdhs', '<p>sdhsdh</p>\r\n', 'sfsfs', 0, 0, 0, 1, '2016-07-28 01:38:11', '2016-07-28 01:38:11'),
(4, 2, 3, 'cộng hòa xã hội chủ', 'cong-hoa-xa-hoi-chu-ngha-viet-nam', 'image', 'D:\\xampp\\htdocs\\eentertainment\\public/images/items/468563.gif', 'đây là phần mô tả', '<p>đây là phần nội dung vui lòng xem kỹ hướng dẫn</p>\r\n', 'sfsfs', 0, 0, 0, 1, '2016-07-28 01:46:12', '2016-07-28 01:46:12'),
(5, 2, 3, 'Can''t get value of input field with jquery', 'can-t-get-value-of-input-field-with-jquery', 'normal', 'D:\\xampp\\htdocs\\eentertainment\\public/images/items/959243.jpg', 'Definition and Usage\r\nThe confirm() method displays a dialog box with a specified message, along with an OK and a Cancel button.', '<h2>Tạo một biểu thức chính quy<a href="https://developer.mozilla.org/vi/docs/Web/JavaScript/Guide/Regular_Expressions$edit#Tạo_một_biểu_thức_chính_quy">EDIT</a></h2>\r\n\r\n<p>Bạn có thể tạo ra một biểu thức chính quy bằng 1 trong 2 cách sau:</p>\r\n\r\n<ul>\r\n	<li>Sử dụng cách&nbsp;mô tả&nbsp;chính quy thuần (regular expression literal)&nbsp;như sau:\r\n	<pre>\r\n<code>var re = /ab+c/;</code></pre>\r\n\r\n	<p>Các đoạn mã chứa các mô tả&nbsp;chính quy thuần sau khi được nạp vào bộ nhớ sẽ dịch các đoạn mô tả đó thành các biểu thức chính quy. Các biểu thức chính quy được dịch ra này sẽ được coi như các hằng số, tức là không phải&nbsp;tạo lại&nbsp;nhiều lần, điều này giúp cho hiệu năng thực hiện tốt hơn.</p>\r\n	</li>\r\n	<li>Tạo một đối tượng&nbsp;<code><a href="https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/RegExp">RegExp</a></code>&nbsp;như sau:\r\n	<pre>\r\n<code>var re = new RegExp("ab+c");</code></pre>\r\n\r\n	<p>Với cách này, các biểu thức chính quy sẽ được dịch ra lúc thực thi chương trình nên hiệu năng không đạt được như với việc sử dụng cách mô tả chính quy thuần. Nhưng ưu điểm là nó có thể thay đổi được, nên ta thường sử dụng chúng khi ta muốn nó có thể thay đổi được, hoặc khi ta chưa chắc chắn về các mẫu chính quy (pattern) như nhập từ bàn phím chẳng hạn.</p>\r\n	</li>\r\n</ul>\r\n', 'sfsfs', 0, 0, 0, 1, '2016-07-28 02:38:51', '2016-07-28 02:38:51'),
(6, 2, 3, 'Biểu thức quy tắc trong javaScript (regular expression)', 'bieu-thuc-quy-tắc-trong-javascript-regular-expression', 'normal', 'D:\\xampp\\htdocs\\eentertainment\\public/images/items/844104.jpg', 'Cũng như những ngôn ngữ lập trình khác biểu thức quy tắc (regular expression) là một tính năng đắc lực để kiểm tra, so sánh, thay thế, tách', '<p>Cũng như những ngôn ngữ lập trình khác biểu thức quy tắc (regular expression) là một tính năng đắc lực để kiểm tra, so sánh, thay thế, tách, ghép một chuỗi nào đó theo một quy tắc bạn quy định, nếu bạn đã tìm hiểu về biểu thức quy tắc trong ngôn ngữ PHP rồi thì sẽ thấy javaScript cũng có cách quy định tương tự chỉ khác ở một số hàm xử lý biểu thức quy tắc.</p>\n\n<p>Trong javaScript ta có 2 cách để khai báo biểu thức quy tắc:</p>\n\n<ol>\n	<li>Khai báo với 2 dấu "/" ở đầu và cuối biểu thức</li>\n	<li>Khai báo thông qua việc tạo đối tượng RegExp</li>\n</ol>\n\n<p>Cách thứ nhất thường dùng nhiều hơn bởi sự đơn giản trong khai báo.</p>\n\n<p>Khi xử lý một chuỗi với biểu thức điều kiện một điều quan trọng là bạn muốn khi áp dụng ký tự có phân biệt chữ in hoa in thường hay không và áp dụng cho đoạn chuỗi đầu tiên tìm được hay tất cả các đoạn chuỗi hợp quy tắc, ta sẽ được tìm hiểu điều này sau đây:</p>\n\n<ul>\n	<li>&nbsp;<strong>"/quy tắc/"</strong>&nbsp;biểu thức có phân biệt chữ in hoa, in thường, và chỉ áp dụng cho đoạn chuỗi đầu tiên tìm thấy đúng quy tắc</li>\n	<li><strong>"/quy tắc/g"</strong>&nbsp;biểu thức có phân biệt hoa - thường và áp dụng cho tất cả đoạn chuỗi hợp quy tắc</li>\n	<li><strong>"/quy tắc/i"</strong>&nbsp;biểu thức không phân biệt hoa - thường, và chỉ áp dụng cho đoạn chuỗi đầu tiên tìm thấy đúng quy tắc</li>\n	<li>&nbsp;<strong>"/quy tắc/gi"</strong>&nbsp;biểu thức không phân biệt hoa - thường, và áp dụng cho tất cả đoạn chuỗi hợp quy tắc</li>\n</ul>\n\n<p>Ví dụ: thay ký tự n bằng dấu "*"</p>\n\n<pre>\nvar str = ''Xin chào!, tôi là VANKHUONG 777'';\nvar str1 = str.replace(/n/gi, ''*'');\ndocument.write(str1);\n// Xi* chào!, tôi là VA*KHUO*G 777\nvar str2 = str.replace(/n/,''*'');\ndocument.write(str2);\n// Xi* chào!, tôi là VANKHUONG 777</pre>\n\n<p>Tiếp theo ta sẽ tìm hiểu cách viết biểu thức quy tắc với cách dùng ký tự đại diện được quy ước trong biểu thức.</p>\n\n<h3>Quy tắc về vị trí</h3>\n\n<ul>\n	<li><strong>"^"</strong>&nbsp;nghĩa là bắt đầu một chuỗi</li>\n	<li><strong>"$"</strong>&nbsp;nghĩa là kết thúc một chuỗi</li>\n	<li><strong>"\\b"</strong>&nbsp;nghĩa là điểm giữa một ký tự là từ và ký tự không phải là từ, ký tự là từ ở đây là ký tự từ A-z, 0-9</li>\n	<li><strong>"\\B"</strong>&nbsp;ngược lại với ''/b''</li>\n</ul>\n\n<p>Ví du:</p>\n\n<pre>\nvar str = ''ngo van khuong'';\nvar str3 = str.replace(/n\\b/, ''*'');\n// str3: ngo va* khuong\nvar str4 = str.replace(/n\\B/, ''*'');\n// str4: *go van khuo*g</pre>\n\n<h3>Quy tắc về những ký tự metasymbol</h3>\n\n<ul>\n	<li><strong>"\\d"</strong>&nbsp;đại diện cho một ký tự số từ 0-9, tương đương với cách viết [0-9]</li>\n	<li><strong>"\\D"&nbsp;</strong>đại diện cho một ký tự không phải là kiểu số từ 0-9, ngược lại với "\\d"</li>\n	<li><strong>"\\s"</strong>&nbsp;đại diện cho một ký tự là khoảng trắng</li>\n	<li><strong>"\\S"</strong>&nbsp;đại diện cho một ký tự không phải là khoảng trắng, ngược lại với "\\s"</li>\n	<li><strong>"\\w"</strong>&nbsp;đại diện cho một ký tự từ A-Z hoặc a-z hoặc 0-9, hoặc ký tự gạch dưới "_"</li>\n	<li><strong>"\\W"&nbsp;</strong>đại diện cho một ký tự không phải là từ A-Z, a-z, 0-9, ký tự gạch dưới "_"</li>\n</ul>\n\n<p>Ví dụ:</p>\n\n<pre>\nvar str = ''Xin chào!, tôi là VANKHUONG 777'';\nvar str5 = str.replace(/\\w/g, ''*'');\n// str5: *** **à*!, *ô* *à ********* ***</pre>\n', 'biểu thức chính quy,regex,', 0, 0, 0, 0, '2016-07-28 02:41:02', '2016-07-28 02:41:02'),
(7, 2, 3, 'tiêu đề bài viết', 'tieu-de-bai-viet', 'image', 'D:\\xampp\\htdocs\\eentertainment\\public/images/items/839058.jpg', 'ahay đó nha', '<p>fsdgsdgsdhsdhs</p>\r\n\r\n<p>cộng hõa xã hội chủ nghĩa việt nam</p>\r\n', 'fsdfsdg,dghsgusg,', 0, 0, 0, 1, '2016-07-28 03:15:54', '2016-07-28 03:15:54');

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
(1, 'cate 1', 'cate-1', 'ffs asagasgas', 0, NULL, NULL),
(2, 'cate 2', 'cate-2', 'dssgsdg sdgs', 0, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
