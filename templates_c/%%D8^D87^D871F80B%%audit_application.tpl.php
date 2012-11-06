<?php /* Smarty version 2.6.27, created on 2012-11-06 14:36:46
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
        <?php $_from = $this->_tpl_vars['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
        <tr>
          <td><?php echo $this->_tpl_vars['record']['name']; ?>
</td>
          <td><?php echo $this->_tpl_vars['record']['job_name']; ?>
</td>
          <td><?php echo $this->_tpl_vars['record']['request_date']; ?>
</td>
          <td>审核中</td>
          <td><a class="op" href="j/audit_application.php?op=yes&record_id=<?php echo $this->_tpl_vars['record']['record_id']; ?>
">通过</a>&nbsp;&nbsp;<a class="op" href="j/audit_application.php?op=no&record_id=<?php echo $this->_tpl_vars['record']['record_id']; ?>
">拒绝</a></td>
        </tr>
        <?php endforeach; else: ?>
          <tr><td colspan=5><div class="status">没有申请的记录.公司不给力啊!!!</div></td></tr>
        <?php endif; unset($_from); ?>
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
<?php echo '
<script>
$(function(){
  $(\'a.op\').on(\'click\', function(e){
    e.preventDefault();
    var o = $(this);
    $.post($(o).attr(\'href\'), function(d){
      if(d.r == 0){
        alert("操作失败.请重新尝试!");
        return false;
      }else{
        alert("审批成功!");
        $(o).closest(\'td\').html(\'操作已完成\');
        $(o).closest(\'td\').prev().html($(o).text().trim());
      }
    });
    return false;
  });
});
</script>
'; ?>

</body>
</html>