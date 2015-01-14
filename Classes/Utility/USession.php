<?php


class USession {

	private $holdtime;

	public function __construct() {
		//$this->holdtime=60*60*24*60; //2 mesi
		session_start();
		$this->createCookie();
	}

	public function login($user,$pass){
		$this->set('username',$user);
		$this->set('password',$pass);
	}

	public function logout(){
		unset($_SESSION["username"]);
		unset($_SESSION["password"]);
		unset($_SESSION["keepLogged"]);

		$this->createCookie();
	}

	public function checkLogged(){

		if (isset($_SESSION['username']) and isset($_SESSION['password'])){
			$logged=true;
			//$username=$_REQUEST['username'];
			//$password=$_REQUEST['password']; vanno passati alla funzione che controlla il DB
		}
		else {$logged=false;}
		return $logged;
		
	}

	public function set($key, $value){
		$_SESSION[$key]=$value;
	}

	public function get($key)
	{
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];
		else
			return false;
	}

	public function keepAccess($value){
		$_SESSION['keepLogged']=$value;
		$this->createCookie();
	}

	public function createCookie(){
		if($this->get('keepLogged')){
                    global $config;
                    setcookie(session_name(), session_id(), time()+$config['cookie']['holdtime'], "/");
		}
		else{
			setcookie(session_name(), session_id(), 0, "/");
		}

	}

}