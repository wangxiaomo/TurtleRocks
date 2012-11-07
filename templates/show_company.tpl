{config_load file="main.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
{include file="header.tpl"}
<link rel="stylesheet" href="{#STATIC_DIR#}/images/BrightSide.css" type="text/css" />
<link href="{#STATIC_DIR#}/less/main.less" rel="stylesheet/less" type="text/css">
<script type="text/javascript" src="{#STATIC_DIR#}/js/libs/less.min.js"></script>
</head>
<body>
<div id="wrap">
  {include file="top_nav.tpl"}
  <div id="content-wrap" style="background-color:white;">
    {include file="sidebar.tpl"}
    <div id="main"> 
      <h1>查看全部公司</h1>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>公司名称</td>
          <td>公司信息</td>
          <td>操作</td>
        </thead>
        {foreach from=$companies item=company}
        <tr>
          <td>{$company.company_name}</td>
          <td>{$company.meta_info|truncate:20}</td>
          <td><a href="show_job.php?cid={$company.company_id}">查看该公司提供的职位</a></td>
        </tr>
        <tr class="meta_info">
          <td colspan=3><pre>{$company.meta_info}</pre></td>
        </tr>
        {foreachelse}
          <tr><td colspan=3><div class="status">没有招聘公司. 不给力啊.老师!!!</div></td></tr>
        {/foreach}
      </table>
      <div class="tooltips">
        <p><span class="label label-success">提示</span>点击该行可查看具体信息!</p>
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
  $('tr[class!=meta_info]').on('click', function(e){
    if(e.target.localName != 'a'){
      $(this).next().toggle(500);
    }
  });
});
</script>
{/literal}
</body>
</html>
