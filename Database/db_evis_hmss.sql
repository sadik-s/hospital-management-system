-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2016 at 08:46 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evis_hmss`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

CREATE TABLE `accesses` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `access_id` int(1) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesses`
--

INSERT INTO `accesses` (`id`, `email`, `password`, `access_id`, `type`, `description`) VALUES
(5, 'admin@mail.com', 'admin', 1, 'admin', NULL),
(6, 'doctor@mail.com', 'doctor', 2, 'doctor', NULL),
(7, 'nurse@mail.com', 'nurse', 3, 'nurse', NULL),
(8, 'pharmacist@mail.com', 'pharmacist', 4, 'pharmacist', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(20) NOT NULL,
  `ward_id` int(20) NOT NULL,
  `bed_id` int(20) NOT NULL,
  `patient_name` varchar(20) NOT NULL,
  `patient_address` varchar(20) NOT NULL,
  `patient_phone` varchar(20) NOT NULL,
  `patient_nid` int(20) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `access_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_status` tinyint(1) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_status`, `type`) VALUES
(1, 'Admin', 'admin@evis.com', '111111', 1, 1),
(2, 'Dr Rizvi', 'rizvi@evis.com', '1234', 1, 2),
(3, 'sadia afroz', 'sadia@mail.com', '4321', 1, 3),
(5, 'ABC', 'doc@mail.com', '1234', 1, 2),
(6, 'receptionist', 'recp@evis.com', '4321', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bed`
--

CREATE TABLE `tbl_bed` (
  `bed_id` int(2) NOT NULL,
  `bed_name` varchar(10) NOT NULL,
  `bed_fee` float NOT NULL DEFAULT '0',
  `bed_total_sit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bed`
--

INSERT INTO `tbl_bed` (`bed_id`, `bed_name`, `bed_fee`, `bed_total_sit`) VALUES
(2, 'ICU', 5000, 5),
(3, 'Children', 150, 20),
(4, 'General', 200, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(2) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`) VALUES
(1, 'Ophthalmology'),
(2, ' Surgery'),
(3, 'Orthopaediatrics'),
(4, 'Anaesthesia'),
(5, 'Cardiovascular'),
(6, 'Neurology');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `doctor_id` int(6) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `department_id` int(2) NOT NULL,
  `doctor_address` text NOT NULL,
  `doctor_phone` varchar(11) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `doctor_visiting_hour` varchar(50) NOT NULL,
  `doctor_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `doctor_name`, `department_id`, `doctor_address`, `doctor_phone`, `doctor_email`, `doctor_visiting_hour`, `doctor_status`) VALUES
(1, 'Dr Rizvi', 1, 'Dhaka', '01719020278', 'rizvi@evis.com', '5 PM - 9 PM', 1),
(2, 'ABC', 5, 'some Address', '34268709', 'doc@mail.com', '5pm - 10pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `store` int(11) NOT NULL DEFAULT '0',
  `sold` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id`, `name`, `store`, `sold`, `price`) VALUES
(1, 'Allertrol', 47, 3, 4),
(2, 'Losectill', 20, 0, 5),
(3, 'Ecap', 50, 4, 4),
(4, 'Toska', 70, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine_history`
--

CREATE TABLE `tbl_medicine_history` (
  `history_id` int(11) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `medicines` varchar(255) NOT NULL,
  `total_cost` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medicine_history`
--

INSERT INTO `tbl_medicine_history` (`history_id`, `patient_id`, `medicines`, `total_cost`, `date`) VALUES
(4, 1, '"Ecap", "Toska"', 15, '2016-12-17 12:33:14'),
(6, 2, '"Allertrol"', 77, '2016-12-17 12:33:14'),
(7, 1, '"Ecap", "Allertrol"', 25, '2016-12-17 14:37:34'),
(8, 5, '"Allertrol", "Ecap"', 12, '2016-12-20 19:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(6) NOT NULL,
  `ward_id` int(2) NOT NULL,
  `bed_id` int(2) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_address` text NOT NULL,
  `patient_phone` varchar(20) NOT NULL,
  `patient_nid` varchar(50) NOT NULL,
  `admission_date` date NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `ward_id`, `bed_id`, `doc_id`, `patient_name`, `patient_address`, `patient_phone`, `patient_nid`, `admission_date`, `release_date`) VALUES
(1, 1, 4, 1, 'Jebin', 'Rupnagar, Mirpur 2, Dhaka-1216', '01780808575', '1234342432432762', '2016-03-31', '2016-05-01'),
(2, 4, 2, 1, 'Md Khairul Bashar', 'Khulna', '01719020278', '3243526862896436', '2016-04-04', '2016-05-16'),
(5, 1, 2, 2, 'sadik', '', '4564564', '87764346', '2016-12-19', '2016-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_test`
--

CREATE TABLE `tbl_patient_test` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacist`
--

CREATE TABLE `tbl_pharmacist` (
  `pharmacist_id` int(11) NOT NULL,
  `pharmacist_name` varchar(50) NOT NULL,
  `pharmacist_address` varchar(50) NOT NULL,
  `pharmacist_phone` varchar(50) NOT NULL,
  `pharmacist_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pharmacist`
--

INSERT INTO `tbl_pharmacist` (`pharmacist_id`, `pharmacist_name`, `pharmacist_address`, `pharmacist_phone`, `pharmacist_email`) VALUES
(2, 'sadia afroz', 'mirpur-2', '01763775855', 'sadia@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription`
--

CREATE TABLE `tbl_prescription` (
  `prescription_id` int(10) NOT NULL,
  `doctor_id` int(6) NOT NULL,
  `patient_id` int(6) NOT NULL,
  `prescription` text NOT NULL,
  `prescription_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prescription`
--

INSERT INTO `tbl_prescription` (`prescription_id`, `doctor_id`, `patient_id`, `prescription`, `prescription_time`) VALUES
(2, 1, 2, 'jhjsa sdafhj', '2016-12-20 02:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `report_id` int(10) NOT NULL,
  `test_id` int(2) NOT NULL,
  `patient_id` int(6) NOT NULL,
  `report_description` text NOT NULL,
  `report_result` text NOT NULL,
  `report_published_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`report_id`, `test_id`, `patient_id`, `report_description`, `report_result`, `report_published_date`) VALUES
(1, 2, 1, 'O Negative ', '', '2016-03-31'),
(3, 3, 1, 'some description here', 'Negative', '2016-11-26'),
(4, 2, 1, '', 'Positive', '2016-11-17'),
(5, 1, 2, 'some escription', 'Positive', '2016-11-16'),
(6, 2, 2, '', 'Positive', '2016-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `test_id` int(2) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`test_id`, `test_name`, `cost`) VALUES
(1, 'Blood Group', 200),
(2, 'HIV', 400),
(3, 'Pregnancy Test (Blood) ', 250),
(4, 'Pregnancy Test (Urine) ', 300);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ward`
--

CREATE TABLE `tbl_ward` (
  `ward_id` int(2) NOT NULL,
  `ward_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ward`
--

INSERT INTO `tbl_ward` (`ward_id`, `ward_name`) VALUES
(1, 'Ophthalmology'),
(2, 'Anaesthesia'),
(3, 'Cardiovascular'),
(4, 'Orthopaediatrics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_bed`
--
ALTER TABLE `tbl_bed`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_medicine_history`
--
ALTER TABLE `tbl_medicine_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_patient_test`
--
ALTER TABLE `tbl_patient_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pharmacist`
--
ALTER TABLE `tbl_pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `tbl_ward`
--
ALTER TABLE `tbl_ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_bed`
--
ALTER TABLE `tbl_bed`
  MODIFY `bed_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctor_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_medicine_history`
--
ALTER TABLE `tbl_medicine_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_patient_test`
--
ALTER TABLE `tbl_patient_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pharmacist`
--
ALTER TABLE `tbl_pharmacist`
  MODIFY `pharmacist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  MODIFY `prescription_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `test_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_ward`
--
ALTER TABLE `tbl_ward`
  MODIFY `ward_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
