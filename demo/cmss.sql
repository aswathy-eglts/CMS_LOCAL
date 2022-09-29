-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 07:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmss`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(60) NOT NULL,
  `customer_id` int(60) NOT NULL,
  `complaint_type` varchar(60) NOT NULL,
  `description` varchar(256) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `customer_id`, `complaint_type`, `description`, `vehicle`, `status`) VALUES
(1, 0, 'Complaint1', 'demo complaint', 'bh', 1),
(2, 0, ' Complaint2', 'hui', 'klji', 1),
(3, 0, ' Complaint2', ';kjoi', 'l;k', 1),
(4, 1, 'Complaint1', 'rfgv', 'kljj', 1),
(5, 2, ' Complaint2', 'jjjjj', 'fghjk', 1),
(6, 0, 'Complaint1', 'hhhhh', 'asss', 1),
(7, 0, 'Complaint3', 'aswedr', 'kjiu8', 1),
(8, 1, 'Complaint3', 'engine', 'two wheeler', 1),
(9, 2, 'Complaint3', 'sdddd', 'll', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(35) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `email` varchar(256) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `age` int(25) NOT NULL,
  `phno` int(30) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fname`, `lname`, `email`, `gender`, `age`, `phno`, `password`) VALUES
(1, 'Aswathy', 'rb', 'aswathy@gmail.com', 'female', 25, 1234567890, 'aswathy'),
(2, 'Anju', 'rb', 'anju@gmail.com', 'female', 27, 1234567899, 'anju');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
