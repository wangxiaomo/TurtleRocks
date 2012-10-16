<?php /* Smarty version 2.6.27, created on 2012-10-16 04:55:31
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
      <h1>修改个人信息</h1>
      <div class="op" style="margin-left:20px;">
      <?php if ($this->_tpl_vars['user_type'] == 0): ?>
        <span>部门名称:<input type="text" name="name" /></span><br />
        <span>部门描述:<input type="text"/></span><br />
        <span><button>提交</button><button>重置</button></span>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['user_type'] == 1): ?>
        <span>姓名:<input type="text" name="name" /></span><br />
        <span>性别:<input type="radio" name="male" />男 <input type="radio" name="female" />女</span><br />
        <span>班级:<input type="text"/></span><br />
        <span>专业:<input type="text"/></span><br />
        <span>生日:<input type="text"/></span><br />
        <span>户籍:<input type="text"/></span><br />
        <span>备注:<input type="text"/></span><br />
        <span><button>提交</button><button>重置</button></span>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['user_type'] == 2): ?>
        <span>公司名称:<input type="text" name="name" /></span><br />
        <span>公司描述:<input type="text"/></span><br />
        <span><button>提交</button><button>重置</button></span>
      <?php endif; ?>
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
</body>
</html>