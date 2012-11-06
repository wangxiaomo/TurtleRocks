<?php
require_once('utils.php');
require_once('../../libs/db.php');

$consumer = $_COOKIE["consumer"];
$job_name = escape($_POST["job_name"]);
$job_meta = escape($_POST["job_meta"]);

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

$db->query("INSERT INTO tr_job(company_id, job_name, job_meta) VALUES($company_id, '$job_name', '$job_meta');");
if($db->Error){
    jsonize(Array('r'=>0));
}else{
    jsonize(Array('r'=>1));
}
?>
