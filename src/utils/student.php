<?php
require_once('../libs/db.php');
function view_student_information ($student_id){
	$sql = "select * from tr_student where student_id=$student_id ";
	$db = new DB;
	$db->connect();
	$db->query($sql);
	$ret = Array();
	while($db->next_record()){
		array_push($ret,Array('consumer'=>$db->f('consumer'), 'name'=>$db->f('name'),'gender'=>$db->f('gender')));
	}
	return $ret;
} 
function fix_student_information($student_id,$name,$gender){
	$sql = "update tr_student set name = '$name',gender = '$gender' where student_id = $student_id";
	$db = new DB;
	$db->connect();
	$db->query($sql);
}
function registration($student_id,$job_id,$request_date){
	$sql = "insert into tr_record (student_id,job_id,request_date,status) values ($student_id,$job_id,'$request_date',0)";
	$db = new DB;
	$db->connect();
	$db->query($sql);
}
function view_employment($student_id,$job_id){
	$sql = "select status from tr_record where student_id='$student_id' and job_id='$job_id'";
	$db = new DB;
	$db->connect();
	$db->query($sql);
	$db->next_record();
	return $db->f('status');
}
function view_company_information($company_id){
	$sql = "select company_name,meta_info from tr_company where company_id = $company_id";
	$db = new DB;
	$db->connect();
	$db->query($sql);
	$ret = Array();
	while($db->next_record()){
		array_push($ret,Array('company_name'=>$db->f('company_name'), 'meta_info'=>$db->f('meta_info')));
	}
	return $ret;	
}
function view_job_information($job_id){
    $db = new DB;
    $db->connect();
    $db->query("SELECT job_meta FROM tr_job WHERE job_id=$job_id;");
    $db->next_record();
    return $db->f('job_meta');
}
?>
