<?php
include('base.php');

//cid=xxx and not cid request.
if($cid = $_GET['cid']){
  $jobs = get_jobs_from_company($cid);
}else{
  $jobs = get_all_jobs();
}

$smarty->assign('jobs', $jobs);
$smarty->display('show_job.tpl');
?>
