-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2015 at 01:35 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `model` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `producer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `km` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gearbox` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ac` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `power` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ecapacity` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `glass` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centerlock` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alarm` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emirror` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bags` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doorn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abs` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speed` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gps` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` mediumtext COLLATE utf8_unicode_ci,
  `carlink` mediumtext COLLATE utf8_unicode_ci,
  `ref` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
