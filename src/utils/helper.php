<?php
require_once('../libs/db.php');

function escape($data){
    // trim and escape
    return mysql_real_escape_string(trim($data));
}

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

function get_account_info($user_type, $consumer){
    $db = new DB;
    $db->connect();
    //根据 user_type 取得 account 信息
    if($user_type == 0){
        $sql = "SELECT department_name, department_type FROM tr_school WHERE consumer='" . $consumer . "';";
        $db->query($sql);
        $db->next_record();
        return Array(
          'department_name' =>  $db->f('department_name'),
          'department_type' =>  $db->f('department_type'),
        );
    }elseif($user_type == 1){
        $sql = "SELECT student_id, name, gender, pic_path, id_num, grade, major, contact_num, extra "
             . "FROM tr_student WHERE consumer='" . $consumer . "';";
        $db->query($sql);
        $db->next_record();
        $student_id = $db->f('student_id');
        $account = Array(
          'student_id'    =>  $student_id,
          'name'          =>  $db->f('name'),
          'gender'        =>  $db->f('gender'),
          'pic_path'      =>  $db->f('pic_path'),
          'id_num'        =>  $db->f('id_num'),
          'grade'         =>  $db->f('grade'),
          'major'         =>  $db->f('major'),
          'contact_num'   =>  $db->f('contact_num'),
          'extra'         =>  $db->f('extra'),
          'family_info'   =>  Array(),
        );
        $sql = "SELECT id, name, relationship, contact_num FROM tr_family WHERE student_id='" . $student_id . "';";
        $db->query($sql);
        while($db->next_record()){
          array_push($account['family_info'], Array(
            'id'    =>  $db->f('id'),
            'name'  =>  $db->f('name'),
            'relationship'  =>  $db->f('relationship'),
            'contact_num'   =>  $db->f('contact_num'),
          ));
        }
        return $account;
    }else{
        $sql = "SELECT company_id, company_name, meta_info FROM tr_company WHERE consumer='" . $consumer . "';";
        $db->query($sql);
        $db->next_record();
        return Array(
          'company_id'    =>  $db->f('company_id'),
          'company_name'  =>  $db->f('company_name'),
          'meta_info'     =>  $db->f('meta_info'),
        );
    }
}
?>
