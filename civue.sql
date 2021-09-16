-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2021 at 08:37 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `civue`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(30) NOT NULL,
  `item_description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_name`, `item_description`, `quantity`, `status`) VALUES
(1, 'modess123', 'with wings', 100, 2),
(2, 'bike', 'japanese bike', 20, 2),
(3, 'name', 'desc', 123, 2),
(4, 'modess123', '123', 7, 2),
(5, 'modess123', 'with wings34', 6, 1),
(6, '1321', '123', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_request`
--

DROP TABLE IF EXISTS `order_request`;
CREATE TABLE IF NOT EXISTS `order_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_request`
--

INSERT INTO `order_request` (`id`, `user_id`, `request_id`, `item_id`, `quantity`, `status`) VALUES
(1, 1, 1631750400, 5, 4, 2),
(2, 18, 1631750412, 5, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `birthday`, `email`, `contact`, `password`, `usertype`) VALUES
(17, 'elin', 'pablico', '2021-09-15', 'elin.pablico12345@gmail.com', '09294906779', '123', 1),
(18, 'elin', 'pablico', '2021-09-08', 'elin.user@gmail.com', '09294906779', '123', 2),
(19, 'elin', 'pablico', '2021-09-15', 'elin.pablico@gmail.com', '09294906779', '123', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
