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

function update_consumer_pass($consumer, $password){
    $db = new DB;
    $db->connect();
    $db->query("update tr_login set password='" . md5($password) . "' where consumer='$consumer';");
    return true;
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
        );
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

function get_consumer_records($consumer, $user_type, $limit=20){
  //首先要根据 user_type 来判断权限.
  if($user_type == 0){
    //当前查看者为学校.有权看所有学生的实习记录
    $sql = "SELECT name,company_name,job_name,request_date,audit_date,status FROM tr_record,tr_student,tr_company,tr_job "
         . "WHERE tr_student.student_id=tr_record.record_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id "
         . "ORDER BY record_id DESC LIMIT $limit;";
  }elseif($user_type == 1){
    //当前查看者为学生.有权查看自己的实习记录
    $sql = "SELECT name,company_name,job_name,request_date,audit_date,status FROM tr_record,tr_student,tr_company,tr_job "
         . "WHERE tr_student.student_id=tr_record.record_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id "
         . "AND tr_student.consumer='$consumer' ORDER BY record_id DESC LIMIT $limit;";
  }else{
    //当前查看者为公司.有权查看申请本公司的实习记录
    $sql = "SELECT name,company_name,job_name,request_date,audit_date,status FROM tr_record,tr_student,tr_company,tr_job "
         . "WHERE tr_student.student_id=tr_record.record_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id "
         . "AND tr_company.consumer='$consumer' ORDER BY record_id DESC LIMIT $limit;";
  }
  $db = new DB;
  $db->connect();
  $db->query($sql);
  $ret = Array();
  while($db->next_record()){
    array_push($ret, Array(
      'name'  =>  $db->f('name'),
      'company_name'  =>  $db->f('company_name'),
      'job_name'  =>  $db->f('job_name'),
      'request_date'  =>  $db->f('request_date'),
      'audit_date'  =>  $db->f('audit_date'),
      'status'  =>  $db->f('status'),
    ));
  }
  return $ret;
}
?>
