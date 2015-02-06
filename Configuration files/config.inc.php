<?php

global $config;


//I dati per l'accesso al Database
//Per Effettuare di nuovo la configurazione del database 
//sostituire il primo valore con 'user _ example' (senza spazi)
$config['mysql']['user'] = 'root';
$config['mysql']['password'] = 'pippo';
$config['mysql']['host'] = 'localhost';
$config['mysql']['database'] = 'clinica';


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
$config['debug']=false;


 

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
