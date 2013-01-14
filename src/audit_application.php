<?php
include('base.php');

//只有公司才能访问此页面 
if($user_type!=2){
  header('HTTP/1.1 403');
  return false;
}

$page = $_GET['p'];
$page = $page==NULL?1:$page;

$name = escape($_GET['name']);
$query_by = escape($_GET['query_by']);
if($name && $user_type!=1){
  $total = get_student_record_count($consumer, $name, $query_by, 0);
  $records = get_student_record($consumer, $name, $query_by, 0, $page);
}else{
  $total = get_application_count($consumer);
  $records = get_applications($consumer, $page);
}
$smarty->assign('records', $records);
$smarty->assign('page', $page);
$smarty->assign('total', ceil($total/20));
$smarty->display('audit_application.tpl');
?>
