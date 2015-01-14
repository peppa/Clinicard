<?php

class VRegistration extends View {
    
    public function theUserIsLoggedYet() {
        return "Sei già loggato, effettua logout prima di registrare un nuovo utente";
        
    }
    
    //fare template per errore anche qui
    public function getErrorHTML($error) {
        return "ERRORE NEI DATI INSERITI: ".$error;
        
    }
    
    /**
     * Returns an associative array with the inserted data
     * 
     * @return array Inserted data
     */
    public function getFormValues(){
        return array(
            "name"=>$this->get('name'),
            "surname"=>$this->get('surname'),
            "cf"=>$this->get('CF'),
            "email"=>$this->get('email'),
            "username"=>$this->get('username'),
            "password"=>$this->get('password'),
        );
    }
    
    /**
     * The message in case of registration success
     * 
     * @return string
     */
    function regSuccess() {
        return "Registrazione avvenuta con successo"; //non va bene
    }
    
    //non deve fa la showPage
    public function loadRegistrationForm(){
        $body=$this->fetch('body_registration.tpl');
        return $body;
        //$this->showPage();
    }
}

