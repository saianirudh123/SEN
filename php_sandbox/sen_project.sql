-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2015 at 09:22 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sen_project`
--

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
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `ins_name` varchar(255) NOT NULL,
  `des` text,
  PRIMARY KEY (`sno`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 'mnbsdakm', 'IT-408', 1, 'dsfklj', 'lkfjshndjn', 'sdakljfnk', 'kjkj', 'akdjba', 201201123, 'mkdfjesa', 'kdjsfbka', 'jbfaskjdb'),
(2, 'kjshkghsk', 'EL-103', 1, 'sdagsgsd g', 'dgfgdfgsfdgfsdg srgrs sf', 'gasfdgfdsgg', 'dsgdfgdfg', 'dsfgdfsgsdfg', 201201123, 'sdfgdfgfdgdfg', 'dsfgsdfgdf', 'dfgfdgsdgdfg'),
(3, 'sgdfgfxd', 'CT - 111', 2, 'fgsdgxdg', 'xzdgxdgxfdg', 'fgxdfg', 'dfghdfghdfh', 'dfhgdfgh', 201201123, 'sgsxgdsdgsd', 'gdhsxdf', 'gxfhgf hgh gg'),
(4, 'tdahgdfagd', 'HM-106', 3, 'zfhbzcfghdcgh', 'dzgydxfhgdzh', 'zdhzdfh', 'zdhzdfhf', 'zdfhzdh', 201201123, 'zdhdfhydtghd', 'zdfhdthdtyhdt', 'zdhdhgdfhgdfg'),
(5, 'dfxgdxfzgf', 'SC-106', 2, 'kshgashdfjkh', 'jhksfhgahsjklhk', 'hskjfhgkjsdhfghkj', 'khkjsdfhgkljshfalkh', 'hkjhfgkjhasfkgh', 201201123, 'jkhrajklghrsjlh', 'hjkhjhhdhlfs', 'dzrghdrzfghdf');

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
-- Table structure for table `fanswer`
--

CREATE TABLE IF NOT EXISTS `fanswer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fanswer`
--

INSERT INTO `fanswer` (`question_id`, `a_id`, `a_name`, `a_email`, `a_answer`, `a_datetime`) VALUES
(11, 1, 'anirudh', '201201197@daiict.ac.in', 'hhas  hih hjk h jkhjkhkj fhjk ', '07/04/15 23:02:23'),
(11, 2, 'surya', '201201206@daiict.ac.in', '', '07/04/15 23:03:44'),
(12, 1, 'charith', '201201200@daiict.ac.in', 'sggif asfg gjhag s', '07/04/15 23:05:51'),
(12, 2, 'jitin', '201201193@daiict.ac.in', 'hs hjhfsh jhj hskjhf kjlsh', '07/04/15 23:08:20'),
(12, 3, 'rachha ', '201201171@daiict.ac.in', 'h kjlahhjk hjkhkf', '07/04/15 23:08:49'),
(12, 4, 'batta', 'd@g.com', 'iuhfliugkj hh giush kj ughiugh liuz', '07/04/15 23:17:47'),
(12, 5, 'htakfh', 'hskjhd@f.com', 'uhgh iug hg h', '07/04/15 23:19:00'),
(12, 6, 'solla', 's@d.com', ' iuhs bdifh hdh  hfkjsdh  s', '07/04/15 23:19:51'),
(12, 7, 'hunter', 'h@d.com', 'ihiah ihsfhaslihluihfuilgf', '07/04/15 23:21:23'),
(12, 8, 'japa', 'j@d.com', 'h duh gg hfgh hgljh gli', '07/04/15 23:26:10'),
(13, 1, 'anup', 'adkan', 'alksd', '08/04/15 10:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `fquestions`
--

CREATE TABLE IF NOT EXISTS `fquestions` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `fquestions`
--

INSERT INTO `fquestions` (`id`, `topic`, `detail`, `name`, `email`, `datetime`, `view`, `reply`) VALUES
(11, 'likith', 'gf jadgfj gj fgajjh adjhdagd bjfdsg', 'Likith', '201201230@daiict.ac.in', '07/04/15 11:01:39', 4, 0),
(12, 'achut', 'hkjhgjk hgjh jkhfjk', 'achut', '201201169@daiict.ac.in', '07/04/15 11:05:22', 12, 8),
(13, 'DAIICT academia', 'alskdnal', 'anup', 'anup@aldk', '08/04/15 10:42:04', 3, 1),
(14, 'batta', 'kjdhfldh fjlkhd jlhdlkj fhdljkfh jksdlhf lkjdjkfdh klj hdlkjfh dlkjfh djklfh ljkdahfldhf jbdjflh df jlkdf', '', '', '08/04/15 09:33:05', 17, 0),
(15, '', '', '', '', '08/04/15 10:13:42', 0, 0);

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
  `dsg` int(11) DEFAULT NULL,
  `other_email` varchar(30) COLLATE latin1_bin DEFAULT NULL,
  `web_url` varchar(100) COLLATE latin1_bin DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `details` text COLLATE latin1_bin,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

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
(2012563, 'dgdsgsdg', 'fjnk2121'),
(201201123, 'djksfklshdlf', 'fjnk2121'),
(201201219, 'asdhaskhdka', 'fjnk2121');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `pro_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `des` text,
  `fro` varchar(20) DEFAULT NULL,
  `to` varchar(20) DEFAULT NULL,
  `guide` varchar(255) DEFAULT NULL,
  `funding_org` varchar(255) DEFAULT NULL,
  `time` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `pro_type` int(11) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pro_id`, `title`, `des`, `fro`, `to`, `guide`, `funding_org`, `time`, `status`, `pro_type`) VALUES
(1, 'qwerty', 'sjbsjffgbkj', '2015-04', '2015-04', 'kjbdakfjhlad', 'jhdbfjkdaghflgda', '0000-00-00 00:00:00', '', 0),
(2, 'jkhdalkjfhlkjah', 'hslkjfhlkjsadhflkjhdsgk', '2015-04', '2015-05', 'sbgjkfshguklhrlighli', 'hskjlhglksfhgkulysfiglfmnvb', '0000-00-00 00:00:00', '', 0),
(3, 'jkhkjshgkhsfkghikh', 'hsghjksdhkj jdhfkjhsdkj khkjd kjh k', '2015-04', '2015-06', 'sbgjkfshguklhrlighli', 'hskjlhglksfhgkulysfiglfmnvb', '0000-00-00 00:00:00', '', 0),
(4, 'internet of things', 'Raspberry pi shit', '2015-01', '2015-04', 'sanjay shrivastav', 'DA-IICT', '0000-00-00 00:00:00', '', 0),
(5, 'artificial intelligene', 'angry birds AI agent', '2014-08', '2014-11', 'Prof Sourish', 'DA-IICT', '0000-00-00 00:00:00', '', 0),
(6, 'sgfgsadjkf', 'gjkfsbhf kjash kj', '2015-04', '2015-03', 'hsdkfhlisudhfius', 'asfgsfdgsfg', '0000-00-00 00:00:00', '', 0),
(7, 'ldsjfljadlfj', 'ajdlfkjslkdjf', '2015-04', '2015-04', 'eFJ:DJF:', 'lsjl;f;SDfl', '0000-00-00 00:00:00', '', 0),
(8, 'sdhalfsdl', 'jlkjdslk ', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(9, 'sdhalfsdl', 'jlkjdslk ', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(23, 'sdhalfsdl', 'jlkjdslk ', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(24, 'sdhalfsdl', 'jlkjdslk ', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(25, 'sdhalfsdl', 'jlkjdslk ', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(26, 'sdhalfsdl', 'jlkjdslk ', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(27, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(28, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(29, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(30, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(31, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(32, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(33, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(34, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(35, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(36, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '0000-00-00 00:00:00', '', 0),
(37, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '04:01:37', '', 0),
(38, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '04:02:07', '', 0),
(39, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '04:08:12', '', 0),
(40, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '04:09:19', '', 0),
(41, 'ahfkasjl', 'jldjflajl', '2015-04', '2015-04', 'ljflksjflkgjl', 'ljslkfjlkdfj', '04:10:33', '', 0),
(42, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:43:19', '', 0),
(43, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:45:01', '', 0),
(44, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:46:12', '', 0),
(45, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:46:31', '', 0),
(46, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:47:03', '', 0),
(47, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:48:01', '', 0),
(48, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:48:31', '', 0),
(49, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:49:21', '', 0),
(50, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:50:28', '', 0),
(51, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:50:38', '', 0),
(52, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:51:58', '', 0),
(53, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:52:34', '', 0),
(54, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:53:29', '', 0),
(55, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:53:33', '', 0),
(56, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '12:54:47', '', 0),
(57, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '01:02:19', '', 0),
(58, '0', 'lsfljdalf', '2015-04', '2015-04', 'a;fk;ka;lkf;as', 'ak;fk;askf;', '01:02:26', '', 0),
(59, '', '', '', '', '', '', '06:30:32', '', 0),
(60, 'lj', 'ljljlfjlj', '2015-03', '2015-04', 'lshlljlj', 'jsfljlajfsljlsf', '06:32:25', '', 0),
(61, 'lj', 'ljljlfjlj', '2015-03', '2015-04', 'lshlljlj', 'jsfljlajfsljlsf', '06:34:08', '', 0),
(62, 'lj', 'ljljlfjlj', '2015-03', '2015-04', 'lshlljlj', 'jsfljlajfsljlsf', '06:34:36', '', 0),
(63, 'lj', 'ljljlfjlj', '2015-03', '2015-04', 'lshlljlj', 'jsfljlajfsljlsf', '06:34:55', '', 0),
(64, 'lj', 'ljljlfjlj', '2015-03', '2015-04', 'lshlljlj', 'jsfljlajfsljlsf', '06:36:11', '', 0),
(65, 'kk', ';k;k;', '2015-04', '2015-04', 'hkhkh', 'khk', '06:37:58', '', 0),
(66, 'jl', 'jljl', '2015-04', '2015-04', 'lljljljl', 'ljggk', '06:39:04', '', 0),
(67, 'ljljfljflj', '`ljljrlgjlrjl', '2015-04', '2015-04', 'lfjljslkj', 'lhlrjgljslj', '06:40:01', '', 0),
(68, 'ljljfljflj', '`ljljrlgjlrjl', '2015-04', '2015-04', 'lfjljslkj', 'lhlrjgljslj', '06:40:32', '', 0),
(69, 'll', 'ljljl', '', '', 'lkjljlj', 'ljlj', '06:41:08', '', 0),
(70, 'll', 'ljljl', '', '', 'lkjljlj', 'ljlj', '06:41:27', '', 0),
(71, 'ljljl', 'jlj', '', '', 'hl', 'lljl', '06:41:47', '', 0),
(72, 'ljljl', 'jlj', '', '', 'hl', 'lljl', '06:42:31', '', 0),
(73, 'BTP', 'jlj', '', '', 'hl', 'lljl', '06:58:55', 'Completed', 0),
(74, 'BTP', 'jlj', '', '', 'hl', 'lljl', '07:00:15', 'Completed', 0),
(75, 'BTP', 'jlj', '', '', 'hl', 'lljl', '07:00:40', 'Completed', 0),
(76, 'BTP', 'jlj', '', '', 'hl', 'lljl', '07:03:20', 'Completed', 0),
(77, 'BTP', 'jlj', '', '', 'hl', 'lljl', '07:05:19', 'Completed', 0),
(78, 'BTP', 'jlj', '', '', 'hl', 'lljl', '07:05:45', 'Completed', 0),
(79, 'BTP', 'jlj', '', '', 'hl', 'lljl', '07:06:04', 'Completed', 0),
(80, 'BTP', 'jlj', '', '', 'hl', 'lljl', '07:06:38', 'Completed', 0),
(81, 'BTP', 'jlj', '', '', 'hl', 'lljl', '07:07:08', 'Completed', 0),
(82, 'BTP', 'jlj', '', '', 'hl', 'lljl', '07:07:23', 'Completed', 0),
(83, 'BTP', 'jlj', '', '', 'hl', 'lljl', '07:07:43', 'Completed', 0),
(84, 'ksfhvkjfshk', 'KHKH', '', '', 'kfhkhkh', 'hkhkk', '07:08:36', 'Ongoing', 0),
(85, 'ksfhvkjfshk', 'KHKH', '', '', 'kfhkhkh', 'hkhkk', '07:08:58', 'Ongoing', 0),
(86, 'ksfhvkjfshk', 'KHKH', '', '', 'kfhkhkh', 'hkhkk', '07:09:03', 'Ongoing', 0),
(87, 'abcdefg', 'qwertyuiop', '2015-04', '2015-05', 'asdfgh', 'zxcvbn', '07:17:59', 'Completed', 0),
(88, 'abcdefg', 'qwertyuiop', '2015-04', '2015-05', 'asdfgh', 'zxcvbn', '07:20:39', 'Completed', 0),
(89, 'fshlfhl', 'llj', '2015-04', '2015-05', 'ljljl', 'lljh', '07:28:38', 'Completed', 1),
(90, 'fshlfhl', 'llj', '2015-04', '2015-05', 'ljljl', 'lljh', '07:30:07', 'Completed', 1),
(91, 'fshlfhl', 'llj', '2015-04', '2015-05', 'ljljl', 'lljh', '07:30:14', 'Completed', 1),
(92, 'fshlfhl', 'llj', '2015-04', '2015-05', 'ljljl', 'lljh', '07:30:51', 'Completed', 1),
(93, 'askfhkdsjhk', 'akshfkhsk', '2015-04', '2015-05', 'ljljlsfnlkj', 'lllljl', '07:31:26', 'Ongoing', 1),
(94, 'qwerty', 'angry birds AI agent', '2015-04', '2015-05', 'kdskfkjsdbk', 'bkfbksdkjhk', '07:34:01', 'Completed', 1);

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
(41, 2012563),
(60, 2012563),
(61, 2012563),
(62, 2012563),
(63, 2012563),
(64, 2012563),
(65, 2012563),
(84, 2012563),
(85, 2012563),
(86, 2012563),
(5, 201201123),
(41, 201201123),
(42, 201201123),
(43, 201201123),
(44, 201201123),
(45, 201201123),
(46, 201201123),
(47, 201201123),
(48, 201201123),
(49, 201201123),
(50, 201201123),
(51, 201201123),
(52, 201201123),
(53, 201201123),
(54, 201201123),
(55, 201201123),
(56, 201201123),
(57, 201201123),
(58, 201201123),
(77, 201201123),
(78, 201201123),
(79, 201201123),
(80, 201201123),
(81, 201201123),
(82, 201201123),
(83, 201201123),
(87, 201201123),
(88, 201201123),
(94, 201201123),
(41, 201201219);

-- --------------------------------------------------------

--
-- Table structure for table `rel_uid_aoi`
--

CREATE TABLE IF NOT EXISTS `rel_uid_aoi` (
  `uid` bigint(20) NOT NULL,
  `int` bigint(20) NOT NULL,
  PRIMARY KEY (`uid`,`int`),
  KEY `int` (`int`)
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

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `rel_uid_aoi_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `rel_uid_aoi_ibfk_2` FOREIGN KEY (`int`) REFERENCES `hash_aoi` (`int_id`);

--
-- Constraints for table `tas`
--
ALTER TABLE `tas`
  ADD CONSTRAINT `tas_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tas_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
