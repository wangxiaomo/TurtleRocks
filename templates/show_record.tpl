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
      <h1>查看实习记录</h1>
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
            <td>{$record.name}</td>
            <td>{$record.company_name}</td>
            <td>{$record.job_name}</td>
            <td>{$record.request_date}</td>
            {if $record.status == 0}
              <td>审核中.</td>
              <td>请耐心等待回复.</td>
            {else}
              <td>已通过审核</td>
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
            <td>{$record.company_name}</td>
            <td>{$record.job_name}</td>
            <td>{$record.request_date}</td>
            {if $record.status == 0}
              <td>审核中.</td>
              <td>请耐心等待回复.</td>
            {else}
              <td>已通过审核</td>
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
            <td>{$record.name}</td>
            <td>{$record.job_name}</td>
            <td>{$record.request_date}</td>
            {if $record.status == 0}
              <td>审核中.</td>
              <td>请耐心等待回复.</td>
            {else}
              <td>已通过审核</td>
              <td>{$record.audit_date}</td>
            {/if}
          </tr>
          {foreachelse}
            <tr><td colspan=5><div class="status">没有实习记录.同学不给力啊!!!</div></td></tr>
          {/foreach}
        {/if}
      </table>
    </div>
    <div class="clear">&nbsp;</div>
  </div>
</div>
<div class="footer">
  {include file="footer.tpl"}
</div>
</body>
</html>
