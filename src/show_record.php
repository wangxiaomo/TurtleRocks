<?php
include('base.php');

$page = $_GET['p'];
$page = $page==NULL?1:$page;

$name = escape($_GET['name']);
$query_by = escape($_GET['query_by']);
if($name && $user_type!=1){
  $total = get_student_record_count($consumer, $name, $query_by);
  $records = get_student_record($consumer, $name, $query_by, -1, $page);
}else{
  $total = get_consumer_record_count($consumer, $user_type);
  $records = get_consumer_records($consumer, $user_type, $page);
}
$smarty->assign('page', $page);
$smarty->assign('total', ceil($total/20));
$smarty->assign('records', $records);
$smarty->display('show_record.tpl');
?>
