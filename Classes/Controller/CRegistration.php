<?php

class CRegistration {
    private $bodyHTML;
    private $error;


    public function newUser(){
            $VRegistration=USingleton::getInstance('VRegistration');
            $USession=USingleton::getInstance('USession');
            $VRegistration= USingleton::getInstance('VRegistration');
            $this->bodyHTML=$VRegistration->loadRegistrationForm();
            
            if ( $USession->get('username') ) {
                $this->bodyHTML=$VRegistration->theUserIsLoggedYet();             
            }
            else {
                $action=$VRegistration->get('action');
                if ($action=="addUser") {
                    $this->addNewUser();
               }else {
                        $this->loadRegForm();
                }
            }
            return$this->bodyHTML;
                
        }
        
    public function loadRegForm(){
        $VRegistration=  USingleton::getInstance('VRegistration');
        $this->bodyHTML=$VRegistration->loadRegistrationForm();
    }

    public function addNewUser(){
        $VRegistration=  USingleton::getInstance('VRegistration');
        $FDatabase=  USingleton::getInstance('FDatabase');

        //getting data..
        $data=$VRegistration->getFormValues();

        //checking data consistency..
        foreach ($data as $key => $value) {
            //ogni caso assegna l'errore
            switch ($key) {
                case "name":
                    $name=ucfirst($value);
                    break;
                case "surname":
                    $surname=ucfirst($value);
                    break;
                case "cf":
                    $cf=$value;
                    if(!$this->checkCF($cf)){
                        $this->dataError("Codice Fiscale");
                    }
                    break;
                case "email":
                    $mail=$value;
                    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                        $this->dataError("Email");
                    }
                    break;
                case"username":
                    $FUtente=USingleton::getInstance("FUtente");
                    
                    $user=$value;
                    if(!$FUtente->usernameIsAvaiable($user)){
                        $this->dataError("Username");
                    }
                    break;
                case "password":
                    $pass=$value;
                    if(!$this->validatePassword($pass)){
                        $this->dataError("Password");
                    }
                    
                    break;
                default :
                    debug("L'Array ha restituito dei dati inattesi nome: ".$key." valore:".$value);

                    break;
            }
        }
        if($this->error){
            $this->bodyHTML=$VRegistration->getErrorHTML($this->error);
        }else{
            //saving data..
            $FDatabase->insertUser($name,$surname,$cf,$mail,$user,$pass);

            //$VRegistration->showMessage($message);
            $this->bodyHTML=$VRegistration->regSuccess();
            
        }

    }	
    
    public function validatePassword($password) {
        if (strlen($password)<5){
            return FALSE;
        }
        return true;
    }
    
    //invece di fare in questa maniera barbara, si può fa na funzione error
    //globale oppure in view e falo fare a lei così lo formatta in html
    public function dataError($error) {
        $this->error=($this->error." ".$error." NON VALIDA. ");
        debug($error." non valido!!");
        
    }
    
    /**
     * Validate the string format and after that it checks if there is yet an
     * user registered with the same CF. The archive is checked lastly to reduce
     * load on serverside. If the string is ok returns TRUE, if it's not
     * returns FALSE
     * 
     * @param string $cf
     * @return boolean TRUE means valid CF string. FALSE if it's not a valid CF.
     */
    public function checkCF($cf){
     if($cf=='')
	return false;

     if(strlen($cf)!= 16)
	return false;

     $cf=strtoupper($cf);
     if(!preg_match("/[A-Z0-9]+$/", $cf))
	return false;
     $s = 0;
     for($i=1; $i<=13; $i+=2){
	$c=$cf[$i];
	if('0'<=$c and $c<='9')
	     $s+=ord($c)-ord('0');
	else
	     $s+=ord($c)-ord('A');
     }

     for($i=0; $i<=14; $i+=2){
	$c=$cf[$i];
	switch($c){
             case '0':  $s += 1;  break;
	     case '1':  $s += 0;  break;
             case '2':  $s += 5;  break;
	     case '3':  $s += 7;  break;
	     case '4':  $s += 9;  break;
	     case '5':  $s += 13;  break;
	     case '6':  $s += 15;  break;
	     case '7':  $s += 17;  break;
	     case '8':  $s += 19;  break;
	     case '9':  $s += 21;  break;
	     case 'A':  $s += 1;  break;
	     case 'B':  $s += 0;  break;
	     case 'C':  $s += 5;  break;
	     case 'D':  $s += 7;  break;
	     case 'E':  $s += 9;  break;
	     case 'F':  $s += 13;  break;
	     case 'G':  $s += 15;  break;
	     case 'H':  $s += 17;  break;
	     case 'I':  $s += 19;  break;
	     case 'J':  $s += 21;  break;
	     case 'K':  $s += 2;  break;
	     case 'L':  $s += 4;  break;
	     case 'M':  $s += 18;  break;
	     case 'N':  $s += 20;  break;
	     case 'O':  $s += 11;  break;
	     case 'P':  $s += 3;  break;
             case 'Q':  $s += 6;  break;
	     case 'R':  $s += 8;  break;
	     case 'S':  $s += 12;  break;
	     case 'T':  $s += 14;  break;
	     case 'U':  $s += 16;  break;
	     case 'V':  $s += 10;  break;
	     case 'W':  $s += 22;  break;
	     case 'X':  $s += 25;  break;
	     case 'Y':  $s += 24;  break;
	     case 'Z':  $s += 23;  break;
	}
    }

    if( chr($s%26+ord('A'))!=$cf[15] )
	return false;
    //check if the CF is yet in the data archive
    $FUtente=  USingleton::getInstance("FUtente");
    if(!$FUtente->codiceFiscaleIsAvaiable($cf)){
        return false;
    }

    return true;
}
        
        
}