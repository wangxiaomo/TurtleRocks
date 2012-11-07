<?php /* Smarty version 2.6.27, created on 2012-11-07 08:33:36
         compiled from show_job.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'show_job.tpl', 1, false),array('modifier', 'truncate', 'show_job.tpl', 30, false),)), $this); ?>
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
      <h1>查看百度公司提供的所有职位</h1>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <td>公司名称</td>
          <td>职位名称</td>
          <td>职位信息</td>
          <?php if ($this->_tpl_vars['user_type'] != 0): ?>
            <td>操作</td>
          <?php endif; ?>
        </thead>
        <?php $_from = $this->_tpl_vars['jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
        <tr>
          <td><?php echo $this->_tpl_vars['job']['company_name']; ?>
</td>
          <td><?php echo $this->_tpl_vars['job']['job_name']; ?>
</td>
          <td><?php echo ((is_array($_tmp=$this->_tpl_vars['job']['job_meta'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20) : smarty_modifier_truncate($_tmp, 20)); ?>
</td>
          <?php if ($this->_tpl_vars['user_type'] != 0): ?>
            <td><a class="apply" href="j/apply_for_job.php?job_id=<?php echo $this->_tpl_vars['job']['job_id']; ?>
">申请</a></td>
          <?php endif; ?>
        </tr>
        <tr class="meta_info">
          <td colspan=4><pre><?php echo $this->_tpl_vars['job']['job_meta']; ?>
</pre></td>
        </tr>
        <?php endforeach; else: ?>
          <tr><td colspan=4><div class="status">这家公司没有任何职位..不给力啊依然的.老师!!!</div></td></tr>
        <?php endif; unset($_from); ?>
      </table>
      <div class="tooltips">
        <p><span class="label label-success">提示</span>点击该行可查看具体信息!</p>
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
  $(\'tr[class!=meta_info]\').on(\'click\', function(e){
    if(e.target.localName!=\'a\'){
      $(this).next().toggle(500);
    }
  });
  $(\'a.apply\').on(\'click\', function(e){
    e.preventDefault();
    if($(this).text().trim() == \'已申请\'){
      alert("请不要重复申请!");
      return false;
    }
    var o = $(this);
    $.post($(o).attr(\'href\'), function(d){
      if(d.r == 0){
        //申请失败
        alert("申请失败.请重试!");
        return false;
      }else{
        //申请成功
        alert("申请成功.请耐心等待审核!");
        $(o).text(\'已申请\');
      }
    });
    return false;
  });
});
</script>
'; ?>

</body>
</html>