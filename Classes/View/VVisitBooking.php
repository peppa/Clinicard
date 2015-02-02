<?php

/*
 * File creato da Carlo Centofanti
 */

/**
 * Description of VVisitBooking
 *
 * @access public
 * @package VVisitBooking
 * @author Carlo
 */
class VVisitBooking extends View {
    public function getBody(){
        $body= $this->fetch("body_checkup.tpl");
        return $body;
    }
    
    public function getHeader() {
        $header= $this->fetch("./headers/header_checkup.tpl");
        return $header;
        
    }
    
    public function getContent() {
        $body=  $this->getBody();
        $header=  $this->getHeader();
        $content=  $this->makeContentArray($body,$header);
        return $content;
        
    }
}

?>