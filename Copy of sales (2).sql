-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2022 at 09:20 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `addqs`
--

CREATE TABLE IF NOT EXISTS `addqs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) NOT NULL,
  `ADD_Q` int(50) NOT NULL,
  `DATES` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `addqs`
--

INSERT INTO `addqs` (`ID`, `NAME`, `ADD_Q`, `DATES`) VALUES
(1, 'Malarone', 33, '2022-08-14'),
(2, 'Amala', 20, '2022-08-14'),
(3, 'Ibrofen', 14, '2022-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CNAME` varchar(50) NOT NULL,
  PRIMARY KEY (`CATEGORY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CNAME`) VALUES
(1, 'Drugs'),
(2, 'Other Products');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CUST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  PRIMARY KEY (`CUST_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`, `EMAIL`) VALUES
(2, 'Adebisi', 'Mary', '08034210923', 'stella@gmail.com'),
(3, 'Ogunlana', 'Bola', '09076456732', 'ogunlana@gmail.com'),
(4, 'Adebisi', 'Tolani', '09045656554', 'tolani@gmail.com'),
(5, 'James', 'Ola', '08032451234', 'jola@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cust_id`
--

CREATE TABLE IF NOT EXISTS `cust_id` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CID` varchar(200) NOT NULL,
  `DATESS` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `cust_id`
--

INSERT INTO `cust_id` (`ID`, `CID`, `DATESS`) VALUES
(16, 'A69613', '2022-08-27'),
(17, 'A58214', '2022-08-27'),
(18, 'A19681', '2022-08-27'),
(19, 'A84274', '2022-08-27'),
(20, 'A6377', '2022-08-27'),
(21, 'A93332', '2022-08-28'),
(22, 'A15407', '2022-08-28'),
(23, 'A39934', '2022-08-28'),
(24, 'A75079', '2022-08-28'),
(25, 'A15620', '2022-08-28'),
(26, 'A93350', '2022-08-28'),
(27, 'A64000', '2022-08-28'),
(28, 'A59882', '2022-08-28'),
(29, 'A83896', '2022-08-28'),
(30, 'A8877', '2022-08-28'),
(31, 'A7587', '2022-08-28'),
(32, 'A17224', '2022-08-28'),
(33, 'A32812', '2022-08-28'),
(34, 'A92067', '2022-08-29'),
(35, 'A82640', '2022-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `GENDER` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL,
  `JOB_ID` int(11) NOT NULL,
  `HIRED_DATE` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  PRIMARY KEY (`EMPLOYEE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `PHONE_NUMBER`, `JOB_ID`, `HIRED_DATE`, `LOCATION_ID`) VALUES
(1, 'Seadad', 'Lite', 'Male', 'seadad@gmail.com', '09056070710', 1, '2022-08-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE IF NOT EXISTS `expenditure` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMES` varchar(200) NOT NULL,
  `PRICE` int(200) NOT NULL,
  `DATES` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`ID`, `NAMES`, `PRICE`, `DATES`) VALUES
(1, 'Electricity', 500, '2022-08-25'),
(2, 'Transport', 300, '2022-08-25'),
(3, 'Electricity', 500, '2022-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROVINCE` varchar(100) NOT NULL,
  `CITY` varchar(100) NOT NULL,
  PRIMARY KEY (`LOCATION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `PROVINCE`, `CITY`) VALUES
(1, 'Ijebu Ife', 'Ogun'),
(2, 'Ogun State', 'Ijebu - Ife'),
(3, 'Aklan', 'Ibajay'),
(4, 'Ogun', 'Ijebu-East');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`FIRST_NAME`, `LAST_NAME`, `LOCATION_ID`, `EMAIL`, `PHONE_NUMBER`) VALUES
('Binoculars', 'Lite', 1, 'PC@00', '2147483647');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRODUCT_CODE` varchar(20) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(250) NOT NULL,
  `QTY_STOCK` int(50) NOT NULL,
  `ON_HAND` int(250) NOT NULL,
  `PRICE` int(50) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `SUPPLIER_ID` int(11) NOT NULL,
  `DATE_STOCK_IN` varchar(50) NOT NULL,
  PRIMARY KEY (`PRODUCT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCT_CODE`, `NAME`, `DESCRIPTION`, `QTY_STOCK`, `ON_HAND`, `PRICE`, `CATEGORY_ID`, `SUPPLIER_ID`, `DATE_STOCK_IN`) VALUES
(3, '846369', 'Yeast', 'For eye infection', 33, 300, 250, 1, 1, '2022-07-30'),
(4, '163146', 'Vitamin C', 'For vitamic ', 55, 200, 150, 1, 1, '2022-08-05'),
(5, '168615', 'Ibrofen', 'For pain relief', 49, 400, 300, 1, 1, '2022-08-05'),
(6, '232725', 'Paracetamol', 'For Headache and pain', 10, 150, 100, 1, 1, '2022-08-09'),
(46, '219462', 'Amala', 'For malaria and fever', 28, 500, 400, 1, 1, '2022-08-09'),
(47, '388893', 'Malarone', 'A drug to prevent malaria', 87, 300, 200, 1, 1, '2022-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `sale_entry`
--

CREATE TABLE IF NOT EXISTS `sale_entry` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) NOT NULL,
  `QUANTITY` int(50) NOT NULL,
  `PRICE` int(50) NOT NULL,
  `PROFIT` int(50) NOT NULL,
  `OPENING_STOCK` int(50) NOT NULL,
  `RQUANTITY` int(50) NOT NULL,
  `NET_INCOME` int(100) NOT NULL,
  `NET_PROFIT` int(100) NOT NULL,
  `SALE_DATE` date NOT NULL,
  `CID` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `sale_entry`
--

INSERT INTO `sale_entry` (`ID`, `NAME`, `QUANTITY`, `PRICE`, `PROFIT`, `OPENING_STOCK`, `RQUANTITY`, `NET_INCOME`, `NET_PROFIT`, `SALE_DATE`, `CID`) VALUES
(36, 'Amala', 2, 1000, 200, 40, 38, 1000, 200, '2022-08-07', 'A69613'),
(37, 'Vitamin C', 2, 400, 100, 67, 65, 1400, 300, '2022-08-07', 'A69613'),
(38, 'Paracetamol', 1, 200, 100, 20, 19, 1600, 400, '2022-08-07', 'A58214'),
(39, 'Malarone', 1, 250, 50, 94, 93, 1850, 450, '2022-08-07', 'A58214'),
(40, 'Paracetamol', 2, 400, 200, 19, 17, 2250, 650, '2022-08-10', 'A19681'),
(41, 'Amala', 1, 500, 100, 38, 37, 2750, 750, '2022-08-10', 'A84274'),
(42, 'Yeast', 2, 600, 100, 42, 40, 3350, 850, '2022-08-14', 'A6377'),
(43, 'Malarone', 2, 500, 100, 93, 91, 3850, 950, '2022-08-14', 'A6377'),
(44, 'Paracetamol', 2, 400, 200, 17, 15, 4250, 1150, '2022-08-20', 'A93332'),
(45, 'Amala', 1, 500, 100, 37, 36, 4750, 1250, '2022-08-20', 'A93332'),
(46, 'Yeast', 3, 900, 150, 40, 37, 5650, 1400, '2022-08-20', 'A15407'),
(47, 'Malarone', 1, 250, 50, 91, 90, 5900, 1450, '2022-08-20', 'A15407'),
(48, 'Vitamin C', 1, 250, 100, 65, 64, 6150, 1550, '2022-08-20', 'A39934'),
(49, 'Vitamin C', 2, 500, 200, 64, 62, 6650, 1750, '2022-08-23', 'A75079'),
(50, 'Malarone', 2, 500, 100, 90, 88, 7150, 1850, '2022-08-23', 'A15620'),
(51, 'Amala', 1, 500, 100, 36, 35, 7650, 1950, '2022-08-25', 'A93350'),
(52, 'Ibrofen', 1, 400, 100, 50, 49, 8050, 2050, '2022-08-25', 'A64000'),
(53, 'Malarone', 1, 250, 50, 88, 87, 8300, 2100, '2022-08-25', 'A64000'),
(54, 'Yeast', 3, 900, 150, 37, 34, 9200, 2250, '2022-08-28', 'A59882'),
(55, 'Paracetamol', 3, 600, 300, 15, 12, 9800, 2550, '2022-08-28', 'A83896'),
(56, 'Amala', 2, 1000, 200, 35, 33, 10800, 2750, '2022-08-28', 'A8877'),
(57, 'Vitamin C', 2, 400, 100, 62, 60, 11200, 2850, '2022-08-28', 'A7587'),
(58, 'Amala', 2, 1000, 200, 33, 31, 12200, 3050, '2022-08-28', 'A7587'),
(59, 'Vitamin C', 2, 500, 200, 60, 58, 12700, 3250, '2022-08-28', 'A7587'),
(60, 'Paracetamol', 2, 400, 200, 12, 10, 13100, 3450, '2022-08-28', 'A17224'),
(61, 'Vitamin C', 3, 750, 300, 58, 55, 13850, 3750, '2022-08-28', 'A17224'),
(62, 'Amala', 1, 500, 100, 31, 30, 14350, 3850, '2022-08-28', 'A32812'),
(63, 'Yeast', 1, 250, 0, 34, 33, 14600, 3850, '2022-08-29', 'A92067'),
(64, 'Amala', 2, 1000, 200, 30, 28, 15600, 4050, '2022-08-29', 'A92067');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COMPANY_NAME` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL,
  PRIMARY KEY (`SUPPLIER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SUPPLIER_ID`, `COMPANY_NAME`, `LOCATION_ID`, `PHONE_NUMBER`) VALUES
(1, 'Seadad ', 2, '07034567840'),
(2, 'Green Drug', 4, '09056070710');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `TRANS_ID` int(50) NOT NULL AUTO_INCREMENT,
  `CUST_ID` int(11) NOT NULL,
  `NUMOFITEMS` varchar(250) NOT NULL,
  `SUBTOTAL` varchar(50) NOT NULL,
  `LESSVAT` varchar(50) NOT NULL,
  `NETVAT` varchar(50) NOT NULL,
  `ADDVAT` varchar(50) NOT NULL,
  `GRANDTOTAL` varchar(250) NOT NULL,
  `CASH` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  PRIMARY KEY (`TRANS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCTS` varchar(250) NOT NULL,
  `QTY` varchar(250) NOT NULL,
  `PRICE` varchar(250) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TYPE_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `TYPE_ID` (`TYPE_ID`),
  KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMPLOYEE_ID`, `USERNAME`, `PASSWORD`, `TYPE_ID`) VALUES
(1, 1, 'Seadad', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(10, 1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
