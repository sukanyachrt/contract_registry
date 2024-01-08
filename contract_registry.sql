-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 04:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contract_registry`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(10) NOT NULL COMMENT 'รหัสลูกค้า',
  `Customer_Name` varchar(100) NOT NULL COMMENT 'ชื่อลูกค้า',
  `Address` varchar(255) NOT NULL COMMENT 'ที่อยู่',
  `Telephone Number` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `Login_Code` varchar(10) NOT NULL COMMENT 'รหัสเข้าสู่ระบบ',
  `Password_ID` varchar(6) NOT NULL COMMENT 'รหัสผ่าน',
  `Salesperson_Code` int(10) NOT NULL COMMENT 'รหัสพนักงานขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `Login_Code`, `Password_ID`, `Salesperson_Code`) VALUES
(1, 'admin', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE `salesperson` (
  `Salesperson_Code` int(10) NOT NULL COMMENT 'รหัสพนักงานขาย',
  `Salesperson_Name` varchar(200) NOT NULL COMMENT 'ชื่อพนักงานขาย',
  `Telephone_Number` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `Salesperson_position` varchar(20) NOT NULL COMMENT 'ตำแหน่งพนักงานขาย',
  `Salesperson_status` varchar(1) NOT NULL COMMENT 'สถานะพนักงานขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`Salesperson_Code`, `Salesperson_Name`, `Telephone_Number`, `Salesperson_position`, `Salesperson_status`) VALUES
(1, 'ทดสอบ ทดสอบ', '081', 'admin_sale', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_saleperson` (`Salesperson_Code`);

--
-- Indexes for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD PRIMARY KEY (`Salesperson_Code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลูกค้า';

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salesperson`
--
ALTER TABLE `salesperson`
  MODIFY `Salesperson_Code` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงานขาย', AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_saleperson` FOREIGN KEY (`Salesperson_Code`) REFERENCES `salesperson` (`Salesperson_Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
