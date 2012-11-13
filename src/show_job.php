<?php
include('base.php');

$page = $_GET['p'];
$page = $page == NULL?1:$page;

if($cid = $_GET['cid']){
  $total = get_job_count_from_company($cid);
  $jobs = get_jobs_from_company($cid, $page);
}else{
  $total = get_all_job_count();
  $jobs = get_all_jobs($page);
}

$smarty->assign('page', $page);
$smarty->assign('total', ceil($total/20));
$smarty->assign('jobs', $jobs);
$smarty->display('show_job.tpl');
?>
