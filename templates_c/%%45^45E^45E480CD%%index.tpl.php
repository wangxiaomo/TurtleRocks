<?php /* Smarty version 2.6.27, created on 2012-11-07 08:25:49
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'index.tpl', 1, false),array('modifier', 'truncate', 'index.tpl', 26, false),)), $this); ?>
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
      <h1>当前热招公司</h1>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>公司名称</td>
          <td>公司信息</td>
          <td>操作</td>
        </thead>
      <?php $_from = $this->_tpl_vars['companys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['company']):
?>
        <tr>
          <td class="company_name"><?php echo $this->_tpl_vars['company']['company_name']; ?>
</td>
          <td class="meta_info"><?php echo ((is_array($_tmp=$this->_tpl_vars['company']['meta_info'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25) : smarty_modifier_truncate($_tmp, 25)); ?>
</td>
          <td class="op"><a href="show_job.php?id=<?php echo $this->_tpl_vars['company']['company_id']; ?>
">查看</a></td>
        </tr>
        <tr class="meta_info">
          <td colspan=3><pre><?php echo $this->_tpl_vars['company']['meta_info']; ?>
</pre></td>
        </tr>
      <?php endforeach; else: ?>
        <tr><td colspan=3 style="text-align:center;">没有公司数据。请联系管理员添加</td></tr>
      <?php endif; unset($_from); ?>
      <?php if ($this->_tpl_vars['companys']): ?>
        <tfoot>
          <td colspan=2>&nbsp;</td>
          <td class="op"><a href="show_company.php">查看全部</a></td>
        </tfoot>
      <?php endif; ?>
      </table>
      <h1>当前热招工作</h1>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>公司</td>
          <td>工作</td>
          <td>操作</td>
        </thead>
      <?php $_from = $this->_tpl_vars['jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
        <tr>
          <td class="company_name"><?php echo $this->_tpl_vars['job']['company_name']; ?>
</td>
          <td class="job_name"><?php echo $this->_tpl_vars['job']['job_name']; ?>
</td>
          <td class="op"><a href="show_job.php">查看详情</a></td>
        </tr>
        <tr class="meta_info">
          <td colspan=3><pre><?php echo $this->_tpl_vars['job']['job_meta']; ?>
</pre></td>
        </tr>
      <?php endforeach; else: ?>
        <tr><td colspan=3 style="text-align: center">没有公司数据。请联系管理员添加</td></tr>
      <?php endif; unset($_from); ?>
      <?php if ($this->_tpl_vars['jobs']): ?>
        <tfoot>
          <td colspan=2>&nbsp;</td>
          <td class="op"><a href="show_company.php">查看全部</a></td>
        </tfoot>
      <?php endif; ?>
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
  $(\'tr[class!=meta_info]\').on(\'click\', function(e){
    if(e.target.localName != \'a\'){
      $(this).next().toggle(500);
    }
  });
});
</script>
'; ?>

</body>
</html>