
-- data for test
--


-- table tr_login

DELETE FROM `tr_login`;

INSERT INTO `tr_login`(`consumer`, `password`, `user_type`) VALUES('admin1', PASSWORD('123'), 0);
INSERT INTO `tr_login`(`consumer`, `password`, `user_type`) VALUES('admin2', PASSWORD('123'), 0);

INSERT INTO `tr_login`(`consumer`, `password`, `user_type`) VALUES('test1', PASSWORD('123'), 1);
INSERT INTO `tr_login`(`consumer`, `password`, `user_type`) VALUES('test2', PASSWORD('123'), 1);
INSERT INTO `tr_login`(`consumer`, `password`, `user_type`) VALUES('test3', PASSWORD('123'), 1);
INSERT INTO `tr_login`(`consumer`, `password`, `user_type`) VALUES('test4', PASSWORD('123'), 1);
INSERT INTO `tr_login`(`consumer`, `password`, `user_type`) VALUES('test5', PASSWORD('123'), 1);

INSERT INTO `tr_login`(`consumer`, `password`, `user_type`) VALUES('c1', PASSWORD('123'), 2);
INSERT INTO `tr_login`(`consumer`, `password`, `user_type`) VALUES('c2', PASSWORD('123'), 2);
INSERT INTO `tr_login`(`consumer`, `password`, `user_type`) VALUES('c3', PASSWORD('123'), 2);

-- table tr_school

DELETE FROM `tr_school`;

INSERT INTO `tr_school`(`consumer`, `department_name`, `department_type`) VALUES('admin1', '学生处', 0);
INSERT INTO `tr_school`(`consumer`, `department_name`, `department_type`) VALUES('admin2', '招生办', 1);

-- table tr_school

DELETE FROM `tr_student`;

INSERT INTO `tr_student`(`consumer`, `name`, `gender`) VALUES('test1', 'xiao1', 1);
INSERT INTO `tr_student`(`consumer`, `name`, `gender`) VALUES('test2', 'xiao2', 2);
INSERT INTO `tr_student`(`consumer`, `name`, `gender`) VALUES('test3', 'xiao3', 1);
INSERT INTO `tr_student`(`consumer`, `name`, `gender`) VALUES('test4', 'xiao4', 2);
INSERT INTO `tr_student`(`consumer`, `name`, `gender`) VALUES('test5', 'xiao5', 1);

-- table tr_company

DELETE FROM `tr_company`;

INSERT INTO `tr_company`(`consumer`, `company_name`, `meta_info`) VALUES('c1', 'company1', 'company1 meta');
INSERT INTO `tr_company`(`consumer`, `company_name`, `meta_info`) VALUES('c2', 'company2', 'company1 meta');
INSERT INTO `tr_company`(`consumer`, `company_name`, `meta_info`) VALUES('c3', 'company3', 'company1 meta');

-- table tr_job

DELETE FROM `tr_job`;

INSERT INTO `tr_job`(`company_id`, `job_name`, `job_meta`) VALUES(1, 'job11', 'job11');
INSERT INTO `tr_job`(`company_id`, `job_name`, `job_meta`) VALUES(1, 'job12', 'job12');
INSERT INTO `tr_job`(`company_id`, `job_name`, `job_meta`) VALUES(1, 'job13', 'job13');
INSERT INTO `tr_job`(`company_id`, `job_name`, `job_meta`) VALUES(2, 'job21', 'job21');
INSERT INTO `tr_job`(`company_id`, `job_name`, `job_meta`) VALUES(2, 'job22', 'job22');

-- table tr_record

DELETE FROM `tr_record`;

INSERT INTO `tr_record`(`student_id`, `job_id`, `request_date`, `audit_date`, `status`) VALUES(1, 1, '2011/12/3', '2011/12/4', 1);
INSERT INTO `tr_record`(`student_id`, `job_id`, `request_date`, `audit_date`, `status`) VALUES(2, 1, '2012/2/3', '2012/2/4', 1);
INSERT INTO `tr_record`(`student_id`, `job_id`, `request_date`, `audit_date`, `status`) VALUES(2, 3, '2012/2/3', '2012/2/4', 1);
INSERT INTO `tr_record`(`student_id`, `job_id`, `request_date`, `audit_date`, `status`) VALUES(2, 3, '', '', 0);
INSERT INTO `tr_record`(`student_id`, `job_id`, `request_date`, `audit_date`, `status`) VALUES(3, 3, '', '', 0);
INSERT INTO `tr_record`(`student_id`, `job_id`, `request_date`, `audit_date`, `status`) VALUES(4, 3, '', '', 0);
