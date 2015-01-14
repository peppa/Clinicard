<?php /* Smarty version Smarty-3.1.18, created on 2015-01-09 13:01:57
         compiled from "Smarty_dir\templates\body_reportFields.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2350554afc3350a03e2-30743108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c332c328b38af5fe1dece324baf9fc693f58cd1' => 
    array (
      0 => 'Smarty_dir\\templates\\body_reportFields.tpl',
      1 => 1420799833,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2350554afc3350a03e2-30743108',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'patLink' => 0,
    'checkLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54afc3350deda8_12794434',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54afc3350deda8_12794434')) {function content_54afc3350deda8_12794434($_smarty_tpl) {?>
		<br>
		Scegli i campi da stampare
		<br>
	    <br>

	    <form method="POST" action="index.php?control=manageDB&action=printReport&fields=sent&pat=<?php echo $_smarty_tpl->tpl_vars['patLink']->value;?>
&ch=<?php echo $_smarty_tpl->tpl_vars['checkLink']->value;?>
">
	    	<!-- Nome e Cognome, CF e Data di nascita vengono mostrati sempre -->

	    	<input type="checkbox" name="allFields"/>Tutti
	    	<br>
	    	<input type="checkbox" name="dateCheck"/> Data visita
	    	<br>
	    	<input type="checkbox" name="medHistory"/> Anamnesi
	    	<br>
	    	<input type="checkbox" name="medExam"/> Esame obiettivo
	    	<br>
	    	<input type="checkbox" name="conclusions"/> conclusioni
	    	<br>
	    	<input type="checkbox" name="toDoExams"/> prescrizione esami
	    	<br>
	    	<input type="checkbox" name="terapy"/> terapia
	    	<br>
	    	<input type="checkbox" name="checkup"/> controllo
	    	<br>

	    	<input type="submit" value="stampa">
	    </form><?php }} ?>
