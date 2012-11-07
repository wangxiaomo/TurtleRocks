<?php /* Smarty version 2.6.27, created on 2012-11-07 06:45:04
         compiled from top_nav.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'top_nav.tpl', 1, false),array('modifier', 'default', 'top_nav.tpl', 11, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "main.conf"), $this);?>

<div id="header">
  <h1 id="logo">山西省<span class="green">经贸</span>学校</h1>
  <h2 id="slogan">为了更好的学生，为了更好的未来...</h2>
  <form method="post" class="searchform">
    <p>
      <input type="text" name="search_query" class="textbox" />
      <input type="submit" name="search" class="button" value="Search" />
    </p>
  </form>
  <span class="right">欢迎回来，<?php echo ((is_array($_tmp=@$_COOKIE['consumer'])) ? $this->_run_mod_handler('default', true, $_tmp, 'user') : smarty_modifier_default($_tmp, 'user')); ?>
 <a href="logout.php">Logout</a></span>
</div>