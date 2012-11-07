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
      <h1>当前热招公司</h1>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>公司名称</td>
          <td>公司信息</td>
          <td>操作</td>
        </thead>
      {foreach from=$companys item=company}
        <tr>
          <td class="company_name">{$company.company_name}</td>
          <td class="meta_info">{$company.meta_info|truncate:25}</td>
          <td class="op"><a href="show_job.php?id={$company.company_id}">查看</a></td>
        </tr>
        <tr class="meta_info">
          <td colspan=3><pre>{$company.meta_info}</pre></td>
        </tr>
      {foreachelse}
        <tr><td colspan=3 style="text-align:center;">没有公司数据。请联系管理员添加</td></tr>
      {/foreach}
      {if $companys}
        <tfoot>
          <td colspan=2>&nbsp;</td>
          <td class="op"><a href="show_company.php">查看全部</a></td>
        </tfoot>
      {/if}
      </table>
      <h1>当前热招工作</h1>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>公司</td>
          <td>工作</td>
          <td>操作</td>
        </thead>
      {foreach from=$jobs item=job}
        <tr>
          <td class="company_name">{$job.company_name}</td>
          <td class="job_name">{$job.job_name}</td>
          <td class="op"><a href="show_job.php">查看详情</a></td>
        </tr>
        <tr class="meta_info">
          <td colspan=3><pre>{$job.job_meta}</pre></td>
        </tr>
      {foreachelse}
        <tr><td colspan=3 style="text-align: center">没有公司数据。请联系管理员添加</td></tr>
      {/foreach}
      {if $jobs}
        <tfoot>
          <td colspan=2>&nbsp;</td>
          <td class="op"><a href="show_company.php">查看全部</a></td>
        </tfoot>
      {/if}
      </table>
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
