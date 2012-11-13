<?php
include('base.php');

$page = $_GET['p'];
$page = $page == NULL?1:$page;

$total = get_company_count();
$companies = get_companies($page);
$smarty->assign('page', $page);
$smarty->assign('total', ceil($total/20));
$smarty->assign('companies', $companies);
$smarty->display('show_company.tpl');
?>
