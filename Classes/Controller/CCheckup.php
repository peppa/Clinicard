<?php

class CCheckup {
    
    public function getContent() {
        $VCheckup=  USingleton::getInstance("VCheckup");
        
        $content=$VCheckup->getContent();
        return $content;
    }
    
    
    
    
}

