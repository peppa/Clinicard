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
    public function saveEvent($CF,$dataInizio,$eventID,$eventObject,$titolo) {
       
        $query1="INSERT INTO `clinica`.`calendario` (`CodiceFiscalePrenotazione`, `DataInizio`, `EventID`, `EventObject`, `Titolo`)";
        $query2="VALUES ('"."ssss"."','".'$dataInizio'."','".'$eventID'."','".'$eventObject'."','".'$titolo'.")";
        $query=$query1." ".$query2;
        return $this->query($query);
    }
}

?>