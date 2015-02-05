<?php
class CLogin{

	public function manageLogin(){
		$VLogin=USingleton::getInstance('VLogin');
		$USession=USingleton::getInstance('USession');
		$FLogin=USingleton::getInstance('FLogin');

		$user=$VLogin->get('username');
		$pass=$VLogin->get('password');
                $keep=$VLogin->get('keepLogged');

//                $user=$VLogin->get('user');   lato client
//		  $pass=$VLogin->get('pass');
//                $remember=$VLogin->get('remember');
                
		if($keep=="yes") {$remember=true;}  
		else {$remember=false;}
		$USession->keepAccess($remember);
		if($FLogin->checkUser($user,$pass)) {

                    $USession->login($user,$pass);
                    return true;
                    //$VLogin->loadLogoutButton();
                    //return $this->WelcomePage();//non ritorna un cazzo,..
                }

		else  {/*user o pass non corretti*/
                    //$VLogin->loadLoginForm();
                    //return $this->ErrorPage();//non ritorna un cazzo..
                    return false;
		}
                //$VLogin->showPage();
	}

	public function logout(){
		$USession=Usingleton::getInstance('USession');
		//$VLogin=USingleton::getInstance('VLogin');
		$USession->logout();
                
                //$VLogin->loadLoginForm();
                //$VLogin->assign('body',"logout effettuato con successo");
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
        
        public function checkLoggedInAjax(){
            $USession=USingleton::getInstance('USession');
            
            if ( $USession->get('username') ){
                $username=ucfirst($USession->get('username'));
            }
            else {
                $username=false;
            }
            echo json_encode($username);
            exit;
        }
        
        public function WelcomePage(){  //riunire in un'unica funzione
            $VLogin=  USingleton::getInstance('VLogin');
            return $VLogin->WelcomePage();
        }
        
        public function ErrorPage(){
            $VLogin=  USingleton::getInstance('VLogin');
            return $VLogin->errorPage();
        }
        
        public function isMedic() {
            $USession=  USingleton::getInstance("USession");
            $FUtente=  USingleton::getInstance("FUtente");
            
            $username=$USession->get("username");
            return $FUtente->isMedic($username);
               
                
            
            
        }
        
        
}