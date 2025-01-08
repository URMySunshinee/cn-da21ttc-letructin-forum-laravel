-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 01, 2025 at 05:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nameCategory` varchar(255) NOT NULL,
  `delCategory` tinyint(4) NOT NULL DEFAULT 0,
  `imageCategory` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nameCategory`, `delCategory`, `imageCategory`) VALUES
(1, 'Lập trình', 0, NULL),
(2, 'Phần cứng', 0, NULL),
(3, 'Bảo mật', 0, NULL),
(4, 'Công nghệ mới', 0, NULL),
(6, 'adđ', 0, NULL),
(7, 'dưdw', 0, NULL),
(8, 'fwfwqff', 0, NULL),
(9, 'fqwfwfwq', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `namePost` varchar(255) NOT NULL,
  `descriptionPost` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datePost` datetime NOT NULL DEFAULT current_timestamp(),
  `mainImage` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `viewPost` int(11) NOT NULL DEFAULT 0,
  `delPost` tinyint(4) NOT NULL DEFAULT 1,
  `isAccepted` tinyint(4) NOT NULL DEFAULT 1,
  `likePost` int(11) NOT NULL DEFAULT 0,
  `dislikePost` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `namePost`, `descriptionPost`, `user_id`, `datePost`, `mainImage`, `category_id`, `viewPost`, `delPost`, `isAccepted`, `likePost`, `dislikePost`) VALUES
(1, 'Lập trình PHP có khó không ?', 'Đây là 1 bài viết rất đáng đọc cho các bạn chuẩn bị học php', 4, '2024-12-29 16:38:24', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_f_hWcpP5Gz3drqFxJWpcIxomPvBwyBRIIQ&s', 1, 29, 0, 0, 2, 0),
(2, 'Học PHP cơ bản', 'Bài viết hướng dẫn cách học PHP cơ bản cho người mới bắt đầu.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 1, 0, 0, 0, 0, 0),
(3, 'Laravel Framework', 'Tìm hiểu về Laravel Framework và cách sử dụng.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 1, 0, 0, 0, 0, 0),
(4, 'Cách tối ưu mã nguồn PHP', 'Những mẹo tối ưu mã nguồn PHP để cải thiện hiệu suất.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 1, 0, 0, 0, 0, 0),
(5, 'Giới thiệu về Node.js', 'Node.js là gì? Ưu điểm và nhược điểm của Node.js.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 1, 0, 0, 0, 0, 0),
(6, 'So sánh giữa PHP và Python', 'Điểm mạnh và yếu của PHP so với Python trong phát triển web.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 1, 0, 0, 0, 0, 0),
(7, 'Những CPU mạnh nhất 2024', 'Danh sách các CPU mạnh nhất cho PC năm 2024.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 2, 0, 0, 0, 0, 0),
(8, 'Lựa chọn ổ cứng SSD hay HDD?', 'SSD và HDD: Lựa chọn nào phù hợp với bạn.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 2, 1, 0, 0, 0, 0),
(9, 'Card đồ họa NVIDIA RTX 4000', 'Tìm hiểu về dòng card đồ họa NVIDIA RTX 4000 mới nhất.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 2, 0, 0, 0, 0, 0),
(10, 'Lắp ráp PC Gaming', 'Hướng dẫn lắp ráp một chiếc PC Gaming mạnh mẽ.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 2, 0, 0, 0, 0, 0),
(11, 'Các loại RAM phổ biến', 'Khám phá các loại RAM phổ biến trên thị trường hiện nay.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 2, 0, 0, 0, 0, 0),
(12, 'Tấn công mạng phổ biến đó', 'Những kiểu tấn công mạng phổ biến và cách phòng tránh.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 3, 0, 0, 1, 0, 0),
(13, 'VPN là gì?', 'VPN hoạt động như thế nào và tại sao cần sử dụng VPN.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 3, 0, 0, 0, 0, 0),
(14, 'Xây dựng hệ thống bảo mật', 'Hướng dẫn xây dựng hệ thống bảo mật cho doanh nghiệp.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 3, 0, 0, 0, 0, 0),
(15, 'Mật khẩu an toàn', 'Cách tạo và quản lý mật khẩu an toàn.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 3, 0, 0, 0, 0, 0),
(16, 'Phát hiện lỗ hổng bảo mật', 'Sử dụng công cụ để phát hiện lỗ hổng bảo mật trong ứng dụng.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 3, 0, 0, 0, 0, 0),
(17, 'AI trong cuộc sống', 'Ứng dụng của trí tuệ nhân tạo trong cuộc sống hàng ngày.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 4, 0, 0, 0, 0, 0),
(18, 'Công nghệ 5G', 'Khám phá tiềm năng của công nghệ mạng 5G.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 4, 0, 0, 0, 0, 0),
(19, 'Metaverse là gì?', 'Khái niệm về Metaverse và những tiềm năng của nó.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 4, 0, 0, 0, 0, 0),
(20, 'Robot thông minh', 'Tìm hiểu về các loại robot thông minh hiện nay.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 4, 2, 0, 0, 0, 0),
(21, 'Blockchain và tiền điện tử', 'Cách Blockchain đang thay đổi thế giới tài chính.', 4, '2024-12-29 17:38:18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZCIgfUfJUyzxTaCzWkZQIKzCltjNHq-Ti0g&s', 4, 0, 0, 0, 0, 0),
(23, 'Lap trinh C# cho nguoi moi', 'Bai viet nay noi ve lap trinh c#', 6, '2024-12-31 11:26:00', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRA5RJpzxFJSFSNhp7UGtUCfkXq-4XbSBbW0w&s', 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `dateComment` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `content`, `dateComment`, `comment_id`) VALUES
(1, 4, 1, 'hello', '2024-12-30 14:23:24', NULL),
(4, 6, 1, 'Hahaha bình luận của bạn buồn cười quá :))', '2024-12-30 15:10:36', 1),
(5, 6, 1, 'Sao bạn không trả lời comment của tôi', '2024-12-30 15:11:52', 1),
(7, 4, 1, 'Đây giờ tôi trả lời đây', '2024-12-30 22:41:48', 1),
(8, 6, 1, 'Hello cac doc gia', '2024-12-31 11:15:24', NULL),
(9, 6, 1, 'Chao nam', '2024-12-31 11:16:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `content` longtext NOT NULL,
  `index` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_details`
--

INSERT INTO `post_details` (`id`, `title`, `image`, `content`, `index`, `post_id`) VALUES
(1, 'Lập trình PHP có khó không? Góc nhìn dành cho người mới', NULL, 'Nhiều người nghĩ rằng lập trình là lĩnh vực phức tạp, nhưng với PHP, mọi thứ trở nên đơn giản hơn. PHP có cú pháp dễ hiểu, nhiều tài liệu hỗ trợ và được sử dụng phổ biến trong phát triển web. Nếu bạn mới bắt đầu, hãy thử làm quen với những khái niệm cơ bản như biến, vòng lặp và hàm.', 2, 1),
(2, 'Tại sao PHP là lựa chọn tốt cho người học lập trình?', NULL, '<p><u><b>PHP không chỉ dễ học mà còn có khả năng ứng dụng cao trong thực tế. Với PHP, bạn có thể nhanh chóng tạo ra một website động, kết nối cơ sở dữ liệu hoặc tích hợp các công cụ mạnh mẽ như Laravel hay Symfony. Đây là lý do tại sao PHP là bước khởi đầu lý tưởng.</b></u></p>', 1, 1),
(3, 'PHP có thực sự dễ học? Điều gì khiến người học gặp khó khăn?', NULL, 'Dù PHP được coi là dễ học, nhưng không tránh khỏi những khó khăn khi bạn mới tiếp xúc. Một số thách thức thường gặp bao gồm: hiểu logic lập trình, xử lý lỗi cú pháp, và làm việc với cơ sở dữ liệu. Tuy nhiên, khi thực hành thường xuyên, bạn sẽ cảm thấy những điều này dần trở nên quen thuộc.', 3, 1),
(4, 'Bí quyết học PHP hiệu quả cho người mới bắt đầu', NULL, 'Tập trung vào việc học cú pháp cơ bản như khai báo biến, viết hàm, và điều kiện.\r\nXem các video hướng dẫn hoặc tham gia khóa học online để có lộ trình học tập rõ ràng.\r\nThực hành làm các bài tập nhỏ, ví dụ: tạo một form đăng ký và lưu dữ liệu vào cơ sở dữ liệu.', 4, 1),
(5, 'Học PHP nhanh chóng với các công cụ hỗ trợ\r\n', NULL, 'Để học PHP hiệu quả, hãy tận dụng các công cụ hỗ trợ như XAMPP, Laragon để tạo môi trường phát triển. Ngoài ra, các IDE như VS Code hoặc PhpStorm cũng giúp bạn viết mã nhanh và chính xác hơn nhờ tính năng gợi ý cú pháp.', 5, 1),
(6, 'Có cần biết kiến thức gì trước khi học PHP?', NULL, 'Bạn không cần quá nhiều kiến thức trước khi học PHP. Tuy nhiên, nếu bạn hiểu một chút về HTML, CSS và logic lập trình cơ bản, việc học PHP sẽ dễ dàng hơn. Những khái niệm này sẽ giúp bạn kết nối giữa PHP và các công nghệ web khác.', 6, 1),
(9, 'Lap trinh c# la gi ?', NULL, 'abcdeddjsf', 7, 23);

-- --------------------------------------------------------

--
-- Table structure for table `post_reacts`
--

CREATE TABLE `post_reacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_reacts`
--

INSERT INTO `post_reacts` (`id`, `user_id`, `post_id`, `type`) VALUES
(2, 4, 1, 0),
(3, 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nameRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nameRole`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1eOU0ytM0wTYg9SLYPlmftWVOltZ6Fbr1w69DTte', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiblJkcDVGR0luSkVFTkdIUGtyZkU3MU0yMlBEeUJFYXFKYUFxS0pRTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735737421),
('6eOSp2wyaHFqGdnIOKOenIaCHvR6OhnSmK6We4RU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0ZJSE9Xdk84UlpMN2x3WkdnTmNYOWI5OWhqUjd6U2FWSlJnV1BPSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGFuZ2VwYXNzZm9yZ290L3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735739660),
('6m26c2e2bec0IkASbKrw6ZwNRth59XHfmj3wLthq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2NZWlB3NkZSa1N2NGhlT2txVk9wTjFzdHdsUEZlVkYzaFBpaHhnbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGFuZ2VwYXNzZm9yZ290L3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735739649),
('6rANABzRHOIbKOlpjog9WRR4C1PdFhUNKvgnINq6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjFOeGFxQm9iaXRHemE1czNWajVpYmFFWWpjMnRkZFJzcDZnV2hQcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGFuZ2VwYXNzZm9yZ290L3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735743529),
('DwyrgNQ8brNZVSm6vuwlyX6njii6aE3hsH3Oc3fJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXEwSHJWRTNxTnlsSTRubUxtaGpVV0FMaGpSUEdoTXVqQ3RyR2x4eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvbXlwb3N0L3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735737421),
('hSe96EwTDgyr7h30Sh4S2g7PQalc6j1hE4qMn55a', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidlA1VUxtUVhtZ0t6bGZiYWJUdEdXcTRLTW9hUURYRVVmMlJJSVBycSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvbXlwb3N0L3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735737033),
('hZaWPWcXALjM8BsNTIOKP62KDXW6FrQprfJUcVw0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2dUOVJwR08wdDZrd29aWWtYMWJ5a0lFVEFaT2VIMUQ0cXY3ZnJnayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXRhaWwvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735737436),
('IzYp3ZWtfOve2M8QfgWS60YCPfAWf12NmQ2CEFID', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic29Qd1JZQm51TjB1emxhVTBjRUU5WWZOUXVUMHFSMGl1ZnJva3lqMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3Jnb3RwYXNzd29yZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735739661),
('lkD6rzzSML08EOmkkMxATRuc3zo8U2jy5CmAmLDP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSURzTWZxMGFIYnJNMmIxNWppWWgzbklyZHBkdkFOaUJrV0pFa2JScCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735737235),
('LTt7ItKjID3BSfyq7J0VRLoxkiwTQZ4ONP2TIxdO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0ltRkVGUDFxMzFUWldZOWtOZlFGVzE1UVphQXNKalhSZFo5UWw3cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvbXlwb3N0L3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735737254),
('np6KXxUx8DUdvUuYEEyfWmnznU3ecFmSRvASD4Ef', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUlLTGw4TGVTSnNuVjhGS2NUVWdNR1k2cUxaalVVa3lEWEhvdGpDZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXRhaWwvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735737407),
('oF2qwNx09mM6msT9k17uOzjgZ6DfWgKjSzaI8iIs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRk1EdFNyU2xuMEdRQ0dUTE5LekZTUVhwYjNFSTJCeXR3aWN6a1hZSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3Jnb3RwYXNzd29yZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735739693),
('OTF5PJpng0Bo6E9xeitdQbcor7fqmjNoxAf0meYC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3c0Q2xnNEk2dWM0UUJtYVZnWUphTFo0R2c4c3BvQW1BV1RZeXBQdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735737002),
('p8laooIcfW1IA1qV89OcYlbmmM7LSoGJCsNimjwr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibjFaQWdmeFdxOUhkUEZjckVCOVNiOUlRMjNsUWlmbUR0OG5kNGZyMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvbXlwb3N0L3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735737234),
('pWjlFtJVYotWUYDtAnILpLS12H3upFUi6l2N6fwf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0k2NUY5U1kxRHBDbmlaTk04T2JuMmxwY1BNVDVUaWpFZW5tZkxJUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735737033),
('qKukCm4BAJfnLPrGSP6ETpoD5F1bLjS5TK7xcMMu', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN0ZYY1laMXBrT01BRGRuWGFLdGxBeFd6THJ4UFp6ejQxWlZKaVdMWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1735745317),
('S3eWmfic4LXkAdzBkH23qnZpYjvTqrfrQCnpSTYP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1h1NVZFZlo5R0hsODRzUHpqanQxbEZaM0RIYnpGcGtJYTRNYXJwTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735744068),
('SPKUdzVOoFlDemyRq7cJa2SOikOnF5OCmw1sfwgw', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYmd0UTE5Ym1WZU5FcEJ5djNkSWFlRGFMSFdvaEQ2OXBuVDk2c1pLaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jYXRlZ29yeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1735744095),
('sSB9SVgavEcWm9ythgUYugRWESU4BKgc2oiy7cn1', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSFZrbmpXRW1hM3JrcmJjUXdTVXF3dkN1Rk9mTnVWSWdTc2FsdEdoQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1735744477),
('Stqy3YwQgHkQdk1wRQtr1DccDInnbe5FSIy9oSt8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzBSN1RkbUhoWURYeEFUZEV5OVZwVXBIcnUybG5wdFBwOGZjMmVHYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGFuZ2VwYXNzZm9yZ290L3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735739692),
('T6bJ8vFye7cXbdxJs5bQ5vMSPZ0ChEDWYdDTq2jF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjRrQkdVZVdJVmNIV214U3huUklaakd0ZzNCZVdqaVVXQ29qVU9EQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3Jnb3RwYXNzd29yZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735743530),
('W07cYa8yNxLUFz9H10YYuOEcmoxEYqaDrIdWi2Wi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFpKaGtkR3F5cTBZZVJXSnZlY1ZJcGRkSTFiUklaOFkyb1k5YXdhZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvbXlwb3N0L3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735737001),
('W2uvXoTyoAX3j0VUdZBVSSiKbGuYsNgZB4SQRH4d', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczByNEp5aEZCbktQVDJUdVlLQ3l4V09BZ2V1NjV1WHhjOGpKdHNvdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvbXlwb3N0L3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735744067),
('w9P3lh9yYjfaqHXd5UdWD6kNQtOAl4GS0GyfopMh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajlsMEY2WEJKSk5hak81RVc5d053dkNBZmlSMUlRSU9XSE1pZ1c2aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXRhaWwvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735737127),
('Wjj9ocYlbC6mKpbo5v5ai23toQXkOVe8YZssTL6d', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0p5Zjd3azdBY0RJZ2p0eXYyVHpmbHNBRjdoSUFLQVI1enVnSklsVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3Jnb3RwYXNzd29yZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735739650),
('wMzFjpipRWgox39A76fk3hUUQtOnYLzqOnsdJQab', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3VjSEJ0VjAxRXJ0ZXZSUk9zelhNbjZxSjRGOEhMeFJiS1pueG11WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735737254);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(1000) DEFAULT NULL,
  `delUser` tinyint(4) NOT NULL DEFAULT 0,
  `blockAddPost` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `phone`, `address`, `avatar`, `delUser`, `blockAddPost`) VALUES
(4, 'Nguyễn  Vũ Đại Nam', 'nguyenvudaianm113@gmail.com', NULL, '$2y$12$KF5Ahg41Rfr7KsLFVmGgCe6D6uLe4uL1MnIl0dnFSubIL3OwH3C3.', NULL, '2024-12-29 02:36:13', '2025-01-01 07:58:53', 2, '0365245602', 'Bình Thạnh', 'https://scontent.fsgn19-1.fna.fbcdn.net/v/t39.30808-6/469139710_3879333562388261_1646180906390911423_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=t41CV4EujfsQ7kNvgF7FAId&_nc_oc=Adjgy1ZEZ4K9Bbypl7N7R3H2DU4xOqXciLGAF-kyLd87OdTR7k8eLh-rQfFaQ9_XzEAw6C-VVJMgF2CqZZWreD5A&_nc_zt=23&_nc_ht=scontent.fsgn19-1.fna&_nc_gid=A27nEQSSALg3FoWG6hQktzh&oh=00_AYC2VDPIxZdcBAMQ6D-HP9ot-vtX44iONoc9L2jBgCn9LQ&oe=677821A6', 0, 0),
(5, 'admin', 'admin@gmail.com', NULL, '$2y$12$/Vm967DauTRtxrC5.E59Q.LUwMLJL7Vm2Q2xzkB7JlHuB38FjDgT2', NULL, '2024-12-29 02:36:46', '2024-12-29 02:36:46', 1, '0365245602', 'Hà Nội', NULL, 0, 0),
(6, 'Nguyễn Ngọc Thạch', 'thachnnps32314@fpt.edu.vn', NULL, '$2y$12$duh9548LUs9nrCXSt4j1c.NY0WK911mXfa2B6x7eUg8JPMSAmDbW2', NULL, '2024-12-30 00:07:21', '2024-12-30 01:50:34', 2, '0365245602', 'Bình Thạnh', 'https://scontent.fsgn19-1.fna.fbcdn.net/v/t39.30808-6/270219417_1457854404616294_2227565767921607815_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=833d8c&_nc_ohc=P4ChmqZ3hz8Q7kNvgF2JcMB&_nc_oc=Adi18RlWCQhaJX5E9a5rgDhVY_uDSSwO49_miX5ITYxP05nT5Y5VxBLvGrvCcYg0aPKv_nCLC_LDOjsi7lUc7qge&_nc_zt=23&_nc_ht=scontent.fsgn19-1.fna&_nc_gid=AdGdqlaT-l2d7--n3GQ3e1C&oh=00_AYDDiFz8lPGKrijL7Yq-6E8G9ktgrzuMmHxK6pgyXAtLyA&oe=67783ECA', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_post` (`user_id`),
  ADD KEY `fk_category_post` (`category_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_comment` (`user_id`),
  ADD KEY `fk_post_comment` (`post_id`),
  ADD KEY `fk_id_comment` (`comment_id`);

--
-- Indexes for table `post_details`
--
ALTER TABLE `post_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_detail` (`post_id`);

--
-- Indexes for table `post_reacts`
--
ALTER TABLE `post_reacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_react` (`post_id`),
  ADD KEY `fk_user_react` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_role_id_user` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_details`
--
ALTER TABLE `post_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_reacts`
--
ALTER TABLE `post_reacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_category_post` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_user_post` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `fk_id_comment` FOREIGN KEY (`comment_id`) REFERENCES `post_comments` (`id`),
  ADD CONSTRAINT `fk_post_comment` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `fk_user_comment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_details`
--
ALTER TABLE `post_details`
  ADD CONSTRAINT `fk_post_detail` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `post_reacts`
--
ALTER TABLE `post_reacts`
  ADD CONSTRAINT `fk_post_react` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `fk_user_react` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_id_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
