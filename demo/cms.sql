-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2022 at 10:53 AM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `comment_text` varchar(255) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL,
  `complaint_id` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `customer_id`, `comment_text`, `response`, `complaint_id`, `admin_id`, `comment_date`, `update_date`) VALUES
(1, 11, 'error', 'replay', 2, 1, '2022-09-06 06:58:17', '2022-09-06 06:58:17'),
(2, 11, 'error', 'ok', 2, 1, '2022-09-06 07:00:18', '2022-09-06 07:00:18'),
(3, 11, 'error', 'hii', 2, 1, '2022-09-06 07:04:34', '2022-09-06 07:04:34'),
(4, 11, 'error', 'hii', 2, 1, '2022-09-06 07:06:37', '2022-09-06 07:06:37'),
(5, 11, 'error', 'hii', 2, 1, '2022-09-06 07:23:21', '2022-09-06 07:23:21'),
(6, 11, 'error', 'hii', 2, 1, '2022-09-06 07:24:07', '2022-09-06 07:24:07'),
(15, 11, 'hii', 'hii', 2, 1, '2022-09-06 08:58:18', '2022-09-06 08:58:18'),
(16, 11, 'hlo', 'hii', 2, 1, '2022-09-06 09:21:19', '2022-09-06 09:21:19'),
(17, 11, 'error', 'hii', 2, 1, '2022-09-06 09:22:45', '2022-09-06 09:22:45'),
(18, 11, 'replay', 'hii', 2, 1, '2022-09-06 09:25:27', '2022-09-06 09:25:27'),
(19, 11, 'replay', 'hii', 2, 1, '2022-09-06 09:25:52', '2022-09-06 09:25:52'),
(20, 11, 'hii', NULL, 4, NULL, '2022-09-06 09:45:04', '2022-09-06 09:45:04'),
(21, 11, 'replay', NULL, 4, NULL, '2022-09-06 09:45:27', '2022-09-06 09:45:27'),
(22, 11, 'hii', 'hii', 9, NULL, '2022-09-07 12:49:56', '2022-09-07 12:49:56'),
(23, 11, 'hii', 'hello', 6, NULL, '2022-09-13 06:18:40', '2022-09-13 06:18:40'),
(25, 10, 'hii', 'hii', 1, NULL, '2022-09-14 05:04:33', '2022-09-14 05:04:33'),
(26, 10, 'replay', 'msg', 1, NULL, '2022-09-14 05:06:51', '2022-09-14 05:06:51'),
(27, 10, 'hii', 'hello', 3, NULL, '2022-09-14 05:36:51', '2022-09-14 05:36:51'),
(28, 10, 'replay', 'hello', 3, NULL, '2022-09-14 05:47:37', '2022-09-14 05:47:37'),
(29, 10, 'replay', 'ok', 1, NULL, '2022-09-14 07:11:36', '2022-09-14 07:11:36'),
(30, 10, 'hlo', 'hello hi', 1, NULL, '2022-09-14 07:28:06', '2022-09-14 07:28:06'),
(31, 11, 'ok', NULL, 2, NULL, '2022-09-14 10:59:12', '2022-09-14 10:59:12'),
(32, 11, 'ok', NULL, 6, NULL, '2022-09-14 11:35:30', '2022-09-14 11:35:30'),
(33, 11, 'hlo', NULL, 6, NULL, '2022-09-14 11:39:16', '2022-09-14 11:39:16'),
(34, 11, 'complaints', 'ok', 2, NULL, '2022-09-14 12:13:23', '2022-09-14 12:13:23'),
(35, 12, 'Haii', 'Haiiii', 10, NULL, '2022-09-15 04:39:53', '2022-09-15 04:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `complaint_type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `vehicle_no` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `customer_id`, `complaint_type`, `description`, `vehicle_no`, `status`) VALUES
(1, 10, 'Complaint1', 'complaints', 'klo12345', 'not process yet'),
(2, 11, 'Complaint', 'complaints two wheeler', 'kLo1268', 'not process yet'),
(3, 10, 'Complaint3', 'complaints', 'klo12345', 'in process'),
(4, 11, ' Complaint', 'eee', 'klo567', 'in process'),
(5, 11, 'Complaint3', 'asss', 'klo543', 'closed'),
(6, 11, ' Complaint2', 'complaints', 'klo567', 'not process yet'),
(7, 11, ' Complaint2', 'error', 'klo567', 'not process yet'),
(8, 11, ' Complaint2', 'engine', 'klo567', 'not process yet'),
(9, 11, 'Complaint1', 'demo complaint', 'klo567', 'not process yet'),
(10, 12, 'Complaint1', 'Two wheeler complaintS', 'kL01678', 'in process'),
(11, 12, ' Complaint2', 'demo complaints', 'kLo1267', 'not process yet'),
(12, 12, ' Complaint2', 'error', 'kLo1267', 'not process yet'),
(13, 12, 'Complaint3', 'engine', 'kLo1267', 'not process yet');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `phno` int DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstName`, `lastName`, `email`, `gender`, `age`, `phno`, `password`) VALUES
(2, 'anju', 'rb', 'anju@gmail.com', 'female', 13, 1234534212, '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'ammu', 's', 'ammu@gmail.com', 'female', 10, 1234534212, '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'anaka', 'v', 'anaka@gmail.com', 'female', 8, 1234534212, '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'amal', 'k', 'amal@gmail.com', 'male', 10, 1234534212, '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'sanju', 's', 'sanju@gmail.com', 'male', 13, 1234534212, '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'anjana', 's', 'anjana@gmail.com', 'female', 25, 1234534212, '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'Arathy', 'TS', 'aru@gmail.com', 'female', 26, 1234534212, 'bd3cffd41372682175a5ff3b5a0bb752'),
(11, 'Aswathy ', 'RB', 'amas@gmail.com', 'female', 22, 1234534213, 'b4e8acc1dd0f8d0762c566fd6b3dfe00'),
(12, 'Jainu', 'manual', 'jainu@gmail.com', 'female', 25, 1234534211, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `complaint_id` (`complaint_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`complaint_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
