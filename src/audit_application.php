<?php
include('base.php');

//只有公司才能访问此页面 
if($user_type!=2){
  header('HTTP/1.1 403');
  return false;
}

$records = get_applications($consumer);
$smarty->display('audit_application.tpl');
?>
