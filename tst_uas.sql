-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 08:01 AM
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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(500) NOT NULL,
  `published_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `link`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Panduan Lengkap UTBK 2024 Saintek', 'Tim Edukasi', 'Buku panduan lengkap untuk menghadapi UTBK Saintek dengan soal dan pembahasan.', 'https://example.com/panduan-utbk-saintek-2024', '2023-09-01', '2025-01-07 07:33:46', '2025-01-07 07:33:46'),
(2, 'Strategi Jitu Lulus UTBK Soshum', 'Tim Edukasi', 'Panduan strategi dan soal-soal UTBK Soshum untuk persiapan masuk PTN.', 'https://example.com/strategi-utbk-soshum', '2023-08-15', '2025-01-07 07:33:46', '2025-01-07 07:33:46'),
(3, 'Buku Sakti UTBK Campuran 2024', 'Tim Cerdas', 'Buku sakti berisi kumpulan soal campuran Saintek dan Soshum untuk UTBK.', 'https://example.com/buku-sakti-utbk', '2023-07-20', '2025-01-07 07:33:46', '2025-01-07 07:33:46'),
(4, 'Bank Soal UTBK 2024 Saintek', 'Tim Expert', 'Kumpulan soal UTBK Saintek lengkap dengan pembahasan.', 'https://example.com/bank-soal-utbk-saintek', '2023-06-30', '2025-01-07 07:33:46', '2025-01-07 07:33:46'),
(5, 'Rangkuman Materi UTBK Soshum 2024', 'Tim Edukreatif', 'Rangkuman materi dan soal UTBK Soshum untuk persiapan UTBK 2024.', 'https://example.com/rangkuman-materi-soshum', '2023-05-10', '2025-01-07 07:33:46', '2025-01-07 07:33:46');

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
(1, 1, 1, 'ccsc', '2025-01-06 07:02:53', '2025-01-06 07:02:53'),
(2, 1, 1, 'cscsccx', '2025-01-06 07:02:58', '2025-01-06 07:02:58'),
(3, 4, 4, 'cdcdd', '2025-01-07 09:22:17', '2025-01-07 09:22:17'),
(4, 4, 4, 'cdcdd', '2025-01-07 09:23:56', '2025-01-07 09:23:56'),
(5, 5, 4, 'dvdv', '2025-01-07 09:31:17', '2025-01-07 09:31:17'),
(6, 6, 4, 'deded', '2025-01-07 09:38:28', '2025-01-07 09:38:28'),
(7, 6, 4, 'deded', '2025-01-07 09:38:32', '2025-01-07 09:38:32'),
(8, 6, 4, 'deded', '2025-01-07 09:38:35', '2025-01-07 09:38:35'),
(9, 5, 4, 'ded', '2025-01-07 09:38:38', '2025-01-07 09:38:38'),
(10, 7, 4, 'cdcd', '2025-01-07 09:40:24', '2025-01-07 09:40:24'),
(11, 7, 4, 'cdcdcd', '2025-01-07 09:40:53', '2025-01-07 09:40:53'),
(12, 7, 4, 'cdcdcd', '2025-01-07 09:41:44', '2025-01-07 09:41:44'),
(13, 7, 4, 'dede', '2025-01-07 09:41:48', '2025-01-07 09:41:48'),
(14, 8, 4, 'efe', '2025-01-07 10:07:07', '2025-01-07 10:07:07');

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
(1, 1, 'berapa 2+2', '2025-01-06 06:51:18', '2025-01-06 06:51:18'),
(2, 1, 'dwwdfdsfsvd', '2025-01-06 07:00:07', '2025-01-06 07:00:07'),
(3, 4, 'lol', '2025-01-07 09:22:09', '2025-01-07 09:22:09'),
(4, 4, 'cdcdcdcdc', '2025-01-07 09:22:14', '2025-01-07 09:22:14'),
(5, 4, 'berapa 1+1', '2025-01-07 09:27:50', '2025-01-07 09:27:50'),
(6, 4, 'dde', '2025-01-07 09:38:24', '2025-01-07 09:38:24'),
(7, 4, 'cedc', '2025-01-07 09:40:20', '2025-01-07 09:40:20'),
(8, 4, 'ded', '2025-01-07 10:07:03', '2025-01-07 10:07:03');

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `review` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `book_id`, `user_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 101, 5, 'Sangat membantu untuk belajar UTBK Saintek. Pembahasannya sangat lengkap.', '2025-01-07 07:33:59', '2025-01-07 07:33:59'),
(2, 2, 102, 4, 'Strategi yang dijelaskan cukup praktis, namun soal-soalnya bisa lebih banyak lagi.', '2025-01-07 07:33:59', '2025-01-07 07:33:59'),
(3, 3, 103, 5, 'Buku ini sangat lengkap untuk belajar campuran Saintek dan Soshum.', '2025-01-07 07:33:59', '2025-01-07 07:33:59'),
(4, 4, 104, 4, 'Soal-soalnya mirip dengan UTBK asli, sangat cocok untuk latihan.', '2025-01-07 07:33:59', '2025-01-07 07:33:59'),
(5, 5, 105, 5, 'Rangkuman materi sangat padat dan mudah dipahami. Cocok untuk belajar UTBK Soshum.', '2025-01-07 07:33:59', '2025-01-07 07:33:59');

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
(5, 4, 0, '2024-12-26 07:32:03', NULL, '2024-12-26 14:32:03', '2024-12-26 14:32:03'),
(6, 4, 5, '2024-12-26 07:35:08', NULL, '2024-12-26 14:35:08', '2024-12-26 14:35:17'),
(7, 4, 3, '2024-12-26 07:35:48', NULL, '2024-12-26 14:35:48', '2024-12-26 14:36:52'),
(8, 4, 0, '2024-12-26 07:39:49', NULL, '2024-12-26 14:39:49', '2024-12-26 14:39:49'),
(9, 4, 0, '2024-12-26 07:41:43', NULL, '2024-12-26 14:41:43', '2024-12-26 14:41:43'),
(10, 4, 0, '2024-12-26 07:42:49', NULL, '2024-12-26 14:42:49', '2024-12-26 14:42:49'),
(11, 4, 3, '2024-12-26 12:16:57', NULL, '2024-12-26 19:16:57', '2024-12-26 19:17:21'),
(12, 4, 0, '2024-12-26 12:17:27', NULL, '2024-12-26 19:17:27', '2024-12-26 19:17:27'),
(13, 4, 4, '2025-01-05 13:37:50', NULL, '2025-01-05 20:37:50', '2025-01-05 20:38:13'),
(14, 4, 0, '2025-01-06 14:09:37', NULL, '2025-01-06 21:09:37', '2025-01-06 21:09:37'),
(15, 4, 0, '2025-01-07 04:20:10', NULL, '2025-01-07 11:20:10', '2025-01-07 11:20:10'),
(16, 4, 0, '2025-01-07 04:27:29', NULL, '2025-01-07 11:27:29', '2025-01-07 11:27:29'),
(17, 4, 4, '2025-01-07 04:28:52', NULL, '2025-01-07 11:28:53', '2025-01-07 11:29:43'),
(18, 4, 5, '2025-01-07 04:33:09', NULL, '2025-01-07 11:33:09', '2025-01-07 11:33:38'),
(19, 3, 0, '2025-01-07 07:15:52', NULL, '2025-01-07 14:15:52', '2025-01-07 14:15:52'),
(20, 3, 3, '2025-01-07 07:20:14', NULL, '2025-01-07 14:20:14', '2025-01-07 14:20:27'),
(21, 3, 0, '2025-01-07 07:45:12', NULL, '2025-01-07 14:45:12', '2025-01-07 14:45:12'),
(22, 3, 5, '2025-01-07 07:45:24', NULL, '2025-01-07 14:45:24', '2025-01-07 14:45:35'),
(23, 3, 0, '2025-01-07 08:03:26', NULL, '2025-01-07 15:03:26', '2025-01-07 15:03:26'),
(24, 3, 0, '2025-01-07 08:03:29', NULL, '2025-01-07 15:03:29', '2025-01-07 15:03:29'),
(25, 4, 0, '2025-01-07 10:27:25', NULL, '2025-01-07 17:27:25', '2025-01-07 17:27:25'),
(26, 4, 0, '2025-01-08 06:40:08', NULL, '2025-01-08 13:40:08', '2025-01-08 13:40:08'),
(27, 4, 0, '2025-01-08 06:53:17', NULL, '2025-01-08 13:53:17', '2025-01-08 13:53:17');

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
(16, 6, 1, 1, 1, '2024-12-26 14:35:11', '2024-12-26 14:35:11'),
(17, 6, 2, 6, 1, '2024-12-26 14:35:12', '2024-12-26 14:35:12'),
(18, 6, 3, 11, 1, '2024-12-26 14:35:14', '2024-12-26 14:35:14'),
(19, 6, 4, 16, 1, '2024-12-26 14:35:15', '2024-12-26 14:35:15'),
(20, 6, 5, 21, 1, '2024-12-26 14:35:17', '2024-12-26 14:35:17'),
(21, 7, 1, 1, 1, '2024-12-26 14:36:25', '2024-12-26 14:36:25'),
(22, 7, 2, 6, 1, '2024-12-26 14:36:28', '2024-12-26 14:36:28'),
(23, 7, 3, 12, 0, '2024-12-26 14:36:30', '2024-12-26 14:36:30'),
(24, 7, 4, 16, 1, '2024-12-26 14:36:32', '2024-12-26 14:36:47'),
(25, 7, 5, 22, 0, '2024-12-26 14:36:37', '2024-12-26 14:36:37'),
(26, 11, 1, 2, 0, '2024-12-26 19:17:03', '2024-12-26 19:17:03'),
(27, 11, 2, 6, 1, '2024-12-26 19:17:06', '2024-12-26 19:17:06'),
(28, 11, 3, 12, 0, '2024-12-26 19:17:09', '2024-12-26 19:17:09'),
(29, 11, 4, 16, 1, '2024-12-26 19:17:18', '2024-12-26 19:17:18'),
(30, 11, 5, 21, 1, '2024-12-26 19:17:21', '2024-12-26 19:17:21'),
(31, 13, 1, 1, 1, '2025-01-05 20:37:54', '2025-01-05 20:37:54'),
(32, 13, 2, 7, 0, '2025-01-05 20:37:56', '2025-01-05 20:37:56'),
(33, 13, 3, 11, 1, '2025-01-05 20:38:00', '2025-01-05 20:38:00'),
(34, 13, 4, 16, 1, '2025-01-05 20:38:04', '2025-01-05 20:38:04'),
(35, 13, 5, 21, 1, '2025-01-05 20:38:08', '2025-01-05 20:38:08'),
(36, 17, 1, 2, 0, '2025-01-07 11:29:16', '2025-01-07 11:29:16'),
(37, 17, 2, 6, 1, '2025-01-07 11:29:22', '2025-01-07 11:29:22'),
(38, 17, 3, 11, 1, '2025-01-07 11:29:28', '2025-01-07 11:29:28'),
(39, 17, 5, 21, 1, '2025-01-07 11:29:32', '2025-01-07 11:29:32'),
(40, 17, 4, 16, 1, '2025-01-07 11:29:41', '2025-01-07 11:29:41'),
(41, 18, 1, 1, 1, '2025-01-07 11:33:15', '2025-01-07 11:33:15'),
(42, 18, 2, 6, 1, '2025-01-07 11:33:18', '2025-01-07 11:33:18'),
(43, 18, 3, 11, 1, '2025-01-07 11:33:21', '2025-01-07 11:33:21'),
(44, 18, 4, 16, 1, '2025-01-07 11:33:24', '2025-01-07 11:33:24'),
(45, 18, 5, 21, 1, '2025-01-07 11:33:38', '2025-01-07 11:33:38'),
(46, 20, 1, 1, 1, '2025-01-07 14:20:19', '2025-01-07 14:20:19'),
(47, 20, 2, 7, 0, '2025-01-07 14:20:21', '2025-01-07 14:20:21'),
(48, 20, 3, 11, 1, '2025-01-07 14:20:23', '2025-01-07 14:20:23'),
(49, 20, 4, 17, 0, '2025-01-07 14:20:25', '2025-01-07 14:20:25'),
(50, 20, 5, 21, 1, '2025-01-07 14:20:27', '2025-01-07 14:20:27'),
(51, 22, 1, 1, 1, '2025-01-07 14:45:27', '2025-01-07 14:45:27'),
(52, 22, 2, 6, 1, '2025-01-07 14:45:30', '2025-01-07 14:45:30'),
(53, 22, 3, 11, 1, '2025-01-07 14:45:31', '2025-01-07 14:45:31'),
(54, 22, 4, 16, 1, '2025-01-07 14:45:33', '2025-01-07 14:45:33'),
(55, 22, 5, 21, 1, '2025-01-07 14:45:35', '2025-01-07 14:45:35');

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
(5, '2@gmail.com', '2@gmail.com', '$2y$10$Z/tXK9doOi.6MXfIDmt3bOfSBOrV5QW3FrJ0WKhq.H9ApuXyJz.Oy', '2025-01-07 08:51:38', '2025-01-07 08:51:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forumanswer`
--
ALTER TABLE `forumanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `forumquestion`
--
ALTER TABLE `forumquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `test_answers`
--
ALTER TABLE `test_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

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
