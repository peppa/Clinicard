<?php

/*
 * File creato da Carlo Centofanti
 */

/**
 * Description of FRegistration
 *
 * @access public
 * @package FRegistration
 * @author Carlo
 */
class FRegistration extends FDatabase {
    
    public function insertUser($field1,$field2,$field3,$field4,$field5,$field6){
        $query1="INSERT INTO `clinica`.`utenti` (`Nome`, `Cognome`, `Codice Fiscale`, `Email`, `Username`, `Password`, `Medico`)";
        $query2="VALUES ('".$field1."','".$field2."','".$field3."','".$field4."','".$field5."','".$field6."','0')";
        $query=$query1." ".$query2;
        $this->query($query);

    }
}

?>