<?php /* Smarty version Smarty-3.1.18, created on 2015-01-09 11:42:51
         compiled from "Smarty_dir\templates\loggedIn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1203554afb0ab013794-07463736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43d3ec3d490bce2e173697df9d367dc40f6b712c' => 
    array (
      0 => 'Smarty_dir\\templates\\loggedIn.tpl',
      1 => 1419176333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1203554afb0ab013794-07463736',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54afb0ab01d641_59437152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54afb0ab01d641_59437152')) {function content_54afb0ab01d641_59437152($_smarty_tpl) {?><div>
	<form method="POST" action="index.php?control=logout">
		<p>Ciao <?php echo ucfirst($_smarty_tpl->tpl_vars['username']->value);?>
</p> <!-- ucfirst capitalizes first letter -->
		<input type="submit" value="Esci">
	</form>
</div><?php }} ?>
