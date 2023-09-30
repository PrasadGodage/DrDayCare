-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 03:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chemdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `chem_mechmaster`
--

CREATE TABLE `chem_mechmaster` (
  `ChemMechId` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chem_mechmaster`
--

INSERT INTO `chem_mechmaster` (`ChemMechId`, `Name`, `Type`) VALUES
(1, 'C%', 'chem'),
(2, 'Mn%', 'chem'),
(3, 'Si%', 'chem'),
(4, 'Ni%', 'chem'),
(5, 'Cr%', 'chem'),
(6, 'Mo%', 'chem'),
(7, 'S%', 'chem'),
(8, 'P%', 'chem'),
(9, 'B%', 'chem'),
(10, 'Ys Mpa(0.2%)', 'mech'),
(11, 'UTS Mpa', 'mech'),
(12, 'Elg%', 'mech'),
(13, 'RA%', 'mech'),
(14, 'Hardness (HRC)', 'mech');

-- --------------------------------------------------------

--
-- Table structure for table `gradediameteruniquecode`
--

CREATE TABLE `gradediameteruniquecode` (
  `id` int(10) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `diameter` varchar(20) DEFAULT NULL,
  `uniquecode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gradediameteruniquecode`
--

INSERT INTO `gradediameteruniquecode` (`id`, `grade`, `diameter`, `uniquecode`) VALUES
(1, '1', '7.2', 'EN24-2');

-- --------------------------------------------------------

--
-- Table structure for table `grademaster`
--

CREATE TABLE `grademaster` (
  `Gradeid` int(10) NOT NULL,
  `GradeName` varchar(10) DEFAULT NULL,
  `GradeCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grademaster`
--

INSERT INTO `grademaster` (`Gradeid`, `GradeName`, `GradeCode`) VALUES
(1, 'EN24', ''),
(3, 'SS304', '');

-- --------------------------------------------------------

--
-- Table structure for table `itemchemicalcompositionmaster`
--

CREATE TABLE `itemchemicalcompositionmaster` (
  `id` int(11) NOT NULL,
  `ItemId` varchar(10) NOT NULL,
  `ChemMechId` varchar(10) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `MnValue` varchar(10) NOT NULL,
  `MxValue` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemchemicalcompositionmaster`
--

INSERT INTO `itemchemicalcompositionmaster` (`id`, `ItemId`, `ChemMechId`, `Type`, `MnValue`, `MxValue`) VALUES
(1, '1', '1', 'chem', '0.00', '0.08'),
(2, '1', '2', 'chem', '0.00', '2.00'),
(3, '1', '3', 'chem', '0.00', '1.00'),
(4, '1', '4', 'chem', '10.0', '14.0'),
(5, '1', '5', 'chem', '16.0', '18.0'),
(6, '1', '6', 'chem', '2.0', '3.0'),
(7, '1', '7', 'chem', '0.00', '0.030'),
(8, '1', '8', 'chem', '0.00', '0.045'),
(9, '1', '10', 'mech', '450', '0.00'),
(10, '3', '1', 'chem', '0.00', '0.08'),
(11, '3', '2', 'chem', '0.00', '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `itemmaster`
--

CREATE TABLE `itemmaster` (
  `id` int(11) NOT NULL,
  `itemcode` varchar(10) NOT NULL,
  `disc` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `bo/ih` varchar(100) NOT NULL COMMENT '0=BO AND 1=IH',
  `basic_material` varchar(100) NOT NULL,
  `drgno` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `dia` varchar(100) NOT NULL,
  `gweight` varchar(10) NOT NULL,
  `nweight` varchar(10) NOT NULL,
  `childcode` varchar(10) NOT NULL,
  `cuttinng` varchar(10) NOT NULL,
  `traub` varchar(10) NOT NULL,
  `punching` varchar(10) NOT NULL,
  `lathe` varchar(10) NOT NULL,
  `grinding` varchar(10) NOT NULL,
  `rolling` varchar(10) NOT NULL,
  `cnc` varchar(10) NOT NULL,
  `plating` varchar(10) NOT NULL,
  `blackodising` varchar(10) NOT NULL,
  `hadening` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pomaster`
--

CREATE TABLE `pomaster` (
  `id` int(10) NOT NULL,
  `itemcode` int(100) NOT NULL,
  `disc` int(100) NOT NULL,
  `PONUM` int(100) NOT NULL,
  `lineno` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `del_date` int(100) NOT NULL,
  `dia` int(100) NOT NULL,
  `length` int(100) NOT NULL,
  `gweight` int(100) NOT NULL,
  `grade` int(100) NOT NULL,
  `basic_material` int(100) NOT NULL,
  `drg.no` int(100) NOT NULL,
  `inv_no` int(100) NOT NULL,
  `po_rate` int(100) NOT NULL,
  `basic_value` int(100) NOT NULL,
  `rm_rate` int(100) NOT NULL,
  `rmc` int(100) NOT NULL,
  `p` int(100) NOT NULL,
  `percent` int(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`userid`, `usertype`, `name`, `contact`, `email`, `password`, `username`, `landmark`, `pincode`, `address`, `status`, `registrationdate`, `totalorderamt`) VALUES
(1, 'admin', 'admin', '0000000000', 'admin@gmail.com', 'Admin@2023', 'admin', '.', '.', '.', 0, '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chem_mechmaster`
--
ALTER TABLE `chem_mechmaster`
  ADD PRIMARY KEY (`ChemMechId`);

--
-- Indexes for table `gradediameteruniquecode`
--
ALTER TABLE `gradediameteruniquecode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grademaster`
--
ALTER TABLE `grademaster`
  ADD PRIMARY KEY (`Gradeid`);

--
-- Indexes for table `itemchemicalcompositionmaster`
--
ALTER TABLE `itemchemicalcompositionmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemmaster`
--
ALTER TABLE `itemmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pomaster`
--
ALTER TABLE `pomaster`
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
-- AUTO_INCREMENT for table `chem_mechmaster`
--
ALTER TABLE `chem_mechmaster`
  MODIFY `ChemMechId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gradediameteruniquecode`
--
ALTER TABLE `gradediameteruniquecode`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grademaster`
--
ALTER TABLE `grademaster`
  MODIFY `Gradeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `itemchemicalcompositionmaster`
--
ALTER TABLE `itemchemicalcompositionmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `itemmaster`
--
ALTER TABLE `itemmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pomaster`
--
ALTER TABLE `pomaster`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
