<?php
require_once('utils.php');
require_once('../../libs/db.php');

$consumer = $_COOKIE["consumer"];
$job_id = $_GET['job_id'];

$db = new DB;
$db->connect();
$db->query("SELECT student_id FROM tr_student,tr_login WHERE tr_login.consumer=tr_student.consumer "
          ."AND tr_student.consumer='$consumer' AND user_type=1;");
$db->next_record();
$student_id = $db->f('student_id');

$db->query("SELECT record_id FROM tr_record WHERE student_id=$student_id AND job_id=$job_id AND status=0;");
$db->next_record();
if($db->f('record_id')){
    return jsonize(Array('r'=>2));
}

$db->query("INSERT INTO tr_record(student_id, job_id, request_date, status) VALUES($student_id, $job_id, "
          ."NOW(), 0);");
if($db->Error){
    jsonize(Array('r'=>0));
}else{
    jsonize(Array('r'=>1));
}
?>
