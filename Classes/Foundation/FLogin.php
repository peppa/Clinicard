<?php

/*
 * File creato da Carlo Centofanti
 */

/**
 * Description of FLogin
 *
 * @access public
 * @package FLogin
 * @author Carlo
 */
class FLogin extends FDatabase {
    
    public function checkUser($user,$pass){
        $query="SELECT * FROM `utenti` WHERE `Username`='".$user."'";// and `Password`='".$pass."'";
        $res=$this->query($query);

        $result=$res->fetch_assoc();
        if ($result==NULL) {return false;}
        else {
            if ($pass==$result['Password']) {return true;}
            else {return false;}
        }

    }
}

?>