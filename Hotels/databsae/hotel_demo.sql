-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2019 at 01:08 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `sno` int(11) DEFAULT NULL,
  `id` varchar(15) DEFAULT NULL,
  `pw` varchar(100) DEFAULT NULL,
  `token` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='role-0 => ADMIN,role-1 => MANAGER';

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

DROP TABLE IF EXISTS `food_menu`;
CREATE TABLE IF NOT EXISTS `food_menu` (
  `sno` int(3) DEFAULT NULL,
  `menu_id` int(2) DEFAULT NULL,
  `menu_name` varchar(13) DEFAULT NULL,
  `item_id` int(4) DEFAULT NULL,
  `item_name` varchar(32) DEFAULT NULL,
  `item_rate` int(4) DEFAULT NULL,
  `item_rate_ac` int(4) DEFAULT NULL,
  `item_available_status` int(1) DEFAULT NULL,
  `source_id` varchar(10) DEFAULT NULL,
  `quantity_to_reduce` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online_order`
--

DROP TABLE IF EXISTS `online_order`;
CREATE TABLE IF NOT EXISTS `online_order` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `oid` varchar(100) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mail` varchar(500) NOT NULL,
  `area` varchar(500) DEFAULT NULL,
  `landmark` varchar(500) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `hour` int(11) DEFAULT NULL,
  `minute` int(11) DEFAULT NULL,
  `ampm` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `gTotal` int(11) DEFAULT NULL,
  `bill_no` int(11) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `sno` int(11) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `order_amount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ampm` varchar(10) NOT NULL,
  `order_minute` int(11) DEFAULT NULL,
  `order_hour` int(11) DEFAULT NULL,
  `order_day` int(11) DEFAULT NULL,
  `order_month` int(11) DEFAULT NULL,
  `order_year` int(11) DEFAULT NULL,
  `order_table_id` int(11) DEFAULT NULL,
  `order_table_number` int(11) DEFAULT NULL,
  `bill_status` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `extra_charges` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

DROP TABLE IF EXISTS `source`;
CREATE TABLE IF NOT EXISTS `source` (
  `sno` int(11) DEFAULT NULL,
  `source_id` int(11) DEFAULT NULL,
  `source_name` varchar(250) DEFAULT NULL,
  `source_type` int(11) DEFAULT NULL,
  `stock_count` int(11) DEFAULT NULL,
  `stock_weight` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `source_history`
--

DROP TABLE IF EXISTS `source_history`;
CREATE TABLE IF NOT EXISTS `source_history` (
  `sno` int(10) NOT NULL,
  `source_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `hour` int(10) NOT NULL,
  `minute` int(10) NOT NULL,
  `ampm` varchar(10) NOT NULL,
  `day` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `stats` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_order`
--

DROP TABLE IF EXISTS `sub_order`;
CREATE TABLE IF NOT EXISTS `sub_order` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `soId` int(11) DEFAULT NULL,
  `oId` varchar(50) DEFAULT NULL,
  `iId` int(11) DEFAULT NULL,
  `iCount` int(11) DEFAULT NULL,
  `iAmount` int(11) DEFAULT NULL,
  `itAmount` int(11) DEFAULT NULL,
  `iName` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `sno` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `table_type` varchar(50) DEFAULT NULL,
  `table_number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `locked_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_reservation`
--

DROP TABLE IF EXISTS `table_reservation`;
CREATE TABLE IF NOT EXISTS `table_reservation` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `mail` varchar(500) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `code` int(50) NOT NULL,
  `reserved_table` varchar(500) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(100) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `login_status` int(11) DEFAULT NULL,
  `pw` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
