<?php /* Smarty version Smarty-3.1.18, created on 2015-01-13 18:52:59
         compiled from "Smarty_dir\templates\body_newVisit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2335854afb70510fb95-09268577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ee1611217f8435a8c6e8bacb01252d3fe4e0c70' => 
    array (
      0 => 'Smarty_dir\\templates\\body_newVisit.tpl',
      1 => 1421171572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2335854afb70510fb95-09268577',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54afb705148766_20238305',
  'variables' => 
  array (
    'name' => 0,
    'surname' => 0,
    'CF' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54afb705148766_20238305')) {function content_54afb705148766_20238305($_smarty_tpl) {?><br>
		Paziente: <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['CF']->value;?>

		<br>
	    <br>
		<form method="POST" action="index.php?control=manageDB&action=newVisit&sent=y&p=<?php echo md5($_smarty_tpl->tpl_vars['CF']->value);?>
">
			<table>
                                <tr>
					<td> Codice Fiscale: </td>
					<td> <input type="text" name="CF"/> </td>
				</tr>

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
