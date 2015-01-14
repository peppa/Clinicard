<?php /* Smarty version Smarty-3.1.18, created on 2015-01-12 19:02:06
         compiled from "Smarty_dir\templates\body_modCheck.tpl" */ ?>
<?php /*%%SmartyHeaderCode:669954b40587c43596-11789063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85712811b168425eb49ec11f4e012444228c1229' => 
    array (
      0 => 'Smarty_dir\\templates\\body_modCheck.tpl',
      1 => 1421085717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '669954b40587c43596-11789063',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54b40587c84638_93717574',
  'variables' => 
  array (
    'name' => 0,
    'surname' => 0,
    'CF' => 0,
    'check' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b40587c84638_93717574')) {function content_54b40587c84638_93717574($_smarty_tpl) {?><br>
Paziente: <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['CF']->value;?>

<br>
<br>
		<form method="POST" action="index.php?control=manageDB&action=modCheck&mod=completed&p=<?php echo md5($_smarty_tpl->tpl_vars['CF']->value);?>
&ch=<?php echo md5($_smarty_tpl->tpl_vars['check']->value);?>
">
			<table>
				<tr>
                                    <td>Data visita:</td>
                                    <td> <input type="date" name="dateCheck" /> </td>
                                </tr>

				<tr>
					<td> Anamnesi: </td>
					<td> <textarea rows="5" cols="60" name="medHistory"></textarea>
				</tr>

				<tr>
					<td> Esame obiettivo: </td>
					<td> <textarea rows="5" cols="60" name="medExam"></textarea>
				</tr>

				<tr>
					<td> Conclusioni: </td>
					<td> <textarea rows="5" cols="60" name="conclusions"></textarea>
				</tr>

				<tr>
					<td> Prescrizione esami: </td>
					<td> <textarea rows="5" cols="60" name="toDoExams"></textarea>
				</tr>

				<tr>
					<td> Terapia: </td>
					<td> <textarea rows="5" cols="60" name="terapy"></textarea>
				</tr>

				<tr>
					<td> Controllo: </td>
					<td> <textarea rows="5" cols="60" name="checkup"></textarea>
				</tr>

				<tr>
                                    <td> <input type="submit" value="invia dati" /> </td>
                                    <td> <input type="reset" value = "reset" /> </td>
                                </tr>
                        </table>  
                </form><?php }} ?>
