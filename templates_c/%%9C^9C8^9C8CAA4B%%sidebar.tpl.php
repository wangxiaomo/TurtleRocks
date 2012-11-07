<?php /* Smarty version 2.6.27, created on 2012-11-07 06:45:04
         compiled from sidebar.tpl */ ?>
<img src="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/images/headerphoto.jpg" width="820" height="120" alt="headerphoto" class="no-border" />
<div id="sidebar" >
  <h1>宗旨</h1>
  <p>&quot;为了更好的学生，为了更好的未来...当代教师之义不容辞!&quot;</p>
  <p class="align-right">- xxx 2012.04</p>
  <h1>功能导航</h1>
  <ul class="sidemenu">
    <li><a href="index.php">首页</a></li>
  <?php $_from = $this->_tpl_vars['navs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
    <li><a href="<?php echo $this->_tpl_vars['nav']['url']; ?>
"><?php echo $this->_tpl_vars['nav']['meta']; ?>
</a></li>
  <?php endforeach; endif; unset($_from); ?>
    <li><a href="logout.php">退出</a></li>
  </ul>
  <h1>友情链接</h1>
  <ul class="sidemenu">
    <li><a href="#">友情链接1</a></li>
    <li><a href="#">友情链接2</a></li>
    <li><a href="#">友情链接3</a></li>
    <li><a href="#">友情链接4</a></li>
    <li><a href="#">友情链接5</a></li>
  </ul>
  <div style="height:50px;">&nbsp;</div>
</div>