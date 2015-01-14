<?php 


class EPerson {

	private $name;

	private $surname;

	public function __construct($nameP,$surnameP){
		$this->name=$nameP;
		$this->surname=$surnameP;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getSurname()
	{
		return $this->surname;
	}






}