-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 12:37 AM
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
-- Database: `padma`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `complainid` int(11) NOT NULL,
  `message` varchar(2048) NOT NULL,
  `status` varchar(256) NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loanid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loanid`, `uid`, `amount`, `time`) VALUES
(1, 8, 100, '2024-09-24 00:21:22'),
(2, 8, 20, '2024-09-24 00:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `puid` int(11) NOT NULL,
  `payid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` int(11) NOT NULL,
  `purchasetype` varchar(128) NOT NULL,
  `paymenttype` varchar(256) NOT NULL,
  `trxid` varchar(256) NOT NULL,
  `approveuid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toll`
--

CREATE TABLE `toll` (
  `type` varchar(256) NOT NULL,
  `uid` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toll`
--

INSERT INTO `toll` (`type`, `uid`, `amount`) VALUES
('Bike', 1, 50),
('Coach', 1, 250),
('Sedan', 1, 100),
('SUV', 1, 150),
('Truck', 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `tollcam`
--

CREATE TABLE `tollcam` (
  `carid` int(11) NOT NULL,
  `caruid` int(11) NOT NULL,
  `bypasstime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `moduid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(512) NOT NULL,
  `dob` date NOT NULL,
  `house` varchar(128) NOT NULL,
  `road` varchar(128) NOT NULL,
  `zip` varchar(128) NOT NULL,
  `district` varchar(256) NOT NULL,
  `usertype` varchar(11) NOT NULL DEFAULT 'reg',
  `token` int(11) NOT NULL DEFAULT 0,
  `credit` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `nid`, `name`, `email`, `password`, `dob`, `house`, `road`, `zip`, `district`, `usertype`, `token`, `credit`) VALUES
(1, 1, 'Salman Sayeed Khan', 'salman.sayeed@bracu.ac.bd', 'Messino1', '1994-11-30', '007', '5', '1212', 'Dhaka', 'admin', 0, 0),
(2, 0, 'Fire Defense', 'fdacs@gmail.com', 'Teamaqua', '1971-12-16', 'N/A', 'N/A', 'N/A', 'N/A', 'em', 0, 0),
(8, 50, 'tester', 'test@test.com', '12345', '2222-01-01', '12', 'ba', '1215', 'Delhi', 'reg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `carid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `license` varchar(256) NOT NULL,
  `brand` varchar(256) NOT NULL,
  `model` varchar(256) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`complainid`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loanid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `toll`
--
ALTER TABLE `toll`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`carid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `complainid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `carid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
