<?php

class CHome {  

    /**
     * Initializes the site
     */
    public function __construct() {
        $this->buildPage();
        $this->showPage();
    }
    
    /**
     * All pages are built here
     */
    public function buildPage() {
        $body=$this->controlSwitch();
        $VHome=USingleton::getInstance('VHome');
        if($body){
            $VHome->setBody($body); 
        }else{
            $VHome->setBody($VHome->getHomeBody());
        }
        $this->addLoginBox();
    }
    
    /**
     * Calls the VHome class to show the page
     */
    public function showPage() {
        $VHome=  USingleton::getInstance('VHome');
        $VHome->showPage();
    }

    /**
     * Adds a login form or a logout button depending on the user's state
     */
    private function addLoginBox(){
        $CLogin=USingleton::getInstance('CLogin');
        $VHome=USingleton::getInstance('VHome');
        $USession=USingleton::getInstance('USession');

        if ($CLogin->checkLoggedIn()) {
            $username=$USession->get('username');
            debug('username: '.$username);
            $VHome->showUser($username);
            $VHome->loadLogoutButton($username);                
        }
        else {
            $VHome->loadLoginForm();
        }
    }

    //è da levà da qua.. non c'entra un cazzo qui XD
    public function checkUser(){//solo il medico ha accesso a questa sezione
        $CLogin=  USingleton::getInstance('CLogin');
        $USession=  USingleton::getInstance('USession');
        $FDatabase=  USingleton::getInstance('FDatabase');
        $VHome=  USingleton::getInstance('VHome');

        if ( $CLogin->checkLoggedIn() ){
            $result=$FDatabase->getDocUsername();
            $row=$result->fetch_assoc();
            $docUsername=$row['Username'];
            if ( $USession->get('username')==$docUsername){
                $CPatientsDB=USingleton::getInstance('CPatientsDB');
                return $CPatientsDB->getBody();
            }
            else {//utente loggato ma non medico 
                  //Conviene lasciare questa funzione anche se rendiamo il DB visibile solo al medico ?
                $this->addLoginBox();
                $message="Solo il medico pu&oacute accedere a questa sezione";
                return $VHome->showErrorMessage($message);
                //$VHome->showPage();
            }
        }
        else {//utente non loggato
            $this->addLoginBox();
            $message="Per accedere al DB &eacute necessario effettuare il login";
            return $VHome->showErrorMessage($message);
            //$VHome->showPage();
        }
    }

    /**
     *controlSwitch is the core function of the system. Its behavior
     *is established by the controller passed by the HTML's get method.
     * Returns False if body has not been calcolated
     * 
     * @return string HTML content, 0 if no HTML returned
     */
    public function controlSwitch() {
        $VHome=Usingleton::getInstance('VHome');

        $action=$VHome->get('control');
        switch ($action) {
            
            case 'Checkup':
                $CCheckup=  USingleton::getInstance('CCheckup');
                return $CCheckup->getCheckupBody();
                

            case 'login':
                $CLogin=USingleton::getInstance('CLogin');
                $return=$CLogin->manageLogin();
                return FALSE;
                

            case 'logout':
                $CLogin=USingleton::getInstance('CLogin');
                $CLogin->logout();
                return FALSE;

            case 'manageDB':
                return $this->checkUser();

            case 'Services':
                return $VHome->getServicesBody();

            case 'Registration':
                $CRegistration=  USingleton::getInstance('CRegistration');
                return $CRegistration->newUser();

            case 'Contacts':
                return $VHome->getContactsBody();
        
            default:
                return $VHome->getHomeBody();
        }
    }




}