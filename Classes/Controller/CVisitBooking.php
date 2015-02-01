<?php

class CVisitBooking {
    
    public function getContent() {
        $VVisitBooking=  USingleton::getInstance("VVisitBooking");
        
        $content=$VVisitBooking->getContent();
        return $content;
    }
    
    public function saveElement() {
        $VVisitBooking=  USingleton::getInstance("VVisitBooking");
        
        $CF=$VVisitBooking->get("CF");
        $dataInizio=$VVisitBooking->get("dataInizio");
        $eventID=$VVisitBooking->get("EventID");
        $eventObject=$VVisitBooking->get("eventObject");
        $titolo=$VVisitBooking->get("Titolo");
        
        
    }
    
    
    
    
}

