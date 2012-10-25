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
        <form method="POST">
          <table>
          {if $user_type == 0}
            <tr><td>部门名称:</td><td><input type="text" name="name" value="{$account.company_name}"/></td></tr>
            <tr><td>&nbsp;</td><td><button>提交</button><button>重置</button></td></tr>
          {/if }
          {if $user_type == 1}
            <input type="hidden" name="student_id" value="{$account.student_id}" />
            <tr><td>照片:</td><td><img src="{$account.pic_path}" width="60" height="80" /></td></tr>
            <tr><td>姓名:</td><td><input type="text" name="name" value="{$account.name}" /></td></tr>
            <tr><td>性别:</td><td>
              {if $account.gender == 1}
                <input type="radio" name="male" checked="checked"/>男 
                <input type="radio" name="female"/>女
              {else}
                <input type="radio" name="male" />男 
                <input type="radio" name="female" checked="checked" />女
              {/if}
            </td></tr>
            <tr><td>身份证号:</td><td><input type="text" name="id_num" value="{$account.id_num}" /></td></tr>
            <tr><td>年级:</td><td><input type="text" name="grade" value="{$account.grade}" /></td></tr>
            <tr><td>专业:</td><td><input type="text" name="major" value="{$account.major}" /></td></tr>
            <tr><td>联系电话:</td><td><input type="text" name="contact_num" value="{$account.contact_num}" /></td></tr>
            <tr><td>家庭情况:</td><td>
              {if $account.family_info }
                <ul>
                {foreach from=$account.family_info item=item}
                  <li>{$item.id} {$item.name} {$item.relationship} {$item.contact_num}</li>
                {/foreach}
                </ul>
              {else}
                没有成员
              {/if}
            </td></tr>
            <tr><td>备注:</td><td><input type="text" name="extra" value="{$account.extra}" /></td></tr>
            <tr><td>&nbsp;</td><td><button>提交</button><button>重置</button></td></tr>
          {/if }
          {if $user_type == 2}
            <tr><td>公司名称:</td><td><input type="text" name="name" /></td></tr>
            <tr><td>公司描述:</td><td><input type="text"/></td></tr>
            <tr><td>&nbsp;</td><td><button>提交</button><button>重置</button></td></tr>
          {/if }
          </table>
        </form>
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
