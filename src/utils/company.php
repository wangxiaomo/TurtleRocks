<?php
require_once('../libs/db.php');
function change_company_meta_info($company_id,$meta_info){
	$sql = "update tr_company set meta_info='$meta_info' where company_id=$company_id";
	$db = new DB;
	$db->connect();
	$db->query($sql);
}
function update_company_info($consumer, $company_name, $meta_info){
	$sql = "update tr_company set company_name='$company_name', meta_info='$meta_info' where consumer='$consumer';";
	$db = new DB;
	$db->connect();
	$db->query($sql);
}
function new_job($company_id,$job_name,$job_meta){
	$sql = "insert into tr_job (company_id,job_name,job_meta) values($company_id,'$job_name','$job_meta')";
	$db =new DB;
	$db->connect();
	$db->query($sql);
}
function fix_job($job_id,$job_name,$job_meta){
	$sql = "update tr_job set job_name='$job_name',job_meta='$job_meta' where job_id=$job_id";
	$db = new DB;
	$db->connect();
	$db->query($sql);
}
function delete_job($job_id){
	$sql ="delete from tr_job where job_id=$job_id ";
	$db = new DB;
	$db->connect();
	$db->query($sql);
}
function view_apply_student($company_id){
	$sql = "select tr_student.name,tr_job.job_name from tr_job,tr_record,tr_student
	where tr_job.job_id = tr_record.job_id and tr_student.student_id = tr_record.student_id and tr_record.status = 0";
	$db = new DB;
	$db->connect();
	$db->query($sql);
    $ret = Array();
	while($db->next_record()){
	    array_push($ret,Array('name'=>$db->f('name'), 'job_name'=>$db->f('job_name')));
	}
	return $ret;
}
function audit_apply_record($record_id, $status){
    $db = new DB;
    $db->connect;
    $db->query("UPDATE tr_record SET status=$status WHERE record_id=$record_id;");
}
function get_newest_company($limit=5){
    $db = new DB;
    $db->connect();
    $db->query("SELECT company_id, company_name, meta_info FROM tr_company ORDER BY company_id DESC LIMIT $limit;");
    $ret = Array();
    while($db->next_record()){
        array_push($ret, Array(
            'company_id'=>$db->f('company_id'),
            'company_name'=>$db->f('company_name'), 
            'meta_info'=>$db->f('meta_info'),
        ));
    }
    return $ret;
}
function get_newest_job($limit=5){
    $db = new DB;
    $db->connect();
    $db->query("SELECT job_id,company_name,job_name,job_meta FROM tr_company,tr_job WHERE tr_company.company_id=tr_job.company_id
    ORDER BY job_id DESC LIMIT $limit;");
    $ret = Array();
    while($db->next_record()){
        array_push($ret, Array(
            'job_id'=>$db->f('job_id'),
            'company_name'=>$db->f('company_name'), 
            'job_name'=>$db->f('job_name'), 
            'job_meta'=>$db->f('job_meta'),
        ));
    }
    return $ret;
}
?>
