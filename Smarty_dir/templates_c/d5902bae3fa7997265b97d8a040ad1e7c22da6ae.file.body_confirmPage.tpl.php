<?php /* Smarty version Smarty-3.1.18, created on 2015-01-11 18:36:16
         compiled from "Smarty_dir\templates\body_confirmPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1548554b2aaf3561cb9-40334776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5902bae3fa7997265b97d8a040ad1e7c22da6ae' => 
    array (
      0 => 'Smarty_dir\\templates\\body_confirmPage.tpl',
      1 => 1420997308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1548554b2aaf3561cb9-40334776',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54b2aaf3593526_49991019',
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b2aaf3593526_49991019')) {function content_54b2aaf3593526_49991019($_smarty_tpl) {?><br>
Confermi di voler cancellare il paziente selezionato ?
<br>
Verrano eliminate anche tutte le sue visite
<br>
Non sar&aacute possibile recuperare i dati in futuro
<br>
<br>
<br>

<form method="POST">
    <button type="submit" formaction="index.php?control=manageDB&action=delPat&conf=yes&p=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">conferma</button>
    <button type="submit" formaction="index.php?control=manageDB">annulla</button>
</form><?php }} ?>
