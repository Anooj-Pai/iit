-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2021 at 01:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iitQuiz3`
--

-- --------------------------------------------------------

--
-- Table structure for table `myprojects`
--

CREATE TABLE `myprojects` (
  `id` int(4) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Desc` varchar(100) DEFAULT NULL,
  `Link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `myprojects`
--

INSERT INTO `myprojects` (`id`, `Name`, `Desc`, `Link`) VALUES
(1, 'Lab 2', 'Resume', '../../Labs/Lab2/index.html'),
(2, 'Lab 3', 'Website', '../../Labs/Lab3/index.html'),
(3, 'Lab 4', 'Atom Feed', '../../Labs/Lab4-atom/Atomfeed.xm'),
(4, 'Lab 4', 'RSS Feed', '../../Labs/Lab4-rss/RSSfeed.xml'),
(5, 'Lab 5', 'JavaScript', '../../Labs/Lab5/index.html'),
(6, 'Lab 6', 'JQuery', '../../Labs/Lab6/index.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myprojects`
--
ALTER TABLE `myprojects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myprojects`
--
ALTER TABLE `myprojects`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
