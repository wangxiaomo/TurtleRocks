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
      <h1>查看百度公司提供的所有职位</h1>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>公司名称</td>
          <td>职位名称</td>
          <td>职位信息</td>
          {if $user_type!=0}
            <td>操作</td>
          {/if}
        </thead>
        {foreach from=$jobs item=job}
        <tr>
          <td>{$job.company_name|escape}</td>
          <td>{$job.job_name|escape}</td>
          <td>点击查看更多</td>
          {if $user_type!=0}
            <td><a class="apply" href="j/apply_for_job.php?job_id={$job.job_id}">申请</a></td>
          {else}
            <td><a class="update-job" href="manage_job.php?job_id={$job.job_id}">修改</a></td>
          {/if}
        </tr>
        <tr class="meta_info">
          <td colspan=4><pre>{$job.job_meta|escape}</pre></td>
        </tr>
        {foreachelse}
          <tr><td colspan=4><div class="status">这家公司没有任何职位..不给力啊.老师!!!</div></td></tr>
        {/foreach}
      </table>
      <div class="tooltips">
        <p><span class="label label-success">提示</span>点击该行可查看具体信息!</p>
      </div>
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

  $('tr[class!=meta_info]').on('click', function(e){
    if(e.target.localName!='a'){
      $(this).next().toggle(500);
    }
  });
  $('a.apply').on('click', function(e){
    e.preventDefault();
    if($(this).text().trim() == '已申请'){
      alert("请不要重复申请!");
      return false;
    }
    var o = $(this);
    $.post($(o).attr('href'), function(d){
      if(d.r == 0){
        //申请失败
        alert("申请失败.请重试!");
        return false;
      }else if(d.r == 1){
        //申请成功
        alert("申请成功.请耐心等待审核!");
        $(o).text('已申请');
      }else{
        alert("已有申请记录.请耐心等待审核!");
        $(o).text('已申请');
      }
    });
    return false;
  });
});
</script>
{/literal}
</body>
</html>
