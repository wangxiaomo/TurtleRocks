<?php
require_once('utils.php');
require_once('../../libs/db.php');

$consumer = $_COOKIE["consumer"];
$sql = "select id, tr_family.name, relationship, tr_family.contact_num from tr_family, tr_student where tr_student.student_id=tr_family.student_id and consumer='$consumer';";

$db = new DB;
$db->connect();
$db->query($sql);

$family_info = Array();
while($db->next_record()){
    array_push($family_info, Array(
        "id"        =>  $db->f("id"),
        "name"      =>  $db->f("name"),
        "relationship"  =>  $db->f("relationship"),
        "contact_num"   =>  $db->f("contact_num"),
    ));
}
jsonize($family_info);
?>
