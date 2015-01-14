<?php /* Smarty version Smarty-3.1.18, created on 2015-01-12 16:45:36
         compiled from "Smarty_dir\templates\body_modPatient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1947154b3e4304b9a19-64274816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '791835d4d91134e27dc51b0e061fe418787d5c6d' => 
    array (
      0 => 'Smarty_dir\\templates\\body_modPatient.tpl',
      1 => 1421077449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1947154b3e4304b9a19-64274816',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54b3e430507b41_37792904',
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b3e430507b41_37792904')) {function content_54b3e430507b41_37792904($_smarty_tpl) {?>
		<br>
		Modifica i dati del paziente
		<br>
	    <br>
		<form method="POST" action="index.php?control=manageDB&action=modPat&mod=completed&p=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">
			<table>

				<tr>
					<td> Nome: </td>
					<td> <input type="text" name="name"/> </td>
				</tr>

				<tr>
					<td> Cognome: </td>
					<td> <input type="text" name="surname"/> </td>
				</tr>

				<tr>
                <td>Sesso: </td> 
                  <td>
                    <input type="radio" name="gender"> M 
                    <input type="radio" name="gender"> F 
                  </td>
                </tr>

                <tr>
                	<td>Data di nascita:</td>
                	<td> <input type="date" name="dateBirth" /> </td>
                </tr>

                <tr>
                    <td> Codice Fiscale: </td>
                    <td> <input type="text" name="CF"/> </td>
		</tr>

		<tr>
                    <td> <input type="submit" value="invia dati" /> </td>
                    <td> <input type="reset" value = "reset" /> </td>
                </tr>
                
            </table>
        </form><?php }} ?>
