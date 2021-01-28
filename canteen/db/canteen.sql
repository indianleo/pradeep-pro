-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 08:39 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `amt` int(11) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item`, `amt`, `image`) VALUES
(6, 'burger', 50, 'image/5caf74522cff0burger.jpg'),
(7, 'chawmin', 40, 'image/5caf74679d374chawmin.jpg'),
(8, 'chiken fried rice', 60, 'image/5caf7485a15e7chiken rice.jpg'),
(9, 'chili pottato', 50, 'image/5caf74994471fchili pottato.jpg'),
(10, 'chola bhatura', 25, 'image/5caf74ace7f8cchola bhatura.jpg'),
(11, 'chola saomosa', 24, 'image/5caf74bda2cc0chola samosa.jpg'),
(12, 'coffee', 15, 'image/5caf74cee001fcoffe.jpg'),
(13, 'egg fry', 30, 'image/5caf74df8c278egg fry.jpg'),
(14, 'egg roll', 30, 'image/5caf74f1d1e11egg roll.jpg'),
(15, 'finger chips', 35, 'image/5caf750a348a9finger chips.jpg'),
(16, 'Idli', 35, 'image/5caf751c067b9idli.jpg'),
(17, 'bred ommlet', 30, 'image/5caf752d9a052ommlet.jpg'),
(18, 'pakoda', 25, 'image/5caf753eac2bepakopda.jpg'),
(19, 'aalu paratha', 35, 'image/5caf7555f39a5paratha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `items` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `address` varchar(100) NOT NULL,
  `amt` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `items`, `email`, `mobile`, `address`, `amt`, `date`, `status`, `type`) VALUES
(1, '', 'admin@shuat.edu.in', '9898989898', '', 0, '0000-00-00', 'Delivered', ''),
(2, '', 'admin@shuat.edu.in', '9898989898', '', 0, '0000-00-00', '', ''),
(3, '', 'admin@shuat.edu.in', '9898989898', '', 0, '0000-00-00', '', ''),
(4, '', 'admin@shuat.edu.in', '9898989898', '', 0, '2019-05-05', '', ''),
(5, '', 'admin@shuat.edu.in', '9898989898', '', 150, '2019-05-05', 'Pending', 'COD'),
(6, '', 'admin@shuat.edu.in', '9898989898', '', 150, '2019-05-05', 'Pending', 'COD'),
(7, '', 'admin@shuat.edu.in', '9898989898', '', 150, '2019-05-05', 'Pending', 'COD'),
(8, '', 'admin@shuat.edu.in', '9898989898', '', 150, '2019-05-05', 'Pending', 'COD'),
(9, '', 'admin@shuat.edu.in', '9898989898', '', 0, '2019-05-05', 'Pending', 'COD'),
(10, '[\"burger\",\"chawmin\",\"chiken fried rice\"]', 'admin@shuat.edu.in', '9898989898', '', 150, '2019-05-05', 'Pending', 'COD'),
(11, '[\"chawmin\"]', 'sa@gmail.com', '12', 'qsadddadsasfjskdf cxzncasiczx.kcn zxmc', 40, '2019-05-05', 'Pending', 'COD'),
(12, '[\"chawmin\"]', 'sa@gmail.com', '12', 'qsadddadsasfjskdf cxzncasiczx.kcn zxmc', 40, '2019-05-05', 'Pending', 'COD'),
(13, '[\"chiken fried rice\"]', 'sa@gmail.com', '12', 'qsadddadsasfjskdf cxzncasiczx.kcn zxmc', 60, '2019-05-06', 'Pending', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `mobile`, `password`, `status`) VALUES
(4, 'Admin', 'admin@shuats.edu.in', '', '9898989898', '123456', 'Block'),
(5, 's', 'sa@gmail.com', 'qsadddadsasfjskdf cxzncasiczx.kcn zxmc', '12', '12', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
