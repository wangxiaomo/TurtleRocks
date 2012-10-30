<?php
require_once('utils.php');
require_once('../../libs/db.php');

$consumer = $_COOKIE["consumer"];
$id = $_POST["id"];
$name = $_POST["name"];
$relationship = $_POST["relationship"];
$contact_num = $_POST["contact_num"];

$db = new DB;
$db->connect();
$db->query("select student_id from tr_student where consumer='$consumer';");
$db->next_record();
$student_id = $db->f("student_id");

$db->query("update tr_family set name='$name', relationship='$relationship', contact_num='$contact_num' where student_id=$student_id and id=$id");
?>
