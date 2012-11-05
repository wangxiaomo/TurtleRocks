-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 11 月 05 日 10:34
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.6-1ubuntu1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `turtlerock`
--

-- --------------------------------------------------------

--
-- 表的结构 `tr_company`
--

CREATE TABLE IF NOT EXISTS `tr_company` (
  `consumer` varchar(20) NOT NULL,
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(20) NOT NULL,
  `meta_info` text NOT NULL,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `company_id` (`company_id`),
  UNIQUE KEY `company_name` (`company_name`),
  KEY `consumer` (`consumer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tr_company`
--

INSERT INTO `tr_company` (`consumer`, `company_id`, `company_name`, `meta_info`) VALUES
('c1', 1, 'company1', 'company1 meta'),
('c2', 2, 'company2', 'company1 meta'),
('c3', 3, 'company3', 'company1 meta');

-- --------------------------------------------------------

--
-- 表的结构 `tr_family`
--

CREATE TABLE IF NOT EXISTS `tr_family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `relationship` varchar(20) NOT NULL,
  `contact_num` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tr_job`
--

CREATE TABLE IF NOT EXISTS `tr_job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `job_name` varchar(20) NOT NULL,
  `job_meta` text NOT NULL,
  PRIMARY KEY (`job_id`),
  UNIQUE KEY `job_id` (`job_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `tr_job`
--

INSERT INTO `tr_job` (`job_id`, `company_id`, `job_name`, `job_meta`) VALUES
(1, 1, 'job11', 'job11'),
(2, 1, 'job12', 'job12'),
(3, 1, 'job13', 'job13'),
(4, 2, 'job21', 'job21'),
(5, 2, 'job22', 'job22');

-- --------------------------------------------------------

--
-- 表的结构 `tr_login`
--

CREATE TABLE IF NOT EXISTS `tr_login` (
  `consumer` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_type` int(11) NOT NULL,
  UNIQUE KEY `consumer` (`consumer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理系统登录表';

--
-- 转存表中的数据 `tr_login`
--

INSERT INTO `tr_login` (`consumer`, `password`, `user_type`) VALUES
('admin1', '202cb962ac59075b964b07152d234b70', 0),
('admin2', '202cb962ac59075b964b07152d234b70', 0),
('c1', '202cb962ac59075b964b07152d234b70', 2),
('c2', '202cb962ac59075b964b07152d234b70', 2),
('c3', '202cb962ac59075b964b07152d234b70', 2),
('test1', '202cb962ac59075b964b07152d234b70', 1),
('test2', '202cb962ac59075b964b07152d234b70', 1),
('test3', '202cb962ac59075b964b07152d234b70', 1),
('test4', '202cb962ac59075b964b07152d234b70', 1),
('test5', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tr_record`
--

CREATE TABLE IF NOT EXISTS `tr_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `audit_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`record_id`),
  KEY `student_id` (`student_id`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `tr_record`
--

INSERT INTO `tr_record` (`record_id`, `student_id`, `job_id`, `request_date`, `audit_date`, `status`) VALUES
(1, 1, 1, '2011-12-03', '2011-12-04', 1),
(2, 2, 1, '2012-02-03', '2012-02-04', 1),
(3, 2, 3, '2012-02-03', '2012-02-04', 1),
(4, 2, 3, '0000-00-00', '0000-00-00', 0),
(5, 3, 3, '0000-00-00', '0000-00-00', 0),
(6, 4, 3, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tr_school`
--

CREATE TABLE IF NOT EXISTS `tr_school` (
  `consumer` varchar(20) NOT NULL,
  `department_name` varchar(20) NOT NULL,
  `department_type` int(11) NOT NULL,
  KEY `consumer` (`consumer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tr_school`
--

INSERT INTO `tr_school` (`consumer`, `department_name`, `department_type`) VALUES
('admin1', '学生处', 0),
('admin2', '招生办', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tr_student`
--

CREATE TABLE IF NOT EXISTS `tr_student` (
  `consumer` varchar(20) NOT NULL,
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `pic_path` varchar(40) NOT NULL,
  `id_num` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `major` varchar(20) NOT NULL,
  `contact_num` varchar(20) NOT NULL,
  `extra` text NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_id` (`student_id`),
  KEY `consumer` (`consumer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `tr_student`
--

INSERT INTO `tr_student` (`consumer`, `student_id`, `name`, `gender`, `pic_path`, `id_num`, `grade`, `major`, `contact_num`, `extra`) VALUES
('test1', 1, 'xiao1', 1, '../upload/students/1.jpg', '123', '123', '123', '123', 'asdasdasd'),
('test2', 2, 'xiao2', 2, '', '', '', '', '', ''),
('test3', 3, 'xiao3', 1, '', '', '', '', '', ''),
('test4', 4, 'xiao4', 2, '', '', '', '', '', ''),
('test5', 5, 'xiao5', 1, '', '', '', '', '', '');

--
-- 限制导出的表
--

--
-- 限制表 `tr_company`
--
ALTER TABLE `tr_company`
  ADD CONSTRAINT `tr_company_ibfk_1` FOREIGN KEY (`consumer`) REFERENCES `tr_login` (`consumer`);

--
-- 限制表 `tr_job`
--
ALTER TABLE `tr_job`
  ADD CONSTRAINT `tr_job_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `tr_company` (`company_id`);

--
-- 限制表 `tr_record`
--
ALTER TABLE `tr_record`
  ADD CONSTRAINT `tr_record_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tr_student` (`student_id`),
  ADD CONSTRAINT `tr_record_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `tr_job` (`job_id`);

--
-- 限制表 `tr_school`
--
ALTER TABLE `tr_school`
  ADD CONSTRAINT `tr_school_ibfk_1` FOREIGN KEY (`consumer`) REFERENCES `tr_login` (`consumer`);

--
-- 限制表 `tr_student`
--
ALTER TABLE `tr_student`
  ADD CONSTRAINT `tr_student_ibfk_1` FOREIGN KEY (`consumer`) REFERENCES `tr_login` (`consumer`);

--
-- 限制表 `tr_family`
--
ALTER TABLE `tr_family`
  ADD CONSTRAINT `tr_family_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tr_student` (`student_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
