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
}

?>