{config_load file="main.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
{include file="header.tpl"}
<link rel="stylesheet" href="{#STATIC_DIR#}/images/BrightSide.css" type="text/css" />
<link href="{#STATIC_DIR#}/less/main.less" rel="stylesheet/less" type="text/css">
<link href="{#STATIC_DIR#}/less/test.less" rel="stylesheet/less" type="text/css">
<script type="text/javascript" src="{#STATIC_DIR#}/js/libs/less.min.js"></script>
</style>
</head>
<body>
<div id="wrap">
  {include file="top_nav.tpl"}
  <div id="content-wrap" style="background-color:white;">
    {include file="sidebar.tpl"}
    <div id="main"> 
      <h1>修改登录密码</h1>
      {if $status}
        <div class="status">{$status}</div>
      {/if}
      <div class="op" style="margin-left:20px;">
        <form method="POST" action="">
          <table>
            <tr><td class="m">账号:</td><td class="left"><input type="text" id="consumer" name="consumer" value="{$smarty.cookies.consumer|escape}" readonly="readonly" /></td></tr>
            <tr><td class="m">原始密码:</td><td class="left"><input type="password" id="origin_pass" name="origin_pass" /></td></tr>
            <tr><td class="m">新密码:</td><td class="left"><input type="password" id="new_pass" name="new_pass" /></td></tr>
            <tr><td class="m">确认密码:</td><td class="left"><input type="password" id="re_new_pass" name="re_new_pass" /></td></tr>
            <tr><td>&nbsp;</td><td><div class="btn-group"><button class="submit btn btn-primary">提交</button><button class="reset btn">重置</button></div></td></tr>
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
{literal}
<script>
$(function(){
  function check_new_pass(){
    return $('#new_pass').attr('value') == $('#re_new_pass').attr('value');
  }
  function reset(){
    $('input:password').attr('value', '');
  }
  $('button.submit').on('click', function(){
    if(check_new_pass()){
      $('form[class!=searchform]').submit();
    }else{
      alert("两次输入的密码不一致.请重新输入!!!");
      reset();
    }
    return false;
  });
  $('button.reset').on('click', reset);
});
</script>
{/literal}
</body>
</html>
