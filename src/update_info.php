<?php
include('base.php');

if($_POST){
    //处理 POST 请求
    //根据不同的身份处理不同的请求
    if($user_type == 0){
        $department_name = escape($_POST['department_name']);
        update_school_info($consumer, $department_name);
    }elseif($user_type == 1){
        $name = escape($_POST['name']);
        $gender = escape($_POST['gender']);
        $id_num = escape($_POST['id_num']);
        $grade = escape($_POST['grade']);
        $major = escape($_POST['major']);
        $birth_date = escape($_POST['birth_date']);
        $marriage = escape($_POST['marriage']);
        $political_status = escape($_POST['political_status']);
        $domicile_place = escape($_POST['domicile_place']);
        $current_place = escape($_POST['current_place']);
        $mailing_address = escape($_POST['mailing_address']);
        $mailing_code = escape($_POST['mailing_code']);
        $email_address = escape($_POST['email_address']);
        $contact_num = escape($_POST['contact_num']);
        $extra = escape($_POST['extra']);
        update_student_info($consumer, $name, $gender, $id_num, $grade, $major,
              $birth_date, $marriage, $political_status, $domicile_place, $current_place,
              $mailing_address, $mailing_code, $email_address, $contact_num, $extra);
    }else{
        $company_name = escape($_POST['company_name']);
        $meta_info = escape($_POST['meta_info']);
        update_company_info($consumer, $company_name, $meta_info);
    }
    $smarty->assign('status', "修改成功!");
}

$account = get_account_info($user_type, $consumer);
$smarty->assign('account', $account);
$smarty->display('update_info.tpl');
?>
