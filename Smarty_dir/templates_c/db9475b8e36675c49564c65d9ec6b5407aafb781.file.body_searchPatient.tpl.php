<?php /* Smarty version Smarty-3.1.18, created on 2015-01-11 18:29:32
         compiled from "Smarty_dir\templates\body_searchPatient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:747054b2b2fcda07d5-23684853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db9475b8e36675c49564c65d9ec6b5407aafb781' => 
    array (
      0 => 'Smarty_dir\\templates\\body_searchPatient.tpl',
      1 => 1417793115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '747054b2b2fcda07d5-23684853',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54b2b2fcdc8046_03177855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b2b2fcdc8046_03177855')) {function content_54b2b2fcdc8046_03177855($_smarty_tpl) {?><br>
		Inserisci nome, cognome o codice fiscale del paziente
		<br>

		<form method="POST" action="index.php?control=manageDB&action=search">
			<table>
				<tr>
					<td> <input type="text" name="keyValue"> </td>
					<td> <input type="submit" value="cerca"> 
                    <td> <input type="reset" value = "reset"> </td>
                </tr>
            </table>
        </form><?php }} ?>
