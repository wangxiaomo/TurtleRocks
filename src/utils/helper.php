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
        $sql = "SELECT department_name, department_context, department_type FROM tr_school WHERE consumer='" . $consumer . "';";
        $db->query($sql);
        $db->next_record();
        return Array(
          'department_name' =>  $db->f('department_name'),
          'department_context' => $db->f('department_context'),
          'department_type' =>  $db->f('department_type'),
        );
    }elseif($user_type == 1){
        $sql = "SELECT student_id, name, gender, pic_path, id_num, grade, major, birth_date, marriage, political_status,"
             . "domicile_place, current_place, mailing_address, mailing_code, email_address, contact_num, extra "
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
          'birth_date'    =>  $db->f('birth_date'),
          'marriage'      =>  $db->f('marriage'),
          'political_status'=>  $db->f('political_status'),
          'domicile_place'  =>  $db->f('domicile_place'),
          'current_place'   =>  $db->f('current_place'),
          'mailing_address' =>  $db->f('mailing_address'),
          'mailing_code'    =>  $db->f('mailing_code'),
          'email_address'   =>  $db->f('email_address'),
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

function get_consumer_records($consumer, $user_type, $page=1, $limit=20){
    $start = ($page-1)*$limit;
    //首先要根据 user_type 来判断权限.
    if($user_type == 0){
      //当前查看者为学校.有权看所有学生的实习记录
      $sql = "SELECT tr_record.student_id,name,company_name,job_name,request_date,audit_date,status FROM tr_record,tr_student,tr_company,tr_job "
           . "WHERE tr_student.student_id=tr_record.student_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id "
           . "ORDER BY record_id DESC LIMIT $start, $limit;";
    }elseif($user_type == 1){
      //当前查看者为学生.有权查看自己的实习记录
      $sql = "SELECT tr_record.student_id,name,company_name,job_name,request_date,audit_date,status FROM tr_record,tr_student,tr_company,tr_job "
           . "WHERE tr_student.student_id=tr_record.student_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id "
           . "AND tr_student.consumer='$consumer' ORDER BY record_id DESC LIMIT $start,$limit;";
    }else{
      //当前查看者为公司.有权查看申请本公司的实习记录
      $sql = "SELECT tr_record.student_id,name,company_name,job_name,request_date,audit_date,status FROM tr_record,tr_student,tr_company,tr_job "
           . "WHERE tr_student.student_id=tr_record.student_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id "
           . "AND tr_company.consumer='$consumer' ORDER BY record_id DESC LIMIT $start,$limit;";
    }
    $db = new DB;
    $db->connect();
    $db->query($sql);
    $ret = Array();
    while($db->next_record()){
      array_push($ret, Array(
        'student_id' => $db->f('student_id'),
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
function get_consumer_record_count($consumer, $user_type){
    //首先要根据 user_type 来判断权限.
    if($user_type == 0){
      //当前查看者为学校.有权看所有学生的实习记录
      $sql = "SELECT count(*) as c FROM tr_record,tr_student,tr_company,tr_job "
           . "WHERE tr_student.student_id=tr_record.student_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id;";
    }elseif($user_type == 1){
      //当前查看者为学生.有权查看自己的实习记录
      $sql = "SELECT count(*) as c FROM tr_record,tr_student,tr_company,tr_job "
           . "WHERE tr_student.student_id=tr_record.student_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id "
           . "AND tr_student.consumer='$consumer';";
    }else{
      //当前查看者为公司.有权查看申请本公司的实习记录
      $sql = "SELECT count(*) as c FROM tr_record,tr_student,tr_company,tr_job "
           . "WHERE tr_student.student_id=tr_record.student_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id "
           . "AND tr_company.consumer='$consumer';";
    }
    $db = new DB;
    $db->connect();
    $db->query($sql);
    $db->next_record();
    return $db->f('c');
}
function get_student_record_count($consumer, $name, $query_by, $status=-1){
    $user_type = get_user_type($consumer);
    if($user_type == 0){
      $sql = "SELECT count(*) as c FROM tr_record,tr_student,tr_company,tr_job "
           . "WHERE tr_student.student_id=tr_record.student_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id ";
      if($query_by == 'name'){
          $sql = $sql . "AND name like '%$name%' ";
      }else{
          $sql = $sql . "AND major like '%$name%' ";
      }
      if($status!=-1){
        $sql = $sql . "AND status=$status ";
      }
    }elseif($user_type == 2){
      $sql = "SELECT count(*) as c FROM tr_record,tr_student,tr_company,tr_job "
           . "WHERE tr_student.student_id=tr_record.student_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id "
           . "AND tr_company.consumer='$consumer' ";
      if($query_by == 'name'){
          $sql = $sql . "AND name like '%$name%' ";
      }else{
          $sql = $sql . "AND major like '%$name%' ";
      }
      if($status!=-1){
        $sql = $sql . "AND status=$status ";
      }
    }
    $db = new DB;
    $db->connect();
    $db->query($sql);
    $db->next_record();
    return $db->f('c');
}
function get_student_record($consumer, $name, $query_by, $status=-1, $page=1, $limit=20){
    $start = ($page-1)*$limit;
    $user_type = get_user_type($consumer);
    if($user_type == 0){
      $sql = "SELECT tr_record.student_id,name,company_name,job_name,request_date,audit_date,status FROM tr_record,tr_student,tr_company,tr_job "
           . "WHERE tr_student.student_id=tr_record.student_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id ";
      if($query_by == 'name'){
          $sql = $sql . "AND name like '%$name%' ";
      }else{
          $sql = $sql . "AND major like '%$name%' ";
      }
      if($status!=-1){
        $sql = $sql . "AND status=$status ";
      }
      $sql = $sql . "ORDER BY record_id DESC LIMIT $start, $limit;";
    }elseif($user_type == 2){
      $sql = "SELECT tr_record.student_id,name,company_name,job_name,request_date,audit_date,status FROM tr_record,tr_student,tr_company,tr_job "
           . "WHERE tr_student.student_id=tr_record.student_id AND tr_job.job_id=tr_record.job_id AND tr_job.company_id=tr_company.company_id "
           . "AND tr_company.consumer='$consumer' ";
      if($query_by == 'name'){
          $sql = $sql . "AND name like '%$name%' ";
      }else{
          $sql = $sql . "AND major like '%$name%' ";
      }
      if($status!=-1){
        $sql = $sql . "AND status=$status ";
      }
      $sql = $sql . " ORDER BY record_id DESC LIMIT $start,$limit;";
    }
    $db = new DB;
    $db->connect();
    $db->query($sql);
    $ret = Array();
    while($db->next_record()){
      array_push($ret, Array(
        'student_id' => $db->f('student_id'),
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
function get_consumer_internship_count($consumer, $user_type){
    if($user_type == 0){
      $sql = "SELECT COUNT(*) as c " 
           . "FROM tr_internship, tr_student WHERE tr_internship.student_id=tr_student.student_id;";
    }elseif($user_type == 1){
      $sql = "SELECT COUNT(*) as c "
           . "FROM tr_internship, tr_student WHERE tr_internship.student_id=tr_student.student_id "
           . "AND consumer='$consumer';";
    }
    $db = new DB;
    $db->connect();
    $db->query($sql);
    return $db->f('c');
}
function get_consumer_internships($consumer, $user_type, $page=1, $limit=20){
    $start = ($page-1)*$limit;
    if($user_type == 0){
      $sql = "SELECT tr_student.student_id,tr_student.name,company_name,job_name,start,end,mentor,tr_internship.contact_num "
           . "FROM tr_internship, tr_student WHERE tr_internship.student_id=tr_student.student_id "
           . "ORDER BY id DESC LIMIT $start,$limit;";
    }elseif($user_type == 1){
        $sql = "SELECT tr_student.student_id,tr_student.name,company_name,job_name,start,end,mentor,tr_internship.contact_num "
            . "FROM tr_internship, tr_student WHERE tr_internship.student_id=tr_student.student_id "
            . "AND consumer='$consumer' ORDER BY id DESC LIMIT $start,$limit;";
    }
    $db = new DB;
    $db->connect();
    $db->query($sql);
    $ret = Array();
    while($db->next_record()){
      array_push($ret, Array(
        'student_id'  =>  $db->f('student_id'),
        'name'  =>  $db->f('name'),
        'company_name'  =>  $db->f('company_name'),
        'job_name'  =>  $db->f('job_name'),
        'start'  =>  $db->f('start'),
        'end'  =>  $db->f('end'),
        'mentor'  =>  $db->f('mentor'),
        'contact_num'  =>  $db->f('contact_num'),
      ));
    }
    return $ret;
}
function get_student_internship_count($consumer, $name, $query_by){
    $sql = "SELECT COUNT(*) as c "
         . "FROM tr_internship, tr_student WHERE tr_internship.student_id=tr_student.student_id ";
    if($query_by == 'name'){
        $sql = $sql . "AND name LIKE '%$name%' ORDER BY id DESC;";
    }else{
        $sql = $sql . "AND major LIKE '%$name%' ORDER BY id DESC;";
    }
    $db = new DB;
    $db->connect();
    $db->query($sql);
    return $db->f('c');
}
function get_student_internships($consumer, $name, $query_by, $page=1, $limit=20){
    $start = ($page-1)*$limit;
    $sql = "SELECT tr_student.student_id,tr_student.name,company_name,job_name,start,end,mentor,tr_internship.contact_num "
         . "FROM tr_internship, tr_student WHERE tr_internship.student_id=tr_student.student_id ";
    if($query_by == 'name'){
        $sql = $sql . "AND name LIKE '%$name%' ORDER BY id DESC LIMIT $start,$limit;";
    }else{
        $sql = $sql . "AND major LIKE '%$name%' ORDER BY id DESC LIMIT $start,$limit;";
    }
    $db = new DB;
    $db->connect();
    $db->query($sql);
    $ret = Array();
    while($db->next_record()){
      array_push($ret, Array(
        'student_id'  =>  $db->f('student_id'),
        'name'  =>  $db->f('name'),
        'company_name'  =>  $db->f('company_name'),
        'job_name'  =>  $db->f('job_name'),
        'start'  =>  $db->f('start'),
        'end'  =>  $db->f('end'),
        'mentor'  =>  $db->f('mentor'),
        'contact_num'  =>  $db->f('contact_num'),
      ));
    }
    return $ret;
}
function is_active($consumer){
    $db = new DB;
    $db->connect();
    $user_type = get_user_type($consumer);
    if($user_type == 1){
        $sql = "SELECT name as name FROM tr_login, tr_student WHERE tr_login.consumer=tr_student.consumer "
             . "AND tr_login.consumer='$consumer';";
        $db->query($sql);
        $db->next_record();
        return $db->f('name')?true:false;
    }else{
        $sql = "SELECT company_name, meta_info FROM tr_login, tr_company WHERE tr_login.consumer=tr_company.consumer "       
             . "AND tr_login.consumer='$consumer';";
        $db->query($sql);
        $db->next_record();
        if($db->f('company_name') && $db->f('meta_info')){
            return true;
        }else{
            return false;
        }
    }
}
?>
