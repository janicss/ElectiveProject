-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2016 at 10:48 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elective`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_pwd` varchar(200) NOT NULL,
  `admin_fname` varchar(200) NOT NULL,
  `admin_mname` varchar(200) NOT NULL,
  `admin_lname` varchar(200) NOT NULL,
  `user_level_id` varchar(8) NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pwd`, `admin_fname`, `admin_mname`, `admin_lname`, `user_level_id`, `date_created`) VALUES
('admin_001', 'janica', 'Janica Ann', 'Isleta', 'Chioco', 'user_01', '2016-04-24 08:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `prof_id` varchar(20) NOT NULL,
  `subj_code` varchar(20) NOT NULL,
  `stud_id` varchar(20) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `college_id` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `course_description` varchar(200) NOT NULL,
  `section_id` varchar(20) NOT NULL,
  `section_description` varchar(200) NOT NULL,
  `year_level` varchar(3) NOT NULL,
  `sem_id` varchar(20) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `rating_period` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `prof_id`, `subj_code`, `stud_id`, `answer`, `college_id`, `course_id`, `course_description`, `section_id`, `section_description`, `year_level`, `sem_id`, `school_year`, `rating_period`) VALUES
(000057, 'COE_001', 'CPE000', '12L-2080', '100', 'CEn', 'CEn_02', 'BSCpE', 'CPE_01', 'GE', 'IV', 'sem_01', '2015-2016', 'July-November'),
(000058, 'COE_002', 'CPE312', '12L-2080', '100', 'CEn', 'CEn_02', 'BSCpE', 'CPE_01', 'GE', 'IV', 'sem_01', '2015-2016', 'July-November'),
(000059, 'COE_001', 'CPE312', '12L-2080', '100', 'CEn', 'CEn_02', 'BSCpE', 'CPE_02', 'GF', 'IV', 'sem_01', '2015-2016', 'July-November');

-- --------------------------------------------------------

--
-- Table structure for table `average`
--

CREATE TABLE `average` (
  `ave_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `prof_id` varchar(20) NOT NULL,
  `prof_name` varchar(200) NOT NULL,
  `average` int(20) NOT NULL,
  `rating` varchar(200) NOT NULL,
  `sem_id` varchar(20) NOT NULL,
  `school_year` varchar(200) NOT NULL,
  `rating_period` varchar(200) NOT NULL,
  `DONE` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` varchar(20) NOT NULL,
  `college_description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_description`) VALUES
('CEn', 'College of Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(20) NOT NULL,
  `course_description` varchar(30) NOT NULL,
  `college_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_description`, `college_id`) VALUES
('CEn_01', 'BSCE', 'CEn'),
('CEn_02', 'BSCpE', 'CEn'),
('CEn_03', 'BSECE', 'CEn'),
('CEn_04', 'BSEE', 'CEn'),
('CEn_05', 'BSIE', 'CEn'),
('CEn_06', 'BSME', 'CEn');

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

CREATE TABLE `prof` (
  `Name_prof` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prof`
--

INSERT INTO `prof` (`Name_prof`, `course`) VALUES
('Allen Pavino', 'BSCPE'),
('Jerwin Obmerga', 'BSCPE');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `prof_id` varchar(200) NOT NULL,
  `prof_no` varchar(200) NOT NULL,
  `prof_pwd` varchar(200) NOT NULL,
  `prof_name` varchar(200) NOT NULL,
  `college_id` varchar(200) NOT NULL,
  `course_id` varchar(200) NOT NULL,
  `sem_id` varchar(200) NOT NULL,
  `school_year` varchar(200) NOT NULL,
  `user_lever_id` varchar(200) NOT NULL,
  `activate` enum('0','1') NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`prof_id`, `prof_no`, `prof_pwd`, `prof_name`, `college_id`, `course_id`, `sem_id`, `school_year`, `user_lever_id`, `activate`, `date_created`) VALUES
('COE_001', '12-01234', '', 'Engr. Jerwin Obmerga', 'CEn', 'CEn_02', 'sem_01', '2015-2016', '', '0', '2016-04-03 02:46:27'),
('COE_002', '001234', '', 'Engr. Allen Pavino', 'CEn', 'CEn_02', 'sem_01', '', '', '0', '2016-04-03 23:34:22'),
('COE_003', '', '', 'Engr. Carla Mae Ceribo', 'CEn', 'CEn_02', 'sem_01', '', '', '0', '2016-04-22 21:50:01'),
('COE_04', '123445', '', 'Engr. Jeru Shalom Barlos', 'CEn', 'CEn_02', 'sem_01', '2015-2016', '', '0', '2016-04-25 17:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `question_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_no` varchar(20) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `prof_id` varchar(20) NOT NULL,
  `section_id` varchar(20) NOT NULL,
  `sem_id` varchar(20) NOT NULL,
  `year_level` varchar(3) NOT NULL,
  `school_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` varchar(20) NOT NULL,
  `section_description` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `college_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_description`, `course_id`, `college_id`) VALUES
('CE_01', 'GA', 'CEn_01', 'CEn'),
('CE_02', 'GB', 'CEn_01', 'CEn'),
('CE_03', 'GC', 'CEn_01', 'CEn'),
('CE_04', 'GD', 'CEn_01', 'CEn'),
('CPE_01', 'GE', 'CEn_02', 'CEn'),
('CPE_02', 'GF', 'CEn_02', 'CEn'),
('ECE_01', 'GG', 'CEn_03', 'CEn'),
('ECE_02', 'GH', 'CEn_03', 'CEn'),
('ECE_03', 'GI', 'CEn_03', 'CEn'),
('EE_01', 'GJ', 'CEn_04', 'CEn'),
('EE_02', 'GK', 'CEn_04', 'CEn'),
('IE_01', 'GL', 'CEn_05', 'CEn'),
('ME_01', 'GM', 'CEn_06', 'CEn'),
('ME_02', 'GN', 'CEn_06', 'CEn'),
('ME_03', 'GO', 'CEn_06', 'CEn');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` varchar(20) NOT NULL,
  `sem_description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_description`) VALUES
('sem_01', '1st Semester'),
('sem_02', '2nd Semester');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` varchar(20) NOT NULL,
  `stud_no` varchar(200) NOT NULL,
  `stud_pwd` varchar(200) NOT NULL,
  `stud_fname` varchar(200) NOT NULL,
  `stud_mname` varchar(200) NOT NULL,
  `stud_lname` varchar(200) NOT NULL,
  `college_id` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `year_level` enum('I','II','III','IV','V') NOT NULL,
  `sem_id` varchar(20) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `user_level_id` varchar(20) NOT NULL,
  `activate` enum('0','1') NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_no`, `stud_pwd`, `stud_fname`, `stud_mname`, `stud_lname`, `college_id`, `course_id`, `year_level`, `sem_id`, `school_year`, `user_level_id`, `activate`, `date_created`) VALUES
('12L-2080', '12-000034', 'natsu', 'Natsu', 'Igneel', 'Dragneel', 'CEn', 'CEn_02', 'IV', 'sem_01', '2015-2016', 'user_02', '1', '2016-04-03 01:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `student_section`
--

CREATE TABLE `student_section` (
  `student_section_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `stud_id` varchar(20) NOT NULL,
  `section_id` varchar(20) NOT NULL,
  `section_description` varchar(200) NOT NULL,
  `sem_id` varchar(20) NOT NULL,
  `school_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_section`
--

INSERT INTO `student_section` (`student_section_id`, `stud_id`, `section_id`, `section_description`, `sem_id`, `school_year`) VALUES
(000017, '12L-2080', 'CPE_01', 'GE', 'sem_01', '2015-2016'),
(000018, '12L-2080', 'CPE_01', 'GF', 'sem_01', '2015-2016'),
(000019, '12L-2070', 'CPE_02', 'GF', 'sem_01', '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `stud_prof`
--

CREATE TABLE `stud_prof` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `stud_id` varchar(20) NOT NULL,
  `prof_id` varchar(20) NOT NULL,
  `prof_name` varchar(200) NOT NULL,
  `subj_code` varchar(20) NOT NULL,
  `section_id` varchar(20) NOT NULL,
  `sem_id` varchar(20) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `evaluated` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_prof`
--

INSERT INTO `stud_prof` (`id`, `stud_id`, `prof_id`, `prof_name`, `subj_code`, `section_id`, `sem_id`, `school_year`, `evaluated`) VALUES
(000013, '12L-2080', 'COE_001', 'Engr. Jerwin Obmerga', 'CPE000', 'CPE_01', 'sem_01', '2015-2016', '1'),
(000014, '12L-2080', 'COE_002', 'Engr. Allen Pavino', 'CPE312', 'CPE_01', 'sem_01', '2015-2016', '1'),
(000015, '12L-2080', 'COE_001', 'Engr. Jerwin Obmerga', 'CPE312', 'CPE_02', 'sem_01', '2015-2016', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subj_code` varchar(20) NOT NULL,
  `subj_des` varchar(200) NOT NULL,
  `sem_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subj_code`, `subj_des`, `sem_id`) VALUES
('CAD1', 'COMPUTER AIDED DRAFTING', 'sem_01'),
('COE01', 'ENGINEERING ORIENATION', 'sem_01'),
('CPE311', 'LOGIC CIRCUITS AND SWITCH THEORY', 'sem_02'),
('CPE421', 'CONTROL SYSTEM', 'sem_01'),
('MAT02', 'COLLEGE ALGEBRA', 'sem_01'),
('MAT02c', 'ADVANCED ALGEBRA', 'sem_02'),
('MAT06', 'DIFFIRENTIAL CALCULUS', 'sem_01'),
('MAT07', 'INTEGRAL CALCULUS', 'sem_02');

-- --------------------------------------------------------

--
-- Table structure for table `subj_prof`
--

CREATE TABLE `subj_prof` (
  `subj_prof_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `subj_code` varchar(20) NOT NULL,
  `prof_id` varchar(20) NOT NULL,
  `section_id` varchar(200) NOT NULL,
  `year_level` enum('I','II','III','IV','V') NOT NULL,
  `sem_id` varchar(20) NOT NULL,
  `school_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subj_prof`
--

INSERT INTO `subj_prof` (`subj_prof_id`, `subj_code`, `prof_id`, `section_id`, `year_level`, `sem_id`, `school_year`) VALUES
(000018, 'CPE000', 'COE_001', 'CPE_01', 'I', 'sem_01', '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `subj_sort`
--

CREATE TABLE `subj_sort` (
  `subj_sort_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `subj_code` varchar(20) NOT NULL,
  `subj_des` varchar(200) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `sem_id` varchar(20) NOT NULL,
  `year_level` enum('I','II','III','IV','V') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `total_rating`
--

CREATE TABLE `total_rating` (
  `total_rating_id` varchar(20) NOT NULL,
  `total_rating` varchar(50) NOT NULL,
  `prof_id` varchar(20) NOT NULL,
  `sem_id` varchar(20) NOT NULL,
  `school_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `user_level_id` varchar(8) NOT NULL,
  `user_description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`user_level_id`, `user_description`) VALUES
('user_01', 'admin'),
('user_02', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `average`
--
ALTER TABLE `average`
  ADD PRIMARY KEY (`ave_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`Name_prof`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`prof_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `student_section`
--
ALTER TABLE `student_section`
  ADD PRIMARY KEY (`student_section_id`);

--
-- Indexes for table `stud_prof`
--
ALTER TABLE `stud_prof`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subj_code`);

--
-- Indexes for table `subj_prof`
--
ALTER TABLE `subj_prof`
  ADD PRIMARY KEY (`subj_prof_id`);

--
-- Indexes for table `subj_sort`
--
ALTER TABLE `subj_sort`
  ADD PRIMARY KEY (`subj_sort_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`user_level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `average`
--
ALTER TABLE `average`
  MODIFY `ave_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_section`
--
ALTER TABLE `student_section`
  MODIFY `student_section_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `stud_prof`
--
ALTER TABLE `stud_prof`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `subj_prof`
--
ALTER TABLE `subj_prof`
  MODIFY `subj_prof_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `subj_sort`
--
ALTER TABLE `subj_sort`
  MODIFY `subj_sort_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
