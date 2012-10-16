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
      <h1>工作发布与维护</h1>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>公司名称</td>
          <td>职位名称</td>
          <td>职位信息</td>
          <td>操作</td>
        </thead>
        <tr>
          <td>百度</td>
          <td>开发工程师</td>
          <td>负责万能的开发工作</td>
          <td><a href="#">修改</a>&nbsp;&nbsp;<a href="#">删除</a></td>
        </tr>
        <tr>
          <td>百度</td>
          <td>开发工程师</td>
          <td>负责万能的开发工作</td>
          <td><a href="#">修改</a>&nbsp;&nbsp;<a href="#">删除</a></td>
        </tr>
        <tr>
          <td>百度</td>
          <td>开发工程师</td>
          <td>负责万能的开发工作</td>
          <td><a href="#">修改</a>&nbsp;&nbsp;<a href="#">删除</a></td>
        </tr>
        <tr>
          <td>百度</td>
          <td>开发工程师</td>
          <td>负责万能的开发工作</td>
          <td><a href="#">修改</a>&nbsp;&nbsp;<a href="#">删除</a></td>
        </tr>
        <tr>
          <td>百度</td>
          <td>开发工程师</td>
          <td>负责万能的开发工作</td>
          <td><a href="#">修改</a>&nbsp;&nbsp;<a href="#">删除</a></td>
        </tr>
        <tr>
          <td>百度</td>
          <td>开发工程师</td>
          <td>负责万能的开发工作</td>
          <td><a href="#">修改</a>&nbsp;&nbsp;<a href="#">删除</a></td>
        </tr>
      </table>
      <div style="margin-left: 420px;"><button>发布新职位</button></div>
    </div>
    <div class="clear">&nbsp;</div>
  </div>
</div>
<div class="footer">
  {include file="footer.tpl"}
</div>
</body>
</html>
