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
    public function saveEvent($CF,$dataInizio,$eventID,$titolo, $dataFine) {
       
        $query1="INSERT INTO `clinica`.`calendario` (`CodiceFiscalePrenotazione`, `start`, `id`, `title`, `end`)";
        $query2="VALUES ('$CF','$dataInizio','$eventID','$titolo', '$dataFine')";
        $query=$query1." ".$query2;
        $this->query($query);
        return $this->error;
    }
    
    /**
     * Returns all events between $start and $end. only medics should have the
     * rights to invoke it
     * 
     * @param type $start
     * @param type $end
     * @return type
     */
    public function getAllEvents($start, $end) {
        
        $query= "SELECT * FROM `calendario` WHERE DataInizio between $start and $end ";
       
        $result=  $this->associativeArrayQuery($query);
        return $result;
        
    }
    
}

?>