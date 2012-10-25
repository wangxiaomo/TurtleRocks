<?php
include('base.php');

if($_POST){
    //处理 POST 请求
    //根据不同的身份处理不同的请求
    if($user_type == 0){
        $department_name = escape($_POST['department_name']);
        update_school_info($consumer, $department_name);
    }elseif($user_type == 1){
        //修改学生信息
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
