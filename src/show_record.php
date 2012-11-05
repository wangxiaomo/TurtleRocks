<?php
include('base.php');

//交给 Helper 来进行权限判断
$records = get_consumer_records($consumer, $user_type);
$smarty->assign('records', $records);
$smarty->display('show_record.tpl');
?>
