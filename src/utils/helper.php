<?php
require_once('../libs/db.php');

function get_user_type($consumer){
    //根据 consumer 来返回用户类型
    //  -1 unvalid
    //   0 school
    //   1 student
    //   2 company
    $db = new DB;
    $db->connect();
    $db->query("SELECT user_type FROM tr_login WHERE consumer='$consumer';");
    $db->next_record();
    $user_type = $db->f('user_type');
    return $user_type == NULL?-1:$user_type;
}

function check_login($consumer, $password){
    //检查账号密码并返回用户类型。
    $db = new DB;
    $db->connect();
    $db->query("SELECT user_type FROM tr_login WHERE consumer='$consumer' AND password='" . md5($password) . "';");
    $db->next_record();
    $user_type = $db->f('user_type');
    return $user_type == NULL?-1:$user_type;
}
?>
