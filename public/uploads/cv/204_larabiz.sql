-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2018 at 04:33 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larabiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `user_id`, `name`, `website`, `email`, `phone`, `address`, `bio`, `created_at`, `updated_at`) VALUES
(2, 2, 'Chomneau', 'http://chomneau.com', 'chomneau@gmail.com', '09873664541', '#45, st.46', 'He is a good person', NULL, NULL),
(5, 1, 'Cambodia co, Ltd', 'cambocoted.com', 'cambodia@yahoo.com', '097-756-7563', '#87, St.234, Phnom Penh Cambodia', 'This company is very cool Tel me', '2017-07-12 21:05:43', '2017-10-18 08:33:00'),
(6, 2, 'Online', 'www.online.com.kh', 'info@online.com.kh', '09876-9876', '#54, st.653 Obekaom, Phnom Penh', 'This is online is good for internet connection', '2017-07-12 21:47:14', '2017-07-12 21:47:34'),
(7, 2, 'Cambodia', 'sdfsa', 'afdsafas@gmail.com', 'sfsafsa', 'afafaf', 'afdsaf', '2017-07-12 23:48:18', '2017-07-12 23:48:18'),
(9, 1, 'Dell', 'dell.com', 'dell.com@gmail.com', '8847474', 'sdsf435355', 'This is dell company', '2017-07-13 03:05:40', '2017-07-13 03:05:40'),
(10, 1, 'C L airpress', 'clairexpress.com', 'cl@gmail.com', '0987563', '#47, st.746, Phnom Penh, Cambodia', 'This is cambodia', '2017-07-29 02:27:44', '2017-07-29 02:27:44'),
(11, 3, 'I Miss', 'imiss.org', 'info@imiss.com', '098 7645242', '#46463, st.64', 'I do need it it', '2017-08-23 05:14:50', '2017-08-23 05:15:03'),
(12, 1, 'Tell me', 'www.tollme.com', 'menchomneau@gmail.com', '09585756363', '#54, St. 32', 'Tell me Church', '2017-10-18 08:34:04', '2017-10-18 08:34:04'),
(13, 1, 'One two', 'www.tollme.com', 'menchomneau@gmail.com', '939484747', '#87, st. 34, Phnom Penh', 'This is very good example.', '2018-02-17 00:47:15', '2018-02-17 00:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_12_075506_create_listings_table', 2),
(4, '2017_07_12_080931_add_email_to_listings_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('menchomneau@gmail.com', '$2y$10$840UAtjPD158cuP7EaDZYeh.ve8Bp0EbISzMSjgKUlVbv0wRaQLxa', '2017-07-29 02:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chomneau', 'menchomneau@gmail.com', '$2y$10$g.IIbuQAdPhe0tQ2CLGU4.29lsy6.yISCkRsRzzjAcFOgQ4tYe8oq', 'jxYpUWhYLeknyUdIZjf8bCw3dQH1M4qPbLtW04gwgTTAXPgu81hGLftZ7qQw', '2017-07-12 00:22:59', '2017-07-12 00:22:59'),
(2, 'Prearith', 'pearith@gmail.com', '$2y$10$sSewhLr2a3g9I7wSTkIwiuQzl3e2OgILoWTiGEvyCqVLRVJlmoKD.', 'aO7o1hd7i2mjDSH89hWhriVHqY8jcE2GzzolhTZmWgqxsDSbgcEQIWlnFQ9o', '2017-07-12 00:33:45', '2017-07-12 00:33:45'),
(3, 'chomneau', 'affichomneau@gmail.com', '$2y$10$QAedtGXHFxnIlEFw0u1jjeRW3qw2SLJ3OU/H9Dxu1SdaDC0HjZcCe', 'vw9zBG2hJo2UePvKcaJLMigkvbnbbocGROndzbVkDJg4BKhPwXST0y81ycFZ', '2017-08-23 05:13:24', '2017-08-23 05:13:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
