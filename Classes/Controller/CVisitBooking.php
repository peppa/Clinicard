<?php

class CVisitBooking extends FDatabase {
    
    public function getContent() {
        $VVisitBooking=  USingleton::getInstance("VVisitBooking");
        $CLogin=new CLogin();
        $VVisitBooking->setUserHeader();//must set to avoid smarty crash
        if($CLogin->isMedic()){//set medic prviledges
            $VVisitBooking->setMedicHeader();
            $content=$VVisitBooking->getContent();
        }elseif ($CLogin->checkLoggedIn()) {//get normal user view priviledges
            $content=$VVisitBooking->getContent();
        }else{
            $message="Per accedere a quest'area devi prima effettuare il Login";
            $content=  $VVisitBooking->getErrorMessage($message);
        }
        $content=$VVisitBooking->getContent();
        return $content;
    }
    
    /**
     * Allow an ajax call to store an event to the database
     */
    public function saveEvent() {
        $VVisitBooking=  USingleton::getInstance("VVisitBooking");
        $FCalendar=  USingleton::getInstance("FCalendar");
        
        $CF="cndhsjrht4512d45"; //va preso dal login
        $dataInizio=$VVisitBooking->get("dataInizio");
        $eventID=$VVisitBooking->get("eventID");
        $titolo=$VVisitBooking->get("titolo");
        $dataFine=$VVisitBooking->get("dataFine");
        
        
        
        $error=$FCalendar->saveEvent($CF, $dataInizio, $eventID, $titolo, $dataFine);
        echo $error;
        exit();
    }
    /**
     * Print a string containing the visible Events (Medics can see all,patients
     * can see only their related ebents). Ajax can read te output.
     */
    public function getMyEvents() {
        $FCalendar=  USingleton::getInstance("FCalendar");
        $VVisitBooking=  USingleton::getInstance("VVisitBooking");
        $CLogin=  USingleton::getInstance("CLogin");
        $CLogin=new CLogin();
        if($CLogin->isMedic()){
        
            $firstDate=$VVisitBooking->get("start");
            $lastDate=$VVisitBooking->get("end");

            $eventi=$FCalendar->getAllEvents($firstDate, $lastDate);

            echo json_encode($eventi);
            exit();
        }
    }
    
    
    
    
}

