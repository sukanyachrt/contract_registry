-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 03:50 PM
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
  `registration_code` varchar(20) NOT NULL COMMENT 'รหัสทะเบียนสัญญาเข้า',
  `Project_ID` varchar(20) NOT NULL COMMENT 'รหัสโครงการ',
  `Customer_ID` int(11) NOT NULL COMMENT 'รหัสลูกค้า ',
  `contract_es` varchar(60) NOT NULL COMMENT 'd/s',
  `contract_el` varchar(60) NOT NULL COMMENT 'e/l',
  `contract_model` varchar(60) NOT NULL COMMENT 'model\r\n',
  `Order_details` varchar(255) NOT NULL COMMENT 'รายละเอียดไฟล์แนบ',
  `Salesperson_Code` varchar(255) NOT NULL COMMENT 'รหัสพนักงานขาย',
  `Salesperson_Name` varchar(255) NOT NULL COMMENT 'ชื่อพนักงานขาย',
  `Salesperson_Tel` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์พนักงานขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contract_register`
--

INSERT INTO `contract_register` (`registration_code`, `Project_ID`, `Customer_ID`, `contract_es`, `contract_el`, `contract_model`, `Order_details`, `Salesperson_Code`, `Salesperson_Name`, `Salesperson_Tel`) VALUES
('1', '1', 1, 'e/s', 'e/l', 'model-1', '', '00001', 'พนักงานขาย 1', '123456789'),
('2', '2', 2, 'e/s', 'e/l', 'model-2', 'ในข้อมูลพนักงานขายก็มี-3-ส่วนคือ.pdf', '00002', 'พนักงานขาย 2', '123456789'),
('3', '3', 1, '4/4', '-', 'NCA-1000-CO06', 'ให้หาวิทยานิพนธ์ งานวิจัย 5 บท.pdf', '001', 'ภูมิพัฒน์ จันทร์ศรี', '0987654321'),
('THE.001/2567', 'TH50600', 2, 'e/s', 'e/l', 'model-1', '', '61001', 'พนักงานขาย 1', '1234567890');

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
  `Salesperson_Code` varchar(10) NOT NULL COMMENT 'รหัสพนักงานขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_Name`, `Address`, `Telephone_Number`, `Customer_Status`, `Salesperson_Code`) VALUES
(1, 'ลูกค้า คนที่1', '74', '0817894561', '1', '61001'),
(2, 'ลูกค้า คนที่2', '508', '0742822100', '1', '61001'),
(3, 'ลูกค้า คนที่3', '3', '1234567890', '1', '61001'),
(4, 'คุณพิมพ์ใจ สมดี', '65/7 พระรามที่2 ซอย 33 แขวง บางมด เขต จอมทอง จังหวัด กรุงเทพมหานคร 10150', '0621679012', '1', '61004');

-- --------------------------------------------------------

--
-- Table structure for table `installation_work`
--

CREATE TABLE `installation_work` (
  `Installation_code` int(11) NOT NULL COMMENT 'รหัสการตรวจสอบและ\r\nการรับงานติดตั้ง\r\n',
  `Project_ID` varchar(20) NOT NULL COMMENT 'รหัสโครงการ',
  `Contract_delivery_datesend` date NOT NULL COMMENT 'วันส่งของในสัญญา',
  `Contract_delivery_dateoffer` date NOT NULL COMMENT 'วันส่งมอบในสัญญา',
  `Project_work_page` varchar(60) NOT NULL COMMENT 'ที่อยู่แบบหน้างานโครงการ',
  `Credit_department` varchar(255) NOT NULL COMMENT 'ฝ่ายสินเชื่อ',
  `Installation_department` varchar(255) NOT NULL COMMENT 'ฝ่ายติดตั้ง',
  `Installation_status` varchar(1) NOT NULL COMMENT 'สถานะการตรวจสอบ',
  `uploadfile_install` text NOT NULL COMMENT 'ไฟล์เอกสาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `installation_work`
--

INSERT INTO `installation_work` (`Installation_code`, `Project_ID`, `Contract_delivery_datesend`, `Contract_delivery_dateoffer`, `Project_work_page`, `Credit_department`, `Installation_department`, `Installation_status`, `uploadfile_install`) VALUES
(1, '1', '2024-01-31', '2024-01-31', 'แบบหน้างานโครงการ-1', 'ฝ่ายสินเชื่อ1', 'ฝ่ายติดตั้ง 1', '1', ''),
(2, '2', '2024-01-31', '2024-01-31', 'แบบหน้างานโครงการ-2', 'ฝ่ายสินเชื่อ2', 'ฝ่ายติดตั้ง 2', '1', ''),
(3, '3', '2024-06-16', '2024-06-01', 'เซ็นทรัลพลาซ่าลาดพร้าว จังหวัดกรุงเทพ', '-', '-', '2', ''),
(4, '4', '2024-02-14', '2024-01-30', 'เขต บึงกุ่ม จังหวัดกรุงเทพมหานคร', '-', '-', '1', 'download (1).jpg'),
(5, 'TH50600', '2024-01-31', '2024-01-31', 'ทดสอบแบบหน้าโครงการ', '61001', '61002', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `Login_Code` varchar(10) NOT NULL COMMENT 'รหัสเข้าสู่ระบบ',
  `Password_ID` varchar(6) NOT NULL COMMENT 'รหัสผ่าน',
  `Salesperson_Code` varchar(10) NOT NULL COMMENT 'รหัสพนักงานขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `Login_Code`, `Password_ID`, `Salesperson_Code`) VALUES
(1, 'test', '123456', '61001'),
(3, 'credit', '123456', '61002'),
(4, 'install', '123456', '61003'),
(5, 'admin', '123456', '61004');

-- --------------------------------------------------------

--
-- Table structure for table `payment_information`
--

CREATE TABLE `payment_information` (
  `Payment_code` int(11) NOT NULL COMMENT 'รหัสการชำระเงิน',
  `Project_ID` varchar(20) NOT NULL COMMENT 'รหัสโครงการ',
  `type_payment` varchar(255) NOT NULL COMMENT 'ประเภทการชำระ',
  `period_payment` varchar(2) NOT NULL COMMENT 'งวดที่ชำระ',
  `date_payment` date NOT NULL COMMENT 'วันที่ชำระเงิน',
  `money_payment` varchar(10) NOT NULL COMMENT 'จำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment_information`
--

INSERT INTO `payment_information` (`Payment_code`, `Project_ID`, `type_payment`, `period_payment`, `date_payment`, `money_payment`) VALUES
(1, '1', 'เงินโอน', '1', '2024-01-31', '1000'),
(2, '1', 'เงินโอน', '2', '2024-01-30', '1500'),
(3, '2', 'เงินโอน', '1', '2024-01-31', '5000'),
(4, '3', 'เช็ค', '1', '2023-11-30', '277570.09'),
(5, '3', 'เช็ค', '2', '2024-05-10', '508878.50'),
(6, '3', 'เช็ค', '3', '2024-07-10', '138785.05'),
(7, '4', 'เช็ค', '1', '2024-01-02', '900000'),
(8, '4', 'เช็ค', '2', '2024-03-12', '120000'),
(9, '4', 'เช็ค', '3', '2024-07-16', '50000'),
(10, 'TH50600', 'เงินโอน', '1', '2024-01-31', '1000'),
(11, 'TH50600', 'เงินโอน', '2', '2024-02-10', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Project_code` varchar(20) NOT NULL COMMENT 'รหัสโครงการ',
  `Name_Project` varchar(255) NOT NULL COMMENT 'ชื่อโครงการ',
  `Date` date NOT NULL COMMENT 'วันเดือนปี',
  `Address` varchar(60) NOT NULL COMMENT 'ที่อยู่โครงการ',
  `Salesperson_Code` varchar(10) NOT NULL COMMENT 'รหัสพนักงานขาย\r\n',
  `Status_Project` varchar(1) NOT NULL COMMENT 'สถานะของโครงการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_code`, `Name_Project`, `Date`, `Address`, `Salesperson_Code`, `Status_Project`) VALUES
('1', 'โครงการที่ 1', '2024-01-20', '1', '61004', '1'),
('2', 'โครงการที่ 2', '2024-01-20', '2', '61004', '1'),
('3', 'SOM-O', '2024-01-20', 'กรุงเทพมหานคร', '61004', '1'),
('4', 'Little Edo BKK', '2024-01-20', 'เขต บึงกุ่ม จังหวัดกรุงเทพมหานคร', '61004', '1'),
('TH50600', 'โครงการที่ TH50600', '2024-01-29', '8', '61004', '1');

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE `salesperson` (
  `Salesperson_Code` varchar(10) NOT NULL COMMENT 'รหัสพนักงานขาย',
  `Salesperson_Name` varchar(200) NOT NULL COMMENT 'ชื่อพนักงานขาย',
  `Telephone_Number` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `Salesperson_position` varchar(20) NOT NULL COMMENT 'ตำแหน่งพนักงานขาย',
  `Salesperson_status` varchar(1) NOT NULL COMMENT 'สถานะการคงอยู่ของพนักงานขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`Salesperson_Code`, `Salesperson_Name`, `Telephone_Number`, `Salesperson_position`, `Salesperson_status`) VALUES
('61001', 'ทดสอบ ทดสอบ', '0819849707', 'admin_sale', '0'),
('61002', 'สินเชื่อ สินเชื่อ ', '0742822100', 'ฝ่ายสินเชื่อ', '1'),
('61003', 'ติดตั้ง ติดตั้ง', '0234567891', 'ฝ่ายติดตั้ง', '1'),
('61004', 'admin admin', '0123456789', 'admin_sale', '1');

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
-- Indexes for table `payment_information`
--
ALTER TABLE `payment_information`
  ADD PRIMARY KEY (`Payment_code`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_code`);

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
  MODIFY `Customer_ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลูกค้า', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `installation_work`
--
ALTER TABLE `installation_work`
  MODIFY `Installation_code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการตรวจสอบและ\r\nการรับงานติดตั้ง\r\n', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_information`
--
ALTER TABLE `payment_information`
  MODIFY `Payment_code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการชำระเงิน', AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract_register`
--
ALTER TABLE `contract_register`
  ADD CONSTRAINT `fk_cus_contract` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
