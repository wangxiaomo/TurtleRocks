<?php
require_once('utils.php');
require_once('../../libs/db.php');

$consumer = $_COOKIE["consumer"];
$name = $_POST["name"];
$relationship = $_POST["relationship"];
$contact_num = $_POST["contact_num"];

$db = new DB;
$db->connect();
$db->query("select student_id from tr_student where consumer='$consumer';");
$db->next_record();
$student_id = $db->f("student_id");

$db->query("insert into tr_family(student_id, name, relationship, contact_num) values($student_id, '$name', '$relationship', '$contact_num')");

$db->query("select last_insert_id() as id");
$db->next_record();
echo jsonize($db->Record);
?>
