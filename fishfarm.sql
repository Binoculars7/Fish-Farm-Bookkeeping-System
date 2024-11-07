-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 09:25 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fishfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `addqs`
--

CREATE TABLE `addqs` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `ADD_Q` int(50) NOT NULL,
  `DATES` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addqs`
--

INSERT INTO `addqs` (`ID`, `NAME`, `ADD_Q`, `DATES`) VALUES
(6, 'Omega', 2, '2024-08-28'),
(7, 'Blue Crown', 2, '2024-08-28'),
(8, 'Omega', 6, '2024-08-28'),
(9, 'Blue Crown', 5, '2024-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `cashier_confirmation`
--

CREATE TABLE `cashier_confirmation` (
  `ID` int(11) NOT NULL,
  `CID` varchar(255) NOT NULL,
  `AMOUNT` int(255) NOT NULL,
  `QUANTITY` int(255) NOT NULL,
  `DATE_CONFIRMED` date NOT NULL DEFAULT current_timestamp(),
  `MODE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier_confirmation`
--

INSERT INTO `cashier_confirmation` (`ID`, `CID`, `AMOUNT`, `QUANTITY`, `DATE_CONFIRMED`, `MODE`) VALUES
(3, 'A15407', 1150, 4, '2024-07-10', 'Bank'),
(4, 'A15620', 500, 2, '2024-07-10', 'Cash'),
(5, 'A19681', 400, 2, '2024-07-10', 'Cash'),
(6, 'A39934', 250, 1, '2024-07-10', 'Bank'),
(7, 'A32812', 500, 1, '2024-07-10', 'Cash'),
(8, 'Q93305', 950, 4, '2024-07-13', 'Bank'),
(9, 'X14182', 400, 1, '2024-07-13', 'Bank'),
(10, 'X83352', 1100, 4, '2024-07-15', 'Cash'),
(11, 'D72467', 1200, 4, '2024-07-15', 'Cash'),
(12, 'A59882', 900, 3, '2024-07-16', 'Bank'),
(13, 'A35258', 600, 1, '2024-07-16', 'Bank'),
(14, 'P37311', 1400, 4, '2024-07-22', 'Bank'),
(15, 'I15855', 1600, 3, '2024-08-16', 'Bank'),
(16, 'G77215', 750, 3, '2024-08-19', 'Cash'),
(17, 'C91817', 1000, 3, '2024-08-19', 'Cash'),
(18, 'A56499', 2000, 4, '2024-08-19', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CNAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `customer` (
  `CUST_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`, `EMAIL`) VALUES
(3, 'Ogunlana', 'Bola', '09076456732', 'ogunlana@gmail.com'),
(4, 'Adebisi', 'Tolani', '09045656554', 'tolani@gmail.com'),
(5, 'James', 'Ola', '08032451234', 'jola@gmail.com'),
(6, 'Holar ', 'Jacob', '09045020230', 'holarjacob@gmail.com'),
(7, 'Bola', 'Ogunde', '0905480710', 'bola@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cust_id`
--

CREATE TABLE `cust_id` (
  `ID` int(11) NOT NULL,
  `CID` varchar(200) NOT NULL,
  `DATESS` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(35, 'A82640', '2022-08-29'),
(36, 'A35258', '2024-06-29'),
(37, 'A10403', '2024-07-01'),
(38, 'A94857', '2024-07-01'),
(39, 'A70169', '2024-07-03'),
(40, 'A9119', '2024-07-03'),
(41, 'A89883', '2024-07-04'),
(42, 'A7448', '2024-07-05'),
(43, 'A23041', '2024-07-10'),
(44, 'A90637', '2024-07-11'),
(45, 'A3018', '2024-07-13'),
(46, 'C45162', '2024-07-13'),
(47, 'Q93305', '2024-07-13'),
(48, 'Z39095', '2024-07-13'),
(49, 'Y37618', '2024-07-13'),
(50, 'X14182', '2024-07-13'),
(51, 'V45495', '2024-07-13'),
(52, 'O67097', '2024-07-13'),
(53, 'U9091', '2024-07-13'),
(54, 'R57718', '2024-07-13'),
(55, 'M31719', '2024-07-13'),
(56, 'S28057', '2024-07-13'),
(57, 'L51659', '2024-07-13'),
(58, 'P78995', '2024-07-13'),
(59, 'L74943', '2024-07-13'),
(60, 'C5474', '2024-07-13'),
(61, 'B50160', '2024-07-13'),
(62, 'B41024', '2024-07-13'),
(63, 'I58162', '2024-07-13'),
(64, 'B71838', '2024-07-13'),
(65, 'B59043', '2024-07-13'),
(66, 'V42807', '2024-07-13'),
(67, 'B81952', '2024-07-13'),
(68, 'X83352', '2024-07-15'),
(69, 'D72467', '2024-07-15'),
(70, 'C86307', '2024-07-17'),
(71, 'Z21216', '2024-07-17'),
(72, 'Y47504', '2024-07-17'),
(73, 'Y5962', '2024-07-17'),
(74, 'T65278', '2024-07-17'),
(75, 'C52972', '2024-07-17'),
(76, 'Y61010', '2024-07-17'),
(77, 'B62988', '2024-07-17'),
(78, 'E73793', '2024-07-18'),
(79, 'L33516', '2024-07-18'),
(80, 'Z78698', '2024-07-18'),
(81, 'P37311', '2024-07-22'),
(82, 'X74728', '2024-07-22'),
(83, 'I15855', '2024-08-16'),
(84, 'G77215', '2024-08-19'),
(85, 'C91817', '2024-08-19'),
(86, 'A56499', '2024-08-19'),
(87, 'A87458', '2024-08-28'),
(88, 'A94825', '2024-08-29'),
(89, 'A29191', '2024-09-02'),
(90, 'A30062', '2024-09-03'),
(91, 'A93205', '2024-09-04'),
(92, 'A70305', '2024-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `death`
--

CREATE TABLE `death` (
  `ID` int(11) NOT NULL,
  `FTYPE` text NOT NULL,
  `FSIZE` text NOT NULL,
  `PTYPE` text NOT NULL,
  `NDEATH` text NOT NULL,
  `CDEATH` text NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `death`
--

INSERT INTO `death` (`ID`, `FTYPE`, `FSIZE`, `PTYPE`, `NDEATH`, `CDEATH`, `DATE`) VALUES
(1, 'Catfish', 'Large', 'Pond A', '27', 'Malnutrition', '2024-08-24'),
(3, 'Star Fish', 'Large', 'Pond A', '90', 'Malnutrition', '2024-08-25'),
(5, 'Catfish', 'Small', 'Pond A', '58', 'Malnutrition', '2024-08-25'),
(6, 'Tilapia', 'Large', 'Pond A', '2', 'Oil spillage', '2024-08-25'),
(7, 'Tilapia', 'Small', 'Pond B', '28', 'Oil spillage', '2024-08-25'),
(8, 'Star Fish', 'Small', 'Pond A', '45', 'Very clean water', '2024-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `GENDER` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL,
  `JOB_ID` int(11) NOT NULL,
  `HIRED_DATE` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `PHONE_NUMBER`, `JOB_ID`, `HIRED_DATE`, `LOCATION_ID`) VALUES
(1, 'Sunday', 'Emmanuel', 'Male', 'seadad@gmail.com', '09056070710', 1, '2022-08-05', 1),
(2, 'Olawale', 'John', 'Male', 'john@gmail.com', '09045020210', 3, '2024-07-03', 5),
(3, 'Adekunle', 'Mary', 'Female', 'mary@gmail.com', '09045020230', 2, '2024-07-03', 6);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `ID` int(11) NOT NULL,
  `NAMES` varchar(200) NOT NULL,
  `PRICE` int(200) NOT NULL,
  `DATES` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`ID`, `NAMES`, `PRICE`, `DATES`) VALUES
(5, 'Omega Feed', 30000, '2024-08-24'),
(6, 'Eco Float', 3000, '2024-08-24'),
(7, 'Blue Crown Feed', 5000, '2024-08-24'),
(8, 'Transportation', 3500, '2024-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `feedlist`
--

CREATE TABLE `feedlist` (
  `ID` int(11) NOT NULL,
  `FNAME` text NOT NULL,
  `FDESC` text NOT NULL,
  `FBAG` text NOT NULL,
  `DATES` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedlist`
--

INSERT INTO `feedlist` (`ID`, `FNAME`, `FDESC`, `FBAG`, `DATES`) VALUES
(1, 'Omega', 'Initial feed for fish', '42', '2024-08-25'),
(2, 'Eco Float', 'middle feed', '23', '2024-08-25'),
(3, 'Blue Crown', 'Semi middle feed', '52', '2024-08-25'),
(4, 'Coppens', 'Under feed', '12', '2024-08-25'),
(5, 'Skretting', 'Begin with this', '34', '2024-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `ffeeds`
--

CREATE TABLE `ffeeds` (
  `ID` int(11) NOT NULL,
  `FNAME` text NOT NULL,
  `FFIN` text NOT NULL,
  `DATES` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ffeeds`
--

INSERT INTO `ffeeds` (`ID`, `FNAME`, `FFIN`, `DATES`) VALUES
(1, 'Blue Crown', '2', '2024-08-25'),
(3, 'Skretting', '2', '2024-08-25'),
(4, 'Eco Float', '4', '2024-08-25'),
(5, 'Blue Crown', '5', '2024-08-27'),
(6, 'Omega', '3', '2024-08-28'),
(7, 'Omega', '15', '2024-08-28'),
(8, 'Blue Crown', '2', '2024-08-29'),
(9, 'Blue Crown', '2', '2024-09-06'),
(10, 'Blue Crown', '1', '2024-09-06'),
(11, 'Skretting', '1', '2024-09-06'),
(12, 'Coppens', '0', '2024-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `fishcat`
--

CREATE TABLE `fishcat` (
  `ID` int(11) NOT NULL,
  `FSIZE` text NOT NULL,
  `FTYPE` text NOT NULL,
  `PTYPE` text NOT NULL,
  `NFISH` int(11) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fishcat`
--

INSERT INTO `fishcat` (`ID`, `FSIZE`, `FTYPE`, `PTYPE`, `NFISH`, `DATE`) VALUES
(2, 'Medium', 'Star Fish', 'Pond A', 11, '2024-08-24'),
(3, 'Large', 'Catfish', 'Pond A', 11, '2024-08-24'),
(4, 'Medium', 'Tilapia', 'Pond B', 11, '2024-08-24'),
(5, 'Medium', 'Catfish', 'Pond A', 2, '2024-08-25'),
(6, 'Large', 'Catfish', 'Pond B', 2, '2024-08-26'),
(7, 'Large', 'Tilapia', 'Pond B', 23, '2024-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `fishsize`
--

CREATE TABLE `fishsize` (
  `ID` int(11) NOT NULL,
  `NAMES` text NOT NULL,
  `DATES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fishsize`
--

INSERT INTO `fishsize` (`ID`, `NAMES`, `DATES`) VALUES
(4, 'Fingerlings', '2024-09-08'),
(5, 'Post Fingerlings', '2024-09-08'),
(6, 'Juvenile', '2024-09-08'),
(7, 'Post Juvenile', '2024-09-08'),
(8, 'Jumbo', '2024-09-08'),
(9, 'Post Jumbo', '2024-09-08'),
(10, 'Big', '2024-09-08'),
(11, 'Medium', '2024-09-08'),
(12, 'Small', '2024-09-08'),
(13, 'Smallest', '2024-09-08'),
(14, 'Standard Tiny', '2024-09-08'),
(15, 'Tiny', '2024-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `froutine`
--

CREATE TABLE `froutine` (
  `ID` int(11) NOT NULL,
  `FNAME` text NOT NULL,
  `FPERIOD` text NOT NULL,
  `DATES` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `froutine`
--

INSERT INTO `froutine` (`ID`, `FNAME`, `FPERIOD`, `DATES`) VALUES
(2, 'Adekunle Mary', 'Night', '2024-08-25'),
(3, 'Olawale John', 'Morning', '2024-08-25'),
(4, 'Adekunle Mary', 'Afternoon', '2024-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `ID` int(11) NOT NULL,
  `NAMES` varchar(200) NOT NULL,
  `DATES` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`ID`, `NAMES`, `DATES`) VALUES
(2, 'Star Fish', '2023-10-14'),
(8, 'Tilapia', '2023-10-19'),
(9, 'Catfish', '2023-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Manager'),
(2, 'Sales Person'),
(3, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LOCATION_ID` int(11) NOT NULL,
  `PROVINCE` varchar(100) NOT NULL,
  `CITY` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `PROVINCE`, `CITY`) VALUES
(1, 'Ijebu Ife', 'Ogun'),
(2, 'Ogun State', 'Ijebu - Ife'),
(3, 'Aklan', 'Ibajay'),
(4, 'Ogun', 'Ijebu-East'),
(5, 'Ogun', 'Ijebu-East'),
(6, 'Lagos', 'Badagry');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
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
-- Table structure for table `pondtype`
--

CREATE TABLE `pondtype` (
  `ID` int(11) NOT NULL,
  `NAMES` text NOT NULL,
  `DATES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pondtype`
--

INSERT INTO `pondtype` (`ID`, `NAMES`, `DATES`) VALUES
(1, 'Pond 1', '2024-08-23'),
(2, 'Pond 2', '2024-08-23'),
(3, 'Pond 3', '2024-08-23'),
(6, 'Pond 4', '2024-08-26'),
(7, 'Pond 5', '2024-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_CODE` varchar(20) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(250) NOT NULL,
  `QTY_STOCK` int(50) NOT NULL,
  `ON_HAND` int(250) NOT NULL,
  `PRICE` int(50) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `SUPPLIER_ID` int(11) NOT NULL,
  `DATE_STOCK_IN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCT_CODE`, `NAME`, `DESCRIPTION`, `QTY_STOCK`, `ON_HAND`, `PRICE`, `CATEGORY_ID`, `SUPPLIER_ID`, `DATE_STOCK_IN`) VALUES
(3, '846369', 'Yeast', 'For eye infection', 37, 300, 250, 1, 1, '2022-07-30'),
(4, '163146', 'Vitamin C', 'For vitamic ', 42, 300, 200, 1, 1, '2022-08-05'),
(5, '168615', 'Ibrofen', 'For pain relief', 33, 400, 300, 1, 1, '2022-08-05'),
(6, '232725', 'Paracetamol', 'For Headache and pain', 0, 150, 100, 1, 1, '2022-08-09'),
(46, '219462', 'Amala', 'For malaria and fever', 15, 600, 400, 1, 1, '2022-08-09'),
(47, '388893', 'Malarone', 'A drug to prevent malaria', 74, 300, 200, 1, 1, '2022-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_table`
--

CREATE TABLE `purchase_table` (
  `ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `QUANTITY` text NOT NULL,
  `SALE_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_table`
--

INSERT INTO `purchase_table` (`ID`, `NAME`, `QUANTITY`, `SALE_DATE`) VALUES
(1, '[Star Fish (Medium)]', '[2]', '0000-00-00'),
(2, 'Catfish (Medium)', '3', '2024-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `sale_entry`
--

CREATE TABLE `sale_entry` (
  `ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `QUANTITY` text NOT NULL,
  `PRICE` text NOT NULL,
  `PROFIT` text NOT NULL,
  `OPENING_STOCK` text NOT NULL,
  `RQUANTITY` text NOT NULL,
  `NET_INCOME` text NOT NULL,
  `NET_PROFIT` text NOT NULL,
  `SALE_DATE` date NOT NULL,
  `CID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_entry`
--

INSERT INTO `sale_entry` (`ID`, `NAME`, `QUANTITY`, `PRICE`, `PROFIT`, `OPENING_STOCK`, `RQUANTITY`, `NET_INCOME`, `NET_PROFIT`, `SALE_DATE`, `CID`) VALUES
(122, 'Tilapia (Medium)', '2', '3000', '6000', '0', '0', '6000', '6000', '2024-08-29', 'A94825'),
(123, 'Catfish (Large)', '3', '1500', '4500', '0', '0', '4500', '4500', '2024-08-29', 'A94825'),
(124, 'Catfish (Large)', '5', '10000', '50000', '0', '0', '50000', '50000', '2024-09-02', 'A29191'),
(125, 'Catfish (Large)', '25', '200', '5000', '0', '0', '5000', '5000', '2024-09-03', 'A30062'),
(126, 'Catfish (Medium)', '20', '1000', '20000', '0', '0', '20000', '20000', '2024-09-04', 'A93205'),
(127, 'Catfish (Large)', '2', '6000', '6000', '0', '0', '6000', '6000', '2024-09-05', 'A70305');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SUPPLIER_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `transaction` (
  `TRANS_ID` int(50) NOT NULL,
  `CUST_ID` int(11) NOT NULL,
  `NUMOFITEMS` varchar(250) NOT NULL,
  `SUBTOTAL` varchar(50) NOT NULL,
  `LESSVAT` varchar(50) NOT NULL,
  `NETVAT` varchar(50) NOT NULL,
  `ADDVAT` varchar(50) NOT NULL,
  `GRANDTOTAL` varchar(250) NOT NULL,
  `CASH` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `ID` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCTS` varchar(250) NOT NULL,
  `QTY` varchar(250) NOT NULL,
  `PRICE` varchar(250) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
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

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TYPE_ID` int(11) DEFAULT NULL,
  `PRIVILEGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMPLOYEE_ID`, `USERNAME`, `PASSWORD`, `TYPE_ID`, `PRIVILEGE`) VALUES
(1, 1, 'Sunday', '8cb2237d0679ca88db6464eac60da96345513964', 1, 'all'),
(13, 2, 'John30', '8cb2237d0679ca88db6464eac60da96345513964', 2, 'cashier'),
(14, 3, 'King', '8cb2237d0679ca88db6464eac60da96345513964', 2, 'sale');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addqs`
--
ALTER TABLE `addqs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cashier_confirmation`
--
ALTER TABLE `cashier_confirmation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Indexes for table `cust_id`
--
ALTER TABLE `cust_id`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `death`
--
ALTER TABLE `death`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedlist`
--
ALTER TABLE `feedlist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ffeeds`
--
ALTER TABLE `ffeeds`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fishcat`
--
ALTER TABLE `fishcat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fishsize`
--
ALTER TABLE `fishsize`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `froutine`
--
ALTER TABLE `froutine`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `pondtype`
--
ALTER TABLE `pondtype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Indexes for table `purchase_table`
--
ALTER TABLE `purchase_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sale_entry`
--
ALTER TABLE `sale_entry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUPPLIER_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANS_ID`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TYPE_ID` (`TYPE_ID`),
  ADD KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addqs`
--
ALTER TABLE `addqs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cashier_confirmation`
--
ALTER TABLE `cashier_confirmation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cust_id`
--
ALTER TABLE `cust_id`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `death`
--
ALTER TABLE `death`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedlist`
--
ALTER TABLE `feedlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ffeeds`
--
ALTER TABLE `ffeeds`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fishcat`
--
ALTER TABLE `fishcat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fishsize`
--
ALTER TABLE `fishsize`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `froutine`
--
ALTER TABLE `froutine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pondtype`
--
ALTER TABLE `pondtype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `purchase_table`
--
ALTER TABLE `purchase_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_entry`
--
ALTER TABLE `sale_entry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANS_ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
