-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 12:38 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sen`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE IF NOT EXISTS `achievement` (
  `uid` bigint(20) NOT NULL,
  `ach` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `uid` bigint(20) NOT NULL,
  `block` int(11) DEFAULT NULL,
  `room` int(4) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alma`
--

CREATE TABLE IF NOT EXISTS `alma` (
  `uid` bigint(20) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `ins_name` varchar(255) NOT NULL,
  `des` text,
  PRIMARY KEY (`uid`,`type`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alma`
--

INSERT INTO `alma` (`uid`, `year`, `type`, `ins_name`, `des`) VALUES
(201201003, 2010, 3, 'daiict', 'adsa'),
(201201003, 2012, 4, 'iimsc', 'adsa'),
(201201003, 2015, 5, 'cmiefsfs', 'adsa'),
(201201189, 2012, 3, 'asd', 'asda'),
(201201219, 2010, 1, 'ananad', 'adsa'),
(201201219, 2012, 2, 'anand2', 'adsa'),
(201201219, 2012, 3, 'DAIICT', 'adsa'),
(201201221, 2010, 1, 'k v No 2 Delhi', 'NULL'),
(201201221, 2012, 2, 'K V 31 chandigarh', 'NULL'),
(201201221, 2016, 3, 'DAIICT', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `c_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dis_id` bigint(20) NOT NULL,
  `u_id` bigint(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `c_id` (`c_id`),
  KEY `dis_id` (`dis_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `credits` varchar(100) NOT NULL,
  `abstract` text NOT NULL,
  `link_lf` varchar(255) DEFAULT NULL,
  `office_hours` varchar(255) DEFAULT NULL,
  `lecture_days` varchar(255) DEFAULT NULL,
  `instructor` bigint(20) NOT NULL,
  `books` text,
  `description` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `instructor` (`instructor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_code`, `semester`, `credits`, `abstract`, `link_lf`, `office_hours`, `lecture_days`, `instructor`, `books`, `description`, `link`) VALUES
(2, 'Intro to C', 'IT-105', 1, '3-0-2-4', 'asda', 'dasd', 'asda', 'ada', 201201221, 'asda', '', ''),
(3, 'intro to el', 'EL-105', 2, '1sda', 'sad', 'sfa', 'dsfa', 'daf', 201201154, 'asdfa', '', ''),
(4, 'HM-105', 'asd', 3, 'asda', 'asd', 'ada', 'aasda', 'adsa', 201201189, 'asdada', '', ''),
(5, 'asd', 'IT-201', 3, 'asda', 'asd', 'aa', 'aaaaaa', 'aaaaaaa', 27, 'asdasd', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `discuss`
--

CREATE TABLE IF NOT EXISTS `discuss` (
  `dis_id` bigint(20) NOT NULL,
  `uid` bigint(11) NOT NULL,
  `type` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `title` text NOT NULL,
  `detail` text,
  PRIMARY KEY (`dis_id`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE IF NOT EXISTS `enrolled` (
  `course_id` int(11) NOT NULL,
  `students_id` bigint(20) NOT NULL,
  PRIMARY KEY (`course_id`,`students_id`),
  KEY `students_id` (`students_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hash_aoi`
--

CREATE TABLE IF NOT EXISTS `hash_aoi` (
  `int_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `interest` varchar(100) NOT NULL,
  PRIMARY KEY (`int_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `uid` bigint(20) NOT NULL,
  `f_name` varchar(20) COLLATE latin1_bin NOT NULL,
  `m_name` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `l_name` varchar(20) COLLATE latin1_bin NOT NULL,
  `dsg` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `other_email` varchar(30) COLLATE latin1_bin DEFAULT NULL,
  `web_url` varchar(100) COLLATE latin1_bin DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `details` text COLLATE latin1_bin,
  `contact` bigint(20) NOT NULL,
  `yoj` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`uid`, `f_name`, `m_name`, `l_name`, `dsg`, `other_email`, `web_url`, `sex`, `details`, `contact`, `yoj`) VALUES
(27, 'Saurabh', '', 'Modh', '0', 'an@ajs.com', '', 1, 'adfsdkjfhaskdjfhn', 0, 0),
(201201001, 'Tom', '', 'Jerry', 'Er.', 'sa@asj.com', 'dasd', 1, 'asjdna asdjankda', 0, 0),
(201201002, 'Sylvestor', '', 'Stallon', 'Dr', 'sda@afs.com', 'asdajnjk', 1, 'sda', 8128758351, 2010),
(201201003, 'Rahul', '', 'Muthu', 'Prof', 'asdlna@sdjfn.com', '', 1, '', 8128758351, 2012),
(201201189, 'Anup', '', 'Rai', '0', 'sadfas@asdfa.sadfa', '', 1, 'sdfasffsa', 0, 0),
(201201192, 'Jayant', '', 'Pareek', '0', 'asd@lakn.com', 'fdkasjdn', 1, 'kjdnfa jksdfnal', 0, 0),
(201201219, 'Miten', 'Ravin', 'Shah', 'Mr.', 'ajdba@dsfkj.com', 'nksdajfbk', 1, 'jsafk', 94546469846, 2012),
(201201221, 'Anup', 'kumar', 'Rai', 'Dr. ', 'ajd@asd.com', 'asdajnjk', 1, 'asdahj ', 8128758351, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `uid` bigint(20) NOT NULL,
  `temp_pwd` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `temp_pwd`, `pwd`) VALUES
(27, 'sfds', ',mdsf,sd'),
(201201001, 'asda', 'asda'),
(201201002, 'sad', 'asda'),
(201201003, 'asd', '`dsfsa'),
(201201154, '201201154', '201201155'),
(201201189, 'Doekjdjhfjk', 'qwerty12345'),
(201201192, 'asdkml', 'lkasdal'),
(201201219, 'sfdjkl', 'sdlknfls'),
(201201221, '201201221', '201201220');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `pro_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `des` text,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `guide` varchar(255) DEFAULT NULL,
  `funding_org` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pro_id`, `title`, `des`, `from`, `to`, `guide`, `funding_org`, `timestamp`) VALUES
(1, 'lalala', 'no need', '2015-04-07', '2015-04-28', '201201001', 'Microsoft', '2015-04-06 08:27:23'),
(2, 'sdafkjol', 'ldsifnsl', NULL, NULL, '201201001', 'ajsdnkal', '0000-00-00 00:00:00'),
(3, 'asdaj', 'saldkn', NULL, NULL, '201201221', 'asdaads', '2015-04-05 17:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `authors` text NOT NULL,
  `topic` text NOT NULL,
  `abstract` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `conference` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `journel` text,
  `pub_id` bigint(20) NOT NULL,
  PRIMARY KEY (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publications_user`
--

CREATE TABLE IF NOT EXISTS `publications_user` (
  `pub_id` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  PRIMARY KEY (`pub_id`,`uid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rel_proj_login`
--

CREATE TABLE IF NOT EXISTS `rel_proj_login` (
  `pid` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  PRIMARY KEY (`pid`,`uid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_proj_login`
--

INSERT INTO `rel_proj_login` (`pid`, `uid`) VALUES
(1, 201201003),
(1, 201201192),
(1, 201201221);

-- --------------------------------------------------------

--
-- Table structure for table `rel_uid_aoi`
--

CREATE TABLE IF NOT EXISTS `rel_uid_aoi` (
  `uid` bigint(20) NOT NULL,
  `int` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`,`int`),
  KEY `int` (`int`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_uid_aoi`
--

INSERT INTO `rel_uid_aoi` (`uid`, `int`) VALUES
(201201219, 'ahjdkak'),
(201201001, 'akjsa'),
(201201002, 'akjsa'),
(201201003, 'alskdmn'),
(201201001, 'asadkjna'),
(201201002, 'asadkjna'),
(201201002, 'asda'),
(201201001, 'asjdkan'),
(201201002, 'asjdkan'),
(201201003, 'askdal'),
(201201221, 'gaga'),
(201201221, 'Graph_Theory'),
(201201192, 'jasfn'),
(201201219, 'jsfbk'),
(201201219, 'kasdk'),
(201201221, 'lal'),
(201201192, 'liada'),
(201201221, 'papa'),
(201201192, 'sjkdnfa');

-- --------------------------------------------------------

--
-- Table structure for table `research_feild`
--

CREATE TABLE IF NOT EXISTS `research_feild` (
  `uid` bigint(20) NOT NULL,
  `research` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`,`research`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tas`
--

CREATE TABLE IF NOT EXISTS `tas` (
  `course_id` int(11) NOT NULL,
  `uid` bigint(20) NOT NULL,
  PRIMARY KEY (`course_id`,`uid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_user`
--

CREATE TABLE IF NOT EXISTS `type_user` (
  `uid` bigint(20) NOT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `achievement_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `alma`
--
ALTER TABLE `alma`
  ADD CONSTRAINT `alma_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`dis_id`) REFERENCES `discuss` (`dis_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `login` (`uid`) ON DELETE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`instructor`) REFERENCES `login` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discuss`
--
ALTER TABLE `discuss`
  ADD CONSTRAINT `discuss_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE NO ACTION;

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `enrolled_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `enrolled_ibfk_2` FOREIGN KEY (`students_id`) REFERENCES `login` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `publications_user`
--
ALTER TABLE `publications_user`
  ADD CONSTRAINT `publications_user_ibfk_1` FOREIGN KEY (`pub_id`) REFERENCES `publications` (`pub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publications_user_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `rel_proj_login`
--
ALTER TABLE `rel_proj_login`
  ADD CONSTRAINT `rel_proj_login_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `project` (`pro_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `rel_proj_login_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rel_uid_aoi`
--
ALTER TABLE `rel_uid_aoi`
  ADD CONSTRAINT `rel_uid_aoi_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `research_feild`
--
ALTER TABLE `research_feild`
  ADD CONSTRAINT `research_feild_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tas`
--
ALTER TABLE `tas`
  ADD CONSTRAINT `tas_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tas_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `type_user`
--
ALTER TABLE `type_user`
  ADD CONSTRAINT `type_user_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
