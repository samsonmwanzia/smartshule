-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2024 at 05:21 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_demoschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--


--
-- Dumping data for table `categories`
--

INSERT INTO `student_categories` (`id`, `category`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Orphan', 'no', '2023-03-13 07:54:09', '0000-00-00 00:00:00'),
(2, 'Single Parent', 'no', '2023-03-14 10:12:23', '0000-00-00 00:00:00'),
(3, 'Neglected', 'no', '2023-03-17 13:35:29', '0000-00-00 00:00:00'),
(4, 'Abandoned', 'no', '2023-05-26 10:54:18', '0000-00-00 00:00:00'),
(5, 'Both Parents', 'no', '2023-05-30 08:09:01', '0000-00-00 00:00:00'),
(6, 'N/A', 'no', '2023-06-05 08:48:54', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
