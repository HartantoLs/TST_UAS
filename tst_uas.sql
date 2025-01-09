-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 05:16 AM
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
-- Database: `tst_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `forumanswer`
--

CREATE TABLE `forumanswer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forumanswer`
--

INSERT INTO `forumanswer` (`id`, `question_id`, `user_id`, `answer`, `created_at`, `updated_at`) VALUES
(17, 12, 3, 'Panduan Lengkap UTBK 2024 Saintek', '2025-01-09 02:54:21', '2025-01-09 02:54:21'),
(18, 13, 4, 'tes', '2025-01-09 03:18:28', '2025-01-09 03:18:28'),
(19, 13, 4, 'tes', '2025-01-09 03:21:58', '2025-01-09 03:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `forumquestion`
--

CREATE TABLE `forumquestion` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forumquestion`
--

INSERT INTO `forumquestion` (`id`, `user_id`, `question`, `created_at`, `updated_at`) VALUES
(12, 3, 'apa buku yang anda rekomendasikan untuk belajar PK', '2025-01-09 02:54:07', '2025-01-09 02:54:07'),
(13, 4, 'Tes\r\n', '2025-01-09 03:17:39', '2025-01-09 03:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_text` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_text`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, '2x', 1, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(2, 1, 'x^2', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(3, 1, 'x', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(4, 1, '2', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(5, 1, 'Tidak ada jawaban benar', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(6, 2, 'ln(x)', 1, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(7, 2, 'x^2/2', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(8, 2, '1/x', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(9, 2, 'e^x', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(10, 2, 'Tidak ada jawaban benar', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(11, 3, 'x = 2', 1, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(12, 3, 'x = 3', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(13, 3, 'x = 1', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(14, 3, 'x = 0', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(15, 3, 'Tidak ada jawaban benar', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(16, 4, '1', 1, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(17, 4, '0', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(18, 4, '-1', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(19, 4, 'Tidak terdefinisi', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(20, 4, 'Tidak ada jawaban benar', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(21, 5, '7', 1, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(22, 5, '5', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(23, 5, '6', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(24, 5, '4', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(25, 5, 'Tidak ada jawaban benar', 0, '2024-12-26 12:10:37', '2024-12-26 12:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `topic_covered` varchar(255) DEFAULT NULL,
  `question_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `created_at`, `updated_at`, `topic_covered`, `question_type`) VALUES
(1, 'Apa turunan dari x^2?', '2024-12-26 12:10:37', '2025-01-08 11:48:25', 'Calculus - Derivatives', 'derivative'),
(2, 'Apa integral dari 1/x dx?', '2024-12-26 12:10:37', '2025-01-08 11:48:25', 'Calculus - Integrals', 'integral'),
(3, 'Berapa nilai x jika 2x + 3 = 7?', '2024-12-26 12:10:37', '2025-01-08 11:48:25', 'Algebra - Linear Equations', 'linear_equation'),
(4, 'Berapa nilai sin(90 derajat)?', '2024-12-26 12:10:37', '2025-01-08 11:48:25', 'Trigonometry - Trigonometric Functions', 'trigonometry'),
(5, 'Jika f(x) = 2x + 1, berapa nilai f(3)?', '2024-12-26 12:10:37', '2025-01-08 11:48:25', 'Functions - Function Evaluation', 'function_evaluation');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `score`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 85, '2024-12-25 10:00:00', '2024-12-25 10:30:00', '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(2, 2, 90, '2024-12-25 11:00:00', '2024-12-25 11:30:00', '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(3, 3, 2, '2024-12-26 05:15:59', NULL, '2024-12-26 12:15:59', '2024-12-26 12:16:43'),
(4, 3, 4, '2024-12-26 05:16:47', NULL, '2024-12-26 12:16:47', '2024-12-26 12:17:02'),
(19, 3, 0, '2025-01-07 07:15:52', NULL, '2025-01-07 14:15:52', '2025-01-07 14:15:52'),
(20, 3, 3, '2025-01-07 07:20:14', NULL, '2025-01-07 14:20:14', '2025-01-07 14:20:27'),
(21, 3, 0, '2025-01-07 07:45:12', NULL, '2025-01-07 14:45:12', '2025-01-07 14:45:12'),
(22, 3, 5, '2025-01-07 07:45:24', NULL, '2025-01-07 14:45:24', '2025-01-07 14:45:35'),
(23, 3, 0, '2025-01-07 08:03:26', NULL, '2025-01-07 15:03:26', '2025-01-07 15:03:26'),
(24, 3, 0, '2025-01-07 08:03:29', NULL, '2025-01-07 15:03:29', '2025-01-07 15:03:29'),
(28, 6, 2, '2025-01-08 07:18:22', NULL, '2025-01-08 14:18:22', '2025-01-08 14:18:39'),
(29, 6, 0, '2025-01-08 07:18:43', NULL, '2025-01-08 14:18:43', '2025-01-08 14:18:43'),
(30, 6, 0, '2025-01-08 07:18:54', NULL, '2025-01-08 14:18:54', '2025-01-08 14:18:54'),
(31, 6, 5, '2025-01-08 07:18:58', NULL, '2025-01-08 14:18:58', '2025-01-08 14:19:10'),
(32, 6, 2, '2025-01-08 07:19:12', NULL, '2025-01-08 14:19:12', '2025-01-08 14:19:28'),
(33, 6, 5, '2025-01-08 07:26:32', NULL, '2025-01-08 14:26:32', '2025-01-08 14:27:17'),
(34, 6, 0, '2025-01-08 07:27:22', NULL, '2025-01-08 14:27:22', '2025-01-08 14:27:22'),
(35, 6, 0, '2025-01-08 07:27:26', NULL, '2025-01-08 14:27:26', '2025-01-08 14:27:26'),
(36, 6, 0, '2025-01-08 07:27:30', NULL, '2025-01-08 14:27:30', '2025-01-08 14:27:30'),
(37, 6, 0, '2025-01-08 07:30:07', NULL, '2025-01-08 14:30:07', '2025-01-08 14:30:07'),
(38, 6, 0, '2025-01-08 07:30:17', NULL, '2025-01-08 14:30:17', '2025-01-08 14:30:17'),
(39, 6, 3, '2025-01-08 07:30:29', NULL, '2025-01-08 14:30:29', '2025-01-08 14:30:40'),
(42, 4, 0, '2025-01-09 02:11:32', NULL, '2025-01-09 09:11:32', '2025-01-09 09:11:32'),
(43, 4, 3, '2025-01-09 02:56:31', NULL, '2025-01-09 09:56:31', '2025-01-09 09:56:40'),
(46, 4, 0, '2025-01-09 04:03:13', NULL, '2025-01-09 11:03:13', '2025-01-09 11:03:13'),
(47, 8, 4, '2025-01-09 04:08:12', NULL, '2025-01-09 11:08:12', '2025-01-09 11:08:21'),
(48, 8, 0, '2025-01-09 04:08:27', NULL, '2025-01-09 11:08:27', '2025-01-09 11:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `test_answers`
--

CREATE TABLE `test_answers` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `selected_option_id` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_answers`
--

INSERT INTO `test_answers` (`id`, `test_id`, `question_id`, `selected_option_id`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(2, 1, 2, 6, 1, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(3, 1, 3, 11, 1, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(4, 2, 4, 16, 1, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(5, 2, 5, 21, 1, '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(6, 3, 1, 2, 0, '2024-12-26 12:16:35', '2024-12-26 12:16:35'),
(7, 3, 2, 6, 1, '2024-12-26 12:16:36', '2024-12-26 12:16:36'),
(8, 3, 3, 12, 0, '2024-12-26 12:16:39', '2024-12-26 12:16:39'),
(9, 3, 4, 16, 1, '2024-12-26 12:16:41', '2024-12-26 12:16:41'),
(10, 3, 5, 23, 0, '2024-12-26 12:16:43', '2024-12-26 12:16:43'),
(11, 4, 1, 1, 1, '2024-12-26 12:16:49', '2024-12-26 12:16:49'),
(12, 4, 2, 6, 1, '2024-12-26 12:16:54', '2024-12-26 12:16:54'),
(13, 4, 3, 12, 0, '2024-12-26 12:16:55', '2024-12-26 12:16:55'),
(14, 4, 4, 16, 1, '2024-12-26 12:16:58', '2024-12-26 12:16:58'),
(15, 4, 5, 21, 1, '2024-12-26 12:17:00', '2024-12-26 12:17:00'),
(46, 20, 1, 1, 1, '2025-01-07 14:20:19', '2025-01-07 14:20:19'),
(47, 20, 2, 7, 0, '2025-01-07 14:20:21', '2025-01-07 14:20:21'),
(48, 20, 3, 11, 1, '2025-01-07 14:20:23', '2025-01-07 14:20:23'),
(49, 20, 4, 17, 0, '2025-01-07 14:20:25', '2025-01-07 14:20:25'),
(50, 20, 5, 21, 1, '2025-01-07 14:20:27', '2025-01-07 14:20:27'),
(51, 22, 1, 1, 1, '2025-01-07 14:45:27', '2025-01-07 14:45:27'),
(52, 22, 2, 6, 1, '2025-01-07 14:45:30', '2025-01-07 14:45:30'),
(53, 22, 3, 11, 1, '2025-01-07 14:45:31', '2025-01-07 14:45:31'),
(54, 22, 4, 16, 1, '2025-01-07 14:45:33', '2025-01-07 14:45:33'),
(55, 22, 5, 21, 1, '2025-01-07 14:45:35', '2025-01-07 14:45:35'),
(56, 28, 1, 1, 1, '2025-01-08 14:18:25', '2025-01-08 14:18:25'),
(57, 28, 2, 7, 0, '2025-01-08 14:18:28', '2025-01-08 14:18:28'),
(58, 28, 3, 11, 1, '2025-01-08 14:18:32', '2025-01-08 14:18:32'),
(59, 28, 4, 18, 0, '2025-01-08 14:18:37', '2025-01-08 14:18:37'),
(60, 28, 5, 24, 0, '2025-01-08 14:18:39', '2025-01-08 14:18:39'),
(61, 31, 1, 1, 1, '2025-01-08 14:19:02', '2025-01-08 14:19:02'),
(62, 31, 2, 6, 1, '2025-01-08 14:19:04', '2025-01-08 14:19:04'),
(63, 31, 3, 11, 1, '2025-01-08 14:19:06', '2025-01-08 14:19:06'),
(64, 31, 4, 16, 1, '2025-01-08 14:19:08', '2025-01-08 14:19:08'),
(65, 31, 5, 21, 1, '2025-01-08 14:19:10', '2025-01-08 14:19:10'),
(66, 32, 1, 2, 0, '2025-01-08 14:19:17', '2025-01-08 14:19:17'),
(67, 32, 2, 6, 1, '2025-01-08 14:19:20', '2025-01-08 14:19:20'),
(68, 32, 3, 12, 0, '2025-01-08 14:19:22', '2025-01-08 14:19:22'),
(69, 32, 4, 16, 1, '2025-01-08 14:19:25', '2025-01-08 14:19:25'),
(70, 32, 5, 22, 0, '2025-01-08 14:19:28', '2025-01-08 14:19:28'),
(71, 33, 2, 6, 1, '2025-01-08 14:26:57', '2025-01-08 14:26:57'),
(72, 33, 1, 1, 1, '2025-01-08 14:27:03', '2025-01-08 14:27:03'),
(73, 33, 3, 11, 1, '2025-01-08 14:27:09', '2025-01-08 14:27:09'),
(74, 33, 4, 16, 1, '2025-01-08 14:27:14', '2025-01-08 14:27:14'),
(75, 33, 5, 21, 1, '2025-01-08 14:27:17', '2025-01-08 14:27:17'),
(76, 39, 1, 1, 1, '2025-01-08 14:30:32', '2025-01-08 14:30:32'),
(77, 39, 2, 7, 0, '2025-01-08 14:30:34', '2025-01-08 14:30:34'),
(78, 39, 3, 11, 1, '2025-01-08 14:30:37', '2025-01-08 14:30:37'),
(79, 39, 4, 17, 0, '2025-01-08 14:30:38', '2025-01-08 14:30:38'),
(80, 39, 5, 21, 1, '2025-01-08 14:30:40', '2025-01-08 14:30:40'),
(86, 43, 1, 1, 1, '2025-01-09 09:56:34', '2025-01-09 09:56:34'),
(87, 43, 2, 7, 0, '2025-01-09 09:56:36', '2025-01-09 09:56:36'),
(88, 43, 3, 13, 0, '2025-01-09 09:56:37', '2025-01-09 09:56:37'),
(89, 43, 4, 16, 1, '2025-01-09 09:56:39', '2025-01-09 09:56:39'),
(90, 43, 5, 21, 1, '2025-01-09 09:56:40', '2025-01-09 09:56:40'),
(91, 47, 1, 2, 0, '2025-01-09 11:08:15', '2025-01-09 11:08:15'),
(92, 47, 2, 6, 1, '2025-01-09 11:08:16', '2025-01-09 11:08:16'),
(93, 47, 3, 11, 1, '2025-01-09 11:08:18', '2025-01-09 11:08:18'),
(94, 47, 4, 16, 1, '2025-01-09 11:08:19', '2025-01-09 11:08:19'),
(95, 47, 5, 21, 1, '2025-01-09 11:08:21', '2025-01-09 11:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'john_doe', 'john@example.com', 'hashed_password_123', '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(2, 'jane_smith', 'jane@example.com', 'hashed_password_456', '2024-12-26 12:10:37', '2024-12-26 12:10:37'),
(3, '1@gmail.com', '1@gmail.com', '$2y$10$CKDocvZ/53VVHFey2p6WV.sWVMPuNl6EP5UR11RMFvnMkX3PXJhz6', '2024-12-26 05:12:30', '2024-12-26 05:12:30'),
(4, 'lol', 'lol@gmail.com', '$2y$10$OwpU9W1voZ2oyEme2zhp5uP9VqU4gnuoVsKmzVAcuYtPcUa4BL5Yi', '2024-12-26 07:29:21', '2024-12-26 07:29:21'),
(5, '2@gmail.com', '2@gmail.com', '$2y$10$Z/tXK9doOi.6MXfIDmt3bOfSBOrV5QW3FrJ0WKhq.H9ApuXyJz.Oy', '2025-01-07 08:51:38', '2025-01-07 08:51:38'),
(6, '3@gmail.com', '3@gmail.com', '$2y$10$gveI0NVU55K7MsDWhwH8uucDHVhBgqgzSorStCQHnTa/StIiPACmq', '2025-01-08 07:18:10', '2025-01-08 07:18:10'),
(7, 'lol1@gmail.com', 'lol1@gmail.com', '$2y$10$S0I86pb9egd4tTu6Hn6/uODhHM0gEeyFp8nvDMTBFLbonx/KF940q', '2025-01-09 03:56:15', '2025-01-09 03:56:15'),
(8, 'tes@gmail.com', 'tes@gmail.com', '$2y$10$gePgPoYnBtdYT/xhD2ukxeyPYpWFckiKHnoed1gKKOG1hI..1NFlK', '2025-01-09 04:02:00', '2025-01-09 04:02:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forumanswer`
--
ALTER TABLE `forumanswer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `forumquestion`
--
ALTER TABLE `forumquestion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `test_answers`
--
ALTER TABLE `test_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `selected_option_id` (`selected_option_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forumanswer`
--
ALTER TABLE `forumanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `forumquestion`
--
ALTER TABLE `forumquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `test_answers`
--
ALTER TABLE `test_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forumanswer`
--
ALTER TABLE `forumanswer`
  ADD CONSTRAINT `forumanswer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `forumquestion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forumanswer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forumquestion`
--
ALTER TABLE `forumquestion`
  ADD CONSTRAINT `forumquestion_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_answers`
--
ALTER TABLE `test_answers`
  ADD CONSTRAINT `test_answers_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_answers_ibfk_3` FOREIGN KEY (`selected_option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
