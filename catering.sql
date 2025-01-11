-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 01:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--
CREATE DATABASE IF NOT EXISTS `catering` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `catering`;

-- --------------------------------------------------------

--
-- Table structure for table `addon`
--

CREATE TABLE `addon` (
  `addon_id` varchar(3) NOT NULL,
  `addon_menu` varchar(50) NOT NULL,
  `addon_price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addon`
--

INSERT INTO `addon` (`addon_id`, `addon_menu`, `addon_price`) VALUES
('A01', 'Watermelon/kg', '2.00'),
('A02', 'Tapai Pulut/10 pcs', '9.00'),
('A03', 'Sagu Gula Melaka', '2.00'),
('A04', 'Cendol ', '2.70'),
('A05', 'Orange/each', '1.70'),
('A06', 'Kek Batik', '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` varchar(3) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_ic` varchar(15) NOT NULL,
  `cust_address` varchar(50) NOT NULL,
  `cust_phoneno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_ic`, `cust_address`, `cust_phoneno`) VALUES
('C01', 'Ali', '000507-05-0952', 'Merlimau, Melaka', '019-83391241'),
('C02', 'Saiful', '980823-01-0733', 'Johor Bahru, Johor', '013-75536621'),
('C03', 'Amri', '001112-05-0774', 'Jasin, Melaka', '011-77685233');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `eq_no` varchar(3) NOT NULL,
  `eq_type` varchar(20) NOT NULL,
  `eq_brand` varchar(20) NOT NULL,
  `eq_rent_price` decimal(10,2) NOT NULL,
  `supp_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`eq_no`, `eq_type`, `eq_brand`, `eq_rent_price`, `supp_id`) VALUES
('E01', 'Canopy', 'Hilton', '90.00', 'V01'),
('E02', 'Table', 'OpenTable', '19.00', 'V01'),
('E03', 'Chair', 'OpenChair', '2.50', 'V01');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('zabedah123', 'zabedah321');

-- --------------------------------------------------------

--
-- Table structure for table `ordering`
--

CREATE TABLE `ordering` (
  `cust_id` varchar(3) NOT NULL,
  `set_id` varchar(3) DEFAULT NULL,
  `addon_id` varchar(3) DEFAULT NULL,
  `staff_id` varchar(3) NOT NULL,
  `order_date` date NOT NULL,
  `order_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordering`
--

INSERT INTO `ordering` (`cust_id`, `set_id`, `addon_id`, `staff_id`, `order_date`, `order_quantity`) VALUES
('C03', 'S01', NULL, 'K01', '2020-02-02', 100);

-- --------------------------------------------------------

--
-- Table structure for table `rental_equipment`
--

CREATE TABLE `rental_equipment` (
  `cust_id` varchar(3) NOT NULL,
  `eq_no` varchar(3) NOT NULL,
  `supp_id` int(6) NOT NULL,
  `rent_start` date NOT NULL,
  `rent_end` date NOT NULL,
  `rent_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE `sets` (
  `set_id` varchar(3) NOT NULL,
  `set_menu` varchar(50) NOT NULL,
  `set_price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sets`
--

INSERT INTO `sets` (`set_id`, `set_menu`, `set_price`) VALUES
('S01', 'Nasi Beriani, Iced Sirap', '8.50'),
('S02', 'Nasi Goreng, Iced Tea', '6.00'),
('S03', 'Nasi Minyak, Orange Juice', '7.20');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(3) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `staff_ic` varchar(15) NOT NULL,
  `staff_address` varchar(50) NOT NULL,
  `staff_ed_background` varchar(20) NOT NULL,
  `staff_salary` decimal(10,3) NOT NULL,
  `staff_job` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_ic`, `staff_address`, `staff_ed_background`, `staff_salary`, `staff_job`) VALUES
('K01', 'Abdul', '950407-01-4412', 'Muar, Johor', 'Diploma', '2000', 'Marketing'),
('K02', 'Yazid', '981014-05-7127', 'Jasin, Melaka', 'Degree', '3000', 'Chef'),
('K03', 'Lily', '990911-05-2347', 'Merlimau, Melaka', 'Diploma', '1800', 'Chef Helper'),
('K04', 'Musa', '000126-01-4412', 'Muar, Johor', 'SPM', '1500', 'Chef Helper');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` varchar(3) NOT NULL,
  `supp_phoneno` varchar(15) NOT NULL,
  `supp_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_phoneno`, `supp_location`) VALUES
('V01', 'Rahmat', 'Merlimau, Melaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon`
--
ALTER TABLE `addon`
  ADD PRIMARY KEY (`addon_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`eq_no`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
