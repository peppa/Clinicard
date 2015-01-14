<?php
class CLogin{

	public function manageLogin(){
		$VLogin=USingleton::getInstance('VLogin');
		$USession=USingleton::getInstance('USession');
		$FDatabase=USingleton::getInstance('FDatabase');

		$user=$VLogin->get('username');
		$pass=$VLogin->get('password');
                $keep=$VLogin->get('keepLogged');
		if($keep=="yes") {$remember=true;}  
		else {$remember=false;}
		$USession->keepAccess($remember);
		if($FDatabase->checkUser($user,$pass)) {

                    $USession->login($user,$pass);
                    $VLogin->loadLogoutButton();
                    return $this->WelcomePage();//non ritorna un cazzo,..
                }

		else  {/*user o pass non corretti*/
                    $VLogin->loadLoginForm();
                    return $this->ErrorPage();//non ritorna un cazzo..
		}
                //$VLogin->showPage();
	}

	public function logout(){
		$USession=Usingleton::getInstance('USession');
		$VLogin=USingleton::getInstance('VLogin');
		$USession->logout();
                
                $VLogin->loadLoginForm();
                $VLogin->assign('body',"logout effettuato con successo");
		//$VLogin->showPage();
	}
        
        public function checkLoggedIn(){
            $USession=USingleton::getInstance('USession');
            
            if ( $USession->get('username') ){
                return true;
            }
            else {
                return false;
            }
        }
        
        public function WelcomePage(){  //riunire in un'unica funzione
            $VLogin=  USingleton::getInstance('VLogin');
            return $VLogin->WelcomePage();
        }
        
        public function ErrorPage(){
            $VLogin=  USingleton::getInstance('VLogin');
            return $VLogin->errorPage();
        }
        
        
        
}