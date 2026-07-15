-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 09:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

CREATE DATABASE IF NOT EXISTS `ambiverse`;
USE `ambiverse`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ambiverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(5) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `subtes` varchar(11) NOT NULL,
  `judul_to` varchar(50) NOT NULL,
  `duration` varchar(5) NOT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_category`
--

INSERT INTO `exam_category` (`id`, `kategori`, `subtes`, `judul_to`, `duration`, `date_added`) VALUES
(1, 'tps', 'pu', 'Tes Penalaran Umum 1', '5', '2023-01-07 13:24:50'),
(8, 'soshum', 'geo', 'Geografi', '5', '2023-01-08 06:05:20'),
(9, 'tps', 'pu', 'Tes PU 2', '5', '2023-01-08 06:11:51'),
(10, 'saintek', 'kim', 'Tryout Kimia Asyik', '10', '2023-01-08 06:12:33'),
(11, 'tps', 'pbm', 'Membaca', '1', '2023-01-08 06:13:46'),
(12, 'soshum', 'sosio', '#1 Sosiologi', '15', '2023-01-08 06:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `judul_to` varchar(100) NOT NULL,
  `subtes` varchar(50) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `username`, `judul_to`, `subtes`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES
(1, 'indry', 'Tes Penalaran Umum 1', 'pu', '4', '4', '0', '2023-01-07 16:01:03'),
(2, 'indry', 'Tes Penalaran Umum 1', 'pu', '4', '0', '4', '2023-01-07 16:03:38'),
(3, 'patris', 'Tes Penalaran Umum 1', 'pu', '4', '2', '2', '2023-01-07 16:04:42'),
(4, 'indry', 'Tryout Kimia Asyik', 'kim', '2', '2', '0', '2023-01-08 07:59:36'),
(5, 'indry', 'Tryout Kimia Asyik', 'kim', '2', '2', '0', '2023-01-08 08:02:18'),
(6, 'indry', 'Geografi', '', '0', '0', '0', '2023-01-08 08:30:45'),
(7, 'indry', 'Geografi', 'geo', '1', '0', '1', '2023-01-08 08:38:56'),
(8, 'indry', 'Tes PU 2', '', '0', '0', '0', '2023-01-08 08:50:19'),
(9, 'indry', 'Geografi', '', '1', '0', '1', '2023-01-08 08:51:50'),
(10, 'indry', 'Tes Penalaran Umum 1', 'pu', '4', '1', '3', '2023-01-08 08:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `kritikdansaran`
--

CREATE TABLE `kritikdansaran` (
  `id` int(5) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `kritik_saran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kritikdansaran`
--

INSERT INTO `kritikdansaran` (`id`, `username`, `email`, `kritik_saran`) VALUES
(4, 'indry', 'indry@gmail.com', 'hai admin');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `question_no` varchar(5) NOT NULL,
  `question` longtext NOT NULL,
  `opt1` longtext NOT NULL,
  `opt2` longtext NOT NULL,
  `opt3` longtext NOT NULL,
  `opt4` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `judul_to` varchar(80) NOT NULL,
  `subtes` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `judul_to`, `subtes`) VALUES
(1, '1', 'halo ini soal ', 'a', 'b', 'c', 'd', 'a', 'Tes Penalaran Umum 1', 'pu'),
(2, '2', 'halo ini soal lagi', 'a', 'b', 'c', 'd', 'd', 'Tes Penalaran Umum 1', 'pu'),
(3, '3', 'hehe soal lagi', 'a', 'b', 'c', 'd', 'c', 'Tes Penalaran Umum 1', 'pu'),
(4, '4', 'lagi lagi', 'a', 'b', 'c', 'd', 'c', 'Tes Penalaran Umum 1', 'pu'),
(6, '1', 'ini soal kimia nomor 1', 'bukan, ini nomor 2', 'iya ini nomor 1', 'jawaban', 'ya', 'iya ini nomor 1', 'Tryout Kimia Asyik', 'kim'),
(7, '2', 'apakah ini soal nomor 2', 'iya', 'tidak tahu', 'bukannnnn', 'ini opsi 4', 'iya', 'Tryout Kimia Asyik', 'kim'),
(8, '1', 'tes soal', 'a', 'b', 'c', 'd', 'c', 'Geografi', 'geo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'ambiverse@gmail.com', '$2y$10$MxtXryAJY/JoAHmxDGPVkOowcz4.EgaDDtCENNVA6DcBwkuoFE2Km'),
(2, 'indry', 'indry@gmail.com', '$2y$10$h0a0vQSYqEh8GtmqJG8/zObXEnq64kMk05C2.8RjJq6x.oTJFQ/3C'),
(3, 'patris', 'patris@gmail.com', '$2y$10$q3g9TCooO7aDwZAMGRfasOWHPPBa6QfwLIOrceApZw6FYGhBFGnLy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kritikdansaran`
--
ALTER TABLE `kritikdansaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kritikdansaran`
--
ALTER TABLE `kritikdansaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
