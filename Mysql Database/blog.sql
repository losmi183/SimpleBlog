-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 12:46 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `parent_id`, `user_id`, `name`, `content`, `likes`, `dislikes`, `created_at`) VALUES
(1, 0, NULL, 'sdvf', 'sdfv', 11, 18, '2020-09-23 08:35:30'),
(2, 0, NULL, 'milos', 'Opasna spika, bice u 7 utakmica sigurno', 80, 19, '2020-09-23 08:35:28'),
(3, 0, NULL, 'moca', 'Jokic Davis strasan duel odlucuje ko prolazi', 680, 20, '2020-09-23 08:35:26'),
(15, 1, NULL, 'milos', 'ne seri e', 0, 0, '2020-09-22 13:19:29'),
(16, 1, NULL, 'kristina', 'ne jedi govna', 0, 0, '2020-09-22 15:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Preview: Nuggets look to sink Clippers title hopes in Game 7', '<p>As much as this year has been unlike any other, the Nuggets are back in the same situation they found themselves in about one year ago, with four quarters standing between them and the Western Conference Finals. The Nuggets aren&rsquo;t in unfamiliar territory for these playoffs &mdash; this is their sixth elimination game so far, having knocked off the Utah Jazz in seven games after facing a 3-1 deficit. This series seemed like it would be over early after the Nuggets dropped Game Three and Four, especially with the way they lost Game Four. Their rookie forward Michael Porter Jr. was sounding off to the media about the need for the offense to share the ball more, and things looked bleak. But when the Nuggets felt trapped by the Clippers, the Clippers were really trapped by the Nuggets. Denver has rallied to force a Game Seven, winning their last game thanks to a dominant second half that saw them outscore Los Angeles 64-35 in the second half. The offense found their groove, they got a ton of stops in a row, and they put themselves in a situation Pwhere winner takes all and advances, while the loser packs their bags and goes home. Will Nikola Jokic lead the Denver Nuggets to a third straight win over Paul George and Kawhi Leonard? Will Jamal Murray and Gary Harris power their team to another thrilling finish? The Basics Who: Denver Nuggets vs Los Angeles Clippers What: Game Seven! When: 8:00 PM ET How to Watch: ESPN Rival Blog: Clips Nation</p>', 'Mike Malone', '5f66a13274528.jpg', '2020-08-31 22:00:00', NULL),
(2, 'The Nuggets deserve to be here, don’t let anyone tell you differently | Nuggets Numbers', '<p>Host Ryan Blackburn breaks down the journey of the Denver Nuggets through the regular season and into the playoffs before delving into Game 7, discussing: Regular season roller coaster of moments Resiliency from Nikola Jokic Jamal Murray&rsquo;s potential coronation What to expect from the stars in Game 7 Which role players could turn the tide What happens if Denver wins or loses It&rsquo;s okay to crow about it if they win</p>', 'Jokic', '5f66a1420151a.jpg', NULL, NULL),
(65, 'The Nuggets deserve to be here, don’t let anyone tell you differently | Nuggets Numbers', '<div class=\"card\" style=\"box-sizing: border-box; position: relative; display: flex; flex-direction: column; min-width: 0px; overflow-wrap: break-word; background-color: #ffffff; background-clip: border-box; border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 0.25rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 20px;\">\r\n<div class=\"card-body\" style=\"box-sizing: border-box; flex: 1 1 auto; min-height: 1px; padding: 1.25rem;\">\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\">Host Ryan Blackburn breaks down the journey of the Denver Nuggets through the regular season and into the playoffs before delving into Game 7, discussing: Regular season roller coaster of moments Resiliency from Nikola Jokic Jamal Murray&rsquo;s potential coronation What to expect from the stars in Game 7 Which role players could turn the tide What happens if Denver wins or loses It&rsquo;s okay to crow about it if they win</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>', 'Mike Malone', '5f66a28b8ccf0.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(24, 'milos.glogovac@outlook.com', '$2y$10$q4lo4/5dpCvkysfp1Gy.lO.J3BjnzrYm.kUs3EG5/xrjwYtjUZc4S', 'radimkidam', 0, 0, 1, 0, 1599813858, NULL, 0),
(25, 'milos.glogovac@gmail.com', '$2y$10$IoNFBkEvzGrdFBkcGNGyruiQxLoyAkzWKj31g4nudMG1J9jSa.mQu', 'nilos', 0, 1, 1, 0, 1599813968, 1599827716, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_confirmations`
--

INSERT INTO `users_confirmations` (`id`, `user_id`, `email`, `selector`, `token`, `expires`) VALUES
(24, 24, 'milos.glogovac@outlook.com', 'pqJ23xXNNfgqmVH0', '$2y$10$deae2.KBhAbic/W4AjFLUeNTxNB6zK1pe.0x4AaEj2LtwSPhF/YWu', 1599900258);

-- --------------------------------------------------------

--
-- Table structure for table `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('OMhkmdh1HUEdNPRi-Pe4279tbL5SQ-WMYf551VVvH8U', 18.5433, 1599827685, 1599863685),
('LWL0rd4kPlLU_-4ZhJmLWaNBenl54K21d6PyeQuHUFU', 29, 1599781791, 1599853791),
('pN0DreeOQxYLWucVu8SN3oZCfMVocNI2_gqi_mCKhRo', 29, 1599781791, 1599853791),
('HIJQJPUQ2qyyTt0Q7_AuZA0pXm27czJnqpJsoA5IFec', 49, 1599813987, 1599885987),
('PZ3qJtO_NLbJfRIP-8b4ME4WA3xxc6n9nbCORSffyQ0', 3.74553, 1599813971, 1600245971),
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 45.1834, 1599827716, 1600367716),
('-DskYo2suQFu5k8Pm2CyHkjPGc2QT1uOmOT5cLJIeog', 499, 1599827685, 1600000485),
('iFHxYxthhFT-LkeC_fU80oFVP3oJ3Dh8XWfxQakVFPg', 29, 1599813987, 1599885987),
('RxzqbQX580e2HtWKXoWTBWDJl5lE9dueoacA87amfKg', 29, 1599813987, 1599885987);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Indexes for table `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
