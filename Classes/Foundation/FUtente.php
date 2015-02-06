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
    
}

?>