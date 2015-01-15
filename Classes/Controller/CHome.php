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
     * All pages are built here. It adds additional Head and Footer and the proper
     * body
     */
    public function buildPage() {
        $content=$this->controlSwitch();
        $VHome=USingleton::getInstance('VHome');
        if($content){
            foreach ($content as $key => $value) {
                switch ($key) {
                    case "body":
                        if($value){
                            $VHome->setBody($value);
                        }
                        else die("switch principale non ritorna un body.. fixare");
                        break;

                    case "header":
                        if($value){$VHome->setHeader($value);}
                        break;

                    case "footer":
                        if($value){$VHome->setFooter($value);}
                        break;
                }
            }
        }else{//means no content returned.. 
            $VHome->setBody($VHome->getHomeBody());
        }
        $this->addLoginBox();
    }
    
    /**
     * Calls VHome->showPage to display the page
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
            $VHome->loadLogoutButton();                
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
                return $CCheckup->getContent();
                

            case 'login':
                $CLogin=USingleton::getInstance('CLogin');
                $return=$CLogin->manageLogin();
                return FALSE; // vedere bene.. secondo me ritorna html di home
                

            case 'logout':
                $CLogin=USingleton::getInstance('CLogin');
                $CLogin->logout();
                return FALSE; //come sopra

            case 'manageDB':
                return array("body"  => $this->checkUser());

            case 'Services':
                return array("body"  => $VHome->getServicesBody());

            case 'Registration':
                $CRegistration=  USingleton::getInstance('CRegistration');
                return array("body"  => $CRegistration->newUser());

            case 'Contacts':
                return array("body"  => $VHome->getContactsBody());
        
            default:
                return array("body"  => $VHome->getHomeBody());
        }
    }




}