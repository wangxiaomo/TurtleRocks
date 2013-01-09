<?php
include('base.php');

$companys = get_newest_company(5);
$jobs = get_newest_job(5);
$smarty->assign('companys', $companys);
$smarty->assign('jobs', $jobs);
$smarty->display('index.tpl');
?>
