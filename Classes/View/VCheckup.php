<?php

/*
 * File creato da Carlo Centofanti
 */

/**
 * Description of VCheckup
 *
 * @access public
 * @package VCheckup
 * @author Carlo
 */
class VCheckup extends View {
    public function getBody(){
        $body= $this->fetch("googleCalendar.tpl");
        return $body;
    }
    
    public function getHeader() {
        $header= $this->fetch("./headers/header_checkup.tpl");
        return $header;
        
    }
    
    public function getContent() {
        $content=  $this->makeContentArray($this->getBody(),$this->getHeader());
        return $content;
        
    }
}

?>