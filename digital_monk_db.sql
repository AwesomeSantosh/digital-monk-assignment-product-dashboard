-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2025 at 09:05 PM
-- Server version: 10.6.21-MariaDB-cll-lve
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_monk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `username`, `hashed_password`, `created_at`, `updated_at`) VALUES
(1, 'Admin@digitalmonk.org', '$2y$10$yZxlpmyMCAlNvLLlIBMyuOHIHz3Nt0DGzJup071QCmUG2bkBkyBOq', '2025-06-04 06:39:03', '2025-06-06 03:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `project_id`, `image_path`, `created_at`, `updated_at`) VALUES
(54, 22, 'gallery/a644f06636f6bf054b9976b92e9e4a3a.png', '2025-06-04 17:52:34', '2025-06-04 17:52:34'),
(56, 24, 'gallery/a644f06636f6bf054b9976b92e9e4a3a.png', '2025-06-04 18:00:28', '2025-06-04 18:00:28'),
(58, 26, 'gallery/44416835b51d777d341da9fec4e3af7e@2x.png', '2025-06-04 18:02:44', '2025-06-04 18:02:44'),
(59, 27, 'gallery/a644f06636f6bf054b9976b92e9e4a3a.png', '2025-06-04 18:04:10', '2025-06-04 18:04:10'),
(60, 28, 'gallery/66915eefbf730aa0c855e43c798ddf21.png', '2025-06-04 18:09:02', '2025-06-04 18:09:02'),
(62, 30, 'gallery/c83e7a9ce5a6d95ba15364c6b32e91d3.png', '2025-06-04 18:12:08', '2025-06-04 18:12:08'),
(63, 31, 'gallery/feb433ceb0de7ca3e42d079714b24cbb.png', '2025-06-04 18:13:58', '2025-06-04 18:13:58'),
(64, 32, 'gallery/d94fd1e824633cfd352fed187d1e7e00.png', '2025-06-04 18:15:32', '2025-06-04 18:15:32'),
(65, 33, 'gallery/a7a3dd4ac1728bdd7d2215185a438bae.png', '2025-06-04 18:16:51', '2025-06-04 18:16:51'),
(66, 34, 'gallery/66915eefbf730aa0c855e43c798ddf21 (1).png', '2025-06-04 18:20:35', '2025-06-04 18:20:35'),
(67, 35, 'gallery/9dcf747a0a7e30849ac90fa8b7b5a8a5.png', '2025-06-04 18:22:04', '2025-06-04 18:22:04'),
(68, 36, 'gallery/44416835b51d777d341da9fec4e3af7e@2x (1).png', '2025-06-04 18:23:02', '2025-06-04 18:23:02'),
(69, 37, 'gallery/a5ddcfefb4a2252b02e3abedaaa7ab09.png', '2025-06-04 18:26:08', '2025-06-04 18:26:08'),
(70, 38, 'gallery/f8d4bbd02c4173a5c22dd08af1c4445a.png', '2025-06-04 18:29:54', '2025-06-04 18:29:54'),
(71, 39, 'gallery/cee249ec92977b680d0a2073a7f082d5.png', '2025-06-04 18:30:51', '2025-06-04 18:30:51'),
(72, 40, 'gallery/d94fd1e824633cfd352fed187d1e7e00 (1).png', '2025-06-04 18:32:28', '2025-06-04 18:32:28'),
(73, 41, 'gallery/a7a3dd4ac1728bdd7d2215185a438bae (1).png', '2025-06-04 18:33:32', '2025-06-04 18:33:32'),
(74, 42, 'gallery/c83e7a9ce5a6d95ba15364c6b32e91d3 (1).png', '2025-06-04 18:35:13', '2025-06-04 18:35:13'),
(75, 43, 'gallery/f8d4bbd02c4173a5c22dd08af1c4445a.png', '2025-06-04 18:38:28', '2025-06-04 18:38:28'),
(76, 44, 'gallery/d94fd1e824633cfd352fed187d1e7e00 (1).png', '2025-06-04 18:39:33', '2025-06-04 18:39:33'),
(77, 45, 'gallery/9dcf747a0a7e30849ac90fa8b7b5a8a5.png', '2025-06-04 18:40:59', '2025-06-04 18:40:59'),
(78, 46, 'gallery/', '2025-06-04 18:42:22', '2025-06-04 18:42:22'),
(79, 47, 'gallery/66915eefbf730aa0c855e43c798ddf21.png', '2025-06-04 18:44:34', '2025-06-04 18:44:34'),
(80, 48, 'gallery/c83e7a9ce5a6d95ba15364c6b32e91d3 (1).png', '2025-06-04 18:45:59', '2025-06-04 18:45:59'),
(81, 49, 'gallery/a7a3dd4ac1728bdd7d2215185a438bae (2).png', '2025-06-04 18:54:41', '2025-06-04 18:54:41'),
(82, 50, 'gallery/7d940d8a061ea9ac973cb1fb35994278.png', '2025-06-04 18:55:33', '2025-06-04 18:55:33'),
(83, 51, 'gallery/d94fd1e824633cfd352fed187d1e7e00 (2).png', '2025-06-04 18:56:56', '2025-06-04 18:56:56'),
(84, 52, 'gallery/f8d4bbd02c4173a5c22dd08af1c4445a (1).png', '2025-06-04 18:58:10', '2025-06-04 18:58:10'),
(85, 53, 'gallery/a644f06636f6bf054b9976b92e9e4a3a (1).png', '2025-06-04 19:00:09', '2025-06-04 19:00:09'),
(86, 54, 'gallery/a7a3dd4ac1728bdd7d2215185a438bae (3).png', '2025-06-04 19:01:24', '2025-06-04 19:01:24'),
(87, 55, 'gallery/a5ddcfefb4a2252b02e3abedaaa7ab09 (1).png', '2025-06-04 19:02:31', '2025-06-04 19:02:31'),
(88, 56, 'gallery/a7a3dd4ac1728bdd7d2215185a438bae (4).png', '2025-06-04 19:04:31', '2025-06-04 19:04:31'),
(89, 57, 'gallery/a7a3dd4ac1728bdd7d2215185a438bae (3).png', '2025-06-04 19:05:51', '2025-06-04 19:05:51'),
(90, 58, 'gallery/d94fd1e824633cfd352fed187d1e7e00 (2).png', '2025-06-04 19:07:18', '2025-06-04 19:07:18'),
(91, 59, 'gallery/a5ddcfefb4a2252b02e3abedaaa7ab09 (1).png', '2025-06-04 19:08:15', '2025-06-04 19:08:15'),
(92, 60, 'gallery/f8d4bbd02c4173a5c22dd08af1c4445a.png', '2025-06-04 19:09:09', '2025-06-04 19:09:09'),
(93, 61, 'gallery/44416835b51d777d341da9fec4e3af7e@2x (2).png', '2025-06-04 19:11:10', '2025-06-04 19:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `main_image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `title`, `description`, `main_image_path`, `created_at`, `updated_at`) VALUES
(22, 'Sindhurmani  Rati Kamdev Puja for Married Couple', 'Sindhurmani  Rati Kamdev Puja for Married Couple', 'gallery/a644f06636f6bf054b9976b92e9e4a3a.png', '2025-06-04 17:52:34', '2025-06-04 17:52:34'),
(24, 'Sindhurmani Rati Kamdev Puja for UnmarriedCouple', 'Sindhurmani Rati Kamdev Puja for UnmarriedCouple', 'gallery/a644f06636f6bf054b9976b92e9e4a3a.png', '2025-06-04 18:00:28', '2025-06-04 18:00:28'),
(26, 'Sindhurmani Rati Kamdev Puja for Divorcee Couple', 'Sindhurmani Rati Kamdev Puja for Divorcee Couple\r\n\r\n', 'gallery/44416835b51d777d341da9fec4e3af7e@2x.png', '2025-06-04 18:02:44', '2025-06-04 18:02:44'),
(27, 'Sindhurmani Rati Kamdev Puja for Happy Married Life', 'Sindhurmani Rati Kamdev Puja for Happy Married Life', 'gallery/a644f06636f6bf054b9976b92e9e4a3a.png', '2025-06-04 18:04:10', '2025-06-04 18:04:10'),
(28, 'Kal Sarpa Dosh Nivaran Puja', 'Kal Sarpa Dosh Nivaran Puja', 'gallery/66915eefbf730aa0c855e43c798ddf21.png', '2025-06-04 18:09:02', '2025-06-04 18:09:02'),
(30, 'Pitrudosh Nivaran Puja', 'Pitrudosh Nivaran Puja', 'gallery/c83e7a9ce5a6d95ba15364c6b32e91d3.png', '2025-06-04 18:12:08', '2025-06-04 18:12:08'),
(31, 'Mangal Dosh Nivaran Puja for Unmarried people', 'Mangal Dosh Nivaran Puja for Unmarried people', 'gallery/feb433ceb0de7ca3e42d079714b24cbb.png', '2025-06-04 18:13:58', '2025-06-04 18:13:58'),
(32, 'Gayatri Puja for Kids', 'Gayatri Puja for Kids', 'gallery/d94fd1e824633cfd352fed187d1e7e00.png', '2025-06-04 18:15:32', '2025-06-04 18:15:32'),
(33, 'Nav Graha Puja for Family', 'Nav Graha Puja for Family', 'gallery/a7a3dd4ac1728bdd7d2215185a438bae.png', '2025-06-04 18:16:51', '2025-06-04 18:16:51'),
(34, 'Kal Sarpa Dosh Puja for Friends', 'Kal Sarpa Dosh Puja for Friends', 'gallery/66915eefbf730aa0c855e43c798ddf21 (1).png', '2025-06-04 18:20:35', '2025-06-04 18:20:35'),
(35, 'Vastu Shanti Puja for Peace', 'Vastu Shanti Puja for Peace', 'gallery/9dcf747a0a7e30849ac90fa8b7b5a8a5.png', '2025-06-04 18:22:04', '2025-06-04 18:22:04'),
(36, 'Gauri Shankar Puja for Love and Harmony', 'Gauri Shankar Puja for Love and Harmony', 'gallery/44416835b51d777d341da9fec4e3af7e@2x (1).png', '2025-06-04 18:23:02', '2025-06-04 18:23:02'),
(37, 'Durga Puja for Kids', 'Durga Puja for Kids', 'gallery/a5ddcfefb4a2252b02e3abedaaa7ab09.png', '2025-06-04 18:26:08', '2025-06-04 18:26:08'),
(38, 'Sarvashtak Puja for Teenagers', 'Sarvashtak Puja for Teenagers', 'gallery/f8d4bbd02c4173a5c22dd08af1c4445a.png', '2025-06-04 18:29:54', '2025-06-04 18:29:54'),
(39, 'Gauri Shankar Puja', 'Gauri Shankar Puja', 'gallery/cee249ec92977b680d0a2073a7f082d5.png', '2025-06-04 18:30:51', '2025-06-04 18:30:51'),
(40, 'Satyanarayan Puja ', 'Satyanarayan Puja ', 'gallery/d94fd1e824633cfd352fed187d1e7e00 (1).png', '2025-06-04 18:32:28', '2025-06-04 18:32:28'),
(41, 'Shanti Puja', 'Shanti Puja', 'gallery/a7a3dd4ac1728bdd7d2215185a438bae (1).png', '2025-06-04 18:33:32', '2025-06-04 18:33:32'),
(42, 'Munji Puja for Boys', 'Munji Puja for Boys', 'gallery/c83e7a9ce5a6d95ba15364c6b32e91d3 (1).png', '2025-06-04 18:35:13', '2025-06-04 18:35:13'),
(43, 'Money Magnet Puja', 'Money Magnet Puja', 'gallery/f8d4bbd02c4173a5c22dd08af1c4445a.png', '2025-06-04 18:38:28', '2025-06-04 18:38:28'),
(44, 'Money Attract Puja', 'Money Attract Puja', 'gallery/d94fd1e824633cfd352fed187d1e7e00 (1).png', '2025-06-04 18:39:33', '2025-06-04 18:39:33'),
(45, 'Success In Carrier Puja', 'Success In Carrier Puja', 'gallery/9dcf747a0a7e30849ac90fa8b7b5a8a5.png', '2025-06-04 18:40:59', '2025-06-04 18:40:59'),
(46, 'Puja for Financial problem', 'Puja for Financial problem', 'gallery/feb433ceb0de7ca3e42d079714b24cbb.png', '2025-06-04 18:42:22', '2025-06-04 18:42:22'),
(47, 'Kuber Puja for  wealth', 'Kuber Puja for  wealth', 'gallery/66915eefbf730aa0c855e43c798ddf21.png', '2025-06-04 18:44:34', '2025-06-04 18:44:34'),
(48, 'Kanakdhara Puja for prosperiety', 'Kanakdhara Puja for prosperiety', 'gallery/c83e7a9ce5a6d95ba15364c6b32e91d3 (1).png', '2025-06-04 18:45:59', '2025-06-04 18:45:59'),
(49, 'Amavasya Puja', 'Amavasya Puja', 'gallery/a7a3dd4ac1728bdd7d2215185a438bae (2).png', '2025-06-04 18:54:41', '2025-06-04 18:54:41'),
(50, 'Vashikaran Puja', 'Vashikaran ', 'gallery/7d940d8a061ea9ac973cb1fb35994278.png', '2025-06-04 18:55:33', '2025-06-04 18:55:33'),
(51, 'Raksha Kavach Puja', 'Raksha Kavach Puja', 'gallery/d94fd1e824633cfd352fed187d1e7e00 (2).png', '2025-06-04 18:56:56', '2025-06-04 18:56:56'),
(52, 'Nazar Dosh Nivaran Puja', 'Nazar Dosh Nivaran Puja', 'gallery/f8d4bbd02c4173a5c22dd08af1c4445a (1).png', '2025-06-04 18:58:10', '2025-06-04 18:58:10'),
(53, 'Guruthi Puja ForProtection', 'Guruthi Puja ForProtection', 'gallery/f8d4bbd02c4173a5c22dd08af1c4445a (1).png', '2025-06-04 19:00:08', '2025-06-04 19:00:08'),
(54, 'Holika Dahan Puja', 'Holika Dahan Puja', 'gallery/a7a3dd4ac1728bdd7d2215185a438bae (3).png', '2025-06-04 19:01:24', '2025-06-04 19:01:24'),
(55, 'Black Magic Removal Puja for Family', 'Black Magic Removal Puja for Family', 'gallery/a5ddcfefb4a2252b02e3abedaaa7ab09 (1).png', '2025-06-04 19:02:31', '2025-06-04 19:02:31'),
(56, 'Durgashtami Puja', 'Durgashtami Puja', 'gallery/a7a3dd4ac1728bdd7d2215185a438bae (4).png', '2025-06-04 19:04:31', '2025-06-04 19:04:31'),
(57, 'Navratri Puja', 'Navratri Puja', 'gallery/a7a3dd4ac1728bdd7d2215185a438bae (3).png', '2025-06-04 19:05:51', '2025-06-04 19:05:51'),
(58, 'GauriPuja', 'GauriPuja', 'gallery/d94fd1e824633cfd352fed187d1e7e00 (2).png', '2025-06-04 19:07:18', '2025-06-04 19:07:18'),
(59, 'Grah Pravesh Puja', 'Grah Pravesh Puja', 'gallery/a5ddcfefb4a2252b02e3abedaaa7ab09 (1).png', '2025-06-04 19:08:15', '2025-06-04 19:08:15'),
(60, 'Ganesh Puja', 'Ganesh Puja', 'gallery/f8d4bbd02c4173a5c22dd08af1c4445a.png', '2025-06-04 19:09:09', '2025-06-04 19:09:09'),
(61, 'Vatsavitri Puja', 'Vatsavitri Puja', 'gallery/44416835b51d777d341da9fec4e3af7e@2x (2).png', '2025-06-04 19:11:10', '2025-06-04 19:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `project_tags`
--

CREATE TABLE `project_tags` (
  `project_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `project_tags`
--

INSERT INTO `project_tags` (`project_id`, `tag_id`) VALUES
(22, 38),
(24, 40),
(26, 42),
(27, 43),
(28, 44),
(30, 46),
(31, 47),
(32, 48),
(33, 49),
(34, 50),
(35, 51),
(36, 52),
(37, 53),
(38, 54),
(39, 55),
(40, 56),
(41, 57),
(42, 58),
(43, 59),
(44, 60),
(45, 61),
(46, 62),
(47, 63),
(48, 64),
(49, 65),
(50, 66),
(51, 67),
(52, 68),
(53, 69),
(54, 70),
(55, 71),
(56, 72),
(57, 73),
(58, 74),
(59, 75),
(60, 76),
(61, 77);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(37, 'Love & relationship'),
(38, 'Love & Relationship'),
(39, 'Love & Relationship'),
(40, 'Love & Relationship'),
(41, 'Love & Relationship'),
(42, 'Love & Relationship'),
(43, 'Love & Relationship'),
(44, 'Good Health'),
(45, 'Good Health'),
(46, 'Good Health'),
(47, 'Good Health'),
(48, 'Good Health'),
(49, 'Good Health'),
(50, 'Good Health'),
(51, 'Love & Relationship'),
(52, 'Love & Relationship'),
(53, 'Children'),
(54, 'Children'),
(55, 'Children'),
(56, 'Children'),
(57, 'Children'),
(58, 'Children'),
(59, 'Money & Career'),
(60, 'Money & Career'),
(61, 'Money & Career'),
(62, 'Money & Career'),
(63, 'Money & Career'),
(64, 'Money & Career'),
(65, ' Black Magic & Evil Eye'),
(66, ' Black Magic & Evil Eye'),
(67, 'Black Magic & Evil Eye'),
(68, 'Black Magic & Evil Eye'),
(69, 'Black Magic & Evil Eye'),
(70, 'Black Magic & Evil Eye'),
(71, 'Black Magic & Evil Eye'),
(72, 'Festive'),
(73, 'Festive'),
(74, 'Festive'),
(75, 'Festive'),
(76, 'Festive'),
(77, 'Festive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_tags`
--
ALTER TABLE `project_tags`
  ADD PRIMARY KEY (`project_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE;

--
-- Constraints for table `project_tags`
--
ALTER TABLE `project_tags`
  ADD CONSTRAINT `project_tags_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
