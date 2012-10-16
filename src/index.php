<?php
require('../libs/smarty.php');
require('./utils/helper.php');
require('./utils/company.php');

//检查登陆状态
$consumer = $_COOKIE["consumer"];
if(!$consumer){
    header('Location:login.php');
}

$smarty = new MySmarty;
/*
if($smarty->is_cached('index.tpl')){
    $smarty->display('index.tpl');
    die;
}
*/

$user_type = get_user_type($consumer);
$navs = Array();
if($user_type == 0){
    //给出属于学校的navs
    $navs = Array(
        Array("url"=>"update_info.php", "meta"=>"修改单位信息"),
        Array("url"=>"update_pass.php", "meta"=>"修改登陆密码"),
        Array("url"=>"show_company.php", "meta"=>"查看全部公司"),
        Array("url"=>"show_job.php", "meta"=>"查看所有工作"),
        Array("url"=>"show_record.php", "meta"=>"查看实习记录"),
        Array("url"=>"new_company.php", "meta"=>"新建公司账号"),
        Array("url"=>"new_student.php", "meta"=>"新建学生账号"),
        Array("url"=>"new_school.php", "meta"=>"新建学校账号"),
    );
}elseif($user_type == 1){
    //给出属于学生的navs
    $navs = Array(
        Array("url"=>"update_info.php", "meta"=>"修改个人信息"),
        Array("url"=>"update_pass.php", "meta"=>"修改登陆密码"),
        Array("url"=>"show_company.php", "meta"=>"查看全部公司"),
        Array("url"=>"show_job.php", "meta"=>"查看所有工作"),
        Array("url"=>"show_record.php", "meta"=>"查看实习记录"),
    );
}elseif($user_type == 2){
    //给出属于公司的navs
    $navs = Array(
        Array("url"=>"update_info.php", "meta"=>"修改公司信息"),
        Array("url"=>"update_pass.php", "meta"=>"修改登陆密码"),
        Array("url"=>"manage_job.php", "meta"=>"工作发布与维护"),
        Array("url"=>"audit_application.php", "meta"=>"实习申请审批"),
        Array("url"=>"show_record.php", "meta"=>"公司实习记录"),
    );
}else{
    die("\$user_type error with $user_type!");
}

//获取最新添加进来的5个公司
//TODO:以后可以改进为5个最火的公司
$companys = get_newest_company();
$jobs = get_newest_job();
$smarty->assign('user_type', $user_type);
$smarty->assign('navs', $navs);
$smarty->assign('companys', $companys);
$smarty->assign('jobs', $jobs);
$smarty->display('index.tpl');
?>
