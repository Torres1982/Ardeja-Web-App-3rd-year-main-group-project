-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2016 at 10:25 AM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `login`, `password`) VALUES
(1, 'Artur', 'user', '0000'),
(2, 'James', 'user2', '8888'),
(3, 'Deniss', 'user3', '1111'),
(4, 'Arnold', 'user4', '2222');

-- --------------------------------------------------------

--
-- Table structure for table `exercise_list`
--

CREATE TABLE `exercise_list` (
  `user_id` int(11) NOT NULL,
  `level` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `date` varchar(20) NOT NULL,
  `complete` int(11) NOT NULL,
  `exerciseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercise_list`
--

INSERT INTO `exercise_list` (`user_id`, `level`, `type`, `date`, `complete`, `exerciseid`) VALUES
(1, 'advance', 'cardio', '2016-04-10', 42, 5),
(1, 'intermediate', 'cardio', '2016-04-10', 28, 6),
(1, 'beginner', 'cardio', '2016-04-13', 42, 7),
(11, 'intermediate', 'cardio', '2016-04-13', 42, 8),
(11, 'intermediate', 'cardio', '2016-04-14', 57, 9),
(1, 'advance', 'cardio', '2016-04-14', 42, 13),
(1, 'beginner', 'spin', '2016-04-14', 42, 14),
(1, 'intermediate', 'cardio', '2016-04-20', 57, 15),
(11, 'intermediate', 'cardio', '2016-04-21', 28, 16);

-- --------------------------------------------------------

--
-- Table structure for table `fitbit_tracker`
--

CREATE TABLE `fitbit_tracker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `heart_beat_rate` int(11) NOT NULL,
  `zone1_minutes` int(11) DEFAULT NULL,
  `zone2_minutes` int(11) DEFAULT NULL,
  `zone3_minutes` int(11) DEFAULT NULL,
  `zone4_minutes` int(11) DEFAULT NULL,
  `total_calories_burnt` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fitbit_tracker`
--

INSERT INTO `fitbit_tracker` (`id`, `user_id`, `date`, `heart_beat_rate`, `zone1_minutes`, `zone2_minutes`, `zone3_minutes`, `zone4_minutes`, `total_calories_burnt`) VALUES
(1, 1, '2016-02-27', 50, 1405, 11, 22, 2, 410.904),
(50, 1, '2016-02-10', 54, 1109, 5, 0, 0, 451.65198),
(51, 1, '2016-03-10', 53, 73, 0, 0, 0, 25.938315),
(52, 1, '2016-03-09', 53, 1410, 1, 0, 0, 601.375125),
(53, 1, '2016-03-05', 50, 637, 53, 0, 0, 330.89186),
(54, 1, '2016-03-07', 51, 1432, 5, 2, 0, 635.53152);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `user_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `fitbit_id` varchar(30) NOT NULL,
  `fitbit_secret` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`user_id`, `name`, `surname`, `password`, `dob`, `email`, `gender`, `fitbit_id`, `fitbit_secret`) VALUES
(1, 'Artur', 'Artur_user', '$2y$10$4/YdnrY4v0aL9j5ivaut2OwQ36CAguPQDynXmD30kBDlmI4ZopDRi', '1990-12-26', 'artur@gmail.com', 'male', '227F3M', 'aeba71c4eb99e8ba80ab70682b434dda'),
(10, 'Marry', 'Tim', '$2y$10$s173qA4h4NhCeqZ8MLQ7KeHPrpuUSKlyHkAFhoZW2VBb3ukx5n5zG', '1982-12-12', 'testme@mail.ru', 'female', '', ''),
(11, 'Admin', 'Admin', '$2y$10$/3QSC.atO5xeCQYef/WJa.lBI6Qwf4I5gb1rKT/H9a6lIjTEE1TO.', '1982-12-12', 'admin@gmail.com', 'male', '', ''),
(12, 'Kate', 'O''Connell', '$2y$10$aiSrC82suW1WL6bkXkRP8eo9exrY5VDKxfbX1gobMgGiOPK0HwcZK', '1997-10-12', 'kate@gamil.com', 'female', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `card_type` varchar(30) NOT NULL,
  `card_number` varchar(300) NOT NULL,
  `expiry_month` varchar(30) NOT NULL,
  `expiry_year` varchar(11) NOT NULL,
  `card_cvv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `name`, `card_type`, `card_number`, `expiry_month`, `expiry_year`, `card_cvv`) VALUES
(1, 1, 'Artur', 'Visa', 'QJpuTahnlLklGctkZVttGNm9HOYw08554NCbageHh/e4frDp3b+wdTkxlMC++r06', 'April', '2020', '123'),
(2, 1, 'Ivan', 'Master Card', 'QJpuTahnlLklGctkZVttGNm9HOYw08554NCbageHh/e4frDp3b+wdTkxlMC++r06', 'June', '2019', '666');

-- --------------------------------------------------------

--
-- Table structure for table `session_time`
--

CREATE TABLE `session_time` (
  `user_id` int(11) NOT NULL,
  `time_spent` int(11) DEFAULT NULL,
  `exercise_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_time`
--

INSERT INTO `session_time` (`user_id`, `time_spent`, `exercise_type`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 2, 4),
(4, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `exercise_list`
--
ALTER TABLE `exercise_list`
  ADD PRIMARY KEY (`exerciseid`);

--
-- Indexes for table `fitbit_tracker`
--
ALTER TABLE `fitbit_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_time`
--
ALTER TABLE `session_time`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `exercise_list`
--
ALTER TABLE `exercise_list`
  MODIFY `exerciseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `fitbit_tracker`
--
ALTER TABLE `fitbit_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
