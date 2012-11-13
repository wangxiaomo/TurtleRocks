{config_load file="main.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
{include file="header.tpl"}
<link rel="stylesheet" href="{#STATIC_DIR#}/images/BrightSide.css" type="text/css" />
<link href="{#STATIC_DIR#}/less/main.less" rel="stylesheet/less" type="text/css">
<link href="{#STATIC_DIR#}/less/test.less" rel="stylesheet/less" type="text/css">
<link href="{#STATIC_DIR#}/css/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css">
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
      {if not $update}
        <input type="hidden" id="company_name" name="company_name" value="{$company_name}" />
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
            <td>点击查看更多</td>
            <td><a href="manage_job.php?job_id={$job.job_id}">修改</a>&nbsp;&nbsp;<a class="delete-job" href="j/delete_job.php?job_id={$job.job_id}">删除</a></td>
          </tr>
          <tr class="meta_info">
            <td colspan=4><pre>{$job.job_meta}</pre></td>
          </tr>
          {foreachelse}
            <tr><td colspan=4><div class="status">没有发布任何工作.不给力啊公司!!!</div></td></tr>
          {/foreach}
        </table>
        <div style="margin-left: 420px;"><button id="new_job">发布新职位</button></div>
        <div class="paginator"></div>
      {else}
        <h1>修改工作</h1>
        <table>
          <input type="hidden" id="job_id" name="job_id" value="{$job.job_id}" />
          <tr><td class="m">公司名称:</td><td class="left">{$job.company_name}</td></tr>
          <tr><td class="m">职位名称:</td><td class="left"><input type="text" id="job_name" name="job_name" value="{$job.job_name}" /></td></tr>
          <tr><td class="m">职位信息:</td><td class="left"><textarea id="job_meta" name="job_meta" style="height:300px;
            ">{$job.job_meta}</textarea></td></tr>
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
  <script src="../static/js/wysihtml5-0.3.0.js"></script>
  <script src="../static/js/bootstrap-wysihtml5.js"></script>
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
  function render(){
    $('#job_meta').wysihtml5({
      "font-styles": true,
      "emphasis": false,
      "lists": true,
      "link": false,
      "image": true,
    });
  }
  $('#new_job').on('click', function(e){
    e.preventDefault();
    if($('#job_name').length){
      return false;
    }
    var template = _.template($('#new-job-item').html());
    var company_name = $('input:hidden#company_name').attr('value').trim();
    $('#main').append(template({company_name:company_name}));
    render();
  });
  $(document).on('click', '#add', function(e){
    e.preventDefault();
    var job_name = $('#job_name').attr('value').trim();
    var job_meta = $('#job_meta').val();
    $.post('j/add_job.php', {job_name:job_name, job_meta:job_meta}, function(d){
      if(d.r == 0){
        alert("添加失败!可能有同名公司的存在!");
        return false;
      }else{
        window.location.reload();
      }
      return false;
    });
  });
  $(document).on('click', '#reset', function(e){
    e.preventDefault();
    $('input#job_name').attr('value', '');
    $('input#job_meta').attr('vaalue', '');
  });
  $('tr[class!=meta_info]').on('click', function(e){
    if(e.target.localName!='a'){
      $(this).next().toggle(500);
    }
  });
  $('.delete-job').on('click', function(e){
    e.preventDefault();
    var o = $(this);
    var tr = o.closest('tr');
    $.post($(o).attr('href'), function(d){
      if(d.r == 0){
        alert("已有学生申请该工作.确认删除请联系管理员!");
        return flase;
      }else{
        alert("删除成功!");
        $(tr).next().remove();
        $(tr).fadeOut(500, function(){ $(tr).remove(); });
      }
    });
    return false;
  });
});
  </script>
  <script type="text/template" id="new-job-item">
<div>
  <table>
    <tr><td class="m">公司名称:</td><td class="left"><%= company_name %></td></tr>
    <tr><td class="m">职位名称:</td><td class="left"><input type="text" id="job_name" name="job_name"/></td></tr>
    <tr><td class="m">职位信息:</td><td class="left"><textarea id="job_meta" name="job_meta" style="height:300px;"></textarea></td></tr>
    <tr><td>&nbsp;</td><td><button id="add" class="btn btn-primary">添加</button><button id="reset" class="btn">重置</button></td></tr>
  </table>
</div>
  </script>
  {/literal}
{else}
  {literal}
  <script src="../static/js/wysihtml5-0.3.0.js"></script>
  <script src="../static/js/bootstrap-wysihtml5.js"></script>
  <script>
$(function(){
  //修改
  $('#submit').on('click', function(e){
    e.preventDefault();
    var job_id = $('#job_id').attr('value').trim();
    var job_name = $('#job_name').attr('value').trim();
    var job_meta = $('#job_meta').val();
    $.post('j/update_job.php', {job_id:job_id, job_name:job_name, job_meta:job_meta},
        function (d){
      if(d.r == 0){
        alert("修改失败!");
        return false;
      }else{
        window.location = 'manage_job.php';
      }
    });
  });
  $('#job_meta').wysihtml5({
    "font-styles": true,
    "emphasis": false,
    "lists": true,
    "link": false,
    "image": true,
  });
});
  </script>
  {/literal}
{/if}
</body>
</html>
