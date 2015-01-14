<?php /* Smarty version Smarty-3.1.18, created on 2015-01-12 15:42:57
         compiled from "Smarty_dir\templates\body_modifyPatient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2870054b3dd712416a8-00518649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9efa7fa7c25ea3ee5ddeba7d4701bcf00319141' => 
    array (
      0 => 'Smarty_dir\\templates\\body_modifyPatient.tpl',
      1 => 1418721159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2870054b3dd712416a8-00518649',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'name' => 0,
    'surname' => 0,
    'checkedM' => 0,
    'checkedF' => 0,
    'cf' => 0,
    'medHistory' => 0,
    'medExam' => 0,
    'conclusions' => 0,
    'toDoExams' => 0,
    'terapy' => 0,
    'checkup' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54b3dd71284a40_36605316',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b3dd71284a40_36605316')) {function content_54b3dd71284a40_36605316($_smarty_tpl) {?>
		<br>
		Modifica i dati del paziente
		<br>
	    <br>
		<form method="POST" action="index.php?control=manageDB&action=modify&mod=completed&pat=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">
			<table>

				<tr>
					<td> Nome: </td>
					<td> <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"/> </td>
				</tr>

				<tr>
					<td> Cognome: </td>
					<td> <input type="text" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
"/> </td>
				</tr>

				<tr>
                <td>Sesso: </td> 
                  <td>
                    <input type="radio" name="gender" value="male" <?php echo $_smarty_tpl->tpl_vars['checkedM']->value;?>
> M 
                    <input type="radio" name="gender" value="female" <?php echo $_smarty_tpl->tpl_vars['checkedF']->value;?>
> F 
                  </td>
                </tr>

                <tr>
                	<td>Data di nascita:</td>
                	<td> <input type="date" name="dateBirth" /> </td>
                </tr>

                <tr>
					<td> Codice Fiscale: </td>
					<td> <input type="text" name="CF" value="<?php echo $_smarty_tpl->tpl_vars['cf']->value;?>
"/> </td>
				</tr>

				<tr>
                	<td>Data visita:</td>
                	<td> <input type="date" name="dateCheck"/> </td>
                </tr>

				<tr>
					<td> Anamnesi: </td>
					<td> <textarea rows="5" cols="60" name="medHistory"><?php echo $_smarty_tpl->tpl_vars['medHistory']->value;?>
</textarea>
				</tr>

				<tr>
					<td> Esame obiettivo: </td>
					<td> <textarea rows="5" cols="60" name="medExam"><?php echo $_smarty_tpl->tpl_vars['medExam']->value;?>
</textarea>
				</tr>

				<tr>
					<td> Conclusioni: </td>
					<td> <textarea rows="5" cols="60" name="conclusions"><?php echo $_smarty_tpl->tpl_vars['conclusions']->value;?>
</textarea>
				</tr>

				<tr>
					<td> Prescrizione esami: </td>
					<td> <textarea rows="5" cols="60" name="toDoExams" ><?php echo $_smarty_tpl->tpl_vars['toDoExams']->value;?>
</textarea>
				</tr>

				<tr>
					<td> Terapia: </td>
					<td> <textarea rows="5" cols="60" name="terapy" ><?php echo $_smarty_tpl->tpl_vars['terapy']->value;?>
</textarea>
				</tr>

				<tr>
					<td> Controllo: </td>
					<td> <textarea rows="5" cols="60" name="checkup"><?php echo $_smarty_tpl->tpl_vars['checkup']->value;?>
</textarea>
				</tr>

				<tr>
					<td> <input type="submit" value="invia dati" /> </td>
                    <td> <input type="reset" value = "reset" /> </td>
                </tr>
            </table>
        </form><?php }} ?>
