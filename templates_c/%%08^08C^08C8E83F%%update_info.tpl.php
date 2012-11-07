<?php /* Smarty version 2.6.27, created on 2012-11-07 08:32:38
         compiled from update_info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'update_info.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "main.conf"), $this);?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" href="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/images/BrightSide.css" type="text/css" />
<link href="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/less/main.less" rel="stylesheet/less" type="text/css">
<link href="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/less/test.less" rel="stylesheet/less" type="text/css">
<script type="text/javascript" src="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/js/libs/less.min.js"></script>
</style>
</head>
<body>
<div id="wrap">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "top_nav.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <div id="content-wrap" style="background-color:white;">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div id="main"> 
      <h1>修改信息</h1>
      <?php if ($this->_tpl_vars['status']): ?>
        <div class="status"><?php echo $this->_tpl_vars['status']; ?>
</div>
      <?php endif; ?>
      <div class="op" style="margin-left:20px;">  
        <form method="POST">
          <table>
          <?php if ($this->_tpl_vars['user_type'] == 0): ?>
            <tr><td class="m">部门名称:</td><td class="left"><input type="text" name="department_name" readonly="true" value="<?php echo $this->_tpl_vars['account']['department_name']; ?>
"/></td></tr>
            <tr><td class="m">部门描述:</td><td class="left"><textarea name="department_extra" style="height:300px;"/></textarea></td></tr>
            <tr><td>&nbsp;</td><td><button id="submit" class="btn btn-primary">提交</button><button id="reset" class="btn">重置</button></td></tr>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['user_type'] == 1): ?>
            <tr><td class="m">照片:</td><td class="left"><?php if ($this->_tpl_vars['account']['pic_path']): ?><img src="<?php echo $this->_tpl_vars['account']['pic_path']; ?>
" width="60" height="80" /><?php else: ?><img src="../upload/students/default.jpg" width="60" height="80" /><?php endif; ?></td></tr>
            <tr><td class="m">姓名:</td><td class="left"><input type="text" name="name" value="<?php echo $this->_tpl_vars['account']['name']; ?>
" /></td></tr>
            <tr><td class="m">性别:</td><td class="left">
              <?php if ($this->_tpl_vars['account']['gender'] == 1): ?>
                <label><input type="radio" name="gender" value="1" checked="checked"/>男</label>
                <label><input type="radio" name="gender" value="2" />女</label>
              <?php else: ?>
                <label><input type="radio" name="gender" value="1"/>男</label>
                <label><input type="radio" name="gender" value="2" checked="checked" />女</label>
              <?php endif; ?>
            </td></tr>
            <tr><td class="m">身份证号:</td><td class="left"><input type="text" name="id_num" value="<?php echo $this->_tpl_vars['account']['id_num']; ?>
" /></td></tr>
            <tr><td class="m">年级:</td><td class="left"><input type="text" name="grade" value="<?php echo $this->_tpl_vars['account']['grade']; ?>
" /></td></tr>
            <tr><td class="m">专业:</td><td class="left"><input type="text" name="major" value="<?php echo $this->_tpl_vars['account']['major']; ?>
" /></td></tr>
            <tr><td class="m">联系电话:</td><td class="left"><input type="text" name="contact_num" value="<?php echo $this->_tpl_vars['account']['contact_num']; ?>
" /></td></tr>
            <tr><td class="m">家庭成员关系:</td><td class="left"><button id="show-family" class="btn btn-link">修改成员关系</button></td></tr>
            <tr><td class="m">备注:</td><td class="left"><textarea name="extra"><?php echo $this->_tpl_vars['account']['extra']; ?>
</textarea></td></tr>
            <tr><td>&nbsp;</td><td><button class="btn btn-primary">提交</button><button id="reset" class="btn">重置</button></td></tr>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['user_type'] == 2): ?>
            <tr><td class="m">公司名称:</td><td class="left"><input type="text" name="company_name" value="<?php echo $this->_tpl_vars['account']['company_name']; ?>
"/></td></tr>
            <tr><td class="m">公司描述:</td><td class="left"><textarea name="meta_info" style="height:300px;"><?php echo $this->_tpl_vars['account']['meta_info']; ?>
</textarea></td></tr>
            <tr><td>&nbsp;</td><td><button id="submit" class="btn btn-primary">提交</button><button id="reset" class="btn">重置</button></td></tr>
          <?php endif; ?>
          </table>
        </form>
      </div>
    </div>
    <div class="clear">&nbsp;</div>
  </div>
</div>
<div class="footer">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php echo '
<script>
$(function(){
  $(document).on(\'click\', \'.btn-add\', function(e){
    e.preventDefault();
    var li = $(this).closest(\'li\');
    var name = li.find(\'input.name\').attr(\'value\');
    var relationship = li.find(\'input.relationship\').attr(\'value\');
    var contact_num = li.find(\'input.contact_num\').attr(\'value\');
    $.post(\'j/add_family.php\', {name:name, relationship:relationship, contact_num:contact_num}, function(d){
      var id = d.id;
      var template = _.template($(\'#family-item\').html());
      $(template({id:id,name:name,relationship:relationship,contact_num:contact_num})).insertBefore(li);
      li.find(\'input\').attr(\'value\', \'\');
    });
  });
  $(document).on(\'click\', \'.btn-save\', function(e){
    e.preventDefault();
    var li = $(this).closest(\'li\');
    var id = li.find(\'input:hidden\').attr(\'value\');
    var name = li.find(\'input.name\').attr(\'value\');
    var relationship = li.find(\'input.relationship\').attr(\'value\');
    var contact_num = li.find(\'input.contact_num\').attr(\'value\');
    $.post(\'j/update_family.php\', {id: id, name: name, relationship: relationship, contact_num: contact_num}, function(d){
      return false;
    });
  });
  $(document).on(\'click\', \'.btn-del\', function(e){
    e.preventDefault();
    var li = $(this).closest(\'li\');
    var id = li.find(\'input:hidden\').attr(\'value\');
    $.post(\'j/delete_family.php\', {id: id}, function(d){
      li.fadeOut(1000, function(){ li.remove(); });
    });
  });
  $(document).on(\'click\', \'.btn-reset\', function(e){
    e.preventDefault();
    $(this).closest(\'li\').find(\'input\').attr(\'value\', \'\');
  });
  $(\'#show-family\').click(function(e){
    e.preventDefault();
    var o = $(this).parent();
    o.html(\'<ul></ul>\');
    o = o.find(\'ul\');
    // ajax load the family info
    $.get(\'j/get_family.php\', function(d){
      var template = _.template($(\'#family-item\').html());
      for(var i in d){
        var item = d[i];
        o.append(
          template(item)   
        );
      }
      o.append(_.template($(\'#add-family-item\').html()));
    });
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
'; ?>

</body>
</html>