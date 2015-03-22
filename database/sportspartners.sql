-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2015 at 06:55 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sportspartners`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cat_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cat_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cat_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `event_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `event_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `event_startdate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `event_enddate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `event_location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `event_person` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `event_detail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `event_deadline` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `create_by` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `create_by` (`create_by`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_rating`
--

CREATE TABLE IF NOT EXISTS `event_rating` (
  `event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rate_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rating` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`event_id`,`rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_user`
--

CREATE TABLE IF NOT EXISTS `event_user` (
  `event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`event_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_parameter`
--

CREATE TABLE IF NOT EXISTS `sys_parameter` (
  `sys_key` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sys_value` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sys_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_age` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_fb_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `user_mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_rating`
--

CREATE TABLE IF NOT EXISTS `user_rating` (
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rate_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rating` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`create_by`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
