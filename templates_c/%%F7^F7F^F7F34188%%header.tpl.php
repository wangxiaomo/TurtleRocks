<?php /* Smarty version 2.6.27, created on 2012-11-05 10:57:27
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'header.tpl', 1, false),array('modifier', 'default', 'header.tpl', 3, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "main.conf"), $this);?>

<meta charset="utf-8" />
<title><?php echo ((is_array($_tmp=@$this->_tpl_vars['title'])) ? $this->_run_mod_handler('default', true, $_tmp, '山西经贸实习管理系统') : smarty_modifier_default($_tmp, '山西经贸实习管理系统')); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/css/bootstrap-responsive.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/js/libs/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/js/libs/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/js/libs/underscore-min.js"></script>
<script src="<?php echo $this->_config[0]['vars']['STATIC_DIR']; ?>
/js/common.js"></script>