<?php
require('../libs/smarty.php');
require('./utils/helper.php');
$smarty = new MySmarty;
// 根据POST参数来判断当前操作
/*
if($smarty->is_cached('login.tpl')){
    $smarty->clear_cache('login.tpl');
}
*/

if($_POST["consumer"]){
    //登陆
    $consumer = trim($_POST['consumer']);
    $password = trim($_POST['password']);
    $user_type = check_login($consumer, $password);
    if($user_type!=-1){
        setcookie('consumer', $consumer);
        setcookie('token', md5($password));
        header('Location: index.php');
    }else{
        $smarty->assign('err_msg', '账号或密码错误！');
        $smarty->display('login.tpl');
    }
}else{
    $smarty->display('login.tpl');
}
?>
