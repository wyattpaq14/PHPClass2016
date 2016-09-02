-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2016 at 01:32 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpclasssummer2016`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(10) unsigned NOT NULL,
  `firstname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `height` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `firstname`, `lastname`, `dob`, `height`) VALUES
(1, 'Vin', 'Diesel', '1967-07-18', '5'' 11"'),
(2, 'Leonardo', 'DiCaprio', '1974-10-11', '6'' 0"'),
(3, 'Brad', 'Pitt', '1963-12-18', '5'' 11"'),
(4, 'Will', 'Smith', '1968-09-19', '6'' 2"'),
(5, 'Diane', 'HeidkrÃ¼ger', '1976-07-15', '5'' 7"');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
