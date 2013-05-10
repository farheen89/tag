-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2013 at 05:44 PM
-- Server version: 5.5.23
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blueb123_db_blue_broker`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `PId` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Brand` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Price` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Size` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Source` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DateUpdated` datetime NOT NULL,
  PRIMARY KEY (`PId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=457 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
