<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

global $config;

//progettazione guidata dei dati.
//questo è un file di configurazione, qui dovrei trovare tutto!!! però per esempio
//qui non c'è il numero di pagine della paginazione!!! va inserito!!

$config['nomeClinica']='Clinica';

//SMARTY
$config['smarty']['template_dir'] = 'Smarty_dir/templates';
$config['smarty']['compile_dir'] = 'Smarty_dir/templates_c';
$config['smarty']['cache_dir'] = 'Smarty_dir/cache';
$config['smarty']['config_dir'] = 'Smarty_dir/configs';
$config['smarty']['caching']=FALSE;

//MYSQL:
//attivare per abilitare il debug del mysql
$config['debug']=TRUE;
/*
$config['mysql']['user'] = 'clinicard';
$config['mysql']['password'] = 'splashnabbo';
$config['mysql']['host'] = 'db4free.net';
$config['mysql']['database'] = 'clinicard';
*/
$config['mysql']['user'] = 'root';
$config['mysql']['password'] = 'pippo';
$config['mysql']['host'] = 'localhost';
$config['mysql']['database'] = 'clinica';
 

//
$config['cookie']['holdtime']=60*60*24*60;


//da settare email Webmaster
$config['email_webmaster']='';

/*
 * Debug prints a description followed by the variable passed as argument.
 * If there is no message in the argument, it will print only the variable content.
 */
function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

?>
