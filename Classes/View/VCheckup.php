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