<?php
require_once('utils.php');
require_once('../../libs/db.php');

$job_id = $_GET["job_id"];
$consumer = $_COOKIE["consumer"];

$db = new DB;
$db->connect();
$db->query("SELECT user_type FROM tr_login WHERE consumer='$consumer';");
$db->next_record();
$user_type = $db->f('user_type');
if($user_type != 2){
    header("HTTP/1.1 403");
    return false;
}

$db->query("SELECT company_id FROM tr_company WHERE consumer='$consumer';");
$db->next_record();
$company_id = $db->f('company_id');

$db->query("DELETE FROM tr_job WHERE company_id=$company_id AND job_id=$job_id;");

if($db->Error){
    jsonize(Array('r'=>0));
}else{
    jsonize(Array('r'=>1));
}
?>
