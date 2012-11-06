<?php
include('base.php');

if($user_type!=2){
  header('HTTP/1.1 403');
  return false;
}

//判断当前的请求是否为修改请求.
if($job_id = $_GET['job_id']){
  //修改
  $job = get_job($job_id);
  $smarty->assign('update', true);
  $smarty->assign('job', $job);
}else{
  $jobs = get_jobs_from_company_by_consumer($consumer);
  $smarty->assign('jobs', $jobs);
}

$smarty->display('manage_job.tpl');
?>
