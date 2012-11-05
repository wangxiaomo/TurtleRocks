<?php
include('base.php');

if($_POST){
  if($consumer != $_POST['consumer']){
    header('HTTP/1.0 403');
    return false;
  }
  if(check_login($consumer, $_POST['origin_pass'])==-1){
    $smarty->assign('status', '密码错误!');
  }else{
    if($_POST['new_pass'] != $_POST['re_new_pass']){
      $smarty->assign('status', '新密码不符合要求!请重新输入!');
    }else{
      $smarty->assign('status', '修改密码成功!');
      update_consumer_pass($consumer, $_POST['new_pass']);
    }
  }
}
$smarty->display('update_pass.tpl');
?>
