-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2014 at 04:08 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(300) NOT NULL,
  `pass` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', '786pradeep');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `user` varchar(300) NOT NULL,
  `pass` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `name`, `user`, `pass`) VALUES
(5, 'Pradeep', 'admin', 'a83187c14d4c760715a145a95b348ed1');

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`id`, `title`, `content`, `time`) VALUES
(3, 'HRS', 'This website is created by Pradeep', '2014-07-15 03:20:37'),
(4, 'Pradeep', 'I have created near about complete website but there are some issue which i should correct', '2014-07-15 04:47:21'),
(5, 'saurabh', 'thanks for giving me assistance in making my appointment here. ', '2014-07-17 05:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(300) NOT NULL,
  `father_hus` varchar(300) NOT NULL,
  `address` varchar(500) NOT NULL,
  `martial` text NOT NULL,
  `religion` text NOT NULL,
  `city` text NOT NULL,
  `contact` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `sex` text NOT NULL,
  `dr_name` varchar(300) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_name`, `father_hus`, `address`, `martial`, `religion`, `city`, `contact`, `dob`, `sex`, `dr_name`, `time`) VALUES
(1, 'pradeep', 'Radhey shyam yadav', '482a dshjdshjsd', 'Married', 'Hindu', 'Allahabad', '7878787489', '0000-00-00', 'Male', 'dfsbjdsbjs', '2014-07-12 05:59:11'),
(2, 'Ravi Singh', 'Dev praksh singh', 'civil lines,\r\nAllahabad', 'Unmarried', 'Hindu', 'Allahabad', '8876754789', '1999-09-23', 'Male', 'Rajeev Singh', '2014-07-13 02:55:30'),
(3, 'Ravi Singh', 'Dev praksh singh', 'civil lines,\r\nAllahabad', 'Unmarried', 'Hindu', 'Allahabad', '8876754789', '1999-09-23', 'Male', 'Rajeev Singh', '2014-07-13 02:57:13'),
(4, 'Mohan Lal', 'ravi Kisan', 'char baag,sector 304', 'Married', 'Muslim', 'Lucknow', '672647678232', '1990-12-12', 'Male', 'Rajeev Singh', '2014-07-13 06:39:37'),
(6, 'Tom Cruze', 'Vinod Rai', '482,A IndraPuri Colony New Biarahana, Allahabad', 'Unmarried', 'Hindu', 'Allahabad', '8173012345', '1987-07-15', 'Male', 'Dr.Laila ', '2014-07-13 07:31:30'),
(7, 'Sheela', 'Ajay lal', 'hghjfytdtrdghcn\r\nfhghghjfgdfg\r\nfhjhjvh', 'Married', 'Hindu', 'Mumbai', '565757874678', '1889-09-12', 'Female', 'Shalni rai', '2014-07-14 05:30:39'),
(8, 'ramesh rai', 'rakesh lal', 'gfhgfhgdgfsf ghghghjgjh\r\nfgfhgfhgf', 'Married', 'Hindu', 'Lucknow', '779797867556', '1990-12-12', 'Male', 'Shalni rai', '2014-07-14 05:33:54'),
(9, 'reshma', 'roshan lal', 'sdbdjkbjkldbnjxzzxjbxzjkbjkxzcbjkcxbkjbjkdbjk', 'Unmarried', 'Hindu', 'Gujraat', '2145214167', '1990-12-12', 'Female', 'Shalni rai', '2014-07-14 05:40:36'),
(15, 'Saurabh', 'A.k. Rawat', 'dkdkknkvcvd', 'Married', 'Hindu', 'Allahabad', '7800794002', '1990-12-12', 'Male', 'David Sam', '2014-07-15 09:30:36'),
(16, 'Will Smith', 'Smith Dee', 'La Dee, Los angeles', 'Unmarried', 'Christian', 'Delhi', '9997372231', '1989-01-24', 'Male', 'David Sam', '2014-07-19 01:48:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
