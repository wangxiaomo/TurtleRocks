<?php /* Smarty version 2.6.27, created on 2012-11-07 09:03:13
         compiled from manage_job.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'manage_job.tpl', 1, false),array('modifier', 'truncate', 'manage_job.tpl', 31, false),)), $this); ?>
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
      <?php if (! $this->_tpl_vars['update']): ?>
        <input type="hidden" id="company_name" name="company_name" value="<?php echo $this->_tpl_vars['company_name']; ?>
" />
        <h1>工作发布与维护</h1>
        <table class="table table-bordered table-hover table-condensed">
          <thead>
            <td>公司名称</td>
            <td>职位名称</td>
            <td>职位信息</td>
            <td>操作</td>
          </thead>
          <?php $_from = $this->_tpl_vars['jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
          <tr>
            <td class="company_name"><?php echo $this->_tpl_vars['job']['company_name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['job']['job_name']; ?>
</td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['job']['job_meta'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</td>
            <td><a href="manage_job.php?job_id=<?php echo $this->_tpl_vars['job']['job_id']; ?>
">修改</a>&nbsp;&nbsp;<a class="delete-job" href="j/delete_job.php?job_id=<?php echo $this->_tpl_vars['job']['job_id']; ?>
">删除</a></td>
          </tr>
          <tr class="meta_info">
            <td colspan=4><pre><?php echo $this->_tpl_vars['job']['job_meta']; ?>
</pre></td>
          </tr>
          <?php endforeach; else: ?>
            <tr><td colspan=4><div class="status">没有发布任何工作.不给力啊公司!!!</div></td></tr>
          <?php endif; unset($_from); ?>
        </table>
        <div style="margin-left: 420px;"><button id="new_job">发布新职位</button></div>
      <?php else: ?>
        <h1>修改工作</h1>
        <table>
          <input type="hidden" id="job_id" name="job_id" value="<?php echo $this->_tpl_vars['job']['job_id']; ?>
" />
          <tr><td class="m">公司名称:</td><td class="left"><?php echo $this->_tpl_vars['job']['company_name']; ?>
</td></tr>
          <tr><td class="m">职位名称:</td><td class="left"><input type="text" id="job_name" name="job_name" value="<?php echo $this->_tpl_vars['job']['job_name']; ?>
" /></td></tr>
          <tr><td class="m">职位信息:</td><td class="left"><textarea id="job_meta" name="job_meta" style="height:300px;
            "><?php echo $this->_tpl_vars['job']['job_meta']; ?>
</textarea></td></tr>
          <tr><td>&nbsp;</td><td><button id="submit" class="btn btn-primary">提交</button><button id="reset" class="btn">重置</button></td></tr>
        </table>
      <?php endif; ?>
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
<?php if (! $this->_tpl_vars['update']): ?>
  <?php echo '
  <script>
$(function(){
  $(\'#new_job\').on(\'click\', function(e){
    e.preventDefault();
    if($(\'#job_name\').length){
      return false;
    }
    var template = _.template($(\'#new-job-item\').html());
    var company_name = $(\'input:hidden#company_name\').attr(\'value\').trim();
    $(\'#main\').append(template({company_name:company_name}));
  });
  $(document).on(\'click\', \'#add\', function(e){
    e.preventDefault();
    var job_name = $(\'#job_name\').attr(\'value\').trim();
    var job_meta = $(\'#job_meta\').attr(\'value\').trim();
    $.post(\'j/add_job.php\', {job_name:job_name, job_meta:job_meta}, function(d){
      if(d.r == 0){
        alert("添加失败!可能有同名公司的存在!");
        return false;
      }else{
        window.location.reload();
      }
      return false;
    });
  });
  $(document).on(\'click\', \'#reset\', function(e){
    e.preventDefault();
    $(\'input#job_name\').attr(\'value\', \'\');
    $(\'input#job_meta\').attr(\'vaalue\', \'\');
  });
  $(\'tr[class!=meta_info]\').on(\'click\', function(e){
    if(e.target.localName!=\'a\'){
      $(this).next().toggle(500);
    }
  });
  $(\'.delete-job\').on(\'click\', function(e){
    e.preventDefault();
    var o = $(this);
    var tr = o.closest(\'tr\');
    $.post($(o).attr(\'href\'), function(d){
      if(d.r == 0){
        alert("已有学生申请该工作.确认删除请联系管理员!");
        return flase;
      }else{
        alert("删除成功!");
        $(tr).next().remove();
        $(tr).fadeOut(500, function(){ $(tr).remove(); });
      }
    });
    return false;
  });
});
  </script>
  <script type="text/template" id="new-job-item">
<div>
  <table>
    <tr><td class="m">公司名称:</td><td class="left"><%= company_name %></td></tr>
    <tr><td class="m">职位名称:</td><td class="left"><input type="text" id="job_name" name="job_name"/></td></tr>
    <tr><td class="m">职位信息:</td><td class="left"><textarea id="job_meta" name="job_meta" style="height:300px;"></textarea></td></tr>
    <tr><td>&nbsp;</td><td><button id="add" class="btn btn-primary">添加</button><button id="reset" class="btn">重置</button></td></tr>
  </table>
</div>
  </script>
  '; ?>

<?php else: ?>
  <?php echo '
  <script>
$(function(){
  //修改
  $(\'#submit\').on(\'click\', function(e){
    e.preventDefault();
    var job_id = $(\'#job_id\').attr(\'value\').trim();
    var job_name = $(\'#job_name\').attr(\'value\').trim();
    var job_meta = $(\'#job_meta\').attr(\'value\').trim();
    $.post(\'j/update_job.php\', {job_id:job_id, job_name:job_name, job_meta:job_meta},
        function (d){
      if(d.r == 0){
        alert("修改失败!");
        return false;
      }else{
        window.location = \'manage_job.php\';
      }
    });
  });
});
  </script>
  '; ?>

<?php endif; ?>
</body>
</html>