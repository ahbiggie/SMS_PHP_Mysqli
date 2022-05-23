-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 01:52 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dfasms`
--

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `title` varchar(5) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `wards` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `parent_id` varchar(20) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `title`, `firstname`, `lastname`, `email`, `occupation`, `gender`, `address`, `phone`, `state`, `wards`, `password`, `parent_id`, `user_id`, `date`) VALUES
(1, 'Dr', 'shaibu', 'yusuf', 'yusufshaibulawal@gmail.com', 'Freelance', 'Select gender', 'Waterboard Auchi, Edo State', '+2349051495949', 'Edo', 3, 'password', 'DFA/PRNT/22/2671', 'f1nOT0pie3kytNEmweIa7oOgchlklijtV2glcDpmN6sARV1PE3d0Cl9QfhHv', '2022-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `category` varchar(60) NOT NULL,
  `section` varchar(20) NOT NULL,
  `dob` text NOT NULL,
  `password` varchar(60) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `state`, `class`, `category`, `section`, `dob`, `password`, `reg_no`, `user_id`, `date`) VALUES
(1, 'abdullah', 'malik', 'hafeez', 'male', 'Edo', 'sss3', 'JSS', '2021', '12/12/2020', 'password', 'dfa/sss/22/1234', '', '0000-00-00'),
(2, 'shaibu', 'lawal', 'yusuf', 'Choose...', 'Edo', '1', 'Junior_secondary', '2021/2022', '03/08/1996', 'password', '', 'RDjAM7eY8kSqPV6LXsP4pO98EwaQz5KhapaLlsx7lhxNGYdDsjxyt3hyKwHZ', '2022-05-10'),
(3, 'Stale', '', 'Mate', 'Male', 'Edo', '1', 'JSS', '2021/2022', '03/08/1996', 'password', '', 'vCXYCkEJriQwPZzIezadEmvUMSLA5PdKHR0U24zQnUgvhDMwitntXjM8ZgNi', '2022-05-10'),
(4, 'Jane', '', 'Doe', 'Female', 'Edo', '1', 'JSS', '2021/2022', '03/08/1996', 'password', '', 'cb7cEzOsQNmQvLlCvlMfLGVHnSSuFO1E6xKFiSQWogtWyj42KB5V5tZ2PJ0m', '2022-05-11'),
(5, 'shaibu', 'lawal', 'yusuf', 'Male', 'Edo', '2', 'JSS', '2021/2022', '03 May 2022', 'password', 'DFA/JSS/22/5906', '8Rcevr6FcPPP6jPZ3XuuM7rg6Y1ONam6lfasewDmBHTsneeMDpBOtqoNvHB9', '2022-05-12'),
(6, 'Isah', 'Mark', 'Yusuf', 'Male', 'Benue', '1', 'JSS', '2021/2022', '03 May 2022', 'password', 'DFA/JSS/22/2531', 'ISETSZcfrPbh2SQMf3VBoPCcA1bX2g75F7mUUp5lYel3XJ9rHwGKEIA5rc9s', '2022-05-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `gender` (`gender`),
  ADD KEY `address` (`address`),
  ADD KEY `state` (`state`),
  ADD KEY `phone` (`phone`),
  ADD KEY `wards` (`wards`),
  ADD KEY `date` (`date`),
  ADD KEY `occupation` (`occupation`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `section` (`section`),
  ADD KEY `category` (`category`),
  ADD KEY `class` (`class`),
  ADD KEY `gender` (`gender`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `middlename` (`middlename`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `dob` (`dob`(768)),
  ADD KEY `state` (`state`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
