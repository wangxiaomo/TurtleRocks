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
      {if not $update}
        <h1>工作发布与维护</h1>
        <table class="table table-bordered table-hover table-condensed">
          <thead>
            <td>公司名称</td>
            <td>职位名称</td>
            <td>职位信息</td>
            <td>操作</td>
          </thead>
          {foreach from=$jobs item=job}
          <tr>
            <td class="company_name">{$job.company_name}</td>
            <td>{$job.job_name}</td>
            <td>{$job.job_meta|truncate:30}</td>
            <td><a href="manage_job.php?job_id={$job.job_id}">修改</a>&nbsp;&nbsp;<a href="#">删除</a></td>
          </tr>
          {foreachelse}
            <tr>没有发布任何工作.不给力啊公司!!!</tr>
          {/foreach}
        </table>
        <div style="margin-left: 420px;"><button id="new_job">发布新职位</button></div>
      {else}
        <h1>修改工作</h1>
        <table>
          <tr><td class="m">公司名称:</td><td>{$job.company_name}</td></tr>
          <tr><td class="m">职位名称:</td><td><input type="text" id="job_name" name="job_name" value="{$job.name}" /></td></tr>
          <tr><td class="m">职位信息:</td><td><textarea id="job_meta" name="job_meta">{$job.job_meta}</textarea></td></tr>
          <tr><td>&nbsp;</td><td><button id="submit" class="btn btn-primary">提交</button><button id="reset" class="btn">重置</button></td></tr>
        </table>
      {/if}
    </div>
    <div class="clear">&nbsp;</div>
  </div>
</div>
<div class="footer">
  {include file="footer.tpl"}
</div>
{if not $update}
  {literal}
  <script>
$(function(){
  $('#new_job').on('click', function(e){
    e.preventDefault();
    var template = _.template($('#new-job-item').html());
    var company_name = $('.company_name').text();
    $('.main').append(template({company_name:company_name}));
  });
  $(document).on('click', '#add', function(e){
    e.preventDefault();
    //TODO: ajax add the new job
  });
  $(document).on('click', '#reset', function(e){
    e.preventDefault();
    $('input#job_name').attr('value', '');
    $('input#job_meta').attr('vaalue', '');
  });
});
  </script>
  <script type="text/template" id="new-job-item">
<div>
  <table>
    <tr><td class="m">公司名称:</td><td><%= company_name %></td></tr>
    <tr><td class="m">职位名称:</td><td><input type="text" id="job_name" name="job_name"/></td></tr>
    <tr><td class="m">职位信息:</td><td><textarea id="job_meta" name="job_meta"></textarea></td></tr>
    <tr><td>&nbsp;</td><td><button id="add" class="btn btn-primary">添加</button><button id="reset" class="btn">重置</button></td></tr>
  </table>
</div>
  </script>
  {/literal}
{else}
  {literal}
  <script>
$(function(){
  //修改工作
});
  </script>
  {/literal}
{/if}
</body>
</html>
