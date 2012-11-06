<?php /* Smarty version 2.6.27, created on 2012-11-06 13:16:36
         compiled from show_record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'show_record.tpl', 1, false),)), $this); ?>
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
      <h1>查看实习记录</h1>
      <table class="table table-bordered table-hover table-condensed">
        <?php if ($this->_tpl_vars['user_type'] == 0): ?>
          <thead>
            <td>学生姓名</td>
            <td>公司名称</td>
            <td>职位名称</td>
            <td>申请时间</td>
            <td>状态</td>
            <td>审批时间</td>
          </thead>
          <?php $_from = $this->_tpl_vars['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
          <tr>
            <td><?php echo $this->_tpl_vars['record']['name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['record']['company_name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['record']['job_name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['record']['request_date']; ?>
</td>
            <?php if ($this->_tpl_vars['record']['status'] == 0): ?>
              <td>审核中.</td>
              <td>请耐心等待回复.</td>
            <?php else: ?>
              <td>已通过审核</td>
              <td><?php echo $this->_tpl_vars['record']['audit_date']; ?>
</td>
            <?php endif; ?>
          </tr>
          <?php endforeach; else: ?>
            <tr><td colspan=6><div class="status">没有实习记录.同学不给力啊!!!</div></td></tr>
          <?php endif; unset($_from); ?>
        <?php elseif ($this->_tpl_vars['user_type'] == 1): ?>
          <thead>
            <td>公司名称</td>
            <td>职位名称</td>
            <td>申请时间</td>
            <td>状态</td>
            <td>审批时间</td>
          </thead>
          <?php $_from = $this->_tpl_vars['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
          <tr>
            <td><?php echo $this->_tpl_vars['record']['company_name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['record']['job_name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['record']['request_date']; ?>
</td>
            <?php if ($this->_tpl_vars['record']['status'] == 0): ?>
              <td>审核中.</td>
              <td>请耐心等待回复.</td>
            <?php else: ?>
              <td>已通过审核</td>
              <td><?php echo $this->_tpl_vars['record']['audit_date']; ?>
</td>
            <?php endif; ?>
          </tr>
          <?php endforeach; else: ?>
            <tr><td colspan=5><div class="status">没有实习记录.同学不给力啊!!!</div></td></tr>
          <?php endif; unset($_from); ?>
        <?php else: ?>
          <thead>
            <td>学生姓名</td>
            <td>职位名称</td>
            <td>申请时间</td>
            <td>状态</td>
            <td>审批时间</td>
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
            <?php if ($this->_tpl_vars['record']['status'] == 0): ?>
              <td>审核中.</td>
              <td>请耐心等待回复.</td>
            <?php else: ?>
              <td>已通过审核</td>
              <td><?php echo $this->_tpl_vars['record']['audit_date']; ?>
</td>
            <?php endif; ?>
          </tr>
          <?php endforeach; else: ?>
            <tr><td colspan=5><div class="status">没有实习记录.公司不给力啊!!!</div></td></tr>
          <?php endif; unset($_from); ?>
        <?php endif; ?>
      </table>
      <div class="tooltips">
        <p><span class="label label-important">重要</span>审核通过后请主动联系公司负责人协商下一步的工作.</p>
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