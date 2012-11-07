<?php
date_default_timezone_set('Asia/Chongqing');

$consumer = $_COOKIE["consumer"];
$file_name = $consumer . mktime() . $_FILES["change_photo"]["name"];

$ext_type = $_FILES["change_photo"]["type"];
$size = $_FILES["change_photo"]["size"];

move_uploaded_file($_FILES["change_photo"]["tmp_name"], "../upload/students/" . $file_name);

require_once('../libs/db.php');
$db = new DB;
$db->connect();
$db->query("SELECT pic_path FROM tr_student WHERE consumer='$consumer';");
$db->next_record();
$origin_name = $db->f('pic_path');
unlink($origin_name);
$db->query("UPDATE tr_student SET pic_path='../upload/students/$file_name' WHERE consumer='$consumer';");
?>
