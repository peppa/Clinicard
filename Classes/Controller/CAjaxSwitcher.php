<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CAjaxSwitcher{
    
    public function __construct() {
        $VHome=  USingleton::getInstance('VHome');
        $task=$VHome->get('task');
        
        switch($task) {
            
            case 'preFillPat':
                $CPatientsDB=  USingleton::getInstance('CPatientsDB');
                $CPatientsDB->preFillPat();
                break;
            
            case 'preFillCheck':
                $CPatientsDB=  USingleton::getInstance('CPatientsDB');
                $CPatientsDB->preFillCheck();
                break;
            
            case 'checkUsername':
                $CRegistration=  USingleton::getInstance('CRegistration');
                $CRegistration->checkUsername();
                break;
            
            case "saveEvent":
                $CVisitBooking= USingleton::getInstance("CVisitBooking");
                $CVisitBooking->saveEvent();
        }
    }
    
    
}

