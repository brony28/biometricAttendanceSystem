-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 06:35 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biometricattendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance2019-2`
--

CREATE TABLE `attendance2019-2` (
  `RollNo` int(11) NOT NULL,
  `BranchID` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Lecture1Test` int(11) DEFAULT NULL,
  `extraAttendance` int(11) DEFAULT NULL,
  `totalAttendance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branchdata`
--

CREATE TABLE `branchdata` (
  `BranchID` int(11) NOT NULL,
  `BranchName` varchar(255) NOT NULL,
  `HOD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `RollNo` int(11) NOT NULL,
  `BranchID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `EmailID` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PhoneNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachersdata`
--

CREATE TABLE `teachersdata` (
  `teacherID` int(11) NOT NULL,
  `BranchID` int(11) NOT NULL,
  `teacherName` int(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL,
  `teacherPassword` varchar(255) NOT NULL,
  `teacherPhoneNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance2019-2`
--
ALTER TABLE `attendance2019-2`
  ADD PRIMARY KEY (`RollNo`),
  ADD KEY `BranchID` (`BranchID`);

--
-- Indexes for table `branchdata`
--
ALTER TABLE `branchdata`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD PRIMARY KEY (`RollNo`),
  ADD UNIQUE KEY `PhoneNo` (`PhoneNo`),
  ADD UNIQUE KEY `EmailID` (`EmailID`),
  ADD KEY `BranchID` (`BranchID`);

--
-- Indexes for table `teachersdata`
--
ALTER TABLE `teachersdata`
  ADD PRIMARY KEY (`teacherID`),
  ADD UNIQUE KEY `teacherEmail` (`teacherEmail`),
  ADD UNIQUE KEY `teacherPhoneNo` (`teacherPhoneNo`),
  ADD KEY `BranchID` (`BranchID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branchdata`
--
ALTER TABLE `branchdata`
  MODIFY `BranchID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance2019-2`
--
ALTER TABLE `attendance2019-2`
  ADD CONSTRAINT `attendance2019-2_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branchdata` (`BranchID`),
  ADD CONSTRAINT `attendance2019-2_ibfk_2` FOREIGN KEY (`RollNo`) REFERENCES `studentdata` (`RollNo`);

--
-- Constraints for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD CONSTRAINT `studentdata_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branchdata` (`BranchID`);

--
-- Constraints for table `teachersdata`
--
ALTER TABLE `teachersdata`
  ADD CONSTRAINT `teachersdata_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branchdata` (`BranchID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
