<?php /* Smarty version Smarty-3.1.18, created on 2015-01-12 18:32:36
         compiled from "Smarty_dir\templates\body_patientDetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3140254afc2f24f9db2-17705084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45a202a5de8008d0f1560f83088bbec837aa0794' => 
    array (
      0 => 'Smarty_dir\\templates\\body_patientDetail.tpl',
      1 => 1421083949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3140254afc2f24f9db2-17705084',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54afc2f2576517_35274672',
  'variables' => 
  array (
    'info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54afc2f2576517_35274672')) {function content_54afc2f2576517_35274672($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
	<head>
		<title>Scheda paziente</title>
	</head>

	<body>
            
		<br>
		Scheda del paziente <?php echo $_smarty_tpl->tpl_vars['info']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['info']->value['surname'];?>

		<br>
                Data della visita: <?php echo $_smarty_tpl->tpl_vars['info']->value['dateCheck'];?>

		<br>
                <br>
                <br>

		<form method="POST">

			<div>

		Nome: <?php echo $_smarty_tpl->tpl_vars['info']->value['name'];?>

		<br>
		Cognome: <?php echo $_smarty_tpl->tpl_vars['info']->value['surname'];?>

		<br>
		Sesso: <?php echo $_smarty_tpl->tpl_vars['info']->value['gender'];?>

		<br>
		DataNascita: <?php echo $_smarty_tpl->tpl_vars['info']->value['dateBirth'];?>

		<br>
		Codice Fiscale: <?php echo $_smarty_tpl->tpl_vars['info']->value['CF'];?>

		<br>
		Data Visita: <?php echo $_smarty_tpl->tpl_vars['info']->value['dateCheck'];?>

		<br>
		Anamnesi: <?php echo $_smarty_tpl->tpl_vars['info']->value['medHistory'];?>

		<br>
		Esame Obiettivo: <?php echo $_smarty_tpl->tpl_vars['info']->value['medExam'];?>

		<br>
		Conclusione: <?php echo $_smarty_tpl->tpl_vars['info']->value['conclusions'];?>

		<br>
		Prescrizione Esami: <?php echo $_smarty_tpl->tpl_vars['info']->value['toDoExams'];?>

		<br>
		Terapia: <?php echo $_smarty_tpl->tpl_vars['info']->value['terapy'];?>

		<br>
		Controllo: <?php echo $_smarty_tpl->tpl_vars['info']->value['checkup'];?>


	</div>

	<br>
	<br>


		<button type="submit" formaction="index.php?control=manageDB&action=modCheck&p=<?php echo md5($_smarty_tpl->tpl_vars['info']->value['CF']);?>
&ch=<?php echo md5($_smarty_tpl->tpl_vars['info']->value['dateCheck']);?>
">modifica</button>
		<button type="submit" formaction="index.php?control=manageDB&action=printReport&pat=<?php echo md5($_smarty_tpl->tpl_vars['info']->value['CF']);?>
&ch=<?php echo md5($_smarty_tpl->tpl_vars['info']->value['dateCheck']);?>
">stampa report</button>
		<button type="submit" formaction="index.php?control=manageDB&action=delCheck&p=<?php echo md5($_smarty_tpl->tpl_vars['info']->value['CF']);?>
&ch=<?php echo md5($_smarty_tpl->tpl_vars['info']->value['dateCheck']);?>
">cancella</button>
	</form>
<?php }} ?>
