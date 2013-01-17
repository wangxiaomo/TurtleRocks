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
function audit_apply_record($record_id, $status){
    $db = new DB;
    $db->connect;
    $db->query("UPDATE tr_record SET status=$status WHERE record_id=$record_id;");
}
function get_newest_company($limit=20){
    $db = new DB;
    $db->connect();
    $db->query("SELECT company_id, company_name, meta_info FROM tr_company WHERE company_name<>'' AND meta_info<>'' ORDER BY company_id DESC LIMIT $limit;");
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
function get_companies($page=1, $limit=20){
    $start = ($page-1)*$limit;
    $db = new DB;
    $db->connect();
    $db->query("SELECT company_id, company_name, meta_info FROM tr_company WHERE company_name<>'' AND meta_info<>'' ORDER BY company_id DESC LIMIT $start,$limit;");
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
function get_company_count(){
    $db = new DB;
    $db->connect();
    $db->query("SELECT count(*) as c FROM tr_company WHERE company_name<>'' AND meta_info<>''");
    $db->next_record();
    return $db->f('c');
}
function get_newest_job($limit=20){
    $db = new DB;
    $db->connect();
    $db->query("SELECT job_id,company_name,job_name,job_meta FROM tr_company,tr_job WHERE tr_company.company_id=tr_job.company_id AND tr_company.company_name<>''
    AND meta_info<>'' ORDER BY job_id DESC LIMIT $limit;");
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
function get_job_count_from_company($cid){
    $db = new DB;
    $db->connect();
    $db->query("SELECT count(*) as c FROM tr_company,tr_job WHERE tr_company.company_id=tr_job.company_id "
              ."AND tr_company.company_id=$cid;");
    $db->next_record();
    return $db->f('c');
}
function get_jobs_from_company($cid, $page=1, $limit=20){
    $start = ($page-1)*$limit;
    $db = new DB;
    $db->connect();
    $db->query("SELECT job_id,company_name,job_name,job_meta FROM tr_company,tr_job WHERE tr_company.company_id=tr_job.company_id "
              ."AND tr_company.company_id=$cid LIMIT $start,$limit;");
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
function get_jobs_count_from_company_by_consumer($consumer){
    $db = new DB;
    $db->connect();
    $db->query("SELECT count(*) as c FROM tr_company,tr_job WHERE tr_company.company_id=tr_job.company_id "
              ."AND consumer='$consumer';");
    $db->next_record();
    return $db->f('c');
}
function get_jobs_from_company_by_consumer($consumer, $page=1, $limit=20){
    $start = ($page-1)*$limit;
    $db = new DB;
    $db->connect();
    $db->query("SELECT job_id,company_name,job_name,job_meta FROM tr_company,tr_job WHERE tr_company.company_id=tr_job.company_id "
              ."AND consumer='$consumer' LIMIT $start,$limit;");
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
function get_all_job_count(){
    $db = new DB;
    $db->connect();
    $db->query("SELECT count(*) as c FROM tr_company,tr_job WHERE tr_company.company_id=tr_job.company_id AND tr_company.company_name<>'' AND meta_info<>'';");
    $db->next_record();
    return $db->f('c');
}
function get_all_jobs($page=1, $limit=20){
    $start = ($page-1)*$limit;
    $db = new DB;
    $db->connect();
    $db->query("SELECT job_id,company_name,job_name,job_meta FROM tr_company,tr_job WHERE tr_company.company_id=tr_job.company_id AND tr_company.company_name<>'' AND meta_info<>'' "
              ."LIMIT $start,$limit;");
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
function get_job($job_id){
    $db = new DB;
    $db->connect();
    $db->query("SELECT job_id,company_name,job_name,job_meta FROM tr_company,tr_job WHERE tr_company.company_id=tr_job.company_id "
              ."AND job_id=$job_id;");
    $ret = Array();
    $db->next_record();
    return Array(
        'job_id'=>$db->f('job_id'),
        'company_name'=>$db->f('company_name'), 
        'job_name'=>$db->f('job_name'), 
        'job_meta'=>$db->f('job_meta'),
    );
}
function get_application_count($consumer){
    $db = new DB;
    $db->connect();
    $db->query("SELECT count(*) as c FROM tr_student,tr_company,tr_job,tr_record "
              ."WHERE tr_record.job_id=tr_job.job_id AND tr_job.company_id=tr_company.company_id AND tr_record.student_id=tr_student.student_id "
              ."AND tr_company.consumer='$consumer' AND status=0;");
    $db->next_record();
    return $db->f('c');
}
function get_applications($consumer, $page=1, $limit=20){
    $start = ($page-1)*$limit;
    $db = new DB;
    $db->connect();
    $db->query("SELECT tr_record.student_id,record_id,name,company_name,job_name,request_date,audit_date,status FROM tr_student,tr_company,tr_job,tr_record "
              ."WHERE tr_record.job_id=tr_job.job_id AND tr_job.company_id=tr_company.company_id AND tr_record.student_id=tr_student.student_id "
              ."AND tr_company.consumer='$consumer' AND status=0 ORDER BY record_id LIMIT $start,$limit;");
    $ret = Array();
    while($db->next_record()){
        array_push($ret,Array(
            'student_id'    =>  $db->f('student_id'),
            'record_id' =>  $db->f('record_id'),
            'name'  =>  $db->f('name'),
            'company_name'  =>  $db->f('company_name'),
            'job_name'  =>  $db->f('job_name'),
            'request_date'  =>  $db->f('request_date'),
            'audit_date'    =>  $db->f('audit_date'),
            'status'    =>  $db->f('status'),
        ));
    }
    return $ret;
}
function add_new_company($company_name, $consumer, $password){
    $db = new DB;
    $db->connect();
    $db->query("INSERT INTO tr_login(consumer,password,user_type) VALUES('$consumer', '" . md5($password) . "',2);");
    if($db->Error){
        return "用户名已存在.";
    }
    $db->query("SELECT count(*) as c FROM tr_company WHERE company_name='$company_name' AND company_name<>'';");
    $db->next_record();
    if($db->f('c')){
        return "公司名已存在.请确认!";
    }else{
        $db->query("INSERT INTO tr_company(consumer,company_name) VALUES('$consumer', '$company_name');");
        return "添加成功!";
    }
}
function get_company_name($consumer){
    $db = new DB;
    $db->connect();

    $db->query("SELECT company_name FROM tr_company WHERE consumer='$consumer';");
    $db->next_record();
    return $db->f('company_name');
}
?>
