-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2015 at 05:46 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `sn` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `psw` varchar(10) NOT NULL,
  PRIMARY KEY (`sn`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sn`, `username`, `phone`, `psw`) VALUES
(1, 'admin', '0700', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE IF NOT EXISTS `dishes` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `cost_per_plate` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(30) NOT NULL,
  `wieght` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `dish_ID` int(10) NOT NULL,
  `preparation` int(20) NOT NULL,
  `adate` varchar(10) NOT NULL,
  PRIMARY KEY (`sn`,`dish_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`sn`, `name`, `cost_per_plate`, `description`, `img`, `wieght`, `category`, `dish_ID`, `preparation`, `adate`) VALUES
(5, 'Egusi Soup with semo', '1200', 'Special delicacy prepared with melon seed. the soup originated from eastern part pf Nigeria, Eaten mostly during festive period in the past, but current consume by many family and used during special occasion like wedding ceremonies and end of the year parties.', 'uploads/14.jpg', '200', '2', 14, 120, '21/9/2015'),
(10, 'Ogbono Soup with semo', '1200', 'Special delicacy prepared with melon seed. the soup originated from eastern part pf Nigeria, Eaten mostly during festive period in the past, but current consume by many family and used during special occasion like wedding ceremonies and end of the year parties.', 'uploads/19.jpg', '150', '2', 19, 120, '21/9/2015'),
(11, 'Oha Soup with semo', '1200', 'Special delicacy prepared with melon seed. the soup originated from eastern part pf Nigeria, Eaten mostly during festive period in the past, but current consume by many family and used during special occasion like wedding ceremonies and end of the year parties.', 'uploads/20.jpg', '150', '2', 20, 120, '21/9/2015'),
(14, 'Oha Soup with wheat', '1200', 'Special delicacy prepared with melon seed. the soup originated from eastern part pf Nigeria, Eaten mostly during festive period in the past, but current consume by many family and used during special occasion like wedding ceremonies and end of the year parties.', '23.jpg', '150', '2', 23, 120, '21/9/2015'),
(16, 'Goat babecu', '2000', 'Proteins base delicacy prepared with roasted goat meat, and garnished with pepper and spinach. recommended for blood purification and patients with indigestion cases.   ', 'uploads/23190923.jpg', '200', '', 23190923, 0, '01/10/15'),
(17, 'Nkwobi', '500', 'Proteins base delicacy prepared with roasted goat meat, and garnished with pepper and spinach. ', 'uploads/49960920.jpg', '150', '', 49960920, 0, '01/10/15'),
(18, 'Chicken babecu', '2000', 'Roasted chicken garnished with pepper tomatoes and onion specially made for people watching their cholesterol level.', 'uploads/19550832.jpg', '200', '', 19550832, 0, '02/10/15'),
(19, 'Uniced cake', '1800', 'Made for birthday celebrants.', 'uploads/13810819.jpg', '200', '', 13810819, 0, '02/10/15'),
(20, 'Okazi soup with fufu', '600', 'yummy and nourishing good for anemic candidates', 'uploads/62310520.jpg', '150', '', 62310520, 0, '11/10/15');

-- --------------------------------------------------------

--
-- Table structure for table `dish_of_the_month`
--

CREATE TABLE IF NOT EXISTS `dish_of_the_month` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `cdate` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(30) NOT NULL,
  `cost_of_shipping_per_g` int(10) NOT NULL,
  `location_id` varchar(11) NOT NULL,
  PRIMARY KEY (`sn`,`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`sn`, `location`, `cost_of_shipping_per_g`, `location_id`) VALUES
(1, 'Mbari', 150, '12'),
(2, 'Wetheral', 150, '13');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(15) NOT NULL,
  `time_of_order` varchar(20) NOT NULL,
  `client_name` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `location_id` int(11) NOT NULL,
  `sstatus` varchar(10) NOT NULL,
  `order_date` varchar(10) NOT NULL,
  PRIMARY KEY (`sn`,`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`sn`, `order_id`, `time_of_order`, `client_name`, `location`, `location_id`, `sstatus`, `order_date`) VALUES
(4, '498534150930', '11', 'Eze Onyegbula', '131 douglas rd owerri', 13, '0', '30/09/15'),
(6, '832883150930', '11', 'Chibuzo Eze', '131 douglas rd owerri', 13, '0', '30/09/15'),
(13, '746656151001', '12', 'Chibuzo Eze', '131 douglas rd owerri', 12, '1', '01/10/15'),
(15, '311182151011', '05', 'Eze Onyegbula', '131 douglas rd owerri', 12, '0', '11/10/15');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE IF NOT EXISTS `order_list` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(15) NOT NULL,
  `dish_id` varchar(10) NOT NULL,
  `qty_ordered` int(10) NOT NULL,
  `qty_wieght` int(10) NOT NULL,
  `amt` varchar(15) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`sn`, `order_id`, `dish_id`, `qty_ordered`, `qty_wieght`, `amt`) VALUES
(2, '588726150926', '14', 1, 150, '1200'),
(3, '588726150926', '17', 1, 150, '1200'),
(4, '588726150926', '14', 1, 150, '1200'),
(5, '588726150926', '17', 1, 150, '1200'),
(6, '588726150926', '14', 1, 150, '1200'),
(7, '588726150926', '17', 1, 150, '1200'),
(8, '588726150926', '14', 1, 150, '1200'),
(9, '588726150926', '17', 1, 150, '1200'),
(10, '498534150930', '12', 1, 150, '1200'),
(15, '832883150930', '21', 5, 750, '6000'),
(22, '746656151001', '15', 2, 300, '2400'),
(23, '152959151011', '14', 2, 400, '2400'),
(24, '152959151011', '19', 3, 450, '3600'),
(25, '311182151011', '62310520', 4, 600, '2400');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
