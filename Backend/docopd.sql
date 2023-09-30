-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 01:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docopd`
--

-- --------------------------------------------------------

--
-- Table structure for table `chargesmaster`
--

CREATE TABLE `chargesmaster` (
  `id` int(10) NOT NULL,
  `chargestype` varchar(100) NOT NULL,
  `amt` int(10) NOT NULL,
  `createdby` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chargesmaster`
--

INSERT INTO `chargesmaster` (`id`, `chargestype`, `amt`, `createdby`) VALUES
(1, 'OPD', 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expencemaster`
--

CREATE TABLE `expencemaster` (
  `id` int(11) NOT NULL,
  `ename` varchar(50) DEFAULT NULL,
  `eamt` int(50) DEFAULT NULL,
  `etype` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `disc` varchar(50) DEFAULT NULL,
  `createdby` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expencemaster`
--

INSERT INTO `expencemaster` (`id`, `ename`, `eamt`, `etype`, `status`, `disc`, `createdby`) VALUES
(2, 'borrow', 1200, 'cash', '', '', 1),
(3, 'rent', 12000, 'bank', 'CLOSED', '', 1),
(4, 'Petrol', 350, 'bank', 'OPEN', '', 1),
(5, 'petrol', 890, 'cash', 'OPEN', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opdmaster`
--

CREATE TABLE `opdmaster` (
  `id` int(10) NOT NULL,
  `pname` varchar(30) DEFAULT NULL,
  `pmob` int(13) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `paddress` varchar(50) DEFAULT NULL,
  `opddate` date DEFAULT NULL,
  `opdstatus` varchar(10) DEFAULT NULL,
  `opdfair` int(10) DEFAULT NULL,
  `paymenttype` varchar(10) DEFAULT NULL,
  `loginid` int(5) DEFAULT NULL,
  `rvisitdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opdmaster`
--

INSERT INTO `opdmaster` (`id`, `pname`, `pmob`, `pdob`, `paddress`, `opddate`, `opdstatus`, `opdfair`, `paymenttype`, `loginid`, `rvisitdate`) VALUES
(1, 'Rahul Deshmukh', 897867, '1999-02-09', 'ADDERS', '2023-09-22', 'DONE', 130, '', 1, '0000-00-00'),
(2, 'Prajakta Deshmukh', 2147483647, '2000-12-01', 'khandgoan', '2023-09-23', 'DONE', 1340, '', 1, '0000-00-00'),
(3, 'Rudrakshi Deshmukh', 2147483647, '2019-12-02', 'sangamner', '2023-09-23', 'DONE', 160, 'bank', 1, '0000-00-00'),
(4, 'sakshi Deshmukh', 2147483647, '2000-03-03', 'zapwadi', '2023-09-24', 'DONE', 190, 'cash', 1, NULL),
(5, 'Prasad godge', 2147483647, '2020-03-17', 'Sangamner', '2023-09-26', 'DONE', 130, 'cash', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `userid` int(10) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `registrationdate` date NOT NULL,
  `totalorderamt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`userid`, `usertype`, `name`, `contact`, `email`, `password`, `username`, `landmark`, `pincode`, `address`, `status`, `registrationdate`, `totalorderamt`) VALUES
(1, 'admin', 'admin', '0000000000', 'admin@gmail.com', 'Admin@2023', 'admin', '.', '.', '.', 0, '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chargesmaster`
--
ALTER TABLE `chargesmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expencemaster`
--
ALTER TABLE `expencemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opdmaster`
--
ALTER TABLE `opdmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chargesmaster`
--
ALTER TABLE `chargesmaster`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expencemaster`
--
ALTER TABLE `expencemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `opdmaster`
--
ALTER TABLE `opdmaster`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
