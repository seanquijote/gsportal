-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 05:52 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsportal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcementID` int(11) NOT NULL,
  `postedBy` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `dateAdded` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcementID`, `postedBy`, `title`, `content`, `dateAdded`) VALUES
(1, 'Patrobinson', 'Meeting', 'hi<br/>hello<br/>heehehe', '2016-12-3 7:57:20'),
(2, 'Patrobinson', '12123', '123123123fsdfsdf<br />\\r\\nasdasdasd<br />\\r\\n<br />\\r\\n<br />\\r\\nasdasdasd', '2016-12-03 01:02:48'),
(4, 'Patrobinson', 'https://drive.google.com/open?id=0B8tNtkv65ZF3bm9G', 'asdf', '2017-05-31 15:54:30'),
(5, 'Patrobinson', 'https://doc-04-9s-docs.googleusercontent.com/docs/', 'asdf', '2017-05-31 15:55:15'),
(6, 'Patrobinson', 'asdfsaf', 'https://doc-04-9s-docs.googleusercontent.com/docs/securesc/fs9qqq1eap32v9a1frlqevtp1g6e9snc/ftmsivdrliivf6vsbjs5ag1hs0nsi910/1496210400000/14407148743927617559/14407148743927617559/0B8tNtkv65ZF3bm9Gd0', '2017-05-31 15:55:53'),
(7, 'Patrobinson', 'asdfsaf', 'https://drive.google.com/file/d/0B8tNtkv65ZF3ZEY4Y1B0akd2WXc/view', '2017-05-31 16:40:13'),
(8, 'Patrobinson', 'sample', 'sample', '2017-07-10 18:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `choicesbank`
--

CREATE TABLE `choicesbank` (
  `choice_transact` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `choiceID` int(11) NOT NULL,
  `choice_desc` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choicesbank`
--

INSERT INTO `choicesbank` (`choice_transact`, `questionID`, `choiceID`, `choice_desc`) VALUES
(1, 1, 1, 'Yes'),
(2, 1, 2, 'No'),
(3, 2, 3, 'Yes'),
(4, 2, 4, 'No'),
(5, 3, 5, 'Classified Ads'),
(6, 3, 6, 'Walk-in'),
(7, 3, 7, 'CTU Job Fair'),
(8, 3, 8, 'Absorbed from the On-the-Job (OJT) Training'),
(9, 3, 9, 'Information from friends'),
(10, 4, 10, 'Yes'),
(11, 4, 11, 'No'),
(12, 5, 12, 'Industry'),
(13, 5, 13, 'Academe'),
(14, 5, 14, 'None'),
(15, 6, 15, '20-25'),
(16, 6, 16, '25-30'),
(17, 6, 17, '30-35'),
(18, 6, 18, '35-40'),
(19, 6, 19, '40+'),
(20, 8, 20, 'Below P5,000.00'),
(21, 8, 21, 'P5,000.00 to less than P10,000.00'),
(22, 8, 22, 'P10,000.00 to less than P20,000.00'),
(23, 8, 23, 'P20,000.00 to less than P30,000.00'),
(24, 8, 24, 'P30,000.00 to less than P40,000.00'),
(26, 8, 26, 'P50,000.00 and above'),
(27, 9, 27, 'Still the current job'),
(28, 9, 28, 'Less than a month'),
(29, 9, 29, '1-6 months'),
(30, 9, 30, '7-11 months'),
(31, 9, 31, '1 year to less than 2 years'),
(32, 9, 32, '2 years to less than 3 years'),
(33, 9, 33, '3 years to less than 4 years'),
(35, 9, 35, 'More than 5 years'),
(36, 10, 36, 'Local'),
(37, 10, 37, 'Abroad'),
(38, 11, 38, 'Below P5,000.00'),
(39, 11, 39, 'P5,000.00 to less than P10,000.00'),
(40, 11, 40, 'P10,000.00 to less than P20,000.00'),
(41, 11, 41, 'P20,000.00 to less than P30,000.00'),
(42, 11, 42, 'P30,000.00 to less than P40,000.00'),
(44, 11, 44, 'P50,000.00 and above'),
(45, 12, 45, 'Local'),
(46, 12, 46, 'Abroad'),
(47, 13, 47, 'Masters'),
(48, 13, 48, 'Doctorate'),
(43, 11, 43, 'P40,000.00 to less than P50,000.00'),
(34, 9, 34, '4 years to less than 5 years'),
(25, 8, 25, 'P40,000.00 to less than P50,000.00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL,
  `course` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `course`) VALUES
(1, 'MAVED - Master of Arts in Vocational Education'),
(2, 'MA. Ed. - Master of Arts in Education Major in English'),
(3, 'MA. Ed. - Master of Arts in Education Major in Filipino'),
(4, 'MA. Ed. - Master of Arts in Education Major in School Supervision and Administration'),
(5, 'MA. Ed. - Master of Arts in Education Major in Teaching Biology'),
(6, 'MA. Ed. - Master of Arts in Education Major in Teaching Chemistry'),
(7, 'MA. Ed. - Master of Arts in Education Major in Teaching Physics'),
(8, 'MA. Ed. - Master of Arts in Education Major in Teaching Science'),
(9, 'MA. Ed. - Master of Arts in Education Major in English Language Teaching'),
(10, 'MA. Ed. - Master of Arts in Education Major in Teaching Math'),
(11, 'M. Ed. - Master of Arts in Education - Thesis'),
(12, 'M. Ed. - Master of Arts in Education - Non-thesis'),
(13, 'M.P.A - Master in Public Administration - Thesis'),
(14, 'M.P.A - Master in Public Administration - Non-thesis'),
(15, 'MSIT - Master of Science in Industrial Technology'),
(16, 'MTE - Master in Technician Education'),
(17, 'MTE - Master in Technician Education Major in Automotive Technology'),
(18, 'MTE - Master in Technician Education Major in Drafting Technology'),
(19, 'MTE - Master in Technician Education Major in Electrical Technology'),
(20, 'MTE - Master in Technician Education Major in Electronics Technology'),
(21, 'MTE - Master in Technician Education Major in Machine Shop Technology'),
(22, 'MS Agri - Master of Science in Agriculture'),
(23, 'Dev. Ed. D - Doctor in Development Education Major in English'),
(24, 'Dev. Ed. D - Doctor in Development Education Major in Filipino'),
(25, 'Dev. Ed. D - Doctor in Development Education Major in Mathematics'),
(26, 'Dev. Ed. D - Doctor in Development Education Major in Statistics'),
(27, 'Dev. Ed. D - Doctor in Development Education Major in Physical Education'),
(28, 'Dev. Ed. D - Doctor in Development Education Major in Special Education'),
(29, 'Dev. Ed. D - Doctor in Development Education Major in General Science'),
(30, 'Dev. Ed. D - Doctor in Development Education Major in Biology'),
(31, 'Dev. Ed. D - Doctor in Development Education Major in Biotech'),
(32, 'Dev. Ed. D - Doctor in Development Education Major in Chemistry'),
(33, 'Dev. Ed. D - Doctor in Development Education Major in Physics'),
(34, 'Dev. Ed. D - Doctor in Development Education Major in Guidance and Counselling'),
(35, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Language Teaching'),
(36, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Maritime Education and Engineering Technology'),
(37, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Special Education'),
(38, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Public Health Management'),
(39, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Library Science Management'),
(40, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Hotel Restaurant Service Tourism Technology'),
(41, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Information and Communication Technology'),
(42, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Agriculture Technology Management'),
(43, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Fishery Technology Management'),
(44, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Technology Education'),
(45, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Industrial Technology'),
(46, 'Ph. D. TM. - Doctor of Philosophy in Technology Management Major in Engineering Technology'),
(47, 'DPA - Doctor in Public Administration');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `credsID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `idnumber` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `securityquestion` varchar(50) DEFAULT NULL,
  `securityanswer` varchar(50) DEFAULT NULL,
  `reset_pass_hash` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`credsID`, `roleID`, `idnumber`, `password`, `securityquestion`, `securityanswer`, `reset_pass_hash`) VALUES
(1, 2, '1010100', '21232f297a57a5a743894a0e4a801fc3', '', '', NULL),
(2, 2, '1010101', 'e00cf25ad42683b3df678c61f42c6bda', '', '', NULL),
(101, 1, '1140000', '935f5fbfd464615221dfc4f8af08d92f', 'What is your first pet\'s name?', 'hehe123', '61fe5aca7a68ee432bef1934cf25cacf'),
(102, 1, '1140001', '4fe08d711cdd502c04d7021a03baf46e', 'Not set.', NULL, NULL),
(103, 1, '1140002', '4bc4f6e5bdc80894eed3cc5f0c80c43f', 'Not set.', NULL, NULL),
(104, 1, '1142765', '90ee0ee134e1397aa15f7de00fff9824', 'What is your first pet\'s name?', 'doggy', 'c188ee31525793548b835f7bb7921c9e'),
(105, 1, '1234567', 'fcea920f7412b5da7be0cf42b8c93759', 'Not set.', NULL, NULL),
(106, 1, '1010', '1e48c4420b7073bc11916c6c1de226bb', 'What is your first pet\'s name?', 'george', NULL),
(107, 1, '1142239', 'b9c560af678001da722f781d15d54f59', 'Chef anyone?', 'loli', NULL),
(110, 3, '2020202', '8cbccde61027826bb37cb5e8ff6f02c2', NULL, NULL, NULL),
(109, 3, '2020200', '0cf2dc035014d5d9a5364d5a9c760896', NULL, NULL, NULL),
(111, 3, '2002002', 'ce858608845667383bae144028fc10cc', NULL, NULL, NULL),
(112, 1, '1142766', 'ee97734b50aa763ff509b29323154244', '', 'blue', NULL),
(113, 1, '1142768', 'b7c6b4a6890cee1ea35d80bbb210b556', 'Not set.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ddegsurvey`
--

CREATE TABLE `ddegsurvey` (
  `ddegsurveyID` int(11) NOT NULL,
  `yearID` int(11) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `ddegree` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ddegsurvey`
--

INSERT INTO `ddegsurvey` (`ddegsurveyID`, `yearID`, `idnumber`, `ddegree`) VALUES
(54, 1, '1140000', 'Dev. Ed. D - Major in English'),
(55, 1, '1140000', 'Dev. Ed. D - Major in Filipino'),
(56, 1, '1140000', 'Dev. Ed. D - Major in Mathematics'),
(57, 1, '1140000', 'Dev. Ed. D - Major in Statistics'),
(58, 1, '1140000', 'Dev. Ed. D - Major in Physical Education'),
(59, 1, '1140000', 'Dev. Ed. D - Major in Special Education'),
(60, 1, '1140000', 'Dev. Ed. D - Major in General Science'),
(61, 1, '1140000', 'Dev. Ed. D - Major in Biology'),
(62, 1, '1140000', 'Dev. Ed. D - Major in Biotech'),
(63, 1, '1140000', 'Dev. Ed. D - Major in Chemistry'),
(64, 1, '1140000', 'Dev. Ed. D - Major in Physics'),
(65, 1, '1140000', 'Dev. Ed. D - Major in Guidance and Counselling'),
(66, 1, '1140000', 'Ph. D. TM. - Major in Language Teaching'),
(67, 1, '1140000', 'Ph. D. TM. - Major in Maritime Education and Engineering Technology'),
(68, 1, '1140000', 'Ph. D. TM. - Major in Special Education'),
(69, 1, '1140000', 'Ph. D. TM. - Major in Public Health Management'),
(70, 1, '1140000', 'Ph. D. TM. - Major in Library Science Management'),
(71, 1, '1140000', 'Ph. D. TM. - Major in Hotel Restaurant Service Tourism Technology'),
(72, 1, '1140000', 'Ph. D. TM. - Major in Information and Communication Technology'),
(73, 1, '1140000', 'Ph. D. TM. - Major in Agriculture Technology Management'),
(74, 1, '1140000', 'Ph. D. TM. - Major in Fishery Technology Management'),
(75, 1, '1140000', 'Ph. D. TM. - Major in Technology Education'),
(76, 1, '1140000', 'Ph. D. TM. - Major in Industrial Technology'),
(77, 1, '1140000', 'Ph. D. TM. - Major in Engineering Technology'),
(78, 1, '1140000', 'DPA'),
(79, 1, '1140001', 'Dev. Ed. D - Major in English'),
(80, 1, '1140001', 'Dev. Ed. D - Major in Filipino'),
(81, 1, '1140002', 'Dev. Ed. D - Major in English'),
(82, 1, '1140002', 'Dev. Ed. D - Major in Filipino'),
(83, 1, '1140002', 'Dev. Ed. D - Major in Mathematics'),
(84, 1, '1140002', 'Dev. Ed. D - Major in Statistics'),
(85, 1, '1140002', 'Dev. Ed. D - Major in Physical Education'),
(86, 1, '1140002', 'Dev. Ed. D - Major in Special Education'),
(87, 1, '1140002', 'Dev. Ed. D - Major in General Science'),
(88, 1, '1140002', 'Dev. Ed. D - Major in Biology'),
(89, 1, '1140002', 'Dev. Ed. D - Major in Biotech'),
(90, 1, '1140002', 'Dev. Ed. D - Major in Chemistry'),
(91, 1, '1140002', 'Dev. Ed. D - Major in Physics'),
(92, 1, '1140002', 'Dev. Ed. D - Major in Guidance and Counselling'),
(93, 1, '1140002', 'Ph. D. TM. - Major in Language Teaching'),
(94, 1, '1140002', 'Ph. D. TM. - Major in Maritime Education and Engineering Technology'),
(95, 1, '1140002', 'Ph. D. TM. - Major in Special Education'),
(96, 1, '1140002', 'Ph. D. TM. - Major in Public Health Management'),
(97, 1, '1140002', 'Ph. D. TM. - Major in Library Science Management'),
(98, 1, '1140002', 'Ph. D. TM. - Major in Hotel Restaurant Service Tourism Technology'),
(99, 1, '1140002', 'Ph. D. TM. - Major in Information and Communication Technology'),
(100, 1, '1140002', 'Ph. D. TM. - Major in Agriculture Technology Management'),
(101, 1, '1140002', 'Ph. D. TM. - Major in Fishery Technology Management'),
(102, 1, '1140002', 'Ph. D. TM. - Major in Technology Education'),
(103, 1, '1140002', 'Ph. D. TM. - Major in Industrial Technology'),
(104, 1, '1140002', 'Ph. D. TM. - Major in Engineering Technology'),
(105, 1, '1140002', 'DPA'),
(106, 4, '1010', 'Dev. Ed. D - Major in English'),
(107, 4, '1010', 'Dev. Ed. D - Major in Chemistry'),
(108, 4, '1010', 'Ph. D. TM. - Major in Hotel Restaurant Service Tourism Technology'),
(109, 4, '1010', 'DPA');

-- --------------------------------------------------------

--
-- Table structure for table `empcertificates`
--

CREATE TABLE `empcertificates` (
  `certID` int(100) NOT NULL,
  `idnumber` int(100) NOT NULL,
  `cert_file` varchar(30) NOT NULL,
  `cert_title` varchar(250) NOT NULL,
  `cert_date_uploaded` varchar(20) NOT NULL,
  `cert_validated` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empcertificates`
--

INSERT INTO `empcertificates` (`certID`, `idnumber`, `cert_file`, `cert_title`, `cert_date_uploaded`, `cert_validated`) VALUES
(1, 1142239, '1142239_Hello_coe.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(2, 1142239, '1142239_Hello_coe1.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(3, 1142239, '1142239_Hello_coe2.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(4, 1142239, '1142239_Hello_coe3.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(5, 1142239, '1142239_Hello_coe4.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(6, 1142239, '1142239_Hello_coe5.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(7, 1142239, '1142239_Hello_coe6.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(8, 1142239, '1142239_Hello_coe7.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(9, 1142239, '1142239_Hello_coe8.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(10, 1142239, '1142239_Hello_coe9.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(11, 1142239, '1142239_lllllll_coe.pdf', 'lllllll', 'Aug 05, 2017', 'no'),
(12, 1142239, '1142239_Hello_coe10.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(13, 1142239, '1142239_Hello_coe11.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(14, 1142239, '1142239_Hello_coe12.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(15, 1142239, '1142239_Hello_coe13.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(16, 1142239, '1142239_Hello_coe14.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(17, 1142239, '1142239_Hello_coe15.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(18, 1142239, '1142239_Hello_coe16.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(19, 1142239, '1142239_Hello_coe17.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(20, 1142239, '1142239_Hello_coe18.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(21, 1142239, '1142239_Hello_coe19.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(22, 1142239, '1142239_Hello_coe20.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(23, 1142239, '1142239_Hello_coe21.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(24, 1142239, '1142239_Hello_coe22.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(25, 1142239, '1142239_Hello_coe23.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(26, 1142239, '1142239_Hello_coe24.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(27, 1142239, '1142239_Hello_coe25.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(28, 1142239, '1142239_Hello_coe26.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(29, 1142239, '1142239_Hello_coe27.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(30, 1142239, '1142239_Hello_coe28.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(31, 1142239, '1142239_lllllll_coe1.pdf', 'lllllll', 'Aug 05, 2017', 'no'),
(32, 1142239, '1142239_lllllll_coe2.pdf', 'lllllll', 'Aug 05, 2017', 'no'),
(33, 1142239, '1142239_lllllll_coe3.pdf', 'lllllll', 'Aug 05, 2017', 'no'),
(34, 1142239, '1142239_lllllll_coe4.pdf', 'lllllll', 'Aug 05, 2017', 'no'),
(35, 1142239, '1142239_lllllll_coe5.pdf', 'lllllll', 'Aug 05, 2017', 'no'),
(36, 1142239, '1142239_lllllll_coe6.pdf', 'lllllll', 'Aug 05, 2017', 'no'),
(37, 1142239, '1142239_lllllll_coe7.pdf', 'lllllll', 'Aug 05, 2017', 'no'),
(38, 1142239, '1142239_Hello_coe29.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(39, 1142239, '1142239_lllllll_coe8.pdf', 'lllllll', 'Aug 05, 2017', 'no'),
(40, 1142239, '1142239_Hello_coe30.pdf', 'Hello', 'Aug 05, 2017', 'no'),
(41, 1142239, '1142239_lllllll_coe9.pdf', 'lllllll', 'Aug 05, 2017', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `emphistory`
--

CREATE TABLE `emphistory` (
  `empID` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `empCompName` varchar(50) DEFAULT NULL,
  `empCompAddr` varchar(50) DEFAULT NULL,
  `empPosition` varchar(50) DEFAULT NULL,
  `empStartDate` date DEFAULT NULL,
  `empEndDate` date DEFAULT NULL,
  `empHide` varchar(10) DEFAULT NULL,
  `empStatus` varchar(20) NOT NULL,
  `placeofworkID` int(11) NOT NULL,
  `AMS_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `firstjob_pos_bank`
--

CREATE TABLE `firstjob_pos_bank` (
  `fjobID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `yearID` int(11) NOT NULL,
  `position_desc` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firstjob_pos_bank`
--

INSERT INTO `firstjob_pos_bank` (`fjobID`, `questionID`, `yearID`, `position_desc`) VALUES
(46, 5, 1, 'JB POSITION'),
(47, 5, 1, 'Dumm1 Pos'),
(48, 5, 1, 'Dummy2 Pos'),
(49, 5, 1, 'IT Staff'),
(50, 5, 4, 'asdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `g_session`
--

CREATE TABLE `g_session` (
  `id` varchar(100) NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `data` varchar(5000) NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_session`
--

INSERT INTO `g_session` (`id`, `timestamp`, `data`, `ip_address`) VALUES
('909a1a5856c94df33eef7cdc90f7dff6298e3507', '1509157395', '__ci_last_regenerate|i:1509157305;logged_in|a:6:{s:9:\"firstname\";s:3:\"Dua\";s:8:\"lastname\";s:4:\"Lipa\";s:6:\"yearID\";s:1:\"2\";s:4:\"idno\";s:7:\"1142766\";s:4:\"role\";s:1:\"1\";s:10:\"tooksurvey\";s:5:\"three\";}', '::1'),
('a049360a0ffc4eac4ffccc7d03afd655de71b748', '1509157181', '__ci_last_regenerate|i:1509156982;logged_in|a:6:{s:4:\"idno\";s:7:\"1010101\";s:4:\"role\";s:1:\"2\";s:6:\"yearID\";N;s:9:\"firstname\";s:6:\"Joseph\";s:8:\"lastname\";s:9:\"Barawidan\";s:10:\"tooksurvey\";N;}', '::1'),
('b863dd2a3b09f3583627c8a9838275c60a7dde97', '1509156980', '__ci_last_regenerate|i:1509156681;logged_in|a:6:{s:4:\"idno\";s:7:\"1010101\";s:4:\"role\";s:1:\"2\";s:6:\"yearID\";N;s:9:\"firstname\";s:6:\"Joseph\";s:8:\"lastname\";s:9:\"Barawidan\";s:10:\"tooksurvey\";N;}', '::1'),
('5f0c60ac5f747e4e1c6bf00238cc3692773bd30d', '1509168575', '__ci_last_regenerate|i:1509168575;', '::1'),
('d248d6716825297774049e40663b096fbefb7ff2', '1509157841', '__ci_last_regenerate|i:1509157830;logged_in|a:6:{s:4:\"idno\";s:7:\"1142766\";s:4:\"role\";s:1:\"1\";s:6:\"yearID\";s:1:\"2\";s:9:\"firstname\";s:3:\"Dua\";s:8:\"lastname\";s:4:\"Lipa\";s:10:\"tooksurvey\";s:5:\"three\";}', '::1'),
('f07b663f36c06b267618d73a78128332d5efefff', '1509159367', '__ci_last_regenerate|i:1509159356;logged_in|a:6:{s:4:\"idno\";s:7:\"1142766\";s:4:\"role\";s:1:\"1\";s:6:\"yearID\";s:1:\"2\";s:9:\"firstname\";s:3:\"Dua\";s:8:\"lastname\";s:4:\"Lipa\";s:10:\"tooksurvey\";s:5:\"three\";}', '::1'),
('d01502a48b41b61df0f89f90f2206f3f501f7dff', '1509160061', '__ci_last_regenerate|i:1509159762;logged_in|a:5:{s:9:\"firstname\";s:3:\"Dua\";s:8:\"lastname\";s:4:\"Lipa\";s:4:\"idno\";s:7:\"1142766\";s:4:\"role\";s:1:\"1\";s:10:\"tooksurvey\";s:3:\"yes\";}', '::1'),
('1f6658336753e9f0e1ef9f3c27311a27ea961385', '1509160518', '__ci_last_regenerate|i:1509160223;logged_in|a:6:{s:4:\"idno\";s:7:\"1010101\";s:4:\"role\";s:1:\"2\";s:6:\"yearID\";N;s:9:\"firstname\";s:6:\"Joseph\";s:8:\"lastname\";s:9:\"Barawidan\";s:10:\"tooksurvey\";N;}', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `mdegsurvey`
--

CREATE TABLE `mdegsurvey` (
  `mdegsurveyID` int(11) NOT NULL,
  `yearID` int(11) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `mdegree` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mdegsurvey`
--

INSERT INTO `mdegsurvey` (`mdegsurveyID`, `yearID`, `idnumber`, `mdegree`) VALUES
(46, 1, '1140000', 'MAVED'),
(47, 1, '1140000', 'MA. Ed. - Major in English'),
(48, 1, '1140000', 'MA. Ed. - Major in Filipino'),
(49, 1, '1140000', 'MA. Ed. - Major in School Supervision and Administration'),
(50, 1, '1140000', 'MA. Ed. - Major in Teaching Biology'),
(51, 1, '1140000', 'MA. Ed. - Major in Teaching Chemistry'),
(52, 1, '1140000', 'MA. Ed. - Major in Teaching Physics'),
(53, 1, '1140000', 'MA. Ed. - Major in Teaching Science'),
(54, 1, '1140000', 'MA. Ed. - Major in English Language Teaching'),
(55, 1, '1140000', 'MA. Ed. - Major in Teaching Math'),
(56, 1, '1140000', 'M. Ed - with Thesis'),
(57, 1, '1140000', 'M. Ed - Non-thesis'),
(58, 1, '1140000', 'M.P.A - with Thesis'),
(59, 1, '1140000', 'M.P.A - Non-thesis'),
(60, 1, '1140000', 'MSIT'),
(61, 1, '1140000', 'MET'),
(62, 1, '1140000', 'MTE - Major in Automotive Technology'),
(63, 1, '1140000', 'MTE - Major in Drafting Technology'),
(64, 1, '1140000', 'MTE - Major in Electrical Technology'),
(65, 1, '1140000', 'MTE - Major in Electronics Technology'),
(66, 1, '1140000', 'MTE - Major in Machine Shop Technology'),
(67, 1, '1140000', 'MS Agri'),
(68, 1, '1140001', 'MA. Ed. - Major in English'),
(69, 1, '1140001', 'MA. Ed. - Major in Filipino'),
(70, 1, '1140002', 'MAVED'),
(71, 1, '1140002', 'MA. Ed. - Major in English'),
(72, 1, '1140002', 'MA. Ed. - Major in Filipino'),
(73, 1, '1140002', 'MA. Ed. - Major in School Supervision and Administration'),
(74, 1, '1140002', 'MA. Ed. - Major in Teaching Biology'),
(75, 1, '1140002', 'MA. Ed. - Major in Teaching Chemistry'),
(76, 1, '1140002', 'MA. Ed. - Major in Teaching Physics'),
(77, 1, '1140002', 'MA. Ed. - Major in Teaching Science'),
(78, 1, '1140002', 'MA. Ed. - Major in English Language Teaching'),
(79, 1, '1140002', 'MA. Ed. - Major in Teaching Math'),
(80, 1, '1140002', 'M. Ed - with Thesis'),
(81, 1, '1140002', 'M. Ed - Non-thesis'),
(82, 1, '1140002', 'M.P.A - with Thesis'),
(83, 1, '1140002', 'M.P.A - Non-thesis'),
(84, 1, '1140002', 'MSIT'),
(85, 1, '1140002', 'MET'),
(86, 1, '1140002', 'MTE - Major in Automotive Technology'),
(87, 1, '1140002', 'MTE - Major in Drafting Technology'),
(88, 1, '1140002', 'MTE - Major in Electrical Technology'),
(89, 1, '1140002', 'MTE - Major in Electronics Technology'),
(90, 1, '1140002', 'MTE - Major in Machine Shop Technology'),
(91, 1, '1140002', 'MS Agri'),
(92, 1, '1142765', 'MSIT');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `newsfeedID` int(11) NOT NULL,
  `nfPostedBy` varchar(50) NOT NULL,
  `nfPosterName` varchar(50) NOT NULL,
  `nfContent` varchar(200) DEFAULT NULL,
  `nfDateAdded` varchar(50) NOT NULL,
  `nfUpdated` varchar(50) DEFAULT NULL,
  `nfEdited` varchar(10) DEFAULT NULL,
  `nfStatus` varchar(10) DEFAULT NULL,
  `nfReportedBy` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`newsfeedID`, `nfPostedBy`, `nfPosterName`, `nfContent`, `nfDateAdded`, `nfUpdated`, `nfEdited`, `nfStatus`, `nfReportedBy`) VALUES
(12, '1140000', 'Jan Baldwin', 'Hi all!', '2017-03-25 14:46:03', '2017-05-27 14:05:01', NULL, NULL, NULL),
(13, '1010', 'Ali Ignacio', '[removed] alert&#40;\"hehehe\"&#41;; [removed]', '2017-05-30 17:43:48', '2017-05-30 17:44:17', NULL, NULL, NULL),
(14, '1142239', 'Sean Quijote', 'hello', '2017-07-16 16:36:04', '2017-07-16 16:36:04', NULL, NULL, NULL),
(15, '1142239', 'Sean Quijote', 'eeeee', '2017-08-05 12:28:29', '2017-08-05 12:28:29', NULL, NULL, NULL),
(16, '1142239', 'Sean Quijote', 'dddddd', '2017-08-05 12:29:03', '2017-08-05 12:29:03', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nfcomments`
--

CREATE TABLE `nfcomments` (
  `nfCommentID` int(11) NOT NULL,
  `newsfeedID` int(11) NOT NULL,
  `nfCommentedBy` varchar(50) NOT NULL,
  `nfCommentorName` varchar(50) NOT NULL,
  `nfCommentContent` varchar(200) DEFAULT NULL,
  `nfTime` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfcomments`
--

INSERT INTO `nfcomments` (`nfCommentID`, `newsfeedID`, `nfCommentedBy`, `nfCommentorName`, `nfCommentContent`, `nfTime`) VALUES
(2, 12, '1140000', 'Jan Baldwin', 'aw', '2017-03-25 14:51:44'),
(3, 12, '1140000', 'Jan Baldwin', 'aaaaaaaaaaaaaaaa', '2017-03-25 14:51:58'),
(4, 12, '1140000', 'Jan Baldwin', 'asdasd', '2017-03-25 14:52:11'),
(5, 12, '1142765', 'German John', 'hey dude. its been a while', '2017-05-27 14:05:01'),
(6, 13, '1010', 'Ali', '[removed]alert&#40;&#41;; [removed]', '2017-05-30 17:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationID` int(11) NOT NULL,
  `newsfeedID` int(11) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `subscription` varchar(5) DEFAULT NULL,
  `updated` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationID`, `newsfeedID`, `idnumber`, `status`, `subscription`, `updated`) VALUES
(23, 15, '1142239', 'read', 'yes', '2017-08-05 12:28:29'),
(24, 16, '1142239', 'read', 'yes', '2017-08-05 12:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE `questionbank` (
  `questionID` int(11) NOT NULL,
  `question_desc` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`questionID`, `question_desc`) VALUES
(1, 'Have you been employed immediateley 6 months or less after graduation?'),
(2, 'Was your first job related to the course you took up in college?'),
(3, 'How did you find your first job?'),
(4, 'Have you been promoted in your position after graduation?'),
(5, 'What is your line of work?'),
(6, 'Age upon first employment'),
(7, 'First Job Position'),
(8, 'First Job Approximate Monthly Salary'),
(9, 'First Job Length of Stay'),
(10, 'First Job Place of Work'),
(13, 'Degree');

-- --------------------------------------------------------

--
-- Table structure for table `surveybank`
--

CREATE TABLE `surveybank` (
  `answerID` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `yearID` int(11) NOT NULL,
  `choiceID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveybank`
--

INSERT INTO `surveybank` (`answerID`, `idnumber`, `questionID`, `yearID`, `choiceID`) VALUES
(389, 1140000, 13, 1, '44'),
(390, 1140000, 13, 1, '45'),
(391, 1140000, 1, 1, '1'),
(392, 1140000, 2, 1, '3'),
(393, 1140000, 3, 1, '5'),
(394, 1140000, 4, 1, '11'),
(395, 1140000, 5, 1, '13'),
(396, 1140000, 6, 1, '15'),
(397, 1140000, 8, 1, '25'),
(398, 1140000, 9, 1, '26'),
(399, 1140000, 10, 1, '34'),
(400, 1140001, 13, 1, '44'),
(401, 1140001, 13, 1, '45'),
(402, 1140001, 1, 1, '1'),
(403, 1140001, 2, 1, '3'),
(404, 1140001, 3, 1, '7'),
(405, 1140001, 4, 1, '10'),
(406, 1140001, 5, 1, '12'),
(407, 1140001, 6, 1, '16'),
(408, 1140001, 8, 1, '25'),
(409, 1140001, 9, 1, '30'),
(410, 1140001, 10, 1, '34'),
(411, 1140002, 13, 1, '44'),
(412, 1140002, 13, 1, '45'),
(413, 1140002, 1, 1, '1'),
(414, 1140002, 2, 1, '3'),
(415, 1140002, 3, 1, '5'),
(416, 1140002, 4, 1, '11'),
(417, 1140002, 5, 1, '14'),
(418, 1140002, 6, 1, '17'),
(419, 1140002, 8, 1, '25'),
(420, 1140002, 9, 1, '26'),
(421, 1140002, 10, 1, '34'),
(422, 1142765, 13, 1, '44'),
(423, 1142765, 1, 1, '1'),
(424, 1142765, 2, 1, '3'),
(425, 1142765, 3, 1, '5'),
(426, 1142765, 4, 1, '10'),
(427, 1142765, 5, 1, '12'),
(428, 1142765, 6, 1, '15'),
(429, 1142765, 8, 1, '20'),
(430, 1142765, 9, 1, '26'),
(431, 1142765, 10, 1, '34'),
(432, 1010, 13, 4, '45'),
(433, 1010, 1, 4, '1'),
(434, 1010, 2, 4, '3'),
(435, 1010, 3, 4, '8'),
(436, 1010, 4, 4, '10'),
(437, 1010, 5, 4, '13'),
(438, 1010, 6, 4, '15'),
(439, 1010, 8, 4, '20'),
(440, 1010, 9, 4, '26'),
(441, 1010, 10, 4, '34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `yearID` varchar(4) NOT NULL,
  `idnumber` varchar(20) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `civilstatus` varchar(20) DEFAULT NULL,
  `contactnumber` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lastupdate` varchar(50) DEFAULT NULL,
  `picture` varchar(20) DEFAULT NULL,
  `tooksurvey` varchar(5) DEFAULT NULL,
  `userstatus` varchar(20) DEFAULT NULL,
  `uploaded_coe` int(250) NOT NULL DEFAULT '0',
  `validated_coe` int(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `courseID`, `yearID`, `idnumber`, `firstname`, `lastname`, `sex`, `address`, `dob`, `civilstatus`, `contactnumber`, `email`, `lastupdate`, `picture`, `tooksurvey`, `userstatus`, `uploaded_coe`, `validated_coe`) VALUES
(1, 0, '0', '1010100', 'Patrobinson', 'Salumag', 'Male', NULL, NULL, NULL, NULL, 'admin1@ctu.edu.ph', NULL, '', NULL, NULL, 0, 0),
(2, 0, '0', '1010101', 'Joseph', 'Barawidan', 'Male', NULL, NULL, NULL, NULL, 'admin2@ctu.edu.ph', NULL, '', NULL, NULL, 0, 0),
(101, 47, '1', '1140000', 'Jan Baldwin', 'Saavedra', 'Male', 'Tabunok hehe', '1996-01-09', 'Single', '12345678', 'stalhill2@gmail.com', '2017-04-16 21:42:28', '1140000_dp.jpg', 'yes', 'enabled', 0, 0),
(102, 47, '1', '1140001', 'Dummy', 'One', 'Male', 'T. Padilla', '1990-07-10', 'Single', '12345678', 'dummyone@gmail.com', '2017-04-10 10:35:22', 'new_reg.jpg', 'yes', 'enabled', 0, 0),
(103, 47, '1', '1140002', 'Dummy', 'Two', 'Female', 'C. Padilla', '1990-01-01', 'Single', '12345678', 'dummytwo@gmail.com', '2017-04-10 10:36:36', 'new_reg.jpg', 'yes', 'enabled', 0, 0),
(104, 30, '1', '1142765', 'German John', 'Galendez', 'Male', 'Bulacao Cebu City', '1995-06-26', 'Single', '09420920952', 'gj_galendez13@yahoo.com', '2017-06-22 10:25:49', '1142765_dp.jpg', 'yes', 'enabled', 0, 0),
(105, 30, '1', '1234567', 'Hjgh', 'Gh', 'Ffdsfsdfsd', NULL, '2017-05-31', NULL, NULL, NULL, NULL, 'new_reg.jpg', 'one', 'enabled', 0, 0),
(106, 23, '4', '1010', 'Ali', 'Ignacio', 'Male', 'Cebu Tagbilaran', '2017-05-11', 'Single', '09231231314241aaa', 'astsataw@asdas.com', '2017-05-30 17:42:53', 'new_reg.jpg', 'yes', 'enabled', 0, 0),
(107, 11, '2', '1142239', 'Sean', 'Quijote', 'Male', 'Cebu CIty, Cebu', '1997-07-07', 'Single', '09235448695', 'sknqt@gmall.com', '2017-08-05 12:25:04', '1142239_dp.jpg', 'yes', 'enabled', 41, 0),
(109, 0, '', '2020200', 'Jane', 'Doe', 'Female', NULL, '2016-06-08', NULL, NULL, NULL, NULL, 'new_validator.png', NULL, 'enabled', 0, 0),
(110, 0, '', '2020202', 'John', 'Smith', 'Male', NULL, '2017-08-23', NULL, NULL, NULL, NULL, 'new_validator.png', NULL, 'enabled', 0, 0),
(111, 0, '', '2002002', 'Alex', 'Lambert', 'Male', NULL, NULL, NULL, '09234125643', 'alexlambert@email.com', NULL, 'new_validator.png', NULL, 'enabled', 0, 0),
(112, 17, '2', '1142766', 'Dua', 'Lipa', 'Female', 'London, UK', '1995-08-22', 'Single', '0905123456789', 'dualipa@gj.com', '2017-10-28 11:08:02', 'new_reg.jpg', 'yes', 'enabled', 0, 0),
(113, 30, '2', '1142768', 'Dua', 'Lipa Two', 'Female', NULL, '2017-10-20', NULL, NULL, NULL, NULL, 'new_reg.jpg', 'one', 'enabled', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `violationID` int(11) NOT NULL,
  `idnumber` varchar(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `yearID` int(11) NOT NULL,
  `yeargraduated` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`yearID`, `yeargraduated`) VALUES
(1, '2011'),
(2, '2012'),
(3, '2013'),
(4, '1925');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcementID`);

--
-- Indexes for table `choicesbank`
--
ALTER TABLE `choicesbank`
  ADD PRIMARY KEY (`choice_transact`,`choiceID`,`questionID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`credsID`,`roleID`,`idnumber`);

--
-- Indexes for table `ddegsurvey`
--
ALTER TABLE `ddegsurvey`
  ADD PRIMARY KEY (`ddegsurveyID`);

--
-- Indexes for table `empcertificates`
--
ALTER TABLE `empcertificates`
  ADD PRIMARY KEY (`certID`);

--
-- Indexes for table `emphistory`
--
ALTER TABLE `emphistory`
  ADD PRIMARY KEY (`empID`);

--
-- Indexes for table `firstjob_pos_bank`
--
ALTER TABLE `firstjob_pos_bank`
  ADD PRIMARY KEY (`fjobID`);

--
-- Indexes for table `g_session`
--
ALTER TABLE `g_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mdegsurvey`
--
ALTER TABLE `mdegsurvey`
  ADD PRIMARY KEY (`mdegsurveyID`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
  ADD PRIMARY KEY (`newsfeedID`);

--
-- Indexes for table `nfcomments`
--
ALTER TABLE `nfcomments`
  ADD PRIMARY KEY (`nfCommentID`,`newsfeedID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationID`) USING BTREE;

--
-- Indexes for table `questionbank`
--
ALTER TABLE `questionbank`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `surveybank`
--
ALTER TABLE `surveybank`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`,`courseID`,`yearID`,`idnumber`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`violationID`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`yearID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `choicesbank`
--
ALTER TABLE `choicesbank`
  MODIFY `choice_transact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `credsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `ddegsurvey`
--
ALTER TABLE `ddegsurvey`
  MODIFY `ddegsurveyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `empcertificates`
--
ALTER TABLE `empcertificates`
  MODIFY `certID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `emphistory`
--
ALTER TABLE `emphistory`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `firstjob_pos_bank`
--
ALTER TABLE `firstjob_pos_bank`
  MODIFY `fjobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `mdegsurvey`
--
ALTER TABLE `mdegsurvey`
  MODIFY `mdegsurveyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `newsfeedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `nfcomments`
--
ALTER TABLE `nfcomments`
  MODIFY `nfCommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `questionbank`
--
ALTER TABLE `questionbank`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `surveybank`
--
ALTER TABLE `surveybank`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `violationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `yearID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
