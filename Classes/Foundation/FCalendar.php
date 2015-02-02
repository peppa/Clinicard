<?php

/*
 * File creato da Carlo Centofanti
 */

/**
 * Description of FCalendar
 *
 * @access public
 * @package FCalendar
 * @author Carlo
 */
class FCalendar extends FDatabase {
    public function saveEvent($CF,$dataInizio,$eventID,$eventObject,$tipoVisita) {
       
        $query1="INSERT INTO `clinica`.`calendario` (`CodiceFiscalePrenotazione`, `DataInizio`, `EventID`, `EventObject`, `TipoVisita`)";
        $query2="VALUES ('$CF','$dataInizio','$eventID','$eventObject','$tipoVisita')";
        $query=$query1." ".$query2;
        $this->query($query);
        return $this->error;
    }
    
    public function getAllEvents() {
        $query= "SELECT `EventObject`  FROM `calendario` WHERE `UniqueID`='8'";
        $res= $this->query($query);
        $result=$res->fetch_assoc();
        return $result["EventObject"];
        
    }
    
}

?>