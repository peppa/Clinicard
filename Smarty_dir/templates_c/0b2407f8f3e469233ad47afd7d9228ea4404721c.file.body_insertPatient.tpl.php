<?php /* Smarty version Smarty-3.1.18, created on 2015-01-09 12:10:05
         compiled from "Smarty_dir\templates\body_insertPatient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2806354afb70d10b2d9-94593830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b2407f8f3e469233ad47afd7d9228ea4404721c' => 
    array (
      0 => 'Smarty_dir\\templates\\body_insertPatient.tpl',
      1 => 1419176333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2806354afb70d10b2d9-94593830',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54afb70d13f753_85450560',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54afb70d13f753_85450560')) {function content_54afb70d13f753_85450560($_smarty_tpl) {?>
		<br>
		Inserisci i dati del paziente
		<br>
	    <br>
		<form method="POST" action="index.php?control=manageDB&action=insert&sent=y">
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
                    <input type="radio" name="gender" value="male"> M 
                    <input type="radio" name="gender" value="female"> F 
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
