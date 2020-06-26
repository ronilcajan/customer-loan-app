-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2020 at 03:01 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claims-loan-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `account_no` int(8) DEFAULT NULL,
  `purok_no` int(8) DEFAULT NULL,
  `barangay` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `country` varchar(20) NOT NULL DEFAULT 'Philippines',
  `postal_code` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`account_no`, `purok_no`, `barangay`, `city`, `province`, `country`, `postal_code`) VALUES
(10000, 2, 'Looc Proper', 'Plaridel', 'Misamis Occidental', 'Philippines', 7209),
(10001, 3, 'dsfdsfds', 'wqwqw', 'ew', 'Philippines', 2323),
(10002, 3, 'Looc Proper', 'Plaridel', 'Misamis Occidental', 'Philippines', 7209);

-- --------------------------------------------------------

--
-- Table structure for table `approved_loans`
--

CREATE TABLE `approved_loans` (
  `loan_no` varchar(20) DEFAULT NULL,
  `date_approved` date DEFAULT NULL,
  `loan_started` date DEFAULT NULL,
  `daily_payment` decimal(8,2) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approved_loans`
--

INSERT INTO `approved_loans` (`loan_no`, `date_approved`, `loan_started`, `daily_payment`, `due_date`, `status`) VALUES
('L1000', '2020-02-02', '2020-02-02', '2000.00', '2020-04-02', 'Paid'),
('L1001', '2020-02-02', '2020-02-12', '40.00', '2020-04-12', 'Paid'),
('L1002', '2020-02-02', '2020-02-12', '64.86', '2020-04-12', 'new'),
('L1003', '2020-02-17', '2020-02-17', '80.00', '2020-04-17', 'new'),
('L1004', '2020-03-03', '2020-03-03', '40.00', '2020-05-02', 'new'),
('L1005', '2020-03-03', '2020-03-03', '40.00', '2020-05-02', 'new'),
('L1006', '2020-06-13', NULL, '180.00', NULL, 'new'),
('L1021', '2020-06-13', NULL, '44.44', NULL, 'new'),
('L1017', '2020-06-13', NULL, '8.88', NULL, 'new'),
('L1024', '2020-06-13', NULL, '42.64', NULL, 'new'),
('L1026', '2020-06-13', NULL, '4.00', NULL, 'new'),
('L1022', '2020-06-13', NULL, '6.66', NULL, 'new'),
('L1019', '2020-06-13', NULL, '44.44', NULL, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `account_no` int(8) NOT NULL,
  `profile_img` varchar(40) NOT NULL DEFAULT 'person.png',
  `email` varchar(30) DEFAULT NULL,
  `number1` varchar(20) DEFAULT NULL,
  `number2` varchar(20) DEFAULT NULL,
  `birthdate` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `added_info` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`account_no`, `profile_img`, `email`, `number1`, `number2`, `birthdate`, `gender`, `added_info`, `status`) VALUES
(10000, '', 'cajanr02@gmail.com', '093213213', '092132132132', '2020-01-08', 'Male', 'He needs money', 'Verified'),
(10001, '', 'caja', '0918711266', '09187112668', '2020-01-21', 'Male', '', 'Verified'),
(10002, '', 'cajanr02@gmail.com', '09197112668', '09197112668', '2020-02-18', 'Male', '', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `co_maker`
--

CREATE TABLE `co_maker` (
  `co_maker_no` int(8) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `cedula_no` varchar(30) DEFAULT NULL,
  `date_issued` varchar(30) DEFAULT NULL,
  `address_issued` varchar(30) DEFAULT NULL,
  `loan_no` varchar(20) DEFAULT NULL,
  `account_no` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co_maker`
--

INSERT INTO `co_maker` (`co_maker_no`, `name`, `cedula_no`, `date_issued`, `address_issued`, `loan_no`, `account_no`) VALUES
(381, 'dsadas', 'One', '2020-02-21', 'fdsfdsfds', 'L1000', 10001),
(382, 'John', 'DASDSAD', '2020-02-29', 'fdsfdsfds', 'L1001', 10000),
(383, 'John', 'One', '2020-02-08', 'dasdsad', 'L1002', 10001),
(384, 'sdf', 'dsfdsf', '2020-02-18', 'fdsfdsf', 'L1003', 10002),
(385, 'Ron', '02932', '2020-03-17', '2121sadsadas', 'L1004', 10000),
(386, 'dasd', 'dasd', '2020-03-17', 'dasdsad', 'L1005', 10002),
(390, 'vcxv', 'dsfd', '2020-06-19', 'fdsfdsfds', 'L1006', 10002),
(391, 'fdsfds', 'fdsfd', '2020-06-26', 'fdsfd', 'L1007', 10002),
(392, 'fdsfdsf', 'fsdfdsfdsf', '2020-06-25', 'asdsdsa', 'L1008', 10002),
(393, 'fdsf', 'fsdf', '2020-06-25', 'dasdsad', 'L1009', 10002),
(394, 'fsdfds', 'fdsf', '2020-06-25', 'dasdsad', 'L1010', 10002),
(395, 'dfd', 'fds', '2020-06-20', 'fdsfds', 'L1011', 10000),
(396, 'fsd', 'fsd', '2020-06-12', 'fdsfdsfds', 'L1012', 10000),
(397, 'wqw', 'sdsd', '2020-06-20', 'fdsfdsfds', 'L1013', 10000),
(398, '4545', '445', '2020-06-20', 'sdfsdfds', 'L1014', 10000),
(399, 'dsd', 'ds', '2020-06-27', 'sasa', 'L1015', 10000),
(400, 'dasd', 'fsdfdsfdsf', '2020-06-25', 'dfdsfdsfdsf', 'L1016', 10000),
(401, 'dsad', 'DASDSAD', '2020-06-19', 'dsadasd', 'L1017', 10000),
(402, 'sdsad', 'dsa', '2020-06-27', 'dfdsfdsfdsf', 'L1018', 10000),
(403, 'fdf', 'One', '2020-06-20', 'DASDADASD', 'L1019', 10000),
(404, 'fsdf', 'fsdf', '2020-06-20', 'sdfdsf', 'L1020', 10000),
(405, 'dsd', 'dsds', '2020-06-20', 'dsds', 'L1021', 10001),
(406, 'fd', 'fd', '2020-06-20', 'dsd', 'L1022', 10001),
(407, 'cxcx', 'cxc', '2020-06-20', 'dasdasdsa', 'L1023', 10001),
(408, 'John', 'fsdfdsfdsf', '2020-06-06', 'fdsfdsfds', 'L1024', 10001),
(409, 'vc', 'vc', '2020-06-27', 'xcvcx', 'L1025', 10001),
(410, 'John', 'One', '2020-06-27', 'fdsfdsfds', 'L1026', 10001),
(411, 'dsadas', 'DASDSAD', '2020-06-06', 'fdsfdsfds', 'L1027', 10002),
(412, 'dasd', 'DASDSAD', '2020-06-27', 'DASDADASD', 'L1028', 10002),
(413, 'dasd', 'fsdfdsfdsf', '2020-06-20', 'DASDADASD', 'L1029', 10001),
(414, 'dsadas', 'Cena', '2020-06-12', 'fdsfdsfds', 'L1030', 10001),
(415, 'dsadas', 'DASDSAD', '2020-06-26', 'Plaridel', 'L1031', 10001),
(416, 'SASASAS', 'dsad', '2020-06-20', 'dasdsad', 'L1032', 10001),
(417, 'Nice', 'fsdfdsfdsf', '2020-06-12', 'DASDADASD', 'L1033', 10001),
(418, 'dasd', 'DASDSAD', '2020-06-26', 'dfdsfdsfdsf', 'L1034', 10001);

-- --------------------------------------------------------

--
-- Table structure for table `debtor_business`
--

CREATE TABLE `debtor_business` (
  `business_no` int(8) NOT NULL,
  `business_name` varchar(30) DEFAULT NULL,
  `business_address` varchar(50) NOT NULL,
  `loan_no` varchar(20) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtor_business`
--

INSERT INTO `debtor_business` (`business_no`, `business_name`, `business_address`, `loan_no`, `account_no`) VALUES
(256, 'dsadasdsad', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1000', 10001),
(257, 'dsadasdsad', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1001', 10000),
(258, 'dasdasd', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1002', 10001),
(259, 'Sdfds', 'Purok 3, Looc Proper, Plaridel, Misamis Occidental', 'L1003', 10002),
(260, 'Ron', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1004', 10000),
(261, 'ssadsadas', 'Purok 3, Looc Proper, Plaridel, Misamis Occidental', 'L1005', 10002),
(265, 'Sari-Sari Store', 'Purok 3, Looc Proper, Plaridel, Misamis Occidental', 'L1006', 10002),
(266, 'fdsfds', 'Purok 3, Looc Proper, Plaridel, Misamis Occidental', 'L1007', 10002),
(267, 'fsdfds', 'Purok 3, Looc Proper, Plaridel, Misamis Occidental', 'L1008', 10002),
(268, 'fdfdf', 'Purok 3, Looc Proper, Plaridel, Misamis Occidental', 'L1009', 10002),
(269, 'fsdfdsf', 'Purok 3, Looc Proper, Plaridel, Misamis Occidental', 'L1010', 10002),
(270, 'dsf', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1011', 10000),
(271, 'fdfd', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1012', 10000),
(272, 'xzxz', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1013', 10000),
(273, 'dfdsf', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1014', 10000),
(274, 'sdsds', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1015', 10000),
(275, 'Google', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1016', 10000),
(276, 'dasdsa', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1017', 10000),
(277, 'cxcx', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1018', 10000),
(278, 'fdf', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1019', 10000),
(279, 'dsfds', 'Purok 2, Looc Proper, Plaridel, Misamis Occidental', 'L1020', 10000),
(280, 'dsds', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1021', 10001),
(281, '232', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1022', 10001),
(282, 'cxcxc', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1023', 10001),
(283, 'asdsa', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1024', 10001),
(284, 'vcv', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1025', 10001),
(285, 'Google', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1026', 10001),
(286, 'dasdsad', 'Purok 3, Looc Proper, Plaridel, Misamis Occidental', 'L1027', 10002),
(287, 'dsadasdsad', 'Purok 3, Looc Proper, Plaridel, Misamis Occidental', 'L1028', 10002),
(288, 'saSASA', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1029', 10001),
(289, 'saSASA', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1030', 10001),
(290, 'dasdsad', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1031', 10001),
(291, 'Google', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1032', 10001),
(292, 'saSASA', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1033', 10001),
(293, 'dasdsad', 'Purok 3, dsfdsfds, wqwqw, ew, 2323', 'L1034', 10001);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_no` varchar(20) NOT NULL,
  `account_no` int(8) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `loan_amount` decimal(8,2) DEFAULT NULL,
  `interest` int(8) DEFAULT 10,
  `collector` varchar(20) DEFAULT NULL,
  `date_loan` date DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Waiting for approval',
  `verified` varchar(20) NOT NULL,
  `reason` varchar(20) DEFAULT 'New loan',
  `approved` varchar(20) DEFAULT NULL,
  `terms` int(8) DEFAULT 60
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_no`, `account_no`, `area`, `loan_amount`, `interest`, `collector`, `date_loan`, `status`, `verified`, `reason`, `approved`, `terms`) VALUES
('L1000', 10001, '', '100000.00', 10, 'james', '2020-02-02', 'Paid', 'Josh ', 'New loan', 'ron', 60),
('L1001', 10000, '', '2000.00', 10, 'james', '2020-02-02', 'Paid', 'Josh ', 'New loan', 'ron', 60),
('L1002', 10001, '', '3243.00', 10, 'Leo', '2020-02-02', 'Active', 'Josh ', 'New loan', 'ron', 60),
('L1003', 10002, '', '4000.00', 10, 'james', '2020-02-17', 'Active', 'Josh ', 'New loan', 'ron', 60),
('L1004', 10000, '', '2000.00', 10, 'james', '2020-03-03', 'Active', 'Josh ', 'New loan', 'ron', 60),
('L1005', 10002, '', '2000.00', 10, 'james', '2020-03-03', 'Active', 'Josh ', 'New loan', 'ron', 60),
('L1006', 10002, '', '9000.00', 10, 'james', '2020-06-13', 'Approved', 'Josh ', 'New loan', 'ron', 60),
('L1007', 10002, '', '10000.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1008', 10002, '', '9000.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1009', 10002, '', '8000.00', 10, 'Leo', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1010', 10002, '', '23232.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1011', 10000, '', '33333.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1012', 10000, '', '2222.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1013', 10000, '', '2222.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1014', 10000, '', '4343.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1015', 10000, '', '4444.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1016', 10000, '', '333.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1017', 10000, '', '444.00', 10, 'Leo', '2020-06-13', 'Approved', 'Josh ', 'New loan', 'ron', 60),
('L1018', 10000, '', '2222.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1019', 10000, '', '2222.00', 10, 'james', '2020-06-13', 'Approved', 'Josh ', 'New loan', 'ron', 60),
('L1020', 10000, '', '444.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1021', 10001, '', '2222.00', 10, 'james', '2020-06-13', 'Approved', 'Josh ', 'New loan', 'ron', 60),
('L1022', 10001, '', '333.00', 10, 'james', '2020-06-13', 'Approved', 'Josh ', 'New loan', 'ron', 60),
('L1023', 10001, '', '33333.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1024', 10001, '', '2132.00', 10, 'james', '2020-06-13', 'Approved', 'Josh ', 'New loan', 'ron', 60),
('L1025', 10001, '', '333.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1026', 10001, '', '200.00', 10, 'james', '2020-06-13', 'Approved', 'Josh ', 'New loan', 'ron', 60),
('L1027', 10002, '', '32323.00', 10, 'Leo', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1028', 10002, '', '2323.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1029', 10001, '', '3333.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1030', 10001, '', '22222.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1031', 10001, '', '222.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1032', 10001, '', '333.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1033', 10001, '', '2222.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60),
('L1034', 10001, '', '333.00', 10, 'james', '2020-06-13', 'Waiting for approval', 'Josh ', 'New loan', NULL, 60);

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE `names` (
  `account_no` int(8) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `middlename` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `names`
--

INSERT INTO `names` (`account_no`, `firstname`, `middlename`, `lastname`) VALUES
(10000, 'Ronil', 'M', 'Cajan'),
(10001, 'Lebron', 'N', 'James'),
(10002, 'Ronil', 'M', 'Cajan');

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

CREATE TABLE `payment_transactions` (
  `transaction_id` int(8) NOT NULL,
  `loan_no` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `collected_by` varchar(20) DEFAULT NULL,
  `notes` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_transactions`
--

INSERT INTO `payment_transactions` (`transaction_id`, `loan_no`, `date`, `amount`, `collected_by`, `notes`) VALUES
(43, 'L1000', '2020-02-02', NULL, 'ron', 'Daily payment'),
(44, 'L1000', '2020-02-02', NULL, 'ron', 'Daily payment'),
(45, 'L1002', '2020-02-12', '64.86', 'ron', 'Daily payment'),
(46, 'L1003', '2020-02-17', '80.00', 'ron', 'Daily payment'),
(47, 'L1003', '2020-02-17', '80.80', 'ron', 'Penalty added');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `username` varchar(20) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `middlename` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `number` int(8) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `position` varchar(30) NOT NULL,
  `bio` varchar(100) DEFAULT NULL,
  `profile_img` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`username`, `firstname`, `middlename`, `lastname`, `number`, `address`, `email`, `position`, `bio`, `profile_img`) VALUES
('', 'ronoo', NULL, NULL, 1001, 'dasdas', 'c@gmail.com', '', NULL, NULL),
('ron2222', 'fdsfdsf', NULL, NULL, 324324, 'ffdsf', 'f@gmail.com', '', NULL, NULL),
('ron3435', 'fsdf', NULL, NULL, 3424343, ';lfdfgl', 'dfgd@gmail.com', 'Collector', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Unfinished'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `username`, `description`, `status`) VALUES
(8, 'ron', 'This is my task fsfsdfdsfdsf', 'Doned'),
(9, 'ron', 'sdfdsfdsfds', 'Doned');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `user_type`) VALUES
('guest', '35675e68f4b5af7b995d9205ad0fc43842f16450', 'Guest'),
('guest1', '35675e68f4b5af7b995d9205ad0fc43842f16450', 'Guest'),
('james', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Collector'),
('Josh', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Loan Officer'),
('Leo', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Collector'),
('noel', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Manager'),
('ron', 'a8e920f3f38d42d0f2b0f705215b50e06770c8a7', 'Admin'),
('roncka', '791fe5dc618d225c48bcf81551e0cbac7a53a2eb', 'Guest'),
('roni', '1a8565a9dc72048ba03b4156be3e569f22771f23', 'Manager'),
('ronil', 'a5b42198e3fb950b5ab0d0067cbe077a41da1245', 'Cashier'),
('sarah', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexes for table `approved_loans`
--
ALTER TABLE `approved_loans`
  ADD KEY `approved_loans_ibfk_1` (`loan_no`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `co_maker`
--
ALTER TABLE `co_maker`
  ADD PRIMARY KEY (`co_maker_no`),
  ADD KEY `co_maker_ibfk_1` (`loan_no`);

--
-- Indexes for table `debtor_business`
--
ALTER TABLE `debtor_business`
  ADD PRIMARY KEY (`business_no`),
  ADD KEY `debtor_business_ibfk_1` (`loan_no`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_no`),
  ADD KEY `account_no` (`account_no`),
  ADD KEY `loan_ibfk_2` (`verified`),
  ADD KEY `loan_ibfk_3` (`collector`);

--
-- Indexes for table `names`
--
ALTER TABLE `names`
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexes for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `payment_transactions_ibfk_1` (`loan_no`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `co_maker`
--
ALTER TABLE `co_maker`
  MODIFY `co_maker_no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;

--
-- AUTO_INCREMENT for table `debtor_business`
--
ALTER TABLE `debtor_business`
  MODIFY `business_no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `transaction_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `clients` (`account_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `approved_loans`
--
ALTER TABLE `approved_loans`
  ADD CONSTRAINT `approved_loans_ibfk_1` FOREIGN KEY (`loan_no`) REFERENCES `loan` (`loan_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_maker`
--
ALTER TABLE `co_maker`
  ADD CONSTRAINT `co_maker_ibfk_1` FOREIGN KEY (`loan_no`) REFERENCES `loan` (`loan_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `debtor_business`
--
ALTER TABLE `debtor_business`
  ADD CONSTRAINT `debtor_business_ibfk_1` FOREIGN KEY (`loan_no`) REFERENCES `loan` (`loan_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `clients` (`account_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`verified`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_ibfk_3` FOREIGN KEY (`collector`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `names`
--
ALTER TABLE `names`
  ADD CONSTRAINT `names_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `clients` (`account_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD CONSTRAINT `payment_transactions_ibfk_1` FOREIGN KEY (`loan_no`) REFERENCES `loan` (`loan_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
