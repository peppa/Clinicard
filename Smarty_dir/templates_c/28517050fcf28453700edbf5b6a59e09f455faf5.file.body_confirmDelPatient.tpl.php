<?php /* Smarty version Smarty-3.1.18, created on 2015-01-11 21:21:28
         compiled from "Smarty_dir\templates\body_confirmDelPatient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3068754b2db48768225-14822782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28517050fcf28453700edbf5b6a59e09f455faf5' => 
    array (
      0 => 'Smarty_dir\\templates\\body_confirmDelPatient.tpl',
      1 => 1421007236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3068754b2db48768225-14822782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54b2db487987c5_99487026',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b2db487987c5_99487026')) {function content_54b2db487987c5_99487026($_smarty_tpl) {?><br>
Confermi di voler cancellare il paziente selezionato ?
<br>
Verrano eliminate anche tutte le sue visite
<br>
Non sar&aacute possibile recuperare i dati in futuro
<br>
<br>
<br>

<form method="POST">
    <button type="submit" formaction="index.php?control=manageDB&action=delPat&conf=yes&p=<?php echo $_smarty_tpl->tpl_vars['cf']->value;?>
">conferma</button>
    <button type="submit" formaction="index.php?control=manageDB">annulla</button>
</form><?php }} ?>
