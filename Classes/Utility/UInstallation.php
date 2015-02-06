<?php


class UInstallation {
    
    public function showForm(){
        $View=  USingleton::getInstance('View');
        $View->loadInstallPage();
    }
    
    public function installNew(){
        $View=  USingleton::getInstance('View');
        
        $user=$View->get('userConfig');
        $pass=$View->get('passConfig');
        $host=$View->get('hostConfig');
        $DB=$View->get('DBConfig');
        
        $stringFile=file_get_contents("./Configuration files/config.inc.php");
        
        $newFile = str_replace("user_example", $user, $stringFile);
        $newFile = str_replace("password_example", $pass, $newFile);
        $newFile = str_replace("host_example", $host, $newFile);
        $newFile = str_replace("database_example", $DB, $newFile);
        
        $file=fopen('.\Configuration files\config.inc.php', 'w');
        fwrite($file, $newFile);
        fclose($file);
        
        //$this->createDatabase();
        
        $FDatabase=new \mysqli($host,$user,$pass,$DB);
        $queries=  file_get_contents("./Configuration files/Database_script.sql");
        $FDatabase->multi_query($queries);
        
        $View->showConfigSuccess();
        
    }
    
    public function alreadyInstalled(){
        global $config;
        if ($config['mysql']['user']!="user_example"){
            $result=true;
        }
        else {
            $result=false;
        }
        return $result;
    }
    
    public function createDatabase(){
        $FDatabase=  USingleton::getInstance('FDatabase');
        
        $queries=  file_get_contents("./Configuration files/Database_script.sql");
        $FDatabase->multi_query($queries);
    }
    
    
    
    
    
}

