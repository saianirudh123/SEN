-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2015 at 12:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
  `ach` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `uid` bigint(20) NOT NULL,
  `block` int(11) DEFAULT NULL,
  `room` int(4) DEFAULT NULL
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
  `des` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alma`
--

INSERT INTO `alma` (`uid`, `year`, `type`, `ins_name`, `des`) VALUES
(201201003, 2010, 3, 'daiict', 'adsa'),
(201201003, 2012, 4, 'iimsc', 'adsa'),
(201201003, 2015, 5, 'cmiefsfs', 'adsa'),
(201201154, 1, 1, 'bvn', 'adsa'),
(201201154, 2, 2, 'vnbvn', 'adsa'),
(201201154, 2, 3, 'vnbvnb', 'adsa'),
(201201154, 2, 4, 'nbvnb', 'adsa'),
(201201189, 2012, 3, 'asd', 'asda'),
(201201206, 1, 1, 'bnn', 'adsa'),
(201201206, 2, 2, 'bnvn', 'adsa'),
(201201206, 2, 3, 'bvnb', 'adsa'),
(201201206, 3, 4, 'bmnb', 'adsa'),
(201201214, 2012, 1, 'DA', 'adsa'),
(201201214, 2012, 2, 'DA', 'adsa'),
(201201214, 2012, 3, 'ualma', 'adsa'),
(201201214, 2012, 4, 'DA', 'adsa'),
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
`c_id` bigint(20) NOT NULL,
  `dis_id` bigint(20) NOT NULL,
  `u_id` bigint(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `credits` varchar(100) NOT NULL,
  `TAs` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `link` text,
  `outline` varchar(255) DEFAULT NULL,
  `lecture_days` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_code`, `stream`, `year`, `semester`, `credits`, `TAs`, `description`, `link`, `outline`, `lecture_days`, `instructor`) VALUES
(48, 'Artificial Intelligence-1', 'IT-100', '', '', 'Winter', '3-0-0-4', 'asd', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(50, 'Artificial Intelligence-2', 'IT-101', '', '', 'Winter', '3-0-0-4', 'asdasd', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(51, 'Artificial Intelligence-3', 'IT-102', '', '', 'Winter', '3-0-0-4', 'adas', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(52, 'Artificial Intelligence', 'EL-102', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(53, 'Artificial Intelligence', 'EL-101', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(54, 'Artificial Intelligence', 'EL-100', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(55, 'Artificial Intelligence', 'CT-100', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(56, 'Artificial Intelligence', 'CT-101', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(57, 'Artificial Intelligence', 'CT-102', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(58, 'Artificial Intelligence', 'SC-102', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(59, 'Artificial Intelligence', 'SC-101', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(60, 'Artificial Intelligence', 'SC-100', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(61, 'Artificial Intelligence', 'PC-100', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(62, 'Artificial Intelligence', 'PC-101', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(63, 'Artificial Intelligence', 'PC-102', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(64, 'Artificial Intelligence', 'HM-100', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(65, 'Artificial Intelligence', 'HM-101', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(66, 'Artificial Intelligence', 'HM-102', '', '', 'Winter', '3-0-0-4', 'Dushyant', 'A brief decription of the course goes in here...', 'https://www.google.co.in/new', NULL, NULL, '0'),
(67, 'asd1', 'asd2', '', '3rd,4th', 'Winter,Sum', 'asd3', 'asd5', 'asd6', 'https://www.google.co.in/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=game+of+thrones+time+ist', NULL, 'Mon', '0'),
(68, 'qwerty1', 'qwerty2', '', '1st,2nd,3rd,4th', 'Winter,Aut', 'qwerty3', 'qwerty5', 'qwerty6', 'http://www.hindustantimes.com/television/game-of-thrones-season-5-in-india/article1-1335930.aspx', 'course_outline/2538d41d8cd98f00b204e9800998ecf8427e4084.', 'Mon,Tue,Wed,Thu,Fri', '0'),
(69, 'qwerty1', 'qwerty2', '', '1st,2nd,3rd,4th', 'Winter,Aut', 'qwerty3', 'qwerty5', 'qwerty6', 'http://www.hindustantimes.com/television/game-of-thrones-season-5-in-india/article1-1335930.aspx', 'course_outline/9294d41d8cd98f00b204e9800998ecf8427e4121.', 'Mon,Tue,Wed,Thu,Fri', '0'),
(70, 'qwerty1', 'qwerty2', '', '1st,2nd,3rd,4th', 'Winter,Aut', 'qwerty3', 'qwerty5', 'qwerty6', 'http://www.hindustantimes.com/television/game-of-thrones-season-5-in-india/article1-1335930.aspx', 'course_outline/3612d41d8cd98f00b204e9800998ecf8427e8019.', 'Mon,Tue,Wed,Thu,Fri', 'qwerty4'),
(71, 'iit', 'it342', '', '1st,2nd,3rd,4th', 'Winter,Autumn,Summer', 'asdas', 'sadsa', 'sdaasdsa', 'http://www.hindustantimes.com/television/game-of-thrones-season-5-in-india/article1-1335930.aspx', 'course_outline/3151499e21f1f4aae5fa2603d775554ea0307002.php', 'Mon,Tue,Wed,Thu,Fri', 'asdsaasdsa'),
(72, 'sjfklsdkfl', 'hm-sfasf', 'B.Tech.(Honors)', '1st,2nd', 'Winter', '3-0-0-3', 'safsa', 'asdfsdafds', 'https://web.whatsapp.com/', 'course_outline/4795247a392b26527032301fa007d790780c9192.sql', 'Tue,Wed', 'safas');

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
  `detail` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE IF NOT EXISTS `enrolled` (
  `course_id` int(11) NOT NULL,
  `students_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fanswer`
--

CREATE TABLE IF NOT EXISTS `fanswer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `uid` bigint(20) NOT NULL,
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fanswer`
--

INSERT INTO `fanswer` (`question_id`, `uid`, `a_id`, `a_answer`, `a_datetime`) VALUES
(31, 201201206, 1, 'I know , tell me', '12/04/15 02:36:22'),
(31, 201201206, 2, '1234567890', '12/04/15 02:40:04'),
(31, 201201206, 3, 'hello', '12/04/15 10:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `fquestions`
--

CREATE TABLE IF NOT EXISTS `fquestions` (
`id` int(4) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fquestions`
--

INSERT INTO `fquestions` (`id`, `uid`, `topic`, `detail`, `datetime`, `view`, `reply`) VALUES
(31, 201201206, 'Microwave', 'Describe', '12/04/15 02:35:56', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hash_aoi`
--

CREATE TABLE IF NOT EXISTS `hash_aoi` (
`int_id` bigint(20) NOT NULL,
  `interest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `yoj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`uid`, `f_name`, `m_name`, `l_name`, `dsg`, `other_email`, `web_url`, `sex`, `details`, `contact`, `yoj`) VALUES
(27, 'Saurabh', '', 'Modh', '0', 'an@ajs.com', '', 1, 'adfsdkjfhaskdjfhn', 0, 0),
(201201001, 'Tom', '', 'Jerry', 'Er.', 'sa@asj.com', 'dasd', 1, 'asjdna asdjankda', 0, 0),
(201201002, 'Sylvestor', '', 'Stallon', 'Dr', 'sda@afs.com', 'asdajnjk', 1, 'sda', 8128758351, 2010),
(201201003, 'Rahul', '', 'Muthu', 'Prof', 'asdlna@sdjfn.com', '', 1, '', 8128758351, 2012),
(201201154, 'bbn', 'm', 'nm', 'fbsdfb', 'bnm@daiict.ac.in', 'vnbnb', 0, 'nnm', 12315123, 2014),
(201201189, 'Anup', '', 'Rai', '0', 'sadfas@asdfa.sadfa', '', 1, 'sdfasffsa', 0, 0),
(201201192, 'Jayant', '', 'Pareek', '0', 'asd@lakn.com', 'fdkasjdn', 1, 'kjdnfa jksdfnal', 0, 0),
(201201206, 'Saurabh', '', 'Modh', 'Er.', '201201206@daiict.ac.in', 'https://www.youtube.com/watch?v=xug3oU072KA', 0, 'romantic ', 1234567890, 2012),
(201201214, 'Shravya', '', 'Reddy', 'Er.', '201201206@daiict.ac.in', 'facebook/shravya.com', 0, 'VHgvhjvg', 1234567890, 2012),
(201201219, 'Miten', 'Ravin', 'Shah', 'Mr.', 'ajdba@dsfkj.com', 'nksdajfbk', 1, 'jsafk', 94546469846, 2012),
(201201221, 'Anup', 'kumar', 'Rai', 'Dr. ', 'ajd@asd.com', 'asdajnjk', 1, 'asdahj ', 8128758351, 0),
(201201229, '', '', '', '', '', '', 0, '', 0, 0),
(201411049, 'R', '', 'saha', '', '', '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `course_id` int(11) NOT NULL,
  `uid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `uid` bigint(20) NOT NULL,
  `temp_pwd` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `temp_pwd`, `pwd`) VALUES
(27, 'sfds', ',mdsf,sd'),
(201200212, 'F7ANStdFn6', ''),
(201201001, 'asda', 'asda'),
(201201002, 'sad', 'asda'),
(201201003, 'asd', '`dsfsa'),
(201201154, '201201154', '201201155'),
(201201183, 'zCiT2zyXb6', ''),
(201201189, 'Doekjdjhfjk', 'qwerty12345'),
(201201192, 'asdkml', 'lkasdal'),
(201201206, 'yO072d4FY6', '201201206'),
(201201214, 'YRDc8U978S', ''),
(201201218, 'BwCVO2qg1v', ''),
(201201219, 'sfdjkl', 'sdlknfls'),
(201201221, '201201221', '201201220'),
(201201229, 'GsVqfUgAbS', ''),
(201411049, 'w6GQkRM4Mw', '');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `uid` bigint(20) NOT NULL,
  `positions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`uid`, `positions`) VALUES
(201201206, 'jandkadja');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`pro_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `des` text,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `guide` varchar(255) DEFAULT NULL,
  `funding_org` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pro_id`, `title`, `des`, `from`, `to`, `guide`, `funding_org`, `timestamp`, `type`) VALUES
(1, 'lalala', 'no need', '2015-04-07', '2015-04-28', '201201001', 'Microsoft', '2015-04-09 10:29:57', 0),
(2, 'sdafkjol', 'ldsifnsl', '2015-04-15', '2015-04-23', '201201001', 'ajsdnkal', '2015-04-09 09:56:54', 1),
(3, 'asdaj', 'saldkn', '2015-04-17', '2015-04-14', '201201001', 'asdaads', '2015-04-09 10:32:24', 2),
(4, 'new proj', 'adas', '2015-04-23', '2015-04-08', '201201001', 'dsfsd', '2015-04-09 10:33:17', 0);

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
  `pub_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`authors`, `topic`, `abstract`, `link`, `conference`, `date`, `status`, `journel`, `pub_id`) VALUES
('name 1 , name 2', 'Microwave Topic', 'simple des.', 'www.google.com', 'Discussed at academic union', '2015-04-15', 'Pending', 'Published in Harvard Sept issue', 1),
('name 1 , name 3', 'Microwave2 Topic', 'simple des.', 'www.google.com', 'Discussed at academic union', '2015-04-15', 'Pending', 'Published in Harvard Sept issue', 2),
('name 1 , name 4', 'Microwave3 Topic', 'simple des.', 'www.google.com', 'Discussed at academic union', '2015-04-15', 'Pending', 'Published in Harvard Sept issue', 3);

-- --------------------------------------------------------

--
-- Table structure for table `publications_user`
--

CREATE TABLE IF NOT EXISTS `publications_user` (
  `pub_id` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publications_user`
--

INSERT INTO `publications_user` (`pub_id`, `uid`) VALUES
(1, 201201221),
(2, 201201221);

-- --------------------------------------------------------

--
-- Table structure for table `rel_proj_login`
--

CREATE TABLE IF NOT EXISTS `rel_proj_login` (
  `pid` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rel_uid_aoi`
--

CREATE TABLE IF NOT EXISTS `rel_uid_aoi` (
  `uid` bigint(20) NOT NULL,
  `int` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_uid_aoi`
--

INSERT INTO `rel_uid_aoi` (`uid`, `int`) VALUES
(201201002, ''),
(201201206, ''),
(201201229, ''),
(201411049, ''),
(201201206, ' boys'),
(201201206, ' others'),
(201201219, 'ahjdkak'),
(201201214, 'AI'),
(201201001, 'akjsa'),
(201201002, 'akjsa'),
(201201003, 'alskdmn'),
(201201001, 'asadkjna'),
(201201002, 'asadkjna'),
(201201002, 'asda'),
(201201001, 'asjdkan'),
(201201002, 'asjdkan'),
(201201003, 'askdal'),
(201201154, 'bmn'),
(201201214, 'Dancing'),
(201201214, 'Fashion'),
(201201221, 'gaga'),
(201201206, 'Girls'),
(201201221, 'Graph_Theory'),
(201201192, 'jasfn'),
(201201219, 'jsfbk'),
(201201219, 'kasdk'),
(201201221, 'lal'),
(201201192, 'liada'),
(201201206, 'mb'),
(201201154, 'nb'),
(201201221, 'papa'),
(201201214, 'Shopping'),
(201201192, 'sjkdnfa');

-- --------------------------------------------------------

--
-- Table structure for table `research_feild`
--

CREATE TABLE IF NOT EXISTS `research_feild` (
  `uid` bigint(20) NOT NULL,
  `research` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skils`
--

CREATE TABLE IF NOT EXISTS `skils` (
  `uid` bigint(20) NOT NULL,
  `skill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skils`
--

INSERT INTO `skils` (`uid`, `skill`) VALUES
(201201206, ''),
(201201206, 'c++'),
(201201206, 'java'),
(201201206, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `type_user`
--

CREATE TABLE IF NOT EXISTS `type_user` (
  `uid` bigint(20) NOT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload2`
--

CREATE TABLE IF NOT EXISTS `upload2` (
  `uid` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `path` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload2`
--

INSERT INTO `upload2` (`uid`, `name`, `type`, `size`, `path`) VALUES
(201201206, 'profile_img.png', 'image/png', 173155, 'upload/8477784ecde9596ebe7fd234c40e056c1e932555.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `alma`
--
ALTER TABLE `alma`
 ADD PRIMARY KEY (`uid`,`type`), ADD KEY `uid` (`uid`), ADD KEY `uid_2` (`uid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`c_id`), ADD KEY `c_id` (`c_id`), ADD KEY `dis_id` (`dis_id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`course_id`), ADD KEY `instructor` (`instructor`);

--
-- Indexes for table `discuss`
--
ALTER TABLE `discuss`
 ADD PRIMARY KEY (`dis_id`), ADD KEY `uid` (`uid`), ADD KEY `uid_2` (`uid`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
 ADD PRIMARY KEY (`course_id`,`students_id`), ADD KEY `students_id` (`students_id`);

--
-- Indexes for table `fanswer`
--
ALTER TABLE `fanswer`
 ADD PRIMARY KEY (`question_id`,`a_id`), ADD KEY `uid` (`uid`), ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `fquestions`
--
ALTER TABLE `fquestions`
 ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `hash_aoi`
--
ALTER TABLE `hash_aoi`
 ADD PRIMARY KEY (`int_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
 ADD PRIMARY KEY (`course_id`,`uid`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
 ADD PRIMARY KEY (`pub_id`);

--
-- Indexes for table `publications_user`
--
ALTER TABLE `publications_user`
 ADD PRIMARY KEY (`pub_id`,`uid`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `rel_proj_login`
--
ALTER TABLE `rel_proj_login`
 ADD PRIMARY KEY (`pid`,`uid`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `rel_uid_aoi`
--
ALTER TABLE `rel_uid_aoi`
 ADD PRIMARY KEY (`uid`,`int`), ADD KEY `int` (`int`);

--
-- Indexes for table `research_feild`
--
ALTER TABLE `research_feild`
 ADD PRIMARY KEY (`uid`,`research`);

--
-- Indexes for table `skils`
--
ALTER TABLE `skils`
 ADD PRIMARY KEY (`uid`,`skill`);

--
-- Indexes for table `type_user`
--
ALTER TABLE `type_user`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `upload2`
--
ALTER TABLE `upload2`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `c_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `fquestions`
--
ALTER TABLE `fquestions`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `hash_aoi`
--
ALTER TABLE `hash_aoi`
MODIFY `int_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `pro_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
-- Constraints for table `discuss`
--
ALTER TABLE `discuss`
ADD CONSTRAINT `discuss_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE NO ACTION;

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
ADD CONSTRAINT `enrolled_ibfk_2` FOREIGN KEY (`students_id`) REFERENCES `login` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `enrolled_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `fanswer`
--
ALTER TABLE `fanswer`
ADD CONSTRAINT `fanswer_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE,
ADD CONSTRAINT `fanswer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `fquestions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fquestions`
--
ALTER TABLE `fquestions`
ADD CONSTRAINT `fquestions_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `info`
--
ALTER TABLE `info`
ADD CONSTRAINT `info_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
ADD CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE,
ADD CONSTRAINT `instructor_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
ADD CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `skils`
--
ALTER TABLE `skils`
ADD CONSTRAINT `skils_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `type_user`
--
ALTER TABLE `type_user`
ADD CONSTRAINT `type_user_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upload2`
--
ALTER TABLE `upload2`
ADD CONSTRAINT `upload2_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
