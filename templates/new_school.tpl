{config_load file="main.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
{include file="header.tpl"}
<link rel="stylesheet" href="{#STATIC_DIR#}/images/BrightSide.css" type="text/css" />
<link href="{#STATIC_DIR#}/less/main.less" rel="stylesheet/less" type="text/css">
<link href="{#STATIC_DIR#}/less/test.less" rel="stylesheet/less" type="text/css">
<script type="text/javascript" src="{#STATIC_DIR#}/js/libs/less.min.js"></script>
</head>
<body>
<div id="wrap">
  {include file="top_nav.tpl"}
  <div id="content-wrap" style="background-color:white;">
    {include file="sidebar.tpl"}
    <div id="main"> 
      <h1>新增学校帐号</h1>
	  <div>
		{if $error}
      <div class="status">{$error}</div>
    {/if}
    <form method="POST">
      <table>
        <tr><td class="m">部门名称:</td><td><input type="text" id="department_name" name="department_name"/></td></tr>
        <tr><td class="m">登录账号:</td><td><input type="text" id="login_name" name="login_name"/></td></tr>
        <tr><td class="m">登录密码:</td><td><input type="password" id="login_pass" name="login_pass"/></td></tr>
        <tr><td class="m">确认密码:</td><td><input type="password" id="re_login_pass" name="re_login_pass"/></td></tr>
        <tr><td>&nbsp;</td><td><button id="submit" class="btn btn-primary">提交</button><button id="reset" class="btn">重置</button></td></tr>
      </table>
    </form>
	  </div>
    </div>
    <div class="clear">&nbsp;</div>
  </div>
</div>
<div class="footer">
  {include file="footer.tpl"}
</div>
</body>
</html>
