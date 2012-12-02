<?php
include('base.php');

if($user_type!=0 && $user_type!=2){
  header('HTTP/1.1 403');
  return false;
}

$sid = $_GET["sid"];
if(!$sid){
  header('HTTP/1.1 404');
  return false;
}
$student = get_student_info($sid);
$internships = get_student_internships_by_sid($sid);
$smarty->assign('student', $student);
$smarty->assign('internships', $internships);
$smarty->display('show_info.tpl');
?>
