-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 10:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vnim`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` bigint(20) NOT NULL,
  `job_id` bigint(20) DEFAULT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `active` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order_num` bigint(20) DEFAULT 0,
  `view_num` bigint(20) DEFAULT 0,
  `meta_title` int(11) DEFAULT NULL,
  `meta_key` int(11) DEFAULT NULL,
  `meta_desc` int(11) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(20) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT 0,
  `order_num` bigint(20) DEFAULT 0,
  `alias` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `lang` varchar(255) DEFAULT 'EN',
  `active` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_phone` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `hr_email` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `logo`, `company_name`, `company_address`, `company_phone`, `company_email`, `hr_email`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Vietnam Immi Org', '40 Thiên Phước, Ward 9, Tân Bình Disctrict, Hồ Chí Minh City', '0123456789', 'codehgl@gmail.com', 'hr@todc.com', 1, '2023-12-05 08:14:24', '2023-12-05 02:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `active` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `lastname`, `avatar`, `phone`, `birthday`, `gender`, `role_id`, `last_activity`, `active`, `created_at`, `updated_at`) VALUES
(1, 'codehgl@gmail.com', '$2y$12$HyS4mHEUBNkpLGMr.M4fEO1h1IW9WzBAbm9Y13KyLF9ZoaHc3jAqq', 'VAN HAU', 'NGUYEN', 'users/1/avatar/iaESNWpHkPOSPJO62wGJwgSEsgJtIl2HHLSrv540.png', '0384375658', '2023-11-30', '1', 1, '2023-12-11 09:23:34', 1, '2023-11-30 04:10:29', '2023-12-11 09:23:34'),
(2, 'abc@gm.com', '$2y$12$Vec.zeu1VwWiTRBz5suRJ.QFXdE.JrjV3jIgJ4IkiFDWH.J54Hr3u', 'Content', 'Position', NULL, '0123566745', '2023-12-16', '2', 2, '2023-12-06 11:32:53', 1, '2023-12-06 11:28:59', '2023-12-06 11:32:53'),
(3, 'hr@gm.com', '$2y$12$APMKA3iCwpu73/MUz2WzU.Mn31z2EdB7quM0byrgVbdY9p2DlzQEe', 'Human Resources', 'Position', 'users/3/avatar/55GJfqeLa9Ru6BQ1KJNLhNnY7yjnwEKox5mWSvcE.png', '0123456789', '2001-07-21', '2', 3, '2023-12-06 11:37:29', 1, '2023-12-06 11:31:29', '2023-12-06 11:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `alias`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '<p>All Permissions</p>', 1, '2023-12-06 02:56:00', '2023-12-06 02:56:00'),
(2, 'Content', 'content', '<p>Content writer</p>', 1, '2023-12-06 09:58:35', '2023-12-06 09:58:35'),
(3, 'Hr', 'hr', '<p>Human resources</p>', 1, '2023-12-06 09:59:04', '2023-12-06 09:59:04'),
(4, 'Customer Support', 'cs', '<p>Support Guest</p>', 1, '2023-12-06 09:59:34', '2023-12-06 09:59:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
