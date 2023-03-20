-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 09:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bussiness`
--

-- --------------------------------------------------------

--
-- Table structure for table `addoser`
--

CREATE TABLE `addoser` (
  `eid` varchar(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `phone2` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addoser`
--

INSERT INTO `addoser` (`eid`, `name`, `phone`, `phone2`, `email`, `gender`, `img`) VALUES
('B6043', 'Binoy Das', '9774570414', '943655656', 'pio221@gmail.com', 'male', 'bafc0907-f85e-4263-a999-58291173d816.jpg'),
('R7368', 'Ruhit db', '88990674', '77984621', 'ruhit@gmmail.com', 'male', 'zfgy9mncdk351.jpg'),
('w2427', 'wer', '2222', '123', 'paulronit320@dgmail.com', 'male', 'brice-brown-5KzJ_AWPs5c-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `addse`
--

CREATE TABLE `addse` (
  `sid` varchar(20) NOT NULL,
  `servicepart` varchar(30) DEFAULT NULL,
  `servicename` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `oid` varchar(30) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `name` varchar(39) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `phone2` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pin` int(11) NOT NULL,
  `dates` varchar(30) NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `engg` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`oid`, `uid`, `sid`, `name`, `address`, `phone`, `phone2`, `email`, `pin`, `dates`, `payment_type`, `status`, `engg`) VALUES
('OiD173178', '816', 'RAM14305', 'cvbn', 'ghjk', 'gh', 'ghj', 'ghj', 0, '03-08-22', 'cod', 'cancel', 'k1464'),
('OiD177529', '816', 'RAM14400', 'cvbn', 'ghjk', 'gh', 'ghj', 'ghj', 0, '08/08/22', 'cod', 'pending', NULL),
('OiD188080', '559', 'RAM14305', 'ashim', 'asddeer', '11222', '', 'asd@gmail.com', 1221, '03-08-22', 'cod', 'active', 'B6043'),
('OiD56434', '816', 'RAM14305', 'cvbn', 'ghjk', 'gh', 'ghj', 'ghj', 0, '07/08/22', 'cod', 'pending', NULL),
('OiD59644', '822', 'RAM14305', 'Dibakar Saha', 'NIELIT Agartala', '12334', '', 'dibakar@gmail.com', 799008, '03-08-22', 'cod', 'cancel', 'B6043'),
('OiD67682', '816', 'RAM14305', 'prajwal gosh', 'jogendra nagar', '8779909122', '', 'prajwal@ggmail.com', 799001, '03-08-22', 'cod', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicetable`
--

CREATE TABLE `servicetable` (
  `sid` varchar(20) NOT NULL,
  `servicepart` varchar(30) DEFAULT NULL,
  `servicename` varchar(30) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicetable`
--

INSERT INTO `servicetable` (`sid`, `servicepart`, `servicename`, `price`, `img`) VALUES
('RAM14305', 'RAM', 'ram update', '200', ''),
('SSD 19734', 'SSD ', 'ssd fd', '700', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userId` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userId`, `email`, `password`) VALUES
('145', 'paulronit32890@gmail.com', 'RONIT'),
('337', 'paulronit78280@gmail.com', '122234'),
('415', 'pio221@gmail.com', '4344'),
('475', 're@gmail.com', '1234'),
('550', 'paulronit3280@gmail.com', 'Ronit'),
('559', 'amit@gmail.com', 'amit'),
('623', 'paulronikt3280@gmail.com', '123'),
('722', 'tdttdft@gmail.com', 'eewrt'),
('816', 'paulnil320@gmail.com', 'ronit'),
('822', 'dibakar@gmail.com', '1224'),
('985', 'balsal@gmail.com', 'balsal'),
('990', 'paulnil3210@gmail.com5', 'Ert');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addoser`
--
ALTER TABLE `addoser`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `addse`
--
ALTER TABLE `addse`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `servicetable`
--
ALTER TABLE `servicetable`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
