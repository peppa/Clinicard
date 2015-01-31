<?php 

//require_once "./Configuration files/DBConfiguration.php";

class FDatabase extends mysqli{

	public function __construct(){
		global $config;
		parent::__construct($config['mysql']['host'],$config['mysql']['user'],$config['mysql']['password'],$config['mysql']['database']);
		
                /* check DB connection */
                if ($this->connect_errno) {
                    debug("Error reaching DB: ".$this->connect_error);
                }else{
                    debug("DB Connection estabilished successfully");
                }

	}
        
        //override to add debug function
        public function query($passedQuery,$resultmode=NULL){
                $result=parent::query($passedQuery, $resultmode);
                debug($passedQuery);
                debug($this->error);
                debug('Numero risultati: '.$this->affected_rows);
		return $result;
	}
        
        public function getDocUsername(){
            $query="SELECT `Username` FROM `utenti` WHERE `Medico`=1";
            $result=$this->query($query);
            $row=$result->fetch_assoc();
            $name=$row['Username'];
            return $name;
        }



}