<?php /* Smarty version 2.6.27, created on 2012-10-16 03:53:30
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'login.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "main.conf"), $this);?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link href="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/less/login.less" rel="stylesheet/less" type="text/css">
<script type="text/javascript" src="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/js/libs/less.min.js"></script>
</head>
<body>
  <div class="content-wrapper">
    <div class="content-header">
      <h1><a href="#">经贸学校实习管理</a></h1>
    </div>
    <div class="content rounded">
      <header class="hero">
        <hgroup>
          <h1>使用账号密码登陆</h1>
        </hgroup>
      </header>
      <div id="ds_container">
        <form method="POST">
          <table cellpadding="0" cellspacing="0" border="0" width="273">
            <tbody>
              <tr valign="top">
                <td align="left">
                  <label for="consumer"><span>账号:</span></label>
                </td>
                <td align="left">
                  <input type="text" id="consumer" name="consumer" placeholder="账号..." />
                </td>
              </tr>
              <tr valign="top">
                <td align="left">
                  <label for="password"><span>密码:</span></label>
                </td>
                <td align="left">
                  <input type="password" id="password" name="password" placeholder="密码..." />
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      <font color="red"><?php echo $this->_tpl_vars['err_msg']; ?>
</font>
      <div class="my-btn-group">
        <button type="button" class="btn btn-large btn-reset"><span>重置</span></button>
        <button type="button" class="btn btn-large btn-primary btn-ok"><span>登陆</span></button>
      </div>
    </div>
    <div class="login_footer">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
  </div>
</body>
<script type="text/javascript" src="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/js/login.js"></script>
</html>