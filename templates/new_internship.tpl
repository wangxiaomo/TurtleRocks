{config_load file="main.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
{include file="header.tpl"}
<link rel="stylesheet" href="{#STATIC_DIR#}/images/BrightSide.css" type="text/css" />
<link href="{#STATIC_DIR#}/less/main.less" rel="stylesheet/less" type="text/css">
<link href="{#STATIC_DIR#}/less/test.less" rel="stylesheet/less" type="text/css">
<link href="{#STATIC_DIR#}/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{#STATIC_DIR#}/js/libs/less.min.js"></script>
</head>
<body>
<div id="wrap">
  {include file="top_nav.tpl"}
  <div id="content-wrap" style="background-color:white;">
    {include file="sidebar.tpl"}
    <div id="main"> 
      <h1>添加学生实习记录</h1>
	  <div>
		{if $error}
      <div class="status">{$error}</div>
    {/if}
    <form method="POST">
      <table>
        <tr><td class="m">公司名称:</td><td><input type="text" id="company_name" name="company_name"/></td></tr>
        <tr><td class="m">职位名称:</td><td><input type="text" id="job_name" name="job_name"/></td></tr>
        <tr><td class="m">开始时间:</td><td><input type="text" id="start" name="start"/></td></tr>
        <tr><td class="m">结束时间:</td><td><input type="text" id="end" name="end"/></td></tr>
        <tr><td class="m">证明人:</td><td><input type="text" id="mentor" name="mentor"/></td></tr>
        <tr><td class="m">证明人联系方式:</td><td><input type="text" id="contact_num" name="contact_num"/></td></tr>
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
<script src="{#STATIC_DIR#}/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="{#STATIC_DIR#}/js/libs/ui/minified/i18n/jquery.ui.datepicker-zh-CN.min.js"></script>
{literal}
<script>
$(function(){
  $.datepicker.setDefaults($.datepicker.regional["zh-CN"]);
  var config = {numberOfMonths:2};
  $('#start').datepicker(config);
  $('#end').datepicker(config);

  $('form[class!=search_query]').submit(function(){
    if($('#main').find('input').filter('[value=""]').length){
      alert("请确保所有项都已填写!");
      return false;
    }
    if($('#start').attr('value')>=$('#end').attr('value')){
      alert("请确保结束时间大于开始时间!");
      return false;
    }
    return true;
  });
});
</script>
{/literal}
</body>
</html>
