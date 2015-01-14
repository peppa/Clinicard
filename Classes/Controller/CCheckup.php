<?php

class CCheckup {
    
    public function getCheckupBody() {
        $VCheckup=  USingleton::getInstance("VCheckup");
        $body=$VCheckup->getBody();
        return $body;
    }
    
    
    
    
}

