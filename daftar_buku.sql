-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 08:02 AM
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
-- Database: `daftar_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `topics_covered` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `link`, `published_at`, `created_at`, `updated_at`, `topics_covered`) VALUES
(1, 'Panduan Lengkap UTBK 2024 Saintek', 'Tim Edukasi', 'Buku panduan lengkap untuk menghadapi UTBK Saintek...', 'https://example.com/panduan-utbk-saintek-2024', '2023-09-01', '2025-01-07 14:33:46', '2025-01-07 14:33:46', 'Calculus - Derivatives, Arithmetic'),
(2, 'Buku Sakti UTBK Campuran 2024', 'Tim Cerdas', 'Buku sakti berisi kumpulan soal campuran Saintek dan...', 'https://example.com/buku-sakti-utbk', '2023-07-20', '2025-01-07 14:33:46', '2025-01-07 14:33:46', 'Calculus - Integrals, Sequences and Series, Statistics'),
(3, 'Bank Soal UTBK 2024 Saintek', 'Tim Expert', 'Kumpulan soal UTBK Saintek lengkap dengan pembahas...', 'https://example.com/bank-soal-utbk-saintek', '2023-06-30', '2025-01-07 14:33:46', '2025-01-07 14:33:46', 'Algebra - Linear Equations, Geometry, Probability'),
(4, 'Trigonometry Made Simple', 'Tim Matematika', 'Buku lengkap tentang trigonometri dan aplikasinya.', 'https://example.com/trigonometry-simple', '2023-05-01', '2025-01-07 14:33:46', '2025-01-07 14:33:46', 'Trigonometry - Trigonometric Functions, Functions - Function Evaluation'),
(5, 'Comprehensive Math Review', 'Tim Reviewer', 'Rangkuman topik matematika untuk persiapan UTBK.', 'https://example.com/comprehensive-math', '2023-04-01', '2025-01-07 14:33:46', '2025-01-07 14:33:46', 'Arithmetic, Algebra - Linear Equations, Functions - Function Evaluation, Geometry');

-- --------------------------------------------------------

--
-- Table structure for table `book_formulas`
--

CREATE TABLE `book_formulas` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `formula` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_formulas`
--

INSERT INTO `book_formulas` (`id`, `book_id`, `formula`) VALUES
(1, 1, 'Derivative Formula: dy/dx'),
(2, 1, 'Chain Rule: d(f(g(x)))/dx = f\'(g(x)) * g\'(x)'),
(3, 2, 'Integral Formula: ∫f(x)dx'),
(4, 2, 'Fundamental Theorem of Calculus: F(b) - F(a)'),
(5, 3, 'Linear Equation Formula: ax + b = 0'),
(6, 3, 'Area of Triangle Formula: 1/2 * base * height'),
(7, 4, 'Trigonometric Identities: sin²θ + cos²θ = 1'),
(8, 4, 'Trigonometric Ratio: sin90° = 1'),
(9, 5, 'Function Evaluation Formula: f(x)'),
(10, 5, 'Arithmetic Progression: a + (n-1)d');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Alice', 'alice@example.com', 'password123', '2025-01-08 04:22:21', '2025-01-08 04:22:21'),
(2, 'Bob', 'bob@example.com', 'securepassword', '2025-01-08 04:22:21', '2025-01-08 04:22:21'),
(3, 'Charlie', 'charlie@example.com', 'charliepass', '2025-01-08 04:22:21', '2025-01-08 04:22:21'),
(4, 'Diana', 'diana@example.com', 'dianapass', '2025-01-08 04:22:21', '2025-01-08 04:22:21'),
(5, 'Edward', 'edward@example.com', 'edwardpass', '2025-01-08 04:22:21', '2025-01-08 04:22:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_formulas`
--
ALTER TABLE `book_formulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_formulas`
--
ALTER TABLE `book_formulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_formulas`
--
ALTER TABLE `book_formulas`
  ADD CONSTRAINT `book_formulas_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
