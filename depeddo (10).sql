-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 07:40 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_school`(IN `SCHOOLNAME` VARCHAR(45), IN `SCHOOLADDRESS` VARCHAR(65))
BEGIN
SET @maxno = (SELECT MAX(NO)+1 FROM schools);
 SET @THISUID = (CONCAT("SID-000",@maxno));
 

insert into schools(SID,SCHOOL_NAME,SCHOOL_ADDRESS,isActive)
VALUES(@THISUID,SCHOOLNAME,SCHOOLADDRESS,'1');
 END$$

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

INSERT INTO personal_info(UID)VALUES(@THISUID);

INSERT INTO family_background(UID)VALUES(@THISUID);

INSERT INTO other_info(UID)VALUES(@THISUID);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user`(IN `email` VARCHAR(255), IN `pwd` VARCHAR(255), IN `status_key` VARCHAR(255), IN `gen_key` VARCHAR(255))
    NO SQL
BEGIN
SET @maxno = (SELECT MAX(NO)+1 FROM user);
 SET @THISUID = (CONCAT("TCH-000",@maxno));
insert into user(UID,EMAIL,PWD,STATUS,ACTIVATION_KEY,IS_ONLINE, ISACTIVE)VALUES(@THISUID,email,pwd,status_key,gen_key,'0','1');
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
(1, 'ADRIANE CLARK', 'ROMERO', 'P@ssw0rd', 'Cupcake.png', 'cromeroadr@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `NO` int(11) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `DATE_PUB` date NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`NO`, `TITLE`, `DESCRIPTION`, `DATE_PUB`, `isActive`) VALUES
(1, 'DIVISION OFFICE', 'TEACHER I', '2019-01-28', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants_points`
--

INSERT INTO `applicants_points` (`NO`, `UID`, `PID`, `CRITERIA_CODE`, `VALUE`, `EQUIVALENT_POINTS`, `GRADED_BY`) VALUES
(30, 'TCH-0001', '', 'EDUCATION', '1,0', '18.00', '1'),
(31, 'TCH-0001', '', 'EXPERIENCE', '15,3', '15.00', '1'),
(32, 'TCH-0001', '', 'ELIGIBILITY', '90,LET', '15.00', '1'),
(33, 'TCH-0001', '', 'TRAINING', '', '10.00', '1'),
(34, 'TCH-0001', '', 'INTERVIEW', '10', '6.67', '1'),
(35, 'TCH-0001', '', 'DEMO', '14', '10.00', '1'),
(36, 'TCH-0001', '', 'COMMUNICATION', '14', '2.10', '1'),
(37, 'TCH-00042', '', 'EDUCATION', '1,1', '19.00', '1'),
(38, 'TCH-00042', '', 'EXPERIENCE', '15,3', '5.25', '1'),
(39, 'TCH-00042', '', 'ELIGIBILITY', '90,LET', '15.00', '1'),
(40, 'TCH-00042', '', 'TRAINING', '', '10.00', '1'),
(41, 'TCH-00042', '', 'INTERVIEW', '15', '10.00', '1'),
(42, 'TCH-00042', '', 'DEMO', '50', '12.50', '1'),
(43, 'TCH-00042', '', 'COMMUNICATION', '100', '15.00', '1'),
(44, 'TCH-00036', 'PID-00028', 'EDUCATION', '1,1', '19.00', '1'),
(45, 'TCH-00036', 'PID-00028', 'EXPERIENCE', '1,1', '1.15', '1'),
(46, 'TCH-00036', 'PID-00028', 'ELIGIBILITY', '90,PBET', '15.00', '1'),
(47, 'TCH-00036', 'PID-00028', 'TRAINING', '', '1.00', '1'),
(48, 'TCH-00036', 'PID-00028', 'INTERVIEW', '1', '0.67', '1'),
(49, 'TCH-00036', 'PID-00028', 'DEMO', '12', '3.00', '1'),
(50, 'TCH-00036', 'PID-00028', 'COMMUNICATION', '1', '0.15', '1'),
(51, 'TCH-00044', 'PID-00029', 'EDUCATION', '1.25,1', '17.80', '1'),
(52, 'TCH-00044', 'PID-00029', 'EXPERIENCE', '72,3', '13.80', '1'),
(53, 'TCH-00044', 'PID-00029', 'ELIGIBILITY', '84.25,LET', '14.00', '1'),
(54, 'TCH-00044', 'PID-00029', 'TRAINING', '', '10.00', '1'),
(55, 'TCH-00044', 'PID-00029', 'INTERVIEW', '15', '10.00', '1'),
(56, 'TCH-00044', 'PID-00029', 'DEMO', '60', '15.00', '1'),
(57, 'TCH-00044', 'PID-00029', 'COMMUNICATION', '100', '15.00', '1'),
(58, 'TCH-00047', 'PID-00029', 'EDUCATION', '2.75,0', '7.80', '1'),
(59, 'TCH-00047', 'PID-00029', 'EXPERIENCE', '2,0', '0.30', '1'),
(60, 'TCH-00047', 'PID-00029', 'ELIGIBILITY', '80,LET', '12.00', '1'),
(61, 'TCH-00047', 'PID-00029', 'TRAINING', '', '5.00', '1'),
(62, 'TCH-00047', 'PID-00029', 'INTERVIEW', '5', '3.33', '1'),
(63, 'TCH-00047', 'PID-00029', 'DEMO', '7', '1.75', '1'),
(64, 'TCH-00047', 'PID-00029', 'COMMUNICATION', '10', '1.50', '1'),
(65, 'TCH-00044', 'PID-00029', 'INTERVIEW', '10', '6.67', '2'),
(66, 'TCH-00047', 'PID-00029', 'INTERVIEW', '5', '3.33', '2');

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
  `date` date NOT NULL,
  `IS_CALIBRATED` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`NO`, `UID`, `PID`, `STATUS`, `date`, `IS_CALIBRATED`) VALUES
(83, 'TCH-00042', 'PID-10026', 1, '2019-01-30', 0),
(85, 'TCH-00044', 'PID-00029', 1, '2019-01-31', 0),
(87, 'TCH-00047', 'PID-00029', 0, '2019-01-30', 0),
(89, 'TCH-00044', 'PID-1005', 1, '2019-01-30', 0),
(90, 'TCH-00044', 'PID-10026', 1, '2019-01-30', 0),
(91, 'TCH-00044', '', 0, '2019-01-31', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`NO`, `UID`, `VID`, `DATE`, `EXPIRATION_DATE`) VALUES
(66, 'TCH-00042', 'PID-00029', '2019-01-30', '2019-02-14'),
(67, 'TCH-00044', 'PID-1005', '2019-01-30', '2019-02-14');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluators_info_tbl`
--

INSERT INTO `evaluators_info_tbl` (`NO`, `LASTNAME`, `FIRSTNAME`, `MIDDLENAME`, `EMAIL`, `PASSWORD`, `ISACTIVE`) VALUES
(1, 'Javier', 'Louie', 'Samson', 'louiejavier0923@gmail.com', 'P@ssw0rd', 1),
(2, 'romero', 'romero', 'romero', 'cromeroadr@gmail.com', 'e', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family_background`
--

INSERT INTO `family_background` (`NO`, `UID`, `spousesurname`, `spousefirstname`, `spousemiddlename`, `spousenameextension`, `spouseoccupation`, `businessname`, `businessaddress`, `businesstelno`, `fathersurname`, `fatherfirstname`, `fathernameextension`, `fathermiddlename`, `mothermaindenname`, `motherfirstname`, `mothersnameextension`, `mothersmiddlename`) VALUES
(1, 'TCH-0001', 'none', 'none', 'none', 'none', 'dhd', 'hdhdh', 'dfhdhdh', 'dhdhh', 'hdhd', 'hdhdhdfhd', 'hsdhsh', 'sdhssd', 'hshs', 'hshshsdh', '', 'shshshss'),
(2, '$', 'v01', 'v02', 'v04', 'v03', 'v05', 'v06', 'v07', 'v08', 'v09', 'v010', 'v011', 'v012', 'v013', 'v014', 'v015', 'v016'),
(3, '$', 'fgkf', 'kfkf', 'fkfkfk', 'kfkfk', 'fkfkf', 'k', 'kkgkdgj', 'gkdkdg', 'hdghdhd', 'ghdghdg', 'hdhdhd', 'hdghdgh', '', 'hdhdh', 'dghdhd', 'hdghdhd'),
(4, '$', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '$', 'gffjf', 'jfj', 'gjfgjfgfj', 'fjfjfjf', 'fjfj', 'fjf', 'fjjfj', 'jfjfjjf', 'fj', 'fjfjfj', 'jfjfjfj', 'fjfjfjf', '', 'gjfjfjf', 'jfjfg', 'jfjfgj'),
(6, '$', 'djdfjd', 'dfjd', 'djdfjdj', 'jjdjdf', 'jdjdfgd', 'g', 'jdfjdfgg', 'dfjdgdf', 'gd', 'gd', 'gdfgd', 'fgdg', '', 'dgdgfg', 'gfdgd', 'dgfd'),
(7, '$', 'gsgsgsgs', 'sgds', 'gsgsg', 'sdg', 'gsgs', 'gsggs', 'gs', 'sgsg', 'sgsdgs', 'gsg', 'sgsgsg', 'sg', '', 'sgs', 'sgsgs', 'sgsgsg'),
(8, '$', 'gsgsgsgs', 'sgds', 'gsgsg', 'sdg', 'gsgs', 'gsggs', 'gs', 'sgsg', 'sgsdgs', 'gsg', 'sgsgsg', 'sg', 'gsgsg', 'sgs', 'sgsgs', 'sgsgsg'),
(9, '$', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '$', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '', '`e`e`', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e'),
(12, 'TCH-0001', 'none', 'none', 'none', 'none', 'dhd', 'hdhdh', 'dfhdhdh', 'dhdhh', 'hdhd', 'hdhdhdfhd', 'hsdhsh', 'sdhssd', 'hshs', 'hshshsdh', '', 'shshshss'),
(13, 'TCH-0001', 'none', 'none', 'none', 'none', 'dhd', 'hdhdh', 'dfhdhdh', 'dhdhh', 'hdhd', 'hdhdhdfhd', 'hsdhsh', 'sdhssd', 'hshs', 'hshshsdh', '', 'shshshss'),
(14, 'TCH-0001', 'none', 'none', 'none', 'none', 'dhd', 'hdhdh', 'dfhdhdh', 'dhdhh', 'hdhd', 'hdhdhdfhd', 'hsdhsh', 'sdhssd', 'hshs', 'hshshsdh', '', 'shshshss'),
(15, '', '`e`e`', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e'),
(20, 'TCH-00036', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', 'asd', 'asd', 'asd', '', 'asd'),
(21, 'TCH-00042', 'heyhey', 'hey', 'hey', 'e', 'IT', 'qcpu', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', '', 'e'),
(22, 'TCH-00042', 'heyhey', 'hey', 'hey', 'e', 'IT', 'qcpu', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', '', 'e'),
(23, 'TCH-00043', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'TCH-00044', 'qwe', 'e', 'e', 'e', 'none', 'qwe', 'qcpu', '231231', 'e', 'fafsa', '', 'w', 'e', 'e', '', 'e'),
(25, 'TCH-00044', 'qwe', 'e', 'e', 'e', 'none', 'qwe', 'qcpu', '231231', 'e', 'fafsa', '', 'w', 'e', 'e', '', 'e'),
(26, 'TCH-00044', 'qwe', 'e', 'e', 'e', 'none', 'qwe', 'qcpu', '231231', 'e', 'fafsa', '', 'w', 'e', 'e', '', 'e'),
(27, 'TCH-00044', 'qwe', 'e', 'e', 'e', 'none', 'qwe', 'qcpu', '231231', 'e', 'fafsa', '', 'w', 'e', 'e', '', 'e'),
(28, 'TCH-00047', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `NO` int(11) NOT NULL,
  `UID` varchar(45) NOT NULL,
  `FILE_NAME` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`NO`, `UID`, `FILE_NAME`) VALUES
(9, 'TCH-00044', '5c51e84f6a21f-Capture.PNG');

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
  `TITLE` varchar(225) NOT NULL,
  `DESCRIPTION` varchar(350) NOT NULL,
  `DATE_PUB` date NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NO`, `TITLE`, `DESCRIPTION`, `DATE_PUB`, `isActive`) VALUES
(1, 'NEWS', 'SAMPLE', '2019-01-17', 0),
(2, 'haha', 'haha', '2019-01-31', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_info`
--

INSERT INTO `other_info` (`NO`, `UID`, `SPECIAL_SKILLS`, `HOBIES`, `NONE_ACADEMIC_DISTINCTIONS`) VALUES
(1, 'TCH-00042', '', '', ''),
(2, 'TCH-00043', '', '', ''),
(3, 'TCH-00044', '', '', ''),
(4, 'TCH-00044', '', '', ''),
(5, 'TCH-00044', '', '', ''),
(6, 'TCH-00047', '', '', '');

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
  `BIRTHDATE` date NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`NO`, `UID`, `FIRSTNAME`, `LASTNAME`, `MIDDLENAME`, `EXTENSION_NAME`, `BIRTHDATE`, `BIRTHPLACE`, `GENDER`, `HEIGHT`, `WEIGHT`, `BLOOD_TYPE`, `CIVIL_STATUS`, `GSIS_ID_NO`, `PAG_IBIG_NO`, `PHILHEALTH_NO`, `SSS_NO`, `TIN_NO`, `AGENCY_EMPLOYEE_NO`, `CITIZENSHIP`, `RESIDENTIAL_LOTNO`, `RESIDENTIAL_STREET`, `RESIDENTIAL_SUBDIVISION`, `RESIDENTIAL_BARANGAY`, `RESIDENTIAL_MUNICIPALITY`, `RESIDENTIAL_PROVINCE`, `RESIDENTIAL_ZIP_CODE`, `PERMANENT_LOTNO`, `PERMANENT_STREET`, `PERMANENT_SUBDIVISION`, `PERMANENT_BARANGAY`, `PERMANENT_MUNICIPALITY`, `PERMANENT_PROVINCE`, `PERMANENT_ZIP_CODE`, `TELEPHONE_NO`, `MOBILE_NO`) VALUES
(1, '', 'ADRIANE', 'ROMERO', 'GENITA', 'e', '1997-11-03', 'qwe', 'Male', '121', '212', 'AB', 'Single', '1111-1111111-111', '1111-1111-111111', '11-111111111-1', '11-1111111-1', '121-111-111-11111', '111-1111111', 'Filipino', 'qweqeqweqweq', 'e', 'e', 'e', 'e', 'e', '1231', 'e', 'e', 'e', 'e', 'e', 'e', '1111', '222-2222', '21312'),
(2, '', 'ADRIANE', 'ROMERO', 'GENITA', 'e', '1997-11-03', 'qwe', 'Male', '121', '212', 'AB', 'Single', '1111-1111111-111', '1111-1111-111111', '11-111111111-1', '11-1111111-1', '121-111-111-11111', '111-1111111', 'Filipino', 'qweqeqweqweq', 'e', 'e', 'e', 'e', 'e', '1231', 'e', 'e', 'e', 'e', 'e', 'e', '1111', '222-2222', '21312'),
(3, '', 'ADRIANE', 'ROMERO', 'GENITA', 'e', '1997-11-03', 'qwe', 'Male', '121', '212', 'AB', 'Single', '1111-1111111-111', '1111-1111-111111', '11-111111111-1', '11-1111111-1', '121-111-111-11111', '111-1111111', 'Filipino', 'qweqeqweqweq', 'e', 'e', 'e', 'e', 'e', '1231', 'e', 'e', 'e', 'e', 'e', 'e', '1111', '222-2222', '21312'),
(4, 'TCH-00032', 'ROMERO', 'ADRIANE', 'GENITA', '', '0000-00-00', '', 'Male', '', '', '', 'Married', '', '', '', '', '', '', 'By Birth', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'TCH-0005', 'Adriane Clark', 'Romero', 'Genita', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'TCH-0001', 'Adriane Clark', 'Romero', 'Genita', '', '1997-11-03', 'Manila', 'Male', '152cm', '49kg', 'A', 'Separated', '283929231', '23123123', '23123122', '2312312312', '12312312', '1231231231', 'Dual Citizenship', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '09662715987'),
(12, 'TCH-00036', 'asd', 'clegs', 'asd', '', '2019-01-17', 'asd', 'Female', 'asd', 'asd', 'A', 'Married', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'Filipino', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd'),
(13, 'TCH-00042', 'Adriane Clark', 'Romero', 'Genita', '', '1997-11-03', 'Manila', 'Male', '12', '12', 'O', 'Married', '1233-3333333-333', '3333-3333-333333', '33-333333333-3', '22-2222222-2', '222-222-222-22222', '222-2222222', 'By Naturalization', 'haha', 'ahaha', 'haha', 'aha', 'ahahah', 'ahaha', '3213', 'ahaha', 'ahaha', 'ahah', 'ahah', 'qwe', 'qwe', '3123', '321-3123', '32131231231'),
(14, 'TCH-00043', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'TCH-00044', 'ADRIANE', 'ROMERO', 'GENITA', '', '1997-11-03', 'MANILA', 'Male', '111', '111', 'AB', 'Single', '2222-2222222-222', '3333-3333-333333', '33-333333333-3', '33-3333333-3', '333-333-333-33333', '123-1231', 'Filipino', 'BLK 35 LOT 2', 'genovus', 'sunrise village', 'tres cruses', 'cavite', 'tres crues', '1231', 'qwe', 'qwe', 'qwe', 'qwe', 'ewe', 'e', '1231', '', '09662715987'),
(16, 'TCH-00044', 'ADRIANE', 'ROMERO', 'GENITA', '', '1997-11-03', 'MANILA', 'Male', '111', '111', 'AB', 'Single', '2222-2222222-222', '3333-3333-333333', '33-333333333-3', '33-3333333-3', '333-333-333-33333', '123-1231', 'Filipino', 'BLK 35 LOT 2', 'genovus', 'sunrise village', 'tres cruses', 'cavite', 'tres crues', '1231', 'qwe', 'qwe', 'qwe', 'qwe', 'ewe', 'e', '1231', '', '09662715987'),
(17, 'TCH-00044', 'ADRIANE', 'ROMERO', 'GENITA', '', '1997-11-03', 'MANILA', 'Male', '111', '111', 'AB', 'Single', '2222-2222222-222', '3333-3333-333333', '33-333333333-3', '33-3333333-3', '333-333-333-33333', '123-1231', 'Filipino', 'BLK 35 LOT 2', 'genovus', 'sunrise village', 'tres cruses', 'cavite', 'tres crues', '1231', 'qwe', 'qwe', 'qwe', 'qwe', 'ewe', 'e', '1231', '', '09662715987'),
(18, 'TCH-00047', 'e', 'e', 'e', 'e', '2019-02-01', 'e', 'Male', '123', '212', 'A', 'Single', '2131-2312312-3', '1111-1111-11111', '11-111111111-1', '11-1111111-1', '122-222-222-2222', '111-2122222', 'Filipino', 'e', 'e', 'e', 'e', 'e', 'e', '1231', 'e', 'e', 'e', 'e', 'qweq', 'e', '1231', '123-1231', '09231231231');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publish_vacancy`
--

INSERT INTO `publish_vacancy` (`NO`, `UID`, `TITLE`, `DESCRIPTION`, `PLACE_ASSIGNMENT`, `NOI`, `PUBLICATION_DATE`, `PUBLICATION_DATE_UNTIL`, `STATUS`, `SALARIES`, `ITEM_NO`, `APP_ISSET`, `isActive`) VALUES
(25, 'PID-1005', 'TEACHER I', 'NEED TEACHER I', 'SID-0003', 'QCPU', '2019-01-31', '2019-01-31', '1', '20000', 'TCHI-1232-1232', '1', 1),
(26, 'PID-10026', 'TEACHER I', 'Replacing Teacher Retirement', 'SID-0002', 'qcpu', '2019-01-31', '2019-02-02', 'PERMANENT', '20000', 'TCHI-2912-3122', '0', 1),
(27, 'PID-00027', 'TEACHER I', 'LALALA', 'SID-0003', 'QCPU', '2019-01-31', '2019-02-01', '1', '20000', 'TCHI-0291-9209', '0', 1),
(28, 'PID-00028', 'TEACHER I', 'Hays', 'SID-0002', 'qcpu', '2019-01-31', '2019-01-31', '1', '20000', 'TCHI--223-1231', '0', 1),
(29, 'PID-00029', 'EXAMPLE', 'Need Replacement', 'SID-0002', 'QCPU', '2019-01-31', '2019-02-14', '2', '20000', 'TCH7-61237-1263', '1', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`NO`, `SID`, `SCHOOL_NAME`, `SCHOOL_ADDRESS`, `isActive`) VALUES
(1, 'SID-0001', 'Pugad Lawin High School', 'Brgy. Bahay Toro, Project 8 Quezon Cities', 1),
(2, 'SID-0002', 'QUEZON CITY POLYTECHNIC UNIVERSITY', 'San Bartolome', 1),
(3, 'SID-0003', 'BEST LINK', 'Novaliches Bayan', 1),
(4, 'SID-0004', 'ELECTRON', 'Brgy San bartolome quezon city', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PWD` varchar(255) NOT NULL,
  `IMG` varchar(65) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  `ACTIVATION_KEY` longtext NOT NULL,
  `IS_ONLINE` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NO`, `UID`, `EMAIL`, `PWD`, `IMG`, `STATUS`, `ACTIVATION_KEY`, `IS_ONLINE`) VALUES
(34, 'TCH-0001', 'niellaurenciano@gmail.com', 'e', '', '1', '2e942a8eb075d2c26f92cc2ae525999f20008153', '0'),
(35, 'TCH-0002', 'flipmusicc@gmail.com', 'e', '', '1', '', '0'),
(41, 'TCH-00036', 'cleeegs@gmail.com', '12345', '', '1', 'd27a1db70940016d2784ecc8b8fb12bc8a32490a', '0'),
(42, 'TCH-00042', 'cromerosdadr@gmail.com', 'e', '', '1', '6eb91f33273af0317ab1c2254692f0c9444cf951', '0'),
(43, 'TCH-00043', 'sdsd@gmail.com', 'e', '', '0', 'da19448c286f9f89d4da5c9f444be00d448694e5', '0'),
(46, 'TCH-00044', 'cromeroadr@gmail.com', 'e', '', '1', '346342737c5a9a1639fa0aaf7724a20cc40c5d17', '0'),
(47, 'TCH-00047', 'e@gmail.com', 'e', '', '1', '7cf42be2879bfe9560db19e88333c84e3525bedc', '0');

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
-- Indexes for table `file`
--
ALTER TABLE `file`
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
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
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
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `family_background`
--
ALTER TABLE `family_background`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `learning_and_development`
--
ALTER TABLE `learning_and_development`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `other_info`
--
ALTER TABLE `other_info`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `publish_vacancy`
--
ALTER TABLE `publish_vacancy`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
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
