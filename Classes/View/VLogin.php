<?php

class VLogin extends View {

    //cosi non va bene, il messaggio deve esse html..
	public function welcomePage(){ 
            $message="login effettuato con successo";
            return $message;
	}
        
    //idem a sopra
	public function errorPage(){
            $error="user o pass non corretti";
            return $error;
            //QUA UGUALE A SOPRA.. PORCO DIO
	}

}