-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql110.epizy.com
-- Generation Time: Oct 21, 2022 at 10:36 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32739619_itcapstoneproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customerName` varchar(45) NOT NULL,
  `customerEmail` varchar(45) NOT NULL,
  `customerPassword` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customerName`, `customerEmail`, `customerPassword`) VALUES
(1, 'user1', 'mail1', '123345'),
(2, 'user1', 'mail1', '123345'),
(3, 'webtest3', 'mail@mail.com', '1123345454656'),
(4, 'web4', 'web4@mail.com', '12345676'),
(5, 'test', 'test@gmail.com', 'thisisatest');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `productid` int(11) NOT NULL,
  `male` char(1) NOT NULL,
  `female` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`productid`, `male`, `female`) VALUES
(1, 'M', ''),
(2, '', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderName` varchar(45) NOT NULL,
  `orderPrice` decimal(2,0) NOT NULL,
  `orderQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderName`, `orderPrice`, `orderQuantity`) VALUES
(1, 'test1', '20', 1),
(2, 'test2', '1', 2),
(3, 'webtest1', '2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `customerid` int(11) NOT NULL,
  `productName` varchar(45) NOT NULL,
  `productPrice` double NOT NULL,
  `productStock` int(11) NOT NULL,
  `productImage` varchar(45) NOT NULL,
  `productDescription` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`customerid`, `productName`, `productPrice`, `productStock`, `productImage`, `productDescription`) VALUES
(1, 'Shirt', 12.99, 50, 'link', 'shirt description'),
(2, 'Pants', 19.99, 50, 'link', 'Pants description'),
(3, 'Sweaters', 27.99, 50, 'link', 'Sweater description'),
(4, 'Shorts', 15.99, 50, 'link', 'Shorts description');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `productid` int(11) NOT NULL,
  `small` char(1) NOT NULL,
  `medium` char(1) NOT NULL,
  `large` char(1) NOT NULL,
  `XLarge` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`productid`, `small`, `medium`, `large`, `XLarge`) VALUES
(1, 'S', '', '', ''),
(2, '', 'M', '', ''),
(3, '', '', 'L', ''),
(4, '', '', '', 'XL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`productid`,`male`,`female`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`customerid`,`productName`,`productPrice`,`productStock`,`productImage`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`productid`,`small`,`medium`,`large`,`XLarge`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gender`
--
ALTER TABLE `gender`
  ADD CONSTRAINT `gender_ibfk_1` FOREIGN KEY (`genderid`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `size` (`id`);

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
