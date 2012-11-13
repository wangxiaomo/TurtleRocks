{config_load file="main.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
{include file="header.tpl"}
<link rel="stylesheet" href="{#STATIC_DIR#}/images/BrightSide.css" type="text/css" />
<link href="{#STATIC_DIR#}/less/main.less" rel="stylesheet/less" type="text/css">
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
      <h1>实习申请审批</h1>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>学生姓名</td>
          <td>职位名称</td>
          <td>申请时间</td>
          <td>状态</td>
          <td>操作</td>
        </thead>
        {foreach from=$records item=record}
        <tr>
          <td>{$record.name}</td>
          <td>{$record.job_name}</td>
          <td>{$record.request_date}</td>
          <td>审核中</td>
          <td><a class="op" href="j/audit_application.php?op=yes&record_id={$record.record_id}">通过</a>&nbsp;&nbsp;<a class="op" href="j/audit_application.php?op=no&record_id={$record.record_id}">拒绝</a></td>
        </tr>
        {foreachelse}
          <tr><td colspan=5><div class="status">没有申请的记录.公司不给力啊!!!</div></td></tr>
        {/foreach}
      </table>
      <div class="paginator"></div>
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
    window.location = '?p='+page;
  });
  $(document).on('click', '.next a', function(e){
    e.preventDefault();
    var page = parseInt($('#page').attr('value'))+1;
    window.location = '?p='+page;
  });
  $(document).on('click', '.paginator a', function(e){
    e.preventDefault();
    if($(this).parent().hasClass('prev') || $(this).parent().hasClass('next')){
      return false;
    }
    window.location = '?p='+parseInt($(this).text());
  });
  /* end paginator */
  $('a.op').on('click', function(e){
    e.preventDefault();
    var o = $(this);
    $.post($(o).attr('href'), function(d){
      if(d.r == 0){
        alert("操作失败.请重新尝试!");
        return false;
      }else{
        alert("审批成功!");
        $(o).closest('td').html('操作已完成');
        $(o).closest('td').prev().html($(o).text().trim());
      }
    });
    return false;
  });
});
</script>
{/literal}
</body>
</html>
