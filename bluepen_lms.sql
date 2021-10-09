-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 03:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluepen_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `aname` varchar(256) NOT NULL,
  `aemail` varchar(256) NOT NULL,
  `apass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

-- INSERT INTO `admin` (`id`, `aname`, `aemail`, `apass`) VALUES
-- (1, 'admin', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bid` int(11) NOT NULL,
  `bname` varchar(256) NOT NULL,
  `bauthor` varchar(256) NOT NULL,
  `total_pages` int(11) NOT NULL,
  `total_copies` int(11) NOT NULL,
  `year` varchar(5) NOT NULL DEFAULT 'ALL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

-- INSERT INTO `book` (`bid`, `bname`, `bauthor`, `total_pages`, `total_copies`, `year`) VALUES
-- (1, 'Spear Of The Light', 'Braydon Rees', 298, 2, 'ALL'),
-- (2, 'Men Without Courage', 'Gracie Rosario', 450, 4, 'ALL'),
-- (3, 'Slaves With Sins', 'Tayyibah Snider', 300, 0, 'ALL'),
-- (4, 'Luck With Pride', 'Isobelle Paterson', 500, 3, 'ALL'),
-- (5, 'Programming And Problem Solving With Python', 'Ashok Namdev Kamthane, Amit Ashok Kamthane', 424, 5, 'ALL'),
-- (6, 'Programming in C', 'Kamthane Ashok', 688, 1, 'ALL'),
-- (7, 'Basic Electrical Engineering', 'D. C. Kulshreshtha', 600, 4, 'F.E.'),
-- (8, 'Engineering Chemistry', 'Jain', 1404, 1, 'F.E.');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(11) NOT NULL,
  `book_name` varchar(256) NOT NULL,
  `book_author` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

-- INSERT INTO `request` (`req_id`, `book_name`, `book_author`) VALUES
-- (1, 'Applied Physics', 'TechKnowledge');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rev_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `tags` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

-- INSERT INTO `review` (`rev_id`, `text`, `tags`) VALUES
-- (1, 'Good progress, keep it going!', 'website');

-- --------------------------------------------------------

--
-- Table structure for table `snb`
--

CREATE TABLE `snb` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fine` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `snb`
--

-- INSERT INTO `snb` (`id`, `sid`, `bid`, `issue_date`, `return_date`, `fine`) VALUES
-- (13, 2, 7, '2021-09-30', '2021-10-12', '0'),
-- (14, 1, 6, '2021-10-02', '2021-10-09', '0'),
-- (15, 7, 1, '2021-10-02', '2021-10-12', '0'),
-- (16, 4, 2, '2021-09-28', '2021-10-09', '0'),
-- (17, 7, 3, '2021-09-24', '2021-10-12', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `sname` varchar(256) NOT NULL,
  `semail` varchar(256) NOT NULL,
  `spass` varchar(256) NOT NULL,
  `year` varchar(5) NOT NULL,
  `books_issued` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

-- INSERT INTO `student` (`sid`, `sname`, `semail`, `spass`, `year`, `books_issued`) VALUES
-- (1, 'John Green', 'john@green.com', 'JOHN', 'F.E.', 1),
-- (2, 'Victor Brown', 'victor@brown.com', 'VICTOR', 'F.E.', 1),
-- (3, 'Tim Black', 'tim@black.com', 'TIM', 'S.E.', 0),
-- (4, 'Carol Gibson', 'carol@gibson.com', 'CAROL', 'B.E.', 1),
-- (5, 'Margaret Rice', 'margaret@rice.com', 'MARGARET', 'T.E.', 0),
-- (6, 'Pratham Shah', 'pratham@shah.com', 'PRATHAM', 'S.E.', 1),
-- (7, 'Dante Kenny', 'dante@kenny.com', 'DANTE', 'B.E.', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `snb`
--
ALTER TABLE `snb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `snb_ibfk_1` (`bid`),
  ADD KEY `snb_ibfk_2` (`sid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `snb`
--
ALTER TABLE `snb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `snb`
--
ALTER TABLE `snb`
  ADD CONSTRAINT `snb_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `snb_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
