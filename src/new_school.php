<?php
include('base.php');

if($user_type!=0){
  header('HTTP/1.1 403');
  return false;
}

if($_POST){
    $department_name = escape($_POST['department_name']);
    $consumer = escape($_POST['login_name']);
    $password = escape($_POST['login_pass']);
    $error = add_new_department($department_name, $consumer, $password);
    $smarty->assign('error', $error);
}
$smarty->display('new_school.tpl');
?>
