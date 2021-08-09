-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2021 at 08:39 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filterdatafromtable`
--

-- --------------------------------------------------------

--
-- Table structure for table `datatable`
--

CREATE TABLE `datatable` (
  `id` int(255) NOT NULL,
  `IndianPort` varchar(255) DEFAULT NULL,
  `ModeofShipment` varchar(255) DEFAULT NULL,
  `CUSH` varchar(255) DEFAULT NULL,
  `Invoice_No` varchar(255) DEFAULT NULL,
  `Item_No` varchar(255) DEFAULT NULL,
  `BillNO` varchar(255) DEFAULT NULL,
  `4Digit` varchar(255) DEFAULT NULL,
  `Date` varchar(255) DEFAULT NULL,
  `HSCode` varchar(255) DEFAULT NULL,
  `Product` varchar(255) DEFAULT NULL,
  `Quantity` varchar(255) DEFAULT NULL,
  `Unit` varchar(255) DEFAULT NULL,
  `Item_Rate_INR` varchar(255) DEFAULT NULL,
  `Item_Rate_INV` varchar(255) DEFAULT NULL,
  `Currency` varchar(255) DEFAULT NULL,
  `Total_Amount_INV_FC` varchar(255) DEFAULT NULL,
  `FOBINR` varchar(255) DEFAULT NULL,
  `IEC` varchar(255) DEFAULT NULL,
  `IndianCompany` varchar(255) DEFAULT NULL,
  `Address1` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `ForeignCompany` varchar(255) DEFAULT NULL,
  `ForeignPort` varchar(255) DEFAULT NULL,
  `ForeignCountry` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatable`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
