-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2014 at 10:36 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_record_log`
--

CREATE TABLE IF NOT EXISTS `active_record_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `table` varchar(45) DEFAULT NULL,
  `table_id` bigint(20) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(45) DEFAULT NULL,
  `old_values` text,
  `new_values` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `active_record_log`
--

INSERT INTO `active_record_log` (`id`, `description`, `action`, `table`, `table_id`, `creationdate`, `username`, `old_values`, `new_values`) VALUES
(1, '3 created record in table staff id=1.', 'insert', 'staff', 1, '2013-07-10 21:41:58', '3', NULL, '{"first_name":"Consolatha","middle_name":"","surname":"Mallya","birth_date":"13-08-1988","gender":"F","start_date":"01-03-2013","end_date":null,"position":"Claims","phone1":"0712595877","phone2":"0712595877","email":"","physical_address":"","practice_area":"Motor Insurance,Home and Content Insurance","id":"1","photograph":null,"type":null}'),
(2, '3 changed record in table vehicle id=2.', 'update', 'vehicle', 2, '2013-07-10 21:59:35', '3', '{"id":"2","date_registration":"05-07-2013","registration":"T212ACY","make":"Honda","model":"CRV","body_type":"Sedan","color":"Black","year":"2000","engine_no":"XY202020202X","chasis_no":"XYM90900000","vehicle_type":"Car","passenger":"4","tonnage":"1","vehicle_use":null,"client_id":"8"}', '{"id":"2","date_registration":"05-07-2013","registration":"T212ACY","make":"Honda","model":"CRV","body_type":"Sedan","color":"Black","year":"2000","engine_no":"XY202020202X","chasis_no":"XYM90900000","vehicle_type":"Car","passenger":"4","tonnage":"1","vehicle_use":"Commercial","client_id":"8"}'),
(3, '3 deleted record from tableattorney id=5.', 'delete', 'attorney', 5, '2014-02-20 02:14:01', '3', '{"id":"5","first_name":"kjhaius","middle_name":"j;sjhij","surname":"oiphjsiohn","email":"iohjsduhji","phone1":"jhipoj","phone2":"miodjoij","physical_address":"jitjhoeoruj","practice_area":"hinohjot","start_date":"11-02-2014","end_date":"21-02-2014","birth_date":"28-02-2014","gender":"make","type":"lkhjgsaio","position":"ijhipua"}', NULL),
(4, ' created record in table reservation_details id=1.', 'insert', 'reservation_details', 1, '2014-07-22 10:25:34', NULL, NULL, '{"check_in":"Jan 1, 1970","check_out":"Jan 1, 1970","room_tyepe":"single","adults":"1","children":"0","name":"kanju","email":"mado","phone":"009888","other_info":"nil","id":"1"}'),
(5, ' created record in table reservation_details id=2.', 'insert', 'reservation_details', 2, '2014-07-22 11:13:45', NULL, NULL, '{"check_in":"Jan 1, 1970","check_out":"Jan 1, 1970","room_tyepe":"D","adults":"1","children":"1","name":"mkongo","email":"mkongo@hlghg","phone":"86029","other_info":"nil","id":"2"}'),
(6, ' created record in table reservation_details id=3.', 'insert', 'reservation_details', 3, '2014-07-22 11:19:41', NULL, NULL, '{"check_in":"Jan 1, 1970","check_out":"Jan 1, 1970","room_tyepe":"Double","adults":"2","name":"jay","email":"jay@","phone":"098765","other_info":"wap","id":"3","children":null}');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_details`
--

CREATE TABLE IF NOT EXISTS `reservation_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `room_tyepe` varchar(45) DEFAULT NULL,
  `adults` int(11) DEFAULT NULL,
  `children` varchar(45) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `other_info` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reservation_details`
--

INSERT INTO `reservation_details` (`id`, `check_in`, `check_out`, `room_tyepe`, `adults`, `children`, `name`, `email`, `phone`, `other_info`) VALUES
(1, '1970-01-01', '1970-01-01', 'single', 1, '0', 'kanju', 'mado', '009888', 'nil'),
(2, '1970-01-01', '1970-01-01', 'D', 1, '1', 'mkongo', 'mkongo@hlghg', '86029', 'nil'),
(3, '1970-01-01', '1970-01-01', 'Double', 2, NULL, 'jay', 'jay@', '098765', 'wap');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE IF NOT EXISTS `room_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `room_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `password` varchar(50) NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `jina_binafsi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`password`, `id`, `username`, `name`, `jina_binafsi`) VALUES
('81dc9bdb52d04dc20036dbd8313ed055', 3, 'admin', 'Administrator', ''),
('827ccb0eea8a706c4c34a16891f84e7b', 6, 'reception', 'receptionist', '');
