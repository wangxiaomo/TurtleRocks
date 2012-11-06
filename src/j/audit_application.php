<?php
require_once('utils.php');
require_once('../../libs/db.php');

$consumer = $_COOKIE["consumer"];
$record_id = $_GET["record_id"];
$op = $_GET["op"];

$status = $op=='yes'?1:0;

$db = new DB;
$db->connect();
$db->query("SELECT user_type FROM tr_login WHERE consumer='$consumer';");
$db->next_record();
$user_type = $db->f('user_type');
if($user_type != 2){
    header("HTTP/1.1 403");
    return false;
}

$db->query("SELECT tr_company.company_id FROM tr_company, tr_job, tr_record WHERE tr_record.job_id=tr_job.job_id AND tr_company.company_id=tr_job.company_id AND consumer='$consumer' AND record_id=$record_id;");
$db->next_record();
$company_id = $db->f('company_id');
if(!$company_id){
    return jsonize(Array('r'=>0));
}

$db->query("UPDATE tr_record SET status=$status,audit_date=NOW() WHERE record_id=$record_id;");

if($db->Error){
    jsonize(Array('r'=>0));
}else{
    jsonize(Array('r'=>1));
}
?>
