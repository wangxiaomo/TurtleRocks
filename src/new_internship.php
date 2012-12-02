<?php
include('base.php');

if($user_type!=1){
  header('HTTP/1.1 403');
  return false;
}

if($_POST){
    $company_name = escape($_POST['company_name']);
    $job_name = escape($_POST['job_name']);
    $start = escape($_POST['start']);
    $end = escape($_POST['end']);
    $mentor = escape($_POST['mentor']);
    $contact_num = escape($_POST['contact_num']);
    add_new_internship($consumer, $company_name, $job_name, $start, $end, $mentor, $contact_num);
    $smarty->assign('error', '添加成功!');
}
$smarty->display('new_internship.tpl');
?>
