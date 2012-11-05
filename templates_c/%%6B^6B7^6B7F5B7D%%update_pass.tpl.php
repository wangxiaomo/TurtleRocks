<?php /* Smarty version 2.6.27, created on 2012-11-05 11:32:29
         compiled from update_pass.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'update_pass.tpl', 1, false),)), $this); ?>
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
      <h1>修改登录密码</h1>
      <?php if ($this->_tpl_vars['status']): ?>
        <div class="status"><?php echo $this->_tpl_vars['status']; ?>
</div>
      <?php endif; ?>
      <div class="op" style="margin-left:20px;">
        <form method="POST" action="">
          <table>
            <tr><td class="m">账号:</td><td><input type="text" id="consumer" name="consumer" value="<?php echo $_COOKIE['consumer']; ?>
" readonly="readonly" /></td></tr>
            <tr><td class="m">原始密码:</td><td><input type="password" id="origin_pass" name="origin_pass" /></td></tr>
            <tr><td class="m">新密码:</td><td><input type="password" id="new_pass" name="new_pass" /></td></tr>
            <tr><td class="m">确认密码:</td><td><input type="password" id="re_new_pass" name="re_new_pass" /></td></tr>
            <tr><td>&nbsp;</td><td><div class="btn-group"><button class="submit btn btn-primary">提交</button><button class="reset btn">重置</button></div></td></tr>
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
  function check_new_pass(){
    return $(\'#new_pass\').attr(\'value\') == $(\'#re_new_pass\').attr(\'value\');
  }
  function reset(){
    $(\'input:password\').attr(\'value\', \'\');
  }
  $(\'button.submit\').on(\'click\', function(){
    if(check_new_pass()){
      $(\'form[class!=searchform]\').submit();
    }else{
      alert("两次输入的密码不一致.请重新输入!!!");
      reset();
    }
    return false;
  });
  $(\'button.reset\').on(\'click\', reset);
});
</script>
'; ?>

</body>
</html>