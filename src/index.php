<?php
include('base.php');
//获取最新添加进来的5个公司
//TODO:以后可以改进为5个最火的公司
$companys = get_newest_company();
$jobs = get_newest_job();
$smarty->assign('companys', $companys);
$smarty->assign('jobs', $jobs);
$smarty->display('index.tpl');
?>
