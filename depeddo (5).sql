-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 05:30 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depeddo`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_vacancy`(IN `TITLE` VARCHAR(45), IN `DESCRIPTION` LONGTEXT, IN `PLACE` VARCHAR(45), IN `NOI` VARCHAR(45), IN `DATE` DATE, IN `EXPIRATION` DATE, IN `STATUS` VARCHAR(45), IN `SALARIES` VARCHAR(45), IN `ITEM_NO` VARCHAR(45))
BEGIN
SET @maxno = (SELECT MAX(NO)+1 FROM publish_vacancy);
 SET @THISUID = (CONCAT("PID-000",@maxno));
 

insert into publish_vacancy(UID,TITLE,DESCRIPTION,PLACE_ASSIGNMENT,NOI,PUBLICATION_DATE,PUBLICATION_DATE_UNTIL,STATUS,SALARIES,ITEM_NO,APP_ISSET,isActive)
VALUES(@THISUID,TITLE,DESCRIPTION,PLACE,NOI,DATE,EXPIRATION,STATUS,SALARIES,ITEM_NO,'0','1');
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `register`(IN `email` VARCHAR(255), IN `pwd` VARCHAR(255), IN `gen_key` VARCHAR(255))
BEGIN
SET @maxno = (SELECT MAX(NO)+1 FROM user);
 SET @THISUID = (CONCAT("TCH-000",@maxno));
insert into user(UID,EMAIL,PWD,STATUS,ACTIVATION_KEY,IS_ONLINE)VALUES(@THISUID,email,pwd,'0',gen_key,'0');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view _ranking`()
    NO SQL
create view view_rank as(
SELECT p.UID,p.LASTNAME,p.FIRSTNAME,p.MIDDLENAME,p.EXTENSION_NAME,p.RESIDENTIAL_LOTNO,p.RESIDENTIAL_STREET,p.RESIDENTIAL_BARANGAY, p.RESIDENTIAL_SUBDIVISION,p.RESIDENTIAL_MUNICIPALITY,p.RESIDENTIAL_PROVINCE,p.RESIDENTIAL_ZIP_CODE,p.MOBILE_NO,p.PERMANENT_LOTNO,p.PERMANENT_STREET,p.PERMANENT_SUBDIVISION,p.PERMANENT_BARANGAY,p.PERMANENT_MUNICIPALITY,
p.PERMANENT_PROVINCE,p.PERMANENT_ZIP_CODE,u.EMAIL,
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID) AS 'ELIGIBILITY',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID) AS 'TRAINING',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.GRADED_BY='$c' AND ap.CRITERIA_CODE='INTERVIEW' AND ap.UID=a.UID) AS 'INTERVIEW',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID) AS 'DEMO',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID) AS 'COMMUNICATION',
			((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID))) AS INTERVIEW_AVG,
			((SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID)+((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)))) AS 'TOTALPOINTS'
			FROM application a JOIN personal_info p JOIN user u ON p.UID=a.UID AND u.UID=p.UID  ORDER BY TOTALPOINTS DESC)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `NO` int(11) NOT NULL,
  `FIRSTNAME` varchar(45) NOT NULL,
  `LASTNAME` varchar(45) NOT NULL,
  `PASSWORD` varchar(45) NOT NULL,
  `IMG` varchar(45) NOT NULL,
  `EMAIL` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NO`, `FIRSTNAME`, `LASTNAME`, `PASSWORD`, `IMG`, `EMAIL`) VALUES
(1, 'ADRIANE CLARK', 'ROMERO', 'P@ssw0rd', 'tanga', 'cromeroadr@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `DATE_PUB` date NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`NO`, `UID`, `TITLE`, `DESCRIPTION`, `DATE_PUB`, `isActive`) VALUES
(1, 'UID-0004', 'DIVISION OFFICE', 'TEACHER I', '2019-01-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicants_points`
--

CREATE TABLE IF NOT EXISTS `applicants_points` (
  `NO` int(11) NOT NULL,
  `UID` varchar(50) NOT NULL,
  `PID` varchar(45) NOT NULL,
  `CRITERIA_CODE` varchar(20) NOT NULL,
  `VALUE` varchar(45) NOT NULL,
  `EQUIVALENT_POINTS` decimal(11,2) NOT NULL,
  `GRADED_BY` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants_points`
--

INSERT INTO `applicants_points` (`NO`, `UID`, `PID`, `CRITERIA_CODE`, `VALUE`, `EQUIVALENT_POINTS`, `GRADED_BY`) VALUES
(1, 'TCH-00032', 'PID-0001', 'EDUCATION', '2,1', '13.00', '1'),
(3, 'TCH-00032', 'PID-0001', 'EXPERIENCE', '24,3', '6.60', '1'),
(4, 'TCH-00032', 'PID-0001', 'INTERVIEW', '', '10.00', '1'),
(5, 'TCH-00032', 'PID-0001', 'INTERVIEW', '', '8.00', '2'),
(7, 'TCH-00032', 'PID-0001', 'ELIGIBILITY', '', '14.00', '1'),
(9, 'TCH-00032', 'PID-0001', 'DEMO', '', '10.00', '1'),
(10, 'TCH-00032', 'PID-0001', 'COMMUNICATION', '', '15.00', '1'),
(12, 'TCH-00032', 'PID-0001', 'TRAINING', '', '7.00', '1'),
(21, 'TCH-0001', 'PID-0001', 'EDUCATION', '3,1', '7.60', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `applicant_points_view`
--
CREATE TABLE IF NOT EXISTS `applicant_points_view` (
`UID` varchar(50)
,`PID` varchar(45)
,`EDUCATION` decimal(11,2)
,`EXPERIENCE` decimal(11,2)
,`TRAINING` decimal(11,2)
,`ELIGIBILITY` decimal(11,2)
,`DEMO` decimal(11,2)
,`COMMUNICATION` decimal(11,2)
,`INTERVIEW_AVG` decimal(37,6)
);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `PID` varchar(255) NOT NULL,
  `STATUS` tinyint(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_CALIBRATED` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`NO`, `UID`, `PID`, `STATUS`, `date`, `IS_CALIBRATED`) VALUES
(1, 'TCH-00033', 'PID-00012', 0, '2019-01-25 12:00:46', 1),
(4, 'TCH-0001', 'PID-0001', 0, '2019-01-28 20:40:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `VID` varchar(255) NOT NULL,
  `DATE` date NOT NULL,
  `EXPIRATION_DATE` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `NO` int(11) NOT NULL,
  `UID` varchar(45) NOT NULL,
  `FILE_NAME` varchar(45) NOT NULL,
  `FILE_LOCATION` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `civill_service_eligibility`
--

CREATE TABLE IF NOT EXISTS `civill_service_eligibility` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `TYPE_OF_EXAMINATION` longtext NOT NULL,
  `RATING` longtext NOT NULL,
  `DATE_OF_EXAMINATION` longtext NOT NULL,
  `LICENSE_NO` longtext NOT NULL,
  `LICENSE_DATE_OF_VALIDITY` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `educational_background`
--

CREATE TABLE IF NOT EXISTS `educational_background` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `LEVEL` varchar(255) NOT NULL,
  `NAME_OF_SCHOOL` varchar(255) NOT NULL,
  `BASIC_EDUCATION_DEGREE_COURSE` varchar(255) NOT NULL,
  `PERIOD_OF_ATTENDANCE_FROM` varchar(255) NOT NULL,
  `PERIOD_OF_ATTENDANCE_TO` varchar(255) NOT NULL,
  `HIGHEST_LEVEL_UNITS_EARNED` varchar(255) NOT NULL,
  `YEAR_GRADUATED` varchar(255) NOT NULL,
  `SCHOLARSHIP_ACADEMIC_HONORS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluators_info_tbl`
--

CREATE TABLE IF NOT EXISTS `evaluators_info_tbl` (
  `NO` int(11) NOT NULL,
  `LASTNAME` varchar(120) NOT NULL,
  `FIRSTNAME` varchar(120) NOT NULL,
  `MIDDLENAME` varchar(120) NOT NULL,
  `EMAIL` varchar(240) NOT NULL,
  `PASSWORD` varchar(120) NOT NULL,
  `ISACTIVE` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluators_info_tbl`
--

INSERT INTO `evaluators_info_tbl` (`NO`, `LASTNAME`, `FIRSTNAME`, `MIDDLENAME`, `EMAIL`, `PASSWORD`, `ISACTIVE`) VALUES
(1, 'Javier', 'Louie', 'Samson', 'louiejavier0923@gmail.com', 'P@ssw0rd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `family_background`
--

CREATE TABLE IF NOT EXISTS `family_background` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `spousesurname` varchar(30) NOT NULL,
  `spousefirstname` varchar(30) NOT NULL,
  `spousemiddlename` varchar(30) NOT NULL,
  `spousenameextension` varchar(10) NOT NULL,
  `spouseoccupation` varchar(30) NOT NULL,
  `businessname` varchar(30) NOT NULL,
  `businessaddress` varchar(50) NOT NULL,
  `businesstelno` varchar(15) NOT NULL,
  `fathersurname` varchar(30) NOT NULL,
  `fatherfirstname` varchar(30) NOT NULL,
  `fathernameextension` varchar(10) NOT NULL,
  `fathermiddlename` varchar(30) NOT NULL,
  `mothermaindenname` varchar(30) NOT NULL,
  `motherfirstname` varchar(30) NOT NULL,
  `mothersnameextension` varchar(10) NOT NULL,
  `mothersmiddlename` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family_background`
--

INSERT INTO `family_background` (`NO`, `UID`, `spousesurname`, `spousefirstname`, `spousemiddlename`, `spousenameextension`, `spouseoccupation`, `businessname`, `businessaddress`, `businesstelno`, `fathersurname`, `fatherfirstname`, `fathernameextension`, `fathermiddlename`, `mothermaindenname`, `motherfirstname`, `mothersnameextension`, `mothersmiddlename`) VALUES
(1, 'TCH-0001', 'dfhdh', 'fdhdh', 'dhdh', 'dhdhdhdh', 'dhd', 'hdhdh', 'dfhdhdh', 'dhdhh', 'hdhd', 'hdhdhdfhd', 'hsdhsh', 'sdhssd', 'hshs', 'hshshsdh', 'shshsh', 'shshshss'),
(2, '$', 'v01', 'v02', 'v04', 'v03', 'v05', 'v06', 'v07', 'v08', 'v09', 'v010', 'v011', 'v012', 'v013', 'v014', 'v015', 'v016'),
(3, '$', 'fgkf', 'kfkf', 'fkfkfk', 'kfkfk', 'fkfkf', 'k', 'kkgkdgj', 'gkdkdg', 'hdghdhd', 'ghdghdg', 'hdhdhd', 'hdghdgh', '', 'hdhdh', 'dghdhd', 'hdghdhd'),
(4, '$', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '$', 'gffjf', 'jfj', 'gjfgjfgfj', 'fjfjfjf', 'fjfj', 'fjf', 'fjjfj', 'jfjfjjf', 'fj', 'fjfjfj', 'jfjfjfj', 'fjfjfjf', '', 'gjfjfjf', 'jfjfg', 'jfjfgj'),
(6, '$', 'djdfjd', 'dfjd', 'djdfjdj', 'jjdjdf', 'jdjdfgd', 'g', 'jdfjdfgg', 'dfjdgdf', 'gd', 'gd', 'gdfgd', 'fgdg', '', 'dgdgfg', 'gfdgd', 'dgfd'),
(7, '$', 'gsgsgsgs', 'sgds', 'gsgsg', 'sdg', 'gsgs', 'gsggs', 'gs', 'sgsg', 'sgsdgs', 'gsg', 'sgsgsg', 'sg', '', 'sgs', 'sgsgs', 'sgsgsg'),
(8, '$', 'gsgsgsgs', 'sgds', 'gsgsg', 'sdg', 'gsgs', 'gsggs', 'gs', 'sgsg', 'sgsdgs', 'gsg', 'sgsgsg', 'sg', 'gsgsg', 'sgs', 'sgsgs', 'sgsgsg'),
(9, '$', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '$', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'TCH-0001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'TCH-0001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'TCH-0001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `learning_and_development`
--

CREATE TABLE IF NOT EXISTS `learning_and_development` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `INCLUSIVE_DATES_FROM` varchar(255) NOT NULL,
  `INCLUSIVE_DATES_TO` varchar(255) NOT NULL,
  `NUMBER_OF_HOURS` varchar(255) NOT NULL,
  `TYPE_OF_LD` varchar(255) NOT NULL,
  `CONDUCTED_SPONSORED_BY` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `NO` int(11) NOT NULL,
  `UID` varchar(100) NOT NULL,
  `TITLE` varchar(225) NOT NULL,
  `DESCRIPTION` varchar(350) NOT NULL,
  `DATE_PUB` date NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_info`
--

CREATE TABLE IF NOT EXISTS `other_info` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `SPECIAL_SKILLS` varchar(255) NOT NULL,
  `HOBIES` varchar(255) NOT NULL,
  `NONE_ACADEMIC_DISTINCTIONS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE IF NOT EXISTS `personal_info` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `FIRSTNAME` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `MIDDLENAME` varchar(255) NOT NULL,
  `EXTENSION_NAME` varchar(255) NOT NULL,
  `BIRTHDATE` varchar(255) NOT NULL,
  `BIRTHPLACE` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  `HEIGHT` varchar(255) NOT NULL,
  `WEIGHT` varchar(255) NOT NULL,
  `BLOOD_TYPE` varchar(255) NOT NULL,
  `CIVIL_STATUS` varchar(255) NOT NULL,
  `GSIS_ID_NO` varchar(255) NOT NULL,
  `PAG_IBIG_NO` varchar(255) NOT NULL,
  `PHILHEALTH_NO` varchar(255) NOT NULL,
  `SSS_NO` varchar(255) NOT NULL,
  `TIN_NO` varchar(255) NOT NULL,
  `AGENCY_EMPLOYEE_NO` varchar(255) NOT NULL,
  `CITIZENSHIP` varchar(255) NOT NULL,
  `RESIDENTIAL_LOTNO` varchar(30) NOT NULL,
  `RESIDENTIAL_STREET` varchar(30) NOT NULL,
  `RESIDENTIAL_SUBDIVISION` varchar(30) NOT NULL,
  `RESIDENTIAL_BARANGAY` varchar(30) NOT NULL,
  `RESIDENTIAL_MUNICIPALITY` varchar(30) NOT NULL,
  `RESIDENTIAL_PROVINCE` varchar(30) NOT NULL,
  `RESIDENTIAL_ZIP_CODE` varchar(255) NOT NULL,
  `PERMANENT_LOTNO` varchar(30) NOT NULL,
  `PERMANENT_STREET` varchar(30) NOT NULL,
  `PERMANENT_SUBDIVISION` varchar(30) NOT NULL,
  `PERMANENT_BARANGAY` varchar(30) NOT NULL,
  `PERMANENT_MUNICIPALITY` varchar(30) NOT NULL,
  `PERMANENT_PROVINCE` varchar(30) NOT NULL,
  `PERMANENT_ZIP_CODE` varchar(255) NOT NULL,
  `TELEPHONE_NO` varchar(10) NOT NULL,
  `MOBILE_NO` varchar(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`NO`, `UID`, `FIRSTNAME`, `LASTNAME`, `MIDDLENAME`, `EXTENSION_NAME`, `BIRTHDATE`, `BIRTHPLACE`, `GENDER`, `HEIGHT`, `WEIGHT`, `BLOOD_TYPE`, `CIVIL_STATUS`, `GSIS_ID_NO`, `PAG_IBIG_NO`, `PHILHEALTH_NO`, `SSS_NO`, `TIN_NO`, `AGENCY_EMPLOYEE_NO`, `CITIZENSHIP`, `RESIDENTIAL_LOTNO`, `RESIDENTIAL_STREET`, `RESIDENTIAL_SUBDIVISION`, `RESIDENTIAL_BARANGAY`, `RESIDENTIAL_MUNICIPALITY`, `RESIDENTIAL_PROVINCE`, `RESIDENTIAL_ZIP_CODE`, `PERMANENT_LOTNO`, `PERMANENT_STREET`, `PERMANENT_SUBDIVISION`, `PERMANENT_BARANGAY`, `PERMANENT_MUNICIPALITY`, `PERMANENT_PROVINCE`, `PERMANENT_ZIP_CODE`, `TELEPHONE_NO`, `MOBILE_NO`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', 'Male', '', '', '', 'Married', '', '', '', '', '', '', 'By Birth', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'TCH-00032', 'ROMERO', 'ADRIANE', 'GENITA', '', '', '', 'Male', '', '', '', 'Married', '', '', '', '', '', '', 'By Birth', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'TCH-0005', 'Adriane Clark', 'Romero', 'Genita', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'TCH-0001', 'Adriane Clark', 'Romero', 'Genita', '', '', '', 'Male', '', '', '', 'Separated', '', '', '', '', '', '', 'Dual Citizenship', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `publish_vacancy`
--

CREATE TABLE IF NOT EXISTS `publish_vacancy` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `DESCRIPTION` longtext NOT NULL,
  `PLACE_ASSIGNMENT` varchar(255) NOT NULL,
  `NOI` varchar(255) NOT NULL,
  `PUBLICATION_DATE` date NOT NULL,
  `PUBLICATION_DATE_UNTIL` date NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `SALARIES` varchar(255) NOT NULL,
  `ITEM_NO` varchar(255) NOT NULL,
  `APP_ISSET` varchar(25) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publish_vacancy`
--

INSERT INTO `publish_vacancy` (`NO`, `UID`, `TITLE`, `DESCRIPTION`, `PLACE_ASSIGNMENT`, `NOI`, `PUBLICATION_DATE`, `PUBLICATION_DATE_UNTIL`, `STATUS`, `SALARIES`, `ITEM_NO`, `APP_ISSET`, `isActive`) VALUES
(1, 'PID-0001', 'TEACHER I', 'Retired Teacher Need for replacement', 'SID-0002', 'Quezon City Polytechnic University', '2019-02-02', '2019-01-31', 'PERMANENT', '20,232', 'TCHI-2019', '', 1),
(2, 'PID-0002', 'TEACHER I', 'NEED REPLACEMENT FOR SBHS', 'SID-0002', 'SAB BARTOLOME HIGH SCHOOL', '0000-00-00', '2019-01-10', 'PERMANENT', '30,300', 'TCHI-2019', '0', 1),
(3, 'PID-0003', 'TEACHER 1', 'REPLACEMENT OR RETIRING TEACHER', 'SID-0002', 'QCPU', '0000-00-00', '2019-01-26', 'PERMANENT', '10,000', '3', '1', 1),
(4, 'PID-0004', 'TEACHER I', 'QCPU', 'SID-0002', 'QCPU', '0000-00-00', '2019-01-30', 'PERMANENT', '3,000', '4', '1', 1),
(5, 'PID-0005', 'TEACHER I', 'Description', 'SID-0002', 'QCPU', '0000-00-00', '2019-01-10', 'PERMANENT', '20,000', '3', '1', 1),
(16, 'PID-1006', 'TEACHER I', 'WHAT', 'SID-0002', 'QCPU', '2019-01-27', '2019-01-31', '', '20,000', 'TCHI', '1', 1),
(17, 'PID-1007', 'TEACHER I', 'WHAT', 'SID-0002', 'QCPU', '2019-01-27', '2019-01-31', '', '20,000', 'TCHI', '1', 1),
(18, 'PID-0008', 'TEACHER I', 'WHAT', 'SID-0002', 'QCPU', '2019-01-27', '2019-01-31', '', '20,000', 'TCHI', '0', 1),
(19, 'PID-0009', 'TEACHER I', 'WHAT', 'SID-0002', 'QCPU', '2019-01-27', '2019-01-31', '', '20,000', 'TCHI', '0', 1),
(20, 'PID-00010', 'TEACHER I', 'WHAT', 'SID-0002', 'QCPU', '2019-01-27', '2019-01-31', '', '20,000', 'TCHI', '0', 1),
(21, 'PID-00011', 'e', '', 'SID-0002', 'QCOU', '2019-01-27', '2019-01-12', '1', '', '', '1', 1),
(22, 'PID-1005', 'TEACHER I', 'NEED TEACHER I QCPU', 'SID-0002', 'QCPU', '2019-01-28', '2019-01-01', '1', '20,000php', 'TCHI-20199283918', '', 1),
(23, 'PID-00023', 'TEACHER I', 'haha', 'haha', 'haha', '0000-00-00', '0000-00-00', '', '', '', '0', 1),
(24, 'PID-00024', 'fasf', '', 'SID-0001', '', '2019-01-28', '0000-00-00', '1', '', '', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `NO` int(11) NOT NULL,
  `SID` varchar(255) NOT NULL,
  `SCHOOL_NAME` varchar(255) NOT NULL,
  `SCHOOL_ADDRESS` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`NO`, `SID`, `SCHOOL_NAME`, `SCHOOL_ADDRESS`, `isActive`) VALUES
(1, 'SID-0001', 'Pugad Lawin High School', 'Brgy. Bahay Toro, Project 8 Quezon Cities', 1),
(2, 'SID-0002', 'QUEZON CITY POLYTECHNIC UNIVERSITY', 'San Bartolome', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PWD` varchar(255) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  `ACTIVATION_KEY` longtext NOT NULL,
  `IS_ONLINE` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NO`, `UID`, `EMAIL`, `PWD`, `STATUS`, `ACTIVATION_KEY`, `IS_ONLINE`) VALUES
(34, 'TCH-0001', 'cromeroadr@gmail.com', 'e', '1', '2e942a8eb075d2c26f92cc2ae525999f20008153', '0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_rank`
--
CREATE TABLE IF NOT EXISTS `view_rank` (
`UID` varchar(255)
,`LASTNAME` varchar(255)
,`FIRSTNAME` varchar(255)
,`MIDDLENAME` varchar(255)
,`EXTENSION_NAME` varchar(255)
,`RESIDENTIAL_LOTNO` varchar(30)
,`RESIDENTIAL_STREET` varchar(30)
,`RESIDENTIAL_BARANGAY` varchar(30)
,`RESIDENTIAL_SUBDIVISION` varchar(30)
,`RESIDENTIAL_MUNICIPALITY` varchar(30)
,`RESIDENTIAL_PROVINCE` varchar(30)
,`RESIDENTIAL_ZIP_CODE` varchar(255)
,`MOBILE_NO` varchar(13)
,`PERMANENT_LOTNO` varchar(30)
,`PERMANENT_STREET` varchar(30)
,`PERMANENT_SUBDIVISION` varchar(30)
,`PERMANENT_BARANGAY` varchar(30)
,`PERMANENT_MUNICIPALITY` varchar(30)
,`PERMANENT_PROVINCE` varchar(30)
,`PERMANENT_ZIP_CODE` varchar(255)
,`EMAIL` varchar(255)
,`EDUCATION` decimal(11,2)
,`EXPERIENCE` decimal(11,2)
,`ELIGIBILITY` decimal(11,2)
,`TRAINING` decimal(11,2)
,`INTERVIEW` decimal(11,2)
,`DEMO` decimal(11,2)
,`COMMUNICATION` decimal(11,2)
,`INTERVIEW_AVG` decimal(37,6)
,`TOTALPOINTS` decimal(38,6)
);

-- --------------------------------------------------------

--
-- Table structure for table `voluntary_work`
--

CREATE TABLE IF NOT EXISTS `voluntary_work` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `INCLUSIVE_DATES_FROM` varchar(255) NOT NULL,
  `INCLUSIVE_DATES_TO` varchar(255) NOT NULL,
  `NUMBER_OF_HOURS` varchar(255) NOT NULL,
  `POSITION` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE IF NOT EXISTS `work_experience` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `INCLUSIVE_DATES_FROM` varchar(255) NOT NULL,
  `INCLUSIVE_DATES_TO` varchar(255) NOT NULL,
  `POSITION_TITLE` varchar(255) NOT NULL,
  `DEPARTMENT_AGENCY_OFFICE_COMPANY` varchar(255) NOT NULL,
  `MONTHLY_SALARY` varchar(255) NOT NULL,
  `SALARY_JOB_PAY_GRADE` varchar(255) NOT NULL,
  `STATUS_OF_APPOINTMENT` varchar(255) NOT NULL,
  `GOVT_SERVICE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `applicant_points_view`
--
DROP TABLE IF EXISTS `applicant_points_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `applicant_points_view` AS (select `applicants_points`.`UID` AS `UID`,`applicants_points`.`PID` AS `PID`,max(if((`applicants_points`.`CRITERIA_CODE` = 'EDUCATION'),`applicants_points`.`EQUIVALENT_POINTS`,NULL)) AS `EDUCATION`,max(if((`applicants_points`.`CRITERIA_CODE` = 'EXPERIENCE'),`applicants_points`.`EQUIVALENT_POINTS`,NULL)) AS `EXPERIENCE`,max(if((`applicants_points`.`CRITERIA_CODE` = 'TRAINING'),`applicants_points`.`EQUIVALENT_POINTS`,NULL)) AS `TRAINING`,max(if((`applicants_points`.`CRITERIA_CODE` = 'ELIGIBILITY'),`applicants_points`.`EQUIVALENT_POINTS`,NULL)) AS `ELIGIBILITY`,max(if((`applicants_points`.`CRITERIA_CODE` = 'DEMO'),`applicants_points`.`EQUIVALENT_POINTS`,NULL)) AS `DEMO`,max(if((`applicants_points`.`CRITERIA_CODE` = 'COMMUNICATION'),`applicants_points`.`EQUIVALENT_POINTS`,NULL)) AS `COMMUNICATION`,((select sum(`applicants_points`.`EQUIVALENT_POINTS`) from `applicants_points` where (`applicants_points`.`CRITERIA_CODE` = 'INTERVIEW')) / (select count(`applicants_points`.`NO`) from `applicants_points` where (`applicants_points`.`CRITERIA_CODE` = 'INTERVIEW'))) AS `INTERVIEW_AVG` from `applicants_points` group by ((`applicants_points`.`UID` <> 0) and (`applicants_points`.`PID` <> 0)));

-- --------------------------------------------------------

--
-- Structure for view `view_rank`
--
DROP TABLE IF EXISTS `view_rank`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rank` AS (select `p`.`UID` AS `UID`,`p`.`LASTNAME` AS `LASTNAME`,`p`.`FIRSTNAME` AS `FIRSTNAME`,`p`.`MIDDLENAME` AS `MIDDLENAME`,`p`.`EXTENSION_NAME` AS `EXTENSION_NAME`,`p`.`RESIDENTIAL_LOTNO` AS `RESIDENTIAL_LOTNO`,`p`.`RESIDENTIAL_STREET` AS `RESIDENTIAL_STREET`,`p`.`RESIDENTIAL_BARANGAY` AS `RESIDENTIAL_BARANGAY`,`p`.`RESIDENTIAL_SUBDIVISION` AS `RESIDENTIAL_SUBDIVISION`,`p`.`RESIDENTIAL_MUNICIPALITY` AS `RESIDENTIAL_MUNICIPALITY`,`p`.`RESIDENTIAL_PROVINCE` AS `RESIDENTIAL_PROVINCE`,`p`.`RESIDENTIAL_ZIP_CODE` AS `RESIDENTIAL_ZIP_CODE`,`p`.`MOBILE_NO` AS `MOBILE_NO`,`p`.`PERMANENT_LOTNO` AS `PERMANENT_LOTNO`,`p`.`PERMANENT_STREET` AS `PERMANENT_STREET`,`p`.`PERMANENT_SUBDIVISION` AS `PERMANENT_SUBDIVISION`,`p`.`PERMANENT_BARANGAY` AS `PERMANENT_BARANGAY`,`p`.`PERMANENT_MUNICIPALITY` AS `PERMANENT_MUNICIPALITY`,`p`.`PERMANENT_PROVINCE` AS `PERMANENT_PROVINCE`,`p`.`PERMANENT_ZIP_CODE` AS `PERMANENT_ZIP_CODE`,`u`.`EMAIL` AS `EMAIL`,(select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'EDUCATION') and (`ap`.`UID` = `a`.`UID`))) AS `EDUCATION`,(select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'EXPERIENCE') and (`ap`.`UID` = `a`.`UID`))) AS `EXPERIENCE`,(select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'ELIGIBILITY') and (`ap`.`UID` = `a`.`UID`))) AS `ELIGIBILITY`,(select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'TRAINING') and (`ap`.`UID` = `a`.`UID`))) AS `TRAINING`,(select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`GRADED_BY` = '$c') and (`ap`.`CRITERIA_CODE` = 'INTERVIEW') and (`ap`.`UID` = `a`.`UID`))) AS `INTERVIEW`,(select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'DEMO') and (`ap`.`UID` = `a`.`UID`))) AS `DEMO`,(select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'COMMUNICATION') and (`ap`.`UID` = `a`.`UID`))) AS `COMMUNICATION`,((select sum(`ap`.`EQUIVALENT_POINTS`) from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'INTERVIEW') and (`ap`.`UID` = `a`.`UID`))) / (select count(`ap`.`NO`) from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'INTERVIEW') and (`ap`.`UID` = `a`.`UID`)))) AS `INTERVIEW_AVG`,(((((((select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'EDUCATION') and (`ap`.`UID` = `a`.`UID`))) + (select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'EXPERIENCE') and (`ap`.`UID` = `a`.`UID`)))) + (select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'ELIGIBILITY') and (`ap`.`UID` = `a`.`UID`)))) + (select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'TRAINING') and (`ap`.`UID` = `a`.`UID`)))) + (select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'DEMO') and (`ap`.`UID` = `a`.`UID`)))) + (select `ap`.`EQUIVALENT_POINTS` from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'COMMUNICATION') and (`ap`.`UID` = `a`.`UID`)))) + ((select sum(`ap`.`EQUIVALENT_POINTS`) from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'INTERVIEW') and (`ap`.`UID` = `a`.`UID`))) / (select count(`ap`.`NO`) from `applicants_points` `ap` where ((`ap`.`CRITERIA_CODE` = 'INTERVIEW') and (`ap`.`UID` = `a`.`UID`))))) AS `TOTALPOINTS` from ((`application` `a` join `personal_info` `p`) join `user` `u` on(((`p`.`UID` = `a`.`UID`) and (`u`.`UID` = `p`.`UID`)))) order by `TOTALPOINTS` desc);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `applicants_points`
--
ALTER TABLE `applicants_points`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `civill_service_eligibility`
--
ALTER TABLE `civill_service_eligibility`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `evaluators_info_tbl`
--
ALTER TABLE `evaluators_info_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `family_background`
--
ALTER TABLE `family_background`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `learning_and_development`
--
ALTER TABLE `learning_and_development`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `other_info`
--
ALTER TABLE `other_info`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `publish_vacancy`
--
ALTER TABLE `publish_vacancy`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `voluntary_work`
--
ALTER TABLE `voluntary_work`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applicants_points`
--
ALTER TABLE `applicants_points`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `civill_service_eligibility`
--
ALTER TABLE `civill_service_eligibility`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evaluators_info_tbl`
--
ALTER TABLE `evaluators_info_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `family_background`
--
ALTER TABLE `family_background`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `learning_and_development`
--
ALTER TABLE `learning_and_development`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `other_info`
--
ALTER TABLE `other_info`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `publish_vacancy`
--
ALTER TABLE `publish_vacancy`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `voluntary_work`
--
ALTER TABLE `voluntary_work`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
