-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2020 at 05:00 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10093143_biometricattendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance19_20`
--

CREATE TABLE `attendance19_20` (
  `RollNo` varchar(11) NOT NULL,
  `BranchID` int(11) DEFAULT NULL,
  `Lectures` int(11) DEFAULT NULL,
  `extraAttendance` int(11) DEFAULT NULL,
  `totalAttendance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance19_20`
--

INSERT INTO `attendance19_20` (`RollNo`, `BranchID`, `Lectures`, `extraAttendance`, `totalAttendance`) VALUES
('36', NULL, 3, 0, 3),
('45', NULL, 1, 0, 1),
('51', NULL, 5, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `branchdata`
--

CREATE TABLE `branchdata` (
  `BranchID` int(11) NOT NULL,
  `BranchName` varchar(255) NOT NULL,
  `HOD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branchdata`
--

INSERT INTO `branchdata` (`BranchID`, `BranchName`, `HOD`) VALUES
(1, 'IT', 'ABC'),
(2, 'CSE', 'XYZ');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `RollNo` varchar(11) NOT NULL,
  `BranchID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `PhoneNo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`RollNo`, `BranchID`, `Name`, `EmailID`, `Password`, `PhoneNo`) VALUES
('36', NULL, NULL, NULL, '36', NULL),
('45', NULL, NULL, NULL, '45', NULL),
('51', NULL, NULL, NULL, '51', NULL);

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
-- Dumping data for table `teachersdata`
--

INSERT INTO `teachersdata` (`teacherID`, `BranchID`, `teacherName`, `teacherEmail`, `teacherPassword`, `teacherPhoneNo`) VALUES
(1, 1, 123, 'teacher@gmail.com', '123', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance19_20`
--
ALTER TABLE `attendance19_20`
  ADD PRIMARY KEY (`RollNo`),
  ADD UNIQUE KEY `RollNo` (`RollNo`),
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
  MODIFY `BranchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance19_20`
--
ALTER TABLE `attendance19_20`
  ADD CONSTRAINT `attendance19_20_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `studentdata` (`RollNo`);

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
