<?php
include('base.php');

//只有公司才能访问此页面 
if($user_type!=2){
  header('HTTP/1.1 403');
  return false;
}

$page = $_GET['p'];
$page = $page==NULL?1:$page;

$total = get_application_count($consumer);
$records = get_applications($consumer, $page);
$smarty->assign('records', $records);
$smarty->assign('page', $page);
$smarty->assign('total', ceil($total/20));
$smarty->display('audit_application.tpl');
?>
