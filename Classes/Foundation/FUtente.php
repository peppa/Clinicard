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
    
    public function usernameIsAvaiable($user) {
        $query="SELECT * FROM `utenti` WHERE `Username`='".$user."'";
        $result=$this->query($query);
        if (!$this->affected_rows){return TRUE;}
        else {return FALSE;}  
    }
    
    public function codiceFiscaleIsAvaiable($cf) {
        $query="SELECT * FROM `utenti` WHERE `Codice Fiscale`='".$cf."'";
        $result=$this->query($query);
        if (!$this->affected_rows){return TRUE;}
        else {return FALSE;}  
        
    }
    
}

?>