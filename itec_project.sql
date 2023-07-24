-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 24, 2023 at 01:02 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(22, 95, 116, '1', '2023-06-29 11:35:25', '2023-06-29 11:35:25'),
(23, 91, 115, '1', '2023-06-30 09:46:26', '2023-06-30 09:46:26'),
(24, 91, 115, '1', '2023-06-30 09:57:41', '2023-06-30 09:57:41'),
(25, 91, 117, 't', '2023-06-30 10:22:16', '2023-06-30 10:22:16'),
(26, 95, 117, '2312', '2023-07-01 15:24:01', '2023-07-01 15:24:01'),
(27, 94, 127, 'dsad', '2023-07-01 16:18:05', '2023-07-01 16:18:05'),
(28, 94, 127, 'dasda', '2023-07-01 16:18:07', '2023-07-01 16:18:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb3;

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(37, 'Bui Thanh TUng', '1'),
(45, 'toi dep trai1', '1'),
(46, 'Magic', 'just Lufier '),
(47, 'Wizar', 'smal '),
(48, 'dasdas', 'dasdas');

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
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`, `image`) VALUES
(94, 'admin1', '1@gmai.com', 'Admin', '$2y$10$zWeXQZLbqzkmE6GGJNBQFO43PgwnPss/bJGVRuYJEafkIaBLVOumm', '2023-06-27 16:58:18', NULL, '1688203045_leo-maverick-plVVOvpbkIw-unsplash.jpg'),
(96, 'duy', 'duy@gmail.com', 'Author', '$2y$10$VWoN52DcKnxkdIgFP3O9/OxCR3di2XDRi9is/kS/j88c6tz4RrcCO', '2023-07-01 08:55:10', NULL, NULL);

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
