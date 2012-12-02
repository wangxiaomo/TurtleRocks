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
      <h1>查看学生实习记录</h1>
      {if $user_type != 1}
        <div class="search_student">
          <p><input type="text" id="search_name" name="search_name" placeholder="输入要查找的学生姓名" /><button class="btn btn-search">查找</button></p>
        </div>
      {/if}
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>学生姓名</td>
          <td>公司名称</td>
          <td>职位名称</td>
          <td>申请时间</td>
          <td>结束时间</td>
          <td>证明人</td>
          <td>证明人联系方式</td>
        </thead>
        {foreach from=$internships item=internship}
        <tr>
          {if $user_type==0}
            <td><a href="show_info.php?sid={$internship.student_id}" target="_blank">{$internship.name}</a></td>
          {else}
            <td>{$internship.name}</td>
          {/if}
          <td>{$internship.company_name}</td>
          <td>{$internship.job_name}</td>
          <td>{$internship.start}</td>
          <td>{$internship.end}</td>
          <td>{$internship.mentor}</td>
          <td>{$internship.contact_num}</td>
        </tr>
        {foreachelse}
          <tr><td colspan=7><div class="status">没有实习记录.同学不给力啊!!!</div></td></tr>
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
    window.location = '?name='+$('.search_student').find('input').attr('value').trim();
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
