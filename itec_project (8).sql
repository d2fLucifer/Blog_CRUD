-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 29, 2023 at 04:44 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itec_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `post_id` int DEFAULT NULL,
  `body` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 91, 114, '12', '2023-06-28 16:16:29', '2023-06-28 16:16:29'),
(2, 91, 114, '1', '2023-06-28 16:16:32', '2023-06-28 16:16:32'),
(3, 95, 114, '1', '2023-06-28 16:24:22', '2023-06-28 16:24:22'),
(4, 95, 114, '1', '2023-06-28 16:29:35', '2023-06-28 16:29:35'),
(5, 95, 114, '2', '2023-06-28 16:53:32', '2023-06-28 16:53:32'),
(6, 95, 114, '513', '2023-06-28 16:53:38', '2023-06-28 16:53:38'),
(7, 95, 114, '2312', '2023-06-28 17:02:43', '2023-06-28 17:02:43'),
(8, 95, 114, '1', '2023-06-28 17:05:25', '2023-06-28 17:05:25'),
(9, 95, 114, '1', '2023-06-28 17:08:09', '2023-06-28 17:08:09'),
(10, 95, 114, '1', '2023-06-28 17:08:29', '2023-06-28 17:08:29'),
(11, 95, 114, 'Oc cho gam\r\n', '2023-06-28 17:15:23', '2023-06-28 17:15:23'),
(12, 91, 114, '2', '2023-06-29 03:57:26', '2023-06-29 03:57:26'),
(13, 91, 114, '1', '2023-06-29 03:57:40', '2023-06-29 03:57:40'),
(14, 91, 116, 'ok', '2023-06-29 04:02:49', '2023-06-29 04:02:49'),
(15, 91, 116, '1', '2023-06-29 04:04:30', '2023-06-29 04:04:30'),
(16, 91, 122, 'duoc day ', '2023-06-29 04:05:38', '2023-06-29 04:05:38'),
(17, 91, 114, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 91, 114, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 91, 114, '1', '2023-06-29 04:11:13', '2023-06-29 04:11:13'),
(20, 91, 114, '1', '2023-06-29 11:17:08', '2023-06-29 11:17:08'),
(21, 91, 122, 'I m disappointed', '2023-06-29 11:17:28', '2023-06-29 11:17:28'),
(22, 95, 116, '1', '2023-06-29 11:35:25', '2023-06-29 11:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `posted_time` timestamp NULL DEFAULT NULL,
  `topic_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `user_id` (`user_id`),
  KEY `FK_posts_topics` (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `views`, `image`, `body`, `published`, `created_at`, `updated_at`, `posted_time`, `topic_id`) VALUES
(114, 95, 'GAM CON ', 'eewqewqe', 135, '1687948121_gam-style.jpg', 'dep trai', 1, '2023-06-29 04:17:08', '0000-00-00 00:00:00', NULL, 37),
(115, 95, 'GAM SLAYDER', '121', 22, '1687948165_OIP.jpg', 'eqqe', 1, '2023-06-29 04:42:38', '0000-00-00 00:00:00', NULL, 37),
(116, 95, 'Fee ', '2121', 8, '1687948208_HỌC PHÍ CT AUT.jpg', 'eqweqw', 1, '2023-06-29 04:35:25', '0000-00-00 00:00:00', NULL, 37),
(117, 95, 'Udemy 32', '1', 0, '1687950285_leo-maverick-plVVOvpbkIw-unsplash.jpg', '3121', 1, '2023-06-28 11:04:45', '0000-00-00 00:00:00', NULL, 37),
(118, 95, 'dasdas', 'dasdas', 0, '1687950640_gaf-clickz-fTGRfv5kN7E-unsplash.jpg', 'dasda', 1, '2023-06-28 11:10:40', '0000-00-00 00:00:00', NULL, 37),
(119, 95, 'qweqweqw', 'eqweqw', 4, '1687950654_BIT1.jpg', 'ewqeqw', 1, '2023-06-29 04:36:15', '0000-00-00 00:00:00', NULL, 37),
(120, 95, 'eqweqwrqw', 'qewewq', 0, '1687950682_wepik-export-202305161525546wcy.jpeg', 'eqweqw', 1, '2023-06-28 11:11:22', '0000-00-00 00:00:00', NULL, 37),
(121, 91, 'Nhan oc cho', '21121', 0, '1687965327_349100409_733868858530662_7081721985245753201_n.jpg', '2312', 1, '2023-06-28 15:15:27', '0000-00-00 00:00:00', NULL, 37),
(122, 91, 'DM duy ', '321321', 4, '1688011529_leo-maverick-plVVOvpbkIw-unsplash.jpg', '121', 1, '2023-06-29 04:17:28', '0000-00-00 00:00:00', NULL, 37);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(37, 'Bui Thanh TUng', '1'),
(45, 'toi dep trai1', '1'),
(46, 'Magic', 'just Lufier ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`, `image`) VALUES
(91, 'admin', 'admin@gmail.com', 'Admin', '$2y$10$p4aXGiN2xGFGeDo6scUkW.SJwQ9NwHSRKDvWfkIijU6sTR.ygW4qq', '2023-06-27 03:36:52', NULL, '1687852744_maximilian-muller-vFTKC2wgfcY-unsplash (1).jpg'),
(93, 'dmNhan', 'd2f.working@gmail.com', 'Admin', '$2y$10$ofMmSsP7nW0oQ8CBQMV58O6fbfee4DP6BGXw3BdrdF2Iozkms1OXC', '2023-06-27 16:15:44', NULL, '1687885069_house illustration.png'),
(94, 'admin', '1@gmai.com', 'Author', '$2y$10$dq4qjPSU9BR.rHZ26I3ZxOuXVbTePJM8JZCuiXLrOoiAAWHNXXT.m', '2023-06-27 16:58:18', NULL, NULL),
(95, 'duy', 'duy@gmail.com', 'Author', '$2y$10$QuOJZepSxD5qj6k5yUwHBODq.gREPF6WCx34z2uXrCvAtq.6Tps46', '2023-06-28 10:28:01', NULL, '1687955565_OIP (1).jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_posts_topics` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `FK_posts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
