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
  $page = $_GET['p'];
  $page = $page == NULL?1:$page;
  $total = get_jobs_count_from_company_by_consumer($consumer);
  $jobs = get_jobs_from_company_by_consumer($consumer, $page);
  $smarty->assign('page', $page);
  $smarty->assign('total', ceil($total/20));
  $smarty->assign('jobs', $jobs);
}

$company_name = get_company_name($consumer);
$smarty->assign('company_name', $company_name);
$smarty->display('manage_job.tpl');
?> 
