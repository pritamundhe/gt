-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2014 at 05:04 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ladyjoy_fs`
--

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `id` bigint(80) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `name`, `type`) VALUES
(1, 'supplier_01', 1),
(2, 'supplier_02', 1),
(3, 'supplier_03', 1),
(4, 'supplier_04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `product_volume` int(11) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_cost` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type_id`, `product_volume`, `product_description`, `product_cost`, `product_price`) VALUES
(3, 'Hog Grower Mash', 1, 10, 'Hog feeds for 3-4 months', 1200, 1220),
(4, 'sdfasd', 1, 12, 'ddfg', 22, 13),
(5, 'asdcxcv', 2, 14, 'asdfasdf', 11, 22),
(6, 'dvbcvb345', 1, 10, '90', 80, 100),
(7, 'dfhdfgh', 2, 60, 'sdfgsdfg', 38, 20);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_id` bigint(80) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` bigint(80) NOT NULL,
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `trans_note` varchar(200) NOT NULL,
  `trans_action` varchar(10) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `partner_id`, `customer_name`, `product_id`, `qty`, `trans_date`, `user_id`, `trans_note`, `trans_action`) VALUES
(1, 1, '', 3, 24, '2014-02-25 15:22:46', 124, 'asdfasdf', 'add'),
(2, 2, '', 3, 2, '2014-02-25 15:22:51', 124, 'asdfasdf3', 'add'),
(3, 1, '', 3, 40, '2014-02-25 15:22:58', 124, 'asdfasdf31`2', 'add'),
(4, 2, '', 4, 11, '2014-02-25 15:23:05', 124, 'asdf', 'add'),
(5, 0, 'asdfasdf', 0, -10, '2014-02-25 15:23:17', 124, 'asdfasdf', 'distribute'),
(6, 0, 'asdfasdf', 0, -2, '2014-02-25 15:23:23', 124, 'asdfasdf', 'distribute'),
(7, 0, 'asdfasdfdfg', 0, -5, '2014-02-25 15:29:02', 124, 'asdfasdfsdfg', 'distribute'),
(8, 0, 'asd', 3, -12, '2014-02-25 15:33:30', 124, 'asdfasdf', 'distribute'),
(9, 0, 'asfasdf', 3, -1, '2014-02-26 11:54:32', 123, 'asdfasdf', 'distribute'),
(10, 2, '', 3, 1, '2014-02-26 11:54:47', 123, 'asfasdf', 'add'),
(11, 1, '', 6, 10, '2014-02-26 11:54:58', 123, 'sdafasdf', 'add'),
(12, 0, '', 6, -10, '2014-02-26 11:56:01', 123, 'dfghdfh', 'distribute'),
(13, 1, '', 3, 16, '2014-02-26 11:59:11', 123, 'asdfasdf', 'add');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  `type_description` varchar(200) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`, `type_description`) VALUES
(1, 'Hog Feeds', 'Hog Feeds'),
(2, 'Chicken Feeds', 'Chicken Feeds');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `user_level` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_level`) VALUES
(123, 'admin', '111', 1),
(124, 'user', 'a', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
