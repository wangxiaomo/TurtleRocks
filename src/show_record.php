<?php
include('base.php');

//交给 Helper 来进行权限判断
$page = $_GET['p'];
$page = $page==NULL?1:$page;

$total = get_consumer_record_count($consumer, $user_type);
$records = get_consumer_records($consumer, $user_type, $page);
$smarty->assign('page', $page);
$smarty->assign('total', ceil($total/20));
$smarty->assign('records', $records);
$smarty->display('show_record.tpl');
?>
