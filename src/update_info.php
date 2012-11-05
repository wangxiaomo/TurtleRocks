<?php
include('base.php');

if($_POST){
    //处理 POST 请求
    //根据不同的身份处理不同的请求
    if($user_type == 0){
        $department_name = escape($_POST['department_name']);
        update_school_info($consumer, $department_name);
    }elseif($user_type == 1){
        //todo: 上传头像
        $name = escape($_POST['name']);
        $gender = escape($_POST['gender']);
        $id_num = escape($_POST['id_num']);
        $grade = escape($_POST['grade']);
        $major = escape($_POST['major']);
        $contact_num = escape($_POST['contact_num']);
        $extra = escape($_POST['extra']);
        update_student_info($consumer, $name, $gender, $id_num, $grade, $major,
              $contact_num, $extra);
    }else{
        $company_name = escape($_POST['company_name']);
        $meta_info = escape($_POST['meta_info']);
    update_company_info($consumer, $company_name, $meta_info);
    }
}

$account = get_account_info($user_type, $consumer);
$smarty->assign('account', $account);
$smarty->display('update_info.tpl');
?>
