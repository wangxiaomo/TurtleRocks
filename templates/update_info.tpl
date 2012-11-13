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
</style>
</head>
<body>
<div id="wrap">
  {include file="top_nav.tpl"}
  <div id="content-wrap" style="background-color:white;">
    {include file="sidebar.tpl"}
    <div id="main"> 
      <h1>修改信息</h1>
      {if $status}
        <div class="status">{$status}</div>
      {/if}
      <div class="op" style="margin-left:20px;">  
        <form method="POST">
          <table>
          {if $user_type == 0}
            <tr><td class="m">部门名称:</td><td class="left"><input type="text" name="department_name" readonly="true" value="{$account.department_name}"/></td></tr>
            <tr><td class="m">部门描述:</td><td class="left"><textarea name="department_extra" style="height:300px;"/></textarea></td></tr>
            <tr><td>&nbsp;</td><td><button id="submit" class="btn btn-primary">提交</button><button id="reset" class="btn">重置</button></td></tr>
          {/if }
          {if $user_type == 1}
            <tr><td class="m">照片:</td><td class="left"><div class="pic_file">{if $account.pic_path}<img src="{$account.pic_path}" width="60" height="80" />{else}<img src="../upload/students/default.jpg" width="60" height="80" />{/if}</div><input type="file" id="change_photo" name="change_photo" data-url="upload.php" multiple/></td></tr>
            <tr><td class="m">姓名:</td><td class="left"><input type="text" name="name" value="{$account.name}" /></td></tr>
            <tr><td class="m">性别:</td><td class="left">
              {if $account.gender == 1}
                <label><input type="radio" name="gender" value="1" checked="checked"/>男</label>
                <label><input type="radio" name="gender" value="2" />女</label>
              {else}
                <label><input type="radio" name="gender" value="1"/>男</label>
                <label><input type="radio" name="gender" value="2" checked="checked" />女</label>
              {/if}
            </td></tr>
            <tr><td class="m">身份证号:</td><td class="left"><input type="text" name="id_num" value="{$account.id_num}" /></td></tr>
            <tr><td class="m">年级:</td><td class="left"><input type="text" name="grade" value="{$account.grade}" /></td></tr>
            <tr><td class="m">专业:</td><td class="left"><input type="text" name="major" value="{$account.major}" /></td></tr>
            <tr><td class="m">联系电话:</td><td class="left"><input type="text" name="contact_num" value="{$account.contact_num}" /></td></tr>
            <tr><td class="m">家庭成员关系:</td><td class="left"><button id="show-family" class="btn btn-link">修改成员关系</button></td></tr>
            <tr><td class="m">备注:</td><td class="left"><textarea name="extra">{$account.extra}</textarea></td></tr>
            <tr><td>&nbsp;</td><td><button class="btn btn-primary">提交</button><button id="reset" class="btn">重置</button></td></tr>
          {/if }
          {if $user_type == 2}
            <tr><td class="m">公司名称:</td><td class="left"><input type="text" name="company_name" value="{$account.company_name}"/></td></tr>
            <tr><td class="m">公司描述:</td><td class="left"><textarea name="meta_info" style="height:300px;">{$account.meta_info}</textarea></td></tr>
            <tr><td>&nbsp;</td><td><button id="submit" class="btn btn-primary">提交</button><button id="reset" class="btn">重置</button></td></tr>
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
<script src="{#STATIC_DIR#}/js/libs/load-image.min.js"></script>
<script src="{#STATIC_DIR#}/js/libs/ui/minified/jquery.ui.widget.min.js"></script>
<script src="{#STATIC_DIR#}/js/libs/jquery.iframe-transport.js"></script>
<script src="{#STATIC_DIR#}/js/libs/jquery.fileupload.js"></script>
{literal}
<script src="../static/js/wysihtml5-0.3.0.js"></script>
<script src="../static/js/bootstrap-wysihtml5.js"></script>
<script>
$(function(){
  //TODO: Fix IT. Hack Method
  $('#change_photo').fileupload();
  $('textarea').wysihtml5({
    "font-styles": true,
    "emphasis": false,
    "lists": true,
    "link": false,
    "image": true,
  });
  $(document).on('click', '.btn-add', function(e){
    e.preventDefault();
    var li = $(this).closest('li');
    var name = li.find('input.name').attr('value');
    var relationship = li.find('input.relationship').attr('value');
    var contact_num = li.find('input.contact_num').attr('value');
    $.post('j/add_family.php', {name:name, relationship:relationship, contact_num:contact_num}, function(d){
      var id = d.id;
      var template = _.template($('#family-item').html());
      $(template({id:id,name:name,relationship:relationship,contact_num:contact_num})).insertBefore(li);
      li.find('input').attr('value', '');
    });
  });
  $(document).on('click', '.btn-save', function(e){
    e.preventDefault();
    var li = $(this).closest('li');
    var id = li.find('input:hidden').attr('value');
    var name = li.find('input.name').attr('value');
    var relationship = li.find('input.relationship').attr('value');
    var contact_num = li.find('input.contact_num').attr('value');
    $.post('j/update_family.php', {id: id, name: name, relationship: relationship, contact_num: contact_num}, function(d){
      return false;
    });
  });
  $(document).on('click', '.btn-del', function(e){
    e.preventDefault();
    var li = $(this).closest('li');
    var id = li.find('input:hidden').attr('value');
    $.post('j/delete_family.php', {id: id}, function(d){
      li.fadeOut(1000, function(){ li.remove(); });
    });
  });
  $(document).on('click', '.btn-reset', function(e){
    e.preventDefault();
    $(this).closest('li').find('input').attr('value', '');
  });
  $('#show-family').click(function(e){
    e.preventDefault();
    var o = $(this).parent();
    o.html('<ul></ul>');
    o = o.find('ul');
    // ajax load the family info
    $.get('j/get_family.php', function(d){
      var template = _.template($('#family-item').html());
      for(var i in d){
        var item = d[i];
        o.append(
          template(item)   
        );
      }
      o.append(_.template($('#add-family-item').html()));
    });
    return false;
  });
  $('#change_photo').on('change', function(e){
    e = e.originalEvent;
    e.preventDefault();
    $('#change_photo').fileupload({
      url: 'upload.php',
      done: function(e, data){
        console.log(data);
      }
    });
    window.loadImage(
      (e.dataTransfer || e.target).files[0],
      function(img){
        $('.pic_file').html(img);
      },
      {
        minWidth: 80,
        minHeight: 60,
        maxWidth: 80,
        minHeight: 60,
      }
    );
    return false;
  });
});
</script>
<script type="text/template" id="family-item">
  <li>
      <input type="hidden" value="<%= id %>" />
      <input type="text" class="name" style="width:50px;" value="<%= name %>" placeholder="name" />
      <input type="text" class="relationship" value="<%= relationship %>" placeholder="relationship" />
      <input type="text" class="contact_num" style="width:100px;" value="<%= contact_num %>" placeholder="contact_num" />
      <button class="btn btn-mini btn-save btn-link">保存</button><button class="btn btn-mini btn-del btn-link">删除</button>
  </li>
</script>
<script type="text/template" id="add-family-item">
  <li>
      <input type="text" class="name" style="width:50px;" placeholder="name" />
      <input type="text" class="relationship" placeholder="relationship" />
      <input type="text" class="contact_num" style="width:100px;" placeholder="contact_num" />
      <button class="btn btn-mini btn-add btn-link">添加</button><button class="btn btn-mini btn-reset btn-link">重置</button>
  </li>
</script>
{/literal}
</body>
</html>
