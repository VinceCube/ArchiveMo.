-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 01:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itst302_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `username`, `password`) VALUES
(1, 'Vince Arvie Cube', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `concent`
--

CREATE TABLE `concent` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `concent` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `concent`
--

INSERT INTO `concent` (`id`, `email`, `concent`, `date`) VALUES
(1, 'vincearviecube1011@gmail.com', '8693_384433662_1286754318700616_8484363913609480979_n.jpg', '11/16/2023');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `contract` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `email`, `contract`, `date`) VALUES
(1, 'vincearviecube1011@gmail.com', '8457_VhonnCube.png', '11/16/2023');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `medical_cert` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`id`, `email`, `medical_cert`, `date`) VALUES
(1, 'vincearviecube1011@gmail.com', '1499_394019256_1286729228663962_5790648442207856836_n.png', '11/16/2023');

-- --------------------------------------------------------

--
-- Table structure for table `moa`
--

CREATE TABLE `moa` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `moa` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moa`
--

INSERT INTO `moa` (`id`, `email`, `moa`, `date`) VALUES
(1, 'vincearviecube1011@gmail.com', '7432_394019256_1286729228663962_5790648442207856836_n.png', '11/16/2023');

-- --------------------------------------------------------

--
-- Table structure for table `narrative`
--

CREATE TABLE `narrative` (
  `id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `user` text NOT NULL,
  `sentiment` text NOT NULL,
  `sentiment_result` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `narrative`
--

INSERT INTO `narrative` (`id`, `file_name`, `user`, `sentiment`, `sentiment_result`, `date`) VALUES
(1, '6253_Huang G. Dynamic Trio. Building Web Applications...React, Next.js, Tailwind 2023.pdf', '0320-0333@lspu.edu.ph', 'Amazing experience but not so good i feeling lonely although i have friends with me. sometimes i wanna give up but hey i made it. im just happy.', 'Positive', '10/22/2023'),
(2, '2047_Broadening_the_DebateThe_Pros_and_Cons_of_Globaliz.pdf', 'arvinceignacio1011@gmail.com', 'Awesome and cool. i had so much fun', 'Positive', '11/11/2023'),
(3, '3709_Backup-codes-0320-0677.txt', 'vincearviecube1011@gmail.com', 'awesome', 'Positive', '11/16/2023'),
(4, '8038_DSWD.png', 'vincearviecube1011@gmail.com', 'nice one', 'Positive', '11/16/2023'),
(5, '4330_384433662_1286754318700616_8484363913609480979_n.jpg', 'vincearviecube1011@gmail.com', 'try again', 'Neutral', '11/16/2023'),
(6, '9257_ccsfest2023-be2932f4-7612-4e04-b0e4-f92840c02b4b.jpg', 'vincearviecube1011@gmail.com', 'last one and im done', 'Neutral', '11/16/2023');

-- --------------------------------------------------------

--
-- Table structure for table `ojt_id`
--

CREATE TABLE `ojt_id` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `ojt_id` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ojt_id`
--

INSERT INTO `ojt_id` (`id`, `email`, `ojt_id`, `date`) VALUES
(1, 'vincearviecube1011@gmail.com', '6072_394019256_1286729228663962_5790648442207856836_n.png', '11/16/2023');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `waiver` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `email`, `waiver`, `date`) VALUES
(1, '0320-0333@lspu.edu.ph', '2179_Huang G. Dynamic Trio. Building Web Applications...React, Next.js, Tailwind 2023.pdf', '10/23/2023'),
(2, '0320-0677@lspu.edu.ph', '8952_Backup-codes-0320-0677.txt', '11/16/2023'),
(3, 'vincearviecube1011@gmail.com', '2963_Backup-codes-0320-0677.txt', '11/16/2023'),
(4, 'vincearviecube1011@gmail.com', '1840_384433662_1286754318700616_8484363913609480979_n.jpg', '11/16/2023'),
(5, 'vincearviecube1011@gmail.com', '3295_DSWD.png', '11/16/2023');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `student_id` text NOT NULL,
  `course` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `ver_code` text NOT NULL,
  `verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `birthday`, `age`, `student_id`, `course`, `specialization`, `address`, `contact`, `company`, `position`, `email`, `password`, `profile`, `ver_code`, `verified_at`) VALUES
(2, 'Andrea Megan', 'Cornejo', '2023-10-01', '21', '0320-0533', 'BS Information Technology', 'WMAD', 'Alaminos, Laguna', '09876543212', 'Converge', 'Software Developer', 'asdds@gmail.com', '123', '10.png', '', NULL),
(6, 'Arvince', 'Ignacio', '2001-10-11', '21', '03200677', 'BS Information Technology', 'WMAD', 'Blk. 4 Lot 4 Lynville Homes', '09876543212', 'Accenture', 'Web Developer', '0320-0333@lspu.edu.ph', 'cube', 'profile.png', '', NULL),
(8, 'Arvince', 'Ignacio', '2023-07-10', '21', '03200311', 'BS Information Technology', 'WMAD', 'Blk. 4 Lot 4 Lynville Homes', '0987654321', 'PLDT', 'Network Engineer', '0320-0311@lspu.edu.ph', '123', 'profile.png', '', NULL),
(9, 'Vince Arive', 'Cube', '2023-07-10', '21', '03200211', 'BS Information Technology', 'WMAD', 'Blk. 4 Lot 4 Lynville Homes', '0987654312', 'Accenture', 'Associate Software Engineer', '0320-0211@lspu.edu.ph', '123', 'profile.png', '', NULL),
(10, 'Arvince', 'Ignacio', '2023-07-01', '21', '03200200', 'BS Information Technology', 'AMG', 'Blk. 4 Lot 4 Lynville Homes', '09876543213', 'Converge', 'IT Support', '0320-0200@lspu.edu.ph', '123', 'profile.png', '', NULL),
(11, 'Megan', 'Cornejo', '2023-07-10', '21', '03211234', 'BS Information Technology', 'WMAD', 'alaminos, laguna', '09876543213', 'Converge', 'Accountant', '0321-1234@lspu.edu.ph', '123', 'logo.png', '', NULL),
(62, 'Andrea Megan', 'Cornejo', '2023-10-31', '21', '0320-0533', 'BS Information Technology', 'WMAD', 'Alaminos, Laguna', '0987643245', 'Laguna State Polytechnic University San Pablo Campus', 'Student', '0320-0533@lspu.edu.ph', '$2y$10$xd6muiL7xnBfqH8Lz3wDgOwlJTTMfcIp/nMb4rKq65f8NrtaqtoMa', '', '204908', '2023-10-31 18:07:04'),
(63, 'Vince', 'Cube', '', '', '', '', '', 'Alaminos, Laguna', '', 'Laguna State Polytechnic University San Pablo Campus', '', 'vincearviecube1011@gmail.com', '$2y$10$HokAJNQgGm/e4EtLmlGjCuUCRqoXJoAG6OS/IxX1VGoYbvogSZmPK', '', '207069', '2023-11-16 09:43:52'),
(64, 'Vince', 'Cube', '2023-11-23', '21', '0320-0677', 'BS Computer Science', 'SMP', 'Alaminos, Laguna', '09876543212', 'Laguna State Polytechnic University San Pablo Campus', 'pio', '0320-0677@lspu.edu.ph', '$2y$10$ZMmPZPBHTQbElc4eIzGem.SAoO6zVjmhko34Zzaw.1ekpsh3uDeW2', '', '351195', NULL),
(73, 'Cube', 'Vhea Mhel', '', '21', '0320-0445', 'BS Information Technology', 'SMP', 'Alaminos, Laguna', '09765412345', 'Laguna State Polytechnic University San Pablo Campus', 'PIO', 'vheamhelcube05@gmail.com', '$2y$10$qEG72LjJwWkZemAEt92emeBsRDAIkh5gJTJ2Owfs5jZWn8jfYfAYy', '', '310993', NULL),
(74, 'Vince', 'Cube', '', '21', '0320-0445', 'BS Computer Science', 'SMP', 'Alaminos, Laguna', '09765412345', 'Laguna State Polytechnic University San Pablo Campus', 'PIO', '0323-3726@lspu.edu.ph', '$2y$10$v6dLplxpoE4FOWWCclAkV.c7LCWGiWRITaNn4UctdDH32E8.MjkgS', '', '316891', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `concent`
--
ALTER TABLE `concent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moa`
--
ALTER TABLE `moa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narrative`
--
ALTER TABLE `narrative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_id`
--
ALTER TABLE `ojt_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `concent`
--
ALTER TABLE `concent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `moa`
--
ALTER TABLE `moa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `narrative`
--
ALTER TABLE `narrative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ojt_id`
--
ALTER TABLE `ojt_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
