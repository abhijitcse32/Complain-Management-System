-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2017 at 07:00 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`id` int(11) NOT NULL,
  `com_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `com_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `CreatedBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` date NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `com_id`, `com_name`, `com_address`, `sort`, `CreatedBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(6, 'KWT', 'Kumudini Welfare Trust of Bengal', '74. Gulshan Avenue', 1, 'admin', '2016-11-19', 'admin', '2016-11-19 11:03:32'),
(7, 'KPL', 'Kumudini Pharma Limited', '74. Gulshan Avenue, Dhaka', 5, 'admin', '2016-11-19', 'admin', '2016-12-07 11:34:40'),
(8, 'RPSU', 'Ranada Prashad Shaha University', 'Narayangonj', 2, 'admin', '2016-11-19', 'admin', '2016-12-07 11:33:41'),
(9, 'KWMC', 'Kumudini Women''s Medical College', 'Mirzapur, Tangail', 6, 'admin', '2016-11-19', 'admin', '2016-12-07 11:34:47'),
(10, 'KHC', 'Kumudini Handicrafts', '86. Sirajuddowla Road', 4, 'admin', '2016-12-07', 'admin', '2016-12-07 11:34:34'),
(11, 'KGM', 'Kumudini Garments', '86. Sirajuddowla Road', 3, 'admin', '2016-12-07', 'admin', '2016-12-07 11:34:23'),
(12, 'KH', 'Kumudini Hospital', 'Mirzapur, Tangail', 7, 'admin', '2016-12-07', '', '0000-00-00 00:00:00'),
(13, 'KBH', 'Kumudini Bharateswari Homes', 'Mirzapur, Tangail', 8, 'admin', '2016-12-07', '', '0000-00-00 00:00:00'),
(14, 'KNC', 'Kumudini Narsing College', 'Mirzapur, Tangail', 10, 'admin', '2016-12-07', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE IF NOT EXISTS `complain` (
`id` int(11) NOT NULL,
  `com_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `des_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `aggregate_val` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `CreatedBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` date NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `com_id`, `name`, `des_id`, `subject`, `description`, `status`, `mail`, `aggregate_val`, `CreatedBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(1, 'KWT', 'sfdfdfsd', 'gsdfgfsdgf', 'asdasdsd', 'sdgsfdgff', '', 'dfgdf', 'KWT-asdasdsd(2017-01-28)', 'sfdfdfsd', '2017-01-28', '', '0000-00-00 00:00:00'),
(2, 'KWT', 'sdfgdsfds', 'bdgdfgdf', 'saZsAS', 'fsdfgsdfsd', '', 'vcbvvxcvxcv', 'KWT-saZsAS(2017-01-29)', 'sdfgdsfds', '2017-01-29', '', '0000-00-00 00:00:00'),
(3, 'KWT', 'fdaafdfds', 'fghdhghfg', 'bnvbnvnvb', 'khkgkjkhjkhj', '', 'v vcxvxcvxcx', 'KWT-bnvbnvnvb(2017-01-29 15:30:48)', 'fdaafdfds', '2017-01-29', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `complain_seq`
--

CREATE TABLE IF NOT EXISTS `complain_seq` (
`id` int(11) NOT NULL,
  `complain_id` int(11) NOT NULL,
  `handle_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `CreatedBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` date NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complain_seq`
--

INSERT INTO `complain_seq` (`id`, `complain_id`, `handle_by`, `action`, `status`, `comments`, `CreatedBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(1, 1, 'Abhijit', 'ok', 'sdfsdfsdf', 'dgsssdfsd', 'ict', '2017-01-28', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`id` int(11) NOT NULL,
  `dep_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dep_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `CreatedBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` date NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_id`, `dep_name`, `sort`, `CreatedBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(1, 'ICT', 'Information and Communication Technology', 1, 'admin', '2016-11-19', 'admin', '2016-11-19 11:14:01'),
(2, 'MKT', 'Marketing', 2, 'admin', '2016-11-19', 'admin', '2016-11-19 11:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
`id` int(11) NOT NULL,
  `des_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `des_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `CreatedBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` date NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `des_id`, `des_name`, `sort`, `CreatedBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(1, 'MIT', 'Manager, IT', 1, 'admin', '2016-11-19', 'admin', '2016-11-19 11:26:32'),
(2, 'AMIT', 'Assistant Manager, IT', 2, 'admin', '2016-11-19', '', '0000-00-00 00:00:00'),
(3, 'SPROG', 'Senior Programmer, IT', 3, 'admin', '2016-11-19', '', '0000-00-00 00:00:00'),
(4, 'PROG', 'Programmer, IT', 4, 'admin', '2016-11-19', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `emp_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `des_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CreatedBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` date NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `emp_name`, `com_id`, `dept_id`, `des_id`, `sort`, `user_id`, `CreatedBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(5, 'Q080', 'dfdsfssd', 'KPL', 'ICT', 'AMIT', 4, '', 'admin', '2016-11-20', '', '0000-00-00 00:00:00'),
(6, 'A002', 'fdfsdfdssd', 'KWT', 'ICT', 'MIT', 7, '', 'admin', '2016-11-20', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exist_user`
--

CREATE TABLE IF NOT EXISTS `exist_user` (
`id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exist_user`
--

INSERT INTO `exist_user` (`id`, `username`, `emp_name`, `CreateBy`, `CreateDate`) VALUES
(1, 'Q080', 'dfdsfssd', 'admin', '2016-11-20'),
(2, 'A002', 'fdfsdfdssd', 'admin', '2016-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `itperson`
--

CREATE TABLE IF NOT EXISTS `itperson` (
`id` int(11) NOT NULL,
  `per_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `itperson`
--

INSERT INTO `itperson` (`id`, `per_name`, `designation`) VALUES
(1, 'H.K.Das', 'Asst. Manager, IT'),
(2, 'Md. Monir Hossain', 'Programmer'),
(3, 'Abhijit Chanda', 'Jr. Programmer'),
(4, 'Md. Abu Bakar Siddique', 'IT Officer');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `login_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `login_date`) VALUES
(1, 'admin', '2016-11-20 06:48:09'),
(2, 'Q080', '2016-11-20 06:51:23'),
(3, 'admin', '2016-11-20 07:17:13'),
(4, 'admin', '2016-11-20 07:19:31'),
(5, 'admin', '2016-11-20 07:30:31'),
(6, 'Q078', '2016-11-20 09:24:22'),
(7, 'Q080', '2016-11-20 09:24:38'),
(8, 'admin', '2016-11-20 09:34:45'),
(9, 'A002', '2016-11-20 10:09:41'),
(10, 'admin', '2016-11-26 04:28:00'),
(11, 'admin', '2016-11-26 04:46:10'),
(12, 'admin', '2016-11-28 04:56:12'),
(13, 'admin', '2016-12-07 06:29:45'),
(14, 'admin', '2017-01-03 08:56:59'),
(15, 'Q080', '2017-01-03 08:59:06'),
(16, 'admin', '2017-01-03 10:38:31'),
(17, 'admin', '2017-01-03 10:40:46'),
(18, 'admin', '2017-01-04 04:21:07'),
(19, 'admin', '2017-01-29 11:19:16'),
(20, 'admin', '2017-01-30 05:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `menulist`
--

CREATE TABLE IF NOT EXISTS `menulist` (
`id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `parent_menu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `menu_path` varchar(50) NOT NULL,
  `access` varchar(25) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` date NOT NULL,
  `UpdateBy` varchar(30) NOT NULL,
  `UpdateeDate` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menulist`
--

INSERT INTO `menulist` (`id`, `menu_id`, `menu_name`, `parent_menu`, `menu_path`, `access`, `main_menu_id`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateeDate`) VALUES
(1, 1, 'Setting', 'Main', '', 'Administrator', 0, 'admin', '2016-11-19', '', '0000-00-00'),
(2, 2, 'Company Entry', 'Setting', 'index.php?Basic=ComE', 'Administrator', 1, 'admin', '2016-11-19', '', '0000-00-00'),
(3, 3, 'Department Entry', 'Setting', 'index.php?Basic=DeptE', 'Administrator', 1, 'admin', '2016-11-19', '', '0000-00-00'),
(5, 5, 'Employee Entry', 'Setting', 'index.php?Basic=EmpE', 'Administrator', 1, 'admin', '2016-11-19', '', '0000-00-00'),
(4, 4, 'Designation Entry', 'Setting', 'index.php?Basic=DesE', 'Administrator', 1, 'admin', '2016-11-19', '', '0000-00-00'),
(6, 6, 'Complain Entry', 'Main', 'index.php?Basic=ComplE', 'Local', 0, 'admin', '2016-11-20', '', '0000-00-00'),
(7, 7, 'Report', 'Main', '', 'Administrator', 0, 'admin', '2016-11-20', '', '0000-00-00'),
(8, 8, 'Complain Report', 'Report', 'index.php?Basic=ComplRep', 'Administrator', 7, 'admin', '2016-11-20', '', '0000-00-00'),
(9, 9, 'My Report', 'Main', 'index.php?Basic=MyRpt', 'Local', 0, 'admin', '2016-11-20', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `stat_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `stat_name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Solve');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `last_login_date` datetime NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `user_status` int(1) NOT NULL COMMENT '1=power / super user; 2 = normal user',
  `status` int(11) NOT NULL COMMENT '0= inactive; 1=active; 13 = delete',
  `CreateDate` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `last_login_date`, `last_login_ip`, `user_status`, `status`, `CreateDate`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-06-08 13:25:33', '::1', 1, 1, '0000-00-00 00:00:00'),
(3, 'Local', 'Q080', 'd789a6838b57d84891f87edb045cfbf9', '0000-00-00 00:00:00', '', 0, 0, '2016-11-20 10:16:37'),
(4, 'Local', 'A002', '4074aee5bb6de61b352f6b98d45466e8', '0000-00-00 00:00:00', '', 0, 0, '2016-11-20 15:09:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain_seq`
--
ALTER TABLE `complain_seq`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exist_user`
--
ALTER TABLE `exist_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itperson`
--
ALTER TABLE `itperson`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menulist`
--
ALTER TABLE `menulist`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `complain_seq`
--
ALTER TABLE `complain_seq`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `exist_user`
--
ALTER TABLE `exist_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `itperson`
--
ALTER TABLE `itperson`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `menulist`
--
ALTER TABLE `menulist`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
