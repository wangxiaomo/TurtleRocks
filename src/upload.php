<?php
date_default_timezone_set('Asia/Chongqing');

$consumer = $_COOKIE["consumer"];
$file_name = $consumer . mktime() . $_FILES["change_photo"]["name"];

$ext_type = $_FILES["change_photo"]["type"];
$size = $_FILES["change_photo"]["size"];

var_dump($_FILES);
move_uploaded_file($_FILES["change_photo"]["tmp_name"], "../upload/students/" . $file_name);

require_once('../libs/db.php');
$db = new DB;
$db->connect();
$db->query("UPDATE tr_student SET pic_path='../upload/students/$file_name' WHERE consumer='$consumer';");
var_dump($db);
if($db->Error){
    var_dump("ERROR");
}
?>
