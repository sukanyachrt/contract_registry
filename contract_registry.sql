-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 04:51 PM
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
-- Table structure for table `contract_register`
--

CREATE TABLE `contract_register` (
  `registration_code` int(11) NOT NULL COMMENT 'รหัสทะเบียนสัญญาเข้า',
  `Project_ID` int(11) NOT NULL COMMENT 'รหัสโครงการ',
  `Customer_ID` int(11) NOT NULL COMMENT 'รหัสลูกค้า ',
  `type_payment` varchar(60) NOT NULL COMMENT 'ประเภทการชำระ\r\nตั๋ว/เช็ค/โอน',
  `period_payment` varchar(2) NOT NULL COMMENT 'งวดในการชำระ',
  `money_payment` varchar(10) NOT NULL COMMENT 'จำนวนเงินในการชำระ',
  `contract_es` varchar(60) NOT NULL COMMENT 'd/s',
  `contract_el` varchar(60) NOT NULL COMMENT 'e/l',
  `contract_model` varchar(60) NOT NULL COMMENT 'model\r\n',
  `Order_details` varchar(255) NOT NULL COMMENT 'รายละเอียด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contract_register`
--

INSERT INTO `contract_register` (`registration_code`, `Project_ID`, `Customer_ID`, `type_payment`, `period_payment`, `money_payment`, `contract_es`, `contract_el`, `contract_model`, `Order_details`) VALUES
(1, 1, 1, '20235', '', '', 'asfsfsedg', '', '', ''),
(2, 2, 1, '20235', '', '', 'asfsfsedg', '', '', ''),
(3, 3, 1, '20235', '', '', 'asfsfsedg', '', '', ''),
(4, 4, 1, '20235', '', '', 'asfsfsedg', '', '', ''),
(5, 5, 2, 'ตั๋ว', '1', '10', 'สัญญา', '', '', ''),
(6, 6, 1, '20235', '', '', 'asfsfsedg', '', '', ''),
(7, 7, 1, '20235', '', '', 'asfsfsedg', '', '', ''),
(8, 8, 1, '202023', '', '', 'สัญญาs', '', '', ''),
(9, 9, 2, 'เงินโอน', '', '', 'สัญญา 9', '', '', ''),
(10, 10, 1, 'เงินโอน', '', '', 'สัญญา 10', '', '', ''),
(11, 12, 1, 'เงินโอน', '1', '1000', '45', '25', '41', 'ก'),
(12, 13, 1, 'เงินโอน', '1', '1000', '45', '25', '41', 'ก');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(10) NOT NULL COMMENT 'รหัสลูกค้า',
  `Customer_Name` varchar(100) NOT NULL COMMENT 'ชื่อลูกค้า',
  `Address` varchar(255) NOT NULL COMMENT 'ที่อยู่',
  `Telephone_Number` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `Customer_Status` varchar(1) NOT NULL COMMENT 'สถานะการคงอยู่ของลูกค้า',
  `Salesperson_Code` int(10) NOT NULL COMMENT 'รหัสพนักงานขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_Name`, `Address`, `Telephone_Number`, `Customer_Status`, `Salesperson_Code`) VALUES
(1, 'ลูกค้า คนที่1', '74', '0817894561', '1', 1),
(2, 'ลูกค้า คนที่2', '508', '0742822100', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `installation_work`
--

CREATE TABLE `installation_work` (
  `Installation_code` int(11) NOT NULL COMMENT 'รหัสการตรวจสอบและ\r\nการรับงานติดตั้ง\r\n',
  `Project_ID` int(11) NOT NULL COMMENT 'รหัสโครงการ',
  `Contract_delivery_datesend` date NOT NULL COMMENT 'วันส่งของในสัญญา',
  `Contract_delivery_dateoffer` date NOT NULL COMMENT 'วันส่งมอบในสัญญา',
  `Project_work_page` varchar(60) NOT NULL COMMENT 'ที่อยู่แบบหน้างานโครงการ',
  `Picture` varchar(255) DEFAULT NULL COMMENT 'แผนที่/รูปภาพ',
  `Credit_department` varchar(255) NOT NULL COMMENT 'ฝ่ายสินเชื่อ',
  `Installation_department` varchar(255) NOT NULL COMMENT 'ฝ่ายติดตั้ง',
  `Installation_status` varchar(1) NOT NULL COMMENT 'สถานะการตรวจสอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `installation_work`
--

INSERT INTO `installation_work` (`Installation_code`, `Project_ID`, `Contract_delivery_datesend`, `Contract_delivery_dateoffer`, `Project_work_page`, `Picture`, `Credit_department`, `Installation_department`, `Installation_status`) VALUES
(2, 6, '2024-01-28', '2024-01-29', 's', '416813371_1053052439282675_4035767971425649831_n.jpg', 's', 's', '1'),
(3, 7, '2024-01-28', '2024-01-29', 's', '416813371_1053052439282675_4035767971425649831_n.jpg', 's', 's', '1'),
(5, 5, '0001-11-28', '0001-11-28', 'แบบหน้างานโครงการ-5', '', 'ฝ่ายสินเชื่อ-5', 'ฝ่ายติดตั้ง-5', '1'),
(8, 8, '2024-02-01', '2024-02-09', 'ทดสอบแบบหน้าโครงการ', '410795972_351035521041101_4838595659033220839_n.jpg', 'ทดสอบฝ่ายสินเชื่อ', 'ทดสอบฝ่ายติดตั้ง', '1'),
(9, 9, '2024-01-31', '2024-01-31', 'แบบหน้างานโครงการ-6', '', 'ฝ่ายสินเชื่อ-5', 'ฝ่ายติดตั้ง-5', '2'),
(10, 10, '2024-01-16', '2024-01-16', 'แบบหน้างานโครงการ-10', '410795972_351035521041101_4838595659033220839_n.jpg', 'ฝ่ายสินเชื่อ-10', 'ฝ่ายติดตั้ง-10', '1'),
(11, 13, '2024-01-28', '2024-01-28', '455', '', 'ฝ่ายสินเชื่อ-11', 'ฝ่ายติดตั้ง-11', '1');

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
(1, 'admin', '123456', 1),
(3, 'credit', '123456', 2),
(4, 'install', '123456', 3);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Project_code` int(11) NOT NULL COMMENT 'รหัสโครงการ',
  `Name_Project` varchar(255) NOT NULL COMMENT 'ชื่อโครงการ',
  `Date` date NOT NULL COMMENT 'วันเดือนปี',
  `Address` varchar(60) NOT NULL COMMENT 'ที่อยู่โครงการ',
  `Salesperson_Code` int(11) NOT NULL COMMENT 'รหัสพนักงานขาย\r\n',
  `Status_Project` varchar(1) NOT NULL COMMENT 'สถานะของโครงการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_code`, `Name_Project`, `Date`, `Address`, `Salesperson_Code`, `Status_Project`) VALUES
(1, 'dev', '2024-01-29', '225 หมู่ 2 ต.ควนลัง', 1, '1'),
(2, 'dev', '2024-01-29', '225 หมู่ 2 ต.ควนลัง', 1, '1'),
(3, 'dev', '2024-01-29', '225 หมู่ 2 ต.ควนลัง', 1, '1'),
(4, 'dev', '2024-01-29', '225 หมู่ 2 ต.ควนลัง', 1, '1'),
(5, 'โครงการที่ 1', '2024-01-13', '74หมู่ 2 ', 1, '0'),
(6, 'dev', '2024-01-29', '225 หมู่ 2 ต.ควนลัง', 1, '0'),
(7, 'dev', '2024-01-29', '225 หมู่ 2 ต.ควนลัง', 1, '0'),
(8, 'ทดสอบสร้างโครงการ', '2024-01-13', '74 ร้อยเอ็ดddd', 2, '0'),
(9, 'โครงการที่ 9', '2024-01-13', '74', 1, '1'),
(10, 'โครงการที่ 10', '2024-01-15', '74', 1, '1'),
(11, 'โครงการที่ 11', '2024-01-14', '508', 1, '1'),
(12, 'โครงการที่ 11', '2024-01-14', '508', 1, '1'),
(13, 'โครงการที่ 11', '2024-01-14', '508', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE `salesperson` (
  `Salesperson_Code` int(10) NOT NULL COMMENT 'รหัสพนักงานขาย',
  `Salesperson_Name` varchar(200) NOT NULL COMMENT 'ชื่อพนักงานขาย',
  `Telephone_Number` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `Salesperson_position` varchar(20) NOT NULL COMMENT 'ตำแหน่งพนักงานขาย',
  `Salesperson_status` varchar(1) NOT NULL COMMENT 'สถานะการคงอยู่ของพนักงานขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`Salesperson_Code`, `Salesperson_Name`, `Telephone_Number`, `Salesperson_position`, `Salesperson_status`) VALUES
(1, 'ทดสอบ ทดสอบ', '0819849707', 'admin_sale', '1'),
(2, 'สินเชื่อ สินเชื่อ ', '0742822100', 'ฝ่ายสินเชื่อ', '1'),
(3, 'ติดตั้ง ติดตั้ง', '0234567891', 'ฝ่ายติดตั้ง', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract_register`
--
ALTER TABLE `contract_register`
  ADD PRIMARY KEY (`registration_code`),
  ADD KEY `fk_project_contract` (`Project_ID`),
  ADD KEY `fk_cus_contract` (`Customer_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`),
  ADD KEY `fk_sale_customer` (`Salesperson_Code`);

--
-- Indexes for table `installation_work`
--
ALTER TABLE `installation_work`
  ADD PRIMARY KEY (`Installation_code`),
  ADD KEY `fk_project_install` (`Project_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_saleperson` (`Salesperson_Code`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_code`),
  ADD KEY `fk_sale_project` (`Salesperson_Code`);

--
-- Indexes for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD PRIMARY KEY (`Salesperson_Code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract_register`
--
ALTER TABLE `contract_register`
  MODIFY `registration_code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสทะเบียนสัญญาเข้า', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลูกค้า', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `installation_work`
--
ALTER TABLE `installation_work`
  MODIFY `Installation_code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการตรวจสอบและ\r\nการรับงานติดตั้ง\r\n', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `Project_code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสโครงการ', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `salesperson`
--
ALTER TABLE `salesperson`
  MODIFY `Salesperson_Code` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงานขาย', AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract_register`
--
ALTER TABLE `contract_register`
  ADD CONSTRAINT `fk_cus_contract` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `fk_project_contract` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_code`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_sale_customer` FOREIGN KEY (`Salesperson_Code`) REFERENCES `salesperson` (`Salesperson_Code`);

--
-- Constraints for table `installation_work`
--
ALTER TABLE `installation_work`
  ADD CONSTRAINT `fk_project_install` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_code`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_saleperson` FOREIGN KEY (`Salesperson_Code`) REFERENCES `salesperson` (`Salesperson_Code`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_sale_project` FOREIGN KEY (`Salesperson_Code`) REFERENCES `salesperson` (`Salesperson_Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
