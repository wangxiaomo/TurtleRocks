<?php
include('base.php');
$companies = get_newest_company();
$smarty->assign('companies', $companies);
$smarty->display('show_company.tpl');
?>
