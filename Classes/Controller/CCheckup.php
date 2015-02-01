<?php

class CCheckup {
    
    public function getContent() {
        $VCheckup=  USingleton::getInstance("VCheckup");
        
        $content=$VCheckup->getContent();
        return $content;
    }
    
    public function saveElement() {
        $VCheckup=  USingleton::getInstance("VCheckup");
        
        $CF=$VCheckup->get("CF");
        $dataInizio=$VCheckup->get("dataInizio");
        $eventID=$VCheckup->get("EventID");
        $eventObject=$VCheckup->get("eventObject");
        $titolo=$VCheckup->get("Titolo");
        
        
    }
    
    
    
    
}

