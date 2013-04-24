{config_load file="main.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
{include file="header.tpl"}
<link rel="stylesheet" href="{#STATIC_DIR#}/images/BrightSide.css" type="text/css" />
<link href="{#STATIC_DIR#}/less/main.less" rel="stylesheet/less" type="text/css">
<link href="{#STATIC_DIR#}/less/test.less" rel="stylesheet/less" type="text/css">
<script type="text/javascript" src="{#STATIC_DIR#}/js/libs/less.min.js"></script>
<script src="{#STATIC_DIR#}/js/paginator.js"></script>
</head>
<body>
<input type="hidden" id="page" value="{$page}" />
<input type="hidden" id="total" value="{$total}" />
<div id="wrap">
  {include file="top_nav.tpl"}
  <div id="content-wrap" style="background-color:white;">
    {include file="sidebar.tpl"}
    <div id="main"> 
      <h1>查看实习申请状况</h1>
      {if $user_type != 1}
        <div class="search_student">
          <p><select id="query_by" name="query_by" style="width:110px;"><option value="name">按姓名查找</option><option value="major">按专业查找</option></select><input type="text" id="search_name" name="search_name" placeholder="输入要查找的信息" /><button class="btn btn-search">查找</button></p>
        </div>
      {/if}
      <table class="table table-bordered table-hover table-condensed">
        {if $user_type==0}
          <thead>
            <td>学生姓名</td>
            <td>公司名称</td>
            <td>职位名称</td>
            <td>申请时间</td>
            <td>状态</td>
            <td>审批时间</td>
          </thead>
          {foreach from=$records item=record}
          <tr>
            <td><a href="show_info.php?sid={$record.student_id}" target="_blank">{$record.name|escape}</a></td>
            <td>{$record.company_name|escape}</td>
            <td>{$record.job_name|escape}</td>
            <td>{$record.request_date}</td>
            {if $record.status == 0}
              <td>审核中.</td>
              <td>请耐心等待回复.</td>
            {elseif $record.status == 1}
              <td>已通过审核</td>
              <td>{$record.audit_date}</td>
            {else}
              <td>审核被拒绝</td>
              <td>{$record.audit_date}</td>
            {/if}
          </tr>
          {foreachelse}
            <tr><td colspan=6><div class="status">没有实习记录.同学不给力啊!!!</div></td></tr>
          {/foreach}
        {elseif $user_type==1}
          <thead>
            <td>公司名称</td>
            <td>职位名称</td>
            <td>申请时间</td>
            <td>状态</td>
            <td>审批时间</td>
          </thead>
          {foreach from=$records item=record}
          <tr>
            <td>{$record.company_name|escape}</td>
            <td>{$record.job_name|escape}</td>
            <td>{$record.request_date}</td>
            {if $record.status == 0}
              <td>审核中.</td>
              <td>请耐心等待回复.</td>
            {elseif $record.status == 1}
              <td>已通过审核</td>
              <td>{$record.audit_date}</td>
            {else}
              <td>审核被拒绝</td>
              <td>{$record.audit_date}</td>
            {/if}
          </tr>
          {foreachelse}
            <tr><td colspan=5><div class="status">没有实习记录.同学不给力啊!!!</div></td></tr>
          {/foreach}
        {else}
          <thead>
            <td>学生姓名</td>
            <td>职位名称</td>
            <td>申请时间</td>
            <td>状态</td>
            <td>审批时间</td>
          </thead>
          {foreach from=$records item=record}
          <tr>
            <td><a href="show_info.php?sid={$record.student_id}" target="_blank">{$record.name|escape}</a></td>
            <td>{$record.job_name|escape}</td>
            <td>{$record.request_date}</td>
            {if $record.status == 0}
              <td>审核中.</td>
              <td>请耐心等待回复.</td>
            {elseif $record.status == 1}
              <td>已通过审核</td>
              <td>{$record.audit_date}</td>
            {else}
              <td>审核被拒绝</td>
              <td>{$record.audit_date}</td>
            {/if}
          </tr>
          {foreachelse}
            <tr><td colspan=5><div class="status">没有实习记录.公司不给力啊!!!</div></td></tr>
          {/foreach}
        {/if}
      </table>
      <div class="tooltips">
        <p><span class="label label-important">重要</span>审核通过后请主动联系公司负责人.</p>
      </div>
      <div class="paginator"></div>
    </div>
    <div class="clear">&nbsp;</div>
  </div>
</div>
<div class="footer">
  {include file="footer.tpl"}
</div>
</body>
{literal}
<script>
$(function(){
  $('.paginator').html(
    paginator({
      current: $('#page').attr('value'),
      total: $('#total').attr('value'),
    })
  );
  /* paginator */
  $(document).on('click', '.prev a', function(e){
    e.preventDefault();
    var page = parseInt($('#page').attr('value'))-1;
    if(window.location.search){
      window.location = window.location.search + '&p=' + page;
    }else{
      window.location = '?p='+page;
    }
  });
  $(document).on('click', '.next a', function(e){
    e.preventDefault();
    var page = parseInt($('#page').attr('value'))+1;
    if(window.location.search){
      window.location = window.location.search + '&p=' + page;
    }else{
      window.location = '?p='+page;
    }
  });
  $(document).on('click', '.paginator a', function(e){
    e.preventDefault();
    if($(this).parent().hasClass('prev') || $(this).parent().hasClass('next')){
      return false;
    }
    var page = parseInt($(this).text());
    if(window.location.search){
      window.location = window.location.search + '&p=' + page;
    }else{
      window.location = '?p='+page;
    }
  });
  /* end paginator */
  $('button.btn-search').click(function(e){
    e.preventDefault();
    window.location = '?name='+$('.search_student').find('input').attr('value').trim()+'&query_by='+$('#query_by').attr('value').trim();
    return false;
  });
  $('.search_student').find('input').on('keydown', function(e){
    if(e.keyCode == 13){
      e.preventDefault();
      $('button.btn-search').click();
    }
  });
});
</script>
{/literal}
</html>
