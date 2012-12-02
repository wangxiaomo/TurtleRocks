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
    $db->query("INSERT INTO tr_student(consumer) VALUES('$consumer');");
    return "添加成功!";
}
function get_student_info($sid){
    $db = new DB;
    $db->connect();
    $sql = "SELECT student_id, name, gender, pic_path, id_num, grade, major, contact_num, extra "
             . "FROM tr_student WHERE student_id=" . $sid . ";";
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
      'family'        =>  Array(),
    );
    $sql = "select id, name, relationship, contact_num from tr_family where student_id=$sid;";
    $db->query($sql);
    while($db->next_record()){
        array_push($account['family'], Array(
            "id"        =>  $db->f("id"),
            "name"      =>  $db->f("name"),
            "relationship"  =>  $db->f("relationship"),
            "contact_num"   =>  $db->f("contact_num"),
        ));
    }
    return $account;
}
function add_new_internship($consumer, $company_name, $job_name, $start, $end, $mentor, $contact_num){
    $db = new DB;
    $db->connect();
    $db->query("SELECT student_id as sid FROM tr_student WHERE consumer='$consumer';");
    $db->next_record();
    $sid = $db->f('sid');
    $db->query("INSERT tr_internship(student_id,company_name,job_name,start,end,mentor,contact_num) "
              ."VALUES($sid, '$company_name', '$job_name', '$start', '$end', '$mentor', '$contact_num');");
}
function get_student_internships($sid){
    $db = new DB;
    $db->connect();
    $db->query("SELECT company_name,job_name,start,end,mentor,contact_num FROM tr_internship "
              ."WHERE student_id=$sid;");
    $ret = Array();
    while($db->next_record()){
      array_push($ret, Array(
        'company_name' => $db->f('company_name'),
        'job_name'  =>  $db->f('job_name'),
        'start' =>  $db->f('start'),
        'end' =>  $db->f('end'),
        'mentor'  =>  $db->f('mentor'),
        'contact_num' =>  $db->f('contact_num'),
      ));
    }
    return $ret;
}
?>
