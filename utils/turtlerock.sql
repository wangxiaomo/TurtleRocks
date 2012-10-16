
-- TurtleRock SQL Initialization

--
-- tr_login
--   consumer 全局 login prefix
--   password login password with MD5 encrypt
--   user_type 0 school
--             1 student
--             2 company

CREATE TABLE IF NOT EXISTS `tr_login` (
  `consumer` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_type` int(11) NOT NULL,
  UNIQUE KEY `consumer` (`consumer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理系统登录表';


--
-- tr_school
--

CREATE TABLE IF NOT EXISTS `tr_school` (
  `consumer` varchar(20) NOT NULL,
  `department_name` varchar(20) NOT NULL,
  `department_type` int(11) NOT NULL,
  FOREIGN KEY (`consumer`) REFERENCES `tr_login` (`consumer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- tr_student
--

CREATE TABLE IF NOT EXISTS `tr_student` (
  `consumer` varchar(20) NOT NULL,
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  PRIMARY KEY (`student_id`),
  FOREIGN KEY (`consumer`) REFERENCES `tr_login` (`consumer`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- tr_company
--

CREATE TABLE IF NOT EXISTS `tr_company` (
  `consumer` varchar(20) NOT NULL,
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(20) NOT NULL,
  `meta_info` text NOT NULL,
  PRIMARY KEY (`company_id`),
  FOREIGN KEY (`consumer`) REFERENCES `tr_login` (`consumer`),
  UNIQUE KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- tr_job
--

CREATE TABLE IF NOT EXISTS `tr_job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `job_name` varchar(20) NOT NULL,
  `job_meta` text NOT NULL,
  PRIMARY KEY (`job_id`),
  FOREIGN KEY (`company_id`) REFERENCES `tr_company` (`company_id`),
  UNIQUE KEY `job_id` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- tr_record
--

CREATE TABLE IF NOT EXISTS `tr_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `audit_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`record_id`),
  FOREIGN KEY (`student_id`) REFERENCES `tr_student` (`student_id`),
  FOREIGN KEY (`job_id`) REFERENCES `tr_job` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Initialization Done
