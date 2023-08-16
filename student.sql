-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 07:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `roll` int(6) NOT NULL,
  `class` varchar(3) NOT NULL,
  `city` varchar(15) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`, `datetime`) VALUES
(193, 'Rajitha', 190405, '3rd', 'Kuda Galgamuwa', '0762345684', 'rajitha1234.jpg', '2023-08-15 10:54:27'),
(194, 'Kaveen', 190095, '2nd', 'Kuliyapitiya', '0712465798', 'kaveen1234.jpg', '2023-08-15 10:57:01'),
(198, 'Udaya', 190155, '1st', 'Kurunegala', '0763021003', 'udaya1234.jfif', '2023-08-15 11:11:23'),
(199, 'Eshan', 190163, '4th', 'Kurunegala', '0745623457', 'eshan1234.jpg', '2023-08-15 11:12:48'),
(200, 'Pumudu', 190306, '2nd', 'Narammla', '0708934562', 'pumudu1234.jfif', '2023-08-15 11:14:48'),
(203, 'Thiliru', 190489, '2nd', 'Kurunegala', '0745673489', 'thiliru123.jpg', '2023-08-15 11:26:57'),
(204, 'Isira', 190253, '3rd', 'Malkaduwawa', '0721456784', 'isira123.jfif', '2023-08-15 11:29:08'),
(205, 'Harsha', 190500, '4th', 'Wariyapola', '0754676342', 'harsha1234.jfif', '2023-08-15 12:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userRole` varchar(20) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `userRole`, `photo`, `status`, `datetime`) VALUES
(181, 'Chamanga', 'e19096@eng.pdn.ac.lk', 'chamanga1234', '17fe1140ba7e0c2a8e13e6deb3c7cf9ad239ff94', 'admin', 'chamanga1234.jfif', 'active', '2023-08-15 10:18:19'),
(182, 'Rajitha', 'e19405@eng.pdn.ac.lk', 'rajitha1234', '84ac64fe43701a3e9d563ad6fe5f94eef5368351', 'student', 'rajitha1234.jpg', 'active', '2023-08-15 10:54:27'),
(183, 'Kaveen', 'e19095@eng.pdn.ac.lk', 'kaveen1234', '66118c41afae6ec947e84e9446383c18318ac56c', 'student', 'kaveen1234.jpg', 'active', '2023-08-15 10:57:01'),
(184, 'Chamuditha', 'e19495@eng.pdn.ac.lk', 'chamuditha1234', 'cf45f5f645eb6b2c636ff8a7ebc6b46b4f13bdfd', 'admin', 'chamuditha1234.jfif', 'active', '2023-08-15 11:03:56'),
(188, 'Udaya', 'e19155@eng.pdn.ac.lk', 'udaya1234', '47b29bce1c7585b341ceef892f413ad0cc92ba91', 'student', 'udaya1234.jfif', 'active', '2023-08-15 11:11:23'),
(189, 'Eshan', 'e19163@eng.pdn.ac.lk', 'eshan1234', '5dc2e9d1821222d18aec7099cfd6759e724c0803', 'student', 'eshan1234.jpg', 'active', '2023-08-15 11:12:48'),
(190, 'Pumudu', 'e19306@eng.pdn.ac.lk', 'pumudu1234', 'a499024a5b3e187d7a0b07be3773adfc08265f38', 'student', 'pumudu1234.jfif', 'active', '2023-08-15 11:14:48'),
(193, 'Thiliru', 'e19489@eng.pdn.ac.lk', 'thiliru123', '7ad099ffc1dbd23bc30056183833fe57fa699750', 'student', 'thiliru123.jpg', 'active', '2023-08-15 11:26:57'),
(194, 'Isira', 'e19253@eng.pdn.ac.lk', 'isira123', '4d1c822a3685ad37f89944ffd70a73e96d918591', 'student', 'isira123.jfif', 'active', '2023-08-15 11:29:08'),
(195, 'Harsha', 'e19500@eng.pdn.ac.lk', 'harsha1234', '8e4a549a9b25f12a9ade42b269425608732813d5', 'student', 'harsha1234.jfif', 'active', '2023-08-15 12:22:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- CREATE TABLE `courses` (
--   `id` int(5) NOT NULL AUTO_INCREMENT,
--   `course_name` varchar(100) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- INSERT INTO `courses` (`course_name`) VALUES
-- ('History'),
-- ('Geography'),
-- ('Political Science'),
-- ('Psychology'),
-- ('Drama'),
-- ('Music'),
-- ('Mathematics'),
-- ('Anatomy');