<?php
require_once('../libs/db.php');

function add_student($consumer, $name, $gender){
    $db = new DB;
    $db->connect();
    $db->query("INSERT INTO tr_login(consumer, password, user_type) VALUES('$consumer', '" . md5('123') . "', 1);");
    $db->query("INSERT INTO tr_student(consumer, name, gender) VALUES('$consumer', '$name', $gender);");
}

function rm_student($student_id){
    $db = new DB;
    $db->connect();
    $db->query("SELECT consumer FROM tr_student WHERE student_id=$student_id;");
    $db->next_record();
    $consumer = $db->f('consumer');
    
    //do delete action
    $db->query("DELETE FROM tr_student WHERE student_id=$student_id;");
    $db->query("DELETE FROM tr_login WHERE consumer='$consumer';");
}

function view_student_info($student_id){
    $db = new DB;
    $db->connect();
    $db->query("SELECT name, gender FROM tr_student WHERE student_id=$student_id");
    $db->next_record();
    $info = Array();
    $info['name'] = $db->f('name');
    $info['gender'] = $db->f('gender');
    return $info;
}

function view_student_record($student_id){
    $db = new DB;
    $db->connect();
    $db->query("SELECT company_name,job_name,request_date,audit_date,status FROM tr_company,tr_job,tr_record 
    WHERE tr_record.job_id=tr_job.job_id AND tr_record.student_id=$student_id AND tr_job.company_id=tr_company.company_id
    ORDER BY request_date DESC;");
    $ret = Array();
    while($db->next_record()){
        array_push($ret, Array(
            'company_name' => $db->f('company_name'),
            'job_name' => $db->f('job_name'),
            'request_date' => $db->f('request_date'),
            'audit_date' => $db->f('audit_date'),
            'status' => $db->f('status'),
        ));
    }
    return $ret;
}
function update_school_info($consumer, $department_name){
    $db = new DB;
    $db->connect();
    $db->query("UPDATE tr_school SET department_name='" . $department_name . "' WHERE consumer='" . $consumer . "';");
    return true;
}
?>
