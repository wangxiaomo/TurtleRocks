<?php
require_once('utils.php');
require_once('../../libs/db.php');

$job_id = $_POST["job_id"];
$job_name = escape($_POST["job_name"]);
$job_meta = escape($_POST["job_meta"]);
$consumer = $_COOKIE["consumer"];

$db = new DB;
$db->connect();
$db->query("SELECT user_type FROM tr_login WHERE consumer='$consumer';");
$db->next_record();
$user_type = $db->f('user_type');
if($user_type!=0 && $user_type != 2){
    header("HTTP/1.1 403");
    return false;
}

$db->query("SELECT company_id FROM tr_company WHERE consumer='$consumer';");
$db->next_record();
$company_id = $db->f('company_id');

$db->query("UPDATE tr_job SET job_name='$job_name',job_meta='$job_meta' WHERE job_id=$job_id;");

if($db->Error){
    jsonize(Array('r'=>0));
}else{
    jsonize(Array('r'=>1));
}
?>
