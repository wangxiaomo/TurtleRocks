<?php /* Smarty version 2.6.27, created on 2012-10-16 05:06:51
         compiled from audit_application.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'audit_application.tpl', 1, false),)), $this); ?>
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
<script type="text/javascript" src="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/js/libs/less.min.js"></script>
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
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>