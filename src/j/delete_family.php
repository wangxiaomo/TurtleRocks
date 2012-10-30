<?php
require_once('utils.php');
require_once('../../libs/db.php');

$id = $_POST["id"];
$consumer = $_COOKIE["consumer"];

$db = new DB;
$db->connect();
$db->query("select student_id from tr_student where consumer='$consumer';");
$db->next_record();
$student_id = $db->f("student_id");

$db->query("delete from tr_family where student_id=$student_id and id=$id");
?>
