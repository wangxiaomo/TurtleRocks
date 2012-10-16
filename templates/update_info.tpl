{config_load file="main.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
{include file="header.tpl"}
<link rel="stylesheet" href="{#STATIC_DIR#}/images/BrightSide.css" type="text/css" />
<link href="{#STATIC_DIR#}/less/main.less" rel="stylesheet/less" type="text/css">
<link href="{#STATIC_DIR#}/less/test.less" rel="stylesheet/less" type="text/css">
<script type="text/javascript" src="{#STATIC_DIR#}/js/libs/less.min.js"></script>
</style>
</head>
<body>
<div id="wrap">
  {include file="top_nav.tpl"}
  <div id="content-wrap" style="background-color:white;">
    {include file="sidebar.tpl"}
    <div id="main"> 
      <h1>修改个人信息</h1>
      <div class="op" style="margin-left:20px;">
      {if $user_type == 0}
        <span>部门名称:<input type="text" name="name" /></span><br />
        <span>部门描述:<input type="text"/></span><br />
        <span><button>提交</button><button>重置</button></span>
      {/if }
      {if $user_type == 1}
        <span>姓名:<input type="text" name="name" /></span><br />
        <span>性别:<input type="radio" name="male" />男 <input type="radio" name="female" />女</span><br />
        <span>班级:<input type="text"/></span><br />
        <span>专业:<input type="text"/></span><br />
        <span>生日:<input type="text"/></span><br />
        <span>户籍:<input type="text"/></span><br />
        <span>备注:<input type="text"/></span><br />
        <span><button>提交</button><button>重置</button></span>
      {/if }
      {if $user_type == 2}
        <span>公司名称:<input type="text" name="name" /></span><br />
        <span>公司描述:<input type="text"/></span><br />
        <span><button>提交</button><button>重置</button></span>
      {/if }
      </div>
    </div>
    <div class="clear">&nbsp;</div>
  </div>
</div>
<div class="footer">
  {include file="footer.tpl"}
</div>
</body>
</html>
