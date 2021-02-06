-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2019 at 05:53 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `church_management`
--
CREATE DATABASE IF NOT EXISTS `church_management` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `church_management`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The id of Admin',
  `Username` varchar(20) NOT NULL COMMENT 'Username of Admin',
  `Password` varchar(10) NOT NULL COMMENT 'Password of Admin',
  `Admin_name` varchar(25) NOT NULL COMMENT 'Real name of Admin',
  `Admin_email` varchar(50) NOT NULL COMMENT 'Email id of Admin',
  PRIMARY KEY (`Admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Username`, `Password`, `Admin_name`, `Admin_email`) VALUES
(1, 'haynes', 'haynes55', 'Haynes Christian', 'hayneschristian10@gmail.com'),
(8, 'harsh', 'harsh21', 'Harsh Solanki', 'harsh.solanki2105@gmail.com'),
(22, 'krishna', 'kn99', 'krishna', 'kn@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `adminsession`
--

CREATE TABLE IF NOT EXISTS `adminsession` (
  `Session_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The id of Session',
  `Admin_name` varchar(20) NOT NULL COMMENT 'Real name of Admin',
  `Login_date` date NOT NULL COMMENT 'Login date of when Admin login in the device',
  `Login_time` time NOT NULL COMMENT 'Login time of when Admin login in the device',
  `Logout_time` time NOT NULL COMMENT 'Logout time of when Admin login in the device',
  `Member_Details` int(11) NOT NULL COMMENT 'Counter of ',
  `Add_family` int(11) NOT NULL COMMENT 'Counter of ',
  `Delete_family` int(11) NOT NULL,
  `Add_member` int(11) NOT NULL,
  `Edit_member` int(11) NOT NULL,
  `Income_Expense` int(11) NOT NULL,
  `Add_Income` int(11) NOT NULL,
  `Delete_Income` int(11) NOT NULL,
  `Edit_Income` int(11) NOT NULL,
  `Add_Expense` int(11) NOT NULL,
  `Delete_Expense` int(11) NOT NULL,
  `Edit_Expense` int(11) NOT NULL,
  `Supplier_View` int(11) NOT NULL,
  `Add_Supplier` int(11) NOT NULL,
  `Delete_Supplier` int(11) NOT NULL,
  `Edit_Supplier` int(11) NOT NULL,
  `Sunday_School` int(11) NOT NULL,
  `Document_Storage` int(11) NOT NULL,
  `Certificate_Format` int(11) NOT NULL,
  `Admin_activity` int(11) NOT NULL,
  `Add_Admin` int(11) NOT NULL,
  `Delete_Admin` int(11) NOT NULL,
  `Change_Password` int(11) NOT NULL,
  `Change_Username` int(11) NOT NULL,
  PRIMARY KEY (`Session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `adminsession`
--

INSERT INTO `adminsession` (`Session_id`, `Admin_name`, `Login_date`, `Login_time`, `Logout_time`, `Member_Details`, `Add_family`, `Delete_family`, `Add_member`, `Edit_member`, `Income_Expense`, `Add_Income`, `Delete_Income`, `Edit_Income`, `Add_Expense`, `Delete_Expense`, `Edit_Expense`, `Supplier_View`, `Add_Supplier`, `Delete_Supplier`, `Edit_Supplier`, `Sunday_School`, `Document_Storage`, `Certificate_Format`, `Admin_activity`, `Add_Admin`, `Delete_Admin`, `Change_Password`, `Change_Username`) VALUES
(61, 'haynes', '2019-12-05', '23:45:47', '18:16:06', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 'haynes', '2019-12-05', '00:01:46', '18:34:43', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 'haynes', '2019-12-09', '15:54:28', '10:26:24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(65, 'haynes', '2019-12-09', '16:37:56', '11:16:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 'haynes', '2019-12-09', '17:28:29', '00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 'dhruva', '2019-12-10', '12:40:51', '08:56:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 'haynes', '2019-12-10', '14:38:10', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 'haynes', '2019-12-11', '12:11:09', '00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 'haynes', '2019-12-11', '12:17:55', '00:00:00', 0, 0, 0, 0, 0, 5, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0),
(71, 'harsh', '2019-12-12', '12:28:25', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 'haynes', '2019-12-13', '11:09:35', '05:41:40', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 'haynes', '2019-12-13', '11:29:10', '00:00:00', 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 'haynes', '2019-12-17', '10:30:22', '05:06:41', 2, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 3, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0),
(75, 'haynes', '2019-12-17', '10:36:49', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 'haynes', '2019-12-20', '10:46:48', '05:28:03', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 4, 1, 0, 0),
(77, 'mansi', '2019-12-20', '10:58:15', '05:28:23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 'mansi', '2019-12-20', '11:00:08', '05:30:49', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 'haynes', '2019-12-20', '11:03:24', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 'haynes', '2019-12-20', '11:33:34', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(81, 'haynes', '2019-12-20', '11:34:57', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 1, 0),
(82, 'haynes', '2019-12-20', '12:41:39', '07:14:32', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 1, 0, 0),
(83, 'haynes', '2019-12-20', '12:46:09', '00:00:00', 0, 0, 0, 0, 0, 6, 1, 1, 0, 0, 0, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 'haynes', '2019-12-20', '19:47:35', '19:03:50', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 'haynes', '2019-12-20', '00:34:46', '00:00:00', 2, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 5, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(86, 'haynes', '2019-12-21', '10:07:26', '00:00:00', 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 'haynes', '2019-12-21', '11:01:09', '00:00:00', 2, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0),
(88, 'haynes', '2019-12-21', '14:30:14', '00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 'haynes', '2019-12-21', '14:51:05', '00:00:00', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 'haynes', '2019-12-21', '20:15:28', '00:00:00', 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 'haynes', '2019-12-21', '22:00:08', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 37, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `advocate`
--

CREATE TABLE IF NOT EXISTS `advocate` (
  `Advocate_id` int(11) NOT NULL,
  `Advocate_name` varchar(25) NOT NULL,
  `Advocate_address` varchar(100) NOT NULL,
  `Advocate_phoneNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `church_member`
--

CREATE TABLE IF NOT EXISTS `church_member` (
  `CM_id` int(11) NOT NULL AUTO_INCREMENT,
  `Family_id` int(11) NOT NULL,
  `CM_name` varchar(25) NOT NULL,
  `CM_address` varchar(100) NOT NULL,
  `CM_phoneNo` varchar(12) NOT NULL,
  `CM_photo` varchar(75) NOT NULL,
  `CM_DateOfBirth` date NOT NULL,
  `CM_Age` int(11) NOT NULL,
  `CM_Gender` varchar(10) NOT NULL,
  `CM_BaptismDate` date NOT NULL,
  `CM_ConfirmationDate` date NOT NULL,
  `CM_YearlyDonation` int(11) NOT NULL,
  `CM_MonthlyDonation` int(11) NOT NULL,
  `CM_ThanksGivingDoantion` int(11) NOT NULL,
  `CM_MaritalStatus` varchar(10) NOT NULL,
  `CM_Occupation` varchar(25) NOT NULL,
  `CM_RoleInchurch` varchar(15) NOT NULL,
  PRIMARY KEY (`CM_id`),
  KEY `Family_id` (`Family_id`),
  KEY `Family_id_2` (`Family_id`),
  KEY `Family_id_3` (`Family_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `church_member`
--

INSERT INTO `church_member` (`CM_id`, `Family_id`, `CM_name`, `CM_address`, `CM_phoneNo`, `CM_photo`, `CM_DateOfBirth`, `CM_Age`, `CM_Gender`, `CM_BaptismDate`, `CM_ConfirmationDate`, `CM_YearlyDonation`, `CM_MonthlyDonation`, `CM_ThanksGivingDoantion`, `CM_MaritalStatus`, `CM_Occupation`, `CM_RoleInchurch`) VALUES
(12, 7, 'hasmukh christian', '236, sahakar nagar', '9925321804', 'MemberImages/pappa.jpg', '1962-10-03', 52, 'male', '2019-11-01', '2019-11-01', 50000, 5000, 500, 'married', 'courier man', 'member'),
(13, 7, 'magret  christian', '                                236, sahakar nagar                            ', '9979980350', 'MemberImages/mummy.jpg', '1969-11-23', 49, 'male', '2019-11-01', '2019-11-01', 40000, 4000, 400, 'married', 'beautician', 'member'),
(16, 7, 'haynes christian', '236, sahakarnagar new sama road,behind sama sports complex', '7405430082', 'MemberImages/whiteshirtpic.jpeg', '1997-11-05', 21, 'male', '2019-11-02', '2019-11-02', 100000, 10000, 1000, 'unmarried', 'student', 'member'),
(17, 9, 'mukesh christian', '236, sahakar', '9789465612', 'MemberImages/IMG-20160505-WA0009.jpg', '1992-10-31', 46, 'male', '2019-11-02', '2019-11-02', 4600, 64, 65, 'married', 'service', 'member'),
(18, 9, 'nita christian', '236, sahakar nagar', '7946561232', 'MemberImages/IMG-20170125-WA0020.jpg', '1965-05-23', 45, 'female', '2019-11-04', '2019-11-04', 50000, 5000, 500, 'married', 'nurse', 'member'),
(19, 10, 'vijay shaiva', 'dhruva nu ghar', '8979465612', 'MemberImages/IMG-20160505-WA0015.jpg', '1963-05-08', 47, 'male', '2019-11-04', '2019-11-04', 15000, 1500, 150, 'married', 'service', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `Doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `Doc_name` varchar(20) NOT NULL,
  `Doc_date` date NOT NULL,
  `Doc_type` varchar(15) NOT NULL,
  `Doc_path` varchar(100) NOT NULL,
  PRIMARY KEY (`Doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`Doc_id`, `Doc_name`, `Doc_date`, `Doc_type`, `Doc_path`) VALUES
(11, 'file1', '2019-12-13', 'pdf', 'uploads_legal_cases/Learning XML.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `documentformat`
--

CREATE TABLE IF NOT EXISTS `documentformat` (
  `DocFormat_id` int(11) NOT NULL,
  `DocFormat_type` varchar(20) NOT NULL,
  `DocFormat_Storedby` varchar(30) NOT NULL,
  `DocFormat_Path` varchar(100) NOT NULL,
  `DocFormat_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `Exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `Student_id` int(11) NOT NULL,
  `Student_Name` varchar(100) NOT NULL,
  `Marks_Obtained` int(11) NOT NULL,
  `Total_Marks` int(11) NOT NULL DEFAULT '100',
  `Att` int(11) NOT NULL,
  `Fix_Att` int(11) NOT NULL DEFAULT '52',
  `Att_percentage` float NOT NULL,
  PRIMARY KEY (`Exam_id`),
  KEY `student_id` (`Student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`Exam_id`, `Student_id`, `Student_Name`, `Marks_Obtained`, `Total_Marks`, `Att`, `Fix_Att`, `Att_percentage`) VALUES
(8, 0, 'haynes christian', 50, 100, 50, 52, 96.1538),
(9, 0, 'virat ', 90, 100, 50, 52, 96.1538),
(10, 0, 'sachin tendulkar', 91, 100, 49, 52, 94.2308),
(11, 0, 'vivian richards', 90, 100, 45, 52, 86.5385),
(14, 0, 'ms dhoni', 83, 100, 51, 52, 98.0769),
(15, 0, 'mansi suthar', 0, 100, 0, 52, 0);

-- --------------------------------------------------------

--
-- Table structure for table `familydetails`
--

CREATE TABLE IF NOT EXISTS `familydetails` (
  `Family_id` int(11) NOT NULL AUTO_INCREMENT,
  `Family_headname` varchar(20) NOT NULL,
  PRIMARY KEY (`Family_id`),
  KEY `Family_id` (`Family_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `familydetails`
--

INSERT INTO `familydetails` (`Family_id`, `Family_headname`) VALUES
(7, 'hasmukh christian'),
(9, 'mukesh christian'),
(10, 'vijay shaiva');

-- --------------------------------------------------------

--
-- Table structure for table `incomeexpense`
--

CREATE TABLE IF NOT EXISTS `incomeexpense` (
  `Record_id` int(11) NOT NULL AUTO_INCREMENT,
  `Record_year` int(5) NOT NULL,
  `Record_type` varchar(10) NOT NULL,
  `Record_name` varchar(75) NOT NULL,
  `Record_amount` int(11) NOT NULL,
  PRIMARY KEY (`Record_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `incomeexpense`
--

INSERT INTO `incomeexpense` (`Record_id`, `Record_year`, `Record_type`, `Record_name`, `Record_amount`) VALUES
(1, 2025, 'income', 'chairs', 50),
(2, 2025, 'expense', 'tables', 50),
(3, 2019, 'income', 'chairs', 1550),
(4, 2019, 'expense', 'tables', 1500),
(9, 2019, 'expense', 'tv', 780),
(11, 2019, 'income', 'sofa', 400);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `Report_id` int(11) NOT NULL AUTO_INCREMENT,
  `Report_date` date NOT NULL,
  `Report_type` varchar(10) NOT NULL,
  `Report_path` varchar(100) NOT NULL,
  `Reportmaker_name` varchar(30) NOT NULL,
  `Reportmaker_designation` varchar(20) NOT NULL,
  `Reportmaker_jobtime` int(15) NOT NULL,
  PRIMARY KEY (`Report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`Report_id`, `Report_date`, `Report_type`, `Report_path`, `Reportmaker_name`, `Reportmaker_designation`, `Reportmaker_jobtime`) VALUES
(1, '2019-12-20', 'pdf', 'uploads/Admit Card - SNAP 2019.pdf', 'haynes', 'Secretary', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Student_id` int(11) NOT NULL AUTO_INCREMENT,
  `Student_Name` varchar(100) NOT NULL,
  `Student_Class` varchar(15) NOT NULL,
  `Student_BatchYear` int(5) NOT NULL,
  PRIMARY KEY (`Student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_id`, `Student_Name`, `Student_Class`, `Student_BatchYear`) VALUES
(13, 'haynes christian', 'beginner', 2019),
(14, 'virat kohli', 'primary', 2019),
(15, 'sachin tendulkar', 'junior', 2019),
(16, 'vivian richards', 'intermediate', 2019),
(19, 'ms dhoni', 'beginner', 2019),
(20, 'mansi suthar', 'beginner', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `supplierdetails`
--

CREATE TABLE IF NOT EXISTS `supplierdetails` (
  `Supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `Supplier_name` varchar(25) NOT NULL,
  `Supplier_phoneNo` varchar(12) NOT NULL,
  `Supplier_address` varchar(100) NOT NULL,
  `Supplier_WPname` varchar(35) NOT NULL,
  `Supplier_WPphno` varchar(12) NOT NULL,
  `Supplier_WPaddress` varchar(100) NOT NULL,
  PRIMARY KEY (`Supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `supplierdetails`
--

INSERT INTO `supplierdetails` (`Supplier_id`, `Supplier_name`, `Supplier_phoneNo`, `Supplier_address`, `Supplier_WPname`, `Supplier_WPphno`, `Supplier_WPaddress`) VALUES
(1, 'supplier', '7894561231', 'supplier address', 'supplier wp', '7894561232', 'supplier work place address'),
(3, 'sp2', '7894551547', 'spa', 'swp', '9904653218', 'swpa');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `Teacher_id` int(11) NOT NULL,
  `CM_id` int(11) NOT NULL,
  `Batch_id` int(11) NOT NULL,
  `Teacher_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `church_member`
--
ALTER TABLE `church_member`
  ADD CONSTRAINT `famid` FOREIGN KEY (`Family_id`) REFERENCES `familydetails` (`Family_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
