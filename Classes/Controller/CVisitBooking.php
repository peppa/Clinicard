<?php

class CVisitBooking extends FDatabase {
    
    public function getContent() {
        $VVisitBooking=  USingleton::getInstance("VVisitBooking");
        
        $content=$VVisitBooking->getContent();
        return $content;
    }
    
    public function saveEvent() {
        $VVisitBooking=  USingleton::getInstance("VVisitBooking");
        $FCalendar=  USingleton::getInstance("FCalendar");
        
        $CF=$VVisitBooking->get("CF");
        $dataInizio=$VVisitBooking->get("dataInizio");
        $eventID=$VVisitBooking->get("eventID");
        $eventObject=$VVisitBooking->get("eventObject");
        $titolo=$VVisitBooking->get("titolo");
        
        $result=$FCalendar->saveEvent($CF, $dataInizio, $eventID, $eventObject, $titolo);
        echo $result;
        exit();
    }
    
    
    
    
}

