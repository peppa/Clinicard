<?php

require_once './Configuration files/autoload.inc.php';
require_once './Configuration files/config.inc.php';

$UInstallation=  USingleton::getInstance('UInstallation');
if ($UInstallation->alreadyInstalled()){
    $CHome= USingleton::getInstance('CHome');
    $CHome->start();
}
else {
    $View=  USingleton::getInstance('View');
    if ($View->get("userConfig")!=NULL){
        $UInstallation->installNew();
    }
    else {
        $UInstallation->showForm();        
    }
}