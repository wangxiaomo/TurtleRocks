<?php
include('base.php');

if($user_type==2){
  header("HTTP/1.1 403");
  return false;
}

//交给 Helper 来进行权限判断
$page = $_GET['p'];
$page = $page==NULL?1:$page;

$name = escape($_GET['name']);
$query_by = escape($_GET['query_by']);
if($name && $user_type!=1){
  $total = get_student_internship_count($consumer, $name, $query_by);
  $internships = get_student_internships($consumer, $name, $query_by, $page);
}else{
  $total = get_consumer_internship_count($consumer, $user_type);
  $internships = get_consumer_internships($consumer, $user_type, $page);
}
$smarty->assign('page', $page);
$smarty->assign('total', ceil($total/20));
$smarty->assign('internships', $internships);
$smarty->display('show_internship.tpl');
?>
