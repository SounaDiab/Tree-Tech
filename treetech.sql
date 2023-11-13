-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 04:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `treetech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserName` varchar(32) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Gmail` varchar(255) NOT NULL,
  `Phone_Nb` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserName`, `Password`, `Gmail`, `Phone_Nb`) VALUES
('sajed', 'sajed1993', 'sjoudsajoud@gmail.com', 71294053);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Name`) VALUES
(1, 'accessories'),
(2, 'phone'),
(3, 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `name_picture` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`name_picture`) VALUES
('3630_alshiaclubs-8e2ffc62e9.png'),
('6854_637343070270614714.jpg'),
('715_123160Image1-1180x677_d.jpg'),
('9776__ah_54f60a1c47889.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `internet`
--

CREATE TABLE `internet` (
  `MB` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `internet`
--

INSERT INTO `internet` (`MB`, `Price`) VALUES
(5, 220),
(150, 30),
(12, 16),
(80, 30),
(26, 45);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Add_Date` date NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Cat_ID` int(11) NOT NULL,
  `Nb_Items` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_ID`, `Name`, `Description`, `Price`, `Add_Date`, `Status`, `Picture`, `Cat_ID`, `Nb_Items`) VALUES
(4, 'Iphone', 'Iphone 14 prow max 256GB', 1000, '2023-10-01', 'New', '9680_iphone 14 prow max.jpeg', 2, 2),
(10, 'keyboard', 'keyboard', 30, '2023-09-16', 'New', 'keyboard1.jpg', 1, 3),
(11, 'Mouse', 'mouse for gaming', 9, '2023-09-16', 'New', 'mouse1.jpg', 1, 1),
(57, 'iphone 14', 'iphone 14', 130, '2023-09-30', 'used', '9807_iphone 14 prow max.jpeg', 2, 4),
(51, 'jgjgjghggg', 'hjghhv', 34, '2023-09-29', 'new', 'accessories2.jpg', 1, 8),
(59, 'Dell', 'core i7', 300, '2023-10-01', 'Used', '8331_dell1.jpg', 3, 3),
(58, 'Dell', 'core i5  6th', 200, '2023-10-01', 'Used', '4656_dell2.jpg', 3, 4),
(60, 'HP', 'core i3 8th', 150, '2023-10-01', 'Used', '6358_laptop1.jpg', 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`,`Name`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`name_picture`);

--
-- Indexes for table `internet`
--
ALTER TABLE `internet`
  ADD PRIMARY KEY (`MB`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
