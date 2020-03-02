-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2020 at 03:51 AM
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
('L1003', '2020-02-17', '2020-02-17', '80.00', '2020-04-17', 'new');

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
(384, 'sdf', 'dsfdsf', '2020-02-18', 'fdsfdsf', 'L1003', 10002);

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
(259, 'Sdfds', 'Purok 3, Looc Proper, Plaridel, Misamis Occidental', 'L1003', 10002);

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
('L1003', 10002, '', '4000.00', 10, 'james', '2020-02-17', 'Active', 'Josh ', 'New loan', 'ron', 60);

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
  `username` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `middlename` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `number` int(8) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `bio` varchar(100) DEFAULT NULL,
  `profile_img` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`username`, `firstname`, `middlename`, `lastname`, `number`, `address`, `email`, `bio`, `profile_img`) VALUES
('ron', 'Ronil', 'M', 'Cajan', 93213213, 'Looc Proper', 'cajanr02@gmail.com', 'HAlooo', '5c6c50a12055a39beecbe2df6c59e012.jpeg');

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
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `co_maker_no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `debtor_business`
--
ALTER TABLE `debtor_business`
  MODIFY `business_no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

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
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
