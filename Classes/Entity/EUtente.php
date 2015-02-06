<?php

/*
 * File creato da Carlo Centofanti
 */

/**
 * Description of EUtente
 *
 * @access public
 * @package EUtente
 * @author Carlo
 */
class EUtente {
    private $nome;
    private $cognome;
    private $cf;
    private $email;
    private $username;
    private $password;
    private $isMedic;
    private $encCF;
    
    /**
     * construct the Utente with the cf or passing all arguments
     * 
     * @param string $cf Codice Fiscale
     * @param string $n (not necessary)
     * @param string $c (not necessary)
     * @param string $email (not necessary)
     * @param string $uname (not necessary)
     * @param string $pwd   (not necessary)
     * @param string $medic (not necessary)
     */
    public function __construct($cf,$n=false,$c=false,$email=false,$uname=false,$encPassword=false,$medic=false){
        $this->cf=$cf;
        $this->encCF=md5($cf);

        if($n&&$c&&$email&&$uname&&$pwd&&$medic){
            $this->nome=$n;
            $this->cognome=$c;
            $this->email=$email;
            $this->username=$uname;
            $this->password=$pwd;
            $this->isMedic=$medic;
        }else{
            $FUtente=  USingleton::getInstance("FUtente");
            $data=$FUtente->getAllUtenteData($cf);
            
            $this->nome=$data["Nome"];
            $this->cognome=$data["Cognome"];
            $this->email=$data["Email"];
            $this->username=$data["Username"];
            $this->password=  md5($data["Password"]);
            $this->isMedic=$data["Medico"];
            
        }
    }
    
    
    
    
    //getter and setter
    public function getName(){
        return $this->nome;
    }
    
    public function getSurname(){
        return $this->cognome;
    }
    
    public function getCF(){
        return $this->cf;
    }
    public function getEmail(){
        return $this->email;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getEncPassword(){
        return $this->password;
    }
    
    public function isMedic(){
        return $this->isMedic;
    }
    
    
    public function setName($new){
        $this->nome=$new;
    }
    
    public function setSurname($new){
        $this->cognome=$new;
    }
    
    public function setCF($new){
        $this->cf=$new;
    }
    public function setEmail($new){
        $this->email=$new;
    }
    
    public function setUsername($new){
        $this->username=$new;
    }
    
    public function setEncPassword($new){
        $this->password=$new;
    }
    
    public function setIsMedic($new){
        $this->isMedic=$new;
    }
    
    
    
    
}

?>