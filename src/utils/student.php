<?php
require_once('../libs/db.php');
function update_student_info($consumer, $name, $gender, $id_num, $grade, $major, $contact_num, $extra){
    $sql = "update tr_student set name='$name', gender=$gender, id_num='$id_num', grade='$grade', major='$major', contact_num='$contact_num', extra='$extra' where consumer='$consumer';";
    $db = new DB;
    $db->connect();
    $db->query($sql);
    return true;
}
function add_new_student($consumer, $password){
    $db = new DB;
    $db->connect();
    $db->query("INSERT INTO tr_login(consumer, password, user_type) VALUES('$consumer','" . md5($password) . "', 1);");
    if($db->Error){
      return "登录账号已存在.请确认!!!";
    }
    return "";
}
?>
