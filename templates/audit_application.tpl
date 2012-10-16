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
      <h1>实习申请审批</h1>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>学生姓名</td>
          <td>职位名称</td>
          <td>申请时间</td>
          <td>状态</td>
          <td>操作</td>
        </thead>
        <tr>
          <td>小黑</td>
          <td>开发工程师</td>
          <td>2012/09/01</td>
          <td>审核中</td>
          <td><a href="#">通过</a>&nbsp;&nbsp;<a href="#">拒绝</a></td>
        </tr>
        <tr>
          <td>小黑</td>
          <td>开发工程师</td>
          <td>2012/09/01</td>
          <td>审核中</td>
          <td><a href="#">通过</a>&nbsp;&nbsp;<a href="#">拒绝</a></td>
        </tr>
        <tr>
          <td>小黑</td>
          <td>开发工程师</td>
          <td>2012/09/01</td>
          <td>审核中</td>
          <td><a href="#">通过</a>&nbsp;&nbsp;<a href="#">拒绝</a></td>
        </tr>
        <tr>
          <td>小黑</td>
          <td>开发工程师</td>
          <td>2012/09/01</td>
          <td>审核中</td>
          <td><a href="#">通过</a>&nbsp;&nbsp;<a href="#">拒绝</a></td>
        </tr>
        <tr>
          <td>小黑</td>
          <td>开发工程师</td>
          <td>2012/09/01</td>
          <td>审核中</td>
          <td><a href="#">通过</a>&nbsp;&nbsp;<a href="#">拒绝</a></td>
        </tr>
        <tr>
          <td>小黑</td>
          <td>开发工程师</td>
          <td>2012/09/01</td>
          <td>审核中</td>
          <td><a href="#">通过</a>&nbsp;&nbsp;<a href="#">拒绝</a></td>
        </tr>
        <tr>
          <td>小黑</td>
          <td>开发工程师</td>
          <td>2012/09/01</td>
          <td>审核中</td>
          <td><a href="#">通过</a>&nbsp;&nbsp;<a href="#">拒绝</a></td>
        </tr>
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
