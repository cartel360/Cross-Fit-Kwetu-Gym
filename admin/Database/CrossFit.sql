-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2021 at 10:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CrossFit`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` varchar(20) NOT NULL,
  `streetName` varchar(40) NOT NULL,
  `city` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `streetName`, `city`) VALUES
('1613316841', 'General Kago', 'Nairobi'),
('1613316854', 'General Kago', 'Nairobi'),
('1613316989', 'General Kago', 'Nairobi');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `pass_key` varchar(20) NOT NULL,
  `securekey` varchar(20) NOT NULL,
  `Full_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pass_key`, `securekey`, `Full_name`) VALUES
('admin', 'admin1', 'admin1', 'Cross Fit Kwetu Gym');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls_to`
--

CREATE TABLE `enrolls_to` (
  `et_id` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `paid_date` varchar(15) DEFAULT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `enrolls_to`
--

INSERT INTO `enrolls_to` (`et_id`, `pid`, `uid`, `paid_date`, `expire`, `renewal`) VALUES
(5, 'POQKJC', '1613316841', '2021-02-14', '2021-03-14', 'yes'),
(7, 'POQKJC', '1613316854', '2021-02-14', '2021-03-14', 'yes'),
(9, 'POQKJC', '1613316989', '2021-02-14', '2021-03-14', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `health_status`
--

CREATE TABLE `health_status` (
  `hid` int(5) NOT NULL,
  `calorie` varchar(8) DEFAULT NULL,
  `height` varchar(8) DEFAULT NULL,
  `weight` varchar(8) DEFAULT NULL,
  `fat` varchar(8) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `uid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `health_status`
--

INSERT INTO `health_status` (`hid`, `calorie`, `height`, `weight`, `fat`, `remarks`, `uid`) VALUES
(3, '256', '156', '65', '200', NULL, '1613316841'),
(4, NULL, NULL, NULL, NULL, NULL, '1613316854'),
(5, NULL, NULL, NULL, NULL, NULL, '1613316989');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `pid` varchar(8) NOT NULL,
  `planName` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `validity` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`pid`, `planName`, `description`, `validity`, `amount`, `active`) VALUES
('POQKJC', 'Monthly Plan', 'A monthly subscription that unlocks the entire Gym Plan and coach support on chat.', '1', 1000, 'yes'),
('XSADCB', 'Yearly', 'A yearly subscription that unlocks the entire Gym Plan and coach support on chat.', '12', 10000, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `tid` int(12) NOT NULL,
  `tname` varchar(45) DEFAULT NULL,
  `day1` varchar(200) DEFAULT NULL,
  `day2` varchar(200) DEFAULT NULL,
  `day3` varchar(200) DEFAULT NULL,
  `day4` varchar(200) DEFAULT NULL,
  `day5` varchar(200) DEFAULT NULL,
  `day6` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`tid`, `tname`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`) VALUES
(1, 'Fat Loss', 'Pushups', 'Sit-Ups', 'Cardio', '', '', ''),
(2, 'Biceps', 'Weight Lifts', 'Push Ups', 'Back Squats', 'Inclined Push Ups', 'Declined Pushups', 'Diamond Pushups');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `username` varchar(40) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `joining_date` varchar(10) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fullname`, `username`, `gender`, `mobile`, `email`, `dob`, `joining_date`, `password`, `status`) VALUES
('1613316841', 'Somebody Someone', 'd3cartel', 'Male', '123456', '1@test.com', '2000-01-01', '2021-02-21', 'TestUser1', 0),
('1613316854', 'Jane Doe', 'jane', 'Female', '123456856', '2@test.com', '2020-07-01', '2021-02-17', 'TestUser2', 0),
('1613316989', 'Him His', 'him', 'Male', '1234565478', '3@test.com', '2021-02-14', '2021-02-21', 'TestUser3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `userID` (`id`) USING BTREE;

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Indexes for table `enrolls_to`
--
ALTER TABLE `enrolls_to`
  ADD PRIMARY KEY (`et_id`) USING BTREE,
  ADD KEY `user_ID` (`uid`) USING BTREE,
  ADD KEY `plan_ID_idx` (`pid`) USING BTREE;

--
-- Indexes for table `health_status`
--
ALTER TABLE `health_status`
  ADD PRIMARY KEY (`hid`) USING BTREE,
  ADD KEY `userID_idx` (`uid`) USING BTREE;

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pid`) USING BTREE,
  ADD KEY `pid` (`pid`) USING BTREE;

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`tid`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD KEY `userid` (`userid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolls_to`
--
ALTER TABLE `enrolls_to`
  MODIFY `et_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `health_status`
--
ALTER TABLE `health_status`
  MODIFY `hid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `tid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `userID` FOREIGN KEY (`id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `enrolls_to`
--
ALTER TABLE `enrolls_to`
  ADD CONSTRAINT `plan_ID` FOREIGN KEY (`pid`) REFERENCES `plan` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`uid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `health_status`
--
ALTER TABLE `health_status`
  ADD CONSTRAINT `uID` FOREIGN KEY (`uid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
