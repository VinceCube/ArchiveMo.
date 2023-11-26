-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 12:08 AM
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
(1, 'asd', 'asd', ''),
(2, '0320-0677@lspu.edu.ph', '5841_CUBE_FORM G.pdf', ''),
(3, '0320-0677@lspu.edu.ph', '2667_CUBE_FORM G.pdf', ''),
(4, '0320-0677@lspu.edu.ph', '2081_', '');

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
(1, '0320-0333@lspu.edu.ph', '6589_GALERO, ANGELA KAYE ALAD .pdf', '07/08/2023');

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
(1, '0320-0333@lspu.edu.ph', '8191_GALERO, ANGELA KAYE ALAD .pdf', '07/08/2023');

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
(1, '0320-0333@lspu.edu.ph', '4967_2022 JLSS Reply Slip (Annex B).pdf', '07/08/2023');

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
(1, '2748_SPES-FORM-2-JAMES.docx', '0320-0677@lspu.edu.ph', 'sad', 'Negative', '07/08/2023'),
(2, '7420_GALERO, ANGELA KAYE ALAD .pdf', '0320-0333@lspu.edu.ph', 'awesome amazing cool', 'Positive', '07/08/2023'),
(3, '9079_GALERO, ANGELA KAYE ALAD .pdf', '0320-0677@lspu.edu.ph', 'This narrative report presents a firsthand account of the challenges encountered by small business owners in a competitive market. Through personal narratives and reflective analysis, this report sheds light on the daunting obstacles and adversities faced by entrepreneurs striving to establish and sustain their ventures. The narratives capture the struggles, setbacks, and disappointments experienced by small business owners, highlighting the harsh realities that often overshadow their aspirations and efforts. This report serves as a wake-up call to policymakers, stakeholders, and support organizations, urging them to address the pressing issues faced by small business owners and to create a more conducive environment for their success.', 'Negative', '07/08/2023'),
(4, '7937_GALERO, ANGELA KAYE ALAD .pdf', '0320-0677@lspu.edu.ph', 'Oh my god your so fucking good', 'Positive', '07/08/2023');

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
(1, '0320-0333@lspu.edu.ph', '6298_2022 JLSS Regional Qualifiers Guide (Annex C).pdf', '07/08/2023');

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
(1, '0320-0677@lspu.edu.ph', 'CUBE_FORM C.pdf', ''),
(2, '0320-0333@lspu.edu.ph', '5696_EDUK.pdf', '07/08/2023');

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
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `birthday`, `age`, `student_id`, `course`, `specialization`, `address`, `contact`, `email`, `password`, `profile`) VALUES
(1, 'Vince Arvie', 'Cube', 'October 11, 2001', '21', '0320677', 'BS Information Technology', 'WMAD', 'Alaminos, Laguna', '09450875898', '0320-0677@lspu.edu.ph', 'cube', 'profile.png'),
(2, 'Andrea Megan', 'Cornejo', 'MAY 11, 2023', '21', '0320-0533', 'BS Information Technology', 'WMAD', 'Alaminos, Laguna', '09876543212', 'asdds@gmail.com', '123', '10.png'),
(4, 'Jasmin', 'Apao Jusi', 'October 1, 2001', '21', '0320-0566', 'BS Information Technology', 'WMAD', 'San Pablo, Laguna', '0987654312', 'asadsa@gmail.com', 'asd', '2.png'),
(6, 'Arvince', 'Ignacio', 'October 11, 2001', '21', '03200677', 'BS Information Technology', 'WMAD', 'Blk. 4 Lot 4 Lynville Homes', '09876541234', '0320-0333@lspu.edu.ph', '123', 'profile.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ojt_id`
--
ALTER TABLE `ojt_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
