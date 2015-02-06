<?php

Class View extends Smarty {

	public function __construct() {
        parent::__construct();
        //$this->Smarty();
        global $config;
        $this->template_dir = $config['smarty']['template_dir'];
        $this->compile_dir = $config['smarty']['compile_dir'];
        $this->config_dir = $config['smarty']['config_dir'];
        $this->cache_dir = $config['smarty']['cache_dir'];
        $this->caching = $config['smarty']['caching'];
        
    }

    public function get($key) {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
        else {
            return false;
        }
    }

    public function loadLoginForm(){
        $log=$this->fetch('login.tpl');
        $this->assign('loginBox',$log);
    }

    public function loadLogoutButton(){
        $log=$this->fetch('loggedIn.tpl');
        $this->assign('loginBox',$log);
        //$this->assign('username',$user);
    }

    public function showPage($doctor){
        if ($doctor==true){
            $this->assign('isDoctor',true);            
        }
    	$this->display('mainPage.tpl');     
    }
    
    //stiamo scherzando??? non si fa sicuramente così...
    /*
     * secondo me la strada giusta per farlo è creare un .tpl per i messaggi di errore ed uno per i messaggi di conferma
     * in modo da distinguerli. li dentro il contenuto del messaggio sarà una variabile smarty $messaggio che cambia a 
     * seconda del messaggio da visualizzare.
     * e sicuramente non possiamo farlo facendo scomparire il body in questa maniera... va un attimo pensato meglio,
     * per ora lascio così finche non ne parliamo
     */
    public function showInfoMessage($message,$addButton){
        $this->assign('message',$message);
        $this->assign('addButton',$addButton);
        $body=$this->fetch('infoMessage.tpl');
        return $body;
    }
    
    public function getErrorMessage($message,$addButton){
        $this->assign('message',$message);
        $this->assign('addButton',$addButton);
        $body=$this->fetch('errorMessage.tpl');
        return $body;
    }
    
    public function setBody($body){
        $this->assign('body',$body);
    }
    
    public function setHeader($header){
        $this->assign('header',$header);
    }
    /**
     * Makes an array wich contains body, header and footer passed as parameters
     * 
     * @param string $body
     * @param string $header
     * @param string $footer
     * @return array content ready to be used
     */
    public function makeContentArray($body=null,$header=null,$footer=null) {
        $return=null;
        if($body){
            if($header){
                
                $return["header"]=$header;
            }
            if($footer){
                $return["footer"]=$footer;
            }
            $return["body"]=$body;
        }
        return $return;
        
    }
    
}
