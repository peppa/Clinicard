<?php /* Smarty version Smarty-3.1.18, created on 2015-01-09 12:56:20
         compiled from "Smarty_dir\templates\body_registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2020454afc1e4c2cff3-32459926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36d71ef5e28c2339ccf885117b1ed008e9b0bb94' => 
    array (
      0 => 'Smarty_dir\\templates\\body_registration.tpl',
      1 => 1419176333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2020454afc1e4c2cff3-32459926',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54afc1e4c5f2a4_57314826',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54afc1e4c5f2a4_57314826')) {function content_54afc1e4c5f2a4_57314826($_smarty_tpl) {?><br>
	<p>Compila la form per registrarti</p>
	<br>

	<form method="POST" action="index.php?control=Registration&action=addUser">
		<div>
			<div>
				<div>
			    	<label>Nome</label>
			    	<input type="text" name="name" placeholder="Nome">
			  	</div>
			</div>
		</div>

		<div>
	  		<div>
			  	<div>
			    	<label>Cognome</label>
			    	<input type="text" name="surname" placeholder="Cognome">
			  	</div>
			</div>
		</div>

		<div>
			<div>
				<div>
			    	<label>Codice Fiscale</label>
			    	<input type="text" name="CF" placeholder="Codice Fiscale">
			  	</div>
			</div>
		</div>
		

		<div>
	  		<div>
				<div>
			    	<label>Indirizzo Email</label>
			    	<input type="email" name="email" placeholder="Inserici email">
			  	</div>
			</div>
		</div>


		<div>
	  		<div>
				<div>
			    	<label>Username</label>
			    	<input type="text" name="username" placeholder="Username">
			  	</div>
			</div>
		</div>

		<div>
	  		<div>
			  	<div>
			   		<label>Password</label>
			   		<input type="password" name="password" placeholder="Password">
			  	</div>
			</div>
		</div>

	  	<input type="submit" value="Registrati">

	</form><?php }} ?>
