<?php

class CVisitBooking extends FDatabase {
    
    public function getContent() {
        $VVisitBooking=  USingleton::getInstance("VVisitBooking");
        
        $content=$VVisitBooking->getContent();
        return $content;
    }
    
    /**
     * Allow an ajax call to store an event to the database
     */
    public function saveEvent() {
        $VVisitBooking=  USingleton::getInstance("VVisitBooking");
        $FCalendar=  USingleton::getInstance("FCalendar");
        
        $CF=$VVisitBooking->get("CF");
        $dataInizio=$VVisitBooking->get("dataInizio");
        $eventID=$VVisitBooking->get("eventID");
        $eventObject=$VVisitBooking->get("eventObject");
        $titolo=$VVisitBooking->get("tipoVisita");
        
        $error=$FCalendar->saveEvent($CF, $dataInizio, $eventID, $eventObject, $titolo);
        echo $error;
        exit();
    }
    /**
     * Print a string containing the visible Events (Medics can see all,patients
     * can see only their related ebents). Ajax can read te output.
     */
    public function getMyEvents() {
        $FCalendar=  USingleton::getInstance("FCalendar");
        $evento=$FCalendar->getAllEvents();
        
        echo $evento;
        exit();
    }
    
    
    
    
}

