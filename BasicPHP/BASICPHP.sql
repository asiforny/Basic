-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2015 at 06:46 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new1`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `shop_id` int(100) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(100) NOT NULL,
  `shop_address` varchar(100) NOT NULL,
  `shop_description` varchar(100) NOT NULL,
  `shop_type_id` varchar(100) NOT NULL,
  `date_time` datetime(6) NOT NULL,
  `user_id` int(100) NOT NULL,
  PRIMARY KEY (`shop_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `shop_name`, `shop_address`, `shop_description`, `shop_type_id`, `date_time`, `user_id`) VALUES
(1, 'super shop', 'uttara', 'well decorated', 'abcd12234', '2015-09-11 13:28:25.000000', 2),
(2, 'mus', 'mirpur', 'well furnished', 'cvbn2345', '2015-09-11 11:25:22.000000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `date_time` datetime(6) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pass`, `user_email`, `date_time`) VALUES
(2, 'orny', 'abc', 'ab@g.com', '2015-09-11 10:27:25.000000'),
(3, 'tas', 'ghj', 'ah@g.com', '2015-09-11 05:15:17.309000');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
