<?php

class CHome {  

    /**
     * All begins here
     */
    public function start() {
        $this->buildPage();
        $this->showPage();
    }
    
    /**
     * All pages are built here. It demands to add additional Head, Footer and body.
     * In case no content returned from controlSwitch, assigns the home content
     */
    public function buildPage() {
        $content=$this->controlSwitch();
        $VHome=USingleton::getInstance('VHome');
        //!content= need to show homepage
        if(!$content){$content=$VHome->getHomeContent();}
        
        $this->setPage($content);
        $this->addLoginBox();
        //$VHome->assign('loginBox',NULL); //lato client
    }
    
    /**
     * Sets the page applying the $content array passed as param
     * 
     * @param array[] $content
     */
    public function setPage($content) {
        $VHome=  USingleton::getInstance("VHome");
        foreach ($content as $key => $value) {
            if($value){
                switch ($key) {
                    case "body":
                        $VHome->setBody($value);
                        break;

                    case "header":
                        $VHome->setHeader($value);
                        break;

                    case "footer":
                        $VHome->setFooter($value);
                        break;
                }
            }
        }
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
            $VHome->setUsernameToShow($username);
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
            $docUsername=$FDatabase->getDocUsername();
            if ( $USession->get('username')==$docUsername){
                $CPatientsDB=USingleton::getInstance('CPatientsDB');
                return $CPatientsDB->getBody();
            }
            else {//utente loggato ma non medico 
                  //Conviene lasciare questa funzione anche se rendiamo il DB visibile solo al medico ? penso di si
                //$this->addLoginBox();
                $message="Solo il medico pu&oacute accedere a questa sezione";
                return $VHome->getErrorMessage($message);
                //$VHome->showPage();
            }
        }
        else {//utente non loggato
            //$this->addLoginBox();
            $message="Per accedere al DB &eacute necessario effettuare il login";
            return $VHome->getErrorMessage($message);
            //$VHome->showPage();
        }
    }

    /**
     *controlSwitch is the core function of the system. Its behavior
     *is established by the controller passed by the HTML's get method.
     *Returns False if body has not been calcolated
     * 
     * @return null|string[] HTML content, false if no HTML returned
     */
    public function controlSwitch() {
        $VHome=Usingleton::getInstance('VHome');

        $action=$VHome->get('control');
        switch ($action) {
            
            case 'VisitBooking':
                $CVisitBooking=  USingleton::getInstance('CVisitBooking');
                return $CVisitBooking->getContent();
                

            case 'login':
                $CLogin=USingleton::getInstance('CLogin');
                $result=$CLogin->manageLogin();
                if ( $result==false ){
                    $message="Username o password errati";
                    $body=$VHome->getErrorMessage($message);
                    return array("body"  => $body);
                }
                else {
                    return FALSE; // vedere bene.. secondo me ritorna html di home
                }
                
                

            case 'logout':
                $CLogin=USingleton::getInstance('CLogin');
                $CLogin->logout();
                return FALSE; //come sopra

            case 'manageDB':
                return array("body"  => $this->checkUser());

            case 'Services':
                return $VHome->getServicesContent();

            case 'Registration':
                $CRegistration=  USingleton::getInstance('CRegistration');
                return array("body"  => $CRegistration->newUser());

            case 'Contacts':
                return $VHome->getContactsContent();
                
            case 'ajaxCall':
                USingleton::getInstance('CAjaxSwitcher');
                break;
            
            default:
                return $VHome->getHomeContent();
        }
    }
    
    /*public function ajax_prova() {
        if (isset($_REQUEST['cf'])){
            $encCF=$_REQUEST['cf'];
            
            for ($i=0;$i<count(EPatient::$istances);$i++){
                if(EPatient::$istances[$i]->getEncCF()==$encCF){
                    //$nome=EPatient::$istances[$i]->getName(); //devo ancora capire come passare gli array
                    $data=array("name"=>EPatient::$istances[$i]->getName(),
                                "surname"=>EPatient::$istances[$i]->getSurname(),
                                "gender"=>EPatient::$istances[$i]->getSex(),
                                "dateB"=>EPatient::$istances[$i]->getDataN(),
                                "CF"=>EPatient::$istances[$i]->getCF());
                }
            }
            echo json_encode($data);
            exit; //se non faccio exit mi stampa tutto il codice html della pagina dentro alla form
        }
        else {
            debug("lol");
        }
    }*/
    
    private function fillArrays(){ // l'ho messo qua invece che a cpatients perchè altrimenti con la chiamata ajax
                                   // non vede le Entity
            $FPatient=  USingleton::getInstance('FPatient');
            $FCheckup=  USingleton::getInstance('FCheckup');
            
            //$this->Pazienti=$FPatient->fillPatientsArray($this->Pazienti);
            
            $FPatient->fillPatientsArray(); //creare tutte le entity in CHome ? altrimenti vengono create solamente quando si accede
                                            //alla sezione DB
                
            for ( $i=0; $i<count(EPatient::$istances); $i++){
                //$this->Visite=$FCheckup->fillCheckupsArray($this->Visite,$this->Pazienti[$i]->getCf() );
                $FCheckup->fillCheckupsArray(EPatient::$istances[$i]->getCF());
            }
        }




}