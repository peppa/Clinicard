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
        $error=false;
        $dataFine=new DateTime($dataFine);
        $dataFine=$dataFine->modify("-1 seconds");
        $dataFine=$dataFine->format("Y-m-d\TH:i:s");

        
        //check if it was possible to add new event
        $queryCheckAvaiableSlot="SELECT * FROM `calendario` WHERE `start` between '$dataInizio' and '$dataFine' OR `end` between '$dataInizio' and '$dataFine' OR '$dataInizio' between `start` and `end`";
        $this->query($queryCheckAvaiableSlot);
        
        
        //if the affected rows are more than 0 (TRUE), there is another event yet
        if($this->affected_rows){
            $error="Purtroppo un altro utente si è prenotato nell'ora selezionata. Si prega di scegliere un orario diverso";
        }
        else{
            //insert Event data to the db
            $query1="INSERT INTO `calendario` (`CodiceFiscalePrenotazione`, `start`, `id`, `title`, `end`)";
            $query2="VALUES ('$CF','$dataInizio','$eventID','$titolo', '$dataFine')";
            $insertEvent=$query1." ".$query2;
            $this->query($insertEvent);
            if ($this->error && ! $error){$error="Si è verificato un errore, si prega di riprovare: ".$this->error;}
        }
        
        //now i need to check if noone entered another visit at the same time
        $this->query($queryCheckAvaiableSlot);
        if(!$this->affected_rows==1){//deny save and restore db
            $queryDelete="DELETE FROM `calendario` WHERE `id` = $eventID";
            $this->query($queryDelete);
            $error="Siamo spiacenti ma la data selezionata non è più disponibile, provare a selezionarne un altra";
            
        }
        
     
        return $error;
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
        
        $query= "SELECT * FROM `calendario` WHERE `start` between '$start' and '$end' ";
       
        $result=  $this->QueryAssociativeArray($query);
        return $result;
        
    }
    
}

?>