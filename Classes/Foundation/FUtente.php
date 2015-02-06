<?php

/*
 * File creato da Carlo Centofanti
 */

/**
 * Description of FUtente
 *
 * @access public
 * @package FUtente
 * @author Carlo
 */
class FUtente extends FDatabase {
    
    public function usernameIsAvailable($user) {
        $query="SELECT * FROM `utenti` WHERE `Username`='".$user."'";
        $result=$this->query($query);
        if (!$this->affected_rows){return TRUE;}
        else {return FALSE;}  
    }
    
    public function codiceFiscaleIsAvailable($cf) {
        $query="SELECT * FROM `utenti` WHERE `Codice Fiscale`='".$cf."'";
        $result=$this->query($query);
        if (!$this->affected_rows){return TRUE;}
        else {return FALSE;}        
    }
    
    public function emailIsAvailable($email){
        $query="SELECT * FROM `utenti` WHERE `Email`='".$email."'";
        $result=$this->query($query);
        if (!$this->affected_rows){return TRUE;}
        else {return FALSE;} 
    }
    public function isMedic($username) {
        $query="SELECT `Medico` FROM `utenti` WHERE `Username`='$username'";
        $res=$this->query($query);
        $res=$res->fetch_assoc();
        
        return $res['Medico'];
       
    }
    
    public function getAllUtenteDataFromCF($cf){
        $query="SELECT * FROM `utenti` WHERE `Codice Fiscale`='$cf'";
        $res=$this->QueryassociativeArray($query);
    }
    
    public function getAllUtenteDataFromUsername($uname){
        $query="SELECT * FROM `utenti` WHERE `Username`='$uname'";
        $res=$this->query($query);
        
        return ($res->fetch_assoc());
        
    }
    
}

?>
