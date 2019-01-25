-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 04:15 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dodb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_pds`(IN `UID` VARCHAR(255), IN `v1` LONGTEXT, IN `v2` LONGTEXT, IN `v3` LONGTEXT, IN `v4` LONGTEXT, IN `v5` LONGTEXT, IN `v6` LONGTEXT, IN `v7` LONGTEXT, IN `v8` LONGTEXT, IN `v9` LONGTEXT, IN `v10` LONGTEXT, IN `v11` LONGTEXT, IN `v12` LONGTEXT, IN `v13` LONGTEXT, IN `v14` LONGTEXT, IN `v15` LONGTEXT, IN `v16` LONGTEXT, IN `v17` LONGTEXT, IN `v18` LONGTEXT, IN `v19` LONGTEXT, IN `v20` LONGTEXT, IN `v21` LONGTEXT, IN `v22` LONGTEXT, IN `v23` LONGTEXT, IN `v24` LONGTEXT, IN `v25` LONGTEXT, IN `v26` LONGTEXT, IN `v27` LONGTEXT, IN `v28` LONGTEXT, IN `v29` LONGTEXT, IN `v30` LONGTEXT, IN `v31` LONGTEXT, IN `v32` LONGTEXT, IN `v33` LONGTEXT, IN `v34` LONGTEXT, IN `v35` LONGTEXT, IN `v36` LONGTEXT, IN `v37` LONGTEXT, IN `v38` LONGTEXT, IN `v39` LONGTEXT, IN `v40` LONGTEXT, IN `v41` LONGTEXT, IN `v42` LONGTEXT, IN `v43` LONGTEXT, IN `v44` LONGTEXT, IN `v45` LONGTEXT, IN `v46` LONGTEXT, IN `v47` LONGTEXT, IN `v48` LONGTEXT, IN `v49` LONGTEXT, IN `v50` LONGTEXT, IN `v51` LONGTEXT, IN `v52` LONGTEXT, IN `v53` LONGTEXT, IN `v54` LONGTEXT, IN `v55` LONGTEXT, IN `v56` LONGTEXT, IN `v57` LONGTEXT, IN `v58` LONGTEXT, IN `v59` LONGTEXT)
    NO SQL
    DETERMINISTIC
BEGIN
   

insert into civill_service_eligibility_tbl(UID,TYPE,VALUE)VALUES(UID,'TYPE_OF_EXAMINATION',v1),(UID,'RATING',v2),(UID,'DATE_OF_EXAMINATION',v3),(UID,'LICENSE_NO',v4),(UID,'LICENSE_DATE_OF_VALIDITY',v5);

insert into educational_background_tbl(UID,TYPE,VALUE)VALUES(UID,'LEVEL',v6),(UID,'NAME_OF_SCHOOL',v7),(UID,'BASIC_EDUCATION_DEGREE_COURSE',v8),(UID,'PERIOD_OF_ATTENDANCE_FROM',v9),(UID,'PERIOD_OF_ATTENDANCE_TO',v10),(UID,'HIGHEST_LEVEL_UNITS_EARNED',v11),(UID,'YEAR_GRADUATED',v12),(UID,'SCHOLARSHIP_ACADEMIC_HONORS',v13);

insert into learning_and_development_tbl(UID,TYPE,VALUE)VALUES(UID,'TITLE',v14),(UID,'INCLUSIVE_DATES_FROM',v15),(UID,'INCLUSIVE_DATES_TO',v16),(UID,'NUMBER_OF_HOURS',v17),(UID,'TYPE_OF_LD',v18),(UID,'CONDUCTED_SPONSORED_BY',v19);

insert into other_info_tbl(UID,TYPE,VALUE)VALUES(UID,'SPECIAL_SKILLS',v20),(UID,'HOBIES',v21),(UID,'NONE_ACADEMIC_DISTINCTIONS',v22);

insert into personal_info_tbl(UID,TYPE,VALUE)VALUES(UID,'FIRST_NAME',v23),(UID,'LAST_NAME',v24),(UID,'MIDDLENAME',v25),(UID,'NAME_EXTENSION',v26),(UID,'BIRTH_DATE',v27),(UID,'BIRTH_PLACE',v28),(UID,'SEX',v29),(UID,'CIVIL_STATUS',v30),(UID,'HEIGHT',v31),(UID,'BLOOD_TYPE',v32),(UID,'GSIS_ID_NO',v33),(UID,'PAG_IBIG_NO',v34),(UID,'PHILHEALTH_NO',v35),(UID,'SSS_NO',v36),(UID,'TIN_NO',v37),(UID,'AGENCY_EMPLOYEE_NO',v38),(UID,'CITIZENSHIP',v39),(UID,'RESIDENTIAL_ADDRESS',v40),(UID,'RESIDENTIAL_ZIP_CODE',v41),(UID,'PERMANENT_ADDRESS',v42),(UID,'PERMANENT_ZIP_CODE',v43),(UID,'TELEPHONE_NO',v44),(UID,'MOBILE_NO',v45),(UID,'WEIGHT',v46);

insert into voluntary_work_tbl(UID,TYPE,VALUE)VALUES(UID,'NAME_AND_ADDRESS',v47),(UID,'INCLUSIVE_DATES_FROM',v48),(UID,'INCLUSIVE_DATES_TO',v49),(UID,'NUMBER_OF_HOURS',v50),(UID,'POSITION',v51);

insert into work_experience_tbl(UID,TYPE,VALUE)VALUES(UID,'INCLUSIVE_DATES_FROM',v52),(UID,'INCLUSIVE_DATES_TO',v53),(UID,'POSITION_TITLE',v54),(UID,'DEPARTMENT_AGENCY_OFFICE_COMPANY',v55),(UID,'MONTHLY_SALARY',v56),(UID,'SALARY_JOB_PAY_GRADE',v57),(UID,'STATUS_OF_APPOINTMENT',v58),(UID,'GOVT_SERVICE',v59);


 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_vacancy`(IN `v1` LONGTEXT, IN `v2` LONGTEXT, IN `v3` LONGTEXT, IN `v4` LONGTEXT, IN `v5` LONGTEXT, IN `v6` LONGTEXT, IN `v7` LONGTEXT, IN `v8` LONGTEXT, IN `v9` LONGTEXT)
    NO SQL
BEGIN
     SET @maxno = (SELECT MAX(NO)+9 FROM publish_vacancy_tbl);
     SET @finidwithdecimal = @maxno/9;
     SET @UID =  TRUNCATE(@finidwithdecimal,0);
     SET @THISUID = (CONCAT("PID-000",@UID));

insert into publish_vacancy_tbl(PUID,TYPE,VALUE)VALUES(@THISUID,'TITLE',v1),(@THISUID,'DESCRIPTION',v2),(@THISUID,'PLACE_ASSIGNMENT',v3),(@THISUID,'NOI',v4),(@THISUID,'PUBLICATION_DATE',v5),(@THISUID,'PUBLICATION_DATE_UNTIL',v6),(@THISUID,'STATUS',v7),(@THISUID,'SALARIES',v8),(@THISUID,'ITEM_NO',v9);

 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `personal_info_tbl_pivot_sp`()
    NO SQL
BEGIN
SET @lastname =(SELECT MAX(IF(TYPE = 'LAST_NAME', VALUE, NULL)) FROM personal_info_tbl GROUP BY UID);
SET @firstname =(SELECT MAX(IF(TYPE = 'FIRST_NAME', VALUE, NULL)) FROM personal_info_tbl GROUP BY UID);
SET @middlename =(SELECT MAX(IF(TYPE = 'MIDDLENAME', VALUE, NULL)) FROM personal_info_tbl GROUP BY UID);
SET @extension =(SELECT MAX(IF(TYPE = 'NAME_EXTENSION', VALUE, NULL)) FROM personal_info_tbl GROUP BY UID);

SET @full = CONCAT(@lastname,', ',@firstname,' ',@extension);
SELECT
  UID,
  MAX(IF(TYPE = 'FIRST_NAME', @full, NULL)) AS NAME,
  MAX(IF(TYPE = 'BIRTH_DATE', VALUE, NULL)) AS BIRTH_DATE,
  MAX(IF(TYPE = 'BIRTH_PLACE', VALUE, NULL)) AS BIRTH_PLACE,
   MAX(IF(TYPE = 'SEX', VALUE, NULL)) AS SEX,
    MAX(IF(TYPE = 'CIVIL_STATUS', VALUE, NULL)) AS CIVIL_STATUS,
     MAX(IF(TYPE = 'HEIGHT', VALUE, NULL)) AS HEIGHT,
      MAX(IF(TYPE = 'WEIGHT', VALUE, NULL)) AS WEIGHT,
       MAX(IF(TYPE = 'BLOOD_TYPE', VALUE, NULL)) AS BLOOD_TYPE,
        MAX(IF(TYPE = 'GSIS_ID_NO', VALUE, NULL)) AS GSIS_ID_NO,
         MAX(IF(TYPE = 'PAG_IBIG_NO', VALUE, NULL)) AS PAG_IBIG_NO,
          MAX(IF(TYPE = 'PHILHEALTH_NO', VALUE, NULL)) AS PHIL_HEALTH_NO,
           MAX(IF(TYPE = 'SSS_NO', VALUE, NULL)) AS SSS_NO,
            MAX(IF(TYPE = 'TIN_NO', VALUE, NULL)) AS TIN_NO,
             MAX(IF(TYPE = 'AGENCY_EMPLOYEE_NO', VALUE, NULL)) AS AGENCY_EMPLOYEE_NO,
              MAX(IF(TYPE = 'CITIZENSHIP', VALUE, NULL)) AS CITIZENSHIP,
               MAX(IF(TYPE = 'RESIDENTIAL_ADDRESS', VALUE, NULL)) AS RESIDENTIAL_ADDRESS,
                MAX(IF(TYPE = 'RESIDENTIAL_ZIP_CODE', VALUE, NULL)) AS RESIDENTIAL_ZIPCODE,
                 MAX(IF(TYPE = 'PERMANENT_ADDRESS', VALUE, NULL)) AS PERMANENT_ADDRESS,
                  MAX(IF(TYPE = 'PERMANENT_ZIP_CODE', VALUE, NULL)) AS PERMANENT_ZIP_CODE,
                   MAX(IF(TYPE = 'TELEPHONE_NO', VALUE, NULL)) AS TELEPHONE_NO,
                    MAX(IF(TYPE = 'MOBILE_NO', VALUE, NULL)) AS MOBILE_NO
           
FROM
    personal_info_tbl
 GROUP BY
  UID;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `register_user_insert`(IN `v1` LONGTEXT, IN `v2` LONGTEXT, IN `v3` LONGTEXT, IN `v4` LONGTEXT, IN `v5` LONGTEXT)
BEGIN
     SET @maxno = (SELECT MAX(NO)+5 FROM user_tbl);
     SET @finidwithdecimal = @maxno/5;
     SET @UID =  TRUNCATE(@finidwithdecimal,0);
     SET @THISUID = (CONCAT("TCH-000",@UID));

insert into user_tbl(UID,TYPE,VALUE)VALUES(@THISUID,'EMAIL',v1),(@THISUID,'PWD',v2),(@THISUID,'STATUS',v3),(@THISUID,'KEY',v4),(@THISUID,'ISONLINE',v5);

 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_tbl_pivot_sp`()
    NO SQL
BEGIN
SELECT
  UID,
  MAX(IF(TYPE = 'EMAIL', VALUE, NULL)) AS EMAIL,
  MAX(IF(TYPE = 'PWD', VALUE, NULL)) AS PASSWORD,
  MAX(IF(TYPE = 'STATUS', VALUE, NULL)) AS STATUS,
  MAX(IF(TYPE = 'KEY', VALUE, NULL)) AS ISKEY,
  MAX(IF(TYPE = 'ISONLINE', VALUE, NULL)) AS ONLINE
FROM
    user_tbl
 GROUP BY
  UID;
  
  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `applicants_points`
--

CREATE TABLE IF NOT EXISTS `applicants_points` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `CRITERIA` varchar(255) NOT NULL,
  `VALUE` varchar(45) NOT NULL,
  `EQUIVALENT_POINTS` decimal(11,2) NOT NULL,
  `GRADED_BY` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `application_tbl`
--

CREATE TABLE IF NOT EXISTS `application_tbl` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `PID` varchar(255) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `civill_service_eligibility_tbl`
--

CREATE TABLE IF NOT EXISTS `civill_service_eligibility_tbl` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `VALUE` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `civill_service_eligibility_tbl`
--

INSERT INTO `civill_service_eligibility_tbl` (`NO`, `UID`, `TYPE`, `VALUE`) VALUES
(1, 'TCH-0001', 'TYPE_OF_EXAMINATION', ''),
(2, 'TCH-0001', 'RATING', ''),
(3, 'TCH-0001', 'DATE_OF_EXAMINATION', ''),
(4, 'TCH-0001', 'LICENSE_NO', ''),
(5, 'TCH-0001', 'LICENSE_DATE_OF_VALIDITY', ''),
(6, 'TCH-0002', 'TYPE_OF_EXAMINATION', ''),
(7, 'TCH-0002', 'RATING', ''),
(8, 'TCH-0002', 'DATE_OF_EXAMINATION', ''),
(9, 'TCH-0002', 'LICENSE_NO', ''),
(10, 'TCH-0002', 'LICENSE_DATE_OF_VALIDITY', '');

-- --------------------------------------------------------

--
-- Table structure for table `educational_background_tbl`
--

CREATE TABLE IF NOT EXISTS `educational_background_tbl` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `VALUE` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `educational_background_tbl`
--

INSERT INTO `educational_background_tbl` (`NO`, `UID`, `TYPE`, `VALUE`) VALUES
(1, 'TCH-0001', 'LEVEL', ''),
(2, 'TCH-0001', 'NAME_OF_SCHOOL', ''),
(3, 'TCH-0001', 'BASIC_EDUCATION_DEGREE_COURSE', ''),
(4, 'TCH-0001', 'PERIOD_OF_ATTENDANCE_FROM', ''),
(5, 'TCH-0001', 'PERIOD_OF_ATTENDANCE_TO', ''),
(6, 'TCH-0001', 'HIGHEST_LEVEL_UNITS_EARNED', ''),
(7, 'TCH-0001', 'YEAR_GRADUATED', ''),
(8, 'TCH-0001', 'SCHOLARSHIP_ACADEMIC_HONORS', ''),
(9, 'TCH-0002', 'LEVEL', ''),
(10, 'TCH-0002', 'NAME_OF_SCHOOL', ''),
(11, 'TCH-0002', 'BASIC_EDUCATION_DEGREE_COURSE', ''),
(12, 'TCH-0002', 'PERIOD_OF_ATTENDANCE_FROM', ''),
(13, 'TCH-0002', 'PERIOD_OF_ATTENDANCE_TO', ''),
(14, 'TCH-0002', 'HIGHEST_LEVEL_UNITS_EARNED', ''),
(15, 'TCH-0002', 'YEAR_GRADUATED', ''),
(16, 'TCH-0002', 'SCHOLARSHIP_ACADEMIC_HONORS', '');

-- --------------------------------------------------------

--
-- Table structure for table `learning_and_development_tbl`
--

CREATE TABLE IF NOT EXISTS `learning_and_development_tbl` (
  `NO` int(11) NOT NULL,
  `UID` varchar(45) NOT NULL,
  `TYPE` varchar(45) NOT NULL,
  `VALUE` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `learning_and_development_tbl`
--

INSERT INTO `learning_and_development_tbl` (`NO`, `UID`, `TYPE`, `VALUE`) VALUES
(1, 'TCH-0001', 'TITLE', ''),
(2, 'TCH-0001', 'INCLUSIVE_DATES_FROM', ''),
(3, 'TCH-0001', 'INCLUSIVE_DATES_TO', ''),
(4, 'TCH-0001', 'NUMBER_OF_HOURS', ''),
(5, 'TCH-0001', 'TYPE_OF_LD', ''),
(6, 'TCH-0001', 'CONDUCTED_SPONSORED_BY', ''),
(7, 'TCH-0002', 'TITLE', ''),
(8, 'TCH-0002', 'INCLUSIVE_DATES_FROM', ''),
(9, 'TCH-0002', 'INCLUSIVE_DATES_TO', ''),
(10, 'TCH-0002', 'NUMBER_OF_HOURS', ''),
(11, 'TCH-0002', 'TYPE_OF_LD', ''),
(12, 'TCH-0002', 'CONDUCTED_SPONSORED_BY', '');

-- --------------------------------------------------------

--
-- Table structure for table `other_info_tbl`
--

CREATE TABLE IF NOT EXISTS `other_info_tbl` (
  `NO` int(11) NOT NULL,
  `UID` varchar(45) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `VALUE` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `other_info_tbl`
--

INSERT INTO `other_info_tbl` (`NO`, `UID`, `TYPE`, `VALUE`) VALUES
(1, 'TCH-0001', 'SPECIAL_SKILLS', ''),
(2, 'TCH-0001', 'HOBIES', ''),
(3, 'TCH-0001', 'NONE_ACADEMIC_DISTINCTIONS', ''),
(4, 'TCH-0002', 'SPECIAL_SKILLS', ''),
(5, 'TCH-0002', 'HOBIES', ''),
(6, 'TCH-0002', 'NONE_ACADEMIC_DISTINCTIONS', '');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info_tbl`
--

CREATE TABLE IF NOT EXISTS `personal_info_tbl` (
  `NO` int(11) NOT NULL,
  `UID` varchar(45) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `VALUE` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_info_tbl`
--

INSERT INTO `personal_info_tbl` (`NO`, `UID`, `TYPE`, `VALUE`) VALUES
(1, 'TCH-0001', 'FIRST_NAME', 'ADRIANE CLARK'),
(2, 'TCH-0001', 'LAST_NAME', 'ROMERO'),
(3, 'TCH-0001', 'MIDDLENAME', 'GENITA'),
(4, 'TCH-0001', 'NAME_EXTENSION', ''),
(5, 'TCH-0001', 'BIRTH_DATE', '11-03-1997'),
(6, 'TCH-0001', 'BIRTH_PLACE', 'MANILA'),
(7, 'TCH-0001', 'SEX', 'Male'),
(8, 'TCH-0001', 'CIVIL_STATUS', 'Single'),
(9, 'TCH-0001', 'HEIGHT', '147'),
(10, 'TCH-0001', 'BLOOD_TYPE', 'O'),
(11, 'TCH-0001', 'GSIS_ID_NO', ''),
(12, 'TCH-0001', 'PAG_IBIG_NO', ''),
(13, 'TCH-0001', 'PHILHEALTH_NO', ''),
(14, 'TCH-0001', 'SSS_NO', ''),
(15, 'TCH-0001', 'TIN_NO', ''),
(16, 'TCH-0001', 'AGENCY_EMPLOYEE_NO', ''),
(17, 'TCH-0001', 'CITIZENSHIP', 'Filipino'),
(18, 'TCH-0001', 'RESIDENTIAL_ADDRESS', ''),
(19, 'TCH-0001', 'RESIDENTIAL_ZIP_CODE', ''),
(20, 'TCH-0001', 'PERMANENT_ADDRESS', ''),
(21, 'TCH-0001', 'PERMANENT_ZIP_CODE', ''),
(22, 'TCH-0001', 'TELEPHONE_NO', ''),
(23, 'TCH-0001', 'MOBILE_NO', '09662715987'),
(24, 'TCH-0001', 'WEIGHT', '90lbs'),
(25, 'TCH-0002', 'FIRST_NAME', ''),
(26, 'TCH-0002', 'LAST_NAME', ''),
(27, 'TCH-0002', 'MIDDLENAME', ''),
(28, 'TCH-0002', 'NAME_EXTENSION', ''),
(29, 'TCH-0002', 'BIRTH_DATE', ''),
(30, 'TCH-0002', 'BIRTH_PLACE', ''),
(31, 'TCH-0002', 'SEX', ''),
(32, 'TCH-0002', 'CIVIL_STATUS', ''),
(33, 'TCH-0002', 'HEIGHT', ''),
(34, 'TCH-0002', 'BLOOD_TYPE', ''),
(35, 'TCH-0002', 'GSIS_ID_NO', ''),
(36, 'TCH-0002', 'PAG_IBIG_NO', ''),
(37, 'TCH-0002', 'PHILHEALTH_NO', ''),
(38, 'TCH-0002', 'SSS_NO', ''),
(39, 'TCH-0002', 'TIN_NO', ''),
(40, 'TCH-0002', 'AGENCY_EMPLOYEE_NO', ''),
(41, 'TCH-0002', 'CITIZENSHIP', ''),
(42, 'TCH-0002', 'RESIDENTIAL_ADDRESS', ''),
(43, 'TCH-0002', 'RESIDENTIAL_ZIP_CODE', ''),
(44, 'TCH-0002', 'PERMANENT_ADDRESS', ''),
(45, 'TCH-0002', 'PERMANENT_ZIP_CODE', ''),
(46, 'TCH-0002', 'TELEPHONE_NO', ''),
(47, 'TCH-0002', 'MOBILE_NO', ''),
(48, 'TCH-0002', 'WEIGHT', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `personal_info_tbl_pivot`
--
CREATE TABLE IF NOT EXISTS `personal_info_tbl_pivot` (
`UID` varchar(45)
,`FNAME` longtext
,`LNAME` longtext
,`MID_NAME` longtext
,`NAME_EXTENSION` longtext
,`BIRTH_DATE` longtext
,`BIRTH_PLACE` longtext
,`SEX` longtext
,`CIVIL_STATUS` longtext
,`HEIGHT` longtext
,`WEIGHT` longtext
,`BLOOD_TYPE` longtext
,`GSIS_ID_NO` longtext
,`PAG_IBIG_NO` longtext
,`PHIL_HEALTH_NO` longtext
,`SSS_NO` longtext
,`TIN_NO` longtext
,`AGENCY_EMPLOYEE_NO` longtext
,`CITIZENSHIP` longtext
,`RESIDENTIAL_ADDRESS` longtext
,`RESIDENTIAL_ZIPCODE` longtext
,`PERMANENT_ADDRESS` longtext
,`PERMANENT_ZIP_CODE` longtext
,`TELEPHONE_NO` longtext
,`MOBILE_NO` longtext
);

-- --------------------------------------------------------

--
-- Table structure for table `publish_vacancy_tbl`
--

CREATE TABLE IF NOT EXISTS `publish_vacancy_tbl` (
  `NO` int(11) NOT NULL,
  `PUID` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `VALUE` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publish_vacancy_tbl`
--

INSERT INTO `publish_vacancy_tbl` (`NO`, `PUID`, `TYPE`, `VALUE`) VALUES
(1, 'PID-0001', 'TITLE', 'TEACHER I'),
(2, 'PID-0001', 'DESCRIPTION', 'NEED 1'),
(3, 'PID-0001', 'PLACE_ASSIGNMENT', 'QCPU'),
(4, 'PID-0001', 'NOI', 'QCPU'),
(5, 'PID-0001', 'PUBLICATION_DATE', 'NEED 1'),
(6, 'PID-0001', 'PUBLICATION_DATE_UNTIL', 'NEED 1'),
(7, 'PID-0001', 'STATUS', 'PERMANENT'),
(8, 'PID-0001', 'SALARIES', '20,000'),
(9, 'PID-0001', 'ITEM_NO', '23'),
(10, 'PID-0002', 'TITLE', 'TEACHER I'),
(11, 'PID-0002', 'DESCRIPTION', 'NEED 1 start na'),
(12, 'PID-0002', 'PLACE_ASSIGNMENT', 'brgy san bartolome'),
(13, 'PID-0002', 'NOI', 'qcpu'),
(14, 'PID-0002', 'PUBLICATION_DATE', '01-22-2019'),
(15, 'PID-0002', 'PUBLICATION_DATE_UNTIL', '01-29-2019'),
(16, 'PID-0002', 'STATUS', 'PERMANENT'),
(17, 'PID-0002', 'SALARIES', '21,500'),
(18, 'PID-0002', 'ITEM_NO', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `publish_vacancy_tbl_extended_pivot`
--
CREATE TABLE IF NOT EXISTS `publish_vacancy_tbl_extended_pivot` (
`PUID` varchar(255)
,`TITLE` longtext
,`DESCRIPTION` longtext
,`PLACE_ASSIGNMENT` longtext
,`NOI` longtext
,`PUBLICATION_DATE` longtext
,`PUBLICATION_DATE_UNTIL` longtext
,`STATUS` longtext
,`SALARIES` longtext
,`ITEM_NO` longtext
);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE IF NOT EXISTS `user_tbl` (
  `TYPE` varchar(65) NOT NULL,
  `VALUE` longtext NOT NULL,
  `UID` varchar(45) NOT NULL,
  `NO` int(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`TYPE`, `VALUE`, `UID`, `NO`) VALUES
('EMAIL', 'KOKOCRUNCH@gmail.com', 'TCH-0001', 1),
('PWD', 'mypass', 'TCH-0001', 2),
('STATUS', '1', 'TCH-0001', 3),
('KEY', 'lkqwje,asmnd2', 'TCH-0001', 4),
('ISONLINE', '0', 'TCH-0001', 5),
('EMAIL', 'donna112397@gmail.com', 'TCH-0002', 6),
('PWD', 'P@ssword', 'TCH-0002', 7),
('STATUS', '0', 'TCH-0002', 8),
('KEY', 'lkqwje,asmnd2', 'TCH-0002', 9),
('ISONLINE', '0', 'TCH-0002', 10),
('EMAIL', 'louiejavier0923@gmail.com', 'TCH-0003', 11),
('PWD', 'P@ssword', 'TCH-0003', 12),
('STATUS', '0', 'TCH-0003', 13),
('KEY', 'lkqwje,asmnd2', 'TCH-0003', 14),
('ISONLINE', '0', 'TCH-0003', 15),
('EMAIL', 'flipmusicc@gmail.com', 'TCH-0004', 16),
('PWD', 'P@ssword', 'TCH-0004', 17),
('STATUS', '0', 'TCH-0004', 18),
('KEY', 'lkqwje,asmnd2', 'TCH-0004', 19),
('ISONLINE', '0', 'TCH-0004', 20),
('EMAIL', 'jbclansangan@gmail.com', 'TCH-0005', 21),
('PWD', 'P@ssword', 'TCH-0005', 22),
('STATUS', '0', 'TCH-0005', 23),
('KEY', 'lkqwje,asmnd2', 'TCH-0005', 24),
('ISONLINE', '0', 'TCH-0005', 25),
('EMAIL', 'howhowh@gmail.com', 'TCH-0006', 26),
('PWD', 'P@ssword', 'TCH-0006', 27),
('STATUS', '0', 'TCH-0006', 28),
('KEY', 'lkqwje,asmnd2', 'TCH-0006', 29),
('ISONLINE', '0', 'TCH-0006', 30),
('EMAIL', 'kallos@gmail.com', 'TCH-0007', 31),
('PWD', 'P@ssword', 'TCH-0007', 32),
('STATUS', '0', 'TCH-0007', 33),
('KEY', 'lkqwje,asmnd2', 'TCH-0007', 34),
('ISONLINE', '0', 'TCH-0007', 35),
('EMAIL', 'laurenciano@gmail.com', 'TCH-0008', 36),
('PWD', 'P@ssw0rd', 'TCH-0008', 37),
('STATUS', '0', 'TCH-0008', 38),
('KEY', 'ksanwejn', 'TCH-0008', 39),
('ISONLINE', '0', 'TCH-0008', 40),
('EMAIL', 'newemail', 'TCH-0009', 41),
('PWD', 'P@ssword', 'TCH-0009', 42),
('STATUS', '0', 'TCH-0009', 43),
('KEY', 'qweq', 'TCH-0009', 44),
('ISONLINE', '0', 'TCH-0009', 45),
('EMAIL', 'whatsnew', 'TCH-00010', 46),
('PWD', 'P@ssword', 'TCH-00010', 47),
('STATUS', '0', 'TCH-00010', 48),
('KEY', 'qweq', 'TCH-00010', 49),
('ISONLINE', '0', 'TCH-00010', 50),
('EMAIL', 'kik@gmail.com', 'TCH-00011', 51),
('PWD', 'P@ssword', 'TCH-00011', 52),
('STATUS', '0', 'TCH-00011', 53),
('KEY', 'qweq', 'TCH-00011', 54),
('ISONLINE', '0', 'TCH-00011', 55),
('EMAIL', 'we@gmail.com', 'TCH-00012', 56),
('PWD', 'P@ssword', 'TCH-00012', 57),
('STATUS', '0', 'TCH-00012', 58),
('KEY', 'qweq', 'TCH-00012', 59),
('ISONLINE', '0', 'TCH-00012', 60),
('EMAIL', 'newj@gmail.com', 'TCH-00013', 61),
('PWD', 'P@assword', 'TCH-00013', 62),
('STATUS', '0', 'TCH-00013', 63),
('KEY', 'asdasda', 'TCH-00013', 64),
('ISONLINE', '0', 'TCH-00013', 65),
('EMAIL', 'asd@gmail.com', 'TCH-00014', 66),
('PWD', '2d', 'TCH-00014', 67),
('STATUS', '0', 'TCH-00014', 68),
('KEY', 'dyqwebnqwb', 'TCH-00014', 69),
('ISONLINE', '0', 'TCH-00014', 70),
('EMAIL', 'kupal@gmail.com', 'TCH-00015', 71),
('PWD', '2d', 'TCH-00015', 72),
('STATUS', '0', 'TCH-00015', 73),
('KEY', 'dyqwebnqwb', 'TCH-00015', 74),
('ISONLINE', '0', 'TCH-00015', 75),
('EMAIL', 'hohoho@gmail.com', 'TCH-00016', 76),
('PWD', '2d', 'TCH-00016', 77),
('STATUS', '0', 'TCH-00016', 78),
('KEY', 'dyqwebnqwb', 'TCH-00016', 79),
('ISONLINE', '0', 'TCH-00016', 80),
('EMAIL', 'cocolumber@gmail.com', 'TCH-00017', 81),
('PWD', 'mypass', 'TCH-00017', 82),
('STATUS', '0', 'TCH-00017', 83),
('KEY', 'dyqwebnqwb', 'TCH-00017', 84),
('ISONLINE', '0', 'TCH-00017', 85);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_tbl_pivot`
--
CREATE TABLE IF NOT EXISTS `user_tbl_pivot` (
`UID` varchar(45)
,`EMAIL` longtext
,`PASSWORD` longtext
,`STATUS` longtext
,`ISKEY` longtext
,`ONLINE` longtext
);

-- --------------------------------------------------------

--
-- Table structure for table `voluntary_work_tbl`
--

CREATE TABLE IF NOT EXISTS `voluntary_work_tbl` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `VALUE` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voluntary_work_tbl`
--

INSERT INTO `voluntary_work_tbl` (`NO`, `UID`, `TYPE`, `VALUE`) VALUES
(1, 'TCH-0001', 'NAME_AND_ADDRESS', ''),
(2, 'TCH-0001', 'INCLUSIVE_DATES_FROM', ''),
(3, 'TCH-0001', 'INCLUSIVE_DATES_TO', ''),
(4, 'TCH-0001', 'NUMBER_OF_HOURS', ''),
(5, 'TCH-0001', 'POSITION', ''),
(6, 'TCH-0002', 'NAME_AND_ADDRESS', ''),
(7, 'TCH-0002', 'INCLUSIVE_DATES_FROM', ''),
(8, 'TCH-0002', 'INCLUSIVE_DATES_TO', ''),
(9, 'TCH-0002', 'NUMBER_OF_HOURS', ''),
(10, 'TCH-0002', 'POSITION', '');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience_tbl`
--

CREATE TABLE IF NOT EXISTS `work_experience_tbl` (
  `NO` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `VALUE` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_experience_tbl`
--

INSERT INTO `work_experience_tbl` (`NO`, `UID`, `TYPE`, `VALUE`) VALUES
(1, 'TCH-0001', 'INCLUSIVE_DATES_FROM', ''),
(2, 'TCH-0001', 'INCLUSIVE_DATES_TO', ''),
(3, 'TCH-0001', 'POSITION_TITLE', ''),
(4, 'TCH-0001', 'DEPARTMENT_AGENCY_OFFICE_COMPANY', ''),
(5, 'TCH-0001', 'MONTHLY_SALARY', ''),
(6, 'TCH-0001', 'SALARY_JOB_PAY_GRADE', ''),
(7, 'TCH-0001', 'STATUS_OF_APPOINTMENT', ''),
(8, 'TCH-0001', 'GOVT_SERVICE', ''),
(9, 'TCH-0002', 'INCLUSIVE_DATES_FROM', ''),
(10, 'TCH-0002', 'INCLUSIVE_DATES_TO', ''),
(11, 'TCH-0002', 'POSITION_TITLE', ''),
(12, 'TCH-0002', 'DEPARTMENT_AGENCY_OFFICE_COMPANY', ''),
(13, 'TCH-0002', 'MONTHLY_SALARY', ''),
(14, 'TCH-0002', 'SALARY_JOB_PAY_GRADE', ''),
(15, 'TCH-0002', 'STATUS_OF_APPOINTMENT', ''),
(16, 'TCH-0002', 'GOVT_SERVICE', '');

-- --------------------------------------------------------

--
-- Structure for view `personal_info_tbl_pivot`
--
DROP TABLE IF EXISTS `personal_info_tbl_pivot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `personal_info_tbl_pivot` AS (select `personal_info_tbl`.`UID` AS `UID`,max(if((`personal_info_tbl`.`TYPE` = 'FIRST_NAME'),`personal_info_tbl`.`VALUE`,NULL)) AS `FNAME`,max(if((`personal_info_tbl`.`TYPE` = 'LAST_NAME'),`personal_info_tbl`.`VALUE`,NULL)) AS `LNAME`,max(if((`personal_info_tbl`.`TYPE` = 'MIDDLENAME'),`personal_info_tbl`.`VALUE`,NULL)) AS `MID_NAME`,max(if((`personal_info_tbl`.`TYPE` = 'NAME_EXTENSION'),`personal_info_tbl`.`VALUE`,NULL)) AS `NAME_EXTENSION`,max(if((`personal_info_tbl`.`TYPE` = 'BIRTH_DATE'),`personal_info_tbl`.`VALUE`,NULL)) AS `BIRTH_DATE`,max(if((`personal_info_tbl`.`TYPE` = 'BIRTH_PLACE'),`personal_info_tbl`.`VALUE`,NULL)) AS `BIRTH_PLACE`,max(if((`personal_info_tbl`.`TYPE` = 'SEX'),`personal_info_tbl`.`VALUE`,NULL)) AS `SEX`,max(if((`personal_info_tbl`.`TYPE` = 'CIVIL_STATUS'),`personal_info_tbl`.`VALUE`,NULL)) AS `CIVIL_STATUS`,max(if((`personal_info_tbl`.`TYPE` = 'HEIGHT'),`personal_info_tbl`.`VALUE`,NULL)) AS `HEIGHT`,max(if((`personal_info_tbl`.`TYPE` = 'WEIGHT'),`personal_info_tbl`.`VALUE`,NULL)) AS `WEIGHT`,max(if((`personal_info_tbl`.`TYPE` = 'BLOOD_TYPE'),`personal_info_tbl`.`VALUE`,NULL)) AS `BLOOD_TYPE`,max(if((`personal_info_tbl`.`TYPE` = 'GSIS_ID_NO'),`personal_info_tbl`.`VALUE`,NULL)) AS `GSIS_ID_NO`,max(if((`personal_info_tbl`.`TYPE` = 'PAG_IBIG_NO'),`personal_info_tbl`.`VALUE`,NULL)) AS `PAG_IBIG_NO`,max(if((`personal_info_tbl`.`TYPE` = 'PHILHEALTH_NO'),`personal_info_tbl`.`VALUE`,NULL)) AS `PHIL_HEALTH_NO`,max(if((`personal_info_tbl`.`TYPE` = 'SSS_NO'),`personal_info_tbl`.`VALUE`,NULL)) AS `SSS_NO`,max(if((`personal_info_tbl`.`TYPE` = 'TIN_NO'),`personal_info_tbl`.`VALUE`,NULL)) AS `TIN_NO`,max(if((`personal_info_tbl`.`TYPE` = 'AGENCY_EMPLOYEE_NO'),`personal_info_tbl`.`VALUE`,NULL)) AS `AGENCY_EMPLOYEE_NO`,max(if((`personal_info_tbl`.`TYPE` = 'CITIZENSHIP'),`personal_info_tbl`.`VALUE`,NULL)) AS `CITIZENSHIP`,max(if((`personal_info_tbl`.`TYPE` = 'RESIDENTIAL_ADDRESS'),`personal_info_tbl`.`VALUE`,NULL)) AS `RESIDENTIAL_ADDRESS`,max(if((`personal_info_tbl`.`TYPE` = 'RESIDENTIAL_ZIP_CODE'),`personal_info_tbl`.`VALUE`,NULL)) AS `RESIDENTIAL_ZIPCODE`,max(if((`personal_info_tbl`.`TYPE` = 'PERMANENT_ADDRESS'),`personal_info_tbl`.`VALUE`,NULL)) AS `PERMANENT_ADDRESS`,max(if((`personal_info_tbl`.`TYPE` = 'PERMANENT_ZIP_CODE'),`personal_info_tbl`.`VALUE`,NULL)) AS `PERMANENT_ZIP_CODE`,max(if((`personal_info_tbl`.`TYPE` = 'TELEPHONE_NO'),`personal_info_tbl`.`VALUE`,NULL)) AS `TELEPHONE_NO`,max(if((`personal_info_tbl`.`TYPE` = 'MOBILE_NO'),`personal_info_tbl`.`VALUE`,NULL)) AS `MOBILE_NO` from `personal_info_tbl` group by `personal_info_tbl`.`UID`);

-- --------------------------------------------------------

--
-- Structure for view `publish_vacancy_tbl_extended_pivot`
--
DROP TABLE IF EXISTS `publish_vacancy_tbl_extended_pivot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `publish_vacancy_tbl_extended_pivot` AS (select `publish_vacancy_tbl`.`PUID` AS `PUID`,max(if((`publish_vacancy_tbl`.`TYPE` = 'TITLE'),`publish_vacancy_tbl`.`VALUE`,NULL)) AS `TITLE`,max(if((`publish_vacancy_tbl`.`TYPE` = 'DESCRIPTION'),`publish_vacancy_tbl`.`VALUE`,NULL)) AS `DESCRIPTION`,max(if((`publish_vacancy_tbl`.`TYPE` = 'PLACE_ASSIGNMENT'),`publish_vacancy_tbl`.`VALUE`,NULL)) AS `PLACE_ASSIGNMENT`,max(if((`publish_vacancy_tbl`.`TYPE` = 'NOI'),`publish_vacancy_tbl`.`VALUE`,NULL)) AS `NOI`,max(if((`publish_vacancy_tbl`.`TYPE` = 'PUBLICATION_DATE'),`publish_vacancy_tbl`.`VALUE`,NULL)) AS `PUBLICATION_DATE`,max(if((`publish_vacancy_tbl`.`TYPE` = 'PUBLICATION_DATE_UNTIL'),`publish_vacancy_tbl`.`VALUE`,NULL)) AS `PUBLICATION_DATE_UNTIL`,max(if((`publish_vacancy_tbl`.`TYPE` = 'STATUS'),`publish_vacancy_tbl`.`VALUE`,NULL)) AS `STATUS`,max(if((`publish_vacancy_tbl`.`TYPE` = 'SALARIES'),`publish_vacancy_tbl`.`VALUE`,NULL)) AS `SALARIES`,max(if((`publish_vacancy_tbl`.`TYPE` = 'ITEM_NO'),`publish_vacancy_tbl`.`VALUE`,NULL)) AS `ITEM_NO` from `publish_vacancy_tbl` group by `publish_vacancy_tbl`.`PUID`);

-- --------------------------------------------------------

--
-- Structure for view `user_tbl_pivot`
--
DROP TABLE IF EXISTS `user_tbl_pivot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_tbl_pivot` AS (select `user_tbl`.`UID` AS `UID`,max(if((`user_tbl`.`TYPE` = 'EMAIL'),`user_tbl`.`VALUE`,NULL)) AS `EMAIL`,max(if((`user_tbl`.`TYPE` = 'PWD'),`user_tbl`.`VALUE`,NULL)) AS `PASSWORD`,max(if((`user_tbl`.`TYPE` = 'STATUS'),`user_tbl`.`VALUE`,NULL)) AS `STATUS`,max(if((`user_tbl`.`TYPE` = 'KEY'),`user_tbl`.`VALUE`,NULL)) AS `ISKEY`,max(if((`user_tbl`.`TYPE` = 'ISONLINE'),`user_tbl`.`VALUE`,NULL)) AS `ONLINE` from `user_tbl` group by `user_tbl`.`UID`)

;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants_points`
--
ALTER TABLE `applicants_points`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `application_tbl`
--
ALTER TABLE `application_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `civill_service_eligibility_tbl`
--
ALTER TABLE `civill_service_eligibility_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `educational_background_tbl`
--
ALTER TABLE `educational_background_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `learning_and_development_tbl`
--
ALTER TABLE `learning_and_development_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `other_info_tbl`
--
ALTER TABLE `other_info_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `personal_info_tbl`
--
ALTER TABLE `personal_info_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `publish_vacancy_tbl`
--
ALTER TABLE `publish_vacancy_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `voluntary_work_tbl`
--
ALTER TABLE `voluntary_work_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `work_experience_tbl`
--
ALTER TABLE `work_experience_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants_points`
--
ALTER TABLE `applicants_points`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `application_tbl`
--
ALTER TABLE `application_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `civill_service_eligibility_tbl`
--
ALTER TABLE `civill_service_eligibility_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `educational_background_tbl`
--
ALTER TABLE `educational_background_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `learning_and_development_tbl`
--
ALTER TABLE `learning_and_development_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `other_info_tbl`
--
ALTER TABLE `other_info_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `personal_info_tbl`
--
ALTER TABLE `personal_info_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `publish_vacancy_tbl`
--
ALTER TABLE `publish_vacancy_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `NO` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `voluntary_work_tbl`
--
ALTER TABLE `voluntary_work_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `work_experience_tbl`
--
ALTER TABLE `work_experience_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
